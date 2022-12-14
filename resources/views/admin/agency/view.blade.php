<!-- Header -->



    @include('admin/header')
     <title>Uitzicht Agency</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Uitzicht Agency</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'agency']) !!}
   <div class="col-md-12">
<!-- 
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif-->
    <div class="col-md-6">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Uitzendbureau gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Name:</div>
                            <div class="col-md-7"> 
                            		{{ $data->Name}}
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Address:</div>
                            <div class="col-md-7"> {{ $data->Address}} </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7"> {{ $data->Zipcode}}
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7"> {{ $data->City}}                         
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Actief:</div>
                            <div class="col-md-7"> {{ @$data->Active == 1 ? 'Actief' : 'Inactief'}}                         
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
                            <div class="col-md-7"> {{ $data->notes}}
                            </div>                           
                        </div>                                        
                    </div>
                </div>
                 <div class="content controls">
                <div class="form-row">
                          <div class="col-md-6">
        <a href=" <?php echo URL:: to( 'admin/agencies' ); ?> " class="btn btn-success" style="float:none;width:100%">Terug</a>
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
                            <div class="col-md-7"> {{ $data->Phone}}
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7">{{ $data->Fax}} 
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7"> {{ $data->Email}}                            	
                            </div>                           
                        </div> 
                        
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Uitvoerder 1:</div>
                            <div class="col-md-7"> {{ $data->Contact1}}
                            		 </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Mobiel 1:</div>
                            <div class="col-md-7">{{ $data->Mobile1}}
                            </div>                           
                        </div>
                                       
                                       
                                       
                           <div class="form-row">
                            <div class="col-md-4">Uitvoerder 2:</div>
                            <div class="col-md-7">{{ $data->Contact2}}                             		
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Mobiel 2:</div>
                            <div class="col-md-7">{{ $data->Mobile2}} 
                            </div>                           
                        </div>
                        
                          <div class="form-row">
                            <div class="col-md-4">Uitvoerder 3:</div>
                            <div class="col-md-7"> {{ $data->Contact3}}
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Mobiel 3:</div>
                            <div class="col-md-7"> {{ $data->Mobile3}}
                            </div>                           
                        </div>                  
                    </div>
               
           
                                    
        </div>   </div> 
       
        
            
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  