<?php

namespace App\Http\Controllers\Type;

use Session;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;


class ListController extends BaseController
{
	/**
     * View an item from the list
     *
     * @param  Request  $request
     * @param  string  $key
     * @param  int  $index

     * @return Response
     */
    public function View($key, $index)
    {
    	try {
            $data = $this->Redis->lindex($key, $index);
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/list.view_description_error', ['error' => $Exception->getMessage()]);

			Session::flash($msgKey, $msgDescription);

			return Redirect::back();
    	}

		return view('type.list.view', ['key_name' => $key,
                                       'index' => $index,
									   'data' => $data]);
    }

	 /**
     * Add a new item to the redis list
     *
     * @param  Request  $request
     * @return Response
     */
    public function Add(Request $Request)
    {
    	$msgKey = $msgDescription = '';

    	try {
    		$this->Redis->rpush($Request->input('_key'), $Request->input('txt_value'));
			$msgKey = 'success';
			$msgDescription =  trans('type/list.add_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/list.add_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();
    }

	/**
     * Display the edit form
     *
     * @param  Request  $request
     * @param  string  $key
     * @param  int  $index

     * @return Response
     */
    public function EditIndex($key, $index)
    {
    	try {
    		$data = $this->Redis->lindex($key, $index);   		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/list.view_description_error', ['error' => $Exception->getMessage()]);

			Session::flash($msgKey, $msgDescription);

			return Redirect::back();
    	}

		return view('type.list.edit', ['key_name' => $key,
    								   'index' => $index,
									   'data' => $data]);
    }

    /**
     * Update an item in the redis list
     *
     * @param  Request  $request
     * @return Response
     */
    public function EditSubmit(Request $Request)
    {
    	$key = $Request->input('_key');
        $msgKey = $msgDescription = '';

    	try {
    		$this->Redis->lset($key, $Request->input('_index'), $Request->input('txt_value'));
			$msgKey = 'success';
			$msgDescription =  trans('type/list.edit_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/list.edit_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return redirect('/view/' . $key);
    }

     /**
     * Delete an item from the redis list
     *
     * @param  Request  $request
     * @return Response
     */
    public function Delete(Request $Request)
    {
        $msgKey = $msgDescription = '';

    	try {
    		// Do we want to remove all elements equal to the value?
    		if ($Request->input('remove_all_elements') == 1) {
    			$result = $this->Redis->lrem($Request->input('_key'), '0', $Request->input('_txt_value'));
    		}else{
    			$result = $this->Redis->lrem($Request->input('_key'), '1', $Request->input('_txt_value'));
    		}

			$msgKey = 'success';
			$msgDescription =  trans('type/list.delete_description_success');
    		
    	} catch (\Exception $Exception) {
    		$msgKey = 'error';
			$msgDescription =  trans('type/list.delete_description_error', ['error' => $Exception->getMessage()]);
    	}

		Session::flash($msgKey, $msgDescription);

		return Redirect::back();	
    }
}
