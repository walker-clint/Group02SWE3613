<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['actionType'] == 'toggleFlag') {
        $songId = $_POST['songId'];
        $song = getSongById($songId);
        $flag = 1;
        if ($song->flagged == 1 && $userType == 'admin') {
            $_SESSION['error']='"'.$song->title.'" is no longer flagged.';
            $flag = 0;
        }else{
            $_SESSION['error']='"'.$song->title.'" has been flagged, an admin will review it.';
        }
        updateSongFlagged($songId, $flag);
    } else if ($_POST['actionType'] == 'toggleApproval' && $userType == 'admin') {
        $songId = $_POST['songId'];
        $song = getSongById($songId);
        $approve = 0;
        if ($song->approved == 0) {
            $approve = 1;
            $_SESSION['error']='"'.$song->title.'" is now approved.';
        }else{
            $_SESSION['error']='"'.$song->title.'" is no longer approved.';
        }
        updateSongApproved($songId, $approve);
    }
}

//send user to admin page, lockService will redirect as needed
header('Location: http://' . $_SERVER['SERVER_NAME'] . '/admin_main_menu.php');
