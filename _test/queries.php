<?php

include './objects.php';

function initializeConnection() {
    $host = 'swe3613.com';
    $user = 'wapp02p2swe3613';
    $pass = '345dfg567dss';
    $schema = 'swe3613_db02p2';

    $con = mysqli_connect($host, $user, $pass, $schema);

    if ($con->connect_error) {
        die('<p>$con->connect_errno: $con->connect_error</p>');
    }
    return $con;
}

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

function getUserMixTape($userIDinc) {
    $userID = htmlspecialchars($userIDinc);

    $con = initializeConnection();

    $query = 'SELECT tbl_song.title, tbl_mixtape.position FROM tbl_song ' .
            'JOIN tbl_mixtape ON tbl_mixtape.song_id = tbl_song.song_id ' .
            'WHERE tbl_mixtape.user_id = ? ' .
            'ORDER BY tbl_mixtape.position;';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $stmt->bind_result($song_title, $song_position);
    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, ($song_title . ' | ' . $song_position));
    }
    return $returnArray;
}

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
