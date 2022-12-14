<!-- Header -->
    @include('admin/header')
     <title>Afvalcontainers bestelling</title>
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .center { text-align:center;}
 label { font-size:13px;}
table th,td { font-size:12px;}
</style>
<script>
function GetContact () {
		//alert ('sdf');
		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Contact_id = $('#Contact_id').val();
		$.get('GetContactNo?id=' + Contact_id,function(contact) {

$('#C_phone_number').val(contact.Mobile);
		});

	}


$(document).ready(function() {

	 $('.timepicker').timepicker('setTime', new Date());


	$('select#project_name').on('change', function() {

		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var project_id = $('#project_name').val();
		//	alert (project_id);
			//return false;

		$.get('Ajaxproject?project_id=' + project_id,function(data) {


		$('#Customer_Name').val(data.CustomerName);
		$('#Afdeling').val(data.DeptName);
		$('#phone_number').val(data.Contact_phone);
		$('#C_phone_number').val(data.Contact_phone);
		$('#Work_Address').val(data.Address);
		$('#Uitvoerder').val(data.Contact_Firstname+' '+data.Contact_Lastname);
		$('#Customer_id').val(data.Customer_id);
		$('#Postcode').val(data.Zipcode+' '+data.City);
		$('#Container').val(data.Container_Notes);

		$('#ECU_Project_nr').val(data.Project_Ref);
		$('#Projectnummer').val(data.Customer_Ref);
		$('#Email').val(data.Email);
	//	$('#Fax').val(data.Fax);
		/*$('#Container').val(data.Name);*/
		$('#dept').val(data.DeptID);


		$('#Shippingcompany_id').val(data.Shippingcompany_id).change();
		$.get('GetContactsList/' + data.DeptID+'/'+data.Contact_ID,function(data2) {
		//$.get('GetContacts/?dept_id=' + data.DeptID,function(data) {
		$('#Contact').html(data2);
		});



		//$('#Contact_id').val(data.Contact_ID).change();
		});

	});

$('select#Shippingcompany_id').on('change', function() {

		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Shippingcompany_id = $('select#Shippingcompany_id').val();
		$.get("<?php echo URL:: to( 'admin/Getprices'); ?>/" + Shippingcompany_id,function(ship) {

$('#Ship_Email').val(ship.Email);
$('#Telefoonnummer_phone').val(ship.Phone);
		});

		});
// Shipping
});
</script>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
                    <li class="active">Bestelformulier Afvalcontainers</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'admin/store_order']) !!}
    <input type="hidden" name="Customer_id" id="Customer_id"  />
     <input type="hidden" name="dept" id="dept"  />
   <div class="col-md-12">
@if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-12">

                <div class="block">
                    <div class="header" >
                       <h2>Bestelformulier Afvalcontainers</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">

                            <div class="col-md-2">Project naam:</div>
                            <div class="col-md-4">
                            	<select class="select2" id="project_name" name="project_name" style="width: 100%;">
                                <option value="">Project Selecteren:</option>
                                @foreach ($Projects as $Project)
                                <option value="{!! $Project->Id!!}">{!! $Project->Name!!}</option>
                                 @endforeach
                                </select>

                            </div>
                            <div class="col-md-2">Afdeling:</div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" readonly="readonly" placeholder="Afdeling" id="Afdeling" name="Afdeling">
                            </div>

                        </div>


                         <div class="form-row">

                           <div class="col-md-2">Werkadres:</div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Werkadres" name="Work_Address" id="Work_Address" readonly="readonly" value="{{ (Input::old('Work_Address')) ? Input::old('Work_Address') : '' }}">
                            </div>





                                  <div class="col-md-2">Klant projectnummer:</div>
                            <div class="col-md-4">
                            	<input type="hidden" id="ECU_Project_nr" name="ECU_Project_nr" value="{{ (Input::old('ECU_Project_nr')) ? Input::old('ECU_Project_nr') : '' }}">
                            	<input type="text" class="form-control" readonly="readonly" placeholder="Klant projectnummer" id="Projectnummer" name="Projectnummer" value="{{ (Input::old('Projectnummer')) ? Input::old('Projectnummer') : '' }}">
                            </div>
                        </div>


                           <div class="form-row">
														 <div class="col-md-2">Postcode & Stad:</div>
													 <div class="col-md-4">
															 <input type="text" class="form-control" readonly="readonly" placeholder="Postcode" name="Postcode" id="Postcode" value="{{ (Input::old('Postcode')) ? Input::old('Postcode') : '' }}">
													 </div>




													 <div class="col-md-2">Contactpersoon:</div>
												 <div class="col-md-4">
														 <div id="Contact">
																 <select class="select2"  name="Contact" id="Contact2" style="width: 100%;">
																		<option value="">Contactpersoon Selecteren</option>
															 </select>
																 <!--<input type="text" class="form-control" placeholder="Contact Persoon" id="Contact2" name="Contact" value="{{ (Input::old('Contact')) ? Input::old('Contact') : '' }}">-->
																 </div>
												 </div>

                          </div>

                          <div class="form-row">

														<div class="col-md-2">Uitvoerder:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Uitvoerder" id="Uitvoerder" name="Uitvoerder">
                            </div>

														<div class="col-md-2">Mobilenummer:</div>
												 <div class="col-md-4">
													 <input type="text" class="form-control" placeholder="Telefoonnummer" name="phone_number" id="C_phone_number" value="{{ (Input::old('phone_number')) ? Input::old('phone_number') : '' }}">
												 </div>


                          </div>

                          <div class="form-row">
														<div class="col-md-2">Uitvoerder Mobilenummer:</div>
                             <div class="col-md-4">
                             	<input type="text" class="form-control" readonly="readonly" placeholder="Telefoonnummer" name="u_phone_number" id="phone_number" value="{{ (Input::old('phone_number')) ? Input::old('phone_number') : '' }}">
                             </div>
														 <div class="col-md-2">Afvalverwerker:</div>
													<div class="col-md-4">
														<select class="select2"  name="shippingcomapny_id" id="Shippingcompany_id" style="width: 100%;">
															<option value="0">Afvalverwerker Selecteren</option>
															@foreach ($Shippingcompany as $company)
															<option value="{!! $company->id!!}">{!! $company->Companyname!!}</option>
															 @endforeach
															</select>
													</div>

                        </div>


                         <div class="form-row">
                           <div class="col-md-2">Besteldatum:</div>
                            <div class="col-md-4">
                             <div class="input-group">
                            <div class="input-group-addon">
							<span class="icon-calendar-empty"></span>
							</div>
                            	<input type="text" class="datepicker form-control" placeholder="Besteldatum" name="Order_Date" value="{{ (Input::old('Order_Date')) ? Input::old('Order_Date') : date('Y-m-d') }}">
                            </div>
                            </div>

														<div class="col-md-2">Email Afvalverwerker:</div>
												 <div class="col-md-4">
													 <input type="text" class="form-control" placeholder="Email" readonly="readonly" name="Ship_Email" id="Ship_Email" value="{{ (Input::old('Ship_Email')) ? Input::old('Ship_Email') : '' }}">
												 </div>
                        </div>


                          <div class="form-row">

                              <div class="col-md-2">Tijd:</div>
                            <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon">
                            <span class="icon-time"></span>
                            </div>
                            	<input type="text" class="timepicker  form-control" placeholder="Tijd" name="time" value="{{ (Input::old('time')) ? Input::old('time') : date('H:i') }}">
                            </div>    </div>


														<div class="col-md-2">Telefoonnr Afvalverwerker:</div>
													 <div class="col-md-4">
														 <input type="text" class="form-control" placeholder="Telefoonnr" name="Telefoonnummer_phone" id="Telefoonnummer_phone" value="<?=@$ShippingEmail->Phone?>" disabled>
													 </div>

                        </div>

                   <div class="form-row">
										 <div class="col-md-2">Nummer:</div>
										 <div class="col-md-4">
											 <input type="text" class="form-control" name="Nummer" placeholder="Nummer" value="{{ (Input::old('Nummer')) ? Input::old('Nummer') : '' }}" readonly="readonly">
										 </div>

										 <!--  -->
										 <div class="col-md-2">Besteld door / Goedgekeurd door:</div>
									 <div class="col-md-2">
									 <input type="text" class="form-control" placeholder="Besteld door" disabled="disabled" value="{{ (Input::old('Ordered_by')) ? Input::old('Ordered_by') : '' }}">
									 </div>
									 <div class="col-md-2">
									 <input type="text" class="form-control" placeholder="Goedgekeurd door" disabled="disabled" value="{{ (Input::old('Approved_by')) ? Input::old('Approved_by') : '' }}">
									 </div>
                            </div>

														<div class="form-row">
															<div class="col-md-2">Containers notities:</div>
														 <div class="col-md-10">
																<textarea class="form-control" placeholder="Containers notities" name="Container" id="Container" readonly="readonly"></textarea>
														 </div>
														</div>



                </div>
            </div>
             <div class="block">
                    <div class="header" >
                       <h2>Opdracht</h2>
                    </div>
                    <div class="content controls">

                    <div class="form-row">
                            <div class="col-md-2">Uitvoerdatum:</div>
                            <div class="col-md-4">
                            	<input type="text" class="datepicker form-control" placeholder="Uitvoerdatum" name="output_Date" value="{{ (Input::old('output_Date')) ? Input::old('output_Date') : '' }}">
                            </div>
                            <div class="col-md-2">Dagdeel / gewenste tijd:</div>
                            <div class="col-md-4">
                            	  <select class="form-control" name="Half_day_time" id="Half_day_time">
                            <option value="">Selecteer Dagdeel gewenste tijd</option>
                            <option value="1" >Zo spoedig mogelijk</option>
                            <option value="2">Ochtend</option>
                            <option value="3" >Middag</option>
                            <option value="4">Avond</option>
                            <option value="5">Zie opmerkingen</option>
                            </select>
                            </div>
                            </div>

                             <div class="form-row">
                             <div class="col-md-2">Opmerkingen:</div>
                            <div class="col-md-10">
                            	 <textarea class="form-control" placeholder="Opmerkingen" name="Comments" id="Comments">{{ (Input::old('Comments')) ? Input::old('Comments') : '' }}</textarea>
                            </div>
                            </div>

                  		  </div>
                 	   </div>
                	   </div>


      <div class="col-md-4">
         <div class="block">
                    <div class="header" >
                       <h2>Aantal containers</h2>
                    </div>
                    <div class="content">

             <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>

      <tr >
      <th rowspan="2" class="center">Container type</th>
      <th colspan="3" class="center">Aantal containers</th>
    </tr>

    <tr >
      <th class="center">Plaats</th>
      <th class="center">Wissel</th>
      <th class="center">Afvoer</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">Rolcontainer</th>
      <td><input  class="form-control"  name="rl_plaats" id="price_spinner19" value="{{ (Input::old('price_spinner19')) ? Input::old('price_spinner19') : '' }}" ></td>
      <td><input  class="form-control"  name="rl_Wissel" id="price_spinner20" value="{{ (Input::old('price_spinner20')) ? Input::old('price_spinner20') : '' }}"></td>
      <td><input  class="form-control"  name="rl_Afvoer" id="price_spinner21" value="{{ (Input::old('price_spinner21')) ? Input::old('price_spinner21') : '' }}"></td>
    </tr>





    <tr>
      <th scope="row">3m<sup>3</sup></th>
      <td><input  class="form-control"  name="3m3_plaats" id="price_spinner1" value="{{ (Input::old('price_spinner1')) ? Input::old('price_spinner1') : '' }}" ></td>
      <td><input  class="form-control"  name="3m3_Wissel" id="price_spinner2" value="{{ (Input::old('price_spinner2')) ? Input::old('price_spinner2') : '' }}"></td>
      <td><input  class="form-control"  name="3m3_Afvoer" id="price_spinner3" value="{{ (Input::old('price_spinner3')) ? Input::old('price_spinner3') : '' }}"></td>
    </tr>
    <tr>
      <th scope="row">6m<sup>3</sup></th>
      <td><input  class="form-control"  name="6m3_plaats" id="price_spinner4" value="{{ (Input::old('6m3_plaats')) ? Input::old('6m3_plaats') : '' }}"></td>
      <td><input  class="form-control"  name="6m3_Wissel" id="price_spinner5" value="{{ (Input::old('6m3_Wissel')) ? Input::old('6m3_Wissel') : '' }}"></td>
      <td><input  class="form-control"  name="6m3_Afvoer" id="price_spinner6" value="{{ (Input::old('6m3_Afvoer')) ? Input::old('6m3_Afvoer') : '' }}"></td>
    </tr>
    <tr>
      <th scope="row">10m<sup>3</sup></th>
       <td><input  class="form-control"  name="10m3_plaats" id="price_spinner7" value="{{ (Input::old('10m3_plaats')) ? Input::old('10m3_plaats') : '' }}"></td>
      <td><input  class="form-control"  name="10m3_Wissel" id="price_spinner8" value="{{ (Input::old('10m3_Wissel')) ? Input::old('10m3_Wissel') : '' }}"></td>
      <td><input  class="form-control"  name="10m3_Afvoer" id="price_spinner9" value="{{ (Input::old('10m3_Afvoer')) ? Input::old('10m3_Afvoer') : '' }}"></td>
    </tr>
     <tr>
      <th scope="row">10m<sup>3</sup>dicht</th>
       <td><input  class="form-control"  name="10m3_plaats_dicht" id="price_spinner10" value="{{ (Input::old('10m3_plaats_dicht')) ? Input::old('10m3_plaats_dicht') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Wissel_dicht" id="price_spinner11" value="{{ (Input::old('10m3_Wissel_dicht')) ? Input::old('10m3_Wissel_dicht') : '' }}"></td>
      <td><input  class="form-control"  name="10m3_Afvoer_dicht" id="price_spinner12" value="{{ (Input::old('10m3_Afvoer_dicht')) ? Input::old('10m3_Afvoer_dicht') : '' }}"></td>
    </tr>
    <tr>
      <th scope="row">20m<sup>3</sup></th>
        <td><input  class="form-control"  name="20m3_plaats" id="price_spinner13" value="{{ (Input::old('20m3_plaats')) ? Input::old('20m3_plaats') : '' }}"></td>
      <td><input  class="form-control"  name="20m3_Wissel" id="price_spinner14" value="{{ (Input::old('20m3_Wissel')) ? Input::old('20m3_Wissel') : '' }}"></td>
      <td><input  class="form-control"  name="20m3_Afvoer" id="price_spinner15" value="{{ (Input::old('20m3_Afvoer')) ? Input::old('20m3_Afvoer') : '' }}"></td>
    </tr>

    <tr>
      <th scope="row">30m<sup>3</sup></th>
       <td><input  class="form-control"  name="30m3_plaats" id="price_spinner16" value="{{ (Input::old('30m3_plaats')) ? Input::old('30m3_plaats') : '' }}"></td>
      <td><input  class="form-control"  name="30m3_Wissel" id="price_spinner17" value="{{ (Input::old('30m3_Wissel')) ? Input::old('30m3_Wissel') : '' }}"></td>
      <td><input  class="form-control"  name="30m3_Afvoer" id="price_spinner18" value="{{ (Input::old('30m3_Afvoer')) ? Input::old('30m3_Afvoer') : '' }}"></td>
    </tr>





    <tr>
      <th scope="row">40m<sup>3</sup></th>
       <td><input  class="form-control"  name="40m3_plaats" id="price_spinner16" value="{{ (Input::old('40m3_plaats')) ? Input::old('40m3_plaats') : '' }}"></td>
      <td><input  class="form-control"  name="40m3_Wissel" id="price_spinner17" value="{{ (Input::old('40m3_Wissel')) ? Input::old('40m3_Wissel') : '' }}"></td>
      <td><input  class="form-control"  name="40m3_Afvoer" id="price_spinner18" value="{{ (Input::old('40m3_Afvoer')) ? Input::old('40m3_Afvoer') : '' }}"></td>
    </tr>

  </tbody>
</table>
                  		  </div>
                 	   </div>
        </div>
            <div class="col-md-8">
       <div class="block">
                    <div class="header" >
                       <h2>Aantal per afvalstroom</h2>
                    </div>
                    <div class="content">

               <table class="table table-bordered" style="text-align:center;">
  <thead>
      <tr>
        <th colspan="7" class="center" style="font-size:12px;">Aantal per afvalstroom</th>
      </tr>
    <tr style="font-size:12px;">
      <th class="center" width="12%" >BSA</th>
      <th class="center"  width="12%">Puin</th>
      <th class="center"  width="12%">Hout</th>
      <th class="center" width="15%">Plastic Folie</th>
      <th class="center" width="12%">Papier</th>
      <th class="center"  width="12%">Diverse</th>
      <th class="center"  width="25%">Opmerkingen</th>
    </tr>
  </thead>
  <tbody>

  <tr>
      <td scope="row"><input  class="form-control"  name="rl_Bsa" id="price_spinner19"  value="{{ (Input::old('rl_Bsa')) ? Input::old('rl_Bsa') : '' }}"></td>
       <td><input  class="form-control"  name="rl_Puin" id="price_spinner19" value="{{ (Input::old('rl_Puin')) ? Input::old('rl_Puin') : '' }}"></td>
      <td><input  class="form-control"  name="rl_Hout" id="price_spinner21" value="{{ (Input::old('rl_Hout')) ? Input::old('rl_Hout') : '' }}"></td>
       <td><input  class="form-control"  name="rl_Plastic_Folie" id="price_spinner23" value="{{ (Input::old('rl_Plastic_Folie')) ? Input::old('rl_Plastic_Folie') : '' }}"></td>
      <td><input  class="form-control"  name="rl_Papier" id="price_spinner24" value="{{ (Input::old('rl_Papier')) ? Input::old('rl_Papier') : '' }}"></td>
      <td><input  class="form-control"  name="rl_Diverse" id="price_spinner22" value="{{ (Input::old('rl_Diverse')) ? Input::old('rl_Diverse') : '' }}"></td>
      <td><input type="text" class="form-control"  name="rl_Opmerkingen" id="rl_Opmerkingen" value="{{ (Input::old('rl_Opmerkingen')) ? Input::old('rl_Opmerkingen') : '' }}"></td>

    </tr>

    <tr>
      <td scope="row"><input  class="form-control"  name="3m3_Bsa" id="price_spinner19"  value="{{ (Input::old('price_spinner19')) ? Input::old('price_spinner19') : '' }}"></td>
       <td><input  class="form-control"  name="3m3_Puin" id="price_spinner20" value="{{ (Input::old('price_spinner20')) ? Input::old('price_spinner20') : '' }}"></td>
      <td><input  class="form-control"  name="3m3_Hout" id="price_spinner21" value="{{ (Input::old('price_spinner21')) ? Input::old('price_spinner21') : '' }}"></td>
       <td><input  class="form-control"  name="3m3_Plastic_Folie" id="price_spinner23" value="{{ (Input::old('price_spinner23')) ? Input::old('price_spinner23') : '' }}"></td>
      <td><input  class="form-control"  name="3m3_Papier" id="price_spinner24" value="{{ (Input::old('price_spinner24')) ? Input::old('price_spinner24') : '' }}"></td>
      <td><input  class="form-control"  name="3m3_Diverse" id="price_spinner22" value="{{ (Input::old('price_spinner22')) ? Input::old('price_spinner22') : '' }}"></td>
      <td><input type="text" class="form-control"  name="3m3_Opmerkingen" id="3m3_Opmerkingen" value="{{ (Input::old('3m3_Opmerkingen')) ? Input::old('3m3_Opmerkingen') : '' }}"></td>

    </tr>
    <tr>
    <td scope="row"><input  class="form-control"  name="6m3_Bsa" id="price_spinner25" value="{{ (Input::old('price_spinner25')) ? Input::old('price_spinner25') : '' }}"></td>
       <td><input  class="form-control"  name="6m3_Puin" id="price_spinner26" value="{{ (Input::old('price_spinner26')) ? Input::old('price_spinner26') : '' }}"></td>
      <td><input  class="form-control"  name="6m3_Hout" id="price_spinner27" value="{{ (Input::old('price_spinner27')) ? Input::old('price_spinner27') : '' }}"></td>
       <td><input  class="form-control"  name="6m3_Plastic_Folie" id="price_spinner29" value="{{ (Input::old('price_spinner29')) ? Input::old('price_spinner29') : '' }}"></td>
      <td><input  class="form-control"  name="6m3_Papier" id="price_spinner30" value="{{ (Input::old('price_spinner30')) ? Input::old('price_spinner30') : '' }}"></td>
       <td><input  class="form-control"  name="6m3_Diverse" id="price_spinner28" value="{{ (Input::old('price_spinner28')) ? Input::old('price_spinner28') : '' }}"></td>
      <td><input type="text" class="form-control"  name="6m3_Opmerkingen" id="6m3_Opmerkingen" value="{{ (Input::old('6m3_Opmerkingen')) ? Input::old('6m3_Opmerkingen') : '' }}"></td>

    </tr>
    <tr>
     <td scope="row"><input  class="form-control"  name="10m3_Bsa" id="price_spinner31" value="{{ (Input::old('price_spinner31')) ? Input::old('price_spinner31') : '' }}"></td>
       <td><input  class="form-control"  name="10m3_Puin" id="price_spinner32" value="{{ (Input::old('price_spinner32')) ? Input::old('price_spinner32') : '' }}"></td>
      <td><input  class="form-control"  name="10m3_Hout" id="price_spinner33" value="{{ (Input::old('price_spinner33')) ? Input::old('price_spinner33') : '' }}"></td>
       <td><input  class="form-control"  name="10m3_Plastic_Folie" id="price_spinner35" value="{{ (Input::old('price_spinner35')) ? Input::old('price_spinner35') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Papier" id="price_spinner35" value="{{ (Input::old('price_spinner35')) ? Input::old('price_spinner35') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Diverse" id="price_spinner34" value="{{ (Input::old('price_spinner34')) ? Input::old('price_spinner34') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen" id="10m3_Opmerkingen" value="{{ (Input::old('10m3_Opmerkingen')) ? Input::old('10m3_Opmerkingen') : '' }}" ></td>

    </tr>
    <tr>
      <td scope="row"><input  class="form-control"  name="10m3_Bsa_dicht" id="price_spinner36" value="{{ (Input::old('price_spinner36')) ? Input::old('price_spinner36') : '' }}" ></td>
       <td><input  class="form-control"  name="10m3_Puin_dicht" id="price_spinner37" value="{{ (Input::old('price_spinner37')) ? Input::old('price_spinner37') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Hout_dicht" id="price_spinner38" value="{{ (Input::old('price_spinner38')) ? Input::old('price_spinner38') : '' }}" ></td>
       <td><input  class="form-control"  name="10m3_Plastic_Folie_dicht" id="price_spinner40" value="{{ (Input::old('price_spinner40')) ? Input::old('price_spinner40') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Papier_dicht" id="price_spinner41" value="{{ (Input::old('price_spinner41')) ? Input::old('price_spinner41') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Diverse_dicht" id="price_spinner39" value="{{ (Input::old('price_spinner39')) ? Input::old('price_spinner39') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen_dicht" id="10m3_Opmerkingen_dicht" value="{{ (Input::old('10m3_Opmerkingen_dicht')) ? Input::old('name') : '' }}" ></td>

    </tr>
    <tr>
    <td scope="row"><input  class="form-control"  name="20m3_Bsa" id="price_spinner42" value="{{ (Input::old('price_spinner42')) ? Input::old('price_spinner42') : '' }}" ></td>
       <td><input  class="form-control"  name="20m3_Puin" id="price_spinner43" value="{{ (Input::old('price_spinner43')) ? Input::old('price_spinner43') : '' }}" ></td>
      <td><input  class="form-control"  name="20m3_Hout" id="price_spinner44" value="{{ (Input::old('price_spinner44')) ? Input::old('price_spinner44') : '' }}" ></td>
       <td><input  class="form-control"  name="20m3_Plastic_Folie" id="price_spinner46" value="{{ (Input::old('price_spinner46')) ? Input::old('price_spinner46') : '' }}" ></td>
      <td><input  class="form-control"  name="20m3_Papier" id="price_spinner47" value="{{ (Input::old('price_spinner47')) ? Input::old('price_spinner47') : '' }}" ></td>
      <td><input  class="form-control"  name="20m3_Diverse" id="price_spinner45" value="{{ (Input::old('price_spinner45')) ? Input::old('price_spinner45') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="20m3_Opmerkingen" id="20m3_Opmerkingen" value="{{ (Input::old('20m3_Opmerkingen')) ? Input::old('20m3_Opmerkingen') : '' }}" ></td>

    </tr>

    <tr>
   <td scope="row"><input  class="form-control"  name="30m3_Bsa" id="price_spinner48" value="{{ (Input::old('price_spinner48')) ? Input::old('price_spinner48') : '' }}" ></td>
       <td><input  class="form-control"  name="30m3_Puin" id="price_spinner49" value="{{ (Input::old('price_spinner49')) ? Input::old('price_spinner49') : '' }}" ></td>
      <td><input  class="form-control"  name="30m3_Hout" id="price_spinner50" value="{{ (Input::old('price_spinner50')) ? Input::old('price_spinner50') : '' }}" ></td>
       <td><input  class="form-control"  name="30m3_Plastic_Folie" id="price_spinner52" value="{{ (Input::old('price_spinner52')) ? Input::old('price_spinner52') : '' }}" ></td>
      <td><input  class="form-control"  name="30m3_Papier" id="price_spinner53" value="{{ (Input::old('price_spinner53')) ? Input::old('price_spinner53') : '' }}" ></td>
      <td><input  class="form-control"  name="30m3_Diverse" id="price_spinner51" value="{{ (Input::old('price_spinner51')) ? Input::old('price_spinner51') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="30m3_Opmerkingen" id="40m3_Opmerkingen" value="{{ (Input::old('40m3_Opmerkingen')) ? Input::old('40m3_Opmerkingen') : '' }}" ></td>

    </tr>


    <tr>
   <td scope="row"><input  class="form-control"  name="40m3_Bsa" id="price_spinner48" value="{{ (Input::old('price_spinner48')) ? Input::old('price_spinner48') : '' }}" ></td>
       <td><input  class="form-control"  name="40m3_Puin" id="price_spinner49" value="{{ (Input::old('price_spinner49')) ? Input::old('price_spinner49') : '' }}" ></td>
      <td><input  class="form-control"  name="40m3_Hout" id="price_spinner50" value="{{ (Input::old('price_spinner50')) ? Input::old('price_spinner50') : '' }}" ></td>
       <td><input  class="form-control"  name="40m3_Plastic_Folie" id="price_spinner52" value="{{ (Input::old('price_spinner52')) ? Input::old('price_spinner52') : '' }}" ></td>
      <td><input  class="form-control"  name="40m3_Papier" id="price_spinner53" value="{{ (Input::old('price_spinner53')) ? Input::old('price_spinner53') : '' }}" ></td>
      <td><input  class="form-control"  name="40m3_Diverse" id="price_spinner51" value="{{ (Input::old('price_spinner51')) ? Input::old('price_spinner51') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="40m3_Opmerkingen" id="40m3_Opmerkingen" value="{{ (Input::old('40m3_Opmerkingen')) ? Input::old('40m3_Opmerkingen') : '' }}" ></td>

    </tr>

  </tbody>
</table>

                  		  </div>
                 	   </div>

       </div>


        <div class="col-md-12">
    <div class="content controls">
                        <div class="form-row" style="float:right" >

                             <div class="col-md-3" align="center" >
                <a href="<?php echo URL:: to( 'admin/notes' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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
       </div>





    {!! Form::close() !!}
  </div>
       @include('admin/footer')</div>
