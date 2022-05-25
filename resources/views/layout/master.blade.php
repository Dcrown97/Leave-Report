<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->


<!-- Mirrored from www.einfosoft.com/templates/admin/smart/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 10:58:22 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="SmartUniversity" />
    <title>Smart University | Bootstrap Responsive Admin Template</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="../leave_report/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../leave_report/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../leave_report/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
    <link href="../leave_report/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="../leave_report/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../leave_report/assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="../leave_report/assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="../leave_report/assets/css/material_style.css">
    <!-- inbox style -->
    <link href="../leave_report/assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme Styles -->
    <link href="../leave_report/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components"
        type="text/css" />
    <link href="../leave_report/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="../leave_report/assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="../leave_report/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../leave_report/assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="https://www.einfosoft.com/templates/admin/smart/source/assets/img/favicon.ico" />
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->

        <!-- end header -->
        <!-- start color quick setting -->

        <!-- end color quick setting -->
        <!-- start page container -->
        <div class="page-container">
            <!-- start sidebar menu -->
            <div class="sidebar-container">
                <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                    <div id="remove-scroll" class="left-sidemenu">
                        <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                            data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="sidebar-user-panel">
                                <div class="sidebar-user">
                                    <div class="sidebar-user-picture">
                                        <img alt="image"
                                            src="https://www.allthetests.com/quiz22/picture_thumb/pic_1171831236_1.png?1592828498">
                                    </div>
                                    <div class="sidebar-user-details">
                                        <div class="user-name">{{ Auth::user()->name }}</div>
                                        <div class="user-role">Administrator</div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item start active open">
                                <a href="/" class="nav-link nav-toggle">
                                    <i data-feather="airplay"></i>
                                    <span class="title">Dashboard</span>
                                    {{-- <span class="selected"></span>
                                    <span class="arrow open"></span> --}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i data-feather="user"></i>
                                    <span class="title">Staffs</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="/add_staffs" class="nav-link "> <span class="title">Add
                                                Staffs</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/all_staffs" class="nav-link "> <span class="title">All
                                                Staffs</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle"> <i data-feather="coffee"></i>
                                    <span class="title">Leave</span> <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="/staffs_on_leave" class="nav-link "> <span
                                                class="title">Staffs On Leave</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/leave_request" class="nav-link "> <span
                                                class="title">Request Leave</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/add_leave_type" class="nav-link "> <span
                                                class="title">Add Leave Type</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/logout">
                                    <i class="icon-logout"></i> Log Out </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end sidebar menu -->
            <!-- start page content -->
        </div>

        @yield('content')
        <!-- end page container -->
        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; Smart University Theme By
                <a href="mailto:redstartheme@gmail.com" target="_top" class="makerCss">Redstar Theme</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="../leave_report/assets/plugins/jquery/jquery.min.js"></script>
    <script src="../leave_report/assets/plugins/popper/popper.js"></script>
    <script src="../leave_report/assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
    <script src="../leave_report/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../leave_report/assets/plugins/feather/feather.min.js"></script>
    <!-- bootstrap -->
    <script src="../leave_report/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../leave_report/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="../leave_report/assets/plugins/sparkline/jquery.sparkline.js"></script>
    <script src="../leave_report/assets/js/pages/sparkline/sparkline-data.js"></script>
    <!-- Common js-->
    <script src="../leave_report/assets/js/app.js"></script>
    <script src="../leave_report/assets/js/layout.js"></script>
    <script src="../leave_report/assets/js/theme-color.js"></script>
    <!-- material -->
    <script src="../leave_report/assets/plugins/material/material.min.js"></script>
    <!--apex chart-->
    <script src="../leave_report/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="../leave_report/assets/js/pages/chart/apex/home-data.js"></script>
    <!-- summernote -->
    <script src="../leave_report/assets/plugins/summernote/summernote.js"></script>
    <script src="../leave_report/assets/js/pages/summernote/summernote-data.js"></script>
    <!-- end js include path -->
</body>


<!-- Mirrored from www.einfosoft.com/templates/admin/smart/source/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 May 2022 10:59:18 GMT -->

</html>
