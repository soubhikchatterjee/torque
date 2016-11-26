<?php

namespace App\Http\Controllers\Type;

use Session;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class ZSetController extends BaseController
{
	/**
     * View an item from the zset
     *
     * @param  string  $key
     * @param  string  $content
     * @param  int  $score
     *
     * @return Response
     */
    public function View($key, $content, $score)
    {
		return view('type.zset.view', ['key_name' => $key,
                                       'data' => $content,
                                       'score' => $score,
									   ]);
    }

	 /**
     * Add a new item to the redis zset
     *
     * @param  Request  $request
     * @return Response
     */
    public function Add(Request $Request)
    {
    	$msgKey = $msgDescription = '';

    	try {
    		$this->Redis->zadd($Request->input('_key'), $Request->input('txt_score'), $Request->input('txt_value'));

			$msgKey = 'success';
			$msgDescription =  trans('type/zset.add_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/zset.add_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();
    }

	/**
     * Display the edit form
     *
     * @param  Request  $request
     * @param  string  $key
     * @param  string  $content
     * @param  int  $score

     * @return Response
     */
    public function EditIndex($key, $content, $score)
    {
		return view('type.zset.edit', ['key_name' => $key,
                                       'data' => $content,
    								   'score' => $score]);
    }

    /**
     * Update an item in the redis zset
     *
     * @param  Request  $request
     * @return Response
     */
    public function EditSubmit(Request $Request)
    {
    	$key = $Request->input('_key');
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->zadd($key, $Request->input('txt_score'), $Request->input('txt_value'));
			$msgKey = 'success';
			$msgDescription =  trans('type/zset.edit_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/zset.edit_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return redirect('/view/' . $key);
    }

     /**
     * Delete an item from the redis zset
     *
     * @param  Request  $request
     * @return Response
     */
    public function Delete(Request $Request)
    {
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->zrem($Request->input('_key'), $Request->input('_zset_key'));

			$msgKey = 'success';
			$msgDescription =  trans('type/zset.delete_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/zset.delete_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();	
    }
}