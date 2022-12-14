<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\QuoteRequest;
use App\Shippingcompany;
use App\Department;
use App\Personeel_Message;
use DB;
use URL;
use Mail;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersoneelController extends Controller
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
		
		$GetUserQuotation = DB:: table( 'tblquote' ) -> where( 'emp_id' , '=' , $id )->get();		
		return view('front.employee.projects',compact('GetUserQuotation'));		
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
		 $UserID = Session::get('contact_id');
		//Session::set('ProjectID',$id);
		$GetProjectDetails = DB:: table( 'tbl_emp_messages' ) -> where( 'project_id' , '=' , $id ) -> where( 'emp_id' , '=' , $UserID )->first();		
		return view('front.employee.project-details',compact('GetProjectDetails'));		
	 
	 }
	 
	 
	 
	 
    public function GetProjectMessages()
    {
        //
		
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		
	 $UserID = Session::get('front_userID');
	 $CustomerID = Session::get('contact_id');
	//Session::set('ProjectID',$id);	
	$GetProjectMessages = DB:: table( 'tbl_emp_messages' )->orderBy('created_at','DESC')->where( array('emp_id' => $CustomerID) )->get();	
	return view('front.employee.messages',compact('GetProjectMessages','id'));
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
		$All_Messages = DB:: table( 'tbl_emp_messages' )-> where( array ('emp_id' => $CustomerID, 'project_id' => Session::get('ProjectID')) )->get();
		
		/*print_r($All_Messages);
		die;*/
		
		if (!empty($All_Messages)) {
		DB:: table( 'tbl_emp_messages' )-> where( 'msg_id' , '=' , $id) -> update( array( 'user_view' => 1));	
			
		}
		
		return view('front.employee.message-details',compact('All_Messages'));
		
    }
	
	
	public function loadData()
    {
        
		
		
		if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		//'msg_id' => $id ,
		$UserID = Session::get('front_userID');
		$CustomerID = Session::get('contact_id');
		
		//$Get_Message = DB::table('tbl_emp_messages')->where('msg_id','=',$id)->first();		
		
		$All_Messages = DB::table('tbl_emp_messages')->orderBy('created_at','DESC')
		->where( array ('emp_id' => $CustomerID) )->limit(5)->get();

		 return view('front.employee.message-details-ajax',compact('All_Messages','Get_Message'));       
        //return view('admin.messages.allmessages_ajax',compact('All_Messages','Get_Message'));
    }
	
	
	public function loadDataAjax(Request $request)    {
        $output = '';
       // $id = $request->id;
       // die;
        $Messages = Personeel_Message::where('msg_id','<',$id)->where( array ('emp_id' => Session::get('contact_id')))->orderBy('created_at','DESC')->limit(5)->get();
        
        if(!$Messages->isEmpty())
        {
            $counter=0;
			
			
			
							foreach ($Messages as $message) {
								$GetCustomerName = DB::table('users')->where('id',$message->sender_id)->first();
							$counter++;
							 if (Session::get('contact_id') == $message->sender_id) {
                                       $output .= ' <li class="media">
                                            <a class="pull-left" href="#">';
          $output .= '<img class="media-object img-text" src="'. URL::asset("assets/frontend/img/businessman.png").'" alt="'.Session::get('front_name').'" width="64" style="border: 1px solid #e5e5e5;
    border-radius: 3px;
    padding: 1px;">';
                                            $output .= '</a>
                                            <div class="media-body">
                                                <h6 class="media-heading" style="margin-bottom:0px;font-weight:bold;font-size:12px">'. Session::get('front_name').'</h6>
                                                <p style="font-size:13px;margin:0 0 6px;">'.$message->message.'</p>
                                                <p class="text-muted" style="font-size:11px;">
												'.date('j M, Y H:i:s',strtotime($message->created_at)).'</p>';
                                          
                                                                                                                                        
                                            $output .='</div>                                            
                                        </li>';
                                      }  else { 
                                      
                                      $output .= '<li class="media" style="border-bottom: 1px dashed #e5e5e5;
    padding-bottom: 10px;">
                                            <a class="pull-right" href="#">';
			 
          $output .= '<img class="media-object img-text" src="'. URL::asset("assets/frontend/img/businessman2.png").'" alt="'.$GetCustomerName->name.'" width="64" style="border: 1px solid #e5e5e5;
    border-radius: 3px;
    padding: 1px;"></a>
                                            <div class="media-body"> <br />
                                                <h6 class="media-heading pull-right" style="margin-bottom:0px;font-weight:bold;font-size:12px">'. $GetCustomerName->name.'</h6> <br />
                                                <p style="text-align:right" style="font-size:11px;margin:0 0 6px;">'.$message->message.'</p> 
                                                <p class="text-muted" style="text-align:right;font-size:11px;">
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
    public function AddMessage() {
        //
		 if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		//print_r($_POST); die;
		if (isset($_POST['Reply'])) {
			$status = 0;
			$replied = array (	'replied_by' => Session::get('contact_id'),
								'replied_at' =>  date('Y-m-d H:i:s',time()),
								'status' => 2,
						);
			
			DB::table('tbl_emp_messages')
			->where('msg_id', $_POST['msg_id'])
            ->update($replied);
			
			
			
			
		} else if (isset($_POST['Process'])) {
			$status = 1;	 
		} else {
			$status = '';
		}
		
		$data = array (	'emp_id' => Session::get('contact_id'),
						//'project_id' => $_POST['project_id'],
						'sender_id' => Session::get('contact_id'),						
						'message' => $_POST['message'],
						'user_view' => 1,
						'status' => $status,
						'created_at' => date('Y-m-d H:i:s',time()),		
						);
		
		$Add_Messages = DB::table('tbl_emp_messages')->insert($data);
		Session::flash('success', 'Message Successfully Inserted..!');
		return redirect('Emp_messages');
		
    }
	
	
	public function AddProjectMessages()
    {
        //
		
		  if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }
		//'msg_id' => $id ,
		$UserID = Session::get('front_userID');
		$CustomerID = Session::get('contact_id');
		return view('front.employee.add_message');
    }
	
   
   
	public function Destroy($id) {
	
		$Get_Message = DB::table('tbl_emp_messages')->where('msg_id','=',$id)->first();
		
		DB::table('tbl_emp_messages')->where('msg_id','=',$id)->delete();
		
		Session::flash('success', 'Message Successfully Deleted..!');
		return redirect('Emp_messages');
	
	}
   
   
   public function UpdateMessage () {
		
		$data = array (	'emp_id' => Session::get('contact_id'),
						//'project_id' => $_POST['project_id'],
						'sender_id' => Session::get('contact_id'),						
						'message' => $_POST['message'],
						'user_view' => 1,
						//'status' => $status,
						'created_at' => date('Y-m-d H:i:s',time()),		
						);
		
		if (!empty($_POST['message'])) {
			DB::table('tbl_emp_messages')
			->where('msg_id', $_POST['msg_id'])
            ->update($data);
			
			Session::flash('message', 'Message Successfully Updated..!');
			return redirect('Emp_messages');
			//return redirect('admin/Berichten');
		} else {
		Session::flash('error', 'Message Update error..!');
			return redirect('Emp_messages');
		
		}
				
	}
   
   
   
}
