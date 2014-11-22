<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
if ($_POST) {
    $q = htmlspecialchars($_POST['search']);
    if (count($q) == 0) {
        $songList = getApprovedSongs();
    } else {
        $songList = getSongsBySearch($q);
    }
    foreach ($songList as $song) {
        ?>
        <tr>
            <td><a href='/php/toggleMixtape.php?songId=<?php echo $song->id; ?>'>
                    <div class="btn btn-warning">Add</div>
                </a>
                <?php echo $song->js_infoBox(true); ?>

            </td>
        </tr>
        <?php
        //echo $song->js_infoBox(true);
        //echo '<tr><td>' . $song->js_infoBox(true) . '</td></tr>';
    }
}
