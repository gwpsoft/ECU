<!-- Header -->
    @include('admin/header')
     <title>Afvalcontainers bestelling</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .center { text-align:center;} 
 label { font-size:13px;}
table th,td { font-size:12px;}
</style> 

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>                    
                    <li class="active">Bestelformulier Afvalcontainers</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'admin/update_order']) !!}
    <input type="hidden" name="Customer_id" id="Customer_id" value="<?=$data['Customer_id']?>"  />
     <input type="hidden" name="id" value="<?=$data['id']?>" />
     <input type="hidden" name="Rev_Nummer" value="<?=$data['Nummer']?>" />
      <input type="hidden" name="Nummer" value="<?=$data['Nummer']?>" />
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
                       <h2>Bestelformulier Afvalcontainers</h2>
                        <div style="float:right"><a href=" <?php echo URL:: to( 'admin/Edit_OrderWasteContainer',$data['id'] ); ?> " class="btn btn-success">Wijzigen</a> </div>                                   
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-2">Klantnaam:</div>
                            <div class="col-md-4"> <?=$customer->Name;?>
                            
                            </div>
                             <div class="col-md-2">ECU Project/Debiteur #:</div>
                            <div class="col-md-4"> 
                            	<?=@$data['ECO_Project_nr'];?>
                            </div> 
                        </div>
                        
                       
                         <div class="form-row">
                            <div class="col-md-2">Project naam:</div>
                            <div class="col-md-4"> 
                            <?=$ProjectName->Name;?>	
                            
                            </div>
                              <div class="col-md-2">Client projectnummer:</div>
                            <div class="col-md-4"> 
                            	<?=$data['Projectnummer'];?>
                            </div>                        
                        </div> 
                        
                          <div class="form-row">
                            <div class="col-md-2">Postcode & plaats:</div>
                            <div class="col-md-4"> 
                            		<?=$data['Postcode']?>
                            </div>
                               <div class="col-md-2">Werkadres:</div>
                            <div class="col-md-4"> 
                            		<?=$data['Work_Address'];?>
                            </div>                           
                        </div>   
                       
                        
                         <div class="form-row">
                            <div class="col-md-2">Telefoonnummer:</div>
                            <div class="col-md-4"> 
                            	<?=$data['phone_number']?>
                            </div>
                               <div class="col-md-2">Contactpersoon:</div>
                            <div class="col-md-4"> 
                            	<?=$contact->Firstname.' '.$contact->Lastname?>
                            </div>                                  
                        </div>
                        
                        
                          <div class="form-row">
                            <div class="col-md-2">E-mail adres:</div>
                            <div class="col-md-4"> 
                            	<?=$data['Email']?>
                            </div>
                               <div class="col-md-2">Afvalverwerker:</div>
                            <div class="col-md-4"> 
                            	<?=@$ShippingComany->Companyname?>
                            </div>                              
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-2">Besteldatum:</div>
                            <div class="col-md-4"> 
                             <?=$data['Order_Date']?>
                            </div>
                                          
                             <div class="col-md-2">Fax:</div>
                            <div class="col-md-4"> 
                            	<?=$data['Fax']?>
                            </div>
                          
                        </div>
                                          
                         <div class="form-row">
                            <div class="col-md-2">Nummer:</div>
                            <div class="col-md-4"> 
                            	BN-00<?=$data['Nummer']?>
                            </div> 
                              <div class="col-md-2">Tijd:</div>
                            <div class="col-md-4">
                          <?=$data['time']?>
                            </div>    
                           
                            
                            </div>
                            
                             <div class="form-row">
                            <?php if (@$data['Rev_Nummer'] !=0){ ?>
                              <div class="col-md-2">Revised Nummer:</div>
                            <div class="col-md-4"> 
                           BN-00<?=@$data['Rev_Nummer']?>
                            </div>
                            <?php } ?> 
                            
                              <div class="col-md-2">Status:</div>
                            <div class="col-md-4"> 
                            <?php echo $data['Status'] == 0  ? 'Besteld'  : ($data['Status'] == 1 ? 'Gewijzigd' : 'Geannuleerd') ?> 
                            </div> 
                            
                            
                                                    
                        </div>
                         
                </div>         
            </div>
             <div class="block">
                    <div class="header" >                    
                       <h2>Opdracht</h2>                                    
                    </div>
                    <div class="content controls">
                 
                    <div class="form-row">
                            <div class="col-md-2">Uitvoerdatum:</div>
                            <div class="col-md-4"> 
                            	<?=$data['output_Date']?>
                            </div>
                            <div class="col-md-2">Dagdeel / gewenste tijd:</div>
                            <div class="col-md-4">                             
							<?php if ($data['Half_day_time'] == 1) { echo 'Zo spoedig mogelijk';}?>
                            <?php if ($data['Half_day_time'] == 2) { echo 'Ochtend';}?>
                            <?php if ($data['Half_day_time'] == 3) { echo 'Middag';}?>
                            <?php if ($data['Half_day_time'] == 4) { echo 'Avond';}?>
                            <?php if ($data['Half_day_time'] == 5) { echo 'Zie opmerkingen';}?>                            
                          
                            </div>         
                            </div>
                            
                             <div class="form-row">
                             <div class="col-md-2">Opmerkingen:</div>
                            <div class="col-md-10"> 
                            	 <?=$data['Comments']?>
                            </div>       
                            </div>
                                                                           
                  		  </div>
                 	   </div>  
                	   </div>
                    
            
      <div class="col-md-4"> 
         <div class="block">
                    <div class="header" >                    
                       <h2>Aantal containers</h2>                                    
                    </div>
                    <div class="content">
                 
             <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>
    
      <tr >
      <th rowspan="2" class="center">Container type</th>
      <th colspan="3" class="center">Aantal containers</th>     
    </tr>
    
    <tr >
      <th class="center">Plaats</th>
      <th class="center">Wissel</th>
      <th class="center">Afvoer</th>
    </tr>
  </thead>
  <tbody>
   <tr>
      <th scope="row">Rolcontainer</th>
      <td ><?=$data['rl_plaats'] > 0 ? $data['rl_plaats']:'&nbsp;'?></td>
      <td ><?=$data['rl_Wissel']> 0 ? $data['rl_Wissel']:'&nbsp;'?></td>
      <td ><?=$data['rl_Afvoer']> 0 ? $data['rl_Afvoer'] :'&nbsp;'?></td>
    </tr>
    
    <tr>
      <th scope="row">3m<sup>3</sup></th>
      <td><?=$data['3m3_plaats']?>&nbsp;</td>
      <td><?=$data['3m3_Wissel']?>&nbsp;</td>
      <td><?=$data['3m3_Afvoer']?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">6m<sup>3</sup></th>
      <td><?=$data['6m3_plaats']?>&nbsp;</td>
      <td><?=$data['6m3_Wissel']?>&nbsp;</td>
      <td><?=$data['6m3_Afvoer']?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">10m<sup>3</sup></th>
       <td><?=$data['10m3_plaats']?>&nbsp;</td>
      <td><?=$data['10m3_Wissel']?>&nbsp;</td>
      <td><?=$data['10m3_Afvoer']?>&nbsp;</td>
    </tr>
     <tr>
      <th scope="row">10m<sup>3</sup>dicht</th>
       <td><?=$data['10m3_plaats_dicht']?>&nbsp;</td>
      <td><?=$data['10m3_Wissel_dicht']?>&nbsp;</td>
      <td><?=$data['10m3_Afvoer_dicht']?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">20m<sup>3</sup></th>
        <td><?=$data['20m3_plaats']?>&nbsp;</td>
      <td><?=$data['20m3_Wissel']?>&nbsp;</td>
      <td><?=$data['20m3_Afvoer']?>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">30m<sup>3</sup></th>
       <td><?=$data['30m3_plaats']?>&nbsp;</td>
      <td><?=$data['30m3_Wissel']?>&nbsp;</td>
      <td><?=$data['30m3_Afvoer']?>&nbsp;</td>
    </tr>
    
    
    <tr>
      <th scope="row">40m<sup>3</sup></th>
       <td><?=$data['40m3_plaats']?>&nbsp;</td>
      <td><?=$data['40m3_Wissel']?>&nbsp;</td>
      <td><?=$data['40m3_Afvoer']?>&nbsp;</td>
    </tr>
  
  </tbody>
</table>                   
                  		  </div>
                 	   </div>       
        </div>                      
            <div class="col-md-8"> 
       <div class="block">
                    <div class="header" >                    
                       <h2>Aantal per afvalstroom</h2>                                    
                    </div>
                    <div class="content">
                 
               <table class="table table-bordered" style="text-align:center;">
  <thead>
      <tr>
        <th colspan="7" class="center" style="font-size:12px;">Aantal per afvalstroom</th>
      </tr>
    <tr style="font-size:12px;">     
      <th class="center" width="12%" >BSA</th>
      <th class="center"  width="12%">Puin</th>
      <th class="center"  width="12%">Hout</th>      
      <th class="center" width="15%">Plastic Folie</th>
      <th class="center" width="12%">Papier</th>
      <th class="center"  width="12%">Diverse</th>
      <th class="center"  width="25%">Opmerkingen</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><?=$data['rl_Bsa']?>&nbsp;</td>
       <td><?=$data['rl_Puin']?>&nbsp;</td>
      <td><?=$data['rl_Hout']?>&nbsp;</td>      
       <td><?=$data['rl_Plastic_Folie']?>&nbsp;</td>
      <td><?=$data['rl_Papier']?>&nbsp;</td>
      <td><?=$data['rl_Diverse']?>&nbsp;</td>
      <td><?=$data['rl_Opmerkingen']?>&nbsp;</td>
      
    </tr>
    
    
    <tr>
      <td scope="row"><?=$data['3m3_Bsa']?>&nbsp;</td>
       <td><?=$data['3m3_Puin']?>&nbsp;</td>
      <td><?=$data['3m3_Hout']?>&nbsp;</td>      
       <td><?=$data['3m3_Plastic_Folie']?>&nbsp;</td>
      <td><?=$data['3m3_Papier']?>&nbsp;</td>
      <td><?=$data['3m3_Diverse']?>&nbsp;</td>
      <td><?=$data['3m3_Opmerkingen']?>&nbsp;</td>
      
    </tr>
    <td scope="row"><?=$data['6m3_Bsa']?>&nbsp;</td>
       <td><?=$data['6m3_Puin']?>&nbsp;</td>
      <td><?=$data['6m3_Hout']?>&nbsp;</td>     
       <td><?=$data['6m3_Plastic_Folie']?>&nbsp;</td>
      <td><?=$data['6m3_Papier']?>&nbsp;</td>
       <td><?=$data['6m3_Diverse']?>&nbsp;</td>
      <td><?=$data['6m3_Opmerkingen']?>&nbsp;</td>
     
    </tr>
     <td scope="row"><?=$data['10m3_Bsa']?>&nbsp;</td>
       <td><?=$data['10m3_Puin']?>&nbsp;</td>
      <td><?=$data['10m3_Hout']?>&nbsp;</td>      
       <td><?=$data['10m3_Plastic_Folie']?>&nbsp;</td>
      <td><?=$data['10m3_Papier']?>&nbsp;</td>
      <td><?=$data['10m3_Diverse']?>&nbsp;</td>
      <td><?=$data['10m3_Opmerkingen']?>&nbsp;</td>
      
    </tr>
      <td scope="row"><?=$data['10m3_Bsa_dicht']?>&nbsp;</td>
       <td><?=$data['10m3_Puin_dicht']?>&nbsp;</td>
      <td><?=$data['10m3_Hout_dicht']?>&nbsp;</td>     
       <td><?=$data['10m3_Plastic_Folie_dicht']?>&nbsp;</td>
      <td><?=$data['10m3_Papier_dicht']?>&nbsp;</td>
      <td><?=$data['10m3_Diverse_dicht']?>&nbsp;</td>
      <td><?=$data['10m3_Opmerkingen_dicht']?>&nbsp;</td>
      
    </tr>
    <tr>
    <td scope="row"><?=$data['20m3_Bsa']?>&nbsp;</td>
       <td><?=$data['20m3_Puin']?>&nbsp;</td>
      <td><?=$data['20m3_Hout']?>&nbsp;</td>      
       <td><?=$data['20m3_Plastic_Folie']?>&nbsp;</td>
      <td><?=$data['20m3_Papier']?>&nbsp;</td>
      <td><?=$data['20m3_Diverse']?>&nbsp;</td>
      <td><?=$data['20m3_Opmerkingen']?>&nbsp;</td>      
    </tr>
    <tr>
    <td scope="row"><?=$data['30m3_Bsa']?>&nbsp;</td>
       <td><?=$data['30m3_Puin']?>&nbsp;</td>
      <td><?=$data['30m3_Hout']?>&nbsp;</td>      
       <td><?=$data['30m3_Plastic_Folie']?>&nbsp;</td>
      <td><?=$data['30m3_Papier']?>&nbsp;</td>
      <td><?=$data['30m3_Diverse']?>&nbsp;</td>
      <td><?=$data['30m3_Opmerkingen']?>&nbsp;</td>      
    </tr>
    
    <tr>
   <td scope="row"><?=$data['40m3_Bsa']?>&nbsp;</td>
       <td><?=$data['40m3_Puin']?>&nbsp;</td>
      <td><?=$data['40m3_Hout']?>&nbsp;</td>      
       <td><?=$data['40m3_Plastic_Folie']?>&nbsp;</td>
      <td><?=$data['40m3_Papier']?>&nbsp;</td>
      <td><?=$data['40m3_Diverse']?>&nbsp;</td>
      <td><?=$data['40m3_Opmerkingen']?>&nbsp;</td>
     
    </tr>
  
  </tbody>
</table>
                                                                           
                  		  </div>
                 	   </div>
       
       </div>      
        
        
          <div class="col-md-6">
         <div class="content controls">
                        <div class="form-row" style="float:right" >
                        
                            <div class="col-md-6" >
                         	<a href="<?php echo URL:: to( 'admin/OrderWasteContainer' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
                            	
                            </div>              
                         
                             <br /> <br />                                              
                    </div>
                </div>                           
        </div>  
      </div>
      
       
       
          
            
    {!! Form::close() !!}        
  </div>   
       @include('admin/footer')</div>  