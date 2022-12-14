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

          <div class="col-md-3"><input type="text" class="form-control" value="{{ $records[0]->Employmentagency }}" readonly="readonly"></div>
          <div class="col-md-3"><input type="text" class="form-control" value="{{ $records[0]->Weeknumber }}" readonly="readonly" name="weeknumber"></div>
          <div class="col-md-3"><input type="text" class="form-control" value="{{ $datestring }}" readonly="readonly">
          <input type="hidden" class="form-control" value="{{ $records[0]->Employmentagency_Id }}" name="id" >
          </div>

        </div> <!-- form-row ends -->
      </div> <!-- content class ends -->
    </div> <!-- block class ends -->

    <div class="block">
      <div class="header">
        <h2>Notities</h2>

        {{-- <div style="float:right"><input type="submit" class="btn btn-success" value="Opslaan" name="submit"/></div> --}}
       <div style="float:right">
         <a href="{{ url('admin/report/employmentagency_pdf/id/'.$Employmentagency_Id.'/weeknumber/'.$weeknumber) }}" title="Download PDF">
           <img class=" " src="{{ URL::asset('assets/img/icons/pdf.png') }}" id="pdf" style=" cursor:pointer">
         </a> |
         <a href="{{ url('admin/report/employmentagency_Email/id/'.$Employmentagency_Id.'/weeknumber/'.$weeknumber) }}" title="E-mailen" >
           <img class=" " src="{{ URL::asset('assets/img/icons/e-mail.png') }}" id="search" style=" cursor:pointer">
         </a> |
         <a href="{{ url('admin/report/employmentagencyoverview/weeknumber/'.$yearWeek) }}" class="btn btn-warning">Back
         </a>
         &nbsp;&nbsp;&nbsp;
       </div>
     </div><!-- header class ends -->

     <div class="content">
       <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped">
         <thead>
             <tr>
                <th width="8%">Emp ID</th>
                <th width="15%">Personeel</th>
                <th width="8%">BSN</th>
                <th width="6%">Ma</th>
                <th width="6%">Di</th>
                <th width="6%">Wo</th>
                <th width="6%">Do</th>
                <th width="6%">Vr</th>
                <th width="6%">Za</th>
                <th width="6%">Zo</th>
                <th width="25%">Notities</th>
                <th width="2%"></th>
             </tr>
         </thead>
         <tbody>
           @if ($records)
             @foreach ($records as $key => $record)
               <tr id="row{{ $record->id }}" onkeyup="changeBackgroundColor({{ $record->id }})">
                 <td>{{ $record->Employee_Id}}</td>
                 <td>{{ $record->Name}}</td>
                 <td>{{ $record->bsn}}</td>
                 <td><input type="text" id="Mon{{ $record->id }}" class="form-control" value="{{ number_format($record->Mon, 2) }}"></td>
                 <td><input type="text" id="Tue{{ $record->id }}" class="form-control" value="{{ number_format($record->Tue, 2) }}"></td>
                 <td><input type="text" id="Wed{{ $record->id }}" class="form-control" value="{{ number_format($record->Wed, 2) }}"></td>
                 <td><input type="text" id="Thu{{ $record->id }}" class="form-control" value="{{ number_format($record->Thu, 2) }}"></td>
                 <td><input type="text" id="Fri{{ $record->id }}" class="form-control" value="{{ number_format($record->Fri, 2) }}"></td>
                 <td><input type="text" id="Sat{{ $record->id }}" class="form-control" value="{{ number_format($record->Sat, 2) }}"></td>
                 <td><input type="text" id="Sun{{ $record->id }}" class="form-control" value="{{ number_format($record->Sun, 2) }}"></td>
                 <td><input type="text" id="Employmentagencynote{{ $record->id }}" class="form-control" value="{{ $record->Employmentagencynote }}"></td>
                 <td><a href="#" onclick="recordUpdate({{ $record->id }}); return false;"><span class="icon-save"></span></a></td>
               </tr>
             @endforeach
           @endif
         </tbody>

       </table>
     </div><!-- content class ends -->

    </div> <!-- block class ends -->

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

    {{-- Model to upload files starts below --}}

    <div class="modal  modal-info" id="uploadFile"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Document Uploaden</h4>
          </div>

          <form method="post" action="{{ url('admin/employementAgencyReport/uploadWeekstaatDocument') }}"  enctype="multipart/form-data">

            <div class="modal-body clearfix">
              <div class="block">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                <input type="hidden" name="weeknumber" value="{{$weeknumber}}" />
                <input type="hidden" name="Employmentagency_Id" value="{{$Employmentagency_Id}}" />

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
                <input type="hidden" name="employmentagencyID" id="employmentagencyID" />
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
        data.id  = id;
        data.Mon = document.getElementById("Mon"+id).value;
        data.Tue = document.getElementById("Tue"+id).value;
        data.Wed = document.getElementById("Wed"+id).value;
        data.Thu = document.getElementById("Thu"+id).value;
        data.Fri = document.getElementById("Fri"+id).value;
        data.Sat = document.getElementById("Sat"+id).value;
        data.Sun = document.getElementById("Sun"+id).value;
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
             $('#employmentagencyID').val(data.data.employmentagencyID);
             // $('#doc_id').val(id);
            $('#editUploadFilesDetail').modal('show');
          });


        }


    </script>
