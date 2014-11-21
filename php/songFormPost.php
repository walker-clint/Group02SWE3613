<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';


$action = $_POST['actionType'];
$songId = $_POST['songId'];
$title = $_POST['title'];

if (isset($_POST['artists'])) {
    $artists = $_POST['artists'];
} else {
    $artists = [];
}
if (isset($_POST['genres'])) {
    $genres = $_POST['genres'];
} else {
    $genres = [];
}

//add a new artist if given
if (isset($_POST['newArtist']) && !empty($_POST['newArtist'])) {
    //$newArtist = $_POST['newArtist'];
    $newArtistId = addArtist($_POST['newArtist']);
    array_push($artists, $newArtistId);
}

//add a new genre if given
if (isset($_POST['newGenre']) && !empty($_POST['newGenre'])) {
    //$newGenre = $_POST['newGenre'];
    $newGenreId = addGenre($_POST['newGenre']);
    array_push($genres, $newGenreId);
}

$youtube = $_POST['link'];


//if trying to edit verify admin
if ($userType != 'admin' && $action == 'Edit') {
    die("You must be an admin to edit songs!");
}

//if not editing add new song
if ($action != 'Edit') {
    //$newSongId = addSong($title, $approved, $flagged, $youtubeLink, $youtubeApproved)
    $songId = addSong($title, 0, 0, $youtube, 1);
} else {//otherwise update existing
    //updateSong($id, $title, $approved, $flagged, $youtubeLink, $youtubeApproved)
    updateSong($songId, $title, 0, 0, $youtube, 1);

    //lazy, delete all the references to the song now
    deleteSongAllArtists($songId);
    deleteSongAllGenres($songId);
}



//add all the artists to the song
foreach ($artists as $artist) {
    addSongArtist($songId, $artist);
}

//add all the genres to the song
foreach ($genres as $genre) {
    addSongGenre($songId, $genre);
}

if ($userType == 'admin') {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/admin_main_menu.php');
} else {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/mixtape.php');
}