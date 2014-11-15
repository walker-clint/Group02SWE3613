<?php

echo "Login Services";
require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
session_start();
echo "session started";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form 
    //$myusername = mysqli_real_escape_string($db, $_POST['username']);
    //$mypassword = mysqli_real_escape_string($db, $_POST['password']);
    include('/php/connection.php');
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    echo "<br>";
    echo "username: $myusername";
    echo "<br>";
    echo "password: $mypassword";
    echo "<br>";
    $sql = "SELECT user_id, admin FROM tbl_user WHERE login = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    if ($result == false) {
        echo mysqli_error($con);
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $userId = $row['user_id'];
    $admin = $row['admin'];
    echo "<br>";
    echo "user id: $userId";
    echo "<br>";
    echo "admin: $admin";
    echo "<br>";
    $count = mysqli_num_rows($result);
    echo "user found == $count";
    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == '1') {
        // session_register("myusername");
        //$_SESSION['login_user'] = $myusername;
        $_SESSION['user_id'] = $userId;

        if ($admin == 1) {
            header("Location: ../admin_Main_Menu.php");
        } else {
            header("Location: ../main_menu.php");
        }
    } else {
        $error = '<span class="error">Your Login Name or Password is invalid<br></span>';
    }
//    close db connection
    mysqli_close($db);
} else {
    $error = '<span class="error">DID NOT CONNECT TO SERVER<br></span>';
}