<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
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

        //add song to user's mixtape
        //$mixTapeId = addMixtape(1, $newSongId, 17);
        addMixtape(1, $newSongId, 17);

        //print out results
        echo 'Song ID: ' . $newSongId . '<br>';

        echo getSongById($newSongId) . '<br>';
        echo getSongById($newSongId)->getArtists() . '<br>' . getSongById($newSongId)->getGenres().'<br>';

        //print mixtape with song
        echo '<h3>user 1\'s mixtape with new song</h3>';
        echo var_dump(getUserMixTape(1));

        //
        //updateMixtape(1, $newSongId, $mixTapeId, 2, 18);
        echo '<h3>user 1\'s mixtape after updating song</h3>';
        updateMixtape(1, $newSongId, 17, 8, 18);
        echo var_dump(getUserMixTape(1));

        //delete the new records
        deleteSong($newSongId);
        deleteArtist($newArtist);
        deleteGenre($newGenre);
        deleteMixtape(1, 8);

        //print out the results (should be empty)
        echo '<h3>Should be empty now</h3>';

        echo getSongById($newSongId) . '<br>';
        echo getSongById($newSongId)->getArtists() . '<br>' . getSongById($newSongId)->getGenres();
        
        echo '<h3>user\'s mixtape with entry deleted:</h3>';
        echo var_dump(getUserMixtape(1));
        ?>
    </body>
</html>
