<!-- Header -->
    @include('admin/header')
     <title>Creëren Project Manager</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Creëren Project Manager</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/projectmanagers']) !!}
   <div class="col-md-12">
 
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
                    
                       <h2>Persoonlijke data</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Aanhef:</div>
                            <div class="col-md-4"> 
                            		<select class="form-control" name="Gender">
                                    <option value="">Select Salutation</option>
                                    <option value="1">Mr.</option>
                                    <option value="2">Mrs.</option>                                   
                                </select>
                                <span class="error">  {{ $errors->first( 'Gender' , ':message' ) }}</span>
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Initialen:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="initials" name="Initials" value="{{ (Input::old('Initials')) ? Input::old('Initials') : '' }}">
                                  <span class="error">  {{ $errors->first( 'Initials' , ':message' ) }}</span>
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Voornaam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="First Name" name="Firstname" value="{{ (Input::old('Firstname')) ? Input::old('Firstname') : '' }}"><span class="error">  {{ $errors->first( 'Firstname' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Achternaam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Last name" name="Lastname" value="{{ (Input::old('Lastname')) ? Input::old('Lastname') : '' }}"><span class="error">  {{ $errors->first( 'Lastname' , ':message' ) }}</span>
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
                            		<input type="text" class="form-control" placeholder="Phone" name="Phone" value="{{ (Input::old('Phone')) ? Input::old('Phone') : '' }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Mobiel" name="Mobile" value="{{ (Input::old('Mobile')) ? Input::old('Mobile') : '' }}"><span class="error">  {{ $errors->first( 'Mobile' , ':message' ) }}</span>
                            </div>                           
                        </div> 
                                                  
                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ (Input::old('Email')) ? Input::old('Email') : '' }}"><span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>
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
                            <div class="col-md-4">Afspraken:</div>
                            <div class="col-md-7"> 
                            		<textarea class="form-control" name="Notes" placeholder="Afspraken"></textarea>
                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>                           
                        </div>
                                                
                    </div>
                </div>
                
                    
             </div>
               <div class="col-md-3" align="center" > 
                <a href="<?php echo URL:: to( 'admin/projectmanager' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  