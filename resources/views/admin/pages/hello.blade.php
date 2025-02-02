@extends('app')
@section('content')

  <body class="bg-img-num1" data-settings="open"> 
    
    <div class="container">        
        <div class="row">                   
            <div class="col-md-12">
                
                 <nav class="navbar brb" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-reorder"></span>                            
                        </button>                                                
                        <a class="navbar-brand" href="index-2.html"><img src="img/logo.png"/></a>                                                                                     
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">                                     
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="index-2.html">
                                    <span class="icon-home"></span> dashboard
                                </a>
                            </li>                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-pencil"></span> forms</a>
                                <ul class="dropdown-menu">                                    
                                    <li><a href="form_elements.html">Form elements</a></li>
                                    <li><a href="form_editors.html">WYSIWYG</a></li>
                                    <li><a href="form_files.html">File handling</a></li>
                                    <li><a href="form_validation.html">Validation and wizard</a></li>
                                </ul>                                
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-cogs"></span> components</a>
                                <ul class="dropdown-menu">
                                    <li><a href="component_blocks.html">Blocks and panels</a></li>
                                    <li><a href="component_buttons.html">Buttons</a></li>
                                    <li><a href="component_modals.html">Modals and popups</a></li>                                    
                                    <li><a href="component_tabs.html">Tabs, accordion, selectable, sortable</a></li>
                                    <li><a href="component_progress.html">Progressbars</a></li>
                                    <li><a href="component_lists.html">List groups</a></li>
                                    <li><a href="component_messages.html">Messages</a></li>                                    
                                    <li>
                                        <a href="#">Tables<i class="icon-angle-right pull-right"></i></a>
                                        <ul class="dropdown-submenu">
                                            <li><a href="component_table_default.html">Default tables</a></li>
                                            <li><a href="component_table_sortable.html">Sortable tables</a></li>                                            
                                        </ul>
                                    </li>                                                                        
                                    <li>
                                        <a href="#">Layouts<i class="icon-angle-right pull-right"></i></a>
                                        <ul class="dropdown-submenu">
                                            <li><a href="component_layout_blank.html">Default layout(blank)</a></li>
                                            <li><a href="component_layout_custom.html">Custom navigation</a></li>
                                            <li><a href="component_layout_scroll.html">Content scroll</a></li>
                                            <li><a href="component_layout_fixed.html">Fixed content</a></li>
                                            <li><a href="component_layout_white.html">White layout</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="component_charts.html">Charts</a></li>
                                    <li><a href="component_maps.html">Maps</a></li>
                                    <li><a href="component_typography.html">Typography</a></li>
                                    <li><a href="component_gallery.html">Gallery</a></li>
                                    <li><a href="component_calendar.html">Calendar</a></li>
                                    <li><a href="component_icons.html">Icons</a></li>
                                    <li><a href="component_portlet.html">Portlet</a></li>
                                </ul>
                            </li>                          
                            <li><a href="widgets.html"><span class="icon-globe"></span> widgets</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-file-alt"></span> pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="sample_login.html">Login</a></li>
                                    <li><a href="sample_registration.html">Registration</a></li>
                                    <li><a href="sample_profile.html">User profile</a></li>
                                    <li><a href="sample_profile_social.html">Social profile</a></li>
                                    <li><a href="sample_edit_profile.html">Edit profile</a></li>
                                    <li><a href="sample_mail.html">Mail</a></li>
                                    <li><a href="sample_search.html">Search</a></li>
                                    <li><a href="sample_invoice.html">Invoice</a></li>
                                    <li><a href="sample_contacts.html">Contacts</a></li>
                                    <li><a href="sample_tasks.html">Tasks</a></li>
                                    <li><a href="sample_timeline.html">Timeline</a></li>
                                    <li>
                                        <a href="#">Email templates<i class="icon-angle-right pull-right"></i></a>
                                        <ul class="dropdown-submenu">
                                            <li><a href="email_sample_1.html">Sample 1</a></li>
                                            <li><a href="email_sample_2.html">Sample 2</a></li>
                                            <li><a href="email_sample_3.html">Sample 3</a></li>
                                            <li><a href="email_sample_4.html">Sample 4</a></li>
                                        </ul>
                                    </li>                                    
                                    <li>
                                        <a href="#">Error pages<i class="icon-angle-right pull-right"></i></a>
                                        <ul class="dropdown-submenu">
                                            <li><a href="sample_error_403.html">403 Forbidden</a></li>
                                            <li><a href="sample_error_404.html">404 Not Found</a></li>
                                            <li><a href="sample_error_500.html">500 Internal Server Error</a></li>
                                            <li><a href="sample_error_503.html">503 Service Unavailable</a></li>
                                            <li><a href="sample_error_504.html">504 Gateway Timeout</a></li>                                                                                       
                                        </ul>
                                    </li>                                    
                                </ul>
                            </li>                      
                            <li><a href="../front-end/index.html"><span class="icon-star"></span> Front-end Template</a></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="search..."/>
                            </div>                            
                        </form>                                            
                    </div>
                </nav>                

            </div>            
        </div>
  @stop