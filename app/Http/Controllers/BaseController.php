<?php

namespace App\Http\Controllers;

use App;
use View;
use Cookie;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Libraries\Redisent;

class BaseController extends Controller
{
    /** @var array */
	protected $keys;

    /** @var Redisent $Redis*/
	protected $Redis;

	public function __construct()
	{
		if (!$this->Redis instanceof Redisent) {
    		$this->Redis = new Redisent(Cookie::get('torque_hostname'), Cookie::get('torque_port'));
    	}

   		$this->keys = $this->Redis->keys('*');

   		// Get the locale from the session (if any)
   		$locale = session()->get('locale');
		if (!$locale) {
			$locale = 'en';
		}

		// Set the locale of the application
		App::setLocale($locale);	

    	View::share('keys', $this->keys);
	}
}
