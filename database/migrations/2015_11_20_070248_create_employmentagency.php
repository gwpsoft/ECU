<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentagency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemploymentagency', function (Blueprint $table) {
            $table->increments('id');
			$table->string('Name',64);
			$table->string('Address',64);
			$table->string('Zipcode',32);			
			$table->string('City',64);
			$table->string('Country',64);
			$table->integer('Phone');
			$table->integer('Fax');			
			$table->string('Email',64);
			$table->string('Contact1',64);
			$table->integer('Mobile1');
			$table->string('Contact2',64);			
			$table->integer('Mobile2');
			$table->string('Contact3',64);
			$table->integer('Mobile3');
			$table->text('Notes',64);
			 $table->timestamps();
           // $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblemploymentagency');
    }
}
