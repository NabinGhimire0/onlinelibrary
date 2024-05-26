<?php
ob_start();
?>

<div class="container">
        <!-- Registration Form -->
        <form action="#" method="post">
            <h2>Register</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Register">
        </form>
    </div>
<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>