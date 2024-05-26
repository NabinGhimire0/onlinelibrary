<?php
$title = "Dashboard";

ob_start();
?>

<header>
    <h1>Dashboard</h1>
</header>
<section id="content">
    <h2>Dashboard</h2>
</section>

<?php
$content = ob_get_clean();

include '../Layouts/app.php';
?>