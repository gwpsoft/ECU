<!-- Header -->
    @include('admin/header')
     <title>Creëren Contact</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                     <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Creëren Contact</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/contact','autocomplete' => 'off']) !!}
   <div class="col-md-12">
  @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
  <!--@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
     <b>Error!</b>  <br />
   @foreach ($errors->all() as $error)
  {{$error}}<br />
   @endforeach   
   </div>
   @endif-->
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
                                    <option value="">Select Aanhef</option>
                                    <option value="1">Dhr.</option>
                                    <option value="2">Mevr.</option>                                   
                                </select>
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Initialen:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Initialen" name="Initials" value="{{ (Input::old('Initials')) ? Input::old('Initials') : '' }}">
                                  <span class="error">  {{ $errors->first( 'Initials' , ':message' ) }}</span>
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
                            <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7">                          
                                	<select class="form-control" name="Department_Id">
                                    <option value="">Select Department</option>
                                  @foreach ($department as $agency)
                                  <option value="{!! $agency->Id!!}" <?php if (@$DepartmentID == $agency->Id) { ?> selected="selected" <?php } ?>>{!! $agency->Name!!}</option> 
                                    @endforeach                             
                                </select>
                             
                                <span class="error">  {{ $errors->first( 'Department_Id' , ':message' ) }}</span>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Functie:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Functie" name="Jobtitle" value="{{ (Input::old('Jobtitle')) ? Input::old('Jobtitle') : '' }}"><span class="error">  {{ $errors->first( 'Jobtitle' , ':message' ) }}</span>
                            </div>
                        
                        </div>
                        
                          <div class="form-row">
                            <div class="col-md-4">Actief:</div>
                           <div class="col-md-7">                              
                                <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" checked="checked" value="1" name="active" id="Active"></div>
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
                            		<textarea class="form-control" name="Notes" placeholder="Afspraken"></textarea>
                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>                           
                        </div>
                                             
                    </div>
                </div> 
                    <!--<div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                            <div class="col-md-6" > 
                             {!! Form::reset('Cancel', ['class' => 'btn btn-primary']) !!}
                            		
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
                            		<input type="text" class="form-control" placeholder="telefoon" name="Phone" value="{{ (Input::old('Phone')) ? Input::old('Phone') : '' }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>
                            </div>                           
                        </div>
                        
                        
                           <div class="form-row">
                            <div class="col-md-4">Prive telefoon:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Prive telefoon" name="Phone_Private" value="{{ (Input::old('Phone_Private')) ? Input::old('Phone_Private') : '' }}"><span class="error">  {{ $errors->first( 'Phone_Private' , ':message' ) }}</span>
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
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Fax" name="Fax" value="{{ (Input::old('Fax')) ? Input::old('Fax') : '' }}">
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