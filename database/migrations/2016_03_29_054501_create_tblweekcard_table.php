<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblweekcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblweekcard', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Weeknumber');
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
        Schema::drop('tblweekcard');
    }
}
