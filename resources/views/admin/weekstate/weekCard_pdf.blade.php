<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

"http://www.w3.org/TR/html4/loose.dtd">



<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title></title>

  <style>

  body {

    /* font-family:"Arial Black", Gadget, sans-serif; */
    /*margin:2px; */
  }

  .center{ text-align:center; }
  .left{ text-align:left; }
  .padding{ padding:3px; }
  .right{ text-align:right;}
  .margin-top{ margin-top:15px !important}

  /*footer { position: relative ; bottom: -20px; left: 0px; right: 0px; text-align:left;  height: 20px; text-decoration:underline; }*/
  footer .pagenum:before {
    /* content:  */
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


        </style>

      </head>

      <body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased; width: 100% !important;  -webkit-text-size-adjust: none;">



        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:-10px; border: none;">

          <tr style="border: none;">

            <td width="25%" style="border: none;">

              <img src="<?php echo url();?>/assets/img/icons/Logo.jpg" style=" vertical-align:top; height:160px; width:270px; margin-bottom:25px;" />



            </td style="border: none;">

            <td width="60%" style="line-height:4px; vertical-align:bottom; font-size:13px; border: none;">

              <h1 class="center">Easy Clean UP B.V.</h1>

              <p class="center">Kollenbergweg 78-1101 AV Amsterdam</p>

              <p class="center">Tel: 020 - 691 61 15, E-mail: info@easycleanup.nl</p>

              <p class="center">&nbsp;</p>

              <p class="center">Schoonmaakonderhoud - Bouwopruiming - Opleveringsschoonmaak</p>

              <p class="center">Glasbewassing - Gevelreiniging - Keetschoonmaak - Bedrijfsdiensten</p>

              <p class="center">Bouwafval management & Containers Service</p>


            </td>

          </tr>

        </table>


          <div class="row">
            <div class="col-md-12">
              <h1 style="text-align: center;">Weekstaten Rapport</h1>
              <h3 style="margin-left: 5px;"><strong>Status van de weekstaten van week: {{ $weekNo }} - {{ $year }}</strong></h3>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">



              <table width="100%" cellpadding="0" cellspacing="0">

                <thead>
                  <tr style="border:1px solid #000;">
                    <th style="height: 15px; font-size: 10px; text-align: center;">ID.</th>

                    <th style="height: 15px; font-size: 10px; text-align: center;">Project</th>

                    <th style="height: 15px; font-size: 10px; text-align: center;">Verz. datum</th>

                    <th style="height: 15px; font-size: 10px; text-align: center;">Ontv. datum</th>

                    <th style="height: 15px; font-size: 10px; text-align: center;">Factuurdatum</th>

                    <th style="height: 15px; font-size: 10px; text-align: center;">Status</th>

                    <th style="height: 15px; font-size: 10px; text-align: center;">Afgehandeld</th>
                  </tr>

                </thead>

                <tbody>

                  @foreach ($data as $d)
                    <tr style="border:1px solid #000;">
                      <td style="width: 8%; text-align: center; font-size: 10px;">{{ $d->id }}</td>
                      <td style="width: 37%; text-align: left; font-size: 10px;">{{ $d->Project_Name }}</td>
                      <td style="width: 15%; text-align: center; font-size: 10px;">{{ ($d->Sent_Date != '0000-00-00') ? date('d-m-Y', strtotime($d->Sent_Date)) : '' }}</td>
                      <td style="width: 15%; text-align: center; font-size: 10px;">{{ ($d->Received_Date != '0000-00-00') ? date('d-m-Y', strtotime($d->Received_Date)) : '' }}</td>
                      <td style="width: 10%; text-align: center; font-size: 10px;">{{ ($d->Billing_Date != '0000-00-00') ? date('d-m-Y', strtotime($d->Billing_Date)) : '' }}</td>
                      <td style="width: 15%; text-align: center; font-size: 10px;">{{ ($d->Status)  }}</td>
                      <td style="width: 15%; text-align: center; font-size: 10px;">{{ ($d->Checked) ? 'Afgehandeld' : 'Open' }}</td>
                    </tr>
                  @endforeach

                </tbody>

              </table>
            </div>
          </div>

        <br>


        <table width="90%" style="border: none;" cellpadding="0" cellspacing="0" style="font-size:10px;" class="address">

          <tr style="border: none;">

            <td width="15%" style="border: none;">Rapport afgedrukt op:</td>

            <td style="border: none;" width="20%">
              <u>{{ date('d-m-Y', strtotime($current)) }} om {{ date('H:i', strtotime($current)) }} uur&nbsp;</u>
            </td>

            <td style="border: none;" width="5%">&nbsp;</td>

            <td style="border: none;" width="5%"></td>

            <td style="border: none;" width="20%"></td>

          </tr>

        </table>








      </body>

      </html>
