<?php

namespace App\Http\Controllers\admin;

use App\Functie;
use App\Planning;
use App\Customers;
use App\Contact;
use App\Department;
use App\Projectmanager;
use App\Shippingcompany;
use App\Weekcard;
use App\Note;
use App\Http\Requests\ProjectsRequest;
use Illuminate\Http\Request as Requests;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use DB;
use Input;
use Datatables;
use PDF;

class PlanningController extends Controller
{
    //
	 public function getplanning()  {


		 $planning_model = new Planning();
		 //$AllProjects = $planning_model->GetAllProjects ('');
		 $activeprojects = $planning_model->GetActiveProjects ('');

		 //dd($activeprojects);


		return View('admin.planning.planning_ajax',compact('AllProjects','activeprojects'));
		//return View('admin.planning.create');
    }


	public function EditEmply ($EmpID) {


		$Functie = Functie::orderBy('name','ASC')->get();
		$Employee = DB::table('tbl_planing_employee')->where('id', $EmpID)->first();
		$planning_model = new Planning();
		$AllEmployees = $planning_model->GetAllPEmployees ();
		return View('admin.planning.edit',compact('Employee','AllEmployees','Functie'));

	}

	public function PlanningByDate ($Date=0) {

		if (!empty($Date)){
		$Date = date('Y-m-d', strtotime($Date));
		} else {
		$Date = date('Y-m-d');
		}
		//echo $Date; die;
		//$Date = '2018-02-28';
		//$Functie_model = new Functie();

		$Functie = Functie::orderBy('name','ASC')->get();

		$planning_model = new Planning();
		$ProjectsDtl = $planning_model->GetProjectsByDate ($Date);
		/*echo '<pre>';
		print_r($ProjectsDtl); die;*/
        $requests = [];
        foreach($ProjectsDtl as $PRO){
            $ordersServices = $users = DB::table('tblorder_services')
                ->join('tblproject', 'tblproject.id', '=', 'tblorder_services.project_name')
                ->select('tblorder_services.*', 'tblproject.Name as Projects_Name')
                ->where("project_name",$PRO->project_id)
                ->where("Begindatum",$Date)->get();
            // $ordersServices->Projectsssss = $ProjectsDtl;
            $requests []= $ordersServices;
        }
//        return $requests;
		if (@$ProjectsDtl) {
			$proj = '';
		 foreach($ProjectsDtl as $to)
		  {
		 $proj .= $to->project_id.","; //exit;
		  }
		  $proj = trim($proj, ",");
		  @$Project = $proj;
		}
		if (!empty($Project)) {
			$pln_Project = $Project;
		} else {
			$pln_Project = '';
		}

		$AllProjects = $planning_model->GetAllProjects ($pln_Project);

		$AllEmployees = $planning_model->GetAllPEmployees ();


		$seachDate  = date("Y-m-d", strtotime($Date));
		$duplicates = DB::select('select pe.employee_id, count(pe.employee_id) from tbl_planing_employee pe
											where pe.date = :DATE
											GROUP BY pe.employee_id
											HAVING count(pe.employee_id) > 1', ['DATE' => $seachDate]);
		$duplicateIDs = [];

		foreach ($duplicates as $key => $dup) {
			array_push($duplicateIDs, $dup->employee_id);
		}

		// dd($duplicateIDs);

		return View('admin.planning.create',compact('ProjectsDtl','AllProjects','AllEmployees','Functie', 'Date', 'duplicateIDs','requests'));
		}

		public function checkUserIsFree(Requests $request) {
			$Date = date('Y-m-d', strtotime($request->date));

			$record = DB::table('tbl_planing_employee')
										->where('date', '=', $Date)
										->where('employee_id', '=', $request->empID)
										->count();

			return $record;
		}


	public function CopyPlan () {

		$Date = Input::get('date'); //date('Y-m-d');

		$copy_todate = Input::get('copy_todate'); //date('Y-m-d');

		$CopyWeekNo = date('YW',strtotime($copy_todate));

		 	$planning_model = new Planning();
			$ProjectsDtl = $planning_model->GetProjectsByDate ($Date);

			$CheckExistinfRecord = DB::table('tbl_planing')->where('date', date('Y-m-d',strtotime($copy_todate)))->first();

			if (!empty($CheckExistinfRecord)) {


				Session::flash('error', ' Er bestaan ​​al records!');
				return redirect('admin/PlanningByDate/'.$copy_todate);

			} else {


		  //print_r($ProjectsDtl);

		  foreach ($ProjectsDtl as $proj){

			  $InsertPlan = array(
			  					'week_no' => $CopyWeekNo,
								'project_id' => $proj->project_id,
								'date'=> 	$copy_todate,
								'created_at' => date('Y-m-d H:i:s')
		 					);

				$Plan_ID = DB::table('tbl_planing')->insertGetId($InsertPlan);
				$GetEmployees = $planning_model->GetEmployees ($proj->project_id,$proj->week_no,$proj->plan_id, $Date);

			  foreach ($GetEmployees as $emp){


				  $plan_emp= array (
						'plan_id' => $Plan_ID,
						'week_no' =>$CopyWeekNo,
						'project_id' => $emp->project_id,
						'employee_id' => $emp->employee_id,
						'Geschikt' => $emp->Geschikt,
						'status' => $emp->status,
						'group' => $emp->group,
						'Notes' => $emp->Notes,
						'date'=> 	$copy_todate,
						'created_at' => date('Y-m-d H:i:s')
						);
						DB::table('tbl_planing_employee')->insertGetId($plan_emp);
				  }
			 }
		}
	Session::flash('message', 'Planning succesvol gekopieerd!');
	return redirect('admin/PlanningByDate/'.$copy_todate);

		}



	function PlanPDF ($Date) {


		if (!empty($Date)){
		$Date = $Date;
		} else {
		$Date = date('Y-m-d');
		}
		//echo $Date; die;
		//$Date = '2018-02-28';
		$planning_model = new Planning();
		$ProjectsDtl = $planning_model->GetProjectsByDate ($Date);

		/*if (@$ProjectsDtl) {
			$proj = '';
		 foreach($ProjectsDtl as $to)
		  {
		 $proj .= $to->project_id.","; //exit;
		  }
		  $proj = trim($proj, ",");
		  @$Project = $proj;
		}
		if (!empty($Project)) {
			$pln_Project = $Project;
		} else {
			$pln_Project = '';
		}*/

		//$AllProjects = $planning_model->GetAllProjects ($pln_Project);

		//$AllEmployees = $planning_model->GetAllPEmployees ();



		$pdf= PDF::loadView('admin.planning.pdf', compact('ProjectsDtl','AllEmployees', 'Date'));
			return $pdf->download('planning.pdf');

		}


	function compact_view ($Date) {

		$Functie = Functie::orderBy('name','ASC')->get();
		//$Employee = DB::table('tbl_planing_employee')->where('id', $EmpID)->first();
		$planning_model = new Planning();
		$AllEmployees = $planning_model->GetAllPEmployees ();

		if (!empty($Date)){
			$Date = $Date;
		} else {
			$Date = date('Y-m-d');
		}
			$planning_model = new Planning();
			$ProjectsDtl = $planning_model->GetProjectsByDate ($Date);
		/*echo '<pre>';
		print_r($ProjectsDtl); die;*/

		if (@$ProjectsDtl) {
			$proj = '';
		 foreach($ProjectsDtl as $to)
		  {
		 $proj .= $to->project_id.","; //exit;
		  }
		  $proj = trim($proj, ",");
		  @$Project = $proj;
		}
		if (!empty($Project)) {
			$pln_Project = $Project;
		} else {
			$pln_Project = '';
		}


		$seachDate  = date("Y-m-d", strtotime($Date));
		$Date       = date("Y-m-d", strtotime($Date));
		$duplicates = DB::select('select pe.employee_id, count(pe.employee_id) from tbl_planing_employee pe
											where pe.date = :DATE
											GROUP BY pe.employee_id
											HAVING count(pe.employee_id) > 1', ['DATE' => $seachDate]);
		$duplicateIDs = [];

		foreach ($duplicates as $key => $dup) {
			array_push($duplicateIDs, $dup->employee_id);
		}


			$AllProjects = $planning_model->GetAllProjects ($pln_Project);

		//$AllEmployees = $planning_model->GetAllPEmployees ();
		return View('admin.planning.comp_view',compact('ProjectsDtl','AllProjects','AllEmployees','Functie', 'duplicateIDs', 'Date'));



		}





	function GetAllPlanningEmp () {

		$data =DB::table('v_planning')->select('*');

	 return Datatables::of($data)

	  ->addColumn('Opties' , function ($data) {
				return '<a href="PlanningByDate/'.$data->date.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="DelPlanByDate/'.$data->id.'_'.$data->date.'" title="verwijderen" class="widget-icon" onclick="deleteRecord();">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);
	}


	 public function saveProject(Request $request)
    {


		/*echo '<pre>';
		print_r($request->all());
		die;*/


		$date = Input::get('date');
		if (!empty($date)) {
		 	$WeekNo = date('YW',strtotime($date));
			$date = Input::get('date');
		} else {
			$WeekNo = date('YW',strtotime(date('Y-m-d')));
			$date = date('Y-m-d');
		}



		$Project_ID = Input::get('project_id');
		 $data = array (
		 				'week_no' =>$WeekNo,
						'date' => $date,
						'project_id' => $Project_ID,
						'created_at' => date('Y-m-d H:i:s')
		 );

		$Plan_ID = DB::table('tbl_planing')->insertGetId($data);

		return redirect('admin/PlanningByDate/'.$date);
    }

	public function saveEmplyoee () {

        if (Input::get('Id')) {
            if (Input::get('Done') == Input::get('plan_id')) {
                DB::table('tblorder_services')
                    ->where('id', Input::get('Id'))
                    ->update(['afgehandled' => "1"]);
                // return "AAAAA CHECK";
            }
        }
		 $date = Input::get('date'); //date('Y-m-d');
		 $WeekNo = date('YW',strtotime($date));
		$Project_ID = Input::get('project');
		$Plan_ID = Input::get('plan_id');
		$Emy_ID = Input::get('employee');
		$Geschikt = Input::get('Geschikt');
		$status = Input::get('status');
		$group = Input::get('group');
		$Notes = Input::get('Notes');
		$redirect = Input::get('redirect');

		$plan_emp= array (
						'plan_id' => $Plan_ID,
						'week_no' =>$WeekNo,
						'project_id' => $Project_ID,
						'employee_id' => $Emy_ID,
						'Geschikt' => $Geschikt,
						'status' => $status,
						'date' => $date,
						'Notes' => $Notes,
						'group' => $group,
						'created_at' => date('Y-m-d H:i:s')
		);
		DB::table('tbl_planing_employee')->insertGetId($plan_emp);
		Session::flash('message', ' Toegevoegd Personeel!');
			if ($redirect == 'compact') {
			return redirect('admin/Compact/'.$date);
			} else {
				return redirect('admin/PlanningByDate/'.$date);
			}
		}

	public function UpdatePlanEmp () {

		/*echo '<pre>';
		print_r($_POST);
		die;*/


		 $date = Input::get('date'); //date('Y-m-d');
		 $WeekNo = date('YW',strtotime($date));

		 $date2 = date('d-m-Y',strtotime($date));


		$Project_ID = Input::get('project');
		$Plan_ID = Input::get('plan_id');
		$Emy_ID = Input::get('employee');
		$Geschikt = Input::get('Geschikt');
		$status = Input::get('status');
		$group = Input::get('group');
		$Notes = Input::get('Notes');
		$id = Input::get('id');
		$compact = Input::get('compact');


		$plan_emp= array (
						//'plan_id' => $Plan_ID,
						'week_no' =>$WeekNo,
						'project_id' => $Project_ID,
						'employee_id' => $Emy_ID,
						'Geschikt' => $Geschikt,
						'status' => $status,
						'group' => $group,
						'Notes' => $Notes,
						'created_at' => date('Y-m-d H:i:s')
		);
		DB::table('tbl_planing_employee')
            ->where(array('id'=> $id))
            ->update($plan_emp);
		Session::flash('message', 'Bijgewerkt Personeel!');
		if ($compact == 'yes') {
			return redirect('admin/Compact/'.$date);
		} else {
			return redirect('admin/PlanningByDate/'.$date);
		}
		//DB::table('tbl_planing_employee')->insertGetId($plan_emp);
		//return redirect('admin/PlanningByDate/'.$date2);

		}


	public function delete($id) {

		if (!empty($id)) {

			$date = explode('_',$id);
			$data = DB::table('tbl_planing_employee')->where('id', $date[0])->delete();
			if ($data > 0) {
				Session::flash('message', 'Verwijderde Personeel!');
				return redirect('admin/PlanningByDate/'.$date[1]);
			}
		} else {
				return redirect('admin/404');
		}

	}

	public function del($id) {

		if (!empty($id)) {

			$date = explode('_',$id);
			$data = DB::table('tbl_planing_employee')->where('id', $date[0])->delete();
			if ($data > 0) {

				echo 'Deleted Successfully..!';
				//Session::flash('message', ' Verwijderde Personeel!');
				//return redirect('admin/PlanningByDate/'.$date[1]);
			}
		} else {
				return redirect('admin/404');
		}

	}




	public function DelProjByDate($id) {

		if (!empty($id)) {

			$date = explode('_',$id);
			$data = DB::table('tbl_planing_employee')->where(array('date'=> date('Y-m-d',strtotime($date[1])),'project_id'=>$date[0]))->delete();
			$data = DB::table('tbl_planing')->where(array('date'=> date('Y-m-d',strtotime($date[1])),'project_id'=>$date[0]))->delete();
			if ($data > 0) {
				Session::flash('message', ' Planning van geslecteerde datum is verwijderd!');
				return redirect('admin/PlanningByDate/'.$date[1]);
			}
		} else {
				return redirect('admin/404');
		}

	}


	public function DelPlanByDate($id) {

		if (!empty($id)) {

			$date = explode('_',$id);
			 DB::table('tbl_planing_employee')->where(array('date'=> date('Y-m-d',strtotime($date[1])) ))->delete();
			$data = DB::table('tbl_planing')->where(array('date'=> date('Y-m-d',strtotime($date[1]))))->delete();
			if ($data) {
				Session::flash('message', ' Planning van geslecteerde datum is verwijderd');
				return redirect('admin/Planning/');
			}
		} else {
				return redirect('admin/404');
		}

	}

    public function plandata($id)
    {
        $V_orders = DB::table('tblorder_services')->select('*')->find($id);
        if ($V_orders) {
            $date = $V_orders->Begindatum;
            if (!empty($date)) {
                $WeekNo = date('YW', strtotime($date));
                $date = $V_orders->Begindatum;
            } else {
                $WeekNo = date('YW', strtotime(date('Y-m-d')));
                $date = date('Y-m-d');
            }



            $Project_ID = $V_orders->project_name;
            $count = DB::table('tbl_planing')
                ->where("week_no", $WeekNo)
                ->where("date", $date)
                ->where("project_id", $Project_ID)
                ->get();
            // return count($count);
            if (count($count) == 0) {

                $data = array(
                    'week_no' => $WeekNo,
                    'date' => $date,
                    'project_id' => $Project_ID,
                    'created_at' => date('Y-m-d H:i:s')
                );

                $Plan_ID = DB::table('tbl_planing')->insertGetId($data);
                $Done = $Plan_ID;
            } else {

                $Done = $count[0]->id;
            }

            return redirect('admin/PlanningByDate/' . $date)->with("Done", $Done)->with("Id", $id);
        }        //return response()->json($V_orders);
    }


}
