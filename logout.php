 
<!DOCTYPE html>
<html lang="en">
<head>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
session_start();
/* 
Created By Adam Khoury @ www.flashbuilding.com 
-----------------------June 20, 2008----------------------- 
*/
session_unset();
session_destroy(); 
if(! isset( $_SESSION['id'] )){ 
$msg = "You are now logged out";
} else {
$msg = "<h2>could not log you out</h2>";
exit();
} 
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
                         <div><?php echo "$msg"; ?><br>
<p><a href="http://group02.swe3613.com/">Click here</a> to return to our home page </p>
                        </div>
                    </div>
                </div>
               
                <div id="right-column" class="col-sm-4"></div>
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