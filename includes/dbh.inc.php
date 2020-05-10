<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'example_cus';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
  die('Database Connection Failed' . mysqli_connect_errno());
}
