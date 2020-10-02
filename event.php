<?php
session_start();
require_once('config.php');
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    $logged = false;
} else {
    $logged = true;
}

require_once("langs/$default_lang");
require_once('components/header.php');
echo "</br></br>Ваши события: </br>";
$username54=$_SESSION['username'];
$sql = "SELECT `Event` FROM users WHERE `username`='$username54'";
$data = mysqli_query($link, $sql);
$row = mysqli_fetch_array($data);
$events= explode(" ",$row["Event"]);
                for ($i=0;$i<count($events);$i++) {
                    echo $events[$i].'</br>';
                }
require_once('components/footer.php');