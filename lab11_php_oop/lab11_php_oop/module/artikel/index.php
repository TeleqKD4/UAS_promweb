<?php
$db = new Database();
$sql = "SELECT * FROM users ORDER BY id DESC"; 
$result = $db->query($sql);

echo "<h3>Daftar User</h3>";
echo "<div class='table-container'>"; 
echo "<table class='table-mewah'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Hobi</th>
                <th>Alamat</th>
                <th width='180px'>Aksi</th>
            </tr>
        </thead>
        <tbody>";

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . ($row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>";
        echo "<td>" . $row['agama'] . "</td>";
        echo "<td>" . $row['hobi'] . "</td>";
        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
        // Menggunakan container div 'action-group' untuk merapikan tombol
        echo "<td>
                <div class='action-group'>
                    <a href='/lab11_php_oop/artikel/ubah?id=" . $row['id'] . "' class='btn-aksi btn-ubah'>Ubah</a>
                    <a href='/lab11_php_oop/artikel/hapus?id=" . $row['id'] . "' 
                       class='btn-aksi btn-hapus' 
                       onclick=\"return confirm('Apakah Anda yakin ingin menghapus data " . addslashes($row['nama']) . "?')\">Hapus</a>
                </div>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr>
            <td colspan='8' align='center' style='padding: 40px; color: #7f8c8d;'>
                <div style='font-size: 40px; margin-bottom: 10px;'>📂</div>
                <strong>Belum ada data tersedia.</strong><br>
                Silakan tambah data baru melalui menu <a href='/lab11_php_oop/artikel/tambah' style='color:#3498db;'>Tambah Artikel</a>.
            </td>
          </tr>";
}

echo "</tbody></table></div>";
?>

<style>
    .table-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        overflow: hidden;
        margin-top: 20px;
    }

    .table-mewah {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table-mewah thead {
        background-color: #2c3e50;
        color: #ffffff;
    }

    .table-mewah th, .table-mewah td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    /* Perbaikan: Container untuk tombol agar sejajar horizontal */
    .action-group {
        display: flex;
        gap: 8px; /* Jarak antar tombol */
        justify-content: flex-start;
    }

    .btn-aksi {
        padding: 8px 0; /* Padding atas bawah */
        min-width: 70px; /* Lebar minimal tombol agar seragam */
        text-align: center;
        text-decoration: none;
        font-size: 12px;
        border-radius: 6px;
        font-weight: 600;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn-ubah { background-color: #3498db; color: white; border: 1px solid #3498db; }
    .btn-ubah:hover { background-color: #2980b9; transform: translateY(-2px); }

    .btn-hapus { background-color: #e74c3c; color: white; border: 1px solid #e74c3c; }
    .btn-hapus:hover { background-color: #c0392b; transform: translateY(-2px); }

    .table-mewah tbody tr:hover {
        background-color: #f8f9fa;
    }
</style>