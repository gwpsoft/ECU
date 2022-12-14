<?php

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*MOBILE API CODE STARTS HERE*/
Route::group(['prefix'=>'api'], function () {
Route::match(['get', 'post'],'admin','admin\HomeController@checkloginapp');
//Route::post('admin','admin\HomeController@checkloginapp');
Route::get('admin/services','admin\OrderServicesController@serviceslist');
Route::post('admin/newserviceorder','admin\OrderServicesController@store');
Route::post('admin/editserviceorder','admin\OrderServicesController@update');
Route::get('admin/containers','admin\OrderController@containerlist');
Route::get('admin/newcontainerorder','admin\OrderController@store');
Route::get('admin/editcontainerorder','admin\OrderController@update');
Route::post('admin/newmessage','admin\MessageController@newmobilemessage');
Route::get('admin/oldmessages','admin\MessageController@getconversation');

Route::get('admin/ContactByproject', function () {
	DB::enableQueryLog();
	$project_id = Input::get('project_id');
	$Project = DB::table('tblproject')->where('Id', $project_id)->first();

	$tblcontact_details = DB::table('tblcontact')->where('Department_Id', $Project->Department_Id)->get();


	/*$tblcontact_details = DB::table('tblcontact')
	->join('tblproject', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
	->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'inner')
	->select('tblcontact.*')
	->where('tblproject.Id',$project_id)->first();*/

	//dd(DB::getQueryLog());
	/*echo '<pre>';
	print_r($tblcontact_details); die;*/

	$user_info = array('status' => 1, 'ConatctInfo' => $tblcontact_details);

			return json_encode($user_info);


	//return Response:: json($tblcontact_details);
});








});
/*MOBILE API CODE ENDS HERE*/


/*MOBILE API CODE FOR EMPLOYEE STARTS HERE*/

Route::group([
    'namespace' => 'APIs',
    'prefix' => 'api/auth'

], function () {

		// AuthController
    Route::post('signin', 'AuthController@signin');
    Route::post('signinBySupervisor', 'AuthController@signinBySupervisor');
    Route::get('signout', 'AuthController@signout');
    Route::get('me', 'AuthController@me');
    Route::post('SetFcmToken', 'AuthController@setFCM');

		// EmployeeController
    Route::get('getEmployeePlanningHistory', 'EmployeeController@getEmployeePlanningHistory');
    Route::get('getEmployeePlanning', 'EmployeeController@getEmployeePlanning');
    Route::post('employeeCheckIn', 'EmployeeController@employeeCheckIn');
    Route::post('employeeCheckOut', 'EmployeeController@employeeCheckOut');

		// SupervisorController
    Route::get('getProjectsList/{contact_id}', 'SupervisorController@getProjectsList');
    Route::get('projectPlanning/{project_id}', 'SupervisorController@projectPlanning');
    Route::get('employees_list/{plan_id}', 'SupervisorController@employees_list');
    Route::get('checkEmployeeAttendance', 'SupervisorController@checkEmployeeAttendance');
		Route::post('approveEmployeeAttendance', 'SupervisorController@approveEmployeeAttendance');

		Route::get('getWeekwiseAttendance', 'SupervisorController@getWeekwiseAttendance');
		Route::post('fixHoursBySupervisor/{id}', 'SupervisorController@fixHoursBySupervisor');
	  Route::get('employeeWorkHoursApprovedBySupervisor/{id}', 'SupervisorController@employeeWorkHoursApprovedBySupervisor');
    Route::post('aprroveWeeklyAttendance', 'SupervisorController@aprroveWeeklyAttendance');
    Route::post('TESTAPPROVE', 'SupervisorController@TESTAPPROVE');


    // leaves
    Route::post('addleaves', 'leaves@addleave');
    Route::get('AllLeaves', 'leaves@all_leave');
//    Route::get('LeavesTypes', 'leaves@LeavesTypes');
    //Emp Profile
    Route::post('UpdateEmail', 'EmployeeController@SendEmail');
    Route::post('Verifytoken', 'EmployeeController@UpdateEmail');
    Route::post('ChangePassword', 'EmployeeController@ChangePassword');
    Route::post('ChangeName', 'EmployeeController@ChangeName');
    Route::get('WorkingHistory', 'EmployeeController@EmployeeWorkHistory');
    Route::post('GetProjectManager', 'EmployeeController@GetProjectManager');

});



/*MOBILE API CODE FOR EMPLOYEE ENDS HERE*/




Route::get('admin/version', 'admin\HomeController@version');
Route::get('admin/c_test_email', 'admin\ContactController@test_email');
// Start Admin
Route::get('admin', 'admin\HomeController@login') ;
Route::post('loginme', 'admin\HomeController@checklogin');
route:: get('admin/404','admin\HomeController@pagenotfound');
Route::group(['middleware' => 'auth'], function() {

	Route::get('admin/test_email','admin\OrderController@email_test');
// Dashboard

Route::post('admin/update_version', 'admin\HomeController@version');


Route::get('admin/createusers', 'HomeController@NewUsers');
Route::get('admin/users', 'admin\UserController@index');
Route::post('admin/ModuleRights', 'admin\UserController@ModuleRights');
Route::get('admin/delete_user/{id}', 'admin\UserController@delete');
Route::post('admin/UpdateUser', 'admin\UserController@Update');

Route::get('admin/AjaxGetModukeRights/{id}', 'admin\UserController@GetRights');

Route::get('admin/dashboard', 'admin\HomeController@index');
    Route::get('admin/getPersonalRequests', 'admin\HomeController@getPersonalRequests');
    Route::get('admin/getContainerRequest', 'admin\HomeController@getContainerRequest');
    Route::get('admin/getMessages', 'admin\HomeController@getMessages');
Route::get('admin/emp_dashboard', 'admin\HomeController@index');

Route::get('admin/logout', 'admin\HomeController@logout');
// Strat employeee
Route::get('admin/employees', 'admin\TblemployeeController@getemployee');
Route::get('admin/create_employee', 'admin\TblemployeeController@create');
Route::post('admin/tblemployee', 'admin\TblemployeeController@store');
Route::get('admin/employee/{id}', 'admin\TblemployeeController@show');
Route::get('admin/delete_employee/{id}', 'admin\TblemployeeController@delete');
Route::get('admin/edit_employee/{id}', 'admin\TblemployeeController@edit');
Route::get('admin/employeeWorkHistory/{id}', 'admin\TblemployeeController@EmployeeWorkHistory');
Route::get('admin/employeeWorkHistoryPDF/{id}', 'admin\TblemployeeController@EmployeeWorkHistoryPDF');
Route::post('admin/update_employee', 'admin\TblemployeeController@update');
Route::get('admin/AdvanceSearch', 'admin\TblemployeeController@AdvanceSearch');
Route::post('admin/AdvSearch', 'admin\TblemployeeController@AdvSearch');
Route::get('admin/ActiveEmp', 'admin\TblemployeeController@getActiveemployee');
Route::get('admin/InactiveEmp', 'admin\TblemployeeController@getInactiveemployee');
Route::post('admin/employee/email', 'admin\TblemployeeController@email');
Route::get('admin/AvailabileEmp', 'admin\TblemployeeController@GetAvailabileEmployee');
Route::get('datatable/getAvailabileEmp', ['as'=>'datatable.getAvailabileEmp','uses'=>'admin\TblemployeeController@getActiveEmployees']);
    Route::get('admin/plandata/{id}', 'admin\PlanningController@plandata');
    Route::get('admin/send-mail', function(){
        $details = [
            'title'=>'Mail from Hamza',
            'body'=>'this is fom test email'
        ];
        Mail::to("hamzaesoft@gmail.com")->send(new \App\Mail\TESTMAIL($details));
        echo "Yess done";
    });


Route::get('datatable/getposts', ['as'=>'datatable.getposts','uses'=>'admin\TblemployeeController@getEmployees']);
Route::get('datatable/getActiveEmp', ['as'=>'datatable.getActiveEmp','uses'=>'admin\TblemployeeController@getActiveEmployees']);
Route::get('datatable/getInactiveEmp', ['as'=>'datatable.getInactiveEmp','uses'=>'admin\TblemployeeController@getInactiveEmployees']);
Route::get('admin/DeleteEmployeeDoc/{id}', 'admin\TblemployeeController@DeleteDoc');
Route::post('admin/updateDocument', 'admin\TblemployeeController@UpdateDocument');
Route::get('admin/EditEmployeeDoc/{id}', 'admin\TblemployeeController@EditDoc');
Route::post('admin/uploadDocument', 'admin\TblemployeeController@UploadDocument');
Route::get('admin/Update_All_Employees', 'admin\TblemployeeController@Get_All_Employees');



Route::get('AjaxDocument', function () {
	$id = Input::get('id');
	$doc_details = DB::table('tblemployee_document')->where('id',$id)->first();
	return Response:: json($doc_details);
});



// End Employee

// Strat Shipping Company
Route::get('admin/ContainersLeverancier', 'admin\ShippingCompanyController@GetAll');
Route::get('admin/create_ContainersLeverancier', 'admin\ShippingCompanyController@create');
Route::post('admin/store_ContainersLeverancier', 'admin\ShippingCompanyController@store');
Route::get('admin/delete_ContainersLeverancier/{id}', 'admin\ShippingCompanyController@delete');
Route::get('admin/view_ContainersLeverancier/{id}', 'admin\ShippingCompanyController@show');

Route::get('admin/edit_ContainersLeverancier/{id}', 'admin\ShippingCompanyController@edit');
Route::post('admin/update_ContainersLeverancier', 'admin\ShippingCompanyController@update');

Route::get('admin/Getprices/{id}', 'admin\ShippingCompanyController@GetPricesByAjax');
Route::get('admin/Getdepartment/{id}', 'admin\ProjectsController@GetdepartmentByAjax');
Route::get('admin/GetContacts/{id}', 'admin\ProjectsController@GetContactByAjax');




// End Shipping Company


// Start Applicants
Route::get('admin/applicants', 'admin\ApplicantsController@Getall');
Route::get('admin/view_applicant/{id}', 'admin\ApplicantsController@show');
Route::get('admin/approved_applicant/{id}', 'admin\ApplicantsController@approve');
Route::get('admin/delete_applicant/{id}', 'admin\ApplicantsController@delete');
Route::get('admin/applicant_print/{id}', 'admin\ApplicantsController@download_pdf');
// End Applicants


// Start functie
Route::get('admin/functie', 'admin\FunctieController@index');
Route::get('admin/create_functie', 'admin\FunctieController@create');
Route::post('admin/functie_store', 'admin\FunctieController@store');
Route::get('admin/edit_functie/{id}', 'admin\FunctieController@edit');
Route::post('admin/update_functie', 'admin\FunctieController@update');
Route::get('datatable/Functie', ['as'=>'datatable.Functie','uses'=>'admin\FunctieController@AllFunctie']);
Route::get('admin/remove_Functie/{id}', 'admin\FunctieController@delete');


//start Status
Route::get('admin/status', 'admin\StatusController@index');
Route::get('datatable/status', ['as'=>'datatable.status','uses'=>'admin\StatusController@AllStatus']);
Route::get('admin/create_status', 'admin\StatusController@create');
Route::post('admin/status_store', 'admin\StatusController@store');
Route::get('admin/remove_status/{id}', 'admin\StatusController@delete');
Route::post('admin/update_status', 'admin\StatusController@update');
Route::get('admin/edit_status/{id}', 'admin\StatusController@edit');


// Start Planning
Route::get('admin/Planning', 'admin\PlanningController@getplanning');
Route::get('admin/PlanningByDate', 'admin\PlanningController@PlanningByDate');
Route::get('admin/PlanningByDate/{date}', 'admin\PlanningController@PlanningByDate');
Route::post('admin/checkUserIsFree', 'admin\PlanningController@checkUserIsFree');
Route::post('admin/addPlanProject', 'admin\PlanningController@saveProject');
Route::post('admin/addPlanEmp', 'admin\PlanningController@saveEmplyoee');
Route::get('admin/EditEmply/{id}', 'admin\PlanningController@EditEmply');
Route::post('admin/UpdatePlanEmp', 'admin\PlanningController@UpdatePlanEmp');




Route::get('admin/Delpersoneel', function () {
	$id = Input::get('id');
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
});



Route::get('admin/remove_pln_emp/{id}', 'admin\PlanningController@delete');
Route::post('admin/CopyPlan', 'admin\PlanningController@CopyPlan');
Route::get('admin/Compact/{date}', 'admin\PlanningController@compact_view');
Route::get('admin/PlanPDF/{date}', 'admin\PlanningController@PlanPDF');
Route::get('admin/DelProjByDate/{date}', 'admin\PlanningController@DelProjByDate');
Route::get('admin/DelPlanByDate/{date}', 'admin\PlanningController@DelPlanByDate');
Route::get('datatable/planning', ['as'=>'datatable.planning','uses'=>'admin\PlanningController@GetAllPlanningEmp']);


// Start Employment Agency
Route::get('admin/agencies', 'admin\EmploymentagencyController@getagencies');
Route::post('admin/agencies/uploadWeekstaatDocument', 'admin\EmploymentagencyController@uploadWeekstaatDocument');
Route::post('admin/agencies/updateUploadWeekstaatDoc', 'admin\EmploymentagencyController@updateUploadWeekstaatDoc');
Route::get('admin/agencies/deleteWeekstaatDocument/{id}', 'admin\EmploymentagencyController@deleteWeekstaatDocument');
Route::get('admin/agencies/editWeekstaatDocument/{id}', 'admin\EmploymentagencyController@editWeekstaatDocument');
Route::get('admin/create_agency', 'admin\EmploymentagencyController@create');
Route::post('admin/agency', 'admin\EmploymentagencyController@save');
Route::get('admin/delete_agency/{id}', 'admin\EmploymentagencyController@delete');
Route::get('admin/agency/{id}', 'admin\EmploymentagencyController@show');
Route::get('admin/edit_agency/{id}', 'admin\EmploymentagencyController@edit');
Route::post('admin/update_agency', 'admin\EmploymentagencyController@update');
Route::get('datatable/agencies', ['as'=>'datatable.agencies','uses'=>'admin\EmploymentagencyController@AjaxAgencies']);

// Start Customer
Route::get('admin/customers', 'admin\CustomersController@getcustomers');
Route::post('admin/customers/uploadWeekstaatDocument', 'admin\CustomersController@uploadWeekstaatDocument');
Route::post('admin/customers/updateUploadWeekstaatDoc', 'admin\CustomersController@updateUploadWeekstaatDoc');
Route::get('admin/customers/deleteWeekstaatDocument/{id}', 'admin\CustomersController@deleteWeekstaatDocument');
Route::get('admin/customers/editWeekstaatDocument/{id}', 'admin\CustomersController@editWeekstaatDocument');
Route::get('admin/create_customer', 'admin\CustomersController@create');
Route::post('admin/customer', 'admin\CustomersController@save');
Route::get('admin/delete_customer/{id}', 'admin\CustomersController@delete');
Route::get('admin/view_customer/{id}', 'admin\CustomersController@show');
Route::get('admin/edit_customer/{id}', 'admin\CustomersController@edit');
Route::post('admin/update_customer', 'admin\CustomersController@update');
Route::get('datatable/customers', ['as'=>'datatable.customers','uses'=>'admin\CustomersController@AllCustomers']);
// End Customer

// Start Department
Route::get('admin/departments', 'admin\DepartmentController@getdepartments');
Route::post('admin/departments/uploadWeekstaatDocument', 'admin\DepartmentController@uploadWeekstaatDocument');
Route::post('admin/departments/updateUploadWeekstaatDoc', 'admin\DepartmentController@updateUploadWeekstaatDoc');
Route::get('admin/departments/deleteWeekstaatDocument/{id}', 'admin\DepartmentController@deleteWeekstaatDocument');
Route::get('admin/departments/editWeekstaatDocument/{id}', 'admin\DepartmentController@editWeekstaatDocument');
Route::get('admin/create_department', 'admin\DepartmentController@create');
Route::get('admin/CreateNew_department/{id}', 'admin\DepartmentController@create');
Route::post('admin/department', 'admin\DepartmentController@save');
Route::get('admin/delete_department/{id}', 'admin\DepartmentController@delete');
Route::get('admin/department/{id}', 'admin\DepartmentController@show');
Route::get('admin/edit_department/{id}', 'admin\DepartmentController@edit');
Route::post('admin/update_department', 'admin\DepartmentController@update');
Route::get('datatable/deparments', ['as'=>'datatable.deparments','uses'=>'admin\DepartmentController@AllDepatments']);
// End Department

// Start ArticleList routes
Route::get('admin/article-list', 'admin\ArticleListController@index');
Route::get('admin/article-list/create', 'admin\ArticleListController@create');
Route::get('admin/article-list/edit/{id}', 'admin\ArticleListController@edit');
Route::get('admin/article-list/show/{id}', 'admin\ArticleListController@show');
Route::post('admin/article-list/store', ['uses' => 'admin\ArticleListController@store', 'as' => 'articleList.store']);
Route::put('admin/article-list/update/{id}', ['uses' => 'admin\ArticleListController@update', 'as' => 'articleList.update']);
Route::get('admin/article-list/destroy/{id}', 'admin\ArticleListController@destroy');
// End  ArticleList routes

// Start Project Manager
Route::get('admin/projectmanager', 'admin\ProjectmanagerController@getprojectmanagers');
Route::get('admin/create_project_manager', 'admin\ProjectmanagerController@create');
Route::post('admin/projectmanagers', 'admin\ProjectmanagerController@save');
Route::get('admin/delete_project_manager/{id}', 'admin\ProjectmanagerController@delete');
Route::get('admin/project_manager/{id}', 'admin\ProjectmanagerController@show');
Route::get('admin/edit_project_manager/{id}', 'admin\ProjectmanagerController@edit');
Route::post('admin/update_project_manager', 'admin\ProjectmanagerController@update');
Route::get('datatable/projectmanager', ['as'=>'datatable.projectmanager','uses'=>'admin\ProjectmanagerController@AjaxProjectManager']);
// End Project Manager

// Start Contact
Route::get('admin/contacts', 'admin\ContactController@getcontacts');
Route::get('admin/create_contact', 'admin\ContactController@create');
Route::get('admin/createNew_contact/{id}', 'admin\ContactController@create');
Route::post('admin/contact', 'admin\ContactController@save');
Route::get('admin/delete_contact/{id}', 'admin\ContactController@delete');
Route::get('admin/view_contact/{id}', 'admin\ContactController@show');
Route::get('admin/edit_contact/{id}', 'admin\ContactController@edit');
Route::post('admin/update_contact', 'admin\ContactController@update');
Route::post('admin/contact/email', 'admin\ContactController@email');
Route::get('datatable/contacts', ['as'=>'datatable.contacts','uses'=>'admin\ContactController@AllContacts']);
Route::get('admin/download', 'admin\ContactController@download');



// End Contact

// Start Project
Route::get('admin/projects', 'admin\ProjectsController@getprojects');
Route::get('admin/projects/{id}/details', 'admin\ProjectsController@projectDetails');
Route::get('admin/ProjectDetailsPDF/{id}', 'admin\ProjectsController@ProjectDetailsPDF');
Route::post('admin/projects/uploadWeekstaatDocument', 'admin\ProjectsController@uploadWeekstaatDocument');
Route::post('admin/projects/updateUploadWeekstaatDoc', 'admin\ProjectsController@updateUploadWeekstaatDoc');
Route::get('admin/projects/deleteWeekstaatDocument/{id}', 'admin\ProjectsController@deleteWeekstaatDocument');
Route::get('admin/projects/editWeekstaatDocument/{id}', 'admin\ProjectsController@editWeekstaatDocument');
Route::get('admin/AllActiveprojects', 'admin\ProjectsController@AllActiveProject');
Route::get('admin/AllInacticeprojects', 'admin\ProjectsController@AllInactiveProject');
Route::get('admin/create_project', 'admin\ProjectsController@create');
Route::get('admin/createNew_project/{id}', 'admin\ProjectsController@create');
Route::post('admin/project', 'admin\ProjectsController@save');
Route::get('admin/delete_project/{id}', 'admin\ProjectsController@delete');
Route::get('admin/show_project/{id}', 'admin\ProjectsController@show');
Route::get('admin/edit_project/{id}', 'admin\ProjectsController@edit');
Route::post('admin/update_project', 'admin\ProjectsController@update');
Route::get('admin/Project/Active/{id}', 'admin\ProjectsController@ActiveProject');
Route::get('admin/Project/Inactive/{id}', 'admin\ProjectsController@InactiveProject');
Route::get('datatable/projects', ['as'=>'datatable.projects','uses'=>'admin\ProjectsController@AllProjects']);
Route::get('admin/Active/Project', ['as'=>'datatable.Activeprojects','uses'=>'admin\ProjectsController@GetAllActiveProject']);
Route::get('admin/Inactive/Project',['as'=>'datatable.Inactiveprojects','uses'=>'admin\ProjectsController@GetAllInactiveProject']);
Route::get('admin/Update_All_Projects', 'admin\ProjectsController@Get_All_Projects');

Route::post('admin/edit_project/getWeekStateForProject', 'admin\ProjectsController@getWeekStateForProject');
Route::post('admin/getKeetWeekStateForProject', 'admin\ProjectsController@getKeetWeekStateForProject');


 Route::post('admin/UpdateProjectNote', function () {
		$Project_Id = Input::get('Project_Id');
		$Project_Note = Input::get('Project_Note');
		$Goedkeuring = Input::get('Goedkeuring');

		DB::table('tblproject')->where('Id',Input::get('Project_Id')) ->update(array('Goedkeuring'=>$Goedkeuring,'Notes'=>$Project_Note));
		return 'Data van afspraken veld is opgeslagen.';
 });

 Route::get('admin/project/price_list/{id}', 'admin\ProjectsController@price_list');
 Route::post('admin/project/price_list/store', 'admin\ProjectsController@store_price_list');
 Route::post('admin/project/price_list/update', 'admin\ProjectsController@update_price_list');
 Route::get('admin/project/delete_price_list/{id}', 'admin\ProjectsController@delete_price_list');



// End Project


// Start Note
Route::get('admin/notes', 'admin\NoteController@index');
Route::get('admin/create_note', 'admin\NoteController@create');
Route::get('admin/createNew_note/{id}', 'admin\NoteController@create');
Route::post('admin/note', 'admin\NoteController@store');
Route::get('admin/delete_note/{id}', 'admin\NoteController@delete');
Route::get('admin/view_note/{id}', 'admin\NoteController@show');
Route::get('admin/edit_note/{id}', 'admin\NoteController@edit');
Route::post('admin/update_note', 'admin\NoteController@update');
Route::get('datatable/notes', ['as'=>'datatable.notes','uses'=>'admin\NoteController@AllNotes']);
// End Note




// Start Comments
Route::get('admin/comments', 'admin\CommentController@index');
Route::get('admin/create_comment', 'admin\CommentController@create');
Route::post('admin/comment', 'admin\CommentController@store');
Route::get('admin/delete_comment/{id}', 'admin\CommentController@delete');
Route::get('admin/view_comment/{id}', 'admin\CommentController@show');
Route::get('admin/edit_comment/{id}', 'admin\CommentController@edit');
Route::post('admin/update_comment', 'admin\CommentController@update');

// End Comments


// Start Contact/Messages
Route::get('admin/Berichten', 'admin\MessageController@index');
Route::get('admin/view_Berichten/{id}', 'admin\MessageController@loadData');
Route::post('admin/AddMessage', 'admin\MessageController@NewMessage');
Route::get('admin/Del_Berichten/{id}', 'admin\MessageController@Destroy');
Route::get('admin/Edit_Berichten/{id}', 'admin\MessageController@Edit');
Route::post('admin/UpdateMessage', 'admin\MessageController@UpdateMessage');
Route::get('admin/CheckedMessage/{id}/{chkid}', 'admin\MessageController@CheckedBy');

//Route::get('admin/loaddata/{id}','admin\MessageController@loadData');
Route::post('admin/loaddata','admin\MessageController@loadDataAjax' );




/*Route::get('admin/approved_applicant/{id}', 'admin\MessageController@approve');

Route::get('admin/applicant_print/{id}', 'admin\MessageController@download_pdf');*/
// End Applicants







// Start Clients/Messages
Route::get('admin/clients', 'admin\ClientController@index');
Route::get('admin/messages/{id}', 'admin\MessageController@index');
Route::get('admin/view-message-Details/{id}', 'admin\MessageController@message_details');
Route::get('admin/Add-New-message/{id}', 'admin\MessageController@message_details');

// End Clients/Messages

// Start Employee/Messages
Route::get('admin/EMPBerichten', 'admin\BerichtenController@index');
Route::get('admin/view_EMPBerichten/{id}', 'admin\BerichtenController@loadData');
Route::post('admin/AddEMPMessage', 'admin\BerichtenController@NewMessage');
Route::get('admin/Del_EMPBerichten/{id}', 'admin\BerichtenController@Destroy');
Route::get('admin/Edit_EMPBerichten/{id}', 'admin\BerichtenController@Edit');
Route::post('admin/UpdateEMPMessage', 'admin\BerichtenController@UpdateMessage');
Route::get('admin/CheckedEMPMessage/{id}/{chkid}', 'admin\BerichtenController@CheckedBy');

//Route::get('admin/loaddata/{id}','admin\MessageController@loadData');
Route::post('admin/EMP_loaddata','admin\BerichtenController@loadDataAjax' );

// End Employee/Messages








// Start Market Rate
Route::get('admin/MarketRate', 'admin\MarketrateController@index');
Route::post('admin/UpdateMarketRate', 'admin\MarketrateController@Update_Marketrate');
// End Market Rate

// Start Quote
Route::get('admin/view_clientProjects/{id}', 'admin\QuoteController@get_ClientProjects');
Route::get('admin/edit_ClientProject/{id}', 'admin\QuoteController@edit_ClientProject');
Route::post('admin/update_ClientProject', 'admin\QuoteController@Update_ClientProject');
Route::get('admin/Active/{id}', 'admin\QuoteController@ActiveClient');
Route::get('admin/Inactive/{id}', 'admin\QuoteController@InactiveClient');
// End Quote

// Start Reports
Route::get('admin/report/total', 'admin\ReportController@Total');
Route::get('admin/report/total/weeknumber/{id}', 'admin\ReportController@Total');
Route::get('admin/report/employeeoverview', 'admin\ReportController@Employee_OverView');
Route::get('admin/report/employeeoverview/weeknumber/{id}', 'admin\ReportController@Employee_OverView');
Route::get('admin/report/projectmanageroverview', 'admin\ReportController@ProjectManager_OverView');
Route::get('admin/report/projectmanageroverview/weeknumber/{id}', 'admin\ReportController@ProjectManager_OverView');
Route::get('admin/report/weekcardoverviewchecked', 'admin\ReportController@weekcardoverviewchecked');
Route::get('admin/report/weekcardoverviewchecked/weeknumber/{id}', 'admin\ReportController@weekcardoverviewchecked');
Route::get('admin/report/hoursoverview', 'admin\ReportController@HoursOverview');
Route::get('admin/report/hoursoverview/weeknumber/{id}', 'admin\ReportController@HoursOverview');
Route::get('admin/report/projectfixedoverview', 'admin\ReportController@ProjectFixed_Overview');
Route::get('admin/report/expiredemployees', 'admin\ReportController@ExpiredEmployee_Overview');
Route::get('admin/report/employmentagencyoverview', 'admin\ReportController@EmployeeAgency_Overview');
Route::get('admin/report/employmentagencyoverview/weeknumber/{id}', 'admin\ReportController@EmployeeAgency_Overview');
Route::get('admin/report/employmentagencynotes/id/{id}/weeknumber/{weeknumber}', 'admin\ReportController@EmployementAgencyNote');
// Route::get('admin/report/employmentagencynotesduplicate/id/{id}/weeknumber/{weeknumber}', 'admin\ReportController@EmployementAgencyNoteDuplicate');
Route::get('admin/report/employmentagencynotesduplicate/{id}', ['uses' => 'admin\EmploymentAgencyWeeklyReportController@show', 'as' => 'EmploymentAgencyReport.show']);
// Route::post('admin/report/postemploymentagencynotesduplicate/{id}', 'admin\ReportController@postEmployementAgencyNoteDuplicate');
Route::post('admin/report/postemploymentagencynotesduplicate/{id}', 'admin\EmploymentAgencyWeeklyReportController@updateWeeklyData');
// Route::post('admin/employementAgencyReport/uploadWeekstaatDocument', 'admin\ReportController@uploadWeekstaatDocument');
Route::post('admin/employementAgencyReport/uploadWeekstaatDocument', 'admin\EmploymentAgencyWeeklyReportController@uploadWeekstaatDocument');
// Route::post('admin/employementAgencyReport/updateUploadWeekstaatDoc', 'admin\ReportController@updateUploadWeekstaatDoc');
Route::post('admin/employementAgencyReport/updateUploadWeekstaatDoc', 'admin\EmploymentAgencyWeeklyReportController@updateUploadWeekstaatDoc');
// Route::get('admin/employementAgencyReport/deleteWeekstaatDocument/{id}', 'admin\ReportController@deleteWeekstaatDocument');
Route::get('admin/employementAgencyReport/deleteWeekstaatDocument/{id}', 'admin\EmploymentAgencyWeeklyReportController@deleteWeekstaatDocument');
// Route::get('admin/employementAgencyReport/editWeekstaatDocument/{id}', 'admin\ReportController@editWeekstaatDocument');
Route::get('admin/employementAgencyReport/editWeekstaatDocument/{id}', 'admin\EmploymentAgencyWeeklyReportController@editWeekstaatDocument');
Route::post('admin/employmentagencyrecordsupdate/{id}', 'admin\EmploymentAgencyWeeklyReportController@employmentagencyrecordsupdate');
// Route::post('admin/report/employmentagencynotes', 'admin\ReportController@Update_EmployementAgencyNote');
Route::post('admin/report/employmentagencynotes', 'admin\EmploymentAgencyWeeklyReportController@store');
Route::get('admin/report/hist_employee_project', 'admin\ReportController@HistoryEmployeeProject');
Route::get('admin/report/hist_employee_project/filter/{filter}', 'admin\ReportController@HistoryEmployeeProject');
Route::get('admin/report/hist_employee_project/filter', 'admin\ReportController@HistoryEmployeeProject');
Route::get('admin/report/hist_project_employee', 'admin\ReportController@HistoryProjectEmployee');
Route::get('admin/report/hist_project_employee/filter/{filter}', 'admin\ReportController@HistoryProjectEmployee');
Route::get('admin/report/hist_project_employee/filter', 'admin\ReportController@HistoryProjectEmployee');
Route::get('admin/report/Project_Overview_Containers', 'admin\ReportController@Project_Overview_Containers');
Route::get('admin/report/Project_Overview_Containers/filter/{project}/{start_date}/{end_date}', 'admin\ReportController@Project_Overview_Containers');
Route::get('admin/deleteEmploymentAgencyRecord/{id}', 'admin\EmploymentAgencyWeeklyReportController@deleteEmploymentAgencyRecord');
Route::get('admin/deleteEmploymentAgencySingleRecord/{id}', 'admin\EmploymentAgencyWeeklyReportController@deleteEmploymentAgencySingleRecord');
Route::get('admin/getEmployeeSingleRecord/{id}', 'admin\EmploymentAgencyWeeklyReportController@getEmployeeSingleRecord');
Route::post('admin/addEmploymentAgencySingleRecord', 'admin\EmploymentAgencyWeeklyReportController@addEmploymentAgencySingleRecord');
//End Reports


// Start Generate Report via PDF/E-Mail
// Route::get('admin/report/employmentagency_pdf/id/{id}/weeknumber/{weeknumber}', 'admin\GenerateController@EmployementAgency_Generate_pdf');
Route::get('admin/report/employmentagency_pdf/{id}', 'admin\EmploymentAgencyWeeklyReportController@EmployementAgency_Generate_pdf');
// Route::get('admin/report/employmentagency_Email/id/{id}/weeknumber/{weeknumber}', 'admin\GenerateController@EmployementAgency_Email');
Route::get('admin/report/employmentagency_Email/{id}', 'admin\EmploymentAgencyWeeklyReportController@EmployementAgency_Email');
// Route::post('admin/report/employmentagency_Email_send', 'admin\GenerateController@EmployementAgency_Email_Sent');
Route::post('admin/report/employmentagency_Email_send', 'admin\EmploymentAgencyWeeklyReportController@EmployementAgency_Email_Sent');
// End Generate Report via PDF/E-Mail

// Start Order Container

Route::get('admin/OrderWasteContainer', 'admin\OrderController@index');
Route::get('datatable/getorders', ['as'=>'datatable.getorders','uses'=>'admin\OrderController@getorders']);
Route::get('admin/Edit_OrderWasteContainer/{id}', 'admin\OrderController@show');
Route::get('admin/View_OrderWasteContainer/{id}', 'admin\OrderController@view');
Route::get('admin/Ajax_projectInfo/{id}', 'admin\OrderController@AjaxprojectInfo');
Route::get('admin/create_order', 'admin\OrderController@create');
Route::post('admin/store_order', 'admin\OrderController@store');
Route::post('admin/update_order', 'admin\OrderController@update');
Route::get('admin/Delete-OrderWasteContainer/{id}', 'admin\OrderController@destroy');
Route::get('admin/Order_print/{id}', 'admin\OrderController@download_pdf');
Route::get('admin/Order_email/{id}', 'admin\OrderController@email');
Route::post('admin/Order_email_sent', 'admin\OrderController@Order_sent');
Route::get('admin/GetContactsList/{id}/{cid}', 'admin\OrderController@GetContactByAjax');
Route::get('admin/GetContactsListMelden/{id}/{cid}', 'admin\OrderController@GetContactByAjax_Melden');
// End Order Container



// Start Order Container Services

Route::get('admin/BestelformulierDiensten', 'admin\OrderServicesController@index');
Route::get('admin/new_OrderServices', 'admin\OrderServicesController@create');
Route::post('admin/store_OrderServices', 'admin\OrderServicesController@store');
Route::get('admin/Edit_OrderServices/{id}', 'admin\OrderServicesController@show');
Route::get('admin/View_OrderServices/{id}', 'admin\OrderServicesController@view');
Route::get('admin/Ajax_projectInfo/{id}', 'admin\OrderServicesController@AjaxprojectInfo');
Route::post('admin/update_OrderServices', 'admin\OrderServicesController@update');
Route::get('admin/Delete_OrderServices/{id}', 'admin\OrderServicesController@destroy');
Route::get('admin/OrderServices_print/{id}', 'admin\OrderServicesController@download_pdf');
Route::get('admin/GetContactsByDept/{id}', 'admin\OrderServicesController@GetContactByAjax');
/*




Route::get('admin/Order_email/{id}', 'admin\OrderServicesController@email');
Route::post('admin/Order_email_sent', 'admin\OrderServicesController@Order_sent');*/
// End Order Container Services

// Start KeetCard
Route::get('admin/Add-Keetonderhoud', 'admin\KeetcardController@AddKeetonderhoud');
Route::get('admin/Add-New-Keetonderhoud/{id}', 'admin\KeetcardController@AddKeetonderhoud');
Route::post('admin/AddKeetonderhoud', 'admin\KeetcardController@PostKeetonderhoud');
Route::get('admin/view-Keetonderhoud/{id}', 'admin\KeetcardController@ViewKeetonderhoud');


Route::get('admin/Edit-Keetonderhoud/getKeetData/{id}', 'admin\KeetcardController@getKeetData');
Route::post('admin/Edit-Keetonderhoud/saveKeetData/', 'admin\KeetcardController@saveKeetData');
Route::post('admin/Edit-Keetonderhoud/updateKeetWeekCardData', 'admin\KeetcardController@updateKeetWeekCardData');

Route::get('admin/Delete-Keetonderhoud/{id}', 'admin\KeetcardController@DeleteKeetonderhoud');
Route::get('admin/Edit-Keetonderhoud/{id}', 'admin\KeetcardController@EditKeetonderhoud');
Route::get('admin/Keetonderhoud_weekcard_pdf/{id}', 'admin\KeetcardController@KeetWeekcardPDF');
Route::post('admin/update_Keetonderhoud', 'admin\KeetcardController@Update_Keetonderhoud');
Route::post('admin/InsertKeetonderhoud', 'admin\KeetcardController@Post_Keetonderhoud');
Route::get('admin/Delete-KeetTimecard/{id}', 'admin\KeetcardController@DeleteKeetTimeCard');

Route::get('admin/Keetonderhoudweekcard_email/{id}', 'admin\KeetcardController@Weekcard_email');
Route::post('admin/Keetonderhoud/weekcard_sent', 'admin\KeetcardController@weekcard_sent');

Route::post('admin/Keetonderhoud/uploadWeekstaatDocument', 'admin\KeetcardController@uploadWeekstaatDocument');
Route::post('admin/Keetonderhoud/updateUploadWeekstaatDoc', 'admin\KeetcardController@updateUploadWeekstaatDoc');
Route::get('admin/Keetonderhoud/deleteWeekstaatDocument/{id}', 'admin\KeetcardController@deleteWeekstaatDocument');
Route::get('admin/Keetonderhoud/editWeekstaatDocument/{id}', 'admin\KeetcardController@editWeekstaatDocument');

Route::get('admin/AjaxUpdateKeettime', 'admin\KeetcardController@AjaxUpdateKeettime');


Route::get('admin/Keetonderhoud', 'admin\KeetcardController@GetAll');
Route::get('datatable/Keetonderhoud', ['as'=>'datatable.Keetonderhoud','uses'=>'admin\KeetcardController@getKeekcards']);

// Start KeetCard


// Start Weekstate
Route::get('admin/weekcard', 'admin\WeekcardController@GetAllWeekstate');
Route::post('admin/weekstaat/uploadWeekstaatDocument', 'admin\WeekcardController@uploadWeekstaatDocument');
Route::post('admin/weekstaat/updateUploadWeekstaatDoc', 'admin\WeekcardController@updateUploadWeekstaatDoc');
Route::get('admin/weekstaat/deleteWeekstaatDocument/{id}', 'admin\WeekcardController@deleteWeekstaatDocument');
Route::get('admin/weekstaat/editWeekstaatDocument/{id}', 'admin\WeekcardController@editWeekstaatDocument');
Route::get('admin/Add-New-weekstaat', 'admin\WeekcardController@AddWeekstate');
Route::get('admin/Add-weekstaat/{id}', 'admin\WeekcardController@AddWeekstaat');
Route::post('admin/Addweekstate', 'admin\WeekcardController@PostWeekstate');
Route::get('admin/ProjectApprove/{id}', 'admin\WeekcardController@ProjectApproved');
Route::get('admin/ProjectDisapprove/{id}', 'admin\WeekcardController@ProjectDisapproved');
Route::get('admin/Edit-weekstaat/{id}', 'admin\WeekcardController@EditWeekstate');
Route::get('admin/Delete-weekstaat/{id}', 'admin\WeekcardController@DeleteWeekstate');
Route::get('admin/view-weekstaat/{id}', 'admin\WeekcardController@ViewWeekstate');
Route::get('admin/ViewWeekStateAjaxCall/{id}', 'admin\WeekcardController@ViewWeekStateAjaxCall');
Route::post('admin/EmailAttachment', 'admin\WeekcardController@UploadDocument');
Route::get('admin/Delete-timecard/{id}', 'admin\WeekcardController@DeleteTimeCard');
Route::get('admin/Distroy-timecard/{id}', 'admin\WeekcardController@DistroyTimeCard');
Route::post('admin/Addweekcard', 'admin\WeekcardController@PostWeekCard');
    Route::post('admin/AddweekcardMultiple', 'admin\WeekcardController@PostWeekCardMultiple');
Route::post('admin/update_weekTime', 'admin\WeekcardController@Update_WeekTime');
Route::post('admin/update_weekstate', 'admin\WeekcardController@Update_WeekStaat');
Route::get('admin/weekcard_pdf/{id}', 'admin\WeekcardController@WeekcardPDF');
Route::get('admin/weekcard_pdf_WO_Regie/{id}', 'admin\WeekcardController@Weekcard_WO_Regie_PDF');
Route::get('admin/weekcard_email_WO_Regie/{id}', 'admin\WeekcardController@Weekcard_WO_Regie_email');
Route::get('admin/weekcard_email/{id}', 'admin\WeekcardController@Weekcard_email');
Route::post('admin/weekcard/weekcard_sent', 'admin\WeekcardController@weekcard_sent');
Route::post('admin/weekcard/weekcard_sent_WO_Regie', 'admin\WeekcardController@weekcard_sent_WO_Regie');
Route::get('admin/Week-Weekstaten', 'admin\WeekcardController@Week_Weekstaten');
Route::get('admin/ProjectsByWeek/{id}', 'admin\WeekcardController@ProjectsByWeek');
// Route::get('/admin/ProjectsByWeek/{id}', ['as'=>'admin.ProjectsByWeek','uses'=>'admin\WeekcardController@ProjectsByWeek']);
Route::get('datatable/getAllOrders', ['as'=>'datatable.getAllOrders','uses'=>'admin\OrderServicesController@getAllOrders']);

Route::get('datatable/Weekcards', ['as'=>'datatable.Weekcards','uses'=>'admin\WeekcardController@getWeekcards']);
Route::get('datatable/WeekcardsByWeek/{week}', ['as'=>'datatable.WeekcardsByWeek','uses'=>'admin\WeekcardController@getWeekcardsByWeek']);
Route::get('admin/Active/Weekcards', 'admin\WeekcardController@AllActiveWeekcards');
Route::get('admin/Inactive/Weekcards', 'admin\WeekcardController@AllInactiveWeekcards');
Route::get('admin/DeleteWeekcardDoc/{id}', 'admin\WeekcardController@DeleteDoc');
Route::get('admin/Weekemail', 'admin\WeekcardController@testEmail');
Route::get('admin/weekCardWeeklyReportPDF/{week}', 'admin\WeekcardController@weekCardWeeklyReportPDF');
Route::get('admin/weekCardMultipleWeeksReportPDF/{from}/{to}', 'admin\WeekcardController@weekCardMultipleWeeksReportPDF');
Route::get('admin/projectWiseMultipleWeeksReport/{from}/{to}', 'admin\WeekcardController@projectWiseMultipleWeeksReport');
// Route::post('admin/weekCardMultipleWeeksReportPDF', 'admin\WeekcardController@weekCardMultipleWeeksReportPDF');
Route::get('admin/calculateRegieWorkingHours/{id}', 'admin\WeekcardController@calculateRegieWorkingHours');

Route::get('admin/empAgencyWeeklyReportPDF/{week}', 'admin\WeekcardController@empAgencyWeeklyReportPDF');
Route::get('admin/empAgencyWWMultipleWeeksReportPDF/{from}/{to}', 'admin\WeekcardController@empAgencyWWMultipleWeeksReportPDF');//WW = Week Wise
Route::get('admin/empAgencyPWMultipleWeeksReport/{from}/{to}', 'admin\WeekcardController@empAgencyPWMultipleWeeksReport');//PW = project Wise

Route::get('admin/Ajaxproject', function () {
	$project_id = Input::get('project_id');
	$project_details = DB::table('tblproject')
	->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
	->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id' , 'left')
	->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
	->join('tblshippingcompany', 'tblproject.Shippingcompany_id', '=', 'tblshippingcompany.Id', 'left')
	->select('tblproject.*', 'tblcustomer.Name as CustomerName','tbldepartment.Name as DeptName','tbldepartment.Email as Email','tbldepartment.Id as DeptID',
	'tblproject.Notes as pro_Note','tblcontact.Id as Contact_ID','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname','tblshippingcompany.Email as ShipEmail')
	->where('tblproject.Id',$project_id)->first();


	return Response:: json($project_details);
});



Route::get('admin/GetContactNo', function () {
	$id = Input::get('id');
	$cont_details = DB::table('tblcontact')->where('Id',$id)->first();
	return Response:: json($cont_details);
});


Route::get('admin/AjaxemployeesCost', function () {
	$Employee_Id = Input::get('Employee_Id');
	$project_id = Input::get('project_id');



	$Emp_id = explode('_',$Employee_Id);

	$Employee = DB::table('tblemployee')
	->select('tblemployee.Cost')
	//->join('tblproject', 'tblemployee.id', '=', 'tblproject.Customer_id', 'left')
	->where('tblemployee.id',$Emp_id[0])->first();
	//echo $result['Cost'] =  $Employee_details->Cost;
	//die;
	$project = DB::table('tblproject')
	->select('tblproject.Rate')
	//->join('tblproject', 'tblemployee.id', '=', 'tblproject.Customer_id', 'left')
	->where('tblproject.Id',$project_id)->first();

	$Employee_details = array (
							'Cost' => $Employee->Cost,
							'Rate' => $project->Rate
	);

//	->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.id' , 'left')
	//->join('tblproject', 'tblemployee.id', '=', 'tblproject.Customer_id', 'left')
	///
	//->select('tblemployee.Cost','tblproject.Rate')
	//->where('tblemployee.id',$Emp_id[0])->first();
	return Response:: json($Employee_details);
});





Route::get('admin/Ajaxemployees', function () {
	echo $Employee_Id = Input::get('Employee_Id');
	$Emp_id = explode('_',$Employee_Id);

	$Employee_details = DB::table('tblemployee')
	->select('tblemployee.Cost','tblemployee.id')
	->join('tblproject', 'tblemployee.id', '=', 'tblproject.Customer_id', 'left')
	->where('tblemployee.id',$Emp_id[0])->first();
	echo $result['Cost'] =  $Employee_details->Cost;
	die;



//	->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.id' , 'left')
	//->join('tblproject', 'tblemployee.id', '=', 'tblproject.Customer_id', 'left')
	///
	//->select('tblemployee.Cost','tblproject.Rate')
	//->where('tblemployee.id',$Emp_id[0])->first();
	return Response:: json($Employee_details);
});


Route::get('admin/ChkDupl_Sofinumber', function () {

	 $SofiNumber = Input::get('Sofinumber');
	@ $id = Input::get('id');
	 if (!empty($id)) {

		$Res = DB::table('tblemployee')->where('id', '!=', $id)->where('Sofinumber', $SofiNumber)->get();
	 } else {
		$Res = DB::table('tblemployee')->where('Sofinumber', $SofiNumber)->get();
	 }
		if ($Res) {
		return '<span class="error">BSN nummer is al gebruikt voor een ander personeel</span>';

		} else {

		return 'success';

		}

});




Route::get('admin/AjaxContact', function () {
	$contact_id = Input::get('contact_id');
	$project_details = DB::table('tblcontact')
	->select('*')
	->where('tblcontact.Id',$contact_id)->first();
	return Response:: json($project_details);
});






Route::get('admin/AjaxUpdateWeektime', function () {
		$hours_1 = Input::get('hours_1');
		$hours_2 = Input::get('hours_2');
		$hours_3 = Input::get('hours_3');
		$hours_4 = Input::get('hours_4');
		$hours_5 = Input::get('hours_5');
		$hours_6 = Input::get('hours_6');
		$hours_7 = Input::get('hours_7');
		$rate = Input::get('rate');
		$rate_cost = Input::get('rate_cost');
	 	$checked = Input::get('checked');
		$notes = Input::get('notes');
		$timecard_id = Input::get('timecard_id');
		$weekcard_id = Input::get('weekcard_id');
		if ($checked == 1){ $check =1;} else { $check =0;}
			$data = array(
						'Mon' => $hours_1,
						'Tue' => $hours_2,
						'Wed' => $hours_3,
						'Thu' => $hours_4,
						'Fri' => $hours_5,
						'Sat' => $hours_6,
						'Sun' => $hours_7,
						'Rate' => $rate,
						'Rate_Cost' => $rate_cost,
						'Billable' => $check,
						'Notes' => $notes,
						'Weekcard_Id' => $weekcard_id
					);
			DB::table('tbltimecard')->where('id', $timecard_id)->update($data);

			return ' <div class="alert alert-success">
                        <b>Success!</b> Regel van gewerkte uren is met success bijgewerkt.
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>';

 });




 Route::get('admin/AjaxUpdateWeekcard', function () {
		$str_date = Input::get('str_date');
		$rec_date = Input::get('rec_date');
		$checked = Input::get('checked');
		$bill_date = Input::get('bill_date');
		$Bl_no = Input::get('bill_no');
		$weekcard_id = Input::get('weekcard_id');

		if ($checked == 1){ $check =1;} else { $check =0;}
			$data = array(
						'Sent_Date' => $str_date,
						'Received_Date' => $rec_date,
						'Checked' => $check,
						'Billing_Date' => $bill_date,
						'Billing_no' => $Bl_no
					);



			DB::table('tblweekcard')->where('id', $weekcard_id)->update($data);

			return ' <div class="alert alert-success">
                        <b>Success!</b> Regel van gewerkte uren is met success bijgewerkt.
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>';

 });


// End Weekstate


// Start Container Bon
Route::get('admin/ContainerBons', 'admin\ContainerBonController@index');
Route::get('admin/create_orderBon', 'admin\ContainerBonController@create');
Route::post('admin/OrderBon_store', 'admin\ContainerBonController@store');
Route::post('admin/OrderBon_update', 'admin\ContainerBonController@update');
Route::get('admin/edit_orderBon/{id}', 'admin\ContainerBonController@edit');
Route::get('admin/Delete-Bon/{id}', 'admin\ContainerBonController@destroy');
Route::get('admin/destroyBon/{id}', 'admin\ContainerBonController@destroyBon');
//Route::get('admin/AllBons', 'admin\ContainerBonController@edit');
Route::post('admin/AddContainerBon', 'admin\ContainerBonController@AddContainer');
Route::get('admin/AjaxOrderBon','admin\ContainerBonController@AjaxBonPrice');
Route::get('admin/AjaxPriceList','admin\ContainerBonController@AjaxDescription');
Route::get('admin/AjaxEditBon','admin\ContainerBonController@AjaxEditBon');
Route::get('admin/ContainerBon_pdf/{id}', 'admin\ContainerBonController@ContainerBon_pdf');
Route::get('admin/ContainerBon_email/{id}', 'admin\ContainerBonController@email');
Route::post('admin/ContainerBon_email_sent', 'admin\ContainerBonController@ContainerBon_sent');

// End Container Bon


Route::get('admin/Backup', 'admin\BackupController@index');
Route::get('admin/Backup/create', 'admin\BackupController@create');


 });
/*Leaves*/
Route::get('admin/leaves', 'admin\LeavesController@index');
Route::get('admin/leavesManagement', 'admin\LeavesController@index');
Route::get('datatable/getAllLeaves', ['as'=>'datatable.getAllLeaves','uses'=>'admin\LeavesController@getAllLeaves']);
Route::get('admin/cancelledleave/{id}', 'admin\LeavesController@cancelledleave');
Route::get('admin/Approvedleave/{id}', 'admin\LeavesController@Approvedleave');



// Route::post('admin/ContainerBon_email_sent', 'admin\ContainerBonController@ContainerBon_sent');
/*END Leaves*/
// End Admin

//----------------------------------------------------//

// Start Frontend

Route::get('/', 'HomeController@index') ;
Route::get('Services', 'HomeController@Services') ;
Route::post('quote', 'HomeController@store');
Route::get('applicant', 'ApplicantController@create') ;
Route::post('submit-applicant', 'ApplicantController@store') ;
//start Login
Route::get('login', 'LoginController@login') ;
Route::post('checklogin', 'LoginController@checklogin');

//Route::group(['middleware' => 'frontAuth'], function() {

//if (!empty(Session::get('front_userID'))) {
// Dashboard Employee
Route::get('welcome', 'LoginController@welcome');
Route::get('emp_welcome', 'LoginController@emp_welcome');
Route::post('dashboard', 'LoginController@dashboard');
Route::get('logout', 'LoginController@logout');
Route::get('projects', 'ProjectController@index');
Route::get('Planning', 'PlanningController@index');

Route::get('AjaxPlanning', function () {
		$project_id = Input::get('id');
		$emp_id = Input::get('emp_id');
		$date_in = date('Y-m-d', strtotime(Input::get('date')));
		$check_in_time = null;
		$check_out_time = null;
		$did_check_in =   DB::table('tbl_pln_emp_attendence')
														->where('project_id', $project_id)
														->where('employee_id', $emp_id)
														->where('date_in', $date_in)
														->first();
		if($did_check_in) {
			$check_in_time = $did_check_in->time_in;
		}

		$did_check_out =   DB::table('tbl_pln_emp_attendence')
														->where('project_id', $project_id)
														->where('employee_id', $emp_id)
														->where('date_out', $date_in)
														->first();
		if($did_check_out) {
			$check_out_time = $did_check_out->time_out;
		}

	$project_details = DB::table('tblproject')
	->join('tbldepartment', 'tblproject.Department_Id', '=', 'tbldepartment.Id')
	->join('tblcustomer', 'tblproject.Customer_id', '=', 'tblcustomer.Id', 'left')
	->join('tblcontact', 'tblproject.Contact_Id', '=', 'tblcontact.Id', 'left')
	->select( 'tbldepartment.Name as DeptName','tblproject.Name as project_name','tblproject.Address as Address','tblcustomer.Name as CustomerName', 'tblcontact.Id as Contact_ID','tblcontact.mobile as Contact_phone','tblcontact.Firstname as Contact_Firstname','tblcontact.Lastname as Contact_Lastname','tblproject.Zipcode', 'tblproject.City')
	->where('tblproject.Id',$project_id)->first();
	// return Response:: json($project_details);
	return Response:: json([
		'project_details' => $project_details,
		'did_check_in' => (bool) $did_check_in,
		'did_check_out' => (bool) $did_check_out,
		'check_in_time' => $check_in_time,
		'check_out_time' => $check_out_time,
		// 'is_project_started' => $date_in
	]);
});

// start Messages of Personeel
Route::get('per-project-details/{id}', 'PersoneelController@ProjectDetails');

Route::get('add-per-messages', 'PersoneelController@AddProjectMessages');
Route::get('Emp_messages', 'PersoneelController@GetProjectMessages');
Route::get('view-per-message/{id}', 'PersoneelController@loadData');
Route::post('send-permessage', 'PersoneelController@AddMessage');
Route::post('UpdatePerMessage', 'PersoneelController@UpdateMessage');
Route::get('Del-per-message/{id}', 'PersoneelController@Destroy');
Route::post('loadperdata','PersoneelController@loadDataAjax' );





// End Messages of Personeel




// Route::get('ProjectDetailsPDF/{id}', 'ProjectController@ProjectDetailsPDF');
Route::get('project-details/{id}', 'ProjectController@ProjectDetails');
Route::get('add_messages/{id}', 'ProjectController@AddProjectMessages');
Route::get('messages/{id}', 'ProjectController@GetProjectMessages');
Route::get('view-message/{id}', 'ProjectController@loadData');
Route::post('send-message', 'ProjectController@AddMessage');
Route::post('UpdateMessage', 'ProjectController@UpdateMessage');
Route::get('Del_message/{id}', 'ProjectController@Destroy');
Route::post('loaddata','ProjectController@loadDataAjax' );


// Start Contact/Messages
Route::get('admin/Berichten', 'admin\MessageController@index');
/*Route::get('admin/view_Berichten/{id}', 'admin\MessageController@loadData');
Route::post('admin/AddMessage', 'admin\MessageController@NewMessage');
Route::get('admin/Del_Berichten/{id}', 'admin\MessageController@Destroy');
Route::get('admin/Edit_Berichten/{id}', 'admin\MessageController@Edit');
Route::post('admin/UpdateMessage', 'admin\MessageController@UpdateMessage');
Route::get('admin/CheckedMessage/{id}/{chkid}', 'admin\MessageController@CheckedBy');
Route::post('admin/loaddata','admin\MessageController@loadDataAjax' );
*/

Route::get('AddProject', 'ProjectController@AddProject');
Route::post('AddProjectStore', 'ProjectController@AddProjectStore');
Route::get('OrderWasteContainers', 'OrderController@index');
Route::get('OrderWasteContainer_create', 'OrderController@create');
Route::get('OrderWasteContainer_edit/{id}', 'OrderController@edit');
Route::post('update_OrderWasteContainer', 'OrderController@update');
Route::post('Save-OrderWasteContainer', 'OrderController@store');
Route::get('Order_print/{id}', 'OrderController@download_pdf');
Route::get('Ajax_projectName/{id}', 'OrderController@AjaxprojectName');

Route::get('GetShippingCompany_info', function () {
	$project_id = Input::get('shipping_id');
	$project_details = DB::table('tblshippingcompany')
	->where('id',$project_id)->first();
	return Response:: json($project_details);
});




Route::get('OrderServices', 'OrderServicesController@index');
Route::get('create_OrderServices', 'OrderServicesController@create');
Route::get('edit_OrderServices/{id}', 'OrderServicesController@edit');
Route::post('update_OrderServices', 'OrderServicesController@update');
Route::post('Save_OrderServices', 'OrderServicesController@store');
Route::get('print_OrderServices/{id}', 'OrderServicesController@download_pdf');

Route::get('report/Project_Overview_Containers', 'ReportController@Project_Overview_Containers');
Route::get('report/Project_Overview_Containers/filter/{project}/{start_date}/{end_date}', 'ReportController@Project_Overview_Containers');
// generate PDF
Route::get('report/Pdf_Containers', 'ReportController@PDF_Containers');
Route::get('report/Pdf_Containers/filter/{project}/{start_date}/{end_date}', 'ReportController@PDF_Containers');
Route::get('privacy', function () {

	echo 'following permission(s): android.permission.GET_ACCOUNTS,android.permission.READ_CONTACTS. Apps using these permissions in an APK are required to have';
	exit;

	 });

Route::get('AjaxTimeOut', function () {

	$end_time = date('H:i', strtotime(Input::get('time_out')));
	$endDateFromat = Input::get('date_out') . ' ' . $end_time;
	$endDateFromat = Carbon::parse($endDateFromat);

	$time_out = Input::get('time_out');
	$date_out = date("Y-m-d", strtotime(Input::get('date_out')));
	$project_id = Input::get('project_id');
	$emp_id = Input::get('emp_id');
	$plan_id = Input::get('plan_id');

	$data = 	DB::table('tbl_pln_emp_attendence')->where('project_id', $project_id)
									->where('employee_id', $emp_id)
									->where('plan_id', $plan_id)
									->where('date_in', $date_out)
									->first();

	$start_time = date('H:i', strtotime($data->time_in));
	// calculating total time
	$startDateFormat = Input::get('date_out') . ' ' . $start_time;
	$startDateFormat = Carbon::parse($startDateFormat);
	$total_time_in_min = $endDateFromat->diffInMinutes($startDateFormat);

	$hours = intval($total_time_in_min/60);
	$minutes = $total_time_in_min - ($hours * 60);

	$total_time = $hours . ':' . $minutes;


	$oldRecord = DB::table('tbl_pln_emp_attendence')
								->where('project_id', $project_id)
								->where('employee_id', $emp_id)
								->where('plan_id', $plan_id)
								->where('date_in', $date_out)
								->update(['time_out' => $time_out, 'date_out' => $date_out, 'total_time' => $total_time]);

	return 'Successfully updated';
});

Route::get('AjaxTimeIn', function () {

	$time_in = Input::get('time_in');
	$date_in = date("Y-m-d", strtotime(Input::get('date_in')));

	$project_id = Input::get('project_id');
	$emp_id = Input::get('emp_id');
	$plan_id = Input::get('plan_id');

	$InsertTimeIn = array (
					'plan_id' => $plan_id,
					'employee_id' => $emp_id,
					'project_id' => $project_id,
					'date_in' => $date_in,
					'time_in' => $time_in,
					'created_at' => date('y-m-d  H:i:s')
					);

	DB::table('tbl_pln_emp_attendence') ->insert($InsertTimeIn);
});






//}

//});




// End Login


// End Frontend
