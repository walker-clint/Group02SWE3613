<?php

session_start();
if (session_destroy()) {
    header("Location: " . $_SERVER['DOCUMENT_ROOT'] . "/index.php");
}
?>