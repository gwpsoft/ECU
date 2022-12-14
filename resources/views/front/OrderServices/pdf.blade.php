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
          /* border-collapse: collapse;*/ }
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
     			<h2>Aanvraag Personeel</h2>
      
        </td>
        </tr> 
        </table>
 

	 <table width="100%" cellpadding="3" cellspacing="0">
     
        <tr>
            <th  align="Left" >Project Naam</th>
            <td colspan="3" ><?=@$project->Name?></td>
         </tr>
     	  <tr>
           <th align="Left">Afdeling</th>
            <td >&nbsp;<?=@$Order['Afdeling']?></td>
            <th align="Left">Besteld door</th>
            <td  >&nbsp;<?=@$Order['con_Firstname'].' '.@$Order['con_Lastname']?></td>
            
        </tr>
     	
        <tr>
            <th align="Left">Project Adres</th>
            <td >&nbsp;<?=@$Order['Work_Address']?></td>
            <th align="Left">Telefoonnummer</th>
            <td ><?=@$Order['con_Telefoonnummer']?></td>
           
        </tr>
      <tr>
            <th  align="Left" >Postcode & plaats:</th>
            <td ><?=@$Order['Postcode']?></td>
              <th align="Left">Mobilenummer</th>
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
            <td  align="Left"><?=@$Order['Order_Date']?></td>
            
        
         </tr>
         <tr>
          <th  align="Left" >Aanvraagnummer</th>
            <td  align="Left" >AS-<?=sprintf('%2d',$Order['Nummer'])?></td>
          <th  align="Left" >Tijd</th>
            <td  ><?=@$Order['time']?></td>
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
            <th  align="Left" style="width:28% !important" >Begindatum</th>
            <td style="width:28% !important"><?=@$Order['Begindatum']?></td>
             <th style="width:25% !important" align="Left" >Begintijd</th>
            <td ><?=@$Order['Begintijd']?></td>
         </tr> 
       
         <tr>
            <th  align="Left" >Aantal Mensen</th>
            <td ><?=@$Order['Aantal_Mensen']?></td>
             <th  align="Left" >Hoeveel Dagen</th>
            <td ><?=@$Order['Hoeveel_Dagen']?></td>
         </tr>
         
          <tr>
            <th  align="Left" >Werkzaamheden</th>
            <td ><?php if ($Order['Werkzaamheden'] =='Anders') {
				echo $Order['Anders'];
			} else {
				echo $Order['Werkzaamheden'];
			}
				?></td>
             <th  align="Left" >Melden Bij</th>
            <td ><?=@$Order['Melden_Bij']?></td>
         </tr>
        
        <tr>
            <th  align="Left" >Telefoonnummer</th>
            <td colspan="3" ><?=@$Order['Telefoonnummer']?></td>
         </tr>
         <tr>
            <th  align="Left" >Benodigheden</th>
            <td colspan="3" ><?=@$Order['Benodigheden']?></td>
         </tr>   
        
         <tr>
            <th  align="Left" >Opmerkingen</th>
            <td colspan="3" ><?=@$Order['Opmerkingen']?></td>
         </tr>        
        
     </table>
<div style="width:100%">

<div style="clear:both"></div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:415px; ">
       <tr>
	   <td align="center" style=" font-size:11px;">
     			Easy Clean Up BV | Kollenbergweg 78, 1101 AV Amsterdam | Tel.: 020-6916115
        </td>
	</tr>
     </table>

</div>
</body>
</html>
