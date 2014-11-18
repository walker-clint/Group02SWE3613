<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; ?>
    </head>
    <body>
        <!--Start Header-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
        <!--End Header-->
        <!--Start Middle-->
        <div id="main" class="container-fluid">


            <!--Start Content-->
            <div class="row">
                <div id="left-column" class="col-sm-4">
                    <div class="well bs-component">
                        <!--<legend>LEFT COLUMN</legend>-->
                        <h1>Left Column</h1>

                        <div class="form-horizontal" action="" method="POST"></div>

                        <div class="well-1 bs-component">
                            <div class="video-container">
                                <!-- to autoplay in the src="//www.youtube.com/embed/...?autoplay" the ... is the link #= ... and this is the number we need to get and fill from YouTube -->
                                <iframe width="350" height="280" src="//www.youtube.com/embed/WUdIKdRuYc4?autoplay=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="right-column" class="col-sm-8">
                    <div class="well bs-component">
                        <!--<legend>RIGHT COLUMN</legend>-->
                        <h1>All Songs</h1>

                        <div class="form-horizontal" action="" method="POST"></div>

                        <div class="well-1 bs-component">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td><b>Title</b></td>

                                        <td><b>Artist</b></td>

                                        <td><b>Genres</b></td>

                                        <td><b>Actions</b></td>
                                    </tr>
                                    <?php
                                    include_once './php/queries.php';
                                    include_once './php/objects.php';
                                    $allSongs = getAllSongs();

                                    foreach ($allSongs as $song) {
                                        if ($song instanceof Song) {
                                            echo '<tr>';
                                            echo '<td>' . $song->title . '</td>';
                                            echo '<td>' . $song->getArtists() . '</td>';
                                            echo '<td>' . $song->getGenres() . '</td>';
                                            echo '<td>' . '</td>';
                                        }
                                    }
                                    ?>

                                </thead>
                                <tbody>
                                    <!--Start well-1-->

                                    <?php
                                    ?>
                                </tbody>
                            </table>

                            <!--End well-1-->
                        </div>
                    </div>

                </div>
                <!--End Content-->

            </div>
            <!--End Middle-->

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
