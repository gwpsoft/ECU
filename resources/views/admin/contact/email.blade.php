<!-- Header -->

    @include('admin/header')

     <title>Weekstaat via e-mail verzenden . . . </title>
 <script type='text/javascript' src='js/plugins/tinymce/tinymce.min.js'></script>
<style>

 .checker {float:right !important; }

 .error { color:#fff; }

</style>

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Home</a></li>

                    <li class="active">Werkbonnen mailen naar</li>

                </ol>

            </div>

        </div>



        <div class="row">

    @include('admin/sidebar')

     <div class="col-md-12">

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

    {!! Form::open(['url'=> 'admin/contact/email']) !!}


    <input type="hidden" name="Email" value="<?php echo $EmailData['Email']?>" />
    <input type="hidden" name="id" value="<?php echo $EmailData['id']?>" />

    <input type="hidden" name="Firstname" value="<?php echo $EmailData['Firstname']?>" />
    <input type="hidden" name="Lastname" value="<?php echo $EmailData['Lastname']?>" />
    <input type="hidden" name="Password" value="<?php echo $EmailData['Password']?>" />
    <input type="hidden" name="Mobile" value="<?php echo $EmailData['Mobile']?>" />



     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

       <div class="col-md-6">

          <div class="block">

                    <div class="header" >

                       <h2>Inhoud van de mail </h2>

                    </div>

                    <div class="content controls">

               <div class="form-row">

                            <div class="col-md-12">
									 <div class="content np">

                            <textarea class="cle" name="Text">

    <p>Geachte  <?=@$EmailData['Firstname'].' '.@$EmailData['Lastname']?>,</p>
    <br />


    <p>Hierbij sturen wij u de login gegevens van Easy Clean Up online systeem.</p>

    <p>Web adres: <a href="https://app.easycleanup.nl" target="_blank" class="url">https://app.easycleanup.nl</a></p>

    <p>U kunt ECU App downloaden van Google Play Store voor Android telefoons: <a class="url" href="https://goo.gl/v28KXq" title="ECU App downloaden" target="_blank">
    ECU App downloaden
    </a></p>

     <p>
    U kunt ECU App downloaden van Apple Store voor iPhone: <a class="url" href="https://itunes.apple.com/nl/app/easy-clean-up/id1377341447?mt=8_____" title="ECU App downloaden" target="_blank">ECU App downloaden</a><br><br>
    </p>

    <p>
    <a class="url" href="https://goo.gl/v28KXq" title="ECU App downloaden" target="_blank">
    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/googleplay.png') }}" style="width:150px; height:46px;">
    </a>
    <a class="url" href="https://itunes.apple.com/nl/app/easy-clean-up/id1377341447?mt=8_____" title="ECU App downloaden" target="_blank">
    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/img/icons/iphone.png') }}" style="width:150px; height:46px;">
    </a>
    </p>

    <p>Gebruikersnaam: <?php echo $EmailData['Email']?></p>
    <p>Wachtwoord: <?php echo $EmailData['Password']?></p>


    <p>Met vriendelijke groet,</p>


    <p>Easy Clean Up B.V.</p>



                            </textarea>
								</div>
                            </div>

                        </div>

            </div>

          </div>

           <div class="content controls">

                        <div class="form-row">


							<a href="<?php echo URL:: to( 'admin/edit_contact/'.$EmailData['id'] ); ?>" class="btn btn-info col-md-6">Annuleren</a>

                            <div class="col-md-6">

                            {!! Form::submit('Verzenden', ['class' => 'btn btn-success']) !!}

                            </div>

                    </div>

                     <br />

                </div>

      </div>









          </div>



            </div>



    {!! Form::close() !!}



       @include('admin/footer')</div>
