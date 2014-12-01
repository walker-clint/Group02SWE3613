<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/php/connection.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/queries.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/objects.php';
require $_SERVER['DOCUMENT_ROOT'] . '/php/loginService.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/headLinks.php'; ?>

    </head>
    <body>
        <!--Start Header-->
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/header.php'; ?>
        <!--End Header--> 

        <!--Start Middle-->
        <div id="main" class="container-fluid">
            <div class="row">
                <div id="left-column" class="col-sm-3"></div>
                <div id="center1-column" class="col-sm-6">
                    <!--Start Content-->
                    <?php require $_SERVER['DOCUMENT_ROOT'] . '/_page/loginForm.php'; ?>
                </div>
            </div>
    </body>
</html>