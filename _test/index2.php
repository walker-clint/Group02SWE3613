<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Crazy Leroy's Music</title>
        <base href="../">
        <meta name="description" content="description">
        <meta name="author" content="Crazy Leroy's Music">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
        <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
        <link href="plugins/select2/select2.css" rel="stylesheet">
        <link href="css/index_style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
        <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--Start Header-->
        <header class="navbar-collapse">
            <div id="top-panel" class="container-fluid expanded-panel">
                <div class="row">
                    <div id="logo" class="col-xs-2 col-sm-2">
                        <img src="img/cllogo.png" class="img-responsive" />
                    </div>
                    <ul class="nav navbar-nav pull-right panel-menu">
                        <li class="btn-label-right" >
                            <a href="login.php">Login</a>
                        </li>
                        <li class="btn-label-right">
                            <a href="register.php">Register</a>
                        </li>
                    </ul>

                </div>

            </div>

        </header>
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
                            <div class="video-container" id="vidWindow">
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
<!--                                <script>
                                    function changeBox(songLink) {
                                        alert("test");
                                        var element = document.getElementById("vidWindow")
                                        var link = '<iframe width = "350" height = "280" src = "//www.youtube.com/embed/' + songLink + '?autoplay=1" frameborder = "0" allowfullscreen> </iframe>';
                                        //var link = songLink;
                                        element.innerHTML = link;
                                    }
                                </script>-->
                                    <?php echo '<script src="'.$_SERVER['SERVER_NAME']. '/js/playSong.js"></script>' ?>

                                    <?php
                                    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
                                    include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

                                    $allSongs = getAllSongs();

                                    foreach ($allSongs as $song) {
                                        if ($song instanceof Song) {
                                            $songLink = $song->getLink();
                                            //$link = '<iframe width = "350" height = "280" src = "//www.youtube.com/embed/' + $songLink + '?autoplay=0" frameborder = "0" allowfullscreen> </iframe>';

                                            echo '<tr>';
                                            echo '<td><span onclick="changeBox(\'' . $songLink . '\')">' . $song->title . '</span></td>';
                                            echo '<td>' . $song->getArtists() . '</td>';
                                            echo '<td>' . $song->getGenres() . '</td>';
                                            echo '<td>' . '<a' . '</td>';
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
