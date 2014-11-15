
<?php
$errorMsg = "";
session_start();
include_once "connect_to_mysql.php";
//if ($_POST['user_name']) {
if ($_SESSION['id'] != NULL) {
    //Connect to the database through our include
    echo "inside session login php start";
    $user_name = ereg_replace("[^A-Za-z0-9]", "", $_POST['username']);
    $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
    $sql = mysql_query("SELECT * FROM tbl_user WHERE login='$user_name' AND password='$password'");
    $login_check = mysql_num_rows($sql);
    if ($login_check > 0) {
        while ($row = mysql_fetch_array($sql)) {
            // Use the AYAH object to see if the user passed or failed the game.
            // Get member ID into a session variable
            $id = $row["user_id"];
            $_SESSION['id'] = $id;
            // Get member username into a session variable
            $user_name = $row["login"];
            $_SESSION['login'] = $user_name;
            $is_admin = $row["admin"];
            $_SESSION['is_admin'] = $is_admin; //checks if user is an administrator or regular user
            header("location: main_menu.php");
            //exit();
        } // close while
    } else {
        $errorMsg .= "The username or password you entered is incorrect<br />";
    }
}// close if post
// Close else after database duplicate field value checks
// Close else after missing vars check
//Close if $_POST
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
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
                            <form class="form-horizontal"  method="POST" name="logform" id="logform" action="login.php" >
                                <font color="#FF0000"><?php echo "$errorMsg"; ?></font> <br>
                                <div class="form-group">
                                    <label for="user_name" class="col-lg-4 control-label">User Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" name="username" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input align="center" type="Password" class="form-control" name="password"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div align="center">
                                    <input class="btn btn-primary" type="submit" value="Login"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Content-->
                <div id="right-column" class="col-sm-4"></div>
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