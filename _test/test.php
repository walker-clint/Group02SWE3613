<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Page</title>
        <?php
        //include_once dirname(__FILE__) . '/../php/queries.php';
        //include_once dirname(__FILE__) . '/../php/objects.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . 'php/queries.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . 'php/objects.php';
        ?>

    </head>
    <body>
        <?php echo $_SERVER['DOCUMENT_ROOT'] . 'php/objects.php';?>
        <h1>Sample queries<br></h1>
        <p>The following demonstrates SQL queries via PHP</p>
        <p>'queries.php' (will) contain the php functions that return the necessary information gathered from an SQL query</p>
        <p>In this way one all the queries (as functions) can be written into one central location.</p>

        <div>
            <h2>Song Object</h2>
            <p>A Song Object is a php representation of a tbl_song record from SQL</p>
            <div>
                <p>The fields of a Song are accessible by $songVariableName->FieldName<br>
                    For example, '$mySong->title' is the title of $mySong</p>
                A Song contains the following fields:
                <ul style = "border: 1px solid black">
                    <li>id</b></li>the song's primary key
                    <li>title</b></li>the song's title
                    <li>approved</li>whether the song has been approved or not
                    <li>flagged</li>whether or not the song has been flagged by user's
                    <li>youtubeLink</li>the song's youtube link
                    <li>youtubeApproved</li>whether or not the song's youtube link has been approved
                    <li>genres</li>an array of the genres the song belongs to
                    <li>artist</li>an array of the artists that wrote a song
                </ul>

                <?php
                $exampleSong = getSong(21);
                echo '$exampleSong = getSong(21)';
                echo '$exampleSong->id = ' . $exampleSong->id . '<br>';
                echo '$exampleSong->title = ' . $exampleSong->title . '<br>';
                echo '$exampleSong->youtubeLink = ' . $exampleSong->youtubeLink . '<br>';
                echo '$exampleSong->getLink() = ' . $exampleSong->getLink() . '<br>';
                echo '$exampleSong->getEmbedLink() = ' . $exampleSong->getEmbedLink() . '<br>';
                echo '$exampleSong->getEmbedLink(true) = ' . $exampleSong->getEmbedLink(true) . '<br>';
                ?>
            </div>
        </div>

        <div>
            <h2>Get Best Mix Tape</h2>
            The best mix tape, the 10 most popular songs<br>
            getBestMixTape()
            <table border="1">
                <tr><td><?php
                        $mixTapeList = getBestMixTape();
                        echo var_dump($mixTapeList);
                        ?>
                    </td></tr>
                <tr><td><?php
                        foreach ($mixTapeList as $tempSong) {
                            echo getSong($tempSong) . '<br>';
                        }
                        ?>
                    </td></tr>
            </table>
        </div>

        <div>
            <h2>Get list of all songs as array</h2>
            <p>The function returns a php array of Song objects.
            </p>
            <table border="1">
                <tr><td>getAllSongs()</td></tr>

                <tr><td><?php
                        $songArray = getAllSongs();
                        foreach ($songArray as $incSong) {
                            if ($incSong instanceof Song) {
                                echo $incSong . '<br>';
                            }
                        }
                        ?></td></tr>
                <tr><td>Below is one of the top songs' embedded videos<br>
                        <?php
                        $randSong = rand(0, count($songArray));
                        if ($songArray[$randSong] instanceof Song) {
                            echo $songArray[$randSong]->getEmbedLink();
                        }
                        ?></td></tr>
            </table>
        </div>

        <div>
            <h2>Get list of approved songs as array</h2>
            <p>The function returns a php array of Song objects.
            </p>
            <table border="1">
                <tr><td>getAllSongs()</td></tr>

                <tr><td><?php
                        $songArray = getApprovedSongs();
                        foreach ($songArray as $incSong) {
                            if ($incSong instanceof Song) {
                                echo $incSong . '<br>';
                            }
                        }
                        ?></td></tr>
            </table>
        </div>

        <div>
            <h2>Get user 1's mix tape</h2>
            getUserMixTape(1)
            <table border="1">
                <td><?php
                    echo var_dump(getUserMixTape(1));
                    ?>
                </td>
            </table>
        </div>

        <div>
            <h2>Get a song's genres/artists</h2>
            getSongGenre(1)<br>
            getSongArtist(1)
            <table border="1">
                <tr><td><?php echo var_dump(getSongGenre(1)); ?></td></tr>
                <tr><td><?php echo var_dump(getSongArtist(1)); ?></td></tr>

            </table>

            getSongGenre(11)<br>
            getSongArtist(11)
            <table border="1">
                <tr><td><?php echo var_dump(getSongGenre(11)); ?></td></tr>
                <tr><td><?php echo var_dump(getSongArtist(11)); ?></td></tr>
            </table>
        </div>
    </body>
</html>