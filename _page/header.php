<?php
$toplinks = "";
require_once $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
$indexLink = 'index.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Connect to the database through our include

    require_once('recaptchalib.php');
    $privatekey = "6LcMdf0SAAAAAGoCSMb54T2MbWvgxaNpnDqhLwSj";
    $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
    if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        $errorMsg .= "The reCAPTCHA wasn't entered correctly. Go back and try it again.";
    } else {


        include_once "connect_to_mysql.php";
        $username = ereg_replace("[^A-Za-z0-9]", "", $_POST['username']);
        $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']);
        $firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST['firstname']); // filter everything but numbers and letters
        $lastname = ereg_replace("[^A-Za-z0-9]", "", $_POST['lastname']); // filter everything but numbers and letters
        $email = stripslashes($_POST['email']);
        $email = strip_tags($email);
        $email = mysql_real_escape_string($email);
        $secret_q = ereg_replace("[^A-Za-z0-9]", "", $_POST['secret_q']);
        $secret_a = ereg_replace("[^A-Za-z0-9]", "", $_POST['secret_a']);
        if ((!$firstname) || (!$lastname) || (!$email) || (!$username || (!$password))) {

            $errorMsg = "You did not submit the following required information!<br /><br />";
            if (!$firstname) {
                $errorMsg .= "--- First Name<br />";
            } if (!$lastname) {
                $errorMsg .= "--- Last Name<br />";
            }if (!$email) {
                $errorMsg .= "--- Email Address<br />";
            }if (!$username) {
                $errorMsg .= "--- Username<br />";
            }if (!$password) {
                $errorMsg .= "--- Password<br />";
            }
        } else {
            $sql_username_check = mysql_query("SELECT user_id FROM tbl_user WHERE login='$username' LIMIT 1");
            $username_check = mysql_num_rows($sql_username_check);
            if ($username_check > 0) {
                $errorMsg = "<u>ERROR:</u><br />The username is already in use inside our system. Please try another.";
            } else {
                // Add MD5 Hash to the password variable
                $hashedPass = md5($password);
                // Get the inserted ID here to use in the activation email
                $id = mysql_insert_id();
                // Add user info into the database table, claim your fields then values
                $sql = mysql_query("INSERT INTO tbl_user (user_id,login,password,email,admin,secret_question,secret_answer,first_name, last_name)
		VALUES('$id','$username', '$password', '$email', 0,'$secret_q','$secret_a','$firstname','$lastname')") or die(mysql_error());




                //header("location: customeinformation.php");
                //exit();



                header("location: main_menu.php");
                exit(); // Exit so the form and page does not display, just this success message
            } // Close else after database duplicate field value checks
        } // Close else after missing vars check
    }
} //Close if $_POST
?>

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
    <div id="logo" class="col-xs-2 col-sm-2">
        <img src="img/cllogo_medium.png" class="img-responsive"/></a>
    </div>

    <div id="top-panel" class="container-fluid expanded-panel"><br>

        <div class="row">
            <?php echo $toplinks; ?>
        </div>

        <!-- Modal 1 -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <div class="well-1 bs-component">

                                            <div class="form-group">
                                                <label for="firstname" class="col-xs-4 col-md-4 control-label"
                                                       align="right">First Name</label>

                                                <div class="col-xs-8 col-md-8">
                                                    <input type="text" class="form-control-1" name="firstname"
                                                           placeholder="First Name" value="<?php echo "$firstname"; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="lastname" class="col-xs-4 col-md-4 control-label"
                                                       align="right">Last Name</label>

                                                <div class="col-xs-8 col-md-8">
                                                    <input type="text" class="form-control-1" name="lastname"
                                                           placeholder="Last Name" value="<?php echo "$lastname"; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-xs-4 col-md-4 control-label"
                                                       align="right">Email</label>

                                                <div class="col-xs-8 col-md-8">
                                                    <input type="email" class="form-control-1" name="email"
                                                           placeholder="Email" value="<?php echo "$email"; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-xs-4 col-md-4 control-label"
                                                       align="right">Username</label>

                                                <div class="col-xs-8 col-md-8">
                                                    <input type="text" class="form-control-1" name="username"
                                                           placeholder="Username" value="<?php echo "$username"; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-xs-4 col-md-4 control-label"
                                                       align="right">Password</label>

                                                <div class="col-xs-8 col-md-8">
                                                    <input type="password" class="form-control-1" name="password"
                                                           placeholder="Password" value="<?php echo "$password"; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="secret_q" class="col-xs-4 col-md-4 control-label"
                                                       align="right">Secret Question</label>

                                                <div class="col-xs-8 col-md-8">
                                                    <input type="text" class="form-control-1" name="secret_q"
                                                           placeholder="Secret Question"
                                                           value="<?php echo "$secret_q"; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="secret_a" class="col-xs-4 col-md-4 control-label"
                                                       align="right">Secret Answer</label>

                                                <div class="col-xs-8 col-md-8">
                                                    <input type="text" class="form-control-1" name="secret_a"
                                                           placeholder="Secret Answer"
                                                           value="<?php echo "$secret_a"; ?>">
                                                </div>
                                            </div>
                                            <div class="captcha-container" align="center">
                                                <!--                                    <div class="col-xs-12 col-md-12" align="center">-->
                                                <div class="captcha-container frame">
                                                    <?php
                                                    require_once('recaptchalib.php');
                                                    $publickey = "6LcMdf0SAAAAAGjxpNWGXfNDgYGk-v-dxZSoUxrg"; // you got this from the signup page
                                                    echo recaptcha_get_html($publickey);
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-12" align="center"></div>
                                            <div align="center">
                                                <input type="submit" class="btn btn-primary btn-lg" value="Submit"/>
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
