<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbldepartment', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('Customer_Id');
			$table->string('Name',64);
			$table->string('Address',64);
			$table->string('Zipcode',32);
			$table->string('City',64);
			$table->string('Country',64);
			$table->string('Mailbox',64);
			$table->string('MailboxZipcode',32);
			$table->string('MailboxCity',64);
			$table->string('Phone',16);
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
        Schema::drop('department');
    }
}
