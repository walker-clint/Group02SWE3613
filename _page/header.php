<header class="navbar-collapse">
    <div id="logo" class="col-xs-6 col-sm-6">
        <a href="index.php"><img src="img/cllogo_medium.png" class="img-responsive"/></a>
    </div>

    <div id="top-panel" class="container-fluid expanded-panel"><br>

        <?php
        $toplinks = "";
        require_once $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");

        if (!empty($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];

            $con = initializeConnection();
            $sql = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = '$id'");

            $full_name = '';
            while ($row = mysqli_fetch_array($sql)) {
                $full_name = "Welcome: " . $row["first_name"] . " " . $row["last_name"];
            }
            $indexLink='main_menu.php';
            if($userType=='admin'){
                $indexLink='admin_main_menu.php';
            }
            
            $toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
             <li class="btn-label-right">
            <div class="well-1 btn">
            <a href="user_song_list.php">' . "Edit Your Song List" . '</a>
            </div>
            </li>
            <li class="btn-label-right">
            <div class="well-1 btn">
            <a href="main_menu.php">' . $full_name . '</a>
            </div>
            </li>
            <li class="btn-label-right">
            <div class="well-1 btn">
            <a href="http://' . $_SERVER['SERVER_NAME'] . '/php/logoutService.php">Log Out</a>
            </li>
            </ul>';
                } else {
                    $toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
            <li class="btn-label-right">
            <div class="well-1 btn">
            <a href="login.php">Login</a>
            </div>
            </li>
            <li class="btn-label-right">
            <div class="well-1 btn">
            <a href="register.php">Register</a>
            </div>
            </li>
            </ul>';
        }
        ?>

        <div class="row">
            <?php echo $toplinks; ?>
        </div>
    </div>
</header>
