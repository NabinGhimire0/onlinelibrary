<?php
$title = "Dashboard";

ob_start();
?>

<div class="container">
    <div class="search-bar">
        <input type="text" placeholder="Search books...">
        <button type="button">Search</button>
    </div>
    <!-- Cards Section -->
    <div class="row-heading">Science</div>
    <div class="card-container">
        <div class="card">
            <img src="/path/to/image1.jpg" alt="Book Image 1">
            <h3>Book Title 1</h3>
            <p>Author: Author Name</p>
            <p>Price: $10</p>
            <p>Status: Available</p>
            <div class="buttons">
                <button class="buy">Buy Now</button>
                <button class="read">Read Now</button>
            </div>
        </div>
        <div class="card">
            <img src="/path/to/image2.jpg" alt="Book Image 2">
            <h3>Book Title 2</h3>
            <p>Author: Author Name</p>
            <p>Price: $15</p>
            <p>Status: Out of Stock</p>
            <div class="buttons">
                <button class="buy">Buy Now</button>
                <button class="read">Read Now</button>
            </div>
        </div>
        <div class="card">
            <img src="/path/to/image3.jpg" alt="Book Image 3">
            <h3>Book Title 3</h3>
            <p>Author: Author Name</p>
            <p>Price: $20</p>
            <p>Status: Available</p>
            <div class="buttons">
                <button class="buy">Buy Now</button>
                <button class="read">Read Now</button>
            </div>
        </div>
        <div class="card">
            <img src="/path/to/image4.jpg" alt="Book Image 4">
            <h3>Book Title 4</h3>
            <p>Author: Author Name</p>
            <p>Price: $12</p>
            <p>Status: Available</p>
            <div class="buttons">
                <button class="buy">Buy Now</button>
                <button class="read">Read Now</button>
            </div>
        </div>
        <!-- Add more cards as needed -->
    </div>
</div>

<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>