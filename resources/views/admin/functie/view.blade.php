<!-- Header -->
    @include('admin/header')
     <title>View Note</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                   
                    <li class="active">View Note</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'note']) !!}
   <div class="col-md-12">
<!-- 
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif-->
    <div class="col-md-8">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Persoonlijke data</h2>
                                    
                    </div>
                    <div class="content controls">
                          
                       <div class="form-row">
                            <div class="col-md-4">Project Manager:</div>
                            <div class="col-md-7">
                            <?php $ProjectManager = DB::table('tblprojectmanager')->where('id', $data->Projectmanager_Id)->first();
							if ($ProjectManager !='') { echo $ProjectManager->Firstname;} ?>
                            </div>
                        
                        </div> 
                        
                   <div class="form-row">
                            <div class="col-md-4">Datum en tijd:</div>
                            <div class="col-md-7">{{ $data->Datetime}}                                                    
                                                                                                                                
                            </div>
                                      
                        
                </div>  
                
                
                <div class="form-row">
                            <div class="col-md-4">Contact:</div>
                            <div class="col-md-7">{{ $data->Contact}} 
                            </div>
                        
                        </div>
                
                
                <div class="form-row">
                            <div class="col-md-4">Type afspraak:</div>
                            <div class="col-md-7"> {{ $data->Type}}
                               <!-- <select name="Type" id="type" class="form-control">
                                <option value="phonecall">Telefoongesprek</option>
                                <option value="visit">Bezoek</option>
                                <option value="email">Email</option>
                                </select> -->
                                                            
                            </div>
                        
                        </div>
                
               <div class="form-row">
                            <div class="col-md-4">Tekst:</div>
                            <div class="col-md-7"> {{ $data->Text}}                           
                        
                            </div>                           
                        </div> 
               
               
               
               <div class="form-row">
                            <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7">
                             <?php $ProjectManager = DB::table('tbldepartment')->where('id', $data->Department_Id)->first();
							if ($ProjectManager !='') { echo $ProjectManager->Name;} ?>
                            </div>
                        
                        </div>
               
               
               <div class="form-row">
                            <div class="col-md-4">Project:</div>
                            <div class="col-md-7">
                             <?php $Project = DB::table('tblproject')->where('id', $data->Project_Id)->first();
							if ($Project !='') { echo $Project->Name;} ?>
                            </div>
                        
                        </div>
               
               
                       
            </div>
            
          </div>
            
      </div>          
             
          
           <div class="content controls">
                <div class="form-row">
                          <div class="col-md-5">
        <a href=" <?php echo URL:: to( 'admin/notes' ); ?> " class="btn btn-success" style="float:none;width:100%">Back</a>
        </div> 
        <br />                        
                    </div>         
            </div> 
      
          </div>
             
            </div>
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  