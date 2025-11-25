<?php
include_once '../../config/database.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($id)) {
    $sql_select = "SELECT gambar FROM data_barang WHERE id_barang = '{$id}'";
    $result_select = mysqli_query($conn, $sql_select);
    
    if ($result_select && mysqli_num_rows($result_select) > 0) {
        $data = mysqli_fetch_array($result_select);
        
        if (!empty($data['gambar']) && file_exists('../../' . $data['gambar'])) {
            unlink('../../' . $data['gambar']);
        }
        
        $sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            header('Location: ../../index.php?page=user/list');
            exit();
        } else {
            echo "<script>alert('Gagal menghapus data!'); window.location='../../index.php?page=user/list';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='../../index.php?page=user/list';</script>";
    }
} else {
    header('Location: ../../index.php?page=user/list');
    exit();
}
?>