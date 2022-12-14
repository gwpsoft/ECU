<!-- Header -->
@include('admin/header')

<title>Report Records</title>

<div class="row">
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="<?php echo URL:: to( 'admin' ); ?>">huis</a></li>
      <li class="active">Rapportgegevens</li>
    </ol>
  </div>
</div>

@include('admin/sidebar')

<div class="col-md-12">
  @if (Session::has('message'))
    <div class="alert alert-success">
      <b>Success!</b> {{Session::get('message')}}
      <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
  @endif
</div>

<div class="block">
  <div class="header">
    <h2>Uitzendbureau</h2>
  </div>

  <div class="content">
    <div class="form-row">

      <div class="col-md-3"><input type="text" class="form-control" value="{{ $record->Employmentagency }}" readonly="readonly"></div>
      <div class="col-md-3"><input type="text" class="form-control" value="{{ $record->Weeknumber }}" readonly="readonly" name="weeknumber"></div>
      <div class="col-md-3"><input type="text" class="form-control" value="{{ $datestring }}" readonly="readonly">
        <input type="hidden" class="form-control" value="{{ $record->Employmentagency_Id }}" name="id" >
      </div>

    </div> <!-- form-row ends -->
  </div> <!-- content class ends -->
</div> <!-- block class ends -->

<div class="block">
  <div class="header">
    <h2>GEWERKTE UREN</h2>

    {{-- <div style="float:right"><input type="submit" class="btn btn-success" value="Opslaan" name="submit"/></div> --}}
    <div style="float:right">
      <a href="#" data-toggle="modal" data-target="#addEmployeeModal" title="Download PDF">
        <img class=" " src="{{ URL::asset('assets/img/icons/add_n.png') }}" id="pdf" style=" cursor:pointer">
      </a> |
      <a href="{{ url('admin/report/employmentagency_pdf/'.$recordID) }}" title="Download PDF">
        <img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer">
      </a> |
      <a href="{{ url('admin/report/employmentagency_Email/'.$recordID) }}" title="E-mailen" >
        <img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer">
      </a> |
      <a href="{{ url('admin/report/employmentagencyoverview/weeknumber/'.$record->Weeknumber) }}" class="btn btn-warning">Terug
      </a>
      &nbsp;&nbsp;&nbsp;
    </div>
  </div><!-- header class ends -->

  <div class="content">
    <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="5%">Emp ID</th>
          <th width="13%">Personeel</th>
          {{-- <th width="8%">BSN</th> --}}
          <th width="6%">Ma</th>
          <th width="6%">Di</th>
          <th width="6%">Wo</th>
          <th width="6%">Do</th>
          <th width="6%">Vr</th>
          <th width="6%">Za</th>
          <th width="6%">Zo</th>
          <th width="4%">Tot</th>
          <th width="7%">Kost</th>
          <th width="23%">Notities</th>
          <th width="4%"></th>
        </tr>
      </thead>
      <tbody>
        @if ($record->employmentAgencyWeeklyReportDetails)
          @foreach ($record->employmentAgencyWeeklyReportDetails as $key => $record)
            <tr id="row{{ $record->id }}" onkeyup="changeBackgroundColor({{ $record->id }})">
              <td>{{ $record->Employee_Id}}</td>
              <td>{{ $record->Name}}</td>
              {{-- <td>{{ $record->bsn}}</td> --}}
              <td><input type="text" id="Mon{{ $record->id }}" style="<?php echo $record->Mon != 0 ? "background-color: #59AD2F":"" ?>" class="form-control" value="{{ ($record->Mon != 0) ? number_format($record->Mon, 2) : "" }}"></td>
              <td><input type="text" id="Tue{{ $record->id }}" style="<?php echo $record->Tue != 0 ? "background-color: #59AD2F":"" ?>" class="form-control" value="{{ ($record->Tue != 0) ? number_format($record->Tue, 2) : "" }}"></td>
              <td><input type="text" id="Wed{{ $record->id }}" style="<?php echo $record->Wed != 0 ? "background-color: #59AD2F":"" ?>" class="form-control" value="{{ ($record->Wed != 0) ? number_format($record->Wed, 2) : "" }}"></td>
              <td><input type="text" id="Thu{{ $record->id }}" style="<?php echo $record->Thu != 0 ? "background-color: #59AD2F":"" ?>" class="form-control" value="{{ ($record->Thu != 0) ? number_format($record->Thu, 2) : "" }}"></td>
              <td><input type="text" id="Fri{{ $record->id }}" style="<?php echo $record->Fri != 0 ? "background-color: #59AD2F":"" ?>" class="form-control" value="{{ ($record->Fri != 0) ? number_format($record->Fri, 2) : "" }}"></td>
              <td><input type="text" id="Sat{{ $record->id }}" style="<?php echo $record->Sat != 0 ? "background-color: #59AD2F":"" ?>" class="form-control" value="{{ ($record->Sat != 0) ? number_format($record->Sat, 2) : "" }}"></td>
              <td><input type="text" id="Sun{{ $record->id }}" style="<?php echo $record->Sun != 0 ? "background-color: #59AD2F":"" ?>" class="form-control" value="{{ ($record->Sun != 0) ? number_format($record->Sun, 2) : "" }}"></td>
              <td><p id="Hours{{ $record->id }}">{{ number_format($record->Hours, 2) }}</p></td>
              <td><input type="text" id="individual_cost{{ $record->id }}" class="form-control" value="{{ ($record->individual_cost != 0) ? number_format($record->individual_cost, 2) : "" }}"></td>
              <td><input type="text" id="Employmentagencynote{{ $record->id }}" class="form-control" value="{{ $record->Employmentagencynote }}"></td>
              <td>
                <a href="#" onclick="recordUpdate({{ $record->id }}); return false;"><span class="icon-save"></span></a>
                <a href="{{ url('admin/deleteEmploymentAgencySingleRecord/'.$record->id) }}" onclick="return confirm('Weet je zeker dat je deze record wilt verwijderen ?')"><span class="icon-remove-sign"></span></a>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>

    </table>
    <br>
    <div class="row text-center">
      <h3 style="display: inline-block;">Uren in totaal:
        <strong>
          <span id="regieHoureID">{{ $hours }}</span>
        </strong>
      </h3>
      <h3 style="display: inline-block;">___ Totaal prijs:
        <strong><span id="aangenomenID">{{ $cost }}</span></strong>
      </h3>
    </div>
  </div><!-- content class ends -->

</div><!-- block class ends -->




<div class="row">
  <div class="col-md-6">
    <div class="block">
      <div class="header">
        <h2>WEEKSTAAT</h2>
      </div><!-- .header class ends -->

      <div class="content">


        {{-- FORM MUST Starts HERE --}}
        <form class="" action="{{ url('admin/employmentagencyrecordsupdate/'.$recordID) }}" method="post">
          {{ csrf_field() }}


        <div class="form-row">
          <div class="col-md-4">Verz. datum:</div>
          <div class="col-md-7">
            <div class="input-group">
              <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
              <input type="text" class="datepicker form-control"  name="Sent_Date" value="{{ strtotime($Sent_Date) > 0 ? $Sent_Date: '' }}">
              <input type="hidden" name="weeknumber" value="{{ $weeknumber }}">
            </div>
          </div>
        </div><!-- form-row class ends -->

        <div class="form-row">
          <div class="col-md-4">Ontv. datum:</div>
          <div class="col-md-7">
            <div class="input-group">
              <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
              <input type="text" class="datepicker form-control" name="Received_Date" value="{{ strtotime($Received_Date) > 0 ? $Received_Date: '' }}">
            </div>
          </div>
        </div><!-- form-row class ends -->

        <div class="form-row">
          <div class="col-md-4">Factuurdatum:</div>
          <div class="col-md-7">
            <div class="input-group">
              <div class="input-group-addon"><span class="icon-calendar-empty"></span></div>
              <input type="text" class="datepicker form-control"  name="Billing_Date" value="{{ strtotime($Billing_Date) > 0 ? $Billing_Date: '' }}">
            </div>
          </div>
        </div><!-- form-row class ends -->

        <div class="form-row">
              <div class="col-md-4">Factuurnr:</div>
              <div class="col-md-7">
                <input type="text" class=" form-control"  name="Billing_no" value="{{ $Billing_no }}">
              </div>
          </div><!-- form-row class ends -->

          <div class="form-row">

              <div class="col-md-4">Status:</div>
              <div class="col-md-7">
                  <select class="select2" style="width: 100%; color:#000 !important;" tabindex="-1" name="status_id" id="status_id" >

                  <option value="">Kies een status</option>
                  @foreach($AllStatus as $status)
                  <option value="{{$status->id}}">{{$status->name}}</option>
                  @endforeach
                 </select>

                </div>

          </div>


        <div class="form-row">

          <div class="col-md-4">Afgehandeld:</div>

          <div class="col-md-2">
            <div class="input-group">
              <div class="checkbox-inline">
                <input type="checkbox" name="Checked" id="Billable" value="1" <?php if ($Checked == 1) { ?> value="1"  checked <?php } else {  ?> value="0" <?php }?>>
              </div>
            </div>
          </div>


          <!-- <div class="col-md-3">Via Werkbrifeje:</div>
          <div class="col-md-1">
            <div class="input-group">
              <div class="checkbox-inline">
                <input type="checkbox" name="Werkbrifje" value="1" id="via_checked" <?php if ($Werkbrifje == 1) { ?> value="1"  checked <?php } else {  ?> value="0" <?php }?>>
              </div>
            </div>
          </div> -->

        </div>


      </div><!-- .content class ends -->
    </div><!-- block class ends -->

  </div><!-- col-md-6 class ens -->

  <div class="col-md-6">
    <div class="block">
      <div class="header">
        <h2>EXTRA GEGEVENS</h2>
      </div><!-- .header class ends -->

      <div class="content">

        <div class="form-row">
           <div class="col-md-4">Opmerkingen:</div>
           <div class="col-md-7">
           <textarea class="form-control" rows="5" name="Notes">{{ $Notes }}</textarea>
           </div>
       </div>

       <div class="form-row">
          <div class="col-md-4">Interne Notities:</div>
          <div class="col-md-7">
          <textarea class="form-control" rows="5" name="Internal_Notes">{{ $Internal_Notes }}</textarea>
          </div>
      </div>

      </div><!-- .content class ends -->
    </div><!-- block class ends -->

  </div><!-- col-md-6 class ens -->
</div><!-- row class ens -->



<div class="block">
  <div class="header">
    <a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right;">Document Uploaden</a>
    <h2>Upload documenten</h2>
  </div><!-- header class ends -->

  <div class="content">
    <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Notitie</th>
          <th>Datum en Tijd</th>
          <th>Downloaden</th>
          <th>Opties</th>
        </tr>
      </thead>
      <tbody>
        @if ($files)
          @foreach ($files as $key => $file)
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
                <a href="{{ url('admin/employementAgencyReport/deleteWeekstaatDocument/'.$file->id) }}" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div><!-- content class ends -->
</div> <!-- block class ends -->

{{-- FORM MUST END HERE --}}

<center>
  <div class="content controls">
  <div class="form-row">

     <div class="col-md-3" align="center" >
      <a href="{{ url('admin/report/employmentagencyoverview/weeknumber/'.$weeknumber) }}" class="btn btn-primary" style="width:100%">Annuleren</a>

      </div>



      <div class="col-md-3" align="center">

      {!! Form::submit('Opslaan', ['class' => 'btn btn-success','name' => 'Save']) !!}

      </div>



      <div class="col-md-3" align="center">

      {!! Form::submit('Opslaan & Afsluiten', ['class' => 'btn btn-success','name' => 'Save_Close']) !!}

      </div>

      <div class="col-md-3" align="center">

      <a href="{{ url('admin/deleteEmploymentAgencyRecord/'.$recordID) }}" class="btn btn-danger" style="width: 280px;" onclick="return confirm('Weet je zeker dat je deze record wilt verwijderen ?')">Verwijder</a>

      </div>

       {{-- <div class="col-md-3" align="center">

      {!! Form::submit('Opslaan & Nieuw', ['class' => 'btn btn-success','name' => 'Save_New']) !!}

      </div> --}}



  </div>

  </div>

</center>

</form>

<br>

{{-- Modal to add new employee, code starts below --}}

<!-- Modal -->
<div class="modal modal-info" id="addEmployeeModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" style="width: 100%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{{ $Employmentagency }}</h4>
      </div>
      <div class="modal-body clearfix">
        <div class="block">

            <input type="hidden" name="employment_agency_weekly_report_id" id="employment_agency_weekly_report_id" value="{{ $recordID }}">
            <input type="hidden" name="bsn" id="bsn">
            <div class="content">

              <div class="form-row">

                <table class="table table-bordered sort">
                  <thead>
                    <tr>
                      {{-- <th width="5%">Emp ID</th> --}}
                      <th width="20%">Personeel</th>
                      {{-- <th width="8%">BSN</th> --}}
                      <th width="6%">Ma</th>
                      <th width="6%">Di</th>
                      <th width="6%">Wo</th>
                      <th width="6%">Do</th>
                      <th width="6%">Vr</th>
                      <th width="6%">Za</th>
                      <th width="6%">Zo</th>
                      {{-- <th width="4%">+</th> --}}
                      <th width="7%">Kost</th>
                      <th width="23%">Notities</th>

                    </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td>
                      <select class="select2" name="employeeID" style="width: 100%;" onchange="addNewEmployee()" id="addEmployeeID">
                        <option value="" selected disabled>Selecteer medewerker</option>
                        @foreach ($AllEmployees as $key => $employee)
                          <option value="{{ $employee->id }}">{{ $employee->Firstname }} {{ $employee->Lastname }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td width="6%"><input type="text" class="" name="Mon" id="addMon"</td>
                    <td width="6%"><input type="text" class="" name="Tue" id="addTue"></td>
                    <td width="6%"><input type="text" class="" name="Wed" id="addWed"></td>
                    <td width="6%"><input type="text" class="" name="Thu" id="addThu"></td>
                    <td width="6%"><input type="text" class="" name="Fri" id="addFri"></td>
                    <td width="6%"><input type="text" class="" name="Sat" id="addSat"></td>
                    <td width="6%"><input type="text" class="" name="Sun" id="addSun"></td>
                    <td width="%"><input type="text" class="" name="individual_cost" id="addIndividual_cost"></td>
                    <td width="23%"><input type="text" class="" name="Employmentagencynote" id="addEmploymentagencynote"></td>
                    <td id="buttoncol">
                      <a class="btn btn-success sub_btn" style="display:none;" id="addEmployeeButton" onclick="addNewEmployeeRecord();return false;"><span class="icon-plus-sign"></span></a>
                    </td>
                  </tr>
                </tbody>
              </table>

              </div>

            </div>


        </div>
      </div>
    </div>

  </div>
</div>


{{-- Modal to add new employee, code ends here --}}

{{-- Model to upload files starts below --}}

<div class="modal  modal-info" id="uploadFile"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Document Uploaden</h4>
      </div>

      {{-- <form method="post" action="{{ url('admin/employementAgencyReport/uploadWeekstaatDocument') }}"  enctype="multipart/form-data"> --}}
      <form method="post" action="{{ url('admin/employementAgencyReport/uploadWeekstaatDocument/') }}"  enctype="multipart/form-data">

        <div class="modal-body clearfix">
          <div class="block">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
            <input type="hidden" name="record_id" value="{{$recordID}}" />
            {{-- <input type="hidden" name="weeknumber" value="{{$record->Weeknumber}}" />
            <input type="hidden" name="Employmentagency_Id" value="{{$record->Employmentagency_Id}}" /> --}}

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
      <form method="post" action="{{ url('admin/employementAgencyReport/updateUploadWeekstaatDoc') }}" enctype="multipart/form-data">
        <div class="modal-body clearfix">
          <div class="block">

            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
            <input type="hidden" name="fileId" id="fileId" />
            <input type="hidden" name="record_id" id="recordID" />
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


@include('admin/footer')</div>

<script src="{{ asset('public/assets/js/axios.min.js') }}"></script>

<script>


function changeBackgroundColor(id) {
  document.getElementById('row'+id).style.backgroundColor = '#FFAD2A';
}

function recordUpdate(id) {
  // console.log("YES i am here: ", id);

  let APP_URL = {!! json_encode(url('/').'/') !!};
  let data = {};
  data.id                   = id;
  data.Mon                  = document.getElementById("Mon"+id).value;
  data.Tue                  = document.getElementById("Tue"+id).value;
  data.Wed                  = document.getElementById("Wed"+id).value;
  data.Thu                  = document.getElementById("Thu"+id).value;
  data.Fri                  = document.getElementById("Fri"+id).value;
  data.Sat                  = document.getElementById("Sat"+id).value;
  data.Sun                  = document.getElementById("Sun"+id).value;
  data.individual_cost      = document.getElementById("individual_cost"+id).value;
  data.Employmentagencynote = document.getElementById("Employmentagencynote"+id).value;

  // console.log(data);
  axios.post(APP_URL + `admin/report/postemploymentagencynotesduplicate/${data.id}`, data).then(response => {
    window.location.reload(true);
  })
  .catch(err => {
    console.log("ERROR: " + err);
  })

}


function getdocinfo (id) {


  $.get('<?php echo URL:: to( 'admin/employementAgencyReport/editWeekstaatDocument' ); ?>/' + id,function(data) {
    // $('#Exp_date').val(data.ExpiryDate);
    $('#note').val(data.data.note);
    $('#fileId').val(data.data.id);
    // $('#employmentagencyID').val(data.data.employmentagencyID);
    $('#recordID').val(data.data.recordID);
    // $('#doc_id').val(id);
    $('#editUploadFilesDetail').modal('show');
  });


}


function addNewEmployee() {
  let APP_URL = {!! json_encode(url('/').'/') !!};
  let e = document.getElementById('addEmployeeID');
  let selectedID = e.options[e.selectedIndex].value;

  axios.get(APP_URL +  `admin/getEmployeeSingleRecord/${selectedID}`).then(response => {
    // console.log(response.data.data.record);
    let data = response.data.data.record;
    console.log(data);
    document.getElementById('addIndividual_cost').value = data.Cost;
    document.getElementById('addEmploymentagencynote').value = data.Employmentagencynote;
    document.getElementById('bsn').value = data.Sofinumber;

    document.getElementById('addEmployeeButton').style.display = "inline-block";
  })
  .catch(err => {
    console.log("ERROR: " + err);
  })

  // console.log(selectedID);
}


function addNewEmployeeRecord() {
  let APP_URL = {!! json_encode(url('/').'/') !!};

  let e = document.getElementById('addEmployeeID');
  let selectedID  = e.options[e.selectedIndex].value;
  let selectedEMP = e.options[e.selectedIndex].text;

  let data = {};
  data.employment_agency_weekly_report_id = document.getElementById('employment_agency_weekly_report_id').value
  data.Employee_Id                        = selectedID;
  data.Name                               = selectedEMP;
  data.Mon                                = document.getElementById('addMon').value;
  data.Tue                                = document.getElementById('addTue').value;
  data.Wed                                = document.getElementById('addWed').value;
  data.Thu                                = document.getElementById('addThu').value;
  data.Fri                                = document.getElementById('addFri').value;
  data.Sat                                = document.getElementById('addSat').value;
  data.Sun                                = document.getElementById('addSun').value;
  data.individual_cost                    = document.getElementById('addIndividual_cost').value;
  data.Employmentagencynote               = document.getElementById('addEmploymentagencynote').value;
  // console.log(data);

  axios.post(APP_URL + `admin/addEmploymentAgencySingleRecord`, data).then(response => {
    // console.log(response.data);
    window.location.reload(true);
  })
  .catch(err => {
    console.log("ERROR: " + err);
  })

}



</script>
