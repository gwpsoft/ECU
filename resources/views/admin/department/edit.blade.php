<!-- Header -->
    @include('admin/header')
     <title>Bewerk Afdeling</title>
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
</style>
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                     <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">Huis</a></li>
                    <li class="active">Bewerk Afdeling</li>
                </ol>
            </div>
        </div>

        <div class="row">

    @include('admin/sidebar')
    {!! Form::open(['url'=> 'admin/update_department']) !!}
         <input type="hidden" name="id" value="{{$Get_department->Id}}" />
   <div class="col-md-12">
 @if (Session::has('message'))
   <div class="alert alert-success">
                        <b>Success!</b> {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
   @endif
    <div class="col-md-8">

                <div class="block">
                    <div class="header" >

                       <h2>Afdeling gegevens</h2>

                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="col-md-4">Klant:</div>
                            <div class="col-md-7">
                            	<select class="form-control" name="Customer_Id" id="Customer_Id">
                                    <option value="">Select Klant</option>
                                    @foreach ($data as $customer)
                                    <option value="{!! $customer->Id!!}" <?php if ($customer->Id == $Get_department->Customer_Id) {?> selected="selected"  <?php } ?>>{!! $customer->Name!!}</option>
                                     @endforeach
                                </select>
                                <span class="error">  {{ $errors->first( 'customer_id' , ':message' ) }}</span>
                            </div>
                          </div>

                       <div class="form-row">
                            <div class="col-md-4">Naam Afdeling:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Naam" name="Name" id="dept_name" value="{{ $Get_department->Name }}"><span class="error">  {{ $errors->first( 'Name' , ':message' ) }}</span>

                            </div>

                        </div>



                        <div class="form-row">
                            <div class="col-md-4">Adres:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Adres" name="Address" value="{{ $Get_department->Address }}"><span class="error">  {{ $errors->first( 'Address' , ':message' ) }}</span>
                            </div>
                       </div>
                         <div class="form-row">
                            <div class="col-md-4">Postcode:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Postcode" name="Zipcode" value="{{ $Get_department->Zipcode }}"><span class="error">  {{ $errors->first( 'Zipcode' , ':message' ) }}</span>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-4">Stad:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Stad" name="City" value="{{ $Get_department->City }}"><span class="error">  {{ $errors->first( 'City' , ':message' ) }}</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="block">
                    <div class="header" >

                       <h2>Extra gegevens</h2>


                    </div>
                    <div class="content controls">



                        <div class="form-row">
                            <div class="col-md-4">Afspraken:</div>
                            <div class="col-md-7">
                            		<textarea class="form-control" name="Notes" placeholder="Afspraken">{{ $Get_department->Notes }}</textarea>
                                    <span class="error">  {{ $errors->first( 'Notes' , ':message' ) }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                   <div class="block">
                    <div class="header" >

                       <h2>Postbus gegevens</h2>

                    </div>
                    <div class="content controls">


                       <div class="form-row">
                            <div class="col-md-4">Postbus:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Postbus" name="Mailbox" value="{{ $Get_department->Mailbox }}"><span class="error">  {{ $errors->first( 'Mailbox' , ':message' ) }}</span>

                            </div>

                        </div>



                        <div class="form-row">
                            <div class="col-md-4">Postbus Postcode:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Postbus Postcode" name="MailboxZipcode" value="{{ $Get_department->MailboxZipcode }}"><span class="error">  {{ $errors->first( 'MailboxZipcode' , ':message' ) }}</span>
                            </div>
                       </div>
                         <div class="form-row">
                            <div class="col-md-4">Postbus Stad:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Postbus Stad" name="MailboxCity" value="{{ $Get_department->MailboxCity }}"><span class="error">  {{ $errors->first( 'MailboxCity' , ':message' ) }}</span>
                            </div>
                        </div>

                    </div>

                </div>

                  <div class="block">
                    <div class="header" >

                       <h2>Contact Informatie</h2>

                    </div>
                    <div class="content controls">


                       <div class="form-row">
                            <div class="col-md-4">Telefoon:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Telefoon" name="Phone" value="{{ $Get_department->Phone }}"><span class="error">  {{ $errors->first( 'Phone' , ':message' ) }}</span>

                            </div>

                        </div>



                        <div class="form-row">
                            <div class="col-md-4">Fax:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Fax" name="Fax" value="{{ $Get_department->Fax }}"><span class="error">  {{ $errors->first( 'Fax' , ':message' ) }}</span>
                            </div>
                       </div>
                         <div class="form-row">
                            <div class="col-md-4">Email:</div>
                            <div class="col-md-7">
                            		<input type="text" class="form-control" placeholder="Email" name="Email" value="{{ $Get_department->Email }}"><span class="error">  {{ $errors->first( 'Email' , ':message' ) }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- File attachment work starts here --}}
                <div class="block">
                   <div class="header" >
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
                           @if ($Get_department->departmentAttachments)

                              @foreach ($Get_department->departmentAttachments as $file)
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
                                          <a href="{{ url('admin/departments/deleteWeekstaatDocument/'.$file->id) }}" title="Verwijderen" class="widget-icon" onclick="return confirm('Weet u zeker dat u dit bestand wilt verwijderen?');"><span class="icon-trash"></span></a>
                                    </td>
                                 </tr>
                              @endforeach

                           @endif
                        </tbody>
                     </table>
                   </div>

                </div>
                {{-- File attachment work ends here --}}

            </div>

   <div class="col-md-4">

           <div class="block">
                    <div class="header" >
                       <h2>Projecten</h2>
                    </div>
                     <div class="content controls" style="height:450px; overflow:auto">
                      <div align="center"><a href="" class="btn btn-success" onclick="makeNewProject(); return false;">+ Nieuw Project</a>
                         </div>
                         <hr />

                      <?php foreach ($GetProjects as $Project) {?>
                     <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_project',$Project->Id); ?>"><?php echo $Project->Name?></a></div>

                    <?php } ?>
                    </div>
          </div>

             <div class="block">
                    <div class="header" >
                       <h2>Contacten</h2>
                    </div>
                    <div class="content controls" style="height:400px; overflow:auto">
                    <div align="center"><a href=" <?php echo URL:: to( 'admin/createNew_contact', @$Get_department->Id ); ?>" class="btn btn-success">+ Nieuw Contact</a>
                         </div>
                         <hr />
                    <?php foreach ($GetContacts as $contact) {?>
                     <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_contact',$contact->Id); ?>"><?php echo $contact->Firstname?> <?php echo $contact->Lastname?></a></div>

                    <?php } ?>
                    </div>
          </div>

          <div class="block">
                    <div class="header" >
                       <h2>Afspraken</h2>
                    </div>
                    <div class="content controls" style="height:400px; overflow:auto">
                     <div align="center"><a href=" <?php echo URL:: to( 'admin/createNew_note', @$Get_department->Id ); ?>" class="btn btn-success">+ Nieuw Afspraken</a>
                         </div>
                         <hr />
                     <?php foreach ($GetNotes as $Notes) {?>
                     <div class="col-md-12"><a href="<?php echo URL:: to( 'admin/edit_note',$Notes->Id); ?>"><?php echo $Notes->Contact?> (<?php echo $Notes->Datetime?>)</a></div>

                    <?php } ?>
                    </div>
          </div>
            </div>
          <center>
         <div class="content controls">
                        <div class="form-row" style="float:right" >

                             <div class="col-md-3" align="center" >
                <a href="<?php echo URL:: to( 'admin/projectmanager' ); ?>" class="btn btn-primary" style="width:100%">Annuleren</a>
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
                </div>   </center>

            </div>

    {!! Form::close() !!}
  </div>

  {{-- Upload Document Model Starts here --}}

  <div class="modal  modal-info" id="uploadFile"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

     <div class="modal-dialog">
        <div class="modal-content">

           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Document Uploaden</h4>
           </div>

           <form method="post" action="{{ url('admin/departments/uploadWeekstaatDocument') }}"  enctype="multipart/form-data">

              <div class="modal-body clearfix">
                 <div class="block">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <input type="hidden" name="department_id" value="{{ $Get_department->Id }}" />

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


  {{-- Upload Document Model Ends here --}}

	{{-- Model to edit uploaded files starts here --}}


   <div class="modal modal-info" id="editUploadFilesDetail"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Document Bewerken</h4>
				</div>
				<form method="post" action="{{ url('admin/departments/updateUploadWeekstaatDoc') }}" enctype="multipart/form-data">
					<div class="modal-body clearfix">
						<div class="block">

							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
							<input type="hidden" name="fileId" id="fileId" />
							<input type="hidden" name="departmentID" id="departmentID" />
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

         $.get('<?php echo URL:: to( 'admin/departments/editWeekstaatDocument' ); ?>/' + id,function(data) {
                // $('#Exp_date').val(data.ExpiryDate);
                $('#note').val(data.data.note);
                $('#fileId').val(data.data.id);
                $('#departmentID').val(data.data.departmentID);
                // $('#doc_id').val(id);
               $('#editUploadFilesDetail').modal('show');
            });


         }

         function makeNewProject() {
            let customer_id = document.getElementById('Customer_Id').value;
            let dept_name   = document.getElementById('dept_name').value;
            let id          = {{ $Get_department->Id  }};
            let url         = "{{ URL::to('admin/createNew_project/'.$Get_department->Id) }}"

            console.log("Customer ID: ", customer_id);
            console.log("Dept Name: ", dept_name);
            console.log("Current ID: ", id);
            console.log("URL: ", url);

            window.location.href = url + "?customer_id="+customer_id+"&&dept_name="+dept_name;

         }

         </script>
