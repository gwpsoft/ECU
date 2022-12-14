<!-- Header -->
    @include('admin/header')
     <title>Personeels aanvraag bewerken</title>
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
		//alert ('sdf');
		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Contact_id = $('select#Contact_id').val();

		$.get('<?php echo URL:: to( 'admin/GetContactNo' ); ?>?id=' + Contact_id,function(contact) {
			$('#con_Telefoonnummer').val(contact.Mobile);
		});

	}

function GetContact2 () {
		//alert ('sdf');
		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Contact_id = $('#Melden_Bij').val();
		//alert (Contact_id);
		$.get('<?php echo URL:: to( 'admin/GetContactNo' ); ?>?id=' + Contact_id,function(contact) {
			$('#Telefoonnummer').val(contact.Mobile);
		});

	}



function GetContactInfo (){
			 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });

		var contact_id = $('select#Melden_Bij').val();
		$.get('AjaxContact?contact_id=' + contact_id,function(data) {
		//alert (data);

		$('#con_Telefoonnummer').val(data.Phone);
		$('#con_Mobilenummer').val(data.Mobile);

		});
	}

/*function GetContactInfo (){
			 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });

		var contact_id = $('select#Contact_id').val();
		if (contact_id) {
		$.get('<?php echo URL:: to( 'admin/AjaxContact' ); ?>?contact_id=' + contact_id,function(data) {
		$('#con_Telefoonnummer').val(data.Phone);
		$('#con_Mobilenummer').val(data.Mobile);
		$('#Melden_Bij').val(data.Firstname+' '+data.Lastname);
		});
		} else {
		$('#Melden_Bij').val('');
		}



	}
*/


$(document).ready(function() {

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
		$('#Work_Address').val(data.Address);
		$('#Uitvoerder').val(data.Contact_Firstname +' '+ data.Contact_Lastname);
		$('#Customer_id').val(data.Customer_id);
		$('#Postcode').val(data.Zipcode+' '+data.City);
		$('#ECU_Project_nr').val(data.Project_Ref);
		$('#Department_Id').val(data.Department_Id);
		$('#Email').val(data.Email);
		$('#Fax').val(data.Fax);
		$('#Contact').val(data.Name);

		$.get('<?php echo URL:: to( 'admin/GetContactsList')?>/' + data.DeptID+'/'+data.Contact_ID,function(res) {
		//$.get('GetContactsByDept/' + data.Department_Id,function(res) {
		$('#contact_list').html(res);
		});
		$.get('<?php echo URL:: to( 'admin/GetContactsListMelden')?>/' + data.DeptID+'/'+data.Contact_ID,function(data3) {
		//$.get('GetContacts/?dept_id=' + data.DeptID,function(data) {
		$('#contact_list2').html(data3);
		});



		/*$.get('<?php echo URL:: to( 'admin/GetContactsListMelden')?>/' + data.DeptID+'/'+data.Contact_ID,function(data3) {
		//$.get('GetContacts/?dept_id=' + data.DeptID,function(data) {
		$('#contact_list2').html(data3);
		});*/





		/*$.get('<?php echo URL:: to( 'admin/GetContactsByDept' ); ?>/' + data.Department_Id,function(res) {
		$('#contact_list').html(res);
		});*/

		});

	});
$('select#Werkzaamheden').on('change', function() {

		var notes = $('select#Werkzaamheden').val();
		if (notes == 'Anders') {
		$('#Anders').show();
		} else {
		$('#Anders').hide();
		}

	});

// Shipping
	/*$('select#shippingcomapny_id').on('change', function() {

		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var Shippingcompany_id = $('select#shippingcomapny_id').val();
		$.get("<?php echo URL:: to( 'admin/Getprices'); ?>/" + Shippingcompany_id,function(ship) {
		$('#Email').val(ship.Email);
		$('#Fax').val(ship.Fax);


	});
});*/

});
</script>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
                    <li class="active">Aanvraag Personeel</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'admin/update_OrderServices', 'class' => 'order']) !!}
     <input type="hidden" name="Status" id="status" />
     <input type="hidden" name="Customer_id" id="Customer_id" value="<?=$data['Customer_id']?>"  />
     <input type="hidden" name="Contact_id" id="Contact_id" value="<?=$data['Contact_id']?>"  />
     <input type="hidden" name="id" value="<?=$data['id']?>" />
     <input type="hidden" name="Rev_Nummer" value="<?=$data['Nummer']?>" />
      <input type="hidden" name="Nummer" value="<?=$data['Nummer']?>" />
      <input type="hidden" name="Department_Id" id="Department_Id"  value="<?=$data['Department_Id']?>" />
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
                       <h2>Aanvraag Personeel</h2>
                       <a href="<?php echo URL:: to( 'admin/OrderServices_print',$data['id']); ?>" title="Afdrukken" style="float:right"><img class=" " src="{{ URL::asset('assets/img/icons/print.png') }}" id="pdf" style=" cursor:pointer; width:25px; height:25px;"></a>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-2">Project Naam:</div>
                            <div class="col-md-4">
                            		<select class="select2" id="project_name" name="project_name" style="width: 100%;">
                                <option value="">Project Selecteren</option>
                                @foreach ($Projects as $Project)
                                <option value="{!! $Project->Id!!}" <?php if ($data['project_name'] == $Project->Id) { ?> selected="selected" <?php } ?>>{!! $Project->Name!!}</option>
                                 @endforeach
                                </select>

                            </div>

                             <div class="col-md-2">Besteld door:</div>
                            <div class="col-md-4">
                            <div id="contact_list">
                            	  <select class="select2" id="Contact_id" name="Contact_id" style="width: 100%;" onchange="GetContact();">
                            <option value="">Naam selecteren</option>
                            <?php foreach ($contacts as $Contact) {?>
                            <option value="<?php echo $Contact->Id?>" <?php if ($data['Contact_id'] == $Contact->Id) { ?> selected="selected" <?php } ?>><?php echo $Contact->Firstname.' '.$Contact->Lastname; ?></option>
							<?php } ?>
                            </select>
                            </div>
                        </div>
                         </div>

                         <div class="form-row">

                         <div class="col-md-2">Afdeling:</div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Afdeling" readonly="readonly" id="Afdeling" name="Afdeling" value="<?=$data['Afdeling'];?>">
                            </div>


                            <div class="col-md-2">Telefoonnummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" name="con_Telefoonnummer" id="con_Telefoonnummer" value="<?=$data['con_Telefoonnummer']?>">
                            </div>
                        </div>


                        <div class="form-row">
                        <div class="col-md-2">Project Adres:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Project Adres" name="Work_Address"  id="Work_Address" value="<?=$data['Work_Address'];?>">
                            </div>

                              <div class="col-md-2">Mobielenummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Mobilenummer" id="con_Mobilenummer" name="con_Mobilenummer" value="<?=$data['con_Mobilenummer'];?>">
                            </div>




                          </div>

                          <div class="form-row">
                            <div class="col-md-2">Postcode & plaats:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Postcode" name="Postcode" id="Postcode" value="<?=$data['Postcode']?>">
                            </div>

                             <div class="col-md-2">Aangenomen door:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Aangenomen door" id="con_Aangenomendoor" name="con_Aangenomendoor" value="<?=$data['con_Aangenomendoor']?>">
                            </div>


                        </div>


                         <div class="form-row">


                               <div class="col-md-2">Uitvoerder:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Uitvoerder" id="Uitvoerder" name="Uitvoerder" value="<?=$data['Uitvoerder'];?>">
                            </div>

                              <div class="col-md-2">Aanvraagdatum:</div>
                            <div class="col-md-4">
                             <div class="input-group">
                            <div class="input-group-addon">
							<span class="icon-calendar-empty"></span>
							</div>
                            <input type="text" class="datepicker form-control" placeholder="Besteldatum" name="Order_Date" value="<?=$data['Order_Date']?>">
                            </div>

                        </div>


                        </div>

                        <div class="form-row">
                          <div class="col-md-2">Mobilenummer:</div>
                            <div class="col-md-4">
                            	<input type="text" readonly="readonly" class="form-control" placeholder="Telefoonnummer" name="phone_number" id="phone_number" value="<?=$data['phone_number']?>">

                             </div>
                            <div class="col-md-2">Tijd:</div>
                            <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon">
                            <span class="icon-time"></span>
                            </div>
                            	<input type="text" class="timepicker  form-control" placeholder="Tijd" name="time" value="<?=$data['time']?>">
                            </div>
                          </div>

                        </div>

                             <div class="form-row">

                                <div class="col-md-2">Aanvraagnummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Nummer" value="AP-<?=sprintf('%02d',$data['Nummer'])?>" readonly="readonly">
                            </div>

														<div class="col-md-2">Afgehandeld:</div>
														<div class="col-md-4">
		                          <div class="input-group">
		                            <div class="checkbox-inline" style="margin-left: 5px;">
		                              <div class="checker">
		                                <input type="checkbox" name="afgehandled" value="1"  <?php if ($data['afgehandled'] == 1) { ?> checked="checked" <?php } ?>>
		                              </div>
		                            </div>
		                          </div>
		                        </div>

                              <input type="hidden" name="rev_nummer" value="<?php echo sprintf('%02d',@$data['Rev_Nummer'])?>" />
                               <input type="hidden" name="nummer" value="<?php echo sprintf('%02d',@$data['Nummer'])?>" />
                            <?php if (@$data['Rev_Nummer'] !=0){ ?>

                              {{-- <div class="col-md-2">Gewijzigd Nummer:</div>
                            <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Revised Nummer" id="Revised Nummer" readonly="readonly" value="AP-{{ sprintf('%02d',$data['Rev_Nummer']) }}">

                            </div> --}}


                            <?php } ?>
                        </div>

                </div>
            </div>




               <div class="block">
                    <div class="header" >
                       <h2>Opdracht</h2>
                    </div>
                    <div class="content controls">

                    <div class="form-row">
                            <div class="col-md-2">Begindatum:</div>
                            <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon">
							<span class="icon-calendar-empty"></span>
							</div>
                            	<input type="text" class="datepicker form-control" placeholder="Begindatum" name="Begindatum" value="<?=$data['Begindatum']?>">
                            </div>
                            </div>
                           <div class="col-md-2">Begintijd:</div>
                            <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon">
                            <span class="icon-time"></span>
                            </div>
                            	<input type="text" class="timepicker  form-control" placeholder="Begintijd" name="Begintijd" value="<?=$data['Begintijd']?>">
                            </div>    </div>
                            </div>

                             <div class="form-row">
                             <div class="col-md-2">Aantal Mensen:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Aantal Mensen" name="Aantal_Mensen" id="Aantal_Mensen" value="<?=$data['Aantal_Mensen']?>">
                            </div>

                              <div class="col-md-2">Hoeveel Dagen:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Hoeveel Dagen" name="Hoeveel_Dagen" id="Hoeveel_Dagen" value="<?=$data['Hoeveel_Dagen']?>">
                            </div>

                            </div>
                             <div class="form-row">
                                 <div class="col-md-2">Melden Bij:</div>
                            <div class="col-md-4">
                            <div id="contact_list2">
                            	  <select class="select2" id="Melden_Bij" name="Melden_Bij" style="width: 100%;"  onchange="GetContactInfo();">
                            <option value="">Naam selecteren</option>
                            <?php foreach ($contacts as $Contact) {?>
                            <option value="<?php echo $Contact->Id?>" <?php if ($data['Melden_Bij'] == $Contact->Id) { ?> selected="selected" <?php } ?>><?php echo $Contact->Firstname.' '.$Contact->Lastname; ?></option>
							<?php } ?>
                            </select>
                            </div>



                            	<!--<input type="text" class="form-control" placeholder="Melden Bij" name="Melden_Bij" id="Melden_Bij" value="<?=$data['Melden_Bij']?>">-->
                            </div>
                              <div class="col-md-2">Mobilenummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" name="Telefoonnummer" id="Telefoonnummer" value="<?=$data['Telefoonnummer']?>">
                            </div>



                            </div>

                            <div class="form-row">
                             <div class="col-md-2">Werkzaamheden:</div>
                            <div class="col-md-2">
                    <select class="form-control" placeholder="Werkzaamheden" name="Werkzaamheden" id="Werkzaamheden">
                    <option value="" <?php if ($data['Werkzaamheden'] == '') { ?> selected="selected" <?php } ?>>Werkzaamheden kiezen</option>
										<option value="Anders"  <?php if ($data['Werkzaamheden'] == 'Anders') { ?> selected="selected" <?php } ?>>Anders</option>
										<option value="Glasbewassing" <?php if ($data['Werkzaamheden'] == 'Glasbewassing') { ?> selected="selected" <?php } ?>>Glasbewassing</option>
										<option value="Handyman" <?php if ($data['Werkzaamheden'] == 'Handyman') { ?> selected="selected" <?php } ?>>Handyman</option>
										<option value="Keetonderhoud" <?php if ($data['Werkzaamheden'] == 'Keetonderhoud') { ?> selected="selected" <?php } ?>>Keetonderhoud</option>
										<option value="Opleveringsschoonmaak" <?php if ($data['Werkzaamheden']=='Opleveringsschoonmaak'){?> selected="selected" <?php } ?>>Opleveringsschoonmaak
										</option>
										<option value="Opperman"  <?php if ($data['Werkzaamheden'] == 'Opperman') { ?> selected="selected" <?php } ?>>Opperman</option>
										<option value="Opruimer"  <?php if ($data['Werkzaamheden'] == 'Opruimer') { ?> selected="selected" <?php } ?>>Opruimer</option>
										<option value="Schoonmaker"  <?php if ($data['Werkzaamheden'] == 'Schoonmaker') { ?> selected="selected" <?php } ?>>Schoonmaker</option>
										<option value="Timmerman"  <?php if ($data['Werkzaamheden'] == 'Timmerman') { ?> selected="selected" <?php } ?>>Timmerman</option>
										<option value="Verkeersregelaar"  <?php if ($data['Werkzaamheden'] == 'Verkeersregelaar') { ?> selected="selected" <?php } ?>>Verkeersregelaar</option>

                    </select>
                            </div>
                            <div class="col-md-8">
                            <?php if ($data['Werkzaamheden'] == 'Anders') {
							$display = 'block';
							 } else {
							$display = 'none';
							 } ?>
                            <input type="text" class="form-control" style="display:<?php echo $display;?>;" placeholder="Anders" name="Anders" id="Anders" value="<?=$data['Anders']?>">

                            </div>
                            </div>



                                <div class="form-row">
                             <div class="col-md-2">Benodigheden:</div>
                            <div class="col-md-10">
                            	 <textarea class="form-control" placeholder="Benodigheden" name="Benodigheden" id="Benodigheden"><?=$data['Benodigheden']?></textarea>
                            </div>
                            </div>

                            <div class="form-row">
                             <div class="col-md-2">Project notities:</div>
                            <div class="col-md-10">
                               <textarea class="form-control" placeholder="Project notities" name="more_notes" id="more_notes"><?=$data['more_notes']?></textarea>
                            </div>
                            </div>

														<div class="form-row">
														 <div class="col-md-2">Opmerkingen:</div>
														<div class="col-md-10">
															 <textarea class="form-control" placeholder="Opmerkingen" name="Opmerkingen" id="Opmerkingen"></textarea>
														</div>
														</div>

                  		  </div>
                 	   </div>


                	   </div>




          <div class="col-md-12">
         <div class="content controls" >
                        <div class="form-row" style="float:right" >
                         <div class="col-md-1" >&nbsp;</div>
                            <div class="col-md-2" >
                         	<a href="<?php echo URL:: to( 'admin/BestelformulierDiensten' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
                            </div>

                            <div class="col-md-2" style="float:left">
                            {!! Form::submit('Opslaan', ['class' => 'btn btn-success', 'style' => 'width:100%' ,'name' => 'Save']) !!}
                            </div>

                             <div class="col-md-2" style="float:left">
                            {!! Form::submit('Opslaan & Sluiten', ['class' => 'btn btn-primary', 'style' => 'width:100%' ,'name' => 'Save_Close']) !!}
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
