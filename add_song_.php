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

                <!--<div id="right-column" class="col-sm-4">-->
                <div id="center1-column" class="col-sm-4">
                    <div align="center">
                        <h1>Add a new song</h1>
                    </div>
                    <div class="well bs-component">
                        <!--<legend>RIGHT COLUMN</legend>-->


                        <div class="form-horizontal" action="" method="POST">
                            <form>
                                <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
                                <script type="text/javascript" src="./js/liveSearch.js"></script>
                                <div class="content">
                                    Enter a song name (or part of a name): <input type="text" class="search" id="searchid" placeholder="Search for songs" /><br />
                                    <div id="result">
                                        <?php
                                        $songList = getApprovedSongs();
                                        foreach ($songList as $song) {
                                            ?>
                                            <div class="show" align="left">
                                                <?php
                                                echo $song->title . '<br>';
                                            }
                                            ?>
                                        </div></div>
                                </div>
                            </form>
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
