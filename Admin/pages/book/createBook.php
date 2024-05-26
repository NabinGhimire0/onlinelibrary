<?php
$title = "Create Book";

include_once '../../../db.php';

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
    $file_type = $file['type'];

    // Move uploaded file to desired location
    $upload_dir = '../../../uploads/';
    $target_file = $upload_dir . basename($file_name);

    // Check if file is uploaded successfully
    if (move_uploaded_file($file_tmp, $target_file)) {
        // File uploaded successfully, proceed with database insertion
        try {
            // Prepare SQL statement
            $sql = "INSERT INTO books (name, category_id, author, publication, published_date, file, price, status) 
                    VALUES (:name, :category_id, :author, :publication, :published_date, :file_name, :price, :status)";
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

            // Execute the statement
            $stmt->execute();

            // Redirect to a success page or display a success message
            header('Location: /onlinelibrarysystem/Admin/pages/book/viewBook.php');
            exit();
        } catch (PDOException $e) {
            // Error occurred during database insertion
            echo "Error: " . $e->getMessage();
        }
    } else {
        // File upload failed
        echo "Failed to upload file.";
    }
}

// Start output buffering
ob_start();
?>

<header>
    <h1>Create Book</h1>
</header>
<section id="content">
    <h2>Create Book</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" id="">
                <?php
                $sql = "SELECT * FROM category";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $categories = $stmt->fetchAll();
                foreach ($categories as $category) {
                    echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="publication">Publication:</label>
            <input type="text" id="publication" name="publication" required>
        </div>
        <div class="form-group">
            <label for="published_date">Published Date:</label>
            <input type="date" id="published_date" name="published_date" required>
        </div>
        <div class="form-group">
            <label for="file">File:</label>
            <input type="file" id="file" name="file" required accept="application/pdf">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="free">Free</option>
                <option value="premium">Premium</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
</section>

<?php
$content = ob_get_clean();

include '../../Layouts/app.php';
?>