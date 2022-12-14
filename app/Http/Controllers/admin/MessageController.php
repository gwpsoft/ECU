<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Message;
use DB;
use Auth;
use Session;
use URL;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //
	public function index() {

		$Messages = DB::table('tblmessages')->orderBy('created_at','DESC')->get();
        		//$Messages = DB::table('tblmessages')->latest()->get();

        //echo count($Project_Messages); die;
		//$project_ID = $id;
		return View('admin.messages.messages',compact('Messages'));

    }

	/* Mobile API code Starts here*/
	public function NewMobileMessage (Request $request) {

			$status = 0;
			$data = array ('client_id' => $request->id,
						'project_id' => $request->project_id,
						'sender_id' => $request->id,
						'message' => $request->message,
						'admin_view' => 0,
						'user_view' => 1,
						'status' => $status,
						'created_at' => date('Y-m-d H:i:s',time()),
						);

			$Add_Messages = DB::table('tblmessages')->insert($data);

		if($Add_Messages)
			{
				$user_info = array('status' => 1, 'id' => $Add_Messages);

				return json_encode($user_info);
			}
			else
			{
				$user_info = array('status' => 0, 'message' => 'failed to insert record');

				return json_encode($user_info);
			}


	}

	public function getconversation (Request $request) {

		$contact_id = $request->id;
		$project_id = $request->project_id;
		$messagelist = DB::table('tblmessages')->where('tblmessages.project_id',$project_id)->orWhere('tblmessages.client_id',$contact_id)->orderBy('msg_id', 'ASC')->get();

		if ($messagelist)
		{
			return json_encode(array('status' => 1, 'messagelist' => $messagelist));
		}
		else
		{
			return json_encode(array('status' => 0, 'messsage'=> 'no list' ));
		}

	}
	/* Mobile API code ends here*/

	public function message_details($id) {

		$Project_Details = DB::table('tblquote')->where('id','=',$id)->first();
		$All_Messages = DB::table('tblmessages')->orderBy('created_at','DESC')->where('project_id','=',$id)->get();
		if ($All_Messages) {
		DB:: table( 'tblmessages' )->where('project_id','=',$id) -> update( array( 'admin_view' => 1 ));
		}

		return View('admin.quote.allmessages',compact('All_Messages','Project_Details'));

	}

	public function NewMessage () {

		if (isset($_POST['Reply'])) {
			//print_r($_POST); die;
			$status = 0;
			$replied = array (	'replied_by' => Auth::user()->id,
								'replied_at' =>  date('Y-m-d H:i:s',time()),
								'checked_by' => Auth::user()->id,
								'checked_at' =>  date('Y-m-d H:i:s',time()),
								'admin_view' => 1,
								'status' => 2,
						);

			DB::table('tblmessages')
			->where('msg_id', $_POST['msg_id'])
            ->update($replied);

		} else {
			$status = 1;
		}

		$data = array (	'client_id' => $_POST['client_id'],
						'project_id' => $_POST['project_id'],
						'sender_id' => Auth::user()->id,
						'message' => $_POST['message'],
						'admin_view' => 1,
						'status' => $status,
						'created_at' => date('Y-m-d H:i:s',time()),
						);

		if (!empty($_POST['message'])) {
			$Add_Messages = DB::table('tblmessages')->insert($data);
			Session::flash('message', 'Bericht is succesvol geplaatst..!');
			if ($_POST['redirect'] == 1) {
			return redirect('admin/Berichten');
			} else {
			return redirect('admin/view_Berichten/'.$_POST['msg_id']);
			}

		} else {
		Session::flash('error', 'Bericht invoegfout..!');
			return redirect('admin/Berichten');

		}

	}

	public function ProjectByContact () {

		$Projects = DB::table('tblproject')->orderBy('created_at','DESC')->where('Customer_id','=',$id)->get();
		$All_Messages = DB::table('tblmessages')->orderBy('created_at','DESC')->get();
		 //echo $All_Messages->message;
		//print_r($All_Messages);
		return View('admin.messages.project_messages',compact('All_Messages'));

	}


	public function AllMessage($id) {

		//$Project_Details = DB::table('tblquote')->where('id','=',$id)->first();
		$Get_Message = DB::table('tblmessages')->where('msg_id','=',$id)->first();


		$All_Messages = DB::table('tblmessages')->orderBy('created_at','DESC')
		->where(array('project_id' => $Get_Message->project_id,'client_id' => $Get_Message->client_id ))->get();

		/*print_r($All_Messages);
		die;*/


		if ($All_Messages) {
		DB:: table( 'tblmessages' )->where('project_id','=',$id) -> update( array( 'admin_view' => 1 ));
		}

		return View('admin.messages.allmessages',compact('All_Messages','Get_Message'));

	}


	public function CheckedBy($id,$chkid) {


		$Get_Message = DB::table('tblmessages')->where('msg_id','=',$id)->first();

		if ($Get_Message) {
		DB:: table( 'tblmessages' )->where('msg_id','=',$id) -> update( array('status' => 1, 'admin_view' => 1,'checked_by' => Auth::user()->id,'checked_at' => date('Y-m-d H:i:s',time())));
		}

		if ($chkid == 0) {
			Session::flash('message', 'Bericht met succes gecontroleerd..!');
			return redirect('admin/Berichten');
		} else {
			Session::flash('message', 'Bericht met succes gecontroleerd..!');
			return redirect('admin/view_Berichten/'.$Get_Message->msg_id);
		}
	}

	public function Destroy($id) {


		$Get_Message = DB::table('tblmessages')->where('msg_id','=',$id)->delete();

		Session::flash('message', 'Bericht is succesvol verwijderd..!');
		return redirect('admin/Berichten');

	}

	public function UpdateMessage () {
		//print_r($_POST);
		$data = array (	'client_id' => $_POST['client_id'],
						'project_id' => $_POST['project_id'],
						'sender_id' => Auth::user()->id,
						'message' => $_POST['message'],
						'admin_view' => 1,
						//'status' => $status,
						'created_at' => date('Y-m-d H:i:s',time()),
						);

		if (!empty($_POST['message'])) {
			DB::table('tblmessages')
			->where('msg_id', $_POST['msg_id'])
            ->update($data);

			Session::flash('message', 'Bericht is succesvol bijgewerkt..!');
			if ($_POST['redirect'] == 1) {
			return redirect('admin/Berichten');
			} else {

			return redirect('admin/view_Berichten/'.$_POST['msg_id']);
			}
		} else {
		Session::flash('error', 'Bericht Update fout..!');
			return redirect('admin/Berichten');

		}

	}



	public function loadData($id)
    {


		$Get_Message = DB::table('tblmessages')->where('msg_id','=',$id)->first();


		$All_Messages = DB::table('tblmessages')->orderBy('created_at','DESC')
		->where(array('project_id' => $Get_Message->project_id ))->limit(5)->get();


        return view('admin.messages.allmessages_ajax',compact('All_Messages','Get_Message'));
    }


	public function loadDataAjax(Request $request)    {
        $output = '';
        $id = $request->id;

        $Messages = Message::where('msg_id','<',$id)->orderBy('created_at','DESC')->limit(5)->get();

        if(!$Messages->isEmpty())
        {
            $counter=0;
			foreach($Messages as $message) {

							$counter++;
							@$GetProjectName = DB::table('tblproject')->where('Id',@$message->project_id)->first();
							$GetCustomerName = DB::table('tblcontact')->where('Id',$message->sender_id)->first();
							$GetCheckedBy = DB::table('users')->where('id',@$message->checked_by)->first();
							$GetRepliedBy = DB::table('users')->where('id',@$message->replied_by)->first();
							@$CheckedByName = $GetCheckedBy->name ? $GetCheckedBy->name : '';
							@$RepliedByName = $GetRepliedBy->name ? $GetRepliedBy->name : '';
							$GetSenderID = DB::table('users')->where('contact_id',@$message->sender_id)->first();
							 if (!empty($GetSenderID)) {
								$CustomerGroup = $GetSenderID->group;
							} else {
								$CustomerGroup = '';
							}
							//$class = ($counter % 2 === 0) ? 'inbox' : '';
							if (Auth::user()->id != $message->sender_id) { $float='right'; $inbox = 'inbox'; $margin = 'margin-left:730px';} else {$float='left'; $inbox = ''; $margin = 'margin-left:630px !important';}

                        $output .= '<div class="messages-item '.$inbox.'" style="margin-left: 39px;
    width: 1190px;">

                            <input type="hidden" id="msg_'.$message->msg_id.'" value="'.$message->message.'" />
                                   <input type="hidden" id="client_'.$message->msg_id.'" value="'.$message->client_id.'" />
                                   <input type="hidden" id="project_'.$message->msg_id.'" value="'.$message->project_id.'" />
								    <input type="hidden" id="ProjectName'.$message->msg_id.'" value="'.@$GetProjectName->Name.'" />
                   <input type="hidden" id="ClientName'.$message->msg_id.'" value="'.@$GetCustomerName->Firstname.' '.@$GetCustomerName->Lastname.'" />';
				            if (!$GetCustomerName) {
                            $output .= '<div class="sender" style="float:'.$float.';margin-top: 12px; margin-right:-10px; font-weight:bold">'.Auth::user()->name.'</div>';

                                } else {
                                $output .= '<div class="sender" style="float:'.$float.';margin-top: 12px;margin-left: -32px;font-weight:bold">'. $GetCustomerName->Firstname.'</div>';
                                 }
                                $output .= '<div class="messages-item-text">'.$message->message.'</div>
                                <div class="messages-item-date">'.date('j M, Y H:i:s',strtotime($message->created_at)).'
                                <span style=" '.$margin.'">';
                                if (empty($CheckedByName)) {
                                $output .= '<a href="'.URL:: to( "admin/CheckedMessage/".$message->msg_id,1).'" class="btn btn-warning">Gezien</a>';
                                } else {
								$output .= 'Gezien : '.$CheckedByName.'  &nbsp;	'.date('j M, Y H:i:s',strtotime($message->checked_at));
								}
                                if (empty($RepliedByName) && $CustomerGroup ==  1) {
                                $output .= '<a data-toggle="modal" href="#" onclick="Reply('.$message->msg_id.')" title="Beantwoord" class="btn btn-success">
								Beantwoord</a>';
								} if (Auth::user()->group == 0 && $message->sender_id != $message->client_id) {
                               $output .= ' <a  data-toggle="modal" href="#" onclick="Edit('.$message->msg_id.')" title="Bewerk" class="btn btn-success">
                                Bewerk</a>';
                                 } else {
								$output .= '&nbsp; Beantwoord : '.$RepliedByName.'  &nbsp;	'.date('j M, Y H:i:s',strtotime($message->replied_at));
								}
                               $output .= '</span>
                                </div>
                                </div>
                            </div>';

                             }

				}
             if (!empty($message->msg_id)) {
            $output .= '<div id="remove-row">
                            <button id="btn-more" data-id="'.$message->msg_id.'" class="btn btn-primary col-lg-4 col-sm-offset-4" > Oude berichten </button>
                        </div>';
			 }
            echo $output;
        }
    //}







}
