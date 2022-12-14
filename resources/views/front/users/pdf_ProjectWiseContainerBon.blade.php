<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style>
        body {
        font-family:"Arial Black", Gadget, sans-serif;         
        }
		.center{ text-align:center;}
		h4 { margin-top:50px;}
		li { font-size:12px; font-weight:normal; padding:6px;}
        table,td {
            border:1px solid #000;text-shadow:none; text-align:left; font-size:10px; font-weight:normal; padding:4px;line-height:15px !important; }
			table,th {  border:1px solid #000; box-shadow:none;  text-align:left; font-size:10px; font-weight:bold; padding:3px;} 
		table  {
           border-collapse: collapse; }
		.strong{ font-weight:bold;}
		.table td { text-align:center !important; line-height:15px !important;}
        
    </style>
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

<table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td  align="center" >
        <img src="<?php echo url();?>/assets/img/icons/logo_sm.png" style=" vertical-align:top; height:75px; margin-bottom:10px;"  /> 
		<img src="<?php echo url();?>/assets/img/icons/easycleanup_logo_large.jpg" style=" vertical-align:top; width:400px; height:80px;"  />           

        </td>
        </tr>
       <tr>
        <td style="line-height:4px; vertical-align:bottom;" align="center">
     			<h2> PROJECT OVERZICHT CONTAINERS</h2>
        </td>
        </tr> 
        </table>
		
           	 <table width="100%" cellpadding="0" cellspacing="0" border="0">
          <!--  <tr>
        <td style="line-height:4px; vertical-align:bottom; " >
     			<h3 style="text-align:left; margin-bottom:5px;">Containers Transportbon:</h3>
         </td>       
         </tr>   -->    
                
         <tr>       
         <td style="line-height:4px; vertical-align:bottom; " >        
                <h3 style="text-align:left; margin:3px;">Naam Project:-&nbsp;&nbsp;<?=$Project->Pro_Name?></h3>
          </td>
          <?php if ($startDate !=0 || $EndDate !=0) { 
		  if ($EndDate == 0) { $EndDate = date('Y-m-d');}		  
		  ?>
          <td style="line-height:4px; vertical-align:bottom;" >       
                 <h3 style="text-align:right; margin:3px;"> (From <?=$startDate?> to <?=$EndDate?>)</h3>
                 
        </td>
        <?php } ?>
        </tr> 
          
          </table>
        
        
        
   
           <?php if ($ProjectWiseBons){  ?>
   
    <table width="100%"  style="font-size:10px;" >
                <colgroup>
          <col class="col-md-2">
          <col class="col-md-2">         
            <col class="col-md-2">
             <col class="col-md-2">
              <col class="col-md-2">             
        </colgroup> 

     
        <thead>
        <tr>
            <th width="15%">Size</th>
            <th width="15%">No.</th>
            <th width="15%">Gewicht</th>
            <th width="20%">Verkoop</th>
            <th width="20%">Besparing</th>                                    
        </tr>
        </thead>
       <?php
        $total_container = 0;
        $total_weight = 0;
        $net = 0;
        $cost = 0;
		$discount = 0;
		$Gross_Container = 0;
		$Gross_Weight = 0;
		$Gross_net = 0;
		$Gross_cost = 0;
		$distance=0;
		$Gross_discount=0;
        ?>
        <tbody>
		<?php 
		foreach ($ProjectWiseBons as $ProjectWiseBon){ 							
		if ($ProjectWiseBon->meterial =='sorteerbaar') { $Meterial = 'Bouw- en sloopafval (sorteerbaar)';}
		if ($ProjectWiseBon->meterial =='niet_sorteerbaar') { $Meterial = 'Bouw- en sloopafval (niet sorteerbaar)';}
		if ($ProjectWiseBon->meterial =='Bedrijfsafval') { $Meterial = 'Bedrijfsafval';}
		if ($ProjectWiseBon->meterial =='A_B_hout') { $Meterial = 'Gemengd hout (A- enlof B- hout)';}
		if ($ProjectWiseBon->meterial =='C_hout') { $Meterial = 'C- hout';}
		if ($ProjectWiseBon->meterial =='Schoon_puin') { $Meterial = 'Schoon puin(< 60 cm)';}
		if ($ProjectWiseBon->meterial =='Puin_Grof') { $Meterial = 'Puin Grof (> 60 cm)';}
		if ($ProjectWiseBon->meterial =='Puin_met_10') { $Meterial = 'Puin met 10% tot 25% zand I grond';}
		if ($ProjectWiseBon->meterial =='Puin_met_25') { $Meterial = 'Puin met 25% of meer zand I grond';}
		if ($ProjectWiseBon->meterial =='Asfaltpuin') { $Meterial = 'Asfaltpuin';}
		if ($ProjectWiseBon->meterial =='Schoon_Gips') { $Meterial = 'Schoon Gips';}
		if ($ProjectWiseBon->meterial =='Groenafval') { $Meterial = 'Groenafval';}
		if ($ProjectWiseBon->meterial =='Dakafval') { $Meterial = 'Dakafval';}
		if ($ProjectWiseBon->meterial =='Dakgrind') { $Meterial = 'Dakgrind';}
		if ($ProjectWiseBon->meterial =='Schoon_vlakglas') { $Meterial = 'Schoon vlakglas';}
		if ($ProjectWiseBon->meterial =='Opbrengsten_metalen') { $Meterial = 'Opbrengsten metalen, per ton';}
		if ($ProjectWiseBon->meterial =='Opbrengsten_Papier') { $Meterial = 'Opbrengsten Papier & Karton, per ton';}
		if ($ProjectWiseBon->meterial =='BSA') { $Meterial = 'BSA';}
		if ($ProjectWiseBon->meterial =='Hout') { $Meterial = 'Hout';}
		if ($ProjectWiseBon->meterial =='Puin') { $Meterial = 'Puin';}
		$pricelist = DB::table('tblprojectpricelist')->where('project_id', $ProjectWiseBon->Project_Id)->first();		
		if ($ProjectWiseBon->meterial =='field_1') { $Meterial = $pricelist->description_field1;}
		if ($ProjectWiseBon->meterial =='field_2') { $Meterial = $pricelist->description_field2;}
		if ($ProjectWiseBon->meterial =='field_3') { $Meterial = $pricelist->description_field3;}
		if ($ProjectWiseBon->meterial =='field_4') { $Meterial = $pricelist->description_field4;}
							
	$where = " AND meterial = '" . $ProjectWiseBon->meterial . "' AND Project_Id = '" . $ProjectWiseBon->Project_Id . "'";
	$results = DB::select( DB::raw("SELECT id, size,meterial, Project_Id, format(sum(total),2) TotalCost, format(sum(total) - sum(transport_price),2) WithoutTransport, format(sum(transport_price),2) TransportCost, format(sum(Gewicht),2) Gewicht, format(sum(net_total),2) NetTotal, COUNT(size) as total_container  FROM tblcontainerbon WHERE 1=1 ".$where." GROUP BY size" ) );?>
    
			<tr>
            	<th colspan="5" style="font-size:14px; text-decoration:underline;">{{ @$Meterial }}</th>
            </tr>
        <?php		
		foreach ($results as $result){		
		$total_container += $result->total_container ;
		$total_weight += $result->Gewicht;
		$net += $result->NetTotal;
		$cost += $result->TotalCost;
		
		if ($result->size == '20m3') { $Transportrate = $MarketPrice->Price_10m3;}
		else { $Transportrate = $MarketPrice->Price_40m3;}
							
		if ($result->size=='3m3'){ $size = '3m&sup3;';}
		if ($result->size=='6m3'){ $size = '6m&sup3;';}
		if ($result->size=='10m3'){ $size = '10m&sup3;';}
		if ($result->size=='20m3'){ $size = '20m&sup3;';}
		?>                   	 
        <tr>
            <td>{{ @$size }}</td>
            <td>{{ @$result->total_container }}</td>
            <td>{{ @$result->Gewicht }} </td>
            <td>€ {{ @$result->TotalCost }}</td>
           <td>€ <?php
		    if ($result->meterial == 'sorteerbaar') { echo $distance = (($result->Gewicht*$MarketPrice->Price_sorteerbaar)-($result->TotalCost)+$Transportrate); }
			
			if ($result->meterial == 'niet_sorteerbaar') { echo $distance =(($result->Gewicht*$MarketPrice->Price_niet_sorteerbaar)-($result->TotalCost)+$Transportrate); }
			
			
		   if ($result->meterial == 'Bedrijfsafval') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Bedrijfsafval)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'A_B_hout') { echo $distance =(($result->Gewicht*$MarketPrice->Price_A_B_hout)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'C_hout') { echo $distance =(($result->Gewicht*$MarketPrice->Price_C_hout)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Schoon_puin') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Schoon_puin)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Puin_Grof') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Puin_Grof)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Puin_met_10') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Puin_met_10)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Puin_met_25') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Puin_met_25)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Asfaltpuin') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Asfaltpuin)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Schoon_Gips') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Schoon_Gips)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Groenafval') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Groenafval)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Dakafval') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Dakafval)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Dakgrind') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Dakgrind)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Schoon_vlakglas') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Schoon_vlakglas)-($result->TotalCost)+$Transportrate); }
		    if ($result->meterial == 'Opbrengsten_metalen') { echo $distance =(($result->Gewicht*$MarketPrice->Price_Opbrengsten_metalen)-($result->TotalCost)+$Transportrate); }
		   if ($result->meterial == 'Opbrengsten_Papier') { echo $distance =(($result->Gewicht * $MarketPrice->Price_Opbrengsten_Papier)-($result->TotalCost)+$Transportrate); }
			
		   ?></td>
        </tr>                    
		<?php 
		$discount += $distance;
		
		} 
		$Gross_Container += $total_container;
		$Gross_Weight += $total_weight;
		$Gross_net += $net;
		$Gross_cost += $cost;
		$Gross_discount += $discount;
		 
		?>
        <tr>
            <th>No. of Containers&nbsp;</th>
            <th><?=$total_container?></th>
            <th>Totaal : <?=number_format($total_weight,2)?></th>
            <th>Totaal : € <?=number_format($cost,2)?></th>
            <th>Totaal : € <?=number_format($discount,2)?></th>
        </tr>
       
        <?php  $total_container = 0;
        $total_weight = 0;
        $net = 0;
        $cost = 0;
		$discount=0;
		
        }   ?>
        <tr><td colspan="5">&nbsp;</td></tr>
          <tr style="border-bottom: 6px solid #3071A9;background-color: lightgrey;">
            <th>Bruto Totaal&nbsp;</th>
            <th><?=$Gross_Container?></th>
            <th>Totaal : <?=number_format($Gross_Weight,2)?></th>
            <th>Totaal : € <?=number_format($Gross_cost,2)?></th>
            <th>Totaal : € <?=number_format($Gross_discount,2)?></th>
        </tr>
        
        
        
        
        </tbody>
        <?php 
		$Gross_Container = 0;
		$Gross_Weight = 0;
		$Gross_net = 0;
		$Gross_cost = 0; 
		$Gross_discount = 0;
		?>
		
  
        </table>
   
        <?php }  else { ?>                                       
				<p align="center">Gegevens niet Gevonden...!</p>
		<?php } ?>
                             
           
   
  