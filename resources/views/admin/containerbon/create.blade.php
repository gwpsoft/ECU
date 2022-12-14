<!-- Header -->
    @include('admin/header')
    
    
     <title>Creëren Container Bon</title>  
<style>
 .checker {float:right !important; margin-right:none !important; }
 .error { color:#fff; }
 div.checker  {
  margin-right: 0px !important;

 }
</style> 

<script>
$(document).ready(function() {
	$('select#project').on('change', function() {
		
		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var project_id = $('select#project').val();		
		$.get('Ajaxproject?project_id=' + project_id,function(data) {
			 
			 $('#Afdeling').val(data.DeptName);
			 $('#Klant').val(data.CustomerName);
			 $('#Project').val(data.Name);
			 $('#Klant_proj').val(data.Customer_ref);
			 $('#Project_nr').val(data.Project_ref);
			 $('#Uitvoerder').val(data.Contact_Id);
			 $('#Project_Fax').val(data.Fax);
			 $('#Adres').val(data.Address);
			 $('#Postcode').val(data.Zipcode);
			 $('#Stad').val(data.City);
			 $('#Vaste_prijs').val(data.Fixed);
			 $('#Tarief').val(data.Rate);			 
		});
		
	});
});
$(document).ready(function(){
   
    $("#checked").click(function(){
        $("#received").val("<?=date('Y-m-d')?>");
    });
});

</script>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="admin">Home</a></li>                    
                    <li class="active">Creëren Container Bon</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/OrderBon_store']) !!}
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
                    
                       <h2>Container Bon</h2>
                                    
                    </div>
                    <div class="content controls">
                        
                       
                       <div class="form-row">
                            <div class="col-md-4">From datum:</div>
                            <div class="col-md-3"> 
                            		<div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="From_Date" value="{{ (Input::old('From_Date')) ? Input::old('From_Date') : '' }}" style="width:90px;">                                     
                                </div>
                                <span class="error">  {{ $errors->first( 'From_Date' , ':message' ) }}</span>
                            </div>
                             <div class="col-md-1" align="right">     
                                To </div>
                                  <div class="col-md-3" > 
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="To_Date" value="{{ (Input::old('To_Date')) ? Input::old('To_Date') : '' }}" style="width:90px; ">
                                </div>
                                   <span class="error">  {{ $errors->first( 'To_Date' , ':message' ) }}</span>
                            </div>
                        
                        </div>                         
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Project:</div>
                            <div class="col-md-7"> 
                                
                                <select class="select2" style="width: 100%;" tabindex="-1" name="Project_Id" id="project">
                                <option value="">Kies een project</option>
                                <?php foreach ($AllProjects as $project) {?>
                                 <option value="<?=$project->Id?>"><?=$project->Name?></option>
                                 <?php } ?>                                
                                </select>       
                                
                          <span class="error">  {{ $errors->first( 'Project_Id' , ':message' ) }}</span>
                              </div> 
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Verz. datum:</div>
                            <div class="col-md-7"> 
                            		<div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Sent_Date" value="{{ (Input::old('Sent_Date')) ? Input::old('Sent_Date') : '' }}">
                                </div>
                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Ontv. datum:</div>
                            <div class="col-md-7"> 
                        <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" id="received" name="Received_Date" value="{{ (Input::old('Received_Date')) ? Input::old('Received_Date') : '' }}">
                                </div>
                                
                                <?php /*?><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>
                        </div>
                        </div>
                      
                        <div class="form-row">
                          <div class="col-md-4">Goedgekeurd:</div>
                            <div class="col-md-7"> 
                      		  <div class="input-group">
                                  <div class="checkbox-inline">
                                    <div class="checker" >
                                    <input type="checkbox" name="Checked" value="1" id="checked">
                                    </div>
                                 </div>
                             </div>
                         </div>
                               <?php /*?> <span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>
                        </div>
                        
                        
                        <div class="form-row">

                            <div class="col-md-4">Factuurdatum:</div>

                            <div class="col-md-7"> 

                            		<div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" class="datepicker form-control"  name="Billing_Date" >

                                </div>

                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>

                        

                        </div>
                        
                      
                      <div class="form-row">

                            <div class="col-md-4">Factuurnr:</div>

                            <div class="col-md-7"> 

                       <input type="text" class=" form-control"  name="Billing_no" >

                             

                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>

                        

                        </div>  
                        
                        
                        
                         <div class="col-md-7"> </div>
                            <div class="col-md-4">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-success']) !!}
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
                            		<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->
                            </div>                           
                        </div>                                        
                    </div>
                </div>
             </div>
            
      <div class="col-md-6"> 
               <div class="block">
                    <div class="header" >                   
                       <h2>Project gegevens</h2>                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Klant:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Klant" readonly="readonly" >
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Afdeling" readonly="readonly">
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Project:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Project" readonly="readonly">
                            </div>                           
                        </div> 
                        
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Klant proj. nr.:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Klant_proj" readonly="readonly">
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Project nr:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Project_nr" readonly="readonly">
                            </div>                           
                        </div>
                                       
                                       
                                       
                           <div class="form-row">
                            <div class="col-md-4">Uitvoerder:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Uitvoerder" readonly="readonly">
                            </div>                           
                        </div>
                        
                        
                          <div class="form-row">
                            <div class="col-md-4">Project Fax:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Project_Fax" readonly="readonly">
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Adres" readonly="readonly">
                            </div>                           
                        </div>   
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Postcode" readonly="readonly">
                            </div>                           
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Stad" readonly="readonly">
                            </div>                           
                        </div>  
                        
                        <div class="form-row">
                            <div class="col-md-4">Vaste prijs:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Vaste_prijs" readonly="readonly">
                            </div>                           
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Tarief p/u:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Tarief" readonly="readonly">
                            </div>                           
                        </div>
                                  
                    </div>
                </div> 
                                    
        </div>  
       
         <center>
                <div class="content controls">
                <div class="form-row" style="" >
                
                <div class="col-md-3" align="center" > 
                {!! Form::reset('Annuleren', ['class' => 'btn btn-primary']) !!}
                
                </div>              
                <div class="col-md-3" align="center">
                {!! Form::submit('Opslaan', ['class' => 'btn btn-success']) !!}
                </div>
                                         
                </div>
                </div>
          </center> 
             
            </div>
            
    {!! Form::close() !!}        
  </div>
  <br />   
       @include('admin/footer')</div>  