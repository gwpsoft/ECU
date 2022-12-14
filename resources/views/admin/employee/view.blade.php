<!-- Header -->
    @include('admin/header')
     <title>uitzicht Personeel</title>
 <?php //echo $data->Initials; print_r($data); die;?>    
     
     
      
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Home</a></li>                    
                    <li class="active">uitzicht Personeel</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar')    
   
   <div class="col-md-10">
       
  <!--@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
     <b>Error!</b>  <br />
   @foreach ($errors->all() as $error)
  {{$error}}<br />
   @endforeach   
   </div>
   @endif-->
   <br />
   </div>
  <div class="col-md-10">  
    <div class="col-md-6">
                
                <div class="block">
                    <div class="header" >                    
                       <h2>Personal Data</h2>
                                    
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Aanhef:</div>
                            <div class="col-md-4"> 
                            	<?php echo $data->Gender == 1  ? 'Dhr.' : 'Mevr.'  ?>
                            </div>
                          </div>
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Initialen:</div>
                            <div class="col-md-7">
                            <?php echo $data->Initials; ?> 
                            		
                            </div>
                        
                        </div>  
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Voornaam:</div>
                            <div class="col-md-7">
                            <?php echo $data->Firstname; ?>  
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Achternaam:</div>
                            <div class="col-md-7">
                             <?php echo $data->Lastname; ?>
                            </div>
                        
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Geboortedatum:</div>
                            <div class="col-md-7"> 
                           <?php echo $data->Birthday; ?>                                   
                                </div>
                                
                        </div>
                       
                        <div class="form-row">
                            <div class="col-md-4">Sofinummer:</div>
                            <div class="col-md-7">
                            <?php echo $data->Sofinumber; ?>
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Datum in dienst:</div>
                            <div class="col-md-7">
                            <?php echo $data->Startdate; ?> 
                            
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
                              <?php echo $data->Phone; ?>  
                            		
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7"> 
                            <?php echo $data->Mobile; ?>
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Mobiel 2:</div>
                            <div class="col-md-7">
                            <?php echo $data->Mobile2; ?> 
                            </div>                           
                        </div> 
                        
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Mobiel 3:</div>
                            <div class="col-md-7">
                            <?php echo $data->Mobile3; ?> 
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7">
                            <?php echo $data->Email; ?> 
                            </div>                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Password:</div>
                            <div class="col-md-7">
                            <?php echo @$Password->txt_password;?>
                            </div>                           
                        </div>
                           </div>
                           </div> 
                           
                 <div class="block">

                    <div class="header" >

                   

                       <h2>Beschikbaarheid</h2>

                   

                   

                    </div>

                    <div class="content controls">

                        <div class="form-row">

                            <div class="col-md-4">VCA Certificaat:</div>

                            <div class="col-md-7"> 

                            		 <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" disabled="disabled" <?php if ($data->VCA_Certificaat == 1) {?>checked="checked" <?php } ?> value="1" name="VCA_Certificaat" id="Active2"></div>
                                </div> 

                            </div>                           

                        </div>

                         <div class="form-row">

                            <div class="col-md-4">Eigen auto:</div>

                            <div class="col-md-7"> 

                            		 <div class="checkbox-inline">
                                    &nbsp;&nbsp;<div class="checker" ><input type="checkbox" disabled="disabled" <?php if ($data->Eigen_auto == 1) {?>checked="checked" <?php } ?> value="1" name="Eigen_auto" id="Active3"></div>
                                </div> 

                            </div>                           

                        </div> 

                         <div class="form-row">

                            <div class="col-md-4">Geschikt voor:</div>

                            <div class="col-md-7"> 

                            		 <p><?php echo $data->Geschikt;?></p>
                                     

                            </div>                           

                        </div> 
               

                    </div>

                </div>          
                           
                <div class="block">

                    <div class="header" >

                   

                       <h2>Foto van de werknemer</h2>

                   

                   

                    </div>

                    <div class="content controls">
                        

                        

                        <div class="form-row">
							<?php if (!empty($data->Image)) { ?>
                             <div class="col-md-4">&nbsp;</div>
                            
                             
                              <div class="gallery">
                              <a class="fancybox" rel="group" href="../../uploads/employee/<?php echo $data->Image ?>">
                             <img src="../../uploads/employee/thumbs/<?php echo $data->Image ?>" class="img-thumbnail" style="margin-bottom:10px;" />
                             </a></div>
                            
                            <?php } ?>
                            
                                             
							
                            
                        </div>
                        
                        
                     
                                                

                    </div>

                </div>           
                           
                           
                           
                            <div class="content controls">
                          <div class="form-row">
                          <div class="col-md-6">
        <a href=" <?php echo URL:: to( 'admin/employees' ); ?> " class="btn btn-success" style="float:none;width:100%">Terug</a>
        </div>                       
                    </div> </div>
                </div> 
                    
             
        
      <div class="col-md-6"> 
                
                <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>ID Informatie</h2>
                    </div>                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Id Type:</div>
                            <div class="col-md-7">
                             <?php echo $data->Id_Type; ?> 
                            		
                            </div>
                        </div>
                    <div class="form-row">
                            <div class="col-md-4">Id Nummer:</div>
                            <div class="col-md-7">
                            <?php echo $data->Id_Number; ?> 
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Verloopdatum:</div>
                            <div class="col-md-7">
                             <?php echo $data->Id_Expirationdate; ?>  
                            		 </div>                           
                        </div>  
                        
                        <div class="form-row">
                            <div class="col-md-4">Nationaliteit:</div>
                            <div class="col-md-7">
                             <?php 
							 $country = DB::table('tblcountries')->where('id', '=', $data->Nationality)->first();
							if (!empty($country->Name)) {
							 echo $country->Name; } else {
							echo '';	 
							}?>  
                            		 </div>                           
                        </div>                                      
                    </div>
                </div>       
          <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Adres gegevens</h2>
                    </div>
                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7">
                            <?php echo $data->Address; ?> 
                            		
                            </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7">
                             <?php echo $data->Zipcode; ?>
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7"> 
                            <?php echo $data->City; ?>
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
                            <div class="col-md-5">Actief:</div>
                           <div class="col-md-7">                              
                                <div class="checkbox-inline">
                                    <label><div class="checker" ><input type="checkbox" value="1" name="Active" <?php if ($data->Active == 1){?> checked="checked" <?php }?> disabled="disabled"></div></label>
                                </div>                                
                                                            
                            </div>                          
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Uitzendbureau:</div>
                            <div class="col-md-7"> 
                            <?php echo $agency->Name; ?>                            		
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Uitzendbureau notitie:</div>
                            <div class="col-md-7">
                            <?php echo $data->Employmentagencynote; ?> 
                            </div>                           
                        </div> 
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Tarief p/u:</div>
                            <div class="col-md-5"> 
                            <?php echo $data->Rate; ?> €
                            </div>              
                        </div>
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Kosten p/u:</div>
                            <div class="col-md-5">
                             <?php echo $data->Cost; ?> €
                             </div>                       
                        </div>    
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">Afspraken:</div>
                            <div class="col-md-7"> 
                            	 <?php echo $data->Notes; ?>
                                  
                            </div>                           
                        </div>
                                             
                    </div>
                </div>        
                
         <div class="block">

                    <div class="header" >
  
                            
    
                            
                            
                   

                       <h2>Documenten van de werknemer</h2>

                    </div>

                    <div class="content">
                        

                     <table class="table table-bordered table-striped no-footer" width="100%">
                     <tr>
                     <th>Document Type</th>
                     <th>Vervaldatum</th>                    
                     <th>Downloaden</th>
                     <th>Opties</th>
                     </tr>
                     <?php 
					 if (!empty($Documents)) {
					 foreach ($Documents as $Doc ) { ?>                     
                     <tr>
                     <td><?php echo $Doc->DocType?></td>
                     <td><?php echo $Doc->ExpiryDate?></td>                    
                     <td><?php $ext = pathinfo($Doc->File, PATHINFO_EXTENSION);
					 if ($ext == 'jpg') { ?>
                     <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/jpg.png') }}" style=" cursor:pointer; width:32px; height:32px;"></a> <?php } 
					 if ($ext == 'png') { ?>  <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img class=" " src="{{ URL::asset('assets/img/icons/png.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
					 <?php } if ($ext == 'xls') { ?>
                     <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img src="{{ URL::asset('assets/img/icons/xls.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
                     <?php } if ($ext == 'pdf') { ?> 
                      <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/pdf.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
                      <?php } if ($ext == 'docx' || $ext == 'doc') { ?> 
                      <a href="../../uploads/employee/document/<?php echo $Doc->File?>" title="Downloaden"><img  src="{{ URL::asset('assets/img/icons/docx.png') }}" style=" cursor:pointer;width:32px; height:32px;"></a> 
                      <?php }?>
                      
                      </td>
                      <td>
                      <a href="javascript:void(0)" onclick="getdocinfo('<?php echo $Doc->id; ?>');" title="Bewerken" class="widget-icon" ><span class="icon-pencil"></span></a>
                      <a href="<?php echo URL:: to( 'admin/DeleteEmployeeDoc',$Doc->id ); ?>" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a></td>
                     </tr>
                     <?php } } else {?>
                     
                     <tr>
                     <td colspan="4" align="center"> Geen bestand gevonden...!</td>
                     </tr>
                     <?php } ?>
                     </table>   

                        

                                                

                    </div>

                </div>                           
        </div>  
       
            </div>
            
         
  </div>  
  
  <script>

function getdocinfo (id) {
	
	
	$.get('<?php echo URL:: to( '/' ); ?>/AjaxDocument?id=' + id,function(data) {
			
			 $('#Exp_date').val(data.ExpiryDate);
			 $('#Doc_Type').val(data.DocType);
			 $('#emp_id').val(data.emp_id);
			 $('#doc_id').val(id);				
			$('#modal_default_4').modal('show');
		});
	
	
	}



$(document).ready(function() {
	
	});

</script> 
       @include('admin/footer')</div>  