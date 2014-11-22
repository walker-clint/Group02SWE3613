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
        <!--Start Row Main Page Data-->
        <div id="main" class="container-fluid">
            <div class="row">
                <div id="left-space" class="col-sm-2 mobile-only">
                    <img src="img/loud-speaker-L-md.png" class="img-responsive" align="left"/>
                </div>
                <div id="left-column" class="col-sm-4">
                    <div align="center">
                        <h1>Awesome Tunes!</h1>
                    </div>

                    <div class="well bs-component">
                        <div class="form-horizontal" action="" method="POST">
                            <div class="well-1 bs-component">
                                <div class="video-container" id="vidWindow">
                                    <?php
                                    $mixTapeList = getBestMixTape();
                                    $userMixtape = getMixtape($_SESSION['user_id']); //need to get mixtape now to check count soon

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
                    <h3 align="center">Add Song: Search for an Existing Song</h3>

                    <div class="well bs-component">
                        <!--<form class="form-horizontal" action="songForm.php" method="post">-->
                        <div class="well-2 bs-component">
                            <div align="center">
                                Enter a title or artist to search for: <input type="text" class="search" id="searchid" placeholder="Search for songs"/><br/>
                                <em>Can't find your song?</em> <a href='songForm.php'><span class='well-1 btn btn-label-right btn-primary'>Add it!</span></a>

                                <script type="text/javascript" src="./js/jquery-1.11.1.min.js"></script>
                                <script type="text/javascript" src="./js/liveSearch.js"></script>
                                <table id="result" class="table-striped">
                                    <div class="show" align="left">
                                        <?php
                                        //$songList = getApprovedSongs_notOnMixtape($_SESSION['user_id']);
                                        $songList = getRandApprovedSongs_notOnMixtape($_SESSION['user_id']);
                                        foreach ($songList as $song) {
                                            ?>
                                            <tr>
                                                <td><a href='/php/toggleMixtape.php?songId=<?php echo $song->id; ?>'>
                                                        <?php if (count($userMixtape) < 30) {
                                                            ?><div class = "btn btn-warning">Add</div><?php } ?>
                                                    </a>
                                                    <?php echo $song->js_infoBox(true); ?>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </table>
                            </div>
                        </div>
                        <!--</form>-->
                    </div>
                </div>
                <!--Start Display User Song List-->
                <div id="right-column" class="col-sm-6">
                    <div align="center">
                        <h1>Your Song List</h1>
                    </div>
                    <div class="well bs-component">
                        <?php
                        if (count($userMixtape) >= 30) {
                            ?>
                            <p>You have a full mixtape! Remove some songs to add more!</p>
                            <?php
                        }
                        ?>
                        <a href='songForm.php'><span class='well-1 btn btn-label-right btn-primary'>Add a new song!</span></a>
                        <p><span style = "font-size: 1em">This icon <img src = "/img/warning.png" height = "20px" width = "20px"/> means the song is waiting for admin approval</span></p>

                        <div class="form-horizontal" action="" method="POST">
                            <div class="well-2 bs-component">
                                <div class="captcha-container-1">
                                    <div class="captcha-container-1 frame">
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
                                            <th></th>
                                            <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $increment = 1;
                                                foreach ($userMixtape as $songId) {
                                                    $song = getSongById($songId);
                                                    $songTitle = $song->title;
                                                    $songArtist = $song->getArtists();
                                                    $songGenre = $song->getGenres();
                                                    $songLink = $song->getLink();
                                                    $songApproved = $song->approved;
                                                    ?>
                                                    <tr>
                                                        <th></th>
                                                        <th><h4><?php
                                                    if ($songApproved != 1) {
                                                        echo '<img src = "/img/warning.png" height = "20px" width = "20px"/>';
                                                    }
                                                    echo $songTitle;
                                                    ?>
                                                </h4></th>
                                                <th><h4><?php echo $songArtist; ?></h4></th>
                                                <th><h4><?php echo $songGenre; ?></h4></th>
                                                <th></th>
                                                <th></th>
                                                <th>
                                                <div class="btn btn-primary"
                                                     onclick="<?php echo $song->js_changeBox(true); ?>">Play Song
                                                </div>
                                                </th>
                                                <th></th>
                                                <th><a href='/php/toggleMixtape.php?songId=<?php echo $songId; ?>'>
                                                        <div class="btn btn-warning">Delete</div>
                                                    </a></th>
                                                <th></th>
                                                </tr>

                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Display User Song List-->
                <div id="right-space" class="col-xs-0 col-sm-1 hidden-phone">
                    <img src="img/loud-speaker-R-md.png" class="img-responsive" align="right"/>
        <!--            <img src="img/mad.png" class="img-responsive" align="right"/>-->
                </div>
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
