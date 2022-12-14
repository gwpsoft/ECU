<?php

namespace App\Http\Controllers\admin;
use App\Functie;
use App\Status;
use App\Http\Requests\NoteRequest;
use App\Http\Controllers\Controller;
use Request;
use Input;
use Session;
use Validator;
use DB;
use Datatables;


class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return View('admin.status.allstatus_ajax');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = array (
              'code' => Input::get('code'),
              'name' => Input::get('name')
              );


              $input = Status::create($data);
              if (!empty(Input::get('Save'))) {
                Session::flash('message', ' Ingevoegde opmerking!');
                return redirect('admin/edit_status/'.$input->id);
                //return redirect('admin/weekcard');
              }
              if (!empty(Input::get('Save_Close'))) {
              Session::flash('message', ' Ingevoegde opmerking!');
              return redirect('admin/status');
              }

              if (!empty(Input::get('Save_New'))) {
              Session::flash('message', ' Ingevoegde opmerking!');
              return redirect('admin/create_status');
              }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Get_Status = status::find($id);
        //DB::table('tblemployee')->where('id', $id)->first();
        return View('admin.status.edit')->with('data', $Get_Status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        $data = array (
              'code' => Input::get('code'),
              'name' => Input::get('name'),
              'active' => Input::get('active')
              );

      //dd($data);
        $id = Input::get('id');

        DB:: table( 'tblstatus' )-> where( 'id' , '=' , $id)-> update( $data );


        //$Functie = Functie::findOrfail(Input::get('id'));
        //$Functie->update($data);

         if (!empty(Input::get('Save'))) {
          Session::flash('message', ' Ingevoegde opmerking!');
          return redirect('admin/edit_status/'.Input::get('id'));
          //return redirect('admin/weekcard');
        }
        if (!empty(Input::get('Save_Close'))) {
        Session::flash('message', ' Ingevoegde opmerking!');
        return redirect('admin/status');
        }

        if (!empty(Input::get('Save_New'))) {
        Session::flash('message', ' Ingevoegde opmerking!');
        return redirect('admin/create_status');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
    public function delete($id)
    {
        //
        $data = DB::table('tblstatus')->where('id', $id)->delete();
    		if ($data > 0) {
    		Session::flash('message', ' verwijderde Noot !');
    		return redirect('admin/status');
      }
    }
    function AllStatus () {

  		$data =DB::table('tblstatus')->select('*');
  	 return Datatables::of($data)
     ->addColumn('active' , function ($data) {
       if($data->active==1)
       {
         return '<input type="checkbox" checked="checked" disabled="disabled" class="checkbox-inline">';
       }
       else if ($data->active==0){
         return '<input type="checkbox" disabled="disabled" class="checkbox-inline">';
       }
          })

  	  ->addColumn('Opties' , function ($data) {
  				return '<a href="edit_status/'.$data->id.'" title="Bewerken" class="widget-icon">
  				<span class="icon-pencil"></span></a>';
  				 })
  	  ->make(true);
  	}
}
