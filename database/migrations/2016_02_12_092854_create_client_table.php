<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		 Schema::create('tblclients', function (Blueprint $table) {
             $table->increments('id');
			 $table->string('username',32);
			 $table->string('password',100);
			 $table->string('email',64);
			 $table->string('phone',16);
			 $table->string('display_name',64);
			 $table->integer('status');
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
		 Schema::drop('tblclients');
    }
}
