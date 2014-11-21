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
        <div id="left-space" class="col-sm-2"></div>
        <div id="left-column" class="col-sm-4">
            <div align="center">
                <h1>Song Approval Menu</h1>
            </div>
            <div class="well bs-component">
                <div class="form-horizontal" action="" method="POST">
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
                        </div>
                        <p id="songInfo_admin"></p>
                    </div>
                </div>
            </div>


            <?php
            $songListUnapproved = getUnapprovedSongs();
            if (count($songListUnapproved) > 0) {
                ?>
                <div class="well bs-component">
                    <div align="center">
                        <h1>Songs awaiting approval</h1>
                    </div>
                    <div class="well-1 bs-component">
                        <div class="form-horizontal" action="" method="POST">
                            <table class="table table-striped">


                                <?php
                                foreach ($songListUnapproved as $song) {
                                    if ($song instanceof Song) {
//                                        $songTitle = $song->title;
//                                        $songArtist = $song->getArtists();
//                                        $songGenre = $song->getGenres();
//                                        $songLink = $song->getLink();

                                        echo '<tr><th>'
                                            . $song->js_infoBox_admin(true) . '</th><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>


            <?php
            $songListFlagged = getFlaggedSongs();
            if (count($songListFlagged) > 0) {
                ?>
                <div align="center">
                    <h1>Flagged songs</h1>
                </div>
                <div class="well bs-component">
                    <div class="well-1 bs-component">
                        <table class="table table-striped">


                            <?php
                            foreach ($songListFlagged as $song) {
                                if ($song instanceof Song) {
//                                        $songTitle = $song->title;
//                                        $songArtist = $song->getArtists();
//                                        $songGenre = $song->getGenres();
//                                        $songLink = $song->getLink();

                                    echo '<tr><th>'
                                        . $song->js_infoBox_admin(true) . '</th><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            <?php } ?>


        </div>
        <div id="right-column" class="col-sm-4">
            <div align="center">
                <h1>Songs</h1>
            </div>
            <div class="well bs-component">
                <div class="well-1 bs-component">

                    <table class="table">
                        <thead>
                        <tr>
                            <th>
                                <b>Song by Artist</b>
                            </th>
                            <th></th>
                            <th>
                                <a href='songForm.php'><span
                                        class='well-1 btn btn-label-right btn-primary'>Add a song</span></a>
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $songListNormal = getApprovedAndUnflaggedSongs();

                        foreach ($songListNormal as $song) {
                            if ($song instanceof Song) {
                                $songTitle = $song->title;
                                $songArtist = $song->getArtists();
                                $songGenre = $song->getGenres();
                                $songLink = $song->getLink();

                                echo '<tr><th>'
                                    . $song->js_infoBox_admin(true) . '</th><th></th><tr>'; //' by '.$song->getArtists().'</div></td><tr>';
                            }
                        }
                        ?>
                        </tbody>
                        <?php ?>
                    </table>
                </div>
                <!--End well-1-->
            </div>
        </div>

    </div>
    <div id="left-space" class="col-sm-2"></div>
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
