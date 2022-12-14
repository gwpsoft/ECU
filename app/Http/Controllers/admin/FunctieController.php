<?php

namespace App\Http\Controllers\admin;
use App\Functie;
use App\Http\Requests\NoteRequest;
use App\Http\Controllers\Controller;
use Request;
use Input;
use Session;
use Validator;
use DB;
use Datatables;
class FunctieController extends Controller
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
   	return View('admin.functie.allfunctie_ajax');
   		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
			return view('admin.functie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
		//echo '<pre>';
	//print_r($request); die;
		$data = array (
					'code' => Input::get('code'),
					'name' => Input::get('name')
					);
		
		
		
		$input = Functie::create($data);		
	 	if (!empty(Input::get('Save'))) {
			Session::flash('message', ' Ingevoegde opmerking!');
			return redirect('admin/edit_functie/'.$input->id);
			//return redirect('admin/weekcard');	
		}
		if (!empty(Input::get('Save_Close'))) {
		Session::flash('message', ' Ingevoegde opmerking!');
		return redirect('admin/functie');
		}
		
		if (!empty(Input::get('Save_New'))) {
		Session::flash('message', ' Ingevoegde opmerking!');
		return redirect('admin/create_functie');
		}
		
			
	/*Session::flash('message', 'Successfully Inserted Note!');
	return redirect('admin/notes');*/
    }
	
	 public function edit($id)
    	{
        //		
		$Get_Functie = functie::find($id);
		//DB::table('tblemployee')->where('id', $id)->first();
		return View('admin.functie.edit')->with('data', $Get_Functie);		
    }
   
  /* public function show($id)
    {
        //
	
		$Get_Note = Functie::find($id);		
		return View('admin.functie.edit',compact('Get_Note'));	
    }*/
	
	public function update() {
		
		
		
		
		//print_r($_POST); die;
		$data = array (
					'code' => Input::get('code'),
					'name' => Input::get('name')
					);
		
		$id = Input::get('id');
		
		DB:: table( 'tblfunctie' )-> where( 'id' , '=' , $id)-> update( $data );
		
				
		//$Functie = Functie::findOrfail(Input::get('id'));
		//$Functie->update($data);
		
		 if (!empty(Input::get('Save'))) {
			Session::flash('message', ' Ingevoegde opmerking!');
			return redirect('admin/edit_functie/'.Input::get('id'));
			//return redirect('admin/weekcard');	
		}
		if (!empty(Input::get('Save_Close'))) {
		Session::flash('message', ' Ingevoegde opmerking!');
		return redirect('admin/functie');
		}
		
		if (!empty(Input::get('Save_New'))) {
		Session::flash('message', ' Ingevoegde opmerking!');
		return redirect('admin/create_functie');
		}		
		
		
		
		
		/*Session::flash('message', ' Afspraken bijgewerkt!');
		return redirect('admin/notes');*/
		
		}
	
	public function delete($id) {
		
		$data = DB::table('tblfunctie')->where('id', $id)->delete();	
		if ($data > 0) {
		Session::flash('message', ' verwijderde Noot !');
		return redirect('admin/functie');
		} 
	
	}
	
	function AllFunctie () {
		
		$data =DB::table('tblfunctie')->select('*');	
	 return Datatables::of($data)
	
	  ->addColumn('Opties' , function ($data) {
				return '<a href="edit_functie/'.$data->id.'" title="Bewerken" class="widget-icon">
				<span class="icon-pencil"></span></a>
				<a href="remove_Functie/'.$data->id.'" title="Verwijderen" class="widget-icon" onclick="deleteRecord();">
				<span class="icon-trash"></span></a>';
				 })
	  ->make(true);
	}
}
