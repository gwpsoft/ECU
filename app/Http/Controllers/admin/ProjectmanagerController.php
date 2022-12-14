<?php

namespace App\Http\Controllers\admin;
use App\Projectmanager;
use App\Http\Requests\ProjectmanagerRequest;
use Request;
use Session;
use Validator;
use DB;
use Datatables;
use App\Http\Controllers\Controller;

class ProjectmanagerController extends Controller
{
    //
	
	public function getprojectmanagers() {
	
	//$data = Projectmanager::get();		
	//return View('admin.project_manager.allmanagers')->with('data', $data);
	return View('admin.project_manager.allmanagers_ajax');
    }
	
	public function create()
	{
   	return view('admin.project_manager.create');
	}
	
	
	
	public function save(ProjectmanagerRequest $request) {
	$input = Projectmanager::create($request->all());
	$ID = $input->id;
	if (!empty($request->Save)) {
			Session::flash('message', ' Inserted Project Manager!');
			return redirect('admin/edit_project_manager/'.$ID);
			//return redirect('admin/weekcard');	
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Inserted Project Manager!');
		return redirect('admin/projectmanager');
		}
		
		if (!empty($request->Save_New)) {
		Session::flash('message', ' Inserted Project Manager!');
		return redirect('admin/create_project_manager');
		}	
	/*Session::flash('message', 'Successfully Inserted Project Manager!');
	return redirect('admin/projectmanager');*/
	}
	
	
	public function delete($id) {
		
		$data = DB::table('tblprojectmanager')->where('Id', $id)->delete();	
		if ($data > 0) {
		Session::flash('message', ' geschrapte project manager!');
		return redirect('admin/projectmanager');
		}
	}
	
	 public function show($id)
    {
        //		
		$Get_ProjectManager = Projectmanager::find($id);		
		//DB::table('tblemployee')->where('id', $id)->first();
		return View('admin.project_manager.view')->with('data', $Get_ProjectManager);		
    }
	
	public function edit($id)
    {
        //
		$Get_Projectmanager = Projectmanager::find($id);
		
		return View('admin.project_manager.edit',compact('Get_Projectmanager'));	
    }
	
	public function update(ProjectmanagerRequest $request) {
		
		$post = $request->all();
		//print_r($request->all());
		$data = array (
		'Gender' => $post['Gender'],
		'Initials' => $post['Initials'],
		'Firstname' => $post['Firstname'],
		'Lastname' => $post['Lastname'],
		'Phone' => $post['Phone'],
		'Mobile' => $post['Mobile'],
		'Email' => $post['Email'],
		'Notes' => $post['Notes'],
		
		);
		DB::table('tblprojectmanager')
            ->where('id', $post['id'])
            ->update($data);
		
		
		
		//$Get_ProjectManager = Projectmanager::findOrfail($post['id']);
		//$Get_ProjectManager->update($request->all());
		//die;
		if (!empty($post['Save'])) {
			Session::flash('message', ' project Manager bijgewerkt!');
			return redirect('admin/edit_project_manager/'.$post['id']);
			//return redirect('admin/weekcard');	
		}
		if (!empty($post['Save_Close'])) {
		Session::flash('message', ' project Manager bijgewerkt!');
		return redirect('admin/projectmanager');
		}
		
		if (!empty($post['Save_New'])) {
		Session::flash('message', ' project Manager bijgewerkt!');
		return redirect('admin/create_project_manager');
		}	
		/*Session::flash('message', ' project Manager bijgewerkt!');
		return redirect('admin/projectmanager');*/
		
		}
		
			function AjaxProjectManager () {
			
			$ProjectManager = DB::table('tblprojectmanager')->select('*');
			 return Datatables::of($ProjectManager)
			 ->addColumn('Opties' , function ($ProjectManager) {
				return ' <a href="project_manager/'.$ProjectManager->Id.'" title="uitzicht" class="widget-icon"><span class="icon-eye-open"></span></a>
     <a href="edit_project_manager/'.$ProjectManager->Id.'" title="Bewerk" class="widget-icon"><span class="icon-pencil"></span></a>
     <a href="delete_project_manager'.$ProjectManager->Id .'" title="verwijderen" class="widget-icon" onclick="deleteRecord();"><span class="icon-trash"></span></a>';
				 })
			 ->make(true);	
			
		}
	
}
