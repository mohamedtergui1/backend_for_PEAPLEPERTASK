<?php
$host = "localhost";
$dbname = "peaplepertask";
$user = "root";
$password = "";
$cnx = mysqli_connect($host, $user, $password, $dbname);
if (!$cnx) {
    die('Could not connect: ' . mysqli_connect_error());
}
?>
