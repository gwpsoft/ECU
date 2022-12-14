<!-- Header -->
    @include('admin/header')
     <meta name="csrf-token" content="{{csrf_token()}}" />
     <title>Project bewerken - Hello1 . . . .</title>
<style>
.checker {float:right !important; }
.error { color:#fff; }
.center { text-align:center;}
.left { text-align:left}
label { font-size:13px;}
table th,td { font-size:12px;}
div.radio { margin-left:0px;} .strong { font-weight:bold; font-size:14px;}
div.checker, div.checker span, div.checker input, div.radio, div.radio span, div.radio input { vertical-align:text-bottom;}
</style>

<script>
  $(document).ready(function(){


$('#Active').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
       // alert('is checked');
    } else {
		$(this).val('0');
       // alert('is not checked');
    }
});


$('#per_project').click(function () {
	$('#number').hide();
});

$('#per_stand').click(function () {
	$('#number').show();
});


$('#per_uur').click(function () {
	$('#number_times').hide();
	$('#eenheid').hide();
	$('#number').hide();
});

$('#per_keer').click(function () {
	$('#number_times').show();
	$('#eenheid').show();
	$('#number').show();
});




 });

$(document).ready(function() {
	$('select#Shippingcompany_id').on('change', function() {

		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Shippingcompany_id = $('select#Shippingcompany_id').val();
		$.get("<?php echo URL:: to( 'admin/Getprices'); ?>/" + Shippingcompany_id,function(data) {

		$('#article_no_10m3').val(data.article_no_10m3);
		$('#Price_10m3').val(data.Price_10m3);
		$('#sale_Price_10m3').val(data.Price_10m3);


		$('#Unit_10m3').val(data.Unit_10m3);
		$('#article_no_40m3').val(data.article_no_40m3);
		$('#Price_40m3').val(data.Price_40m3);
		$('#sale_Price_40m3').val(data.Price_40m3);

		$('#Unit_40m3').val(data.Unit_40m3);
		$('#article_no_sorteerbaar').val(data.article_no_sorteerbaar);
		$('#Price_sorteerbaar').val(data.Price_sorteerbaar);
		$('#sale_Price_sorteerbaar').val(data.Price_sorteerbaar);

		$('#Unit_sorteerbaar').val(data.Unit_sorteerbaar);
		$('#article_no_niet_sorteerbaar').val(data.article_no_niet_sorteerbaar);
		$('#Price_niet_sorteerbaar').val(data.Price_niet_sorteerbaar);
		$('#sale_Price_niet_sorteerbaar').val(data.Price_niet_sorteerbaar);

		$('#Unit_niet_sorteerbaar').val(data.Unit_niet_sorteerbaar);
		$('#article_no_Bedrijfsafval').val(data.article_no_Bedrijfsafval);
		$('#Price_Bedrijfsafval').val(data.Price_Bedrijfsafval);
		$('#sale_Price_Bedrijfsafval').val(data.Price_Bedrijfsafval);

		$('#Unit_Bedrijfsafval').val(data.Unit_Bedrijfsafval);
		$('#article_no_A_B_hout').val(data.article_no_A_B_hout);
		$('#Price_A_B_hout').val(data.Price_A_B_hout);
		$('#sale_Price_A_B_hout').val(data.Price_A_B_hout);

		$('#Unit_A_B_hout').val(data.Unit_A_B_hout);
		$('#article_no_C_hout').val(data.article_no_C_hout);
		$('#Price_C_hout').val(data.Price_C_hout);
		$('#sale_Price_C_hout').val(data.Price_C_hout);

		$('#Unit_C_hout').val(data.Unit_C_hout);
		$('#article_no_Schoon_puin').val(data.article_no_Schoon_puin);
		$('#Price_Schoon_puin').val(data.Price_Schoon_puin);
		$('#sale_Price_Schoon_puin').val(data.Price_Schoon_puin);

		$('#Unit_Schoon_puin').val(data.Unit_Schoon_puin);
		$('#article_no_Puin_Grof').val(data.article_no_Puin_Grof);
		$('#Price_Puin_Grof').val(data.Price_Puin_Grof);
		$('#sale_Price_Puin_Grof').val(data.Price_Puin_Grof);


		$('#Unit_Puin_Grof').val(data.Unit_Puin_Grof);
		$('#article_no_Puin_met_10').val(data.article_no_Puin_met_10);
		$('#Price_Puin_met_10').val(data.Price_Puin_met_10);
		$('#sale_Price_Puin_met_10').val(data.Price_Puin_met_10);


		$('#Unit_Puin_met_10').val(data.Unit_Puin_met_10);
		$('#article_no_Puin_met_25').val(data.article_no_Puin_met_25);
		$('#Price_Puin_met_25').val(data.Price_Puin_met_25);
		$('#sale_Price_Puin_met_25').val(data.Price_Puin_met_25);


		$('#Unit_Puin_met_25').val(data.Unit_Puin_met_25);
		$('#article_no_Asfaltpuin').val(data.article_no_Asfaltpuin);
		$('#Price_Asfaltpuin').val(data.Price_Asfaltpuin);
		$('#sale_Price_Asfaltpuin').val(data.Price_Asfaltpuin);

		$('#Unit_Asfaltpuin').val(data.Unit_Asfaltpuin);
		$('#article_no_Schoon_Gips').val(data.article_no_Schoon_Gips);
		$('#Price_Schoon_Gips').val(data.Price_Schoon_Gips);
		$('#sale_Price_Schoon_Gips').val(data.Price_Schoon_Gips);

		$('#Unit_Schoon_Gips').val(data.Unit_Schoon_Gips);
		$('#article_no_Groenafval').val(data.article_no_Groenafval);
		$('#Price_Groenafval').val(data.Price_Groenafval);
		$('#sale_Price_Groenafval').val(data.Price_Groenafval);

		$('#Unit_Groenafval').val(data.Unit_Groenafval);
		$('#article_no_Dakafval').val(data.article_no_Dakafval);
		$('#Price_Dakafval').val(data.Price_Dakafval);
		$('#sale_Price_Dakafval').val(data.Price_Dakafval);

		$('#Unit_Dakafval').val(data.Unit_Dakafval);
		$('#article_no_Dakgrind').val(data.article_no_Dakgrind);
		$('#Price_Dakgrind').val(data.Price_Dakgrind);
		$('#sale_Price_Dakgrind').val(data.Price_Dakgrind);

		$('#Unit_Dakgrind').val(data.Unit_Dakgrind);
		$('#article_no_Schoon_vlakglas').val(data.article_no_Schoon_vlakglas);
		$('#Price_Schoon_vlakglas').val(data.Price_Schoon_vlakglas);
		$('#sale_Price_Schoon_vlakglas').val(data.Price_Schoon_vlakglas);

		$('#Unit_Schoon_vlakglas').val(data.Unit_Schoon_vlakglas);
		$('#article_no_Opbrengsten_metalen').val(data.article_no_Opbrengsten_metalen);
		$('#Price_Opbrengsten_metalen').val(data.Price_Opbrengsten_metalen);
		$('#sale_Price_Opbrengsten_metalen').val(data.Price_Opbrengsten_metalen);

		$('#Unit_Opbrengsten_metalen').val(data.Unit_Opbrengsten_metalen);
		$('#article_no_Opbrengsten_Papier').val(data.article_no_Opbrengsten_Papier);
		$('#Price_Opbrengsten_Papier').val(data.Price_Opbrengsten_Papier);
		$('#sale_Price_Opbrengsten_Papier').val(data.Price_Opbrengsten_Papier);

		$('#Unit_Opbrengsten_Papier').val(data.Unit_Opbrengsten_Papier);
		// Extra Fileds
		$('#article_no_field1').val(data.article_no_field1);
		$('#description_field1').val(data.description_field1);
		$('#Price_field1').val(data.Price_field1);
		$('#sale_Price_field1').val(data.Price_field1);

		$('#Unit_field1').val(data.Unit_field1);
		$('#article_no_field2').val(data.article_no_field2);
		$('#description_field2').val(data.description_field2);
		$('#Price_field2').val(data.Price_field2);
		$('#sale_Price_field2').val(data.Price_field2);

		$('#Unit_field2').val(data.Unit_field2);
		$('#article_no_field3').val(data.article_no_field3);
		$('#description_field3').val(data.description_field3);
		$('#Price_field3').val(data.Price_field3);
		$('#sale_Price_field3').val(data.Price_field3);

		$('#Unit_field3').val(data.Unit_field3);
		$('#article_no_field4').val(data.article_no_field4);
		$('#description_field4').val(data.description_field4);
		$('#Price_field4').val(data.Price_field4);
		$('#sale_Price_field4').val(data.Price_field4);

		$('#Unit_field4').val(data.Unit_field4);

		// Price List All in one
		$('#pr_3m3_bsa').val(data.pr_3m3_bsa);
		$('#pr_3m3_hout').val(data.pr_3m3_hout);
		$('#pr_3m3_puin').val(data.pr_3m3_puin);
		$('#pr_6m3_bsa').val(data.pr_6m3_bsa);
		$('#pr_6m3_hout').val(data.pr_6m3_hout);
		$('#pr_6m3_puin').val(data.pr_6m3_puin);
		$('#pr_10m3_bsa').val(data.pr_10m3_bsa);
		$('#pr_10m3_hout').val(data.pr_10m3_hout);
		$('#pr_10m3_puin').val(data.pr_10m3_puin);
		$('#pr_20m3_bsa').val(data.pr_20m3_bsa);
		$('#pr_20m3_hout').val(data.pr_20m3_hout);
		$('#pr_20m3_puin').val(data.pr_20m3_puin);
		});

	});


	$('select#customer_id').on('change', function() {

		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var customer_id = $('select#customer_id').val();
		$.get('<?php echo URL:: to( 'admin/Getdepartment'); ?>/' + customer_id,function(data) {
		$('#department_id').html(data);

		});

	});




	$('select#department_id').on('change', function() {

		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var department_id = $('select#department_id').val();
		$.get('<?php echo URL:: to( 'admin/GetContacts'); ?>/' + department_id,function(data) {
		$('#contact_id').html(data);
		});

	});

});

</script>

<?php
/*echo '<pre>';
 print_r($Get_project);
die;*/

?>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Project bewerken</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'admin/update_project']) !!}
   <div class="col-md-12">
      <input type="hidden" name="id" value="{{$Get_project->Id}}" />
  @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-6">

                <div class="block">
                    <div class="header">
                       <h2>Project gegevens</h2>
                    </div>
                    <div class="content controls">
                    <div class="form-row">
                            <div class="col-md-4">Naam:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Naam" name="name" value="{{ $Get_project->Name}}">
                                  <span class="error">  {{ $errors->first( 'name' , ':message' ) }}</span>
                            </div>

                        </div>

                        <div class="form-row">
                          <div class="col-md-4">Klant:</div>
                            <div class="col-md-7">
                            		<select class="form-control" name="customer_id" id="customer_id">
                                    <option value="">Select Klant</option>
                                      @foreach ($customers as $customer)
                                      <option value="{!! @$customer->Id!!}" <?php if ($Get_project->Customer_id == @$customer->Id) {?> selected="selected" <?php } ?>>{!! $customer->Name !!}</option>
                                    @endforeach
                                </select>
                                 <span class="error">  {{ $errors->first( 'customer_id' , ':message' ) }}</span>
                            </div>
                          </div>



                       <div class="form-row">
                          <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7">
                            		<select class="form-control" name="department_id" id="department_id">
                                    <option value="">Select Afdeling</option>
                                     @foreach ($GetDepartments as $department)
                                      <option value="{!! @$department->Id!!}" <?php if (@$Get_project->Department_Id == @$department->Id) {?> selected="selected" <?php } ?>>{!! @$department->Name!!}</option>
                                    @endforeach
                                </select>
                                 <span class="error">  {{ $errors->first( 'department_id' , ':message' ) }}</span>
                            </div>
                          </div>

                          <div class="form-row">
                          <div class="col-md-4">Uitvoerder:</div>
                            <div class="col-md-7">
                            		<select class="form-control" name="contact_id" id="contact_id">
                                    <option value="">Select Uitvoerder</option>
                                     @foreach ($GetContacts as $contact)
                                      <option value="{!! @$contact->id!!}" <?php if ($Get_project->Contact_Id == @$contact->id) {?> selected="selected" <?php } ?>>{!! $contact->Firstname !!} {!! $contact->Lastname !!}</option>
                                    @endforeach
                                </select>
                                   <span class="error">  {{ $errors->first( 'contact_id' , ':message' ) }}</span>
                            </div>
                          </div>

                       <div class="form-row">
                            <div class="col-md-4">Actief:</div>
                           <div class="col-md-7">
                                <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" <?php if ($Get_project->Active == 1) { ?> checked="checked" <?php } ?> name="active" id="Active"></div>
                                </div>

                            </div>
                        </div>

                       <div class="form-row">
                            <div class="col-md-4">Start datum:</div>
                            <div class="col-md-7">
                          <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('m-d-Y')?>" name="start_date" value="{{ $Get_project->Start_Date }}">
                                </div>
                                <span class="error">  {{ $errors->first( 'start_date' , ':message' ) }}</span>
                        </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Eind datum:</div>
                            <div class="col-md-7">
                          <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('m-d-Y')?>" name="end_date" value="{{ $Get_project->End_Date }}">
                                </div>
                                <span class="error">  {{ $errors->first( 'end_date' , ':message' ) }}</span>
                        </div>
                        </div>


                       <div class="form-row">
                          <div class="col-md-4">Project Manager:</div>
                            <div class="col-md-7">
                            		<select class="form-control" name="projectmanager_id">
                                    <option value="">Select Project Manager</option>
                                      @foreach ($projectmanagers as $projectmanager)
                                      <option value="{!! $projectmanager->Id!!}" <?php if (@$Get_project->Projectmanager_Id == @$projectmanager->Id) {?> selected="selected" <?php } ?>>{!! $projectmanager->Firstname !!}</option>
                                    @endforeach
                                </select>
                                 <span class="error">  {{ $errors->first( 'projectmanager_id' , ':message' ) }}</span>
                            </div>
                          </div>


                       <div class="form-row">
                            <div class="col-md-4">Beschrijving:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Beschrijving" name="description" value="{{ $Get_project->Description }}">
                                  <span class="error">  {{ $errors->first( 'description' , ':message' ) }}</span>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Vaste prijs:</div>
                            <div class="col-md-5">
                            		<input type="text" class="form-control" placeholder="Vaste prijs" name="fixed" value="{{ number_format($Get_project->Fixed,2) }}"><span class="error">  {{ $errors->first( 'fixed' , ':message' ) }}</span>
                             </div>
                             <div class="col-md-2">
                                     € 0.00
                            </div>
                        </div>

                          <div class="form-row">
                            <div class="col-md-4">Tarief p/u:</div>
                            <div class="col-md-5">
                            		<input type="text" class="form-control" placeholder="Tarief p/u" name="rate" value="{{ number_format($Get_project->Rate,2) }}"><span class="error">  {{ $errors->first( 'rate' , ':message' ) }}</span>
                            </div>
                            <div class="col-md-2">
                             € 0.00
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="col-md-4">ECU Project/Debiteur #:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Project nr" name="project_ref" value="{{ $Get_project->Project_Ref }}"><span class="error">  {{ $errors->first( 'project_ref' , ':message' ) }}</span>

                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Klant proj. nr.:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Klant proj. nr." name="customer_ref" value="{{ $Get_project->Customer_Ref }}"><span class="error">  {{ $errors->first( 'customer_ref' , ':message' ) }}</span>
                            </div>

                        </div>

                         <div class="form-row">
                          <div class="col-md-4">Containers Leveranciers:</div>
                            <div class="col-md-7">
                            		<select class="form-control" name="Shippingcompany_id" id="Shippingcompany_id">
                                    <option value="">Select Containers Leverancier</option>
                                      @foreach ($Shippingcompany as $Company)
                                      <option value="{!! $Company->id!!}" <?php if (@$Company->id == @$Get_project->Shippingcompany_id) {?> selected="selected" <?php } ?>>{!! $Company->Companyname !!}</option>
                                    @endforeach
                                </select>
                                 <span class="error">  {{ $errors->first( 'Shippingcompany_id' , ':message' ) }}</span>
                            </div>
                          </div>

                </div>
            </div>

               <div class="block">
                    <div class="header" >

                       <h2>Extra gegevens</h2>


                    </div>
                    <div class="content controls">


                        <div class="form-row">
                            <div class="col-md-4">Afspraken:</div>
                            <div class="col-md-7">
                            	<textarea class="form-control " rows="5" name="Notes" placeholder="Afspraken">{{ $Get_project->Notes }}</textarea>
                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Containers notities:</div>
                            <div class="col-md-7">
                            		<textarea class="form-control" rows="5" name="Container_Notes" placeholder="Containers notities">{{ $Get_project->Container_Notes }}</textarea>

                            </div>
                        </div>

                         <div class="form-row">
                            <div class="col-md-4">Goedkeuring:</div>
                            <div class="col-md-7">
                            		<textarea class="form-control" rows="5" name="Goedkeuring" placeholder="Goedkeuring">{{ $Get_project->Goedkeuring }}</textarea>

                            </div>
                        </div>

												<div class="form-row">
													 <div class="col-md-4">Notite:</div>
													 <div class="col-md-7">
															 <textarea class="form-control" rows="5" name="more_notes" placeholder="Notite">{{ $Get_project->more_notes }}</textarea>

													 </div>
											 </div>

                    </div>
                </div>
             </div>

      <div class="col-md-6">



          <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Contact Informatie</h2>
                    </div>

                    </div>
                    <div class="content controls">
                    <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Fax" name="fax" value="{{ $Get_project->Fax }}"><span class="error">  {{ $errors->first( 'fax' , ':message' ) }}</span>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Adres" name="Address" value="{{ $Get_project->Address  }}"><span class="error">  {{ $errors->first( 'Address' , ':message' ) }}</span>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Postcode" name="Zipcode" value="{{ $Get_project->Zipcode }}"><span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Stad" name="City" value="{{ $Get_project->City }}"><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Locaties:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Locaties" name="Location" value="{{ $Get_project->Location }}">
                            </div>
                        </div>
                    </div>
                </div>

       <div class="block">
                    <div class="header" >

                       <h2>Weekstaten</h2>
                     <a title="Nieuw Weekstaat" href="<?php echo URL:: to('admin/Add-weekstaat').'/'.$Get_project->Id;?>"><img class=" " src="{{ URL::asset('assets/img/icons/add_new.png') }}" id="pdf" style=" cursor:pointer; float:right"></a>

                    </div>
                    <div class="content controls">


                        <div class="form-row">
                            <div class="col-md-4">Weekstaten:</div>
                            <div class="col-md-7">
                            	<select class="form-control" name="weekcard" id="weekstateList" onchange="getWeekStateForProject(); return false;">

                     <option value="3" <?php if ($Get_project->weekcard == 3){?> selected="selected" <?php } ?>>3 Maanden</option>
                   <option value="6" <?php if ($Get_project->weekcard == 6){?> selected="selected" <?php } ?>>6 Maanden</option>
                    <option value="all" <?php if ($Get_project->weekcard == 'all'){?> selected="selected" <?php } ?>>Alle</option>

                                </select>
                                    <span class="error">  {{ $errors->first( 'weekcard' , ':message' ) }}</span>
                            </div>
                        </div>

                         <?php if (count(@$weekcards) > 0){?>



                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-7">
                         <div style="height:150px !important; overflow: scroll" id="weekstateLi">


                            </div>
                            </div>
                          <?php } ?>
                    </div>
                </div>





       <div class="block">
                    <div class="header" >

                       <h2>Keetonderhoud</h2>

	                      <a title="Nieuw Keetonderhoud Weekstaat" href="{{ url('admin/Add-Keetonderhoud') }}"><img class=" " src="{{ URL::asset('assets/img/icons/add_new.png') }}" id="pdf" style=" cursor:pointer; float:right"></a>

                    </div>
                    <div class="content controls">
                   <div class="form-row">
                            <div class="col-md-4">Prijsafspraak:</div>
                            <div class="col-md-3">
                           		<input type="radio" id="per_keer" name="prijsafspraak" value="0" <?php if ($Get_project->prijsafspraak == 0){?> checked="checked" <?php } ?>/>
                            Per keer
                            </div>
                             <div class="col-md-3">
                            	<input type="radio" name="prijsafspraak" id="per_uur" value="1" <?php if ($Get_project->prijsafspraak == 1){?> checked="checked" <?php } ?>/>
                            Per uur
                            </div>

                            </div>


                     <?php if ($Get_project->prijsafspraak == 0){ $displayweek = 'block';} else { $displayweek = 'none';} ?>

                    <div class="form-row" id="number_times" style="display:<?php echo $displayweek?>">
                            <div class="col-md-4">Aantal keer per week:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control"  placeholder="Aantal keer per week" name="number_times" value="{{ $Get_project->number_times  }}">
                              </div>

                           </div>
                     <div class="form-row" id="eenheid" style="display:<?php echo $displayweek?>">
                            <div class="col-md-4">Eenheid:</div>
                            <div class="col-md-3">
                           		<input type="radio" name="unit" id="per_stand" value="0" <?php if ($Get_project->unit == 0){?> checked="checked" <?php } ?> />
                            Prijs per unit
                            </div>
                             <div class="col-md-3">
                            	<input type="radio" name="unit" id="per_project" value="1" <?php if ($Get_project->unit == 1){?> checked="checked" <?php } ?>/>
                            Prijs per project
                            </div>
                             </div>



                    <?php if ($Get_project->unit == 0 && $Get_project->prijsafspraak == 0){ $display = 'block';} else { $display = 'none';} ?>

                            <!--style="display:<?php //echo $displayweek?>"  -->

                            <div class="form-row" id="number" style="display:<?php echo $display?>">
                            <div class="col-md-4">Aantal Units:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control" placeholder="Aantal Units" name="number_chain" value="{{ $Get_project->number_chain  }}">
                              </div>

                           </div>


                  <div class="form-row" >
                            <div class="col-md-4">Prijs:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control"  placeholder="Prijs" name="price" value="{{ $Get_project->price  }}">
                              </div>

                           </div>
                           <div class="form-row" >
                            <div class="col-md-4">Inkoopprijs:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control"  placeholder="Inkoopprijs" name="purchase_price" value="{{ $Get_project->purchase_price  }}">
                              </div>

                           </div>
                           <div class="form-row" >
                            <div class="col-md-4">Opmerkingen:</div>
                             <div class="col-md-7">
                               <textarea class="form-control"  placeholder="Opmerkingen" name="comments">{{ $Get_project->comments }}</textarea>
                              </div>

                           </div>
                           <?php //} ?>

													 <div class="form-row">
													 	<div class="col-md-4">Weekstaten:</div>
														<div class="col-md-7">
															<select class="form-control" name="keetcard">
																<option value="3" selected>3 Maanden</option>
																<option value="6">6 Maanden</option>
																<option value="all">Alle</option>
															</select>
														</div>
													 </div>

                           <div class="form-row">
                             <div class="col-md-4">&nbsp;</div>
														 <div class="col-md-7">
															 <div style="height: 150px !important; overflow: scroll;">
																 @if ($keetcards)
																	 @foreach ($keetcards as $key => $card)
																		 <li style="line-height: 1.42857143;">
																			 <a href="{{ url('admin/view-Keetonderhoud/'.$card->id) }}">
																				 ID: {{ $card->id }} Van {{ $card->fr_Keeknumber }} t/m {{ $card->to_Keeknumber }}
																			 </a>
																		 </li>
																	 @endforeach
																 @endif
															 </div>
														 </div>
                           </div>


                             </div>



                        </div>






      <!--<div class="block">
                    <div class="header" >
                       <h2>Prijslijst All-in</h2>
                       <span class="pull-right clickable "><i class="icon-chevron-down"></i></span>

                    </div>
                    <div class="content controls" style="display:none">


                     <div class="form-row">
                            <div class="col-md-3">&nbsp;</div>
                            <div class="col-md-3">
                            	BSA
                            </div>
                              <div class="col-md-3">
                            	Hout
                            </div>
                              <div class="col-md-3">
                            	Puin
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3">3 m³:</div>
                            <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_bsa" name="pr_3m3_bsa" readonly="readonly" value="{{ @$pricelist->pr_3m3_bsa }}">
                                     <span class="error">  {{ $errors->first( 'pr_3m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_hout" name="pr_3m3_hout" readonly="readonly" value="{{ @$pricelist->pr_3m3_hout }}">
                                     <span class="error">  {{ $errors->first( 'pr_3m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_puin" name="pr_3m3_puin" readonly="readonly" value="{{ @$pricelist->pr_3m3_puin }}">     <span class="error">  {{ $errors->first( 'pr_3m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>

                         </div>

                         <div class="form-row">
                            <div class="col-md-3">6 m³:</div>
                            <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_bsa" name="pr_6m3_bsa" readonly="readonly" value="{{ @$pricelist->pr_6m3_bsa }}">    <span class="error">  {{ $errors->first( 'pr_6m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_hout" name="pr_6m3_hout" readonly="readonly" value="{{ @$pricelist->pr_6m3_hout }}">    <span class="error">  {{ $errors->first( 'pr_6m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_puin" name="pr_6m3_puin" readonly="readonly" value="{{ @$pricelist->pr_6m3_puin }}">     <span class="error">  {{ $errors->first( 'pr_6m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>






                         </div>

                          <div class="form-row">
                            <div class="col-md-3">10 m³:</div>
                            <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_bsa" readonly="readonly" name="pr_10m3_bsa" value="{{ @$pricelist->pr_10m3_bsa }}">    <span class="error">  {{ $errors->first( 'pr_10m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_hout" readonly="readonly" name="pr_10m3_hout" value="{{ @$pricelist->pr_10m3_hout }}">    <span class="error">  {{ $errors->first( 'pr_10m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_puin" readonly="readonly" name="pr_10m3_puin" value="{{ @$pricelist->pr_10m3_puin }}">     <span class="error">  {{ $errors->first( 'pr_10m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>

                         </div>

                         <div class="form-row">
                            <div class="col-md-3">20 m³:</div>
                            <div class="col-md-2" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_bsa" readonly="readonly" name="pr_20m3_bsa" value="{{ @$pricelist->pr_20m3_bsa }}">
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_hout"  readonly="readonly" name="pr_20m3_hout" value="{{ @$pricelist->pr_20m3_hout }}">
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_puin" readonly="readonly" name="pr_20m3_puin" value="{{ @$pricelist->pr_20m3_puin }}">
                            </div> <div class="col-md-1">€ </div>

                         </div>

                </div>
          </div>-->
          </div>

          <div class="col-md-12">


            {{-- Place error code here --}}

            <div class="block">
              <div class="header">
                <h2>Communicatie</h2>
                <span class="pull-right clickable "><i class="icon-chevron-down"></i></span>
              </div>
              <div class="content" style="display:none">
                <?php
                if (!empty($GetContacts) ) { ?>
                  <table class="table table-bordered" style="text-align:center; font-size:12px;">
                    <thead>
                      <tr>
                        <th class="center" width="5%">Aan</th>
                        <th  class="center" width="5%">Cc</th>
                        <th  class="center" width="5%">Login</th>
                        <th  class="center">Naam</th>
                        <th  class="center">Email</th>
                        <th  class="center">Mobilenummer</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($GetContacts as $cont){
                        $Aan = explode (',',$Get_project->AanTo);
                        $Cc = explode (',',$Get_project->CcTo);
                        $ProjectTo = explode (',',$Get_project->ProjectTo);
                        ?>
                        <tr>
													<td class="center">
													  <input type="checkbox" name="Aan[]" class="checkbox" value="<?=$cont->id?>" <?php if (in_array($cont->id,$Aan)) { ?> checked="checked" <?php } ?>   />
													</td>
													<td class="center">
														<input type="checkbox" name="Cc[]" class="checkbox" value="<?=$cont->id?>" <?php if (in_array($cont->id,$Cc)) { ?> checked="checked" <?php } ?>/>
													</td>
													<td class="center">
														<input type="checkbox" name="ProjectTo[]" class="checkbox" style="margin-right:20px;" value="<?=$cont->id?>" <?php if (in_array($cont->id,$ProjectTo)) { ?> checked="checked" <?php } ?>/>
													</td>

													<td class="center"><?=$cont->Firstname?> <?=$cont->Lastname?></td>
										      <td class="center"><?=$cont->Email?></td>
										      <td class="center"><?=$cont->Mobile?></td>
                              </tr>

                              <?php }} else {?>
                                <tr>
                                  <td colspan="5">geen contacten met email gevonden! </td>
                                </tr>

                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>


             {{-- End error code here --}}



             <div class="block">
                    <div class="header" >
                       <h2>Prijslijst All-in</h2>
                       <span class="pull-right clickable "><i class="icon-chevron-down"></i></span>

                    </div>
                    <div class="content " style="display:none">

                    <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>
  <tr>
  <th class="center" width="12%">Container Maten</th>
  <th colspan="2" class="center">BSA</th>
  <th colspan="2" class="center">Hout</th>
  <th colspan="2" class="center">Puin</th>
  </tr>
  </thead>

  <tbody>
     <tr style="border:none;">
     <th class="left">&nbsp;</th>
   	 <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
       <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
       <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
    </tr>

    <tr>

  <td>Rolcontainer:</td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_bsa" name="rl_pr_bsa" value="{{ number_format(@$pricelist->rl_pr_bsa,2)}}">    <span class="error">  {{ $errors->first( 'rl_pr_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_bsa" name="rl_sl_bsa" value="{{ number_format(@$pricelist->rl_sl_bsa,2) }}">    <span class="error">  {{ $errors->first( 'rl_sl_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_hout" name="rl_pr_hout" value="{{ number_format(@$pricelist->rl_pr_hout,2) }}">    <span class="error">  {{ $errors->first( 'rl_pr_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_hout" name="rl_sl_hout" value="{{ number_format(@$pricelist->rl_sl_hout,2)}}">    <span class="error">  {{ $errors->first( 'rl_sl_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>



  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_puin" name="rl_pr_puin" value="{{ number_format(@$pricelist->rl_pr_puin,2) }}">     <span class="error">  {{ $errors->first( 'rl_pr_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_puin" name="rl_sl_puin" value="{{ number_format(@$pricelist->rl_sl_puin,2) }}">     <span class="error">  {{ $errors->first( 'rl_sl_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  </tr>


  <tr>

  <td>3m<sup>3</sup>:</td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_bsa" name="pr_3m3_bsa" value="{{ number_format(@$pricelist->pr_3m3_bsa,2) }}">    <span class="error">  {{ $errors->first( 'pr_3m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_3m3_bsa" name="sl_pr_3m3_bsa" value="{{ number_format(@$pricelist->sl_pr_3m3_bsa,2) }}">    <span class="error">  {{ $errors->first( 'sl_pr_3m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_hout" name="pr_3m3_hout" value="{{ number_format(@$pricelist->pr_3m3_hout ,2) }}">    <span class="error">  {{ $errors->first( 'pr_3m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_3m3_hout" name="sl_pr_3m3_hout" value="{{ number_format(@$pricelist->sl_pr_3m3_hout,2)}}">    <span class="error">  {{ $errors->first( 'sl_pr_3m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_puin" name="pr_3m3_puin" value="{{ number_format(@$pricelist->pr_3m3_puin,2) }}">     <span class="error">  {{ $errors->first( 'pr_3m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_3m3_puin" name="sl_pr_3m3_puin" value="{{ number_format(@$pricelist->sl_pr_3m3_puin,2) }}">     <span class="error">  {{ $errors->first( 'sl_pr_3m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  </tr>

  <tr>
  <td>6m<sup>3</sup>:</td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_bsa" name="pr_6m3_bsa" value="{{ number_format(@$pricelist->pr_6m3_bsa,2) }}">    <span class="error">  {{ $errors->first( 'pr_6m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_6m3_bsa" name="sl_pr_6m3_bsa" value="{{ number_format(@$pricelist->sl_pr_6m3_bsa,2) }}">    <span class="error">  {{ $errors->first( 'sl_pr_6m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td>  <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_hout" name="pr_6m3_hout" value="{{ number_format(@$pricelist->pr_6m3_hout,2)  }}">    <span class="error">  {{ $errors->first( 'pr_6m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td>  <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_6m3_hout" name="sl_pr_6m3_hout" value="{{ number_format(@$pricelist->sl_pr_6m3_hout,2)  }}">    <span class="error">  {{ $errors->first( 'sl_pr_6m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_puin" name="pr_6m3_puin" value="{{ number_format(@$pricelist->pr_6m3_puin,2)  }}">     <span class="error">  {{ $errors->first( 'pr_6m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_6m3_puin" name="sl_pr_6m3_puin" value="{{ number_format(@$pricelist->sl_pr_6m3_puin,2)  }}">     <span class="error">  {{ $errors->first( 'sl_pr_6m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>


  </tr>

  <tr>
  <td>10m<sup>3</sup>:</td>
  <td><div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_bsa" name="pr_10m3_bsa" value="{{ number_format(@$pricelist->pr_10m3_bsa,2) }}">    <span class="error">  {{ $errors->first( 'pr_10m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_10m3_bsa" name="sl_pr_10m3_bsa" value="{{ number_format(@$pricelist->sl_pr_10m3_bsa,2) }}">    <span class="error">  {{ $errors->first( 'sl_pr_10m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_hout" name="pr_10m3_hout" value="{{ number_format(@$pricelist->pr_10m3_hout,2) }}">    <span class="error">  {{ $errors->first( 'pr_10m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_10m3_hout" name="sl_pr_10m3_hout" value="{{ number_format(@$pricelist->sl_pr_10m3_hout,2)  }}">    <span class="error">  {{ $errors->first( 'pr_10m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_puin" name="pr_10m3_puin" value="{{ number_format(@$pricelist->pr_10m3_puin,2) }}">     <span class="error">  {{ $errors->first( 'pr_10m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_10m3_puin" name="sl_pr_10m3_puin" value="{{ number_format(@$pricelist->sl_pr_10m3_puin,2) }}">     <span class="error">  {{ $errors->first( 'sl_pr_10m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  </tr>


  <tr>
  <td>20m<sup>3</sup>:</td>
  <td> <div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_bsa" name="pr_20m3_bsa" value="{{ number_format(@$pricelist->pr_20m3_bsa,2)  }}">    <span class="error">  {{ $errors->first( 'pr_20m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td> <div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_20m3_bsa" name="sl_pr_20m3_bsa" value="{{ number_format(@$pricelist->sl_pr_20m3_bsa,2) }}">    <span class="error">  {{ $errors->first( 'sl_pr_20m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_hout" name="pr_20m3_hout" value="{{ number_format(@$pricelist->pr_20m3_hout,2) }}">    <span class="error">  {{ $errors->first( 'pr_20m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_20m3_hout" name="sl_pr_20m3_hout" value="{{ number_format(@$pricelist->sl_pr_20m3_hout,2) }}">    <span class="error">  {{ $errors->first( 'sl_pr_20m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_puin" name="pr_20m3_puin" value="{{ number_format(@$pricelist->pr_20m3_puin,2) }}">     <span class="error">  {{ $errors->first( 'pr_20m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_20m3_puin" name="sl_pr_20m3_puin" value="{{ number_format(@$pricelist->sl_pr_20m3_puin,2) }}">     <span class="error">  {{ $errors->first( 'sl_pr_20m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  </tr>

  <tr>

  <td>30m<sup>3</sup>:</td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_30m3_bsa" name="rl_pr_30m3_bsa" value="{{ number_format(@$pricelist->rl_pr_30m3_bsa,2)}}">    <span class="error">  {{ $errors->first( 'rl_pr_30m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_30m3_bsa" name="rl_sl_30m3_bsa" value="{{ number_format(@$pricelist->rl_sl_30m3_bsa,2)}}">    <span class="error">  {{ $errors->first( 'rl_sl_30m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>



  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_30m3_hout" name="rl_pr_30m3_hout" value="{{ number_format(@$pricelist->rl_pr_30m3_hout,2)}}">    <span class="error">  {{ $errors->first( 'rl_pr_30m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>

 <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_30m3_hout" name="rl_sl_30m3_hout" value="{{ number_format(@$pricelist->rl_sl_30m3_hout,2)}}">    <span class="error">  {{ $errors->first( 'rl_sl_30m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_30m3_puin" name="rl_pr_30m3_puin" value="{{ number_format(@$pricelist->rl_pr_30m3_puin,2)}}">     <span class="error">  {{ $errors->first( 'rl_pr_30m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_30m3_puin" name="rl_sl_30m3_puin" value="{{ number_format(@$pricelist->rl_sl_30m3_puin ,2)}}">     <span class="error">  {{ $errors->first( 'rl_sl_30m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  </tr>

  </tbody>
  </table>
                    </div>
                </div>


             <div class="block">
                    <div class="header" >
                     <h2>Prijslijst</h2>
                       <span class="pull-right clickable"><i class="icon-chevron-down"></i></span>
                    </div>
                    <div class="content" style="display:none">

                     <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>

      <tr>
      <th class="center" width="10%">Article No</th>
      <th width="45%" class="center">Description</th>
      <th width="30%" class="center" colspan="2">Price</th>
      <th width="30%" class="center">Unit</th>
    </tr>
    </thead>
    <tbody>
    <tr style="border:none;"><td colspan="5" class="left"><h5>Transporttarief per container (voor dit tarief wordt de container geleverd en opgehaald)</h5></td>

    </tr>
     <tr style="border:none;">
     <td colspan="2" class="left">&nbsp;</td>
   	 <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
      <td>&nbsp;</td>

    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_10m3" id="article_no_10m3" value="{{ @$pricelist->article_no_10m3}}">
    <span class="error">  {{ $errors->first( 'article_no_10m3' , ':message' ) }}</span>
    </td>

    <td class="left">
    Transportkosten containers met een inhoud van 3 m<sup>3</sup> tot en met 10 m<sup>3</sup>
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_10m3" id="Price_10m3" value="{{ number_format(@$pricelist->Price_10m3,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_10m3' , ':message' ) }}</span>

    </td>
    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_10m3" id="sale_Price_10m3" value="{{ number_format(@$pricelist->sale_Price_10m3,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_10m3' , ':message' ) }}</span></td>
    <td>
        <select class="form-control" name="Unit_10m3" id="Unit_10m3">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_10m3   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_10m3   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_10m3   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_10m3   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_10m3   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_10m3   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_10m3' , ':message' ) }}</span>
    </td>
    </tr>

  <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" name="article_no_40m3" id="article_no_40m3" readonly="readonly" value="{{ @$pricelist->article_no_40m3 }}">
    <span class="error">  {{ $errors->first( 'article_no_40m3' , ':message' ) }}</span>
    </td>

    <td class="left">
    Transportkosten containers met een inhoud van 15 m<sup>3</sup> tot en met 40 m<sup>3</sup>
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_40m3" id="Price_40m3" value="{{ number_format(@$pricelist->Price_40m3,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_40m3' , ':message' ) }}</span>

    </td>
     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_40m3" id="sale_Price_40m3" value="{{ number_format(@$pricelist->sale_Price_40m3,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_40m3' , ':message' ) }}</span></td>
    <td>
        <select class="form-control" name="Unit_40m3" id="Unit_40m3">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_40m3   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_40m3   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_40m3   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_40m3   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_40m3   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_40m3   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_40m3' , ':message' ) }}</span>
    </td>
    </tr>

     <tr style="border:none;"><td colspan="4" class="left"><h5>Verwerkingstariet per ton (1000 kg)</h5></td></tr>

     <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_sorteerbaar" id="article_no_sorteerbaar" value="{{ @$pricelist->article_no_sorteerbaar }}">
    <span class="error">  {{ $errors->first( 'article_no_sorteerbaar' , ':message' ) }}</span>
    </td>

    <td class="left">
    Bouw- en sloopafval (sorteerbaar)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_sorteerbaar" id="Price_sorteerbaar" value="{{ number_format(@$pricelist->Price_sorteerbaar,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_sorteerbaar' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_sorteerbaar" id="sale_Price_sorteerbaar" value="{{ number_format(@$pricelist->sale_Price_sorteerbaar,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_sorteerbaar' , ':message' ) }}</span></td>
    <td>
        <select class="form-control" name="Unit_sorteerbaar" id="Unit_sorteerbaar">
        <option value="">Selecteer Unit</option>
         <option value="KG" <?php if (@$pricelist->Unit_sorteerbaar   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_sorteerbaar   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_sorteerbaar   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_sorteerbaar   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_sorteerbaar   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_sorteerbaar   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_sorteerbaar' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_niet_sorteerbaar" id="article_no_niet_sorteerbaar" value="{{ @$pricelist->article_no_niet_sorteerbaar }}">
    <span class="error">  {{ $errors->first( 'article_no_niet_sorteerbaar' , ':message' ) }}</span>
    </td>

    <td class="left">
   Bouw- en sloopafval (niet sorteerbaar)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_niet_sorteerbaar" id="Price_niet_sorteerbaar" value="{{ number_format(@$pricelist->Price_niet_sorteerbaar,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_niet_sorteerbaar' , ':message' ) }}</span>

    </td>
    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_niet_sorteerbaar" id="sale_Price_niet_sorteerbaar" value="{{ number_format(@$pricelist->sale_Price_niet_sorteerbaar,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_niet_sorteerbaar' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_niet_sorteerbaar" id="Unit_niet_sorteerbaar">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_niet_sorteerbaar   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_niet_sorteerbaar   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_niet_sorteerbaar   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_niet_sorteerbaar   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_niet_sorteerbaar   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_niet_sorteerbaar   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_niet_sorteerbaar' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Bedrijfsafval" id="article_no_Bedrijfsafval" value="{{ @$pricelist->article_no_Bedrijfsafval }}">
    <span class="error">  {{ $errors->first( 'article_no_Bedrijfsafval' , ':message' ) }}</span>
    </td>

    <td class="left">
    Bedrijfsafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Bedrijfsafval" id="Price_Bedrijfsafval" value="{{ number_format(@$pricelist->Price_Bedrijfsafval,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Bedrijfsafval' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Bedrijfsafval" id="sale_Price_Bedrijfsafval" value="{{ number_format(@$pricelist->sale_Price_Bedrijfsafval,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Bedrijfsafval' , ':message' ) }}</span></td>



    <td>
        <select class="form-control" name="Unit_Bedrijfsafval" id="Unit_Bedrijfsafval">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Bedrijfsafval   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Bedrijfsafval   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Bedrijfsafval   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Bedrijfsafval   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Bedrijfsafval   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Bedrijfsafval   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Bedrijfsafval' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" readonly="readonly" placeholder="Article No" name="article_no_A_B_hout" id="article_no_A_B_hout" value="{{ @$pricelist->article_no_A_B_hout }}">
    <span class="error">  {{ $errors->first( 'article_no_A_B_hout' , ':message' ) }}</span>
    </td>

    <td class="left">
    Gemengd hout (A- enlof B- hout)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_A_B_hout" id="Price_A_B_hout" value="{{ number_format(@$pricelist->Price_A_B_hout,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_A_B_hout' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_A_B_hout" id="sale_Price_A_B_hout" value="{{ number_format(@$pricelist->sale_Price_A_B_hout,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_A_B_hout' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_A_B_hout" id="Unit_A_B_hout">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_A_B_hout   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_A_B_hout   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_A_B_hout   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_A_B_hout   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_A_B_hout   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_A_B_hout   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_A_B_hout' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_C_hout" id="article_no_C_hout" value="{{ @$pricelist->article_no_C_hout }}">
    <span class="error">  {{ $errors->first( 'article_no_C_hout' , ':message' ) }}</span>
    </td>

    <td class="left">
    C- hout
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_C_hout" id="Price_C_hout" value="{{ number_format(@$pricelist->Price_C_hout,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_C_hout' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_C_hout" id="sale_Price_C_hout" value="{{ number_format(@$pricelist->sale_Price_C_hout,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_C_hout' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_C_hout" id="Unit_C_hout">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_C_hout   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_C_hout   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_C_hout   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_C_hout   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_C_hout   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_C_hout   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_C_hout' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Schoon_puin" id="article_no_Schoon_puin" value="{{ @$pricelist->article_no_Schoon_puin }}">
    <span class="error">  {{ $errors->first( 'article_no_Schoon_puin' , ':message' ) }}</span>
    </td>

    <td class="left">
    Schoon puin(< 60 cm)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_puin" id="Price_Schoon_puin" value="{{ number_format(@$pricelist->Price_Schoon_puin,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_puin' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Schoon_puin" id="sale_Price_Schoon_puin" value="{{ number_format(@$pricelist->sale_Price_Schoon_puin,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Schoon_puin' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Schoon_puin" id="Unit_Schoon_puin">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Schoon_puin   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Schoon_puin   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Schoon_puin   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Schoon_puin   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Schoon_puin   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Schoon_puin   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Schoon_puin' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Puin_Grof" id="article_no_Puin_Grof" value="{{ @$pricelist->article_no_Puin_Grof }}">
    <span class="error">  {{ $errors->first( 'article_no_Puin_Grof' , ':message' ) }}</span>
    </td>

    <td class="left">
    Puin Grof (> 60 cm)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_Grof" id="Price_Puin_Grof" value="{{ number_format(@$pricelist->Price_Puin_Grof,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_Grof' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Puin_Grof" id="sale_Price_Puin_Grof" value="{{ number_format(@$pricelist->sale_Price_Puin_Grof,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Puin_Grof' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Puin_Grof" id="Unit_Puin_Grof">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Puin_Grof   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Puin_Grof   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Puin_Grof   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Puin_Grof   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Puin_Grof   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Puin_Grof   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Puin_Grof' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Puin_met_10" id="article_no_Puin_met_10" value="{{ @$pricelist->article_no_Puin_met_10 }}">
    <span class="error">  {{ $errors->first( 'article_no_Puin_met_10' , ':message' ) }}</span>
    </td>

    <td class="left">
    Puin met 10% tot 25% zand I grond
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_10" id="Price_Puin_met_10" value="{{ number_format(@$pricelist->Price_Puin_met_10,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_10' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Puin_met_10" id="sale_Price_Puin_met_10" value="{{ number_format(@$pricelist->sale_Price_Puin_met_10,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Puin_met_10' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Puin_met_10" id="Unit_Puin_met_10">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Puin_met_10   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Puin_met_10   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Puin_met_10   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Puin_met_10   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Puin_met_10   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Puin_met_10   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Puin_met_10' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Puin_met_25" id="article_no_Puin_met_25" value="{{ @$pricelist->article_no_Puin_met_25 }}">
    <span class="error">  {{ $errors->first( 'article_no_Puin_met_25' , ':message' ) }}</span>
    </td>

    <td class="left">
   Puin met 25% of meer zand I grond
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_25" id="Price_Puin_met_25" value="{{ number_format(@$pricelist->Price_Puin_met_25,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_25' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Puin_met_25" id="sale_Price_Puin_met_25" value="{{ number_format(@$pricelist->sale_Price_Puin_met_25,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Puin_met_25' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Puin_met_25" id="Unit_Puin_met_25">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Puin_met_25   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Puin_met_25   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Puin_met_25   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Puin_met_25   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Puin_met_25   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Puin_met_25   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Puin_met_25' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Asfaltpuin" id="article_no_Asfaltpuin" value="{{ @$pricelist->article_no_Asfaltpuin }}">
    <span class="error">  {{ $errors->first( 'article_no_Asfaltpuin' , ':message' ) }}</span>
    </td>

    <td class="left">
    Asfaltpuin
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control"  placeholder="Prijs" name="Price_Asfaltpuin" id="Price_Asfaltpuin" value="{{ number_format(@$pricelist->Price_Asfaltpuin,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Asfaltpuin' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Asfaltpuin" id="sale_Price_Asfaltpuin" value="{{ number_format(@$pricelist->sale_Price_Asfaltpuin,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Asfaltpuin' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Asfaltpuin" id="Unit_Asfaltpuin" >
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Asfaltpuin   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Asfaltpuin   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Asfaltpuin   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Asfaltpuin   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Asfaltpuin   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Asfaltpuin   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Asfaltpuin' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Schoon_Gips" id="article_no_Schoon_Gips" value="{{ @$pricelist->article_no_Schoon_Gips }}">
    <span class="error">  {{ $errors->first( 'article_no_Schoon_Gips' , ':message' ) }}</span>
    </td>

    <td class="left">
    Schoon Gips
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_Gips" id="Price_Schoon_Gips" value="{{ number_format(@$pricelist->Price_Schoon_Gips,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_Gips' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Schoon_Gips" id="sale_Price_Schoon_Gips" value="{{ number_format(@$pricelist->sale_Price_Schoon_Gips,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Schoon_Gips' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Schoon_Gips" id="Unit_Schoon_Gips">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Schoon_Gips   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Schoon_Gips   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Schoon_Gips   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Schoon_Gips   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Schoon_Gips   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Schoon_Gips   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Schoon_Gips' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Groenafval" id="article_no_Groenafval" value="{{ @$pricelist->article_no_Groenafval }}">
    <span class="error">  {{ $errors->first( 'article_no_Groenafval' , ':message' ) }}</span>
    </td>

    <td class="left">
    Groenafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Groenafval" id="Price_Groenafval" value="{{ number_format(@$pricelist->Price_Groenafval,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Groenafval' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Groenafval" id="sale_Price_Groenafval" value="{{ number_format(@$pricelist->sale_Price_Groenafval,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Groenafval' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Groenafval" id="Unit_Groenafval">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Groenafval   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Groenafval   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Groenafval   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Groenafval   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Groenafval   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Groenafval   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Groenafval' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Dakafval" id="article_no_Dakafval" value="{{ @$pricelist->article_no_Dakafval }}">
    <span class="error">  {{ $errors->first( 'article_no_Dakafval' , ':message' ) }}</span>
    </td>

    <td class="left">
    Dakafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakafval" id="Price_Dakafval" value="{{ number_format(@$pricelist->Price_Dakafval,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakafval' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Dakafval" id="sale_Price_Dakafval" value="{{ number_format(@$pricelist->sale_Price_Dakafval,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Dakafval' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Dakafval" id="Unit_Dakafval">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Dakafval   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Dakafval   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Dakafval   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Dakafval   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Dakafval   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Dakafval   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Dakafval' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Dakgrind" id="article_no_Dakgrind" value="{{ @$pricelist->article_no_Dakgrind }}">
    <span class="error">  {{ $errors->first( 'article_no_Dakgrind' , ':message' ) }}</span>
    </td>

    <td class="left">
    Dakgrind
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakgrind" id="Price_Dakgrind" value="{{ number_format(@$pricelist->Price_Dakgrind,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakgrind' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Dakgrind" id="sale_Price_Dakgrind" value="{{ number_format(@$pricelist->sale_Price_Dakgrind,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Dakgrind' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Dakgrind" id="Unit_Dakgrind">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Dakgrind   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Dakgrind   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Dakgrind   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Dakgrind   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Dakgrind   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Dakgrind   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Dakgrind' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Schoon_vlakglas" id="article_no_Schoon_vlakglas" value="{{ @$pricelist->article_no_Schoon_vlakglas }}">
    <span class="error">  {{ $errors->first( 'article_no_Schoon_vlakglas' , ':message' ) }}</span>
    </td>

    <td class="left">
    Schoon vlakglas
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_vlakglas" id="Price_Schoon_vlakglas" value="{{ number_format(@$pricelist->Price_Schoon_vlakglas,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_vlakglas' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Schoon_vlakglas" id="sale_Price_Schoon_vlakglas" value="{{ number_format(@$pricelist->sale_Price_Schoon_vlakglas,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Schoon_vlakglas' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Schoon_vlakglas" id="Unit_Schoon_vlakglas">
        <option value="">Selecteer Unit</option>
       <option value="KG" <?php if (@$pricelist->Unit_Schoon_vlakglas   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Schoon_vlakglas   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Schoon_vlakglas   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Schoon_vlakglas   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Schoon_vlakglas   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Schoon_vlakglas   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Schoon_vlakglas' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Opbrengsten_metalen" id="article_no_Opbrengsten_metalen" value="{{ @$pricelist->article_no_Opbrengsten_metalen }}">
    <span class="error">  {{ $errors->first( 'article_no_Opbrengsten_metalen' , ':message' ) }}</span>
    </td>

    <td class="left">
    Opbrengsten metalen, per ton
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_metalen" id="Price_Opbrengsten_metalen" value="{{ number_format(@$pricelist->Price_Opbrengsten_metalen,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_metalen' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Opbrengsten_metalen" id="sale_Price_Opbrengsten_metalen" value="{{ number_format(@$pricelist->sale_Price_Opbrengsten_metalen,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Opbrengsten_metalen' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Opbrengsten_metalen" id="Unit_Opbrengsten_metalen">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_Opbrengsten_metalen   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Opbrengsten_metalen   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Opbrengsten_metalen   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Opbrengsten_metalen   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Opbrengsten_metalen   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Opbrengsten_metalen   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Opbrengsten_metalen' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" readonly="readonly" placeholder="Article No" name="article_no_Opbrengsten_Papier" id="article_no_Opbrengsten_Papier" value="{{ @$pricelist->article_no_Opbrengsten_Papier }}">
    <span class="error">  {{ $errors->first( 'article_no_Opbrengsten_Papier' , ':message' ) }}</span>
    </td>

    <td class="left">
    Opbrengsten Papier & Karton, per ton
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_Papier" id="Price_Opbrengsten_Papier" value="{{ number_format(@$pricelist->Price_Opbrengsten_Papier,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_Papier' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Opbrengsten_Papier" id="sale_Price_Opbrengsten_Papier" value="{{ number_format(@$pricelist->sale_Price_Opbrengsten_Papier,2) }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Opbrengsten_Papier' , ':message' ) }}</span></td>



    <td>
        <select class="form-control" name="Unit_Opbrengsten_Papier" id="Unit_Opbrengsten_Papier">
        <option value="">Selecteer Unit</option>
         <option value="KG" <?php if (@$pricelist->Unit_Opbrengsten_Papier   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_Opbrengsten_Papier   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_Opbrengsten_Papier   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_Opbrengsten_Papier   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_Opbrengsten_Papier   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_Opbrengsten_Papier   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Opbrengsten_Papier' , ':message' ) }}</span>
    </td>
    </tr>

      <!---Extra Fields ---->
    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" id="article_no_field1" readonly="readonly" name="article_no_field1" value="{{ @$pricelist->article_no_field1 }}">

    </td>

    <td class="left">
      <input type="text" class="form-control" placeholder="Description"  id="description_field1" name="description_field1" readonly="readonly" value="{{ @$pricelist->description_field1 }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control"  placeholder="Prijs" id="Price_field1" name="Price_field1" value="{{ number_format(@$pricelist->Price_field1,2) }}"></div> <div class="col-md-1"> €</div>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field1" id="sale_Price_field1" value="{{ number_format(@$pricelist->sale_Price_field1,2) }}"></div> <div class="col-md-1"> €</div>
       </td>



    <td>
        <select class="form-control" name="Unit_field1" id="Unit_field1">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_field1   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_field1   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_field1   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_field1   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_field1   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_field1   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" id="article_no_field2" readonly="readonly" name="article_no_field2" value="{{ @$pricelist->article_no_field2 }}">
    </td>

    <td class="left">
     <input type="text" class="form-control" placeholder="Description" id="description_field2" name="description_field2" readonly="readonly" value="{{ @$pricelist->description_field2 }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs"  id="Price_field2" name="Price_field2" value="{{ number_format(@$pricelist->Price_field2,2) }}"></div> <div class="col-md-1"> €</div>
    </td>

      <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field2" id="sale_Price_field2" value="{{ number_format(@$pricelist->sale_Price_field2,2) }}"></div> <div class="col-md-1"> €</div>
       </td>

    <td>
        <select class="form-control" id="Unit_field2" name="Unit_field2">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_field2   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_field2   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_field2   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_field2   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_field2   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_field2   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" id="article_no_field3" name="article_no_field3" value="{{ @$pricelist->article_no_field3 }}">
    </td>

    <td class="left">
     <input type="text" class="form-control" placeholder="Description" id="description_field3" name="description_field3" readonly="readonly" value="{{ @$pricelist->description_field3 }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control"  placeholder="Prijs" id="Price_field3" name="Price_field3" value="{{ number_format(@$pricelist->Price_field3,2) }}"></div> <div class="col-md-1"> €</div>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field3" id="sale_Price_field3" value="{{ number_format(@$pricelist->sale_Price_field3,2) }}"></div> <div class="col-md-1"> €</div>
       </td>

    <td>
        <select class="form-control" id="Unit_field3" name="Unit_field3" >
        <option value="">Selecteer Unit</option>
       <option value="KG" <?php if (@$pricelist->Unit_field3   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_field3   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_field3   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_field3   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_field3   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_field3   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" id="article_no_field4" readonly="readonly" name="article_no_field4" value="{{ @$pricelist->article_no_field4 }}">
    </td>

    <td class="left">
     <input type="text" class="form-control" placeholder="Description" id="description_field4" name="description_field4" readonly="readonly" value="{{ @$pricelist->description_field4 }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" id="Price_field4" name="Price_field4" value="{{ number_format(@$pricelist->Price_field4,2) }}"></div> <div class="col-md-1"> €</div>
    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field4" id="sale_Price_field4" value="{{ number_format(@$pricelist->sale_Price_field4,2) }}"></div> <div class="col-md-1"> €</div>
       </td>

    <td>
        <select class="form-control" name="Unit_field4" id="Unit_field4">
        <option value="">Selecteer Unit</option>
        <option value="KG" <?php if (@$pricelist->Unit_field4   =='KG') {?> selected <?php } ?>>Per KG</option>
        <option value="TON" <?php if (@$pricelist->Unit_field4   =='TON') {?> selected <?php } ?>>Per TON</option>
        <option value="RIT" <?php if (@$pricelist->Unit_field4   =='RIT') {?> selected <?php } ?>>Per RIT</option>
        <option value="KEER" <?php if (@$pricelist->Unit_field4   =='KEER') {?> selected <?php } ?>>Per KEER</option>
        <option value="WEEK" <?php if (@$pricelist->Unit_field4   =='WEEK') {?> selected <?php } ?>>Per WEEK</option>
        <option value="MAAND" <?php if (@$pricelist->Unit_field4   =='MAAND') {?> selected <?php } ?>>Per MAAND</option>
        </select>
    </td>
    </tr>
    </tbody>
    </table>

                    </div>
                </div>

								<div class="block">
	                     <div class="header">
	                      <h2>Project documenten</h2>
	                        <span class="pull-right clickable"><i class="icon-chevron-down"></i></span>
	                     </div>
	                     <div class="content" style="display:none">
					               <a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right; margin-bottom: 15px;">Document Uploaden</a>

												 <table class="table table-bordered" style="text-align:center; font-size:12px;">
													 <thead>
													 	<tr>
													 		<th class="text-center">Notitie</th>
													 		<th class="text-center">Datum & Tijd</th>
															<th class="text-center">Downloaden</th>
						                  <th class="text-center">Opties</th>
													 	</tr>
													 </thead>
													 <tbody>
													 	@if ($Get_project->projectAttachments)
															@foreach ($Get_project->projectAttachments as $file)
																<tr>
																	<td>{{ $file->note }}</td>
																	<td>{{ date('Y-m-d (H:i a)', strtotime($file->added)) }}</td>
																	<td>
																		<?php $ext = pathinfo($file->filename, PATHINFO_EXTENSION); ?>
																			 <a href="{{ URL::asset($file->file_path) }}" title="Downloaden">
																					<img @if ($ext == 'jpg')
																							src="{{ URL::asset('assets/img/icons/jpg.png') }}"
																						@elseif ($ext == 'png')
																							src="{{ URL::asset('assets/img/icons/png.png') }}"
																						@elseif ($ext == 'xls')
																							src="{{ URL::asset('assets/img/icons/xls.png') }}"
																						@elseif ($ext == 'pdf')
																							src="{{ URL::asset('assets/img/icons/pdf.png') }}"
																						@elseif ($ext == 'docx' || $ext == 'doc')
																							src="{{ URL::asset('assets/img/icons/docx.png') }}"
																						@endif
																						style=" cursor:pointer; width:32px; height:32px;">
																		 </a>
																	</td>
																	<td>
																		{{-- Edit Model --}}
																		<a href="javascript:void(0)" onclick="getdocinfo({{ $file->id }});" title="Bewerken" class="widget-icon" ><span class="icon-pencil"></span></a>
																		{{-- Delete Model --}}
																			<a href="{{ url('admin/projects/deleteWeekstaatDocument/'.$file->id) }}" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a>
																	</td>
																</tr>

															@endforeach


													 	@endif
													 </tbody>
												 </table>
                			</div>

								</div>




          <div class="content controls">
                        <div class="form-row" style="float:right" >

                             <div class="col-md-3" align="center" >
                <a href="<?php echo URL:: to( 'admin/projectmanager' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
                </div>

                    <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}
                </div>

                <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan & Afsluiten', ['class' => 'btn btn-success','name' => 'Save_Close']) !!}
                </div>

                 <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan & Nieuw', ['class' => 'btn btn-success','name' => 'Save_New']) !!}
                </div>
                    </div>
                </div>
              </div>

    {!! Form::close() !!}
  </div>

	{{-- Model to upload files starts below --}}

	<div class="modal  modal-info" id="uploadFile"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Document Uploaden</h4>
				</div>

				<form method="post" action="{{ url('admin/projects/uploadWeekstaatDocument') }}"  enctype="multipart/form-data">

					<div class="modal-body clearfix">
						<div class="block">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
							<input type="hidden" name="projects_id" value="{{ $Get_project->Id }}" />

							<div class="form-row">
								<div class="col-md-4">Notitie:</div>
								<div class="col-md-7">
									<input type="text" class="form-control" placeholder="Notitie" name="note">
									<span class="error">  {{ $errors->first( 'note' , ':message' ) }}</span>
								</div>
							</div>

							<div class="form-row">
								<div class="col-md-4">Datum en Tijd:</div>
								<div class="col-md-7">
									<div class="input-group">
										<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
										<input type="text" class="form-control" name="added" value="{{ date('Y-m-d (H:i a)') }}" disabled>
									</div>
									<span class="error">  {{ $errors->first( 'added' , ':message' ) }}</span>
								</div>
							</div>

						</div>
						<div class="form-row">


							<div class="col-md-4">Document type:</div>
							<div class="col-md-7">
								<div class="input-group file">
									<input class="form-control" type="text">
									<input name="File" type="file">
									<span class="input-group-btn">
										<button class="btn btn-success" type="button">Browsen</button>
									</span>
								</div>
								<span class=""> Bestand Types: (pdf, docx, docx, xls, jpg, png, bmp)</span>
							</div>

						</div>
					</div>


					<div class="modal-footer">

						<button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button>

						<button type="submit" class="btn btn-success">Opslaan</button>

					</div>


				</form>


			</div>

		</div>

	</div>

	{{-- Model to upload files ends here --}}


	{{-- Model to edit uploaded files starts here --}}

	<div class="modal modal-info" id="editUploadFilesDetail"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Document Bewerken</h4>
				</div>
				<form method="post" action="{{ url('admin/projects/updateUploadWeekstaatDoc') }}" enctype="multipart/form-data">
					<div class="modal-body clearfix">
						<div class="block">

							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
							<input type="hidden" name="fileId" id="fileId" />
							<input type="hidden" name="projectID" id="projectID" />
							<div class="form-row">
								<div class="col-md-4">Notitie:</div>
								<div class="col-md-7">
									<input type="text" class="form-control" name="note" id="note">
									<span class="error">  {{ $errors->first( 'note' , ':message' ) }}</span>
								</div>

							</div>

							<div class="form-row">
								<div class="col-md-4">Datum en Tijd:</div>
								<div class="col-md-7">
									<div class="input-group">
										<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

										<input type="text" class="form-control" name="Exp_date" value="{{ date('Y-m-d (H:i a)') }}" id="Exp_date" disabled>

									</div>

									<span class="error">  {{ $errors->first( 'Exp_date' , ':message' ) }}</span>

								</div>

							</div>

						</div>

					</div>


					<div class="modal-footer">

						<button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button>

						<button type="submit" class="btn btn-success">Opslaan</button>

					</div>


				</form>


			</div>

		</div>

	</div>

	{{-- Model to edit uploaded files ends here --}}



	<br />
	<script src="{{ URL::to('public/assets/js/axios.min.js') }}" charset="utf-8"></script>
	<script type="text/javascript">
	let projectID = {{ $id }};
	</script>
	<script src="{{ URL::to('public/assets/js/editProject.js') }}" charset="utf-8"></script>
       @include('admin/footer')</div>



			 <script>

			 function getdocinfo (id) {

				$.get('<?php echo URL:: to( 'admin/projects/editWeekstaatDocument' ); ?>/' + id,function(data) {
						 // $('#Exp_date').val(data.ExpiryDate);
						 $('#note').val(data.data.note);
						 $('#fileId').val(data.data.id);
						 $('#projectID').val(data.data.projectID);
						 // $('#doc_id').val(id);
						$('#editUploadFilesDetail').modal('show');
					});


				}

				</script>

        {{-- <script src="{{ URL::to('public/assets/js/axios.min.js') }}" charset="utf-8"></script>
				<script type="text/javascript">
				let projectID = {{ $id }};
				</script>
        <script src="{{ URL::to('public/assets/js/editProject.js') }}" charset="utf-8"></script> --}}
