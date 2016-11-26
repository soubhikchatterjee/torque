<?php

namespace App\Http\Controllers;

use View;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Libraries\Redisent;

class RedisController extends BaseController
{
    /** @var array */
	protected $keys;

    /** @var Redisent $Redis*/
	protected $Redis;

	const TYPE_STRING 	= 'string';
	const TYPE_LIST 	= 'list';
	const TYPE_SET 		= 'set';
	const TYPE_ZSET 	= 'zset';
	const TYPE_HASH 	= 'hash';

     /**
     * List all the keys present in the redis server
     *
     * @return view
     */
    public function Index()
    {
    	$keys = $this->keys;	
        $data = $this->Redis->config('GET', '*');

        $config = $this->ConvertStructure($data);

    	return view('index', ['config' => $config]);
    }

     /**
     * List the values based on the key
     *
     * @param  Request  $Request
     * @param  string  $key
     *
     * @return view
     */
    public function View(Request $Request, $key)
    {
    	$this->layout = null;
    	$type = $this->Redis->type($key);
        $ttl = $this->Redis->ttl($key);

        View::share('ttl', $ttl);
        View::share('key_name', $key);
        View::share('key_type', $type);

    	switch ($type) {
    		case self::TYPE_STRING:

    			$data = $this->Redis->get($key);

    			return view('string', compact('data'));
    			break;


    		case self::TYPE_LIST:
    			$data = $this->Redis->lrange($key, '0', '-1');
    			return view('list', compact('data'));
    			break;    

                
            case self::TYPE_HASH:
                $data = $this->Redis->hgetall($key);
                return view('hash', ['data' => $this->ConvertStructure($data)]);
                break;                              			

                
            case self::TYPE_SET:
                $data = $this->Redis->smembers($key);
                return view('set', compact('data'));
                break;

                
            case self::TYPE_ZSET:
                $data = $this->Redis->zrange($key, '0', '-1', 'WITHSCORES');    
                return view('zset', ['data' => $this->ConvertStructure($data)]);
                break;

    		default:
    			return view('errors.404');
    			break;
    	}
    }

     /**
     * Display the key add form
     *
     * @return view
     */
    public function Add()
    {
        $this->layout = null;

        return view('add');
    }

     /**
     * Display information and statistics about the server
     *
     * @return view
     */
    public function Info()
    {
        //$keys = $this->keys;    
        $data = $this->Redis->info();

        return view('info', compact('data'));
    }    

     /**
     * When a key is added, this subroutine is called
     *
     * @param  Request  $Request
     *
     * @return view
     */
    public function AddSubmit(Request $Request)
    {
        $type = $Request->input('sel_data_type');

        // Validate if the type is a valid one
        if (!in_array($type, [self::TYPE_STRING, self::TYPE_LIST, self::TYPE_SET, self::TYPE_ZSET, self::TYPE_HASH])) {
            Session::flash('success', trans('main.invalid_type'));
            return redirect('/home');
        }

        $key = $Request->input('txt_key');
        $hashKey = $Request->input('txt_hash_key');
        $score = $Request->input('txt_score');
        $value = $Request->input('txt_value');
        $expiry = $Request->input('txt_expiry');

        if ($key == '' ) {
            Session::flash('error', trans('main.empty_key'));
            return redirect('/home');
        }

        switch ($type) {
            case self::TYPE_STRING:
                // Save the key
                $this->Redis->set($key, $value);
                $this->SetExpiry($key, $expiry);
                break;


            case self::TYPE_LIST:
                // Save the key
                $this->Redis->lpush($key, $value);
                $this->SetExpiry($key, $expiry);
                break;


            case self::TYPE_HASH:
                if ($hashKey == '') {
                    Session::flash('error', trans('main.empty_hash_key'));
                    return redirect('/home');
                }
                // Save the key
                $this->Redis->hset($key, $hashKey, $value);
                $this->SetExpiry($key, $expiry);
                break;


            case self::TYPE_SET:
                // Save the key
                $this->Redis->sadd($key, $value);
                $this->SetExpiry($key, $expiry);
                break;


            case self::TYPE_ZSET:
                if ($score == '') {
                    Session::flash('error', trans('main.empty_score'));
                    return redirect('/home');
                }
                // Save the key
                $this->Redis->zadd($key, $score, $value);
                $this->SetExpiry($key, $expiry);
                break;                
        }

        Session::flash('success', trans('main.add_key_success'));
        return redirect('/view/' . $key);    
    }

     /**
     * Rename a key and update the TTL for the key
     *
     * @param  Request  $Request
     *
     * @return view
     */
    public function EditSubmit(Request $Request)
    {
        $key = $Request->input('txt_key');
        $oldKey = $Request->input('_old_key');
        $expiry = $Request->input('txt_expiry');

        if ($key == '' || $oldKey == '') {
            Session::flash('error', trans('main.empty_key'));
            return redirect('/home');
        }
        // Rename the key
        try {
            $this->Redis->rename($oldKey, $key);
        } catch (\Exception $Exception) {
            Session::flash('error', $Exception->getMessage());
            return redirect('/home');
        }

        $this->SetExpiry($key, $expiry);

        Session::flash('success', trans('main.edit_key_success'));
        return redirect('/view/' . $key);
    }

    /**
     * Set an expiry for a defined key
     *
     * @param  string  $key
     * @param  int  $expiry
     */
    private function SetExpiry($key, $expiry)
    {
        try {
            // Check if the key expiry time is set to infinity
            if ($expiry < 0) {
                $this->Redis->persist($key);
            }else{
                // If not, then we set the expiry time to what was specified
                $this->Redis->expire($key, $expiry);
            }
          
        } catch (\Exception $Exception) {
            Session::flash('error', $Exception->getMessage());
            return redirect('/home');
        }
    }

    /**
     * Delete the key
     *
     * @param  Request  $request
     *
     * @return view
     */
    public function Delete(Request $Request)
    {
        $this->layout = null;
        $msgKey = $msgDescription = '';

        try {
            $result = $this->Redis->del($Request->input('_key'));

            $msgKey = 'success';
            $msgDescription =  trans('main.delete_key_success');
            
        } catch (\Exception $Exception) {
            $msgKey = 'error';
            $msgDescription =  trans('main.delete_key_error', ['error' => $Exception->getMessage()]);
        }

        Session::flash($msgKey, $msgDescription);

        return redirect('/home');
    }

     /**
     * List all the keys present in the redis server
     *
     * @return view
     */
    public function Disconnect()
    {
        unset($this->Redis);

        return redirect('/');
    }

     /**
     * Converts a data structure from:
     *
     * [0 => key1
     * 1 => value
     * 2 => key2
     * 3 => value]
     *
     * to this:
     *
     * [key1 => value
     * key2 => value]
     *
     * @param  array  $rawData
     *
     * @return array
     */
    private function ConvertStructure(array $rawData)
    {
        $result = [];
        foreach ($rawData as $key => $value) {
            $key++;
            static $rawKey;

            if ($key % 2 == 1) {
               $rawKey = $value;
               $result[$rawKey] = null;
            }

            if ($key % 2 == 0) {
               $result[$rawKey] = $value;
            }

            unset($rawKey, $value);
        }

        return $result;
    }
}
