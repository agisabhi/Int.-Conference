<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/logoisceer.png">
    <!-- Pignose Calender -->
    <link href="/template/theme/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/template/theme/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/template/theme/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/template/theme/plugins/toastr/css/toastr.min.css" rel="stylesheet">
    <link href="/template/theme/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
    <link href="/template/theme/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <br>
                <span class="brand-title">
                    <center><img src="/logoisceer.png" alt="" width="130px" height="60px"></center>
                </span>

            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>

                <div class="header-right">
                    <ul class="clearfix">


                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <center><i class="icon-user"></i> <span><?= $namauser; ?></span></center>
                                        </li>
                                        <div class="toastr m-t-15">
                                        <li><a href="/auth/logout" id="toastr-logout" class="btn btn-info m-b-10 m-l-5"><i class="icon-key" ></i> <span>Logout</span></a></li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="/user" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Abstract</span>
                        </a>

                    </li>

                    <li>
                        <a class="has-arrow" href="/user/summary" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i> <span class="nav-text">Summary</span>
                        </a>

                    </li>
                    <li>
                        <a class="has-arrow" href="/user/download" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i> <span class="nav-text">Download</span>
                        </a>

                    </li>


                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <?= $this->renderSection('contentuser'); ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy;Developed by Tim Publikasi Internasional UNIKOM 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    
    
    <script src="/template/theme/plugins/common/common.min.js"></script>
    <script src="/template/theme/js/custom.min.js"></script>
    <script src="/template/theme/js/settings.js"></script>
    <script src="/template/theme/js/gleek.js"></script>
    <script src="/template/theme/js/styleSwitcher.js"></script>
    <script src="/template/theme/plugins/toastr/js/toastr.min.js"></script>
  <script src="/template/theme/plugins/toastr/js/toastr.init.js"></script>
    
    <script src="/template/theme/plugins/sweetalert/js/sweetalert.init.js"></script>  
    <script src="/template/theme/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="/template/theme/plugins/validation/jquery.validate.min.js"></script>
<script src="/template/theme/plugins/validation/jquery.validate-init.js"></script>
    




</body>

</html>