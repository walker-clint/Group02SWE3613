<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
        echo basename($_SERVER['PHP_SELF']);
        echo '<br>This: ' . strpos(basename($_SERVER['PHP_SELF']), 'te');
        $song = getSong(21)->getInfoBox();
        echo '<br>' . $song;
        ?>
    </body>
</html>
