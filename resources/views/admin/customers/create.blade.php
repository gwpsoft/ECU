<!-- Header -->
    @include('admin/header')
     <title>Creëren Klant</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Creëren Klant</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/customer']) !!}
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
                    
                       <h2>Klant gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Naam:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" placeholder="Name" name="Name" value="{{ (Input::old('Name')) ? Input::old('Name') : '' }}">
                                  <span class="error">  {{ $errors->first( 'Name' , ':message' ) }}</span>
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
                            <div class="col-md-7">                            
                            <textarea class="form-control" rows="5" name="Notes"></textarea>
                            		<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>                           
                        </div>                                        
                    </div>
                </div>
          
       
        
          </div>
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
                </div>    
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  