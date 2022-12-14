<?php
function splitNum($num) {

  $num = ltrim($num, '0');

  $part1 = substr($num, 0, 4);

  $part2 = substr($num, 4);

  return array($part1, $part2);

}
function getNoOfWeek($startDate, $endDate){
  // convert date in valid format
  $startDate = date("Y-m-d", strtotime($startDate));
  $endDate = date("Y-m-d", strtotime($endDate));
  $yearEndDay = 31;
  $weekArr = array();
  $startYear = date("Y", strtotime($startDate));
  $endYear = date("Y", strtotime($endDate));

  if($startYear != $endYear) {
    $newStartDate = $startDate;

    for($i = $startYear; $i <= $endYear; $i++) {
      if($endYear == $i) {
        $newEndDate = $endDate;
      } else {
        $newEndDate = $i."-12-".$yearEndDay;
      }
      $startWeek = date("W", strtotime($newStartDate));
      $endWeek = date("W", strtotime($newEndDate));
      if($endWeek == 1){
        $endWeek = date("W", strtotime($i."-12-".($yearEndDay-7)));
      }
      $tempWeekArr = range($startWeek, $endWeek);
      array_walk($tempWeekArr, "week_text_alter",
      array('post' => substr($i, 2) ));
      $weekArr = array_merge($weekArr, $tempWeekArr);

      $newStartDate = date("Y-m-d", strtotime($newEndDate . "+1 days"));
    }
  } else {
    $startWeek = date("W", strtotime($startDate));
    $endWeek = date("W", strtotime($endDate));
    $endWeekMonth = date("m", strtotime($endDate));
    if($endWeek == 1 && $endWeekMonth == 12){
      $endWeek = date("W", strtotime($endYear."-12-".($yearEndDay-7)));
    }
    $weekArr = range($startWeek, $endWeek);
    array_walk($weekArr, "week_text_alter",
    array('post' => substr($startYear, 2, 2)));
  }
  // $weekArr = array_fill_keys($weekArr, 0);
  return $weekArr;
}

function week_text_alter(&$item1, $key, $prefix) {
  $item1 = '20'.$prefix['post'].str_pad($item1, 2, "0", STR_PAD_LEFT);
}

//----------------------------------------------------------------



$result =  splitNum($week_details[0]->fr_Keeknumber) ;
$keetcard_year = $result[0];
$keetcard_week = $result[1];

$to_result =  splitNum($week_details[0]->to_Keeknumber) ;
$keetcard_to_year = $to_result[0];
$keetcard_to_week = $to_result[1];

$from = getStartAndEndDate($keetcard_week, $keetcard_year);
$res = getStartAndEndDate($keetcard_to_week, $keetcard_to_year);

function getStartAndEndDate($week, $year) {
  $dto = new DateTime();
  $ret['week_start'] = date('m/d/Y',strtotime($dto->setISODate($year, $week)->format('Y-m-d')));
  $ret['week_end'] = date('m/d/Y',strtotime($dto->modify('+6 days')->format('Y-m-d')));
  return $ret;
}
$GetWeeks = getNoOfWeek(date('Y-m-d',strtotime($from['week_start'])), date('Y-m-d',strtotime($res['week_end'])));
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"

"http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8;">

  <title></title>

  <style>
  .page-break {
    page-break-after: always;
  }

  body {

    font-family:"Arial #C0C0C0", Gadget, sans-serif;

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
  .margin-top{ margin-top:25px !important;}


  .weekcard table,td,th {
    border-collapse: collapse;
    border:1px solid #C0C0C0; box-shadow:none; text-shadow:none; }

    .weekcard th {
      border-collapse: collapse;
      border-right: 1px solid #C0C0C0;
    }

    table  {

      border-collapse: collapse; }

      .strong{ font-weight:bold;}

      .weekcard th { font-size:12px !important; } .weekcard td{ font-size:11px !important;}

      #logo-table td {
        border: none;
      }

      #second-table td {
        border: none;
      }

      </style>

    </head>

    <body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="width: 100% !important;">



      <div class="" style="width: 100%; margin-top: -40px;">
        <table  cellpadding="0" cellspacing="0" border="0" style="" id="logo-table">

          <tr>

            <td style="width: 25%;">


              <img src="{{ URL::to('assets/img/icons/Logo.jpg') }}" style=" vertical-align: top; height: 160px; width: 270px; margin-bottom: 25px;" />



            </td>

            <td style="line-height:2px; font-size:13px;">

              <h1 class="center">Easy Clean Up B.V.</h1>

              <p class="center">Kollenbergweg 78 – 1101 AV Amsterdam</p>

              <p class="center">Tel: 020 - 691 61 15, E-mail: planning@easycleanup.nl</p>

              <p class="center">&nbsp;</p>

              <p class="center">Schoonmaakonderhoud - Bouwopruiming - Opleveringsschoonmaak</p>

              <p class="center">Glasbewassing - Gevelreiniging - Keetschoonmaak - Bedrijfsdiensten</p>

              <p class="center">Bouwafval management & Containers Service</p>


            </td>

          </tr>

        </table>

      </div>


      {{-- Change below padding-bottom when face space issues in PDF download --}}
      <div class="" style="width:100%; border:1px solid #C0C0C0; margin-top: -30px; padding-bottom: 13px; border-bottom: none;">

        <p class="center" style="text-transform: uppercase; margin-top: 0;">
          <strong>Keetonderhoud</strong>
        </p>

        <table style="width: 100%; margin-top: -15px;" cellpadding="0" cellspacing="0" border="0" id="second-table">

          <tr>

            <td style="width: 30%;"><span style="margin-left:10px; text-align:left; font-size:12px;">OPDRACHTGEVER:</span></td>

            <td style="width: 65%;">{{ $week_details[0]->Department_Name }}</td>

          </tr>





          <tr>

            <td style="width: 30%;"><span style="margin-left: 10px;text-align: left; font-size: 12px;">WEEK NUMMER:</span></td>

            <td style="width: 60%;">
              Van week <?php echo substr($GetWeekCardDetails->fr_Keeknumber,4,4)?>-<?php echo substr($GetWeekCardDetails->fr_Keeknumber,0,-2)?>
              t/m week <?php echo substr($GetWeekCardDetails->to_Keeknumber,4,4)?>-<?php echo substr($GetWeekCardDetails->to_Keeknumber,0,-2)?>

            </td>

          </tr>



          <tr>

            <td style="width: 30%;"><span style="margin-left:10px;text-align:left; font-size:12px;">PROJECTNAAM:</span></td>

            <td style="width: 60%;">{{ $week_details[0]->Project }}</td>

          </tr>



          <tr>

            <td style="width: 30%;"><span style="margin-left:10px;font-size:12px;">KLANT PROJ. NR.:</span></td>

            <td style="width: 60%;">{{ $week_details[0]->Customer_Ref }}&nbsp;</td>

          </tr>

          <tr>

            <td style="width: 35%;"><span style="margin-left:10px;font-size:12px;">ECU PROJECT/DEBITEUR #:</span></td>

            <td style="width: 35%;">{{ $week_details[0]->Project_Ref }}&nbsp;</td>

            <td style="width: 15%;"><span style="font-size:12px;">Weekstaat ID:</span></td>

            <td style="width: 15%;">{{ $weekstaat_Id }}</td>

          </tr>

        </table>

      </div>

      <div class="" style="width:100%;">

        <table class="weekcard" style="width: 100%;">

          <tr>

            <th style="width: 10%;" rowspan="2" class="center">W. nr.</th>

            <th style="width: 25%;" rowspan="2" class="center">Naam werknemer</th>

            <th style="width: 60%;" colspan="16" class="center" >Gewerkte uren</th>

          </tr>

          <tr>

            <th style="width: 6%;" class="center">Ma</th>

            <th style="width: 6%;" class="center">Di</th>

            <th style="width: 6%;" class="center">Wo</th>

            <th style="width: 6%;" class="center">Do</th>

            <th style="width: 6%;" class="center">Vr</th>

            <th style="width: 6%;" class="center">Za</th>

            <th style="width: 6%;" class="center">Zo</th>

            <th style="width: 10%;" class="center">Totaal</th>

            <th style="width: 20%;" class="center" colspan="8">Opmerkingen</th>

          </tr>



          <?php $i=0; $total = 0; $k=0;
          $count =0;	$TotalAmt = 0;
          // $ProInfo = DB::table('tblproject')->select('*')->where('Id',$week_details[0]->Project_Id)->first();
          foreach ($GetWeeks as $key => $CWeeks) {
            if (in_array($CWeeks, $total_weeks)) {

              $ProInfo = DB::table('tbl_keet_weekcard')
              ->select('*')
              ->where('Project_Id',$week_details[0]->Project_Id)
              ->where('weeknumber', '=', $CWeeks)
              ->first();

              $getRecordCount = DB::table('tbl_keet_timecard')
              ->where('Weekcard_Id',$week_details[0]->id)
              ->where('weeknumber', '=', $CWeeks)
              ->count();

              $i=0;
              ?>
              <tr>
                @if ($getRecordCount)
                  <th colspan="18" style="border: none; margin: 35px; padding: 3px 0; text-align: left;">Week <?php echo substr($CWeeks,4,4)?>-<?php echo substr($CWeeks,0,-2)?>
                  </th>
                @else
                  <th colspan="18" style="border: none; margin: 35px; text-align: left;">
                  </th>
                @endif

              </tr>


              <?php
              foreach ($week_Employees as $key1 => $records) {
                if ($records->weeknumber == @$CWeeks){

                  $weekTotals = ($records->Mon+$records->Tue+$records->Wed+$records->Thu+$records->Fri+$records->Sat+$records->Sat);
                  $printWeekNo = 1;
                  if ($weekTotals > 0) {
                    // dump($weekTotals);
                    ?>

                    <?php
                  }
                }
              }

              $gr_total = 0;
              // $i++;
              foreach ($week_Employees as $key => $record) {
                if ($record->weeknumber == @$CWeeks){

                  //if ($record->Billable == 1) {


                  $i++;

                  $weekTotal = ($record->Mon+$record->Tue+$record->Wed+$record->Thu+$record->Fri+$record->Sat+$record->Sat);
                  if ($weekTotal > 0) {
                    // dump($weekTotals);
                    ?>

                    <tr>

                      <td class="center">
                        <?php
                        // if($i > $weekTotal) {
                        //   $i = 1;
                        // }
                        echo $i?>
                        &nbsp;</td>

                        <td class="left"><?=$record->Name?>&nbsp;</td>

                        {{-- <td class="center">{{ $record->Sofinumber }}&nbsp;</td> --}}

                        <td class="right padding"><?php echo $record->Mon > 0 ? ($record->Mon == 8 ? $record->Mon : number_format($record->Mon,2)) : ($record->Mon == 0 ? '-' : '')//($record->Mon == 8 ? $record->Mon : $record->Mon == 0 ? '-' : (number_format($record->Mon,2)));?> &nbsp;</td>

                        <td class="right padding"><?php echo $record->Tue > 0 ? ($record->Tue == 8 ? $record->Tue : number_format($record->Tue,2)) : ($record->Tue == 0 ? '-' : '')//($record->Tue == 8 ? $record->Tue : $record->Tue == 0 ? '-' : (number_format($record->Tue,2)));?> &nbsp;</td>

                        <td class="right padding"><?php echo $record->Wed > 0 ? ($record->Wed == 8 ? $record->Wed : number_format($record->Wed,2)) : ($record->Wed == 0 ? '-' : '') //($record->Wed == 8 ? $record->Wed : $record->Wed == 0 ? '-' : (number_format($record->Wed,2)));?> &nbsp;</td>

                        <td class="right padding"><?php echo $record->Thu > 0 ? ($record->Thu == 8 ? $record->Thu : number_format($record->Thu,2)) : ($record->Thu == 0 ? '-' : '') //($record->Thu == 8 ? $record->Thu : $record->Thu == 0 ? '-' : (number_format($record->Thu,2)));?>  &nbsp;</td>

                        <td class="right padding"><?php echo $record->Fri > 0 ? ($record->Fri == 8 ? $record->Fri : number_format($record->Fri,2)) : ($record->Fri == 0 ? '-' : '') //($record->Fri == 8 ? $record->Fri : $record->Fri == 0 ? '-' : (number_format($record->Fri,2)));?> &nbsp;</td>

                        <td class="right padding"><?php echo $record->Sat > 0 ? ($record->Sat == 8 ? $record->Sat : number_format($record->Sat,2)) : ($record->Sat == 0 ? '-' : '') //($record->Sat == 8 ? $record->Sat : $record->Sat == 0 ? '-' : (number_format($record->Sat,2)));?> &nbsp;</td>

                        <td class="right padding"><?php echo $record->Sun > 0 ? ($record->Sun == 8 ? $record->Sun : number_format($record->Sun,2)) : ($record->Sun == 0 ? '-' : '');?>&nbsp;</td>
                        <td class="right padding"><?=number_format($record->Hours,2)?>&nbsp;</td>

                        <td colspan="8" class="left"><?=$record->Note?>&nbsp;</td>
                        <?php //$record->Tue > 0 ? ($record->Tue == 8 ? $record->Tue : number_format($record->Tue,2)) : ($record->Tue == 0 ? '-' : '')?>
                      </tr>
                      <?php $total += $record->Hours;
                      $gr_total += $record->Hours;
                    }

                  }
                }
                if ($gr_total > 0) {
                  ?>
                  <!--<table class="table table-bordered sort" style="margin-top:15px;">-->
                  <tr>
                    <th style="width: 12%;">Prijsafspraak</th>
                    <th style="width: 12%;">Aantal keer per week</th>
                    <th style="width: 12%;">Eenheid</th>
                    <th style="width: 12%;" colspan="3">Aantal units</th>
                    <th style="width: 12%;" colspan="2">Prijs</th>
                    <th style="width: 12%;" colspan="4">Totaal aantal uren</th>
                    <th style="width: 12%;" colspan="6">Bedrag</th>
                  </tr>
                  @if ($ProInfo)


                    <tr>
                      <td align="center"><?php echo ($ProInfo->price_agreement == 0 ? 'Per keer' : 'Per uur')?></td>
                      <td align="center"><?php echo $ProInfo->times_per_week ?></td>
                      <td align="center make-one-line" style="font-size: 9px !important;"><?php
                      if ($ProInfo->price_agreement == 0){
                        echo ($ProInfo->unit == 0 ? 'Prijs per keet' : 'Prijs per project');
                      }?></td>
                      <td colspan="3" align="center"><?php echo $ProInfo->number_of_units  ?></td>
                      <td colspan="2" align="center">&euro; <?php echo number_format($ProInfo->price,2) ?></td>
                      <td colspan="4" align="center"><?php echo number_format(@$gr_total,2)?></td>
                      <td colspan="6" align="center">
                        <?php

                        if ($ProInfo->price_agreement== 0 && $ProInfo->unit == 0) {
                          $Total = ($ProInfo->number_of_units*$ProInfo->times_per_week*$ProInfo->price);
                          //echo '555555555555555555';
                        }
                        if ($ProInfo->price_agreement== 0 && $ProInfo->unit == 1) {
                          $Total = ($ProInfo->times_per_week*$ProInfo->price); //*$gr_total

                        } if ($ProInfo->price_agreement== 1) {
                          $Total = ($gr_total*$ProInfo->price);

                        }
                        $TotalAmt +=$Total;
                        echo '&euro; '.number_format($ProInfo->total_amount,2);?>
                      </td>
                    </tr>
                  @endif


                  <!-- </table>-->



                  <?php	} } }


                  $remaining = (20-$i);

                  ?>

                  <tr>
                    <th colspan="18" style="border:none; margin:25px; text-align:left;">&nbsp;
                    </th>
                  </tr>


                  <tr>


                    <th colspan="13" align="right" class="strong" style="border: none;font-size:14px;">Totaal uren:&nbsp;</th>

                    <td class="right" colspan="5" style="border: none;border-bottom: 1px solid #C0C0C0;">
                      <span class="" style="margin-right: 25px;"><?=number_format($sumAllHours,2)?>&nbsp;</span>
                    </td>

                    <!--<td colspan="4">&nbsp;</td> -->

                  </tr>

                  <tr>



                    <th colspan="13" align="right" class="strong" style="border: none;font-size:14px;">Totaal Bedrag:&nbsp;</th>

                    <td class="right" colspan="5" style="border: none; border-bottom: 1px solid #C0C0C0;">
                      <span style="margin-right: 25px;">&euro; <?=number_format($sumAllAmount,2)?></span>
                    </td>

                    <!--<td colspan="4">&nbsp;</td>-->

                  </tr>




                </table>

              </div>



              <br>

              <span class="margin-top" style="margin:15px;">Notitie: <?=$week_details[0]->Notes?></span>

              <p style="margin:15px;">&nbsp;</p>


              <div class="" style="width: 90%;">

                <table border="0" cellpadding="0" cellspacing="0" style="font-size:14px;" >

                  <tr>

                    <td style="border: none; width: 5%;">Handtekening:</td>

                    <td style="border: none; border-bottom: 1px solid #000; width: 20%;">&nbsp;</td>

                    <td style="border: none; width: 5%;">&nbsp;</td>

                    <td style="border: none; width: 5%;">Uitvoerder:</td>

                    <td style="border: none; border-bottom: 1px solid #000; margin-left:10px; width: 20%;">
                      <span style="">
                        <?=$week_details[0]->contact_firstname.' '.$week_details[0]->contact_lastname?>
                      </span>
                    </td>

                  </tr>



                  <tr>

                    <td  colspan="5" style="border: none;">&nbsp;</td>



                  </tr>





                  <tr>



                    <td style="border: none; width: 5%;">Naam:</td>

                    <td style="border: none; border-bottom: 1px solid #000; width: 20%;">&nbsp;</td>


                    <td style="border: none; width: 5%;">&nbsp;</td>


                    <td style="border: none; width: 5%;">Mobilenummer:</td>

                    <td style="border: none; border-bottom: 1px solid #000; margin-left:10px; width: 20%;">
                      <span style="">
                        <?=$week_details[0]->contact_mobile;?>
                      </span>
                    </td>

                  </tr>

                  <tr>

                    <td  colspan="5" style="border: none;">&nbsp;</td>



                  </tr>












                  <tr>

                    <td colspan="3" style="border: none; width: 25%;">&nbsp; </td>



                    <td style="border: none;width: 15%;">E-mail adres:</td>

                    <td style="border: none; border-bottom: 1px solid #000; margin-left:10px; width: 30%;">
                      <span style="">
                        <?=$week_details[0]->contact_email?>
                      </span>
                    </td>

                  </tr>






                  <tr>

                    <td  colspan="5" style="border: none;">&nbsp;</td>



                  </tr>



                  <tr>

                    <td colspan="3" style="border: none;width: 25%;">&nbsp; </td>



                    <td style="border: none;width: 15%;">Project Adres:</td>

                    <td style="border: none; border-bottom: 1px solid #000; margin-left:10px; width: 30%;">
                      <span style="">
                        <?=$week_details[0]->Project_address?>
                      </span>
                    </td>

                  </tr>

                  <tr>

                    <td  colspan="5" style="border: none;">&nbsp;</td>



                  </tr>

                  <tr>

                    <td colspan="4" style="border: none; width: 50%;">&nbsp; </td>

                    <td style="border: none; border-bottom: 1px solid #000; margin-left:10px; width: 30%;"><?=$week_details[0]->Project_city?></td>

                  </tr>

                </table>


              </div>




              <div style="height:20px;" style="border: none;">&nbsp;</div>

              <!--<p style="font-size:16px;">Pagina: 1</p>-->




              <table border="0" cellpadding="0" cellspacing="0" style="font-size:12px; width: 90%;" class="address">
                <tr>
                  <td colspan="4" style="border: none; width: 50%;"><font color="red">Maak gebruik van onze handige mobiele App voor container bestellingen en persoeelsaanvragen. Zie onze website www.easycleanup.nl voor de download link van de mobiele App.</font></td>
                  <td style="border:none;"><img src="{{ base_path() }}/assets/img/icons/playstore.png"></td>
                  <td style="border:none;"><img src="{{ base_path() }}/assets/img/icons/appstore.png"></td>
                </tr>

              </table>






            </body>

            </html>
