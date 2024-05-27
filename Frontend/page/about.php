<?php
ob_start();
?>

<div class="container">
    <div class="row-heading">About Us</div>
    <div class="about-container">
        <div class="image">
            <img src="/path/to/about-image.jpg" alt="About Image">
        </div>
        <p class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet nisl at odio
            pellentesque
            tincidunt. Sed vel libero at quam posuere lacinia. Vivamus non tellus sed dui pellentesque
            tincidunt. Sed vel libero at quam posuere lacinia. Vivamus non tellus sed dui pellentesque
            tincidunt. Sed vel libero at quam posuere lacinia. Vivamus non tellus sed dui pellentesque </p>

    </div>
</div>

<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>