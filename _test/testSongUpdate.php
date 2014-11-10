<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //include_once dirname(__FILE__) . '/../php/setQueries.php';
        //include_once dirname(__FILE__) . '/../php/queries.php';
        //include_once dirname(__FILE__) . '/../php/objects.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

        //setup values for song to add
        $title = 'Bohemian Rhapsody';
        $approved = 1;
        $flagged = 0;
        $youtubeLink = 'http://www.youtube.com/watch?v=k-ARuoSFflc';
        $youtubeApproved = 1;

        //add song to DB
        $newSongId = addSong($title, $approved, $flagged, $youtubeLink, $youtubeApproved);

        //create new artist and genre
        $newArtist = addArtist('Queen');
        $newGenre = addGenre('Epic Rock');

        //relate new song to new genre and new artist
        addSongArtist($newSongId, $newArtist);
        addSongGenre($newSongId, $newGenre);

        //print out results
        echo 'Song ID: ' . $newSongId . '<br>';

        echo getSong($newSongId) . '<br>';
        echo getSong($newSongId)->getArtists() . '<br>' . getSong($newSongId)->getGenres();

        //delete the new records
        deleteSong($newSongId);
        deleteArtist($newArtist);
        deleteGenre($newGenre);

        //print out the results (should be empty)
        echo 'Should be empty now<br>';

        echo getSong($newSongId) . '<br>';
        echo getSong($newSongId)->getArtists() . '<br>' . getSong($newSongId)->getGenres();
        ?>
    </body>
</html>
