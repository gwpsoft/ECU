<?php

namespace App\Http\Controllers\admin;
use Auth;
use Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Carbon\Carbon;


class HomeController extends Controller {

	public function index() {
//		 Auth::user()->isadmin();
//		//echo	Auth::user()->group;		 die;
//		if (Auth::user()->group == 0) {
//			return view('admin.dashboard');
//		} else {
//			return view('admin.emp_dashboard');
//		}
//2/9/2021
//        Auth::user()->isadmin();
//        $today = Carbon::now()->subDays(7);
//        $Pending_Services =  DB::table('tblorder_services')
//            ->join('tblproject', 'tblorder_services.project_name', '=', 'tblproject.Id')
//            ->select(
//                'tblproject.Name',
//                "tblorder_services.Aantal_Mensen",
//                "tblorder_services.Hoeveel_Dagen",
//                "tblorder_services.Status",
//                "tblorder_services.created_at",
//                "tblorder_services.id"
//            )->where("afgehandled", 0)->where('tblorder_services.created_at', '>=', $today)->orderby("tblorder_services.id", "desc")->get();
//        $tblordercontainer =  DB::table('tblordercontainer')
//            ->join('tblproject', 'tblordercontainer.project_name', '=', 'tblproject.Id', "left")
//            ->where("Status", 0)->where('tblordercontainer.created_at', '>=', $today)->get();
//        $Messages = DB::table('tblmessages')
//            ->where("Status", 0)->where('tblmessages.created_at', '>=', $today)->orderBy('created_at', 'DESC')->get();

        //   return response()->json($Messages);
        // return count($data);
        if (Auth::user()->group == 0) {
            return view('admin.dashboard');
        } else {
            return view('admin.emp_dashboard');
        }
	}
    public function getPersonalRequests()
    {
        Auth::user()->isadmin();
        $today = Carbon::now()->subDays(7);
        $Pending_Services =  DB::table('tblorder_services')
            ->join('tblproject', 'tblorder_services.project_name', '=', 'tblproject.Id')
            ->select(
                'tblproject.Name',
                "tblorder_services.Aantal_Mensen",
                "tblorder_services.Hoeveel_Dagen",
                "tblorder_services.Status",
                "tblorder_services.created_at",
                "tblorder_services.id",
                "tblorder_services.afgehandled"
            )->where("afgehandled", 0)->where('tblorder_services.created_at', '>=', $today)->orderby("tblorder_services.id", "desc")->get();
        $data ='';
        foreach($Pending_Services as $service)
        {
            $data .='<li class="list-group-item">
			<div class="todo-indicator bg-danger"></div>
			<div class="widget-content p-0">
				<div class="widget-content-wrapper">
					<div class="widget-content-left" style="margin-left:10px;">
						<!-- <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox3" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;</label></div> -->
					</div>
					<div class="widget-content-left flex2">
						<div class="widget-heading"><a href="plandata/' . $service->id . '" title="Afdrukken">'.$service->Name.'</a>
							<div class="badge badge-danger ml-2">'.($service->afgehandled ? ($service->afgehandled == 1) : "Open" ).'</div>
						</div>
						<div class="widget-subheading">Aantal mensen: <b>'.($service->Aantal_Mensen ? $service->Aantal_Mensen : "").'</b></div>
						<div class="widget-subheading">Hoeveel dagen: <b>'.($service->Hoeveel_Dagen ? $service->Hoeveel_Dagen : "0").'</b></div>
						<div class="widget-subheading">Date: <b>'.($service->created_at ? $service->created_at : "-").'</b></div>
					</div>
					<div class="widget-content-right"> <a href="./View_OrderServices/' . $service->id.'" class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-eye"></i></a>
						<a href="./Edit_OrderServices/' . $service->id.'" class="border-0 btn-transition btn btn-outline-primary"> <i class="fa fa-pencil"></i></a>
					</div>
				</div>
			</div>
		</li>';
        }
        echo $data;
        //return response()->json($Pending_Services);
    }
    public function getContainerRequest()
    {
        Auth::user()->isadmin();
        $today = Carbon::now()->subDays(7);
        $tblordercontainer =  DB::table('tblordercontainer')
            ->join('tblproject', 'tblordercontainer.project_name', '=', 'tblproject.Id', "left")
            ->where("Status", 0)->where('tblordercontainer.created_at', '>=', $today)->get();
        $data ='';
        foreach($tblordercontainer as $Order){
            $data.='<li class="list-group-item">
                <div class="todo-indicator bg-primary"></div>
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left" style="margin-left:10px;">
                            <!-- <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox3" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;</label></div> -->
                        </div>
                        <div class="widget-content-left flex2">
                            <div class="widget-heading">'.($Order->Name ? $Order->Name : "No project selected").'
                                <div class="badge badge-primary ml-2">'.($Order->Status ? ($Order->Status != 1) : "Open" ).'</div>
                            </div>
                            <div class="widget-subheading">Bestelnr #: <b>'.($Order->Nummer ? "BN-".$Order->Nummer : "").'</b></div>
                            <div class="widget-subheading">Execution date : <b>'.($Order->output_Date ? $Order->output_Date : "-").'</b></div>
                            <div class="widget-subheading">Order Date: <b>'.($Order->Order_Date ? $Order->Order_Date : "-").'</b></div>
                        </div>
                        <div class="widget-content-right"> <a href="./View_OrderWasteContainer/' . $Order->id.'" class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-eye"></i></a>
                            <a href="./Edit_OrderWasteContainer/' . $Order->id.'" class="border-0 btn-transition btn btn-outline-primary"> <i class="fa fa-pencil"></i></a>
                        </div>
                    </div>
                </div>
            </li>';}
        echo $data;

    }
    public function getMessages()
    {

        Auth::user()->isadmin();
        $today = Carbon::now()->subDays(7);
        $Messages = DB::table('tblmessages')
            ->where("Status", 0)->where('tblmessages.created_at', '>=', $today)->orderBy('created_at', 'DESC')->get();
        $data ='';
        foreach($Messages as $Message){
            $GetCustomerName = DB::table('tblcontact')->where('Id', $Message->client_id)->first();
            $data.='<li class="list-group-item">
			 <div class="todo-indicator bg-success"></div>
			 <div class="widget-content p-0">
				 <div class="widget-content-wrapper">
					 <div class="widget-content-left" style="margin-left:10px;">
						 <!-- <div class="custom-checkbox custom-control"><input class="custom-control-input" id="exampleCustomCheckbox3" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox3">&nbsp;</label></div> -->
					 </div>
					 <div class="widget-content-left flex2">
						 <div class="widget-heading">'.($GetCustomerName ? $GetCustomerName->Firstname : "" ). ' ' . ($GetCustomerName ? $GetCustomerName->Lastname:"No Detail Found").' <div class="badge badge-success ml-2">'.($Message->status ? ($Message->status != 1) : "New" ).'</div>
						 </div>
						 <div class="widget-subheading">Berichten: <b>'.($Message->message ? $Message->message : "-").'</b></div>
						 <div class="widget-subheading">Send Date : <b>'.($Message->created_at ? $Message->created_at : "-").'</b></div>

					 </div>
					 <div class="widget-content-right"> <a href="./view_Berichten/' . $Message->msg_id.'" class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-eye"></i></a>
					 </div>
				 </div>
			 </div>
		 </li>';}
        echo $data;

    }
	public function login(){

		return view('admin.user.login');
	}

	public function logout() {

		Auth::logout();
		return redirect()->intended('admin')->with('success', 'you have successfully logout..!');
	}


	public function checklogin (Request $request) {
		//, 'group' => 0
        if ($request->email == "" || $request->password == "") {
            return redirect('admin')->with('error', 'Kindly enter Email and Password..!');
        } else {
            $user = array('email' => $request->email, 'password' => $request->password);

            if (Auth::attempt($user)) {
                if (Auth::user()->group == 0) {
                    return redirect()->intended('admin/dashboard');
                    //return view('admin.dashboard');
                } else {
                    return redirect()->intended('admin/emp_dashboard');
                    //return view('admin.emp_dashboard');
                }
            } else {
                return redirect('admin')->with('error', 'Invalid Email or Password..!');
            }
        }
	}

	/* Mobile API Code starts here*/
	/*public function checkloginapp (Request $request) {

		$user = array ('email' => $request->email, 'password' => $request->password, 'group' => 1);

		if (Auth::attempt($user)) {
					//return Auth::user();
		$data = DB::table('users')
		->join('tblproject', 'users.contact_id', '=', 'tblproject.Customer_id' , 'inner')
		->select('users.contact_id','users.name','users.email','tblproject.id as Project_ID','tblproject.Name as Project_Name')
		->where('users.email', $request->email)->get();






		$user_info = $data;


			return json_encode(array('status'=> 1,'user_info' => $user_info));
		}

		else {

		$user_info = array('status' => 0);

			return json_encode($user_info);
		}
	}*/

	public function checkloginapp (Request $request) {

		$user = array ('email' => $request->email, 'password' => $request->password, 'group' => 1);

		if (Auth::attempt($user)) {
					//return Auth::user();
		$data = DB::table('users')->select('*')->where('users.email', $request->email)->first();
		$CustomerID = $data->contact_id;

		/*$data = DB::table('users')
		->join('tblproject', 'users.contact_id', '=', 'tblproject.Customer_id' , 'inner')
		->select('users.contact_id','users.name','users.email','tblproject.id as Project_ID','tblproject.Name as Project_Name')
		->where('users.email', $request->email)->get();*/


		$Projects = DB::select( DB::raw("SELECT * FROM tblproject WHERE Active = '1' and ProjectTO REGEXP '$CustomerID'") );
		$user_info = $data;


			// return json_encode(array('status'=> 1,'user_info' => $user_info,'Projects' => $Projects));
			return response() -> json([
				'status' => 1,
				'user_info' => $user_info,
				'Projects' => $Projects
			], 200);
		}

		else {

		// $user_info = array('status' => 0);
		//
		// 	return json_encode($user_info);

			return response() -> json([
				'status' => 0,
			], 200);

		}
	}





	/*Mobile API Code Ends here*/

	public function pagenotfound() {

		return view('admin.errors.503');


	}



	public function version(Request $request) {

		if ($request->Save) {

			$update = array (
							'android'=> $request->android,
							'iphone'=> $request->iphone,
						);

			DB::table('tbl_version')
            ->where('id',$request->id)
            ->update($update);

			Session::flash('message', 'Version Updated !');
			return redirect('admin/version');
		}



		$version = DB::table('tbl_version')->first();
		if ($request->source == 'ecuversion') {

			return json_encode(array('status' => 1, 'ver_info'=> $version ));

			}



		//print_r($version); die;
		return view('admin.version',compact('version'));
		}




}
