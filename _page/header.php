<?php
$display_name = "";
$toplinks = "";
require_once $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$indexLink = 'index.php';
$page = getCurrentPageURL();

//array of buttons to display on the page
$buttons = array();

//usable buttons, more are below after some values are set
$buttonSongList = '<li class="btn-label-right"><a href="user_song_list.php">'
        . '<div class="well-1 btn btn-primary">Your Song List</div></a></li>';
$buttonLogin = ' <li class="btn-label-right"><a data-toggle="modal" href="#myModal1">'
        . '<div class="well-1 btn btn-primary">Login</div></a></li>';
$buttonRegister = '<li class="btn-label-right"><a data-toggle="modal" href="#myModal2">'
        . '<div class="well-1 btn btn-primary">Register</div></a></li>';

if (!empty($_SESSION['user_id'])) {//logged in
    $id = $_SESSION['user_id'];

    $con = initializeConnection();
    $sql = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = '$id'");


    $full_name = '';
    while ($row = mysqli_fetch_array($sql)) {
        $full_name = $row["first_name"] . " " . $row["last_name"];
    }
    $indexLink = 'main_menu.php';

    if ($userType == 'admin') {
        $indexLink = 'admin_main_menu.php';
    }

    //these buttons need values set to work
    $buttonHome = '<li class="btn-label-right"><a href="' . $indexLink . '">'
            . '<div class="well-1 btn btn-primary">HOME</div></a></li>';
    $buttonLogOut = '<li class="btn-label-right"><a href="http://' . $_SERVER['SERVER_NAME'] . '/php/logoutService.php">'
            . '<div class="well-1 btn btn-warning">Log Out</div></a></li>';
    $buttonRefresh = '<li class="btn-label-right"><a href="' . $indexLink . '">'
            . '<div class="well-1 btn btn-primary">Refresh Page</div></a></li>';

    if ($page == "http://group02p2.swe3613.com/user_song_list.php") {
        if (!empty($full_name)) {
            $display_name = '<div align="center"> <h3>' . "Rock On! : " . $full_name . '</h3> </div>';
        }
        array_push($buttons, $buttonHome, $buttonLogOut);
    } else {
        if (!empty($full_name)) {
            $display_name = '<div align="center"> <h3>' . "Rock On! : " . $full_name . '</h3> </div>';
        }
        array_push($buttons, $buttonRefresh, $buttonSongList, $buttonLogOut);
    }
} else {//not logged in
    array_push($buttons, $buttonLogin, $buttonRegister);
}
?>

<header class="navbar-collapse">
    <div id="logo" class="col-xs-6 col-sm-6">
        <img src="img/cllogo_medium.png" class="img-responsive"/></a>
    </div>

    <div id="top-panel" class="container-fluid expanded-panel"><br>

        <div class="row">
            <div align="center">
                <?php echo $display_name . $toplinks; ?>
                <ul class="nav navbar-nav pull-right panel-menu">
                    <?php
                    foreach ($buttons as $button) {
                        echo $button;
                    }
                    ?>
                </ul>
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
        <?php
        if (empty($_SESSION['user_id'])) {
            require_once $_SERVER['DOCUMENT_ROOT'] . ("/_page/MyModal1.php");
            ?>
            <!--Modal 2 -->
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . ("/_page/MyModal2.php");
        }
        ?>
    </div>
</header>
