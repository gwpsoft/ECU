<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketrateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMarketrate', function (Blueprint $table) {
            $table->increments('id');
			// Transportkosten containers met een inhoud van 3 m3 tot en met 10 m3
			$table->integer('Price_10m3')->default(0);
			//$table->string('Unit_10m3',16);			
			// Transportkosten containers met een inhoud van 15 m3 tot en met 40 m3
			$table->integer('Price_40m3')->default(0);
			//$table->string('Unit_40m3',16);
			// Bouw- en sloopafval (sorteerbaar)
			$table->integer('Price_sorteerbaar')->default(0);
			//$table->string('Unit_sorteerbaar',16);
			// Bouw- en sloopafval (niet sorteerbaar)
			$table->integer('Price_niet_sorteerbaar')->default(0);
			//$table->string('Unit_niet_sorteerbaar',16);
			// Bedrijfsafval
			$table->integer('Price_Bedrijfsafval')->default(0);
			//$table->string('Unit_Bedrijfsafval',16);
			// Gemengd hout (A- enlof B- hout)
			$table->integer('Price_A_B_hout')->default(0);
			//$table->string('Unit_A_B_hout',16);
			// C- hout
			$table->integer('Price_C_hout')->default(0);
			//$table->string('Unit_C_hout',16);
			// Schoon puin(< 60 cm)
			$table->integer('Price_Schoon_puin')->default(0);
			//$table->string('Unit_Schoon_puin',16);
			// Puin Grof (> 60 cm)
			$table->integer('Price_Puin_Grof')->default(0);
			//$table->string('Unit_Puin_Grof',16);
			// Puin met 10% tot 25% zand I grond
			$table->integer('Price_Puin_met_10')->default(0);
			//$table->string('Unit_Puin_met_10',16);
			// Puin met 25% of meer zand I grond
			$table->integer('Price_Puin_met_25')->default(0);
			//$table->string('Unit_Puin_met_25',16);
			// Asfaltpuin
			$table->integer('Price_Asfaltpuin')->default(0);
			//$table->string('Unit_Asfaltpuin',16);
			// Schoon Gips
			$table->integer('Price_Schoon_Gips')->default(0);
			//$table->string('Unit_Schoon_Gips',16);
			// Groenafval
			$table->integer('Price_Groenafval')->default(0);
			//$table->string('Unit_Groenafval',16);
			// Dakafval
			$table->integer('Price_Dakafval')->default(0);
			//$table->string('Unit_Dakafval',16);
			// Dakgrind
			$table->integer('Price_Dakgrind')->default(0);
			//$table->string('Unit_Dakgrind',16);
			// Schoon vlakglas
			$table->integer('Price_Schoon_vlakglas')->default(0);
			////$table->string('Unit_Schoon_vlakglas',16);
			// Opbrengsten metalen, per ton
			$table->integer('Price_Opbrengsten_metalen')->default(0);
			//$table->string('Unit_Opbrengsten_metalen',16);
			// Opbrengsten Papier & Karton, per ton
			$table->integer('Price_Opbrengsten_Papier')->default(0);
			//$table->string('Unit_Opbrengsten_Papier',16);	
			
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
        Schema::drop('tblMarketrate');
    }
}
