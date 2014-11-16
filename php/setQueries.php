<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

//adds a song to the DB, returns the created primary key
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

//updates a song in the DB
function updateSong($id, $title, $approved, $flagged, $youtubeLink, $youtubeApproved) {
    $con = initializeConnection();

    $query = 'UPDATE tbl_song SET title=?, approved=?, flagged=?, youtube=?, youtube_approved=? WHERE song_id = ?';

    $stmt = $con->prepare($query);
    $stmt->bind_param('siisii', $title, $approved, $flagged, $youtubeLink, $youtubeApproved, $id);
    $stmt->execute();
}

//removes a song (and all references to it) from the DB
function deleteSong($songId) {
    $con = initializeConnection();

    $queryArtist = 'DELETE FROM tbl_song_artist WHERE song_id = ?';
    $queryGenre = 'DELETE FROM tbl_song_genre WHERE song_id = ?';
    $querySong = 'DELETE FROM tbl_song WHERE song_id = ?';
    $queryMix = 'DELETE FROM tbl_mixtape WHERE song_id = ?';

    $stmtArtist = $con->prepare($queryArtist);
    $stmtArtist->bind_param('i', $songId);
    $stmtArtist->execute();

    $stmtGenre = $con->prepare($queryGenre);
    $stmtGenre->bind_param('i', $songId);
    $stmtGenre->execute();

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('i', $songId);
    $stmtSong->execute();

    $stmtMix = $con->prepare($queryMix);
    $stmtMix->bind_param('i', $songId);
    $stmtMix->execute();
}

//adds an artist to the DB, returns the created primary key
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

//adds a genre to the DB, returns the created primary key
function addGenre($name) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_genre(name) values (?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $name);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

//adds a relation between a song and artist, returns the created primary key
function addSongArtist($songId, $artistId) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_song_artist(song_id, artist_id) values (?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('ii', $songId, $artistId);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

//adds a relation between a song and genre, returns the created primary key
function addSongGenre($songId, $genreId) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_song_genre(song_id, genre_id) values (?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('ii', $songId, $genreId);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

//deletes an artist and all references from the DB
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

//deletes a genre and all references from the DB
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

//adds a Mixtape record to the DB, does not return anything
function addMixtape($userId, $songId, $position) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_mixtape(user_id, song_id, position) values (?,?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('iii', $userId, $songId, $position);
    $stmt->execute();

    //$insertId = mysqli_insert_id($con);
    //return $insertId;
}

//updates a Mixtape in the DB
function updateMixtape($userId, $origSongId, $origPosition, $songId, $position) {
    $con = initializeConnection();

    $query = 'UPDATE tbl_mixtape SET song_id=?, position=? WHERE user_id =? AND song_id = ? AND position = ?';

    $stmt = $con->prepare($query);
    $stmt->bind_param('iiiii', $songId, $position, $userId, $origSongId, $origPosition);
    $stmt->execute();
}

//deletes a Mixtape record from the DB
function deleteMixtape($userId, $songId) {
    $con = initializeConnection();

    $querySong = 'DELETE FROM tbl_mixtape WHERE song_id = ? AND user_id = ?';

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('ii', $songId, $userId);
    $stmtSong->execute();
}
