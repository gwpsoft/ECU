<!-- Header -->
@include('admin/header')
<title>E-mailrapport</title>
<style>
.checker {float:right !important; }
.error { color:#fff; }
.checker input[type=checkbox] {
  margin-left: 5px;
}
</style>
<div class="row">
  <div class="col-md-12">
    <ol class="breadcrumb">
      <li><a href="admin">Home</a></li>
      <li class="active">Werkbonnen mailen naar</li>
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





    {!! Form::open(['url'=> 'admin/report/employmentagency_Email_send']) !!}

    <input type="hidden" name="record_id" value="{{$recordID}}" />
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />


    <div class="col-md-6">

      <div class="block">
        <div class="header">
          <h2>Werkbonnen mailen naar:</h2>
        </div>
        <div class="content controls">
          <div class="form-row">
            <div class="col-md-2">
              <input type="checkbox" checked="checked" value="1" name="sendmail[<?=$record->Employmentagency_Id?>]" style="float:left"/></div>

              <div class="col-md-4"><?=$record->Employmentagency_contact?></div>
              <div class="col-md-6">(<?=$record->Employmentagency_email?>)</div>
            </div>
          </div>
        </div>

        <div class="block">
          <div class="header" >
            <h2>Inhoud van de mail (werkbon is een PDF attachment)</h2>
          </div>
          <div class="content controls">
            <div class="form-row">
              <div class="col-md-12">
                <textarea class="" rows="8"  name="Text" style="height:300px">
                  Beste <?=$record->Employmentagency_contact?>,

                  Bij deze ontvangt u de weekstaat voor week {{ $week }}-{{ $year }}.
                  Wilt u deze weekstaat samen met uw factuur naar ons sturen?

                  Bij voorbaat dank voor de moeite,

                  Met vriendelijke groet,


                  Easy Clean Up B.V.


                </textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="content controls">
          <div class="form-row">
            <div class="col-md-6">

              {!! Form::submit('Verzenden', ['class' => 'btn btn-success']) !!}
            </div>
          </div>
          <br />
        </div>
      </div>


      <div class="col-sm-6">
        <div class="block">
          <div class="header">
            <a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right;">Document Uploaden</a>
            <h2>Documenten bijvoegen</h2>
          </div><!-- header class ends -->

          <div class="content">
            <table class="table table-bordered table-striped no-footer" width="100%">
              <thead>
                <tr>
                  <th>Bijlage</th>
                  <th>Notitie</th>
                  <th>Datum en Tijd</th>
                  <th>Downloaden</th>
                  {{-- <th>Opties</th> --}}
                </tr>
              </thead>
              <tbody>
                @if (sizeof($files) > 0)
                  @foreach ($files as $key => $file)
                    <tr>
                      <td>
                        <input type="checkbox" class="form-control" name="fileid[]" value="{{ $file->id }}">
                      </td>
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

                      {{-- <td>

                        <a href="javascript:void(0)" onclick="getdocinfo({{ $file->id }});" title="Bewerken" class="widget-icon" ><span class="icon-pencil"></span></a>

                          <a href="{{ url('admin/weekstaat/deleteWeekstaatDocument/'.$file->id) }}" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a>
                      </td> --}}
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
          </div><!-- content class ends -->
        </div><!-- block class ends -->
      </div><!-- col-sm-6 ends -->

    </div>



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

        <form method="post" action="{{ url('admin/employementAgencyReport/uploadWeekstaatDocument') }}"  enctype="multipart/form-data">

          <div class="modal-body clearfix">
            <div class="block">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
              {{-- <input type="hidden" name="weeknumber" value="{{$weeknumber}}" />
              <input type="hidden" name="Employmentagency_Id" value="{{$Employmentagency_Id}}" /> --}}
              <input type="hidden" name="record_id" value="{{$recordID}}" />

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

  @include('admin/footer')</div>
