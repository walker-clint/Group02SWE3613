<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
if ($_POST) {
    $q = htmlspecialchars($_POST['search']);
    //$strSQL_Result = mysql_query("SELECT ");
    $songList = getSongsBySearch($q);
    //while ($row = mysql_fetch_array($strSQL_Result)) {
    foreach($songList as $song) {
        ?>
        <div class="show" align="left">
            <!--<img src="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-prn1/27301_312848892150607_553904419_n.jpg" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>-->
            <?php echo $song->title . '<br>'; ?>
        </div>
        <?php
    }
}