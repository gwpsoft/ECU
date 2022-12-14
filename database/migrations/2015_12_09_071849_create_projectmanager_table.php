<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectmanagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprojectmanager', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Gender');
			$table->string('Lastname',64);			
			$table->string('Firstname',64);			
			$table->string('Initials',8);
			$table->integer('Phone');
			$table->string('Mobile',16);
			$table->string('Email',64);
			$table->text('Notes');			
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
        Schema::drop('projectmanager');
    }
}
