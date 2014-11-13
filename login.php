<?php
$errorMsg = "";
session_start();
if ($_POST['user_name']) {


//Connect to the database through our include
    include_once "connect_to_mysql.php";
    $user_name = ereg_replace("[^A-Za-z0-9]", "", $_POST['user_name']);
    $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
    echo "<br>";
    echo "user name= $user_name";
    echo "<br>";
    echo "password= $password";
    $sql = mysql_query("SELECT * FROM tbl_user WHERE login='$user_name' AND password='$password'");
    $login_check = mysql_num_rows($sql);
    if ($login_check > 0) {
        while ($row = mysql_fetch_array($sql)) {
            // Use the AYAH object to see if the user passed or failed the game.
            // Get member ID into a session variable
            $id = $row["user_id"];
            $_SESSION['id'] = $id;
            echo "<br>";
            echo "id= $id";
            // Get member username into a session variable
            $user_name = $row["login"];
            $_SESSION['login'] = $user_name;

            //checks if user is an administrator or regular user
            if ($row["admin"] == 0) {
                echo "<br>";
                echo "admin login";
//                header('Location: http//group02p2.swe3613.com/admin ');
                header('Location: http://group02p2.swe3613.com/main_menu.php');

            } else {
                echo "<br>";
                echo "user login";
                header('Location: main_menu.php');

            }
            exit();
        } // close while
    } else {
        $errorMsg .= "The username or password you entered is incorrect<br />";
        echo "error message";
    }
}// close if post
?>
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
    <script type="text/javascript">
        <!--
        Form
        Validation -->

        <!--
        Form
        Validation -->
    </script>
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
                    <div class="well-1 btn">
                        <a href="index.html">Home</a>
                    </div>
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
        <div id="left-column" class="col-sm-3"></div>
        <div id="center-column" class="col-sm-6">
            <div class="well bs-component">
                <!--<legend>LEFT COLUMN</legend>-->


                <div class="col-sm-8">
                    <h1>Login</h1>
                    <div class="well-1 bs-component">
                        <form class="form-horizontal" action="login.php" method="post">
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

                            <div align="center"><input type="submit" value="Login"/></div>


                        </form>
                    </div>
                </div>

                <div class="col-sm-4">
                    <h1>Register</h1>
                    <div class="well-1 bs-component">
                        <FORM METHOD="LINK" ACTION="register.php">
                            <input align="center" type="submit" name="registration" value="Register">
                        </FORM>
                    </div>
                </div>


                <table>
                    <tr>
                        <td colspan="2"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></td>
                    </tr>
                    <form method="post" enctype="multipart/form-data" name="logform" id="logform">
                        <tr>
                            <td><input type="text" name="user_name" placeholder="Username" id="user_name"></td>
                        </tr>
                        <tr>
                            <td><input type="password" name="password" placeholder="Password" id="password"></td>
                        <tr>
                            <td><input type="submit" name="login" value="login">
                        </tr>
                    </form>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <FORM METHOD="LINK" ACTION="register.php">
                                <input type="submit" name="registration" value="Register">
                            </FORM>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="right-column" class="col-sm-3"></div>
    </div>
    <!--End Content-->

</div>
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
