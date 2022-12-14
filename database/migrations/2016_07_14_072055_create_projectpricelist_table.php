<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectpricelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblprojectpricelist', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('project_id')->default(0);
			$table->integer('Shippingcompany_id');
			
			//Prijslijst All-in
			$table->integer('pr_3m3_bsa')->default(0);
			$table->integer('pr_3m3_hout')->default(0);
			$table->integer('pr_3m3_puin')->default(0);
			$table->integer('pr_6m3_bsa')->default(0);
			$table->integer('pr_6m3_hout')->default(0);
			$table->integer('pr_6m3_puin')->default(0);
			$table->integer('pr_10m3_bsa')->default(0);
			$table->integer('pr_10m3_hout')->default(0);
			$table->integer('pr_10m3_puin')->default(0);
			$table->integer('pr_20m3_bsa')->default(0);
			$table->integer('pr_20m3_hout')->default(0);
			$table->integer('pr_20m3_puin')->default(0);			
			
			//Prijslijst
			// Transportkosten containers met een inhoud van 3 m3 tot en met 10 m3
			$table->string('article_no_10m3',16);
			$table->integer('Price_10m3')->default(0);
			$table->integer('sale_Price_10m3')->default(0);
			$table->string('Unit_10m3',16);			
			// Transportkosten containers met een inhoud van 15 m3 tot en met 40 m3
			$table->string('article_no_40m3',16);
			$table->integer('Price_40m3')->default(0);
			$table->integer('sale_Price_40m3')->default(0);
			$table->string('Unit_40m3',16);
			// Bouw- en sloopafval (sorteerbaar) 
			$table->string('article_no_sorteerbaar',16);
			$table->integer('Price_sorteerbaar')->default(0);
			$table->integer('sale_Price_sorteerbaar')->default(0);
			$table->string('Unit_sorteerbaar',16);
			// Bouw- en sloopafval (niet sorteerbaar) 
			$table->string('article_no_niet_sorteerbaar',16);
			$table->integer('Price_niet_sorteerbaar')->default(0);
			$table->integer('sale_Price_niet_sorteerbaar')->default(0);
			$table->string('Unit_niet_sorteerbaar',16);
			// Bedrijfsafval 
			$table->string('article_no_Bedrijfsafval',16);
			$table->integer('Price_Bedrijfsafval')->default(0);
			$table->integer('sale_Price_Bedrijfsafval')->default(0);
			$table->string('Unit_Bedrijfsafval',16);
			// Gemengd hout (A- enlof B- hout)  
			$table->string('article_no_A_B_hout',16);
			$table->integer('Price_A_B_hout')->default(0);
			$table->integer('sale_Price_A_B_hout')->default(0);
			$table->string('Unit_A_B_hout',16);
			// C- hout   
			$table->string('article_no_C_hout',16);
			$table->integer('Price_C_hout')->default(0);
			$table->integer('sale_Price_C_hout')->default(0);
			$table->string('Unit_C_hout',16);
			// Schoon puin(< 60 cm)    
			$table->string('article_no_Schoon_puin',16);
			$table->integer('Price_Schoon_puin')->default(0);
			$table->integer('sale_Price_Schoon_puin')->default(0);
			$table->string('Unit_Schoon_puin',16);
			// Puin Grof (> 60 cm)    
			$table->string('article_no_Puin_Grof',16);
			$table->integer('Price_Puin_Grof')->default(0);
			$table->integer('sale_Price_Puin_Grof')->default(0);
			$table->string('Unit_Puin_Grof',16);
			// Puin met 10% tot 25% zand I grond     
			$table->string('article_no_Puin_met_10',16);
			$table->integer('Price_Puin_met_10')->default(0);
			$table->integer('sale_Price_Puin_met_10')->default(0);
			$table->string('Unit_Puin_met_10',16);
			// Puin met 25% of meer zand I grond      
			$table->string('article_no_Puin_met_25',16);
			$table->integer('Price_Puin_met_25')->default(0);
			$table->integer('sale_Price_Puin_met_25')->default(0);
			$table->string('Unit_Puin_met_25',16);
			// Asfaltpuin      
			$table->string('article_no_Asfaltpuin',16);
			$table->integer('Price_Asfaltpuin')->default(0);
			$table->integer('sale_Price_Asfaltpuin')->default(0);
			$table->string('Unit_Asfaltpuin',16);
			// Schoon Gips       
			$table->string('article_no_Schoon_Gips',16);
			$table->integer('Price_Schoon_Gips')->default(0);
			$table->integer('sale_Price_Schoon_Gips')->default(0);
			$table->string('Unit_Schoon_Gips',16);
			// Groenafval       
			$table->string('article_no_Groenafval',16);
			$table->integer('Price_Groenafval')->default(0);
			$table->integer('sale_Price_Groenafval')->default(0);
			$table->string('Unit_Groenafval',16);
			// Dakafval       
			$table->string('article_no_Dakafval',16);
			$table->integer('Price_Dakafval')->default(0);
			$table->integer('sale_Price_Dakafval')->default(0);
			$table->string('Unit_Dakafval',16);
			// Dakgrind       
			$table->string('article_no_Dakgrind',16);
			$table->integer('Price_Dakgrind')->default(0);
			$table->integer('sale_Price_Dakgrind')->default(0);
			$table->string('Unit_Dakgrind',16);
			// Schoon vlakglas        
			$table->string('article_no_Schoon_vlakglas',16);
			$table->integer('Price_Schoon_vlakglas')->default(0);
			$table->integer('sale_Price_Schoon_vlakglas')->default(0);
			$table->string('Unit_Schoon_vlakglas',16);
			// Opbrengsten metalen, per ton         
			$table->string('article_no_Opbrengsten_metalen',16);
			$table->integer('Price_Opbrengsten_metalen')->default(0);
			$table->integer('sale_Price_Opbrengsten_metalen')->default(0);
			$table->string('Unit_Opbrengsten_metalen',16);
			// Opbrengsten Papier & Karton, per ton         
			$table->string('article_no_Opbrengsten_Papier',16);
			$table->integer('Price_Opbrengsten_Papier')->default(0);
			$table->integer('sale_Price_Opbrengsten_Papier')->default(0);
			$table->string('Unit_Opbrengsten_Papier',16);
			
			// Extra Fields 1         
			$table->string('article_no_field1',16);
			$table->string('description_field1',500);
			$table->integer('Price_field1')->default(0);
			$table->integer('sale_Price_field1')->default(0);
			$table->string('Unit_field1',16);
			// Extra Fields 2         
			$table->string('article_no_field2',16);
			$table->string('description_field2',500);
			$table->integer('Price_field2')->default(0);
			$table->integer('sale_Price_field2')->default(0);
			$table->string('Unit_field2',16);
			// Extra Fields 3          
			$table->string('article_no_field3',16);
			$table->string('description_field3',500);
			$table->integer('Price_field3')->default(0);
			$table->integer('sale_Price_field3')->default(0);
			$table->string('Unit_field3',16);
			// Extra Fields 4         
			$table->string('article_no_field4',16);
			$table->string('description_field4',500);
			$table->integer('Price_field4')->default(0);
			$table->integer('sale_Price_field4')->default(0);
			$table->string('Unit_field4',16);	
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
        Schema::drop('tblprojectpricelist');
    }
}
