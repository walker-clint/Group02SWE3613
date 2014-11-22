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
        
        //get user's mix tape count
        $conMixtapeCount = initializeConnection();
        $sqlCount = "SELECT COUNT(*) as 'count' FROM tbl_mixtape WHERE user_id = " . $userId;
        $mixResultCount = mysqli_query($conMixtapeCount, $sqlCount);
        $rowCount = mysqli_fetch_array($mixResultCount, MYSQLI_ASSOC);
        $totalCount = $rowCount['count'];

        $conMixtape = initializeConnection();
        $sql = "SELECT COUNT(*) as 'count' FROM tbl_mixtape WHERE user_id = " . $userId . " AND song_id = " . $songId;
        $mixResult = mysqli_query($conMixtape, $sql);
        $row = mysqli_fetch_array($mixResult, MYSQLI_ASSOC);
        $count = $row['count'];
        
        if ($count > 0) {//on list now, delete
            deleteMixtape($userId, $songId);
            //$addSongMessage = 'Song removed from your mixtape!';
        } elseif ($totalCount < 10) {//not on list, add
            addMixtape($userId, $songId, 1);
            //$addSongMessage = 'Song added to your mixtape!';
        } else {//too many songs, don't add
            //$addSongMessage = 'You may only have 30 songs on your mixtape! Remove some if you want to add more!';
        }
    }
}

//send user to admin page, lockService will redirect as needed
//header('Location: http://' . $_SERVER['SERVER_NAME'] . '/admin_main_menu.php');
//header('Location: http://' . $_SERVER['SERVER_NAME'] . '/mixtape.php');
header('Location: http://' . $_SERVER['SERVER_NAME'] . '/user_song_list.php');
