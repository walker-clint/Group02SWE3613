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

function getAllSongs() {
    $con = initializeConnection();
    
    $query = 'SELECT title '
            . 'FROM tbl_song';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($song_title);
    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, $song_title);
    }
    return $returnArray;
}
