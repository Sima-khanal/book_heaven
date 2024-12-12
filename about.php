<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="Stylesheet" href="about.css">
</head>

<body>
  <header>
    <a href="" class="logo">Book Haven</a>
    <nav>
      <ul>
        <li><a href="ebooks.php">Ebooks</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="newsletter.php">Newsletter</a></li>
        <li><a href="publish.php">Publish Book</a></li>
        <li><a href="Contact.php">Contact Us</a></li>
      </ul>
    </nav>
  </header>
  <section id="about">
    <!-- Why Use Section -->
    <div class="section">
      <h2>Why Use Our Web App?</h2>
      <p>
        Our platform revolutionizes the way you access and publish eBooks. Whether you are an avid reader, a budding author, or a student in search of study materials, we offer a one-stop solution for your needs. Free publishing, seamless downloads, and an ever-growing library of diverse genres make our web app your perfect companion.
      </p>
    </div>

    <!-- How to Use Section -->
    <div class="section">
      <h2>How to Use</h2>
      <ol>
        <li><strong>For Readers:</strong> Browse our extensive library, use the search bar for specific titles, and download or read directly online.</li>
        <li><strong>For Publishers:</strong> Register an account, upload your book details, and publish your eBook for free.</li>
        <li><strong>For Premium Books:</strong> Purchase directly using a secure payment gateway.</li>
      </ol>
    </div>

    <!-- Who Can Use Section -->
    <div class="section">
      <h2>Who Can Use This Platform?</h2>
      <ul>
        <li><strong>Readers:</strong> Book lovers of all ages seeking free or premium eBooks.</li>
        <li><strong>Authors & Publishers:</strong> Individuals or companies looking to showcase their literary work.</li>
        <li><strong>Students:</strong> Easy access to academic resources and materials.</li>
        <li><strong>Educators:</strong> Share study materials and promote reading among students.</li>
      </ul>
    </div>

    <!-- Features Section -->
    <div class="section">
      <h2>Features</h2>
      <ul>
        <li>Extensive library of free and premium eBooks across multiple genres.</li>
        <li>User-friendly search functionality for quick and easy book access.</li>
        <li>Free publishing platform for authors and publishers.</li>
        <li>Downloadable eBooks in PDF format.</li>
        <li>Responsive design for seamless use on any device.</li>
        <li>Secure payment system for premium books.</li>
        <li>Personalized user dashboard for managing downloaded books.</li>
      </ul>
    </div>

    <!-- Our Vision Section -->
    <div class="section">
      <h2>Our Vision</h2>
      <p>
        Our vision is to democratize access to knowledge and storytelling by making eBooks accessible to everyone, everywhere. We aim to empower authors to share their work with the world and enable readers to discover their next favorite book with ease.
      </p>
    </div>

    <!-- Team Section -->
    <div class="section">
      <h2>Meet Our Team</h2>
      <p>
        We are a group of passionate individuals dedicated to creating a platform that bridges the gap between authors and readers. Our team includes developers, designers, and literary enthusiasts working together to provide you with the best possible experience.
      </p>
    </div>

  </section>

  <section id="reviews">
    <h2>What Our Readers Say</h2>

    <!-- Display Reviews -->
    <div class="review-container" id="reviewContainer">
      <!-- Reviews will be loaded here dynamically -->
    </div>

    <!-- Submit Review -->
    <form id="reviewForm">
      <h3>Leave a Review</h3>
      <label for="reviewText">Your Review:</label>
      <textarea id="reviewText" name="review_text" rows="4" required placeholder="Write your review here"></textarea>

      <label for="rating">Your Rating:</label>
      <div id="rating" class="star-rating">
        <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
        <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
        <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
        <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
        <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
      </div>

      <button type="submit">Submit Review</button>
    </form>
  </section>

  <script>
    document.getElementById('reviewForm').addEventListener('submit', function(e) {
      e.preventDefault();

      const userId = 1; // Replace with logged-in user ID from your session
      const reviewText = document.getElementById('reviewText').value;
      const rating = document.querySelector('input[name="rating"]:checked').value;

      // Submit review via AJAX
      fetch('submit_review.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            user_id: userId,
            review_text: reviewText,
            rating
          }),
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert(data.message);
            loadReviews(); // Reload reviews after submission
          } else {
            alert('Error: ' + data.message);
          }
        });
    });

    // Load Reviews
    function loadReviews() {
      fetch('fetch_reviews.php') // Create this PHP file to fetch reviews
        .then(response => response.json())
        .then(data => {
          const reviewContainer = document.getElementById('reviewContainer');
          reviewContainer.innerHTML = '';
          data.forEach(review => {
            const reviewElement = document.createElement('div');
            reviewElement.classList.add('review');
            reviewElement.innerHTML = `
                    <h3>User ${review.user_id}</h3>
                    <p>${review.review_text}</p>
                    <p>Rating: ${'★'.repeat(review.rating)}</p>
                `;
            reviewContainer.appendChild(reviewElement);
          });
        });
    }

    // Load reviews on page load
    loadReviews();
  </script>

  <footer>
    <div class="footer-container">
      <!-- Social Links -->
      <div class="social-links">
        <a href="https://twitter.com" target="_blank" class="social-icon twitter">Twitter</a>
        <a href="https://facebook.com" target="_blank" class="social-icon facebook">Facebook</a>
        <a href="https://instagram.com" target="_blank" class="social-icon instagram">Instagram</a>
        <a href="https://linkedin.com" target="_blank" class="social-icon linkedin">LinkedIn</a>
        <a href="https://wa.me" target="_blank" class="social-icon whatsapp">WhatsApp</a>
        <a href="mailto:seemakhanal608@gmail.com" class="social-icon mail">Email</a>
      </div>
      <!-- Newsletter -->
      <div class="newsletter">
        <h3>Subscribe to Our Newsletter</h3>
        <input type="email" placeholder="Enter your email" id="email">
        <button type="submit">Subscribe</button>
      </div>
      <!-- Logo -->
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