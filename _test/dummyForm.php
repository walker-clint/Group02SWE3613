<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST">
            <?php if($_POST) {
                echo $_POST["hid"];
            }
            ?>
            <input type="hidden" name="hid" value="a">
            <input type="image" src="http://www.w3schools.com/images/html5_badge20.png">
        </form>

        <?php
        // put your code here
        ?>
    </body>
</html>
