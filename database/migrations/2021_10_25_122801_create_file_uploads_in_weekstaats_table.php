<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


class CreateFileUploadsInWeekstaatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_uploads_in_weekstaats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('WeekNumber');
            $table->integer('ProjectId');
            $table->integer('PlanningId');
            $table->string('FileName');
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
        Schema::drop('file_uploads_in_weekstaats');
    }
}
