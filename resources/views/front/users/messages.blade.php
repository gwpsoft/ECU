
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Messages</title>
  
    <script> 

function Reply (msg_id) {
	
			client_id = $('#client_'+msg_id).val();
			project_id = $('#project_'+msg_id).val();
			msg	 = $('#msg_'+msg_id).val();
			$('#r_project_id').val(project_id);
			$('#r_client_id').val(client_id);
			//$('#r_post_desc').val(msg);
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
	
	//alert (msg_id);
	
			$('#modal_default_3').modal('show');
	
	 return false;
	
}
</script>
    
    
   <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Messages</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>                              
                                <li class="active">Messages</li>
                            </ul>               
                            <!-- ./breadcrumbs -->
                        </div>
                        <!-- ./page title -->
                    </div>
                    <!-- ./page content holder -->
                </div>
                
                  <!-- page content wrapper -->
                <div class="page-content-wrap">                    
                    
                    <div class="divider"><div class="box"><span class="fa fa-angle-down"></span></div></div>                    
                    
                    <!-- page content holder -->
                    <div class="page-content-holder">
                    
                    
                     <div class="col-md-12">
    			  <div class="content controls npt">
                @if (Session::has('error'))
                <div class="alert alert-danger">
                <b>Error!  </b> {{Session::get('error')}}
                <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
                @endif
                
                @if (Session::has('success'))
                <div class="alert alert-success">
                <b>Success!  </b> {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
                @endif
                <div style="margin:1%;"></div> 
                 <div class="col-lg-12">
                <a href="<?php echo URL:: to( 'add_messages/'. Session::get('ProjectID') );?>" title="Berichten" class="btn btn-success" style="float:right">
               Nieuw bericht</a>
               <br /><br />
                <table  id="example" class="table table-striped" style="font-size:12px;" >
                <colgroup>
          <col class="col-md-1">
          <col class="col-md-2">  
           <col class="col-md-4">
           <col class="col-md-1">        
            <col class="col-md-2">
             <col class="col-md-3">
        </colgroup>
                	<thead>
<tr>
<th>ID</th>
<th>Naam Afzender</th>
<th>Berichten</th>
<th>Staat</th>
<th>Gemaakt bij</th>
<th>Options</th>
</tr>
</thead>
   <tbody> 
   <?php $i =0;foreach ($GetProjectMessages as $Message) { $i++;
   if ($Message->user_view == 0) {$bold = 'style="font-weight:bold;"';} else {$bold = '';}
   $GetCustomerName = DB::table('users')->where('id',$Message->sender_id)->first();
    if (Session::get('contact_id') == $Message->sender_id) {
	
	$Name = Session::get('front_name'); 
		
	} else {
		$Name = $GetCustomerName->name;
	}
   ?>
   <tr <?=$bold?>>
  	<td><?php echo $Message->msg_id?></td>
    <td><?php  echo $Name?></td>
   <td style="text-align:left">{{ str_limit($Message->message, $limit = 70, $end = '...') }}</td>
  
    <td>
    <?php  if ($Message->status == "") { ?>
    <span class="label label-danger">Nieuw</span>
    <?php }  if ($Message->status == 1)  {?>
    <span class="label label-warning">Gezien</span>
    <?php } if ($Message->status == 0 && $Message->status != "")  { ?>
    <span class="label label-success">Antwoord</span>
	<?php } ?>
    </td>
    <td><?=date('j M, Y H:i:s',strtotime($Message->created_at))?></td>
   <td>
   
    <input type="hidden" id="msg_<?php echo $Message->msg_id?>" value="<?php echo $Message->message?>" />
    <input type="hidden" id="client_<?php echo $Message->msg_id?>" value="<?php echo $Message->client_id?>" />
    <input type="hidden" id="project_<?php echo $Message->msg_id?>" value="<?php echo $Message->project_id?>" />
    
   
   
   <a href="<?php echo URL:: to( 'view-message/'. $Message->msg_id );?>" title="Bericht"><span class="fa fa-chat"></span><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/chat.png') }}" style="width:30px; height:30px;"></a>

   <?php if ($Message->sender_id == Session::get('contact_id')) {?>
   
         <a href="<?php echo URL:: to( 'Del_message/'. $Message->msg_id );?>" title="Verwijderen" onclick="return confirm('Bent u zeker dat u dit wilt Werknemer verwijderen?');"><span class="fa fa-remove"></span><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/remove.png') }}" style="width:30px; height:30px;"></a>
<a href="#" onclick="Edit('<?php echo $Message->msg_id?>')" title="Bewerk"><span class="fa fa-chat"></span><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/edit.png') }}" style="width:30px; height:30px;"></a>

   <?php } else {
   if (empty($Message->replied_by)) { ?>
    <a href="#" onclick="Reply('<?php echo $Message->msg_id?>')" title="Antwoord" class="widget-icon"><span class="icon-reply"></span><img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/reply.png') }}" style="width:30px; height:30px;"></a>

   <?php } }?>
   
</td>
     </tr>           
     <?php } ?>           
      </tbody>          
                </table>
               
                 </div>                
      </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
  <div class="modal  modal-info" id="modal_default_3"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Bericht</h4>

                </div>

                 {!! Form::open(['url'=> 'UpdateMessage']) !!}

                <div class="modal-body clearfix">

                    <div class="block">

    <input type="hidden" name="project_id"  id="project_id" />
   <input type="hidden" name="client_id" id="client_id"  />
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

    {!! Form::submit('Antwoord', ['class' => 'btn btn-success col-lg-3 col-md-3 col-sm-12 col-lg-offset-3', 'name' => 'Reply']) !!}
    <button type="button" class="btn btn-danger col-lg-3 col-md-3 col-sm-12" data-dismiss="modal">Close</button>

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

                 {!! Form::open(['url'=> 'send-message']) !!}

                <div class="modal-body clearfix">

                    <div class="block">

    <input type="hidden" name="project_id"  id="r_project_id" />
   <input type="hidden" name="client_id" id="r_client_id"  />
   <input type="hidden" name="msg_id" id="r_msg_id" />
   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />

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
    <button type="button" class="btn btn-danger col-lg-3 col-md-3 col-sm-12" data-dismiss="modal">Close</button>

</div>
                 {!! Form::close() !!} 

            </div>

        </div>

    </div>     
</div>            
                
</div>       
                
       @include('front/footer')
    <link href="{{ URL::asset('assets/frontend/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />  
 <style>
.table th { text-align:center; background-color:#428bca; color:#fff;}
.table td { text-align:center; }
label { font-weight:normal;}
.dataTables_filter input {
display: inline;
width: 70%;
height: 34px;
padding: 6px 12px;
font-size: 14px;
line-height: 1.42857143;
border: 1px solid #ccc;
transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);}


</style>       
   
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
  <script>
 $(document).ready(function(){
    $('#example').DataTable({"aaSorting": [[ 0, "desc" ]],
	"oLanguage": {
  "sSearch": "<span>Zoeken:</span> _INPUT_" //search
}
	});
});
  </script>