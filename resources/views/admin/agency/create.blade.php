<!-- Header -->

    @include('admin/header')

     <title>Creëren Agency</title>

<style>

 .checker {float:right !important; }

 .error { color:#fff; }

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

 });
  </script>
     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>

                    <li class="active">Creëren Agency</li>

                </ol>

            </div>

        </div>



        <div class="row">



    @include('admin/sidebar')

    {!! Form::open(['url'=> 'admin/agency']) !!}

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



                       <h2>Uitzendbureau / ZZP'er gegevens</h2>



                    </div>

                    <div class="content controls">







                       <div class="form-row">

                            <div class="col-md-4">Naam:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Name" name="Name" value="{{ (Input::old('Name')) ? Input::old('Name') : '' }}">

                                  <span class="error">  {{ $errors->first( 'Name' , ':message' ) }}</span>

                            </div>



                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Adres:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Address" name="Address" value="{{ (Input::old('Address')) ? Input::old('Address') : '' }}"><span class="error">  {{ $errors->first( 'Address' , ':message' ) }}</span>



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


					<div class="form-row">
                            <div class="col-md-4">Actief:</div>
                           <div class="col-md-2">
                                <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" name="Active" id="Active"></div>
                                </div>

                            </div>

                            <div class="col-md-2">ZZP'er:</div>
                           <div class="col-md-2">
                                <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" name="zzp" id="zzp" value="1"></div>
                                </div>

                            </div>
                        </div>


                    </div>


                </div>

            </div>

            <div class="block">

                    <div class="header" >

                    <div class="col-md-5">

                       <h2>Extra gegevens</h2>

                    </div>

                    </div>

                    <div class="content controls">

                         <div class="form-row">

                            <div class="col-md-4">Afspraken:</div>

                            <div class="col-md-7">

                            <textarea class="form-control" rows="5" name="Notes"></textarea>

                            		<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>

                            </div>

                        </div>

                    </div>

                </div>









             </div>



      <div class="col-md-6">

               <div class="block">

                    <div class="header" >

                       <h2>Contact Informatie</h2>

                    </div>

                    <div class="content controls">

                        <div class="form-row">

                            <div class="col-md-4">Telefoon:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Phone" name="Phone" value="{{ (Input::old('Phone')) ? Input::old('Phone') : '' }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Fax:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Fax" name="Fax" value="{{ (Input::old('Fax')) ? Input::old('Fax') : '' }}"><span class="error">  {{ $errors->first( 'Fax' , ':message' ) }}</span>

                            </div>

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Email:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ (Input::old('Email')) ? Input::old('Email') : '' }}"><span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>

                            </div>

                        </div>







                        <div class="form-row">

                            <div class="col-md-4">Contactpersoon 1:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Contactpersoon 1" name="Contact1" value="{{ (Input::old('Contact1')) ? Input::old('Contact1') : '' }}"><span class="error">  {{ $errors->first( 'Contact1' , ':message' ) }}</span>

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Mobiel 1:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobile1" name="Mobile1" value="{{ (Input::old('Mobile1')) ? Input::old('Mobile1') : '' }}"><span class="error">  {{ $errors->first( 'Mobile1' , ':message' ) }}</span>

                            </div>

                        </div>







                           <div class="form-row">

                            <div class="col-md-4">Contactpersoon 2:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Contactpersoon 2" name="Contact2" value="{{ (Input::old('Contact2')) ? Input::old('Contact2') : '' }}">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Mobiel 2:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobile 2" name="Mobile2" value="{{ (Input::old('Mobile2')) ? Input::old('Mobile2') : '' }}">

                            </div>

                        </div>



                          <div class="form-row">

                            <div class="col-md-4">Contactpersoon 3:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Contactpersoon 3" name="Contact3" value="{{ (Input::old('Contact3')) ? Input::old('Contact3') : '' }}">

                            </div>

                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Mobiel 3:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" placeholder="Mobile 3" name="Mobile3" value="{{ (Input::old('Mobile3')) ? Input::old('Mobile3') : '' }}"><span class="error">  {{ $errors->first( 'Mobile3' , ':message' ) }}</span>

                            </div>

                        </div>

                    </div>

                </div>



        </div>



         <center>

       <div class="content controls">

                        <div class="form-row" style="" >



                                   <div class="col-md-3" align="center" >

                <a href="<?php echo URL:: to( 'admin/agencies' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>

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

                </div> </center>

            </div>



    {!! Form::close() !!}

  </div>

       @include('admin/footer')</div>
