<!-- Header -->

    @include('admin/header')

     <title>Bewerk Personeel</title>

<style>

 .checker {float:right !important; }

 .error { color:red; }

</style>

<script>

function ChkDup () {


	var Sofinumber = $('#Sofinumber').val();
	var id = $('#id').val();

	$.get('<?php echo URL:: to( 'admin/ChkDupl_Sofinumber'); ?>?Sofinumber=' + Sofinumber+'&id='+id,function(data) {
	if (data != 'success') {

		$('.btn-success').attr('disabled',true);
		$('#msg').html(data);
	} else {
		$('.btn-success').attr('disabled',false);
		$('#msg').html('');
	}
	});

}

function fmtFloat(num) {

    if (num) {

        num = num.toString().replace(/\$|\,/g,'');

        if(isNaN(num)) {

            num = "0";

        }

        sign = (num == (num = Math.abs(num)));

        num = Math.floor(num*100+0.50000000001);

        cents = num%100;

        num = Math.floor(num/100).toString();

        if(cents<10) {

            cents = "0" + cents;

        }

        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++) {

            num = num.substring(0,num.length-(4*i+3))+''+ num.substring(num.length-(4*i+3));

        }

        return (((sign)?'':'-') + num + '.' + cents);

    } else {

        return 0;

    }

}

  $(document).ready(function(){


$('#Active').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
    } else {
		$(this).val('0');
    }
});


$('#Active2').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
    } else {
		$(this).val('0');
    }
});


$('#Active3').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
    } else {
		$(this).val('0');
    }
});






 });
</script>
     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Home</a></li>

                    <li class="active">Bewerk Personeel</li>

                </ol>

            </div>

        </div>



        <div class="row">



    @include('admin/sidebar')

    {!! Form::open(['url'=> 'admin/update_employee', 'files' => true]) !!}





   <!-- {!! Form::open(['url'=> 'edit_employee/$Get_Employee->id']) !!}-->

   <div class="col-md-12">



   @if (Session::has('message'))

   <div class="alert alert-success">

                        <b>Success!</b> {{Session::get('message')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif

   <input type="hidden" name="id" id="id" value="{{$Get_Employee->id}}" />

   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />



    <div class="col-md-6">



                <div class="block">

                    <div class="header" >



                       <h2>Persoonlijke gegevens</h2>



                    </div>

                    <div class="content controls">

                        <div class="form-row">

                          <div class="col-md-4">Aanhef:</div>

                            <div class="col-md-7">

                            		<select class="form-control" name="Gender">

                    <option value="0" <?php if ($Get_Employee->Gender == 0) { ?> selected="selected" <?php } ?>>Slecteer Aanhef</option>

                    <option value="1" <?php if ($Get_Employee->Gender == 1) { ?> selected="selected" <?php } ?>>Dhr.</option>

                    <option value="2"  <?php if ($Get_Employee->Gender == 2) { ?> selected="selected" <?php } ?>>Mevr.</option>

                                </select>

                                 <span class="error">  {{ $errors->first( 'Gender' , ':message' ) }}</span>

                            </div>

                          </div>





                       <div class="form-row">

                            <div class="col-md-4">Initialen:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Initialen" name="initials" value="{{ $Get_Employee->Initials }}">

                                  <span class="error">  {{ $errors->first( 'initials' , ':message' ) }}</span>

                            </div>



                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Voornaam:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Voornaam" name="Firstname" value="{{ $Get_Employee->Firstname }}"><span class="error">  {{ $errors->first( 'Firstname' , ':message' ) }}</span>



                            </div>



                        </div>



                        <div class="form-row">

                            <div class="col-md-4">Achternaam:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Achternaam" name="Lastname" value="{{ $Get_Employee->Lastname }}"><span class="error">  {{ $errors->first( 'Lastname' , ':message' ) }}</span>

                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Geboortedatum:</div>

                            <div class="col-md-7">

                          <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Birthday" value="{{ $Get_Employee->Birthday }}">

                                </div>

                                <span class="error">  {{ $errors->first( 'Birthday' , ':message' ) }}</span>

                        </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">BSN nummer:</div>

                            <div class="col-md-7">

                            		<input type="text" class="mask_ssn" placeholder="Sofinummer" id="Sofinumber" name="Sofinumber" onkeyup="ChkDup();" value="{{ $Get_Employee->Sofinumber }}"><span class="error">  {{ $errors->first( 'Sofinumber' , ':message' ) }}</span>
									<span id="msg"></span>
                            </div>



                        </div>



                        <div class="form-row">

                            <div class="col-md-4">Datum in dienst:</div>

                            <div class="col-md-7">

                              <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                        <input type="text" class="datepicker form-control" name="Startdate" placeholder="<?=date('Y-m-d')?>" value="{{  $Get_Employee->Startdate }}">

                            </div>

                            <span class="error">  {{ $errors->first( 'Startdate' , ':message' ) }}</span>

                        </div>

                        </div>

                </div>

            </div>

                <div class="block">

                    <div class="header" >



                       <h2>Contact Informatie</h2>





                    </div>

                    <div class="content controls">

                        <div class="form-row">

                            <div class="col-md-4">Telefoon:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Telefoon" name="Phone" value="{{ $Get_Employee->Phone }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Mobiel:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobiel" name="Mobile" value="{{ $Get_Employee->Mobile }}"><span class="error">  {{ $errors->first( 'Mobile' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Mobiel 2:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobiel 2" name="Mobile2" value="{{$Get_Employee->Mobile2 }}">

                            </div>

                        </div>







                        <div class="form-row">

                            <div class="col-md-4">Mobiel 3:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobiel 3" name="Mobile3" value="{{ $Get_Employee->Mobile3 }}">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Email:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ $Get_Employee->Email }}"><span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>

                            </div>

                        </div>

                       <div class="form-row">
                            <div class="col-md-4">Wachtwoord:</div>
                            <div class="col-md-7">

                            	<input type="text" class="form-control" placeholder="Wachtwoord" name="password" value="<?php echo @$Password->txt_password;?>">
                                    <span class="error">  {{ $errors->first( 'password' , ':message' ) }}</span>
                            </div>
                        </div>

                        <div class="form-row">
                          <div class="col-md-6">&nbsp;</div>
                         <div class="col-md-6" align="center">
                {!! Form::submit('Login via E-mail verzenden', ['class' => 'btn btn-success','name' => 'SendEmail']) !!}
                </div>
                </div>
                    </div>

                </div>

{{-- Place bug code below  --}}

<div class="block">

  <div class="header" >



    <h2>Beschikbaarheid</h2>





  </div>

  <div class="content controls">

    <div class="form-row">

      <div class="col-md-4">VCA Certificaat:</div>

      <div class="col-md-7">

        <div class="checkbox-inline">
          &nbsp;&nbsp;<div class="checker" ><input type="checkbox" <?php if ($Get_Employee->VCA_Certificaat == 1) {?>checked="checked" <?php } ?> value="1" name="VCA_Certificaat" id="Active2"></div>
        </div>

      </div>

    </div>

    <div class="form-row">

      <div class="col-md-4">Eigen auto:</div>

      <div class="col-md-7">

        <div class="checkbox-inline">
          &nbsp;&nbsp;<div class="checker" ><input type="checkbox" <?php if ($Get_Employee->Eigen_auto == 1) {?>checked="checked" <?php } ?> value="1" name="Eigen_auto" id="Active3"></div>
        </div>

      </div>

    </div>

    <div class="form-row">

      <div class="col-md-4">Geschikt voor:</div>

      <div class="col-md-7">

        <select class="select2" multiple="multiple" style="width: 100%;" tabindex="-1" name="Geschikt[]">
          <?php

          $Aan = explode (',',$Get_Employee->Geschikt);

          $options = array ('Opruimer','Schoonmaker','Handyman','Timmerman','ZZPer');
          foreach ($Functie as $CWeeks) { ?>
            <option value="<?php echo $CWeeks->code;?>" <?php if (in_array($CWeeks->code,$Aan)) { ?> selected="selected" <?php } ?>><?php echo $CWeeks->name;?></option>
            <?php } ?>
          </select>
          <span class="error">  {{ $errors->first( 'Geschikt' , ':message' ) }}</span>
        </div>

      </div>


    </div>

  </div>

{{-- Place bug code above --}}

			<div class="block">

                    <div class="header" >



                       <h2>Foto van de werknemer</h2>





                    </div>

                    <div class="content controls">




                        <div class="form-row">
							<?php if (!empty($Get_Employee->Image)) { ?>
                             <div class="col-md-4">&nbsp;</div>


                              <div class="gallery">
                              <a class="fancybox" rel="group"
                                href="{{  URL::asset('uploads/employee/'.$Get_Employee->Image) }}">
                             <img src="{{ URL::asset('uploads/employee/thumbs/'.$Get_Employee->Image) }}" class="img-thumbnail" style="margin-bottom:10px;" />
                             </a></div>

                            <?php } ?>

                            <div class="col-md-4">Afbeelding uploaden:</div>
                            <div class="col-md-7">
                            <div class="input-group file">
                                    <input type="text" class="form-control"/>
                                    <input type="file" name="Image"/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button" title="uploaden">Browsen</button>
                                    </span>
                                </div>
                                  <span class="error">  {{ $errors->first( 'Image' , ':message' ) }}</span>
                            </div>


                        </div>


                        <div class="col-md-9">&nbsp;</div>

                         <div class="col-md-3" align="center">

                {!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}

                </div>



                    </div>

                </div>
             </div>



      <div class="col-md-6">



                <div class="block">

                    <div class="header" >

                    <div class="col-md-5">

                       <h2>ID Informatie</h2>

                    </div>

                    </div>

                    <div class="content controls">

                        <div class="form-row">

                            <div class="col-md-4">Id Type:</div>

                            <div class="col-md-7">

                            		<select class="form-control" name="Id_Type">


    <option value="" <?php if ($Get_Employee->Id_Type == "") { ?> selected="selected" <?php } ?>>ID Type Selecteren</option>
    <option value="passport" <?php if ($Get_Employee->Id_Type == "passport") { ?> selected="selected" <?php } ?>>Passport</option>
    <option value="idcard" <?php if ($Get_Employee->Id_Type == "idcard") { ?> selected="selected" <?php } ?>>ID Kaart</option>
    <option value="other" <?php if ($Get_Employee->Id_Type == "other") { ?> selected="selected" <?php } ?>>Anders</option>

                                </select>

                                <span class="error">  {{ $errors->first( 'Id_Type' , ':message' ) }}</span>

                            </div>

                        </div>

                    <div class="form-row">

                            <div class="col-md-4">Id Nummer:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Id Nummer" name="Id_Number" value="{{  $Get_Employee->Id_Number }}"><span class="error">  {{ $errors->first( 'Id_Number' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Verloopdatum:</div>

                            <div class="col-md-7">

                             <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                            		<input type="text" class="form-control datepicker" placeholder="Verloopdatum" name="Id_Expirationdate" value="{{  $Get_Employee->Id_Expirationdate }}"><span class="error">  {{ $errors->first( 'Id_Expirationdate' , ':message' ) }}</span>

                            </div>   </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Nationaliteit:</div>

                            <div class="col-md-7">

                            		<select class="form-control" name="Nationality">

                                    <option value="">Kies nationaliteit</option>
									<?php foreach ($countries as $Country) {?>

                                    <option value="<?php echo $Country->id?>" <?php if ($Get_Employee->Nationality == $Country->id) {?> selected="selected" <?php } ?>><?php echo $Country->Name?></option>
									<?php } ?>
                                </select>

                                 <span class="error">  {{ $errors->first( 'Id_Type' , ':message' ) }}</span>

                            </div>

                        </div>

                    </div>

                </div>

          <div class="block">

                    <div class="header" >

                    <div class="col-md-5">

                       <h2>Adres gegevens</h2>

                    </div>



                    </div>

                    <div class="content controls">

                        <div class="form-row">

                            <div class="col-md-4">Adres:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Adres" name="Address" value="{{ $Get_Employee->Address }}"><span class="error">  {{ $errors->first( 'Address' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Postcode:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Postcode" name="Zipcode" value="{{ $Get_Employee->Zipcode }}"><span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Stad:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Stad" name="City" value="{{ $Get_Employee->City }}"><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span>

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

                            <div class="col-md-5">Actief:</div>

                           <div class="col-md-7">

                                <div class="checkbox-inline">

                                    <label><div class="checker" ><input type="checkbox" <?php if ($Get_Employee->Active == 1) {?>checked="checked" <?php } ?> value="1" name="Active" id="Active"></div></label>

                                </div>



                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Uitzendbureau:</div>

                            <div class="col-md-7">

                            		<select class="form-control" name="Employmentagency_Id">

                                    <option value="">Select Uitzendbureau</option>

                                    @foreach ($data as $agency)

                                     <option value="<?php echo $agency->Id ;?>" <?php if ($Get_Employee->Employmentagency_Id == $agency->Id) { ?> selected="selected" <?php } ?>  >{!! $agency->Name!!}</option>

                                     @endforeach

                                </select>

                                <span class="error">  {{ $errors->first( 'Employmentagency_Id' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Uitzendbureau notitie:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Uitzendbureau notitie" name="Employmentagencynote" value="{{ $Get_Employee->Employmentagencynote }}"><span class="error">  {{ $errors->first( 'Employmentagencynote' , ':message' ) }}</span>

                            </div>

                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Tarief p/u:</div>

                            <div class="col-md-5">

                            		<input type="text" class="form-control" placeholder="Tarief p/u" onchange="this.value=fmtFloat(this.value.replace(',','.')); " name="Rate" value="{{ $Get_Employee->Rate }}"><span class="error">  {{ $errors->first( 'Rate' , ':message' ) }}</span>

                            </div>

                            <div class="col-md-2">

                             €

                            </div>

                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Kosten p/u:</div>

                            <div class="col-md-5">

                            		<input type="text" class="form-control" placeholder="Kosten p/u" onchange="this.value=fmtFloat(this.value.replace(',','.')); " name="Cost" value="{{ $Get_Employee->Cost }}"><span class="error">  {{ $errors->first( 'Cost' , ':message' ) }}</span>

                             </div>

                             <div class="col-md-2">

                                     €

                            </div>

                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Afspraken:</div>

                            <div class="col-md-7">

                            		<textarea class="form-control" name="Notes" placeholder="Afspraken">{{$Get_Employee->Notes}}</textarea>

                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>

                            </div>

                        </div>



                    </div>











                </div>


<div class="block">

                    <div class="header" >


     <a data-toggle="modal" class="btn btn-success" href="#modal_default_3" title="Toevoegen" style="float:right;">Document Uploaden</a>




                       <h2>Documenten van de werknemer</h2>

                    </div>

                    <div class="content">


                     <table class="table table-bordered table-striped no-footer" width="100%">
                     <tr>
                     <th>Document Type</th>
                     <th>Vervaldatum</th>
                     <th>Downloaden</th>
                     <th>Opties</th>
                     </tr>
                     <?php
					 if (!empty($Documents)) {
					 foreach ($Documents as $Doc ) { ?>
                     <tr>
                     <td><?php echo $Doc->DocType?></td>
                     <td><?php echo $Doc->ExpiryDate?></td>
                     <td><?php $ext = pathinfo($Doc->File, PATHINFO_EXTENSION);
					 if ($ext == 'jpg') { ?>
                     <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/jpg.png') }}" style=" cursor:pointer; width:32px; height:32px;"></a> <?php }
					 if ($ext == 'png') { ?>  <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img class=" " src="{{ URL::asset('assets/img/icons/png.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a>
					 <?php } if ($ext == 'xls') { ?>
                     <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img src="{{ URL::asset('assets/img/icons/xls.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a>
                     <?php } if ($ext == 'pdf') { ?>
                      <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/pdf.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a>
                      <?php } if ($ext == 'docx' || $ext == 'doc') { ?>
                      <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/docx.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a>
                      <?php }?>

                      </td>
                      <td>
                      <a href="javascript:void(0)" onclick="getdocinfo('<?php echo $Doc->id; ?>');" title="Bewerken" class="widget-icon" ><span class="icon-pencil"></span></a>
                      <a href="<?php echo URL:: to( 'admin/DeleteEmployeeDoc',$Doc->id ); ?>" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a></td>
                     </tr>
                     <?php } } else {?>

                     <tr>
                     <td colspan="4" align="center"> Geen bestand gevonden...!</td>
                     </tr>
                     <?php } ?>
                     </table>





                    </div>

                </div>

                <div class="block">
                  <div class="header">
                    <a title="Werkgeschiedenisdetails" href="{{ url('admin/employeeWorkHistory/'. $id .'?starting='.$starting.'&&ending='.$ending) }}">
                      <img class=" " src="{{ URL::asset('assets/img/icons/view-detail.png') }}" id="pdf" style=" cursor:pointer; float:right">
                    </a>
                    <h2>Werk geschiedenis</h2>
                  </div>
                </div>


        </div>

       <div class="content controls">

                        <div class="form-row" style="float:right" >



                             <div class="col-md-3" align="center" >

                <a href="<?php echo URL:: to( 'admin/employees' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>

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
<div class="modal modal-info" id="modal_default_4"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Document Bewerken</h4>
                </div>
				<form method="post" action="<?php echo URL:: to( 'admin/updateDocument' ); ?>" enctype="multipart/form-data">
                <div class="modal-body clearfix">
                    <div class="block">


	<input type="hidden" name="doc_id" id="doc_id" />
    <input type="hidden" name="emp_id" id="emp_id" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                      <div class="form-row">
                          <div class="col-md-4">Document Type:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Document Type" name="Doc_Type" id="Doc_Type">
                                 <span class="error">  {{ $errors->first( 'Doc_Type' , ':message' ) }}</span>
                            </div>

                          </div>

<div class="form-row">

                            <div class="col-md-4">Vervaldatum:</div>

                            <div class="col-md-7">

                              <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                        <input type="text" class="datepicker form-control" name="Exp_date" placeholder="<?=date('Y-m-d')?>" id="Exp_date">

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



<div class="modal  modal-info" id="modal_default_3"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Document Uploaden</h4>

                </div>
				<form method="post" action="<?php echo URL:: to( 'admin/uploadDocument' ); ?>"  enctype="multipart/form-data">


                <div class="modal-body clearfix">



                    <div class="block">



    <input type="hidden" name="emp_id" value="{{$Get_Employee->id}}" />

   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />


                      <div class="form-row">

                          <div class="col-md-4">Document Type:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Document Type" name="Doc_Type">

                                 <span class="error">  {{ $errors->first( 'Doc_Type' , ':message' ) }}</span>
                            </div>

                          </div>

<div class="form-row">

                            <div class="col-md-4">Vervaldatum:</div>

                            <div class="col-md-7">

                              <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                        <input type="text" class="datepicker form-control" name="Exp_date" placeholder="<?=date('Y-m-d')?>">

                            </div>

                            <span class="error">  {{ $errors->first( 'Exp_date' , ':message' ) }}</span>

                        </div>

                        </div>


 </div>
<div class="form-row">


                            <div class="col-md-4">Document uploaden:</div>
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







<script>

function getdocinfo (id) {


	$.get('<?php echo URL:: to( '/' ); ?>/AjaxDocument?id=' + id,function(data) {

			 $('#Exp_date').val(data.ExpiryDate);
			 $('#Doc_Type').val(data.DocType);
			 $('#emp_id').val(data.emp_id);
			 $('#doc_id').val(id);
			$('#modal_default_4').modal('show');
		});


	}



$(document).ready(function() {

	});

</script>

       @include('admin/footer')</div>
