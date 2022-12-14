<!-- Header -->
    @include('admin/header')
     <title>Project Messages</title>  
<style>
 .checker {float:right !important; }
 .error { color:#fff; }
 .messages .messages-item > .senders {
    float: left; border-radius: 50%;background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 3px solid rgba(255, 255, 255, 0.3);
    padding: 0;
}
.mCSB_container {
    overflow: hidden;
    padding: 12px 40px;
    width: auto;
}
</style>
<script>
$(document).ready(function(){
   $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
       $("#btn-more").html("Bezig met laden....");
       $.ajax({
           url : '{{ url("admin/loaddata") }}',
           method : "POST",
           data : {id:id, _token:"{{csrf_token()}}"},
           dataType : "text",
           success : function (data)
           {
              if(data != '') 
              {
                  $('#remove-row').remove();
                  $('#load-data').append(data);
              }
              else
              {
                  $('#btn-more').html("Geen Gegevens");
              }
           }
       });
   });  
}); 
</script>












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
			//$('#post_desc').val(msg);
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
        $("table.sortable_simple").dataTable({"iDisplayLength": 10,"bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true});
    
    if($("table.sortable_default").length > 0)
        $("table.sortable_default").dataTable({"iDisplayLength": 10, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": true }, null, null, null, null]});
    
    if($("table.sortable").length > 0)
        $("table.sortable").dataTable({"iDisplayLength": 10, "aLengthMenu": [10,25,50,100], "sPaginationType": "full_numbers", "aoColumns": [ { "bSortable": true }, null, null, null, null]});    
    /* eof Datatables */
	
	});
        })(jQuery);
	
    </script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/pqb/filemanager-laravel/public/filemanager/styles/filemanager.css') }}" />

<script type="text/javascript" src="{{ URL::asset('vendor/pqb/filemanager-laravel/public/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('vendor/pqb/filemanager-laravel/public/tinymce/tinymce_editor.js') }}"></script>



<script type="text/javascript">
editor_config.selector = "textarea";
editor_config.path_absolute = "http://laravel-filemanager.rhcloud.com/admin/";

tinymce.init(editor_config);
tinyMCE.init({
   
   language : 'en',
  
});
</script>

     <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="admin">Home</a></li>                    
                    <li class="active">Project Messages</li>
                </ol>
            </div>
        </div> 
          
        <div class="row">   
    
    @include('admin/sidebar') 
  
    
    
   <!-- {!! Form::open(['url'=> 'edit_employee/$Get_Employee->id']) !!}-->
   <div class="col-md-12">
 
  <!--@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
     <b>Error!</b>  <br />
   @foreach ($errors->all() as $error)
  {{$error}}<br />
   @endforeach   
   </div>
   @endif-->
      
                @if (Session::has('message'))
   <div class="alert alert-success">
        <b>Success!</b> {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert">×</button>
    </div>
   @endif
     
            <?php if (!empty($All_Messages)) { ?>
                 <div class="col-md-12">
                 
                <div class="block block-drop-shadow">
                    <div class="header">
                        <h2>Messages</h2>
                        <div style="float:right"><a href=" <?php echo URL:: to( 'admin/Berichten' ); ?> " class="btn btn-success">Sluiten</a></div>
                    </div>
                    <div class="content messages npr npt"> 
                        <div class="scroll" id="load-data">
                        <?php 
							$counter=0;
							foreach ($All_Messages as $message) {
							$counter++;
							@$GetProjectName = DB::table('tblproject')->where('Id',@$message->project_id)->first();
							$GetCustomerName = DB::table('tblcontact')->where('Id',$message->sender_id)->first();
							$GetCheckedBy = DB::table('users')->where('id',@$message->checked_by)->first();
							$GetRepliedBy = DB::table('users')->where('id',@$message->replied_by)->first();
							@$CheckedByName = $GetCheckedBy->name ? $GetCheckedBy->name : '';
							@$RepliedByName = $GetRepliedBy->name ? $GetRepliedBy->name : '';
							$GetSenderID = DB::table('users')->where('contact_id',@$message->sender_id)->first();
							 if (!empty($GetSenderID)) {								 
								$CustomerGroup = $GetSenderID->group;	 
							} else {
								$CustomerGroup = '';								
							}
							//$class = ($counter % 2 === 0) ? 'inbox' : '';
							if (Auth::user()->id != $message->sender_id) { $float='right'; $inbox = 'inbox'; $margin = 'margin-left:720px';} else {$float='left'; $inbox = ''; $margin = 'margin-left:630px !important';}
							?>
                            <div class="messages-item <?=$inbox?>">
                            <input type="hidden" id="msg_<?php echo $message->msg_id?>" value="<?php echo $message->message?>" />
                                   <input type="hidden" id="client_<?php echo $message->msg_id?>" value="<?php echo $message->client_id?>" />
                                   <input type="hidden" id="project_<?php echo $message->msg_id?>" value="<?php echo $message->project_id?>" />
                                   <input type="hidden" id="ProjectName<?php echo $message->msg_id?>" value="<?php echo  @$GetProjectName->Name ; ?>" />
                                    <input type="hidden" id="ClientName<?php echo $message->msg_id?>" value="<?php echo  @$GetCustomerName->Firstname.' '.@$GetCustomerName->Lastname ; ?>" />
                                   
                                   
                                   
                                   
                                   
                            <?php if (!$GetCustomerName) {?>
                            <div class="sender" style="float:<?=$float?>;margin-top: 12px; margin-right:-10px; font-weight:bold">
							<?php echo Auth::user()->name;?></div>
                                
                                <?php } else {?>
                                 <div class="sender" style="float:<?=$float?>;margin-top: 12px;margin-left: -32px;font-weight:bold"><?php echo $GetCustomerName->Firstname; ?></div>
                                <?php } ?>
                                <div class="messages-item-text"><?=$message->message?></div>
                                <div class="messages-item-date"><?=date('j M, Y H:i:s',strtotime($message->created_at))?>
                                <span style="<?=$margin?>">
                                 <?php if (empty($CheckedByName) && $CustomerGroup ==  1) { ?>
                                <a href="<?php echo URL:: to( 'admin/CheckedMessage/'.$message->msg_id,1); ?>" class="btn btn-warning">Gezien</a>
                                <?php } else { 
								if (!empty($message->checked_at) && ($message->checked_at != NULL)) {									
								?> 
								Gezien : <?=$CheckedByName?>  &nbsp;	<?=date('j M, Y H:i:s',strtotime($message->checked_at));
								}}?>
                                <?php if (empty($RepliedByName) && $CustomerGroup ==  1) { ?>
                                <a  data-toggle="modal" href="#" onclick="Reply('<?php echo $message->msg_id?>')" title="Beantwoord" class="btn btn-success">
                                Beantwoord</a>
                                <?php } if (Auth::user()->group == 0 && $message->sender_id != $message->client_id) {?>
                                <a  data-toggle="modal" href="#" onclick="Edit('<?php echo $message->msg_id?>')" title="Bewerk" class="btn btn-success">
                                Bewerk</a>
                                <?php   } else { 
								if (!empty($message->replied_at) && ($message->replied_at != NULL)) {
								?> 
								&nbsp; Beantwoord : <?=$RepliedByName?>  &nbsp;	<?=date('j M, Y H:i:s',strtotime($message->replied_at));
								}}?>
                               </span>
                                </div>
                                
                            </div>
                            
                            <?php } ?>
                            
                            </div>
                    
                        
                   
            <?php } ?>
              
              <div id="remove-row">
                <button id="btn-more" data-id="{{ $message->msg_id }}" class="btn btn-primary col-lg-4 col-sm-offset-4" > Oude berichten </button>
            </div>
              
                            
             <div class="modal  modal-info" id="modal_default_3"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Bericht</h4>

                </div>

                 {!! Form::open(['url'=> 'admin/UpdateMessage']) !!}

                <div class="modal-body clearfix">

                    <div class="block">

    <input type="hidden" name="project_id"  id="project_id" />
   <input type="hidden" name="client_id" id="client_id"  />
   <input type="hidden" name="redirect" value="0"  />
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

                 {!! Form::open(['url'=> 'admin/AddMessage']) !!}

                <div class="modal-body clearfix">

                    <div class="block">

    <input type="hidden" name="project_id"  id="r_project_id" />
   <input type="hidden" name="client_id" id="r_client_id"  />
   <input type="hidden" name="redirect" value="0"  />
   <input type="hidden" name="msg_id" id="r_msg_id" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

	 <div class="col-md-12">
 <p>
 <span style="font-weight:bold">Contact Person: &nbsp;</span>
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