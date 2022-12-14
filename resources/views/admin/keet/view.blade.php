 @include('admin/header')
<meta name="csrf-token" content="{{csrf_token()}}" />
<title>Bekijk wekelijks overzicht van Keet-onderhoud . . . </title>
<style>

 .checker {float:right !important; }

 .error { color:#fff; }

 .select2-container-disabled span { color:#000;}

 .save {

	  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;

    border: medium none;

    display: inline;

    float: left;

    padding: 0;

    width: 5px;

	margin: 0 8px 0 0;

	 }

div.checker  {

  margin-right: 15px !important;
 margin-bottom: 7px;
    margin-top: 10px;



 }

</style>
<script>
function drop_note(_val,id) {

		if (_val == 'other') {
		$('#note_other_'+id).show();
		} else {
		$('#note_other_'+id).hide();
		}


		}


$(document).ready(function() {



		var project_id = $('#project').val();

		$.get('<?php echo URL:: to( 'admin/Ajaxproject'); ?>?project_id=' + project_id,function(data) {



			 $('#Afdeling').val(data.DeptName);

			 $('#Klant').val(data.CustomerName);

			 $('#Project').val(data.Name);

			 $('#Klant_proj').val(data.Customer_Ref);

			 $('#Project_note').val(data.pro_Note);

			 $('#Uitvoerder').val(data.Contact_Firstname+' '+data.Contact_Lastname);

			 $('#Project_Fax').val(data.Fax);

			 $('#Adres').val(data.Address);

			 $('#Postcode').val(data.Zipcode);

			 $('#Stad').val(data.City);

			 $('#Vaste_prijs').val(data.Fixed);

			 $('#Tarief').val(data.Rate);

			 $('#alert_msg').val('');



		});



$('select#project').on('change', function() {



		 $(document).ajaxStart(function () {

   		//show ajax indicator

		ajaxindicatorstart('loading data.. please wait..');

  }).ajaxStop(function () {

		//hide ajax indicator

		ajaxindicatorstop();

  });

		var project_id = $('select#project').val();

		$.get('<?php echo URL:: to( 'admin/Ajaxproject'); ?>?project_id=' + project_id,function(data) {

			// alert (data); return false;

			 $('#Afdeling').val(data.DeptName);

			 $('#Klant').val(data.CustomerName);

			 $('#Project').val(data.Name);

			 $('#customer_ref').val(data.Customer_Ref);

			 $('#Project_note').val(data.pro_Note);

			 $('#Uitvoerder').val(data.Contact_Firstname+' '+data.Contact_Lastname);

			 $('#Project_Fax').val(data.Fax);

			 $('#Adres').val(data.Address);

			 $('#Postcode').val(data.Zipcode);

			 $('#Stad').val(data.City);

			 $('#Vaste_prijs').val(data.Fixed);

			 $('#Tarief').val(data.Rate);

		});



	});





	//-------------------------
	$('select#drop_notes').on('change', function() {

		var notes = $('select#drop_notes').val();
		if (notes == 'other') {
		$('#note_other').show();
		} else {
		$('#note_other').hide();
		}

	});








//------------------------------------

	$('select#Employee_Id').on('change', function() {



		 $(document).ajaxStart(function () {

   		//show ajax indicator

		ajaxindicatorstart('loading data.. please wait..');

  }).ajaxStop(function () {

		//hide ajax indicator

		ajaxindicatorstop();

  });

		var Employee_Id = $('select#Employee_Id').val();



		$.get('<?php echo URL:: to( 'admin/Ajaxemployees'); ?>?Employee_Id=' + Employee_Id,function(data) {

			// alert (data); return false;



			 $('#rate_cost').val(data.ProRate);



			 $('#rate').val(data.Rate);

		});



	});





	//------------------------





});

function fmtFloat(num) {

    if (num) {

        num = num.toString().replace(/\$|\,/g,'');

        if(isNaN(num)) {

            num = "0";

        }

        sign = (num == (num = Math.abs(num)));

        num = Math.floor(num*100+0.50000000001);

        cents = num%100;

        num = Math.floor(num/100).toString();

        if(cents<10) {

            cents = "0" + cents;

        }

        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++) {

            num = num.substring(0,num.length-(4*i+3))+''+ num.substring(num.length-(4*i+3));

        }

        return (((sign)?'':'-') + num + '.' + cents);

    } else {

        return 0;

    }

}

$(document).ready(function(){



             $(".txt").each(function() {

            $(this).change(function(){

                calculateSum();

				$('.btn').css('display','inline');

            });

        });



    });



    function calculateSum(id) {

 		$('.btnn_'+id).css('display','inline');

        var sum = 0;

        //iterate through each textboxes and add the values

        $(".txt_"+id).each(function() {



            //add only if the value is number

            if(!isNaN(this.value) && this.value.length!=0) {

                sum += parseFloat(this.value);

            }



        });

        //.toFixed() method will roundoff the final sum to 2 decimal places

        $("#total-timecard_"+id).html(sum.toFixed(2));

    }





function calculateSumTimeCard(id) {



        var sum = 0;

        //iterate through each textboxes and add the values

        $(".txt_"+id).each(function() {
		$('.btnn_'+id).css('display','inline');


            //add only if the value is number

            if(!isNaN(this.value) && this.value.length!=0) {

                sum += parseFloat(this.value);

            }



        });

        //.toFixed() method will roundoff the final sum to 2 decimal places

        $("#total-timecard_"+id).html(sum.toFixed(2));

    }



$(document).ready(function(){



    $("#checked").click(function(){

        $("#received").val("<?=date('Y-m-d')?>");

    });

});
</script>
<?php

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



	$result =  splitNum($GetWeekCardDetails->fr_Keeknumber) ;
	$keetcard_year = $result[0];
	$keetcard_week = $result[1];

	$to_result =  splitNum($GetWeekCardDetails->to_Keeknumber) ;
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
<div class="row">
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
      <li class="active">Bekijk wekelijks overzicht van Keet-onderhoud</li>
    </ol>
  </div>
</div>

<!--<div class="row">-->
<div class="col-md-10" >&nbsp;</div>
<div class="col-md-2" style="float:right; ">

	<a href="{{ url('admin/Edit-Keetonderhoud/'.$GetWeekCardDetails->id) }}" class="btn btn-warning" style="float:right; margin-bottom: 10px;">Bewerk</a>

</div>
<!--</div> -->

<div class="row"> @include('admin/sidebar')
  <div class="col-md-12">
    <?php
		   //echo $CountWeeks; die;
		  // $rangeWeeks = range(1, $GetWeeks);

		   foreach ($GetWeeks as $CWeeks) {
         if(in_array($CWeeks, $total_weeks)) { ?>
    <div class="block">
      <div class="header" >
        <input type="hidden" name="weeknumber" value="<?=@$CWeeks?>" />
        <h2>Week <?php echo substr($CWeeks,4,4)?>-<?php echo substr($CWeeks,0,-2)?></h2>

         <div style="float:right">

					 {{-- <a href="{{ url('admin/Keetonderhoud_weekcard_pdf/'.$CWeeks) }}" title="Download PDF"><img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer"></a>  |

          <a href="{{ url('admin/weekcard_email/'.$GetWeekCardDetails->id) }}" title="E-mailen" ><img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer"></a> --}}

          </div>

      </div>
      <div class="content">
        <?php if ($GetTimeCards) { ?>

        <!--<tbody>-->

        <?php $i = 0;$gr_total = 0;
 foreach ($GetTimeCards as $timecard) {

if ($timecard->weeknumber == @$CWeeks){
	$total = ($timecard->Mon+$timecard->Tue+$timecard->Wed+$timecard->Thu+$timecard->Fri+$timecard->Sat+$timecard->Sun);
	@$gr_total += $total;




// $ProInfo = DB::table('tblproject')->select('*')->where('Id',$GetWeekCardDetails->Project_Id)->first();
$ProInfo = DB::table('tbl_keet_weekcard')
									->select('*')
									->where('Project_Id',@$GetWeekCardDetails->Project_Id)
									->where('weeknumber', '=', $CWeeks)
									->first();

 $i++;
 if ($i == 1){
 ?>
        <div class="header" >
          <h2>Gewerkte Uren</h2>
        </div>
        <?php } ?>
        <?php


	?>
        <table class="table table-bordered sort" style="margin-bottom: 1px;">
          <script type="text/javascript">



      $(document).ready(function(){





		   $(".emp_<?=$timecard->id?>").each(function() {

            $(this).keyup(function(){

				$('#<?=$timecard->id?>').css('background-color','#FFAD2A');

            });

        });



		    $(".txt_<?=$timecard->id?>").each(function() {

            $(this).keyup(function(){

                calculateSumTimeCard(<?=$timecard->id?>);

				$('#<?=$timecard->id?>').css('background-color','#FFAD2A');

            });

        });





		  $("#checked_<?=$timecard->id?>").each(function() {

            $(this).change(function(){

                calculateSumTimeCard(<?=$timecard->id?>);

				$('#<?=$timecard->id?>').css('background-color','#FFAD2A');

            });

		});



 $('#submit_<?=$timecard->id?>').click(function() {


 $(document).ajaxStart(function () {

   		//show ajax indicator

		ajaxindicatorstart('loading data.. please wait..');

  }).ajaxStop(function () {

		//hide ajax indicator

		ajaxindicatorstop();

  });



			if($('#checked_<?=$timecard->id?>'). prop("checked") == false){



				checked = 0;



			} else {

				checked = 1;



				}



			hours_1	 =$('#hours_1_<?=$timecard->id?>').val();

			hours_2	 = $('#hours_2_<?=$timecard->id?>').val();

			hours_3	 = $('#hours_3_<?=$timecard->id?>').val();

			hours_4	 = $('#hours_4_<?=$timecard->id?>').val();

			hours_5	 = $('#hours_5_<?=$timecard->id?>').val();

			hours_6	 = $('#hours_6_<?=$timecard->id?>').val();

			hours_7	 = $('#hours_7_<?=$timecard->id?>').val();

			rate	= $('#rate_<?=$timecard->id?>').val();

			rate_cost = $('#rate_cost_<?=$timecard->id?>').val();

			//checked	= $('#checked_<?=$timecard->id?>').val();

			notes = $('#notes_<?=$timecard->id?>').val();

			weekcard_id = $('#weekcard_id_<?=$timecard->id?>').val();

			timecard_id = $('#timecard_id_<?=$timecard->id?>').val();

			//alert (checked); return false;

$.get("<?php echo URL:: to( 'admin/AjaxUpdateKeettime'); ?>?hours_1=" + hours_1+'&hours_2='+ hours_2+'&hours_3='+ hours_3+'&hours_4='+ hours_4+'&hours_5='+ hours_5+'&hours_6='+ hours_6+'&hours_7='+ hours_7+'&weekcard_id='+ weekcard_id+'&timecard_id='+ timecard_id+'&rate='+ rate+'&rate_cost='+ rate_cost+'&checked='+ checked+'&notes='+ notes, function(response){



		$('#<?=$timecard->id?>').css('background-color','');

			setTimeout("finishAjax('alert_msg', '"+escape(response)+"')", 450);

			$('.alert').hide();

			return false;

		});

	 });

  });



function finishAjax(id, response){

        $('#loader').hide();

        $('#'+id).html(unescape(response));

        $('#'+id).fadeIn();

    }

</script>
          <tr id="<?=$timecard->id?>">
            <td width="18%"><?php $GetEmployeeName = DB::table('tblemployee')->where('id',$timecard->Employee_Id)->first(); ?>
              <input type="text" readonly="readonly" value="<?=$GetEmployeeName->Firstname?>&nbsp;<?=$GetEmployeeName->Lastname?>" /></td>
            <?php if ($timecard->Mon > 0) { $mon_background = '#59AD2F'; } else { $mon_background = '';}?>
            <?php if ($timecard->Tue > 0) { $tue_background = '#59AD2F'; } else { $tue_background = '';}?>
            <?php if ($timecard->Wed > 0) { $wed_background = '#59AD2F'; } else { $wed_background = '';}?>
            <?php if ($timecard->Thu > 0) { $thu_background = '#59AD2F'; } else { $thu_background = '';}?>
            <?php if ($timecard->Fri > 0) { $fri_background = '#59AD2F'; } else { $fri_background = '';}?>
            <?php if ($timecard->Sat > 0) { $sat_background = '#59AD2F'; } else { $sat_background = '';}?>
            <?php if ($timecard->Sun > 0) { $sun_background = '#59AD2F'; } else { $sun_background = '';}?>
            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $mon_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Mon?>" readonly="readonly" name="hours_1" id="hours_1_<?=$timecard->id?>"></td>
            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" readonly="readonly" style="padding:2px;background:<?php echo $tue_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Tue?>" name="hours_2" id="hours_2_<?=$timecard->id?>"></td>
            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" readonly="readonly" style="padding:2px;background:<?php echo $wed_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Wed?>" name="hours_3" id="hours_3_<?=$timecard->id?>"></td>
            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" readonly="readonly" style="padding:2px;background:<?php echo $thu_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Thu?>" name="hours_4" id="hours_4_<?=$timecard->id?>"></td>
            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" readonly="readonly" style="padding:2px;background:<?php echo $fri_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Fri?>" name="hours_5" id="hours_5_<?=$timecard->id?>"></td>
            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" readonly="readonly" style="padding:2px;background:<?php echo $sat_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sat?>" name="hours_6" id="hours_6_<?=$timecard->id?>"></td>
            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" readonly="readonly" style="padding:2px;background:<?php echo $sun_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sun?>" name="hours_7" id="hours_7_<?=$timecard->id?>"></td>
            <td style="width:70px;"><div id="total-timecard_<?=$timecard->id?>" class="total">
                <?=$total?>
              </div></td>
            <td style="width:70px;"><input type="text" class="form-control emp_<?=$timecard->id?>"  readonly="readonly" style="padding:2px;" id="rate_<?=$timecard->id?>" name="rate" value="<?=$timecard->Rate?>"  onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>
            <td style="width:70px;"><input type="text" class="form-control emp_<?=$timecard->id?>"  readonly="readonly" style="padding:2px;" id="rate_cost_<?=$timecard->id?>" name="rate_cost" value="<?=$timecard->Rate_Cost?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>
            <td style="width:70px;"><input type="checkbox" name="Checked" disabled="disabled" value="1" <?php if ($timecard->Billable ==1) { echo 'checked'; } ?> id="checked_<?=$timecard->id?>" style="float:left"></td>
            <td width="15%"><input type="text" class="form-control" style="padding:2px;width: 100%;" readonly="readonly" name="notes" value="<?=$timecard->Notes?>" id="notes_<?=$timecard->id?>"/></td>
          </tr>
          <?php } } ?>

          <!--</tbody>-->

        </table>

        <!--</div>-->

        <?php if ($gr_total > 0) {?>
        <table class="table table-bordered sort" style="margin-top:15px;">
          <tr>
            <th style="width:14%">Prijsafspraak</th>
            <th style="width:14%">Aantal keer per week</th>
            <th style="width:14%">Eenheid</th>
            <th style="width:14%">Aantal units</th>
            <th style="width:14%">Prijs</th>
            <th style="width:14%">Totaal aantal uren</th>
            <th style="width:14%">Bedrag</th>
          </tr>

					@if ($ProInfo)
						<tr id="Week_<?=$timecard->id?>">
	            <td><?php echo ($ProInfo->price_agreement == 0 ? 'Per keer' : 'Per uur')?></td>
	            <td><?php echo $ProInfo->times_per_week ? number_format($ProInfo->times_per_week, 2) : "" ; ?></td>
	            <td>
								<?php
								if ($ProInfo->price_agreement == 0) {
									echo ($ProInfo->unit == 0 ? 'Prijs per keet' : 'Prijs per project');
								}
								?>
							</td>
	            <td><?php echo $ProInfo->number_of_units ? number_format($ProInfo->number_of_units ,2) : "" ; ?></td>
	            <td><?=@number_format(@$ProInfo->price,2) ?></td>
	            <td>

								<?php
								$total_Bedrag = 0;
							  if (@$ProInfo->price_agreement == 0 && @$ProInfo->unit == 0) {
							  @$Total = (@$ProInfo->number_of_units*@$ProInfo->times_per_week*@$ProInfo->price);
							 //echo '555555555555555555';
							 }
							 if (@$ProInfo->price_agreement == 0 && @$ProInfo->unit == 1) {
							 @$Total = (@$ProInfo->times_per_week*@$ProInfo->price); //*$gr_total
							 @$Total_w_pur = (@$ProInfo->times_per_week*@$ProInfo->purchase_price); //*$gr_total

							 } if (@$ProInfo->price_agreement == 1) {
							 @$Total = (@$gr_total*@$ProInfo->price);
							 @$Total_w_pur = (@$gr_total*@$ProInfo->purchase_price);

							 }
							 $total_Bedrag+=$Total;
							 @$total_Bedrag_w_pur +=@$Total_w_pur;
							  ?>
							 <?=@number_format($ProInfo->hours,2);?>

	            </td>
							<td>{{ number_format($ProInfo->total_amount,2) }}</td>
	          </tr>
					@endif

        </table>
        <?php }  else {?>
        <table class="table table-bordered sort" style="margin-top:15px;">
          <tr>
            {{-- <th colspan="13" style="text-align:center">No data found...!</th> --}}
          </tr>
        </table>
        <?php }} ?>
      </div>
    </div>
    <?php }
   }?>
  </div>
  <div class="col-md-12">

    <!--

@if($errors->any())

    <div class="alert alert-danger">

        @foreach($errors->all() as $error)

            <p>{{ $error }}</p>

        @endforeach

    </div>

@endif-->

<div class="row">
	<div class="col-md-12">
		<div class="block">
			<div class="header">
				<h2>Totaal</h2>
			</div>

			<div class="content">
				<table class="table table-bordered sort" style="margin-top:15px;">
					<tr>
						<th style="width:12%">Totaal uren</th>
						<th style="width:12%">Totaal Bedrag</th>
						<th style="width:12%">Inkoopprijs</th>
						<th style="width:12%">Rusultaat</th>
					</tr>
					<tr>
						<td><?=number_format( $sumAllHours,2);?></td>
						<td><?=number_format($sumAllAmount,2);?></td>
						<td><?=number_format($sumAllPurchasePrice,2);?></td>

						<td>
							@if ($sumAllAmount-$sumAllPurchasePrice > 0)
								<span class="label label-success" style="font-size: 95%;">{{ number_format(($sumAllAmount-$sumAllPurchasePrice),2) }}</span>
							@else
								<span class="label label-danger" style="font-size: 95%;">{{ number_format(($sumAllAmount-$sumAllPurchasePrice),2) }}</span>
							@endif
						</td>
					</tr>
				</table>
			</div>

		</div>
	</div>
</div>

    <div class="col-md-6">
      <div class="block">
        <div class="header" >
          <h2>Weekstaat</h2>
        </div>
        <div class="content controls">
          <?php

			function splitNum($num) {

				$num = ltrim($num, '0');

				$part1 = substr($num, 0, 4);

				$part2 = substr($num, 4);

				return array($part1, $part2);

			}
				  ?>
          <div class="form-row">
            <div class="col-md-4">Van week:</div>
            <div class="col-md-3">
              <select name="year" class="select2" style="width:100px;" disabled="disabled">
                <?php

									$current_year = date('Y');

									$range = range($current_year, $current_year-10);

									$years = array_combine($range, $range);

									foreach ($years as $year) {?>
                <option value="<?=$year?>" <?php if ($keetcard_year == $year)  { ?> selected="selected" <?php } ?>>
                <?=$year?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <select name="week" class="select2" style="width:100px;" disabled="disabled">
                <?php



									foreach (range(00, 52) as $number) {

										$number = (str_pad($number, 2, "0", STR_PAD_LEFT));

										?>
                <option value="<?=$number?>" <?php if ($keetcard_week == $number)  { ?> selected="selected" <?php } ?>>
                <?=$number;?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Tot week:</div>
            <div class="col-md-3">
              <select name="to_year" class="select2" style="width:100px;" disabled="disabled">
                <?php

									$current_year = date('Y');

									$range = range($current_year, $current_year-10);

									$years = array_combine($range, $range);

									foreach ($years as $year) {?>
                <option value="<?=$year?>" <?php if ($keetcard_to_year == $year)  { ?> selected="selected" <?php } ?>>
                <?=$year?>
                </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-3">
              <select name="to_week" class="select2" style="width:100px;" disabled="disabled">
                <?php



									foreach (range(00, 52) as $number) {

										$number = (str_pad($number, 2, "0", STR_PAD_LEFT));

										?>
                <option value="<?=$number?>" <?php if ($keetcard_to_week == $number)  { ?> selected="selected" <?php } ?>>
                <?=$number;?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Project:</div>
            <div class="col-md-7">
              <select class="select2" style="width: 100%; color:#000 !important;" tabindex="-1" name="Project_Id" id="project" disabled="disabled">
                <option value="">Kies een project</option>
                <?php foreach ($AllProjects as $project) {?>
                <option value="<?=$project->id?>" <?php if ($GetWeekCardDetails->Project_Id == $project->id) { ?> selected="selected" <?php } ?>>
                <?=$project->Name?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Verz. datum:</div>
            <div class="col-md-7">
              <div class="input-group">
                <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Sent_Date" value="<?=$GetWeekCardDetails->Sent_Date?>" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Ontv. datum:</div>
            <div class="col-md-7">
              <div class="input-group">
                <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                <input type="text" class="datepicker form-control" id="received" name="Received_Date" value="<?=$GetWeekCardDetails->Received_Date?>" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Goedgekeurd:</div>
            <div class="col-md-7">
              <div class="input-group">
                <div class="checkbox-inline">
                  <input type="checkbox" name="Checked" id="checked" value="1" <?php if ($GetWeekCardDetails->Checked == 1) { ?> checked="checked" <?php } ?> readonly="readonly">
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Factuurdatum:</div>
            <div class="col-md-7">
              <div class="input-group">
                <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                <input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Billing_Date" value="<?=@$GetWeekCardDetails->Billing_Date?>" readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Factuurnr:</div>
            <div class="col-md-7">
              <input type="text" class=" form-control" placeholder="Factuurnr" name="Billing_no" value="<?=@$GetWeekCardDetails->Billing_no?>" readonly="readonly">
            </div>
          </div>
        </div>
      </div>
      <div class="block">
        <div class="header" >
          <div class="col-md-5">
            <h2>Extra gegevens</h2>
          </div>
        </div>
        <div class="content controls">
          <div class="form-row">
            <div class="col-md-4">Opmerkingen:</div>
            <div class="col-md-7">
              <textarea class="form-control" rows="5" name="Notes" readonly="readonly"><?=$GetWeekCardDetails->Notes?>
</textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Interne Notities:</div>
            <div class="col-md-7">
              <textarea class="form-control" rows="5" name="notice" readonly="readonly"><?=$GetWeekCardDetails->notice?>
</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="block">
        <div class="header" >
          <h2>Project gegevens</h2>
        </div>
        <div class="content controls">
          <div class="form-row">
            <div class="col-md-4">Klant:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Klant" readonly="readonly" >
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Afdeling:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Afdeling" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Project:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Project" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">ECU Project/Debiteur #:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Project_nr" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Uitvoerder:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Uitvoerder" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Adres:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Adres" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Postcode:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Postcode" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Stad:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Stad" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Vaste prijs:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Vaste_prijs" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Tarief p/u:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Tarief" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">ECU Project/Debiteur #:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="project_ref" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Klant proj. nr.:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="customer_ref" readonly="readonly">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">Afspraken:</div>
            <div class="col-md-7">
              <input type="text" class="form-control" id="Project_note" readonly="readonly">
            </div>
          </div>
        </div>
      </div>
    </div>
    <center>
      <div class="content controls">
        <div class="form-row">
          <div class="col-md-3" align="center" > <a href="<?php echo URL:: to( 'admin/Keetonderhoud' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a> </div>
        </div>
      </div>
    </center>
  </div>
</div>
<br />
@include('admin/footer')
</div>
