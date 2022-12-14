<!-- Header -->
    @include('admin/header')
     <title>Project gegevens . . . .</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
.center { text-align:center;} 
.left { text-align:left}
label { font-size:13px;}
table th,td { font-size:12px;}
 div.radio { margin-left:0px;} .strong { font-weight:bold; font-size:14px;}
 div.checker, div.checker span, div.checker input, div.radio, div.radio span, div.radio input { vertical-align:text-bottom;}
</style> 
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>                    
                    <li class="active">Project gegevens</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
    {!! Form::open(['url'=> 'project']) !!}
   <div class="col-md-12">
 @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
	<?php 
	 @$Department = DB::table('tbldepartment')->where('id', $data->Department_Id)->first();  
     @$Customer = DB::table('tblcustomer')->where('Id', $data->Customer_id)->first();  
    @$Contact = DB::table('tblcontact')->where('id', $data->Contact_Id)->first();  
     @$ProjectManager = DB::table('tblprojectmanager')->where('id', $data->Projectmanager_Id)->first();  
     $Shippingcompany = DB::table('tblshippingcompany')->where('id', $data->Shippingcompany_id)->first();  
	 
	
   ?>
    <div class="col-md-6">
                
                <div class="block">
                    <div class="header" >
                    
                       <h2>Project gegevens</h2>
                                    
                    </div>
                    <div class="content controls">
                    <div class="form-row">
                            <div class="col-md-4">Naam:</div>
                            <div class="col-md-7"> {{ $data->Name }}  </div>
                        
                        </div>
                    
                        <div class="form-row">
                          <div class="col-md-4">Klant:</div>
                            <div class="col-md-7">
                              <?php if (@$customers !='') { echo @$customers->Name; }?>
                           
                            </div>
                          </div>
                       
                       
                       
                       <div class="form-row">
                          <div class="col-md-4">Afdeling:</div>
                            <div class="col-md-7">
                            <?php if (!empty($Department)) { echo $Department->Name; }?>
                            
                           
                            </div>
                          </div>
                       
                          <div class="form-row">
                          <div class="col-md-4">Contact:</div>
                            <div class="col-md-7">
                               <?php if ($Contact !='') { echo $Contact->Firstname; }?>
                            
                             </div>
                          </div>
                       
                       <div class="form-row">
                            <div class="col-md-4">Actief:</div>
                           <div class="col-md-7"><?php echo $data->Active == 1 ? 'Yes' : 'No';?> 
                            </div>                          
                        </div>
                       
                       <div class="form-row">
                            <div class="col-md-4">Start datum:</div>
                            <div class="col-md-7"> {{ $data->Start_Date }}                          
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Eind datum:</div>
                            <div class="col-md-7"> {{ $data->End_Date }}
                        </div>
                        </div>
                        
                        
                       <div class="form-row">
                          <div class="col-md-4">Project Manager:</div>
                            <div class="col-md-7">
                             <?php if ($ProjectManager !='') { echo $ProjectManager->Firstname; }?>
                            
                          
                            </div>
                          </div>                       
                       
                        
                       <div class="form-row">
                            <div class="col-md-4">Beschrijving:</div>
                            <div class="col-md-7"> {{ $data->Description }}                            	
                            </div>
                        
                        </div>  
                        
                        <div class="form-row">
                            <div class="col-md-4">Vaste prijs:</div>
                            <div class="col-md-7">€ {{ $data->Fixed }} 
                             </div>
                                                 
                        </div>
                        
                          <div class="form-row">
                            <div class="col-md-4">Tarief p/u:</div>
                            <div class="col-md-7"> € {{ $data->Rate }}                            	
                            </div>
                                             
                        </div>
                        
                        
                        
                        <div class="form-row">
                            <div class="col-md-4">ECU Project/Debiteur #:</div>
                            <div class="col-md-7"> {{ $data->Project_ref }} </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4">Klant proj. nr.:</div>
                            <div class="col-md-7"> {{ $data->Customer_ref }}
                            </div>
                        
                        </div>
                        
                         <div class="form-row">
                            <div class="col-md-4">Containers Leveranciers:</div>
                            <div class="col-md-7"> <?php if (!empty($Shippingcompany->Companyname)) { echo $Shippingcompany->Companyname;} else { echo 'Nee';}?> 
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
                            <div class="col-md-7">{{ $data->Notes }}
                            </div>                           
                        </div>
                                             
                    </div>
                </div>
                    
                    
                    
                    
                    
                    
                    
             </div>
            
      <div class="col-md-6"> 
      
            <div class="block">
                    <div class="header" >
                    <div class="col-md-5">
                       <h2>Contact Informatie</h2>
                    </div>
                   
                    </div>
                    <div class="content controls">
                    <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7">{{ $data->Fax }}  </div>                           
                        </div>
                    
                    
                    
                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7"> {{ $data->Address }} </div>                           
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7"> {{ $data->Zipcode }}
                            </div>                           
                        </div> 
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7">{{ $data->City }} 
                            </div>                           
                        </div>                          
                    </div>
                </div>
            
          
            
               
                
                       
                       
            
       <div class="block">
                    <div class="header" >
                   
                       <h2>Weekstaten</h2>
                   
                   
                    </div>
                    <div class="content controls">
                   
                        
                        <div class="form-row">
                            <div class="col-md-4">Weekstaten:</div>
                            <div class="col-md-7">
                             <?php
        if (isset($weekcards) && count($weekcards)>0 ) {
            foreach ($weekcards as $weekcard) {
                $weekno_m3 = date('YW',strtotime('-3 month'));
                $weekno_m6 = date('YW',strtotime('-6 month'));
                if ( $weekno_m3 < $weekcard->Weeknumber ) {
                    $classname="3";
                } elseif ( $weekno_m6 < $weekcard->Weeknumber ) {
                    $classname="6";
                } else {
                    $classname="rest";
                } ?>
                
                
                <li class="weekcard_<?=$classname?>"><a href="<?php echo URL:: to( 'admin/Edit-weekstaat',$weekcard->id); ?>"><?=$weekcard->Weeknumber?>( Verzonden : <?=$weekcard->Sent_Date ?> )</a> </li>
                
          <?php } }?>     
                            
                          
                            </div>                           
                        </div>
                                             
                    </div>
                </div>   
                
         <div class="block">
                    <div class="header" >
                   
                       <h2>Uitvoerder</h2>
                   
                   
                    </div>
                    <div class="content controls">
                   
                        
                        <div class="form-row">
                            <div class="col-md-4">Voornaam:</div>
                            <div class="col-md-7"><?=@$Contact->Firstname?></div>
                            </div>
                              <div class="form-row">
                             <div class="col-md-4">Achternaam:</div>
                            <div class="col-md-7"><?=@$Contact->Lastname?></div>
                               </div>
                              <div class="form-row">
                             <div class="col-md-4">Uitvoerder Tel.:</div>
                            <div class="col-md-7"><?=@$Contact->Phone?></div>
                               </div>
                              <div class="form-row">
                             <div class="col-md-4">Mobiel:</div>
                            <div class="col-md-7"><?=@$Contact->Mobile?></div>                           
                        </div>
                                             
                    </div>
                </div>                           
      	
               
          </div>
          
        <div class="col-md-12"> 
        
        
        <div class="block">
                    <div class="header">
                       <h2>Communicatie</h2>                  
                      <span class="pull-right clickable "><i class="icon-chevron-down"></i></span>
                        </div>
                      <div class="content" style="display:none">
                            <?php							
							if (!empty($GetContacts) ) { ?>
                        <table class="table table-bordered" style="text-align:center; font-size:12px;">
                        <thead>
                        <tr>
                        <th class="center" width="5%">Aan</th>
                        <th  class="center" width="5%">Cc</th>
                        <th  class="center" width="5%">Login</th>
                        <th  class="center">Naam</th>
                        <th  class="center">Email</th>
                        <th  class="center">Mobilenummer</th>
                        </tr>  
                        </thead>
                        <tbody>
						<?php  				
						foreach ($GetContacts as $cont){  
						$Aan = explode (',',$data->AanTo); 	
						$Cc = explode (',',$data->CcTo);
						$ProjectTo = explode (',',$data->ProjectTo); 	
						?> 
                         <tr>
                         <td class="center">
                         <input type="checkbox" name="Aan[]" class="checkbox" disabled="disabled" value="<?=$cont->id?>" <? if (in_array($cont->id,$Aan)) { ?> checked="checked" <?php } ?>   /></td>
                          <td class="center">
                          <input type="checkbox" name="Cc[]" class="checkbox" disabled="disabled" value="<?=$cont->id?>" <? if (in_array($cont->id,$Cc)) { ?> checked="checked" <?php } ?>/></td>
                           <td class="center">
                           <input type="checkbox" name="ProjectTo[]" class="checkbox" disabled="disabled" style="margin-right:20px;" value="<?=$cont->id?>" <? if (in_array($cont->id,$ProjectTo)) { ?> checked="checked" <?php } ?>/></td>
                            <td class="center"><?=$cont->Firstname?> <?=$cont->Lastname?></td>
                             <td class="center"><?=$cont->Email?></td>
                             <td class="center"><?=$cont->Mobile?></td>
                         </tr>
                        
                        <?php }} else {?>
                        <tr>
                        <td colspan="5">geen contacten met email gevonden! </td>
                        </tr>
                       
                        <?php } ?>
                       </tbody>
                       </table>                      
                    </div>
                </div>
             
         
         <div class="block">
                    <div class="header" >                   
                       <h2>Prijslijst All-in</h2>
                       <span class="pull-right clickable "><i class="icon-chevron-down"></i></span>
                    
                    </div>
                    <div class="content " style="display:none">
                    
                    <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>
  <tr>
  <th class="center" width="12%">Container Maten</th>
  <th colspan="2" class="center">BSA</th>
  <th colspan="2" class="center">Hout</th>
  <th colspan="2" class="center">Puin</th>
  </tr>  
  </thead>
  
  <tbody>
     <tr style="border:none;">
     <th class="left">&nbsp;</th>
   	 <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
       <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
       <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
    </tr>
  <tr>
  
  <td>3m<sup>3</sup>:</td>
  <td><div class="col-md-10"> {{ @$pricelist->pr_3m3_bsa }} € </div> </td>
  <td><div class="col-md-10">{{ @$pricelist->sl_pr_3m3_bsa }} € </div> </td>
  <td><div class="col-md-10">{{@$pricelist->pr_3m3_hout  }} € </div></td>
  <td><div class="col-md-10">{{ @$pricelist->sl_pr_3m3_hout}} € </div></td>
  <td><div class="col-md-10"> {{ @$pricelist->pr_3m3_puin }} € </div> </td>
  <td><div class="col-md-10">{{ @$pricelist->sl_pr_3m3_puin }} € </div> </td>
  </tr>
  
  <tr>
  <td>6m<sup>3</sup>:</td>
  <td> <div class="col-md-10">{{ @$pricelist->pr_6m3_bsa }} € </div>   </td>
  <td> <div class="col-md-10"> {{ @$pricelist->sl_pr_6m3_bsa }} € </div>   </td>
  <td>  <div class="col-md-10">{{ @$pricelist->pr_6m3_hout  }} € </div>   </td>
  <td>  <div class="col-md-10">{{@$pricelist->sl_pr_6m3_hout  }} € </div>   </td>
  <td> <div class="col-md-10">{{@$pricelist->pr_6m3_puin  }} € </div> </td>
  <td> <div class="col-md-10">{{@$pricelist->sl_pr_6m3_puin  }} € </div> </td>
  
  
  </tr>
  
  <tr>
  <td>10m<sup>3</sup>:</td>
  <td><div class="col-md-10" > {{ @$pricelist->pr_10m3_bsa }} € </div> </td>
  <td><div class="col-md-10" > {{ @$pricelist->sl_pr_10m3_bsa }} € </div> </td>
  <td><div class="col-md-10"> {{ @$pricelist->pr_10m3_hout }} € </div></td>
  <td><div class="col-md-10">{{@$pricelist->sl_pr_10m3_hout  }} € </div></td>
  <td><div class="col-md-10">{{ @$pricelist->pr_10m3_puin }} € </div></td>
  <td><div class="col-md-10"> {{ @$pricelist->sl_pr_10m3_puin }} € </div></td>
  </tr>
  
  
  <tr>
  <td>20m<sup>3</sup>:</td>
  <td> <div class="col-md-10" > {{@$pricelist->pr_20m3_bsa  }} € </div></td>
  <td> <div class="col-md-10" > {{ @$pricelist->sl_pr_20m3_bsa }} € </div></td>
  <td><div class="col-md-10"> {{ @$pricelist->pr_20m3_hout }} € </div></td>
  <td><div class="col-md-10">{{ @$pricelist->sl_pr_20m3_hout }} € </div></td>
  <td><div class="col-md-10"> {{ @$pricelist->pr_20m3_puin }} € </div></td>
  <td><div class="col-md-10"> {{ @$pricelist->sl_pr_20m3_puin }} € </div></td>
  </tr>
  
  </tbody>
  </table>
                    </div>
                </div>
         
         
             <div class="block">
                    <div class="header" >                   
                       <h2>Prijslijst</h2>
                        <span class="pull-right clickable "><i class="icon-chevron-down"></i></span> 
                    </div>
                     <div class="content " style="display:none">
                    
   <table class="table table-bordered" style="text-align:center; font-size:12px;">
  <thead>
    
      <tr>
 	  <th class="center" width="10%">Article No</th>
      <th width="45%" class="center">Description</th>  
      <th width="30%" class="center" colspan="2">Price</th>
      <th width="30%" class="center">Unit</th>    
    </tr>
    </thead>
    <tbody>
    <tr style="border:none;">
    <td colspan="5" class="left"><h5>Transporttarief per container (voor dit tarief wordt de container geleverd en opgehaald)</h5></td>
    </tr>
     <tr style="border:none;">
     <td colspan="2" class="left">&nbsp;</td>
   	 <th class="center">Inkoop</th>
      <th class="center">Verkoop</th>
      <td>&nbsp;</td>
      
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_10m3)) { ?>{{ @$pricelist->article_no_10m3 }}<?php } ?></td>    
    <td class="left">Transportkosten containers met een inhoud van 3 m<sup>3</sup> tot en met 10 m<sup>3</sup></td>
    <td> <?php if (!empty($pricelist->Price_10m3)) { ?>{{  @$pricelist->Price_10m3 }} &nbsp; € <?php } ?></td>
    <td> <?php if (!empty($pricelist->sale_Price_10m3)) { ?>{{  @$pricelist->sale_Price_10m3 }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_10m3)) { ?>Per {{ @$pricelist->Unit_10m3 }} <?php } ?></td>
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_40m3)) { ?>{{ @$pricelist->article_no_40m3 }}<?php } ?></td>    
    <td class="left">Transportkosten containers met een inhoud van 15 m<sup>3</sup> tot en met 40 m<sup>3</sup></td>
    <td><?php if (!empty($pricelist->Price_40m3)) { ?>{{ @$pricelist->Price_40m3 }} &nbsp; € <?php } ?></td>
     <td><?php if (!empty($pricelist->sale_Price_40m3)) { ?>{{ @$pricelist->sale_Price_40m3 }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_40m3)) { ?>Per {{ @$pricelist->Unit_40m3 }} <?php } ?></td>
    </tr>
    
     <tr style="border:none;"><td colspan="4" class="left"><h5>Verwerkingstariet per ton (1000 kg)</h5></td></tr>
   
     <tr>
    
    <td><?php if (!empty($pricelist->article_no_sorteerbaar)) { ?>{{ @$pricelist->article_no_sorteerbaar }} <?php } ?></td>
    
    <td class="left">
    Bouw- en sloopafval (sorteerbaar)  
   </td>
    <td><?php if (!empty($pricelist->Price_sorteerbaar)) { ?>{{ @$pricelist->Price_sorteerbaar }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_sorteerbaar)) { ?>{{ @$pricelist->sale_Price_sorteerbaar }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_sorteerbaar)) { ?>Per {{ @$pricelist->Unit_sorteerbaar }}<?php } ?></td>
    </tr>
    
    <tr>
    
    <td><?php if (!empty($pricelist->article_no_niet_sorteerbaar)) { ?>{{ @$pricelist->article_no_niet_sorteerbaar }} <?php } ?></td>
    
    <td class="left">
   Bouw- en sloopafval (niet sorteerbaar)   
   </td>
    <td><?php if (!empty($pricelist->Price_niet_sorteerbaar)) { ?>{{  @$pricelist->Price_niet_sorteerbaar }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_niet_sorteerbaar)) { ?>{{  @$pricelist->sale_Price_niet_sorteerbaar }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_niet_sorteerbaar)) { ?>Per {{ @$pricelist->Unit_niet_sorteerbaar }}<?php } ?></td>
    </tr>
     <tr>
    
    <td><?php if (!empty($pricelist->article_no_Bedrijfsafval)) { ?>{{  @$pricelist->article_no_Bedrijfsafval }}<?php } ?></td>    
    <td class="left">Bedrijfsafval</td>
    <td><?php if (!empty($pricelist->Price_Bedrijfsafval)) { ?>{{  @$pricelist->Price_Bedrijfsafval }} &nbsp; € <?php } ?></td>
     <td><?php if (!empty($pricelist->sale_Price_Bedrijfsafval)) { ?>{{  @$pricelist->sale_Price_Bedrijfsafval }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Bedrijfsafval)) { ?>Per {{ @$pricelist->Unit_Bedrijfsafval}} <?php } ?></td>
    </tr>
    
    <tr>
    
    <td><?php if (!empty($pricelist->article_no_A_B_hout)) { ?>{{  @$pricelist->article_no_A_B_hout }} <?php } ?></td>
    
    <td class="left">
    Gemengd hout (A- enlof B- hout)  
   </td>
    <td><?php if (!empty($pricelist->Price_A_B_hout)) { ?>{{  @$pricelist->Price_A_B_hout }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_A_B_hout)) { ?>{{  @$pricelist->sale_Price_A_B_hout }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_A_B_hout)) { ?>Per {{ @$pricelist->Unit_A_B_hout}}<?php } ?></td>
    </tr>
     <tr>
    
    <td><?php if (!empty($pricelist->article_no_C_hout)) { ?>{{  @$pricelist->article_no_C_hout }}<?php } ?></td>
    
    <td class="left">C- hout</td>
    <td><?php if (!empty($pricelist->Price_C_hout)) { ?>{{  @$pricelist->Price_C_hout }} &nbsp; €<?php } ?></td>
     <td><?php if (!empty($pricelist->sale_Price_C_hout)) { ?>{{  @$pricelist->sale_Price_C_hout }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_C_hout)) { ?>Per {{ @$pricelist->Unit_C_hout}}<?php } ?></td>
    </tr>
    
    <tr>
    <td><?php if (!empty($pricelist->article_no_Schoon_puin)) { ?>{{  @$pricelist->article_no_Schoon_puin }}<?php } ?></td>    
    <td class="left">Schoon puin(< 60 cm)</td>
    <td><?php if (!empty($pricelist->Price_Schoon_puin)) { ?>{{  @$pricelist->Price_Schoon_puin }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Schoon_puin)) { ?>{{  @$pricelist->sale_Price_Schoon_puin }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Schoon_puin)) { ?>Per {{ @$pricelist->Unit_Schoon_puin}}<?php } ?></td>
    </tr>
    
     <tr>    
    <td><?php if (!empty($pricelist->article_no_Puin_Grof)) { ?>{{  @$pricelist->article_no_Puin_Grof }}<?php } ?></td>    
    <td class="left">Puin Grof (> 60 cm)</td>
    <td><?php if (!empty($pricelist->Price_Puin_Grof)) { ?>{{  @$pricelist->Price_Puin_Grof }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Puin_Grof)) { ?>{{  @$pricelist->sale_Price_Puin_Grof }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Puin_Grof)) { ?>Per {{ @$pricelist->Unit_Puin_Grof }}<?php } ?></td>
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_Puin_met_10)) { ?>{{  @$pricelist->article_no_Puin_met_10 }}<?php } ?></td>    
    <td class="left">Puin met 10% tot 25% zand I grond</td>
    <td><?php if (!empty($pricelist->Price_Puin_met_10)) { ?>{{  @$pricelist->Price_Puin_met_10 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Puin_met_10)) { ?>{{  @$pricelist->sale_Price_Puin_met_10 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Puin_met_10)) { ?>Per {{ @$pricelist->Unit_Puin_met_10}}<?php } ?></td>
    </tr>
    
     <tr>    
    <td><?php if (!empty($pricelist->article_no_Puin_met_25)) { ?>{{  @$pricelist->article_no_Puin_met_25 }}<?php } ?></td>    
    <td class="left">Puin met 25% of meer zand I grond </td>
    <td><?php if (!empty($pricelist->Price_Puin_met_25)) { ?>{{  @$pricelist->Price_Puin_met_25 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Puin_met_25)) { ?>{{  @$pricelist->sale_Price_Puin_met_25 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Puin_met_25)) { ?>Per {{ @$pricelist->Unit_Puin_met_25}}<?php } ?></td>
    </tr>
    
    <tr>
    
    <td><?php if (!empty($pricelist->article_no_Asfaltpuin)) { ?>{{  @$pricelist->article_no_Asfaltpuin }}<?php } ?></td>    
    <td class="left">Asfaltpuin </td>
    <td><?php if (!empty($pricelist->Price_Asfaltpuin)) { ?>{{  @$pricelist->Price_Asfaltpuin }} &nbsp; €<?php } ?></td>
     <td><?php if (!empty($pricelist->sale_Price_Asfaltpuin)) { ?>{{  @$pricelist->sale_Price_Asfaltpuin }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Asfaltpuin)) { ?>Per {{ @$pricelist->Unit_Asfaltpuin }}<?php } ?></td>
    </tr>
    
     <tr>    
    <td><?php if (!empty($pricelist->article_no_Schoon_Gips)) { ?>{{  @$pricelist->article_no_Schoon_Gips }}<?php } ?></td>    
    <td class="left">Schoon Gips</td>
    <td><?php if (!empty($pricelist->Price_Schoon_Gips)) { ?>{{  @$pricelist->Price_Schoon_Gips }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Schoon_Gips)) { ?>{{  @$pricelist->sale_Price_Schoon_Gips }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Schoon_Gips)) { ?>Per {{ @$pricelist->Unit_Schoon_Gips }}<?php } ?></td>
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_Groenafval)) { ?>{{  @$pricelist->article_no_Groenafval }}<?php } ?></td>    
    <td class="left">Groenafval</td>
    <td><?php if (!empty($pricelist->Price_Groenafval)) { ?>{{  @$pricelist->Price_Groenafval }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Groenafval)) { ?>{{  @$pricelist->sale_Price_Groenafval }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Groenafval)) { ?>Per {{ @$pricelist->Unit_Groenafval}}<?php } ?></td>
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_Dakafval)) { ?>{{  @$pricelist->article_no_Dakafval }}<?php } ?></td>    
    <td class="left">Dakafval</td>
    <td><?php if (!empty($pricelist->Price_Dakafval)) { ?>{{  @$pricelist->Price_Dakafval }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Dakafval)) { ?>{{  @$pricelist->sale_Price_Dakafval }} &nbsp; € <?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Dakafval)) { ?>Per {{ @$pricelist->Unit_Dakafval}}<?php } ?></td>
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_Dakgrind)) { ?>{{  @$pricelist->article_no_Dakgrind }}<?php } ?></td>    
    <td class="left">Dakgrind</td>
    <td><?php if (!empty($pricelist->Price_Dakgrind)) { ?>{{  @$pricelist->Price_Dakgrind }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Dakgrind)) { ?>{{  @$pricelist->sale_Price_Dakgrind }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Dakgrind)) { ?>Per {{ @$pricelist->Unit_Dakgrind}}<?php } ?></td>
    </tr>
     
    <tr>    
    <td><?php if (!empty($pricelist->article_no_Schoon_vlakglas)) { ?>{{  @$pricelist->article_no_Schoon_vlakglas }}<?php } ?></td>    
    <td class="left">Schoon vlakglas </td>
    <td><?php if (!empty($pricelist->Price_Schoon_vlakglas)) { ?>{{  @$pricelist->Price_Schoon_vlakglas }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Schoon_vlakglas)) { ?>{{  @$pricelist->sale_Price_Schoon_vlakglas }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Schoon_vlakglas)) { ?>Per {{@$pricelist->Unit_Schoon_vlakglas}}<?php } ?></td>
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_Opbrengsten_metalen)) { ?>{{  @$pricelist->article_no_Opbrengsten_metalen }}<?php } ?></td>    
    <td class="left">Opbrengsten metalen, per ton </td>
    <td><?php if (!empty($pricelist->Price_Opbrengsten_metalen)) { ?>{{  @$pricelist->Price_Opbrengsten_metalen }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Opbrengsten_metalen)) { ?>{{  @$pricelist->sale_Price_Opbrengsten_metalen }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Opbrengsten_metalen)) { ?>Per {{ @$pricelist->Unit_Opbrengsten_metalen}}<?php } ?></td>
    </tr>
    
    <tr>    
    <td><?php if (!empty($pricelist->article_no_Opbrengsten_Papier)) { ?>{{  @$pricelist->article_no_Opbrengsten_Papier }}<?php } ?></td>    
    <td class="left">Opbrengsten Papier & Karton, per ton </td>
    <td><?php if (!empty($pricelist->Price_Opbrengsten_Papier)) { ?>{{  @$pricelist->Price_Opbrengsten_Papier }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_Opbrengsten_Papier)) { ?>{{  @$pricelist->sale_Price_Opbrengsten_Papier }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_Opbrengsten_Papier)) { ?>Per {{ @$pricelist->Unit_Opbrengsten_Papier}}<?php } ?></td>
    </tr>
    <!-----Extra fields--->
    <tr>    
    <td><?php if (!empty($pricelist->article_no_field1)) { ?>{{  @$pricelist->article_no_field1 }}<?php } ?></td>    
    <td class="left"><?php if (!empty($pricelist->description_field1)) { ?>{{ @$pricelist->description_field1}} <?php } ?></td>
    <td><?php if (!empty($pricelist->Price_field1)) { ?>{{  @$pricelist->Price_field1 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_field1)) { ?>{{  @$pricelist->sale_Price_field1 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_field1)) { ?>Per {{ @$pricelist->Unit_field1}}<?php } ?></td>
    </tr>
    <tr>    
    <td><?php if (!empty($pricelist->article_no_field2)) { ?>{{  @$pricelist->article_no_field2 }}<?php } ?></td>    
    <td class="left"><?php if (!empty($pricelist->description_field2)) { ?>{{ @$pricelist->description_field2}}<?php } ?> </td>
    <td><?php if (!empty($pricelist->Price_field2)) { ?>{{  @$pricelist->Price_field2 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_field2)) { ?>{{  @$pricelist->sale_Price_field2 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_field2)) { ?>Per {{ @$pricelist->Unit_field2}}<?php } ?></td>
    </tr>
    <tr>    
    <td><?php if (!empty($pricelist->article_no_field3)) { ?>{{  @$pricelist->article_no_field3 }}<?php } ?></td>    
    <td class="left"><?php if (!empty($pricelist->description_field3)) { ?>{{ @$pricelist->description_field3}}<?php } ?> </td>
    <td><?php if (!empty($pricelist->Price_field3)) { ?>{{  @$pricelist->Price_field3 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_field3)) { ?>{{  @$pricelist->sale_Price_field3 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_field3)) { ?>Per {{ @$pricelist->Unit_field3}}<?php } ?></td>
    </tr>
    <tr>    
    <td><?php if (!empty($pricelist->article_no_field4)) { ?>{{  @$pricelist->article_no_field4 }}<?php } ?></td>    
    <td class="left"><?php if (!empty($pricelist->description_field4)) { ?>{{ @$pricelist->description_field4}}<?php } ?> </td>
    <td><?php if (!empty($pricelist->Price_field4)) { ?>{{  @$pricelist->Price_field4 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->sale_Price_field4)) { ?>{{  @$pricelist->sale_Price_field4 }} &nbsp; €<?php } ?></td>
    <td><?php if (!empty($pricelist->Unit_field4)) { ?>Per {{ @$pricelist->Unit_field4}}<?php } ?></td>
    </tr>
    
    </tbody>    
    </table>       
                   
                    </div>
                </div>  
                </div>
          
          <div class="col-md-6">
           <div class="content controls">
                <div class="form-row">
                          <div class="col-md-6">
        <a href=" <?php echo URL:: to( 'admin/projects' ); ?> " class="btn btn-success" style="float:none;width:100%">Back</a>
        </div>                       
                    </div>         
            </div>    
          </div>
        </div>
          
    {!! Form::close() !!}        
  </div> 
   <br />   
       @include('admin/footer')</div>  