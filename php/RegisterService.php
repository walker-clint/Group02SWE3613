<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/php/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/recaptchalib.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
//session_start();
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
//    $_SESSION['username'] = $username;
//    $_SESSION['password'] = $password;
//    $_SESSION['firstname'] = $firstname;
//    $_SESSION['email'] = $email;
//    $_SESSION['lastname'] = $lastname;
//    $_SESSION['secret_q'] = $secret_q;
//    $_SESSION['secret_a'] = $secret_a;


    if ($resp->is_valid) {
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
            die();
        } else {
            $_SESSION['error'] = '<span class="error">The username is already in use inside our system. Please try another.</span>';
            //header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
        }
    } else {
        $_SESSION['error'] = 'Recaptcha entry is invalid';
        //header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
    }
} else {
    $_SESSION['error'] = 'DID NOT CONNECT TO SERVER';
    //header('Location: http://' . $_SERVER['SERVER_NAME'] . '/register.php');
}
