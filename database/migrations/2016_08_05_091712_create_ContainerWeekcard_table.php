<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainerWeekcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcontainerweekcard', function (Blueprint $table) {
            $table->increments('id');
			$table->date('From_Date',20);
			$table->date('To_Date',20);
			$table->integer('Nummer')->default(0)->nullable();
			//$table->integer('Weeknumber');
			$table->integer('Project_Id');
			$table->date('Sent_Date',20);
			$table->date('Received_Date',20);
			$table->integer('Checked')->default(0)->nullable();
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
        Schema::drop('tblcontainerweekcard');
    }
}
