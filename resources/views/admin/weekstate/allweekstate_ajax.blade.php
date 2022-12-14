<!-- Header -->



@include('admin/header')



<style>

.dataTables_length  { width:170px !important;}

.dataTables_length select { width:70px !important;}

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


fieldset {
    width: 125px;
}
.item {
    display: block;
    width: 50px;
}
label {
    display: inline;
}
input[type=checkbox] {
    display: inline;
}



</style>

<script type='text/javascript' src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

<!--<script>

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





/* Datatables */

if($("table.sortable_simple").length > 0)

$("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});



if($("table.sortable_default").length > 0)

$("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null, null, null]});



if($("table.sortable").length > 0)

$("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null, null, null]});

/* eof Datatables */



});

})(jQuery);



</script>-->

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



<title>Lijst van de weekstaten</title>

<div class="row">

  <div class="col-md-12">

    <ol class="breadcrumb">

      <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>

      <li class="active">Lijst van de weekstaten</li>

    </ol>

  </div>

</div>



@include('admin/sidebar')

<div class="row">
  <div class="col-md-12">

    @if (Session::has('message'))

      <div class="alert alert-success">

        <b>Success!</b> {{Session::get('message')}}

        <button type="button" class="close" data-dismiss="alert">×</button>

      </div>

    @endif

    <div class="block">

      <div class="header">

        <h2>Lijst van de weekstaten</h2>

        <div style="float:right">

          <!--    <a href=" <?php echo URL:: to( 'admin/Active/Weekcards' ); ?> " class="btn btn-success">Actief</a>

          <a href=" <?php echo URL:: to( 'admin/Inactive/Weekcards' ); ?> " class="btn btn-danger">Inactief</a>

          <a href=" <?php echo URL:: to( 'admin/weekcard' ); ?> " class="btn btn-warning">Alle WeekStaat</a>-->

          <!-- <a href=" <?php echo URL:: to( 'admin/Add-New-weekstaat' ); ?> " class="btn btn-success">+ Nieuw WeekStaat</a> -->



        </div>

      </div>


      <div class="content">
        <div class="col-md-5">

          <!--
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

          -->


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
              <img class=" " src="{{ URL::asset('assets/img/icons/search.png') }}" id="search" name="search" style=" cursor:pointer">
              <input type="checkbox" id="open" style="display:inline" align="left">
            </div>
           <div class="col-md-1">
             <span class="text-center">Alleen open weekstaten </span>
           </div>
           <!--div class="col-md-1">
             <div style="display:inline">Alleen open weekstaten </div>
           </div-->

            <div style="float:right">

              {{-- <button type="button" onclick="pdfOutput()" class="btn btn-warning">Rapport</button> --}}
              {{-- <button type="button" class="btn btn-warning">Rapport</button> --}}

              <!--a href="<?php echo URL:: to( 'admin/openweekcard' ); ?>" class="btn btn-danger">Open</button-->
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myRapport" onclick="initialReportModelState()">Rapport</button>
              <a href=" <?php echo URL:: to( 'admin/Add-New-weekstaat' ); ?> " class="btn btn-success">+ Nieuw WeekStaat</a>
            </div>

          </div> <!-- .content ENDs -->

        </div><!-- .block ENDs -->

      </div><!-- .col-md-12 ENDs -->
    </div> <!-- .row ENDs -->



<!-- Rapport model starts -->
<div class="modal  modal-info" id="myRapport" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin: 0 auto; width: 60%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center" style="font-size: 24px;">Rapport</h2>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-1">
            <label for="">
              <input type="radio" name="weekStateType" value="singleWeek" id="singleWeek" checked="checked" onclick="showSingle()"> Alle weekstaten
            </label>

          </div>
          <div class="col-sm-4">

            <label for="">
              <input type="radio" name="weekStateType" value="multipleWeeks" id="multipleWeeks" onclick="showMultiple()"> Open weekstaten
            </label>

          </div>
        </div>

        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">

            <div id="singleWeekDIV">
                <div class="form-group">
                  <div class="col-sm-2">
                    {!! Form::selectYear('singleReportYear', date('Y') , date('Y') - 10, '', ['id' => 'singleReportYear']) !!}
                  </div>
                  <div class="col-sm-4">
                    <input type="number" id="singleWeekValue" class="form-control" placeholder="Voer het weeknummer in">
                    <br>
                    <p id="singleErrorMessage" style="color: red; background: white; font-weight: bold;"></p>

                  </div>
                  <div class="col-sm-2">
                    <button type="button" name="button" class="btn btn-success" onclick="getSingleWeekReport()">Rapport</button>
                  </div>
                </div>
              </div> {{-- singleWeekDIV --}}


              <div id="multipleWeeksDIV">
                <div class="form-group">
                  <div class="col-sm-2">
                    <div class="form-group">
                      {!! Form::selectYear('multiReportYear', date('Y') , date('Y') - 10, '', ['id' => 'multiReportYear']) !!}
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="number" class="form-control" placeholder="Week van" id="reportFromDate">
                      <br>
                      <p id="multiErrorMessage" style="color: red; background: white; font-weight: bold;"></p>
                      {{-- <p id="multiErrorMessage" style="color: red;">Eror</p> --}}
                      <br>
                      <div class="row">
                        <div class="col-sm-6">
                          <input type="radio" name="reportType" value="week" id="weekWiseReport" class="reportType" checked="checked"> Per Week
                        </div>
                        <div class="col-sm-6">
                          <input type="radio" name="reportType" id="projectWiseReport" class="reportType" value="project"> Per Project
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="number" class="form-control" placeholder="Week tot" id="reportToDate">
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <button type="button" name="button" class="btn btn-success" onclick="getMultpleWeeksReport()">Rapport</button>
                    </div>
                  </div>
                </div>
              </div> {{-- multipleWeeksDIV --}}

          </div>
        </div> <!-- row ENDs -->



      </div> <!-- .model-body ENDs -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="closeReportModel()">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Rapport model ends -->


<div class="row">
  <div class="col-md-12">
    <div class="block">
      <div class="content">


        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="Weekcards">

          <thead>

            <tr>

              <th width="5%">ID.</th>

              <th width="8%">Week No.</th>

              <th width="18%">Project</th>

              <th width="10%">Verz. datum</th>

              <th width="10%">Ontv. datum</th>

              <th width="10%">Factuurdatum</th>

              <th width="10%">Status</th>

              <th width="10%">Afgehandeld</th>

              <th width="10%">Opties</th>

            </tr>

          </thead>

          <tbody>



          </tbody>

        </table>

      </div> <!-- .content ENDs -->
    </div><!-- .block ENDs -->
  </div><!-- .col-md-12 ENDs -->
</div><!-- .row ENDs -->





  <!-- Trigger the modal with a button -->
  {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#viewWeekStat">Open Modal</button> --}}

  <!-- Modal -->
  <div class="modal  modal-info" id="viewWeekStat" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" onclick="closeButton()">&times;</button>
          <h2 class="modal-title text-center" style="font-size: 24px;">Weekstaat gegevens</h2>
        </div>
        <div class="modal-body">

          <div class="block">
            <div class="header">
              <h4 style="margin-top: 12px; display: inline-block;" >Gewerkte uren</h4>
              <span class="text-center" id="waitingMsg" style="margin-top: 12px;">Gegevens opvragen ...</span>
            </div>

            <div class="content">
              <div class="form-row">

                <table class="table table-bordered sort" style="margin-top:15px;" id="topTable">

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

                  <tbody id="topTableBody">

                  </tbody>

                </table>

              </div>{{-- .form-row ends --}}
            </div>{{-- .content ends --}}

          </div>{{-- .block ends --}}

            <div class="col-md-12">

                <div class="col-md-6">
                  <div class="block">

                    <div class="header">
                      <h2>Weekstaat</h2>
                    </div>{{-- .header ends --}}

                    <div class="content controls">

                      <div class="form-row">
                        <div class="col-md-4">Week nr:</div>
                        <div class="col-md-3">
                          <input type="text" value="" disabled="disabled" id="weekNrYear">
                        </div>
                        <div class="col-md-3">
                          <input type="text" value="" disabled="disabled" id="weekNrDate">
                        </div>
                      </div>{{-- .form-row ends --}}

                      <div class="form-row">
                        <div class="col-md-4">Project:</div>
                        <div class="col-md-7">
                          <input type="text" value="" disabled="disabled" id="projectName">
                        </div>
                      </div>{{-- .form-row ends --}}

                      <div class="form-row">
                        <div class="col-md-4">Verz. datum:</div>
                        <div class="col-md-7">
                          <div class="input-group">
                            <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                            <input type="text" value="" disabled="disabled" id="sendDate">
                          </div>{{-- .input-group ENDs --}}
                        </div>
                      </div>{{-- .form-row ends --}}

                      <div class="form-row">
                        <div class="col-md-4">Ontv. datum:</div>
                        <div class="col-md-7">
                          <div class="input-group">
                            <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
                            <input type="text" value="" disabled="disabled" id="receivedDate">
                          </div>{{-- .input-group ENDs --}}
                        </div>
                      </div>{{-- .form-row ends --}}

                    <div class="form-row">
                        <div class="col-md-4">Goedgekeurd:</div>
                        <div class="col-md-7">
                          <div class="input-group" id="openCheck">

                          </div>{{-- .input-group ENDs --}}
                        </div>
                      </div>{{-- .form-row ends --}}


                    </div>{{-- .content controls ends --}}
                  </div>{{-- .block ends --}}

                  <div class="block">
                    <div class="header">
                      <h2>Extra gegevens</h2>
                    </div>{{-- .header ends --}}

                    <div class="content controls">
                      <div class="form-row">
                        <div class="col-md-4">Afspraken:</div>
                        <div class="col-md-7">
                          {{-- <input type="text" class="form-control" id="middleDivRightKlant" readonly="readonly" > --}}
                          <textarea name="notes" rows="5" class="form-control" disabled="disabled" id="lastNotes"></textarea>
                        </div>
                      </div><!-- .form-row ENDs -->
                    </div><!-- .content controls ENDs -->


                  </div>{{-- .block ends --}}

                </div>{{-- .col-md-6 ends --}}


                <div class="col-md-6">

                  <div class="block">
                    <div class="header">
                      <h2>Project gegevens</h2>
                    </div>{{-- .header ends --}}

                    <div class="content controls">
                      <div class="form-row">
                        <div class="col-md-4">Klant:</div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" id="middleDivRightKlant" readonly="readonly" >
                        </div>
                      </div><!-- .form-row ENDs -->

                      <div class="form-row">
                        <div class="col-md-4">Afdeling:</div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" id="middleDivRightAfdeling" readonly="readonly" >
                        </div>
                      </div><!-- .form-row ENDs -->

                      <div class="form-row">
                        <div class="col-md-4">Project:</div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" id="middleDivRightProject" readonly="readonly" >
                        </div>
                      </div><!-- .form-row ENDs -->

                      <div class="form-row">
                        <div class="col-md-4">Uitvoerder:</div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" id="middleDivRightUitvoerder" readonly="readonly" >
                        </div>
                      </div><!-- .form-row ENDs -->

                      <div class="form-row">
                        <div class="col-md-4">Afspraken:</div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" id="middleDivRightAfspraken" readonly="readonly" >
                        </div>
                      </div><!-- .form-row ENDs -->

                      <div class="form-row">
                        <div class="col-md-4">Goedkeuring:</div>
                        <div class="col-md-7">
                          <input type="text" class="form-control" id="middleDivRightGoedkeuring" readonly="readonly" >
                        </div>
                      </div><!-- .form-row ENDs -->

                    </div><!-- .content controls ENDs -->


                  </div>{{-- .block ends --}}

                </div>{{-- .col-md-6 ends --}}


              </div>{{-- .col-md-12 ends --}}

        </div>{{-- .modal-body ends --}}
        <div class="modal-footer" style="border-top-color: transparent;">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="closeButton()">Close</button>
        </div>{{-- .modal-footer ends --}}
      </div>

    </div>
  </div>{{-- .modal ends --}}




<script src="{{ asset('public/assets/js/axios.min.js') }}"></script>


<script>



function ProjectDisapprove()   {

  var msg = confirm("Weet je zeker dat het Weekcard goedkeuren?");

  if (msg == true){
    return true;

  } else {
    return false;
  }

}



function ProjectApprove()   {

  var msg = confirm("Weet je zeker dat het Weekcard goedkeuren?");

  if (msg ==true) {

    return true;

  } else {
    return false;
  }

}







function deleteRecord()      {

  var msg = confirm("Bent u zeker dat u dit wilt Weekstaat?");

  if (msg == true) {
    return true;

  } else {

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

  $(document).ready(function() { /* Do stuff */

    var year = $("#weeknumbery option:selected").val();
    var week = $("#weeknumberw option:selected").val();
    window.$vars = {
        yearWeekValue: year + week
    };

    oTable = $('#Weekcards').DataTable({

      "processing": true,

      "serverSide": true,

      "ajax": "{{ route('datatable.Weekcards') }}",
      "order": [[ 0, "desc" ]],
      "columns": [

        {data: 'id', name: 'id'},

        {data: 'Weeknumber', name: 'Weeknumber'},

        {data: 'Project_Name', name: 'Project_Name'},

        {data: 'Sent_Date', name: 'Sent_Date'},

        {data: 'Received_Date', name: 'Received_Date'},

        {data: 'Billing_Date', name: 'Billing_Date'},

        {data: 'name', name: 'name'},

        {data: 'Checked', name: 'Checked'},

        //{data: 'Sent_Date', name: 'Sent_Date'},

        {data: 'Opties', name: 'Opties', searchable: false,orderable: false}

      ]

    });


    $( "#search" ).click(function() {

        table = $('#Weekcards').DataTable().destroy();

        var year = $("#weeknumbery option:selected").val();
        var week = $("#weeknumberw option:selected").val();
        var value = '/'+ year + week;

         if ($('#open').attr('checked'))
         {
           value=value+'open';
           //alert(value);
         }
        window.$vars = {
            yearWeekValue: year + week
        };


        oTable = $('#Weekcards').DataTable({

          "processing": true,
          "pageLength": 100,
          "serverSide": true,

          "ajax": "{{ url('datatable/WeekcardsByWeek') }}" + value,
          "type": "get",
          "data": { week: value},
          "order": [[ 0, "desc" ]],
          "columns": [

            {data: 'id', name: 'id'},

            {data: 'Weeknumber', name: 'Weeknumber'},

            {data: 'Project_Name', name: 'Project_Name'},

            {data: 'Sent_Date', name: 'Sent_Date'},

            {data: 'Received_Date', name: 'Received_Date'},

            {data: 'Billing_Date', name: 'Billing_Date'},

            {data: 'name', name: 'name'},

            {data: 'Checked', name: 'Checked'},

            //{data: 'Sent_Date', name: 'Sent_Date'},

            {data: 'Opties', name: 'Opties', searchable: false,orderable: false}

          ]

        });



      });

  });


})(jQuery);


// initialReportModelState();

function pdfOutput() {

  var yearWeekValue = window.$vars.yearWeekValue;
  var url = `{{ url('admin/weekCardWeeklyReportPDF') }}/${yearWeekValue}`;
  window.location.href = url;
}



</script>



<script src="{{ asset('public/assets/js/view-weekState-report-model.js') }}"></script>
<script src="{{ asset('public/assets/js/view-weekState.js') }}"></script>





@include('admin/footer')</div>
