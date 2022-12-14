<!-- Header -->
  @include('admin/header')
<script>
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
      var value = year + week;
      if ($('#open').attr('checked'))
      {
        value=value+'open';
        // alert(value);
      }
      document.location.href="<?=URL:: to( 'admin' )?>/report/employmentagencyoverview/weeknumber/" + value;
			 // document.location.href="<?//=URL:: to( 'admin' )?>/report/employmentagencyoverview/weeknumber/" + year + week;
	});


		 /* Datatables */



    //
    // if($("table.sortable_simple").length > 0)
    //     $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});
    //
    // if($("table.sortable_default").length > 0)
    //     $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null,null]});
    //
    // if($("table.sortable").length > 0)
    //     $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null,null]});
    /* eof Datatables */


	});
        })(jQuery);

    </script>



   <?php use App\reports;
   $Report_model = new reports();
   $segment5 = Request::segment( 5 );

  if (!empty($segment5)){
   $CurrentYear = ($segment5[0].$segment5[1].$segment5[2].$segment5[3]);
   @$Currentweek = ($segment5[4].$segment5[5]);
  }

  else {
	 $CurrentYear = ($yearWeek[0].$yearWeek[1].$yearWeek[2].$yearWeek[3]);
   @$Currentweek = ($yearWeek[4].$yearWeek[5]);

	 }
   ?>
    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
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
input[type=checkbox] {
    display: inline;
}
</style>





 <title>Report</title>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin' ); ?>">huis</a></li>
                    <li class="active">Report</li>
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

        echo '<a href="' . URL:: to( 'admin' ) . '/report/employmentagencyoverview' . '/weeknumber/' . $weeknumber . '"><span class="weeknr_' . $class . '" id="year">' . $weeknumber . '</span></a>';
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

<!-- Adding all open check box START -->
<div class="col-md-1">
  <input type="checkbox" id="open" style="display:inline" align="left">
  <span class="text-center">Alleen open weekstaten </span>
</div>
<!-- All Open checkbox END-->

<div style="float:right">
  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myRapport" onclick="initialReportModelState()">Rapport</button>
</div>
                    </div>
                </div>



   <div class="block">
                    <div class="header">
                        <h2>Uitzendbureau Overzicht</h2>
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable" id="myTable2">
                            <thead>
                                <tr>
                                    <th width="20%">Uitzendbureau</th>
                                    <th width="10%">Gewerkte uren</th>
                                    <th width="10%">Kosten</th>
                                    <th width="10%">Verz. datum</th>
                                    <th width="10%">Ontv. datum</th>
                                    <th width="10%">Factuurdatum</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Afgehandeld</th>
                                    <th width="10%">Opties</th>
                                </tr>
                            </thead>
                            <?php if ($EmployeeAgency_OverView){
							/*echo '<pre>';
							print_r($EmployeeAgency_OverView);
							die;*/
							 ?>
                             <tbody>
							<?php foreach ($EmployeeAgency_OverView as $Agency){ ?>
        <tr>
         <td>{{ @$Agency->Employmentagency }}</td>
          <td  class="text-right">{{ @$Agency->hours }} </td>
            <td>
              @if ($Agency->records > 0)
                € {{ $Agency->total_cost }}
              @else

              @endif
          </td>
             <td>
               @if ($Agency->records > 0)
                 {{ ($Agency->Sent_Date != "0000-00-00") ? $Agency->Sent_Date : "" }}
               @endif
             </td>
             <td>
               @if ($Agency->records > 0)
                {{ ($Agency->Received_Date != "0000-00-00") ? $Agency->Received_Date : "" }}
               @endif
             </td>
            <td>
              @if ($Agency->records > 0)
                {{ ($Agency->Billing_Date != "0000-00-00") ? $Agency->Billing_Date : "" }}
              @endif
            </td>
            <td>
              @if ($Agency->records > 0)
                {{ $Agency->status_name }}
              @endif
            </td>
            <td>
              @if ($Agency->records > 0)
                @if ($Agency->Checked)
                  <span class="label label-success">Afgehandeld</span>
                @else
                  <span class="label label-danger">Open</span>
                @endif
              @endif
            </td>
            <td>
                <a href="<?=URL:: to( 'admin' ) . '/report/employmentagencynotes/id/'. $Agency->Employmentagency_Id.'/weeknumber/'.$yearWeek?>">
                  <img class=" " src="{{ URL::asset('assets/img/icons/search.png') }}" id="search" style="height: 20px; width: 20px;">
                </a>
                @if ($Agency->records > 0)
                <a href="{{ url('admin/report/employmentagencynotesduplicate/'.$Agency->duplicateDataID) }}">
                  <img class=" " src="{{ URL::asset('assets/img/icons/Note.png') }}" style="height: 20px; width: 20px;">
                </a>
                <a href="{{ url('admin/report/employmentagency_pdf/'.$Agency->duplicateDataID) }}">
                  <img class=" " src="{{ URL::asset('assets/img/icons/pdf_n4.png') }}" id="pdf" style=" cursor:pointer; width:20px; height:20px;">
                </a>
                <a href="{{ url('admin/report/employmentagency_Email/'.$Agency->duplicateDataID) }}">
                  <img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer; height: 20px; width: 20px;">
                </a>
              {{-- <a href="{{ url('admin/report/employmentagency_Email/'.$Agency->duplicateDataID) }}">
                <img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer">
              </a> --}}
              @endif
            </td>

       </tr>
                                <?php } ?>
                            </tbody>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            </div>
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
                          <input type="radio" name="reportType" id="projectWiseReport" class="reportType" value="project"> Per Uitzendbureau
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
  </div>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script type="text/javascript">

          $('#myTable2').DataTable({
                // destroy: true,
                // paging: false,
                // searching: false
            });

  </script>


       @include('admin/footer')
       <script type="text/javascript">
           var pathname = window.location.pathname;

           if (pathname.includes('open')) {
             $('#open').attr('checked',true);
           }

       </script>
       <script type="text/javascript">
         let singleFileURL =" {{ url('admin/empAgencyWeeklyReportPDF/') }}";
         let WeekMultiReports =" {{ url('admin/empAgencyWWMultipleWeeksReportPDF/') }}";
         let ProjectMultiReports =" {{ url('admin/empAgencyPWMultipleWeeksReport/') }}";
       </script>
       <script src="{{ asset('public/assets/js/view-Agency-report-model.js') }}"></script>
       <script src="{{ asset('public/assets/js/view-empAgency.js') }}"></script>


     </div>
