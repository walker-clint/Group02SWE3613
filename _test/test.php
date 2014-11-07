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
            <h2>Get list of all songs as array</h2>
            <table border="1">
                <tr>
                    <td>(getAllSongs());</td>
                    <td>Song<br>
                    ID | Title | App | Flagged? | YouTube | YouTube App</td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo var_dump(getAllSongs());
                        ?>
                    </td>
                    <td>
                        <?php
                        $songArray = getAllSongs();
                        foreach ($songArray as $incSong) {
                            if ($incSong instanceof Song) {
                                echo $incSong->printSong() . '<br>';
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <p>This is a simple var_dump(ARRAY) which causes the php to spit out an array and it's metadata.  
            The function returns a php array.
        </p>

        <div>
            <h2>Get user 1's mix tape</h2>
            echo var_dump(getUserMixTape(1));
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
            echo var_dump(getSongGenre(1));
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
