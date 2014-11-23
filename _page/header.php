<?php
$display_name = "";
$toplinks = "";
require_once $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$indexLink = 'index.php';
session_start();
if (!empty($_SESSION['error'])) {
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $email = $_SESSION['email'];
    $secret_q = $_SESSION['secret_q'];
    $secret_a = $_SESSION['secret_a'];
    $myusername = $_SESSION['myusername'];
}

if (!empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];

    $con = initializeConnection();
    $sql = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = '$id'");
    $page = getCurrentPageURL();
//echo "Current URL: " . $page;
    $full_name = '';
    while ($row = mysqli_fetch_array($sql)) {
        $full_name = $row["first_name"] . " " . $row["last_name"];
    }
    $indexLink = 'main_menu.php';

    if ($userType == 'admin') {
        $indexLink = 'admin_main_menu.php';
    }
    if ($page == "http://group02p2.swe3613.com/user_song_list.php") {
        if ($full_name != "") {
            $display_name = '<div align="center"> <h3>' . "Rock On! : " . $full_name . '</h3> </div>';
        }
        $toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
            <li class="btn-label-right">
            <a href="' . $indexLink . '">
			<div class="well-1 btn btn-primary">
            HOME
            </div>
			</a>
            </li>
            <li class="btn-label-right">
			<a href="http://' . $_SERVER['SERVER_NAME'] . '/php/logoutService.php">
            <div class="well-1 btn btn-warning">
            Log Out
			</div>
			</a>
            </li>
            </ul>';
    } else {
        if ($full_name != "") {
            $display_name = '<div align="center"> <h3>' . "Rock On! : " . $full_name . '</h3> </div>';
        }
        $toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
            <li class="btn-label-right">
            <a href="' . $indexLink . '">
			<div class="well-1 btn btn-primary">
            Refresh Page
            </div>
			</a>
            </li>
             <li class="btn-label-right">
            <a href="user_song_list.php">
			<div class="well-1 btn btn-primary">
            ' . "Your Song List" . '
            </div>
			</a>
            </li>
            <li class="btn-label-right">
			<a href="http://' . $_SERVER['SERVER_NAME'] . '/php/logoutService.php">
            <div class="well-1 btn btn-warning">
            Log Out
			</div>
			</a>
            </li>
            </ul>';
    }
} else {
    $toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
            <li class="btn-label-right">
			<a data-toggle="modal" href="#myModal1">
            <div class="well-1 btn btn-primary">
            Login
            </div>
			</a>
            </li>
            <li class="btn-label-right">
			<a data-toggle="modal" href="#myModal2">
            <div class="well-1 btn btn-primary">
            Register
            </div>
			</a>
            </li>
            </ul>';
}
?>



<header class="navbar-collapse">
    <!--    <a href="/--><?php //echo '' . $indexLink;                     ?><!--">-->
    <div id="logo" class="col-xs-6 col-sm-6">
        <img src="img/cllogo_medium.png" class="img-responsive"/></a>
    </div>

    <div id="top-panel" class="container-fluid expanded-panel"><br>

        <div class="row">
            <div align="center">
                <?php echo $display_name . $toplinks; ?>
            </div>
        </div>

        <?php
        if (!empty($_SESSION['error'])) {
            ?><div class = "row">
                <div id = "center1-column" class = "col-sm-4"></div>
                <div id = "center1-column" class = "col-sm-4">
                    <div class = "well bs-component" align="center">
                        <strong><font color="#"><?php
                            echo$_SESSION['error'];
                            $_SESSION['error'] = '';
                            ?></font></strong>

                    </div>
                </div>
            </div><?php } ?>

        <!-- Modal 1 -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . ("/_page/MyModal1.php"); ?>

        <!-- Modal 2 -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . ("/_page/MyModal2.php"); ?>
    </div>
</header>
