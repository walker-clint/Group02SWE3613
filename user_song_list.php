<?php
include_once "connect_to_mysql.php";
$results = "";
if ($_POST['title']) {
    $title = $_POST['title'];
    $sql = mysql_query("SELECT * FROM tbl_song WHERE title LIKE '%{$title}%'");
    $song_check = mysql_num_rows($sql);
    if ($song_check > 0) {
        while ($row = mysql_fetch_array($sql)) {
            $song_id = $row['song_id'];
            $song_link = $row['youtube'];
            $song_title = $row['title'];
            $song_genre_query = "SELECT * FROM tbl_song_genre where song_id = $song_id LIMIT 1";
            $song_genre_result = mysql_query($song_genre_query);
            while ($song_genre_row = mysql_fetch_assoc($song_genre_result)) {
                $genre_id = $song_genre_row['genre_id'];
            }
            $song_artist_query = "SELECT * FROM tbl_song_artist where song_id = $song_id LIMIT 1";
            $song_artist_result = mysql_query($song_artist_query);
            while ($song_artist_row = mysql_fetch_assoc($song_artist_result)) {
                $artist_id = $song_artist_row['artist_id'];
            }
            $genre_query = "SELECT * FROM tbl_genre where genre_id = $genre_id LIMIT 1";
            $genre_result = mysql_query($genre_query);
            while ($genre_row = mysql_fetch_assoc($genre_result)) {
                $genre_name = $genre_row['name'];
            }
            $artist_query = "SELECT * FROM tbl_artist where artist_id = $artist_id LIMIT 1";
            $artist_result = mysql_query($artist_query);
            while ($artist_row = mysql_fetch_assoc($artist_result)) {
                $artist_name = $artist_row['name'];
            }
            $results .= '<tr>';
            $results .= '<td><a href="' . $song_link . '" target="_blank">' . $song_title . ' by ' . $artist_name . '</a></td>';
            $results .= '<td><form class="form-horizontal" method="post"><input class="btn btn-primary" type="submit" name = "create_exist" value="Use This Song"/></form></td>';
            $results .= '</tr>';
        }
        //add button
        $results .= '<tr><td colspan="5"><form class="form-horizontal" method="post"><input class="btn btn-primary" type="submit" name = "create_new" value="Submit New Song"/></form></td><tr>';
    } else {
        //no songs found
        header('Location: http://' . $_SERVER['SERVER_NAME'] . '/add_song_create.php');
        exit();
    }

}


if ($_POST['create_new']) {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/add_song_create.php');
    exit();
}

if ($_POST['create_exist']) {
    //insert mixtape


    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/user_song_list.php');
    exit();
}?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php'; ?>
    <script src="./js/songFunctions.js"></script>
</head>
<body>
<!--Start Header-->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
<!--End Header-->
<!--Start Row Main Page Data-->-->
<div id="main" class="container-fluid">
    <div class="row">
        <div id="left-space" class="col-sm-1"></div>
        <div id="left-column" class="col-sm-4">
            <h1>CRAZY LEROY'S MUSIC</h1>

            <div class="well bs-component">
                <div class="form-horizontal" action="" method="POST">
                    <div class="well-1 bs-component">
                        <div class="video-container" id="vidWindow">
                            <?php
                            $mixTapeList = getBestMixTape();
                            $randSongNumber = rand(0, (count($mixTapeList) - 1));
                            $initialSong = getSongById($mixTapeList[$randSongNumber]);
                            if ($initialSong instanceof Song) {
                                echo '<script>window.onload = (function(){' . $initialSong->js_changeBox() . ';});</script>';
                            }
                            ?>
                        </div>
                        <p id="songInfo"></p>
                    </div>
                </div>
            </div>
            <h1 align="center">Add Song: Search for an Existing Song</h1>

            <div class="well bs-component">
                <form class="form-horizontal" action="add_song_search.php" method="post">
                    <div class="well-1 bs-component">

                        <div class="form-group">
                            <label for="title" class="col-lg-2 control-label">Title</label>

                            <div class="col-lg-10">
                                <input align="center" type="text" class="form-control-1" id="title" name="title"
                                       value='<?php echo "$title" ?>'>
                            </div>
                        </div>
                        <div align="center">
                            <input class="btn btn-primary" type="submit" value="Submit"/>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <td><b>Song</b></td>
                        <td><b>Action</b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php echo $results; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="right-column" class="col-sm-6">
            <div align="center">
                <h1>Your Song List</h1>
            </div>
            <div class="well bs-component">
                <div class="form-horizontal" action="" method="POST">
                    <div class="well-2 bs-component">
                        <div class="captcha-container">
                            <div class="captcha-container frame">
                                <table class="table table-striped" width="90%" cellpadding="2" cellspacing="2"
                                       overflow="auto">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <h3>Title</h3>
                                        </th>
                                        <th>
                                            <h3>Artist</h3>
                                        </th>
                                        <th>
                                            <h3>Genre</h3>
                                        </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!--                        <tr>-->
                                    <!--                            <th class="col-xs-1"></th>-->
                                    <!--                            <th class="col-xs-3"></th>-->
                                    <!--                            <th class="col-xs-4"></th>-->
                                    <!--                            <th class="col-xs-3"></th>-->
                                    <!--                            <th class="col-xs-1"></th>-->
                                    <!--                        </tr>-->
                                    <?php
                                    $increment = 1;
                                    $userMixtape = getMixtape($_SESSION['user_id']);
                                    foreach ($userMixtape as $songId) {
                                        $song = getSongById($songId);
                                        $songTitle = $song->title;
                                        $songArtist = $song->getArtists();
                                        $songGenre = $song->getGenres();
                                        $songLink = $song->getLink();
                                        echo '<tr><th></th><th><h2>' .
                                            $songTitle . '</h2></th><th><h2>' .
                                            $songArtist . '</h2></th><th><h2>' .
                                            $songGenre . '</h2></th><th></th><th></th><th>' .
                                            '<div class="btn btn-primary" >Play Song</div>' .
                                            '</th><th></th><th> <div class="btn btn-warning" >Delete</div>' .
                                            '</th><th></th></tr>';
                                    }
                                    ?>
                                    <?php ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="right-space" class="col-sm-1"></div>
    </div>
</div>
<!--End Row Main Page Data-->

<!--Start Ads-->

<div class="row">
    <div id="left-column" class="col-sm-2"></div>
    <div id="left-ad" class="col-sm-2">
        <div class="well bs-component">
            <div class="panel panel-default" align="left">
                <div class="panel panel-body">
                    <div align="center">
                        <h3>Your Ad here!!</h3>
                    </div>

                    <div id="logo" class="col-xs-12 col-sm-12">
                        <img src="img/Comic_Characters_Painter_clip_art_medium.png" class="img-responsive"/>
                    </div>
                </div>
                <div class="panel panel-footer">
                    <a1>Image Credit: <a
                            href="http://vector.me/browse/132175/people_man_artist_painter_comic_characters_painters"
                            title="People Man Artist Painter Comic Characters Painters" target="_blank">People Man
                            Artist Painter Comic Characters Painters</a> from <a href="http://vector.me"
                                                                                 title="Vector.me" target="_blank">Vector.me</a>
                        (by nicubunu)
                    </a1>
                </div>
            </div>
        </div>
    </div>
    <div id="center-ad" class="col-sm-4">
        <div class="well bs-component">
            <div class="panel panel-default" align="left">
                <div class="panel panel-body">
                    <div align="center">
                        <h3>Your Ad here!!</h3>
                    </div>

                    <div id="logo" class="col-xs-12 col-sm-12"><img
                            src="img/Comic_Characters_Santa_clip_art_medium.png" class="img-responsive"/>
                    </div>
                </div>
                <div class="panel panel-footer">
                    <a1>Image Credit: <a href="http://vector.me/browse/153534/comic_characters_santa_clip_art"
                                         title="Comic Characters Santa Clip Art" target="_blank">Comic Characters
                            Santa Clip Art</a> from <a href="http://vector.me" title="Vector.me" target="_blank">Vector.me</a>
                        (by nicubunu)
                    </a1>
                </div>
            </div>
        </div>
    </div>
    <div id="right-ad" class="col-sm-2">
        <div class="well bs-component">
            <div class="panel panel-default" align="left">
                <div class="panel panel-body">
                    <div align="center">
                        <h3>Your Ad here!!</h3>
                    </div>

                    <div id="logo" class="col-xs-12 col-sm-12"><img
                            src="img/Comic_Characters_Painter_clip_art_medium.png" class="img-responsive"/>
                    </div>
                </div>
                <div class="panel panel-footer">
                    <a1>Image Credit: <a
                            href="http://vector.me/browse/132175/people_man_artist_painter_comic_characters_painters"
                            title="People Man Artist Painter Comic Characters Painters" target="_blank">People Man
                            Artist Painter Comic Characters Painters</a> from <a href="http://vector.me"
                                                                                 title="Vector.me" target="_blank">Vector.me</a>
                        (by nicubunu)
                    </a1>
                </div>
            </div>
        </div>
    </div>
    <div id="left-column" class="col-sm-2"></div>
</div>

<!--End Ads-->

</div>

<!--footer-->
<footer class="footer">
    <div class="container">
        <div align="center">

            <p class="text-muted">Group 02p2 Project 2 SWE3613 Southern Polytechnic State Univerisity (SPSU)</p>
        </div>
        <div align="center">

            <p class="text-muted">Copy Right 2014: Clinton Walker; Erik Storla; Michael Adeyosoye</p>
        </div>
    </div>
</footer>


<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="js/devoops.js"></script>


</body>
</html>
