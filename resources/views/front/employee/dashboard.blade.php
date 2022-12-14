
<!-- Header -->
    @include('front/header')
    <title>Easy Clean Up | Dashboard</title>
   <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Dashboard</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'dashboard' );?>">Home</a></li>                              
                                <li class="active">Dashboard</li>
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
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                    <b>Success!</b> {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    </div>
                    @endif
    
    			 <div class="col-md-12">
               <h5>Welcome <?=@$username?>.!</h5>
                </div>
                <div style="margin:5%;"></div> 
                 <div class="col-md-12">
                 
                
               
                 
                
                
       <div class="col-md-2">                
        <div class="block block-drop-shadow">
            <div class="user bg-default bg-light-rtl thumbs">
            <a href="<?php echo URL:: to( 'Planning' ); ?>" title="Planning Personeel">
                <div class="info">                                       
                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/planning.png') }}">
                </div>
                </a>
            </div>
           <!-- <div class="content list-group" align="center">
            <a class="list-group-item" href="<?php echo URL:: to( 'Planning' ); ?>">Projects</a>
            </div> -->               
   		</div>
	</div>         
     
                
       <div class="col-md-2">                
        <div class="block block-drop-shadow">
            <div class="user bg-default bg-light-rtl thumbs">
            <a href="<?php echo URL:: to( 'Emp_messages' ); ?>" title="Brichten Personeel">
                <div class="info">                                       
                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/chat_frnt.png') }}">
                </div>
                </a>
            </div>
           <!-- <div class="content list-group" align="center">
            <a class="list-group-item" href="<?php echo URL:: to( 'Emp_messages' ); ?>">Projects</a>
            </div> -->               
   		 </div>
	</div>   
    
    
        
    
    
         
                
                
                 <div class="col-md-2">                
        <div class="block block-drop-shadow">
            <div class="user bg-default bg-light-rtl thumbs">
            <a href="<?php echo URL:: to( 'logout' ); ?>" title="Logout">
                <div class="info">                                       
                    <img class="img-border img-thumbnail" src="{{ URL::asset('assets/frontend/img/logout.png') }}">
                </div>
                </a>
            </div>
         <!--   <div class="content list-group" align="center">
            <a class="list-group-item" href="<?php echo URL:: to( 'logout' ); ?>">Logout</a>
            </div>  -->              
   		</div>
	</div> 
                 
                 </div>
    
                
      </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>            
                
</div>                
                
                
                
                
                
                
                
                
                
                
       @include('front/footer')