<!-- Header -->
    @include('admin/header')
      <meta name="csrf-token" content="{{csrf_token()}}" />
     <title>Creëren Project</title>
<style>
.checker {float:right !important; }
.error { color:#fff; }
.center { text-align:center;}
.left { text-align:left}
label { font-size:13px;}
table th,td { font-size:12px;}
div.radio { margin-left:0px;} .strong { font-weight:bold; font-size:14px;}
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
		$.get('Getprices/' + Shippingcompany_id,function(data) {

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
		$.get('Getdepartment/' + customer_id,function(data) {
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
		$.get('GetContacts/' + department_id,function(data) {
		$('#contact_id').html(data);
		});

	});



});

</script>


<script>
    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Creëren Project</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'admin/project']) !!}
   <div class="col-md-12">
 @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-6">

                <div class="block">
                    <div class="header" >

                       <h2>Project gegevens</h2>

                    </div>
                    <div class="content controls">
                    <div class="form-row">
                            <div class="col-md-4">Naam:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Naam" name="name" value="{{ (Input::old('name')) ? Input::old('name') : '' }}">
                                  <span class="error">  {{ $errors->first( 'name' , ':message' ) }}</span>
                            </div>

                        </div>

                        <div class="form-row">
                          <div class="col-md-4">Klant:</div>
                            <div class="col-md-7">
                            		<select class="form-control" name="customer_id" id="customer_id">
                                    <option value="">Select Klant</option>
																		@foreach ($customers as $customer)
                                      <option value="{!! $customer->Id!!}" <?php if ($customer->Id == $CustomerID) { ?> selected="selected" <?php } ?>>{!! $customer->Name !!}</option>
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
                                     @foreach ($departments as $department)
                                      <option value="{!! $department->id!!}" <?php if ($department->Id == $dept_id) { ?> selected="selected" <?php } ?>>{!! $department->Name!!}</option>
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
                                     @foreach ($contacts as $contact)
                                      <option value="{!! $contact->id!!}">{!! $contact->Firstname !!} {!! $contact->Lastname !!}</option>
                                    @endforeach
                                </select>
                                   <span class="error">  {{ $errors->first( 'contact_id' , ':message' ) }}</span>
                            </div>
                          </div>

                       <div class="form-row">
                            <div class="col-md-4">Actief:</div>
                           <div class="col-md-7">
                                <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" checked="checked" value="1" name="active" id="Active"></div>
                                </div>

                            </div>
                        </div>

                       <div class="form-row">
                            <div class="col-md-4">Start datum:</div>
                            <div class="col-md-7">
                          <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('m-d-Y')?>" name="start_date" value="{{ (Input::old('start_date')) ? Input::old('start_date') : '' }}">
                                </div>
                                <span class="error">  {{ $errors->first( 'start_date' , ':message' ) }}</span>
                        </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Eind datum:</div>
                            <div class="col-md-7">
                          <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('m-d-Y')?>" name="end_date" value="{{ (Input::old('end_date')) ? Input::old('end_date') : '' }}">
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
                                      <option value="{!! $projectmanager->Id!!}">{!! $projectmanager->Firstname !!}</option>
                                    @endforeach
{{--                                        <option value="6">Shakeels</option>--}}
                                </select>
                                 <span class="error">  {{ $errors->first( 'projectmanager_id' , ':message' ) }}</span>
                            </div>
                          </div>


                       <div class="form-row">
                            <div class="col-md-4">Beschrijving:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Beschrijving" name="description" value="{{ (Input::old('description')) ? Input::old('description') : '' }}">
                                  <span class="error">  {{ $errors->first( 'description' , ':message' ) }}</span>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Vaste prijs:</div>
                            <div class="col-md-5">
                            		<input type="text" class="form-control" placeholder="Vaste prijs" name="fixed" value="{{ (Input::old('fixed')) ? Input::old('fixed') : '' }}"><span class="error">  {{ $errors->first( 'fixed' , ':message' ) }}</span>
                             </div>
                             <div class="col-md-2">
                                     € 0.00
                            </div>
                        </div>

                          <div class="form-row">
                            <div class="col-md-4">Tarief p/u:</div>
                            <div class="col-md-5">
                            		<input type="text" class="form-control" placeholder="Tarief p/u" name="rate" value="{{ (Input::old('rate')) ? Input::old('rate') : '' }}"><span class="error">  {{ $errors->first( 'rate' , ':message' ) }}</span>
                            </div>
                            <div class="col-md-2">
                             € 0.00
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="col-md-4">ECU Project/Debiteur #:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Project nr" name="project_ref" value="{{ (Input::old('project_ref')) ? Input::old('project_ref') : '' }}"><span class="error">  {{ $errors->first( 'project_ref' , ':message' ) }}</span>

                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Klant proj. nr.:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Klant proj. nr." name="customer_ref" value="{{ (Input::old('customer_ref')) ? Input::old('customer_ref') : '' }}"><span class="error">  {{ $errors->first( 'customer_ref' , ':message' ) }}</span>
                            </div>

                        </div>

                     <div class="form-row">
                          <div class="col-md-4">Containers Leveranciers:</div>
                            <div class="col-md-7">
                            		<select class="form-control" name="Shippingcompany_id" id="Shippingcompany_id">
                                    <option value="">Select Containers Leverancier</option>
                                      @foreach ($Shippingcompany as $Company)
                                      <option value="{!! $Company->id!!}">{!! $Company->Companyname !!}</option>
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
                            		<textarea class="form-control" name="Notes" rows="5" placeholder="Afspraken"></textarea>
                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>
                        </div>


                       <div class="form-row">
                            <div class="col-md-4">Containers notities:</div>
                            <div class="col-md-7">
                            		<textarea class="form-control" rows="5" name="Container_Notes" placeholder="Containers notities"></textarea>

                            </div>
                        </div>

                       <div class="form-row">
                            <div class="col-md-4">Goedkeuring:</div>
                            <div class="col-md-7">
                            		<textarea class="form-control" rows="5" name="Goedkeuring" placeholder="Goedkeuring"></textarea>

                            </div>
                        </div>

												<div class="form-row">
													 <div class="col-md-4">Notite:</div>
													 <div class="col-md-7">
															 <textarea class="form-control" rows="5" name="more_notes" placeholder="Notite"></textarea>

													 </div>
											 </div>

                    </div>
                </div>
             </div>

      <div class="col-md-6">
          <style>
              #map {
                  height: 100%;
              }

              /* Optional: Makes the sample page fill the window. */
              html,
              body {
                  height: 100%;
                  margin: 0;
                  padding: 0;
              }

              #description {
                  font-family: Roboto;
                  font-size: 15px;
                  font-weight: 300;
              }

              #infowindow-content .title {
                  font-weight: bold;
              }

              #infowindow-content {
                  display: none;
              }

              #map #infowindow-content {
                  display: inline;
              }

              .pac-card {
                  margin: 10px 10px 0 0;
                  border-radius: 2px 0 0 2px;
                  box-sizing: border-box;
                  -moz-box-sizing: border-box;
                  outline: none;
                  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                  background-color: #fff;
                  font-family: Roboto;
              }

              #pac-container {
                  padding-bottom: 12px;
                  margin-right: 12px;
              }

              .pac-controls {
                  display: inline-block;
                  padding: 5px 11px;
              }

              .pac-controls label {
                  font-family: Roboto;
                  font-size: 13px;
                  font-weight: 300;
              }

              #pac-input {
                  background-color: #fff;
                  color: black;
                  font-family: Roboto;
                  font-size: 15px;
                  font-weight: 300;
                  margin-left: 12px;
                  padding: 0 11px 0 13px;
                  text-overflow: ellipsis;
                  width: 500px;
              }

              #pac-input:focus {
                  border-color: #4d90fe;
              }

              #title {
                  color: #fff;
                  background-color: #4d90fe;
                  font-size: 25px;
                  font-weight: 500;
                  padding: 6px 12px;
              }

              #target {
                  width: 345px;
              }
          </style>


          <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Contact Informatie</h2>
                    </div>

                    </div>
                    <div class="content controls">
{{--                    <div class="form-row">--}}
{{--                            <div class="col-md-4">Fax:</div>--}}
{{--                            <div class="col-md-7">--}}
{{--                            		<input type="text" class="form-control" placeholder="Fax" name="fax" value="{{ (Input::old('fax')) ? Input::old('fax') : '' }}"><span class="error">  {{ $errors->first( 'fax' , ':message' ) }}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}



                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Adres" name="Address" value="{{ (Input::old('Address')) ? Input::old('Address') : '' }}"><span class="error">  {{ $errors->first( 'Address' , ':message' ) }}</span>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Postcode" name="Zipcode" value="{{ (Input::old('Zipcode')) ? Input::old('Zipcode') : '' }}"><span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Stad" name="City" value="{{ (Input::old('City')) ? Input::old('City') : '' }}"><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span>
                            </div>
                        </div>
{{--                        <div class="form-row">--}}
{{--                            <div class="col-md-4">Locaties:</div>--}}
{{--                            <div class="col-md-7">--}}
{{--                            		<input type="text" class="form-control" placeholder="Locaties" name="Location" value="{{ (Input::old('Location')) ? Input::old('City') : '' }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-row">
{{--                            <div class="col-md-4">Locaties:</div>--}}
{{--                            <div class="col-md-7">--}}
{{--                                <input type="text" class="form-control" placeholder="Zoeken Locaties" name="Location" id="searchTextField" value="{{ (Input::old('Location')) ? Input::old('City') : '' }}">--}}
{{--                            </div>--}}
{{--                            <input type="hidden" id="city2" name="city2" />--}}
{{--                            <input type="hidden" id="cityLat" name="cityLat" />--}}
{{--                            <input type="hidden" id="cityLng" name="cityLng" />--}}
                            <div class="col-md-4">Locaties:</div>
                            <!-- <div>Locaties:</div> -->
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Locaties" name="Location" id="pac-input" value="{{ (Input::old('Location')) ? Input::old('City') : '' }}">

                                <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>




                                <!-- <input id="" class="controls" type="text" placeholder="Search Box" /> -->
                                <div style="height: 200px; width: 560px;" id="map"></div>

                                <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                            </div>
                        </div>
                    </div>
                </div>
       <div class="block">
                    <div class="header" >

                       <h2>Weekstaten</h2>


                    </div>
                    <div class="content controls">


                        <div class="form-row">
                            <div class="col-md-4">Weekstaten:</div>
                            <div class="col-md-7">
                            	<select class="form-control" name="weekcard">
                                   <option value="3" >3 Maanden</option>
                                   <option value="6">6 Maanden</option>
                                    <option value="all">Alle</option>

                                </select>
                                    <span class="error">  {{ $errors->first( 'weekcard' , ':message' ) }}</span>
                            </div>
                        </div>

                    </div>
                </div>

         <div class="block">
                    <div class="header" >

                       <h2>Keetonderhoud</h2>


                    </div>
                    <div class="content controls">
                   <div class="form-row">
                            <div class="col-md-4">Prijsafspraak:</div>
                            <div class="col-md-3">
                           		<input type="radio" id="per_keer" name="prijsafspraak" value="0" checked="checked" />
                            Per keer
                            </div>
                             <div class="col-md-3">
                            	<input type="radio" name="prijsafspraak" id="per_uur" value="1" />
                            Per uur
                            </div>

                            </div>

                    <div class="form-row" id="number_times">
                            <div class="col-md-4">Aantal keer per week:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control"  placeholder="Aantal keer per week" name="number_times" >
                              </div>

                           </div>
                     <div class="form-row" id="eenheid">
                            <div class="col-md-4">Eenheid:</div>
                            <div class="col-md-3">
                           		<input type="radio" name="unit" id="per_stand" value="0" checked="checked" />
                            Prijs per keet
                            </div>
                             <div class="col-md-3">
                            	<input type="radio" name="unit" id="per_project" value="1" />
                            Prijs per project
                            </div>
                             </div>



                            <div class="form-row" id="number" >
                            <div class="col-md-4">Aantal keten:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control" placeholder="Aantal keten" name="number_chain" >
                              </div>

                           </div>


                  <div class="form-row" >
                            <div class="col-md-4">Prijs:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control"  placeholder="Prijs" name="price" >
                              </div>

                           </div>

                    <div class="form-row" >
                            <div class="col-md-4">Inkoopprijs:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control"  placeholder="Inkoopprijs" name="purchase_price" >
                              </div>

                           </div>
                           <?php //} ?>




                             </div>



                        </div>

         <!--<div class="block">
                    <div class="header" >

                       <h2>Keetonderhoud</h2>


                    </div>
                    <div class="content controls">


                        <div class="form-row">
                            <div class="col-md-4">Unit:</div>
                            <div class="col-md-3">
                           		<input type="radio" name="unit" id="per_stand" value="0"  />
                            Prijs per keet
                            </div>
                             <div class="col-md-3">
                            	<input type="radio" name="unit" id="per_project" value="1" />
                            Prijs per project
                            </div>
                             </div>
                            <div class="form-row" id="number">
                            <div class="col-md-4">Aantal keten:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control" placeholder="Aantal keten" name="number_chain">
                              </div>

                           </div>
                           <div class="form-row">
                            <div class="col-md-4">Prijs:</div>
                            <div class="col-md-3">
                           		<input type="radio" name="price" value="0"/>
                            Per keer
                            </div>
                             <div class="col-md-3">
                            	<input type="radio" name="price" value="1" />
                            Per uur
                            </div>

                            </div>
                             <div class="form-row">
                            <div class="col-md-4">Aantal keer per week:</div>
                             <div class="col-md-7">
                            	 <input type="text" class="form-control" placeholder="Aantal keer per week" name="number_times">
                              </div>

                           </div>


                             </div>



                        </div>-->

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
                            <div class="col-md-3">3m<sup>3</sup>:</div>
                            <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_bsa" name="pr_3m3_bsa" value="{{ (Input::old('pr_3m3_bsa')) ? Input::old('pr_3m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_3m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_hout" name="pr_3m3_hout" value="{{ (Input::old('pr_3m3_hout')) ? Input::old('pr_3m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_3m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_puin" name="pr_3m3_puin" value="{{ (Input::old('pr_3m3_puin')) ? Input::old('pr_3m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_3m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>

                         </div>

                     <div class="form-row">
                            <div class="col-md-3">6m<sup>3</sup>:</div>
                            <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_bsa" name="pr_6m3_bsa" value="{{ (Input::old('pr_6m3_bsa')) ? Input::old('pr_6m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_6m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_hout" name="pr_6m3_hout" value="{{ (Input::old('pr_6m3_hout')) ? Input::old('pr_6m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_6m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_puin" name="pr_6m3_puin" value="{{ (Input::old('pr_6m3_puin')) ? Input::old('pr_6m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_6m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>

                         </div>

                         <div class="form-row">
                            <div class="col-md-3">10m<sup>3</sup>:</div>
                            <div class="col-md-2" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_bsa" name="pr_10m3_bsa" value="{{ (Input::old('pr_10m3_bsa')) ? Input::old('pr_10m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_10m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_hout" name="pr_10m3_hout" value="{{ (Input::old('pr_10m3_hout')) ? Input::old('pr_10m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_10m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_puin" name="pr_10m3_puin" value="{{ (Input::old('pr_10m3_puin')) ? Input::old('pr_10m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_10m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>

                         </div>

                          <div class="form-row">
                            <div class="col-md-3">20m<sup>3</sup>:</div>
                            <div class="col-md-2" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_bsa" name="pr_20m3_bsa" value="{{ (Input::old('pr_20m3_bsa')) ? Input::old('pr_20m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_20m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>



                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_hout" name="pr_20m3_hout" value="{{ (Input::old('pr_20m3_hout')) ? Input::old('pr_20m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_20m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>


                          <div class="col-md-2">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_puin" name="pr_20m3_puin" value="{{ (Input::old('pr_20m3_puin')) ? Input::old('pr_20m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_20m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>

                         </div>


                    </div>
                </div>-->

          </div>

          <div class="col-md-12">

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
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_bsa" name="rl_pr_bsa" value="{{ (Input::old('rl_pr_bsa')) ? Input::old('rl_pr_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'rl_pr_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_bsa" name="rl_sl_bsa" value="{{ (Input::old('rl_sl_bsa')) ? Input::old('rl_sl_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'rl_sl_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_hout" name="rl_pr_hout" value="{{ (Input::old('rl_pr_hout')) ? Input::old('rl_pr_hout') : '' }}">    <span class="error">  {{ $errors->first( 'rl_pr_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_hout" name="rl_sl_hout" value="{{ (Input::old('rl_sl_hout')) ? Input::old('rl_sl_hout') : '' }}">    <span class="error">  {{ $errors->first( 'rl_sl_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>



  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_puin" name="rl_pr_puin" value="{{ (Input::old('rl_pr_puin')) ? Input::old('rl_pr_puin') : '' }}">     <span class="error">  {{ $errors->first( 'rl_pr_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_puin" name="rl_sl_puin" value="{{ (Input::old('rl_sl_puin')) ? Input::old('rl_sl_puin') : '' }}">     <span class="error">  {{ $errors->first( 'rl_sl_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  </tr>




  <tr>

  <td>3m<sup>3</sup>:</td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_bsa" name="pr_3m3_bsa" value="{{ (Input::old('pr_3m3_bsa')) ? Input::old('pr_3m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_3m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_3m3_bsa" name="sl_pr_3m3_bsa" value="{{ (Input::old('sl_pr_3m3_bsa')) ? Input::old('sl_pr_3m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'sl_pr_3m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_hout" name="pr_3m3_hout" value="{{ (Input::old('pr_3m3_hout')) ? Input::old('pr_3m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_3m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_3m3_hout" name="sl_pr_3m3_hout" value="{{ (Input::old('sl_pr_3m3_hout')) ? Input::old('sl_pr_3m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'sl_pr_3m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_3m3_puin" name="pr_3m3_puin" value="{{ (Input::old('pr_3m3_puin')) ? Input::old('pr_3m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_3m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_3m3_puin" name="sl_pr_3m3_puin" value="{{ (Input::old('sl_pr_3m3_puin')) ? Input::old('sl_pr_3m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'sl_pr_3m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  </tr>

  <tr>
  <td>6m<sup>3</sup>:</td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_bsa" name="pr_6m3_bsa" value="{{ (Input::old('pr_6m3_bsa')) ? Input::old('pr_6m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_6m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_6m3_bsa" name="sl_pr_6m3_bsa" value="{{ (Input::old('sl_pr_6m3_bsa')) ? Input::old('sl_pr_6m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'sl_pr_6m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td>  <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_hout" name="pr_6m3_hout" value="{{ (Input::old('pr_6m3_hout')) ? Input::old('pr_6m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_6m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td>  <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_6m3_hout" name="sl_pr_6m3_hout" value="{{ (Input::old('sl_pr_6m3_hout')) ? Input::old('sl_pr_6m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'sl_pr_6m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div>   </td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_6m3_puin" name="pr_6m3_puin" value="{{ (Input::old('pr_6m3_puin')) ? Input::old('pr_6m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_6m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td> <div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_6m3_puin" name="sl_pr_6m3_puin" value="{{ (Input::old('sl_pr_6m3_puin')) ? Input::old('sl_pr_6m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'sl_pr_6m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>


  </tr>

  <tr>
  <td>10m<sup>3</sup>:</td>
  <td><div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_bsa" name="pr_10m3_bsa" value="{{ (Input::old('pr_10m3_bsa')) ? Input::old('pr_10m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_10m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_10m3_bsa" name="sl_pr_10m3_bsa" value="{{ (Input::old('sl_pr_10m3_bsa')) ? Input::old('sl_pr_10m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'sl_pr_10m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_hout" name="pr_10m3_hout" value="{{ (Input::old('pr_10m3_hout')) ? Input::old('pr_10m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_10m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_10m3_hout" name="sl_pr_10m3_hout" value="{{ (Input::old('sl_pr_10m3_hout')) ? Input::old('sl_pr_10m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_10m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_10m3_puin" name="pr_10m3_puin" value="{{ (Input::old('pr_10m3_puin')) ? Input::old('pr_10m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_10m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_10m3_puin" name="sl_pr_10m3_puin" value="{{ (Input::old('sl_pr_10m3_puin')) ? Input::old('sl_pr_10m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'sl_pr_10m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  </tr>


  <tr>
  <td>20m<sup>3</sup>:</td>
  <td> <div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_bsa" name="pr_20m3_bsa" value="{{ (Input::old('pr_20m3_bsa')) ? Input::old('pr_20m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'pr_20m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td> <div class="col-md-10" >
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_20m3_bsa" name="sl_pr_20m3_bsa" value="{{ (Input::old('sl_pr_20m3_bsa')) ? Input::old('sl_pr_20m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'sl_pr_20m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_hout" name="pr_20m3_hout" value="{{ (Input::old('pr_20m3_hout')) ? Input::old('pr_20m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'pr_20m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_20m3_hout" name="sl_pr_20m3_hout" value="{{ (Input::old('sl_pr_20m3_hout')) ? Input::old('sl_pr_20m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'sl_pr_20m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="pr_20m3_puin" name="pr_20m3_puin" value="{{ (Input::old('pr_20m3_puin')) ? Input::old('pr_20m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'pr_20m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="sl_pr_20m3_puin" name="sl_pr_20m3_puin" value="{{ (Input::old('sl_pr_20m3_puin')) ? Input::old('sl_pr_20m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'sl_pr_20m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>
  </tr>

  <tr>

  <td>30m<sup>3</sup>:</td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_30m3_bsa" name="rl_pr_30m3_bsa" value="{{ (Input::old('rl_pr_30m3_bsa')) ? Input::old('rl_pr_30m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'rl_pr_30m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_30m3_bsa" name="rl_sl_30m3_bsa" value="{{ (Input::old('rl_sl_30m3_bsa')) ? Input::old('rl_sl_30m3_bsa') : '' }}">    <span class="error">  {{ $errors->first( 'rl_sl_30m3_bsa' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>



  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_30m3_hout" name="rl_pr_30m3_hout" value="{{ (Input::old('rl_pr_30m3_hout')) ? Input::old('rl_pr_30m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'rl_pr_30m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>

 <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_30m3_hout" name="rl_sl_30m3_hout" value="{{ (Input::old('rl_sl_30m3_hout')) ? Input::old('rl_sl_30m3_hout') : '' }}">    <span class="error">  {{ $errors->first( 'rl_sl_30m3_hout' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div></td>

  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_pr_30m3_puin" name="rl_pr_30m3_puin" value="{{ (Input::old('rl_pr_30m3_puin')) ? Input::old('rl_pr_30m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'rl_pr_30m3_puin' , ':message' ) }}</span>
                            </div> <div class="col-md-1">€ </div> </td>
  <td><div class="col-md-10">
                            		<input type="text" class="form-control" placeholder="Prijs" id="rl_sl_30m3_puin" name="rl_sl_30m3_puin" value="{{ (Input::old('rl_sl_30m3_puin')) ? Input::old('rl_sl_30m3_puin') : '' }}">     <span class="error">  {{ $errors->first( 'rl_sl_30m3_puin' , ':message' ) }}</span>
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
    <input type="text" class="form-control" placeholder="Article No" name="article_no_10m3" readonly="readonly" id="article_no_10m3" value="{{ (Input::old('article_no_10m3')) ? Input::old('article_no_10m3') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_10m3' , ':message' ) }}</span>
    </td>

    <td class="left">
    Transportkosten containers met een inhoud van 3 m<sup>3</sup> tot en met 10 m<sup>3</sup>
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_10m3" id="Price_10m3" value="{{ (Input::old('Price_10m3')) ? Input::old('Price_10m3') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_10m3' , ':message' ) }}</span>

    </td>
      <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_10m3" id="sale_Price_10m3" value="{{ @$pricelist->sale_Price_10m3 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_10m3' , ':message' ) }}</span></td>
    <td>
        <select class="form-control" name="Unit_10m3" id="Unit_10m3">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_10m3' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_40m3" id="article_no_40m3" value="{{ (Input::old('article_no_40m3')) ? Input::old('article_no_40m3') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_40m3' , ':message' ) }}</span>
    </td>

    <td class="left">
    Transportkosten containers met een inhoud van 15 m<sup>3</sup> tot en met 40 m<sup>3</sup>
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_40m3" id="Price_40m3" value="{{ (Input::old('Price_40m3')) ? Input::old('Price_40m3') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_40m3' , ':message' ) }}</span>
    </td>
     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_40m3" id="sale_Price_40m3" value="{{ @$pricelist->sale_Price_40m3 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_40m3' , ':message' ) }}</span></td>
    <td>
        <select class="form-control" name="Unit_40m3" id="Unit_40m3">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_40m3' , ':message' ) }}</span>
    </td>
    </tr>

     <tr style="border:none;"><td colspan="4" class="left"><h5>Verwerkingstariet per ton (1000 kg)</h5></td></tr>

     <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_sorteerbaar" id="article_no_sorteerbaar" value="{{ (Input::old('article_no_sorteerbaar')) ? Input::old('article_no_sorteerbaar') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_sorteerbaar' , ':message' ) }}</span>
    </td>

    <td class="left">
    Bouw- en sloopafval (sorteerbaar)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_sorteerbaar" id="Price_sorteerbaar" value="{{ (Input::old('Price_sorteerbaar')) ? Input::old('Price_sorteerbaar') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_sorteerbaar' , ':message' ) }}</span>

    </td>
     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_sorteerbaar" id="sale_Price_sorteerbaar" value="{{ @$pricelist->sale_Price_sorteerbaar }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_sorteerbaar' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_sorteerbaar" id="Unit_sorteerbaar">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_sorteerbaar' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_niet_sorteerbaar" id="article_no_niet_sorteerbaar" value="{{ (Input::old('article_no_niet_sorteerbaar')) ? Input::old('article_no_niet_sorteerbaar') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_niet_sorteerbaar' , ':message' ) }}</span>
    </td>

    <td class="left">
   Bouw- en sloopafval (niet sorteerbaar)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_niet_sorteerbaar" id="Price_niet_sorteerbaar" value="{{ (Input::old('Price_niet_sorteerbaar')) ? Input::old('Price_niet_sorteerbaar') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_niet_sorteerbaar' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_niet_sorteerbaar" id="sale_Price_niet_sorteerbaar" value="{{ @$pricelist->sale_Price_niet_sorteerbaar }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_niet_sorteerbaar' , ':message' ) }}</span></td>



    <td>
        <select class="form-control" name="Unit_niet_sorteerbaar" id="Unit_niet_sorteerbaar">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_niet_sorteerbaar' , ':message' ) }}</span>
    </td>
    </tr>
     <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Bedrijfsafval" id="article_no_Bedrijfsafval" value="{{ (Input::old('article_no_Bedrijfsafval')) ? Input::old('article_no_Bedrijfsafval') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Bedrijfsafval' , ':message' ) }}</span>
    </td>

    <td class="left">
    Bedrijfsafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Bedrijfsafval" id="Price_Bedrijfsafval" value="{{ (Input::old('Price_Bedrijfsafval')) ? Input::old('Price_Bedrijfsafval') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Bedrijfsafval' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Bedrijfsafval" id="sale_Price_Bedrijfsafval" value="{{ @$pricelist->sale_Price_Bedrijfsafval }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Bedrijfsafval' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Bedrijfsafval" id="Unit_Bedrijfsafval">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Bedrijfsafval' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_A_B_hout" id="article_no_A_B_hout" value="{{ (Input::old('article_no_A_B_hout')) ? Input::old('article_no_A_B_hout') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_A_B_hout' , ':message' ) }}</span>
    </td>

    <td class="left">
    Gemengd hout (A- enlof B- hout)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_A_B_hout" id="Price_A_B_hout" value="{{ (Input::old('Price_A_B_hout')) ? Input::old('Price_A_B_hout') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_A_B_hout' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_A_B_hout" id="sale_Price_A_B_hout" value="{{ @$pricelist->sale_Price_A_B_hout }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_A_B_hout' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_A_B_hout" id="Unit_A_B_hout">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_A_B_hout' , ':message' ) }}</span>
    </td>
    </tr>
     <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_C_hout" id="article_no_C_hout" value="{{ (Input::old('article_no_C_hout')) ? Input::old('article_no_C_hout') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_C_hout' , ':message' ) }}</span>
    </td>

    <td class="left">
    C- hout
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_C_hout" id="Price_C_hout" value="{{ (Input::old('Price_C_hout')) ? Input::old('Price_C_hout') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_C_hout' , ':message' ) }}</span>

    </td>
    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_C_hout" id="sale_Price_C_hout" value="{{ @$pricelist->sale_Price_C_hout }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_C_hout' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_C_hout" id="Unit_C_hout">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_C_hout' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Schoon_puin" id="article_no_Schoon_puin" value="{{ (Input::old('article_no_Schoon_puin')) ? Input::old('article_no_Schoon_puin') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Schoon_puin' , ':message' ) }}</span>
    </td>

    <td class="left">
    Schoon puin(< 60 cm)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_puin" id="Price_Schoon_puin" value="{{ (Input::old('Price_Schoon_puin')) ? Input::old('Price_Schoon_puin') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_puin' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Schoon_puin" id="sale_Price_Schoon_puin" value="{{ @$pricelist->sale_Price_Schoon_puin }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Schoon_puin' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Schoon_puin" id="Unit_Schoon_puin">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Schoon_puin' , ':message' ) }}</span>
    </td>
    </tr>

     <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Puin_Grof" id="article_no_Puin_Grof" value="{{ (Input::old('article_no_Puin_Grof')) ? Input::old('article_no_Puin_Grof') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Puin_Grof' , ':message' ) }}</span>
    </td>

    <td class="left">
    Puin Grof (> 60 cm)
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_Grof" id="Price_Puin_Grof" value="{{ (Input::old('Price_Puin_Grof')) ? Input::old('Price_Puin_Grof') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_Grof' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Puin_Grof" id="sale_Price_Puin_Grof" value="{{ @$pricelist->sale_Price_Puin_Grof }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Puin_Grof' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Puin_Grof" id="Unit_Puin_Grof">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Puin_Grof' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Puin_met_10" id="article_no_Puin_met_10" value="{{ (Input::old('article_no_Puin_met_10')) ? Input::old('article_no_Puin_met_10') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Puin_met_10' , ':message' ) }}</span>
    </td>

    <td class="left">
    Puin met 10% tot 25% zand I grond
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_10" id="Price_Puin_met_10" value="{{ (Input::old('Price_Puin_met_10')) ? Input::old('Price_Puin_met_10') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_10' , ':message' ) }}</span>

    </td>
    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Puin_met_10" id="sale_Price_Puin_met_10" value="{{ @$pricelist->sale_Price_Puin_met_10 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Puin_met_10' , ':message' ) }}</span></td>



    <td>
        <select class="form-control" name="Unit_Puin_met_10" id="Unit_Puin_met_10">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Puin_met_10' , ':message' ) }}</span>
    </td>
    </tr>

     <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Puin_met_25" id="article_no_Puin_met_25" value="{{ (Input::old('article_no_Puin_met_25')) ? Input::old('article_no_Puin_met_25') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Puin_met_25' , ':message' ) }}</span>
    </td>

    <td class="left">
   Puin met 25% of meer zand I grond
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Puin_met_25" id="Price_Puin_met_25" value="{{ (Input::old('Price_Puin_met_25')) ? Input::old('Price_Puin_met_25') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Puin_met_25' , ':message' ) }}</span>

    </td>
    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Puin_met_25" id="sale_Price_Puin_met_25" value="{{ @$pricelist->sale_Price_Puin_met_25 }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Puin_met_25' , ':message' ) }}</span></td>


    <td>
        <select class="form-control" name="Unit_Puin_met_25" id="Unit_Puin_met_25">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Puin_met_25' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Asfaltpuin" id="article_no_Asfaltpuin" value="{{ (Input::old('article_no_Asfaltpuin')) ? Input::old('article_no_Asfaltpuin') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Asfaltpuin' , ':message' ) }}</span>
    </td>

    <td class="left">
    Asfaltpuin
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Asfaltpuin" id="Price_Asfaltpuin" value="{{ (Input::old('Price_Asfaltpuin')) ? Input::old('Price_Asfaltpuin') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Asfaltpuin' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Asfaltpuin" id="sale_Price_Asfaltpuin" value="{{ @$pricelist->sale_Price_Asfaltpuin }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Asfaltpuin' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Asfaltpuin" id="Unit_Asfaltpuin">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Asfaltpuin' , ':message' ) }}</span>
    </td>
    </tr>

     <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Schoon_Gips" id="article_no_Schoon_Gips" value="{{ (Input::old('article_no_Schoon_Gips')) ? Input::old('article_no_Schoon_Gips') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Schoon_Gips' , ':message' ) }}</span>
    </td>

    <td class="left">
    Schoon Gips
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_Gips" id="Price_Schoon_Gips" value="{{ (Input::old('Price_Schoon_Gips')) ? Input::old('Price_Schoon_Gips') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_Gips' , ':message' ) }}</span>

    </td>
    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Schoon_Gips" id="sale_Price_Schoon_Gips" value="{{ @$pricelist->sale_Price_Schoon_Gips }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Schoon_Gips' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Schoon_Gips" id="Unit_Schoon_Gips">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Schoon_Gips' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Groenafval" id="article_no_Groenafval" value="{{ (Input::old('article_no_Groenafval')) ? Input::old('article_no_Groenafval') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Groenafval' , ':message' ) }}</span>
    </td>

    <td class="left">
    Groenafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Groenafval" id="Price_Groenafval" value="{{ (Input::old('Price_Groenafval')) ? Input::old('Price_Groenafval') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Groenafval' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Groenafval" id="sale_Price_Groenafval" value="{{ @$pricelist->sale_Price_Groenafval }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Groenafval' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Groenafval" id="Unit_Groenafval">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Groenafval' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Dakafval" id="article_no_Dakafval" value="{{ (Input::old('article_no_Dakafval')) ? Input::old('article_no_Dakafval') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Dakafval' , ':message' ) }}</span>
    </td>

    <td class="left">
    Dakafval
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakafval" id="Price_Dakafval" value="{{ (Input::old('Price_Dakafval')) ? Input::old('Price_Dakafval') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakafval' , ':message' ) }}</span>

    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Dakafval" id="sale_Price_Dakafval" value="{{ @$pricelist->sale_Price_Dakafval }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Dakafval' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Dakafval" id="Unit_Dakafval">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Dakafval' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Dakgrind" id="article_no_Dakgrind" value="{{ (Input::old('article_no_Dakgrind')) ? Input::old('article_no_Dakgrind') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Dakgrind' , ':message' ) }}</span>
    </td>

    <td class="left">
    Dakgrind
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Dakgrind" id="Price_Dakgrind" value="{{ (Input::old('Price_Dakgrind')) ? Input::old('Price_Dakgrind') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Dakgrind' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Dakgrind" id="sale_Price_Dakgrind" value="{{ @$pricelist->sale_Price_Dakgrind }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Dakgrind' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Dakgrind" id="Unit_Dakgrind">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Dakgrind' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Schoon_vlakglas" id="article_no_Schoon_vlakglas" value="{{ (Input::old('article_no_Schoon_vlakglas')) ? Input::old('article_no_Schoon_vlakglas') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Schoon_vlakglas' , ':message' ) }}</span>
    </td>

    <td class="left">
    Schoon vlakglas
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Schoon_vlakglas" id="Price_Schoon_vlakglas" value="{{ (Input::old('Price_Schoon_vlakglas')) ? Input::old('Price_Schoon_vlakglas') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Schoon_vlakglas' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Schoon_vlakglas" id="sale_Price_Schoon_vlakglas" value="{{ @$pricelist->sale_Price_Schoon_vlakglas }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Schoon_vlakglas' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Schoon_vlakglas" id="Unit_Schoon_vlakglas">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Schoon_vlakglas' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Opbrengsten_metalen" id="article_no_Opbrengsten_metalen" value="{{ (Input::old('article_no_Opbrengsten_metalen')) ? Input::old('article_no_Opbrengsten_metalen') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Opbrengsten_metalen' , ':message' ) }}</span>
    </td>

    <td class="left">
    Opbrengsten metalen, per ton
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_metalen" id="Price_Opbrengsten_metalen" value="{{ (Input::old('Price_Opbrengsten_metalen')) ? Input::old('Price_Opbrengsten_metalen') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_metalen' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Opbrengsten_metalen" id="sale_Price_Opbrengsten_metalen" value="{{ @$pricelist->sale_Price_Opbrengsten_metalen }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Opbrengsten_metalen' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Opbrengsten_metalen" id="Unit_Opbrengsten_metalen">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Opbrengsten_metalen' , ':message' ) }}</span>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_Opbrengsten_Papier" id="article_no_Opbrengsten_Papier" value="{{ (Input::old('article_no_Opbrengsten_Papier')) ? Input::old('article_no_Opbrengsten_Papier') : '' }}">
    <span class="error">  {{ $errors->first( 'article_no_Opbrengsten_Papier' , ':message' ) }}</span>
    </td>

    <td class="left">
    Opbrengsten Papier & Karton, per ton
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_Opbrengsten_Papier" id="Price_Opbrengsten_Papier" value="{{ (Input::old('Price_Opbrengsten_Papier')) ? Input::old('Price_Opbrengsten_Papier') : '' }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'Price_Opbrengsten_Papier' , ':message' ) }}</span>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_Opbrengsten_Papier" id="sale_Price_Opbrengsten_Papier" value="{{ @$pricelist->sale_Price_Opbrengsten_Papier }}"></div> <div class="col-md-1"> €</div>
        <span class="error">  {{ $errors->first( 'sale_Price_Opbrengsten_Papier' , ':message' ) }}</span></td>

    <td>
        <select class="form-control" name="Unit_Opbrengsten_Papier" id="Unit_Opbrengsten_Papier">
        <option value="">Selecteer Unit</option>
       <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
        <span class="error">  {{ $errors->first( 'Unit_Opbrengsten_Papier' , ':message' ) }}</span>
    </td>
    </tr>

      <!---Extra Fields ---->
      <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_field1" id="article_no_field1" value="{{ (Input::old('article_no_field1')) ? Input::old('article_no_field1') : '' }}">

    </td>

    <td class="left">
      <input type="text" class="form-control" placeholder="Description" name="description_field1" id="description_field1" readonly="readonly" value="{{ (Input::old('description_field1')) ? Input::old('description_field1') : '' }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_field1" id="Price_field1" value="{{ (Input::old('Price_field1')) ? Input::old('Price_field1') : '' }}"></div> <div class="col-md-1"> €</div>

    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field1" id="sale_Price_field1" value="{{ @$pricelist->sale_Price_field1 }}"></div> <div class="col-md-1"> €</div>
       </td>


    <td>
        <select class="form-control" name="Unit_field1" id="Unit_field1">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" name="article_no_field2" id="article_no_field2" value="{{ (Input::old('article_no_field2')) ? Input::old('article_no_field2') : '' }}">
    </td>

    <td class="left">
     <input type="text" class="form-control" placeholder="Description" id="description_field2" readonly="readonly" name="description_field2" value="{{ (Input::old('description_field2')) ? Input::old('description_field2') : '' }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="Price_field2" id="Price_field2" value="{{ (Input::old('Price_field2')) ? Input::old('Price_field2') : '' }}"></div> <div class="col-md-1"> €</div>
    </td>

    <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field2" id="sale_Price_field2" value="{{ @$pricelist->sale_Price_field2 }}"></div> <div class="col-md-1"> €</div>
       </td>

    <td>
        <select class="form-control" id="Unit_field2" name="Unit_field2">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" id="article_no_field3" name="article_no_field3" value="{{ (Input::old('article_no_field3')) ? Input::old('article_no_field3') : '' }}">
    </td>

    <td class="left">
     <input type="text" class="form-control" placeholder="Description" readonly="readonly" id="description_field3" name="description_field3" value="{{ (Input::old('description_field3')) ? Input::old('description_field3') : '' }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" id="Price_field3" name="Price_field3" value="{{ (Input::old('Price_field3')) ? Input::old('Price_field3') : '' }}"></div> <div class="col-md-1"> €</div>

     </td>

      <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field3" id="sale_Price_field3" value="{{ @$pricelist->sale_Price_field3 }}"></div> <div class="col-md-1"> €</div>
       </td>

    <td>
        <select class="form-control" id="Unit_field3" name="Unit_field3">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
    </td>
    </tr>

    <tr>

    <td>
    <input type="text" class="form-control" placeholder="Article No" readonly="readonly" id="article_no_field4" name="article_no_field4" value="{{ (Input::old('article_no_field4')) ? Input::old('article_no_field4') : '' }}">
    </td>

    <td class="left">
     <input type="text" class="form-control" placeholder="Description" readonly="readonly" id="description_field4" name="description_field4" value="{{ (Input::old('description_field4')) ? Input::old('description_field4') : '' }}">
   </td>
    <td>
        <div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" id="Price_field4" name="Price_field4" value="{{ (Input::old('Price_field4')) ? Input::old('Price_field4') : '' }}"></div> <div class="col-md-1"> €</div>
    </td>

     <td><div class="col-md-10">   <input type="text" class="form-control" placeholder="Prijs" name="sale_Price_field4" id="sale_Price_field4" value="{{ @$pricelist->sale_Price_field4 }}"></div> <div class="col-md-1"> €</div>
       </td>

    <td>
        <select class="form-control" id="Unit_field4" name="Unit_field4">
        <option value="">Selecteer Unit</option>
        <option value="KG">Per KG</option>
        <option value="TON">Per TON</option>
        <option value="RIT">Per RIT</option>
        <option value="KEER">Per KEER</option>
        <option value="WEEK">Per WEEK</option>
        <option value="MAAND">Per MAAND</option>
        </select>
    </td>
    </tr>



    </tbody>
    </table>

                    </div>
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
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUXgHEPnb8UzSo9eznT30-3Gh2r7yN8e8&callback=initAutocomplete&libraries=places&v=weekly" async></script>
            <script>
                // This example adds a search box to a map, using the Google Place Autocomplete
                // feature. People can enter geographical searches. The search box will return a
                // pick list containing a mix of places and predicted search terms.
                // This example requires the Places library. Include the libraries=places
                // parameter when you first load the API. For example:
                // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
                var Lat = 0;
                var long =0;
                // if (navigator.geolocation) {
                //     y = navigator.geolocation.getCurrentPosition(showPosition);
                // } else {
                //     x.innerHTML = "Geolocation is not supported by this browser.";
                // }
                getLocation();
                function getLocation() {
                    // alert();
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                }
                function showPosition(position) {
                    //alert(position.coords.latitude);
                    Lat =position.coords.latitude;
                    long =position.coords.longitude;
                    // console.log(position);
                    // x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
                }
// alert(Lat);
                function initAutocomplete() {
                    const map = new google.maps.Map(document.getElementById("map"), {
                        center: {
                            lat: Lat ? Lat : -33.8688,
                            lng: long ? long : 151.2195
                        },
                        zoom: 13,
                        mapTypeId: "roadmap",
                    });
                    // Create the search box and link it to the UI element.
                    const input = document.getElementById("pac-input");
                    const searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                    // Bias the SearchBox results towards current map's viewport.
                    map.addListener("bounds_changed", () => {
                        searchBox.setBounds(map.getBounds());
                    });
                    let markers = [];
                    // Listen for the event fired when the user selects a prediction and retrieve
                    // more details for that place.
                    searchBox.addListener("places_changed", () => {
                        const places = searchBox.getPlaces();

                        if (places.length == 0) {
                            return;
                        }
                        // Clear out the old markers.
                        markers.forEach((marker) => {
                            marker.setMap(null);
                        });
                        markers = [];
                        // For each place, get the icon, name and location.
                        const bounds = new google.maps.LatLngBounds();
                        places.forEach((place) => {
                            if (!place.geometry || !place.geometry.location) {
                                console.log("Returned place contains no geometry");
                                return;
                            }
                            const icon = {
                                url: place.icon,
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25),
                            };
                            // Create a marker for each place.
                            markers.push(
                                new google.maps.Marker({
                                    map,
                                    icon,
                                    title: place.name,
                                    position: place.geometry.location,
                                })
                            );

                            if (place.geometry.viewport) {
                                // Only geocodes have viewport.
                                bounds.union(place.geometry.viewport);
                            } else {
                                bounds.extend(place.geometry.location);
                            }
                        });
                        map.fitBounds(bounds);
                    });
                }
            </script>
  </div>   <br />
       @include('admin/footer')</div>
