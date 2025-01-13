<?php include 'PHP/header.php'; ?>
<main>
    <div class="container">
        <h1>Contact Us</h1>
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
    </div>
</main>
<?php include 'PHP/footer.php'; ?>
<script src="script.js"></script>