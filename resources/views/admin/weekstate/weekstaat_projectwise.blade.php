    @include('admin/header')

    <meta name="csrf-token" content="{{csrf_token()}}" />

     <title>Week Weekstaten</title>



 <?php use App\reports;

 use App\Weekcard;

 $yearWeek = date('YW');

   $Report_model = new reports();

   $week_model = new Weekcard();

   $segment5 = Request::segment( 3 );

  if (!empty($segment5)){

   $CurrentYear = ($segment5[0].$segment5[1].$segment5[2].$segment5[3]);

   @$Currentweek = ($segment5[4].$segment5[5]);

   $yearWeek = $segment5;

  }



  else {

	 $CurrentYear = ($yearWeek[0].$yearWeek[1].$yearWeek[2].$yearWeek[3]);

   @$Currentweek = ($yearWeek[4].$yearWeek[5]);

	 }





   ?>

<style>

 .checker {float:right !important; }

 .error { color:#fff; }

 .select2-container-disabled span { color:#000;}
.icons-list-icon {
    font-size: 37px !important;
    line-height: 32px !important;
    text-align: center !important;
}
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

    margin-top: 10px;



 }

 .weeknr_mini {

    color: #59ad2f ;

    font-size: 12px;

}

.weeknr_small {

    color: #59ad2f ;

    font-size: 18px;

}

.weeknr_large {

    color: #59ad2f ;

    font-size: 24px;

    font-weight: bold;

}

#year {

    cursor: pointer;

    margin-right: 30px;

}

.label { font-size:100%;}

.modal-dialog { width:100%;}

</style>



<script>



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



function calculateSumTimeCard(id) {

 //alert (id);

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





        $(document).ready(function() {

        // This will now be added just before the closing body tag, after jquery,

                // and thus should work fine.

        });



        // However, to not worry about potential collisions if you were to use multiple

        // js libraries that want to use the dollar sign identifier, you might be better off

        // doing something like this, and running jQuery in no conflict mode:

        (function($) {

            // your normal jQuery code goes here.

            $(document).ready(function() { /* Do stuff */



		$( "#search" ).click(function() {

			 year  = document.getElementById('weeknumbery').value;

			week  = document.getElementById('weeknumberw').value;

			document.location.href="<?=URL:: to( 'admin' )?>/ProjectsByWeek/"+ year + week;

	});



			});





$(document).ready(function(){



    $("#checked").click(function(){

        $("#received").val("<?=date('Y-m-d')?>");

    });

});

        })(jQuery);

    </script>



     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Home</a></li>

                    <li class="active">Week Weekstaten</li>

                </ol>

            </div>

        </div>



        <div class="row">



    @include('admin/sidebar')





    <div class="col-md-12">

      @if (Session::has('message'))

   <div class="alert alert-success">

                        <b>Success!</b> {{Session::get('message')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif







   <div class="block">

                    <div class="header">

                        <h2>Week nr</h2>

                    </div>

                    <div class="content">

					<div class="col-md-5">



					<?php

					 $y = 0;



    for ($i=-2; $i<=2; $i++) {

        if ( 2 == abs($i)) {

            $class = 'mini';

        } elseif ( 1 == abs($i) ) {

            $class = 'small';

        } elseif ( 0 == $i ) {

            $class = 'large';



        }



        $weeknumber = $Report_model->getWeekNumber($yearWeek, $i);



        echo '<a href="' . URL:: to( 'admin' ) . '/ProjectsByWeek/'.$weeknumber.'"><span class="weeknr_' . $class . '" id="year">' . $weeknumber . '</span></a>';



    }?>

    </div>



  <div class="col-md-1">

                            		<select name="weeknumbery" id="weeknumbery" class="select2" style="width:100px; ">

                                    <?php

									$current_year = date('Y');

									$range = range($current_year, $current_year-10);

									$years = array_combine($range, $range);

									foreach ($years as $year) {?>

                                    <option value="<?=$year?>" <?php if ($CurrentYear == $year) {?> selected="selected" <?php } ?>><?=$year?></option>

                                    <?php } ?>

                                </select>



                            </div>

 <div class="col-md-1" style="margin-left:15px;">

                            		<select name="weeknumberw" id="weeknumberw" class="select2" style="width:70px;">

                                    <?php



									foreach (range(00, 52) as $number) {

										$number = (str_pad($number, 2, "0", STR_PAD_LEFT));

										?>

                                    <option value="<?=$number?>"  <?php if (@$Currentweek == $number) {?> selected="selected" <?php } ?>><?=$number;?></option>

                                    <?php } ?>

                                </select>

                            </div>

                            <div class="col-md-1">

                            <img class=" " src="{{ URL::asset('assets/img/icons/search.png') }}" id="search" style=" cursor:pointer">

</div>

 <div style="float:right">

 <a href=" <?php echo URL:: to( 'admin/report/total/weeknumber/'.$yearWeek ); ?> " class="btn btn-warning">Rapport</a>

 <a href=" <?php echo URL:: to( 'admin/Add-New-weekstaat' ); ?> " class="btn btn-success">+ Nieuw WeekStaat</a>



 </div>



                    </div>

                </div>





  <?php







   if (!empty($Get_Projects) && count ($Get_Projects) > 0){

	  @$p =0 ;

	 	foreach ($Get_Projects as $Project) { @$p++;?>

 <script>



   $(document).ready(function(){



	     $(".txt_"+<?php echo @$p;?>).each(function() {

            $(this).keyup(function(){

                calculateSum($(this));

				$('.sub_btn_'+<?php echo @$p;?>).css('display','inline');

            });

        });





      function calculateSum(pro_id) {



        var sum = 0;

        //iterate through each textboxes and add the values

        $(".txt_"+<?php echo @$p;?>).each(function() {



            //add only if the value is number

            if(!isNaN(this.value) && this.value.length!=0) {

                sum += parseFloat(this.value);

            }



        });

        //.toFixed() method will roundoff the final sum to 2 decimal places

        $("#total-timecard_"+<?php echo @$p;?>).html(sum.toFixed(2));

    }





	  });

  </script>







<?php  $GetWeekCardDetails = $week_model->GetWeekCardDetails($Project->Week_id);

  $GetTimeCards = $week_model->GetTimeCards($Project->Week_id);

  if (count($GetTimeCards) > 0) { ?>

   <h3> <?php echo $Project->Dept_Name;?> > <?php echo $Project->Project;?> > <?php echo $Project->Address;?> > <?php echo $Project->City;?></h3>

   <div class="block">

   <span id="alert_msg"></span>

                    <div class="header" >



                       <h2>Gewerkte Uren</h2>

                       <div style="float:left; margin-left:20px;">
                       ( <a href="<?=URL:: to( 'admin' ) . '/weekcard_pdf_WO_Regie/'.$Project->Week_id;?>" title="Afdrukken"><img class=" " src="{{ URL::asset('assets/img/icons/pdf_n4.png') }}" id="pdf" style=" cursor:pointer; width:20px; height:20px;"></a>  |
                            <a href="<?=URL:: to( 'admin' ) . '/weekcard_email_WO_Regie/'.$Project->Week_id;?>" title="E-mail" ><img src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer;width:20px; height:20px;"></a> )
                       </div>

                        <div style="float:right">



                        <a data-toggle="modal" href="#modal_default_3" title="Toevoegen" onclick="add_new('<?php echo $Project->Week_id;?>','<?php echo $Project->Project;?>','<?php echo $Project->Weeknumber;?>','<?php echo $Project->Project_Id;?>');"><img class=" " src="{{ URL::asset('assets/img/icons/add_n.png') }}" id="pdf" style=" cursor:pointer"></a>  |  <a href="<?=URL:: to( 'admin' ) . '/Edit-weekstaat/'.$Project->Week_id;?>" title="Inzicht"><img class=" " src="{{ URL::asset('assets/img/icons/search.png') }}" id="pdf" style=" cursor:pointer"></a>  |  <a href="<?=URL:: to( 'admin' ) . '/weekcard_pdf/'.$Project->Week_id;?>" title="Afdrukken"><img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer"></a>  |

                            <a href="<?=URL:: to( 'admin' ) . '/weekcard_email/'.$Project->Week_id;?>" title="E-mail" ><img src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer"></a>



                                                </div>

                    </div>

                    <div class="content">

                      <div class="form-row">

 <table class="table table-bordered sort" style="margin-top:15px;">

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

                      <th>+</th>

                      <th style="width:70px;">Klant</th>

                      <th style="width:70px;">Kost.</th>

                       <th style="width:70px;">Regie</th>

                      <th width="15%">Opmerkingen</th>

                      <th id="buttonheader" style="display:none;">&nbsp;</th>

                      </tr>

                      </thead>

                      <tbody>

                      <tr>



   <?php





  foreach ($GetTimeCards as $timecard) {

	$total = ($timecard->Mon+$timecard->Tue+$timecard->Wed+$timecard->Thu+$timecard->Fri+$timecard->Sat+$timecard->Sun); ?>

      {!! Form::open(['url'=> 'admin/update_weekTime', 'id' => 'timecard_'.$timecard->id, 'action' => '#']) !!}



    <input type="hidden" name="_token" value="{{csrf_token()}}" />



   <script type="text/javascript">



      $(document).ready(function(){

			  $(".emp_<?=$timecard->id?>").each(function() {

            $(this).keyup(function(){

				$('#<?=$timecard->id?>').css('background-color','#FFAD2A');

            });

        });



			 $(".wk_<?=$timecard->id?>").each(function() {

            $(this).keyup(function(){

               // calculateSumTimeCard(<?=$timecard->id?>);

				$('#Week_<?=$timecard->id?>').css('background-color','#FFAD2A');
				$('#update_<?=$timecard->id?>').show();
            });

        });


		 $("#wk_bldt<?=$timecard->id?>, #wk_snt<?=$timecard->id?>, #wk_rec<?=$timecard->id?>").each(function() {

            $(this).change(function(){

				$('#Week_<?=$timecard->id?>').css('background-color','#FFAD2A');
				$('#update_<?=$timecard->id?>').show();
            });

        });

			 $(".txt_<?=$timecard->id?>").each(function() {

            $(this).keyup(function(){

                calculateSumTimeCard(<?=$timecard->id?>);

				$('#<?=$timecard->id?>').css('background-color','#FFAD2A');

            });

        });





		  $(".checked_<?=$timecard->id?>").each(function() {

            $(this).change(function(){

                calculateSumTimeCard(<?=$timecard->id?>);

				$('#<?=$timecard->id?>').css('background-color','#FFAD2A');

            });

		});

		$("#wk_checked_<?=$timecard->id?>").each(function() {

            $(this).change(function(){

				$('#Week_<?=$timecard->id?>').css('background-color','#FFAD2A');
				$('#update_<?=$timecard->id?>').show();
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

			hours_1	 = $('#hours_1_<?=$timecard->id?>').val();

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

$.get("<?php echo URL:: to( 'admin/AjaxUpdateWeektime'); ?>?hours_1=" + hours_1+'&hours_2='+ hours_2+'&hours_3='+ hours_3+'&hours_4='+ hours_4+'&hours_5='+ hours_5+'&hours_6='+ hours_6+'&hours_7='+ hours_7+'&weekcard_id='+ weekcard_id+'&timecard_id='+ timecard_id+'&rate='+ rate+'&rate_cost='+ rate_cost+'&checked='+ checked+'&notes='+ notes, function(response){

		$('#<?=$timecard->id?>').css('background-color','');

			setTimeout("finishAjax('alert_msg', '"+escape(response)+"')", 450);

			$('.alert').hide();

			return false;

		});

	 });





  $('#update_<?=$timecard->id?>').click(function() {





 $(document).ajaxStart(function () {

   		//show ajax indicator

		ajaxindicatorstart('loading data.. please wait..');

  }).ajaxStop(function () {

		//hide ajax indicator

		ajaxindicatorstop();

  });

			if ( $('#wk_checked_<?=$timecard->id?>'). prop("checked") == true){
				checked = 1;
			} else {
				checked = 0;
			}


			wk_snt	 = $('#wk_snt<?=$timecard->id?>').val();

			wk_rec	 = $('#wk_rec<?=$timecard->id?>').val();

			//wk_checked	 = $('#wk_checked_<?=$timecard->id?>').val();

			wk_bldt	 = $('#wk_bldt<?=$timecard->id?>').val();

			Bl_no	 = $('#Bl_no_<?=$timecard->id?>').val();

			wk_id	 = $('#weekcard_id_<?=$timecard->id?>').val();

			//alert (checked); return false;

$.get("<?php echo URL:: to( 'admin/AjaxUpdateWeekcard'); ?>?str_date=" + wk_snt+'&rec_date='+ wk_rec+'&checked='+ checked+'&bill_date='+ wk_bldt+'&bill_no='+ Bl_no+'&weekcard_id='+ wk_id, function(response){

		$('#Week_<?=$timecard->id?>').css('background-color','');

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

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px; background:<?php echo $mon_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Mon>0 ? $timecard->Mon : ''?>" name="hours_1" id="hours_1_<?=$timecard->id?>"></td>



<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $tue_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Tue>0 ? $timecard->Tue : ''?>" name="hours_2" id="hours_2_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $wed_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Wed >0 ? $timecard->Wed : ''?>" name="hours_3" id="hours_3_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $thu_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Thu>0?$timecard->Thu:''?>" name="hours_4" id="hours_4_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $fri_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Fri>0 ? $timecard->Fri : ''?>" name="hours_5" id="hours_5_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $sat_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sat > 0 ? $timecard->Sat: ''?>" name="hours_6" id="hours_6_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $sun_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sun > 0 ? $timecard->Sun: '' ?>" name="hours_7" id="hours_7_<?=$timecard->id?>"></td>

<td><div id="total-timecard_<?=$timecard->id?>" class="total"><?=$total?></div></td>

<td style="width:70px;"><input type="text" class="form-control emp_<?=$timecard->id?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " style="padding:2px;" id="rate_<?=$timecard->id?>" name="rate" value="<?=$timecard->Rate?>"/></td>

<td style="width:70px;"><input type="text" class="form-control emp_<?=$timecard->id?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " style="padding:2px;" id="rate_cost_<?=$timecard->id?>" name="rate_cost" value="<?=$timecard->Rate_Cost?>"/></td>

<td ><input type="checkbox" name="Checked" value="1" <?php if ($timecard->Billable ==1) { echo 'checked'; } ?> id="checked_<?=$timecard->id?>" class="checked_<?=$timecard->id?>" style="float:left"></td>

<td width="15%"><input type="text" class="form-control" style="padding:2px;" name="notes" value="<?=$timecard->Notes?>" id="notes_<?=$timecard->id?>"/></td>

<td id="buttoncol" width="50">

<button class="save" id="submit_<?=$timecard->id?>" type="button" title="Opslaan"><span class="icon-save"></span></button>

<a href="<?php echo URL:: to( 'admin/Distroy-timecard',$timecard->id); ?>" title="Verwijderen" onclick="return confirm('Weet u het zeker of u de uren van deze werknemer wilt verwijderen ?');"><span class="icon-remove-sign"></span></a>

</td>

 </tr>

   {!! Form::close() !!}

  <?php } ?>

  </tbody>

  </table>


 <table class="table table-bordered sort" style="margin-top:15px;">
 <tr>
 <th>Verz. datum</th>
 <th>Ontv. datum</th>
 <th>Goedgekeurd</th>
 <th>Factuurdatum</th>
 <th>Factuurnr</th>
 <th>Bijwerken</th>
 </tr>

 <tr id="Week_<?=$timecard->id?>">
 <td>
<div class="input-group">
<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
<input type="text" class="datepicker form-control wk_<?=$timecard->id?>" id="wk_snt<?=$timecard->id?>" name="Sent_Date" value="<?=
strtotime($GetWeekCardDetails->Sent_Date) > 0 ? $GetWeekCardDetails->Sent_Date: ''?>" >
</div>
 </td>
 <td>
<div class="input-group">
<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
<input type="text" class="datepicker form-control wk_<?=$timecard->id?>" id="wk_rec<?=$timecard->id?>" name="Received_Date" value="<?=strtotime($GetWeekCardDetails->Received_Date) > 0 ? $GetWeekCardDetails->Received_Date: ''?>" >
</div>
 </td>
 <td>
   <div class="input-group" style="margin-left:30px;">
   <div class="checkbox-inline">
 <input type="checkbox" value="1" <?php if ($GetWeekCardDetails->Checked ==1) { echo 'checked'; } ?> id="wk_checked_<?=$timecard->id?>" class="wk_checked_<?=$timecard->id?>" style="float:left;">
</div>
</div>
 </td>
 <td>
<div class="input-group">
<div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
<input type="text" class="datepicker form-control wk_<?=$timecard->id?>" id="wk_bldt<?=$timecard->id?>"  name="Billing_Date" value="<?=@strtotime($GetWeekCardDetails->Billing_Date) > 0 ? $GetWeekCardDetails->Billing_Date: ''?>">
</div>
 </td>
 <td>
 <input type="text" class=" form-control wk_<?=$timecard->id?>" id="Bl_no_<?=$timecard->id?>" name="Billing_no" value="<?=@$GetWeekCardDetails->Billing_no?>">
 </td>
 <td>
 <a class="save" id="update_<?=$timecard->id?>" href="#" title="Bijwerken" style="display:none">
 <div class="col-md-2">
 <div class="icons-list-icon">
 <span class="icon-save"></span>
 </div></div></a>
 </td>


 </tr>



 </table>


                    </div>

                    </div>



</div>







   <?php } } }  else { ?>



   <div class="block">



                    <div class="content">

                    <p align="center">Project Not Found ...!</p>

                    </div>

   </div>

   <?php } ?>





     </div>



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

                {!! Form::open(['url'=> 'admin/Addweekcard', 'id' => 'timecard']) !!}

                <div class="modal-body clearfix">



                    <div class="block">



    <input type="hidden" name="weekprojects" value="Selective" />

   <input type="hidden" name="Weeknumber" id="Weeknumber" />

   <input type="hidden" name="weekcard_id" id="weekcard_id" />

   <input type="hidden" name="project_id"  id="project"/>



                    <div class="content">

                      <div class="form-row">



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

                      <th>+</th>

                      <th style="width:70px;">Klant</th>

                      <th style="width:70px;">Kost.</th>

                       <th style="width:70px;">Regie</th>

                      <th width="15%">Opmerkingen</th>

                      <th id="buttonheader" style="display:none;">&nbsp;</th>

                      </tr>

                      </thead>

                      <tbody>

                      <tr>

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

<td><input type="text" class="form-control"  style="padding:2px;" name="rate" onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>

<td><input type="text" class="form-control"  style="padding:2px;" name="rate_cost" onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>

<td ><input type="checkbox" name="Checked" value="1" checked="checked"></td>

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



 <script >

   $(document).ready(function(){

	 $('select#drop_notes').on('change', function() {

		var notes = $('select#drop_notes').val();
		if (notes == 'other') {
		$('#note_other').show();
		} else {
		$('#note_other').hide();
		}

	});

	     $(".txt").each(function() {

            $(this).keyup(function(){

                calculateSum($(this));

				$('.sub_btn').css('display','inline');

            });

        });





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





	  });

 function add_new(Week_id,Project,Weeknumber,Project_Id) {





	$('#Weeknumber').val(Weeknumber);

	$('#weekcard_id').val(Week_id);

	$('#project').val(Project_Id);

	$('.modal-title').html('Uren Toevoegen  -  Project: '+Project);

	//alert (Week_id+'---'+Project+'---'+Weeknumber);



	 }





 </script>

 <script type='text/javascript' src="{{ URL::asset('assets/js/plugins/select2/select2.min.js') }}"></script>



       @include('admin/footer')</div>
