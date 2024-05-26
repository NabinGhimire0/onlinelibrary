<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        /* Basic CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
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
        form input[type="password"] {
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
    </style>
</head>

<body>
    <nav>
        <div class="container">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#books">Books</a></li>
                <li><a href="#login">Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?php echo $content; ?>
    </div>
    <footer>
        <div class="container">
            &copy; 2024 Your Website. All Rights Reserved.
        </div>
    </footer>
</body>

</html>