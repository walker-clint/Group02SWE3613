<?php

include_once dirname(__FILE__) . './connection.php';
include_once dirname(__FILE__) . './objects.php';

function addSong($title, $approved, $flagged, $youtubeLink, $youtubeApproved) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_song(title, approved, flagged, youtube, youtube_approved) values (?,?,?,?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('siisi', $title, $approved, $flagged, $youtubeLink, $youtubeApproved);
    $stmt->execute();
    //$insertId = $con->insert_id;
    $insertId = mysqli_insert_id($con);
    return $insertId;
}

function updateSong($id, $title, $approved, $flagged, $youtubeLink, $youtubeApproved) {
    $con = initializeConnection();

    $query = 'UPDATE tbl_song SET title=?, approved=?, flagged=?, youtube=?, youtube_approved=? WHERE song_id = ?';

    $stmt = $con->prepare($query);
    $stmt->bind_param('siisii', $title, $approved, $flagged, $youtubeLink, $youtubeApproved, $id);
    $stmt->execute();
}