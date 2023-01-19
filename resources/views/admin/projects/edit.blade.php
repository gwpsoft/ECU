<!-- Header -->
@include('admin/header')
<meta name="csrf-token" content="{{csrf_token()}}" />
<title>Project bewerken. . . .</title>
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
{{--					<div class="form-row">--}}
{{--						<div class="col-md-4">Locaties:</div>--}}
{{--						<div class="col-md-7">--}}
{{--							<input type="text" class="form-control" placeholder="Locaties" name="Location" value="{{ $Get_project->Location }}">--}}
{{--						</div>--}}
{{--					</div>--}}
					<div class="form-row">
						<div class="col-md-4">Locaties:</div>
						<!-- <div class="col-md-7"> -->
					<!-- <input type="text" class="form-control" placeholder="Locaties" name="Location" value="{{ $Get_project->Location }}"> -->
						<!-- </div> -->
						<div class="col-md-12">
							<input type="text" class="form-control" placeholder="Locaties" name="Location" id="pac-input" value="{{ $Get_project->Location }}">

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
					<a title="Nieuw Weekstaat" href="<?php echo URL:: to('admin/Add-weekstaat').'/'.$Get_project->Id;?>"><img class=" " src="{{ URL::asset('assets/img/icons/add_new.png') }}" id="pdf" style=" cursor:pointer; float:right"></a>

					<a title="Weekstaat gegevens" href="{{url('admin/projects/'.$Get_project->Id.'/details?starting='.$starting.'&&ending='.$ending)}}">
						<img class=" " src="{{ URL::asset('assets/img/icons/view-detail.png') }}" id="pdf" style=" cursor:pointer; float:right">
					</a>

				</div>
				<div class="content controls" style="padding-top: 10px;">

					<div class="col-md-4">Weekstaten:</div>
					<div class="col-md-7">
						<div style="height:150px !important; overflow: scroll">
							@if (count($weekcards) > 0)
								@if (isset($weekcards) && count($weekcards)>0)
									@foreach ($weekcards as $weekcard)
										<li><a href="{{ url('admin/Edit-weekstaat/'.$weekcard->id) }}">
											{{ $weekcard->Weeknumber }}(Verzonden: {{ $weekcard->Sent_Date }})
										</a></li>
									@endforeach
								@endif
							@else

							@endif
						</div>
					</div>

				</div>
			</div>





			<div class="block">
				<div class="header" >

					<h2>Keetonderhoud</h2>

					<a title="Nieuw Keetonderhoud Weekstaat" href="{{ url('admin/Add-New-Keetonderhoud/'.$Get_project->Id) }}"><img class=" " src="{{ URL::asset('assets/img/icons/add_new.png') }}" id="pdf" style=" cursor:pointer; float:right"></a>

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
							<input type="text" class="form-control"  placeholder="Inkoopprijs" name="purchase_price_keet" value="{{ $Get_project->purchase_price  }}">
						</div>

					</div>
					<div class="form-row" >
						<div class="col-md-4">Opmerkingen:</div>
						<div class="col-md-7">
							<textarea class="form-control"  placeholder="Opmerkingen" name="comments">{{ $Get_project->comments }}</textarea>
						</div>

					</div>
					<?php //} ?>

					<div class="form-row" style="margin-top: 15px;">
						<div class="col-md-4">Weekstaten:</div>
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
								<h2>Prijslijst</h2>
								<span class="pull-right clickable"><i class="icon-chevron-down"></i></span>
							</div>
							<div class="content" style="display:none">
								<div class="row">
									<div class="col-md-12">
										<a href="#" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#addPriceList">Toevoegen</a>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12">
										<table class="table table-bordered" style="text-align:center; font-size:12px;">
											<thead>
												<tr>
													<th style="text-align:center;">#</th>
													<th style="text-align:center;">Artikel</th>
													<th style="text-align:center;">Leverancier</th>
													<th style="text-align:center;">Aankoopprijs</th>
													<th style="text-align:center;">Verkoopprijs</th>
													<th style="text-align:center;">Opties</th>
												</tr>
											</thead>
											<tbody>
												@if ( sizeof($pricelists) > 0)
													@foreach ($pricelists as $key => $price)
														<tr>
															<td>{{ ++$key }}</td>
															<td>{{ $price->articleList->article_code }}</td>
															<td>{{ $price->supplier->Companyname }}</td>
															<td>{{ number_format($price->purchase_price, 2) }}</td>
															<td>{{ number_format($price->sale_price, 2) }}</td>
															<td>
																<a href="#" title="Bewerken" class="widget-icon" onclick="editPriceListFunction({{ $price->id }}); return false;" data-toggle="modal" data-target="#editPriceListModal"><span class="icon-pencil"></span></a>
																<a href="#" title="Verwijderen" class="widget-icon" onclick="deletePriceListRecord({{ $id }}, {{ $price->id }}); return false;"><span class="icon-trash"></span></a>
															</td>
														</tr>
													@endforeach
												@endif
											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>

						<!-- Add PriceList Modal starts -->
						<div class="modal  modal-info" id="addPriceList" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title text-center">Voeg artikelen toe</h4>
									</div>
									<div class="modal-body">

										<div class="form-group">
											<div class="col-md-3">
												<label for="article" style="margin: 0 3px;">Artikel:</label>
											</div>
											<div class="col-md-9">
												<select name="article" id="article" class="select2" style="width: 60%">
													@if (sizeof($articles) > 0)
														@foreach ($articles as $key => $article)
															<option value="{{ $article->id }}">{{ $article->article_code }}</option>
														@endforeach
													@endif
												</select>
											</div>
										</div> <!-- .form-group class ends -->

										<br>
										<br>

										<div class="form-group">
											<div class="col-md-3">
												<label for="supplier" style="margin: 0 3px;">Leverancier:</label>
											</div>
											<div class="col-md-9">
												<select name="supplier" id="supplier" class="select2" style="width: 60%">
													@if (sizeof($suppliers) > 0)
														@foreach ($suppliers as $key => $supplier)
															<option value="{{ $supplier->id }}">{{ $supplier->Companyname }}</option>
														@endforeach
													@endif
												</select>
											</div>
										</div> <!-- .form-group class ends -->

										<br>
										<br>
										<input type="hidden" name="project_id" id="project_id" value="{{ $id }}">

										<div class="form-group">
											<div class="col-md-3">
												<label for="purchase_price" style="margin: 0 3px;">Aankoopprijs:</label>
											</div>
											<div class="col-md-9">
												<input type="number" name="purchase_price" id="purchase_price" style="width: 60%">
											</div>
											<p style="color: red; margin-left: 154px; display: none;" id="purchase_price_error">
												<strong>Aankoopprijs is verplicht</strong>
											</p>
										</div> <!-- .form-group class ends -->

										<br>
										<br>

										<div class="form-group">
											<div class="col-md-3">
												<label for="sale_price" style="margin: 0 3px;">Verkoopprijs:</label>
											</div>
											<div class="col-md-9">
												<input type="number" name="sale_price" id="sale_price" style="width: 60%">
											</div>
											<p style="color: red; margin-left: 154px; display: none;" id="sale_price_error">
												<strong>Verkoopprijs is verplicht</strong>
											</p>
										</div> <!-- .form-group class ends -->

										<br>
										<br>

										<div class="form-group">
											<a href="#" class="btn btn-success" style="margin-left: 154px;" onclick="addPriceListRecord(); return false;">Opslaan</a>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Dichtbij</button>
										</div>

									</div> <!-- .model-body ends -->

								</div>

							</div>
						</div>
						<!-- Add PriceList Modal ends -->

						<!-- Edit PriceList Modal starts -->
						<div class="modal modal-info" id="editPriceListModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title text-center">Bewerk prijslijst</h4>
									</div>
									<div class="modal-body">

										<div class="form-group">
											<div class="col-md-3">
												<label for="editArticle" style="margin: 0 3px;">Artikel:</label>
											</div>
											<div class="col-md-9">
												<select name="editArticle" id="editArticle" class="form-control" style="width: 60%">
													@if (sizeof($articles) > 0)
														@foreach ($articles as $key => $article)
															<option value="{{ $article->id }}">{{ $article->article_code }}</option>
														@endforeach
													@endif
												</select>
											</div>
										</div> <!-- .form-group class ends -->

										<br>
										<br>

										<div class="form-group">
											<div class="col-md-3">
												<label for="editSupplier" style="margin: 0 3px;">Leverancier:</label>
											</div>
											<div class="col-md-9">
												<select name="editSupplier" id="editSupplier" class="form-control" style="width: 60%">
													@if (sizeof($suppliers) > 0)
														@foreach ($suppliers as $key => $supplier)
															<option value="{{ $supplier->id }}">{{ $supplier->Companyname }}</option>
														@endforeach
													@endif
												</select>
											</div>
										</div> <!-- .form-group class ends -->

										<br>
										<br>
										<input type="hidden" name="edit_priceListID" id="edit_priceListID">
										<div class="form-group">
											<div class="col-md-3">
												<label for="edit_purchase_price" style="margin: 0 3px;">Aankoopprijs:</label>
											</div>
											<div class="col-md-9">
												<input type="number" name="edit_purchase_price" id="edit_purchase_price" style="width: 60%">
											</div>
											<p style="color: red; margin-left: 154px; display: none;" id="edit_purchase_price_error">
												<strong>Aankoopprijs is verplicht</strong>
											</p>
										</div> <!-- .form-group class ends -->

										<br>
										<br>

										<div class="form-group">
											<div class="col-md-3">
												<label for="edit_sale_price" style="margin: 0 3px;">Verkoopprijs:</label>
											</div>
											<div class="col-md-9">
												<input type="number" name="edit_sale_price" id="edit_sale_price" style="width: 60%">
											</div>
											<p style="color: red; margin-left: 154px; display: none;" id="edit_sale_price_error">
												<strong>Verkoopprijs is verplicht</strong>
											</p>
										</div> <!-- .form-group class ends -->

										<br>
										<br>

										<div class="form-group">
											<a href="#" class="btn btn-success" style="margin-left: 154px;" onclick="updatePriceListRecord({{ $id }}); return false;">Bijwerken</a>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Dichtbij</button>
										</div>


									</div><!-- modal body ends here -->

								</div>

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
				@include('admin/footer')</div>
				<script src="{{ asset('assets/js/axios.min.js') }}" charset="utf-8"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC35SHRVQ0JebXbbRKgx85RTjZXDsDQH70&callback=initAutocomplete&libraries=places&v=weekly" async></script>
<script>
	// This example adds a search box to a map, using the Google Place Autocomplete
	// feature. People can enter geographical searches. The search box will return a
	// pick list containing a mix of places and predicted search terms.
	// This example requires the Places library. Include the libraries=places
	// parameter when you first load the API. For example:
	// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
	var Lat = "-33.8688";
	var long = "151.2195";
	axios.post('https://maps.googleapis.com/maps/api/geocode/json?address={{$Get_project->Location}}&key=AIzaSyC35SHRVQ0JebXbbRKgx85RTjZXDsDQH70')
			.then(function(response) {
				// console.log(response.data.results[0].geometry.location);
				let position = response.data.results[0].geometry.location;
				// Lat = position.lat;
				// long = position.lng;
				setposition(position.lat, position.lng);
			});
	function setposition(lat, lng) {
		Lat = lat;
		long = lng;
		const map = new google.maps.Map(document.getElementById("map"), {
			center: {
				lat: Lat,
				lng: long
			},
			zoom: 13,
			mapTypeId: "roadmap",
		});
		// Create the search box and link it to the UI element.
		const input = document.getElementById("pac-input");
		// console.log(input);
		const searchBox = new google.maps.places.SearchBox(input);
		//alert(searchBox);
		//console.log(searchBox);
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
	function initAutocomplete() {

	}

</script>
				<script>

				let APP_URL   = {!! json_encode(url('/').'/') !!}

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

				function addPriceListRecord() {
					document.getElementById('purchase_price_error').style.display = 'none';
					document.getElementById('sale_price_error').style.display 		= 'none';

					let APP_URL   = {!! json_encode(url('/').'/') !!}
					let article 	= document.getElementById("article");
					let articleID = article.options[article.selectedIndex].value;

					let supplier 		= document.getElementById("supplier");
					let supplierID 	= supplier.options[supplier.selectedIndex].value;

					let purchase_price 	= document.getElementById('purchase_price').value;
					let sale_price 			= document.getElementById('sale_price').value;
					let project_id 			= document.getElementById('project_id').value;

					axios.post(APP_URL + 'admin/project/price_list/store', {
						articleID: articleID,
						supplierID: supplierID,
						purchase_price: purchase_price,
						sale_price: sale_price,
						projectID: project_id,
					})
					.then(response => {
						window.location.href = APP_URL + 'admin/edit_project/' + project_id;
					})
					.catch(errorReceived => {
						let error = errorReceived.response.data;
						if(error.purchase_price) {
							document.getElementById('purchase_price_error').style.display = 'inline-block';
						}
						if(error.sale_price) {
							document.getElementById('sale_price_error').style.display 		= 'inline-block';
						}


					})

				}

				function deletePriceListRecord(projectID, id) {
					let msg = confirm("Weet je zeker dat je deze record wilt verwijderen? ?");
					if (msg == true) {
						let APP_URL   = {!! json_encode(url('/').'/') !!}

						axios.get(APP_URL + `admin/project/delete_price_list/${id}`)
						.then(response => {
							window.location.href = APP_URL + 'admin/edit_project/' + projectID;
						})
						.catch(errorReceived => {
							console.log('ERROR: '. errorReceived.response.data);
						})

					}

				}

				function editPriceListFunction(id) {

					axios.get(APP_URL + `admin/project/price_list/${id}`).then(response => {
						let list = response.data.data.list;
						// let editArticle 	= document.getElementById("editArticle");
						// editArticle.options[editArticle.selectedIndex].value = list.article_list_id;
						// document.getElementById("editArticle").selectedIndex  = list.article_list_id;

						document.getElementById('edit_priceListID').value 		= list.id;
						document.getElementById("editArticle").value				  = list.article_list_id;
						document.getElementById("editSupplier").value				  = list.supplier_id;
						document.getElementById("edit_purchase_price").value 	= list.purchase_price;
						document.getElementById("edit_sale_price").value 			= list.sale_price;

					})
					.catch(error => {
						console.log("Error: ", error.response.data);
					})

				}

				function updatePriceListRecord(id) {

					document.getElementById('edit_purchase_price_error').style.display = 'none';
					document.getElementById('edit_sale_price_error').style.display 		= 'none';

					let APP_URL   = {!! json_encode(url('/').'/') !!}
					let editArticle 	= document.getElementById("editArticle");
					let editArticleID = editArticle.options[editArticle.selectedIndex].value;

					let editSupplier 		= document.getElementById("editSupplier");
					let editSupplierID 	= editSupplier.options[editSupplier.selectedIndex].value;
					let edit_purchase_price 	= document.getElementById('edit_purchase_price').value;
					let edit_sale_price 			= document.getElementById('edit_sale_price').value;
					let edit_priceListID 			= document.getElementById('edit_priceListID').value;

					axios.post(APP_URL + 'admin/project/price_list/update', {
						articleID: editArticleID,
						supplierID: editSupplierID,
						purchase_price: edit_purchase_price,
						sale_price: edit_sale_price,
						id: edit_priceListID,
					})
					.then(response => {
						window.location.href = APP_URL + 'admin/edit_project/' + id;
					})
					.catch(error => {
						console.log("Error: ", error.response.data);
					})

				}

				</script>
