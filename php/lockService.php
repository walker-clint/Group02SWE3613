<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ('/php/connection.php');

session_start();
$user_check = $_SESSION['user_id'];

$conLock = initializeConnection();

$ses_sql = mysqli_query($conLock, "select login, admin from tbl_user where user_id = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$session_admin = $row['admin'];
$session_user = $row['login'];

$callingPage = basename($_SERVER['PHP_SELF']);
$adminPage = strpos($callingPage, 'dmin');
$userType = '';

if ($session_admin == '1') {
    $userType = 'admin';
} else if (isset($session_user)) {
    $userType = 'user';
}

//if ($adminPage != 0 && $session_admin != '1') {
if ($adminPage != 0 && $userType != 'admin') {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/main_menu.php');
    die();
} else if ($userType == '') {//not logged in
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/login.php');
    die();
} 