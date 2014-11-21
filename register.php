<!DOCTYPE html>
<html lang="en">
<head>
<?php 
require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; 
require $_SERVER['DOCUMENT_ROOT'] . ("/recaptchalib.php");
require $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';

session_start();
/*$error = $_SESSION['error'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $privatekey = "6LcMdf0SAAAAAGoCSMb54T2MbWvgxaNpnDqhLwSj";
    $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], htmlspecialchars($_POST["recaptcha_challenge_field"]), htmlspecialchars($_POST["recaptcha_response_field"]));
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $firstname = htmlspecialchars($_POST['firstname']); // filter everything but numbers and letters
    $lastname = htmlspecialchars($_POST['lastname']); // filter everything but numbers and letters
    $email = htmlspecialchars($_POST['email']);
    $secret_q = htmlspecialchars($_POST['secret_q']);
    $secret_a = htmlspecialchars($_POST['secret_a']);
	
	 if ($resp->is_valid) {
		 if($firstname && $lastname && $email && $username && $password){
	$conLogin = initializeConnection();
            $sql_username_check = "SELECT user_id FROM tbl_user WHERE login='$username' LIMIT 1";
			$result = mysqli_query($conLogin, $sql_username_check);
			$count = mysqli_num_rows($result);
            if ($count == 0) {
				$hashedPass = md5($password);
                // Get the inserted ID here to use in the activation email
                $id = mysql_insert_id();
                // Add user info into the database table, claim your fields then values 
 $_SESSION['user_id'] = addUser($username, $password, $email, $firstname, $lastname, 0, $secret_q, $secret_a);
             header('Location: http://' . $_SERVER['SERVER_NAME'] . '/main_menu.php');
			 exit;
			}
			else{
				   $error =  '<span class="error">The username is already in use inside our system. Please try another.</span>';
				   $_SESSION['error']=$error;
				   header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
	exit;
	
	
			}
			
	 }else{
		 $error = "You did not submit the following required information!<br /><br />";
            if (!$firstname) {
                $error .= "--- First Name<br />";
            } if (!$lastname) {
                $error .= "--- Last Name<br />";
            }if (!$email) {
                $error .= "--- Email Address<br />";
            }if (!$username) {
                $error .= "--- Username<br />";
            }if (!$password) {
                $error .= "--- Password<br />";
            }
			$_SESSION['error']=$error;
			header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
			exit;
		 }
	 }else{
		  $error =  '<span class="error">Captia is not correct<br></span>';
		  $_SESSION['error']=$error;
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
	exit;	 
	 }

} else {
    $error =  '<span class="error">DID NOT CONNECT TO SERVER<br></span>';
	$_SESSION['error']=$error;
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
	exit;
}
*/
?>
</head>
<body>
<!--Start Header-->

<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
<!--End Header--> 
<!--Start Middle-->
<div id="main" class="container-fluid">

    <form class="form-horizontal" action="php/RegisterService.php" method="POST">
      <h1>Registration</h1>
      <div class="row">
        <div class="well bs-component">
          <div class="well-1 bs-component">
          <font color="#FF0000"><?php echo $error; ?></font> <br>
            <div class="form-group">
              <label for="firstname" class="col-xs-4 col-md-4 control-label"
                                                           align="right">First Name</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" id="firstname"
                                                               name="firstname"
                                                               placeholder="First Name">
              </div>
            </div>
            <div class="form-group">
              <label for="lastname" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Last Name</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" id="lastname"
                                                               name="lastname"
                                                               placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Email</label>
              <div class="col-xs-8 col-md-8">
                <input type="email" class="form-control-1" id="email"
                                                               name="email"
                                                               placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="username" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Username</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" id="username"
                                                               name="username"
                                                               placeholder="Username" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Password</label>
              <div class="col-xs-8 col-md-8">
                <input type="password" class="form-control-1" name="password"
                                                               name="password"
                                                               placeholder="Password" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label for="secret_q" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Secret Question</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" name="secret_q"
                                                               name="secret_q"
                                                               placeholder="Secret Question">
              </div>
            </div>
            <div class="form-group">
              <label for="secret_a" class="col-xs-4 col-md-4 control-label"
                                                           align="right">Secret Answer</label>
              <div class="col-xs-8 col-md-8">
                <input type="text" class="form-control-1" name="secret_a"
                                                               name="secret_a"
                                                               placeholder="Secret Answer">
              </div>
            </div>
            <div class="captcha-container" align="center">
              <div class="captcha-container frame">
                <?php
                $publickey = "6LcMdf0SAAAAAGjxpNWGXfNDgYGk-v-dxZSoUxrg"; // you got this from the signup page
                echo recaptcha_get_html($publickey);
                ?>
              </div>
            </div>
            <div align="center">
              <input class="btn btn-primary" type="submit" value="Register"/>
            </div>
          </div>
        </div>
      </div>
    </form>

</div>
