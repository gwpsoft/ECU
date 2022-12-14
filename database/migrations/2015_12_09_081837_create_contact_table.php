<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcontact', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Department_Id');
			$table->integer('Gender');
			$table->string('Lastname',64);
			$table->string('Firstname',64);
			$table->string('Initials',8);			
			$table->string('Jobtitle',64);
			$table->string('Phone',16);
			$table->string('Phone_Private',16);
			$table->string('Mobile',16);
			$table->string('Mobile2',16);
			$table->string('Mobile3',16);
			$table->string('Fax',16);
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
        Schema::drop('contact');
    }
}
