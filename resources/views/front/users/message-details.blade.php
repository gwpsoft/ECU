
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Message Details</title>
   <script>
$(document).ready(function(){
   $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
       $("#btn-more").html("Loading....");
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
                  $('#btn-more').html("No Data");
              }
           }
       });
   });  
}); 
</script> 
   <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Message Details</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>
                                 <li>Messages</li>                              
                                <li class="active">Message Details</li>
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
              
              
              
               <div class="text-column" >
                                    <h3>Messages</h3>
                                </div>
                                <div class="block" >
                                    <ul class="media-list">
                                     <?php 
							$counter=0;
							foreach ($All_Messages as $message) {
								$GetCustomerName = DB::table('users')->where('id',$message->sender_id)->first();
							$counter++;
							 if (Session::get('contact_id') == $message->sender_id) {?>
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-text" src="{{ URL::asset('assets/frontend/img/businessman.png') }}" alt="<?php echo Session::get('front_name') ; ?>" width="64">
                                            </a><br />
                                            <div class="media-body">
                                                <h6 class="media-heading"><?php echo Session::get('front_name'); ?></h6>
                                                <br />
                                                <p><?=$message->message?></p>
                                                <br />
                                                <p class="text-muted"><?=date('j M, Y H:i:s',strtotime($message->created_at))?></p>
                                          
                                                                                                                                        
                                            </div>                                            
                                        </li>
                                      <?php }  else {?>
                                       <li class="media">
                                            <a class="pull-right" href="#">
                                                <img class="media-object img-text" src="{{ URL::asset('assets/frontend/img/businessman2.png') }}" alt="<?php echo $GetCustomerName->name; ?>" width="64">
                                            </a><br />
                                            <div class="media-body">
                                                <h6 class="media-heading pull-right"><?php echo $GetCustomerName->name; ?></h6>
                                                <br />
                                                <p class="pull-right"><?=$message->message?></p>
                                                <br />
                                                <p class="text-muted pull-right"><?=date('j M, Y H:i:s',strtotime($message->created_at))?></p>
                                          
                                                                                                                                        
                                            </div>                                            
                                        </li>
                                      
                                      <?php } }?>  
                                    </ul>                                    
                                </div>
              
              
              
                 <a href="<?php echo URL:: to( 'messages/'.Session::get('ProjectID') );?>" class="btn btn-success btn-large" style="float:right">Back</a>
                
                 <div style="clear:both"></div>
                  <div style="margin-top:5%;"></div>
                 
                  <div class="col-md-12">
                    {!! Form::open(['url'=> 'send-message']) !!}
                   <div class="form-group">
        <label>Type Message <span class="text-hightlight">*</span></label>
        <input type="hidden" name="client_id" value="<?=Session::get('front_userID');?>" />
        <input type="hidden" name="project_id" value="<?=Session::get('ProjectID');?>" />
        <input type="hidden" name="sender_id" value="<?=Session::get('contact_id');?>" />
        <textarea name="message" class="form-control" rows="6" required="required"></textarea>
        
        </div>
         <div class="col-md-2">&nbsp;</div>
         
                            {!! Form::submit('Werkwijze', ['class' => 'btn btn-warning col-md-3','name' => 'Process']) !!}
                        <div class="col-md-2">&nbsp;</div>
                            {!! Form::submit('Antwoord', ['class' => 'btn btn-success col-md-3', 'name' => 'Reply']) !!}
       
      </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>            
                
         
                
                
       @include('front/footer')
       
   