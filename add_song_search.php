<!DOCTYPE html>
<html lang="en">
<head>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; 
include_once "connect_to_mysql.php";
$results="";
if($_POST['title']){
	$title = $_POST['title'];
$sql = mysql_query("SELECT * FROM tbl_song WHERE title LIKE '%{$title}%'"); 
$song_check = mysql_num_rows($sql); 
if ($song_check > 0){ 
    while($row = mysql_fetch_array($sql)){
		$song_id = $row['song_id'];
		$song_link = $row['youtube'];
		$song_title = $row['title'];
        		$song_genre_query = "SELECT * FROM tbl_song_genre where song_id = $song_id LIMIT 1";
$song_genre_result = mysql_query($song_genre_query);
while($song_genre_row = mysql_fetch_assoc($song_genre_result)){
$genre_id = $song_genre_row['genre_id'];
} 
		$song_artist_query = "SELECT * FROM tbl_song_artist where song_id = $song_id LIMIT 1";
$song_artist_result = mysql_query($song_artist_query);
while($song_artist_row = mysql_fetch_assoc($song_artist_result)){
$artist_id = $song_artist_row['artist_id'];
} 
		$genre_query = "SELECT * FROM tbl_genre where genre_id = $genre_id LIMIT 1";
$genre_result = mysql_query($genre_query);
while($genre_row = mysql_fetch_assoc($genre_result)){
$genre_name = $genre_row['name'];
} 
		$artist_query = "SELECT * FROM tbl_artist where artist_id = $artist_id LIMIT 1";
$artist_result = mysql_query($artist_query);
while($artist_row = mysql_fetch_assoc($artist_result)){
$artist_name = $artist_row['name'];
}
$results.='<tr>';
$results.='<td>' . $song_title . '</td>';
$results.='<td>' . $artist_name . '</td>';
$results.='<td>' . $genre_name . '</td>';
$results.='<td><a href="'.$song_link.'" target="_blank">Link</a></td>';
$results.='<td><button type="button" onclick="">Use This Song</button></td>';
$results.='</tr>';
	}
	//$results.='<tr><td colspan="5"><button type="button" onclick="">Submit a new Song</button></td><tr>';
}else{
	//no songs found	
		
	}

}
?>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; 


?>
<div id="main" class="container-fluid">
<div class="row">
  <div id="left-column" class="col-sm-4"></div>
  <div id="center1-column" class="col-sm-4">
    <div class="well bs-component">
      <h1 align="center">Add Song: Search for an Existing Song</h1>
      <div class="well-1 bs-component">
        <form class="form-horizontal" action="add_song_search.php" method="post">
          <div class="form-group">
            <label for="title" class="col-lg-4 control-label">Title</label>
            <div class="col-lg-8">
              <input align="center" type="text" class="form-control" id="title" name="title" value='<?php echo "$title" ?>'>
            </div>
          </div>
          <div align="center">
            <input class="btn btn-primary" type="submit" value="Submit"/>
          </div>
        </form>
        <table class="table">
          <thead>
            <tr>
              <td><b>Title</b></td>
              <td><b>Artist</b></td>
              <td><b>Genre</b></td>
              <td><b>Youtube Link</b></td>
              <td><b>Action</b></td>
            </tr>
          </thead>
          <tbody>
          <?php echo $results; ?>
          </tbody>
        </table>
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