<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblmessages', function (Blueprint $table) {
            $table->increments('msg_id');
			$table->integer('client_id');
			$table->integer('project_id');
			$table->integer('sender_id');
			$table->text('message');
			$table->integer('admin_view')->default(0);
			$table->integer('user_view')->default(0);
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
        Schema::drop('tblmessages');
    }
}
