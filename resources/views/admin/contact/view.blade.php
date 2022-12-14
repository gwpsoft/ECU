<!-- Header -->
    @include('admin/header')
     <title>Bekijk Contact</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                     <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                   
                    <li class="active">Bekijk Contact</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'contact']) !!}
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
                    
                       <h2>Contact gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Aanhef:</div>
                            <div class="col-md-4"> 
                            <?php echo $data->Gender ==1 ? 'Dhr.': 'Mevr.'?>
                            
                            
                            	
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Initialen:</div>
                            <div class="col-md-7"> {{ $data->Initials}}
                            		
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Voornaam:</div>
                            <div class="col-md-7"> {{ $data->Firstname}}
                            		
                                  
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Achternaam:</div>
                            <div class="col-md-7"> {{ $data->Lastname}}
                            	
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7">
                             <?php $Department = DB::table('tbldepartment')->where('id', $data->Department_Id)->first();
							 if ($Department !='') { echo $Department->Name;} ?>
                        </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Functie:</div>
                            <div class="col-md-7"> {{ $data->Jobtitle}}
                            		
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
                            <div class="col-md-7"> {{ $data->Notes}}
                            	
                            </div>                           
                        </div>
                                             
                    </div>
                </div> 
                    <div class="content controls">
                <div class="form-row">
                          <div class="col-md-6">
        <a href=" <?php echo URL:: to( 'admin/contacts' ); ?> " class="btn btn-success" style="float:none;width:100%">Back</a>
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
                            <div class="col-md-4">telefoon:</div>
                            <div class="col-md-7"> {{ $data->Phone}}
                            	
                            </div>                           
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Prive telefoon:</div>
                            <div class="col-md-7"> {{ $data->Phone_Private}}
                            		
                            </div>                           
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7"> {{ $data->Mobile}}
                            	
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Mobiel 2:</div>
                            <div class="col-md-7"> {{ $data->Mobile2}}
                            	
                            </div>                           
                        </div> 
                        
                        <div class="form-row">
                            <div class="col-md-4">Mobiel 3:</div>
                            <div class="col-md-7"> {{ $data->Mobile3}}
                            	
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7">  {{ $data->Fax}}
                            		
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7">{{ $data->Email}} 
                            	
                            </div>                           
                        </div>
                                                
                    </div>
                </div> 
                
                
                
                
                
                                    
        </div>  
       
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  