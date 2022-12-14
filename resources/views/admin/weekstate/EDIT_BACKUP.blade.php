

@include('admin/header')

<meta name="csrf-token" content="{{csrf_token()}}" />

<title>Weekstaat bewerken . . . </title>





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
    .btn-disable
    {
        cursor: not-allowed;
        pointer-events: none;

        /*Button disabled - CSS color class*/
        color: #c0c0c0;
        /*background-color: #ffffff;*/

    }
</style>



<script>

    $(document).ready(function() {

        /*if($('#billable').prop("checked") == false){


                $(this).val('1');
                $(this).prop('checked')

                    } else {

                        $(this).val('0');
                        $(this).removeAttr('checked');


                        }*/






        $('#via_checked').click(function () {
            if ($(this).prop('checked')) {
                $(this).val('1');
                // alert('is checked');
            } else {
                $(this).val('0');
                // alert('is not checked');
            }
        });




        $('#Billable').click(function () {
            if ($(this).prop('checked')) {
                $(this).val('1');
                // alert('is checked');
            } else {
                $(this).val('0');
                $(this).removeAttr('checked');
                // alert('is not checked');
            }
        });

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
            var project_id = $('#project').val();


            $.get('<?php echo URL:: to( 'admin/AjaxemployeesCost'); ?>?Employee_Id=' + Employee_Id+'&project_id='+project_id,function(data) {

                // alert (data); return false;



                $('#rate_cost').val(data.Cost);



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

                // $('.btn').css('display','inline');
                $('.btn-disable').removeClass('btn-disable');

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



    /*$(document).ready(function(){



        $("#checked").click(function(){

            $("#received").val("<?=date('Y-m-d')?>");

    });

});*/





</script>



<div class="row">

    <div class="col-md-12">

        <ol class="breadcrumb">

            <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>

            <li class="active">Creëren Weekstaat</li>

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



        <div class="block">

            <div class="header" >



                <h2>Uren Toevoegen</h2>
                <div style="float:left; margin-left:20px;">
                    ( <a href="<?=URL:: to( 'admin' ) . '/weekcard_pdf_WO_Regie/'.$GetWeekCardDetails->id;?>" title="Afdrukken"><img class=" " src="{{ URL::asset('assets/img/icons/pdf_n4.png') }}" id="pdf" style=" cursor:pointer; width:20px; height:20px;"></a>  |
                    <a href="<?=URL:: to( 'admin' ) . '/weekcard_email_WO_Regie/'.$GetWeekCardDetails->id;?>" title="E-mail" ><img src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer;width:20px; height:20px;"></a> )
                </div>

                <div style="float:right">


                    <a href="<?=URL:: to( 'admin' ) . '/weekcard_pdf/'.$GetWeekCardDetails->id;?>" title="Download PDF"><img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer"></a>  |



                    <a href="<?=URL:: to( 'admin' ) . '/weekcard_email/'.$GetWeekCardDetails->id;?>" title="E-mailen" ><img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer"></a>



                </div>

            </div>

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

                            {{--                      <th id="buttonheader" style="display:none;">&nbsp;</th>--}}
                            <th id="buttonheader" >&nbsp;</th>

                        </tr>

                        </thead>

                        <tbody>

                        <tr>

                            <td>

                                <select class="select2" style="width: 100%;" tabindex="-1" name="Employee_Id" id="Employee_Id">

                                    <?php foreach ($AllEmployees as $Employee) {?>

                                    <option value="<?=$Employee->id.'_'.$Employee->Employmentagency_Id?>"><?=$Employee->Firstname?>&nbsp;<?=$Employee->Lastname?></option>

                                    <?php } ?>

                                </select>

                            </td>

                            <td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="" name="hours_1"></td>

                            <td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="" name="hours_2"></td>

                            <td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="" name="hours_3"></td>

                            <td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="" name="hours_4"></td>

                            <td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="" name="hours_5"></td>

                            <td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="" name="hours_6"></td>

                            <td><input class="form-control txt" type="text" style="padding:2px;" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="" name="hours_7"></td>

                            <td><div id="total-timecard" class="total">0.00</div></td>

                            <td><input type="text" id="rate" class="form-control"  style="padding:2px;" name="rate"/></td>

                            <td><input type="text" id="rate_cost" class="form-control"  style="padding:2px;" name="rate_cost"/></td>

                            <td ><input type="checkbox" name="Checked" value="1" checked="checked"></td>

                            <td>
                                <select class="select2" style="width: 100%;" name="notes" id="drop_notes">
                                    <option value="">Opmerkingen kiezen</option>
                                    <?php
                                    if (!empty($Comments)) {
                                    foreach (@$Comments as $Comment) {?>

                                    <option value="<?=@$Comment->comments?>"><?=@$Comment->comments?></option>
                                    <?php }}  ?>

                                    <option value="other">Anders</option>
                                </select>


                                <input type="text" class="form-control"  style="padding:2px;display:none; margin-top:5px;" name="note_other" id="note_other"/>

                            </td>

                            {{--<td id="buttoncol"><button class="btn btn-success" type="submit" style="display:none;"><span class="icon-plus-sign"></span></button>--}}
                            <td id="buttoncol"><button class="btn btn-success btn-disable" type="submit" ><span class="icon-plus-sign"></span></button>

                            </td>

                        </tr>

                        </tbody></table>

                    {!! Form::close() !!}



                </div></div></div>

        <?php if ($GetTimeCards) { ?>

        <div class="block">

            <span id="alert_msg"></span>

            <div class="header" >



                <h2>Gewerkte Uren</h2>



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

                            <th style="width:90px;">Klant</th>

                            <th style="width:90px;">Kost.</th>

                            <th style="width:70px;">Regie</th>

                            <th width="10%">Opmerkingen</th>

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

                                <input type="text" readonly="readonly" value="<?=$GetEmployeeName->Firstname?>&nbsp;<?=$GetEmployeeName->Lastname?>" />

                            </td>
                            <?php if ($timecard->Mon > 0) { $mon_background = '#59AD2F'; } else { $mon_background = '';}?>
                            <?php if ($timecard->Tue > 0) { $tue_background = '#59AD2F'; } else { $tue_background = '';}?>
                            <?php if ($timecard->Wed > 0) { $wed_background = '#59AD2F'; } else { $wed_background = '';}?>
                            <?php if ($timecard->Thu > 0) { $thu_background = '#59AD2F'; } else { $thu_background = '';}?>
                            <?php if ($timecard->Fri > 0) { $fri_background = '#59AD2F'; } else { $fri_background = '';}?>
                            <?php if ($timecard->Sat > 0) { $sat_background = '#59AD2F'; } else { $sat_background = '';}?>
                            <?php if ($timecard->Sun > 0) { $sun_background = '#59AD2F'; } else { $sun_background = '';}?>


                            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $mon_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Mon>0 ? $timecard->Mon : ''?>" name="hours_1" id="hours_1_<?=$timecard->id?>"></td>



                            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $tue_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Tue>0 ? $timecard->Tue : ''?>" name="hours_2" id="hours_2_<?=$timecard->id?>"></td>

                            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $wed_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Wed >0 ? $timecard->Wed : ''?>" name="hours_3" id="hours_3_<?=$timecard->id?>"></td>

                            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $thu_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Thu>0?$timecard->Thu:''?>" name="hours_4" id="hours_4_<?=$timecard->id?>"></td>

                            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $fri_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Fri>0 ? $timecard->Fri : ''?>" name="hours_5" id="hours_5_<?=$timecard->id?>"></td>

                            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $sat_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sat > 0 ? $timecard->Sat: ''?>" name="hours_6" id="hours_6_<?=$timecard->id?>"></td>

                            <td style="width:70px;"><input class="form-control txt_<?=$timecard->id?>" type="text" style="padding:2px;background:<?php echo $sun_background?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); " value="<?=$timecard->Sun > 0 ? $timecard->Sun: '' ?>" name="hours_7" id="hours_7_<?=$timecard->id?>"></td>

                            <td><div id="total-timecard_<?=$timecard->id?>" class="total"><?=$total?></div></td>

                            <td style="width:90px;"><input type="text" class="form-control emp_<?=$timecard->id?>"  style="padding:1px;" id="rate_<?=$timecard->id?>" name="rate" value="<?=$timecard->Rate?>"  onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>

                            <td style="width:90px;"><input type="text" class="form-control emp_<?=$timecard->id?>"  style="padding:1px;" id="rate_cost_<?=$timecard->id?>" name="rate_cost" value="<?=$timecard->Rate_Cost?>" onchange="this.value=fmtFloat(this.value.replace(',','.')); "/></td>

                            <td ><input type="checkbox" name="Billable" value="1" <?php if ($timecard->Billable ==1) { echo 'checked'; } ?> id="checked_<?=$timecard->id?>" style="float:left"></td>

                            <td width="15%"><input type="text" class="form-control" style="padding:2px;" name="notes" value="<?=$timecard->Notes?>" id="notes_<?=$timecard->id?>"/></td>

                            <td id="buttoncol" width="50">

                                <button class="save" id="submit_<?=$timecard->id?>" type="button" onclick="calculateRegieWorkingHours()"><span class="icon-save"></span></button>

                                <a href="<?php echo URL:: to( 'admin/Delete-timecard',$timecard->id); ?>" title="goedkeuren" onclick="return confirm('Weet u zeker dat u wilt verwijderen?');"><span class="icon-remove-sign"></span></a>

                            </td>

                        </tr>



                        <?php } ?>

                        </tbody>





                    </table>
                    <br>
                    <div class="row text-center">
                        <h3 style="display: inline-block;">Totaal van regie uren:
                            <strong>
                                <span id="regieHoureID"></span>
                            </strong>
                        </h3>
                        <h3 style="display: inline-block;">___ Totaal van aangenomen uren:
                            <strong><span id="aangenomenID"></span></strong>
                        </h3>
                    </div>

                </div>

            </div>



        </div>

        <?php } ?>

    </div>

    {!! Form::close() !!}

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

                                <select name="year" class="select2" style="width:100px;">

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

                                <select name="week" class="select2" style="width:100px;">

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

                                    <input type="text" class="datepicker form-control"  name="Sent_Date" value="<?php echo strtotime($GetWeekCardDetails->Sent_Date) > 0 ? $GetWeekCardDetails->Sent_Date: '';?>">

                                </div>

                                <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>



                        </div>


                        <div class="form-row">
                            <div class="col-md-4">Ontv. datum:</div>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                                    <input type="text" class="datepicker form-control" id="received" name="Received_Date" value="<?php echo strtotime($GetWeekCardDetails->Received_Date) > 0 ? $GetWeekCardDetails->Received_Date: '';?>" >
                                </div>

                                <?php /*?><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span><?php */?>
                            </div>
                        </div>



                        <div class="form-row">

                            <div class="col-md-4">Factuurdatum:</div>

                            <div class="col-md-7">

                                <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" class="datepicker form-control"  name="Billing_Date" value="<?php echo strtotime($GetWeekCardDetails->Billing_Date) > 0 ? $GetWeekCardDetails->Billing_Date: '';?>">

                                </div>

                                <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>



                        </div>



                        <div class="form-row">

                            <div class="col-md-4">Factuurnr:</div>

                            <div class="col-md-7">

                                <input type="text" class=" form-control"  name="Billing_no" value="<?=@$GetWeekCardDetails->Billing_no?>">



                                <?php /*?> <span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span><?php */?>

                            </div>



                        </div>
                        <div class="form-row">

                            <div class="col-md-4">Status:</div>

                            <div class="col-md-7">



                                <select class="select2" style="width: 100%; color:#000 !important;" tabindex="-1" name="status_id" id="status_id" >

                                    <option value="">Kies een status</option>
                                    <?php $AllStatus = DB::table('tblstatus')->where('active',1)->select('*')->orderBy('name','asc')->get(); ?>
                                    <?php foreach ($AllStatus as $status) {?>

                                    <option value="<?=$status->id?>" <?php if ($GetWeekCardDetails->status_id == $status->id) { ?> selected="selected" <?php } ?>><?=$status->name?></option>

                                    <?php } ?>

                                </select>



                                <span class="error">  {{ $errors->first( 'status' , ':message' ) }}</span>

                            </div>

                        </div>
                        <div class="form-row">

                            <div class="col-md-4">Afgehandeld:</div>

                            <div class="col-md-2">

                                <div class="input-group">

                                    <div class="checkbox-inline">
                                        <input type="checkbox" name="Checked" id="Billable" <?php if ($GetWeekCardDetails->Checked == 1) { ?> value="1"  checked <?php } else {  ?> value="0" <?php }?>>
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-2">Via Werkbrifeje:</div>

                            <div class="col-md-2">

                                <div class="input-group">

                                    <div class="checkbox-inline">
                                        <input type="checkbox" name="Werkbrifje" id="via_checked" <?php if ($GetWeekCardDetails->Werkbrifje == 1) { ?> value="1"  checked <?php } else {  ?> value="0" <?php }?>>
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

                                <textarea class="form-control" rows="5" name="Internal_Notes"><?=$GetWeekCardDetails->Internal_Notes?></textarea>

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
                        <div style="float:right">
                            <a href=" <?php echo URL:: to( 'admin' ).'/edit_project/'.@$GetWeekCardDetails->Project_Id; ?> " target="_blank" class="btn btn-warning">Project</a>
                        </div>
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




                        <!--<div class="form-row">
                           <div class="col-md-4">ECU Project/Debiteur #:</div>
                           <div class="col-md-7">
                                   <input type="text" class="form-control" id="Project_nr" readonly="readonly">
                           </div>
                       </div>-->



                        <div class="form-row">

                            <div class="col-md-4">Uitvoerder:</div>

                            <div class="col-md-7">

                                <input type="text" class="form-control" id="Uitvoerder" readonly="readonly">

                            </div>

                        </div>


                        <!--<div class="form-row">

                            <div class="col-md-4">Adres:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" id="Adres" readonly="readonly">

                            </div>

                        </div>-->





                        <!--<div class="form-row">

                            <div class="col-md-4">Postcode:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" id="Postcode" readonly="readonly">

                            </div>

                        </div>-->



                        <!--<div class="form-row">

                           <div class="col-md-4">Stad:</div>

                           <div class="col-md-7">

                                   <input type="text" class="form-control" id="Stad" readonly="readonly">

                           </div>

                       </div>-->



                        <!--<div class="form-row">

                            <div class="col-md-4">Vaste prijs:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" id="Vaste_prijs" readonly="readonly">

                            </div>

                        </div>-->

                        <!--<div class="form-row">

                            <div class="col-md-4">Tarief p/u:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" id="Tarief" readonly="readonly">

                            </div>

                        </div>-->


                        <!--<div class="form-row">

                            <div class="col-md-4">ECU Project/Debiteur #:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" id="project_ref" readonly="readonly">

                            </div>

                        </div>-->

                        <!--<div class="form-row">

                            <div class="col-md-4">Klant proj. nr.:</div>

                            <div class="col-md-7">

                            		<input type="text" class="form-control" id="customer_ref" readonly="readonly">

                            </div>

                        </div>-->


                        <div class="form-row">

                            <div class="col-md-4">Afspraken:</div>

                            <div class="col-md-7">
                                <textarea class="form-control" rows="5" id="Project_note" ><?php echo $Project_DTL->Notes?></textarea>
                                <!--<input type="text" class="form-control" id="Project_note" readonly="readonly">--> </div>


                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Goedkeuring:</div>

                            <div class="col-md-7">
                                <textarea class="form-control" rows="5" id="Goedkeuring" ><?php echo $Project_DTL->Goedkeuring?></textarea>
                                <!--<input type="text" class="form-control" id="Project_note" readonly="readonly">--> </div>
                            <div class="col-md-9"> </div>
                            <div class="col-md-3">
                                <a class="btn btn-success"  style="margin:5px;" onclick="UpdateProjectNote();">Opslaan</a>
                            </div>

                        </div>
                    </div>

                </div>



            </div>

            {{-- New Work starts  --}}

            <div class="col-md-6">
                <div class="block">
                    <div class="header" >
                        <a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right;">Document Uploaden</a>

                        <h2>Werkbrieven & Documenten</h2>

                    </div>

                    <div class="content">
                        <table class="table table-bordered table-striped no-footer" width="100%">
                            <tr>
                                <th>Notitie</th>
                                <th>Datum en Tijd</th>
                                <th>Downloaden</th>
                                <th>Opties</th>
                            </tr>
                            @if ($weekCard->weekCardAttachments)
                                @foreach ($weekCard->weekCardAttachments as $file)
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
                                            <a href="{{ url('admin/weekstaat/deleteWeekstaatDocument/'.$file->id) }}" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <p>Geen bestand gevonden...!</p>
                            @endif
                        </table>

                    </div>{{-- content class ends here --}}

                </div>
            </div>

            {{-- New Work ends  --}}

            <center>

                <div class="content controls">

                    <div class="form-row">



                        <div class="col-md-3" align="center" >

                            <a href="<?php echo URL:: to( 'admin/weekcard' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>

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


    {{-- Model to upload files starts below --}}

    <div class="modal  modal-info" id="uploadFile"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Document Uploaden</h4>
                </div>

                <form method="post" action="{{ url('admin/weekstaat/uploadWeekstaatDocument') }}"  enctype="multipart/form-data">

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


    {{-- Model to edit uploaded files starts here --}}

    <div class="modal modal-info" id="editUploadFilesDetail"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Document Bewerken</h4>
                </div>
                <form method="post" action="{{ url('admin/weekstaat/updateUploadWeekstaatDoc') }}" enctype="multipart/form-data">
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

</div>

<br />

<script>

    calculateRegieWorkingHours();

    function getdocinfo (id) {


        $.get('<?php echo URL:: to( 'admin/weekstaat/editWeekstaatDocument' ); ?>/' + id,function(data) {
            // $('#Exp_date').val(data.ExpiryDate);
            $('#note').val(data.data.note);
            $('#fileId').val(data.data.id);
            $('#weekCardID').val(data.data.weekCardID);
            // $('#doc_id').val(id);
            $('#editUploadFilesDetail').modal('show');
        });


    }

    function UpdateProjectNote () {

        Project_Note = $('#Project_note').val();
        Goedkeuring = $('#Goedkeuring').val();
        Project_Id = $('#project').val();

        $.ajax({
            method: "POST",
            url:'<?php echo URL:: to( 'admin/UpdateProjectNote'); ?>',
            data:'Project_Id='+Project_Id+'&Project_Note='+Project_Note+'&Goedkeuring='+Goedkeuring,
            success:function(response){
                alert (response);
            }
        });

    }

    function calculateRegieWorkingHours() {
        var url = "{{ URL:: to( 'admin/calculateRegieWorkingHours/' . $id) }}";
        $.ajax({
            method: "GET",
            url: url,
            success:function(response){
                document.getElementById("regieHoureID").innerHTML=response.data.regie.toFixed(2);
                document.getElementById("aangenomenID").innerHTML=response.data.notRegie.toFixed(2);
            }
        });

    }


</script>



@include('admin/footer')</div>
