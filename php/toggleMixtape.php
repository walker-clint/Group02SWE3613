<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (true || !empty($_GET['songId'])) {
        $userId = $_SESSION['user_id'];
        $songId = $_GET['songId'];
        $song = getSongById($songId);

        $flag = $song->flagged;
        $title = $song->title;
        $approved = $song->approved;
        $youtubeLink = $song->youtubeLink;
        $youtubeApproved = $song->youtubeApproved;

        $con = initializeConnection(); {
            $conMixtape = initializeConnection();

            $sql = "SELECT COUNT(*) as 'count' FROM tbl_mixtape WHERE user_id = " . $userId . " AND song_id = " . $songId;
            $mixResult = mysqli_query($conMixtape, $sql);

            $row = mysqli_fetch_array($mixResult, MYSQLI_ASSOC);
            //$resultuserId = $row['user_id'];
            //$count = mysqli_num_rows($mixResult);
            $count = $row['count'];
            if ($count > 0) {//on list now, delete
                deleteMixtape($userId, $songId);
            } else {//not on list, add
                addMixtape($userId, $songId, 1);
            }
        }
    }
}

//send user to admin page, lockService will redirect as needed
//header('Location: http://' . $_SERVER['SERVER_NAME'] . '/admin_main_menu.php');
header('Location: http://' . $_SERVER['SERVER_NAME'] . '/mixtape.php');
