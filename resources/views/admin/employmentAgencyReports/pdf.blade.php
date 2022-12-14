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

      .footer {
        position:fixed;
        bottom:0;
        left:0;
      }
      </style>
    </head>
    <body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

      <table width="100%" cellpadding="0" cellspacing="0" border="0" class="firstTable">
        <tr>
          <td width="30%" >
            <img src="<?php echo url();?>/assets/img/icons/Logo.jpg" style=" vertical-align:top" height="150px;"/>

          </td>
          <td style="line-height:4px; vertical-align:bottom; font-size:14px;">
            <h1 class="center">Easy Cleanup B.V.</h1>
            <p class="center">Kollenbergweg 78 – 1101 AV Amsterdam ZO</p>
            <p class="center">Tel: 020 - 691 61 15, Fax: 020 – 691 77 28</p>
            {{-- <p class="center">Dagelijks schoonmaken * Periodiek onderhoud * Bouw opruimen</p> --}}
            {{-- <p class="center">Impregneren * Glasbewerking * Specialistisch vloeronderhoud</p> --}}
            <br />
            {{-- <p class="center">Loonbelastingnummer: 8133.28.378.L01</p> --}}
            {{-- <p class="center">Omzetbelastingnummer: 8133.28.378.B01</p> --}}
          </td>
        </tr>
      </table>

      {{-- <div style="width:100%; border:1px solid #000"> --}}
      {{-- <p class="center" style="line-height:4px;">WEEK STAAT</p> --}}
      <h3 class="center">WEEKSTAAT</h3>
      <table width="100%" cellpadding="0" cellspacing="0" border="0" class="requiredTable">
        <tr>
          {{-- <td width="30%" ><span style="margin-left:10px;">Onderaannemer:</span></td> --}}
          <td width="30%" ><span style="margin-left:10px;"></span></td>
          <td>
            <div style=" width:70%;">
              <p style="margin-left:5px;line-height:2px; font-size:14px"><span>Naam:&nbsp;&nbsp; {{ $record->Employmentagency }} </span></p>
              <p style="margin-left:5px;line-height:2px; font-size:14px"><span>E-mail:&nbsp;&nbsp; {{ $record->Employmentagency_email }}</span></p>
            </div>
          </td>
        </tr>
      </table>
      <br>
      <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top: -25px;">
        <tr>
          <td width="10%" ><span style="margin-left:10px; font-weight:bold;">Weeknummer:</span></td>
          <td width="10%" ><span style="margin-left:10px;font-size:20px">{{ substr($weeknumber,4,2) }}</span></td>
          <td width="5%" ><span style="margin-left:10px;font-weight:bold;">Datum:</span></td>
          <td width="20%" ><span style="margin-left:10px;">{{ $datestring }}</span></td>
        </tr>
      </table>

    </div>

    <p style="line-height:10px; font-size:12px" align="center">Eventuele wijzigingen in de gewerkte uren kunnen aangepast worden indien de getekende werkbon afwijkt</p>




    <table width="100%" class="weekcard" style="border-right: 1px solid black;">

      <tr>
        <th width="10%" rowspan="2" class="center">W. nr.</th>
        <th width="25%" rowspan="2" class="center">Naam werknemer</th>
        {{-- <th width="18%" rowspan="2" class="center">BSN</th> --}}
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
        <th width="25%" class="center" colspan="2" style="border-right: 1px solid black;">Opmerkingen</th>
      </tr>
      @if ($record->employmentAgencyWeeklyReportDetails)
        @foreach ($record->employmentAgencyWeeklyReportDetails as $key => $record)
          <tr>
            <td class="center">{{ ++$key }}&nbsp;</td>
            <td class="text-left">{{ $record->Name }}&nbsp;</td>
            {{-- <td class="center">{{ $record->bsn }}&nbsp;</td> --}}
            <td class="center">{{ ($record->Mon != 0) ? $record->Mon : "-" }}&nbsp;</td>
            <td class="center">{{ ($record->Tue != 0) ? $record->Tue : "-" }}&nbsp;</td>
            <td class="center">{{ ($record->Wed != 0) ? $record->Wed : "-" }}&nbsp;</td>
            <td class="center">{{ ($record->Thu != 0) ? $record->Thu : "-" }}&nbsp;</td>
            <td class="center">{{ ($record->Fri != 0) ? $record->Fri : "-" }}&nbsp;</td>
            <td class="center">{{ ($record->Sat != 0) ? $record->Sat : "-" }}&nbsp;</td>
            <td class="center">{{ ($record->Sun != 0) ? $record->Sun : "-" }}&nbsp;</td>
            <td class="center">{{ $record->Hours }}&nbsp;</td>
            <td colspan="2" class="left">{{ $record->Employmentagencynote }}&nbsp;</td>
          </tr>
        @endforeach
        @for ($i=0; $i < $emptyRows; $i++)
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
        @endfor
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <th colspan="6" align="right" class="strong" style="font-size:14px;">Totale uren:&nbsp;</th>
          <td class="center">{{ $total }}&nbsp;</td>
          <td colspan="2">&nbsp;</td>
        </tr>
      @endif
    </table>

    <br>

    <div class="row">
      <div class="col-md-12" style="width: 100%">
        {{-- <span style="font-size:14px">Opmerkingen:</span> --}}
        <span style="font-size:14px">Opmerkingen: {{ $Notes }}</span>
        {{-- <p style="display: inline-block; font-size:14px;">{{ $Notes }}</p> --}}
      </div>
    </div>

    <div class="row" style="margin-top: 25px; width: 51%; display: inline-block; float: left;">
      <div class="col-md-6">
        <span style="width:300px; font-size:14px">Handtekening:</span>
        <span style="">
          <img src="{{ URL::asset('assets/img/signature.png') }}" alt="Signature" style="width: 100px;">
        </span>
        <span style="padding: 0 30px; border-bottom: 1px solid black; margin-left: -100px;">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </span>
        <br>
        <div style="height:30px;">&nbsp;</div>
        <br>
        <span style="width:300px;font-size:14px">Naam: </span>
        <span style="margin-left:60px;border-bottom: 1px solid black; padding: 0 25px;">S.U. Rehman</span>
        <br>
        <span style="padding: 0 126px; font-size:12px; font-weight:bold; vertical-align:text-top;margin-left: 10px">Easy Clean Up BV</span>
      </div>
    </div>
    <div class="row" style="margin-top: 20px; width: 49%; display: inline-block; float: right;">
      <div class="col-md-6">
        <span style="width:300px; font-size:14px">Verz. datum:</span>
        <span style="margin-left:20px;border-bottom: 1px solid black; padding: 0 25px;">{{ ($Sent_Date != "0000-00-00") ? $Sent_Date : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"}}</span>

        {{-- <div style="height:50px;">&nbsp;</div>

        <span style="width:300px; font-size:14px">Factuurdatum:</span>
        <span style="margin-left: 10px;border-bottom: 1px solid black; padding: 0 25px;">{{ ($Billing_Date) ? $Billing_Date : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"}}</span> --}}

        {{-- <div style="height:50px;">&nbsp;</div>

        <span style="width:300px; font-size:14px">Opmerkingen:</span>
        <span style="margin-left:50px;border-bottom: 1px solid black; padding: 0 25px;">{{ ($Notes) ? $Notes : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"}}</span> --}}

        {{-- <div style="height:50px;">&nbsp;</div>
        <p style="font-size:16px;">Pagina: 1</p> --}}
      </div>
    </div>
    <footer class="footer">
      <p style="font-size:16px;">Pagina: 1</p>
    </footer>

  </body>
  </html>
