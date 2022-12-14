<!DOCTYPE html>
<html lang="en">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />    
    <link href="{{ URL::asset('assets/frontend/css/styles.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ URL::asset('assets/frontend/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/frontend/css/fontawesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/frontend/css/animate/animate.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ URL::asset('assets/css/jquery-confirm.css') }}" rel="stylesheet" type="text/css" />
     
      <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
       
        <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/plugins/mixitup/jquery.mixitup.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/plugins/appear/jquery.appear.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/frontend/js/actions.js') }}"></script> 

    
</head>
<body> 
    
   <div class="page-container">
            
            <!-- page header -->
            <div class="page-header">
                
                <!-- page header holder -->
                <div class="page-header-holder">
                    
                    <!-- page logo -->
                    <div class="" style="float: left;padding: 15px 0;">
                        <h3><a href="<?php echo URL:: to( '/' );?>">ECU System</a></h3>
                    </div>
                    <!-- ./page logo -->
                    <!-- search -->
                    <!--<div class="search">
                        <div class="search-button"><span class="fa fa-search"></span></div>
                        <div class="search-container animated fadeInDown">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>-->
                    <!-- ./search -->

                    <!-- nav mobile bars -->
                    <div class="navigation-toggle">
                        <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    <!-- ./nav mobile bars -->
                    
                    <!-- navigation -->
                    <ul class="navigation">
                    
                      
                     <!--   <li>
                            <a href="#">Pages</a>
                            <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                            <ul>
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog-post.html">Blog Post</a></li>                                
                            </ul>
                        </li>
                        <li>
                            <a href="#">Portfolio</a>
                            <ul>
                                <li><a href="portfolio-with-title.html">Portfolio With Title</a></li>
                                <li><a href="portfolio-2column.html">Portfolio 2 Column</a></li>
                                <li><a href="portfolio-3column.html">Portfolio 3 Column</a></li>
                                <li><a href="portfolio-4column.html">Portfolio 4 Column</a></li>
                            </ul>
                        </li>-->
                        
                        <?php if (Session::get('front_userID') =='') {?>
                          <li><a href="<?php echo URL:: to( '/' );?>">Home</a></li>
                          <li><a href="<?php echo URL:: to( '/admin' );?>">Admin</a></li>
                          <!--<li><a href="<?php echo URL:: to( 'Services' );?>">Toegewijde Diensten</a></li>
                          <li><a href="<?php echo URL:: to( 'applicant' );?>">Aanvrager</a></li>-->
                        <!--<li><a href="<?php //echo URL:: to( 'login' );?>">Login</a></li>-->
                        <li><a href="http://easycleanup.nl">ECU Website</a></li>
                        <?php } else {?>
                         <li><a href="<?php echo URL:: to( 'welcome' );?>">Welcome</a></li>
                        <li><a href="<?php echo URL:: to( 'logout' );?>">Logout</a></li>
                        <?php } ?>
                    </ul>
                    <!-- ./navigation -->                        

                    
                </div>
                <!-- ./page header holder -->
                
            </div>
            <!-- ./page header -->