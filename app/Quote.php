<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
	
	public $table = "tblquote";
	
	protected $fillable = [ 'client_id', 'opdrachtgever', 'week_number', 'project_name','customer_project_nr','edu_project_nr', 'con_3m3','con_3m3_price', 'con_6m3','con_6m3_price','con_10m3','con_10m3_price','bouwopruimer','bouwopruimer_price','handyman','handyman_price','koffiedame','koffiedame_price','afvalagent','afvalagent_price','betonafwerker','betonafwerker_price','aanpiccalateur','aanpiccalateur_price','magazijnbeheerder','magazijnbeheerder_price','verkeersregelaar','verkeersregelaar_price','poortwachter','poortwachter_price','glazenwasser','glazenwasser_price','liftbot','liftbot_price','kantelsysteen','kantelsysteen_price','rolcontainers','rolcontainers_price','professionele','professionele_price','kwaliteitsbewaker','kwaliteitsbewaker_price','keetonderhoud','keetonderhoud_price','specialistisch','specialistisch_price','opleveringsschoonmaak','opleveringsschoonmaak_price','sloopweak','sloopweak_price','bouwplaats','bouwplaats_price','containerservice','containerservice_price','created_at', 'updated_at'];
	
	
	public function scopeget() {
		
		$result = DB::table($table)->select('*')->get();
		return $result;
		}
}
