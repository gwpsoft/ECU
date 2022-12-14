<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblemploymentagencynotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemploymentagencynotes', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Employmentagency_Id');
			$table->integer('Weeknumber');
			$table->integer('Employee_Id');
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
        Schema::drop('tblemploymentagencynotes');
    }
}
