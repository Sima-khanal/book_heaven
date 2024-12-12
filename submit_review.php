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

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);

  $user_id = $data['user_id'];
  $review_text = $data['review_text'];
  $rating = $data['rating'];

  $stmt = $conn->prepare("INSERT INTO reviews (user_id, review_text, rating, created_at) VALUES (?, ?, ?, NOW())");
  $stmt->bind_param("isi", $user_id, $review_text, $rating);

  if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Review submitted successfully!']);
  } else {
    echo json_encode(['success' => false, 'message' => 'Error submitting review: ' . $stmt->error]);
  }

  $stmt->close();
}

$conn->close();
