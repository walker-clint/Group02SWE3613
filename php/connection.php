<?php

function initializeConnection() {
    $host = 'swe3613.com';
    $user = 'wapp02p2swe3613';
    $pass = '345dfg567dss';
    $schema = 'swe3613_db02p2';

    //$con = mysqli_connect($host, $user, $password, $database, $port, $socket)
    $con = mysqli_connect($host, $user, $pass, $schema);
    //mysqli_select_db($con, $schema);

    if ($con->connect_error) {
        die('<p>$con->connect_errno: $con->connect_error</p>');
    }
    return $con;
}

function isMobileDevice() {
    $aMobileUA = array(
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    //Return true if Mobile User Agent is detected
    foreach ($aMobileUA as $sMobileKey => $sMobileOS) {
        if (preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])) {
            return true;
        }
    }
    //Otherwise return false..  
    return false;
}

//$db_host = "ftp.swe3613.com";
//$db_username = "wapp02p2swe3613";
//$db_pass = "345dfg567dss";
//$db_name = 'swe3613_db02p2';
//
//$db = mysqli_connect($db_host, $db_username, $db_pass, $db_name) or die('Error: ');// . mysql_error());
