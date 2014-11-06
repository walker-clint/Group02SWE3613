<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test Page</title>
    </head>
    <body>
        <h2>Sample query<br></h2>
        <p>The following demonstrates a simple SQL query via PHP<br>
            I have 2 .php files, 'loginInfo.php' and 'queries.php'</p>
        <p>'loginInfo' contains the login information, username, password, schema, etc.</p>
        <p>'queries' (will) contain the php functions that return the neccessary information gathered from an SQL query</p>
        <p>In this way one all the queries (as functions) can be written into one central location.</p>

        <div style="border: solid black 1px">
            <?php
            include './queries.php';

            echo var_dump(getAllSongs($con));
            ?>
        </div>
        <p>This is a simple var_dump(ARRAY) which causes the php to spit out an array and it's metadata.  
            The function 'getAllSongs($con)' returns a php array.</p>
    </body>
</html>
