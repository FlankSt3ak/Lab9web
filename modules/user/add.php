<?php
error_reporting(E_ALL);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;
    
    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/../../gambar/' . $filename;
        
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;
        }
    }
    
    $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ';
    $sql .= "VALUES ('{$nama}', '{$kategori}', '{$harga_jual}', '{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header('Location: index.php?page=user/list');
        exit();
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<h2>Tambah Barang</h2>
<form method="post" action="" enctype="multipart/form-data">
    <div class="input">
        <label>Nama Barang</label>
        <input type="text" name="nama" required />
    </div>
    <div class="input">
        <label>Kategori</label>
        <select name="kategori" required>
            <option value="">- Pilih Kategori -</option>
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>
    </div>
    <div class="input">
        <label>Harga Jual</label>
        <input type="number" name="harga_jual" required />
    </div>
    <div class="input">
        <label>Harga Beli</label>
        <input type="number" name="harga_beli" required />
    </div>
    <div class="input">
        <label>Stok</label>
        <input type="number" name="stok" required />
    </div>
    <div class="input">
        <label>File Gambar</label>
        <input type="file" name="file_gambar" />
    </div>
    <div class="submit">
        <input type="submit" name="submit" value="Simpan" class="btn-simpan" />
        <a href="index.php?page=user/list" class="btn-batal">Batal</a>
    </div>
</form>