<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbltimecardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbltimecard', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Weekcard_Id');
			$table->integer('Employee_Id');
			$table->float('Mon');
			$table->float('Tue');
			$table->float('Wed');
			$table->float('Thu');
			$table->float('Fri');
			$table->float('Sat');
			$table->float('Sun');
			$table->float('Rate');
			$table->float('Rate_Cost');
			$table->tinyInteger('Billable');
			$table->text('Notes');
			$table->integer('Employmentagency_id');		
			
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
        Schema::drop('tbltimecard');
    }
}
