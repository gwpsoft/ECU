 @include('front/header')
 <title>Easy Clean Up | Login</title>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://demos.thesoftwareguy.in/form-wizard-jquery-bootstrap/jquery.validate.js"></script>
    <div class="page-content">
                
                <!-- page content wrapper -->
                <div class="page-content-wrap bg-light">
                    <!-- page content holder -->
                    <div class="page-content-holder no-padding">
                        <!-- page title -->
                        <div class="page-title">                            
                            <h1>Login</h1>
                            <!-- breadcrumbs -->
                            <ul class="breadcrumb">
                                <li><a href="<?php echo URL:: to( '/' );?>">Home</a></li>
                                <li class="active">Login</li>
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
                    
                    
                  {!! Form::open(['url'=> 'checklogin']) !!}
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
       
        <div id="sf1" class="frm">
       
      
        </div>
         <div class="col-md-12">
         <div class="col-md-3">
         </div> 
        <div class="col-md-6">
        <div class="form-group">
        <label>E-Mail <span class="text-hightlight">*</span></label>
        <input type="text" class="form-control" id="email" name="email"/>
        </div>
        </div>
        </div>
         <div class="col-md-12">
          <div class="col-md-3">
         </div>  
        <div class="col-md-6">
        <div class="form-group">
        <label>Password <span class="text-hightlight">*</span></label>
        <input type="password" class="form-control" id="password" name="password"/>
        </div>
        </div>
        </div>
      
        
        <div class="clearfix" style="height: 10px;clear: both;"></div>
        
        <div class="form-group">
        <div class="col-md-12" >
         <div class="col-md-3">
         </div> 
          <div class="col-md-6"><center>
        <input class="btn btn-primary open3 " type="submit" name="login" value="Login">
        </center>
        </div>
        </div>
        </div>
     
        </div>
      </form>
      <div style="clear:both"></div>
	  <div>
        </div>
        <!-- ./page content holder -->
    </div>
    <!-- ./page content wrapper -->   
    
</div>
<br />
@include('front/footer')