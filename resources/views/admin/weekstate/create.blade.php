<!-- Header -->
    @include('admin/header')
 <script type='text/javascript' src='js/plugins/tinymce/tinymce.min.js'></script>   
    
     <title>Creëren Weekstaat</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 div.checker  {
  margin-right: 0px !important;
   margin-bottom: 7px;
 }
</style> 

<script>

$(document).ready(function() {
	
	
	$('#checked').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
       // alert('is checked');
    } else {
		$(this).val('0');
       // alert('is not checked');
    }
});


$('#via_checked').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
       // alert('is checked');
    } else {
		$(this).val('0');
       // alert('is not checked');
    }
});



	
	
	var pro_id = <?php echo @$ProjectID;?>
	
	
	
	$.get('<?php echo URL:: to( 'admin/Ajaxproject'); ?>?project_id=' + pro_id,function(data) {
			// alert (data); return false;
			 $('#Afdeling').val(data.DeptName);
			 $('#Klant').val(data.CustomerName);
			 $('#Project').val(data.Name);
			 $('#Klant_proj').val(data.Customer_Ref);
			 $('#Project_note').val(data.pro_Note);
			  $('#Uitvoerder').val(data.Contact_Firstname+' '+data.Contact_Lastname);
			// $('#Uitvoerder').val(data.Contact_Id);
			 $('#Project_Fax').val(data.Fax);
			 $('#Adres').val(data.Address);
			 $('#Postcode').val(data.Zipcode);
			 $('#Stad').val(data.City);
			 $('#Vaste_prijs').val(data.Fixed);
			 $('#Tarief').val(data.Rate);			 
		});
	
	
	
	
	
	$('select#project').on('change', function() {
		
		 $(document).ajaxStart(function () {
   		//show ajax indicator
		ajaxindicatorstart('loading data.. please wait..');
  }).ajaxStop(function () {
		//hide ajax indicator
		ajaxindicatorstop();
  });
		var project_id = $('select#project').val();		
		$.get('<?php echo URL:: to( 'admin/Ajaxproject'); ?>?project_id=' + project_id,function(data) {
			// alert (data); return false;
			 $('#Afdeling').val(data.DeptName);
			 $('#Klant').val(data.CustomerName);
			 $('#Project').val(data.Name);
			 $('#Klant_proj').val(data.Customer_Ref);
			 $('#Project_note').val(data.pro_Note);
			 $('#Uitvoerder').val(data.Contact_Firstname+' '+data.Contact_Lastname);
			 //$('#Uitvoerder').val(data.Contact_Id);
			 $('#Project_Fax').val(data.Fax);
			 $('#Adres').val(data.Address);
			 $('#Postcode').val(data.Zipcode);
			 $('#Stad').val(data.City);
			 $('#Vaste_prijs').val(data.Fixed);
			 $('#Tarief').val(data.Rate);			 
		});
		
	});
});
/*$(document).ready(function(){
   
    $("#checked").click(function(){
        $("#received").val("<?=date('Y-m-d')?>");
    });
});*/

</script>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>                    
                    <li class="active">Creëren Weekstaat</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/Addweekstate']) !!}
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
                    
                       <h2>Weekstaat</h2>
                                    
                    </div>
                    <div class="content controls">
                        
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Week nr:</div>
                            <div class="col-md-3"> 
                            		<select name="year" class="select2" style="width:100px;">
                                    <?php 
									$current_year = date('Y');
									$range = range($current_year, $current_year-10);
									$years = array_combine($range, $range);
									foreach ($years as $year) {?>
                                    <option value="<?=$year?>"><?=$year?></option>
                                    <?php } ?>                                 
                                </select>
                                  <span class="error">  {{ $errors->first( 'year' , ':message' ) }}</span>
                            </div>
                        <div class="col-md-3"> 
                            		<select name="week" class="select2" style="width:100px;">
                                    <?php 
									
									foreach (range(00, 52) as $number) {
										$number = (str_pad($number, 2, "0", STR_PAD_LEFT));
										?>
                                    <option value="<?=$number?>"><?=$number;?></option>
                                    <?php } ?>                                 
                                </select>
                                  <span class="error">  {{ $errors->first( 'week' , ':message' ) }}</span>
                            </div>
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Project:</div>
                            <div class="col-md-7"> 
                                
                                <select class="select2" style="width: 100%;" tabindex="-1" name="Project_Id" id="project">
                                <option value="">Kies een project</option>
                                <?php foreach ($AllProjects as $project) {?>
                                 <option value="<?=$project->id?>" <?php if (@$ProjectID == $project->id){?> selected="selected" <?php } ?>><?=$project->Name?></option>
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
                            <div class="col-md-2"> 
                      		  <div class="input-group">
                                  <div class="checkbox-inline">
                                    <div class="checker">
                                    <input type="checkbox" name="Checked" value="0" id="checked">
                                    </div>
                                 </div>
                             </div>
                         </div>
                       
                        <div class="col-md-2">Via Werkbrifeje:</div>
                            <div class="col-md-2"> 
                      		  <div class="input-group">
                                  <div class="checkbox-inline">
                                    <div class="checker">
                                    <input type="checkbox" name="Werkbrifje" value="0" id="via_checked">
                                    </div>
                                 </div>
                             </div>
                         </div>
                       
                       
                       
                       
                       
                       	<div class="form-row">

                            <div class="col-md-4">Factuurdatum:</div>

                            <div class="col-md-7"> 

                            		<div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Billing_Date">

                                </div>

                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>

                        

                        </div>
                        
                      
                      <div class="form-row">

                            <div class="col-md-4">Factuurnr:</div>

                            <div class="col-md-7"> 

                       <input type="text" class=" form-control" placeholder="Factuurnr" name="Billing_no">

                             

                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>

                        

                        </div>  
                       
                       
                       
                       
                       
                       
                       
                       
                        </div>
                         <div class="col-md-7"> </div>
                            <div class="col-md-4">
                {!! Form::submit('Weekstaat Aanmaken', ['class' => 'btn btn-success','name' => 'Save']) !!}
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
                            <div class="col-md-4">Opmerkingen:</div>
                            <div class="col-md-7">                            
                            <textarea class="form-control" rows="5" name="Notes"></textarea>
                            		<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->
                            </div>                           
                        </div> 
                        
                        <div class="form-row">
                            <div class="col-md-4">Interne Notities:</div>
                            <div class="col-md-7">                            
                            <textarea class="form-control" rows="5" name="Internal_Notes"></textarea>
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
                            <div class="col-md-4">Uitvoerder:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Uitvoerder" readonly="readonly">
                            </div>                           
                        </div>
                        <div class="form-row">

                            <div class="col-md-4">Afspraken:</div>

                            <div class="col-md-7"> 
<textarea class="form-control" rows="5" id="Project_note" ></textarea>
                            		 

                            </div>                           

                        </div>
                        
                        <div class="form-row">

                            <div class="col-md-4">Goedkeuring:</div>

                            <div class="col-md-7"> 
 									<textarea class="form-control" rows="5" id="Goedkeuring" ></textarea>
                            		<!--<input type="text" class="form-control" id="Project_note" readonly="readonly">--> </div>
                                       <div class="col-md-9"> </div>
                                      <div class="col-md-3"> 
									<a class="btn btn-success"  style="margin:5px;" onclick="UpdateProjectNote();">Opslaan</a>
                            </div>                     

                        </div>
                      
                      <!--  <div class="form-row">
                            <div class="col-md-4">Klant proj. nr.:</div>
                            <div class="col-md-7"> 
                            		<input type="text" class="form-control" id="Klant_proj" readonly="readonly">
                            </div>                           
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">ECU Project/Debiteur #:</div>
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
                        </div> -->
                                  
                    </div>
                </div> 
                                    
        </div>  
       
         <center>
                <div class="content controls">
                <div class="form-row" style="" >
                
                <div class="col-md-3" align="center" > 
                <a href="<?php echo URL:: to( 'admin/weekcard' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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
          </center> 
             
            </div>
            
    {!! Form::close() !!}        
  </div>
  <br />  
  
     <script>
function UpdateProjectNote () {
	  
	  Project_Note = $('#Project_note').val();
	  Goedkeuring = $('#Goedkeuring').val();
	  Project_Id = $('#project').val();
	  
	$.ajax({
		method: "POST",
		url:'<?php echo URL:: to( 'admin/UpdateProjectNote'); ?>',
		data:'Project_Id='+Project_Id+'&Project_Note='+Project_Note+'&Goedkeuring='+Goedkeuring,
		success:function(response){
		  alert ('Ingevoegd Project Afspraken..!');
		}
	});
	
}
  
  
  </script>
       @include('admin/footer')</div>  