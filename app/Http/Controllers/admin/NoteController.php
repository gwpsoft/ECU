<?php

namespace App\Http\Controllers\admin;
use App\Department;
use App\Projectmanager;
use App\Note;
use App\Projects;
use App\Http\Requests\NoteRequest;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use DB;
use Datatables;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       	
	/*$data = Note::get();		
	return View('admin.note.allnotes')->with('data', $data);*/
   	return View('admin.note.allnotes_ajax');
   		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=0)
    {
        //
			$DepartmentID = $id;
			
			$Departments = Department::get();
			$Projectmanager = Projectmanager::get();
			$Projects = Projects::get();
			return view('admin.note.create',compact('Departments','Projectmanager','Projects','DepartmentID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        //
	
		$input = Note::create($request->all());		
	 if (!empty($request->Save)) {
			Session::flash('message', ' Ingevoegde opmerking!');
			return redirect('admin/edit_note/'.$input->id);
			//return redirect('admin/weekcard');	
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Ingevoegde opmerking!');
		return redirect('admin/notes');
		}
		
		if (!empty($request->Save_New)) {
		Session::flash('message', ' Ingevoegde opmerking!');
		return redirect('admin/create_note');
		}
		
			
	/*Session::flash('message', 'Successfully Inserted Note!');
	return redirect('admin/notes');*/
    }
	
	 public function show($id)
    	{
        //		
		$Get_Note = Note::find($id);
		//DB::table('tblemployee')->where('id', $id)->first();
		return View('admin.note.view')->with('data', $Get_Note);		
    }
   
   public function edit($id)
    {
        //
		$Departments = Department::get();
			$Projectmanager = Projectmanager::get();
			$Projects = Projects::get();
		$Get_Note = Note::find($id);		
		return View('admin.note.edit',compact('Get_Note','Departments','Projectmanager','Projects'));	
    }
	
	public function update(NoteRequest $request) {
		
		$post = $request->all();		
		$Get_Note = Note::findOrfail($post['id']);
		$Get_Note->update($request->all());
		
		 if (!empty($request->Save)) {
			Session::flash('message', ' Afspraken bijgewerkt!');
			return redirect('admin/edit_note/'.$post['id']);
			//return redirect('admin/weekcard');	
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Afspraken bijgewerkt!');
		return redirect('admin/notes');
		}
		
		if (!empty($request->Save_New)) {
		Session::flash('message', ' Afspraken bijgewerkt!');
		return redirect('admin/create_note');
		}
		
		
		
		
		
		/*Session::flash('message', ' Afspraken bijgewerkt!');
		return redirect('admin/notes');*/
		
		}
	
	public function delete($id) {
		
		$data = DB::table('tblnote')->where('id', $id)->delete();	
		if ($data > 0) {
		Session::flash('message', ' verwijderde Noot !');
		return redirect('admin/notes');
		} 
	
	}
	
	function AllNotes () {
		
		$data =DB::table('v_notes')->select('*');	
	 return Datatables::of($data)
	
	  ->addColumn('Opties' , function ($data) {
				return '<a href="view_note/'.$data->Id.'" title="Inzicht" class="widget-icon">
				<span class="icon-eye-open"></span></a>
                <a href="edit_note/'.$data->Id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="delete_note/'.$data->Id.'" title="verwijderen" class="widget-icon" onclick="deleteRecord();">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);
	}
}
