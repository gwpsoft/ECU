<!-- Header -->
    @include('admin/header')
     <title>Bewerk Klant</title>
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Bewerk Klant</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'admin/update_customer']) !!}
   <div class="col-md-12">
 @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
<input type="hidden" name="id" value="{{ $Get_Customer->Id}}" />
    <div class="col-md-6">

                <div class="block">
                    <div class="header" >

                       <h2>Klant gegevens</h2>

                    </div>
                    <div class="content controls">



                       <div class="form-row">
                            <div class="col-md-4">Naam:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Name" name="Name" value="{{ $Get_Customer->Name}}">
                                  <span class="error">  {{ $errors->first( 'Name' , ':message' ) }}</span>
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
                            <div class="col-md-4">Afspraken:</div>
                            <div class="col-md-7">
                            <textarea class="form-control" rows="5" name="Notes">{{ $Get_Customer->Notes}}</textarea>
                            		<span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

          </div>


        <div class="col-md-5">
        	  <div class="content controls">

              <div class="col-md-8">

           <div class="block">
                    <div class="header" >
                       <h2>Afdeling</h2>
                    </div>
                    <div class="content controls" style="height:250px; overflow:auto">
                      <div align="center"><a href=" <?php echo URL:: to( 'admin/CreateNew_department', $Get_Customer->Id ); ?>" class="btn btn-success">+ Nieuw Afdeling</a>
                         </div>
                         <hr />
                      <?php foreach ($departments as $department) {?>
                     <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_department',$department->Id); ?>"><?php echo $department->Name?></a></div>

                    <?php } ?>
                    </div>
          </div>




            </div>

              </div>

        </div>


        {{-- Upload Attachment starts here --}}

        <div class="content controls">

        <div class="row">
           <div class="col-md-12">

             <div class="block">
                <div class="header">
                   <h2>Upload documenten</h2>
                  </div>
                  <div class="content">
   	               <a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right; margin-bottom: 15px;">Document Uploaden</a>

                     <table class="table table-bordered" style="text-align:center; font-size:12px;">
                        <thead>
                          <tr>
                             <th class="text-center">Notitie</th>
                             <th class="text-center">Datum & Tijd</th>
                             <th class="text-center">Downloaden</th>
                             <th class="text-center">Opties</th>
                          </tr>
                        </thead>
                        <tbody>
                           @if ($Get_Customer->customerAttachments)

                              @foreach ($Get_Customer->customerAttachments as $file)
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
                                          <a href="{{ url('admin/customers/deleteWeekstaatDocument/'.$file->id) }}" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a>
                                    </td>
                                 </tr>
                              @endforeach

                           @endif
                        </tbody>
                     </table>
                  </div>

                </div>
             </div>



           </div>
        </div>
     </div>



        {{-- Upload Attachment ends here --}}


       <div class="content controls">
                        <div class="form-row" style="float:right" >

                             <div class="col-md-3" align="center" >
                <a href="<?php echo URL:: to( 'admin/customers' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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

            </div>

    {!! Form::close() !!}

  </div>

  {{-- Model to upload files starts below --}}

  <div class="modal  modal-info" id="uploadFile"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Document Uploaden</h4>
        </div>

        <form method="post" action="{{ url('admin/customers/uploadWeekstaatDocument') }}"  enctype="multipart/form-data">

          <div class="modal-body clearfix">
            <div class="block">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
              <input type="hidden" name="customers_id" value="{{ $Get_Customer->Id }}" />

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


              <div class="col-md-4">Document type:</div>
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
        <form method="post" action="{{ url('admin/customers/updateUploadWeekstaatDoc') }}" enctype="multipart/form-data">
          <div class="modal-body clearfix">
            <div class="block">

              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
              <input type="hidden" name="fileId" id="fileId" />
              <input type="hidden" name="customerID" id="customerID" />
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

       <script>

       function getdocinfo (id) {

         $.get('<?php echo URL:: to( 'admin/customers/editWeekstaatDocument' ); ?>/' + id,function(data) {
                // $('#Exp_date').val(data.ExpiryDate);
                $('#note').val(data.data.note);
                $('#fileId').val(data.data.id);
                $('#customerID').val(data.data.customerID);
                // $('#doc_id').val(id);
               $('#editUploadFilesDetail').modal('show');
            });


         }

         </script>
