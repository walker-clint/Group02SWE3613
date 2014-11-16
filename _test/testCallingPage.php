<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo basename($_SERVER['PHP_SELF']);
        echo '<br>This: '.strpos(basename($_SERVER['PHP_SELF']),'te');
       ?>
    </body>
</html>
