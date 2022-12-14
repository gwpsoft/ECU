<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>        
  <title>Login</title>    
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="icon" type="image/ico" href="favicon.html"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
  <link href="{{ URL::asset('assets/css/stylesheets.css') }}" rel="stylesheet" type="text/css" />      
    
  <!--  <script type='text/javascript' src='js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>    
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>    
    <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
    <script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
     <script type='text/javascript' src='js/plugins/datatables/jquery.dataTables.min.js'></script>
     <script type='text/javascript' src='js/plugins/select2/select2.min.js'></script>
    <script type='text/javascript' src='js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui-timepicker-addon.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-file-input.js'></script>
    <script type='text/javascript' src='js/plugins/knob/jquery.knob.js'></script>
    <script type='text/javascript' src='js/plugins/sparkline/jquery.sparkline.min.js'></script>
    <script type='text/javascript' src='js/plugins/flot/jquery.flot.js'></script>     
    <script type='text/javascript' src='js/plugins/flot/jquery.flot.resize.js'></script>    
    <script type='text/javascript' src='js/plugins.js'></script>    
    <script type='text/javascript' src='js/actions.js'></script>    
    <script type='text/javascript' src='js/charts.js'></script>
    <script type='text/javascript' src='js/settings.js'></script>-->
    
</head>

<body class="bg-img-num3"> 
    
    <div class="container">        

        <div class="login-block">
            <div class="block block-transparent">
                <div class="head">
                    <div class="user">
                    <div class="info user-change">
                       <img src="<?php echo url() ;?>/public/assets/img/example/user/dmitry_b.jpg" class="img-circle img-thumbnail"/>                        </div>
                    </div>
                </div>
                 
                {!! Form::open(['url'=> 'loginme']) !!}
                <div class="content controls npt">
                @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible">
                <b>Error!  </b> {{Session::get('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                <b>Success!  </b> {{Session::get('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                 
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="icon-key"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Email" name="email"/>                                 
                            </div>
                             <span class="error">  {{ $errors->first( 'email' , ':message' ) }}</span>
                        </div>
                    </div> 
                    
                     <div class="form-row">
                        <div class="col-md-12">
                    
                    <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="icon-lock"></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Password" name="password"/>                                  
                            </div>
                            <span class="error">  {{ $errors->first( 'password' , ':message' ) }}</span>
                     </div>
                    </div> 
                    
                    
                    <div class="form-row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6" align="right">
                    
                
                    
                     {!! Form::submit('Login', array('class'=>'btn btn-success')) !!} 
                    </div>
                    <div class="col-md-3"></div>
                    </div>                     
                    <!--<div class="form-row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-default btn-block btn-clean">Register</a>                                
                        </div>
                        <div class="col-md-6">
                        
                            
                            <a href="login" class="btn btn-default btn-block btn-clean">Log In</a>
                        </div>
                    </div>-->
                   <!-- <div class="form-row">                            
                        <div class="col-md-12">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                    </div> -->                        
                   
                                      
                </div>
            {!! Form::close() !!}
            </div>
        </div>

    </div>
</body>
</html>