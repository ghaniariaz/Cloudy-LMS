
<!DOCTYPE html>
<!-- 
Welcome to Cloud LMS
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>@yield('pagetitle', 'Welcome') - Cloud LMS</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <meta name="MobileOptimized" content="320">
   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="@yield('nesting')../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="@yield('nesting')../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <link href="@yield('nesting')../assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN PAGE LEVEL STYLES -->
   <link rel="stylesheet" type="text/css" href="@yield('nesting')../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
   <!-- END PAGE LEVEL STYLES -->
   <!-- BEGIN THEME STYLES --> 
   <link href="@yield('nesting')../assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="@yield('nesting')../assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="@yield('nesting')../assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="@yield('nesting')../assets/css/plugins.css" rel="stylesheet" type="text/css"/>
   <link href="@yield('nesting')../assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="@yield('nesting')../assets/css/pages/profile.css" rel="stylesheet" type="text/css" />
   <link href="@yield('nesting')../assets/css/custom.css" rel="stylesheet" type="text/css"/>
   @yield('style')
   <!-- END THEME STYLES -->
   <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
   <!-- BEGIN HEADER -->   
   <div class="header navbar navbar-inverse navbar-fixed-top">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="header-inner">
         <!-- BEGIN LOGO -->  
         <a class="navbar-brand" href="index.html">
         <img src="@yield('nesting')../assets/img/logo.png" alt="logo" class="img-responsive" />
         </a>
         <!-- END LOGO -->
         <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
         <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
         <img src="@yield('nesting')../assets/img/menu-toggler.png" alt="" />
         </a> 
         <!-- END RESPONSIVE MENU TOGGLER -->
         <!-- BEGIN TOP NAVIGATION MENU -->
         <ul class="nav navbar-nav pull-right">
            
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
               <img alt="" src="http://www.gravatar.com/avatar/{{{ md5( strtolower( trim( Auth::User()->email ) ) ) }}}?s=20"/>
               <span class="username"> &nbsp;{{{ Auth::User()->name }}}</span>
               <i class="icon-angle-down"></i>
               </a>
               <ul class="dropdown-menu">
<!--                   <li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a>
                  </li>
                  <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox <span class="badge badge-danger">3</span></a>
                  </li>
 -->                
                  <!-- <li class="divider"></li> -->
                  <li><a href="@yield('nesting')../logout"><i class="icon-key"></i> Log Out</a>
                  </li>
               </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
         </ul>
         <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <div class="clearfix"></div>
   <!-- BEGIN CONTAINER -->   
   <div class="page-container">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar navbar-collapse collapse">
         <!-- BEGIN SIDEBAR MENU -->        
         <ul class="page-sidebar-menu">
            <li>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
               <div class="sidebar-toggler hidden-phone"></div>
               <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li>
               <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
               <form class="sidebar-search" action="extra_search.html" method="POST">
                  <div class="form-container">
                     <div class="input-box">
                        <a href="javascript:;" class="remove"></a>
                        <input type="text" placeholder="Search..."/>
                        <input type="button" class="submit" value=" "/>
                     </div>
                  </div>
               </form>
               <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            
            
        <li class="active ">
               <a href="javascript:;">
               <i class="icon-home"></i> 
               <span class="title">Home</span>
               <span class="selected"></span>
               <span class="arrow open"></span>
               </a>
            </li>
            
            
            <li class="last ">
            <a href="layout_blank_page.html">
               <!--<a href="javascript:;">-->
               <i class="icon-pencil"></i> 
               <span class="title">Attendance</span>
         
               </a>
               
            </li>
      
      
       <li>
               <a class="active" href="javascript:;">
               <i class="icon-book"></i>   <!--  Put a good logo here -->
               <span class="title">Courses</span>
               <span class="arrow "></span>
               </a>
               <ul class="sub-menu">
                  <li>
                     <a href="javascript:;">
                     First Grade Maths
                     <span class="arrow"></span>
                     </a>
                     <ul class="sub-menu">
                        <li><a href="page_timeline.html">Lectures</a></li>
                        <li><a href="#">Threads</a></li>
                        <li><a href="#">Grades</a></li>
                     </ul>
                  </li>
                  <li>
                     <a href="javascript:;">
                     First Grade Arts
                     <span class="arrow"></span>
                     </a>
                  
                         <ul class="sub-menu">
                        <li><a href="#">Lectures</a></li>
                        <li><a href="#">Threads</a></li>
                        <li><a href="#">Grades</a></li>
                     </ul>
                  
                  </li>
                  <li>
                     <a href="#">
                     Second Grade Islamiat
                     </a>
                  </li>
               </ul>
            </li>
            <li>
            <li class="last ">
               <a href="charts.html">
               <i class="icon-bar-chart"></i> 
               <span class="title">Account Settings</span>
               </a>
            </li>
         </ul>
         <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div class="page-content">
         @yield('content')
      </div>
      <!-- END PAGE -->    
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="footer">
      <div class="footer-inner">
         2013 &copy; Metronic by keenthemes.
      </div>
      <div class="footer-tools">
         <span class="go-top">
         <i class="icon-angle-up"></i>
         </span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN CORE PLUGINS -->   
   <!--[if lt IE 9]>
   <script src="@yield('nesting')../assets/plugins/respond.min.js"></script>
   <script src="@yield('nesting')../assets/plugins/excanvas.min.js"></script> 
   <![endif]-->   
   <script src="@yield('nesting')../assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
   <script src="@yield('nesting')../assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>    
   <script src="@yield('nesting')../assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="@yield('nesting')../assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
   <script src="@yield('nesting')../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="@yield('nesting')../assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
   <script src="@yield('nesting')../assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
   <script src="@yield('nesting')../assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script type="text/javascript" src="@yield('nesting')../assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="@yield('nesting')../assets/scripts/app.js"></script>      
   <!-- END PAGE LEVEL SCRIPTS -->
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
   @yield('scripts')
   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>