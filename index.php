<!DOCTYPE html>
<html lang="en">
<head>
    <!--<base href="../">-->
    <?php
    require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
    echo '<script src="http://' . $_SERVER['SERVER_NAME'] . '/js/songFunctions.js"></script>';
    ?>

</head>
<body>
<!--Start Header-->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
<!--End Header-->
<!--Start Middle-->
<div id="main" class="container-fluid">
    <!--Start Content-->
    <div class="row">
        <div id="left-column" class="col-sm-2"></div>
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
                            $initialSong = getSong($mixTapeList[$randSongNumber]);
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


        <div id="right-column" class="col-sm-4">
            <div align="center">
                <h1>Top Nine Songs</h1>
            </div>
            <div class="well bs-component">
                <!--<legend>RIGHT COLUMN</legend>-->
<!--                <h1>Top Nine Songs</h1>-->

                <div class="form-horizontal" action="" method="POST">

                    <table>
                        <?php
                        $increment = 1;
                        foreach ($mixTapeList as $songInt) {
                            $song = getSong($songInt);
                            if ($song instanceof Song) {
                                $songTitle = $song->title;
                                $songArtist = $song->getArtists();
                                $songGenre = $song->getGenres();
                                $songLink = $song->getLink();

                                echo '<tr><td><h1>' . $increment . '</h1></td><td><div class="well-2 bs-component"'
                                    . 'onclick="' . $song->js_changeBox() . '" onmouseover="" style="cursor: pointer;">'
                                    . $song->js_infoBox() . '</div></td><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                            }
                            $increment += 1;
                        }
                        ?>
                        <?php ?>

                    </table>
                    <!--End well-1-->
                </div>
            </div>

        </div>
        <div id="left-column" class="col-sm-2"></div>
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
                                src="img/Comic_Characters_Camera_clip_art_medium.png" class="img-responsive"/>
                        </div>
                    </div>
                    <div class="panel panel-footer">
                        <a1>Image Credit: <a href="http://vector.me/browse/161712/comic_characters_camera_clip_art"
                                             title="Comic Characters Camera Clip Art" target="_blank">Comic Characters
                                Camera Clip Art</a> from <a href="http://vector.me" title="Vector.me" target="_blank">Vector.me</a>
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
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/footer.php'; ?>

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
