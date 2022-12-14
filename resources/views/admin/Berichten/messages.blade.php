<!-- Header -->

    @include('admin/header')
    
    <style>
.dataTables_length  { width:170px !important;}
.dataTables_length select { width:70px !important;}
</style>
<script> 

function Reply (msg_id) {
	
			client_id = $('#client_'+msg_id).val();
			project_id = $('#project_'+msg_id).val();
			
			projectName = $('#ProjectName'+msg_id).val();
			clientName = $('#ClientName'+msg_id).val();
			
			$('#ClientName').html(clientName);
			$('#ProjectName').html(projectName);
			
			msg	 = $('#msg_'+msg_id).val();
			$('#r_project_id').val(project_id);
			$('#r_client_id').val(client_id);
			$('#message').html(msg);
			$('#r_msg_id').val(msg_id);
			$('#modal_default_4').modal('show');
	
	 return false;
	
}





function Edit (msg_id) {
	
			client_id = $('#client_'+msg_id).val();
			project_id = $('#project_'+msg_id).val();
			msg	 = $('#msg_'+msg_id).val();
			$('#project_id').val(project_id);
			$('#client_id').val(client_id);
			$('#post_desc').val(msg);
			$('#msg_id').val(msg_id);
			$('#modal_default_3').modal('show');
	
	 return false;
	
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
		
	 /* Datatables */
    if($("table.sortable_simple").length > 0)
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"aaSorting": [[ 0, "desc" ]],"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});
    
    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10,"aaSorting": [[ 0, "desc" ]], "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null, null]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aaSorting": [[ 0, "desc" ]],"aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null, null]});    
    /* eof Datatables */
	
	});
        })(jQuery);
	
    </script>
 <title>Lijst van Berichten</title>   
     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo URL:: to( 'admin/dashboard' ); ?>">huis</a></li>
                    <li class="active">Lijst van Berichten</li>
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
   
   @if (Session::has('error'))
   <div class="alert alert-danger">
    <b>Error!</b> {{Session::get('error')}}
    <button type="button" class="close" data-dismiss="alert">×</button>
</div>
   @endif
   
   
   <div class="block">
                    <div class="header">
                        <h2>Lijst van Berichten</h2>
                                                            
                    </div>
                    <div class="content">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                            <thead>
                                <tr>
                                    <th width="8%">ID</th>
                                    <th width="15%">Personeel</th>
                                    <th width="35%">Berichten</th>
                                    <th width="10%">Actie door</th>                                    
                                   <!-- <th width="15%">Phone</th>-->
                                    <th width="5%">Status</th> 
                                    <th width="12%">Opties</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i =1;?>
                            @foreach($Messages as $key => $value)
                             <?php 
							 @$GetProjectName = DB::table('tblproject')->where('Id',@$value->project_id)->first();
							 @$GetEmpName = DB::table('tblemployee')->where('Id',@$value->emp_id)->first();
							 @$GetCheckedBy = DB::table('users')->where('id',@$value->checked_by)->first();
							@ $GetSenderID = DB::table('users')->where('contact_id',@$value->sender_id)->first();
							 if (!empty($GetSenderID)) {								 
								@$CustomerGroup = $GetSenderID->group;	 
							} else {
								@$CustomerGroup = '';								
							}
							 @$CheckedByName = @$GetCheckedBy->name ? @$GetCheckedBy->name : ''; 
							 // print($GetSenderID->group);
							  if ($value->admin_view == 0) {
								$bold = 'style="font-weight:bold; font-size:13px"';
							  } else {							  
							  	$bold = '';
							  }
							  if (Auth::user()->group == 0 && $value->sender_id != $value->emp_id) { 
							  
							  $Arrow = '<span class="icon-long-arrow-up"></span>&nbsp;&nbsp;';							  
							  
							  } else {
								
							  $Arrow = '<span class="icon-long-arrow-down"></span>&nbsp;&nbsp;';	
								  
							  }
							  ?>
                                <tr <?php echo $bold?>>
                                   <td><?php echo  @$value->msg_id ; ?> 
                                   <input type="hidden" id="msg_<?php echo $value->msg_id?>" value="<?php echo $value->message?>" />
                                   <input type="hidden" id="client_<?php echo $value->msg_id?>" value="<?php echo $value->emp_id?>" />
                                   <input type="hidden" id="project_<?php echo $value->msg_id?>" value="<?php echo $value->project_id?>" />
                                    <input type="hidden" id="ProjectName<?php echo $value->msg_id?>" value="<?php echo  @$GetProjectName->Name ; ?>" />
                                    <input type="hidden" id="ClientName<?php echo $value->msg_id?>" value="<?php echo  @$GetEmpName->Firstname.' '.@$GetEmpName->Lastname ; ?>" /> 
                                    <input type="hidden" id="Message<?php echo $value->msg_id?>" value="<?php echo  @$value->message ; ?>" />                             
                                   </td>
                                   <td><?php echo  @$GetEmpName->Firstname.' '.@$GetEmpName->Lastname ; ?> </td>
                                   
                                    <td><?php echo $Arrow?> {{ $value->message }}</td>
                                    <td><?php echo  @$CheckedByName ?></td>
                                     <td>
                                     <?php if ($value->status == 0) { // new
									  if (Auth::user()->group == 0 && $value->sender_id != $value->emp_id) {
									 ?>
									 <span class="label label-danger">Antwoord</span>
									 <?php } else { ?>
                                     <span class="label label-danger">Nieuw</span>
                                     <?php }
									 } if ($value->status == 1) { // checked ?>
									 <span class="label label-warning">Gezien</span>
								 	 <?php }  if ($value->status == 2) { // Replied?>
                                     <span class="label label-success">Beantwoord</span>
                                     <?php } ?>
                                     </td>
                                     <td>
<a href="<?php echo URL:: to( 'admin/view_EMPBerichten',$value->msg_id); ?>" title="Alle Berichten" class="widget-icon"><span class="icon-comments"></span></a>
<?php if (Auth::user()->group == 0 && $value->sender_id != $value->emp_id) {?>
<a href="#" onclick="Edit('<?php echo $value->msg_id?>')" title="Bewerk" class="widget-icon"><span class="icon-pencil"></span></a>
<a href="<?php echo URL:: to( 'admin/Del_EMPBerichten',$value->msg_id ); ?>" title="Verwijderen" class="widget-icon" onclick="return confirm('Bent u zeker dat u dit wilt Werknemer verwijderen?');"><span class="icon-trash"></span></a>
<?php } else { 
  if (empty($value->checked_by)) { // new
?>
 <a href="<?php echo URL:: to( 'admin/CheckedEMPMessage/'.$value->msg_id,0); ?>" class="widget-icon" title="Bericht gezien"><span class="icon-eye-open"></span></a>
 <?php  } if (empty($message->replied_by)) { ?>
 
 <a href="#" onclick="Reply('<?php echo $value->msg_id?>')" title="Beantwoorden" class="widget-icon"><span class="icon-reply"></span></a>

<!--<a href="#" onclick="Edit('<?php //echo $value->msg_id?>')" title="Bewerk" class="widget-icon"><span class="icon-eye"></span></a>-->
<?php } } ?>



                                     </td>                                    
                                </tr>
                                @endforeach                    
                            </tbody>
                        </table>                                        

                    </div>
                </div>
                
                <div class="modal  modal-info" id="modal_default_3"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Bericht</h4>

                </div>

                 {!! Form::open(['url'=> 'admin/UpdateEMPMessage']) !!}

                <div class="modal-body clearfix">

                    <div class="block">

    <input type="hidden" name="project_id"  id="project_id" />
   <input type="hidden" name="client_id" id="client_id"  />
      <input type="hidden" name="redirect" value="1"  />
   <input type="hidden" name="msg_id" id="msg_id" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

                    <div class="content">

                      <div class="form-row">
   <div class="col-md-12"> 
                    
              <textarea name="message" id="post_desc" class="form-control" rows="7"></textarea>
              </div>                      
 </div></div>
 </div>      
</div>

<div class="modal-footer">

    {!! Form::submit('Opslaan', ['class' => 'btn btn-success col-lg-3 col-md-3 col-sm-12 col-lg-offset-3', 'name' => 'Reply']) !!}
    <button type="button" class="btn btn-danger col-lg-3 col-md-3 col-sm-12" data-dismiss="modal">Sluiten</button>

</div>

                

                 {!! Form::close() !!} 

            </div>

        </div>

    </div>
                
                
               <div class="modal  modal-info" id="modal_default_4"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Bericht</h4>

                </div>

                 {!! Form::open(['url'=> 'admin/AddEMPMessage']) !!}

                <div class="modal-body clearfix">

                    <div class="block">

    <input type="hidden" name="project_id"  id="r_project_id" />
   <input type="hidden" name="client_id" id="r_client_id"  />
      <input type="hidden" name="redirect" value="1"  />
   <input type="hidden" name="msg_id" id="r_msg_id" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

                   
 <div class="col-md-12">
 <p>
 <span style="font-weight:bold">Personeel: &nbsp;</span>
 <span id="ClientName"></span>
 <br />
 <span style="font-weight:bold">Project Name: &nbsp;</span>
 <span id="ProjectName"></span> 
 </p>
 <br />
 <p id="message"></p>
 
 </div>
  <div class="content">
  <div class="form-row">
   <div class="col-md-12"> 
                    
              <textarea name="message" id="r_post_desc" class="form-control" rows="7"></textarea>
              </div>                      
 </div></div>
 </div>      
</div>

<div class="modal-footer">

    {!! Form::submit('Beantwoord', ['class' => 'btn btn-success col-lg-3 col-md-3 col-sm-12 col-lg-offset-3', 'name' => 'Reply']) !!}
    <button type="button" class="btn btn-danger col-lg-3 col-md-3 col-sm-12" data-dismiss="modal">Sluiten</button>

</div>
                 {!! Form::close() !!} 

            </div>

        </div>

    </div> 
                
                
            </div>
  </div>   
       @include('admin/footer')</div>  