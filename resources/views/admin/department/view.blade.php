<!-- Header -->
    @include('admin/header')
     <title>Inzicht Afdeling</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Uitzicht Afdeling</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'department']) !!}
   <div class="col-md-12">
 @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
   
  <?php  $Customer = DB::table('tblcustomer')->where('Id', $data->Customer_Id)->first();  ?>  
    <div class="col-md-8">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Afdeling gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Klant:</div>
                            <div class="col-md-7">
                            <?php if ($Customer !='') { echo $Customer->Name; }	?>
                            </div>
                          </div>
                       
                       <div class="form-row">
                            <div class="col-md-4">Naam:</div>
                            <div class="col-md-7">{{ $data->Name}}  </div>                        
                        </div>                   
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7">{{ $data->Address}}   </div>                           
                       </div> 
                        
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7"> {{ $data->Zipcode}} </div>                           
                        </div> 
                        
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7">{{ $data->City}} </div>                           
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
                            <div class="col-md-7">{{ $data->Notes}} 
                            	
                            </div>                           
                        </div>
                                             
                    </div>
                </div>
               
               
                  
                <div class="block">
                    <div class="header" >
                    
                       <h2>Postbus gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                     
                       
                       <div class="form-row">
                            <div class="col-md-4">Postbus:</div>
                            <div class="col-md-7"> {{ $data->Mailbox}}  </div>
                        
                        </div>
                       
                       
                   
                        <div class="form-row">
                            <div class="col-md-4">Postbus Postcode:</div>
                            <div class="col-md-7">  {{ $data->MailboxZipcode}}    </div>                           
                       </div>  
                         <div class="form-row">
                            <div class="col-md-4">Postbus Stad:</div>
                            <div class="col-md-7"> {{ $data->MailboxCity }}  </div>                           
                        </div> 
                                                   
                    </div>
                        
                </div>  
                
                  <div class="block">
                    <div class="header" >
                    
                       <h2>Contact Informatie</h2>
                                    
                    </div>
                    <div class="content controls">
                     
                       
                       <div class="form-row">
                            <div class="col-md-4">Telefoon:</div>
                            <div class="col-md-7"> {{ $data->Phone }}                                  
                            </div>
                        
                        </div>
                       
                       
                   
                        <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7"> {{ $data->Fax }}
                            </div>                           
                       </div>  
                         <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7"> {{ $data->Email }}
                            </div>                           
                        </div> 
                                                   
                    </div>                        
                </div>          
            </div>
            
   <div class="col-md-4">
             
             
           <div class="block">
                    <div class="header" >                    
                       <h2>Projecten</h2>                                    
                    </div>
                    <div class="content controls" style="height:400px; overflow:auto">
                    <div align="center"><a href=" <?php echo URL:: to( 'admin/createNew_project', @$data->Id ); ?>" class="btn btn-success">+ Nieuw Project</a>
                         </div> 
                         <hr /> 
                    
                      <?php foreach ($GetProjects as $Project) {?>
                     <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_project',$Project->Id); ?>"><?php echo $Project->Name?></a></div>
                    
                    <?php } ?>                            
                    </div>
          </div>
                
             <div class="block">
                    <div class="header" >                    
                       <h2>Contacten</h2>                                    
                    </div>
                    <div class="content controls" style="height:400px; overflow:auto"> 
                     <div align="center"><a href=" <?php echo URL:: to( 'admin/createNew_contact', @$data->Id ); ?>" class="btn btn-success">+ Nieuw Contact</a>
                         </div> 
                         <hr />  
                    <?php foreach ($GetContacts as $contact) {?>
                    <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_contact',$contact->Id); ?>"><?php echo $contact->Firstname?> <?php echo $contact->Lastname?></a></div> 
                    <?php } ?>                   
                    </div>
          </div>
          
          <div class="block">
                    <div class="header" >                    
                       <h2>Afspraken</h2>                                    
                    </div>
                    <div class="content controls" style="height:400px; overflow:auto"> 
                    <div align="center"><a href=" <?php echo URL:: to( 'admin/createNew_note', @$data->Id ); ?>" class="btn btn-success">+ Nieuw Afspraken</a>
                         </div> 
                         <hr /> 
                    
                     <?php foreach ($GetNotes as $Notes) {?>
                       <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_note',$Notes->Id); ?>"><?php echo $Notes->Contact?> (<?php echo $Notes->Datetime?>)</a></div>
                    <?php } ?>                              
                    </div>
          </div>
             
             
            </div>         
          <center>
       <div class="content controls">
                <div class="form-row">
                          <div class="col-md-6">
        <a href=" <?php echo URL:: to( 'admin/departments' ); ?> " class="btn btn-success" style="float:none;width:100%">Back</a>
        </div>                       
                    </div>         
            </div> </center> 
       
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  