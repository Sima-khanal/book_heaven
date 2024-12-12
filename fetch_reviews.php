<?php
// Database connection
$host = 'localhost';
$dbname = 'book_heaven';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch all reviews
$sql = "SELECT user_id, review_text, rating, created_at FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);

$reviews = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
  }
}

echo json_encode($reviews);

$conn->close();
