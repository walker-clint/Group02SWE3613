<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['actionType'] == 'toggleFlag') {
        $songId = $_POST['songId'];
        $song = getSong($songId);
        if (empty($song)) {
            echo "No song found!";
        }
        $flag = 0;
        if ($song->flagged == 0) {
            $flag = 1;
        }
        //updateSong($id, $title, $approved, $flagged, $youtubeLink, $youtubeApproved)
        $title = $song->title;
        $approved = $song->approved;
        $youtubeLink = $song->youtubeLink;
        $youtubeApproved = $song->youtubeApproved;
        updateSong($songId, $title, $approved, $flag, $youtubeLink, $youtubeApproved);
        //}
    }
}
header('Location: http://' . $_SERVER['SERVER_NAME'] . '/admin_main_menu.php');