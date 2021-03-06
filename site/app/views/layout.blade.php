<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Project Management Tool</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for blank page layout" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">

        {{HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}
        {{HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}
        <!-- END GLOBAL MANDATORY STYLES -->

        {{HTML::style('assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css')}}
        {{HTML::style('assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css')}}

        
        <!-- BEGIN THEME GLOBAL STYLES -->
        {{HTML::style('assets/global/css/components.min.css')}}
        {{HTML::style('assets/global/css/plugins.min.css')}}
        <!-- END THEME GLOBAL STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->

        {{HTML::style('assets/layouts/layout/css/layout.min.css')}}
        {{HTML::style('assets/layouts/layout/css/themes/darkblue.min.css')}}
        {{HTML::style('assets/layouts/layout/css/custom.min.css')}}
        
        {{HTML::style('assets/admin/css/custom.css?v=1.0.7')}}

        
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.8.5/css/selectize.default.css">

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{url('favicon.ico')}}" /> </head>
    <!-- END HEAD -->

    <body class="login page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width" ng-app="myApp">
        
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    
                    <div class="page-logo" style="padding-top: 10px">
                        <a href="#">
                            <img src="{{url('/assets/img/schulms_logo-white.svg')}}" style="height: 36px; width: auto; ">
                        </a>
                    </div>

                    <div class="hor-menu hidden-sm hidden-xs">
                        <ul class="nav navbar-nav">
                            <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                            <li class="classic-menu-dropdown active" aria-haspopup="true">
                                <a href="{{url('/upload-file')}}"> Upload File
                                    
                                </a>
                            </li>
                            <!-- <li class="classic-menu-dropdown " aria-haspopup="true">
                                <a href="#"> Profile
                                    <span class="selected"> </span>
                                </a>
                            </li> -->
                            
                        </ul>
                    </div>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{(Auth::user()->profile_photo && Auth::user()->profile_photo != '')?url(Auth::user()->profile_photo):url('assets/img/avatar.jpg')}}" />
                                    <span class="username username-hide-on-mobile">{{(isset(Auth::user()->username))?Auth::user()->name:''}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{url('/change-password')}}">
                                            <i class="icon-user"></i> Change Password</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('/logout')}}">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->        

            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    
                    <div class="page-sidebar navbar-collapse collapse">
                        
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            {{$sidebar}}
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        {{$main}}
                        <!-- BEGIN PAGE TITLE-->
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            
            <!-- END FOOTER -->
        </div>

        <footer>
            <div class="text-center">
                <a href="#">Contact Us</a> &nbsp;|&nbsp; 
                <a href="#">Raise a ticket</a> &nbsp;|&nbsp; 
                <a href="#">Help</a>
            </div>
        </footer>

        <div id="modal1" class="modal fade in modal-overflow" data-width="480">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                  <div class="folders row">

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Pre Analysis</div>
                                </div>
                            </div>
                        </div>

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Kick Off</div>
                                </div>
                            </div>
                        </div>

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Status Check</div>
                                </div>
                            </div>
                        </div>

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Result Presentation</div>
                                </div>
                            </div>
                        </div>

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Coaching</div>
                                </div>
                            </div>
                        </div>

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Final Check</div>
                                </div>
                            </div>
                        </div>

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Best Practices</div>
                                </div>
                            </div>
                        </div>

                        <div class="item col-xs-6">
                            <div class="folder">
                                <div class="icon">
                                    <i class="fa fa-folder-o"></i>
                                </div>
                                <div class="text">
                                    <div>Photos</div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>

        </div>


        <script type="text/javascript">
            var base_url = "{{url('/')}}";
            var api_token = '{{Session::get('api_token')}}';
            console.log(api_token);
        </script>

        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {{HTML::script('assets/global/plugins/jquery.min.js')}}


        {{HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}

        {{HTML::script('assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js')}}
        {{HTML::script('assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js')}}
        
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        
        

        <!-- BEGIN ANGULAR SCRIPTS -->
        

        

        {{HTML::script('assets/admin/scripts/custom.js?version=1.0.7')}}
        
        

    </body>

</html>