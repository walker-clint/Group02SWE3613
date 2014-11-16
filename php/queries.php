<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

//get the 10 songs that are part of the most users' playlists, returns an array of ints
function getBestMixTape() {
    $con = initializeConnection();

    $query = 'SELECT tbl_mixtape.song_id, COUNT(*) ' .
            'FROM tbl_mixtape ' .
            'GROUP BY tbl_mixtape.song_id ' .
            'ORDER BY COUNT(*) DESC ' .
            'LIMIT 10;';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($id, $song_count);
    $returnArray = array();
    while ($stmt->fetch()) {
        //$genre = getSongGenre($id);
        //$artist = getSongArtist($id);
        //$tempSong = new Song($id, $song_title, $app, $flag, $you, $youApp, $genre, $artist);
        $returnString = $id; // . '|' . $song_count;
        array_push($returnArray, $returnString);
    }

    return $returnArray;
}

//returns a Song object with all the information for a given song
function getSong($songIDinc) {
    $songID = htmlspecialchars($songIDinc);

    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.song_id = ?';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $songID);
    $stmt->execute();
    $stmt->bind_result($id, $song_title, $app, $flag, $you, $youApp);
    
    $stmt->fetch();
    $genre = getSongGenre($id);
    $artist = getSongArtist($id);
    $tempSong = new Song($id, $song_title, $app, $flag, $you, $youApp, $genre, $artist);
    
    return $tempSong;
}

//returns an array of Song objects for all songs
function getAllSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($id, $song_title, $app, $flag, $you, $youApp);
    $returnArray = array();
    while ($stmt->fetch()) {
        $genre = getSongGenre($id);
        $artist = getSongArtist($id);
        $tempSong = new Song($id, $song_title, $app, $flag, $you, $youApp, $genre, $artist);
        array_push($returnArray, $tempSong);
    }
    return $returnArray;
}

//returns an array of Song objects for all APPROVED songs
function getApprovedSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.approved = 1';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($id, $song_title, $app, $flag, $you, $youApp);
    $returnArray = array();
    while ($stmt->fetch()) {
        $genre = getSongGenre($id);
        $artist = getSongArtist($id);
        $tempSong = new Song($id, $song_title, $app, $flag, $you, $youApp, $genre, $artist);
        array_push($returnArray, $tempSong);
    }
    return $returnArray;
}

//returns an array of Song objects for all UNAPPROVED songs
function getUnapprovedSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.approved = 0';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($id, $song_title, $app, $flag, $you, $youApp);
    $returnArray = array();
    while ($stmt->fetch()) {
        $genre = getSongGenre($id);
        $artist = getSongArtist($id);
        $tempSong = new Song($id, $song_title, $app, $flag, $you, $youApp, $genre, $artist);
        array_push($returnArray, $tempSong);
    }
    return $returnArray;
}

//returns an array of Song objects for all FLAGGED songs
function getFlaggedSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.flagged = 1';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($id, $song_title, $app, $flag, $you, $youApp);
    $returnArray = array();
    while ($stmt->fetch()) {
        $genre = getSongGenre($id);
        $artist = getSongArtist($id);
        $tempSong = new Song($id, $song_title, $app, $flag, $you, $youApp, $genre, $artist);
        array_push($returnArray, $tempSong);
    }
    return $returnArray;
}

//deprecated function, now a wrapper; returns a user's mixtape
function getUserMixTape($userIDinc) {
    $userID = htmlspecialchars($userIDinc);
    return getMixtape($userID);
//    $userID = htmlspecialchars($userIDinc);
//
//    $con = initializeConnection();
//
//    $query = 'SELECT tbl_song.title, tbl_mixtape.position FROM tbl_song ' .
//            'JOIN tbl_mixtape ON tbl_mixtape.song_id = tbl_song.song_id ' .
//            'WHERE tbl_mixtape.user_id = ? ' .
//            'ORDER BY tbl_mixtape.position;';
//    $stmt = $con->prepare($query);
//
//    $stmt->bind_param('i', $userID);
//    $stmt->execute();
//    $stmt->bind_result($song_title, $song_position);
//    $returnArray = array();
//    while ($stmt->fetch()) {
//        array_push($returnArray, ($song_title . ' | ' . $song_position));
//    }
//    return $returnArray;
}

//returns all the genres of a song in an array
function getSongGenre($songIDinc) {
    $songID = htmlspecialchars($songIDinc);

    $con = initializeConnection();

    $query = 'SELECT tbl_genre.name '
            . 'FROM tbl_genre '
            . 'JOIN tbl_song_genre ON tbl_song_genre.genre_id = tbl_genre.genre_id '
            . 'WHERE tbl_song_genre.song_id = ?';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $songID);
    $stmt->execute();
    $stmt->bind_result($songGenre);

    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, $songGenre);
    }
    return $returnArray;
}

//returns all the artists for a song in an array
function getSongArtist($songIDinc) {
    $songID = htmlspecialchars($songIDinc);

    $con = initializeConnection();

    $query = 'SELECT tbl_artist.name '
            . 'FROM tbl_artist '
            . 'JOIN tbl_song_artist ON tbl_song_artist.artist_id = tbl_artist.artist_id '
            . 'WHERE tbl_song_artist.song_id = ?';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $songID);
    $stmt->execute();
    $stmt->bind_result($songArtist);

    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, $songArtist);
    }
    return $returnArray;
}

//gets a user's mixtape ordered by position, returns an array of MixSong objects
function getMixtape($userIDInc) {
    $userID = htmlspecialchars($userIDInc);

    $con = initializeConnection();

    $query = 'SELECT song_id, position '
            . 'FROM tbl_mixtape '
            . 'WHERE user_id = ? '
            . 'ORDER BY position';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $stmt->bind_result($song_id, $position);

    $returnArray = array();
    while ($stmt->fetch()) {
        $newMixTapeEntry = new MixSong($song_id, $position);
        array_push($returnArray, $newMixTapeEntry);
    }
    return $returnArray;
}
