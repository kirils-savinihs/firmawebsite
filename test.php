<?php
require 'include/dbh.inc.php';
#mysqli_query($conn,'insert into users values (null,\'soka\',\''.password_hash("b",PASSWORD_DEFAULT).'\')');
echo mysqli_error($conn);
$row = mysqli_query($conn,'select * from messages');
echo mysqli_error($conn);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);
$rowa = mysqli_fetch_assoc($row);
echo print_r($rowa);



