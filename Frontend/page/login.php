<?php
session_start();
include_once '../../db.php';
// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    header('Location: /onlinelibrarysystem/Frontend/page/homee.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {
        // Login successful, redirect to dashboard
        $_SESSION['user'] = [
            'name' => $user['name'],
            'email' => $user['email']
        ];
        header('Location: /onlinelibrarysystem/Frontend/page/homee.php');
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<?php
ob_start();
?>

<div class="container">
    <div class="row-heading">Login</div>
    <div class="contact-container">
        <div class="image">
            <img src="/path/to/contact-image.jpg" alt="Contact Image">
        </div>
        <form action="#" method="post">
            <h2>Login Form</h2>
            <?php if (isset($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>