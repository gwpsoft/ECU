<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use frontAuth;
use DB;
use Hash;
/*use Symfony\Component\HttpFoundation\Session\Session;*/
use App\Http\Requests;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    //

	public function welcome() {

		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }

		if (Session::get('front_email')) {
			DB::enableQueryLog();
			$id = Session::get('front_userID');
			$email = Session::get('front_email');
			$username = Session::get('front_name');
			$CustomerID = Session::get('contact_id'); //die;
			$group = Session::get('group');
			if ($group == 1) {
			$Projects = DB::select( DB::raw("SELECT * FROM tblproject WHERE Active = '1' and ProjectTO REGEXP '$CustomerID'") );
			}
			//$Projects = DB::table('tblproject')->where('Active',1)->orderBy('Name','ASC')->whereIn('ProjectTo', array($CustomerID))->get();
			//echo DB::getQueryLog();
			//echo $group; die;

		}
			//return view('front.users.welcome',compact('id','email','username','CustomerID','Projects'));
			if ($group == 1) {
				return view('front.users.welcome',compact('id','email','username','CustomerID','Projects'));
			} if ($group == 2) {
				return view('front.employee.dashboard',compact('id','email','username','CustomerID'));
			}
	}


	public function emp_welcome() {

		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }

		if (Session::get('front_email')) {
			DB::enableQueryLog();
			$id = Session::get('front_userID');
			$email = Session::get('front_email');
			$username = Session::get('front_name');
			$CustomerID = Session::get('contact_id'); //die;
			$group = Session::get('group');
			//$Projects = DB::select( DB::raw("SELECT * FROM tblproject WHERE Active = '1' and ProjectTO REGEXP '$CustomerID'") );

			//$Projects = DB::table('tblproject')->where('Active',1)->orderBy('Name','ASC')->whereIn('ProjectTo', array($CustomerID))->get();
			//echo DB::getQueryLog();

		}

	return view('front.employee.welcome',compact('id','email','username','CustomerID'));

	}




	public function dashboard() {

		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }

		$ProjectID = Session::set('ProjectID',$_POST['project']);
		/*echo Session::get('ProjectID');
		print_r($_POST);
		die;*/


		if (Session::get('front_email')) {

			$id = Session::get('front_userID');
			$email = Session::get('front_email');
			$username = Session::get('front_name');
			$CustomerID = Session::get('contact_id');
			$Projects = DB::table('tblproject')->where('Active',1)->orderBy('Name','ASC')->where(array ('Customer_id'=> $CustomerID))->get();
		}

	return view('front.users.dashboard',compact('id','email','username','CustomerID'));

	}





	public function login(){

		return view('front.users.login');
	}


	public function checklogin (Request $request,Session $session) {

		$session = $request->getSession();
		//echo Hash::make('ECUcon2018');
		//verify session

		$GetUser = DB:: table( 'users' ) -> where( 'email' , '=' , $request->email )->where('status','=',1)->first();

		if ($GetUser) {

			if (Hash::check($request->password,$GetUser->password )) {
			//print_r($GetUser);die;
			Session::set('front_userID',$GetUser->id);
			Session::set('front_email',$GetUser->email);
			Session::set('front_name',$GetUser->name);
			Session::set('contact_id',$GetUser->contact_id);
			Session::set('group',$GetUser->group);
			$group = $GetUser->group;
			//set session here
			/* $session->set('email' , $request->email);
            $session->set('current_user',$response_array['acc_name']);
            $session->set('acc_type',$response_array['acc_type']);*/
			//return redirect()->intended('welcome')->with('success', 'U bent met success ingelogd..!');
				if ($group == 1) {
					//die('1');
					Session::flash('success', ' U bent met success ingelogd..!');

			return redirect('welcome');


				//	return redirect()->intended('welcome')->with('success', 'U bent met success ingelogd..!');
				} if ($group == 2) {
					Session::flash('success', ' U bent met success ingelogd..!');

			return redirect('welcome');
					//return redirect()->intended('emp_welcome')->with('success', 'U bent met success ingelogd..!');
				}
				else {
				return redirect('login')->with('error', 'Ongeldige e-mail of wachtwoord..!');
				}
			}

			else {

			return redirect('login')->with('error', 'Ongeldige e-mail of wachtwoord..!');

			}
		}
		else {

		return redirect('login')->with('error', 'Ongeldige e-mail of wachtwoord..!');

			}
	}

	public function logout() {

		Session::set('front_userID','');
		Session::set('front_email','');
		Session::set('front_name','');
		 Session::set('contact_id','');
		return redirect('login')->with('success', 'Je bent succesvol uitgelogd..!');

	}


}
