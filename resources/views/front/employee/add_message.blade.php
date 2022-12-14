
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Message Details</title>
    
   <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Add New Message</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>
                                 <li>Messages</li>                              
                                <li class="active">Add New Message</li>
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
              
                 <a href="<?php echo URL:: to( 'Emp_messages' );?>" class="btn btn-success btn-large" style="float:right">Back</a>
                
                 <div style="clear:both"></div>
                  <div style="margin-top:5%;"></div>
                 
                  <div class="col-md-12">
                    {!! Form::open(['url'=> 'send-permessage']) !!}
                   <div class="form-group">
        <label>Bericht <span class="text-hightlight">*</span></label>
        <input type="hidden" name="client_id" value="<?=Session::get('front_userID');?>" />
       <!-- <input type="hidden" name="project_id" value="<?=Session::get('ProjectID');?>" />-->
        <input type="hidden" name="sender_id" value="<?=Session::get('contact_id');?>" />
        <textarea name="message" class="form-control" rows="6" required="required"></textarea>
        
        </div>
         <div class="col-md-2">&nbsp;</div>
         
                            {!! Form::submit('Verzenden', ['class' => 'btn btn-warning col-md-3','name' => 'Send']) !!}
                        <div class="col-md-2">&nbsp;</div>
                            
       
      </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>            
                
         
                
                
       @include('front/footer')
       
   