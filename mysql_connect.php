<?php

$user ="root";
$password = "";
$db = "hr_database";


// Create connection
$connection = mysqli_connect(
    "localhost",
    $user,
    $password,
    $db
) or die();

