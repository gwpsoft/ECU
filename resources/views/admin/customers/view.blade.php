<!-- Header -->
    @include('admin/header')
     <title>View Klant</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">View Klant</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'customer']) !!}
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
                    
                       <h2>Klant gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                        
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Naam:</div>
                            <div class="col-md-7"> {{ $data->Name }}
                            		
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
                            <div class="col-md-7">{{ $data->Notes }} 
                            </div>                           
                        </div>                                        
                    </div>
                </div>
          
            
                 
                    
          
           <div class="content controls">
                <div class="form-row">
                          <div class="col-md-6">
        <a href=" <?php echo URL:: to( 'admin/customers' ); ?> " class="btn btn-success" style="float:none;width:100%">Back</a>
        </div>                       
                    </div>         
            </div> 
            
            
        
          </div>
             
        
        <div class="col-md-5">
        	  <div class="content controls">
              
              <div class="col-md-8">
          
           <div class="block">
                    <div class="header" >                    
                       <h2>Afdeling</h2>                                    
                    </div>
                    <div class="content controls" style="height:250px; overflow:auto">
                      <div align="center"><a href=" <?php echo URL:: to( 'admin/CreateNew_department', $data->Id ); ?>" class="btn btn-success">+ Nieuw Afdeling</a>
                         </div> 
                         <hr />   
                      <?php foreach ($departments as $department) {?>
                     <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_department',$department->Id); ?>"><?php echo $department->Name?></a></div>
                    
                    <?php } ?>                            
                    </div>
          </div>
                
             
          
          
            </div>
              
              </div>
        
        </div>
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  