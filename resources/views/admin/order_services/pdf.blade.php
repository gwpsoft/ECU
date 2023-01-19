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
        font-family:"Arial Black", Gadget, sans-serif;
        }
		.center{ text-align:center;}
		h4 { margin-top:50px;}
		li { font-size:16px; font-weight:normal; padding:6px;}
        table,td {
            border:1px solid #000;text-shadow:none; text-align:left; font-size:13px; font-weight:normal; padding:4px;line-height:24px !important; }
			table,th {  border:1px solid #000; box-shadow:none;  text-align:left; font-size:13px; font-weight:bold; padding:3px;}

         /* #firstTable, td {
            border: none;
         }
         #firstTable, th {
            border: none;
         } */
		table  {
          /* border-collapse: collapse;*/ }
		.strong{ font-weight:bold;}
		.table td { text-align:center !important; line-height:20px !important;}
         .footer { position: fixed; bottom: 0px; }

         .week-number {
            /* border: 1px solid black; */
            float: right !important;
            /* padding: 5px; */
				/* display: inline-block; */
         }
    </style>
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" id="firstTable" style="border: none;">
        <tr>
        <td  align="center" style="border: none;">
        <img src="<?php echo url();?>/assets/img/icons/logo_sm.png" style=" vertical-align:top; height:75px; margin-bottom:10px;"  />
		<img src="<?php echo url();?>/assets/img/icons/easycleanup_logo_large.jpg" style=" vertical-align:top; width:400px; height:80px;"  />

        </td>
        </tr>
       <tr>
        <td style="line-height:4px; vertical-align:bottom; border: none;" align="center">
     			<h2 style="display: inline-block; text-align: center; margin: 0 40%; white-space: nowrap;">Aanvraag Personeel</h2>
      		<h3 class="week-number"><strong>WEEK {{ date("W - Y", strtotime($Order['Begindatum'])) }}</strong></h3>
        </td>
        </tr>
        </table>


	 <table width="100%" cellpadding="3" cellspacing="0" style="font-size:12px; border: none;">

        <tr>
            <th  align="Left" >Project Naam</th>
            <td colspan="3" style="font-size:14px; font-weight:bold; border: 1px solid #000"; ><?=@$project->Name?></td>
         </tr>
     	  <tr>
           <th align="Left" style="width:20% !important">Afdeling</th>
            <td style="width:30% !important; border: 1px solid #000";><?=@$Order['Afdeling']?></td>
            <th align="Left" style="width:20% !important">Besteld door</th>
            <td  style="width:30% !important; border: 1px solid #000";><?=@$Order['con_Firstname'].' '.@$Order['con_Lastname']?></td>

        </tr>

        <tr>
            <th align="Left">Project Adres</th>
            <td ><?=@$Order['Work_Address']?></td>
            <th align="Left">Telefoonnummer</th>
            <td ><?=@$Order['con_Telefoonnummer']?></td>

        </tr>
      <tr>
            <th  align="Left" >Postcode & plaats:</th>
            <td ><?=@$Order['Postcode']?></td>
              <th align="Left">Mobielenummer</th>
            <td ><?=@$Order['con_Mobilenummer']?></td>
        </tr>

         <tr>
            <th  align="Left" >Uitvoerder</th>
            <td  align="Left"><?=@$Order['Uitvoerder']?></td>
             <th  align="Left" >Aangenomen door</th>
            <td  align="Left"><?=@$Order['con_Aangenomendoor']?></td>


         </tr>
         <tr>
            <th  align="Left" >Telefoonnummer</th>
            <td  align="Left"><?=@$Order['phone_number']?></td>
             <th  align="Left" >Aanvraagdatum</th>
             <?php $day = date('l',strtotime(@$Order['Order_Date']));?>
            <td  align="Left"><?=date('d-m-Y',strtotime(@$Order['Order_Date']))?> / <?=convert_day ($day)?></td>


         </tr>
         <tr>
          <th  align="Left" >Aanvraagnummer</th>
            <td  align="Left" >AP-<?=sprintf('%02d',$Order['Nummer'])?></td>
          <th  align="Left" >Tijd</th>
            <td  ><?=date('H:i',strtotime(@$Order['time']))?></td>
            </tr>
        </table>

         <table width="100%" cellpadding="3" cellspacing="0" border="0">

       <tr style="line-height:4px; vertical-align:bottom;" align="left">
	   <td>
     			 <h3>Opdracht:</h3>
        </td>
	</tr>

      </table>


         <table width="100%" cellpadding="3" cellspacing="0">


     	  <tr>
            <th  align="Left" style="width:20% !important" >Begindatum</th>

            <?php $day2 = date('l',strtotime(@$Order['Begindatum']));?>
            <td style="width:30% !important"><?=date('d-m-Y',strtotime(@$Order['Begindatum']))?> / <?=convert_day ($day2)?></td>
             <th style="width:20% !important" align="Left" >Begintijd</th>
            <td style="width:30% !important"><?=date('H:i',strtotime(@$Order['Begintijd']))?></td>
         </tr>
       <?php
	   $Melden = $Order['Melden_Bij'];

	   $contact = DB::table('tblcontact')
			->select('*')
			->where('tblcontact.Id',$Melden)->first();?>
         <tr>
            <th  align="Left" >Aantal Mensen</th>
            <td ><?=@$Order['Aantal_Mensen']?></td>
             <th  align="Left" >Hoeveel Dagen</th>
            <td ><?=@$Order['Hoeveel_Dagen']?></td>
         </tr>

          <tr>
          	   <th  align="Left" >Melden Bij</th>
            <td ><?=@$contact->Firstname.' '.@$contact->Lastname?></td>
            <th  align="Left" >Telefoonnummer</th>
            <td><?=@$Order['Telefoonnummer']?></td>
         </tr>
         <tr>
           <th  align="Left" >Werkzaamheden</th>
            <td  colspan="3" ><?php if ($Order['Werkzaamheden'] =='Anders') {
				echo $Order['Anders'];
			} else {
				echo $Order['Werkzaamheden'];
			}
				?>
           </td>
          </tr>
         <tr>
            <th  align="Left" >Benodigheden</th>
            <td colspan="3" ><?=@$Order['Benodigheden']?></td>
         </tr>

         <tr>
            <th  align="Left" >Opmerkingen</th>
            <td colspan="3" ><?=@$Order['Opmerkingen']?></td>
         </tr>

         <tr>
            <th  align="Left" >Project notities</th>
            <td colspan="3" ><?=@$Order['more_notes']?></td>
         </tr>

     </table>

<div style="width:100%">

<div style="clear:both"></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="footer">
       <tr>
	   <td align="center" style=" font-size:11px;">
     			Easy Clean Up BV | Kollenbergweg 78, 1101 AV Amsterdam | Tel.: 020-6916115
        </td>
	</tr>
     </table>

</div>
</body>
</html>
