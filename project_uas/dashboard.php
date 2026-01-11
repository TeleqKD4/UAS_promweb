<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'];
require_once __DIR__ . '/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Produk</title>
<style>

body{
  margin:0;
  font-family:'Poppins', Arial, sans-serif;
  min-height:100vh;
  background:linear-gradient(
    135deg,
    #dbeafe,
    #bfdbfe,
    #e0f2fe
  );
}

/* ===== NAVBAR ===== */
.navbar{
  background:rgba(255,255,255,.6);
  backdrop-filter:blur(10px);
  color:#1e3a8a;
  padding:15px 25px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  box-shadow:0 8px 20px rgba(0,0,0,.08);
}
.navbar a{
  color:#1e3a8a;
  text-decoration:none;
  font-weight:600;
}


/* ===== CONTENT ===== */
.container{
  padding:30px;
}
table{
  background:rgba(255,255,255,.9);
  backdrop-filter:blur(6px);
}


/* SEARCH */
.search-box{
  margin-bottom:20px;
}
.search-box input{
  width:300px;
  padding:10px 14px;
  border-radius:8px;
  border:1px solid #ccc;
}

/* TABLE */
table{
  width:100%;
  border-collapse:collapse;
  background:#fff;
  border-radius:10px;
  overflow:hidden;
  box-shadow:0 5px 15px rgba(0,0,0,.08);
}
thead{
  background:#2563eb;
  color:#fff;
}
th,td{
  padding:14px;
  text-align:center;
}
tbody tr:nth-child(even){
  background:#f9fafb;
}
img{
  border-radius:6px;
}

/* ACTION */
.btn-delete{
  color:#dc2626;
  text-decoration:none;
  font-weight:bold;
}

/* FLOAT BUTTON */
.add-btn{
  position:fixed;
  bottom:25px;
  right:25px;
  width:60px;
  height:60px;
  background:#2563eb;
  color:#fff;
  border-radius:50%;
  font-size:36px;
  text-align:center;
  line-height:60px;
  text-decoration:none;
  box-shadow:0 8px 20px rgba(0,0,0,.3);
}
.add-btn:hover{
  background:#1d4ed8;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
  <div>
    Halo, <b><?= htmlspecialchars($username) ?></b>
    <?php if($_SESSION['role']=='admin'){ ?>
      <span class="badge-admin"> (Admin)</span>
    <?php } ?>
  </div>
  <a href="logout.php">Logout</a>
</div>


<!-- CONTENT -->
<div class="container">

  <!-- SEARCH -->
  <div class="search-box">
    <input type="text" id="searchInput" placeholder="Cari produk...">
  </div>

  <!-- TABLE -->
  <table id="productTable">
    <thead>
      <tr>
        <th>Gambar</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td>
          <img src="upload/<?= $row['gambar']; ?>" width="80">
        </td>
        <td><?= $row['name']; ?></td>
        <td>Rp <?= number_format($row['price']); ?></td>
        <td>
          <a class="btn-delete" href="hapus.php?id=<?= $row['id']; ?>"
             onclick="return confirm('Hapus produk ini?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>

</div>

<!-- FLOAT ADD BUTTON -->
<a href="tambah.php" class="add-btn">+</a>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
  let filter = this.value.toLowerCase();
  let rows = document.querySelectorAll("#productTable tbody tr");

  rows.forEach(row => {
    let name = row.cells[1].innerText.toLowerCase();
    row.style.display = name.includes(filter) ? "" : "none";
  });
});
</script>

</body>
</html>
