<?php
require "db.php";

$keyword = $_GET['keyword'];

$data = mysqli_query($conn,
  "SELECT * FROM products
   WHERE nama LIKE '%$keyword%'"
);

while($p = mysqli_fetch_assoc($data)){
?>
<tr>
  <td>
    <?php if($p['gambar']){ ?>
      <img src="upload/<?= $p['gambar'] ?>" width="60" style="border-radius:8px;">
    <?php } ?>
  </td>
  <td><?= $p['nama'] ?></td>
  <td>Rp <?= number_format($p['harga']) ?></td>
  <td>
    <a href="edit.php?id=<?= $p['id'] ?>">Edit</a> |
    <a href="hapus.php?id=<?= $p['id'] ?>" onclick="return hapus()">Hapus</a>
  </td>
</tr>
<?php } ?>
