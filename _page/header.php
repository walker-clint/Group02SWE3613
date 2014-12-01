<?php
/**
 * The header loaded on all pages of the site.
 */
$display_name = "";
//$toplinks = "";
require_once $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$indexLink = 'index.php'; //default the "Index" or "Home" button to this var
//$page = getCurrentPageURL(); //get the name of the loading page
$page = basename($_SERVER['PHP_SELF']);

$buttons = array(); //array of buttons to display on the page
//usable buttons, more are below after some values are set
//the register button, opens registration modal, for non-logged in users
$buttonRegister = '<li class="btn-label-right"><a data-toggle="modal" href="#myModal2">'
        . '<div class="well-1 btn btn-primary">Register</div></a></li>';

//the login button, opens the login modal, for non-logged in users
$buttonLogin = ' <li class="btn-label-right"><a data-toggle="modal" href="#myModal1">'
        . '<div class="well-1 btn btn-primary">Login</div></a></li>';

//directs to the user's song list, for logged in users
$buttonSongList = '<li class="btn-label-right"><a href="user_song_list.php">'
        . '<div class="well-1 btn btn-primary">Your Song List</div></a></li>';

//the logout button, logs out the user, for logged in users
$buttonLogOut = '<li class="btn-label-right"><a href="http://' . $_SERVER['SERVER_NAME'] . '/php/logoutService.php">'
        . '<div class="well-1 btn btn-warning">Log Out</div></a></li>';

$buttonHome = '<li class="btn-label-right"><a href="' . $indexLink . '">'
        . '<div class="well-1 btn btn-primary">HOME</div></a></li>';

if (!empty($_SESSION['user_id'])) {//if logged in
    $id = $_SESSION['user_id']; //get the user's id so we can get their name
    $full_name = $_SESSION['full_name'];
    $indexLink = 'main_menu.php'; //at this point the user is a registered user, set indexLink

    if ($userType == 'admin') {
        $indexLink = 'admin_main_menu.php'; //if they are an admin link to admin page
    }

    //these buttons need $indexLink set to work
    //the home button, goes to the user's index page
    $buttonHome = '<li class="btn-label-right"><a href="' . $indexLink . '">'
            . '<div class="well-1 btn btn-primary">HOME</div></a></li>';
    //the refresh button, goes to the user's index page
    $buttonRefresh = '<li class="btn-label-right"><a href="' . $indexLink . '">'
            . '<div class="well-1 btn btn-primary">Refresh Page</div></a></li>';

    //the following if's set which buttons a user will see
    //if ($page == "http://group02p2.swe3613.com/user_song_list.php") {
    if (strpos($page, 'ser_song_list.php') > 0) {
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
    if (strpos($page, 'register.php') > 0) {
        $buttonRegister = $buttonHome;
    }else if (strpos($page, 'login.php') > 0) {
        $buttonLogin = $buttonHome;
    }
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
                <?php echo $display_name; ?>
                <ul class="nav navbar-nav pull-right panel-menu">
                    <?php
                    //display the buttons set above
                    foreach ($buttons as $button) {
                        echo $button;
                    }
                    ?>
                </ul>
            </div>
        </div>

        <?php
//This displays any feedback messages to the user in a pop-up box
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
        //we only load the login and register modals if a users isn't logged in
        if (empty($_SESSION['user_id'])) {
            require_once $_SERVER['DOCUMENT_ROOT'] . ("/_page/MyModal1.php");
            ?>
            <!--Modal 2 -->
            <?php
            $page = basename($_SERVER['PHP_SELF']);
            if (!strpos($page, 'egister.php') > 0) {
                require_once $_SERVER['DOCUMENT_ROOT'] . ("/_page/MyModal2.php");
            }
        }
        ?>
    </div>
</header>
