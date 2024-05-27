<?php
$title = "Dashboard";

ob_start();
?>
<div class="container">
    <!-- Contact Section -->
    <div class="row-heading">Contact Us</div>
    <div class="contact-container">
        <div class="image">
            <img src="/path/to/contact-image.jpg" alt="Contact Image">
        </div>
        <form action="#" method="post">
            <h2>Contact Form</h2>
            <label for="contact-name">Name:</label>
            <input type="text" id="contact-name" name="name" required>
            <label for="contact-email">Email:</label>
            <input type="email" id="contact-email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <input type="submit" value="Send">
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>