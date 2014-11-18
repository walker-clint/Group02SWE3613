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
        <?php
        //include_once dirname(__FILE__) . '/../php/setQueries.php';
        //include_once dirname(__FILE__) . '/../php/queries.php';
        //include_once dirname(__FILE__) . '/../php/objects.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/setQueries.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';

        //setup values for song to add
        $login = "temp18";
        $pass = "pass1";
        $email = "fake18@fake.com";
        $firstName = "Bob1";
        $lastName = "Smith1";
        $admin = 1;
        $secretQ = 'q';
        $secretA = 'a';

        //add song to DB
        //$newUser = addUser($login, $pass, $email, $firstName, $lastName, $admin, $secretQ, $secretA);
        updateUser(20, $login, $pass, $email, $firstName, $lastName, $admin);//, 'secretQ', 'secretA');

        echo 'Song ID: ' . $newUser . '<br>';

        //delete the new records
        deleteSong($newUser);

        //print out the results (should be empty)
        echo '<h3>Should be empty now</h3>';

        echo getSong($newUser) . '<br>';
        ?>
    </body>
</html>
