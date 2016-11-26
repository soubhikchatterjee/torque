<?php

namespace App\Http\Controllers\Type;

use Session;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class HashController extends BaseController
{
	/**
     * View an item from the hash
     *
     * @param  Request  $request
     * @param  string  $key
     * @param  string  $hashKey

     * @return Response
     */
    public function View($key, $hashKey)
    {
    	try {
            $data = $this->Redis->hget($key, $hashKey);   		
    	} catch (\Exception $Exception) {
			$msgDescription =  trans('type/hash.view_description_error', ['error' => $Exception->getMessage()]);

			Session::flash('error', $msgDescription);

			return Redirect::back();
    	}

		return view('type.hash.view', ['key_name' => $key,
                                       'hash_key' => $hashKey,
									   'data' => $data]);
    }

	 /**
     * Add a new item to the redis hash
     *
     * @param  Request  $request
     * @return Response
     */
    public function Add(Request $Request)
    {
    	$msgKey = $msgDescription = '';

    	try {
    		$this->Redis->hset($Request->input('_key'), $Request->input('txt_hash_key'), $Request->input('txt_value'));

			$msgKey = 'success';
			$msgDescription =  trans('type/hash.add_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/hash.add_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();
    }

	/**
     * Display the edit form
     *
     * @param  Request  $request
     * @param  string  $key
     * @param  string  $hashKey

     * @return Response
     */
    public function EditIndex($key, $hashKey)
    {
    	try {
    		$data = $this->Redis->hget($key, $hashKey);   		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/hash.view_description_error', ['error' => $Exception->getMessage()]);

			Session::flash($msgKey, $msgDescription);

			return Redirect::back();
    	}

		return view('type.hash.edit', ['key_name' => $key,
    								   'hash_key' => $hashKey,
									   'data' => $data]);
    }

    /**
     * Update an item in the redis hash
     *
     * @param  Request  $request
     * @return Response
     */
    public function EditSubmit(Request $Request)
    {
    	$key = $Request->input('_key');
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->hset($key, $Request->input('txt_hash_key'), $Request->input('txt_value'));
			$msgKey = 'success';
			$msgDescription =  trans('type/hash.edit_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/hash.edit_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return redirect('/view/' . $key);
    }

     /**
     * Delete an item from the redis hash
     *
     * @param  Request  $request
     * @return Response
     */
    public function Delete(Request $Request)
    {
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->hdel($Request->input('_key'), $Request->input('_hash_key'));

			$msgKey = 'success';
			$msgDescription =  trans('type/hash.delete_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/hash.delete_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();	
    }
}
