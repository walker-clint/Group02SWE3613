<?php
//destroy the session and direct to the home page
session_start();
if (session_destroy()) {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/index.php');
}