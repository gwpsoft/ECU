<!-- Header -->
    @include('admin/header')
     <title>Aanvraag Personeel</title>
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .center { text-align:center;}
 label { font-size:13px;}
table th,td { font-size:12px;}
 input[type=number].input-number–noSpinners { -moz-appearance: textfield ; }
input[type=number].input-number–noSpinners::-webkit-inner-spin-button,
input[type=number].input-number–noSpinners::-webkit-outer-spin-button {
-webkit-appearance: none ;
margin: 0;
}
</style>
<script>
$(function() {
    $( ".datepicker" ).datepicker({ firstDay: 1 });
});

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

$('#con_Mobilenummer').val(contact.Mobile);
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
		$.get('GetContactNo?id=' + Contact_id,function(contact) {

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

		var contact_id = $('select#Contact_id').val();
		$.get('AjaxContact?contact_id=' + contact_id,function(data) {
		//alert (data);

		$('#con_Telefoonnummer').val(data.Phone);
		$('#con_Mobilenummer').val(data.Mobile);

		});
	}

$(document).ready(function() {

	 $('.timepicker').timepicker('setTime', new Date());
	$('.timepicker2').timepicker('setTime', '07:00');


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

		$('#Telefoonnummer').val(data.Contact_phone);
		$('#con_Mobilenummer').val(data.Contact_phone);


		$('#Work_Address').val(data.Address);
		$('#Uitvoerder').val(data.Contact_Firstname +' '+ data.Contact_Lastname);
		$('#Customer_id').val(data.Customer_id);
		$('#Postcode').val(data.Zipcode+' '+data.City);
		$('#ECU_Project_nr').val(data.Project_Ref);
		$('#Department_Id').val(data.Department_Id);
		$('#Email').val(data.Email);
		$('#Fax').val(data.Fax);
		$('#Contact').val(data.Name);
		$('#more_notes').val(data.more_notes);
		$('#Opmerkingen').val(data.Container_Notes);
		$.get('GetContactsList/' + data.DeptID+'/'+data.Contact_ID,function(res) {
		//$.get('GetContactsByDept/' + data.Department_Id,function(res) {
		$('#contact_list').html(res);
		});
		$.get('GetContactsListMelden/' + data.DeptID+'/'+data.Contact_ID,function(data3) {
		//$.get('GetContacts/?dept_id=' + data.DeptID,function(data) {
		$('#contact_list2').html(data3);
		});
		//$('#Contact_id').val(data.Contact_ID).change();

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

	//$('select#Contact_id').on('change', function() {


	//});







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
		$.get("<?php //echo URL:: to( 'admin/Getprices'); ?>/" + Shippingcompany_id,function(ship) {



	});
});*/
document.addEventListener("mousewheel", function(event){
    if(document.activeElement.type === "number" &&
       document.activeElement.classList.contains("noscroll"))
    {
        document.activeElement.blur();
    }
});
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
    {!! Form::open(['url'=> 'admin/store_OrderServices']) !!}
    <input type="hidden" name="Customer_id" id="Customer_id"  />
     <input type="hidden" name="Department_Id" id="Department_Id"  />
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
                    </div>
                    <div class="content controls">

                        <div class="form-row">
                           <div class="col-md-2">Project Naam:</div>
                            <div class="col-md-4">
                            	<select class="select2" id="project_name" name="project_name" style="width: 100%;">
                                <option value="">Project Selecteren</option>
                                @foreach ($Projects as $Project)
                                <option value="{!! $Project->Id!!}">{!! $Project->Name!!}</option>
                                 @endforeach
                                </select>

                            </div>
                             <div class="col-md-2">Besteld door:</div>
                            <div class="col-md-4">
                            <div id="contact_list">
                            <select class="select2" id="Contact_id" name="Contact_id" style="width: 100%;" >
                            <option value="">Naam selecteren</option>
                            </select>
                            </div>
                            </div>
                        </div>


                         <div class="form-row">
                          <div class="col-md-2">Afdeling:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Afdeling" id="Afdeling" name="Afdeling">
                            </div>

                            <div class="col-md-2">Telefoonnummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" id="con_Telefoonnummer" name="con_Telefoonnummer" value="{{ (Input::old('Telefoonnummer')) ? Input::old('Telefoonnummer') : '' }}">
                            </div>
                        </div>


                           <div class="form-row">

                            <div class="col-md-2">Project Adres:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Project Adres" name="Work_Address" id="Work_Address" value="{{ (Input::old('Work_Address')) ? Input::old('Work_Address') : '' }}">
                            </div>
                          <div class="col-md-2">Mobielenummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Mobilenummer" id="con_Mobilenummer" name="con_Mobilenummer" value="{{ (Input::old('con_Mobilenummer')) ? Input::old('con_Mobilenummer') : '' }}">
                            </div>

                          </div>

                          <div class="form-row">

                               <div class="col-md-2">Postcode & plaats:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Postcode & plaats" name="Postcode" id="Postcode" value="{{ (Input::old('Postcode')) ? Input::old('Postcode') : '' }}">
                            </div>

                             <div class="col-md-2">Aangenomen door:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" required="required" placeholder="Aangenomen door" id="con_Aangenomendoor" name="con_Aangenomendoor" value="{{ (Input::old('con_Aangenomendoor')) ? Input::old('con_Aangenomendoor') : '' }}">
                            </div>
                            <span class="error">  {{ $errors->first( 'con_Aangenomendoor' , ':message' ) }}</span>

                          </div>

                          <div class="form-row">
                           <div class="col-md-2">Uitvoerder:</div>
                            <div class="col-md-4">
                            		<input type="text" readonly="readonly" class="form-control" placeholder="Uitvoerder" id="Uitvoerder" name="Uitvoerder">
                            </div>

                             <div class="col-md-2">Aanvraagdatum  :</div>
                            <div class="col-md-4">
                             <div class="input-group">
                            <div class="input-group-addon">
							<span class="icon-calendar-empty"></span>
							</div>
                            	<input type="text" class="datepicker form-control" placeholder="Besteldatum" name="Order_Date" value="<?php echo date('Y-m-d')?>">
                            </div>
                            </div>


                        </div>


                         <div class="form-row">
                          <div class="col-md-2">Mobilenummer:</div>
                            <div class="col-md-4">
                            	<input type="text" readonly="readonly" class="form-control" placeholder="Telefoonnummer" name="phone_number" id="phone_number" value="{{ (Input::old('phone_number')) ? Input::old('phone_number') : '' }}">

                             </div>

                           <div class="col-md-2">Tijd:</div>
                            <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon">
                            <span class="icon-time"></span>
                            </div>
                            	<input type="text" class="timepicker  form-control" placeholder="Tijd" name="time" value="07:00">
                            </div>    </div>
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
                            <input type="text" class="datepicker form-control" placeholder="Begindatum" name="Begindatum" value="<?php echo date('Y-m-d', strtotime("+1 day"))?>">
                            </div>
                            </div>
                           <div class="col-md-2">Begintijd:</div>
                            <div class="col-md-4">
                            <div class="input-group">
                            <div class="input-group-addon">
                            <span class="icon-time"></span>
                            </div>
                            	<input type="text" class="timepicker timepicker2 form-control" placeholder="Begintijd" name="Begintijd" value="{{ (Input::old('Begintijd')) ? Input::old('Begintijd') : '' }}">
                            </div>    </div>
                            </div>

                             <div class="form-row">
                             <div class="col-md-2">Aantal Mensen:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Aantal Mensen" name="Aantal_Mensen" id="Aantal_Mensen" value="{{ (Input::old('Aantal_Mensen')) ? Input::old('Aantal_Mensen') : '' }}">
                            </div>

                              <div class="col-md-2">Hoeveel Dagen:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Hoeveel Dagen" name="Hoeveel_Dagen" id="Hoeveel_Dagen" value="{{ (Input::old('Hoeveel_Dagen')) ? Input::old('Hoeveel_Dagen') : '' }}">
                            </div>

                            </div>
                             <div class="form-row">

                                <div class="col-md-2">Melden Bij:</div>
                            <div class="col-md-4">
                            <div id="contact_list2">
                            <select class="select2" id="Melden_Bij" name="Melden_Bij" style="width: 100%;" >
                            <option value="">Naam selecteren</option>
                            </select>
                            </div>
                            	<!--<input type="text" class="form-control" placeholder="Melden Bij" name="Melden_Bij" id="Melden_Bij" value="{{ (Input::old('Melden_Bij')) ? Input::old('Melden_Bij') : '' }}">
                                </div>-->
                            </div>

                               <div class="col-md-2">Mobilenummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" name="Telefoonnummer" id="Telefoonnummer" value="{{ (Input::old('Telefoonnummer')) ? Input::old('Telefoonnummer') : '' }}">
                            </div>

                            </div>

                            <div class="form-row">

                             <div class="col-md-2">Werkzaamheden:</div>
                            <div class="col-md-2">
                            	<select class="form-control" placeholder="Werkzaamheden" name="Werkzaamheden" id="Werkzaamheden">
                                <option value="">Werkzaamheden kiezen</option>
                                 <option value="Anders">Anders</option>
                                 <option value="Glasbewassing">Glasbewassing</option>
                                <option value="Handyman">Handyman</option>
                                 <option value="Keetonderhoud">Keetonderhoud</option>
                                <option value="Opleveringsschoonmaak">Opleveringsschoonmaak</option>
                                <option value="Opperman">Opperman</option>
                                <option value="Opruimer">Opruimer</option>
                                <option value="Schoonmaker">Schoonmaker</option>
                                <option value="Timmerman">Timmerman</option>
                                <option value="Verkeersregelaar">Verkeersregelaar</option>

                                </select>
                            </div>

                            <div class="col-md-8">
                            <input type="text" class="form-control" style="display:none;" placeholder="Anders" name="Anders" id="Anders" value="{{ (Input::old('Anders')) ? Input::old('Anders') : '' }}">
                            </div>





                            <!--  <div class="col-md-2">Benodigheden:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Benodigheden" name="Benodigheden" id="Benodigheden" value="{{ (Input::old('Benodigheden')) ? Input::old('Benodigheden') : 'Standaard PBM’s en legitimatie' }}">
                            </div> -->





                            </div>

                            <div class="form-row">
                             <div class="col-md-2">Benodigheden:</div>
                            <div class="col-md-10">
                            	 <textarea class="form-control" placeholder="Benodigheden" name="Benodigheden" id="Benodigheden">{{ (Input::old('Benodigheden')) ? Input::old('Benodigheden') : 'Standaard PBM’s en legitimatie. &nbsp;' }}</textarea>
                            </div>
                            </div>


                            <div class="form-row">
                             <div class="col-md-2">Project notities:</div>
                            <div class="col-md-10">
                               <textarea class="form-control" placeholder="Project notities" name="more_notes" id="more_notes">{{ (Input::old('more_notes')) ? Input::old('more_notes') : '' }}</textarea>
                            </div>
                            </div>

														<div class="form-row">
														 <div class="col-md-2">Opmerkingen:</div>
														<div class="col-md-10">
															 <textarea class="form-control" placeholder="Opmerkingen" name="Opmerkingen" id="Opmerkingen">{{ (Input::old('Opmerkingen')) ? Input::old('Opmerkingen') : '' }}</textarea>
														</div>
														</div>


                  		  </div>
                 	   </div>


                	   </div>


    <!--  <div class="col-md-4">
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
      <td scope="row"><input  class="form-control"  name="3m3_Bsa" id="price_spinner19"  value="{{ (Input::old('price_spinner19')) ? Input::old('price_spinner19') : '' }}"></td>
       <td><input  class="form-control"  name="3m3_Puin" id="price_spinner20" value="{{ (Input::old('price_spinner20')) ? Input::old('price_spinner20') : '' }}"></td>
      <td><input  class="form-control"  name="3m3_Hout" id="price_spinner21" value="{{ (Input::old('price_spinner21')) ? Input::old('price_spinner21') : '' }}"></td>
       <td><input  class="form-control"  name="3m3_Plastic_Folie" id="price_spinner23" value="{{ (Input::old('price_spinner23')) ? Input::old('price_spinner23') : '' }}"></td>
      <td><input  class="form-control"  name="3m3_Papier" id="price_spinner24" value="{{ (Input::old('price_spinner24')) ? Input::old('price_spinner24') : '' }}"></td>
      <td><input  class="form-control"  name="3m3_Diverse" id="price_spinner22" value="{{ (Input::old('price_spinner22')) ? Input::old('price_spinner22') : '' }}"></td>
      <td><input type="text" class="form-control"  name="3m3_Opmerkingen" id="3m3_Opmerkingen" value="{{ (Input::old('3m3_Opmerkingen')) ? Input::old('3m3_Opmerkingen') : '' }}"></td>

    </tr>
    <td scope="row"><input  class="form-control"  name="6m3_Bsa" id="price_spinner25" value="{{ (Input::old('price_spinner25')) ? Input::old('price_spinner25') : '' }}"></td>
       <td><input  class="form-control"  name="6m3_Puin" id="price_spinner26" value="{{ (Input::old('price_spinner26')) ? Input::old('price_spinner26') : '' }}"></td>
      <td><input  class="form-control"  name="6m3_Hout" id="price_spinner27" value="{{ (Input::old('price_spinner27')) ? Input::old('price_spinner27') : '' }}"></td>
       <td><input  class="form-control"  name="6m3_Plastic_Folie" id="price_spinner29" value="{{ (Input::old('price_spinner29')) ? Input::old('price_spinner29') : '' }}"></td>
      <td><input  class="form-control"  name="6m3_Papier" id="price_spinner30" value="{{ (Input::old('price_spinner30')) ? Input::old('price_spinner30') : '' }}"></td>
       <td><input  class="form-control"  name="6m3_Diverse" id="price_spinner28" value="{{ (Input::old('price_spinner28')) ? Input::old('price_spinner28') : '' }}"></td>
      <td><input type="text" class="form-control"  name="6m3_Opmerkingen" id="6m3_Opmerkingen" value="{{ (Input::old('6m3_Opmerkingen')) ? Input::old('6m3_Opmerkingen') : '' }}"></td>

    </tr>
     <td scope="row"><input  class="form-control"  name="10m3_Bsa" id="price_spinner31" value="{{ (Input::old('price_spinner31')) ? Input::old('price_spinner31') : '' }}"></td>
       <td><input  class="form-control"  name="10m3_Puin" id="price_spinner32" value="{{ (Input::old('price_spinner32')) ? Input::old('price_spinner32') : '' }}"></td>
      <td><input  class="form-control"  name="10m3_Hout" id="price_spinner33" value="{{ (Input::old('price_spinner33')) ? Input::old('price_spinner33') : '' }}"></td>
       <td><input  class="form-control"  name="10m3_Plastic_Folie" id="price_spinner35" value="{{ (Input::old('price_spinner35')) ? Input::old('price_spinner35') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Papier" id="price_spinner35" value="{{ (Input::old('price_spinner35')) ? Input::old('price_spinner35') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Diverse" id="price_spinner34" value="{{ (Input::old('price_spinner34')) ? Input::old('price_spinner34') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen" id="10m3_Opmerkingen" value="{{ (Input::old('10m3_Opmerkingen')) ? Input::old('10m3_Opmerkingen') : '' }}" ></td>

    </tr>
      <td scope="row"><input  class="form-control"  name="10m3_Bsa_dicht" id="price_spinner36" value="{{ (Input::old('price_spinner36')) ? Input::old('price_spinner36') : '' }}" ></td>
       <td><input  class="form-control"  name="10m3_Puin_dicht" id="price_spinner37" value="{{ (Input::old('price_spinner37')) ? Input::old('price_spinner37') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Hout_dicht" id="price_spinner38" value="{{ (Input::old('price_spinner38')) ? Input::old('price_spinner38') : '' }}" ></td>
       <td><input  class="form-control"  name="10m3_Plastic_Folie_dicht" id="price_spinner40" value="{{ (Input::old('price_spinner40')) ? Input::old('price_spinner40') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Papier_dicht" id="price_spinner41" value="{{ (Input::old('price_spinner41')) ? Input::old('price_spinner41') : '' }}" ></td>
      <td><input  class="form-control"  name="10m3_Diverse_dicht" id="price_spinner39" value="{{ (Input::old('price_spinner39')) ? Input::old('price_spinner39') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="10m3_Opmerkingen_dicht" id="10m3_Opmerkingen_dicht" value="{{ (Input::old('10m3_Opmerkingen_dicht')) ? Input::old('name') : '' }}" ></td>

    </tr>
    <td scope="row"><input  class="form-control"  name="20m3_Bsa" id="price_spinner42" value="{{ (Input::old('price_spinner42')) ? Input::old('price_spinner42') : '' }}" ></td>
       <td><input  class="form-control"  name="20m3_Puin" id="price_spinner43" value="{{ (Input::old('price_spinner43')) ? Input::old('price_spinner43') : '' }}" ></td>
      <td><input  class="form-control"  name="20m3_Hout" id="price_spinner44" value="{{ (Input::old('price_spinner44')) ? Input::old('price_spinner44') : '' }}" ></td>
       <td><input  class="form-control"  name="20m3_Plastic_Folie" id="price_spinner46" value="{{ (Input::old('price_spinner46')) ? Input::old('price_spinner46') : '' }}" ></td>
      <td><input  class="form-control"  name="20m3_Papier" id="price_spinner47" value="{{ (Input::old('price_spinner47')) ? Input::old('price_spinner47') : '' }}" ></td>
      <td><input  class="form-control"  name="20m3_Diverse" id="price_spinner45" value="{{ (Input::old('price_spinner45')) ? Input::old('price_spinner45') : '' }}" ></td>
      <td><input type="text" class="form-control"  name="20m3_Opmerkingen" id="20m3_Opmerkingen" value="{{ (Input::old('20m3_Opmerkingen')) ? Input::old('20m3_Opmerkingen') : '' }}" ></td>

    </tr>
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

       </div>      -->


        <div class="col-md-12">
    <div class="content controls">
                        <div class="form-row" style="float:right" >

                             <div class="col-md-3" align="center" >
                <a href="<?php echo URL:: to( 'admin/BestelformulierDiensten' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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
