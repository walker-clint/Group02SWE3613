<?php
// Data could be pulled from a DB or other source
$items = array();
$query = "SELECT * FROM tbl_song LIMIT 5";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result)){
$items[] = $row;
} 

 
// Cleaning up the term
$term = trim(strip_tags($_GET['term']));
 
// Rudimentary search
$matches = array();
foreach($items as $item){
	if(stripos($item['title'], $term) !== false){
		$song_id = $item['song_id'];
		$item['ylink'] = $item['youtube'];
		// Add the necessary "value" and "label" fields and append to result set
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
$item['genre'] = $genre_row['name'];
} 

		$artist_query = "SELECT * FROM tbl_artist where artist_id = $artist_id LIMIT 1";
$artist_result = mysql_query($artist_query);
while($artist_row = mysql_fetch_assoc($artist_result)){
$item['artist'] = $artist_row['artist_id'];
} 
		
		
		
		
		
		$item['value'] = $item['title'];
		$item['label'] = "{$item['title']}";
		$matches[] = $city;
	}
}
 
// Truncate, encode and return the results
$matches = array_slice($matches, 0, 5);
print json_encode($matches);
