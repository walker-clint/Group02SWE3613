<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Crazy Leroy's Music</title>
        <meta name="description" content="description">
        <meta name="author" content="Crazy Leroy's Music">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
        <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
        <link href="plugins/select2/select2.css" rel="stylesheet">
        <link href="css/index_style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
            <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
            <![endif]-->
    </head>
    <body>
        <!--Start Header-->
        <header class="navbar-collapse">
            <div id="top-panel" class="container-fluid expanded-panel">
                <div class="row">
                    <div id="logo" class="col-xs-6 col-sm-6"><img src="img/cllogo_medium.png" class="img-responsive"/></div>
                    <br>
                    <ul class="nav navbar-nav pull-right panel-menu">
                        <li class="btn-label-right">
                            <div class="well-1 btn"> <a href="index.html">Home</a> </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!--End Header--> 
        <!--Start Middle-->
        <div id="main" class="container-fluid">

            <!--Start Content-->
            <div class="row">
                <div id="left-column" class="col-sm-4"></div>
                <div id="center1-column" class="col-sm-4">
                    <div class="well bs-component"> 
                        <!--<legend>LEFT COLUMN</legend>-->
                        <h1 align="center">Login</h1>
                        <div class="well-1 bs-component">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-4 control-label">User Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control-1" name="user_name" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input align="center" type="Password" class="form-control-1" name="password"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div align="center">
                                    <input class="btn" type="submit" value="Login"/>
                                </div>
                            </form>
                        </div>
                        <div class="well-1 bs-component">
                            <div align="center">
                                <h3>If you are a new user please register here:  <div class="btn" action="registration.php" method="POST">
                                    Register
                                </div></h3>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div id="right-column" class="col-sm-1"></div>
                <!--End Middle--> 

                <!--End Container--> 
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
                <!--<script src="http://code.jquery.com/jquery.js"></script>--> 
                <script src="plugins/jquery/jquery-2.1.0.min.js"></script> 
                <script src="plugins/jquery-ui/jquery-ui.min.js"></script> 
                <!-- Include all compiled plugins (below), or include individual files as needed --> 
                <script src="plugins/bootstrap/bootstrap.min.js"></script> 
                <script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script> 
                <script src="plugins/tinymce/tinymce.min.js"></script> 
                <script src="plugins/tinymce/jquery.tinymce.min.js"></script> 
                <!-- All functions for this theme + document.ready processing --> 
                <script src="js/devoops.js"></script>
                </body>
                </html>