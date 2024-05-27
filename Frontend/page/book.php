<?php
include_once '../../db.php';
// Fetch all books with category names from the database
$sql = "SELECT books.*, category.name as category_name FROM books 
        INNER JOIN category ON books.category_id = category.id";
$stmt = $conn->query($sql);
$books = $stmt->fetchAll();
ob_start();
?>

<div class="container">
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search books...">
        <button type="button" id="searchButton">Search</button>
    </div>
    <!-- Cards Section -->
    <div class="row-heading">All Books</div>
    <div class="card-container">
        <?php foreach ($books as $book) : ?>
            <div class="card">
                <img src="/onlinelibrarysystem/Assets/images/book.png" alt="Book Image 1">
                <h3><?php echo $book['name'] ?></h3>
                <p>Author: <?php echo $book['author']; ?></p>
                <p>Price: <?php echo $book['price']; ?> </p>
                <p>Status: <?php echo $book['status']; ?></p>
                <div class="buttons">
                    <button class="buy">Buy Now</button>
                    <button class="read">Read Now</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        // JavaScript
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const searchButton = document.getElementById("searchButton");
            const cards = document.querySelectorAll(".card");

            searchButton.addEventListener("click", filterBooks);
            searchInput.addEventListener("input", filterBooks);

            function filterBooks() {
                const searchText = searchInput.value.toLowerCase();

                cards.forEach(card => {
                    const title = card.querySelector("h3").textContent.toLowerCase();
                    const author = card.querySelector("p").textContent.toLowerCase();

                    if (title.includes(searchText) || author.includes(searchText)) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            }
        });
    </script>
</div>

<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>