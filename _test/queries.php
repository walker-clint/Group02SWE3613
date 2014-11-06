<?php

include 'loginInfo.php';

function makeStatement($queryString) {
    return $con->prepare($queryString);
}

function getAllSongs() {
    $stmt = makeStatement('SELECT title '
            . 'FROM tbl_song');
//    $query = 'SELECT title '
//            . 'FROM tbl_song';
//    $stmt = makeStatement($query);
    $stmt->execute();
    $stmt->bind_result($song_title);
    
    $returnArray= array();
    while($stmt->getch()){
        array_push($returnArray, $song_title.'<br>');
    }
    return $returnArray;
}
