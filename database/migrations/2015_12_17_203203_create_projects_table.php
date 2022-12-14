<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblproject', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Department_Id');
			$table->integer('Projectmanager_Id');
			$table->integer('Contact_Id');
			$table->string('Name',64);
			$table->text('Description');
			$table->string('Fax',16);
			$table->string('Address',64);
			$table->string('Zipcode',32);
			$table->string('City',64);
			$table->integer('Active');
			$table->date('Start_Date');
			$table->date('End_Date');
			$table->float('Fixed');
			$table->float('Rate');
			$table->string('Project_ref',64);
			$table->string('Customer_ref',64);
			$table->string('weekcard',64);
			$table->text('AanTo');
			$table->text('CcTo');
			$table->string('City',64);
			$table->text('Notes');
			$table->integer('Customer_id');		
			$table->integer('Shippingcompany_id');
			//$table->integer('weekcard');			
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
        Schema::drop('projects');
    }
}
