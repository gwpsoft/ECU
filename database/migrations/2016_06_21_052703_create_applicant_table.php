<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblapplicants', function (Blueprint $table) {
            $table->increments('id');
			$table->string('Surname',64);
			$table->string('FirstName',64);
			$table->text('Adress');
			$table->string('Postcode',32);
			$table->string('place',80);
			$table->date('Birthday',20);
			$table->integer('BSN_nummer',false,true)->length(64);
			$table->integer('Age',false,true)->length(10);
			$table->string('Marital_status',64)->default(0);
			$table->string('Nationality',64)->default(0);
			$table->string('Health_insurance',64);
			$table->string('Bank_Ac_Number',120)->default(0);
			$table->string('Health_insurance_number',120);
			$table->string('Mobiel_no',64)->default(0);
			$table->string('phone',64)->default(0);
			$table->string('available_at',120);
			$table->string('Dutch_proficiency',10);
			$table->string('VCA_certificate',10);
			$table->string('Willingness_to_achieve',10);
			$table->string('Within_3_months',10);
			$table->string('own_expense',10);
			$table->string('License',10);
			$table->string('Own_car',10);
			$table->text('Training_and_qualifications_1');
			$table->text('Training_and_qualifications_2');
			$table->text('Training_and_qualifications_3');			
			$table->text('Work_experience_1');
			$table->text('Work_experience_2');
			$table->text('Work_experience_3');
			$table->text('Work_experience_4');			
			$table->string('Concrete_finishing',5)->nullable();
			$table->string('Construction_Drawing_Reading',5)->nullable();
			$table->string('Gates_Places',10)->nullable();
			$table->string('demolition_work',10)->nullable();
			$table->string('Concrete_Formwork',10)->nullable();
			$table->string('Use_of_machines',10)->nullable();
			$table->string('Isolate',10)->nullable();
			$table->string('building_Scaffolding',10)->nullable();
			$table->string('Building_Deliveries',10)->nullable();
			$table->string('Glasbewassing',10)->nullable();
			$table->string('To_lead',10)->nullable();
			$table->string('Strut_and_stamping',10)->nullable();
			$table->string('Building_Cleaner',10)->nullable();
			$table->string('Earth_work',10)->nullable();
			$table->string('Lich_carpentry',10)->nullable();
			$table->string('Other_activities',10)->nullable();
			$table->string('zzp',10);
			$table->string('tarief',64);
			$table->string('possession',30);
			$table->date('Date_Interview',20);
			$table->string('subject_Job',164);
			$table->integer('employment_agency',false, true)->length(10);
			$table->string('our_Feature',164);
			$table->date('Starting_date',20);
			$table->string('first_project',100);
			$table->string('Emp_FirstName',64);
			$table->string('Emp_Surname',64);
			$table->string('Emp_Nationality',64);
			$table->string('Emp_Name_and_initial',64);
			$table->string('Emp_Deposit_Plaintiff_Vice_number',64);
			$table->string('Emp_Street_Address',164);
			$table->string('Emp_Postcode',64)->default(0);
			$table->string('Emp_residence',164);
			$table->string('Emp_Country_and_region',164);
			$table->date('Emp_Birthday',20);
			$table->integer('Emp_telephone',false,true)->length(64);
			$table->string('account_the_payroll_ja_tax',64)->nullable();
			$table->date('account_the_payroll_tax_ja_date',20);			
			$table->string('account_the_payroll_nee_tax',64)->nullable();
			$table->date('account_the_payroll_tax_nee_date',20);	
			 $table->integer('status')->default(0);		
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
        Schema::drop('tblapplicants');
    }
}
