<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

/**
 * Add a song to the database.
 * 
 * @param type $title
 * @param type $approved
 * @param type $flagged
 * @param type $youtubeLink
 * @param type $youtubeApproved
 * @return type the primary key of the created song
 */
function addSong($titleInc, $approved, $flagged, $youtubeLink, $youtubeApproved) {
    $con = initializeConnection();
    $title = htmlspecialchars($titleInc, ENT_QUOTES);

    $query = 'INSERT INTO tbl_song(title, approved, flagged, youtube, youtube_approved) values (?,?,?,?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('siisi', $title, $approved, $flagged, $youtubeLink, $youtubeApproved);
    $stmt->execute();
    //$insertId = $con->insert_id;
    $insertId = mysqli_insert_id($con);
    return $insertId;
}

/**
 * Update an existing song in the DB
 * 
 * @param type $id the primary key of the song you wish to change
 * @param type $title
 * @param type $approved
 * @param type $flagged
 * @param type $youtubeLink
 * @param type $youtubeApproved
 */
function updateSong($id, $titleInc, $approved, $flagged, $youtubeLink, $youtubeApproved) {
    $con = initializeConnection();
    $title = htmlspecialchars($title, ENT_QUOTES);

    $query = 'UPDATE tbl_song SET title=?, approved=?, flagged=?, youtube=?, youtube_approved=? WHERE song_id = ?';

    $stmt = $con->prepare($query);
    $stmt->bind_param('siisii', $title, $approved, $flagged, $youtubeLink, $youtubeApproved, $id);
    $stmt->execute();
}

/**
 * Deletes a song and all references to it from the DB
 * 
 * @param type $songId the primary key of the song to be deleted
 */
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

/**
 * Adds an artist to the DB
 * 
 * @param type $name
 * @return type the primary key of the created artist
 */
function addArtist($nameInc) {
    $con = initializeConnection();
    $name = htmlspecialchars($nameInc, ENT_QUOTES);

    $query = 'INSERT INTO tbl_artist(name) values (?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $name);
    $stmt->execute();
    //$insertId = $con->insert_id;
    $insertId = mysqli_insert_id($con);
    return $insertId;
}

/**
 * Adds a new genre to the DB
 * 
 * @param type $name
 * @return type the primary key of the created genre
 */
function addGenre($nameInc) {
    $con = initializeConnection();
    $name = htmlspecialchars($name, ENT_QUOTES);

    $query = 'INSERT INTO tbl_genre(name) values (?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $name);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

/**
 * Adds a relation between a song and artist, returns the created primary key
 * 
 * @param type $songId
 * @param type $artistId
 * @return type the primary key of the created relation
 */
function addSongArtist($songId, $artistId) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_song_artist(song_id, artist_id) values (?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('ii', $songId, $artistId);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

/**
 * adds a relation between a song and genre, returns the created primary key
 * 
 * @param type $songId
 * @param type $genreId
 * @return type the primary key of the created relation
 */
function addSongGenre($songId, $genreId) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_song_genre(song_id, genre_id) values (?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('ii', $songId, $genreId);
    $stmt->execute();

    $insertId = mysqli_insert_id($con);
    return $insertId;
}

function deleteSongGenre($songId, $genreId) {
    $con = initializeConnection();

    $querySong = 'DELETE FROM tbl_song_genre WHERE genre_id = ? AND song_id = ?';

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('ii', $genreId, $songId);
    $stmtSong->execute();
}

function deleteSongAllGenres($songId) {
    $con = initializeConnection();

    $querySong = 'DELETE FROM tbl_song_genre WHERE song_id = ?';

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('i', $songId);
    $stmtSong->execute();
}

function deleteSongArtist($songId, $artistId) {
    $con = initializeConnection();

    $querySong = 'DELETE FROM tbl_song_artist WHERE artist_id = ? AND song_id = ?';

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('ii', $artistId, $songId);
    $stmtSong->execute();
}

function deleteSongAllArtists($songId) {
    $con = initializeConnection();

    $querySong = 'DELETE FROM tbl_song_artist WHERE song_id = ?';

    $stmtSong = $con->prepare($querySong);
    $stmtSong->bind_param('i', $songId);
    $stmtSong->execute();
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

    $stmtGenre = $con->prepare($queryGenre);
    $stmtGenre->bind_param('i', $genreId);
    $stmtGenre->execute();
}

/**
 * Adds a new mixtape record to the DB
 * 
 * @param type $userId the primary key of the user
 * @param type $songId the primary key of the song
 * @param type $position the primary key of the created mixtape record
 */
function addMixtape($userId, $songId, $position) {
    $con = initializeConnection();

    $query = 'INSERT INTO tbl_mixtape(user_id, song_id, position) values (?,?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('iii', $userId, $songId, $position);
    $stmt->execute();

    //$insertId = mysqli_insert_id($con);
    //return $insertId;
}

/**
 * Updates(changes) a mixtape in the DB
 * 
 * @param type $userId the primary key of the user
 * @param type $origSongId the primary key of the initial song
 * @param type $origPosition the position of the record
 * @param type $songId the primary key of the new song
 * @param type $position the new position of the record
 */
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

function addUser($loginInc, $passInc, $emailInc, $firstNameInc, $lastNameInc, $admin, $secretQInc, $secretAInc) {
    $con = initializeConnection();
    $login = htmlspecialchars($loginInc, ENT_QUOTES);
    $pass = htmlspecialchars($passInc, ENT_QUOTES);
    $email = htmlspecialchars($emailInc, ENT_QUOTES);
    $firstName = htmlspecialchars($firstNameInc, ENT_QUOTES);
    $lastName = htmlspecialchars($lastNameInc, ENT_QUOTES);
    $secretQ = htmlspecialchars($secretQInc, ENT_QUOTES);
    $secretA = htmlspecialchars($secretAInc, ENT_QUOTES);

    $query = 'INSERT INTO tbl_user(login, password, email, first_name, last_name, admin, secret_question, secret_answer) values (?,?,?,?,?,?,?,?)';

    $stmt = $con->prepare($query);
    $stmt->bind_param('sssssiss', $login, $pass, $email, $firstName, $lastName, $admin, $secretQ, $secretA);
    $stmt->execute();

    //$insertId = $con->insert_id;
    $insertId = mysqli_insert_id($con);
    return $insertId;
}

function updateUser($userId, $loginInc, $passInc, $emailInc, $firstNameInc, $lastNameInc, $admin, $secretQInc, $secretAInc) {
    $con = initializeConnection();
    $login = htmlspecialchars($loginInc, ENT_QUOTES);
    $pass = htmlspecialchars($passInc, ENT_QUOTES);
    $email = htmlspecialchars($emailInc, ENT_QUOTES);
    $firstName = htmlspecialchars($firstNameInc, ENT_QUOTES);
    $lastName = htmlspecialchars($lastNameInc, ENT_QUOTES);
    $secretQ = htmlspecialchars($secretQInc, ENT_QUOTES);
    $secretA = htmlspecialchars($secretAInc, ENT_QUOTES);

    //UPDATE tbl_user SET `login`='temp19', `password`='pass1', `email`='fake@fake.com1', `admin`='1', `first_name`='Bob1', `last_name`='Smith1' WHERE `user_id`='20';
    $query = 'UPDATE tbl_user SET login = ?, password = ?, email = ?, first_name = ?, last_name = ?, admin = ?, secret_question = ?, secret_answer = ? '
            . 'WHERE user_id = ?';

    $stmt = $con->prepare($query);
    $stmt->bind_param('sssssissi', $login, $pass, $email, $firstName, $lastName, $admin, $secretQ, $secretA, $userId);
    $stmt->execute();
}
