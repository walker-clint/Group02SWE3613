<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

/**
 * get the 10 songs that are part of the most users' playlists
 * @return array an array of ints
 */
function getBestMixTape() {
    $con = initializeConnection();

    $query = 'SELECT tbl_mixtape.song_id, COUNT(*) ' .
            'FROM tbl_mixtape ' .
            'JOIN tbl_song ON tbl_song.song_id = tbl_mixtape.song_id ' .
            'WHERE tbl_song.approved = 1 ' .
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

/**
 * get a song object matching the given primary key
 * @param int $songIDinc the primary key of the wanted song
 * @return Song
 */
function getSongById($songIDinc) {
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

function getSongsBySearch($songTitleInc) {
    $songTitle = '%' . htmlspecialchars($songTitleInc, ENT_QUOTES) . '%';

    $con = initializeConnection();

    $query = 'SELECT tbl_song.song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'JOIN tbl_mixtape ON tbl_mixtape.song_id = tbl_song.song_id '
            . 'WHERE approved = 1 AND title LIKE ? '
            . 'GROUP BY tbl_song.song_id '
            . 'ORDER BY title';
    $stmt = $con->prepare($query);

    $stmt->bind_param('s', $songTitle);

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

function getSongsBySearch_notOnMixtape($songTitleInc, $userIdInc) {
    $songTitle = '%' . htmlspecialchars($songTitleInc, ENT_QUOTES) . '%';
    $userId = htmlspecialchars($userIdInc);

    $con = initializeConnection();

    $query = 'SELECT tbl_song.song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE title LIKE ? '
            . 'AND tbl_song.song_id NOT IN (SELECT tbl_mixtape.song_id FROM tbl_mixtape WHERE tbl_mixtape.user_id = ?) '
            . 'GROUP BY song_id '
            . 'ORDER BY title';
    $stmt = $con->prepare($query);

    $stmt->bind_param('si', $songTitle, $userId);

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

/**
 * returns all songs in the DB
 * @return Song[] all the songs in the DB
 */
function getAllSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'ORDER BY title';
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

/**
 * returns all approved songs in the DB
 * @return Song[] all the approved songs in the DB
 */
function getApprovedSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.approved = 1 '
            . 'ORDER BY title';
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

function getApprovedSongs_notOnMixtape($userIdInc) {
    $con = initializeConnection();
    $userId = htmlspecialchars($userIdInc);

//    $query = 'SELECT tbl_song.song_id, title, approved, flagged, youtube, youtube_approved '
//            . 'FROM tbl_song '
//            . 'RIGHT JOIN tbl_mixtape ON tbl_mixtape.song_id = tbl_song.song_id  '
//            . 'WHERE tbl_song.approved = 1 AND tbl_mixtape.user_id != ? '
//            . 'GROUP BY tbl_song.song_id '
//            . 'ORDER BY title';
    $query = 'SELECT tbl_song.song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.song_id NOT IN (SELECT tbl_mixtape.song_id FROM tbl_mixtape WHERE tbl_mixtape.user_id = ?) '
            . 'GROUP BY song_id '
            . 'ORDER BY title';

    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $userId);
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

/**
 * returns all unapproved songs in the DB
 * @return Song[] all the unapproved songs in the DB
 */
function getUnapprovedSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.approved = 0 '
            . 'ORDER BY title';
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

/**
 * returns all flagged songs in the DB
 * @return Song[] all the flagged songs in the DB
 */
function getFlaggedSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.flagged = 1 '
            . 'ORDER BY title';
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

/**
 * returns all approved and unflagged songs in the DB
 * @return Song[] all the flagged songs in the DB
 */
function getApprovedAndUnflaggedSongs() {
    $con = initializeConnection();

    $query = 'SELECT song_id, title, approved, flagged, youtube, youtube_approved '
            . 'FROM tbl_song '
            . 'WHERE tbl_song.flagged = 0 AND tbl_song.approved = 1 '
            . 'ORDER BY title';
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

/**
 * @deprecated
 * @param int $userIDinc
 * @return MixSong[] array of mixtap records
 */
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

function getArtistById($artistIdInc) {
    $artistID = htmlspecialchars($artistIdInc);

    $con = initializeConnection();

    $query = 'SELECT name '
            . 'FROM tbl_artist '
            . 'WHERE artist_id = ?';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $artistID);
    $stmt->execute();
    $stmt->bind_result($name);

    $stmt->fetch();

    return $name;
}

function getAllArtists() {
    $con = initializeConnection();

    $query = 'SELECT artist_id ' .
            'FROM tbl_artist ' .
            'ORDER BY name';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($id);
    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, $id);
    }

    return $returnArray;
}

function getGenreById($genreIdInc) {
    $genreID = htmlspecialchars($genreIdInc);

    $con = initializeConnection();

    $query = 'SELECT name '
            . 'FROM tbl_genre '
            . 'WHERE genre_id = ?';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $genreID);
    $stmt->execute();
    $stmt->bind_result($name);

    $stmt->fetch();

    return $name;
}

function getAllGenres() {
    $con = initializeConnection();

    $query = 'SELECT genre_id ' .
            'FROM tbl_genre ' .
            'ORDER BY name';
    $stmt = $con->prepare($query);

    $stmt->execute();
    $stmt->bind_result($id);
    $returnArray = array();
    while ($stmt->fetch()) {
        array_push($returnArray, $id);
    }

    return $returnArray;
}

/**
 * @param int $songIDinc the primary key of the wanted song
 * @return String[] the genres of the given song
 */
function getSongGenre($songIDinc) {
    $songID = htmlspecialchars($songIDinc);

    $con = initializeConnection();

    $query = 'SELECT tbl_genre.name '
            . 'FROM tbl_genre '
            . 'JOIN tbl_song_genre ON tbl_song_genre.genre_id = tbl_genre.genre_id '
            . 'WHERE tbl_song_genre.song_id = ? '
            . 'ORDER BY tbl_genre.name';
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

function getSongGenreIds($songIDinc) {
    $songID = htmlspecialchars($songIDinc);

    $con = initializeConnection();

    $query = 'SELECT tbl_genre.genre_id '
            . 'FROM tbl_genre '
            . 'JOIN tbl_song_genre ON tbl_song_genre.genre_id = tbl_genre.genre_id '
            . 'WHERE tbl_song_genre.song_id = ? '
            . 'ORDER BY tbl_genre.name';
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

/**
 * @param int $songIDinc the primary key of the wanted song
 * @return String[] the artists of the given song
 */
function getSongArtist($songIDinc) {
    $songID = htmlspecialchars($songIDinc);

    $con = initializeConnection();

    $query = 'SELECT tbl_artist.name '
            . 'FROM tbl_artist '
            . 'JOIN tbl_song_artist ON tbl_song_artist.artist_id = tbl_artist.artist_id '
            . 'WHERE tbl_song_artist.song_id = ? '
            . 'ORDER BY tbl_artist.name';
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

function getSongArtistIds($songIDinc) {
    $songID = htmlspecialchars($songIDinc);

    $con = initializeConnection();

    $query = 'SELECT tbl_artist.artist_id '
            . 'FROM tbl_artist '
            . 'JOIN tbl_song_artist ON tbl_song_artist.artist_id = tbl_artist.artist_id '
            . 'WHERE tbl_song_artist.song_id = ? '
            . 'ORDER BY tbl_artist.name';
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

/**
 * returns the mixtape records for a user
 * @param int $userIDInc the primary key of the user
 * @return MixSong[] an array of the user's mixtape
 */
function getMixtape($userIDInc) {
    $userID = htmlspecialchars($userIDInc);

    $con = initializeConnection();

    $query = 'SELECT tbl_mixtape.song_id, position '
            . 'FROM tbl_mixtape '
            . 'JOIN tbl_song ON tbl_song.song_id = tbl_mixtape.song_id '
            . 'WHERE user_id = ? '
            . 'ORDER BY tbl_song.title';
    $stmt = $con->prepare($query);

    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $stmt->bind_result($song_id, $position);

    $returnArray = array();
    while ($stmt->fetch()) {
        //$newMixTapeEntry = new MixSong($song_id, $position);
        //array_push($returnArray, $newMixTapeEntry);
        array_push($returnArray, $song_id);
    }
    return $returnArray;
}

/**
 * returns the mixtape records for a user sorted by position
 * @param int $userIDInc the primary key of the user
 * @return MixSong[] an array of the user's mixtape
 */
function getMixtapeSortPosition($userIDInc) {
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

/**
 * returns URL of current page.
 * found @ http://webcheatsheet.com/php/get_current_page_url.php
 * */
function getCurrentPageURL() {
    $pageURL = 'http';
//    if ($_SERVER["HTTPS"] == "on") {
//        $pageURL .= "s";
//    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
