<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\QuoteRequest;
use App\Shippingcompany;
use App\Department;
use App\Message;
use DB;
use URL;
use Mail;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }

		$id = Session::get('front_userID');
		$ProjectID = Session::get('ProjectID');

		$GetUserQuotation = DB:: table( 'tblquote' ) -> where( 'client_id' , '=' , $id )->get();
		return view('front.users.projects',compact('GetUserQuotation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

	 public function ProjectDetails($id) {

		  if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }
		 $UserID = Session::get('front_userID');

		$GetProjectDetails = DB:: table( 'tblquote' ) -> where( 'id' , '=' , $id ) -> where( 'client_id' , '=' , $UserID )->first();
		return view('front.users.project-details',compact('GetProjectDetails'));

	 }




    public function GetProjectMessages($id)
    {
        //

		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }

	 $UserID = Session::get('front_userID');
	 $CustomerID = Session::get('contact_id');

	$GetProjectMessages = DB:: table( 'tblmessages' )->orderBy('created_at','DESC')->where( array( 'project_id' => $id ,'client_id' => $CustomerID) )->get();
	return view('front.users.messages',compact('GetProjectMessages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ViewProjectMessages($id)
    {
        //
		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }
		//'msg_id' => $id ,
		$UserID = Session::get('front_userID');
		$CustomerID = Session::get('contact_id');
		$All_Messages = DB:: table( 'tblmessages' )-> where( array ('client_id' => $CustomerID, 'project_id' => Session::get('ProjectID')) )->get();

		/*print_r($All_Messages);
		die;*/

		if (!empty($All_Messages)) {
		DB:: table( 'tblmessages' )-> where( 'msg_id' , '=' , $id) -> update( array( 'user_view' => 1));

		}

		return view('front.users.message-details',compact('All_Messages'));

    }


	public function loadData($id)
    {



		if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }
		//'msg_id' => $id ,
		$UserID = Session::get('front_userID');
		$CustomerID = Session::get('contact_id');





		$Get_Message = DB::table('tblmessages')->where('msg_id','=',$id)->first();

		$All_Messages = DB::table('tblmessages')->orderBy('created_at','DESC')
		->where( array ('client_id' => $CustomerID, 'project_id' => Session::get('ProjectID')) )->limit(5)->get();

		 return view('front.users.message-details-ajax',compact('All_Messages','Get_Message'));
        //return view('admin.messages.allmessages_ajax',compact('All_Messages','Get_Message'));
    }


	public function loadDataAjax(Request $request)    {
        $output = '';
        $id = $request->id;
       // die;
        $Messages = Message::where('msg_id','<',$id)->where( array ('client_id' => Session::get('contact_id'), 'project_id' => Session::get('ProjectID')))->orderBy('created_at','DESC')->limit(5)->get();

        if(!$Messages->isEmpty())
        {
            $counter=0;



							foreach ($Messages as $message) {
								$GetCustomerName = DB::table('users')->where('id',$message->sender_id)->first();
							$counter++;
							 if (Session::get('contact_id') == $message->sender_id) {
                                       $output .= ' <li class="media">
                                            <a class="pull-left" href="#">';
          $output .= '<img class="media-object img-text" src="'. URL::asset("assets/frontend/img/businessman.png").'" alt="'.Session::get('front_name').'" width="64">';
                                            $output .= '</a>
                                            <div class="media-body">
                                                <h6 class="media-heading">'. Session::get("front_name").'</h6>
                                                <p>'.$message->message.'</p>
                                                <p class="text-muted">
												'.date('j M, Y H:i:s',strtotime($message->created_at)).'</p>';


                                            $output .='</div>
                                        </li>';
                                      }  else {

                                      $output .= '<li class="media" style="border-bottom: 1px dashed #e5e5e5;
    padding-bottom: 10px;">
                                            <a class="pull-right" href="#">';

          $output .= '<img class="media-object img-text" src="'. URL::asset("assets/frontend/img/businessman2.png").'" alt="'.$GetCustomerName->name.'" width="64"></a>
                                            <div class="media-body">
                                                <h6 class="media-heading pull-right">'. $GetCustomerName->name.'</h6>
                                                <p class="pull-right">'.$message->message.'</p>
                                                <p class="text-muted pull-right">
												'.date('j M, Y H:i:s',strtotime($message->created_at)).'</p>
                                            </div>
                                        </li>';
                                       } }

				}
            if (!empty($message->msg_id)) {
            $output .= '<div id="remove-row">
                            <button id="btn-more" data-id="'.$message->msg_id.'" class="btn btn-primary col-lg-4" > Oude berichten </button>
                        </div>';
			}
            echo $output;
        }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function AddMessage(Request $request) {
        //
		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }

		if (isset($_POST['Reply'])) {
			$status = 0;
			$replied = array (	'replied_by' => Session::get('contact_id'),
								'replied_at' =>  date('Y-m-d H:i:s',time()),
								'status' => 2,
						);

			DB::table('tblmessages')
			->where('msg_id', $_POST['msg_id'])
            ->update($replied);




		} else if (isset($_POST['Process'])) {
			$status = 1;
		} else {
			$status = '';
		}

		$data = array (	'client_id' => Session::get('contact_id'),
						'project_id' => $_POST['project_id'],
						'sender_id' => Session::get('contact_id'),
						'message' => $_POST['message'],
						'user_view' => 1,
						'status' => $status,
						'created_at' => date('Y-m-d H:i:s',time()),
						);

    $message = $request->message;

    Mail::raw($message, function($message) {
        $message->to('info@easycleanup.nl')->from(Auth::user()->email)
        ->subject('New Email from Client');
  });

		$Add_Messages = DB::table('tblmessages')->insert($data);
		Session::flash('success', 'Message Successfully Inserted..!');
		return redirect('messages/'.$_POST['project_id']);

    }


	public function AddProjectMessages($id)
    {
        //

		  if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }
		//'msg_id' => $id ,
		$UserID = Session::get('front_userID');
		$CustomerID = Session::get('contact_id');
		return view('front.users.add_message');
    }



	public function AddProject() {

		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }
			$departments = Department::all();
			$Shippingcompany = Shippingcompany::all();
		return view('front.users.add_project',compact('departments','Shippingcompany'));
	}

   public function AddProjectStore() {

		 if (empty(Session::get('front_email'))) {
			return redirect('login');
		 }
		$quote = array (
		'client_id' => Session::get('front_userID'),
		'opdrachtgever' => Session::get('front_name'),
		'con_3m3' => $_POST['3m3'],
		'con_6m3' => $_POST['6m3'],
		'con_10m3' => $_POST['10m3'],
		'bouwopruimer' => $_POST['bouwopruimer'],
		'handyman' => $_POST['handyman'],
		'koffiedame' => $_POST['koffiedame'],
		'afvalagent' => $_POST['afvalagent'],
		'betonafwerker' => $_POST['betonafwerker'],
		'aanpiccalateur' => $_POST['aanpiccalateur'],
		'magazijnbeheerder' => $_POST['magazijnbeheerder'],
		'verkeersregelaar' => $_POST['verkeersregelaar'],
		'poortwachter' => $_POST['poortwachter'],
		'glazenwasser' => $_POST['glazenwasser'],
		'liftbot' => $_POST['liftbot'],
		'kantelsysteen' => $_POST['kantelsysteen'],
		'rolcontainers' => $_POST['rolcontainers'],
		'professionele' => $_POST['professionele'],
		'kwaliteitsbewaker' => $_POST['kwaliteitsbewaker'],
		'keetonderhoud' => $_POST['keetonderhoud'],
		'specialistisch' => $_POST['specialistisch'],
		'opleveringsschoonmaak' => $_POST['opleveringsschoonmaak'],
		'sloopweak' => $_POST['sloopweak'],
		'bouwplaats' => $_POST['bouwplaats'],
		'containerservice' => $_POST['containerservice']
		);
		DB::table('tblquote')->insert($quote);
		Mail::send('front/project-mailers',array('quote'=>$quote,'client'=>Session::get('front_name')), function($message){
		$message->to(Session::get('front_email'),Session::get('front_name'))->from('khurram.asml@gmail.com')->subject('Enquiry');
		});

		Session::flash('success', ' Aanvraagformulier verzonden..!');
		return redirect('projects');
	}


	public function Destroy($id) {

		$Get_Message = DB::table('tblmessages')->where('msg_id','=',$id)->first();

		DB::table('tblmessages')->where('msg_id','=',$id)->delete();

		Session::flash('success', 'Message Successfully Deleted..!');
		return redirect('messages/'.$Get_Message->project_id);

	}


   public function UpdateMessage () {

		$data = array (	'client_id' => Session::get('contact_id'),
						'project_id' => $_POST['project_id'],
						'sender_id' => Session::get('contact_id'),
						'message' => $_POST['message'],
						'user_view' => 1,
						//'status' => $status,
						'created_at' => date('Y-m-d H:i:s',time()),
						);

		if (!empty($_POST['message'])) {
			DB::table('tblmessages')
			->where('msg_id', $_POST['msg_id'])
            ->update($data);

			Session::flash('message', 'Message Successfully Updated..!');
			return redirect('messages/'.$_POST['project_id']);
			//return redirect('admin/Berichten');
		} else {
		Session::flash('error', 'Message Update error..!');
			return redirect('messages/'.$_POST['project_id']);

		}

	}



}
