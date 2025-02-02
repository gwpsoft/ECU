@include('admin/header')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>Dagelijkse Projecten </title>



<?php use App\reports;

use App\Weekcard;
use App\Planning;
$yearWeek = date('YW');

$Report_model = new reports();

$week_model = new Weekcard();

$segment5 = Request::segment(3);

if (!empty($segment5)) {
    $CurrentYear = $segment5[0] . $segment5[1] . $segment5[2] . $segment5[3];

    @$Currentweek = $segment5[4] . $segment5[5];

    $yearWeek = $segment5;
} else {
    $CurrentYear = $yearWeek[0] . $yearWeek[1] . $yearWeek[2] . $yearWeek[3];

    @$Currentweek = $yearWeek[4] . $yearWeek[5];
}

?>

<style>
    .checker {
        float: right !important;
    }

    .error {
        color: #fff;
    }

    .select2-container-disabled span {
        color: #000;
    }

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

    div.checker {

        margin-right: 15px !important;

        margin-top: 10px;



    }

    .weeknr_mini {

        color: #59ad2f;

        font-size: 12px;

    }

    .weeknr_small {

        color: #59ad2f;

        font-size: 18px;

    }

    .weeknr_large {

        color: #59ad2f;

        font-size: 24px;

        font-weight: bold;

    }

    #year {

        cursor: pointer;

        margin-right: 30px;

    }

    .label {
        font-size: 100%;
    }

    .modal-dialog {
        width: 35%;
    }

</style>



<script>
    function del(id) {

        var msg = confirm("Weet u het zeker of u de planning van deze werknemer wilt verwijderen ?");
        if (msg == true) {
            $('table').on('click', 'tr a', function(e) {
                e.preventDefault();
                $(this).parents('tr').remove();
            });

            $.get('<?php echo URL::to('admin/Delpersoneel'); ?>?id=' + id, function(data) {
                $('#Customer_Name').val(data);

            });
            return true;

        } else {
            return false;
        }



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

        $(document).ready(function() {
            /* Do stuff */



            $("#search").click(function() {

                // year  = document.getElementById('weeknumbery').value;

                date = document.getElementById('trg_date').value;
                if (date != '') {
                    document.location.href = "<?= URL::to('admin') ?>/PlanningByDate/" + date;
                } else {
                    document.location.href = "<?= URL::to('admin') ?>/PlanningByDate";
                }
            });
        });

        $(document).ready(function() {



            $("#checked").click(function() {

                $("#received").val("<?= date('Y-m-d') ?>");

            });

        });

    })(jQuery);
</script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".Srch").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


<div class="row">

    <div class="col-md-12">


        <ol class="breadcrumb">

            <li><a href="<?php echo URL::to('admin/dashboard'); ?>">Huis</a></li>

            <li class="active">Dagelijkse Projecten</li>

        </ol>

    </div>

</div>


{{-- <input  type="text" placeholder="Search.."> --}}
<div class="row">



    @include('admin/sidebar')


    @if (Session::has('error'))

        <div class="alert alert-danger">

            <b>Error!</b> {{ Session::get('error') }}

            <button type="button" class="close" data-dismiss="alert">×</button>

        </div>

    @endif




    <div class="col-md-12">

        @if (Session::has('message'))

            <div class="alert alert-success">

                <b>Success!</b> {{ Session::get('message') }}

                <button type="button" class="close" data-dismiss="alert">×</button>

            </div>

        @endif




        <h3><?php
            if (@$ProjectsDtl[0]->date != '') {
                echo date('l, F d, Y', strtotime(@$ProjectsDtl[0]->date));
            } else {
                echo date('l, F d, Y');
            } ?></h3>
        <input type="hidden" id="date" value="<?php echo @$ProjectsDtl[0]->date; ?>" />

        <hr />
    <!--<input type="text" class="datepicker form-control" placeholder="Datum" name="trg_date" id="trg_date"
                                    <?php if (@$ProjectsDtl[0]->date != '') {?> value="<?php echo @$ProjectsDtl[0]->date; ?>" <?php } ?> />-->

        <div style="float:right">

            <a class="btn btn-success" href="<?php echo URL::to('admin/Compact', @$ProjectsDtl[0]->date); ?>" title="Compact">Compact</a>

            <a class="btn btn-success" data-toggle="modal" href="#modal_default_2" title="Toevoegen">+ Nieuw
                Project</a>

            <a class="btn btn-success" data-toggle="modal" href="#modal_default_4" title="Toevoegen">Kopiëren</a>

            <a class="btn btn-success" href="<?php echo URL::to('admin/PlanPDF', @$ProjectsDtl[0]->date); ?>" title="Toevoegen">Afdrukken</a>


            {{-- {{( ? $Done : " YESS")}} --}}
        </div>



        <?php
        if (!empty($ProjectsDtl) && count ($ProjectsDtl) > 0){

        @$p =0 ;
        $count = 0;
        foreach ($ProjectsDtl as $Project) { @$p++;?>

        <script>
            $(document).ready(function() {



                $(".txt_" + <?php echo @$p; ?>).each(function() {

                    $(this).keyup(function() {

                        calculateSum($(this));

                        $('.sub_btn_' + <?php echo @$p; ?>).css('display', 'inline');

                    });

                });





                function calculateSum(pro_id) {



                    var sum = 0;

                    //iterate through each textboxes and add the values

                    $(".txt_" + <?php echo @$p; ?>).each(function() {



                        //add only if the value is number

                        if (!isNaN(this.value) && this.value.length != 0) {

                            sum += parseFloat(this.value);

                        }



                    });

                    //.toFixed() method will roundoff the final sum to 2 decimal places

                    $("#total-Employee_" + <?php echo @$p; ?>).html(sum.toFixed(2));

                }





            });
        </script>


        <?php

        $planning_model = new planning();
        $date = substr(Request::url(), strrpos(Request::url(), '/') + 1);
        // dd($date);

        $GetEmployees = $planning_model->GetEmployees($Project->project_id, @$Project->week_no, $Project->plan_id, date('Y-m-d', strtotime($date)));
        foreach ($GetEmployees as $key => $emp) {
            if (in_array($emp->employee_id, $duplicateIDs)) {
                $emp->hasDuplicate = 1;
            } else {
                $emp->hasDuplicate = 0;
            }
        }
        // $allEmployeeIDs = [];
        // print_r($GetEmployees);
        //$GetEmployees = $week_model->GetEmployees($Project->week_no);
        //$GetDept = $planning_model->DepartmentByProject($Project->project_id);
        ?>
        <div class="Srch">
            <h3>(<?php echo $Project->Dept_Name; ?>) - <?php echo $Project->Name; ?> </h3>

            <div class="block">

                <span id="alert_msg"></span>

                <div class="header">



                    <h2>Geplande personeel</h2>



                    <div style="float:right">


                        <a class="btn btn-danger"
                           href="<?= URL::to('admin/DelProjByDate', $Project->project_id . '_' . $ProjectsDtl[0]->date) ?>"
                           title="Verwijderen Project"
                           onclick="return confirm('Weet u het zeker of u de planning van dit project wilt verwijderen?');">-
                            Project</a>
                        <a class="btn btn-success" data-toggle="modal" href="#modal_default_3"
                           onclick="add_new('<?php echo $Project->plan_id; ?>','<?php echo $Project->project_id; ?>')" title="Toevoegen">+
                            Nieuw
                            Personeel</a>




                    </div>

                </div>

                <div class="content">
                    <?php //echo $requests[0][0]->Projects_Name
                    ?>
                    @if(count($requests[$count])>0)

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Rquests
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            @foreach ($requests[$count] as $Req)
                                <a class="dropdown-item"  href="#">{{$Req->Projects_Name}}
                                    <div><small><strong>Aantal Mensen :</strong></small> <strong>{{$Req->Aantal_Mensen}}</strong></div>
                                    <div style="border-bottom: solid 1px; margin-bottom:10px" ><small><strong>Hoeveel Dagen :</strong></small> <strong>{{$Req->Hoeveel_Dagen}}</strong></div></a>

                            @endforeach
                        </div>
                    </div>
                        @else
                        <h5>No Request Found</h5>
                        @endif
                    <div class="form-row">

                        <table class="table table-bordered sort" style="margin-top:15px;">

                            <thead>

                            <tr>
                                <th style="width:20px;">ID</th>
                                <th width="18%">Personeel</th>
                                <!--<th style="width:70px;">Week nr</th>-->

                                <th style="width:70px;">Regie</th>

                                <th style="width:70px;">Aangenomen</th>

                                <th style="width:70px;">Functie</th>

                                <th style="width:70px;">Groep</th>

                                <th style="width:70px;">Werkuren</th>

                                <th style="width:70px;">Goedgekeurd</th>

                                <th>Opties</th>

                            </tr>

                            </thead>

                            <tbody>

                            <tr>



                                <?php   $i = 0;
                                if (!empty($GetEmployees)){
                                foreach ($GetEmployees as $Employee) { $i++;
                                $Geschikt = DB::table('tblfunctie')->where('code',$Employee->Geschikt)->first();

                                // dd($Employee);

                                ?>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />



                            <tr id="<?= $Employee->id ?>" @if ($Employee->hasDuplicate)
                            style="background-color: #FFAD2A;"
                                    @endif>
                                <td><?php echo $Employee->id; ?></td>
                                <td><?= $Employee->Firstname ?> <?= $Employee->Lastname ?></td>
                            <!--<td><?= $Employee->week_no ?></td>-->
                                <td><?= $Employee->status == 1 ? 'Ja' : 'Nee' ?></td>
                                <td><?= $Employee->status == 2 ? 'Ja' : 'Nee' ?></td>
                                <td><?= @$Geschikt->name != '' ? @$Geschikt->name : ' ' ?></td>
                                <td><?= $Employee->group ?></td>
                                <td>{{ $Employee->total_time ? $Employee->total_time : '0.00' }}</td>
                                <td>{{ $Employee->approved_by_supervisor }}</td>
                                <td id="buttoncol" width="50">

                                    <a href="<?php echo URL::to('admin/EditEmply', $Employee->id); ?>" class="widget-icon" title="Bewerken"><span
                                                class="icon-pencil"></span></a>

                                    <a class="widget-icon" title="Verwijderen"
                                       onclick="del('<?php echo $Employee->id . '_' . $ProjectsDtl[0]->date; ?>');"><span
                                                class="icon-remove-sign"></span></a>

                                <!--<a href="<?php echo URL::to('admin/remove_pln_emp', $Employee->id . '_' . $ProjectsDtl[0]->date); ?>" class="widget-icon" title="Verwijderen" onclick="return confirm('Weet u het zeker of u de uren van deze werknemer wilt verwijderen ?');"><span class="icon-remove-sign"></span></a>-->

                                </td>

                            </tr>




                            <?php }
                            } else {?>
                            <tr>
                                <td colspan="8" align="center">Werknemers niet gevonden...!</td>

                            </tr>


                            <?php } ?>
                            </tbody>

                        </table>

                    </div>

                </div>



            </div>

            <?php $count++; } ?>
        </div> <?php }   else { ?>

        <div class="block">



            <div class="content">

                <p align="center">Project niet gevonden ...!</p>

            </div>

        </div>

        <?php } ?>

    </div>

</div>




</div>

<br />

<div class="modal in modal-info" id="modal_default_2" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>

                <h4 class="modal-title">Personeels planning</h4>

            </div>

            {!! Form::open(['url' => 'admin/addPlanProject', 'id' => 'planning']) !!}

            <div class="modal-body clearfix">

                <input type="hidden" name="date" value="<?php echo @$ProjectsDtl[0]->date; ?>" />



                <div class="block">

                    <div class="content">

                        <div class="form-row">



                            <select name="project_id" id="project_id" class="select2 col-md-12">

                                <?php

                                foreach ($AllProjects as $Projects) {?>

                                <option value="<?= $Projects->id ?>"><?= $Projects->Name ?></option>

                                <?php } ?>

                            </select>

                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-success">Opslaan</button>

            </div>



            {!! Form::close() !!}

        </div>

    </div>

</div>

<div class="modal in modal-info" id="modal_default_3" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>

                <h4 class="modal-title">Personeels planning</h4>

            </div>

            {!! Form::open(['url' => 'admin/addPlanEmp', 'id' => 'employee']) !!}

            <div class="modal-body clearfix">

                <input type="hidden" name="date" value="<?php echo @$ProjectsDtl[0]->date; ?>" />

                <input type="hidden" id="plan_id" name="plan_id" />

                <input type="hidden" id="id" name="id" />

                <input type="hidden" id="project" name="project" />
                @if (Session::has('Done'))

                    <input type="hidden" name="Done" value="{{ Session::get('Done') }}" />
                @endif
                @if (Session::has('Id'))

                    <input type="hidden" name="Id" value="{{ Session::get('Id') }}" />
                @endif


                <div class="block">

                    <div class="content">

                        <div class="form-row">
                            <div class="col-md-4">Personeel selecteren:</div>
                            <div class="col-md-8">
                                <select name="employee" id="selectedEmployee" class="select2 "
                                        style="width:100%" onchange="checkEmployeeAvailibility(); return 0;">

                                    <?php

                                    foreach (@$AllEmployees as $Employee) {?>

                                    <option value="<?= $Employee->id ?>">
                                        <?= $Employee->Firstname . ' ' . $Employee->Lastname ?></option>

                                    <?php } ?>

                                </select>
                                <p style="color: red; background-color: white; font-weight: bold;"
                                   id="showErrorMsg">Werknemer is al gepland voor vandaag!</p>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-4">Functie:</div>
                            <div class="col-md-8">
                                <select name="Geschikt" id="Geschikt" class="select2 " style="width:100%">

                                    <?php
                                    $options = array ('Opruimer','Schoonmaker','Handyman','Timmerman','ZZPer');
                                    foreach ($Functie as $CWeeks) { ?>
                                    <option value="<?php echo $CWeeks->code; ?>"><?php echo $CWeeks->name; ?></option>
                                    <?php } ?>

                                </select>
                            </div>


                        </div>
                        <div class="form-row">
                            <div class="col-md-4">Status:</div>
                            <div class="col-md-8">
                                <select name="status" class="select2 " style="width:100%">
                                    <option value="1">Regie</option>
                                    <option value="2">Aangenomen</option>
                                </select>
                            </div>


                        </div>

                        <div class="form-row">
                            <div class="col-md-4">Groep:</div>
                            <div class="col-md-8">
                                <select name="group" class="select2 " style="width:100%">
                                    <option value="A" selected="selected">Groep A</option>
                                    <option value="B">Groep B</option>
                                    <option value="C">Groep C</option>
                                    <option value="D">Groep D</option>
                                    <option value="E">Groep E</option>
                                    <option value="F">Groep F</option>
                                    <option value="G">Groep G</option>
                                    <option value="H">Groep H</option>
                                    <option value="I">Groep I</option>
                                    <option value="J">Groep J</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="col-md-4">Opmerkingen:</div>

                            <div class="col-md-8">

                                <textarea class="form-control" rows="4" cols="10" name="Notes"></textarea>

                            <!--<span class="error">  {{ $errors->first('Notes', ':message') }}</span>-->

                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-success">Opslaan</button>

                </div>



                {!! Form::close() !!}

            </div>

        </div>

    </div>

</div>

<div class="modal in modal-info" id="modal_default_4" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>

                <h4 class="modal-title">Uren Toevoegen</h4>

            </div>

            {!! Form::open(['url' => 'admin/CopyPlan', 'id' => 'employee']) !!}

            <div class="modal-body clearfix">

                <input type="hidden" name="date" value="<?php echo @$ProjectsDtl[0]->date; ?>" />

                <div class="block">

                    <div class="content">

                        <div class="form-row">
                            <div class="col-md-4">Select Datum:</div>
                            <div class="col-md-8">


                                <div class="input-group">

                                    <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>

                                    <input type="text" class="datepicker form-control" placeholder="Datum"
                                           name="copy_todate" id="copy_todate" />

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default btn-clean" data-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-warning btn-clean">Opslaan</button>

            </div>



            {!! Form::close() !!}

        </div>

    </div>

</div>

</div>


@include('admin/footer')</div>


<script src="{{ URL::to('assets/js/axios.min.js') }}" charset="utf-8"></script>

<script>
    function add_new(plan_id, Project) {

        $('#plan_id').val(plan_id);
        $('#project').val(Project);
    }


    function DeleteProject() {

        if (confirm("Weet u het zeker of u deze afdeling wilt verwijderen?")) {
            return true;
        }

    }

    function EditEmp(id, pro_id, emp_id, date, status, Geschikt) {

        ///alert (emp_id);

        /*$('#modal_default_3').modal({
                show: 'true'
            });*/

        //alert (emp_id);
        $('#project').val(pro_id);

        $('#id').val(id);
        $('select#employee option:selected').val(emp_id);


        //$('#employee').val(emp_id);


        $('#Geschikt').val(Geschikt);
        if (status == 1) {
            $("#Regie").prop("checked");




            //$('radio#Regie option:selected').val(status);
        } else {
            $("#Aangenomen").prop("checked");


            //$('radio#Aangenomen option:selected').val(status);
        }
        /*	$('#modal_default_3').modal({
                show: 'true'
            });*/





        //$('#').val(date);


        //Aangenomen 2
        //Regie 1
    }

    let showErrorMsg = document.getElementById('showErrorMsg');
    let givenDate = "{{ $Date }}";
    console.log("Date: ", givenDate);
    showErrorMsg.style.display = "none";

    function checkEmployeeAvailibility() {
        showErrorMsg.style.display = "none";

        var e = document.getElementById("selectedEmployee");
        let empID = e.options[e.selectedIndex].value;
        let APP_URL = {!! json_encode(url('/') . '/') !!}
            let url = APP_URL + `admin/checkUserIsFree`;


        axios.post(url, {
            date: givenDate,
            empID: empID
        })
            .then(response => {
                console.log(response.data);
                if (response.data) {
                    showErrorMsg.style.display = "inline-block";

                } else {
                    showErrorMsg.style.display = "none";
                }

            })
            .catch(err => console.log(err))
    }
</script>
