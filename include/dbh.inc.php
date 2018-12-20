<?php

$servername = "localhost";
$dbusername = "root";
$dbpass = "00000000";
$dbname = "mdwebsite";

$conn = mysqli_connect($servername,$dbusername,$dbpass, $dbname);
if(!$conn)
{
    die("Connection failed:".mysqli_connect_error());
}