<?php
/**
 * File: module/artikel/hapus.php
 */
$db = new Database();
$id = $_GET['id'];

if ($id) {
    $delete = $db->delete('users', "id='{$id}'");
    if ($delete) {
        // Menggunakan JavaScript untuk redirect agar tidak terkena error "headers already sent"
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = '/lab11_php_oop/artikel/index';
              </script>";
    } else {
        echo "Gagal menghapus data.";
    }
}
?>