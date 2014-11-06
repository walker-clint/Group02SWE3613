<?php

include 'loginInfo.php';

function getAllSongs($con) {
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
