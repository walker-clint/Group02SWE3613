<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php';
        ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"  href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
         <script type="text/javascript">
                $(document).ready(function(){
                    $("#name").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>
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
                <div id="center1-column" class="col-sm-4">
                    <div class="well bs-component"> 
                        <!--<legend>LEFT COLUMN</legend>-->
                        <h1 align="center">Login</h1>
                        <div class="well-1 bs-component">
                           <form method="post" action="">
           
      </form>
                            
                                <div class="form-group">
                                    <div class="col-lg-8">
                                          Name : <input type="text" id="name" name="name" />
                                    </div>
                                </div>                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Content-->
            <div id="right-column" class="col-sm-4"></div>
        </div>
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