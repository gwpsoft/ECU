<!-- Header -->
    @include('admin/header')
     <title>Creëren Version</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                   
                    <li class="active">Creëren Version</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/update_version']) !!}
    <input type="hidden" name="id" value="{{$version->id}}" />
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
                    
                       <h2>Version data</h2>
                                    
                    </div>
                    <div class="content controls">
                          
                   
                
                
                <div class="form-row">
                            <div class="col-md-4">Android:</div>
                            <div class="col-md-7"> 
                            	<input type="text" class="form-control" placeholder="Android Version" name="android" value="{{ $version->android }}">
                                 
                            </div>
                        
                        </div>
           
               <div class="form-row">
                            <div class="col-md-4">iPhone:</div>
                            <div class="col-md-7"> 
                            	<input type="text" class="form-control" placeholder="iPhone Version" name="iphone" value="{{ $version->iphone }}">
                            </div>
                        
                        </div>
                       
            </div>
            
          </div>
         <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                       
                
                    <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}
                </div>
                             
               
                    </div>
                </div>   
      </div>          
             
          
            
      
         
             
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  