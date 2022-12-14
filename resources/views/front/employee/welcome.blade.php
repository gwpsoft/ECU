
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
                            <h1>Welcome</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( 'welcome' );?>">Home</a></li>                              
                                <li class="active">Welcome</li>
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
    
    			 <div class="col-lg-12">
               <h5>Welcome <?=@$username?>.!</h5>
               <h6>Selecteer uw project. Employee</h6>
               
                </div>
                <div style="margin:2%;"></div> 
                 {!! Form::open(['url'=> 'dashboard']) !!}
                
               <div class="col-lg-8">
                  
                 <?php 
				 if (!empty($Projects)) {					 
					 foreach ($Projects as $Project) {
				 ?>	 
                 <div class="col-lg-4" style=" margin:10px; ">
                 <button type="submit" name="project" class="btn btn-warning btn-md" value="<?php echo $Project->Id; ?>"><?php echo $Project->Name;?></button>
                 
                 
					 
				 </div>
				 
				 
				 
					<?php  }}?>
                  
                 </div>
               </form>
    
    
    
    
    
    
    
    
    
    
    
    
                
      </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>            
                
</div>                
                
                
                
                
                
                
                
                
                
                
       @include('front/footer')