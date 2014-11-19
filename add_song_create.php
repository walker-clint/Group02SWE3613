<!DOCTYPE html>
<html lang="en">
<head>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; ?>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
<div id="main" class="container-fluid">
<div class="row">
  <div id="left-column" class="col-sm-4"></div>
  <div id="center1-column" class="col-sm-4">
    <div class="well bs-component">
      <h1 align="center">Add Song: Submit a New Song</h1>
      <div class="well-1 bs-component">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label for="title" class="col-lg-4 control-label">Title</label>
            <div class="col-lg-8">
              <input align="center" type="text" class="form-control" id="title" name="title">
            </div>
          </div>
          <div class="form-group">
            <label for="artist" class="col-lg-4 control-label">Artist</label>
            <div class="col-lg-8">
              <input align="center" type="text" class="form-control" id="artist" name="artist">
            </div>
          </div>
          <div class="form-group">
            <label for="genre" class="col-lg-4 control-label">Genre</label>
            <div class="col-lg-8">
              <input align="center" type="text" class="form-control" id="genre" name="genre">
            </div>
          </div>
          <div class="form-group">
            <label for="link" class="col-lg-4 control-label">Youtube Link</label>
            <div class="col-lg-8">
              <input align="center" type="text" class="form-control" id="link" name="link">
            </div>
          </div>
          
          <div align="center">
            <input class="btn btn-primary" type="submit" value="Submit"/>
          </div>
        </form>
        
        
      </div>
    </div>
  </div>
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
</body>
</html>