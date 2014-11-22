<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/lockService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
if ($_POST) {
    $q = $_POST['search'];
    if (empty($q)) {
        // $songList = getApprovedSongs_notOnMixtape($_SESSION['user_id']);
    } else {
        $songList = getSongsBySearch_notOnMixtape($q, $_SESSION['user_id']);
        foreach ($songList as $song) {
            ?>
            <tr>
                <td><a href='/php/toggleMixtape.php?songId=<?php echo $song->id; ?>'>
                        <?php if (count($songList) < 30) {
                            ?><div class = "btn btn-warning">Add</div><?php } ?>
                    </a>
                    <?php echo $song->js_infoBox(true); ?>

                </td>
            </tr>
            <?php
            //echo $song->js_infoBox(true);
            //echo '<tr><td>' . $song->js_infoBox(true) . '</td></tr>';
        }
    }
}
    