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
  .make-one-line {
    clear: both;
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
  }

  .center{ text-align:center; }
  .left{ text-align:left; }
  .padding{ padding:3px; }
  .right{ text-align:right;}
  .margin-top{ margin-top:25px !important}


  .weekcard table,td,th {
    border-collapse: collapse;
    border:1px solid #000; box-shadow:none; text-shadow:none; }

    .weekcard th {
      border-collapse: collapse;
      border-right: 1px solid black;
    }

    table  {

      border-collapse: collapse; }

      .strong{ font-weight:bold;}

      .weekcard th { font-size:10px !important; } .weekcard td{ font-size:10px !important;}

      #logo-table td {
        border: none;
      }

      #second-table td {
        border: none;
      }

      table td {
        text-align: right;
        font-size: 10px;
      }

      table th {
        text-align: left;
        font-size: 10px;
      }

      </style>

    </head>

    <body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">

      <table width="100%" cellpadding="0" cellspacing="0" border="0" id="firstTable" style="border: none;">
        <tr>
          <td  class="center" style="border: none;">
            <img src="<?php echo url();?>/assets/img/icons/logo_sm.png" style=" vertical-align:top; height:75px; margin-bottom:10px;"  />
            <img src="<?php echo url();?>/assets/img/icons/easycleanup_logo_large.jpg" style=" vertical-align:top; width:400px; height:80px;"  />

          </td>
        </tr>
      </table>

      <div style="width:100%;">

        <br>

      </div>

      <div style="width:100%; border:1px solid #000; height: 50px;">

        <h3 class="left" style="line-height:4px;">
          Project: {{ $projectName }}
        </h3>
        <h3 class="left" style="line-height:4px;">
          Afdeling: {{ $deptName }}
        </h3>

        <br>

      </div>

      <div class="row">
        <div style="width:100%;">
          <h4 class="left" style="line-height:4px; text-transform:uppercase; margin-top: 40px; margin-bottom: 0px;">
            ALLE REGIE UREN
          </h4>
          <br>
        </div>

        <div class="col-md-12">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Weeknr.</th>
                <th>Weekstaat ID</th>
                <th style="width: 30%;">Totaal Regie Uren</th>
                <th>Opgebracht</th>
                <th>Kosten</th>
                <th>Resultaat</th>
              </tr>
            </thead>
            <tbody>
              @if (sizeof($regie) > 0)
                @foreach ($regie as $reg)
                  <tr>
                    <td class="left">{{ $reg->Weeknumber }}</td>
                    <td class="left">{{ $reg->id }}</td>
                    <td>{{ number_format($reg->RegieHours, 2) }}</td>
                    <td>{{ number_format($reg->Opgebracht, 2) }}</td>
                    <td>{{ number_format($reg->Kosten, 2) }}</td>
                    <td>
                      {{ number_format($reg->gain, 2) }}
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div><!-- .row class end -->

      <div class="row">
        <div style="width:100%;">
          <h4 class="left" style="line-height:4px; text-transform:uppercase; margin-top: 40px; margin-bottom: 0px;">
            ALLE AANGENOMEN UREN
          </h4>
          <br>
        </div>

        <div class="col-md-12">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Weeknr.</th>
                <th>Weekstaat ID</th>
                <th style="width: 30%;">Totaal Aangenomen Uren</th>
                <th>Opgebracht</th>
                <th>Kosten</th>
                <th>Resultaat</th>
              </tr>
            </thead>
            <tbody>
              @if (sizeof($aan) > 0)
                @foreach ($aan as $an)
                  <tr>
                    <td class="left">{{ $an->Weeknumber }}</td>
                    <td class="left">{{ $an->id }}</td>
                    <td>{{ number_format($an->AanHours,2) }}</td>
                    <td>{{ number_format($an->Opgebracht,2) }}</td>
                    <td>{{ number_format($an->Kosten,2) }}</td>
                    <td>
                      {{ number_format($an->gain,2) }}
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div><!-- .row class end -->


      <div class="row">
        <div style="width:100%;">
          <h4 class="left" style="line-height:4px; text-transform:uppercase; margin-top: 40px; margin-bottom: 0px;">
            Totalen
          </h4>
          <br>
        </div>

        <div class="col-md-12">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Type</th>
                <th style="width: 23%;">Totaal Aantal Uren</th>
                <th>Totaal Opgebracht</th>
                <th>Totale Kosten</th>
                <th>Resultaat</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="left">Regie uren</td>
                <td>{{ number_format($totalRegieUren, 2) }}</td>
                <td>{{ number_format($totalRegieBearing, 2) }}</td>
                <td>{{ number_format($totalRegieRate, 2) }}</td>
                <td>
                  {{ number_format($totalRegieResult,2) }}
                </td>
              </tr>
              <tr>
                <td class="left">Aangenomen Uren</td>
                <td>{{ number_format($totalAanUren, 2) }}</td>
                <td>{{ number_format($totalAanBearing, 2) }}</td>
                <td>{{ number_format($totalAanRate, 2) }}</td>
                <td>
                  {{ number_format($totalAanResult,2) }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><!-- .row class end -->


      <div class="row">
        <div style="width: 30%;">
          <br>
        </div>

        <div class="col-md-12">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tbody>
              <tr>
                <td style="width: 20.7%;" class="left strong">Totaal</td>
                <td style="width: 22.9%;" class="strong">{{ number_format($totalRegieUren + $totalAanUren, 2) }}</td>
                <td style="width: 20.1%;" class="strong">{{ number_format($totalRegieBearing + $totalAanBearing, 2) }}</td>
                <td style="width: 17.9%;" class="strong">{{ number_format($totalRegieRate + $totalAanBearing, 2) }}</td>
                <td style="" class="strong">
                  {{ number_format($totalRegieResult + $totalAanResult,2) }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><!-- .row class end -->

      <div class="row">
        <div style="width: 50%;">
          <br>
        </div>

        <div class="left">
          <h4 class="" style="display: inline;">Rapport afgedrukt op:</h4>
          <p style="display: inline; border-bottom: 1px solid black;">{{ date('d-m-Y', strtotime($time)) }} om {{ date('H:i', strtotime($time)) }} uur</p>
        </div>
      </div><!-- .row class end -->


    </body>
