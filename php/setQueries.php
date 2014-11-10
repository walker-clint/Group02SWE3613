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

function deleteSong($songId) {
    $con = initializeConnection();

    $queryArtist = 'DELETE FROM tbl_song_artist WHERE song_id = ?';
    $queryGenre = 'DELETE FROM tbl_song_genre WHERE song_id = ?';
    $querySong = 'DELETE FROM tbl_song WHERE song_id = ?';

    $stmtArtist = $con->prepare($queryArtist);
    $stmtArtist->bind_param('i', $songId);
    $stmtArtist->execute();

    $stmtGenre = $con->prepare($queryGenre);
    $stmtGenre->bind_param('i', $songId);
    $stmtGenre->execute();

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('i', $songId);
    $stmtSong->execute();
}

function addArtist($name) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_artist(name) values (?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $name);
    $stmt->execute();
    //$insertId = $con->insert_id;
    $insertId = mysqli_insert_id($con);
    return $insertId;
}

function addGenre($name) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_genre(name) values (?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $name);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

function addSongArtist($songId, $artistId) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_song_artist(song_id, artist_id) values (?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('ii', $songId, $artistId);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

function addSongGenre($songId, $genreId) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_song_genre(song_id, genre_id) values (?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('ii', $songId, $genreId);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

function deleteArtist($artistId) {
    $con = initializeConnection();

    $querySong = 'DELETE FROM tbl_song_artist WHERE artist_id = ?';
    $queryArtist = 'DELETE FROM tbl_artist WHERE artist_id = ?';

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('i', $artistId);
    $stmtSong->execute();

    $stmtArtist = $con->prepare($queryArtist);
    $stmtArtist->bind_param('i', $artistId);
    $stmtArtist->execute();
}

function deleteGenre($genreId) {
    $con = initializeConnection();

    $querySong = 'DELETE FROM tbl_song_genre WHERE genre_id = ?';
    $queryGenre = 'DELETE FROM tbl_genre WHERE genre_id = ?';

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('i', $genreId);
    $stmtSong->execute();

    $stmtArtist = $con->prepare($queryGenre);
    $stmtArtist->bind_param('i', $genreId);
    $stmtArtist->execute();
}