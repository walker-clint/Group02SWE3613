<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
if ($_POST) {
    $q = htmlspecialchars($_POST['search']);
    if (count($q) == 0) {
        $songList = getApprovedSongs();
    } else {
        $songList = getSongsBySearch($q);
    }
    foreach ($songList as $song) {
        echo $song->title . '<br>';
    }
}
        