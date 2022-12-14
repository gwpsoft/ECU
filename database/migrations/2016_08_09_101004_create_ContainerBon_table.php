<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainerBonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblContainerBon', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('BonCard_No')->default(0)->nullable();
			$table->integer('Project_Id');
			$table->integer('BonNummer')->default(0)->nullable();
			$table->date('Sent_Date',20);
			$table->string('price',20);
			$table->string('size',20);
			$table->string('meterial',255);
			$table->string('Gewicht',40);
			$table->string('price_per',40);
			$table->string('transport_price',40);
			$table->string('All_price',40);
			$table->string('total',40);
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
        Schema::drop('tblContainerBon');
    }
}
