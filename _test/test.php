<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Page</title>
        <?php include './queries.php'; ?>

    </head>
    <body>
        <h1>Sample queries<br></h1>
        <p>The following demonstrates SQL queries via PHP</p>
        <p>'queries.php' (will) contain the php functions that return the necessary information gathered from an SQL query</p>
        <p>In this way one all the queries (as functions) can be written into one central location.</p>

        <div>
            <h2>Get Best Mix Tape</h2>
            The best mix tape, the 10 most popular songs<br>
            getBestMixTape()
            <table border="1">
                <tr>
                    <td>
                        <?php
                        $mixTapeList = getBestMixTape();
                        echo var_dump($mixTapeList);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        foreach ($mixTapeList as $tempSong) {
                            echo getSong($tempSong) . '<br>';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <h2>Get list of all songs as array</h2>
            <p>This is a simple var_dump(ARRAY) which causes the php to spit out an array and it's metadata.  
                The function returns a php array.
            </p>
            <table border="1">
                <tr>
                    <td>getAllSongs()</td>
                    <td>
                        Song<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $songArray = getAllSongs();
                        echo var_dump($songArray);
                        ?>
                    </td>
                    <td>
                        <?php
                        //$songArray = getAllSongs();
                        foreach ($songArray as $incSong) {
                            if ($incSong instanceof Song) {
                                echo $incSong . '<br>';
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>


        <div>
            <h2>Get user 1's mix tape</h2>
            getUserMixTape(1)
            <table border="1">
                <td>
                    <?php
                    echo var_dump(getUserMixTape(1));
                    ?>
                </td>
            </table>
        </div>

        <div>
            <h2>Get a song's genres</h2>
            getSongGenre(1)
            <table border="1">
                <td>
                    <?php
                    echo var_dump(getSongGenre(1));
                    ?>
                </td>
            </table>
            echo var_dump(getSongGenre(4));
            <table border="1">
                <td>
                    <?php
                    echo var_dump(getSongGenre(4));
                    ?>
                </td>
            </table>
        </div>
    </body>
</html>
