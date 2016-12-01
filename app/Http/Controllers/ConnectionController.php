<?php

namespace App\Http\Controllers;

use App;
use Cookie;
use Session;
use Redirect;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;

use App\Libraries\Redisent;

class ConnectionController extends Controller
{
	public function __construct()
	{
		$locale = session()->get('locale');
		if (!$locale) {
			$locale = 'en';
		}

		App::setLocale($locale);		
	}

     /**
     * Displays the main screen prompting the user to specify the hostname and port to connect to the redis server
     *
     * @return view
     */	
	public function Index()
	{
		return view('connect');
	}

     /**
     * Once user specifies the hostname and port and clicks on the connect button, the request comes here
     */
	public function SubmitConnect(Request $Request)
	{
		$hostname = $Request->input('txt_hostname');
		$port = $Request->input('txt_port');

		try {
			new Redisent("redis://{$hostname}:{$port}");
			Cookie::queue('torque_hostname', $hostname,3);
 			Cookie::queue('torque_port', $port, 3);

		} catch (\Exception $Exception) {
			$msgDescription =  trans('main.error_connecting', ['error' => $Exception->getMessage()]);

			Session::flash('error', $msgDescription);

			return Redirect::back();
		}
		
 		return redirect('/home');
	}

	/**
     * This action is being hit when a user changes the default language
     */
	public function SetLocale(Request $Request)
	{
		$languageMap = [
			'english' => 'en',
			'french' => 'fr'
		];

		// Check if the requested language exists, if not fallback to english
		$locale = array_key_exists($Request->input('sel_language'), $languageMap) ? $languageMap[$Request->input('sel_language')] : 'en';

		session()->put('locale', $locale);
		App::setLocale($locale);

		return response()->json([
		    'status' => 200
		]);
	}
}
