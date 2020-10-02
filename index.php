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
        $participant=$_POST['participant'];
        $sql= "SELECT `Event` FROM `users` WHERE `username`='$participant'";      
$old = mysqli_fetch_row(mysqli_query($link, $sql));
$events=explode(" ",$old[0]);
for($i=0;$i<count($events);$i++){
    if($_POST['event']==$events[$i]){
    $already=true;
    }
}
if($already==false){
    $event=$_POST['event'].' '.$old[0];
    $sql= "UPDATE `users` SET `Event`='$event' WHERE `username`='$participant'";
    mysqli_query($link, $sql);
}
}
}


require_once("langs/$default_lang");
require_once('components/header.php');
require_once('components/main.php');
require_once('components/footer.php');
