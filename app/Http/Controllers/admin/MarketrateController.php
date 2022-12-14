<?php

namespace App\Http\Controllers\admin;

use Request;
use Session;
use Validator;
use DB;
use Input;
use App\Http\Requests\MarketRateRequest;
use App\Http\Controllers\Controller;

class MarketrateController extends Controller
{
    //
	
	function index () {
		
		$data = DB::table('tblmarketrate')->where('id', 1)->first();
		return View('admin.marketrate.edit',compact('data'));
	}
	
	function Update_Marketrate (MarketRateRequest $request) {
		
		$post = $request->all();
		unset($post['_token']);
		DB::table('tblmarketrate')
				->where('id', Input::get('id'))
				->update($post);
		
		Session::flash('message', ' Bijgewerkt Marktrente');
		return redirect('admin/MarketRate');	
	}
	
}
