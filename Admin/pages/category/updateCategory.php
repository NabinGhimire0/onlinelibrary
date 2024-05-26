<?php
$title = "Update Category";

include_once '../../../db.php';

// Check if category ID is provided in the URL
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Fetch the existing category details
    try {
        $sql = "SELECT name FROM category WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $category = $stmt->fetch();

        // If category not found, redirect to viewCategory page
        if (!$category) {
            header('Location: /onlinelibrarysystem/Admin/pages/category/viewCategory.php');
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // If no ID provided, redirect to viewCategory page
    header('Location: /onlinelibrarysystem/Admin/pages/category/viewCategory.php');
    exit();
}

// Handle form submission to update category
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];

        try {
            $sql = "UPDATE category SET name = :name WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header('Location: /onlinelibrarysystem/Admin/pages/category/viewCategory.php');
                exit();
            } else {
                echo "No changes made to the category.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Please provide a category name.";
    }
}

// Start output buffering
ob_start();
?>

<header>
    <h1>Update Category</h1>
</header>
<section id="content">
    <h2>Update Category</h2>
    <form action="updateCategory.php?id=<?php echo htmlspecialchars($categoryId); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($categoryId); ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</section>

<?php
$content = ob_get_clean();

include '../../Layouts/app.php';
?>
