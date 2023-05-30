<?php
// Local Am
$dbhost = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'contta';
$dbcon = new mysqli($dbhost, $dbusername, $dbpassword, $dbname) or die(mysqli_connect_errno()); 

// if ($dbcon->connect_error) {
//   die("Connection failed: " . $dbcon->connect_error);
// }
// echo "Connected successfully";
