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
    

    

    

    

     

    {!! Form::open(['url'=> 'admin/employee/email']) !!}

    
    <input type="hidden" name="Email" value="<?php echo $EmailData['Email']?>" />

    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />-->
     
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
    
    <p>U kunt ECU App downloaden van Google Play Store voor Android telefoons: <a class="url" href="https://goo.gl/v28KXq" target="_blank">ECU App downloaden</a></p>
    
        
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