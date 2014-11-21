<?php

require $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
require_once $_SERVER['DOCUMENT_ROOT'] . ("recaptchalib.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $privatekey = "6LcMdf0SAAAAAGoCSMb54T2MbWvgxaNpnDqhLwSj";
    $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], htmlspecialchars($_POST["recaptcha_challenge_field"]), htmlspecialchars($_POST["recaptcha_response_field"]));
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $firstname = htmlspecialchars($_POST['firstname']); // filter everything but numbers and letters
    $lastname = htmlspecialchars($_POST['lastname']); // filter everything but numbers and letters
    $email = htmlspecialchars($email);
    $secret_q = htmlspecialchars($_POST['secret_q']);
    $secret_a = htmlspecialchars($_POST['secret_a']);
	
	
	$conLogin = initializeConnection();
            $sql_username_check = mysql_query("SELECT user_id FROM tbl_user WHERE login='$username' LIMIT 1");
			$result = mysqli_query($conLogin, l_username_check);
			$count = mysqli_num_rows($result);
            if ($count == 0) {
				$hashedPass = md5($password);
                // Get the inserted ID here to use in the activation email
                $id = mysql_insert_id();
                // Add user info into the database table, claim your fields then values 
                $sql = mysql_query("INSERT INTO tbl_user (user_id,login,password,email,admin,secret_question,secret_answer,first_name, last_name) 
		VALUES('$id','$username', '$password', '$email', 0,'$secret_q','$secret_a','$firstname','$lastname')") or die(mysql_error());

            
			}
			else{
				   echo '<span class="error">The username is already in use inside our system. Please try another.</span>';
			}
	
} else {
    echo '<span class="error">DID NOT CONNECT TO SERVER<br></span>';
	header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
}