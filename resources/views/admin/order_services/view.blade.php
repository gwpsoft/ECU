<!-- Header -->
    @include('admin/header')
     <title>Personeels aanvraag bewerken</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .center { text-align:center;} 
 label { font-size:13px;}
table th,td { font-size:12px;}
.select2-container.select2-container-disabled .select2-choice div { border-color:none !important; background-color:none !important;}
.select2-container .select2-choice { color:none !important;}
.select2-container.select2-container-disabled .select2-choice{ background-color:none !important; border:none !important;}
</style> 
 <script type='text/javascript' src="{{ URL::asset('assets/js/jquery-confirm.js') }}"></script>


<script>

$(document).ready(function() {	
	
	$('.modify').on('click', function() {
		$('#status').val('1');	
	});
	
	$('.cancel').on('click', function() {
		$('#status').val('2');	
	});
	$('.cancel,.modify').on('click', function() {
		$.confirm({
		title: 'Bevestigen!',
		content: 'Weet u zeker dat u wilt Status wijzigen?',
		confirmButton: 'Yes',
		cancelButton: 'No',
		confirmButtonClass: 'btn-success',
		cancelButtonClass: 'btn-danger',
		confirm: function(){
		   // $.alert('Confirmed!');
			$(".order").submit();
		},
		cancel: function(){
			//$.alert('Canceled!')
		}
	});
 });
	
});
</script>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>                      
                    <li class="active">Aanvraag Personeel</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
   
     <input type="hidden" name="Status" id="status" />
     <input type="hidden" name="Customer_id" id="Customer_id" value="<?=$data['Customer_id']?>"  />
     <input type="hidden" name="id" value="<?=$data['id']?>" />
     <input type="hidden" name="Rev_Nummer" value="<?=$data['Nummer']?>" />
      <input type="hidden" name="Nummer" value="<?=$data['Nummer']?>" />
      <input type="hidden" name="Department_Id" id="Department_Id"  value="<?=$data['Department_Id']?>" /> 
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
   <div class="col-md-12">
@if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-12">
                
                <div class="block">
                    <div class="header" >                    
                       <h2>Aanvraag Personeel</h2> 
                       <a href="<?php echo URL:: to( 'admin/OrderServices_print',$data['id']); ?>" title="Afdrukken" style="float:right"><img class=" " src="{{ URL::asset('assets/img/icons/print.png') }}" id="pdf" style=" cursor:pointer; width:25px; height:25px;"></a>                                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-2">Project Naam:</div>
                            <div class="col-md-4"> 
                            		<select id="project_name" name="project_name" style="width: 100%; background-color:none !important; border:none !important;" disabled="disabled" >
                                <option value="">selecteren Project</option>
                                @foreach ($Projects as $Project)
                                <option value="{!! $Project->Id!!}" <?php if ($data['project_name'] == $Project->Id) { ?> selected="selected" <?php } ?>>{!! $Project->Name!!}</option>
                                 @endforeach                                 
                                </select>
                            
                            </div>
                            
                             <div class="col-md-2">Besteld door:</div>
                            <div class="col-md-4"> 
                            <div id="contact_list"> 
                            	  <select  id="Contact_id" name="Contact_id" style="width: 100%; background-color:none !important; border:none !important;" disabled="disabled">
                            <option value="">Naam selecteren</option>
                            <?php foreach ($contacts as $Contact) {?>
                            <option value="<?php echo $Contact->Id?>" <?php if ($data['Contact_id'] == $Contact->Id) { ?> selected="selected" <?php } ?>><?php echo $Contact->Firstname.' '.$Contact->Lastname; ?></option>
							<?php } ?>
                            </select>
                            </div> 
                        </div>
                         </div> 
                       
                         <div class="form-row">
                          
                         <div class="col-md-2">Afdeling:</div>
                            <div class="col-md-4"> 
                            		<?=$data['Afdeling'];?>
                            </div>
                          
                          
                            <div class="col-md-2">Telefoonnummer:</div>
                            <div class="col-md-4"> 
                            	<?=$data['con_Telefoonnummer']?>
                            </div>          
                        </div> 
                        
                        
                        <div class="form-row">
                        <div class="col-md-2">Project Adres:</div>
                            <div class="col-md-4"> 
                            		<?=$data['Work_Address'];?>
                            </div> 
                            
                              <div class="col-md-2">Mobielenummer:</div>
                            <div class="col-md-4"> 
                            	<?=$data['con_Mobilenummer'];?>
                            </div>
                             
                          </div>
                          
                          <div class="form-row">
                            <div class="col-md-2">Postcode & plaats:</div>
                            <div class="col-md-4"> 
                            		<?=$data['Postcode']?>
                            </div>
                          
                             <div class="col-md-2">Aangenomen door:</div>
                            <div class="col-md-4"> 
                            	<?=$data['con_Aangenomendoor']?>
                            </div>  
                          
                                                  
                        </div>   
                       
                        
                         <div class="form-row">
                           
                            
                               <div class="col-md-2">Uitvoerder:</div>
                            <div class="col-md-4"> 
                            		<?=$data['Uitvoerder'];?>
                            </div> 
                            
                              <div class="col-md-2">Aanvraagdatum:</div>
                            <div class="col-md-4"> 
                             <?=$data['Order_Date']?>
                                                 
                        </div>  
                            
                                           
                        </div>
                        
                        <div class="form-row">
                          <div class="col-md-2">Telefoonnummer:</div>
                            <div class="col-md-4"> 
                            	<?=$data['phone_number']?>
                              
                             </div>
                              <div class="col-md-2">Tijd:</div>
                            <div class="col-md-4">
                            <?=$data['time']?>    </div>   
                       
                        </div>
                            
                             <div class="form-row">
                             
                                <div class="col-md-2">Aanvraagnummer:</div>
                            <div class="col-md-4"> 
                            	AS-<?=$data['Nummer']?>
                            </div> 
                             
                            <?php if (@$data['Rev_Nummer'] !=0){ ?>
                           
                              <div class="col-md-2">Gewijzigd Nummer:</div>
                            <div class="col-md-4"> 
                         AS-<?=@$data['Rev_Nummer']?>
                          
                            </div>
                            <?php } ?>                         
                        </div>
                         
                </div>         
            </div>
               
                       
                       
                       
               <div class="block">
                    <div class="header" >                    
                       <h2>Opdracht</h2>                                    
                    </div>
                    <div class="content controls">
                 
                    <div class="form-row">
                            <div class="col-md-2">Begindatum:</div>
                            <div class="col-md-4">
                            <?=$data['Begindatum']?>                            	
                            </div>
                           <div class="col-md-2">Begintijd:</div>
                            <div class="col-md-4">
                            <?=$data['Begintijd']?>    </div>           
                            </div>
                            
                             <div class="form-row">
                             <div class="col-md-2">Aantal Mensen:</div>
                            <div class="col-md-4"> 
                            	<?=$data['Aantal_Mensen']?>
                            </div> 
                            
                              <div class="col-md-2">Hoeveel Dagen:</div>
                            <div class="col-md-4"> 
                            	<?=$data['Hoeveel_Dagen']?>
                            </div>       
                                                             
                            </div>
                             <div class="form-row">
                                 <div class="col-md-2">Melden Bij:</div>
                            <div class="col-md-4"> 
                            	<?=$data['Melden_Bij']?>
                            </div> 
                              <div class="col-md-2">Telefoonnummer:</div>
                            <div class="col-md-4"> 
                            	<?=$data['Telefoonnummer']?>
                            </div>  
                             
                             
                                  
                            </div>
                             
                            <div class="form-row">
                             <div class="col-md-2">Werkzaamheden:</div>
                            <div class="col-md-2">
                            <?php echo $data['Werkzaamheden'] ;?> 
                   
                            </div> 
                            <div class="col-md-8">
                            <?php if ($data['Werkzaamheden'] == 'Anders') { 
							$display = 'block';							
							 } else {
							$display = 'none';	 
							 } ?>
                            <input type="text" class="form-control" style="display:<?php echo $display;?>;" readonly="readonly" placeholder="Anders" name="Anders" id="Anders" value="<?=$data['Anders']?>">
                            
                            </div>
                            </div> 
                            
                            
                            
                                <div class="form-row">
                             <div class="col-md-2">Benodigheden:</div>
                            <div class="col-md-10"> 
                            	<?=$data['Benodigheden']?>
                            </div>       
                            </div>
                            
                            
                            
                            <div class="form-row">
                             <div class="col-md-2">Opmerkingen:</div>
                            <div class="col-md-10"> 
                            	<?=$data['Opmerkingen']?>
                            </div>       
                            </div>
                                                            
                  		  </div>
                 	   </div>        
                       
                       
                	   </div>
                    
            
 
        
          <div class="col-md-12">
         <div class="content controls" >
                        <div class="form-row" style="float:right" >
                          <div class="col-md-9" ></div>
                            <div class="col-md-3" >
                         	<a href="<?php echo URL:: to( 'admin/BestelformulierDiensten' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
                            </div> 
                            
                             <br /> <br />                                              
                    </div>
                </div>                           
        </div>  
      </div>
           
  </div>   
       @include('admin/footer')</div>  