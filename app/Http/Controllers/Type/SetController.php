<?php

namespace App\Http\Controllers\Type;

use Session;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class SetController extends BaseController
{
	/**
     * View an item from the set
     *
     * @param  string  $key
     * @param  string  $content
     *
     * @return Response
     */
    public function View($key, $content)
    {
		return view('type.set.view', ['key_name' => $key,
									   'data' => $content]);
    }

	 /**
     * Add a new item to the redis set
     *
     * @param  Request  $request
     * @return Response
     */
    public function Add(Request $Request)
    {
    	$msgKey = $msgDescription = '';

    	try {
    		$this->Redis->sadd($Request->input('_key'), $Request->input('txt_value'));

			$msgKey = 'success';
			$msgDescription =  trans('type/set.add_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/set.add_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();
    }

     /**
     * Delete an item from the redis set
     *
     * @param  Request  $request
     * @return Response
     */
    public function Delete(Request $Request)
    {
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->srem($Request->input('_key'), $Request->input('_set_key'));

			$msgKey = 'success';
			$msgDescription =  trans('type/set.delete_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/set.delete_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();	
    }
}
