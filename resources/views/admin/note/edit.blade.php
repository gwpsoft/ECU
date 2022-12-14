<!-- Header -->
    @include('admin/header')
     <title>Creëren Notitie</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                   
                    <li class="active">Creëren Notitie</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/update_note']) !!}
    <input type="hidden" name="id" value="{{$Get_Note->Id}}" />
   <div class="col-md-12">
@if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-8">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Persoonlijke data</h2>
                                    
                    </div>
                    <div class="content controls">
                          
                       <div class="form-row">
                            <div class="col-md-4">Project Manager:</div>
                            <div class="col-md-7"> 
                                <select class="form-control" name="Projectmanager_Id">
                                <option value="">Select Project Manager</option>
                                @foreach ($Projectmanager as $Manager)
                                <option value="{!! $Manager->Id!!}" <?php if ($Manager->Id == $Get_Note->Projectmanager_Id){?> selected="selected" <?php } ?>>{!! $Manager->Firstname !!} {!!$Manager->Lastname !!}</option>
                                @endforeach                              
                                </select>
                                  <span class="error">  {{ $errors->first( 'Projectmanager_Id' , ':message' ) }}</span>
                            </div>
                        
                        </div> 
                        
                   <div class="form-row">
                            <div class="col-md-4">Datum en tijd:</div>
                            <div class="col-md-7">                                                    
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-globe"></span></div>
                                    <input type="text" class="datetimepicker form-control" value="{{$Get_Note->Datetime}}" name="Datetime"/>
                                    
                                     <span class="error">  {{ $errors->first( 'Datetime' , ':message' ) }}</span>
                                </div>                                                                                                
                            </div>
                                      
                        
                </div>  
                
                
                <div class="form-row">
                            <div class="col-md-4">Contact:</div>
                            <div class="col-md-7"> 
                            	<input type="text" class="form-control" placeholder="Contact" name="Contact" value="{{ $Get_Note->Contact }}">
                                  <span class="error">  {{ $errors->first( 'Contact' , ':message' ) }}</span>
                            </div>
                        
                        </div>
                
                
                <div class="form-row">
                            <div class="col-md-4">Type afspraak:</div>
                            <div class="col-md-7"> 
                                <select name="Type" id="type" class="form-control">
                                <option value="phonecall" <?php if ($Get_Note->Type == 'phonecall'){?> selected="selected" <?php } ?>>Telefoongesprek</option>
                                <option value="visit" <?php if ($Get_Note->Type == 'visit'){?> selected="selected" <?php } ?>>Bezoek</option>
                                <option value="email" <?php if ($Get_Note->Type == 'email'){?> selected="selected" <?php } ?> >Email</option>
                                </select> 
                                  <span class="error">  {{ $errors->first( 'Type' , ':message' ) }}</span>                                 
                            </div>
                        
                        </div>
                
               <div class="form-row">
                            <div class="col-md-4">Tekst:</div>
                            <div class="col-md-7">                            
                            <textarea class="form-control" rows="5" name="Text">{{ $Get_Note->Text }}</textarea>
                            		<span class="error">  {{ $errors->first( 'Text' , ':message' ) }}</span>
                            </div>                           
                        </div> 
               
               
               
               <div class="form-row">
                            <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7"> 
                            <select name="Department_Id" class="form-control">
                            <option value="">Select Afdeling</option>
                            @foreach ($Departments as $Department)
                            <option value="{!! $Department->Id!!}" <?php if ($Department->Id == $Get_Note->Department_Id){?> selected="selected" <?php } ?>>{!! $Department->Name!!}</option>
                            @endforeach  
                            </select> 
                             <span class="error">  {{ $errors->first( 'Department_Id' , ':message' ) }}</span>                                    
                            </div>
                        
                        </div>
               
               
               <div class="form-row">
                            <div class="col-md-4">Project:</div>
                            <div class="col-md-7"> 
                                <select name="Project_Id" class="form-control">
                                <option value="">Select Project</option>
                                @foreach ($Projects as $Project)
                                <option value="{!! $Project->Id!!}" <?php if ($Project->Id == $Get_Note->Project_Id){?> selected="selected" <?php } ?>>{!! $Project->Name !!}</option>
                                @endforeach
                                </select> 
                                 <span class="error">  {{ $errors->first( 'Project_Id' , ':message' ) }}</span>                                 
                            </div>
                        
                        </div>
               
               
                       
            </div>
            
          </div>
         <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                             <div class="col-md-3" align="center" > 
                <a href="<?php echo URL:: to( 'admin/notes' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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
             
          
            
      
         
             
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  