<?php
$title = "Create Category";

include_once '../../../db.php';
//check request method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $sql = "INSERT INTO category (name) VALUES (:name)";

        //bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);

        try {
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo '<script>alert("Category created successfully")</script>';
                header('Location: /onlinelibrarysystem/Admin/pages/category/viewCategory.php');
                exit();
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    } else {
        echo 'Please provide a category name.';
    }
}

ob_start();
?>

<header>
    <h1>Create Category</h1>
</header>
<section id="content">
    <h2>Create Category</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</section>

<?php
$content = ob_get_clean();

include '../../Layouts/app.php';
?>