<?php
require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
$errorMsg = "";
session_start();
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



                header("location: index.html");
                exit(); // Exit so the form and page does not display, just this success message
            } // Close else after database duplicate field value checks
        } // Close else after missing vars check
    }
} //Close if $_POST
?>
<!DOCTYPE html>
<html lang="en">
    <head>

    </head>
    <body>
        <!--Start Header-->

        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
        <!--End Header--> 
        <!--Start Middle-->
        <div id="main" class="container-fluid">

            <!--Start Content-->
            <form class="form-horizontal" align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <h1>Registration</h1>
                <div class="row">

                    <div id="left-column" class="col-xs-0 col-md-2 col-lg-2"> </div>               
                    <!--<legend>LEFT COLUMN</legend>-->

                    <div id="center-column" class="col-xs-12 col-md-8 col-lg-8">
                        <div class="well bs-component"> 
                            <div class="well-1 bs-component">

                                <div class="form-group">
                                    <label for="firstname" class="col-xs-4 col-md-4 control-label" align="right">First Name</label>
                                    <div class="col-xs-8 col-md-8">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo "$firstname"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-xs-4 col-md-4 control-label" align="right">Last Name</label>
                                    <div class="col-xs-8 col-md-8">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo "$lastname"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-xs-4 col-md-4 control-label" align="right">Email</label>
                                    <div class="col-xs-8 col-md-8">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo "$email"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-xs-4 col-md-4 control-label" align="right">Username</label>
                                    <div class="col-xs-8 col-md-8">
                                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo "$username"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-xs-4 col-md-4 control-label" align="right">Password</label>
                                    <div class="col-xs-8 col-md-8">
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo "$password"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="secret_q" class="col-xs-4 col-md-4 control-label" align="right">Secret Question</label>
                                    <div class="col-xs-8 col-md-8">
                                        <input type="text" class="form-control" name="secret_q" placeholder="Secret Question" value="<?php echo "$secret_q"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="secret_a" class="col-xs-4 col-md-4 control-label" align="right">Secret Answer</label>
                                    <div class="col-xs-8 col-md-8">
                                        <input type="text" class="form-control" name="secret_a" placeholder="Secret Answer" value="<?php echo "$secret_a"; ?>">
                                    </div>
                                </div>
                                <div class="captcha-container">
                                    <div class="col-xs-12 col-md-12" align="center">
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
                    <div id="right-column" class="col-xs-0 col-md-2 col-lg-2"></div>
                </div>
            </form>
        </div>

        <!--End Content--> 


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
<!--                        <h1>Register</h1>
                        <div class="well-1 bs-component">

                            <form  align="center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <font color="#FF0000"><?php echo "$errorMsg"; ?></font> <br>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="firstname" class="col-xs-6 control-label">First Name</label>
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control-1" name="firstname" placeholder="First Name" value="<?php echo "$firstname"; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname" class="col-xs-6 control-label">Last Name</label>
                                        <div class="col-xs-12">
                                            <input type="text" class="form-control-1" name="lastname" placeholder="Last Name" value="<?php echo "$lastname"; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-lg-4 control-label">Email</label>
                                    <div class="col-lg-8">
                                        <input type="email" class="form-control-1" name="email" placeholder="Email" value="<?php echo "$email"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-lg-4 control-label">Username</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control-1" name="username" placeholder="Username" value="<?php echo "$username"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-lg-4 control-label">Password</label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control-1" name="password" placeholder="Password" value="<?php echo "$password"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="secret_q" class="col-lg-4 control-label">Secret Question</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control-1" name="secret_q" placeholder="Secret Question" value="<?php echo "$secret_q"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="secret_a" class="col-lg-4 control-label">Secret Answer</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control-1" name="secret_a" placeholder="Secret Answer" value="<?php echo "$secret_a"; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                                      <label class="col-lg-4 control-label">Captcha</label>
                                    <div class="col-lg-8">
//<?php
//                    require_once('recaptchalib.php');
//                    $publickey = "6LcMdf0SAAAAAGjxpNWGXfNDgYGk-v-dxZSoUxrg"; // you got this from the signup page
//                    echo recaptcha_get_html($publickey);
//                    
?>
                                    </div></div>
                                <div align="center">
                                    <input type="submit" value="Submit"/>
                                </div>
                            </form>
                        </div>-->


