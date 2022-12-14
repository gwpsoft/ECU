<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

   "http://www.w3.org/TR/html4/loose.dtd">



<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title></title>

    <style>

        body {

        font-family:"Arial", Gadget, sans-serif;
/*margin:2px; */
        }

		.center{ text-align:center; }
		.left{ text-align:left; }
		.padding{ padding:3px; }
		.right{ text-align:right;}
		.margin-top{ margin-top:15px !important}

/*footer { position: relative ; bottom: -20px; left: 0px; right: 0px; text-align:left;  height: 20px; text-decoration:underline; }*/
footer .pagenum:before {
      content: '<?php echo $id ?>';
}
 footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 10px;
				text-decoration:underline;

            }


      .weekcard table,td,th {

            border:1px solid #000; box-shadow:none; text-shadow:none; }

		table  {

           border-collapse: collapse; }

		.strong{ font-weight:bold;}

        .weekcard th { font-size:12px !important; } .weekcard td{ font-size:11px !important;}

		.address > td,th {

             line-height:11px; }

}
    </style>

</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">



    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:-10px;">

        <tr>

        <td width="25%" style="border: none;">

		<img src="{{ base_path() }}/assets/img/icons/Logo.jpg" style=" vertical-align:top; height:160px; width:270px; margin-bottom:25px;" />



        </td>

        <td width="60%" style="line-height:4px; vertical-align:bottom; font-size:13px; border: none;">

        <h1 class="center">Easy Clean UP B.V.</h1>

        <p class="center">Kollenbergweg 78 - 1101 AV Amsterdam</p>

        <p class="center">Tel: 020 - 691 61 15, E-mail: info@easycleanup.nl</p>

        <p class="center">&nbsp;</p>

        <p class="center">Schoonmaakonderhoud - Bouwopruiming - Opleveringsschoonmaak</p>

        <p class="center">Glasbewassing - Gevelreiniging - Keetschoonmaak - Bedrijfsdiensten</p>

        <p class="center">Bouwafval management & Containers Service</p>


        </td>

        </tr>

        </table>



      <div style="width:101%; border:1px solid #000">

      <p class="center" style="line-height:4px;">WEEKSTAAT</p>

       <table width="100%" cellpadding="0" cellspacing="0" border="0">

       <tr>

       <td width="30%" style="border: none;"><span style="margin-left:10px;text-align:left;font-size:12px;">OPDRACHTGEVER:</span></td>

       <td width="65%" style="border: none;"><?=$week_details[0]->Department_Name?></td>

       </tr>





       <tr>

       <td width="30%" style="border: none;"><span style="margin-left:10px;text-align:left;font-size:12px;">WEEK NUMMER:</span></td>

       <td width="60%" style="border: none;"><?php echo $value = substr($week_details[0]->Weeknumber, 0, -2).'-'.substr($week_details[0]->Weeknumber, -2); ?></td>

       </tr>



       <tr>

       <td width="30%" style="border: none;"><span style="margin-left:10px;text-align:left; font-size:12px;">PROJECTNAAM:</span></td>

       <td width="60%" style="border: none;"><?=$week_details[0]->Project?></td>

       </tr>



       <tr>

       <td width="30%" style="border: none;"><span style="margin-left:10px;font-size:12px">KLANT PROJ. NR.:</span></td>

       <td width="60%" style="border: none;"><?=$week_details[0]->Customer_Ref?>&nbsp;</td>

       </tr>

        <tr>

       <td width="30%" style="border: none;"><span style="margin-left:10px;font-size:12px">ECU PROJECT/DEBITEUR #:</span></td>

       <td width="60%" style="border: none;"><?=$week_details[0]->Project_Ref?>&nbsp;</td>

       </tr>
       <tr>

       <td width="30%" style="border: none;"><span style="margin-left:10px;font-size:12px">WEEKSTAAT ID:</span></td>

       <td width="60%" style="border: none;"><?php echo $id ?>&nbsp;</td>

       </tr>

       </table>

       <br>



      </div>



         <table width="100%" class="weekcard">

         <tr>

         <th width="10%" rowspan="2" class="center">W. nr.</th>

          <th width="25%" rowspan="2" class="center">Naam werknemer</th>

           <!--<th width="15%" rowspan="2" class="center">BSN nummer</th>-->

            <th width="40%" colspan="15" class="center"  >Gewerkte uren</th>

         </tr>

         <tr>

          <th width="4%" class="center">Ma</th>

          <th width="4%" class="center">Di</th>

          <th width="4%" class="center">Wo</th>

          <th width="4%" class="center">Do</th>

          <th width="4%" class="center">Vr</th>

          <th width="4%" class="center">Za</th>

          <th width="4%" class="center">Zo</th>

         <th width="7%" class="center">Totaal</th>

          <th width="30%" class="center" colspan="7">Opmerkingen</th>
         </tr>



         <?php $i=0; $total = 0; $k=0;
				 $count =0;

		 		foreach ($week_Employees as $record) {

					if ($record->Billable == 1) {


					 $i++;


					 ?>

         <tr>

         <td class="center"><?=$i?>&nbsp;</td>

         <td class="left"><?=$record->Name?>&nbsp;</td>

         <!--<td class="center"><?=$record->Sofinumber?>&nbsp;</td>-->

         <td class="center padding"><?php
		  //echo sprintf('%g',$record->Mon);
		 echo ($record->Mon > 0 ? sprintf('%g',$record->Mon) : '-');



		 //echo $record->Mon > 0 ? ($record->Mon >= 8 ? $record->Mon : number_format($record->Mon,2)) : ($record->Mon == 0 ? '-' : '')//($record->Mon == 8 ? $record->Mon : $record->Mon == 0 ? '-' : (number_format($record->Mon,2)));?> &nbsp;</td>

         <td class="center padding"><?php
		  echo ($record->Tue > 0 ? sprintf('%g',$record->Tue) : '-');
		 //echo $record->Tue > 0 ? ($record->Tue >= 8 ? $record->Tue : number_format($record->Tue,2)) : ($record->Tue == 0 ? '-' : '')//($record->Tue == 8 ? $record->Tue : $record->Tue == 0 ? '-' : (number_format($record->Tue,2)));?> &nbsp;</td>

         <td class="center padding"><?php
		 echo ($record->Wed > 0 ? sprintf('%g',$record->Wed) : '-');
		 //echo $record->Wed > 0 ? ($record->Wed >= 8 ? $record->Wed : number_format($record->Wed,2)) : ($record->Wed == 0 ? '-' : '') //($record->Wed == 8 ? $record->Wed : $record->Wed == 0 ? '-' : (number_format($record->Wed,2)));?> &nbsp;</td>

         <td class="center padding"><?php
		 echo ($record->Thu > 0 ? sprintf('%g',$record->Thu) : '-');
		 //echo $record->Thu > 0 ? ($record->Thu >= 8 ? $record->Thu : number_format($record->Thu,2)) : ($record->Thu == 0 ? '-' : '') //($record->Thu == 8 ? $record->Thu : $record->Thu == 0 ? '-' : (number_format($record->Thu,2)));?>  &nbsp;</td>

         <td class="center padding"><?php
		 echo ($record->Fri > 0 ? sprintf('%g',$record->Fri) : '-');
		 //echo $record->Fri > 0 ? ($record->Fri >= 8 ? $record->Fri : number_format($record->Fri,2)) : ($record->Fri == 0 ? '-' : '') //($record->Fri == 8 ? $record->Fri : $record->Fri == 0 ? '-' : (number_format($record->Fri,2)));?> &nbsp;</td>

         <td class="center padding"><?php
		 echo ($record->Sat > 0 ? sprintf('%g',$record->Sat) : '-');
		 //echo $record->Sat > 0 ? ($record->Sat >= 8 ? $record->Sat : number_format($record->Sat,2)) : ($record->Sat == 0 ? '-' : '') //($record->Sat == 8 ? $record->Sat : $record->Sat == 0 ? '-' : (number_format($record->Sat,2)));?> &nbsp;</td>

         <td class="center padding"><?php
		 echo ($record->Sun > 0 ? sprintf('%g',$record->Sun) : '-');
		 //echo $record->Sun > 0 ? ($record->Sun >= 8 ? $record->Sun : number_format($record->Sun,2)) : ($record->Sun == 0 ? '-' : '');?>&nbsp;</td>
         <td class="right padding"><?=number_format($record->Hours,2)?>&nbsp;</td>

         <td colspan="7" class="left"><?=$record->Note?>&nbsp;</td>
<?php //$record->Tue > 0 ? ($record->Tue == 8 ? $record->Tue : number_format($record->Tue,2)) : ($record->Tue == 0 ? '-' : '')?>
         </tr>
  <?php $total += $record->Hours;

    }


	 }
 $remaining = (18-$i);
  for ($j=0; $j < $remaining; $j++) {
			 if ($j == 28){
		?>
       <span style="page-break-before: always;">&nbsp;</span>
          <footer style="margin-top:160px !important; ">
	   <div class="pagenum-container"><span class="pagenum"></span></div>
	 </footer>

        <?php } ?>

	<tr>

         <td class="center padding">&nbsp;</td>

         <td class="left padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

         <td class="center padding">&nbsp;</td>

        <!-- <td class="center">&nbsp;</td>       -->

         <td colspan="7" class="center padding">&nbsp;</td>

         </tr>
<?php } ?>



         <tr>

         <td>&nbsp;</td>

         <td>&nbsp;</td>

         <td>&nbsp;</td>

         <th colspan="6" align="right" class="strong" style="font-size:14px;">Totale uren:&nbsp;</th>

         <td class="right"><?=number_format($total,2)?>&nbsp;</td>

        <td colspan="7" class="center">&nbsp;</td>

         </tr>

         </table>



		 <span class="margin-top" style="margin:15px;">Notitie: <?=$week_details[0]->Notes?></span>

           <!--p style="margin:4px;">&nbsp;</p--><br><br>


        <table width="90%" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;" class="address">

        <tr>

        <td width="5%" style="border: none;">Handtekening:</td>

        <td style="border: none; border-bottom: 1px solid black;" width="20%">&nbsp;</td>

        <td width="5%"  style="border: none; ">&nbsp;</td>

         <td width="5%"  style="border: none;">Uitvoerder:</td>

        <td width="20%" style="border: none; border-bottom: 1px solid black; margin-left:10px; "><?=$week_details[0]->contact_firstname.' '.$week_details[0]->contact_lastname?></td>

        </tr>



		  <tr>

        <td  colspan="5"  style="border: none;">&nbsp;</td>



        </tr>





        <tr>



           <td width="5%"  style="border: none;">Naam:</td>

        <td style="border: none; border-bottom: 1px solid black;" width="20%">&nbsp;</td>


 		<td width="5%"  style="border: none;">&nbsp;</td>


         <td width="5%"  style="border: none;">Mobilenummer:</td>

        <td width="20%" style="border: none; border-bottom: 1px solid black; margin-left:10px; "><?=$week_details[0]->contact_mobile;?></td>

        </tr>

        <tr>

        <td style="border: none;" colspan="5">&nbsp;</td>



        </tr>

  <tr>

        <td colspan="3" width="25%" style="border: none;">&nbsp; </td>



         <td width="15%" style="border: none;">E-mail adres:</td>

        <td width="50%" style="border: none; border-bottom: 1px solid black; margin-left:10px; "><?=$week_details[0]->contact_email?></td>

        </tr>






   <tr>

        <td  colspan="5" style="border: none;">&nbsp;</td>



        </tr>



		<tr>

        <td colspan="3" width="25%" style="border: none;">&nbsp; </td>



         <td width="15%" style="border: none;">Project Adres:</td>

        <td width="30%" style="border: none; border-bottom: 1px solid black; margin-left:10px; "><?=$week_details[0]->Project_address?></td>

        </tr>

   <tr>

        <td  colspan="5" style="border: none;">&nbsp;</td>



        </tr>

         <tr>

        <td colspan="4" width="50%" style="border: none;">&nbsp; </td>

        <td width="30%" style="border: none; border-bottom: 1px solid black; margin-left:10px; "><?=$week_details[0]->Project_city?></td>

        </tr>
        <tr>
        <td colspan="4" width="50%" style="border: none;">&nbsp; </td>
        </tr>
        <!--tr>
        <td colspan="4" width="50%" style="border: none;">&nbsp; </td>
      </tr-->

        </table>
<table  width="90%" border="0" cellpadding="0" cellspacing="0" style="font-size:12px;" class="address">
  <tr>
    <td colspan="4" width="50%" style="border: none;"><font color="red">Maak gebruik van onze handige mobiele App voor container bestellingen en persoeelsaanvragen. Zie onze website www.easycleanup.nl voor de download link van de mobiele App</font></td>
    <td style="border:none;"><img src="{{ base_path() }}/assets/img/icons/playstore.png"></td>
    <td style="border:none;"><img src="{{ base_path() }}/assets/img/icons/appstore.png"></td>
  </tr>

</table>



          <!--<div style="height:20px;">&nbsp;</div>-->

         <!--<p style="font-size:16px;">Pagina: 1</p>-->

     <!--  <footer>
	   <div class="pagenum-container"><span class="pagenum"></span></div>

	 </footer>-->









</body>

</html>
