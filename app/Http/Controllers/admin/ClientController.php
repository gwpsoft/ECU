<?php

namespace App\Http\Controllers\admin;
use App\User;
use App\Http\Requests\ClientRequest;
use Request;
use Session;
use Validator;
use DB;
use App\Http\Controllers\Controller;


class ClientController extends Controller
{
    //
	
	public function index() {
	
	$data =DB::table('users')->orderBy('group','DESC')->where('group','=',1)->get();
	
	
	//$data = User::get()->where('group', 1);	
	return View('admin.clients.allclients')->with('data', $data);
    }
}
