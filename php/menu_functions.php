<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['actionType'] == 'toggleFlag') {
        $songId = $_POST['songId'];
        $song = getSong($songId);
        $flag = 0;
        if ($song->flagged == 0) {
            $flag = 1;
        }
        $title = $song->title;
        $approved = $song->approved;
        $youtubeLink = $song->youtubeLink;
        $youtubeApproved = $song->youtubeApproved;

        updateSong($songId, $title, $approved, $flag, $youtubeLink, $youtubeApproved);
    } else if ($_POST['actionType'] == 'toggleApproval') {
        $songId = $_POST['songId'];
        $song = getSong($songId);
        $approve = 0;
        if ($song->approved == 0) {
            $approve = 1;
        }
        $title = $song->title;
        $flag = $song->flagged;
        $youtubeLink = $song->youtubeLink;
        $youtubeApproved = $song->youtubeApproved;

        updateSong($songId, $title, $approve, $flag, $youtubeLink, $youtubeApproved);
    }
}

//send user to admin page, lockService will redirect as needed
header('Location: http://' . $_SERVER['SERVER_NAME'] . '/admin_main_menu.php');
