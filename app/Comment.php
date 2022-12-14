<?php



namespace App;
use DB;
use Session;
use Mail;
use Validator;


use Illuminate\Database\Eloquent\Model;



class Comment extends Model

{

    //

	

	public $table = "tblcomments";

	

	protected $fillable = [ 'comments', 'created_at', 'updated_at'];

	

		public function GetAllComments () {
	
		return DB::table('tblcomments')->select('id', 'comments')->orderBy('comments','ASC')->get();
	}

	

	

	public function scopeget() {

		

		$result = DB::table($table)->select('*')->get();

		return $result;

		}

}

