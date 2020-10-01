<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $logged = false;
} else {
    $logged = true;
}

if ($_POST) {
    if (isset($_POST["lang"])) {
        $_SESSION["lang"] = $_POST["lang"];
        $default_lang = $_POST["lang"];
    }
    if (isset($_POST["city"])) {
        $_SESSION["city"] = $_POST["city"];
        $default_lang = $_POST["city"];
    }
}

require_once('config.php');
require_once("langs/$default_lang");
require_once('components/header.php');
require_once('components/main.php');
require_once('components/footer.php');
