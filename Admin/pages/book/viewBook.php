<?php
$title = "Books";

include_once '../../../db.php';

// Check if a book ID is provided for deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $bookId = $_POST['id'];

    // Prepare and execute the SQL query to delete the book
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $bookId);
    $stmt->execute();

    // Check if deletion was successful
    if ($stmt->rowCount() > 0) {
        // Redirect to the same page after deletion
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Failed to delete book.";
    }
}

// Fetch all books with category names from the database
$sql = "SELECT books.*, category.name as category_name FROM books 
        INNER JOIN category ON books.category_id = category.id";
$stmt = $conn->query($sql);
$books = $stmt->fetchAll();

ob_start();
?>

<header>
    <h1>All Books</h1>
</header>
<section id="content">
    <h2>Book List</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Author</th>
                <th>Publication</th>
                <th>Published Date</th>
                <th>File</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) : ?>
                <tr>
                    <td><?php echo $book['name']; ?></td>
                    <td><?php echo $book['category_name']; ?></td>
                    <td><?php echo $book['author']; ?></td>
                    <td><?php echo $book['publication']; ?></td>
                    <td><?php echo $book['published_date']; ?></td>
                    <td><?php echo $book['file']; ?></td>
                    <td><?php echo $book['price']; ?></td>
                    <td><?php echo $book['status']; ?></td>
                    <td>
                        <a href="updateBook.php?id=<?php echo $book['id']; ?>">Edit</a>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php
$content = ob_get_clean();

include '../../Layouts/app.php';
?>
