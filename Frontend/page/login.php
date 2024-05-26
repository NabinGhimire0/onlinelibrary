<?php
$title = "Dashboard";

ob_start();
?>

<div class="container">
    <!-- Registration Form -->
    <form action="#" method="post">
        <h2>Login</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</div>
<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>