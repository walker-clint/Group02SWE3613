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
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
        ?>
    </head>
    <body>
        <select multiple name ="Artists">
            <?php
            $artists = getAllArtists();
            foreach ($artists as $artist) {
                echo '<option value ="' . $artist . '">'
                . '' . getArtistById($artist) . '</option>';
            }
            ?></select>
        <select multiple name = 'Genres' >
            <?php
            $genres = getAllGenres();
            foreach ($genres as $genre) {
                echo '<option value ="' . $genre . '">'
                . '' . getGenreById($genre) . '</option>';
            }
            ?>
        </select>
    </body>
</html>
