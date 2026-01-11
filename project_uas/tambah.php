<?php
require_once __DIR__ . '/koneksi.php';

$error = "";

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// KHUSUS ADMIN
if ($_SESSION['role'] != 'admin') {
    header("Location: dashboard.php");
    exit;
}

require_once __DIR__ . '/koneksi.php';


if (isset($_POST['simpan'])) {

    // ambil data
    $name  = trim($_POST['name']);
    $price = trim($_POST['price']);

    // validasi sederhana
    if ($name == "" || $price == "") {
        $error = "Nama dan harga wajib diisi!";
    } else {

        // proses upload gambar
        $gambar = $_FILES['gambar']['name'];
        $tmp    = $_FILES['gambar']['tmp_name'];

        if ($gambar != "") {
            $folder = __DIR__ . "/upload/";
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            move_uploaded_file($tmp, $folder . $gambar);
        }

        // INSERT ke database (SESUAI STRUKTUR)
        $sql = "INSERT INTO products (name, price, gambar)
                VALUES ('$name', '$price', '$gambar')";

        if (mysqli_query($conn, $sql)) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "SQL ERROR: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Produk</title>
<style>
body{
  font-family:Arial, sans-serif;
  background:#f3f4f6;
}
.container{
  width:400px;
  margin:60px auto;
  background:#fff;
  padding:25px;
  border-radius:10px;
  box-shadow:0 10px 25px rgba(0,0,0,.1);
}
h2{
  text-align:center;
  margin-bottom:20px;
}
label{
  font-weight:bold;
}
input{
  width:100%;
  padding:10px;
  margin:8px 0 15px;
  border-radius:6px;
  border:1px solid #ccc;
}
button{
  width:100%;
  padding:12px;
  background:#2563eb;
  border:none;
  color:#fff;
  font-size:16px;
  border-radius:6px;
  cursor:pointer;
}
button:hover{
  background:#1d4ed8;
}
.error{
  background:#fee2e2;
  color:#991b1b;
  padding:10px;
  margin-bottom:15px;
  border-radius:6px;
}
.back{
  display:block;
  text-align:center;
  margin-top:15px;
  text-decoration:none;
}
</style>
</head>

<body>

<div class="container">
  <h2>Tambah Produk</h2>

  <?php if ($error != "") { ?>
    <div class="error"><?= $error ?></div>
  <?php } ?>

  <form method="POST" enctype="multipart/form-data">
    <label>Nama Produk</label>
    <input type="text" name="name" required>

    <label>Harga</label>
    <input type="number" name="price" required>

    <label>Gambar Produk</label>
    <input type="file" name="gambar" accept="image/*">

    <button type="submit" name="simpan">Simpan Produk</button>
  </form>

  <a href="dashboard.php" class="back">← Kembali ke Dashboard</a>
</div>

</body>
</html>
