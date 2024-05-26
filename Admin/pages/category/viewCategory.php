<?php
$title = "View Category";

include_once '../../../db.php';

// Handle delete request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    try {
        $sql = "DELETE FROM category WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo '<script>alert("Category deleted successfully");</script>';
        } else {
            echo '<script>alert("Category not found or could not be deleted");</script>';
        }
    } catch (PDOException $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
}

// Start output buffering
ob_start();
?>

<header>
    <h1>All Categories</h1>
</header>
<section id="content">
    <h2>All Categories</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch category details from the database
            try {
                $sql = "SELECT id, name FROM category";
                $stmt = $conn->query($sql);

                // Check if any categories were found
                if ($stmt->rowCount() > 0) {
                    // Output data of each row
                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>
                                <a href='updateCategory.php?id=" . $row['id'] . "'>Edit</a> | 
                                <a href='viewCategory.php?action=delete&id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this category?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No categories found</td></tr>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</section>

<?php
$content = ob_get_clean();

include '../../Layouts/app.php';
?>
