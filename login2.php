<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; ?>
    </head>
    <body>
        <!--Start Header-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
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
                            <form class="form-horizontal" action="php/loginService.php" method="post">
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-4 control-label">User Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control-1" name="username" placeholder="User Name">
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
                                    <input type="submit" value="Login"/>
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