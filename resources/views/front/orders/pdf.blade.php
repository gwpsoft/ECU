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
		li { font-size:16px; font-weight:normal; padding:6px;}
        table,td {
            border:1px solid #000;text-shadow:none; text-align:left; font-size:12px; font-weight:normal; padding:4px;line-height:20px !important; }
			table,th {  border:1px solid #000; box-shadow:none;  text-align:left; font-size:12px; font-weight:bold; padding:3px;} 
		table  {
           border-collapse: collapse; }
		.strong{ font-weight:bold;}
		.table td { text-align:center !important; line-height:20px !important;}
        
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
     			<h2> BESTELFORMULIER AFVALCONTAINERS</h2>
      
        </td>
        </tr> 
        </table>

	 <table width="100%" cellpadding="3" cellspacing="0" border="1">
     	
         <tr>
            <th  align="Left" >Klantnaam</th>
            <td ><?=@$Order['Customer_Name']?></td>
             <th  align="Left" >Projectnummer</th>
            <td ><?=@$Order['Projectnummer']?></td>
        </tr>
     	
         <tr>
            <th  align="Left" >Project naam</th>
            <td colspan="3" ><?=@$project->Name?></td>
         </tr>
        
         <tr>
            <th  align="Left" >Werkadres</th>
            <td colspan="3" ><?=@$Order['Work_Address']?></td>
         </tr>
         <tr>
            <th  align="Left" >Postcode & plaats</th>
            <td colspan="3" ><?=@$Order['Postcode']?></td>
         </tr>
         <tr>
            <th  align="Left" >Contactpersoon</th>
            <td ><?=@$Order['Contact']?></td>
             <th  align="Left" >Telefoonnummer</th>
            <td ><?=@$Order['phone_number']?></td>
         </tr>
         
          <tr>
            <th align="Left">Besteldatum</th>
            <td >&nbsp;<?=@$Order['Order_Date']?></td>
            <td colspan="2" ><strong style="vertical-align:middle" >Tijd:</strong><?=@$Order['time']?></td>
            
        </tr>
         <tr>
          <th align="Left">Nummer</th>
            <td colspan="3">BN-00<?=@$Order['id']?>&nbsp;</td>
         </tr>
         
        <tr>
            <th  align="Left" >Uitvoerdatum</th>
            <td colspan="3" ><?=@$Order['output_Date']?></td>
         </tr>
        
         <tr>
            <th  align="Left" >Dagdeel / gewenste tijd</th>
            <td colspan="3" >
			<?php if ($Order['Half_day_time'] == 1) { echo 'Zo spoedig mogelijk';}?>
			<?php if ($Order['Half_day_time'] == 2) { echo 'Ochtend';}?>
            <?php if ($Order['Half_day_time'] == 3) { echo 'Middag';}?>
            <?php if ($Order['Half_day_time'] == 4) { echo 'Avond';}?>
            <?php if ($Order['Half_day_time'] == 5) { echo 'Zie opmerkingen';}?>
            </td>
         </tr>
        
         <tr>
            <th  align="Left" >Opmerkingen</th>
            <td colspan="3" ><?=@$Order['Comments']?></td>
         </tr>        
        
     </table>
<div style="width:100%">
<div style="width:30%; float:left">
	<table class="table table-bordered" style="text-align:center;width:100%; float:left;">
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
      <th scope="row">3m<sup>3</sup></th>
      <td class="center"><?=$Order['3m3_plaats']?></td>
      <td class="center"><?=$Order['3m3_Wissel']?></td>
      <td class="center"><?=$Order['3m3_Afvoer']?></td>
    </tr>
    <tr>
      <th scope="row">6m<sup>3</sup></th>
      <td><?=$Order['6m3_plaats']?></td>
      <td><?=$Order['6m3_Wissel']?></td>
      <td><?=$Order['6m3_Afvoer']?></td>
    </tr>
    <tr>
      <th scope="row">10m<sup>3</sup></th>
       <td><?=$Order['10m3_plaats']?></td>
      <td><?=$Order['10m3_Wissel']?></td>
      <td><?=$Order['10m3_Afvoer']?></td>
    </tr>
     <tr>
      <th scope="row">10m<sup>3</sup>dicht</th>
       <td><?=$Order['10m3_plaats_dicht']?></td>
      <td><?=$Order['10m3_Wissel_dicht']?></td>
      <td><?=$Order['10m3_Afvoer_dicht']?></td>
    </tr>
    <tr>
      <th scope="row">20m<sup>3</sup></th>
        <td><?=$Order['20m3_plaats']?></td>
      <td><?=$Order['20m3_Wissel']?></td>
      <td><?=$Order['20m3_Afvoer']?></td>
    </tr>
    <tr>
      <th scope="row">40m<sup>3</sup></th>
       <td><?=$Order['40m3_plaats']?></td>
      <td><?=$Order['40m3_Wissel']?></td>
      <td><?=$Order['40m3_Afvoer']?></td>
    </tr>
  
  </tbody>
</table>
</div>
<div style="width:69%; float:right; margin-left:220px;">
<table class="table table-bordered" style="text-align:center;float:right; width:100%">
  <thead>
      <tr>
        <th colspan="7" class="center" style="font-size:12px;">Aantal per afvalstroom</th>
      </tr>
    <tr style="font-size:12px;">     
      <th class="center" width="12%" >BSA</th>
      <th class="center"  width="12%">Puin</th>
      <th class="center"  width="12%">Hout</th>      
      <th class="center" width="18%">Plastic Folie</th>
      <th class="center" width="12%">Papier</th>
      <th class="center"  width="12%">Diverse</th>
      <th class="center"  width="25%">Opmerkingen</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row"><?=$Order['3m3_Bsa']?></td>
       <td><?=$Order['3m3_Puin']?></td>
      <td><?=$Order['3m3_Hout']?></td>      
       <td><?=$Order['3m3_Plastic_Folie']?></td>
      <td><?=$Order['3m3_Papier']?></td>
      <td><?=$Order['3m3_Diverse']?></td>
      <td><?=$Order['3m3_Opmerkingen']?></td>
      
    </tr>
    <tr>
    <td scope="row"><?=$Order['6m3_Bsa']?></td>
       <td><?=$Order['6m3_Puin']?></td>
      <td><?=$Order['6m3_Hout']?></td>     
       <td><?=$Order['6m3_Plastic_Folie']?></td>
      <td><?=$Order['6m3_Papier']?></td>
       <td><?=$Order['6m3_Diverse']?></td>
      <td><?=$Order['6m3_Opmerkingen']?></td>
     
    </tr>
    <tr>
     <td scope="row"><?=$Order['10m3_Bsa']?></td>
       <td><?=$Order['10m3_Puin']?></td>
      <td><?=$Order['10m3_Hout']?></td>      
       <td><?=$Order['10m3_Plastic_Folie']?></td>
      <td><?=$Order['10m3_Papier']?></td>
      <td><?=$Order['10m3_Diverse']?></td>
      <td><?=$Order['10m3_Opmerkingen']?></td>
      
    </tr>
    <tr>
      <td scope="row"><?=$Order['10m3_Bsa_dicht']?></td>
       <td><?=$Order['10m3_Puin_dicht']?></td>
      <td><?=$Order['10m3_Hout_dicht']?></td>     
       <td><?=$Order['10m3_Plastic_Folie_dicht']?></td>
      <td><?=$Order['10m3_Papier_dicht']?></td>
      <td><?=$Order['10m3_Diverse_dicht']?></td>
      <td><?=$Order['10m3_Opmerkingen_dicht']?></td>
      
    </tr>
    <tr>
    <td scope="row"><?=$Order['20m3_Bsa']?></td>
       <td><?=$Order['20m3_Puin']?></td>
      <td><?=$Order['20m3_Hout']?></td>      
       <td><?=$Order['20m3_Plastic_Folie']?></td>
      <td><?=$Order['20m3_Papier']?></td>
      <td><?=$Order['20m3_Diverse']?></td>
      <td><?=$Order['20m3_Opmerkingen']?></td>      
    </tr>
    <tr>
   <td scope="row"><?=$Order['40m3_Bsa']?></td>
       <td><?=$Order['40m3_Puin']?></td>
      <td><?=$Order['40m3_Hout']?></td>      
       <td><?=$Order['40m3_Plastic_Folie']?></td>
      <td><?=$Order['40m3_Papier']?></td>
      <td><?=$Order['40m3_Diverse']?></td>
      <td><?=$Order['40m3_Opmerkingen']?></td>
     
    </tr>
  
  </tbody>
</table>
</div>
<div style="clear:both"></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:250px; ">
       <tr>
	   <td align="center" style="font-weight:bold; font-size:14px;">
     			Indien de samenstelling van de afvalstroom afwijkt van hetgeen is opgegeven, afkeuring
    <br> vermelden op transportbon en foto’s van desbetreffende vracht met factuur meesturen.<br><br>
    <span style="background-color: yellow">( * Gecertificeerde Hijsbaar containers met hijsogen)</span>
      
        </td>
	</tr>
     </table>

</div>

    
   






</body>
</html>
