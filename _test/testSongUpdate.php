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
        echo dirname(__FILE__) . '/../php/setQueries.php';
        include_once dirname(__FILE__) . '/../php/setQueries.php';
        include_once dirname(__FILE__) . '/../php/queries.php';
        include_once dirname(__FILE__) . '/../php/objects.php';

        $title = 'Bohemian Rhapsody';
        $approved = 1;
        $flagged = 0;
        $youtubeLink = 'http://www.youtube.com/watch?v=k-ARuoSFflc';
        $youtubeApproved = 1;

        $newSongId = addSong($title, $approved, $flagged, $youtubeLink, $youtubeApproved);
        $newArtist = addArtist('Queen');
        $newGenre = addGenre('Epic Rock');
        
        addSongArtist($newSongId, $newArtist);
        addSongGenre($newSongId, $newGenre);

        echo 'Song ID: '.$newSongId . '<br>';

        echo getSong($newSongId).'<br>';
        echo getSong($newSongId)->getArtists().'<br>'.  getSong($newSongId)->getGenres();
        
        deleteSong($newSongId);
        deleteArtist($newArtist);
        deleteGenre($newGenre);
        
        echo 'Should be empty now<br>';

        echo getSong($newSongId).'<br>';
        echo getSong($newSongId)->getArtists().'<br>'.  getSong($newSongId)->getGenres();
        ?>
    </body>
</html>
