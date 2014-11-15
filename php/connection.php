<?php

function initializeConnection() {
$host = 'swe3613.com';
$user = 'wapp02p2swe3613';
$pass = '345dfg567dss';
$schema = 'swe3613_db02p2';

$con = mysqli_connect($host, $user, $pass, $schema);

if ($con->connect_error) {
die('<p>$con->connect_errno: $con->connect_error</p>');
}
return $con;
}

$db_host = "ftp.swe3613.com";
$db_username = "wapp02p2swe3613";
$db_pass = "345dfg567dss";
$db_name = "swe3613_db02p2";

mysqli_connect("$db_host", "$db_username", "$db_pass") or die(mysql_error());
mysqli_select_db("$db_name") or die("no database by that name <br>".  mysql_error());