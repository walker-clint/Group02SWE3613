<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ('/php/connection.php');

session_start();
$user_check = $_SESSION['user_id'];

$con = initializeConnection();

$ses_sql = mysqli_query($con, "select login, admin from tbl_user where user_id = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$session_admin = $row['admin'];
$session_user = $row['login'];

$callingPage = basename($_SERVER['PHP_SELF']);

if (!isset($session_user)) {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/login.php');
} elseif (strpos($callingPage, 'admin') && !isset($session_admin)) {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/main_menu.php');
}