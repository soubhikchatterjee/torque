<?php

namespace App\Http\Controllers\Type;

use Session;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class StringController extends BaseController
{
	/**
     * View a string value of a key
     *
     * @param  Request  $request
     * @param  string  $key
     *
     * @return Response
     */
    public function View($key)
    {
    	try {
        $data = $this->Redis->get($key);
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/string.view_description_error', ['error' => $Exception->getMessage()]);

			Session::flash($msgKey, $msgDescription);

			return Redirect::back();
    	}

		return view('type.string.view', ['key_name' => $key,
									     'data' => $data]);
    }

	/**
     * Display the edit form
     *
     * @param  Request  $request
     * @param  string  $key
	 *
     * @return Response
     */
    public function EditIndex($key)
    {
    	try {
    		$data = $this->Redis->get($key);
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/string.view_description_error', ['error' => $Exception->getMessage()]);

			Session::flash($msgKey, $msgDescription);

			return Redirect::back();
    	}

		return view('type.string.edit', ['key_name' => $key,
									     'data' => $data]);
    }

    /**
     * Update an item in the redis string
     *
     * @param  Request  $request
     * @return Response
     */
    public function EditSubmit(Request $Request)
    {
    	$key = $Request->input('_key');
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->set($key, $Request->input('txt_value'));
			$msgKey = 'success';
			$msgDescription =  trans('type/string.edit_description_success');

    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/string.edit_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return redirect('/view/' . $key);
    }

     /**
     * Delete a string
     *
     * @param  Request  $request
     * @return Response
     */
    public function Delete(Request $Request)
    {
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->del($Request->input('_key'));

			$msgKey = 'success';
			$msgDescription =  trans('type/string.delete_description_success');

    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/string.delete_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();
    }
}

