<?php
session_start();
include_once '../../db.php';

// Check if session has user's name
$login_text = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : "Login";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library</title>
    <style>
        /* Basic CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
        }

        .container {
            width: 92%;
            margin: 0 auto;
            padding: 20px;
            flex: 1;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }

        /* Form Styles */
        form {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        form input[type="submit"] {
            width: 100%;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        /* Banner Styles */
        .banner {
            background-image: url('/onlinelibrarysystem/Assets/images/banner.jpg');
            /* Add your banner image path here */
            background-size: cover;
            background-position: center;
            height: 300px;
            /* Adjust the height as needed */
            margin-bottom: 20px;
            border-radius: 5px;
        }

        /* Search Bar Styles */
        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px 0 0 3px;
        }

        .search-bar button {
            padding: 10px;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-radius: 0 3px 3px 0;
        }

        /* Card Styles */
        .row-heading {
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            width: calc(25% - 20px);
            /* Adjust card width for four cards in a row */
            box-sizing: border-box;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card img {
            width: 100%;
            height: 120px;
            border-radius: 5px;
        }

        .card h3 {
            margin-top: 10px;
        }

        .card p {
            margin: 5px 0;
        }

        .card .buttons {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .card .buttons button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .card .buttons .buy {
            background-color: #28a745;
            color: #fff;
        }

        .card .buttons .read {
            background-color: #007bff;
            color: #fff;
        }

        /* Contact Section */
        .contact-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .contact-container .image {
            flex: 1;
        }

        .contact-container .image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .contact-container form {
            flex: 1;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .contact-container form textarea {
            height: 100px;
            resize: none;
        }
    </style>
</head>

<body>
    <nav>
        <div class="container">
            <ul>
                <li><a href="/onlinelibrarysystem/Frontend/page/homee.php">Home</a></li>
                <li><a href="/onlinelibrarysystem/Frontend/page/about.php">About</a></li>
                <li><a href="/onlinelibrarysystem/Frontend/page/contact.php">Contact</a></li>
                <li><a href="/onlinelibrarysystem/Frontend/page/book.php">Books</a></li>
                <li><a href="/onlinelibrarysystem/Frontend/page/login.php"><?php echo $login_text; ?></a></li>
            </ul>
        </div>
    </nav>
    <?php echo $content; ?>
    <footer>
        <div class="container">
            &copy; 2024 Your Website. All Rights Reserved.
        </div>
    </footer>

    <script>
        function alertNotAvailable() {
            alert("Feature not available right now.");
        }

        function openPDF(pdfPath) {
            window.open(pdfPath, '_blank');
        }
    </script>
</body>

</html>