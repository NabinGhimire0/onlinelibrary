<?php
session_start();
ob_start();
include_once '../../db.php';

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: /onlinelibrarysystem/Frontend/page/homee.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert user details into the database
    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
        header('Location: /onlinelibrarysystem/Frontend/page/login.php');
        exit();
    } else {
        // Registration failed, display error message
        $error = "Registration failed. Please try again.";
    }
}
ob_start();
?>

<div class="container">
    <form action="#" method="post">
        <h2>Register</h2>
        <?php if (isset($error)) : ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
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