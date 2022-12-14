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
          Naam: {{ $employee->Firstname }} {{ $employee->Lastname }}
        </h3>
        <h3 class="left" style="line-height:4px;">
          Periode: van Week {{ $yearFrom }} {{ $weekFrom }} t/m Week {{ $yearTo }} {{ $weekTo }}
        </h3>

        <br>

      </div>

      <div class="row">
        <div style="width:100%;">
          <h4 class="left" style="line-height:4px; text-transform:uppercase; margin-top: 40px; margin-bottom: 0px;">
            WERK GESCHIEDENIS
          </h4>
          <br>
        </div>

        <div class="col-md-12">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Week number </th>
                <th>Project name</th>
                <th>Uitzendbureau</th>
                <th>Ma</th>
                <th>Di</th>
                <th>Wo</th>
                <th>Do</th>
                <th>Vr</th>
                <th>Za</th>
                <th>Zo</th>
                <th>Totaal</th>
              </tr>
            </thead>
            <tbody>
              @if (sizeof($records) > 0)
                @foreach ($records as $key => $record)
                  <tr>
                    {{-- <td><a href="{{ url('admin/Edit-weekstaat/'.$record->Weekcard_Id) }}">{{ $record->Weeknumber }}</a></td> --}}
                    <td class="left">{{ $record->Weeknumber }}</td>
                    <td class="left">{{ $record->Project_name }}</td>
                    <td class="left">{{ $record->emp_name }}</td>
                    <td class="right">{{ ($record->Mon) ? number_format($record->Mon, 2) : '' }}</td>
                    <td class="right">{{ ($record->Tue) ? number_format($record->Tue, 2) : '' }}</td>
                    <td class="right">{{ ($record->Wed) ? number_format($record->Wed, 2) : '' }}</td>
                    <td class="right">{{ ($record->Thu) ? number_format($record->Thu, 2) : '' }}</td>
                    <td class="right">{{ ($record->Fri) ? number_format($record->Fri, 2) : '' }}</td>
                    <td class="right">{{ ($record->Sat) ? number_format($record->Sat, 2) : '' }}</td>
                    <td class="right">{{ ($record->Sun) ? number_format($record->Sun, 2) : '' }}</td>
                    <td class="right">{{ number_format($record->Total, 2) }}</td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div><!-- .row class end -->

      <br>

      <div class="row">
        <div class="col-md-12">
          <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <thead>
              <tr>
                <th>Naam</th>
                <th>Vanaf week</th>
                <th>Naar week</th>
                <th>Totaal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="left">{{ $employee->Firstname }} {{ $employee->Lastname }}</td>
                <td class="left">{{ $yearFrom }} {{ $weekFrom }}</td>
                <td class="left">{{ $yearTo }} {{ $weekTo }}</td>
                <td>{{ number_format($total, 2) }}</td>
              </tr>
            </tbody>
          </table>
        </div><!-- .col-md-12 class end -->
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
