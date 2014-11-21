<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
        ?>
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
                <div id="left-column" class="col-sm-4"></div>
                <div id="left-column" class="col-sm-4">
                    <div class="well bs-component">
                        <!--<legend>LEFT COLUMN</legend>-->
                        <h1></h1>
                        <div class="form-horizontal" action="" method="POST">

                            <div class="well-1 bs-component">
                                <div class="video-container" id="vidWindow">
                                    <?php
                                    $mixTapeList = getBestMixTape();

                                    $randSongNumber = rand(0, (count($mixTapeList) - 1));
                                    $initialSong = getSongById($mixTapeList[$randSongNumber]);
                                    if ($initialSong instanceof Song) {
                                        echo '<script>window.onload = (function(){' . $initialSong->js_changeBox(false) . ';});</script>';
                                    }
                                    ?>
                                </div>
                                <p id="songInfo"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div id="left-column" class="col-sm-2"></div>

                <!--<div id="right-column" class="col-sm-4">-->
                <div id="center1-column" class="col-sm-4">
                    <div align="center">
                        <h1>Your Mixtape!</h1>
                    </div>
                    <div class="well bs-component">
                        <!--<legend>RIGHT COLUMN</legend>-->
                        <table class="table">
                            <?php
                            $userMixtape = getMixtape($_SESSION['user_id']);
                            foreach ($userMixtape as $songId) {
                                $song = getSongById($songId);
                                echo '<tr><td>' . $song->js_infoBox(true) . '</td></tr>';
                            }
                            ?>
                        </table>


                    </div>

                </div>
                <div id="center1-column" class="col-sm-4">
                    <div align="center">
                        <h1>Add another song to your Mixtape</h1>
                    </div>
                    <div class="well bs-component">
                        <div class="form-horizontal" action="" method="POST">

                            <!--<form>-->
                            <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
                            <script type="text/javascript" src="./js/liveSearch.js"></script>
                            <div class="content">
                                <em>Don't see your song? </em><a href='songForm.php'><span class='well-1 btn btn-label-right'>Add it!</span></a>
                                <h4>Enter a song name (or part of a name) to search for:</h4>
                                <input type="text" class="search" id="searchid" placeholder="Search for songs" /><br /><br>
                                <table id="result" class="table">
                                    <div class="show" align="left">
                                        <?php
                                        $songList = getApprovedSongs();
                                        foreach ($songList as $song) {
                                            echo '<tr><td>' . $song->js_infoBox(true) . '</tr></td>';
                                        }
                                        ?>
                                    </div>
                                </table>

                            </div>
                            <!--</form>-->
                            <!--End well-1-->
                        </div>
                    </div>
                </div>
            </div>

            <!--End Middle-->


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
