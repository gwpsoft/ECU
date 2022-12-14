<!-- Header -->
    @include('admin/header')
     <title>Bestelformulier Afvalcontainers</title>
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .center { text-align:center;}
 label { font-size:13px;}
table th,td { font-size:12px;}
</style>
 <script type='text/javascript' src="{{ URL::asset('assets/js/jquery-confirm.js') }}"></script>


<script>



function GetContact () {


		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Contact = $('#Contact2').val();
		if (Contact == null) {

		var Contact_id = $('#Contact_id').val();
		} else {
			Contact_id = Contact;
		}



		$.get('<?php echo URL:: to( 'admin/GetContactNo'); ?>?id=' + Contact_id,function(contact) {
			// alert (contact.Mobile);
$('#C_phone_number').val(contact.Mobile);
		});

	}


$(document).ready(function() {
if($(".datepicker").length > 0) $(".datepicker").datepicker({nextText: "", prevText: "",dateFormat: 'yy-mm-dd',firstDay: 1});

	$('.modify').on('click', function() {
		$('#status').val('1');
	});

	$('.cancel').on('click', function() {
		$('#status').val('2');
	});
	$('.cancel,.modify').on('click', function() {
		$.confirm({
		title: 'Bevestigen!',
		content: 'Weet u zeker dat u wilt Status wijzigen?',
		confirmButton: 'Yes',
		cancelButton: 'No',
		confirmButtonClass: 'btn-success',
		cancelButtonClass: 'btn-danger',
		confirm: function(){
		   // $.alert('Confirmed!');
			$(".order").submit();
		},
		cancel: function(){
			//$.alert('Canceled!')
		}
	});
 });

	$('select#project_name').on('change', function() {
		//alert ('sdfsf');
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


		$.get('<?php echo URL:: to( 'admin/Ajaxproject' ); ?>?project_id=' + project_id,function(data) {

		$('#Customer_Name').val(data.CustomerName);
		$('#Afdeling').val(data.DeptName);
		$('#phone_number').val(data.Contact_phone);
		$('#C_phone_number').val(data.Contact_phone);
		$('#Work_Address').val(data.Address);
		$('#Uitvoerder').val(data.Contact_Firstname+' '+data.Contact_Lastname);
		$('#Customer_id').val(data.Customer_id);
		$('#Postcode').val(data.Zipcode+' '+data.City);
		$('#ECU_Project_nr').val(data.Project_Ref);
		$('#Projectnummer').val(data.Customer_Ref);
		$('#Email').val(data.Email);
		$('#Ship_Email').val(data.ShipEmail);
		$('#DeptID').val(data.DeptID);
		$('#Container').val(data.Container_Notes);
		$('#Contact2').val(data.Contact_ID).attr('selected', 'selected').change();
		$('#Shippingcompany_id option:selected').removeAttr("selected");

		$('#Shippingcompany_id').val(data.Shippingcompany_id).attr('selected', 'selected').change();
		// $.get('GetContactsList/' + data.DeptID+'/'+data.Contact_ID,function(data2) {
		 $.get('<?php echo URL:: to( 'admin/GetContactsList'); ?>/' + data.DeptID+'/'+data.Contact_ID,function(data2) {
		//$.get('GetContacts/?dept_id=' + data.DeptID,function(data) {
		$('#Contact').html(data2);
		});
		});

		});




// Shipping
	$('select#shippingcomapny_id').on('change', function() {

		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Shippingcompany_id = $('select#shippingcomapny_id').val();
		$.get("<?php echo URL:: to( 'admin/Getprices'); ?>/" + Shippingcompany_id,function(ship) {
		$('#Ship_Email').val(ship.Email);
		//$('#Fax').val(ship.Fax);


	});
});

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
    {!! Form::open(['url'=> 'admin/update_order', 'class' => 'order']) !!}
     <input type="hidden" name="Status" id="status" />
     <input type="hidden" name="Customer_id" id="Customer_id" value="<?=$data['Customer_id']?>"  />
     <input type="hidden" name="id" value="<?=$data['id']?>" />
     <input type="hidden" name="Rev_Nummer" value="<?=$data['Nummer']?>" />
      <input type="hidden" name="Nummer" value="<?=$data['Nummer']?>" />
       <input type="hidden" name="DeptID"  id="DeptID" value="<?=$data['dept_id']?>" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
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
                           <div style="float:right"><a href="<?=URL:: to( 'admin' ) . '/Order_print/'.$data['id'];?>" title="Download PDF"><img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer"></a>  |



                            <a href="<?=URL:: to( 'admin' ) . '/Order_email/'.$data['id'];?>" title="E-mailen" ><img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer"></a>



                                                </div>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <!--  <div class="col-md-2">Klantnaam:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Klantnaam" name="Customer_Name" id="Customer_Name" value="<? //$data['Customer_Name'];?>">
                            </div>-->
                              <div class="col-md-2">Project Selecteren:</div>
                            <div class="col-md-4">
                            		<select class="select2" id="project_name" name="project_name" style="width:100%">
                                <option value="">Select Project</option>
                                @foreach ($Projects as $Project)
                                <option value="{!! $Project->Id!!}" <?php if ($data['project_name'] == $Project->Id) { ?> selected="selected" <?php } ?>>{!! $Project->Name!!}</option>
                                 @endforeach
                                </select>

                            </div>

	                           <div class="col-md-2">Afdeling:</div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" readonly="readonly" placeholder="Afdeling" id="Afdeling" name="Afdeling" value="<?=$data['Afdeling'];?>">
                            </div>
                        </div>


                         <div class="form-row">
                           <div class="col-md-2">Werkadres:</div>
                          <div class="col-md-4">
                              <input type="text" class="form-control" readonly="readonly" placeholder="Werkadres" name="Work_Address"  id="Work_Address" value="<?=$data['Work_Address'];?>">
                          </div>
                            <div class="col-md-2">Klant projectnummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" readonly="readonly" placeholder="Project nummer" id="Projectnummer" name="Projectnummer" value="<?=@$ProjectInfo->Customer_Ref;?>">
                            </div>
                        </div>


                        <div class="form-row">
													<div class="col-md-2">Postcode & Stad:</div>
															<div class="col-md-4">
																	<input type="text" class="form-control" readonly="readonly" placeholder="Postcode" name="Postcode" id="Postcode" value="<?=$data['Postcode']?>">
															</div>

														<div class="col-md-2">Contactpersoon:</div>
													<div class="col-md-4">
														<div id="Contact">
																	<select class="select"  name="contact_id" id="Contact2" style="width: 100%;" onchange="GetContact();">

																	 <option value="">Contactpersoon Selecteren</option>
																<?php foreach ($contacts as $contact) { ?>
																	<option value="<?php echo $contact->Id?>" <?php if ($contact->Id == @$ContactID->Id) { ?> selected="selected" <?php } ?>><?php echo $contact->Firstname.' '.$contact->Lastname?></option>
																	<?php } ?>
																	</select>
																	<!--<input type="text" class="form-control" placeholder="Contact Persoon" id="Contact2" name="Contact" value="{{ (Input::old('Contact')) ? Input::old('Contact') : '' }}">-->
																	</div>

												 <!--

															<input type="text" class="form-control" placeholder="Contactpersoon" id="Contact" name="Contact" value="<?=$data['Contact']?>">-->
													</div>

                          </div>



                          <div class="form-row">


														<div class="col-md-2">Uitvoerder:</div>
													 <div class="col-md-4">
															 <input type="text" class="form-control" placeholder="Uitvoerder" id="Uitvoerder" name="Uitvoerder" readonly="readonly" value="<?=$data['Uitvoerder'];?>">
													 </div>

													 <div class="col-md-2">Mobielenummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" name="phone_number" id="C_phone_number" value="<?=$data['phone_number']?>">
                            </div>


                        </div>


                         <div class="form-row">

													 <div class="col-md-2">Uitvoerder Mobielenummer:</div>
	                             <div class="col-md-4">
	                             	<input type="text" class="form-control" readonly="readonly" placeholder="Telefoonnummer" name="u_phone_number" id="phone_number" value="{{ $ContactID->Mobile }}">
	                             	{{-- <input type="text" class="form-control" readonly="readonly" placeholder="Telefoonnummer" name="u_phone_number" id="phone_number" value="{{ $ShippingEmail->Phone }}"> --}}
	                             </div>

															 <div class="col-md-2">Afvalverwerker:</div>
													<div class="col-md-4">
														<select class="select2" id="shippingcomapny_id" name="shippingcomapny_id" style="width:100%">
															<option value="0">Afvalverwerker Selecteren</option>
															@foreach ($Shippingcompany as $company)
															<option value="{!! $company->id!!}" <?php if (@$data['Shippingcompany_id'] == @$company->id) { ?> selected="selected" <?php }?>>{!! $company->Companyname!!}</option>
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
	                            	<input type="text" class="datepicker form-control" placeholder="Besteldatum" name="Order_Date" value="<?=$data['Order_Date']?>">
                            </div>
                            </div>

														<div class="col-md-2">Email Afvalverwerker:</div>
													 <div class="col-md-4">
														 <input type="text" class="form-control" placeholder="Email" name="Ship_Email" id="Ship_Email" value="<?=@$ShippingEmail->Email?>" disabled>
													 </div>

                        </div>

                        <div class="form-row">
                              <div class="col-md-2">Tijd:</div>
                            <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon">
                            <span class="icon-time"></span>
                            </div>
                            	<input type="text" class="timepicker  form-control" placeholder="Tijd" name="time" value="<?=$data['time']?>">
                            </div>    </div>

                             <div class="col-md-2">Telefoonnr Afvalverwerker:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Email" name="Ship_Email" id="Ship_Email" value="<?=@$ShippingEmail->Phone?>" disabled>
                            </div>

                        </div>


                         <div class="form-row">
                            <div class="col-md-2">Nummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Nummer" value="BN-00<?=$data['Nummer']?>" readonly="readonly">
                            </div>
                             <input type="hidden" name="rev_nummer" value="<?php echo sprintf('%02d',@$data['Rev_Nummer'])?>" />
                               <input type="hidden" name="nummer" value="<?php echo sprintf('%02d',@$data['Nummer'])?>" />

                              <div class="col-md-2">Besteld door / Goedgekeurd door:</div>
                            <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Besteld door" disabled="disabled" value="<?=$data['Ordered_by']?>">
                            </div>
                            <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="Goedgekeurd door" disabled="disabled" value="<?=$data['Approved_by']?>">
                            </div>
                            </div>

                             <div class="form-row">
                            <?php if (@$data['Rev_Nummer'] !=0){ ?>

                              <div class="col-md-2">Gewijzigd Nummer:</div>
                            <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Revised Nummer" id="Revised Nummer" readonly="readonly" value="BN-00<?=@$data['Rev_Nummer']?>">

                            </div>
                            <?php } ?>
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
                            	<input type="text" class="datepicker form-control" placeholder="Uitvoerdatum" name="output_Date" value="<?=$data['output_Date']?>">
                            </div>
                            <div class="col-md-2">Dagdeel / gewenste tijd:</div>
                            <div class="col-md-4">
                            	  <select class="select2" name="Half_day_time" id="Half_day_time" style="width:100%">
                            <option value="">Selecteer Dagdeel gewenste tijd</option>
                            <option value="1" <?php if ($data['Half_day_time'] == 1) { echo 'selected';}?>>Zo spoedig mogelijk</option>
                            <option value="2" <?php if ($data['Half_day_time'] == 2) { echo 'selected';}?>>Ochtend</option>
                            <option value="3" <?php if ($data['Half_day_time'] == 3) { echo 'selected';}?>>Middag</option>
                            <option value="4" <?php if ($data['Half_day_time'] == 4) { echo 'selected';}?>>Avond</option>
                            <option value="5" <?php if ($data['Half_day_time'] == 5) { echo 'selected';}?>>Zie opmerkingen</option>
                            </select>
                            </div>
                            </div>

                             <div class="form-row">
                             <div class="col-md-2">Opmerkingen:</div>
                            <div class="col-md-10">
                            	 <textarea class="form-control" placeholder="Opmerkingen" name="Comments" id="Comments"><?=$data['Comments']?></textarea>
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
      <td><input  class="form-control" min="1" name="rl_plaats" id="price_spinner1" value="<?=$data['rl_plaats']> 0 ? $data['rl_plaats']:''?>" ></td>
      <td><input  class="form-control"  name="rl_Wissel" id="price_spinner2" value="<?=$data['rl_Wissel']> 0 ? $data['rl_Wissel']:''?>"></td>
      <td><input  class="form-control"  name="rl_Afvoer" id="price_spinner3" value="<?=$data['rl_Afvoer']> 0 ? $data['rl_Afvoer']:''?>"></td>
    </tr>



    <tr>
      <th scope="row">3m<sup>3</sup></th>
      <td><input  class="form-control"  name="3m3_plaats" id="price_spinner1" value="<?=$data['3m3_plaats']> 0 ? $data['3m3_plaats']:''?>" ></td>
      <td><input  class="form-control"  name="3m3_Wissel" id="price_spinner2" value="<?=$data['3m3_Wissel']> 0 ? $data['3m3_Wissel']:''?>"></td>
      <td><input  class="form-control"  name="3m3_Afvoer" id="price_spinner3" value="<?=$data['3m3_Afvoer']> 0 ? $data['3m3_Afvoer']:''?>"></td>
    </tr>
    <tr>
      <th scope="row">6m<sup>3</sup></th>
      <td><input  class="form-control"  name="6m3_plaats" id="price_spinner4" value="<?=$data['6m3_plaats']> 0 ? $data['6m3_plaats']:''?>"></td>
      <td><input  class="form-control"  name="6m3_Wissel" id="price_spinner5" value="<?=$data['6m3_Wissel']> 0 ? $data['6m3_Wissel']:''?>"></td>
      <td><input  class="form-control"  name="6m3_Afvoer" id="price_spinner6" value="<?=$data['6m3_Afvoer']> 0 ? $data['6m3_Afvoer']:''?>"></td>
    </tr>
    <tr>
      <th scope="row">10m<sup>3</sup></th>
       <td><input  class="form-control"  name="10m3_plaats" id="price_spinner7" value="<?=$data['10m3_plaats'] > 0 ? $data['10m3_plaats']:''?>"></td>
      <td><input  class="form-control"  name="10m3_Wissel" id="price_spinner8" value="<?=$data['10m3_Wissel'] > 0 ? $data['10m3_Wissel']:''?>"></td>
      <td><input  class="form-control"  name="10m3_Afvoer" id="price_spinner9" value="<?=$data['10m3_Afvoer'] > 0 ? $data['10m3_Afvoer']:''?>"></td>
    </tr>
     <tr>
      <th scope="row">10m<sup>3</sup>dicht</th>
       <td><input  class="form-control"  name="10m3_plaats_dicht" id="price_spinner10" value="<?=$data['10m3_plaats_dicht'] > 0 ? $data['10m3_plaats_dicht']:''?>" ></td>
      <td><input  class="form-control"  name="10m3_Wissel_dicht" id="price_spinner11" value="<?=$data['10m3_Wissel_dicht'] > 0 ? $data['10m3_Wissel_dicht']:''?>"></td>
      <td><input  class="form-control"  name="10m3_Afvoer_dicht" id="price_spinner12" value="<?=$data['10m3_Afvoer_dicht'] > 0 ? $data['10m3_Afvoer_dicht']:''?>"></td>
    </tr>
    <tr>
      <th scope="row">20m<sup>3</sup></th>
        <td><input  class="form-control"  name="20m3_plaats" id="price_spinner13" value="<?=$data['20m3_plaats']> 0 ? $data['20m3_plaats']:''?>"></td>
      <td><input  class="form-control"  name="20m3_Wissel" id="price_spinner14" value="<?=$data['20m3_Wissel']> 0 ? $data['20m3_Wissel']:''?>"></td>
      <td><input  class="form-control"  name="20m3_Afvoer" id="price_spinner15" value="<?=$data['20m3_Afvoer']> 0 ? $data['20m3_Afvoer']:''?>"></td>
    </tr>

    <tr>
      <th scope="row">30m<sup>3</sup></th>
       <td><input  class="form-control"  name="30m3_plaats" id="price_spinner16" value="<?=$data['30m3_plaats']> 0 ? $data['30m3_plaats'] :''  ?>"></td>
      <td><input  class="form-control"  name="30m3_Wissel" id="price_spinner17" value="<?=$data['30m3_Wissel']> 0 ? $data['30m3_Wissel']:''?>"></td>
      <td><input  class="form-control"  name="30m3_Afvoer" id="price_spinner18" value="<?=$data['30m3_Afvoer'] > 0 ? $data['30m3_Afvoer']:''?>"></td>
    </tr>



    <tr>
      <th scope="row">40m<sup>3</sup></th>
       <td><input  class="form-control"  name="40m3_plaats" id="price_spinner16" value="<?=$data['40m3_plaats']> 0 ? $data['40m3_plaats'] :''  ?>"></td>
      <td><input  class="form-control"  name="40m3_Wissel" id="price_spinner17" value="<?=$data['40m3_Wissel']> 0 ? $data['40m3_Wissel']:''?>"></td>
      <td><input  class="form-control"  name="40m3_Afvoer" id="price_spinner18" value="<?=$data['40m3_Afvoer'] > 0 ? $data['40m3_Afvoer']:''?>"></td>
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
      <td scope="row"><input  class="form-control"  name="rl_Bsa" id="price_spinner19"  value="<?=$data['rl_Bsa'] > 0  ? $data['rl_Bsa'] :''?>"></td>
       <td><input  class="form-control"  name="rl_Puin" id="price_spinner20" value="<?=$data['rl_Puin'] > 0 ? $data['rl_Puin']:''?>"></td>
      <td><input  class="form-control"  name="rl_Hout" id="price_spinner21" value="<?=$data['rl_Hout'] > 0  ? $data['rl_Hout']:''?>"></td>
       <td><input  class="form-control"  name="rl_Plastic_Folie" id="price_spinner23" value="<?=$data['rl_Plastic_Folie'] > 0 ? $data['rl_Plastic_Folie'] :''?>"></td>
      <td><input  class="form-control"  name="rl_Papier" id="price_spinner24" value="<?=$data['rl_Papier'] > 0 ? $data['rl_Papier']: ''?>"></td>
      <td><input  class="form-control"  name="rl_Diverse" id="price_spinner22" value="<?=$data['rl_Diverse'] > 0 ? $data['rl_Diverse']: ''?>"></td>
      <td><input type="text" class="form-control"  name="rl_Opmerkingen" id="rl_Opmerkingen" value="<?=$data['rl_Opmerkingen']?>"></td>

    </tr>






    <tr>
      <td scope="row"><input  class="form-control"  name="3m3_Bsa" id="price_spinner19"  value="<?=$data['3m3_Bsa'] > 0  ? $data['3m3_Bsa'] :''?>"></td>
       <td><input  class="form-control"  name="3m3_Puin" id="price_spinner20" value="<?=$data['3m3_Puin'] > 0 ? $data['3m3_Puin']:''?>"></td>
      <td><input  class="form-control"  name="3m3_Hout" id="price_spinner21" value="<?=$data['3m3_Hout'] > 0  ? $data['3m3_Hout']:''?>"></td>
       <td><input  class="form-control"  name="3m3_Plastic_Folie" id="price_spinner23" value="<?=$data['3m3_Plastic_Folie'] > 0 ? $data['3m3_Plastic_Folie'] :''?>"></td>
      <td><input  class="form-control"  name="3m3_Papier" id="price_spinner24" value="<?=$data['3m3_Papier'] > 0 ? $data['3m3_Papier']: ''?>"></td>
      <td><input  class="form-control"  name="3m3_Diverse" id="price_spinner22" value="<?=$data['3m3_Diverse'] > 0 ? $data['3m3_Diverse']: ''?>"></td>
      <td><input type="text" class="form-control"  name="3m3_Opmerkingen" id="3m3_Opmerkingen" value="<?=$data['3m3_Opmerkingen']?>"></td>

    </tr>
	<tr>
    <td scope="row"><input  class="form-control"  name="6m3_Bsa" id="price_spinner25" value="<?=$data['6m3_Bsa'] > 0 ? $data['6m3_Bsa']:'' ?>"></td>
       <td><input  class="form-control"  name="6m3_Puin" id="price_spinner26" value="<?=$data['6m3_Puin'] > 0 ? $data['6m3_Puin']:'' ?>"></td>
      <td><input  class="form-control"  name="6m3_Hout" id="price_spinner27" value="<?=$data['6m3_Hout'] > 0 ? $data['6m3_Hout']:'' ?>"></td>
       <td><input  class="form-control"  name="6m3_Plastic_Folie" id="price_spinner29" value="<?=$data['6m3_Plastic_Folie'] > 0 ? $data['6m3_Plastic_Folie']:'' ?>"></td>
      <td><input  class="form-control"  name="6m3_Papier" id="price_spinner30" value="<?=$data['6m3_Papier'] > 0 ? $data['6m3_Papier']:'' ?>"></td>
       <td><input  class="form-control"  name="6m3_Diverse" id="price_spinner28" value="<?=$data['6m3_Diverse'] > 0 ? $data['6m3_Diverse']:'' ?>"></td>
      <td><input type="text" class="form-control"  name="6m3_Opmerkingen" id="6m3_Opmerkingen" value="<?=$data['6m3_Opmerkingen']?>"></td>

    </tr>
    <tr>
     <td scope="row"><input  class="form-control"  name="10m3_Bsa" id="price_spinner31" value="<?=$data['10m3_Bsa'] > 0 ? $data['10m3_Bsa']:'' ?>"></td>
       <td><input  class="form-control"  name="10m3_Puin" id="price_spinner32" value="<?=$data['10m3_Puin'] > 0 ? $data['10m3_Puin']:'' ?>"></td>
      <td><input  class="form-control"  name="10m3_Hout" id="price_spinner33" value="<?=$data['10m3_Hout'] > 0 ? $data['10m3_Hout']:'' ?>"></td>
       <td><input  class="form-control"  name="10m3_Plastic_Folie" id="price_spinner35" value="<?=$data['10m3_Plastic_Folie'] > 0 ? $data['10m3_Plastic_Folie']:'' ?>" ></td>
      <td><input  class="form-control"  name="10m3_Papier" id="price_spinner35" value="<?=$data['10m3_Papier'] > 0 ? $data['10m3_Papier']:'' ?>" ></td>
      <td><input  class="form-control"  name="10m3_Diverse" id="price_spinner34" value="<?=$data['10m3_Diverse'] > 0 ? $data['10m3_Diverse']:'' ?>" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen" id="10m3_Opmerkingen" value="<?=$data['10m3_Opmerkingen'] ?>" ></td>

    </tr>
    <tr>
      <td scope="row"><input  class="form-control"  name="10m3_Bsa_dicht" id="price_spinner36" value="<?=$data['10m3_Bsa_dicht'] > 0 ? $data['10m3_Bsa_dicht']:'' ?>" ></td>
       <td><input  class="form-control"  name="10m3_Puin_dicht" id="price_spinner37" value="<?=$data['10m3_Puin_dicht'] > 0 ? $data['10m3_Puin_dicht']:'' ?>" ></td>
      <td><input  class="form-control"  name="10m3_Hout_dicht" id="price_spinner38" value="<?=$data['10m3_Hout_dicht'] > 0 ? $data['10m3_Hout_dicht']:'' ?>" ></td>
       <td><input  class="form-control"  name="10m3_Plastic_Folie_dicht" id="price_spinner40" value="<?=$data['10m3_Plastic_Folie_dicht'] > 0 ? $data['10m3_Plastic_Folie_dicht']:'' ?>" ></td>
      <td><input  class="form-control"  name="10m3_Papier_dicht" id="price_spinner41" value="<?=$data['10m3_Papier_dicht'] > 0 ? $data['10m3_Papier_dicht']:'' ?>" ></td>
      <td><input  class="form-control"  name="10m3_Diverse_dicht" id="price_spinner39" value="<?=$data['10m3_Diverse_dicht'] > 0 ? $data['10m3_Diverse_dicht']:'' ?>" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen_dicht" id="10m3_Opmerkingen_dicht" value="<?=$data['10m3_Opmerkingen_dicht']?>" ></td>

    </tr>
    <tr>
    <td scope="row"><input  class="form-control"  name="20m3_Bsa" id="price_spinner42" value="<?=$data['20m3_Bsa'] > 0 ? $data['20m3_Bsa']:'' ?>" ></td>
       <td><input  class="form-control"  name="20m3_Puin" id="price_spinner43" value="<?=$data['20m3_Puin'] > 0 ? $data['20m3_Puin']:'' ?>" ></td>
      <td><input  class="form-control"  name="20m3_Hout" id="price_spinner44" value="<?=$data['20m3_Hout'] > 0 ? $data['20m3_Hout']:'' ?>" ></td>
       <td><input  class="form-control"  name="20m3_Plastic_Folie" id="price_spinner46" value="<?=$data['20m3_Plastic_Folie'] > 0 ? $data['20m3_Plastic_Folie']:'' ?>" ></td>
      <td><input  class="form-control"  name="20m3_Papier" id="price_spinner47" value="<?=$data['20m3_Papier'] > 0 ? $data['20m3_Papier']:'' ?>" ></td>
      <td><input  class="form-control"  name="20m3_Diverse" id="price_spinner45" value="<?=$data['20m3_Diverse'] > 0 ? $data['20m3_Diverse']:'' ?>" ></td>
      <td><input type="text" class="form-control"  name="20m3_Opmerkingen" id="20m3_Opmerkingen" value="<?=$data['20m3_Opmerkingen']?>" ></td>

    </tr>

  <tr>
    <td scope="row"><input  class="form-control"  name="30m3_Bsa" id="price_spinner42" value="<?=$data['30m3_Bsa'] > 0 ? $data['30m3_Bsa']:'' ?>" ></td>
       <td><input  class="form-control"  name="30m3_Puin" id="price_spinner43" value="<?=$data['30m3_Puin'] > 0 ? $data['30m3_Puin']:'' ?>" ></td>
      <td><input  class="form-control"  name="30m3_Hout" id="price_spinner44" value="<?=$data['30m3_Hout'] > 0 ? $data['30m3_Hout']:'' ?>" ></td>
       <td><input  class="form-control"  name="30m3_Plastic_Folie" id="price_spinner46" value="<?=$data['30m3_Plastic_Folie'] > 0 ? $data['30m3_Plastic_Folie']:'' ?>" ></td>
      <td><input  class="form-control"  name="30m3_Papier" id="price_spinner47" value="<?=$data['30m3_Papier'] > 0 ? $data['20m3_Papier']:'' ?>" ></td>
      <td><input  class="form-control"  name="30m3_Diverse" id="price_spinner45" value="<?=$data['30m3_Diverse'] > 0 ? $data['20m3_Diverse']:'' ?>" ></td>
      <td><input type="text" class="form-control"  name="30m3_Opmerkingen" id="20m3_Opmerkingen" value="<?=$data['30m3_Opmerkingen'] ?>" ></td>

    </tr>




    <tr>
   <td scope="row"><input  class="form-control"  name="40m3_Bsa" id="price_spinner48" value="<?=$data['40m3_Bsa'] > 0 ? $data['40m3_Bsa']:'' ?>" ></td>
       <td><input  class="form-control"  name="40m3_Puin" id="price_spinner49" value="<?=$data['40m3_Puin'] > 0 ?   $data['40m3_Puin'] :'' ?>" ></td>
      <td><input  class="form-control"  name="40m3_Hout" id="price_spinner50" value="<?=$data['40m3_Hout'] > 0 ? $data['40m3_Hout']:'' ?>" ></td>
       <td><input  class="form-control"  name="40m3_Plastic_Folie" id="price_spinner52" value="<?=$data['40m3_Plastic_Folie'] > 0 ? $data['40m3_Plastic_Folie']:'' ?>" ></td>
      <td><input  class="form-control"  name="40m3_Papier" id="price_spinner53" value="<?=$data['40m3_Papier'] > 0 ? $data['40m3_Papier']:'' ?>" ></td>
      <td><input  class="form-control"  name="40m3_Diverse" id="price_spinner51" value="<?=($data['40m3_Diverse'] > 0 ? $data['40m3_Diverse']:  '') ?>" ></td>
      <td><input type="text" class="form-control"  name="40m3_Opmerkingen" id="40m3_Opmerkingen" value="<?=$data['40m3_Opmerkingen']?>" ></td>

    </tr>



  </tbody>
</table>

                  		  </div>
                 	   </div>

       </div>


          <div class="col-md-12">
         <div class="content controls" >
                        <div class="form-row" style="float:right" >
                         <div class="col-md-1" >&nbsp;</div>
                            <div class="col-md-2" >
                         	<a href="<?php echo URL:: to( 'admin/OrderWasteContainer' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
                            </div>

                            <div class="col-md-2" style="float:left">
                            {!! Form::submit('Opslaan', ['class' => 'btn btn-success', 'style' => 'width:100%','name' => 'Save']) !!}
                            </div>

                             <div class="col-md-2" style="float:left">
                            {!! Form::submit('Opslaan & Sluiten', ['class' => 'btn btn-info', 'style' => 'width:100%' ,'name' => 'Save_Close']) !!}
                            </div>

                            <div class="col-md-2" style="float:left">
                            {!! Form::button('Bestelling Wijzigen', ['class' => 'btn btn-warning modify', 'style' => 'width:100%']) !!}
                            </div>

                            <div class="col-md-2" style="float:left">
                            {!! Form::button('Bestelling Annuleren', ['class' => 'btn btn-danger cancel', 'style' => 'width:100%']) !!}
                            </div>


                             <br /> <br />
                    </div>
                </div>
        </div>
      </div>





    {!! Form::close() !!}
  </div>
       @include('admin/footer')</div>
