<!-- Header -->
    @include('admin/header')
     <title>Bewerk Project Manager</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Bewerk Project Manager</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/update_project_manager']) !!}
   <div class="col-md-12">
 
 
    <input type="hidden" name="id" value="{{$Get_Projectmanager->Id}}" />
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
    <option value="0" <?php if ($Get_Projectmanager->Gender == 0) { ?> selected="selected" <?php } ?>>Select Salutation</option>
    <option value="1" <?php if ($Get_Projectmanager->Gender == 1) { ?> selected="selected" <?php } ?>>Mr.</option>
    <option value="2"  <?php if ($Get_Projectmanager->Gender == 2) { ?> selected="selected" <?php } ?>>Mrs.</option>                               
                                </select>
                                <span class="error">  {{ $errors->first( 'Gender' , ':message' ) }}</span>
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Initialen:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="initials" name="Initials" value="{{ $Get_Projectmanager->Initials }}">
                                  <span class="error">  {{ $errors->first( 'Initials' , ':message' ) }}</span>
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Voornaam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="First Name" name="Firstname" value="{{ $Get_Projectmanager->Firstname  }}"><span class="error">  {{ $errors->first( 'Firstname' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Achternaam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Last name" name="Lastname" value="{{ $Get_Projectmanager->Lastname  }}"><span class="error">  {{ $errors->first( 'Lastname' , ':message' ) }}</span>
                            </div>
                        
                        </div>
                     
                </div>         
            </div>
           <!--<div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                            <div class="col-md-6" > 
                            <a href="<?php echo URL:: to( 'admin/projectmanager' ); ?>" class="btn btn-primary" style="width:100%">Terug</a>                           		
                            </div>              
                            <div class="col-md-6" style="float:right">
                            {!! Form::submit('Bijwerken', ['class' => 'btn btn-success']) !!}
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
                            		<input type="text" class="form-control" placeholder="Phone" name="Phone" value="{{ $Get_Projectmanager->Phone }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Mobiel" name="Mobile" value="{{ $Get_Projectmanager->Mobile }}"><span class="error">  {{ $errors->first( 'Mobile' , ':message' ) }}</span>
                            </div>                           
                        </div> 
                                                  
                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ $Get_Projectmanager->Email }}"><span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>
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
                            		<textarea class="form-control" name="Notes" placeholder="Afspraken">{{ $Get_Projectmanager->Notes }}</textarea>
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