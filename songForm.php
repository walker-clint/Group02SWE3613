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
        <?php
        $pageFunction = 'Add';
        if ($userType == 'admin' && $_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['songId'])) {
            $songId = $_GET['songId'];
            $pageFunction = 'Edit';
            $song = getSongById($songId);
        }
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
                <div id="left-column" class="col-sm-4"></div>

                <!--<div id="right-column" class="col-sm-4">-->
                <div id="center1-column" class="col-sm-4">
                    <div align="center">
                        <h1><?php echo $pageFunction; ?> a song</h1>
                    </div>
                    <div class="well bs-component">
                        <form class="form-horizontal" method="post" action="/php/songFormPost.php">
                            <input type="hidden" name="actionType" value="<?php echo $pageFunction; ?>">
                            <?php if ($pageFunction == 'Edit') {
                                ?><input type="hidden" name="songId" value="<?php echo $songId; ?>"><?php
                            }
                            ?>

                            <div class="form-group">
                                <label for="title" class="col-lg-4 control-label">Title</label>
                                <div class="col-lg-8">
                                    <input align="center" type="text" class="form-control" id="title" name="title"
                                           value = "<?php
                                           if (!empty($song)) {
                                               echo $song->title;
                                           }
                                           ?>" placeholder="Enter the song title here">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="artist" class="col-lg-4 control-label">Artist(s)</label>
                                <div class="col-lg-8">
                                    <select multiple name = "artists[]">
                                        <?php
                                        $artists = getAllArtists();
                                        if ($pageFunction == 'Edit') {
                                            $songArtists = getSongArtistIds($songId);
                                        }
                                        foreach ($artists as $artist) {
                                            $preSelect = '';
                                            foreach ($songArtists as $artistCompare) {
                                                if ($artistCompare == $artist) {
                                                    $preSelect = ' selected = "selected"';
                                                }
                                            }
                                            echo '<option value ="' . $artist . '"' . $preSelect . '>'
                                            . '' . getArtistById($artist) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <label class="col-lg-4 control-label"></label>
                                <div class="col-lg-8">
                                    <input align="center" type="text" class="form-control" id="newArtist" name="newArtist"
                                           placeholder="Enter an artist if not already in the system here">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="genre" class="col-lg-4 control-label">Genre(s)</label>
                                <div class="col-lg-8">
                                    <select multiple name = 'genres[]'>
                                        <?php
                                        $genres = getAllGenres();
                                        if ($pageFunction == 'Edit') {
                                            $songGenres = getSongGenreIds($songId);
                                        }
                                        foreach ($genres as $genre) {
                                            $preSelect = '';
                                            foreach ($songGenres as $genreCompare) {
                                                if ($genreCompare == $genre) {
                                                    $preSelect = ' selected = "selected"';
                                                }
                                            }
                                            echo '<option value ="' . $genre . '"' . $preSelect . '>'
                                            . '' . getGenreById($genre) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <label class="col-lg-4 control-label"></label>
                                <div class="col-lg-8">
                                    <input align="center" type="text" class="form-control" id="newGenre" name="newGenre"
                                           placeholder="Enter a genre if not already in the system here">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link" class="col-lg-4 control-label">Youtube Link</label>
                                <div class="col-lg-8">
                                    <input align="center" type="text" class="form-control" id="link" name="link"
                                           value="<?php if (!empty($song)) {
                                            echo $song->youtubeLink;
                                            } ?>" placeholder="example: https://www.youtube.com/watch?v=PTC3zoXMrIg">
                                </div>
                            </div>

                            <div align="center">
                                <input class="btn btn-primary" type="submit" value="Submit"/>
                            </div>
                        </form>

                    </div>
                </div>


                <!--End Middle-->
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

    </body>
</html>
