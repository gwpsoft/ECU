<?php

namespace App;
use Validator;
use DB;
use Illuminate\Database\Eloquent\Model;

class Shippingcompany extends Model
{
    //
	public $table = "tblshippingcompany";
	
	protected $fillable = [ 'Code','Companyname', 'Address', 'Zipcode', 'City', 'Country', 'Phone', 'Mobile', 'Mobile2', 'Fax', 'Email','Email_planniing','pr_3m3_bsa','pr_3m3_hout','pr_3m3_puin','pr_6m3_bsa','pr_6m3_hout','pr_6m3_puin','pr_10m3_bsa','pr_10m3_hout','pr_10m3_puin','pr_20m3_bsa','pr_20m3_hout','pr_20m3_puin','article_no_10m3', 'Price_10m3','Unit_10m3','article_no_40m3','Price_40m3','Unit_40m3','article_no_sorteerbaar','Price_sorteerbaar','Unit_sorteerbaar',			
'article_no_niet_sorteerbaar','Price_niet_sorteerbaar','Unit_niet_sorteerbaar',	'article_no_Bedrijfsafval',	'Price_Bedrijfsafval','Unit_Bedrijfsafval',			
'article_no_A_B_hout','Price_A_B_hout',	'Unit_A_B_hout','article_no_C_hout','Price_C_hout','Unit_C_hout','article_no_Schoon_puin','Price_Schoon_puin',			'Unit_Schoon_puin',	'article_no_Puin_Grof','Price_Puin_Grof','Unit_Puin_Grof','article_no_Puin_met_10',	'Price_Puin_met_10','Unit_Puin_met_10',	'article_no_Puin_met_25','Price_Puin_met_25','Unit_Puin_met_25','article_no_Asfaltpuin','Price_Asfaltpuin',	'Unit_Asfaltpuin','article_no_Schoon_Gips',
'Price_Schoon_Gips','Unit_Schoon_Gips','article_no_Groenafval',	'Price_Groenafval',	'Unit_Groenafval','article_no_Dakafval','Price_Dakafval',
'Unit_Dakafval', 'article_no_Dakgrind',	'Price_Dakgrind','Unit_Dakgrind','article_no_Schoon_vlakglas','Price_Schoon_vlakglas','Unit_Schoon_vlakglas','article_no_Opbrengsten_metalen','Price_Opbrengsten_metalen','Unit_Opbrengsten_metalen','article_no_Opbrengsten_Papier','Price_Opbrengsten_Papier',
'Unit_Opbrengsten_Papier','article_no_field1','description_field1','Price_field1','Unit_field1','article_no_field2','description_field2',			'Price_field2','Unit_field2','article_no_field3','description_field3','Price_field3','Unit_field3','article_no_field4','description_field4',			'Price_field4','Unit_field4'];
	
	public function scopeget() {
		
		$result = DB::table('tblshippingcompany')->select('*')->get();
		return $result;
		}
	
	
	
	
	
	public function GetAll() {
	
		return DB::table('tblshippingcompany')->orderBy('id','DESC')->get();
	}
	
	
	
	
	
}
