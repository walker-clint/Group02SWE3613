<?php
require $_SERVER['DOCUMENT_ROOT'] . '/php/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        session_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';


//        $error = $_SESSION['error'];
        $myusername = $_SESSION['myusername'];
        ?>
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
                            <form class="form-horizontal" action="php/loginService.php" method="POST">
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-4 control-label">User Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="User Name" value='<?php echo "$myusername" ?>' required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input align="center" type="Password" class="form-control" id="password" name="password"
                                               placeholder="Password" required>
                                    </div>
                                </div>
                                <div align="center">
                                    <input class="btn btn-primary" type="submit" value="Login"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Content-->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/footer.php'; ?>
            <div id="right-column" class="col-sm-4"></div>
        </div>
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