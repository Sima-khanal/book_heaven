<?php
// Database connection
$host = 'localhost';
$db = 'book_heaven';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password
  $role = $_POST['role']; // 'publisher' or 'reader'

  // Insert user data
  $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ssss', $name, $email, $password, $role);

  if ($stmt->execute()) {
    $user_id = $stmt->insert_id;

    // Create subscription record
    $sql = "INSERT INTO subscriptions (user_id) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();

    echo "User registered successfully!";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 400px;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }

    input,
    select,
    button {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    .form-group .error {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h2>User Registration</h2>
    <form action="register.php" method="POST">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select id="role" name="role" required>
          <option value="" disabled selected>Select your role</option>
          <option value="reader">Reader</option>
          <option value="publisher">Publisher</option>
        </select>
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</body>

</html>