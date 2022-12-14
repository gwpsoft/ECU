<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller;




class ArticlesContoller extends Controller
{
    //
	public function index () {
		
		return view('pages.hello');
		//return 'About Get all Articles....!';
		//$articles = Article::all();
		//return $articles;
		}
		
	
		
		
}
