<?php

namespace App\Http\Controllers;

use App\Employmentagency;
use App\Tblemployee;
use App\Http\Requests\CreateTblemployeeRequest;
use Request;
use Session;
use Validator;
use DB;
use PDF;
use Input;


use App\Http\Controllers\Controller;

class ApplicantController extends Controller
{
    //
	
	public function create()
	{
		/* if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }*/
		$data = Employmentagency::get();
		
   	return view('front.applicant',compact('data'));
	}
	
	public function store()
	{
		
		/* if (empty(Session::get('front_email'))) {
			return redirect('login'); 
		 }*/
		/*echo '<pre>';
		print_r($_POST);
		die;*/
		
		$Applicant = array (
					'Surname' => Input::get('Surname'),
					'FirstName' => Input::get('FirstName'),
					'Adress' => Input::get('Adress'),
					'Postcode' => Input::get('Postcode'),
					'place' => Input::get('place'),
					'Birthday' => Input::get('Birthday'),
					'BSN_nummer' => Input::get('BSN_nummer'),
					'Age' => Input::get('Age'),
					'Marital_status' => Input::get('Marital_status'),
					'Nationality' => Input::get('Nationality'),
					'Health_insurance' => Input::get('Health_insurance'),
					'Bank_Ac_Number' => Input::get('Bank_Ac_Number'),
					'Health_insurance_number' => Input::get('Health_insurance_number'),
					'Mobiel_no' => Input::get('Mobiel_no'),
					'phone' => Input::get('phone'),
					'available_at' => Input::get('available_at'),
					'Dutch_proficiency' => Input::get('Dutch_proficiency'),
					'VCA_certificate' => Input::get('VCA_certificate'),
					'Willingness_to_achieve' => Input::get('Willingness_to_achieve'),
					'Within_3_months' => Input::get('Within_3_months'),					
					'own_expense' => Input::get('own_expense'),
					'License' => Input::get('License'),
					'Own_car' => Input::get('Own_car'),
					'Training_and_qualifications_1' => Input::get('Training_and_qualifications_1'),
					'Training_and_qualifications_2' => Input::get('Training_and_qualifications_2'),
					'Training_and_qualifications_3' => Input::get('Training_and_qualifications_3'),
					'Work_experience_1' => Input::get('Work_experience_1'),
					'Work_experience_2' => Input::get('Work_experience_2'),
					'Work_experience_3' => Input::get('Work_experience_3'),
					'Work_experience_4' => Input::get('Work_experience_4'),
					'Concrete_finishing' => Input::get('Concrete_finishing'),
					'Construction_Drawing_Reading' => Input::get('Construction_Drawing_Reading'),
					'Gates_Places' => Input::get('Gates_Places'),					
					'demolition_work' => Input::get('demolition_work'),
					'Concrete_Formwork' => Input::get('Concrete_Formwork'),
					'Use_of_machines' => Input::get('Use_of_machines'),
					'Isolate' => Input::get('Isolate'),
					'building_Scaffolding' => Input::get('building_Scaffolding'),
					'Building_Deliveries' => Input::get('Building_Deliveries'),
					'Glasbewassing' => Input::get('Glasbewassing'),	
					'To_lead' => Input::get('To_lead'),
					'Strut_and_stamping' => Input::get('Strut_and_stamping'),
					'Building_Cleaner' => Input::get('Building_Cleaner'),
					'Earth_work' => Input::get('Earth_work'),
					'Lich_carpentry' => Input::get('Lich_carpentry'),
					'Other_activities' => Input::get('Other_activities'),
					'zzp' => Input::get('zzp'),	
					'tarief' => Input::get('tarief'),
					'possession' => Input::get('possession'),
					'Date_Interview' => Input::get('Date_Interview'),
					'subject_Job' => Input::get('subject_Job'),
					'employment_agency' => Input::get('employment_agency'),
					'our_Feature' => Input::get('our_Feature'),
					'Starting_date' => Input::get('Starting_date'),
					'first_project' => Input::get('first_project'),
					'Emp_FirstName' => Input::get('Emp_FirstName'),
					'Emp_Surname' => Input::get('Emp_Surname'),
					'Emp_Nationality' => Input::get('Emp_Nationality'),
					'Emp_Name_and_initial' => Input::get('Emp_Name_and_initial'),
					'Emp_Deposit_Plaintiff_Vice_number' => Input::get('Emp_Deposit_Plaintiff_Vice_number'),
					'Emp_Street_Address' => Input::get('Emp_Street_Address'),
					'Emp_Postcode' => Input::get('Emp_Postcode'),
					'Emp_residence' => Input::get('Emp_residence'),
					'Emp_Country_and_region' => Input::get('Emp_Country_and_region'),
					'Emp_Birthday' => Input::get('Emp_Birthday'),
					'Emp_telephone' => Input::get('Emp_telephone'),
					'account_the_payroll_ja_tax' => Input::get('account_the_payroll_ja_tax'),
					'account_the_payroll_tax_ja_date' => Input::get('account_the_payroll_tax_ja_date'),
					'account_the_payroll_nee_tax' => Input::get('account_the_payroll_nee_tax'),
					'account_the_payroll_tax_nee_date' => Input::get('account_the_payroll_tax_nee_date'),
					'created_at' => date('Y-m-d h:i:s', time()),
					);
					
		DB::table('tblapplicants')->insert($Applicant);
		Session::flash('message', ' Aanvraagformulier ingediend .. !');
		return redirect('applicant');
	}
	
	
	
	
	
	
}
