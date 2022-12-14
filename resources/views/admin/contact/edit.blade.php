<!-- Header -->
    @include('admin/header')
     <title>Contact Bewerken</title>  
     
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
     
     
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                     <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Contact Bewerken</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/update_contact','autocomplete' => 'off']) !!}
         <input type="hidden" name="id" value="{{$Get_Contact->Id}}" />
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
                    
                       <h2>Contact gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Aanhef:</div>
                            <div class="col-md-4"> 
                            <select class="form-control" name="Gender">
                            <option value="0" <?php if ($Get_Contact->Gender == '0') {?> selected="selected"  <?php }?>>Select Aanhef</option>
                            <option value="1" <?php if ($Get_Contact->Gender == '1') {?> selected="selected"  <?php }?>>Dhr.</option>
                            <option value="2" <?php if ($Get_Contact->Gender == '2') {?> selected="selected"  <?php }?>>Mevr.</option>
                            </select>
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Initialen:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Initialen" name="Initials" value="{{ $Get_Contact->Initials }}">
                                  <span class="error">  {{ $errors->first( 'Initials' , ':message' ) }}</span>
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Voornaam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Voornaam" name="Firstname" value="{{ $Get_Contact->Firstname }}"><span class="error">  {{ $errors->first( 'Firstname' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Achternaam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Achternaam" name="Lastname" value="{{ $Get_Contact->Lastname }}"><span class="error">  {{ $errors->first( 'Lastname' , ':message' ) }}</span>
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7"> 
                         
                                	<select class="form-control" name="Department_Id">
                                    <option value="">Select Department</option>
                                  @foreach ($department as $agency)
                                    <option value="{!! $agency->Id!!}" <?php if ($agency->Id == $Get_Contact->Department_Id){?> selected="selected" <?php }?>>{!! $agency->Name!!}</option> 
                                    @endforeach                             
                                </select>
                             
                                <span class="error">  {{ $errors->first( 'Department_Id' , ':message' ) }}</span>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Functie:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Functie" name="Jobtitle" value="{{ $Get_Contact->Jobtitle }}"><span class="error">  {{ $errors->first( 'Jobtitle' , ':message' ) }}</span>
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Actief:</div>
                           <div class="col-md-7">                              
                                <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" >
                                    <input type="checkbox" <?php if ($Get_Contact->Active == 1){?> checked="checked" <?php }?>  value="1" name="active" id="Active"></div>
                                </div>                                
                                                            
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
                            <div class="col-md-4">Afspraken:</div>
                            <div class="col-md-7"> 
                            		<textarea class="form-control" name="Notes" placeholder="Afspraken">{{ $Get_Contact->Notes }}</textarea>
                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>                           
                        </div>
                                             
                    </div>
                </div> 
                    <!--<div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                            <div class="col-md-6" > 
                             <a href="<?php echo URL:: to( 'admin/contacts' ); ?>" class="btn btn-primary" style="width:100%">Cancel</a>
                            		
                            </div>              
                            <div class="col-md-6" style="float:right">
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                            </div>                                                
                    </div>
                </div>-->
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
                            		<input type="text" class="form-control" placeholder="telefoon" name="Phone" value="{{ $Get_Contact->Phone }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>
                            </div>                           
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Prive Telefoon:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Prive telefoon" name="Phone_Private" value="{{  $Get_Contact->Phone_Private }}"><span class="error">  {{ $errors->first( 'Phone_Private' , ':message' ) }}</span>
                            </div>                           
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Mobiel" name="Mobile" value="{{ $Get_Contact->Mobile }}"><span class="error">  {{ $errors->first( 'Mobile' , ':message' ) }}</span>
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Mobiel 2:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Mobiel 2" name="Mobile2" value="{{ $Get_Contact->Mobile2 }}">
                            </div>                           
                        </div> 
                        
                        <div class="form-row">
                            <div class="col-md-4">Mobiel 3:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Mobiel 3" name="Mobile3" value="{{ $Get_Contact->Mobile3}}">
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Fax" name="Fax" value="{{ $Get_Contact->Fax }}">
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ $Get_Contact->Email }}">
                                    <span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Wachtwoord:</div>
                            <div class="col-md-7"> 
                           
                            	<input type="text" class="form-control" placeholder="Wachtwoord" name="password" value="<?php echo @$Password[0]->txt_password;?>">
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
                               
                                    
        </div>  
       <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                             <div class="col-md-3" align="center" > 
                <a href="<?php echo URL:: to( 'admin/contacts' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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
       @include('admin/footer')</div>  