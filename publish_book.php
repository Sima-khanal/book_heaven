<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "book_heaven");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $description = $_POST['description'];
  $publication_date = $_POST['publication_date'];

  // File upload
  $uploadDir = 'uploads/';
  $fileName = basename($_FILES['book_file']['name']);
  $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $uploadFilePath = $uploadDir . uniqid() . "." . $fileType;

  // Allowed file types
  $allowedFileTypes = ['pdf', 'doc', 'docx', 'epub'];

  // Check if directory exists
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Create directory if it doesn't exist
  }

  if (in_array($fileType, $allowedFileTypes) && move_uploaded_file($_FILES['book_file']['tmp_name'], $uploadFilePath)) {
    // Handle cover image upload
    $coverImagePath = null;
    if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
      $coverImageName = basename($_FILES['cover_image']['name']);
      $coverImagePath = $uploadDir . uniqid() . "_" . $coverImageName;
      move_uploaded_file($_FILES['cover_image']['tmp_name'], $coverImagePath);
    }

    // Save book details in the database
    $stmt = $conn->prepare("INSERT INTO books (title, author, description, publication_date, cover_image, file_path, file_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $title, $author, $description, $publication_date, $coverImagePath, $uploadFilePath, $fileType);

    if ($stmt->execute()) {
      echo "Book successfully uploaded and saved in the database!";
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "Error: Invalid file type or upload failed.";
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publish Book</title>
  <link rel="stylesheet" href="publish.css">
</head>

<body>
  <header>
    <div class="logo">Book Haven</div>
    <nav>
      <ul>
        <li><a href="ebooks.php">Ebooks</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="newsletter.php">Newsletter</a></li>
        <li><a href="publish_book.php">Publish Book</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </nav>
  </header>

  <section id="publishBook">
    <h1>Publish a New Book</h1>
    <form method="POST" enctype="multipart/form-data">
      <label for="title">Book Title:</label>
      <input type="text" id="title" name="title" required>

      <label for="author">Author:</label>
      <input type="text" id="author" name="author" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="4"></textarea>

      <label for="publication_date">Publication Date:</label>
      <input type="date" id="publication_date" name="publication_date" required>

      <label for="cover_image">Cover Image:</label>
      <input type="file" id="cover_image" name="cover_image" accept="image/*">

      <label for="book_file">Upload Book File (PDF, Word, ePub):</label>
      <input type="file" id="book_file" name="book_file" accept=".pdf, .doc, .docx, .epub" required>

      <button type="submit">Publish</button>
    </form>
  </section>

  <footer>
    <div class="footer-container">
      <!-- Social Media Links -->
      <div class="social-links">
        <a href="https://twitter.com" target="_blank" class="social-icon twitter">Twitter</a>
        <a href="https://facebook.com" target="_blank" class="social-icon facebook">Facebook</a>
        <a href="https://instagram.com" target="_blank" class="social-icon instagram">Instagram</a>
        <a href="https://linkedin.com" target="_blank" class="social-icon linkedin">LinkedIn</a>
        <a href="https://wa.me" target="_blank" class="social-icon whatsapp">WhatsApp</a>
        <a href="mailto:seemakhanal608@gmail.com" class="social-icon mail">Email</a>
      </div>

      <!-- GitHub, SignIn, SignUp -->
      <div class="auth-links">
        <a href="https://github.com" target="_blank" class="auth-link github">GitHub</a>
        <a href="register.php" class="auth-link signin">Register</a>
      </div>

      <!-- Logo and Copyright -->
      <div class="footer-logo">
        <img src="book heaven logo.jpg" alt="Logo" class="logo">
        <p>Book Heaven</p>
      </div>

      <div class="copyright">
        <p>&copy; 2024 Book Heaven. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>

</html>