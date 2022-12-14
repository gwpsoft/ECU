<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    //

	public $table = "tblproject";

	public function projectAttachments() {
		return $this->hasMany(ProjectAttachment::class, 'projects_id', 'Id');
	}

	public function department() {
		return $this->belongsTo(Department::class, 'Department_Id', 'Id');
	}

	protected $fillable = [ 'Name', 'Active','Customer_id', 'Department_Id', 'Contact_Id', 'Start_Date', 'End_Date', 'Projectmanager_Id', 'Description', 'Fixed', 'Rate','Project_Ref','Customer_Ref', 'Fax', 'Mobile2', 'Address', 'Zipcode', 'City','Goedkeuring','Notes','Container_Notes','weekcard','AanTo','CcTo','Shippingcompany_id','unit','Location','number_chain','price','number_times','purchase_price', 'created_at', 'updated_at'];


	public function scopeget() {

		$result = DB::table($table)->select('*')->get();
		return $result;
		}

		public function pricelists() {
			return $this->hasMany(ProjectPriceList::class, 'project_id', 'id');
		}

}
