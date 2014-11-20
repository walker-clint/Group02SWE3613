<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php'; ?>

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
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
        <!--End Header-->
        <!--Start Middle-->
        <div id="main" class="container-fluid">
            <!--Start Content-->
            <div class="row">
                <div id="left-column" class="col-sm-4">
                    <div class="well bs-component">
                        <!--<legend>LEFT COLUMN</legend>-->
                        <h1></h1>

                        <div class="form-horizontal" action="" method="POST"></div>

                        <div class="well-1 bs-component">
                            <div class="video-container" id="vidWindow_admin">
                                <!-- to autoplay in the src="//www.youtube.com/embed/...?autoplay" the ... is the link #= ... and this is the number we need to get and fill from YouTube -->
                                <?php
//                                $mixTapeList = getBestMixTape();
//
//                                $randSongNumber = rand(0, (count($mixTapeList) - 1));
//                                $initialSong = getSong($mixTapeList[$randSongNumber]);
//                                if ($initialSong instanceof Song) {
//                                    echo '<script>window.onload = (function(){' . $initialSong->getJavascript_changeBox() . ';});</script>';
//                                }
                                ?>
                            </div><p id="songInfo_admin"></p>
                        </div>
                    </div>
                </div>

                <div id="right-column" class="col-sm-4">
                    <div class="well bs-component">
                        <!--<legend>RIGHT COLUMN</legend>-->

                        <div class="form-horizontal" action="" method="POST"></div>

                        <?php
                        $songListUnapproved = getUnapprovedSongs();
                        if (count($songListUnapproved) > 0) {
                            ?>
                            <table class="table">

                                <h1>Songs awaiting approval</h1>

                                <?php
                                foreach ($songListUnapproved as $song) {
                                    if ($song instanceof Song) {
//                                        $songTitle = $song->title;
//                                        $songArtist = $song->getArtists();
//                                        $songGenre = $song->getGenres();
//                                        $songLink = $song->getLink();

                                        echo '<tr><td>'
                                        . $song->js_infoBox_admin(true) . '</td><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                                    }
                                }
                                ?>
                            </table>
                        <?php } ?>
                        <?php
                        $songListFlagged = getFlaggedSongs();
                        if (count($songListFlagged) > 0) {
                            ?>
                            <table class="table">

                                <h1>Flagged songs</h1>
                                <?php
                                foreach ($songListFlagged as $song) {
                                    if ($song instanceof Song) {
//                                        $songTitle = $song->title;
//                                        $songArtist = $song->getArtists();
//                                        $songGenre = $song->getGenres();
//                                        $songLink = $song->getLink();

                                        echo '<tr><td>'
                                        . $song->js_infoBox_admin(true) . '</td><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                                    }
                                }
                                ?>
                            </table>
                        <?php } ?>
                        <h1>Songs</h1>
                        <table class="table">
                            <?php
                            $songListNormal = getApprovedAndUnflaggedSongs();
                            foreach ($songListNormal as $song) {
                                if ($song instanceof Song) {
                                    $songTitle = $song->title;
                                    $songArtist = $song->getArtists();
                                    $songGenre = $song->getGenres();
                                    $songLink = $song->getLink();

                                    echo '<tr><td>'
                                    . $song->js_infoBox_admin(true) . '</td><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                                }
                            }
                            ?>
                            <?php ?>
                        </table>
                        <!--End well-1-->

                    </div>

                </div>

            </div>
            <!--End Middle-->
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
    </body>
</html>
