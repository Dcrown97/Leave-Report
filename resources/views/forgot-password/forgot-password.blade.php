
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Leave Report" />
    <meta name="author" content="" />
    <title>Leave Report</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="../public/leave_report/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/leave_report/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/leave_report/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
    <link href="../public/leave_report/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="../public/leave_report/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/leave_report/assets/plugins/summernote/summernote.css" rel="stylesheet">
    <!-- Material Design Lite CSS -->
    <link rel="stylesheet" href="../public/leave_report/assets/plugins/material/material.min.css">
    <link rel="stylesheet" href="../public/leave_report/assets/css/material_style.css">
    <!-- inbox style -->
    <link href="../public/leave_report/assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme Styles -->
    <link href="../public/leave_report/assets/css/theme/light/theme_style.css" rel="stylesheet" id="rt_style_components"
        type="text/css" />
    <link href="../public/leave_report/assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/leave_report/assets/css/theme/light/style.css" rel="stylesheet" type="text/css" />
    <link href="../public/leave_report/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="../public/leave_report/assets/css/theme/light/theme-color.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
   <!--  <link rel="shortcut icon" href="https://www.einfosoft.com/templates/admin/smart/source/assets/img/favicon.ico" /> -->
</head>
<!-- END HEAD -->

<body

<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
    
             
               
            <div class="col-lg-12">


                <div class="white_box mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="modal-content cs_modal">
                                @include('flash.flash')
                                <div class="modal-header justify-content-center">
                                    <h5 class="modal-title text_white">Forgot Password</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        @csrf
                                        <div class="">
                                            <input type="email" class="form-control" name="email" placeholder="Enter your email">
                                        </div>
                                        <div>
                                            <button onclick="showLoading()" type="submit" class="btn btn-primary">SEND</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>