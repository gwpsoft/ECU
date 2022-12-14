<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Alle Berichetn</title>
     <script>
$(document).ready(function(){
   $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
       $("#btn-more").html("Bezig met laden....");
       $.ajax({
           url : '{{ url("loaddata") }}',
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
   <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Alle Berichetn</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>
                                 <li>Messages</li>                              
                                <li class="active">Alle Berichetn</li>
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
              
              
              <div class="scroll" id="load-data">
              
              
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
                                            </a>
                                            <div class="media-body">
                                                <h6 class="media-heading"><?php echo Session::get('front_name'); ?></h6>
                                                <p><?=$message->message?></p>
                                                <p class="text-muted"><?=date('j M, Y H:i:s',strtotime($message->created_at))?></p>
                                          
                                                                                                                                        
                                            </div>                                            
                                        </li>
                                      <?php }  else {?>
                                       <li class="media">
                                            <a class="pull-right" href="#">
                                                <img class="media-object pull-right img-text" src="{{ URL::asset('assets/frontend/img/businessman2.png') }}" alt="<?php echo $GetCustomerName->name; ?>" width="64">
                                            </a>
                                            <div class="media-body">
                                                <h6 class="media-heading pull-right" style="margin-bottom:0px;"><?php echo $GetCustomerName->name; ?></h6>
                                                <br />
                                                <p style="text-align:right"><?=$message->message?></p>
                                                
                                                <p class="text-muted" style="text-align:right"><?=date('j M, Y H:i:s',strtotime($message->created_at))?></p>
                                          
                                                                                                                                        
                                            </div>                                            
                                        </li>
                                      
                                      <?php } }?>  
                                    </ul>                                    
                                </div>
              
              </div>
               <div id="remove-row">
                <button id="btn-more" data-id="{{ $message->msg_id }}" class="btn btn-primary col-lg-4" > Oude berichten </button>
            </div>
              
              
              
                 <a href="<?php echo URL:: to( 'Emp_messages' );?>" class="btn btn-success btn-large" style="float:right">Terug</a>
                
                 <div style="clear:both"></div>
                  <div style="margin-top:5%;"></div>
                 
                  
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>            
                
         
                
                
       @include('front/footer')
       
   