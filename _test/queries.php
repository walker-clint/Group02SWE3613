<?php

include 'loginInfo.php';

//function makeStatement($queryString) {
//    $stmtP = $con->prepare($queryString);
//    return $stmtP;
//}

function getAllSongs($con) {
    //$temp = '';
    //$stmt = makeStatement('SELECT title FROM tbl_song');
    $query = 'SELECT title '
            . 'FROM tbl_song';
    //$stmt = makeStatement($query);
    $stmt = $con->prepare($query);

    //return temp;
    $stmt->execute();
    $stmt->bind_result($song_title);
    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, $song_title);
        //$temp.=$song_title . '<br>';
    }
    //return $temp;
    return $returnArray;
}
