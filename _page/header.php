<?php
$toplinks = "";
require_once $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$indexLink='index.php';

if (!empty($_SESSION['user_id'])) {
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
    $toplinks = '<ul class="nav navbar-nav pull-right panel-menu">
            <li class="btn-label-right">
            <div class="well-1 btn btn-primary">
            <a href="' . $indexLink . '">' . $full_name . '</a>
            </div>
            </li>
             <li class="btn-label-right">
            <div class="well-1 btn btn-primary">
            <a href="user_song_list.php">' . "Edit Your Song List" . '</a>
            </div>
            </li>

            <li class="btn-label-right">
            <div class="well-1 btn btn-warning">
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
            <a data-toggle="modal" href="#myModal1">Login with modal</a>
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
<header class="navbar-collapse">
    <div id="logo" class="col-xs-6 col-sm-6">
        <a href="/<?php echo '' . $indexLink; ?>"><img src="img/cllogo_medium.png" class="img-responsive"/></a>
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
                            <button type="btn btn-primary" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <!--                            <div align="center"><h3 class="modal-title">Baking</h3></div>-->
                        </div>
                        <div class="modal-body">
                            <div align="center">
                                <!--                                <div id="main" class="container-fluid">-->


                                <div class="well bs-component">
                                    <!--<legend>LEFT COLUMN</legend>-->
                                    <h1 align="center">Login</h1>

                                    <div class="well-1 bs-component">
                                        <form class="form-horizontal" action="php/loginService.php" method="POST">
                                            <!--<font color="#FF0000"><?php echo $error; ?></font> <br>-->
                                            <div class="form-group">
                                                <label for="user_name" class="col-lg-4 control-label">User
                                                    Name</label>

                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="username"
                                                           name="username" placeholder="User Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password"
                                                       class="col-lg-4 control-label">Password</label>

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
                                    </div>
                                </div>


                                <!--                                <div class="btn-group-vertical">-->
                                <!--                                    <a type="button" id="btn1" class="btn btn-primary btn-lg"-->
                                <!--                                       href="http://group04.swe3613.com/recipes.php">-->
                                <!--                                        Recipes-->
                                <!--                                    </a>-->
                                <!--                                    <a type="button" id="btn2" class="btn btn-primary btn-lg"-->
                                <!--                                       href="http://group04.swe3613.com/ingredients.php">-->
                                <!--                                        Ingredients-->
                                <!--                                    </a>-->
                                <!--                                </div>-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close
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
