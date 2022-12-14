

@include('admin/header')

<meta name="csrf-token" content="{{csrf_token()}}" />

<title>Weekstaat Keetonderhoud bewerken. . . </title>





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
.modal-dialog { width:100%;}
.table thead > tr > th, .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td, .table-bordered, .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td { vertical-align:middle !important}
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

function calculateSum(pro_id) {



	var sum = 0;

	//iterate through each textboxes and add the values

	$(".txt").each(function() {



		//add only if the value is number

		if(!isNaN(this.value) && this.value.length!=0) {

			sum += parseFloat(this.value);

		}



	});

	//.toFixed() method will roundoff the final sum to 2 decimal places

	$("#total-timecard").html(sum.toFixed(2));

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

			<li class="active">Weekstaat Keetonderhoud bewerken</li>

		</ol>
	</div>
</div>

<!--<div class="row">-->
<div class="col-md-10" >&nbsp;</div>
<div class="col-md-2" style="float:right; ">

	<a href="{{ url('admin/Keetonderhoudweekcard_email/'.$GetWeekCardDetails->id) }}" title="E-mailen" style="float:right;"><img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer"></a>

	<a href="{{ url('admin/Keetonderhoud_weekcard_pdf/'.$GetWeekCardDetails->id) }}" title="Download PDF" style="float:right;"><img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer">&nbsp;|&nbsp;</a>

	<a data-toggle="modal" href="#modal_default_3" title="Toevoegen" onclick="add_new('<?php //echo $CWeeks;?>');" style="float:right;"><img class=" " src="{{ URL::asset('assets/img/icons/add_new.png') }}" id="pdf" style=" cursor:pointer">&nbsp;|&nbsp;</a>


</div>
<!--</div> -->







<div class="row">

	@include('admin/sidebar')

	<div class="col-md-12">
		<span id="alert_msg"></span>
		@if (Session::has('message'))

			<div class="alert alert-success">

				<b>Success!</b> {{Session::get('message')}}

				<button type="button" class="close" data-dismiss="alert">×</button>

			</div>

		@endif

		<?php //dd($total_weeks);
		//echo $CountWeeks; die;
		// $rangeWeeks = range(1, $GetWeeks);
		$total_uren=0; $total_Bedrag=0;$total_Bedrag_w_pur=0;
		foreach ($GetWeeks as $CWeeks) {
			if (in_array($CWeeks, $total_weeks)) {

			// dd($CWeeks);
			?>
			{!! Form::open(['url'=> 'admin/InsertKeetonderhoud', 'id' => 'timecard']) !!}

			<input type="hidden" name="weekcard_id" value="<?=@$GetWeekCardDetails->id?>" />

			<input type="hidden" name="project_id" value="<?=@$GetWeekCardDetails->Project_Id?>" id="project"/>





			<div class="block">

				<div class="header" >

					<input type="hidden" name="weeknumber" value="<?=@$CWeeks?>" />

					<h2>Week <?php echo substr($CWeeks,4,4)?>-<?php echo substr($CWeeks,0,-2)?></h2>
					<div style="float:right">



					</div>

				</div>



				<div class="content">

					<!--  <div class="form-row">



					<table class="table table-bordered sort">

					<thead>

					<tr>

					<th width="18%">Personeel</th>

					<th style="width:70px;">Ma</th>

					<th style="width:70px;">Di</th>

					<th style="width:70px;">Wo</th>

					<th style="width:70px;">Do</th>

					<th style="width:70px;">Vr</th>

					<th style="width:70px;">Za</th>

					<th style="width:70px;">Zo</th>

					<th style="width:70px;">+</th>

					<th style="width:70px;">Klant</th>

					<th style="width:70px;">Kost.</th>

					<th style="width:70px;">Regie</th>

					<th width="15%">Opmerkingen</th>

					<th id="buttonheader" style="display:none;width:70px;">&nbsp;</th>

				</tr>

			</thead>

			<tbody>

			<tr>

			<td>

			<select class="select2" style="width: 100%;" tabindex="-1" name="Employee_Id" id="Employee_Id">

			<?php foreach (@$AllEmployees as $Employee) {?>

			<option value="<?=$Employee->id.'_'.$Employee->Employmentagency_Id?>"><?=$Employee->Firstname?>&nbsp;<?=$Employee->Lastname?></option>

			<?php } ?>

		</select>

	</td>

	<td><input class="form-control txt_<?=@$CWeeks?>" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); calculateSumTimeCard('<?=@$CWeeks?>');" value="" name="hours_1"></td>

	<td><input class="form-control txt_<?=@$CWeeks?>" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); calculateSumTimeCard('<?=@$CWeeks?>');" value="" name="hours_2"></td>

	<td><input class="form-control txt_<?=@$CWeeks?>" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); calculateSumTimeCard('<?=@$CWeeks?>');" value="" name="hours_3"></td>

	<td><input class="form-control txt_<?=@$CWeeks?>" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); calculateSumTimeCard('<?=@$CWeeks?>');" value="" name="hours_4"></td>

	<td><input class="form-control txt_<?=@$CWeeks?>" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); calculateSumTimeCard('<?=@$CWeeks?>');" value="" name="hours_5"></td>

	<td><input class="form-control txt_<?=@$CWeeks?>" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); calculateSumTimeCard('<?=@$CWeeks?>');" value="" name="hours_6"></td>

	<td><input class="form-control txt_<?=@$CWeeks?>" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); calculateSumTimeCard('<?=@$CWeeks?>');" value="" name="hours_7"></td>

	<td><div id="total-timecard_<?=@$CWeeks?>" class="total">0.00</div></td>

	<td><input type="text" id="rate" class="form-control"  style="padding:2px;" name="rate"/></td>

	<td><input type="text" id="rate_cost" class="form-control"  style="padding:2px;" name="rate_cost"/></td>

	<td ><input type="checkbox" name="Checked" value="1" checked="checked"></td>

	<td>
	<select class="select2" style="width: 100%;" name="notes" id="drop_notes_2" onchange="drop_note(this.value,<?=@$CWeeks?>)">
	<option value="">Opmerkingen kiezen</option>
	<?php
	if (!empty($Comments)) {
	foreach (@$Comments as $Comment) {?>

	<option value="<?=@$Comment->comments?>"><?=@$Comment->comments?></option>
	<?php }}  ?>

	<option value="other">Anders</option>
</select>


<input type="text" class="form-control"  style="padding:2px;display:none; margin-top:5px;" name="note_other" id="note_other_<?=@$CWeeks?>"/>

</td>

<td id="buttoncol"><button class="btn btn-success btnn_<?=@$CWeeks?>" type="submit" style="display:none;"><span class="icon-plus-sign"></span></button>

</td>

</tr>

</tbody></table>

</div>-->



<?php  if (@$GetTimeCards) { ?>



	<!--<tbody>-->


	<?php $i = 0;$gr_total = 0;  $k=0;
	$count =0;	$TotalAmt = 0;$d=0;
	foreach (@$GetTimeCards as $timecard) {

		if (@$timecard->weeknumber == @$CWeeks){


			// $ProInfo = DB::table('tblproject')->select('*')->where('Id',@$GetWeekCardDetails->Project_Id)->first();

			// $ProInfo = DB::table('tblkeetcard')->select('*')->where('Project_Id',@$GetWeekCardDetails->Project_Id)->first();
			$ProInfo = DB::table('tbl_keet_weekcard')
												->select('*')
												->where('Project_Id',@$GetWeekCardDetails->Project_Id)
												->where('weeknumber', '=', $CWeeks)
												->first();



			$d++;
			$i++;
			if ($i == 1){
				?>
				<div class="header" >
					<h2>Gewerkte Uren</h2>

				</div>
				<?php } ?>

				<table class="table table-bordered sort" style="margin-bottom: 1px;">




					<!-- <div class="content">-->
					<!--<div class="header" >
					<h2>Gewerkte Uren</h2>

				</div>-->
				<!-- <div class="form-row">-->





				<?php

				$total = ($timecard->Mon+$timecard->Tue+$timecard->Wed+$timecard->Thu+$timecard->Fri+$timecard->Sat+$timecard->Sun);
				@$gr_total += $total;
				@$total_uren += $total;
				?>

				{!! Form::open(['url'=> 'admin/update_weekTime', 'id' => 'timecard_'.$timecard->id, 'action' => '#']) !!}

				<input type="hidden" name="_token" value="{{csrf_token()}}" />



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

							location.reload();
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

			<input type="hidden" name="weekcard_id" id="weekcard_id_<?=$timecard->id?>" value="<?=$GetWeekCardDetails->id?>" />

			<input type="hidden" name="timecard_id" id="timecard_id_<?=$timecard->id?>" value="<?=$timecard->id?>" />



			<tr id="<?=$timecard->id?>">

				<td width="18%">

					<?php $GetEmployeeName = DB::table('tblemployee')->where('id',$timecard->Employee_Id)->first(); ?>

					<input type="text" readonly="readonly" value="<?=$GetEmployeeName->Firstname?>&nbsp;<?=$GetEmployeeName->Lastname?>" />

				</td>
				<?php if ($timecard->Mon > 0) { $mon_background = '#59AD2F'; } else { $mon_background = '';}?>
				<?php if ($timecard->Tue > 0) { $tue_background = '#59AD2F'; } else { $tue_background = '';}?>
				<?php if ($timecard->Wed > 0) { $wed_background = '#59AD2F'; } else { $wed_background = '';}?>
				<?php if ($timecard->Thu > 0) { $thu_background = '#59AD2F'; } else { $thu_background = '';}?>
				<?php if ($timecard->Fri > 0) { $fri_background = '#59AD2F'; } else { $fri_background = '';}?>
				<?php if ($timecard->Sat > 0) { $sat_background = '#59AD2F'; } else { $sat_background = '';}?>
				<?php if ($timecard->Sun > 0) { $sun_background = '#59AD2F'; } else { $sun_background = '';}?>



				<td style="width:70px; ">Ma&nbsp;<input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;text-align: center; float:right; display:inline;background:<?php echo $mon_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Mon?>" name="hours_1" id="hours_1_<?=$timecard->id?>"></td>


				<td style="width:70px;">Di&nbsp;<input class="form-control txt_<?=$timecard->id?>" type="text" style=" text-align: center;padding:2px;background:<?php echo $tue_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Tue?>" name="hours_2" id="hours_2_<?=$timecard->id?>"></td>

				<td style="width:70px;">Wo&nbsp;<input class="form-control txt_<?=$timecard->id?>" type="text" style="text-align: center;padding:2px;background:<?php echo $wed_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Wed?>" name="hours_3" id="hours_3_<?=$timecard->id?>"></td>

				<td style="width:70px;">Do&nbsp;<input class="form-control txt_<?=$timecard->id?>" type="text" style="text-align: center;padding:2px;background:<?php echo $thu_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Thu?>" name="hours_4" id="hours_4_<?=$timecard->id?>"></td>

				<td style="width:70px;">Vr&nbsp;<input class="form-control txt_<?=$timecard->id?>" type="text" style="text-align: center;padding:2px;background:<?php echo $fri_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Fri?>" name="hours_5" id="hours_5_<?=$timecard->id?>"></td>

				<td style="width:70px;">Za&nbsp;<input class="form-control txt_<?=$timecard->id?>" type="text" style="text-align: center;padding:2px;background:<?php echo $sat_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sat?>" name="hours_6" id="hours_6_<?=$timecard->id?>"></td>

				<td style="width:70px;">Zo&nbsp;<input class="form-control txt_<?=$timecard->id?>" type="text" style="text-align: center;padding:2px;background:<?php echo $sun_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sun?>" name="hours_7" id="hours_7_<?=$timecard->id?>"></td>

				<td style="width:70px;"><div id="total-timecard_<?=$timecard->id?>" class="total"><?=number_format($total,2)?></div></td>

				<!--<td style="width:70px;"><input type="text" class="form-control emp_<?=$timecard->id?>"  style="padding:2px;" id="rate_<?=$timecard->id?>" name="rate" value="<?=$timecard->Rate?>"  onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>

				<td style="width:70px;"><input type="text" class="form-control emp_<?=$timecard->id?>"  style="padding:2px;" id="rate_cost_<?=$timecard->id?>" name="rate_cost" value="<?=$timecard->Rate_Cost?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>-->

				<!--<td style="width:70px;"><input type="checkbox" name="Checked" value="1" <?php if ($timecard->Billable ==1) { echo 'checked'; } ?> id="checked_<?=$timecard->id?>" style="float:left"></td>-->

				<td width="15%"><input type="text" class="form-control" style="padding:2px;width: 100%;" name="notes" value="<?=$timecard->Notes?>" id="notes_<?=$timecard->id?>"/></td>

				<td id="buttoncol" width="90">

					<button class="save" id="submit_<?=$timecard->id?>" type="button" title="Opslaan"><span class="icon-save"></span></button>

					<a href="<?php echo URL:: to( 'admin/Delete-KeetTimecard',@$timecard->id); ?>" title="Verwijderen" onclick="return confirm('Weet u zeker dat u wilt verwijderen?');" style="margin-left:10px;"><span class="icon-remove-sign"></span></a>

				</td>

			</tr>

			<?php
		}

	}

	?>

	<!--</tbody>-->

</table>

<!--</div>-->

<?php



if (@$gr_total > 0) {
	//$total_uren += $gr_total;
	?>
	<table class="table table-bordered sort" style="margin-top:15px;">
		<tr>
			<th style="width:12%">Prijsafspraak</th>
			<th style="width:12%">Aantal keer per week</th>
			<th style="width:12%">Eenheid</th>
			<th style="width:12%">Aantal units</th>
			<th style="width:12%">Prijs</th>
			<th style="width:12%">Totaal aantal uren</th>
			<th style="width:12%">Bedrag</th>
			<th style="width:12%"></th>
		</tr>

		@if ($ProInfo)


		<tr id="Week_<?=@$timecard->id?>">
			<td>
				<?php echo ($ProInfo->price_agreement == 0 ? 'Per keer' : 'Per uur')?>

			</td>
			<td>
				<?php echo $ProInfo->times_per_week ? number_format($ProInfo->times_per_week, 2) : "" ; ?>
			</td>
			<td>
				<?php
				if ($ProInfo->price_agreement == 0) {
					echo ($ProInfo->unit == 0 ? 'Prijs per keet' : 'Prijs per project');
				}
				?>
			</td>
			<td>
				<?php echo $ProInfo->number_of_units ? number_format($ProInfo->number_of_units ,2) : "" ; ?>
			</td>

			<td>
				<?=@number_format(@$ProInfo->price,2) ?>
			</td>
			<td>
				<?php ?>
				<?=@number_format(@$gr_total,2); ?>
			</td>
			<td>
				<?php
				if (@$ProInfo->price_agreement == 0 && @$ProInfo->unit == 0) {
					@$Total = (@$ProInfo->number_chain*@$ProInfo->number_times*@$ProInfo->price);
					//echo '555555555555555555';
				}
				if (@$ProInfo->price_agreement == 0 && @$ProInfo->unit == 1) {
					@$Total = (@$ProInfo->number_times*@$ProInfo->price); //*$gr_total
					@$Total_w_pur = (@$ProInfo->number_times*@$ProInfo->purchase_price); //*$gr_total

				} if (@$ProInfo->price_agreement == 1) {
					@$Total = (@$gr_total*@$ProInfo->price);
					@$Total_w_pur = (@$gr_total*@$ProInfo->purchase_price);

				}
				$total_Bedrag+=$Total;
				@$total_Bedrag_w_pur +=@$Total_w_pur;

				?>
				<?=@number_format(@$ProInfo->total_amount,2);?>
				<a class="save" id="update_<?=@$timecard->id?>" href="#" title="Bijwerken" style="display:none">
					<div class="col-md-2">
						<div class="icons-list-icon">
							<span class="icon-save"></span>
						</div></div></a>
					</td>
					<?php $keet_id = @$ProInfo->id; ?>
<!-- href="javascript:void(0)" -->
					<td><a data-toggle="modal" href="#editKeet" onclick="getkeetinfo('{{$keet_id}}');" title="Bewerken" class="widget-icon"><span class="icon-pencil"></span></a>
					<!-- <a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right;">Document Uploaden</a></td> -->
				</tr>

		@endif

			</table>

			<?php
		}


	}   ?>




</div>

</div>
{!! Form::close() !!}


{{-- Model to upload files starts below --}}

<div class="modal  modal-info" id="uploadFile"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog" style="width: 50%;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Document Uploaden</h4>
			</div>

			<form method="post" action="{{ url('admin/Keetonderhoud/uploadWeekstaatDocument') }}"  enctype="multipart/form-data">

				<div class="modal-body clearfix">
					<div class="block">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
						<input type="hidden" name="weekcard_id" value="{{$id}}" />

						<div class="form-row">
							<div class="col-md-4">Notitie:</div>
							<div class="col-md-7">
								<input type="text" class="form-control" placeholder="Notitie" name="note">
								<span class="error">  {{ $errors->first( 'note' , ':message' ) }}</span>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-4">Datum en Tijd:</div>
							<div class="col-md-7">
								<div class="input-group">
									<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
									<input type="text" class="form-control" name="added" value="{{ date('Y-m-d (H:i a)') }}" disabled>
								</div>
								<span class="error">  {{ $errors->first( 'added' , ':message' ) }}</span>
							</div>
						</div>

					</div>
					<div class="form-row">


						<div class="col-md-4">Document uploaden:</div>
						<div class="col-md-7">
							<div class="input-group file">
								<input class="form-control" type="text">
								<input name="File" type="file">
								<span class="input-group-btn">
									<button class="btn btn-success" type="button">Browsen</button>
								</span>
							</div>
							<span class=""> Bestand Types: (pdf, docx, docx, xls, jpg, png, bmp)</span>
						</div>

					</div>
				</div>


				<div class="modal-footer">

					<button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button>

					<button type="submit" class="btn btn-success">Opslaan</button>

				</div>


			</form>


		</div>

	</div>

</div>

{{-- Model to upload files ends here --}}


<!-- Edit Keet starts here -->

<div class="modal  modal-info" id="editKeet"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog" style="width: 50%;">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Bewerk Keet</h4>
			</div>

			<form method="post" action="{{ url('admin/Keetonderhoud/saveKeetData') }}"  enctype="multipart/form-data">
				<input type="hidden" name="keetID" id="keetID" value="">
				<div class="modal-body clearfix">
					<div class="block">
					<div class="col-md-4">Prijsafspraak:</div>
					<div class="col-md-3">
						<input type="radio" id="per_keer" name="prijsafspraak" value="0" onclick="keer_clciked();">
								Per keer
					</div>
					<div class="col-md-3">
						<input type="radio" name="prijsafspraak" id="per_uur" value="1" onclick="uur_clciked();">
								Per uur
					</div>
				</div>
				<div class="form-row" id="num_times" style="display:<?php ?>">
					<div class="col-md-4">Aantal keer per week:</div>
					<div class="col-md-7">
						<input type="text" class="form-control"  placeholder="Aantal keer per week" name="number_times" id="number_times" value="">
					</div>
				</div>
				 <div class="form-row" id="eenheid" style="">
						<div class="col-md-4">Eenheid:</div>
						<div class="col-md-3">
							<input type="radio" name="unit" id="per_stand" value="0" onclick="stand_clicked();">
								Prijs per unit
						</div>
						<div class="col-md-3">
							<input type="radio" name="unit" id="per_project" value="1" onclick="project_clicked();">
								Prijs per project
						</div>
				</div>
				<div class="form-row" id="number" style="">
					<div class="col-md-4">Aantal Units:</div>
					<div class="col-md-7">
						<input type="text" class="form-control" placeholder="Aantal Units" name="number_chain" id="number_chain" value="">
					</div>
				</div>

				<div class="form-row" >
					<div class="col-md-4">Prijs:</div>
					<div class="col-md-7">
						<input type="text" class="form-control"  placeholder="Prijs" name="price" id="price" value="">
					</div>
				</div>
				<div class="form-row" >
					<div class="col-md-4">Inkoopprijs:</div>
					<div class="col-md-7">
						<input type="text" class="form-control"  placeholder="Inkoopprijs" name="purchase_price" id="purchase_price" value="">
					</div>
				</div>
				<div class="form-row" >
					<div class="col-md-4">Opmerkingen:</div>
					<div class="col-md-7">
						<textarea class="form-control"  placeholder="Opmerkingen" name="comments" id="comments"></textarea>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-4 col-md-offset-1 pull-right">
						<button type="submit" name="button" class="btn btn-success" onclick="updateKeetWeekcardData(); return false;">Save</button>
						<a href="#" class="btn btn-danger" data-dismiss="modal" onclick="cancelButtonClicked(); return false;">Cancel</a>
					</div>
				</div>
			</div>
		 </form>
		</div>

	</div>

</div>
<!-- Edit Keet ends here -->




    {{-- Model to edit uploaded files starts here --}}

    <div class="modal modal-info" id="editUploadFilesDetail"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

      <div class="modal-dialog" style="width: 50%;">

        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Document Bewerken</h4>
          </div>
          <form method="post" action="{{ url('admin/Keetonderhoud/updateUploadWeekstaatDoc') }}" enctype="multipart/form-data">
            <div class="modal-body clearfix">
              <div class="block">

                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                <input type="hidden" name="fileId" id="fileId" />
                <input type="hidden" name="weekCardID" id="weekCardID" />
                <div class="form-row">
                  <div class="col-md-4">Notitie:</div>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="note" id="note">
                    <span class="error">  {{ $errors->first( 'note' , ':message' ) }}</span>
                  </div>

                </div>

                <div class="form-row">
                  <div class="col-md-4">Datum en Tijd:</div>
                  <div class="col-md-7">
                    <div class="input-group">
                      <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                      <input type="text" class="form-control" name="Exp_date" value="{{ date('Y-m-d (H:i a)') }}" id="Exp_date" disabled>

                    </div>

                    <span class="error">  {{ $errors->first( 'Exp_date' , ':message' ) }}</span>

                  </div>

                </div>

              </div>

            </div>


            <div class="modal-footer">

              <button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button>

              <button type="submit" class="btn btn-success">Opslaan</button>

            </div>


          </form>


        </div>

      </div>

    </div>

    {{-- Model to edit uploaded files ends here --}}


<?php }//if in range ends
	}//weeks foreach loop ends here?>
<div class="block">

	<div class="header" >



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


{!! Form::open(['url'=> 'admin/update_Keetonderhoud']) !!}

<input type="hidden" name="id" value="<?=$GetWeekCardDetails->id?>"  />







<div class="col-md-12">

	<!--

	@if($errors->any())

	<div class="alert alert-danger">

	@foreach($errors->all() as $error)

	<p>{{ $error }}</p>

@endforeach

</div>

@endif-->







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

					<input type="text" name="year" value="{{ $keetcard_year }}" class="form-control" style="width: 75%"; readonly>


						<span class="error">  {{ $errors->first( 'year' , ':message' ) }}</span>

					</div>

					<div class="col-md-3">

						<input type="text" name="week" value="{{ $keetcard_week }}" class="form-control" style="width: 75%"; readonly>

							<span class="error">  {{ $errors->first( 'week' , ':message' ) }}</span>

						</div>

					</div>


					<div class="form-row">

						<div class="col-md-4">Tot week:</div>

						<div class="col-md-3">

							<input type="text" name="to_year" value="{{ $keetcard_to_year }}" class="form-control" style="width: 75%"; readonly>

								<span class="error">  {{ $errors->first( 'year' , ':message' ) }}</span>

							</div>

							<div class="col-md-3">

								<input type="text" name="to_week" value="{{ $keetcard_to_week }}" class="form-control" style="width: 75%"; readonly>

									<span class="error">  {{ $errors->first( 'week' , ':message' ) }}</span>

								</div>

							</div>


							<div class="form-row">

								<div class="col-md-4">Project:</div>

								<div class="col-md-7">



									<select class="select2" style="width: 100%; color:#000 !important;" tabindex="-1" name="Project_Id" id="project" >

										<option value="">Kies een project</option>

										<?php foreach ($AllProjects as $project) {?>

											<option value="<?=$project->id?>" <?php if ($GetWeekCardDetails->Project_Id == $project->id) { ?> selected="selected" <?php } ?>><?=$project->Name?></option>

											<?php } ?>

										</select>



										<span class="error">  {{ $errors->first( 'Project_Id' , ':message' ) }}</span>

									</div>

								</div>



								<div class="form-row">

									<div class="col-md-4">Verz. datum:</div>

									<div class="col-md-7">

										<div class="input-group">

											<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

											<input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Sent_Date" value="<?=$GetWeekCardDetails->Sent_Date?>">

										</div>

										<?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

									</div>



								</div>


								<div class="form-row">
									<div class="col-md-4">Ontv. datum:</div>
									<div class="col-md-7">
										<div class="input-group">
											<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
											<input type="text" class="datepicker form-control" id="received" name="Received_Date" value="<?=$GetWeekCardDetails->Received_Date?>" >
										</div>

										<?php /*?><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>
									</div>
								</div>

								<div class="form-row">

									<div class="col-md-4">Factuurdatum:</div>

									<div class="col-md-7">

										<div class="input-group">

											<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

											<input type="text" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Billing_Date" value="<?=@$GetWeekCardDetails->Billing_Date?>">

										</div>

										<?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

									</div>



								</div>


								<div class="form-row">

									<div class="col-md-4">Factuurnr:</div>

									<div class="col-md-7">

										<input type="text" class=" form-control" placeholder="Factuurnr" name="Billing_no" value="<?=@$GetWeekCardDetails->Billing_no?>">



										<?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

									</div>



								</div>

								<div class="form-row">
									<div class="col-md-4">Status:</div>
									<div class="col-md-7">
										<select class="select2" name="status_id" style="width: 100%; color:#000 !important;">
											@foreach ($AllStatus as $status)
												<option value="{{ $status->id }}" {{ ($GetWeekCardDetails->status_id == $status->id) ? 'selected' : '' }}>{{ $status->name }}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-row">
									<div class="col-md-4">Afgehandeld:</div>
									<div class="col-md-7">
										<div class="input-group">
											<div class="checkbox-inline">
												<input type="checkbox" name="Checked" id="checked" value="1" <?php if ($GetWeekCardDetails->Checked == 1) { ?> checked="checked" <?php } ?>>
											</div>
										</div>
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

										<textarea class="form-control" rows="5" name="Notes"><?=$GetWeekCardDetails->Notes?></textarea>

										<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->

									</div>

								</div>

								<div class="form-row">

									<div class="col-md-4">Interne Notities:</div>

									<div class="col-md-7">

										<textarea class="form-control" rows="5" name="notice"><?=$GetWeekCardDetails->notice?></textarea>

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

					<div class="col-md-6">
						<div class="block">
							<div class="header">
								<a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right;">Document Uploaden</a>

								 <h2>Werkbrieven & Documenten</h2>
							</div>

							<div class="content">
								<table class="table table-bordered table-striped no-footer" style="width: 100%;">
									<tr>
	                  <th>Notitie</th>
	                  <th>Datum en Tijd</th>
	                  <th>Downloaden</th>
	                  <th>Opties</th>
	                </tr>
									@if (sizeof($attachments) > 0)
										@foreach ($attachments as $key => $file)
											<tr>
												<td>{{ $file->note }}</td>
												<td>{{ date('Y-m-d (H:i a)', strtotime($file->added)) }}</td>
												<td>
													<?php $ext = pathinfo($file->filename, PATHINFO_EXTENSION); ?>
														 <a href="{{ URL::asset($file->file_path) }}" title="Downloaden">
																<img @if ($ext == 'jpg')
																		src="{{ URL::asset('assets/img/icons/jpg.png') }}"
																	@elseif ($ext == 'png')
																		src="{{ URL::asset('assets/img/icons/png.png') }}"
																	@elseif ($ext == 'xls')
																		src="{{ URL::asset('assets/img/icons/xls.png') }}"
																	@elseif ($ext == 'pdf')
																		src="{{ URL::asset('assets/img/icons/pdf.png') }}"
																	@elseif ($ext == 'docx' || $ext == 'doc')
																		src="{{ URL::asset('assets/img/icons/docx.png') }}"
																	@endif
																	style=" cursor:pointer; width:32px; height:32px;">
													 </a>
												</td>
												<td>
													{{-- Edit Model --}}
													<a href="javascript:void(0)" onclick="getdocinfo({{ $file->id }});" title="Bewerken" class="widget-icon" ><span class="icon-pencil"></span></a>
													{{-- Delete Model --}}
														<a href="{{ url('admin/Keetonderhoud/deleteWeekstaatDocument/'.$file->id) }}" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a>
												</td>
											</tr>
										@endforeach
									@endif
								</table>
							</div>
						</div>
					</div>



					<center>

						<div class="content controls">

							<div class="form-row">



								<div class="col-md-3" align="center" >

									<a href="<?php echo URL:: to( 'admin/Keetonderhoud' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>

								</div>



								<div class="col-md-3" align="center">

									{!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}

								</div>



								<div class="col-md-3" align="center">

									{!! Form::submit('Opslaan & Afsluiten', ['class' => 'btn btn-success','name' => 'Save_Close']) !!}

								</div>



								<div class="col-md-3" align="center">

									{!! Form::submit('Opslaan & Nieuw', ['class' => 'btn btn-success','name' => 'Save_New']) !!}

								</div>



							</div>

						</div>

					</center>



				</div>



				{!! Form::close() !!}
			</div>

			<br />

			<div class="modal  modal-info" id="modal_default_3"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

				<div class="modal-dialog">

					<div class="modal-content">

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

							<h4 class="modal-title">Uren Toevoegen</h4>

						</div>

						{!! Form::open(['url'=> 'admin/InsertKeetonderhoud', 'id' => 'timecard']) !!}

						<div class="modal-body clearfix">



							<div class="block">



								<!--<input type="hidden" name="weekprojects" value="Selective" /> -->

								<!--<input type="hidden" name="weeknumber" id="Weeknumber" /> -->

								<input type="hidden" name="weekcard_id" id="weekcard_id" value="<?=$GetWeekCardDetails->id?>"/>

								<input type="hidden" name="project_id"  id="project" value="<?php echo $GetWeekCardDetails->Project_Id?>"/>



								<div class="content">

									<div class="form-row">



										<table class="table table-bordered sort">

											<thead>

												<tr>
													<th width="20%">Week</th>
													<th width="18%">Personeel</th>

													<th style="width:70px;">Ma</th>

													<th style="width:70px;">Di</th>

													<th style="width:70px;">Wo</th>

													<th style="width:70px;">Do</th>

													<th style="width:70px;">Vr</th>

													<th style="width:70px;">Za</th>

													<th style="width:70px;">Zo</th>

													<th>+</th>

													<!--  <th style="width:70px;">Klant</th>

													<th style="width:70px;">Kost.</th>

													<th style="width:70px;">Regie</th>-->

													<th width="18%">Opmerkingen</th>

													<th id="buttonheader" style="display:none;">&nbsp;</th>

												</tr>

											</thead>

											<tbody>

												<tr>
													<td>
														<select class="select2" multiple="multiple" style="width: 100%;" tabindex="-1" name="weeknumber[]">
															<?php foreach ($GetWeeks as $CWeeks) {
																if (in_array($CWeeks, $total_weeks)) {?>
																<option value="<?php echo $CWeeks;?>"><?php echo $CWeeks;?></option>
															<?php }} ?>
															</select>

														</td>

														<td>

															<select class="select2" style="width: 100%;" tabindex="-1" name="Employee_Id">
																<option value="">Selecteer medewerker</option>
																<?php

																if (!empty($AllEmployees)) {

																	foreach (@$AllEmployees as $Employee) {?>

																		<option value="<?=@$Employee->id.'_'.@$Employee->Employmentagency_Id?>"><?=@$Employee->Firstname?>&nbsp;<?=@$Employee->Lastname?></option>

																		<?php } } else { ?>

																			<?php } ?>

																		</select>

																	</td>

																	<td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); "  name="hours_1"></td>

																	<td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); "  name="hours_2"></td>

																	<td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); "  name="hours_3"></td>

																	<td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); "  name="hours_4"></td>

																	<td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); "  name="hours_5"></td>

																	<td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); "  name="hours_6"></td>

																	<td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); "  name="hours_7"></td>

																	<td><div id="total-timecard" class="total">0.00</div></td>

																	<!--<td><input type="text" class="form-control"  style="padding:2px;" name="rate" onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>

																	<td><input type="text" class="form-control"  style="padding:2px;" name="rate_cost" onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>

																	<td ><input type="checkbox" name="Checked" value="1" checked="checked"></td>-->

																	<td>
																		<select class="select2" style="width: 100%;" name="notes" id="drop_notes">
																			<option value="">Opmerkingen kiezen</option>
																			<?php
																			if (!empty($Comments)) {
																				foreach (@$Comments as $Comment) {?>

																					<option value="<?=@$Comment->comments?>"><?=@$Comment->comments?></option>
																					<?php } ?>


																					<?php } ?>
																					<option value="other">Anders</option>
																				</select>


																				<input type="text" class="form-control"  style="padding:2px;display:none; margin-top:5px;" name="note_other" id="note_other"/>
																			</td>

																			<td id="buttoncol"><button class="btn btn-success sub_btn" type="submit" style="display:none;"><span class="icon-plus-sign"></span></button>

																			</td>

																		</tr>

																	</tbody></table>



																</div></div>



															</div>



														</div>

														<!--  <div class="modal-footer">

														<button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button>

														<button type="button" class="btn btn-warning btn-clean">Submit form</button>

													</div>-->



													{!! Form::close() !!}



												</div>

											</div>

										</div>

										<script>
										function add_new() {





											//$('#Weeknumber').val(Weeknumber);

											//$('#weekcard_id').val(Week_id);

											//$('#project').val(Project_Id);

											$('.modal-title').html('Uren Toevoegen');

											//alert (Week_id+'---'+Project+'---'+Weeknumber);



										}

										function getdocinfo (id) {


											$.get('<?php echo URL:: to( 'admin/Keetonderhoud/editWeekstaatDocument' ); ?>/' + id,function(data) {
													 // $('#Exp_date').val(data.ExpiryDate);
													 $('#note').val(data.data.note);
													 $('#fileId').val(data.data.id);
													 $('#weekCardID').val(data.data.weekCardID);
													 // $('#doc_id').val(id);
													$('#editUploadFilesDetail').modal('show');
												});


											}





										</script>
<script type="text/javascript" src="{{ URL::asset('assets/js/axios.min.js') }}">

</script>
<script type='text/javascript' src="{{ URL::asset('assets/js/keetCard.js') }}"></script>


										@include('admin/footer')</div>
