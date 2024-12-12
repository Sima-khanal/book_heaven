<?php
// Database connection
$host = 'localhost';
$dbname = 'book_heaven';
$username = 'root';
$password = '';

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sanitize inputs
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $preferences = isset($_POST['email_preferences']) ? implode(',', $_POST['email_preferences']) : '';

  // Validate email
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Prepare SQL statement
    $query = "INSERT INTO subscribers (email, preferences, subscription_date) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
      die("Prepare failed: " . $conn->error . " | Query: " . $query);
    }
    $stmt->bind_param("ss", $email, $preferences);

    // Execute and check insertion
    if ($stmt->execute()) {
      echo "Thank you for subscribing!";
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Invalid email address.";
  }
}

$conn->close();
