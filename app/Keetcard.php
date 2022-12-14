<?php

namespace App;
use DB;
use Session;
use Mail;
use Validator;

use Illuminate\Database\Eloquent\Model;

class Keetcard extends Model
{
    protected $table = 'tblkeetcard';


	public function GetAll () {

		return $result = DB::select('select * from `tblweekcard` ORDER BY `Weeknumber` DESC limit 500');

		//return $result = DB::select('select * from `tblweekcard` where Weeknumber REGEXP "^(2017|2016|2015)" GROUP BY `tblweekcard`.`Weeknumber` ORDER BY `tblweekcard`.`Weeknumber` DESC ');
		//return DB::table('tblweekcard')->orderBy('Weeknumber','DESC')->get();
	}

	public function keetcardAttachments() {
		return $this->hasMany(KeetcardAttachment::class,'keetcard_id', 'id');
	}

	public function GetAllWeekByProject ($projectID) {

		return DB::table('tblweekcard')->where('Project_Id',$projectID)->orderBy('Weeknumber','DESC')->get();
	}

	public function GetAllProjects () {

		return DB::table('tblproject')->select('id', 'Name')->orderBy('Name','ASC')->get();
	}

	public function GetKeetcardDetails ($id) {

		return DB::table('tblkeetcard')->where('id',$id)->first();

	}

	public function GetAllEmployees () {

		return DB::table('tblemployee')->orderBy('Firstname','ASC')->where('Active',1)->get();
	}

	public function AddKeetTimeCard ($data) {

		DB::table('tbl_keet_timecard')->insert($data);
	}

	public function GetKeetTimeCards($id) {

		return DB::table('tbl_keet_timecard')->select('tbl_keet_timecard.*','tblemployee.*','tbl_keet_timecard.Notes as Notes', 'tbl_keet_timecard.id as id','tblemployee.Rate as Emp_Rate','tbl_keet_timecard.Rate as Rate')
		->join('tblemployee',  'tblemployee.id' , '=', 'tbl_keet_timecard.Employee_Id')
		->where('tbl_keet_timecard.Weekcard_Id',$id)->orderBy('tblemployee.Firstname','ASC')->get();
	}

	public function DeleteKeetTimeCards($id) {

		return DB::table('tbl_keet_timecard')->where('id',$id)->delete();
	}

	public function DeleteKeetcard($id) {

		return DB::table('tblkeetcard')->where('id',$id)->delete();
		//return DB::table('tbl_keet_timecard')->where('Weekcard_Id',$id)->delete();
	}

	public function GetKeetTimeCardWeekID($id) {

		return DB::table('tbl_keet_timecard')->where('id',$id)->first();
	}

	public function UpdateTimecard($data,$id) {

		return DB::table('tbltimecard')->where('id',$id) ->update($data);
	}

	public function UpdateKeetcard ($id,$data) {

		return DB::table('tblkeetcard')->where('id',$id) ->update($data);

	}

	public function GetTimeCardEmployeeByWeekID($id) {

		return $results = DB::select( DB::raw("SELECT
                  w.fr_Keeknumber,
					w.to_Keeknumber,
					w.Project_Id,
                    concat(e.Firstname,' ',e.Lastname) Name,
                    e.Id Employee_Id,
                    t.Employmentagency_Id Employmentagency_Id,
					t.Weekcard_Id weekcard_Id,
					t.Billable  Billable,
					t.weeknumber  weeknumber,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    sum(t.Mon) Mon,
                    sum(t.Tue) Tue,
                    sum(t.Wed) Wed,
                    sum(t.Thu) Thu,
                    sum(t.Fri) Fri,
                    sum(t.Sat) Sat,
                    sum(t.Sun) Sun,
                    t.Notes as Note,e.Sofinumber,e.Employmentagencynote Employmentagencynote
                FROM
                     tblkeetcard w
                    LEFT JOIN tbl_keet_timecard t
                        ON w.Id = t.Weekcard_Id
                  LEFT JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                WHERE
                   t.Weekcard_Id = '" . $id . "'
               GROUP BY
                    t.Id
                ORDER BY
                    e.Firstname ASC "));


		/*return DB::table('tbltimecard')->select('tbltimecard.*','tblemployee.*','tbltimecard.Notes as Notes', 'tbltimecard.id as id')
		->join('tblemployee',  'tblemployee.id' , '=', 'tbltimecard.Employee_Id')
		->where('tbltimecard.Weekcard_Id',$id)->orderBy('tblemployee.Firstname','ASC')->get();	*/



		//return DB::table('tbltimecard')->where(array('Weekcard_Id'=>$id))->get();
	}




	public function GetProjectsByWeek ($Week) {

		return $results = DB::select( DB::raw("SELECT
                    w.id as Week_id,
					w.Weeknumber,
                    p.Name Project,
					p.Department_Id,
					p.Address, p.City,
					d.Name as Dept_Name,
                    p.Id Project_Id FROM
                    tblweekcard w
					  JOIN tblproject p
                        ON w.Project_Id = p.Id
						JOIN tbldepartment d
                        ON p.Department_Id = d.Id
						 where w.Weeknumber = '".$Week."' order by d.Name ASC"));
	}



	 public function KeetWeekcardReportByID($id){



		  	return $results = DB::select( DB::raw("SELECT
										w.id,
                    w.fr_Keeknumber,
					w.to_Keeknumber,
					w.Notes,
					p.Customer_Ref,
					p.Project_Ref,
                    p.Name Project,
                    p.Id Project_Id,
                    concat(e.Lastname,', ',e.Firstname) Name,
                    e.Id Employee_Id,
                    ea.Name Employmentagency,
					ea.Address Employmentagency_address,
					ea.Zipcode Employmentagency_zipcode,
					ea.City Employmentagency_city,
					ea.Fax Employmentagency_fax,
					ea.Phone Employmentagency_fone,
					ea.Mobile1 Employmentagency_mobile,
					ea.Email Employmentagency_email,
					ea.Contact1 Employmentagency_contact,
                    t.Employmentagency_Id Employmentagency_Id,
					p.Name Project_name,
					p.Address Project_address,
					p.Zipcode Project_zipcode,
					p.City Project_city,
                    tc.FirstName contact_firstname,
                    tc.LastName contact_lastname,
                    tc.Phone contact_phone,
					tc.Mobile contact_mobile,
                    td.Name Department_Name,
					tc.Email contact_email,
					t.Weekcard_Id weekcard_Id,
					t.weeknumber Weeknumber,
					t.Billable  Billable,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(sum(t.Mon),2) Mon,
                    format(sum(t.Tue),2) Tue,
                    format(sum(t.Wed),2) Wed,
                    format(sum(t.Thu),2) Thu,
                    format(sum(t.Fri),2) Fri,
                    format(sum(t.Sat),2) Sat,
                    format(sum(t.Sun),2) Sun,
                    e.Sofinumber,e.Employmentagencynote Employmentagencynote
                FROM
                    tblkeetcard w
                    LEFT JOIN tbl_keet_timecard t
                        ON w.Id = t.Weekcard_Id
                   LEFT JOIN tblproject p
                        ON w.Project_Id = p.Id
                  LEFT JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                   LEFT JOIN tblemploymentagency ea
                        ON t.Employmentagency_Id = ea.Id
					LEFT JOIN tblcontact tc
                        ON p.Contact_Id = tc.id
					LEFT JOIN tbldepartment td
                        ON p.Department_Id = td.id

                WHERE
                   w.id = '" . $id . "%'
                GROUP BY
                    ea.Id
                ORDER BY
                    ea.Name,
                    e.Lastname"));

		  }

}
