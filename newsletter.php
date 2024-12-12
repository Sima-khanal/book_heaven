<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="Stylesheet" href="newsletter.css">
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
        <li><a href="Contact.php">Contact Us</a></li>
      </ul>
    </nav>
  </header>
  <section id="newsletter">
    <h2>Subscribe to the Newsletter</h2>
    <p>Join our community to receive the latest updates from the vanguard of digital literature directly to your inbox.</p>

    <section id="newsletter">
      <div class="newsletter-container">
        <!-- Image and Intro -->
        <div class="intro">
          <img src="https://s3.ap-south-1.amazonaws.com/awsimages.imagesbazaar.com/900x600/16312/120-SM688582.jpg" alt="An old man in Renaissance-era costume reading a sheet of paper">
          <p>
            Subscribe to receive news, updates, and more from Standard Ebooks. Your information will never be shared, and you can unsubscribe at any time.
          </p>
        </div>

        <!-- Subscription Form -->
        <form action="subscribe.php" method="POST" class="subscription-form">
          <label for="email">Your Email Address</label>
          <input type="email" id="email" name="email" required placeholder="Enter your email address">

          <!-- Email Preferences -->
          <fieldset>
            <legend>What kind of email would you like to receive?</legend>
            <label>
              <input type="checkbox" name="email_preferences[]" value="newsletter">
              The occasional Standard Ebooks newsletter
            </label>
            <label>
              <input type="checkbox" name="email_preferences[]" value="monthly_summary">
              A monthly summary of new ebook releases
            </label>
          </fieldset>

          <!-- Subscribe Button -->
          <button type="submit">Subscribe</button>
        </form>
      </div>
    </section>


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