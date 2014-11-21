<?php
$toplinks = "";
require_once $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$indexLink = 'index.php';


if (!empty($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];

    $con = initializeConnection();
    $sql = mysqli_query($con, "SELECT * FROM tbl_user WHERE user_id = '$id'");
    $page = getCurrentPageURL();
    echo "Current URL: " . $page;
    $full_name = '';
    while ($row = mysqli_fetch_array($sql)) {
        $full_name = $row["first_name"] . " " . $row["last_name"];
    }
    $indexLink = 'main_menu.php';
    if ($userType == 'admin') {
        $indexLink = 'admin_main_menu.php';
    }
    $toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
            <li class="btn-label-right">
            <a href="' . $indexLink . '">
			<div class="well-1 btn btn-primary">
            ' . $full_name . '
            </div>
			</a>
            </li>
             <li class="btn-label-right">
            <a href="user_song_list.php">
			<div class="well-1 btn btn-primary">
            ' . "Edit Your Song List" . '
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
            Register with modal
            </div>
			</a>
            </li>
            <li class="btn-label-right">
			<a href="register.php">
            <div class="well-1 btn btn-primary">
            Register
            </div>
			</a>
            </li>
            </ul>';
}
?>



<header class="navbar-collapse">
    <!--    <a href="/--><?php //echo '' . $indexLink; ?><!--">-->
    <div id="logo" class="col-xs-6 col-sm-6">
        <img src="img/cllogo_medium.png" class="img-responsive"/></a>
    </div>

    <div id="top-panel" class="container-fluid expanded-panel"><br>

        <div class="row">
            <?php echo $toplinks; ?>
        </div>

        <!-- Modal 1 -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-dialog modal-vertical-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="btn btn-primary" class="close" data-dismiss="modal" aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body">
                            <div align="center">
                                <div class="well bs-component">
                                    <h1 align="center">Login</h1>

                                    <div class="well-2 bs-component">
                                        <form class="form-horizontal" action="php/loginService.php" method="POST">
                                            <div class="form-group">
                                                <label for="user_name" class="col-lg-4 control-label">User
                                                    Name</label>

                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control-1" id="username"
                                                           name="username" placeholder="User Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password"
                                                       class="col-lg-4 control-label">Password</label>

                                                <div class="col-lg-8">
                                                    <input align="center" type="Password" class="form-control-1"
                                                           id="password" name="password"
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <!-- Modal 2 -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-dialog modal-vertical-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="btn btn-primary" class="close" data-dismiss="modal" aria-hidden="true">×
                                </button>
                            </div>
                            <div class="modal-body">
                                <div align="center">
                                    <div class="well bs-component">
                                        <h1 align="center">Login 2</h1>

                                        <div class="well-1 bs-component">
                                            <form class="form-horizontal" action="php/loginService.php" method="POST">
                                                <div class="form-group">
                                                    <label for="user_name" class="col-lg-4 control-label">User
                                                        Name</label>

                                                    <div class="col-lg-8">
                                                        <input type="text" class="form-control" id="username"
                                                               name="username" placeholder="User Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="col-lg-4 control-label">Password</label>

                                                    <div class="col-lg-8">
                                                        <input align="center" type="Password" class="form-control"
                                                               id="password" name="password"
                                                               placeholder="Password">
                                                    </div>
                                                </div>
                                                <div align="center">
                                                    <input class="btn btn-primary" type="submit" value="Login"/>
                                                </div>
                                            </form>
                                            <div align="right">
                                                <input class="btn btn-primary" type="submit" value="Login"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close
                                    </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
</header>
