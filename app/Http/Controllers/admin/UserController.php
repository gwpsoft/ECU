<?php

namespace App\Http\Controllers\admin;
use Auth;
use Hash;
use Session;
use Response;
use User;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller {

	public function index() {
		
		$users = DB::select('select `id`,`name`,`email`,`group`, `status`,
 (CASE WHEN `group` = 1 THEN "Client" WHEN `group` = 2 THEN "Personeel" ELSE "Admin" END
 ) as groups ,
 (CASE WHEN `status` = 1 THEN "Active"  ELSE "Blocked" END
 ) as status,txt_password     
    from `users`  ORDER BY `id` ASC');
		
		/*$users = DB::table('users')->select('id','name','email','group','CASE group when "1" then "Client" when "0" then "Admin" as groups ')->orderBy('name','DESC')->get();*/
		$modules = DB::table('tblmodules')->select('*')->orderBy('name','ASC')->get();
		
		
		return view('admin.user.all',compact('users','modules'));		
	}
	
	public function ModuleRights () {
		
		$data = DB::table('tbl_modules_rights')->where('user_id', $_POST['user_id'])->delete();		
		for($i=0; $i < count($_POST['modules']); $i++){
			
			$PostRights = array (
								'user_id' => $_POST['user_id'],
								'module_id' => $_POST['modules'][$i]
								);	
			
									
			DB::table('tbl_modules_rights')->insertGetId($PostRights);			
		}
		
			Session::flash('message', ' Bestel ingediend ..!');
			return redirect('admin/users/');		
	}
	
	
	public function GetRights($id) {
		
		$modules = DB::table('tblmodules')->select('*')->orderBy('name','ASC')->get();
	$selected = DB::table('tbl_modules_rights')->select('module_id')->where('user_id',$id)->get();
	echo $data = ' <table class="table table-bordered" style="text-align:center; font-size:12px;">
                        <thead>
                        <tr>
                       
                        <th  class="center">Rechten</th>
                        <th  class="center">Module</th>
                       
                        </tr>  
                        </thead>
                        <tbody>';
	foreach ($selected as $select) {
		
		$SelectedModules [] = $select->module_id;
		
		}
	
                                     foreach ($modules as $module) {
                                       echo ' <tr>
                       
                        <td  class="left"><input type="checkbox" name="modules[]" value="'.$module->id.'"'; 
									   if (!empty($SelectedModules) && in_array(@$module->id,@$SelectedModules)) {
										echo  'checked="checked"';
										 }; 
										echo ' ></td>';
										echo '<td  class="left">'.$module->name.'</td>';
										echo '</tr>';
                                         }                                    
                                echo ' </tbody>       
                                </table>'; 
		//return Response:: json($id);
		
		
		}
	
	public function delete($id) {
		
		$data = DB::table('users')->where('id', $id)->delete();	
		DB::table('tbl_modules_rights')->where('user_id', $id)->delete();	
		if ($data > 0) {
		Session::flash('message', ' User is met success verwijderd !');
		return redirect('admin/users');
		} 
	
	}
	
	public function Update (Request $request) {
		
		
		
		$Update = array (
						'name' => $request->name,
						'email' => $request->email,
						'group' => $request->group,
						'status' => $request->status
					);
		
		if (!empty($request->txt_password)) {
			$Update['password'] = Hash::make($request->txt_password);
			$Update['txt_password'] = $request->txt_password;	
		}
		
		
		DB::table('users')
			->where('id', $request->id)
            ->update($Update);
			
		Session::flash('message', ' Gebruiker is succesvol bijgewerkt !');
		return redirect('admin/users');
		
		}

	
	
	
}
