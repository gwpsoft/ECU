<?php

namespace App\Http\Controllers\admin;

use App\Comment;

use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use Request;
use Session;
use Validator;
use DB;
use Datatables;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       	
	$data = Comment::get();			
   	return View('admin.comments.allcomments')->with('data', $data);
   		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
			return view('admin.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        //
	
		$input = Comment::create($request->all());		
	 if (!empty($request->Save)) {
			Session::flash('message', 'Commentaar Ingevoegde!');
			return redirect('admin/edit_comment/'.$input->id);
			//return redirect('admin/weekcard');	
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', 'Commentaar Ingevoegde!');
		return redirect('admin/comments');
		}
		
		if (!empty($request->Save_New)) {
		Session::flash('message', 'Commentaar Ingevoegde!');
		return redirect('admin/create_comment');
		}
		
			
	/*Session::flash('message', 'Successfully Inserted Note!');
	return redirect('admin/notes');*/
    }
	
	 public function show($id)
    	{
        //		
		$Get_Comment = Comment::find($id);
		//DB::table('tblemployee')->where('id', $id)->first();
		return View('admin.comments.view')->with('data', $Get_Comment);		
    }
   
   public function edit($id)
    {
        //
		
		$Get_Comment = Comment::find($id);		
		return View('admin.comments.edit',compact('Get_Comment'));	
    }
	
	public function update(CommentRequest $request) {
		
		$post = $request->all();		
		$Get_Note = Comment::findOrfail($post['id']);
		$Get_Note->update($request->all());
		
		 if (!empty($request->Save)) {
			Session::flash('message', ' Commentaar bijgewerkt!');
			return redirect('admin/edit_comment/'.$post['id']);
			//return redirect('admin/weekcard');	
		}
		if (!empty($request->Save_Close)) {
		Session::flash('message', ' Commentaar bijgewerkt!');
		return redirect('admin/comments');
		}
		
		if (!empty($request->Save_New)) {
		Session::flash('message', ' Commentaar bijgewerkt!');
		return redirect('admin/create_comment');
		}
		
		/*Session::flash('message', ' Afspraken bijgewerkt!');
		return redirect('admin/notes');*/
		
		}
	
	public function delete($id) {
		
		$data = DB::table('tblcomments')->where('id', $id)->delete();	
		if ($data > 0) {
		Session::flash('message', ' verwijderde Noot !');
		return redirect('admin/comments');
		} 
	
	}
}
