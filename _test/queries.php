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

function getUserMixTape($userID) {
    $con = initializeConnection();

    $query = 'SELECT tbl_song.title, tbl_mixtape.position FROM tbl_song ' .
            'JOIN tbl_mixtape ON tbl_mixtape.song_id = tbl_song.song_id ' .
            'WHERE tbl_mixtape.user_id = ? ' .
            'ORDER BY tbl_mixtape.position;';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i',$userID);
    $stmt->execute();
    $stmt->bind_result($song_title,$song_position);
    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, ($song_title.' | '.$song_position));
    }
    return $returnArray;
}
