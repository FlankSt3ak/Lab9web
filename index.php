<?php
include("config/database.php");

$page = isset($_GET['page']) ? $_GET['page'] : 'user/list';

$allowed_pages = [
    'user/list',
    'user/add',
    'user/edit'
];

if (!in_array($page, $allowed_pages)) {
    $page = 'user/list';
}

$module_file = "modules/" . $page . ".php";

include("views/header.php");

if (file_exists($module_file)) {
    include($module_file);
} else {
    echo "<h2>Halaman tidak ditemukan</h2>";
}

include("views/footer.php");
?>