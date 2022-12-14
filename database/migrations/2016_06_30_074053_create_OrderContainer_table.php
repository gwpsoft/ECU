<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderContainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblOrderContainer', function (Blueprint $table) {
            $table->increments('id');
			$table->bigInteger('shippingcompany_id')->length(64)->default(0);
			$table->string('Email',30)->nullable();
			$table->bigInteger('Fax')->length(64)->default(0);
			$table->date('Order_Date');
			$table->time('time');
			$table->bigInteger('Rev_Nummer')->length(64)->default(0);
			$table->bigInteger('Nummer')->length(64)->default(0);			
			$table->bigInteger('Customer_id')->length(64)->default(0);
			$table->string('Customer_Name',100)->nullable();
			$table->string('ECU_Project_nr')->length(64)->default(0);
			$table->string('Projectnummer')->length(64)->default(0);
			$table->string('project_name',100)->nullable();
			$table->string('Work_Address',400)->nullable();
			$table->string('Postcode',20)->nullable();
			$table->string('Contact',100)->nullable();
			$table->bigInteger('phone_number')->length(64)->default(0);
			$table->date('output_Date');
			$table->bigInteger('Half_day_time')->length(64)->default(0);
			$table->string('Comments',400)->nullable();
			$table->integer('Status')->length(64)->default(0);
			
			$table->bigInteger('3m3_plaats')->length(64)->default(0);
			$table->bigInteger('3m3_Wissel')->length(64)->default(0);
			$table->bigInteger('3m3_Afvoer')->length(64)->default(0);
			$table->bigInteger('3m3_Bsa')->length(64)->default(0);
			$table->bigInteger('3m3_Puin')->length(64)->default(0);
			$table->bigInteger('3m3_Hout')->length(64)->default(0);
			$table->bigInteger('3m3_Diverse')->length(64)->default(0);
			$table->bigInteger('3m3_Plastic_Folie')->length(64)->default(0);
			$table->bigInteger('3m3_Papier')->length(64)->default(0);
			$table->string('3m3_Opmerkingen',400)->nullable();
			
			$table->bigInteger('6m3_plaats')->length(64)->default(0);
			$table->bigInteger('6m3_Wissel')->length(64)->default(0);
			$table->bigInteger('6m3_Afvoer')->length(64)->default(0);
			$table->bigInteger('6m3_Bsa')->length(64)->default(0);
			$table->bigInteger('6m3_Puin')->length(64)->default(0);
			$table->bigInteger('6m3_Hout')->length(64)->default(0);
			$table->bigInteger('6m3_Diverse')->length(64)->default(0);
			$table->bigInteger('6m3_Plastic_Folie')->length(64)->default(0);
			$table->bigInteger('6m3_Papier')->length(64)->default(0);
			$table->string('6m3_Opmerkingen',400)->nullable();
			
			$table->bigInteger('10m3_plaats')->length(64)->default(0);
			$table->bigInteger('10m3_Wissel')->length(64)->default(0);
			$table->bigInteger('10m3_Afvoer')->length(64)->default(0);
			$table->bigInteger('10m3_Bsa')->length(64)->default(0);
			$table->bigInteger('10m3_Puin')->length(64)->default(0);
			$table->bigInteger('10m3_Hout')->length(64)->default(0);
			$table->bigInteger('10m3_Diverse')->length(64)->default(0);
			$table->bigInteger('10m3_Plastic_Folie')->length(64)->default(0);
			$table->bigInteger('10m3_Papier')->length(64)->default(0);
			$table->string('10m3_Opmerkingen',400)->nullable();
			
			$table->bigInteger('10m3_plaats_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Wissel_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Afvoer_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Bsa_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Puin_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Hout_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Diverse_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Plastic_Folie_dicht')->length(64)->default(0);
			$table->bigInteger('10m3_Papier_dicht')->length(64)->default(0);
			$table->string('10m3_Opmerkingen_dicht',400)->nullable();
			
			$table->bigInteger('20m3_plaats')->length(64)->default(0);
			$table->bigInteger('20m3_Wissel')->length(64)->default(0);
			$table->bigInteger('20m3_Afvoer')->length(64)->default(0);
			$table->bigInteger('20m3_Bsa')->length(64)->default(0);
			$table->bigInteger('20m3_Puin')->length(64)->default(0);
			$table->bigInteger('20m3_Hout')->length(64)->default(0);
			$table->bigInteger('20m3_Diverse')->length(64)->default(0);
			$table->bigInteger('20m3_Plastic_Folie')->length(64)->default(0);
			$table->bigInteger('20m3_Papier')->length(64)->default(0);
			$table->string('20m3_Opmerkingen',400)->nullable();
			
			$table->bigInteger('40m3_plaats')->length(64)->default(0);
			$table->bigInteger('40m3_Wissel')->length(64)->default(0);
			$table->bigInteger('40m3_Afvoer')->length(64)->default(0);
			$table->bigInteger('40m3_Bsa')->length(64)->default(0);
			$table->bigInteger('40m3_Puin')->length(64)->default(0);
			$table->bigInteger('40m3_Hout')->length(64)->default(0);
			$table->bigInteger('40m3_Diverse')->length(64)->default(0);
			$table->bigInteger('40m3_Plastic_Folie')->length(64)->default(0);
			$table->bigInteger('40m3_Papier')->length(64)->default(0);
			$table->string('40m3_Opmerkingen',400)->nullable();
			$table->string('sender_name',70)->nullable();
			$table->integer('email_sent')->length(64)->default(0);
			
            $table->timestamps();
			/*$statement = "
                    ALTER TABLE `tblOrderContainer` AUTO_INCREMENT = 100;
                ";

    DB::unprepared($statement);*/
			
			
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('OrderContainer');
    }
}
