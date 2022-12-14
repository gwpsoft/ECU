<!-- Header -->

    @include('admin/header')
 <script type='text/javascript' src='js/plugins/tinymce/tinymce.min.js'></script>
     <title>Weekstaat via e-mail verzenden . . . </title>

<style>

 .checker {float:right !important; }

 .error { color:#fff; }

 .checker input[type=checkbox] {
   margin-left: 5px;
 }

</style>
<script>

$('#attachment').click(function () {
    if ($(this).prop('checked')) {
		$(this).val('1');
       // alert('is checked');
    } else {
		$(this).val('0');
		$(this).removeAttr('checked');
       // alert('is not checked');
    }
});


</script>

     <div class="row">

            <div class="col-md-12">

                <ol class="breadcrumb">

                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>

                    <li class="active">Werkbonnen mailen naar</li>

                </ol>

            </div>

        </div>



        <div class="row">

    @include('admin/sidebar')

     <div class="col-md-10">

    @if (Session::has('message'))

   <div class="alert alert-success">

                        <b>Success!</b> {{Session::get('message')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif


 @if (Session::has('error'))

   <div class="alert alert-danger">

                        <b>Error!</b> {{Session::get('error')}}

                        <button type="button" class="close" data-dismiss="alert">×</button>

                    </div>

   @endif










    {!! Form::open(['url'=> 'admin/weekcard/weekcard_sent']) !!}

    <input type="hidden" name="weekcard_Id" value="<?=@$week_details[0]->weekcard_Id?>" />

    <input type="hidden" name="weeknumber" value="<?=@$week_details[0]->Weeknumber?>" />

     <input type="hidden" name="email" value="<?=@$week_details[0]->contact_email?>" />

     <input type="hidden" name="Project" value="<?=@$week_details[0]->Project?>" />

     <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

  <div class="col-md-6">

          <div class="block">

                    <div class="header" >

                       <h2>Inhoud van de mail (werkbon is een PDF bijlage)</h2>

                    </div>

                    <div class="content controls">

               <div class="form-row">

                            <div class="col-md-12">
                            <div class="content np">
                            <textarea class="" rows="8"  name="Text" style="height:300px">
Beste <?=@$week_details[0]->contact_firstname.' '.@$week_details[0]->contact_lastname?>,


Bij deze ontvangt u de weekstaat voor week: <?php echo $value = substr(@$week_details[0]->Weeknumber, 0, -2).'-'.substr(@$week_details[0]->Weeknumber, -2); ?> van het project: <?php echo $week_details[0]->Project?>.

Wilt u zo vriendelijk zijn om deze te ondertekenen en te retourneren?


Let op! er kunnen meerdere bijlages toegevoegd zijn.

Bij voorbaat dank voor de moeite,

Met vriendelijke groet,


Easy Clean Up B.V.
Kollen bergweg 78
1101 AV Amsterdam


Tel.: 020-6916115




                            </textarea>
</div>
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



    <div class="col-md-6">



                <div class="block">

                    <div class="header">

                       <h2>Werkbonnen mailen naar:</h2>

                    </div>

                    <div class="content controls">
<?php if (!empty($GetEmails[0]->AanTo)) {

		@$TOEmails = explode(',',$GetEmails[0]->AanTo);
		@$CCEmails = explode(',',$GetEmails[0]->CcTo);

		?>
        <div class="header" style="background:none">
        <h2 align="">Aan</h2>
        </div>
        <?php
		foreach ($TOEmails as  $To) {

		@$Aan = DB::table('tblcontact')->select('*')->where('Id',$To)->get();
	?>
                   <div class="form-row">

                        <div class="col-md-2">

                        <input type="checkbox" checked="checked" value="<?=@$Aan[0]->Email?>" name="Aan[]" style="float:left"/>

                        </div>

                        <div class="col-md-4"><?=@$Aan[0]->Firstname.' '.@$Aan[0]->Lastname?></div>

                        <div class="col-md-6">(<?=@$Aan[0]->Email?>)</div>

                </div>

<?php }  if (!empty($CCEmails[0])) { ?>
 <div class="header" style="background:none">
<h2 align="">CC</h2>
        </div>
        <?php
		foreach ($CCEmails as  $CC) {

		$CCEmail = DB::table('tblcontact')->select('*')->where('Id',$CC)->get();
	?>
                   <div class="form-row">

                        <div class="col-md-2">

                        <input type="checkbox" checked="checked" value="<?=@$CCEmail[0]->Email?>" name="Cc[]" style="float:left"/>

                        </div>

                        <div class="col-md-4"><?=@$CCEmail[0]->Firstname.' '.@$CCEmail[0]->Lastname?></div>

                        <div class="col-md-6">(<?=@$CCEmail[0]->Email?>)</div>

                </div>
<?php } } } ?>

 {{-- <div class="form-row">

                        <div class="col-md-2">

                        <input type="checkbox" id="attachment" name="attachment" style="float:left"/>

                        </div>

                        <div class="col-md-4">Bijlagen Documenten</div>

                        <div class="col-md-6">&nbsp;</div>

                </div> --}}
            </div>

          </div>
       {!! Form::close() !!}

       <div class="block">

         <div class="header">
          <a data-toggle="modal" class="btn btn-success" href="#uploadFile" title="Toevoegen" style="float:right;">Document Uploaden</a>
           <h2>Documenten van de werknemer:</h2>
         </div>

         <div class="content">
           <table class="table table-bordered table-striped no-footer" width="100%">
             <tr>
               <th>Bijlage</th>
               <th>Notitie</th>
               <th>Datum en Tijd</th>
               <th>Downloaden</th>
               {{-- <th>Opties</th> --}}
             </tr>
             @if ($weekCard->weekCardAttachments)
               @foreach ($weekCard->weekCardAttachments as $file)
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

             @else
               <p>Geen bestand gevonden...!</p>
             @endif
           </table>
         </div>

       </div>






     </div>










          </div>



            </div>







       @include('admin/footer')</div>

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
