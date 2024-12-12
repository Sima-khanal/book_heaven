<?php
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_username';
$password = 'your_password';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $publication_date = $_POST['publication_date'];

    // Handle file upload
    $cover_image = null;
    if (!empty($_FILES['cover_image']['name'])) {
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES['cover_image']['name']);
      if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $target_file)) {
        $cover_image = $target_file;
      }
    }

    // Insert into database
    $sql = "INSERT INTO books (title, author, description, publication_date, cover_image) 
                VALUES (:title, :author, :description, :publication_date, :cover_image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      ':title' => $title,
      ':author' => $author,
      ':description' => $description,
      ':publication_date' => $publication_date,
      ':cover_image' => $cover_image
    ]);

    echo json_encode(['success' => true, 'message' => 'Book published successfully!']);
  }
} catch (PDOException $e) {
  echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
