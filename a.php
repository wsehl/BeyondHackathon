<?php
    require_once "config.php";
    $event=$_POST['events'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $description=$_POST['description'];
    $type=$_POST['type'];
    echo "$event ,$city,$address,$description,$type";
    $sql = "INSERT INTO `events` (`id`,`Event`, `Type`, `City`, `Address`, `Description`) VALUES (1,'$event','$type','$city','$address','$description')";
    if (mysqli_query($link, $sql)) {
        echo "New record created successfully";
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
  }
