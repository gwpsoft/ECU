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
		h4 { margin-top:5px;}
		li { font-size:16px; font-weight:normal; padding:6px;}
        table,td {
            border:1px solid #000;text-shadow:none; text-align:left; font-size:10px; font-weight:normal; padding:4px;line-height:15px !important;}
			table,th {  border:1px solid #000; box-shadow:none;  text-align:left; font-size:10px; font-weight:bold; padding:3px;} 
		table { border-collapse: collapse;}
		.strong{ font-weight:bold;}
		.table td { text-align:center !important; line-height:20px !important;}
        
    </style>
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:-50px !important">
        <tr>
        <td width="20%">
		<img src="<?php echo url();?>/assets/img/icons/logo_sm.png" style="vertical-align:top; width:150px; height:150px;" />           

        </td>
        <td style="line-height:4px; vertical-align:middle; font-size:14px;">
        <h2 class="center">Easy Cleanup B.V.</h2>
        <p class="center">Kollenbergweg 78 – 1101 AV Amsterdam ZO</p>
        <p class="center">Tel: 020 - 691 61 15, Fax: 020 – 691 77 28</p>
        </td>
        </tr> 
        </table>
   	 <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
        <td style="line-height:4px; vertical-align:bottom; " >
     			<h3 style="text-align:left; margin-bottom:5px;">Containers Transportbon:</h3>
                <h3 style="text-align:right; margin:3px;">
                 Bonnummer:<?=$ContainerBon[0]->BonNummer?> (Van  <?=date('d-m-Y',strtotime($ContainerBon[0]->From_Date))?> t/m <?=date('d-m-Y',strtotime($ContainerBon[0]->To_Date))?>)
                 </h3>
        </td>
        </tr> 
          
          </table>
   	 <table width="100%" cellpadding="3" cellspacing="0" border="1">
     
        <tr>
            <th  align="Left" width="20%" >Opdrachtgever :</th>
            <td colspan="2"><?=@$Project->Cus_Name?></td>
        </tr>
         <tr>
            <th  align="Left" width="20%" >Project :</th>
            <td colspan="2"><?=@$Project->Pro_Name?></td>
        </tr>
          <tr>
            <th  align="Left" width="20%" >Contact persoon:</th>
            <td ><?=@$Project->Con_Firstname?>&nbsp;<?=@$Project->Con_Lastname?></td>
            <td ><?=@$Project->Con_Email?></td>
        </tr>
		</table>
		
         <table width="70%" cellpadding="1" cellspacing="0" border="1">
          <tr>
            <th align="center" style="width:20px;" >S#</th>
            <th align="center" style="width:70px;" >Datum</th>
            <th align="center" style="width:50px;"  >Inhoud</th>
            <th align="center" colspan="8">Specificaties</th>
            </tr>
         
          <tr>
            <th align="center" >&nbsp;</th>
            <th align="center" >&nbsp;</th>
            <th align="center" >&nbsp;</th>
            <th align="center" style="width:150px;">Soort afval</th>
            <th align="center" style="width:50px;">Gewicht (Ton)</th>
            <th align="center" style="width:50px;">Prijs per ton</th>
            <th align="center" style="width:50px;">Transport kost</th>
            <th align="center" style="width:50px;">Toeslag</th>
            <th align="center" style="width:50px;">All-in   prijs</th>
            <th align="center" style="width:70px;">Bedrag</th>
            <th align="center">Opmerkingen</th>
            </tr>
         <?php 
		$i= 0;
		$Gr_total= 0;
		$Total = 0;
		foreach ($ContainerBon as $Bon){ $i++;
		$Total =  $Bon->total;
		//$price = explode('€ ',$Total);
		$Gr_total += $Bon->total;
		
		if (@$Bon->size=='Rolcontainer'){ @$size = 'Rolcontainer';}
		else if (@$Bon->size=='3m3'){ @$size = '3m&sup3;';}
		else if (@$Bon->size=='6m3'){ @$size = '6m&sup3;';}
		else if (@$Bon->size=='10m3'){ @$size = '10m&sup3;';}
		else if (@$Bon->size=='20m3'){ @$size = '20m&sup3;';}
		else if (@$Bon->size=='30m3'){ @$size = '30m&sup3;';}
		else {@$size = 'NULL';}
		if ($Bon->meterial =='sorteerbaar') { $Meterial = 'Bouw- en sloopafval (sorteerbaar)';}
		if ($Bon->meterial =='niet_sorteerbaar') { $Meterial = 'Bouw- en sloopafval (niet sorteerbaar)';}
		if ($Bon->meterial =='Bedrijfsafval') { $Meterial = 'Bedrijfsafval';}
		if ($Bon->meterial =='A_B_hout') { $Meterial = 'Gemengd hout (A- enlof B- hout)';}
		if ($Bon->meterial =='C_hout') { $Meterial = 'C- hout';}
		if ($Bon->meterial =='Schoon_puin') { $Meterial = 'Schoon puin(< 60 cm)';}
		if ($Bon->meterial =='Puin_Grof') { $Meterial = 'Puin Grof (> 60 cm)';}
		if ($Bon->meterial =='Puin_met_10') { $Meterial = 'Puin met 10% tot 25% zand I grond';}
		if ($Bon->meterial =='Puin_met_25') { $Meterial = 'Puin met 25% of meer zand I grond';}
		if ($Bon->meterial =='Asfaltpuin') { $Meterial = 'Asfaltpuin';}
		if ($Bon->meterial =='Schoon_Gips') { $Meterial = 'Schoon Gips';}
		if ($Bon->meterial =='Groenafval') { $Meterial = 'Groenafval';}
		if ($Bon->meterial =='Dakafval') { $Meterial = 'Dakafval';}
		if ($Bon->meterial =='Dakgrind') { $Meterial = 'Dakgrind';}
		if ($Bon->meterial =='Schoon_vlakglas') { $Meterial = 'Schoon vlakglas';}
		if ($Bon->meterial =='Opbrengsten_metalen') { $Meterial = 'Opbrengsten metalen, per ton';}
		if ($Bon->meterial =='Opbrengsten_Papier') { $Meterial = 'Opbrengsten Papier & Karton, per ton';}
		if ($Bon->meterial =='BSA') { $Meterial = 'BSA';}
		if ($Bon->meterial =='Hout') { $Meterial = 'Hout';}
		if ($Bon->meterial =='Puin') { $Meterial = 'Puin';}
		$pricelist = DB::table('tblprojectpricelist')->where('project_id', $Bon->Project_Id)->first();
		
		if ($Bon->meterial =='field_1') { $Meterial = $pricelist->description_field1;}
		if ($Bon->meterial =='field_2') { $Meterial = $pricelist->description_field2;}
		if ($Bon->meterial =='field_3') { $Meterial = $pricelist->description_field3;}
		if ($Bon->meterial =='field_4') { $Meterial = $pricelist->description_field4;}			
		 ?>
          <tr>
            <td align="center" ><?=$i?>&nbsp;</td>
            <td align="center" ><?=date('d-m-Y',strtotime($Bon->Sent_Date))?>&nbsp;</td>
            <td align="center" ><?=$size?>&nbsp;</td>
            <td align="left" ><?=$Meterial?>&nbsp;</td>
            <td align="center" ><?=@number_format(@$Bon->Gewicht,2)?>&nbsp;</td>
            <td align="right" ><?php if (!empty($Bon->price_per)) { ?><?php echo '€ '. number_format($Bon->price_per,2); } ?>&nbsp;</td>
            <td align="right" ><?php if (!empty($Bon->transport_price)) { ?><?php echo '€ '. number_format($Bon->transport_price,2); } ?>&nbsp;</td>
            <td align="right" ><?php if (!empty($Bon->Toeslag)) { ?><?php echo '€ '. number_format($Bon->Toeslag,2); } ?>&nbsp;</td> 
            <td align="right" ><?php if (!empty($Bon->All_price)) { ?><?php echo '€ '. number_format($Bon->All_price,2); } ?>&nbsp;</td>  
            <td align="right" ><?php if (!empty($Bon->total)) { ?><?php echo '€ '. number_format($Bon->total,2); } ?>&nbsp;</td>  
            <td align="left" ><?=$Bon->Notes?>&nbsp;</td>            
         </tr>
         <?php } ?>
        
          <tr style="border-bottom:double #000000 1px;">
          	<td align="center" >&nbsp;</td>
            <th align="center" colspan="2" >Totaal&nbsp;</th>
            <td align="center" >&nbsp;</td>
            <td align="center" >&nbsp;</td>
            <td align="center" >&nbsp;</td>
            <td align="center" >&nbsp;</td>
            <td align="center" >&nbsp;</td>  
            <th align="left" >€&nbsp;<?=number_format($Gr_total,2)?>&nbsp;</th>  
            <th align="center" >Ex. BTW&nbsp;</th>
            <td align="center" >&nbsp;</td> 
          </tr>
         
         </table>
          <div style="margin:25px;">&nbsp;</div>
        <span style="width:300px; margin-left:50px; font-size:14px">Handtekening opdrachtgever:</span> <span style="border-bottom: 1px solid black; padding-left: 150px;">&nbsp;</span><br>
        <div style="height:30px;">&nbsp;</div>
        <span style="width:300px;margin-left:50px;font-size:14px">Naam: </span><span style="margin-left:55px;border-bottom: 1px solid black; padding-left: 150px">&nbsp;</span><br>
         <span style="padding-left: 120px; font-size:12px; font-weight:bold; vertical-align:text-top;margin-left:50px">Easy Clean Up BV</span>
          <div style="height:20px;">&nbsp;</div>
        
        

</body>
</html>
