<?php

namespace App;
use DB;
use Session;
use Mail;
use Validator;
use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    //


	public function TotalCurrentWeekReport() {


		return DB::table('tblweekcard')->orderBy('Weeknumber','DESC')->first();

	}



	public function OverviewWeek ($weeknumber,$billable) {

		$weeknumber = $this->_fixweeknumber($weeknumber);

		return $results = DB::select( DB::raw("SELECT
                    w.Weeknumber Name,
                    'none' Id,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate)),2) Rate,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate_Cost)),2) Cost,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate)) - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*(t.Rate_Cost)),2) Calculated
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                    JOIN tblprojectmanager pm
                        ON p.Projectmanager_Id = pm.Id
                WHERE
                    w.Weeknumber like '" . $weeknumber . "%'
                    AND t.Billable = '".$billable."'  GROUP BY
                 w.Weeknumber") );



		/*return DB::table('tblweekcard')
            ->join('tbltimecard', 'tblweekcard.id', '=', 'tbltimecard.Weekcard_Id')
            ->select('tblweekcard.id','tblweekcard.Weeknumber','tblweekcard.Project_Id', 'tbltimecard.id','tbltimecard.Weekcard_Id','tbltimecard.Employee_Id','tbltimecard.Mon','tbltimecard.Tue','tbltimecard.Wed','tbltimecard.Thu','tbltimecard.Fri','tbltimecard.Sat','tbltimecard.Sun','tbltimecard.Rate','tbltimecard.Rate_Cost','tbltimecard.Employmentagency_id')->where('tblweekcard.Weeknumber',$weeknumber)
            ->get();*/
		}

	public function getByEmployeeID ($Weeknumber) {

		$Weeknumber = $this->_fixweeknumber($Weeknumber);
		return $results = DB::select( DB::raw("SELECT
                    w.Weeknumber,
                    concat(e.Firstname,' ',e.Lastname) Name,
                    e.Id Employee_Id,
                    p.Name Project,
                    p.Id Project_Id,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate),2) Rate,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate) - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Calculated
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                WHERE
                    w.Weeknumber like '" . $Weeknumber . "%'
                    AND t.Billable = 1
                GROUP BY
                    e.Id
                ORDER BY
                    e.Lastname,
                    p.Name") ); //, p.Id
		}


	   public function employmentagencyReport($weeknumber , $specification = false){

		 $weeknumber = $this->_fixweeknumber($weeknumber);
		$sql_group = '';
        $sql_where = '';
        if ( false !== $specification) {
            $sql_group = ',e.Id';
            $sql_where = ' AND ea.Id=' . $specification;

        }



		  	return $results = DB::select( DB::raw("SELECT
                    w.Weeknumber,
                    p.Name Project,
                    p.Id Project_Id,
                    -- concat(e.Firstname,' ',e.Lastname) Name,
                    e.Id Employee_Id,
                        -- e.Cost individual_cost,
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
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(sum(t.Mon),2) Mon,
                    format(sum(t.Tue),2) Tue,
                    format(sum(t.Wed),2) Wed,
                    format(sum(t.Thu),2) Thu,
                    format(sum(t.Fri),2) Fri,
                    format(sum(t.Sat),2) Sat,
                    format(sum(t.Sun),2) Sun,
                    t.Notes,e.Sofinumber,e.Employmentagencynote Employmentagencynote
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                    JOIN tblemploymentagency ea
                        ON t.Employmentagency_Id = ea.Id
                WHERE
                    w.Weeknumber like '" . $weeknumber . "%'
                " . $sql_where . "
                GROUP BY
                    ea.Id
                " . $sql_group . "
                ORDER BY
                    ea.Name,
                    e.Lastname"));

		  }

                  public function specificEmploymentAgencyReport($weeknumber, $specification = false){

                          $weeknumber = $this->_fixweeknumber($weeknumber);
         		$sql_group = '';
                 $sql_where = '';
                 if ( false !== $specification) {
                     $sql_group = ',e.Id';
                     $sql_where = ' AND ea.Id=' . $specification;
                 }



         		  	return $results = DB::select( DB::raw("SELECT
                             w.Weeknumber,
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
                             format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                             format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                             format(sum(t.Mon),2) Mon,
                             format(sum(t.Tue),2) Tue,
                             format(sum(t.Wed),2) Wed,
                             format(sum(t.Thu),2) Thu,
                             format(sum(t.Fri),2) Fri,
                             format(sum(t.Sat),2) Sat,
                             format(sum(t.Sun),2) Sun,
                             t.Notes,e.Sofinumber,e.Employmentagencynote Employmentagencynote,
                             (select count(*) from tblemploymentagencynotes2 where Employmentagency_Id = $specification and Weeknumber = $weeknumber ) as records
                         FROM
                             tblweekcard w
                             JOIN tbltimecard t
                                 ON w.Id = t.Weekcard_Id
                             JOIN tblproject p
                                 ON w.Project_Id = p.Id
                             JOIN tblemployee e
                                 ON t.Employee_Id = e.Id
                             JOIN tblemploymentagency ea
                                 ON t.Employmentagency_Id = ea.Id
                         WHERE
                             w.Weeknumber like '" . $weeknumber . "%'
                         " . $sql_where . "
                         GROUP BY
                             ea.Id
                         " . $sql_group . "
                         ORDER BY
                             ea.Name,
                             e.Lastname"));


       		  }



	public function getProjectIDByGroup ($weeknumber) {

		$weeknumber = $this->_fixweeknumber($weeknumber);
		return $results = DB::select( DB::raw("SELECT
                    p.Name Name,
                    p.Id,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate),2) Rate,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate) - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Calculated
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id

                WHERE
                    w.Weeknumber like '" . $weeknumber . "%'
                    AND t.Billable = 1
                      GROUP BY
               p.Id") );
			   // JOIN tblprojectmanager pm
//                        ON p.Projectmanager_Id = pm.Id
		}

	public function getProjectManagerByGroup ($weeknumber) {

			$weeknumber = $this->_fixweeknumber($weeknumber);

		return $results = DB::select( DB::raw("SELECT
                    concat(pm.Lastname,', ',pm.Firstname) Name,
                    pm.Id,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate),2) Rate,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate) - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2)
					Calculated
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                    JOIN tblprojectmanager pm
                        ON p.Projectmanager_Id = pm.Id
                WHERE
                    w.Weeknumber like '" . $weeknumber . "%'
                    AND t.Billable = 1
                GROUP BY
               pm.Id") );
	}

	public function EmployeeOverView ($weeknumber) {

		$weeknumber = $this->_fixweeknumber($weeknumber);

		return $results = DB::select( DB::raw("SELECT
                    w.Weeknumber,
                    concat(e.Lastname,', ',e.Firstname) Name,
                    e.Id Employee_Id,
                    p.Name Project,
                    p.Id Project_Id,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate),2) Rate,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate) - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2)
					Calculated
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                WHERE
                    w.Weeknumber like '" . $weeknumber . "%'
                    AND t.Billable = 1
                GROUP BY
                    e.Id
                ORDER BY
                    e.Lastname,
                    p.Name" ));
	}


	public function ProjectManagerOverView ($weeknumber) {

		$weeknumber = $this->_fixweeknumber($weeknumber);

		return $results = DB::select( DB::raw("SELECT
                    p.Name Name,
                  	concat(pm.Lastname,', ',pm.Firstname) ProjectManager,
                 w.id Weekstate,
                    p.Id,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate),2) Rate,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate) - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Calculated
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                    JOIN tblprojectmanager pm
                        ON p.Projectmanager_Id = pm.Id
                WHERE
                     w.Weeknumber like '" . $weeknumber . "%'
                    AND t.Billable = 1
                      GROUP BY
               p.Id" ) );

	}


	public function WeekcardOverviewCheck ($weeknumber) {

		$weeknumber = $this->_fixweeknumber($weeknumber);
		return $results = DB::select( DB::raw("SELECT
                    w.Id Weekcard_Id,
                    p.Name Project,
                    p.Id Project_Id,
                    format(sum(t.Mon),2) Mon,
                    format(sum(t.Tue),2) Tue,
                    format(sum(t.Wed),2) Wed,
                    format(sum(t.Thu),2) Thu,
                    format(sum(t.Fri),2) Fri,
                    format(sum(t.Sat),2) Sat,
                    format(sum(t.Sun),2) Sun,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Total_Hours,
                    Checked
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                WHERE
                    w.Weeknumber like '" . $weeknumber . "%'
                    AND t.Billable = 1
                GROUP BY
                    w.Id
                ORDER BY
                    p.Name" ) );
		}

		public function Project_Overview_Containers ($Project_Id,$startDate,$EndDate) {
		if ($Project_Id !=0){
		$where = " AND Project_Id = '" . $Project_Id . "' ";
		}
		else { $where = '';}
		if ($startDate !=0 && $EndDate !=0) {

		$Date = "AND Sent_Date BETWEEN '" . $startDate . "' AND '" . $EndDate . "'";
		}
		else { $Date = '';}


		return $results = DB::select( DB::raw("SELECT id, size,meterial, Project_Id FROM tblcontainerbon
		WHERE 1=1 ".$where. $Date. " GROUP BY meterial" ) );
		}


		public function Project_Overview_Containers_ByUsers ($Project_Id, $user_id,$startDate,$EndDate) {
		if ($Project_Id !=0){
		$where = " AND Project_Id = '" . $Project_Id . "' ";
		}
		else { $where = '';}
		if ($startDate !=0 && $EndDate !=0) {

		$Date = "AND Sent_Date BETWEEN '" . $startDate . "' AND '" . $EndDate . "'";
		}
		else { $Date = '';}

		return $results = DB::select( DB::raw("SELECT tblcontainerbon.id as con_id, size,meterial, Project_Id FROM tblcontainerbon
		LEFT JOIN tblproject
ON tblcontainerbon.Project_Id=tblproject.id
		WHERE 1=1 ".$where.  $Date." AND tblproject.Customer_id = '".$user_id."' GROUP BY meterial" ) );
		}



	public function ProjectFixed_Overview () {

		return $results = DB::select( DB::raw("SELECT
                    p.Name Project,
                    p.Id Project_Id,
                    format(p.Fixed,2) Fixed,
                    format(sum(t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun),2) Hours,
                    format(sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Cost,
                    format(p.fixed - sum((t.Mon+t.Tue+t.Wed+t.Thu+t.Fri+t.Sat+t.Sun)*t.Rate_Cost),2) Calculated
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                WHERE
                    t.Billable = 0
                GROUP BY
                    p.Id
                ORDER BY
                    p.Active Desc,
                    p.Id Desc" ) );
		}


		public function ExpiredEmployee() {

			return $results = DB::select( DB::raw("SELECT
                    *
                FROM
                    tblemployee w

                WHERE
                    w.Id_Expirationdate < now() + interval 1 month
				AND
					w.Id_Expirationdate > 0000-00-00
				AND
					Active = 1
                ORDER BY
                    w.Id_Expirationdate Desc" ) );

		}

		public function projecthistoryReport( $projectFilter = '') {

			 if ($projectFilter != '') {
			  if ( is_numeric($projectFilter) ) {
			$where = " AND p.Id = '" . $projectFilter . "'";
        } else {
			$where = " AND p.Name like '%" . $projectFilter . "%'";
        }
			 }

			return $results = DB::select( DB::raw("SELECT
                    e.Id Employee_Id,
                    concat(e.Lastname,', ',e.Firstname) Employee,
                    e.Active Employee_Active,
                    p.Name Name,
                    p.Id Project_Id,
                    p.Active Project_Active,
                    max(w.Weeknumber) Final_Week
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
					WHERE 1=1
                	" . @$where . "
                GROUP BY
                    p.Id, e.Id
                ORDER BY
                    p.Id,
                    e.Active Desc,
                    Final_Week Desc",MYSQLI_USE_RESULT ) );
		}

		public function employeehistoryReport( $employeeFilter = '') {

			 if ($employeeFilter != '') {
			   if ( is_numeric($employeeFilter) ) {
				$where = " AND e.Id = '" . $employeeFilter . "'";
       		   } else {
					$where = " AND concat(e.Lastname,', ',e.Firstname) LIKE '%" . $employeeFilter . "%'";
			     }
			 }

			return $results = DB::select( DB::raw("SELECT
                    e.Id Employee_Id,
                    concat(e.Lastname,', ',e.Firstname) Name,
                    e.Active Employee_Active,
                    p.Name Project,
                    p.Id Project_Id,
                    p.Active Project_Active,
                    max(w.Weeknumber) Final_Week
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
				WHERE 1=1
					" . @$where . "
                GROUP BY
                    e.Id, p.Id
                ORDER BY
                    e.Active Desc,
                    e.Lastname,
                    p.Active Desc,
                    p.Name",MYSQLI_USE_RESULT ) );
		}

		/*return DB::table('tblweekcard')
		->join('tblproject',  'tblweekcard.Project_Id' , '=', 'tblproject.id')
		->join('tbltimecard', 'tblweekcard.id', '=', 'tbltimecard.Weekcard_Id')
		->select('tblweekcard.Project_Id','tblproject.Name','tblproject.Projectmanager_Id','tblweekcard.id','tblproject.Name','tbltimecard.Weekcard_Id','tbltimecard.Employee_Id','tbltimecard.Mon','tbltimecard.Tue','tbltimecard.Wed','tbltimecard.Thu','tbltimecard.Fri','tbltimecard.Sat','tbltimecard.Sun','tbltimecard.Rate','tbltimecard.Rate_Cost','tbltimecard.Employmentagency_id')->groupBy('tblproject.Projectmanager_Id')->where('tblweekcard.Weeknumber',$Weeknumber)->get();*/



		/*return DB::table('tblweekcard')
		->join('tblproject',  'tblweekcard.Project_Id' , '=', 'tblproject.id')
		->select('tblweekcard.Project_Id','tblproject.Name','tblproject.Projectmanager_Id')->groupBy('tblproject.Projectmanager_Id')->where('tblweekcard.Weeknumber',$Weeknumber)->get();


		}*/

	/*public function GetprojectByProjectManager($Weeknumber,$Project_Id) {

		return DB::table('tblweekcard')
		->join('tblproject',  'tblweekcard.Project_Id' , '=', 'tblproject.id')
		 ->join('tbltimecard', 'tblweekcard.id', '=', 'tbltimecard.Weekcard_Id')
		->select('tblweekcard.Project_Id','tblweekcard.id','tblproject.Name','tbltimecard.Weekcard_Id','tbltimecard.Employee_Id','tbltimecard.Mon','tbltimecard.Tue','tbltimecard.Wed','tbltimecard.Thu','tbltimecard.Fri','tbltimecard.Sat','tbltimecard.Sun','tbltimecard.Rate','tbltimecard.Rate_Cost','tbltimecard.Employmentagency_id')->where(array('tblweekcard.Weeknumber'=> $Weeknumber,'tblproject.id'=> $Project_Id))->get();
		}



	public function OverviewWeekByproject ($Project_Id,$Weeknumber) {

		return DB::table('tblweekcard')
            ->join('tbltimecard', 'tblweekcard.id', '=', 'tbltimecard.Weekcard_Id')
            ->select('tblweekcard.id','tblweekcard.Weeknumber','tblweekcard.Project_Id', 'tbltimecard.id','tbltimecard.Weekcard_Id','tbltimecard.Employee_Id','tbltimecard.Mon','tbltimecard.Tue','tbltimecard.Wed','tbltimecard.Thu','tbltimecard.Fri','tbltimecard.Sat','tbltimecard.Sun','tbltimecard.Rate','tbltimecard.Rate_Cost','tbltimecard.Employmentagency_id')->where(array('tblweekcard.Project_Id'=> $Project_Id,'tblweekcard.Weeknumber'=>$Weeknumber) )
            ->get();
		}

	public function OverviewWeekByEmployee ($Employee_Id,$Weeknumber) {

		return DB::table('tblweekcard')
            ->join('tbltimecard', 'tblweekcard.id', '=', 'tbltimecard.Weekcard_Id')
            ->select('tblweekcard.id','tblweekcard.Weeknumber','tblweekcard.Project_Id', 'tbltimecard.id','tbltimecard.Weekcard_Id','tbltimecard.Employee_Id','tbltimecard.Mon','tbltimecard.Tue','tbltimecard.Wed','tbltimecard.Thu','tbltimecard.Fri','tbltimecard.Sat','tbltimecard.Sun','tbltimecard.Rate','tbltimecard.Rate_Cost','tbltimecard.Employmentagency_id')->where(array('tbltimecard.Employee_Id'=>$Employee_Id ,'tblweekcard.Weeknumber'=>$Weeknumber))
            ->get();
		}*/

	public function HoursOverviewCheck ($yearWeek){

		return $results = DB::select( DB::raw("SELECT
                    w.Id Weekcard_Id,
                    p.Name Project,
                    p.Id Project_Id,
                    concat(e.Lastname,', ',e.Firstname) Name,
                    e.Id Employee_Id,
                    t.Mon Mon,
                    t.Tue Tue,
                    t.Wed Wed,
                    t.Thu Thu,
                    t.Fri Fri,
                    t.Sat Sat,
                    t.Sun Sun,
                    Billable,
                    Checked
                FROM
                    tblweekcard w
                    JOIN tbltimecard t
                        ON w.Id = t.Weekcard_Id
                    JOIN tblproject p
                        ON w.Project_Id = p.Id
                    JOIN tblemployee e
                        ON t.Employee_Id = e.Id
                WHERE
                    w.Weeknumber like '" . $yearWeek . "%'
                ORDER BY
                    p.Name,
                    e.Lastname" ) );
		}



	 public function savenotes( $weeknumber, $id, $data )
    {


        foreach ( $data as $employee_id => $note ) {
            return $results = DB::select( DB::raw( "INSERT INTO
                        tblemploymentagencynotes
                    SET
                        Employmentagency_Id = '" . $id . "',
                        Weeknumber =    '" . $weeknumber . "',
                        Employee_Id =   '" . $employee_id . "',
                        Notes =         '" . trim($note) . "'
                    ON DUPLICATE KEY UPDATE
                        Notes =         '" . trim($note) . "'
            "));


        }
    }

	 public function getWeekNumber($weeknumber, $interval)
    {
        $year = substr($weeknumber,0,4);
        if ( strlen($weeknumber) > 4 ) {
            $weeknr = substr($weeknumber,4,2);
        } else {
            $weeknr = '00';
        }

        if ( $weeknr == '00' ) {
            $timeint = strtotime($interval . ' years', strtotime($year . '-01-01') );
            return date('Y',$timeint);
        } else {
            $timeint = strtotime($interval . ' weeks', self::getFirstDayOfWeek($year,$weeknr));
            return date('oW',$timeint);
        }
    }

	 public static function getFirstDayOfWeek($year, $weeknr)
    {
        $offset = date('w', mktime(0,0,0,1,1,$year));
        $offset = ($offset < 5) ? 1-$offset : 8-$offset;
        $monday = mktime(0,0,0,1,1+$offset,$year);
        if ( $weeknr == '00' ) {
            $weeknr = '01';
        }

        $result = strtotime('+' . ($weeknr - 1) . ' weeks', $monday);
        return $result;
    }

	 private function _fixweeknumber( $weeknumber )
    {
        if ( substr($weeknumber, -2) == '00' ) {
            $weeknumber = substr($weeknumber, 0,-2);
        }
        return $weeknumber;
    }

}
