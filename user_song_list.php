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
<!--Start Middle-->
<div id="main" class="container-fluid">
<!--Start Content-->
<div class="row">
    <!--        <div id="left-column" class="col-sm-1"></div>-->
    <div id="left-column" class="col-sm-4">
        <div class="well bs-component">
            <!--<legend>LEFT COLUMN</legend>-->
            <h1></h1>

            <div class="form-horizontal" action="" method="POST">

                <div class="well-1 bs-component">
                    <div class="video-container" id="vidWindow">
                        <!-- to autoplay in the src="//www.youtube.com/embed/...?autoplay" the ... is the link #= ... and this is the number we need to get and fill from YouTube -->
                        <?php
                        $mixTapeList = getBestMixTape();

                        $randSongNumber = rand(0, (count($mixTapeList) - 1));
                        $initialSong = getSongById($mixTapeList[$randSongNumber]);
                        if ($initialSong instanceof Song) {
                            echo '<script>window.onload = (function(){' . $initialSong->js_changeBox() . ';});</script>';
                        }
                        ?>
                        <!--<iframe width="350" height="280" src="//www.youtube.com/embed/WUdIKdRuYc4?autoplay=0" frameborder="0" allowfullscreen></iframe>-->
                        <!--<iframe width="350" height="280" src="//www.youtube.com/embed/<?php // echo $initialSong;      ?>?autoplay=0" frameborder="0" allowfullscreen></iframe>-->
                    </div>
                    <p id="songInfo"></p>
                </div>
            </div>
        </div>
    </div>


    <div id="right-column" class="col-sm-8">
        <div align="center">
            <h1>Your Song List</h1>
        </div>
        <div class="well bs-component">
            <!--<legend>RIGHT COLUMN</legend>-->


            <div class="form-horizontal" action="" method="POST">
                <div class="well-2 bs-component">
                    <table class="table">
                        <thead>

                        <tr>
                            <th>
                                <h2>Title</h2>
                            </th>
                            <th>
                                <!--make into button with link-->
                                <h2>YouTube Link</h2>
                            </th>
                            <th></th>

                            <!--<th></th>-->
                        </tr>
                        <tr>
                            <th>
                                <h2>Artist</h2>
                            </th>
                            <th>
                                <h2>Genre</h2>
                            </th>
                            <th>
                                <h2>Action</h2>
                            </th>
                        </tr>

                        </thead>
                </div>
                <tbody>
<!--                --><?php
//                $increment = 1;
//                $userMixtape = getMixtape($_SESSION['user_id']);
//                foreach ($userMixtape as $songId) {
//                    $song = getSongById($songId);
//                    $songTitle = $song->title;
//                    $songArtist = $song->getArtists();
//                    $songGenre = $song->getGenres();
//                    $songLink = $song->getLink();
////                        <h4>' . $increment . '</h4>
//                    echo '<div class="well-2 bs-component><tr><th>' .
//                        $songTitle . '</th><th>' .
//                        $songLink . '</th><th>' .
//                        $songGenre . '</th></tr><tr><th>' .
//                        $songArtist .
//                        '</th><th></th><th> <div class="btn btn-primary" >Delete</div>' .
//                        '</td></tr></div>';
//                    $increment += 1;
//                }
                //                        foreach ($mixTapeList as $songInt) {
                //                            $song = getSongById($songInt);
                //                            if ($song instanceof Song) {
                //                                $songTitle = $song->title;
                //                                $songArtist = $song->getArtists();
                //                                $songGenre = $song->getGenres();
                //                                $songLink = $song->getLink();
                //
                //                                echo '<tr><td><h1>' . $increment . '</h1></td><td><div class="well-2 bs-component"'
                //                                    . 'onclick="' . $song->js_changeBox() . '" onmouseover="" style="cursor: pointer;">'
                //                                    . $song->js_infoBox() . '</div></td><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                //                            }
                //                            $increment += 1;
                //                        }

                ?>
                <?php ?>
                </tbody>
                </table>
                <!--End well-1-->
            </div>
        </div>

    </div>
    <!--        <div id="left-column" class="col-sm-1"></div>-->
</div>

<!--End Middle-->
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
</div>

</body>
</html>
