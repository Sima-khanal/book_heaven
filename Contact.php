<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Book Haven</title>
  <link rel="stylesheet" href="Contact.css">

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

  <main>
    <section class="contact-section">
      <h1>Contact Us</h1>
      <p>If you have any questions or feedback, feel free to reach out to us using the form below or visit us at our location.</p>

      <!-- Contact Form -->
      <div class="contact-form">
        <form action="https://formsubmit.co/seemakhanal608@gmail.com" method="post">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" placeholder="Your Name" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Your Email" required>

          <label for="subect">Subject: </label>
          <input type="text" id="subject" name="subject" placeholder="Subject" required>

          <label for="Phone">Phone:</label>
          <input type="tel" id="phone" name="phone" placeholder="Your Phone Number">

          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>

          <input type="hidden" name="_captcha" value="false">

          <button type="submit">Send Message</button>
        </form>
      </div>

      <!-- Google Map -->
      <div class="map">
        <h2>Find Us Here:</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.745146236747!2d85.31998251442836!3d27.664221982810327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb197555555555%3A0xabcdefabcdefabcd!2sKapan%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1600000000000!5m2!1sen!2snp"></iframe>
      </div>
    </section>

    <div class="thank-you">
      <p>Thank you for visiting us! Your support means the world to us.</p>
    </div>
  </main>

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