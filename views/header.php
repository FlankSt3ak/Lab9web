<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <title><?= $page_title ?? 'Data Barang'; ?></title>
</head>

<body>
    <div class="container">
        <header>
            <h1>Sistem Informasi Barang</h1>
        </header>
        <nav>
            <a href="index.php">Home</a>
            <a href="index.php?page=user/list">Daftar Barang</a>
            <a href="index.php?page=user/add">Tambah Barang</a>
        </nav>
        <div class="main">