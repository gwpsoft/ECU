<?php
function convert_day ($days) {

	if ($days == 'Monday'){ return 'Maandag';}
	if ($days == 'Tuesday'){ return 'Dinsdag';}
	if ($days == 'Wednesday'){ return 'Woensdag';}
	if ($days == 'Thursday'){ return 'Donderdag';}
	if ($days == 'Friday'){ return 'Vrijdag';}
	if ($days == 'Saturday'){ return 'Zaterdag';}
	if ($days == 'Sunday'){ return 'Zondag';}

	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style>
        body {
        font-family:"Arial", Gadget, sans-serif;
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

    <table width="100%" cellpadding="0" cellspacing="0" style="border: none;">
        <tr style="border: none;">
        <td  align="center" style="border: none;">
        <img src="{{ base_path() }}/assets/img/icons/logo_sm.png" style=" vertical-align:top; height:60px;"  />
   		<img src="{{ base_path() }}/assets/img/icons/easycleanup_logo_large.jpg" style=" vertical-align:top; width:400px; height:70px;"  />

        </td>
        </tr>
       <tr style="border: none;">
        <td style="line-height:4px; vertical-align:bottom; border: none;" align="center">
     			<h2 style="margin: 0;"> BESTELFORMULIER AFVALCONTAINERS</h2>

        </td>
        </tr>
        </table>


	 <table width="100%" cellpadding="3" cellspacing="0" border="1">

        <tr>
            <th  align="Left" width="20%" >Afvalverwerker</th>
            <td colspan="4"><?=@$Order['Companyname']?></td>
        </tr>
     	  <tr>
            <th align="Left">E-mail adres</th>
            <td colspan="4" >&nbsp;<?=@$Order['ship_Email']?></td>
             <!--<th align="Left">FAX</th>
            <td><?=@$Order['ship_Fax']?>&nbsp;</td>-->
        </tr>

        <tr>
            <th align="Left">Besteldatum</th>
             <?php $day = date('l',strtotime(@$Order['Order_Date']));?>
            <td >&nbsp;<?=date('d-m-Y',strtotime(@$Order['Order_Date']))?> / <?=convert_day ($day)?></td>
            <td ><strong style="vertical-align:middle" >Tijd:</strong><?=date('H:i',strtotime(@$Order['time']))?></td>
             <th align="Left">Nummer</th>
            <td>BN-00<?=@$Order['Nummer']?>&nbsp;</td>
        </tr>

     </table>
       <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border: none;">
       <tr style="border: none;">
	   <td align="left" style="border: none;">
     			 <h3>Opdracht:</h3>

        </td>
	</tr>
     </table>
	 <table width="100%" cellpadding="3" cellspacing="0" border="1">

         <tr>
            <th  align="Left" >Klantnaam</th>
            <td ><?=@$customer->Name?></td>
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
            <td ><?=@$contact->Firstname.' '.@$contact->Lastname?></td>
             <th  align="Left" >Telefoonnummer</th>
            <td ><?=@$Order['phone_number']?></td>
         </tr>
        <tr>
            <th  align="Left" >Uitvoerdatum</th>
             <?php $orderday = date('l',strtotime(@$Order['output_Date']));?>
            <td colspan="3" ><?=date('d-m-Y',strtotime(@$Order['output_Date']))?> / <?=convert_day ($orderday)?></td>
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
      <th scope="row">Rolcontainer</th>
      <td class="center"><?=$Order['rl_plaats'] > 0 ? $Order['rl_plaats']:'&nbsp;'?></td>
      <td class="center"><?=$Order['rl_Wissel']> 0 ? $Order['rl_Wissel']:'&nbsp;'?></td>
      <td class="center"><?=$Order['rl_Afvoer']> 0 ? $Order['rl_Afvoer'] :'&nbsp;'?></td>
    </tr>
    <tr>
      <th scope="row">3m<sup>3</sup></th>
      <td class="center"><?=$Order['3m3_plaats'] > 0 ? $Order['3m3_plaats']:'&nbsp;'?></td>
      <td class="center"><?=$Order['3m3_Wissel']> 0 ? $Order['3m3_Wissel']:'&nbsp;'?></td>
      <td class="center"><?=$Order['3m3_Afvoer']> 0 ? $Order['3m3_Afvoer'] :'&nbsp;'?></td>
    </tr>
    <tr>
      <th scope="row">6m<sup>3</sup></th>
      <td><?=$Order['6m3_plaats']> 0 ? $Order['6m3_plaats']:'&nbsp;'?></td>
      <td><?=$Order['6m3_Wissel']> 0 ? $Order['6m3_Wissel']:'&nbsp;'?></td>
      <td><?=$Order['6m3_Afvoer']> 0 ? $Order['6m3_Afvoer']:'&nbsp;'?></td>
    </tr>
    <tr>
      <th scope="row">10m<sup>3</sup></th>
       <td><?=$Order['10m3_plaats']> 0 ? $Order['10m3_plaats']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Wissel']> 0 ? $Order['10m3_Wissel']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Afvoer']> 0 ? $Order['10m3_Afvoer']:'&nbsp;'?></td>
    </tr>
     <tr>
      <th scope="row">10m<sup>3</sup>dicht</th>
       <td><?=$Order['10m3_plaats_dicht']> 0 ?$Order['10m3_plaats_dicht'] :'&nbsp;'?></td>
      <td><?=$Order['10m3_Wissel_dicht']> 0 ? $Order['10m3_Wissel_dicht']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Afvoer_dicht']> 0 ? $Order['10m3_Afvoer_dicht']:'&nbsp;'?></td>
    </tr>
    <tr>
      <th scope="row">20m<sup>3</sup></th>
        <td><?=$Order['20m3_plaats']> 0 ? $Order['20m3_plaats']:'&nbsp;'?></td>
      <td><?=$Order['20m3_Wissel']> 0 ? $Order['20m3_Wissel']:'&nbsp;'?></td>
      <td><?=$Order['20m3_Afvoer']> 0 ? $Order['20m3_Afvoer']:'&nbsp;'?></td>
    </tr>

    <tr>
      <th scope="row">30m<sup>3</sup></th>
        <td><?=$Order['30m3_plaats']> 0 ? $Order['30m3_plaats']:'&nbsp;'?></td>
      <td><?=$Order['30m3_Wissel']> 0 ? $Order['30m3_Wissel']:'&nbsp;'?></td>
      <td><?=$Order['30m3_Afvoer']> 0 ? $Order['30m3_Afvoer']:'&nbsp;'?></td>
    </tr>

    <tr>
      <th scope="row">40m<sup>3</sup></th>
       <td><?=$Order['40m3_plaats']> 0 ?$Order['40m3_plaats'] :'&nbsp;'?></td>
      <td><?=$Order['40m3_Wissel']> 0 ? $Order['40m3_Wissel']:'&nbsp;'?></td>
      <td><?=$Order['40m3_Afvoer']> 0 ?$Order['40m3_Afvoer'] :'&nbsp;'?></td>
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
      <td scope="row"><?=$Order['rl_Bsa']> 0 ? $Order['rl_Bsa']:'&nbsp;'?></td>
       <td><?=$Order['rl_Puin']> 0 ? $Order['rl_Puin']:'&nbsp;'?></td>
      <td><?=$Order['rl_Hout']> 0 ? $Order['rl_Hout']:'&nbsp;'?></td>
       <td><?=$Order['rl_Plastic_Folie']> 0 ?$Order['rl_Plastic_Folie'] :'&nbsp;'?></td>
      <td><?=$Order['rl_Papier']> 0 ? $Order['rl_Papier']:'&nbsp;'?></td>
      <td><?=$Order['rl_Diverse']> 0 ? $Order['rl_Diverse']:'&nbsp;'?></td>
      <td><?=$Order['rl_Opmerkingen'] !='' ? $Order['rl_Opmerkingen']:'&nbsp;'?></td>

    </tr>




    <tr>
      <td scope="row"><?=$Order['3m3_Bsa']> 0 ? $Order['3m3_Bsa']:'&nbsp;'?></td>
       <td><?=$Order['3m3_Puin']> 0 ? $Order['3m3_Puin']:'&nbsp;'?></td>
      <td><?=$Order['3m3_Hout']> 0 ? $Order['3m3_Hout']:'&nbsp;'?></td>
       <td><?=$Order['3m3_Plastic_Folie']> 0 ?$Order['3m3_Plastic_Folie'] :'&nbsp;'?></td>
      <td><?=$Order['3m3_Papier']> 0 ? $Order['3m3_Papier']:'&nbsp;'?></td>
      <td><?=$Order['3m3_Diverse']> 0 ? $Order['3m3_Diverse']:'&nbsp;'?></td>
      <td><?=$Order['3m3_Opmerkingen']!='' ? $Order['3m3_Opmerkingen']:'&nbsp;'?></td>

    </tr>
    <tr>
    <td scope="row"><?=$Order['6m3_Bsa']> 0 ? $Order['6m3_Bsa']:'&nbsp;'?></td>
       <td><?=$Order['6m3_Puin']> 0 ? $Order['6m3_Puin']:'&nbsp;'?></td>
      <td><?=$Order['6m3_Hout']> 0 ? $Order['6m3_Hout']:'&nbsp;'?></td>
       <td><?=$Order['6m3_Plastic_Folie']> 0 ?$Order['6m3_Plastic_Folie'] :'&nbsp;'?></td>
      <td><?=$Order['6m3_Papier']> 0 ?$Order['6m3_Papier'] :'&nbsp;'?></td>
       <td><?=$Order['6m3_Diverse']> 0 ? $Order['6m3_Diverse']:'&nbsp;'?></td>
      <td><?=$Order['6m3_Opmerkingen']!='' ? $Order['6m3_Opmerkingen']:'&nbsp;'?></td>

    </tr>
    <tr>
     <td scope="row"><?=$Order['10m3_Bsa']> 0 ?$Order['10m3_Bsa'] :'&nbsp;'?></td>
       <td><?=$Order['10m3_Puin']> 0 ? $Order['10m3_Puin']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Hout']> 0 ?$Order['10m3_Hout'] :'&nbsp;'?></td>
       <td><?=$Order['10m3_Plastic_Folie']> 0 ? $Order['10m3_Plastic_Folie']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Papier']> 0 ?$Order['10m3_Papier'] :'&nbsp;'?></td>
      <td><?=$Order['10m3_Diverse']> 0 ? $Order['10m3_Diverse']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Opmerkingen']!='' ? $Order['10m3_Opmerkingen']:'&nbsp;'?></td>

    </tr>
    <tr>
      <td scope="row"><?=$Order['10m3_Bsa_dicht']> 0 ? $Order['10m3_Bsa_dicht']:'&nbsp;'?></td>
       <td><?=$Order['10m3_Puin_dicht']> 0 ? $Order['10m3_Puin_dicht']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Hout_dicht']> 0 ?$Order['10m3_Hout_dicht'] :'&nbsp;'?></td>
       <td><?=$Order['10m3_Plastic_Folie_dicht']> 0 ? $Order['10m3_Plastic_Folie_dicht']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Papier_dicht']> 0 ? $Order['10m3_Papier_dicht']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Diverse_dicht']> 0 ? $Order['10m3_Diverse_dicht']:'&nbsp;'?></td>
      <td><?=$Order['10m3_Opmerkingen_dicht']!='' ? $Order['10m3_Opmerkingen_dicht']:'&nbsp;'?></td>

    </tr>
    <tr>
    <td scope="row"><?=$Order['20m3_Bsa']> 0 ? $Order['20m3_Bsa']:'&nbsp;'?></td>
       <td><?=$Order['20m3_Puin']> 0 ? $Order['20m3_Puin']:'&nbsp;'?></td>
      <td><?=$Order['20m3_Hout']> 0 ? $Order['20m3_Hout']:'&nbsp;'?></td>
       <td><?=$Order['20m3_Plastic_Folie']> 0 ? $Order['20m3_Plastic_Folie']:'&nbsp;'?></td>
      <td><?=$Order['20m3_Papier']> 0 ? $Order['20m3_Papier']:'&nbsp;'?></td>
      <td><?=$Order['20m3_Diverse']> 0 ? $Order['20m3_Diverse']:'&nbsp;'?></td>
      <td><?=$Order['20m3_Opmerkingen']!='' ? $Order['20m3_Opmerkingen']:'&nbsp;'?></td>
    </tr>

    <tr>
      <td scope="row"><?=$Order['30m3_Bsa']> 0 ? $Order['30m3_Bsa']:'&nbsp;'?></td>
       <td><?=$Order['30m3_Puin']> 0 ? $Order['30m3_Puin']:'&nbsp;'?></td>
      <td><?=$Order['30m3_Hout']> 0 ? $Order['30m3_Hout']:'&nbsp;'?></td>
       <td><?=$Order['30m3_Plastic_Folie']> 0 ?$Order['30m3_Plastic_Folie'] :'&nbsp;'?></td>
      <td><?=$Order['30m3_Papier']> 0 ? $Order['30m3_Papier']:'&nbsp;'?></td>
      <td><?=$Order['30m3_Diverse']> 0 ? $Order['30m3_Diverse']:'&nbsp;'?></td>
      <td><?=$Order['30m3_Opmerkingen']!='' ? $Order['30m3_Opmerkingen']:'&nbsp;'?></td>

    </tr>





    <tr>
   <td scope="row"><?=$Order['40m3_Bsa']> 0 ?$Order['40m3_Bsa'] :'&nbsp;'?></td>
       <td><?=$Order['40m3_Puin']> 0 ? $Order['40m3_Puin']:'&nbsp;'?></td>
      <td><?=$Order['40m3_Hout']> 0 ? $Order['40m3_Hout']:'&nbsp;'?></td>
       <td><?=$Order['40m3_Plastic_Folie']> 0 ? $Order['40m3_Plastic_Folie']:'&nbsp;'?></td>
      <td><?=$Order['40m3_Papier']> 0 ? $Order['40m3_Papier']:'&nbsp;'?></td>
      <td><?=$Order['40m3_Diverse']> 0 ? $Order['40m3_Diverse']:'&nbsp;'?></td>
      <td><?=$Order['40m3_Opmerkingen']!='' ? $Order['40m3_Opmerkingen']:'&nbsp;'?></td>

    </tr>

  </tbody>
</table>
</div>
<div style="clear:both"></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:75px; border: none;">
       <tr>
	   <td align="center" style="font-weight:bold; font-size:14px; border: none; text-align: center;">
     			Indien de samenstelling van de afvalstroom afwijkt van hetgeen is opgegeven, afkeuring
    <br> vermelden op transportbon en foto’s van desbetreffende vracht met factuur meesturen.<!--<br><br>
    <span style="background-color: yellow">( * Gecertificeerde Hijsbaar containers met hijsogen)</span>-->

        </td>
	</tr>
     </table>
     <!-- <div style="border-bottom: 1px solid #000 !important; width:100%">&nbsp;</div>-->
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:10px; border: none;">
       <tr>
	   <td align="center" style="border: none; font-size:11px; text-align: center;">
     			Easy Clean Up BV | Kollenbergweg 78, 1101 AV Amsterdam | Tel.: 020-6916115  |  containers@easycleanup.nl
        </td>
	</tr>
     </table>

</div>









</body>
</html>
