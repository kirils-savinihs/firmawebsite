<?php
require 'dbh.inc.php';

mysqli_query($conn, '
Create table users (
idusers	int(11)	auto_increment primary key not null,
username	tinytext not null,
password	longtext not null,
adminb		boolean
);');

echo mysqli_error($conn).'</br>';

mysqli_query($conn, '
create table messages(
mid	int(11) auto_increment primary key not null,
uid	int(11)	not null,
message	longtext,
mtime	TIMESTAMP default CURRENT_TIMESTAMP
);');

echo mysqli_error($conn).'</br>';
