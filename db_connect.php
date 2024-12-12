<?php
// db_connect.php

$servername = "localhost";
$username = "root"; // or your database username
$password = ""; // or your database password
$dbname = "book_heaven"; // your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
