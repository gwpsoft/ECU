<?php

namespace App\Http\Controllers;

use App\clients;
use App\quote;
use App\Http\Requests\frontend\QuoteRequest;
use Request;
use Session;
use Mail;
use Validator;
use DB;
use Hash;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
	public function index() {

		//return view('front.home');
		return view('front.users.login');
	}

	public function store(QuoteRequest $request) {


		$checkDuplicationUser =  DB:: table( 'users' )->where('email' , '=' , $request['email'])->where( 'group' , '=' , 1)->first();

		if (count($checkDuplicationUser) > 0) {
			Session::flash('error', ' E-mail al bestaan!');
			return redirect('/');
		}

		$randomPassword = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$comments = $request['comments'];
		$client = array (
						'name' => $request['first_name'].' '.$request['last_name'],
						'email'    => $request['email'],
						'password' => Hash::make($request['password']),
						'remember_token' => $request['_token'],
						'phone'    => $request['phone'],
						'status'    => 0,
						'group'    => 1,
						);

		$input = clients::create($client);
		$user_id = $input->id;

		$quote = array (
		'client_id' => $input->id,
		'opdrachtgever' => $request['first_name'].' '.$request['last_name'],
		'con_3m3' => $request['3m3'],
		'con_6m3' => $request['6m3'],
		'con_10m3' => $request['10m3'],
		'bouwopruimer' => $request['bouwopruimer'],
		'handyman' => $request['handyman'],
		'koffiedame' => $request['koffiedame'],
		'afvalagent' => $request['afvalagent'],
		'betonafwerker' => $request['betonafwerker'],
		'aanpiccalateur' => $request['aanpiccalateur'],
		'magazijnbeheerder' => $request['magazijnbeheerder'],
		'verkeersregelaar' => $request['verkeersregelaar'],
		'poortwachter' => $request['poortwachter'],
		'glazenwasser' => $request['glazenwasser'],
		'liftbot' => $request['liftbot'],
		'kantelsysteen' => $request['kantelsysteen'],
		'rolcontainers' => $request['rolcontainers'],
		'professionele' => $request['professionele'],
		'kwaliteitsbewaker' => $request['kwaliteitsbewaker'],
		'keetonderhoud' => $request['keetonderhoud'],
		'specialistisch' => $request['specialistisch'],
		'opleveringsschoonmaak' => $request['opleveringsschoonmaak'],
		'sloopweak' => $request['sloopweak'],
		'bouwplaats' => $request['bouwplaats'],
		'containerservice' => $request['containerservice'],
		'created_at' => date('Y-m-d h:i:s', time())
		);


		DB::table('tblquote')->insert($quote);
		Mail::send('front/mailers',array('client'=>$client, 'quote'=>$quote,'password'=> Hash::make($request['password']),'comments'=>$comments),
		function($message){	$message->to($_POST['email'],$_POST['first_name'].' '.$_POST['last_name'])->from('khurram.asml@gmail.com')->subject('Enquiry');
		});
		Session::flash('message', ' Aanvraagformulier verzonden..!');
		return redirect('/');
	}


	public function Services() {

		return view('front.home');

	}

	function NewUsers () {


/*zaheer@easycleanup.nl      - ECUpw01
boekhouding@easycleanup.nl - ECUboek01
planning@easycleanup.nl    - ECUplan01
s.rehman@easycleanup.nl    - Shakeel01
pk@easycleanup.nl          - Lahore42
info@easycleanup.nl        - kollen78
jk@easycleanup.nl          - ECUam020*/


// $JK = array (
// 						'name' => 'JK',
// 						'email'    => 'jk@easycleanup.nl',
// 						'password' => Hash::make('ECUam020'),
// 						'phone'    => 0,
// 						'status'    => 1,
// 						'group'    => 0
// 						);
// 		DB::table('users')->insert($JK);
//
//
// $Info = array (
// 						'name' => 'Info',
// 						'email'    => 'info@easycleanup.nl',
// 						'password' => Hash::make('kollen78'),
// 						'phone'    => 0,
// 						'status'    => 1,
// 						'group'    => 0
// 						);
// 		DB::table('users')->insert($Info);
//
//
//
//
//
//
//
//
// $PK = array (
// 						'name' => 'PK',
// 						'email'    => 'pk@easycleanup.nl',
// 						'password' => Hash::make('Lahore42'),
// 						'phone'    => 0,
// 						'status'    => 1,
// 						'group'    => 0
// 						);
// 		DB::table('users')->insert($PK);
//
//
//
// $Rehman = array (
// 						'name' => 'Rehman',
// 						'email'    => 's.rehman@easycleanup.nl',
// 						'password' => Hash::make('Shakeel01'),
// 						'phone'    => 0,
// 						'status'    => 1,
// 						'group'    => 0
// 						);
// 		DB::table('users')->insert($Rehman);
//
// $Planning = array (
// 						'name' => 'Planning',
// 						'email'    => 'planning@easycleanup.nl',
// 						'password' => Hash::make('ECUplan01'),
// 						'phone'    => 0,
// 						'status'    => 1,
// 						'group'    => 0
// 						);
// 		DB::table('users')->insert($Planning);
//
//
//
//
//
//
// 		$Zaheer = array (
// 						'name' => 'Zaheer',
// 						'email'    => 'zaheer@easycleanup.nl',
// 						'password' => Hash::make('ECUpw01'),
// 						'phone'    => 0,
// 						'status'    => 1,
// 						'group'    => 0
// 						);
// 		DB::table('users')->insert($Zaheer);
// 		$Boekhouding = array (
// 						'name' => 'Boekhouding',
// 						'email'    => 'boekhouding@easycleanup.nl',
// 						'password' => Hash::make('ECUboek01'),
// 						'phone'    => 0,
// 						'status'    => 1,
// 						'group'    => 0
// 						);
// 		DB::table('users')->insert($Boekhouding);
//


	$Nancy = array (
					'name' => 'Nancy',
					'email'    => 'nancy@easycleanup.nl',
					'password' => Hash::make('ECUnl2018'),
					'phone'    => 0,
					'status'    => 1,
					'group'    => 0
					);
	DB::table('users')->insert($Nancy);

	dd("Created");

		}





}
