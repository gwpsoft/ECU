<?php
namespace App\Http\Controllers\admin;
use App\Contact;
use App\clients;
use App\Department;
use App\User;
use App\Http\Requests\ContactRequest;
use Request;
use Session;
use Validator;
use DB;
use Hash;
use Datatables;
use Mail;
use Input;
use Response;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
	public function getcontacts() {

	/*$data = Contact::get();
	return View('admin.contact.allcontacts')->with('data', $data);*/
	return View('admin.contact.allcontacts_ajax');
    }

	public function create($id = 0)
	{

		$DepartmentID = $id;
		$department = Department::orderBy('Name','ASC')->get();

   	return view('admin.contact.create',compact('department','DepartmentID'));
	}

	public function save(ContactRequest $request) {


	$data = array ('Firstname' => Input::get('Firstname'),
	'Gender' => Input::get('Gender'),
	'Initials' => Input::get('Initials'),
	'Lastname' => Input::get('Lastname'),
	'Department_Id' => Input::get('Department_Id'),
	'Jobtitle' => Input::get('Jobtitle'),
	'Notes' => Input::get('Notes'),
	'Phone' => Input::get('Phone'),
	'Phone_Private' => Input::get('Phone_Private'),
	'Mobile' => Input::get('Mobile'),
	'Mobile2' => Input::get('Mobile2'),
	'Mobile3' => Input::get('Mobile3'),
	'Fax' => Input::get('Fax'),
	'Email' => Input::get('Email'),
	'Active' => Input::get('active'),
	'created_at' => time(),
	 );



	$input = Contact::create($data);
	$id = $input->id;
	//die;
	$client = array (
						'contact_id' => $id,
						'name' => Input::get('Firstname').' '.Input::get('Lastname'),
						'email'    => Input::get('Email'),
						'password' => Hash::make(Input::get('password')),
						'txt_password' => Input::get('password'),
						'remember_token' => Input::get('_token'),
						'phone'    => Input::get('Mobile'),
						'status'    => 1,
						'group'    => 1,
						'created_at' => time(),
						);

	//$input =
	 //clients::create($client);
		//$user_id = $input->id;
	DB::table('users') ->insert($client);
	/*$text = "Hello,

	Email: ".Input::get('Email')."
	Password: ".Input::get('password')."


	Regards,
	Easy Clean Up
	";
	$pdf['email']= Input::get('Email'];*/



	//	$EmailSent = 	Mail::raw($text, function($message) use ($pdf) {
		//$message->to( $pdf['email'] )->from('khurram.lucky@gmail.com')->subject('Easy Clean Up BV - Login Information'); });



	 	if (!empty(Input::get('Save'))) {
			Session::flash('message', ' Ingevuld contact!');
			return redirect('admin/edit_contact/'.$id);
			//return redirect('admin/weekcard');
		}
		if (!empty(Input::get('Save_Close'))) {
		Session::flash('message', ' Ingevuld contact!');
		return redirect('admin/contacts');
		}

		if (!empty(Input::get('Save_New'))) {
		Session::flash('message', ' Ingevuld contact!');
		return redirect('admin/create_contact');
		}



	/*Session::flash('message', 'Successfully Ingevuld contact!');
	return redirect('admin/contacts');*/

	}

	public function delete($id) {

		$data = DB::table('tblcontact')->where('id', $id)->delete();
		if ($data > 0) {
		Session::flash('message', ' Contactpersoon is met success verwijderd !');
		return redirect('admin/contacts');
		}

	}

	 public function show($id)
    {
        //
		$Get_Contact = Contact::find($id);
		if ($Get_Contact) {
			return View('admin.contact.view')->with('data', $Get_Contact);
		} else {
		return redirect('admin/404');
		}


    }

	public function edit($id)
    {
        $department = Department::orderBy('Name','ASC')->get();
		$Password = DB::table('users')->select('*')->where('contact_id',$id)->get();
		/*print_r($Password);
		die;*/

		$Get_Contact = Contact::find($id);
		if ($Get_Contact) {
			return View('admin.contact.edit',compact('Get_Contact','department','Password'));
		} else {
		return redirect('admin/404');
		}
    }

	public function update(/*ContactRequest $request*/) {

		if (!empty(Input::get('SendEmail')) && !empty(Input::get('Email'))) {

			$EmailData = array ( 'Firstname' => Input::get('Firstname'),
							'Lastname' 	=> Input::get('Lastname'),
							'Email' 	=> Input::get('Email'),
							'Password' 	=> Input::get('password'),
							'id' 	=> Input::get('id'),
							'Mobile' => Input::get('Mobile')
			);

			// Save password in users table
			if(!empty(Input::get('password'))) {
				$user = User::where('Contact_id', '=', Input::get('id'))->first();
				$user->password 		= Hash::make(Input::get('password'));
				$user->txt_password = Input::get('password');
				$user->save();
			}

		return View('admin.contact.email',compact('EmailData'));
		} else {

		//$post = $request->all();
		/*echo '<pre>';
		print_r($_POST);
		die;*/

	$data = array ('Firstname' => Input::get('Firstname'),
	'Gender' => Input::get('Gender'),
	'Initials' => Input::get('Initials'),
	'Lastname' => Input::get('Lastname'),
	'Department_Id' => Input::get('Department_Id'),
	'Jobtitle' => Input::get('Jobtitle'),
	'Notes' => Input::get('Notes'),
	'Phone' => Input::get('Phone'),
	'Phone_Private' => Input::get('Phone_Private'),
	'Mobile' => Input::get('Mobile'),
	'Mobile2' => Input::get('Mobile2'),
	'Mobile3' => Input::get('Mobile3'),
	'Fax' => Input::get('Fax'),
	'Email' => Input::get('Email'),
	'Active' => @Input::get('active'),
	'updated_at' => time(),
	 );

		DB::table('tblcontact')->where('Id',Input::get('id')) ->update($data);
		$client = array (
						'contact_id' => Input::get('id'),
						'name' => Input::get('Firstname').' '.Input::get('Lastname'),
						'email'    => Input::get('Email'),
						'remember_token' => Input::get('_token'),
						'phone'    => Input::get('Mobile'),
						'status'    => 1,
						'group'    => 1,
						'updated_at' => time(),
						);
	//print_r($client); die;
	//$input =

	//if (isset(Input::get('password')) && Input::get('password') !='') {
		$client['password'] = Hash::make(Input::get('password'));
		$client['txt_password'] = Input::get('password');
	//}

		$CheckUser = DB::table('users')->select('contact_id','email')->where('contact_id',Input::get('id'))->first();
		/*print_r($CheckUser);
		echo $CheckUser->email;
		die;*/




		if (/*!empty($CheckUser->email) &&*/ !empty($CheckUser->contact_id)) {
			DB::table('users')->where('contact_id',Input::get('id')) ->update($client);
		} else {
			DB::table('users') ->insert($client);
		}

		if (!empty(Input::get('Save'))) {
		Session::flash('message', ' Bijgewerkt Contact!');
		return redirect('admin/edit_contact/'.Input::get('id'));
		}
		if (!empty(Input::get('Save_Close'))) {
		Session::flash('message', ' Bijgewerkt Contact!');
		return redirect('admin/contacts');
		}

		if (!empty(Input::get('Save_New'))) {
		Session::flash('message', ' Bijgewerkt Contact!');
		return redirect('admin/create_contact');
		}
		else {
		Session::flash('message', 'Bijgewerkt Contact!');
		return redirect('admin/edit_contact/'.Input::get('id'));
		}
		}
	}

	function email () {


		$To['email'] = Input::get('Email');
		$text = Input::get('Text');
		$id = Input::get('id');

		$client = array (
						'contact_id' => Input::get('id'),
						'name' => Input::get('Firstname').' '.Input::get('Lastname'),
						'email'    => Input::get('Email'),
						'remember_token' => Input::get('_token'),
						'phone'    => Input::get('Mobile'),
						'status'    => 1,
						'group'    => 1,
						);

	//$input =

	//if (isset(Input::get('password')) && Input::get('password') !='') {
		$client['password'] = Hash::make(Input::get('Password'));
		$client['txt_password'] = Input::get('Password');

		//print_r($client); die;

		$CheckUser = DB::table('users')->select('contact_id','email')->where('contact_id',Input::get('id'))->first();
		/*print_r($CheckUser);
		echo $CheckUser->email;
		die;*/




		if (/*!empty($CheckUser->email) &&*/ !empty($CheckUser->contact_id)) {
		$client['updated_at'] = time();
			DB::table('users')->where('contact_id',$CheckUser->contact_id) ->update($client);
		} else {
			$client['created_at'] = time();
			DB::table('users') ->insert($client);
		}

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "From: " . strip_tags('planning@easycleanup.nl') . "\r\n";
		$headers .= "Bcc: planning@easycleanup.nl" . "\r\n";

		$EmailSent = mail($To['email'], 'Login gegevens van ECU App', $text, $headers);





		//$data = array('name'=>$text);

    /*  Mail::send(['html' => $text], function($message) use ($To) {
         $message->to($To['email'])->subject
            ('Easy Clean Up - Inloggegevens');
         $message->from('planning@easycleanup.nl');
      });
		*/



	/*	$EmailSent = Mail::raw($text, function($message) use ($To) {
		$message->to(@$To['email'])
		//->setBody($text,'text/html')
		 ->from('planning@easycleanup.nl')->subject('Easy Clean Up - Inloggegevens');

		});*/

		if (isset($To) && isset($EmailSent)) {

			Session::flash('message', 'Email verzonden');

			} else {

			Session::flash('error', 'Email Error');

			}

			return redirect('admin/edit_contact/'. $id);

	}



	function AllContacts () {

		$data =DB::table('v_contact')->select('*')->where('Active',1);
	 return Datatables::of($data)
	  ->addColumn('Opties' , function ($data) {
				return '<a href="view_contact/'.$data->Id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="edit_contact/'.$data->Id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="javascript:void(0)" title="verwijderen" class="widget-icon" onclick="deleteRecord('. $data->Id . ');">
				<span class="icon-trash"></span></a>';
				// <a href="Berichten/'.$data->Id.'" title="Project" class="widget-icon">
				//<span class="icon-pencil"></span></a>
				 })
	  ->make(true);
	}


	public function download() {

	 $headers = array(
        'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
        'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
        'Content-Disposition' => 'attachment; filename=abc.csv',
        'Expires' => '0',
        'Pragma' => 'public',
    );

$filename = "Uitvoerder.csv";
$handle = fopen($filename, 'w');
fputcsv($handle, [
   "ID",
   "Name",
   "Phone",
   "Email"
]);

DB::table("tblcontact")->orderBy('Firstname','ASC')->chunk(100, function ($data) use ($handle) {
    foreach ($data as $row) {
        // Add a new row with data
        fputcsv($handle, [
           $row->Id,
		   $row->Firstname.' '.$row->Lastname,
		   $row->Phone,
		   $row->Email
        ]);
    }
});

fclose($handle);

return Response::download($filename, "Uitvoerder.csv", $headers);


}







	function test_email () {

		$data['email'] = 'khurram.lucky@gmail.com';
		$data['text'] = '<p>Web adres: <a href="https://app.easycleanup.nl" target="_blank" class="url">https://app.easycleanup.nl</a></p>';

		$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($data['email'], 'Afvalcontainers mailen naar', $data['text'], $headers);




		die;

		Mail::send($data['text'], function($message) use ($data) {
		$message->to($data['email'],'Khurram')->setBody($data['text'], 'text/html')
		->subject('Afvalcontainers mailen naar');

		 });








		/*$data = [];
$data['Html_Body'] = $text;
//$data['Text_Body'];
Mail::send('html.view', $data , function($message)
{
    $message->to($To['email'])->subject('Easy Clean Up - Inloggegevens')->setBody($data['Html_Body'], 'text/html');;
});*/









		/* Mail::send(['html' => $text], function($message) use ($To) {
         $message->to($To['email'])->subject
            ('Easy Clean Up - Inloggegevens');
         $message->from('planning@easycleanup.nl')
		 ->setBody($text, 'text/html');

      });*/



		}




}
