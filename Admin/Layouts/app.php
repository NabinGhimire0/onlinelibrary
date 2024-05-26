<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/onlinelibrarysystem/Assets/Css/admin.css">
</head>

<body>
    <div class="container">
        <?php include __DIR__ . '/components/sidebar.php'; ?>
        <main class="main-content">
            <?php echo $content; ?>
        </main>
    </div>
    <script src="script.js"></script>
</body>

</html>