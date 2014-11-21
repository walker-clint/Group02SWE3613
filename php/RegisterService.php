<?php

require $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
require_once $_SERVER['DOCUMENT_ROOT'] . ("/recaptchalib.php");
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
session_start();
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
	$_SESSION['username']=$username; 
$_SESSION['password']=$password;
$_SESSION['firstname']=$firstname;
$_SESSION['email']=$email;
$_SESSION['lastname']=$lastname;
$_SESSION['secret_q']=$secret_q;
$_SESSION['secret_a']=$secret_a;
	
	
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
			}
			else{
				   $error =  '<span class="error">The username is already in use inside our system. Please try another.</span>';
				   $_SESSION['error']=$error;
				   header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
	
	
	
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
		 }
	 }else{
		  $error =  '<span class="error">Captia is not correct<br></span>';
		  $_SESSION['error']=$error;
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
		 
	 }
} else {
    $error =  '<span class="error">DID NOT CONNECT TO SERVER<br></span>';
	$_SESSION['error']=$error;
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
}
