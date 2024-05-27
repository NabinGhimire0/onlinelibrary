<?php
include_once '../../db.php';
// Fetch all books with category names from the database
$sql = "SELECT id, name FROM category";
$stmt = $conn->query($sql);
$category = $stmt->fetchAll();
ob_start();
?>

<div class="container">
    <!-- Banner -->
    <div class="banner"></div>
    <!-- Cards Section -->
    <?php foreach ($category as $item) : ?>
        <?php
        $cateId = $item['id'];
        // Fetch all books with category names from the database
        $query = "SELECT * FROM books Where category_id = $cateId";
        $stmt = $conn->query($query);
        $books = $stmt->fetchAll();
        ?>
        <div class="row-heading"><?php echo $item['name'] ?></div>
        <div class="card-container">
            <?php foreach ($books as $book) : ?>
                <div class="card">
                    <img src="/onlinelibrarysystem/Assets/images/book.png" alt="Book Image 1">
                    <h3><?php echo $book['name'] ?></h3>
                    <p>Author: <?php echo $book['author']; ?></p>
                    <p>Price: <?php echo $book['price']; ?> </p>
                    <p>Status: <?php echo $book['status']; ?></p>
                    <div class="buttons">
                        <button class="buy" onclick="alertNotAvailable()">Buy Now</button>
                        <button class="read" onclick="openPDF('<?php echo 'http://localhost/onlinelibrarysystem/uploads/' . $book['file']; ?>')">Read Now</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>


<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>