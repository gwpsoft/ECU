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


		 /* Datatables */
    if($("table.sortable_simple").length > 0)
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});

    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null,null, null, null, null, null,null]});

    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null,null, null, null, null, null,null]});
    /* eof Datatables */


	});
        })(jQuery);

    </script>



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
  {!! Form::open(['url'=> 'admin/report/employmentagencynotes']) !!}
   <div class="block">
                    <div class="header">
                        <h2>Uitzendbureau</h2>
                    </div>
                    <div class="content">
			<div class="form-row">
        <div class="col-md-3"><input type="text" class="form-control" value="<?=$EmployeeAgency_OverView[0]->Employmentagency?>" readonly="readonly"></div>
        <div class="col-md-3"><input type="text" class="form-control" value="<?=$EmployeeAgency_OverView[0]->Weeknumber?>" readonly="readonly" name="weeknumber"></div>
        <div class="col-md-3"><input type="text" class="form-control" value="<?=$datestring?>" readonly="readonly">
        <input type="hidden" class="form-control" value="<?=$EmployeeAgency_OverView[0]->Employmentagency_Id?>" name="id" >
        </div>

         </div>
    </div>
    </div>

   <div class="block">
                    <div class="header">
                        <h2>GEWERKTE UREN</h2>

                      @if ($actualData)
                      <div style="float:right"><a href="{{ url('admin/report/employmentagencynotesduplicate/'.$EmployeeAgency_OverView[0]->duplicateDataID) }}" class="btn btn-success">Bewerken</a></div>
                      @else
                      <div style="float:right"><input type="submit" class="btn btn-success" value="Weekstaat aanmaken" name="submit"/></div>
                      @endif
                     <div style="float:right"><a href="{{ url('admin/report/employmentagencyoverview/weeknumber/'.$yearWeek) }}" class="btn btn-warning">Terug</a>&nbsp;&nbsp;&nbsp;</div>
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th width="8%">Emp ID</th>
                                     <th width="15%">Personeel</th>
                                     {{-- <th width="10%">BSN</th> --}}
                                     <th width="2%">Ma</th>
                                     <th width="2%">Di</th>
                                     <th width="2%">Wo</th>
                                     <th width="2%">Do</th>
                                     <th width="2%">Vr</th>
                                     <th width="2%">Za</th>
                                     <th width="2%">Zo</th>
                                     <th width="2%">Tot</th>
                                    <th width="25%">Notities</th>

                                </tr>
                            </thead>

                            <?php if ($EmployeeAgency_OverView){ ?>
                             <tbody>
							<?php foreach ($EmployeeAgency_OverView as $key => $Agency){ ?>
                            <tr>
                            <td>{{ $Agency->Employee_Id}}</td>
                            <td>{{ $Agency->Name}}</td>
                            {{-- <td>{{ $Agency->Sofinumber}}</td> --}}
                            <td>{{ ($Agency->Mon != 0) ? $Agency->Mon : ""}}</td>
                            <td>{{ ($Agency->Tue != 0) ? $Agency->Tue : ""}}</td>
                            <td>{{ ($Agency->Wed != 0) ? $Agency->Wed : ""}}</td>
                            <td>{{ ($Agency->Thu != 0) ? $Agency->Thu : ""}}</td>
                            <td>{{ ($Agency->Fri != 0) ? $Agency->Fri : ""}}</td>
                            <td>{{ ($Agency->Sat != 0) ? $Agency->Sat : ""}}</td>
                            <td>{{ ($Agency->Sun != 0) ? $Agency->Sun : ""}}</td>
                            <td>{{ $Agency->Hours }}</td>
                            <input type="hidden" name="newRecords[{{$key}}][Employee_Id]" value="{{ $Agency->Employee_Id}}">
                            <input type="hidden" name="newRecords[{{$key}}][Weeknumber]" value="{{ $Agency->Weeknumber}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_Id]" value="{{ $Agency->Employmentagency_Id}}">
                            <input type="hidden" name="newRecords[{{$key}}][Name]" value="{{ $Agency->Name}}">
                            <input type="hidden" name="newRecords[{{$key}}][Mon]" value="{{ $Agency->Mon}}">
                            <input type="hidden" name="newRecords[{{$key}}][Tue]" value="{{ $Agency->Tue}}">
                            <input type="hidden" name="newRecords[{{$key}}][Wed]" value="{{ $Agency->Wed}}">
                            <input type="hidden" name="newRecords[{{$key}}][Thu]" value="{{ $Agency->Thu}}">
                            <input type="hidden" name="newRecords[{{$key}}][Fri]" value="{{ $Agency->Fri}}">
                            <input type="hidden" name="newRecords[{{$key}}][Sat]" value="{{ $Agency->Sat}}">
                            <input type="hidden" name="newRecords[{{$key}}][Sun]" value="{{ $Agency->Sun}}">
                            <input type="hidden" name="newRecords[{{$key}}][Sofinumber]" value="{{ $Agency->Sofinumber}}">
                            <input type="hidden" name="newRecords[{{$key}}][Notes]" value="{{ $Agency->Notes}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagencynote]" value="{{ $Agency->Employmentagencynote}}">
                            <input type="hidden" name="newRecords[{{$key}}][Hours]" value="{{ $Agency->Hours}}">
                            <input type="hidden" name="newRecords[{{$key}}][individual_cost]" value="{{ $Agency->individual_cost}}">
                            <input type="hidden" name="newRecords[{{$key}}][Cost]" value="{{ $Agency->Cost}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency]" value="{{ $Agency->Employmentagency}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_address]" value="{{ $Agency->Employmentagency_address}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_zipcode]" value="{{ $Agency->Employmentagency_zipcode}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_city]" value="{{ $Agency->Employmentagency_city}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_fax]" value="{{ $Agency->Employmentagency_fax}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_fone]" value="{{ $Agency->Employmentagency_fone}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_mobile]" value="{{ $Agency->Employmentagency_mobile}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_email]" value="{{ $Agency->Employmentagency_email}}">
                            <input type="hidden" name="newRecords[{{$key}}][Employmentagency_contact]" value="{{ $Agency->Employmentagency_contact}}">
                            <input type="hidden" name="newRecords[{{$key}}][Project]" value="{{ $Agency->Project}}">
                            <input type="hidden" name="newRecords[{{$key}}][Project_Id]" value="{{ $Agency->Project_Id}}">

                            <td><input type="text" class="form-control" readonly value="<?=$Agency->Employmentagencynote?>" name="Notes[<?=$Agency->Employee_Id?>]"></td>

                             </tr>
                            <?php } ?>
                            </tbody>
                            <?php } ?>
                            </table>




                    </div>
                </div>

    {!! Form::close() !!}
            </div>
  </div>
       @include('admin/footer')</div>
