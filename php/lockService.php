<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ('/php/connection.php');

session_start();
$user_check = $_SESSION['user_id'];

$con = initializeConnection();

$ses_sql = mysqli_query($con, "select admin from tbl_user where login = '$user_check' ");

$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

$login_session = $row['admin'];

if (!isset($login_session)) {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/login.php');
}