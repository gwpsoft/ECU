<!-- Header -->

    @include('admin/header')

     <title>Personeel toevoegen . . . </title>

<style>

 .checker {float:right !important; }



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
       // alert('is checked');
    } else {
		$(this).val('0');
       // alert('is not checked');
    }
});




/*$('#Active').change(function () {
    var checked = (this.checked) ? true : false;
    $('#Active').prop('checked', checked);
});*/

 });
</script>
     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Home</a></li>

                    <li class="active">Creëren Personeel</li>

                </ol>

            </div>

        </div>



        <div class="row">



    @include('admin/sidebar')

    {!! Form::open(['url'=> 'admin/tblemployee']) !!}

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



                       <h2>Personal Data</h2>



                    </div>

                    <div class="content controls">

                        <div class="form-row">

                          <div class="col-md-4">Aanhef:</div>

                            <div class="col-md-7">

                            		<select class="form-control" name="Gender">

                                    <option value="">Slecteer Aanhef</option>

                                    <option value="1" {{ old('Gender') == '1' ? 'selected' : '' }}>Dhr.</option>

                                    <option value="2" {{ old('Gender') == '2' ? 'selected' : '' }}>Mevr.</option>

                                </select>

                                   <span class="error">  {{ $errors->first( 'Gender' , ':message' ) }}</span>

                            </div>

                          </div>





                       <div class="form-row">

                            <div class="col-md-4">Initialen:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Initialen" name="initials" value="{{ (Input::old('initials')) ? Input::old('initials') : '' }}">

                                  <span class="error">  {{ $errors->first( 'initials' , ':message' ) }}</span>

                            </div>



                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Voornaam:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Voornaam" name="Firstname" value="{{ (Input::old('Firstname')) ? Input::old('Firstname') : '' }}"><span class="error">  {{ $errors->first( 'Firstname' , ':message' ) }}</span>



                            </div>



                        </div>



                        <div class="form-row">

                            <div class="col-md-4">Achternaam:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Achternaam" name="Lastname" value="{{ (Input::old('Lastname')) ? Input::old('Lastname') : '' }}"><span class="error">  {{ $errors->first( 'Lastname' , ':message' ) }}</span>

                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Geboortedatum:</div>

                            <div class="col-md-7">

                          <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Birthday" value="{{ (Input::old('Birthday')) ? Input::old('Birthday') : '' }}">

                                </div>

                                <span class="error">  {{ $errors->first( 'Birthday' , ':message' ) }}</span>

                        </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Sofinummer:</div>

                            <div class="col-md-7 ">

                            		<input type="text" class="mask_ssn" placeholder="Sofinummer" name="Sofinumber" id="Sofinumber" onkeyup="ChkDup();" value="{{ (Input::old('Sofinumber')) ? Input::old('Sofinumber') : '' }}"><span class="error">  {{ $errors->first( 'Sofinumber' , ':message' ) }}</span>
								<span id="msg"></span>
                            </div>



                        </div>



                        <div class="form-row">

                            <div class="col-md-4">Datum in dienst:</div>

                            <div class="col-md-7">

                              <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                        <input type="text" class="datepicker form-control" name="Startdate" placeholder="<?=date('Y-m-d')?>" value="{{ (Input::old('Startdate')) ? Input::old('Startdate') : '' }}">

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

                            		<input type="text" class="form-control" placeholder="Telefoon" name="Phone" value="{{ (Input::old('Phone')) ? Input::old('Phone') : '' }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Mobiel:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobiel" name="Mobile" value="{{ (Input::old('Mobile')) ? Input::old('Mobile') : '' }}"><span class="error">  {{ $errors->first( 'Mobile' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Mobiel 2:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobiel 2" name="Mobile2" value="{{ (Input::old('Mobile2')) ? Input::old('Mobile2') : '' }}">

                            </div>

                        </div>







                        <div class="form-row">

                            <div class="col-md-4">Mobiel 3:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobiel 3" name="Mobile3" value="{{ (Input::old('Mobile3')) ? Input::old('Mobile3') : '' }}">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Email:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ (Input::old('Email')) ? Input::old('Email') : '' }}"><span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>

                            </div>

                        </div>

                      <div class="form-row">
                            <div class="col-md-4">Wachtwoord:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Wachtwoord" name="password" value="" >
                                    <span class="error">  {{ $errors->first( 'password' , ':message' ) }}</span>
                            </div>
                        </div>

                    </div>

                </div>

               <div class="block">

                    <div class="header" >



                       <h2>Beschikbaarheid</h2>





                    </div>

                    <div class="content controls">

                        <div class="form-row">

                            <div class="col-md-4">VCA Certificaat:</div>

                            <div class="col-md-7">

                            		 <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" checked="checked" value="1" name="VCA_Certificaat" id="Active2"></div>
                                </div>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Eigen auto:</div>

                            <div class="col-md-7">

                            		 <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" checked="checked" value="1" name="Eigen_auto" id="Active3"></div>
                                </div>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Geschikt voor:</div>

                            <div class="col-md-7">

                            		 <select class="select2" multiple="multiple" style="width: 100%;" tabindex="-1" name="Geschikt[]">
                       <?php
					   $options = array ('Opruimer','Schoonmaker','Handyman','Timmerman','ZZPer'); ?>
                    @foreach ($Functie as $CWeeks)
                      <option value="{{ $CWeeks->code }}" @if (old("Geschikt"))
                        {{ (in_array($CWeeks->code, old("Geschikt")) ? "selected":"") }}
                      @endif>{{ $CWeeks->name }}</option>
                    @endforeach
                    </select>
						<span class="error">  {{ $errors->first( 'Geschikt' , ':message' ) }}</span>
                            </div>

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

                                     <option value="">ID Type Selecteren</option>

                                    <option value="passport">Passport</option>

                                   <option value="idcard">ID Kaart</option>

                                    <option value="other">Anders</option>

                                </select>

                                 <span class="error">  {{ $errors->first( 'Id_Type' , ':message' ) }}</span>

                            </div>

                        </div>

                    <div class="form-row">

                            <div class="col-md-4">Id Nummer:</div>

                            <div class="col-md-7">



                            		<input type="text" class="form-control" placeholder="Id Nummer" name="Id_Number" value="{{ (Input::old('Id_Number')) ? Input::old('Id_Number') : '' }}"><span class="error">  {{ $errors->first( 'Id_Number' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Verloopdatum:</div>

                            <div class="col-md-7">

                             <div class="input-group">

                             <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                            		<input type="text" class="datepicker form-control" placeholder="Verloopdatum" name="Id_Expirationdate" value="{{ (Input::old('Id_Expirationdate')) ? Input::old('Id_Expirationdate') : '' }}"><span class="error">  {{ $errors->first( 'Id_Expirationdate' , ':message' ) }}</span>

                            </div>

                             </div>

                        </div>

                    <div class="form-row">

                            <div class="col-md-4">Nationaliteit:</div>

                            <div class="col-md-7">

                            		<select class="form-control" name="Nationality">

                                    <option value="">Kies nationaliteit</option>
									<?php foreach ($countries as $Country) {?>

                                    <option value="<?php echo $Country->id?>"><?php echo $Country->Name?></option>
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

                                    <label><div class="checker" ><input type="checkbox" checked="checked" value="1" name="Active" id="Active"></div></label>

                                </div>



                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Uitzendbureau:</div>

                            <div class="col-md-7">

                            		<select class="form-control" name="Employmentagency_Id">

                                    <option value="">Select Uitzendbureau</option>

                                    @foreach ($data as $agency)

                                    <option value="{!! $agency->Id!!}" {{ old('Employmentagency_Id') == $agency->Id ? 'selected' : '' }}>{!! $agency->Name!!}</option>

                                     @endforeach

                                </select>

                                <span class="error">  {{ $errors->first( 'Employmentagency_Id' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Uitzendbureau notitie:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Uitzendbureau notitie" name="Employmentagencynote" value="{{ (Input::old('Employmentagencynote')) ? Input::old('Employmentagencynote') : '' }}"><span class="error">  {{ $errors->first( 'Employmentagencynote' , ':message' ) }}</span>

                            </div>

                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Tarief p/u:</div>

                            <div class="col-md-5">

                            		<input type="text" class="form-control" placeholder="Tarief p/u" onchange="this.value=fmtFloat(this.value.replace(',','.')); " name="Rate" value="{{ (Input::old('Rate')) ? Input::old('Rate') : '' }}"><span class="error">  {{ $errors->first( 'Rate' , ':message' ) }}</span>

                            </div>

                            <div class="col-md-2">

                             €

                            </div>

                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Kosten p/u:</div>

                            <div class="col-md-5">

                            		<input type="text" class="form-control" onchange="this.value=fmtFloat(this.value.replace(',','.')); " placeholder="Kosten p/u" name="Cost" value="{{ (Input::old('Cost')) ? Input::old('Cost') : '' }}"><span class="error">  {{ $errors->first( 'Cost' , ':message' ) }}</span>

                             </div>

                             <div class="col-md-2">

                                     €

                            </div>

                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Afspraken:</div>

                            <div class="col-md-7">

                            		<textarea class="form-control" name="Notes" placeholder="Afspraken"></textarea>

                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>

                            </div>

                        </div>



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









                          <!-- <div class="col-md-6" >



                             {!! Form::reset('Cancel', ['class' => 'btn btn-primary']) !!}



                            </div>

                            <div class="col-md-6" style="float:right">

                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                            </div> -->

                    </div>

                </div>

            </div>



    {!! Form::close() !!}

  </div>

       @include('admin/footer')</div>



<script>

function ChkDup () {


	var Sofinumber = $('#Sofinumber').val();

	$.get('<?php echo URL:: to( 'admin/ChkDupl_Sofinumber'); ?>?Sofinumber=' + Sofinumber,function(data) {

	if (data != 'success') {

		$('.btn-success').attr('disabled',true);
		$('#msg').html(data);
	} else {
		$('.btn-success').attr('disabled',false);
		$('#msg').html('');
	}




	});

}
</script>
