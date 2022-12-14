<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblemployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemployee', function (Blueprint $table) {
             $table->increments('id');
			$table->integer('Employmentagency_Id');
			$table->integer('Active');
			$table->integer('Gender');
			$table->string('Lastname',64);
			$table->string('Firstname',64);
			$table->string('Initials',8);
			$table->date('Birthday',20);
			$table->string('Sofinumber',32);
			$table->date('Startdate',20);
			$table->string('Id_Type',20);
			$table->string('Id_Number',32);
			$table->string('Id_Expirationdate',20);
			$table->string('Address',64);
			$table->string('Zipcode',32);
			$table->string('City',64);
			$table->string('Country',2);
			$table->string('Phone',16);
			$table->string('Mobile',16);
			$table->string('Mobile2',16);
			$table->string('Mobile3',16);
			$table->string('Email',64);
			$table->float('Rate');
			$table->float('Cost');
			$table->text('Notes');
			$table->string('Employmentagencynote',255);
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
        Schema::drop('tblemployee');
    }
}
