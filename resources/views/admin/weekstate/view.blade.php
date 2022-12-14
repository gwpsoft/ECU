

    @include('admin/header')

    <meta name="csrf-token" content="{{csrf_token()}}" />

     <title>Weekstaat details</title>





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

  margin-right: 0px !important;



 }

</style>



<script>

$(document).ready(function() {



		var project_id = $('#project').val();

		$.get('<?php echo URL:: to( 'admin/Ajaxproject'); ?>?project_id=' + project_id,function(data) {



			 $('#Afdeling').val(data.DeptName);
			 $('#Klant').val(data.CustomerName);
			 $('#Project').val(data.Name);
			 $('#Klant_proj').val(data.Customer_Ref);
			 $('#Project_note').val(data.pro_Note);
			 $('#Uitvoerder').val(data.Contact_Id);
			 $('#Project_Fax').val(data.Fax);
			 $('#Adres').val(data.Address);
			 $('#Postcode').val(data.Zipcode);
			 $('#Stad').val(data.City);
			 $('#Vaste_prijs').val(data.Fixed);
			 $('#Tarief').val(data.Rate);
			 $('#alert_msg').val('');



		});



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



    function calculateSum() {



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





function calculateSumTimeCard(id) {



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



$(document).ready(function(){



    $("#checked").click(function(){

        $("#received").val("<?=date('Y-m-d')?>");

    });

});





</script>



     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Home</a></li>

                    <li class="active">Weekstaat details</li>

                </ol>

            </div>

        </div>



        <div class="row">



    @include('admin/sidebar')



   {!! Form::open(['url'=> 'admin/Addweekcard', 'id' => 'timecard']) !!}

   <input type="hidden" name="weekcard_id" value="<?=@$GetWeekCardDetails->id?>" />

   <input type="hidden" name="project_id" value="<?=@$GetWeekCardDetails->Project_Id?>" id="project"/>

    <div class="col-md-12">

      @if (Session::has('message'))

   <div class="alert alert-success">

                        <b>Success!</b> {{Session::get('message')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif





<?php if ($GetTimeCards) { ?>

  <div class="block">

   <span id="alert_msg"></span>

                    <div class="header" >



                       <h2>Gewerkte uren</h2>



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

                      <th width="15%">Afspraken</th>

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



             $(".txt_<?=$timecard->id?>").each(function() {

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

			hours_1	 =$('#hours_1_<?=$timecard->id?>').val();

			hours_2	 = $('#hours_2_<?=$timecard->id?>').val();

			hours_3	 = $('#hours_3_<?=$timecard->id?>').val();

			hours_4	 = $('#hours_4_<?=$timecard->id?>').val();

			hours_5	 = $('#hours_5_<?=$timecard->id?>').val();

			hours_6	 = $('#hours_6_<?=$timecard->id?>').val();

			hours_7	 = $('#hours_7_<?=$timecard->id?>').val();

			rate	= $('#rate_<?=$timecard->id?>').val();

			rate_cost = $('#rate_cost_<?=$timecard->id?>').val();

			checked	= $('#checked_<?=$timecard->id?>').val();

			notes = $('#notes_<?=$timecard->id?>').val();

			weekcard_id = $('#weekcard_id_<?=$timecard->id?>').val();

			timecard_id = $('#timecard_id_<?=$timecard->id?>').val();



$.get("<?php echo URL:: to( 'admin/AjaxUpdateWeektime'); ?>?hours_1=" + hours_1+'&hours_2='+ hours_2+'&hours_3='+ hours_3+'&hours_4='+ hours_4+'&hours_5='+ hours_5+'&hours_6='+ hours_6+'&hours_7='+ hours_7+'&weekcard_id='+ weekcard_id+'&timecard_id='+ timecard_id+'&rate='+ rate+'&rate_cost='+ rate_cost+'&checked='+ checked+'&notes='+ notes, function(response){



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

   <input type="hidden" name="weekcard_id" id="weekcard_id_<?=$timecard->id?>" value="<?=$GetWeekCardDetails->id?>" />

   <input type="hidden" name="timecard_id" id="timecard_id_<?=$timecard->id?>" value="<?=$timecard->id?>" />



  <tr id="<?=$timecard->id?>">

<td width="18%">

<?php $GetEmployeeName = DB::table('tblemployee')->where('id',$timecard->Employee_Id)->first(); ?>

<input type="text" disabled="disabled" value="<?=$GetEmployeeName->Firstname?>&nbsp;<?=$GetEmployeeName->Lastname?>" />

</td>
<?php if ($timecard->Mon > 0) { $mon_background = '#59AD2F'; } else { $mon_background = '';}?>
<?php if ($timecard->Tue > 0) { $tue_background = '#59AD2F'; } else { $tue_background = '';}?>
<?php if ($timecard->Wed > 0) { $wed_background = '#59AD2F'; } else { $wed_background = '';}?>
<?php if ($timecard->Thu > 0) { $thu_background = '#59AD2F'; } else { $thu_background = '';}?>
<?php if ($timecard->Fri > 0) { $fri_background = '#59AD2F'; } else { $fri_background = '';}?>
<?php if ($timecard->Sat > 0) { $sat_background = '#59AD2F'; } else { $sat_background = '';}?>
<?php if ($timecard->Sun > 0) { $sun_background = '#59AD2F'; } else { $sun_background = '';}?>


<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" readonly="readonly" style="padding:2px;background:<?php echo $mon_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Mon?>" name="hours_1" id="hours_1_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" readonly="readonly" type="text" style="padding:2px;background:<?php echo $tue_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Tue?>" readonly="readonly" name="hours_2" id="hours_2_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" readonly="readonly" type="text" style="padding:2px;background:<?php echo $wed_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Wed?>" readonly="readonly" name="hours_3" id="hours_3_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" readonly="readonly" type="text" style="padding:2px;background:<?php echo $thu_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Thu?>" readonly="readonly" name="hours_4" id="hours_4_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" readonly="readonly" type="text" style="padding:2px;background:<?php echo $fri_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Fri?>" readonly="readonly" name="hours_5" id="hours_5_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" readonly="readonly" type="text" style="padding:2px;background:<?php echo $sat_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sat?>" readonly="readonly" name="hours_6" id="hours_6_<?=$timecard->id?>"></td>

<td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" readonly="readonly" type="text" style="padding:2px;background:<?php echo $sun_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sun?>" readonly="readonly" name="hours_7" id="hours_7_<?=$timecard->id?>"></td>

<td><div id="total-timecard_<?=$timecard->id?>" class="total"><?=$total?></div></td>

<td style="width:70px;"><input type="text" class="form-control"  style="padding:2px;" readonly="readonly" id="rate_<?=$timecard->id?>" name="rate" value="<?=$timecard->Rate?>"/></td>

<td style="width:70px;"><input type="text" class="form-control"  style="padding:2px;" readonly="readonly" id="rate_cost_<?=$timecard->id?>" name="rate_cost" value="<?=$timecard->Rate_Cost?>"/></td>

<td ><input type="checkbox" name="Checked" disabled="disabled" value="1" <?php if ($timecard->Billable ==1) {?> checked="checked" <?php } ?> id="checked_<?=$timecard->id?>"></td>

<td width="15%"><input type="text" class="form-control" style="padding:2px;" readonly="readonly" name="notes" value="<?=$timecard->Notes?>" id="notes_<?=$timecard->id?>"/></td>

 </tr>



<?php } ?>

                      </tbody>





                      </table>





                    </div>

                    </div>



</div>

 <?php } ?>

    </div>



    {!! Form::open(['url'=> 'admin/update_weekstate']) !!}

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



			$result =  splitNum($GetWeekCardDetails->Weeknumber) ;

			$weekcard_year = $result[0];

			$weekcard_week = $result[1];



				  ?>





                       <div class="form-row">

                            <div class="col-md-4">Week nr:</div>

                            <div class="col-md-3">

                            		<select name="year" class="select2" style="width:100px;" disabled="disabled">

                                    <?php

									$current_year = date('Y');

									$range = range($current_year, $current_year-10);

									$years = array_combine($range, $range);

									foreach ($years as $year) {?>

                                    <option value="<?=$year?>" <?php if ($weekcard_year == $year)  { ?> selected="selected" <?php } ?>><?=$year?></option>

                                    <?php } ?>

                                </select>

                                  <span class="error">  {{ $errors->first( 'year' , ':message' ) }}</span>

                            </div>

                        <div class="col-md-3">

                            		<select name="week" class="select2" style="width:100px;" disabled="disabled">

                                    <?php



									foreach (range(00, 52) as $number) {

										$number = (str_pad($number, 2, "0", STR_PAD_LEFT));

										?>

                                    <option value="<?=$number?>" <?php if ($weekcard_week == $number)  { ?> selected="selected" <?php } ?>><?=$number;?></option>

                                    <?php } ?>

                                </select>

                                  <span class="error">  {{ $errors->first( 'week' , ':message' ) }}</span>

                            </div>

                        </div>





                        <div class="form-row">

                            <div class="col-md-4">Project:</div>

                            <div class="col-md-7">



                                <select class="select2" style="width: 100%; color:#000 !important;" tabindex="-1" name="Project_Id" disabled="disabled">

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

                                    <input type="text" disabled="disabled" class="datepicker form-control" placeholder="<?=date('Y-m-d')?>" name="Sent_Date" value="<?=$GetWeekCardDetails->Sent_Date?>">

                                </div>

                                  <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>



                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Ontv. datum:</div>

                            <div class="col-md-7">

                        <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" disabled="disabled" class="datepicker form-control" id="received"  name="Received_Date" value="<?php if (!empty($GetWeekCardDetails->Received_Date)) { echo $GetWeekCardDetails->Received_Date; }?>">

                                </div>



                                <?php /*?><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>

                        </div>

                        </div>



                        <div class="form-row">

                          <div class="col-md-4">Goedgekeurd:</div>

                            <div class="col-md-7">

                      		  <div class="input-group">

                                  <div class="checkbox-inline">

                                    <div class="checker">

                                    <input type="checkbox" disabled="disabled" name="Checked" id="checked" value="1" <?php if ($GetWeekCardDetails->Checked == 1) { ?> checked="checked" <?php } ?>>

                                    </div>

                                 </div>

                             </div>

                         </div>

                               <?php /*?> <span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>

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

                            <div class="col-md-4">Afspraken:</div>

                            <div class="col-md-7">

                            <textarea class="form-control" rows="5" disabled="disabled" name="Notes"><?=$GetWeekCardDetails->Notes?></textarea>

                            		<!--<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>-->

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

                         <div class="col-md-4">Uitvoerder:</div>

                         <div class="col-md-7">

                             <input type="text" class="form-control" id="Uitvoerder" readonly="readonly">

                         </div>

                     </div>


                        <div class="form-row">

                            <div class="col-md-4">Afspraken:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" id="Project_note" readonly="readonly">

                            </div>

                        </div>


												<div class="form-row">

														<div class="col-md-4">Goedkeuring:</div>

														<div class="col-md-7">
															@if ($Project_DTL->Goedkeuring)
																<input type="text" class="form-control" value="{{ $Project_DTL->Goedkeuring }}" readonly="readonly">
															@else
																<input type="text" class="form-control" readonly="readonly">
															@endif

														</div>

												</div>

                         {{-- <div class="form-row">
                            <div class="col-md-4">ECU Project/Debiteur #:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" id="Project_nr" readonly="readonly">
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

                        </div> --}}



                    </div>

                </div>



        </div>



         <center>

                <div class="content controls">

                <div class="form-row">



                <div class="col-md-3" align="center" >

                 <a href="<?php echo URL:: to( 'admin/weekcard' ); ?>" class="btn btn-primary" style="width:100%">Terug</a>





                </div>

              <!--  <div class="col-md-3" align="center">

                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                </div>-->



                </div>

                </div>

          </center>



            </div>



    {!! Form::close() !!}

  </div>

  <br />

       @include('admin/footer')</div>
