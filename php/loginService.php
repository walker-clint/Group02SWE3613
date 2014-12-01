<?php

require $_SERVER['DOCUMENT_ROOT'] . ("/php/connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = htmlspecialchars($_POST['username']);
    $mypassword = htmlspecialchars($_POST['password']);
//    $_SESSION['myusername'] = $myusername;
//    $_SESSION['mypassword'] = $mypassword;
    $conLogin = initializeConnection();

    $sql = "SELECT user_id, admin, first_name, last_name FROM tbl_user WHERE login = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conLogin, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $userId = $row['user_id'];
    $admin = $row['admin'];
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        // session_register("myusername");
        //$_SESSION['login_user'] = $myusername;
        $_SESSION['user_id'] = $userId;
        $_SESSION['full_name'] = $firstname . ' ' . $lastname;
        if ($admin == 1) {
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/admin_main_menu.php');
        } else {
            header('Location: http://' . $_SERVER['SERVER_NAME'] . '/main_menu.php');
        }
    } else {
		$_SESSION['error'] = 'Your Login Name or Password is invalid';
    }
} else {
    $_SESSION['error'] = 'DID NOT CONNECT TO SERVER';
    header('Location: http://' . $_SERVER['SERVER_NAME']);
}