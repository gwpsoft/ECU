<?php

namespace App;
use Validator;
use DB;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    //
	public $table = "tbl_employee_planing";

	protected $fillable = [ 'week_no', 'department_id', 'project_id', 'employee'];

	public function scopeget() {

		$result = DB::table('tbl_planing')->select('*')->get();
		return $result;
		}


	public function GetAll() {

		return DB::table('tbl_planing')->orderBy('id','DESC')->get();
	}


	public function GetProjectsByWeek($week_no) {

	//,w.date,p.Name Project, w.week_no
	return $results = DB::select( DB::raw("SELECT distinct w.project_id,p.Name Name,w.week_no,d.Name as Dept_Name
	from  tbl_planing w
					  JOIN tblproject p
					  ON w.project_id = p.Id
					  LEFT JOIN tbldepartment d
                        ON p.Department_Id = d.Id
	  where week_no = '".$week_no."' order by d.Name ASC"));

	}



	public function GetProjectsByDate($date) {

	 $date = date('Y-m-d',strtotime($date));
	/*echo "SELECT distinct w.project_id,p.Name Name,w.week_no,w.date,w.id as plan_id
	from  tbl_planing w
					  JOIN tblproject p
					  ON w.project_id = p.Id
	  where date = '".$date."'";


	die;*/

	//,w.date,p.Name Project, w.week_no
	return $results = DB::select( DB::raw("SELECT distinct w.project_id,p.Name Name,w.week_no,w.date,w.id as plan_id,d.Name as Dept_Name
	from  tbl_planing w
					  JOIN tblproject p
					  ON w.project_id = p.Id
					   LEFT JOIN tbldepartment d
                        ON p.Department_Id = d.Id
	  where date = '".$date."' order by d.Name ASC"));

	}





	function GetEmployees ($project_id,$week_no,$plan_id, $date) {
		//w.week_no = '".$week_no."' and w.project_id = '".$project_id."' and
	// 	return $results = DB::select( DB::raw("SELECT w.id,w.week_no,w.project_id,w.employee_id,w.status,w.group,w.Geschikt,w.Notes as p_notes,p.Lastname,p.Firstname,p.Notes as Notes
	// from  tbl_planing_employee w
	// 				  JOIN tblemployee p
	// 				  ON w.employee_id = p.id
	//   where  w.plan_id = '".$plan_id."' and w.project_id = '".$project_id."' and w.week_no = '".$week_no."' order by p.Firstname ASC"));

	$results = DB::select( DB::raw("SELECT w.id,w.week_no,w.project_id,w.employee_id,w.status,w.group,w.Geschikt,w.Notes as p_notes,p.Lastname,p.Firstname,p.Notes as Notes
from  tbl_planing_employee w
					JOIN tblemployee p
					ON w.employee_id = p.id
	where  w.plan_id = '".$plan_id."' and w.project_id = '".$project_id."' and w.week_no = '".$week_no."' order by p.Firstname ASC"));

		foreach ($results as $key => $result) {
			$total_time = DB::table('tbl_pln_emp_attendence')
									->where('date_in', $date)
									->where('project_id', $project_id)
									->where('employee_id', $result->employee_id)
									->select('total_time', 'approved_by_supervisor')
									->get();

			if($total_time) {
				$result->total_time = $total_time[0]->total_time;
				$result->approved_by_supervisor = $total_time[0]->approved_by_supervisor ? 'Ja' : 'Nee';

			} else {
				$result->total_time = 0;
				$result->approved_by_supervisor = 'Nee';
			}
		}

		// dd($results);
		return $results;

		}

	public function GetAllProjects ($project) {

		if (!empty($project)) {

			return DB::select('select id, Name from `tblproject` where id NOT IN ('.$project.') ORDER BY `Name` ASC');
		} else {
			return DB::select('select id, Name from `tblproject`  ORDER BY `Name` ASC');
		}
	}
	public function GetActiveProjects () {

				return DB::select('select id, Name from `tblproject` where Active = 1  ORDER BY `Name` ASC');

	}


	public function GetAllPEmployees () {

		return DB::select('select id, Firstname, Lastname from `tblemployee` where Active = 1  ORDER BY `Firstname` ASC');

	}

	public function DepartmentByProject($Pro_ID) {


		return $results = DB::select( DB::raw("SELECT
                    p.Name Project,
					p.Department_Id,
					d.Name as Dept_Name
                   FROM
                    tblproject p
					LEFT JOIN tbldepartment d
                    ON p.Department_Id = d.Id
						 where p.Id = '".$Pro_ID."'"));
	}

}
