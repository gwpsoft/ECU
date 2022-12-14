<?php
namespace App\Http\Controllers\admin;
use Auth;
//use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
//use Request;
use Session;
//use Validator;

class AdminContoller extends Controller
{
    //
	
	
	//protected $auth;
	
	
		
	public function index() {
				
		return view('admin.dashboard');		
	}
		
	public function Login()
	{
    // show the form
    return View('admin.user.login');
	}

	public function doLogin(UserRequest $request)
	{
	// process the form
	
	$userdata = array(
		    'email' => $request->get('email'),
		    'password' => $request->get('password'),
			'group' => 0
		  );
	
	 if (Auth::validate($userdata)) {
        if (Auth::attempt($userdata)) {
          return Redirect::intended('/');
        }
	}
	
	else {
        // if any error send back with message.
        Session::flash('error', 'Something went wrong'); 
        return Redirect::to('admin/login');
      }
	
	
//return $request;
	}
	
	
	
	
	
	
}
