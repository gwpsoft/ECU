@include('front/header')
 <title>Easy Clean Up | Aanvraag Personeel</title>
 <meta name="_token" content="{!! csrf_token() !!}"/>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>
 <link href="{{ URL::asset('assets/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/bootstrap-datepicker.js') }}"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>
   <style>
   .form-row {
    float: left;
    line-height: 30px;
    margin-bottom: 10px;
    width: 100%;
}
label { font-size:13px;}
table th,td { font-size:12px;}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 { padding-right:3px !important;}
.center { text-align:center;}
th,td { text-align:left}
 /* .glyphicon glyphicon-chevron-up {
    border: 1px transparent solid;
    width: 100%;
    display: inline-block;
    margin: 0;
    padding: 8px 0;
    outline: 0;
    color: #333;
	position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
}
.bootstrap-timepicker-widget table td span {
    width: 100%;}*/
   </style>

  <script>

  $(document).ready(function() {


	  $('select#Werkzaamheden').on('change', function() {

			var notes = $('select#Werkzaamheden').val();
			if (notes == 'Anders') {
			$('#Anders').show();
			} else {
			$('#Anders').hide();
			}

		});

	});

  </script>



            <div class="page-content">

                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">
                            <h1>Aanvraag Personeel</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li ><a href="<?php echo URL:: to( '/' );?>">Home</a></li>
                                <li class="active"><a href="<?php echo URL:: to( 'OrderServices' );?>">Aanvraag Personeel</a></li>
                            </ul>
                            <!-- ./breadcrumbs -->
                        </div>
                        <!-- ./page title -->
                    </div>
                    <!-- ./page content holder -->
                </div>
                <!-- page content wrapper -->
                <div class="page-content-wrap">

                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>

                    <!-- page content holder -->
                    <div class="page-content-holder">


                     <div class="col-md-14">
   @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    @if (Session::has('error'))
   <div class="alert alert-danger">
                        <b>Error!</b> {{Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
      {!! Form::open(['url'=> 'Save_OrderServices', 'id'=>'Save_OrderServices', 'name'=>'Save_OrderServices']) !!}
        <input type="hidden" name="Department_Id" id="Department_Id"  value="<?php echo $Dept;?>" />
        <input type="hidden" name="con_id" id="con_id"  value="<?php echo $contact_id;?>" />
        <div id="sf1" class="frm">
        <fieldset>
        <legend>Stap 1 of 2</legend>
        <div class="col-md-18">

                <div class="block">
                    <div class="header" >
                       <h2>Aanvraag Personeel</h2>
                    </div>

                  <div class="form-row">

                    <div class="col-md-2"><label>Project naam:</label></div>
                            <div class="col-md-4">
                             <input type="hidden" name="project_id"  value="<?php echo $Projects[0]->Id?>" />
                            <input type="text" class="form-control" id="project_name" name="project_name" readonly="readonly" value="<?php echo $Projects[0]->Name?>" />
                            </div>


                               <div class="col-md-2"><label>Besteld door:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Besteld door" name="Contact_id" id="Contact_id" value="<?=$current_Username ?>" readonly="readonly">
                            </div>

                        </div>

                         <div class="form-row">
                             <div class="col-md-2"><label>Afdeling:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Afdeling" id="Afdeling" name="Afdeling" readonly="readonly" value="<?php echo $departments->Name?>">
                            </div>
                             <div class="col-md-2"><label>Telefoonnummer:</div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" id="con_Telefoonnummer" name="con_Telefoonnummer" value="<?=$Contacts[0]->Phone;?>" readonly="readonly">
                            </div>

                        </div>


                        <div class="form-row">

                         <div class="col-md-2"><label>Project Adres:</label></div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Project Adres" id="Work_Address" name="Work_Address" readonly="readonly">
                            </div>
                          <div class="col-md-2"><label>Mobilenummer:</label></div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Mobilenummer" id="con_Mobilenummer" name="con_Mobilenummer" value="<?=$Contacts[0]->Mobile;?>" readonly="readonly">
                            </div>
                        </div>

                         <div class="form-row">
                            <div class="col-md-2"><label>Postcode & plaats:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Postcode & plaats" name="Postcode" id="Postcode" value="<?php echo $Projects[0]->Zipcode.' '.$Projects[0]->City?>" readonly="readonly">
                            </div>

                               <div class="col-md-2"><label>Aangenomen door:</label></div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Aangenomen door" id="con_Aangenomendoor" name="con_Aangenomendoor" value="{{ (Input::old('con_Aangenomendoor')) ? Input::old('con_Aangenomendoor') : '' }}" readonly="readonly">
                            </div>

                        </div>


                          <div class="form-row">

                            <div class="col-md-2"><label>Uitvoerder:</label></div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Uitvoerder" id="Uitvoerder" name="Uitvoerder"  value="<?php echo $Contacts[0]->Firstname.' '.$Contacts[0]->Lastname; ?>" readonly="readonly">
                            </div>

                               <div class="col-md-2"><label>Aanvraagdatum :</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4">
                            		<input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Order_Date" id="Order_Date" value="<?php echo date('Y-m-d')?>"  readonly="readonly">
                            </div>

                         </div>

                            <div class="form-row">
                            <div class="col-md-2"><label>Telefoonnummer:</label><span class="text-hightlight">*</span></div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Telefoonnummer" name="phone_number" id="phone_number" value="<?php echo $Contacts[0]->Phone?>" readonly="readonly">
                            </div>
                             <div class="col-md-2"><label>Tijd:</label><span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4">
           					 <input id="timepicker1" type="text" class="form-control input-small" name="time" readonly="readonly">
                        </div>

                        </div>



                         <!--<div class="form-row">
                           <div class="col-md-2"><label>Nummer:<span class="text-hightlight">*</span></label></div>
                            <div class="col-md-4">
                            		<input type="text" class="form-control" placeholder="Nummer" name="Nummer" id="Nummer" readonly="readonly" value="AP-<?php echo $Nummer;?>">
                            </div>

                         </div>-->

                </div>

             </div>

         <div class="col-md-18">

                <div class="block">
                    <div class="header" >
                       <h2>Opdracht</h2>
                    </div>
                    <div class="content controls">

                    <div class="form-row">
                            <div class="col-md-2"><label>Begindatum:</label></div>
                            <div class="col-md-4">

                            	<input type="text" class="datepicker form-control" placeholder="Begindatum" id="Begindatum" name="Begindatum" value="<?php echo date('Y-m-d')?>">

                            </div>
                           <div class="col-md-2"><label>Begintijd:</label></div>
                            <div class="col-md-4">
                            	<input type="text" id="timepicker2" class="form-control input-small" name="Begintijd">





                            </div>
                            </div>




                             <div class="form-row">
                             <div class="col-md-2"><label>Aantal Mensen:</label></div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Aantal Mensen" name="Aantal_Mensen" id="Aantal_Mensen" value="{{ (Input::old('Aantal_Mensen')) ? Input::old('Aantal_Mensen') : '' }}">
                            </div>

                              <div class="col-md-2"><label>Hoeveel Dagen:</label></div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Hoeveel Dagen" name="Hoeveel_Dagen" id="Hoeveel_Dagen" value="{{ (Input::old('Hoeveel_Dagen')) ? Input::old('Hoeveel_Dagen') : '' }}">
                            </div>

                            </div>
                             <div class="form-row">

                                <div class="col-md-2"><label>Melden Bij:</label></div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Melden Bij" name="Melden_Bij" id="Melden_Bij" value="{{ (Input::old('Melden_Bij')) ? Input::old('Melden_Bij') : '' }}">
                            </div>

                               <div class="col-md-2"><label>Telefoonnummer:</label></div>
                            <div class="col-md-4">
                            	<input type="text" class="form-control" placeholder="Telefoonnummer" name="Telefoonnummer" id="Telefoonnummer" value="{{ (Input::old('Telefoonnummer')) ? Input::old('Telefoonnummer') : '' }}">
                            </div>


                            </div>

                            <div class="form-row">

                               <div class="col-md-2"><label>Werkzaamheden:</label></div>
                            <div class="col-md-2">
                            	<select class="form-control" placeholder="Werkzaamheden" name="Werkzaamheden" id="Werkzaamheden">
                                 <option value="">Werkzaamheden kiezen</option>
                                <option value="Handyman">Handyman</option>
                                <option value="Opruimer">Opruimer</option>
                                <option value="Schoonmaker">Schoonmaker</option>
                                <option value="Timmerman">Timmerman</option>
                                <option value="Anders">Anders</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" style="display:none;" placeholder="Anders" name="Anders" id="Anders" value="{{ (Input::old('Anders')) ? Input::old('Anders') : '' }}">
                            </div>


                            </div>

                            <div class="form-row">
                             <div class="col-md-2"><label>Benodigheden:</label></div>
                            <div class="col-md-10">
                            	 <textarea class="form-control" placeholder="Benodigheden" name="Benodigheden" id="Benodigheden">{{ (Input::old('Benodigheden')) ? Input::old('Benodigheden') : 'Standaard PBM’s en legitimatie' }}</textarea>
                            </div>
                            </div>



                            <div class="form-row">
                             <div class="col-md-2"><label>Opmerkingen:</label></div>
                            <div class="col-md-10">
                            	 <textarea class="form-control" placeholder="Opmerkingen" name="Opmerkingen" id="Opmerkingen">{{ (Input::old('Opmerkingen')) ? Input::old('Opmerkingen') : '' }}</textarea>
                            </div>
                            </div>


                  		  </div>
                 	   </div>

             </div>


        <div class="clearfix" style="height: 10px;clear: both;"></div>
        <div class="form-group">
        <div class="col-md-14" align="right">
        <button class="btn btn-primary open1" type="button" id="step2">Volgende <span class="fa fa-arrow-right"></span></button>
        </div>
        </div>
        </fieldset>
        </div>



        <div id="sf2" class="frm" style="display: none;">
        <fieldset>
        <legend>Stap 2 of 2</legend>


       	 <div class="col-md-18">

                <div class="block">
                    <div class="header" >
                       <h2>Aanvraag Personeel</h2>
                    </div>
      <table class="table table-bordered" style="text-align:left !important" >
  <thead>
    <tr style="font-size:14px;">
        <th class="left" width="15%">Project naam:</th>
      <td class="left" colspan="3"  ><span id="project_name_view" ><?php echo $Projects[0]->Name?></span></td>

      </tr>

     <tr style="font-size:14px;">
      <th class="left" width="15%">Afdeling:</th>
      <td class="left" width="20%"  ><span id="Afdeling_view" ></span></td>
       <th class="left" width="15%"  >Besteld door:</th>
      <td class="left" width="20%"><?=$current_Username ?></td>
      </tr>
      <tr>

       <th class="left" width="15%"  >Project Adres:</th>
      <td class="left" width="20%"><span id="Work_Address_view" class="left"></span></td>
      <th class="left" width="15%">Telefoonnummer:</th>
      <td class="left" width="20%"  ><span id="con_Telefoonnummer_view" class="left"></span></td>

      </tr>
      <tr>

      <th class="left" width="15%">Postcode & plaats:</th>
      <td class="left" width="20%"  ><span id="Postcode_view"></span></td>
        <th class="left" width="15%">Mobilenummer:</th>
      <td class="left" width="20%"  ><span id="con_Mobilenummer_view"></span></td>
    </tr>


     <tr>

      <th class="left" width="15%">Uitvoerder:</th>
      <td class="left" width="20%"  ><span id="Uitvoerder_view"></span></td>
          <th class="left" width="15%">Aangenomen door:</th>
      <td class="left" width="20%"  ><span id="con_Aangenomendoor_view"></span></td>
    </tr>


     <tr>

       <th class="left" width="15%">Telefoonnummer:</th>
      <td class="left" width="20%"  ><span id="phone_number_view" class="left"></span></td>
       <th class="left" width="15%"  >Aanvraagdatum:</th>
      <td class="left" width="20%"><span id="Order_Date_view"></span></th>


    <tr>

     <th class="left" width="15%">Tijd:</th>
      <td class="left" ><span id="timepicker1_view"></span></td>
    </tr>

    </tr>

  </thead>

   </table>


                </div>

             </div>

         <div class="col-md-18">

                <div class="block">
                    <div class="header" >
                       <h2>Opdracht</h2>
                    </div>
                      <table class="table table-bordered" style="text-align:left;">
  <thead>
    <tr style="font-size:14px;">
      <th class="left" width="15%">Begindatum:</th>
      <td class="left" width="20%"  ><span id="Begindatum_view"></span></td>
      <th class="left" width="15%"  >Begintijd:</th>
      <td class="left" width="20%"><span id="timepicker2_view"></span></td>
      </tr>

       <tr style="font-size:14px;">
      <th class="left" width="15%">Aantal Mensen:</th>
      <td class="left" width="20%"  ><span id="Aantal_Mensen_view"></span></td>
      <th class="left" width="15%"  >Hoeveel Dagen:</th>
      <td class="left" width="20%"><span id="Hoeveel_Dagen_view"></span></td>
      </tr>

       <tr style="font-size:14px;">


      <th class="left" width="15%"  >Melden Bij:</th>
      <td class="left" width="20%"><span id="Melden_Bij_view"></span></td>
       <th class="left" width="15%">Telefoonnummer:</th>
      <td class="left" width="20%"  ><span id="Telefoonnummer_view"></span></td>
      </tr>


       <tr style="font-size:14px;">
         <th class="left" width="15%">Werkzaamheden:</th>
      <td class="left" colspan="3"  ><span id="Werkzaamheden_view"></span> <span id="Anders_view"></span></td>


      </tr>
       <tr>
       <th class="left" width="15%">Benodigheden:</th>
      <td class="left"  colspan="3"  ><span id="Benodigheden_view" style="float:left"></span></td>
    </tr>
     <tr>
       <th class="left" width="15%">Opmerkingen:</th>
      <td class="left"  colspan="3"  ><span id="Opmerkingen_view" style="float:left"></span></td>
    </tr>


     </thead>
    </table>


                </div>

             </div>


        <div class="clearfix" style="height: 10px;clear: both;"></div>
        <div class="clearfix" style="height: 10px;clear: both;"></div>

        <div class="form-group">
        <div class="col-md-12" align="right">
        <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Terug</button>
        <input class="btn btn-primary open3" type="submit" name="submit" value="Opslaan">
        </div>
        </div>
        </fieldset>
        </div>

      </form>
	  <div>
        </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->

</div>

<script type="text/javascript">

  jQuery().ready(function() {

	  $('select#project_name').on('change', function() {
		var project_id = $('select#project_name').val();
		//alert (project_id);
		$.get("<?php echo URL:: to( 'Ajax_projectName'); ?>/" + project_id,function(data) {
		$('#project_name_view').html(data.Name);
		});
	});


	  $('#timepicker1,#timepicker2').timepicker({  defaultTime: '07:00AM' // 11:45:00 AM,
		});
	  $('.datepicker').datepicker({
		format: 'yyyy-mm-dd'
	  });



	 $('.open1').on('click', function() {
     // if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
     // }
    });

   /* $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });*/
    $('.open3').on('click', function() {
      //if (v.form()) {
        $(".frm").hide("fast");
       // $("#sf4").show("slow");
      //}
    });


    $('.back2').on('click', function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $('.back3').on('click', function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });








		$('#step2').click(function () {
		$('#Customer_Name_view').html($('#Customer_Name').val());
		$('#Afdeling_view').html($('#Afdeling').val());
		//$('#project_name_view').val(data.Name);
		$('#Work_Address_view').html($('#Work_Address').val());
		$('#Postcode_view').html($('#Postcode').val());
		$('#con_Mobilenummer_view').html($('#con_Mobilenummer').val());
		$('#con_Telefoonnummer_view').html($('#con_Telefoonnummer').val());
		$('#con_Aangenomendoor_view').html($('#con_Aangenomendoor').val());
		$('#Contact_view').html($('#Contact').val());
		$('#phone_number_view').html($('#phone_number').val());
		$('#Uitvoerder_view').html($('#Uitvoerder').val());
		$('#Order_Date_view').html($('#Order_Date').val());
		$('#timepicker1_view').html($('#timepicker1').val());
		$('#Nummer_view').html($('#Nummer').val());

		 $('#Begindatum_view').html($('#Begindatum').val());
		$('#timepicker2_view').html($('#timepicker2').val());
		$('#Aantal_Mensen_view').html($('#Aantal_Mensen').val());
        $('#Hoeveel_Dagen_view').html($('#Hoeveel_Dagen').val());
        $('#Werkzaamheden_view').html($('#Werkzaamheden').val());
        $('#Anders_view').html($('#Anders').val());
        $('#Melden_Bij_view').html($('#Melden_Bij').val());
        $('#Telefoonnummer_view').html($('#Telefoonnummer').val());
        $('#Benodigheden_view').html($('#Benodigheden').val());
        $('#Opmerkingen_view').html($('#Opmerkingen').val());




		// container Order fields
		/*$('#3m3_plaats_view').html($('#3m3_plaats').val());
		$('#3m3_Wissel_view').html($('#3m3_Wissel').val());
		$('#3m3_Afvoeromments_view').html($('#3m3_Afvoer').val());
		$('#6m3_plaats_view').html($('#6m3_plaats').val());
		$('#6m3_Wissel_view').html($('#6m3_Wissel').val());
		$('#6m3_Afvoer_view').html($('#6m3_Afvoer').val());
		$('#10m3_plaats_view').html($('#10m3_plaats').val());
		$('#10m3_Wissel_view').html($('#10m3_Wissel').val());
		$('#10m3_Afvoer_view').html($('#10m3_Afvoer').val());
		$('#10m3_plaats_dicht_view').html($('#10m3_plaats_dicht').val());
		$('#10m3_Wissel_dicht_view').html($('#10m3_Wissel_dicht').val());
		$('#10m3_Afvoer_dicht_view').html($('#10m3_Afvoer_dicht').val());
		$('#20m3_plaats_view').html($('#20m3_plaats').val());
		$('#20m3_Wissel_view').html($('#20m3_Wissel').val());
		$('#20m3_Afvoer_view').html($('#20m3_Afvoer').val());
		$('#40m3_plaats_view').html($('#40m3_plaats').val());
		$('#40m3_Wissel_view').html($('#40m3_Wissel').val());
		$('#40m3_Afvoer_view').html($('#40m3_Afvoer').val());


		$('#3m3_Bsa_view').html($('#3m3_Bsa').val());
		$('#3m3_Puin_view').html($('#3m3_Puin').val());
		$('#3m3_Hout_view').html($('#3m3_Hout').val());
		$('#3m3_Diverse_view').html($('#3m3_Diverse').val());
		$('#3m3_Plastic_Folie_view').html($('#3m3_Plastic_Folie').val());
		$('#3m3_Papier_view').html($('#3m3_Papier').val());
		$('#3m3_Opmerkingen_view').html($('#3m3_Opmerkingen').val());

		$('#6m3_Bsa_view').html($('#6m3_Bsa').val());
		$('#6m3_Puin_view').html($('#6m3_Puin').val());
		$('#6m3_Hout_view').html($('#6m3_Hout').val());
		$('#6m3_Diverse_view').html($('#6m3_Diverse').val());
		$('#6m3_Plastic_Folie_view').html($('#6m3_Plastic_Folie').val());
		$('#6m3_Papier_view').html($('#6m3_Papier').val());
		$('#6m3_Opmerkingen_view').html($('#6m3_Opmerkingen').val());

		$('#10m3_Bsa_view').html($('#10m3_Bsa').val());
		$('#10m3_Puin_view').html($('#10m3_Puin').val());
		$('#10m3_Hout_view').html($('#10m3_Hout').val());
		$('#10m3_Diverse_view').html($('#10m3_Diverse').val());
		$('#10m3_Plastic_Folie_view').html($('#10m3_Plastic_Folie').val());
		$('#10m3_Papier_view').html($('#10m3_Papier').val());
		$('#10m3_Opmerkingen_view').html($('#10m3_Opmerkingen').val());

		$('#10m3_Bsa_dicht_view').html($('#10m3_Bsa_dicht').val());
		$('#10m3_Puin_dicht_view').html($('#10m3_Puin_dicht').val());
		$('#10m3_Hout_dicht_view').html($('#10m3_Hout_dicht').val());
		$('#10m3_Diverse_dicht_view').html($('#10m3_Diverse_dicht').val());
		$('#10m3_Plastic_Folie_dicht_view').html($('#10m3_Plastic_Folie_dicht').val());
		$('#10m3_Papier_dicht_view').html($('#10m3_Papier_dicht').val());
		$('#10m3_Opmerkingen_dicht_view').html($('#10m3_Opmerkingen_dicht').val());

		$('#20m3_Bsa_view').html($('#20m3_Bsa').val());
		$('#20m3_Puin_view').html($('#20m3_Puin').val());
		$('#20m3_Hout_view').html($('#20m3_Hout').val());
		$('#20m3_Diverse_view').html($('#20m3_Diverse').val());
		$('#20m3_Plastic_Folie_view').html($('#20m3_Plastic_Folie').val());
		$('#20m3_Papier_view').html($('#20m3_Papier').val());
		$('#20m3_Opmerkingen_view').html($('#20m3_Opmerkingen').val());

		$('#40m3_Bsa_view').html($('#40m3_Bsa').val());
		$('#40m3_Puin_view').html($('#40m3_Puin').val());
		$('#40m3_Hout_view').html($('#40m3_Hout').val());
		$('#40m3_Diverse_view').html($('#40m3_Diverse').val());
		$('#40m3_Plastic_Folie_view').html($('#40m3_Plastic_Folie').val());
		$('#40m3_Papier_view').html($('#40m3_Papier').val());
		$('#40m3_Opmerkingen_view').html($('#40m3_Opmerkingen').val());*/



		});


    // validate form on keyup and submit
   var v = jQuery("#Save_OrderServices").validate({
     /* rules: {
        Gender: {
          required: true,
          minlength: 1
        },
		initials: {
          required: true,
          minlength: 2
        },
        Email: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100,
        },
        Firstname: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
         Lastname: {
          required: true,
          minlength: 6,

        },
        Birthday: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        Sofinumber: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        Startdate: {
          required: true,
          minlength: 2,
        },
        Phone: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
         Mobile: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        Id_Type: {
          required: true,
          minlength: 1
        },
        Id_Number: {
          required: true,
          minlength: 1
        },
        Id_Expirationdate: {
          required: true,
          minlength: 1
        },
        Address: {
          required: true,
          minlength: 2,
          maxlength: 100
        },
        Zipcode: {
          required: true,
          minlength: 4,
          maxlength: 15
        },
        City: {
          required: true,
          minlength: 6
        },
        Active: {
          required: true,
          minlength: 1
        },
		Employmentagency_Id: {
          required: true,
          minlength: 1
        },
        Rate: {
          required: true,
          minlength: 2,
          maxlength: 20,
        },
         Cost: {
          required: true,
          minlength: 2,
          maxlength: 15,
        },
        Employmentagencynote: {
          required: true,
          minlength: 6
        },
		 Notes: {
          required: true,
          minlength: 6
        }

      },*/
      errorElement: "span",
      errorClass: "help-inline-error",
    });



  });
</script>

@include('front/footer')
