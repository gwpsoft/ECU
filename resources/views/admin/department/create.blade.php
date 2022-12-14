<!-- Header -->
    @include('admin/header')
     <title>Creëren Afdeling</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                   
                    <li class="active">Creëren Afdeling</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/department']) !!}
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
                    
                       <h2>Afdeling gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Klant:</div>
                            <div class="col-md-7"> 
                            	<select class="form-control" name="Customer_Id">
                                    <option value="">Select Klant</option>
                                    @foreach ($data as $customer)
                                    <option value="{!! $customer->Id!!}" <?php if ($CustomerID == $customer->Id) {?> selected="selected" <?php } ?>>{!! $customer->Name!!}</option> 
                                     @endforeach                             
                                </select>
                                <span class="error">  {{ $errors->first( 'customer_id' , ':message' ) }}</span>
                            </div>
                          </div>
                       
                       <div class="form-row">
                            <div class="col-md-4">Naam Afdeling:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Naam" name="Name" value="{{ (Input::old('Name')) ? Input::old('Name') : '' }}"><span class="error">  {{ $errors->first( 'Name' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                       
                       
                   
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Adres" name="Address" value="{{ (Input::old('Address')) ? Input::old('Address') : '' }}"><span class="error">  {{ $errors->first( 'Address' , ':message' ) }}</span>
                            </div>                           
                       </div>  
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Postcode" name="Zipcode" value="{{ (Input::old('Zipcode')) ? Input::old('Zipcode') : '' }}"><span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span>
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Stad" name="City" value="{{ (Input::old('City')) ? Input::old('City') : '' }}"><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span>
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
                       
            </div>
            
   <div class="col-md-6">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Postbus gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                     
                       
                       <div class="form-row">
                            <div class="col-md-4">Postbus:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Postbus" name="Mailbox" value="{{ (Input::old('Mailbox')) ? Input::old('Mailbox') : '' }}"><span class="error">  {{ $errors->first( 'Mailbox' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                       
                       
                   
                        <div class="form-row">
                            <div class="col-md-4">Postbus Postcode:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Postbus Postcode" name="MailboxZipcode" value="{{ (Input::old('MailboxZipcode')) ? Input::old('MailboxZipcode') : '' }}"><span class="error">  {{ $errors->first( 'MailboxZipcode' , ':message' ) }}</span>
                            </div>                           
                       </div>  
                         <div class="form-row">
                            <div class="col-md-4">Postbus Stad:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Postbus Stad" name="MailboxCity" value="{{ (Input::old('MailboxCity')) ? Input::old('MailboxCity') : '' }}"><span class="error">  {{ $errors->first( 'MailboxCity' , ':message' ) }}</span>
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
                            <div class="col-md-4">Telefoon:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Telefoon" name="Phone" value="{{ (Input::old('Phone')) ? Input::old('Phone') : '' }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>
                                  
                            </div>
                        
                        </div>
                       
                       
                   
                        <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Fax" name="Fax" value="{{ (Input::old('Fax')) ? Input::old('Fax') : '' }}"><span class="error">  {{ $errors->first( 'Fax' , ':message' ) }}</span>
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
            </div>         
          <center>
         <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
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
                </div>   </center> 
       
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  