<?php

include("connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT user_id, admin FROM tbl_user WHERE login = '$myusername' and pass = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $userId = $row['user_id'];
    $admin = $row['admin'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        // session_register("myusername");
        //$_SESSION['login_user'] = $myusername;
        $_SESSION['user_id'] = $userId;

        if($admin==1) {
            header("Location: ./admin_Main_Menu.php");
        } else {
            header("Location: main_menu.php");
        }
    } else {
        $error = '<span class="error">Your Login Name or Password is invalid<br></span>';
    }
} else {
    $error = '<span class="error">DID NOT CONNECT TO SERVER<br></span>';
}