<?php require "db.php";
$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM produk WHERE id=$id"));
?>

<form method="post">
<input name="nama" value="<?= $d['nama'] ?>">
<input name="harga" value="<?= $d['harga'] ?>">
<button>Update</button>
</form>

<?php
if($_POST){
  mysqli_query($conn,"UPDATE produk SET nama='$_POST[nama]',harga='$_POST[harga]' WHERE id=$id");
  header("Location: dashboard.php");
}
