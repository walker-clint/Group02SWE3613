<?php

require $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
require_once $_SERVER['DOCUMENT_ROOT'] . ("recaptchalib.php");
$errorMsg = "";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $privatekey = "6LcMdf0SAAAAAGoCSMb54T2MbWvgxaNpnDqhLwSj";
    $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], htmlspecialchars($_POST["recaptcha_challenge_field"]), htmlspecialchars($_POST["recaptcha_response_field"]));
    if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
       echo "The reCAPTCHA wasn't entered correctly. Go back and try it again.";
		
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
    } else {
        $username = ereg_replace("[^A-Za-z0-9]", "", $_POST['username']);
        $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']);
        $firstname = ereg_replace("[^A-Za-z0-9]", "", $_POST['firstname']); // filter everything but numbers and letters
        $lastname = ereg_replace("[^A-Za-z0-9]", "", $_POST['lastname']); // filter everything but numbers and letters
        $email = stripslashes($_POST['email']);
        $email = strip_tags($email);
        $email = mysql_real_escape_string($email);
        $secret_q = ereg_replace("[^A-Za-z0-9 ]", "", $_POST['secret_q']);
        $secret_a = ereg_replace("[^A-Za-z0-9 ]", "", $_POST['secret_a']);
        if ((!$firstname) || (!$lastname) || (!$email) || (!$username || (!$password))) {

           echo "You did not submit the following required information!<br /><br />";
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
			
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
        } else {
			 $conLogin = initializeConnection();
            $sql_username_check = mysql_query("SELECT user_id FROM tbl_user WHERE login='$username' LIMIT 1");
            $username_check = mysql_num_rows($sql_username_check);
            if ($username_check > 0) {
               echo "<u>ERROR:</u><br />The username is already in use inside our system. Please try another.";
				
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
            } else {
                // Add MD5 Hash to the password variable
                $hashedPass = md5($password);
                // Get the inserted ID here to use in the activation email
                $id = mysql_insert_id();
                // Add user info into the database table, claim your fields then values 
                $sql = mysql_query("INSERT INTO tbl_user (user_id,login,password,email,admin,secret_question,secret_answer,first_name, last_name) 
		VALUES('$id','$username', '$password', '$email', 0,'$secret_q','$secret_a','$firstname','$lastname')") or die(mysql_error());




               


               header('Location: http://' . $_SERVER['SERVER_NAME'] . '/main_menu.php');
               // Exit so the form and page does not display, just this success message
            } // Close else after database duplicate field value checks
        } // Close else after missing vars check
    }
} else {
    echo '<span class="error">DID NOT CONNECT TO SERVER<br></span>';
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
}