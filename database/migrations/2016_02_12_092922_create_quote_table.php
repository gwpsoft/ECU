<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('tblquote', function (Blueprint $table) {
             $table->increments('id');
			 $table->integer('client_id');
			 $table->string('opdrachtgever',100);
			 $table->string('week_number',100);
			 $table->string('project_name',100);
			 $table->string('customer_project_nr',100);
			 $table->string('edu_project_nr',100);			 
			 $table->string('con_3m3',100);
			//$table->string('con_3m3_price',100);
			 $table->string('con_6m3',100);
			 //$table->string('con_6m3_price',100);
			 $table->string('con_10m3',100);
			// $table->string('con_10m3_price',100);
			 $table->string('bouwopruimer',100);
			// $table->string('bouwopruimer_price',100);
			 $table->string('handyman',100);
			// $table->string('handyman_price',100);
			 $table->string('koffiedame',100);
			// $table->string('koffiedame_price',100);
			 $table->string('afvalagent',100);
			// $table->string('afvalagent_price',100);
			 $table->string('betonafwerker',100);
			// $table->string('betonafwerker_price',100);
			 $table->string('aanpiccalateur',100);
		//	 $table->string('aanpiccalateur_price',100);
			 $table->string('magazijnbeheerder',100);
			// $table->string('magazijnbeheerder_price',100);
			 $table->string('verkeersregelaar',100);
			// $table->string('verkeersregelaar_price',100);
			 $table->string('poortwachter',100);
			// $table->string('poortwachter_price',100);
			 $table->string('glazenwasser',100);
			// $table->string('glazenwasser_price',100);
			 $table->string('liftbot',100);
			// $table->string('liftbot_price',100);
			 $table->string('kantelsysteen',100);
			// $table->string('kantelsysteen_price',100);
			 $table->string('rolcontainers',100);
			// $table->string('rolcontainers_price',100);
			 $table->string('professionele',100);
			// $table->string('professionele_price',100);
			 $table->string('kwaliteitsbewaker',100);
			// $table->string('kwaliteitsbewaker_price',100);
			 $table->string('keetonderhoud',100);
			// $table->string('keetonderhoud_price',100);
			 $table->string('specialistisch',100);
			// $table->string('specialistisch_price',100);
			 $table->string('opleveringsschoonmaak',100);
			// $table->string('opleveringsschoonmaak_price',100);
			 $table->string('sloopweak',100);
			/// $table->string('sloopweak_price',100);
			 $table->string('bouwplaats',100);
			// $table->string('bouwplaats_price',100);
			 $table->string('containerservice',100);
			// $table->string('containerservice_price',100);		
			 $table->timestamps();
		 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::drop('tblquote');
    }
}
