<?php
$title = "Update Book";

include_once '../../../db.php';

// Check if a book ID is provided
if (!empty($_GET['id'])) {
    $bookId = $_GET['id'];

    // Fetch book details from the database
    $sql = "SELECT * FROM books WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $bookId);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the book exists
    if (!$book) {
        echo "Book not found.";
        exit();
    }
} else {
    echo "Book ID is required.";
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract form data
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $publication = $_POST['publication'];
    $published_date = $_POST['published_date'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    // Handle file upload
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];

    // Move uploaded file to desired location
    $upload_dir = '../../../uploads/';
    $target_file = $upload_dir . basename($file_name);

    // Check if file is uploaded successfully
    if (move_uploaded_file($file_tmp, $target_file)) {
        // File uploaded successfully, proceed with database update
        try {
            // Prepare SQL statement
            $sql = "UPDATE books SET name = :name, category_id = :category_id, author = :author, 
                    publication = :publication, published_date = :published_date, file = :file_name, 
                    price = :price, status = :status WHERE id = :id";
            $stmt = $conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':category_id', $category_id);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':publication', $publication);
            $stmt->bindParam(':published_date', $published_date);
            $stmt->bindParam(':file_name', $file_name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $bookId);

            // Execute the statement
            $stmt->execute();

            // Redirect to a success page or display a success message
            header('Location: /onlinelibrarysystem/Admin/pages/book/viewBook.php');
            exit();
        } catch (PDOException $e) {
            // Error occurred during database update
            echo "Error: " . $e->getMessage();
        }
    } else {
        // File upload failed
        echo "Failed to upload file.";
    }
}

ob_start();
?>

<header>
    <h1>Edit Book</h1>
</header>
<section id="content">
    <h2>Edit Book</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo $book['name']; ?>">
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <?php
                // Fetch category options from the database
                $sql = "SELECT * FROM category";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($categories as $category) {
                    // Check if the selected category is the same as the current category
                    $selected = ($category['id'] == $book['category_id']) ? 'selected' : '';
                    echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required value="<?php echo $book['author']; ?>">
        </div>
        <div class="form-group">
            <label for="publication">Publication:</label>
            <input type="text" id="publication" name="publication" required value="<?php echo $book['publication']; ?>">
        </div>
        <div class="form-group">
            <label for="published_date">Published Date:</label>
            <input type="date" id="published_date" name="published_date" required value="<?php echo $book['published_date']; ?>">
        </div>
        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" id="file" name="file" required accept="application/pdf">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required value="<?php echo $book['price']; ?>">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="free" <?php echo ($book['status'] == 'free') ? 'selected' : ''; ?>>Free</option>
                <option value="premium" <?php echo ($book['status'] == 'premium') ? 'selected' : ''; ?>>Premium</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</section>

<?php
$content = ob_get_clean();

include '../../Layouts/app.php';
?>