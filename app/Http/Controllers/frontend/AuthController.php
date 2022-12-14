<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticatesUsers;
class AuthController extends Controller
{
   
   use AuthenticatesUsers;
   protected $redirectTo = 'dashboard';
   
   public function index() {
	   return view('front.users.login');
	   
	   }
   
   
}
