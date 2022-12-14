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

        table,td,th{
            border:1px solid #000; box-shadow:none; text-shadow:none; }
		table  {
           border-collapse: collapse; }

      table.requiredTable, table.requiredTable td, table.requiredTable th {
            border: none;
      }
      table.firstTable, table.firstTable td, table.firstTable th {
            border: none;
      }
		.strong{ font-weight:bold;}
        .weekcard  th { font-size:13px !important;} .weekcard td{ font-size:11px !important;}
    </style>
</head>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="firstTable">
        <tr>
        <td width="30%" >
		<img src="<?php echo url();?>/assets/img/icons/Logo.jpg" style=" vertical-align:top" />

        </td>
        <td style="line-height:4px; vertical-align:bottom; font-size:14px;">
        <h1 class="center">Easy Cleanup B.V.</h1>
        <p class="center">Kollenbergweg 78 – 1101 AV Amsterdam ZO</p>
        <p class="center">Tel: 020 - 691 61 15, Fax: 020 – 691 77 28</p>
        <p class="center">Dagelijks schoonmaken * Periodiek onderhoud * Bouw opruimen</p>
        <p class="center">Impregneren * Glasbewerking * Specialistisch vloeronderhoud</p>
        <br />
        <p class="center">Loonbelastingnummer: 8133.28.378.L01</p>
        <p class="center">Omzetbelastingnummer: 8133.28.378.B01</p>
        </td>
        </tr>
        </table>

      {{-- <div style="width:100%; border:1px solid #000"> --}}
      <p class="center" style="line-height:4px;">WEEK STAAT</p>
       <table width="100%" cellpadding="0" cellspacing="0" border="0" class="requiredTable">
       <tr>
       <td width="30%" ><span style="margin-left:10px;">Onderaannemer:</span></td>
       <td>
       <div style=" width:70%;">
       <p style="font-size:18px;margin-left:5px;"> {{ $EmployeeAgency[0]->Employmentagency }}</p>
       <p style="margin-left:5px;line-height:4px; font-size:16px;">{{ $EmployeeAgency[0]->Employmentagency_address }}</p>
       <p style="margin-left:5px;line-height:4px; font-size:16px;">{{ $EmployeeAgency[0]->Employmentagency_zipcode }} {{ $EmployeeAgency[0]->Employmentagency_city }}</p><br>
       <p style="margin-left:5px;line-height:2px; font-size:14px"><span>Fax:&nbsp;&nbsp; <?php if($EmployeeAgency[0]->Employmentagency_fax != 0){ echo $EmployeeAgency[0]->Employmentagency_fax; } ?></span></p>
       <p style="margin-left:5px;line-height:2px; font-size:14px"><span>Tel:&nbsp;&nbsp; <?php if($EmployeeAgency[0]->Employmentagency_fone != 0){ echo $EmployeeAgency[0]->Employmentagency_fone; } ?> </span></p>
       <p style="margin-left:5px;line-height:2px; font-size:14px"><span>Mobile:&nbsp;&nbsp; <?php if($EmployeeAgency[0]->Employmentagency_mobile != 0){ echo $EmployeeAgency[0]->Employmentagency_mobile; } ?> </span></p>
       <p style="margin-left:5px;line-height:2px; font-size:14px"><span>E-mail:&nbsp;&nbsp; {{ $EmployeeAgency[0]->Employmentagency_email }}</span></p>

       </div>
       </td>
       </tr>
       </table>
       <br>
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
         <tr>
       <td width="10%" ><span style="margin-left:10px; font-weight:bold;">Weeknumber:</span></td>
       <td width="10%" ><span style="margin-left:10px;font-size:20px"><?=substr($weeknumber,4,2)?></span></td>
       <td width="5%" ><span style="margin-left:10px;font-weight:bold;">Datum:</span></td>
       <td width="20%" ><span style="margin-left:10px;"><?=$datestring?></span></td>
       </tr>
       </table>

      </div>

       <p style="line-height:10px; font-size:12px" align="center">Eventuele wijzigingen in de gewerkte uren kunnen aangepast worden indien de getekende werkbon afwijkt</p>




         <table width="100%" class="weekcard">

         <tr>
         <th width="10%" rowspan="2" class="center">W. nr.</th>
          <th width="25%" rowspan="2" class="center">Naam werknemer</th>
           <th width="18%" rowspan="2" class="center">BSN</th>
            <th width="70%" colspan="10" class="center">Gewerkte uren</th>
         </tr>
         <tr>
          <th width="1%" class="center">Ma</th>
          <th width="1%" class="center">Di</th>
          <th width="1%" class="center">Wo</th>
          <th width="1%" class="center">Do</th>
          <th width="1%" class="center">Vr</th>
          <th width="1%" class="center">Za</th>
          <th width="1%" class="center">Zo</th>
          <th width="10%" class="center">Totaal</th>
          <th width="25%" class="center" colspan="2">Opmerkingen</th>
         </tr>
         @if (sizeof($EmployeeAgency) > 0)

         <?php $i=0; $total = 0;
		 		foreach ($EmployeeAgency as $record) { $i++;?>
         <tr>
         <td class="center"><?=$i?>&nbsp;</td>
         <td class="center"><?=$record->Name?>&nbsp;</td>
         <td class="center"><?=$record->bsn?>&nbsp;</td>
         <td class="center"><?=number_format($record->Mon,2)?>&nbsp;</td>
         <td class="center"><?=number_format($record->Tue,2)?>&nbsp;</td>
         <td class="center"><?=number_format($record->Wed,2)?>&nbsp;</td>
         <td class="center"><?=number_format($record->Thu,2)?>&nbsp;</td>
         <td class="center"><?=number_format($record->Fri,2)?>&nbsp;</td>
         <td class="center"><?=number_format($record->Sat,2)?>&nbsp;</td>
         <td class="center"><?=number_format($record->Sun,2)?>&nbsp;</td>
         <td class="center"><?=number_format($record->Hours,2)?>&nbsp;</td>
         <td colspan="2" class="center"><?=$record->Employmentagencynote?>&nbsp;</td>
         </tr>
       <?php $total += $record->Hours; } ?>
         <tr>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <td>&nbsp;</td>
         <th colspan="7" align="right" class="strong" style="font-size:14px;">Totale uren:&nbsp;</th>
         <td class="center"><?=$total?>&nbsp;</td>
         <td colspan="2">&nbsp;</td>
         </tr>
         @endif
         </table>
        <div style="margin:25px;">&nbsp;</div>
        <span style="width:300px; margin-left:50px; font-size:14px">Handtekening:</span>
        <span style="padding: 0 30px; ">
           <img src="{{ URL::asset('assets/img/signature.png') }}" alt="Signature" style="width: 100px;">
        </span>
        <div class="row">

           <div style="display: inline-block; margin-left:170px; border-bottom: 1px solid black; padding: 0 68px;"></div>
        </div>

        <br>
        <div style="height:30px;">&nbsp;</div>
        <span style="width:300px;margin-left:50px;font-size:14px">Naam: </span>
        <span style="margin-left:70px;border-bottom: 1px solid black; padding: 0 20px;">S.U. Rehman</span>
        <br>
         <span style="padding: 0 126px; font-size:12px; font-weight:bold; vertical-align:text-top;margin-left:67px">Easy Clean Up BV</span>
          <div style="height:20px;">&nbsp;</div>
         <p style="font-size:16px;">Pagina: 1</p>





</body>
</html>
