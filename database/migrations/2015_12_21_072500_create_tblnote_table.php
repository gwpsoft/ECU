<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblnoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnote', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Projectmanager_Id');
			$table->dateTime('Datetime');
			$table->string('Contact',64);
			$table->enum('Type', array('phonecall', 'visit', 'email'));
			$table->Text('Text');
			$table->integer('Department_Id');
			$table->integer('Project_Id');			
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
        Schema::drop('tblnote');
    }
}
