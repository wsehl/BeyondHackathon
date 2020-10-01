<?php
session_start();
require_once('config.php');
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
    if(isset($_POST['event'])){
        $event=$_POST['event'];
        $sql= "SELECT `Participants` FROM `events` WHERE `Event`='$event'";      
$old = mysqli_fetch_row(mysqli_query($link, $sql));
$participant=$_POST['participant'].',  '.$old[0];
        $sql= "UPDATE `events` SET `Participants`='$participant' WHERE `Event`='$event'";
        mysqli_query($link, $sql);
    }
}


require_once("langs/$default_lang");
require_once('components/header.php');
require_once('components/main.php');
require_once('components/footer.php');
