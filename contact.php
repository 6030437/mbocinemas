<?php include 'PHP/header.php'; ?>
<main>
    <div class="container">
        <section class="contact-section">
            <h2>Get in Touch</h2>
            <p>If you have any questions or feedback, feel free to reach out to us using the form below or via email at <a href="mailto:info@mbocinemas.com">info@mbocinemas.com</a>.</p>
            <form method="POST" action="send_contact.php">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>

        <!-- Locations Section -->
        <section class="locations-section">
            <h2>Our Locations</h2>
            <div class="locations-cards">
                <div class="card">
                    <h3>MBO Cinemas Downtown</h3>
                    <p>123 Main Street, Downtown</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086509374634!2d144.9630579153169!3d-37.81410797975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d9f0b1b0b1b1!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1633078471234!5m2!1sen!2sau" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="card">
                    <h3>MBO Cinemas Uptown</h3>
                    <p>456 Elm Street, Uptown</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086509374634!2d144.9630579153169!3d-37.81410797975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d9f0b1b0b1b1!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1633078471234!5m2!1sen!2sau" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="card">
                    <h3>MBO Cinemas Suburb</h3>
                    <p>789 Oak Street, Suburb</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.086509374634!2d144.9630579153169!3d-37.81410797975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577d9f0b1b0b1b1!2sFederation%20Square!5e0!3m2!1sen!2sau!4v1633078471234!5m2!1sen!2sau" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>
    </div>
</main>
<?php include 'PHP/footer.php'; ?>
<script src="script.js"></script>