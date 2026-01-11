<?php
/**
 * Nama File: ubah.php (Module Artikel)
 * Deskripsi: Mengambil data lama dan melakukan update ke database.
 */

$db = new Database();
$id = $_GET['id'] ?? null;

// 1. Logika Update Data (Jika form disubmit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : "";
    
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => $hobi,
        'alamat' => $_POST['alamat'],
    ];

    // Password hanya diupdate jika diisi
    if (!empty($_POST['pass'])) {
        $data['pass'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    }

    $update = $db->update('users', $data, "id='{$id}'");
    if ($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='/lab11_php_oop/artikel/index';</script>";
    } else {
        echo "<div class='alert error'>Gagal memperbarui data.</div>";
    }
}

// 2. Logika Mengambil Data Lama
if ($id) {
    $dataOld = $db->get('users', "id='{$id}'");
    if (!$dataOld) {
        echo "<div class='alert error'>Data tidak ditemukan!</div>";
        return;
    }
    // Pecah string hobi menjadi array untuk pengecekan checkbox
    $oldHobi = explode(", ", $dataOld['hobi']);
} else {
    echo "<div class='alert error'>ID tidak ditentukan!</div>";
    return;
}

echo "<h3>Edit Profil User: " . htmlspecialchars($dataOld['nama']) . "</h3>";
?>

<form action="" method="POST" class="form-container">
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="<?= $dataOld['nama']; ?>" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?= $dataOld['email']; ?>" required>
    </div>

    <div class="form-group">
        <label>Password Baru <small>(Kosongkan jika tidak ingin ganti)</small></label>
        <input type="password" name="pass">
    </div>

    <div class="form-group">
        <label>Jenis Kelamin</label>
        <div class="radio-group">
            <input type="radio" name="jenis_kelamin" value="L" <?= ($dataOld['jenis_kelamin'] == 'L') ? 'checked' : ''; ?>> Laki-laki
            <input type="radio" name="jenis_kelamin" value="P" <?= ($dataOld['jenis_kelamin'] == 'P') ? 'checked' : ''; ?>> Perempuan
        </div>
    </div>

    <div class="form-group">
        <label>Agama</label>
        <select name="agama">
            <?php 
            $agamas = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha'];
            foreach($agamas as $ag) {
                $selected = ($dataOld['agama'] == $ag) ? 'selected' : '';
                echo "<option value='$ag' $selected>$ag</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label>Hobi</label>
        <div class="checkbox-group">
            <?php 
            $hobis = ['Membaca', 'Coding', 'Traveling'];
            foreach($hobis as $h) {
                $checked = in_array($h, $oldHobi) ? 'checked' : '';
                echo "<label><input type='checkbox' name='hobi[]' value='$h' $checked> $h</label> ";
            }
            ?>
        </div>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" rows="4"><?= $dataOld['alamat']; ?></textarea>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-save">Simpan Perubahan</button>
        <a href="/lab11_php_oop/artikel/index" class="btn-cancel">Batal</a>
    </div>
</form>

<style>
    .form-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    .form-group label {
        font-weight: bold;
        color: #2c3e50;
    }
    .radio-group, .checkbox-group {
        display: flex;
        gap: 15px;
    }
    .form-actions {
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }
    .btn-save {
        background: #3498db;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
    .btn-save:hover { background: #2980b9; }
    .btn-cancel {
        background: #95a5a6;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
    }
    .alert { padding: 10px; border-radius: 5px; margin-bottom: 10px; }
    .error { background: #f8d7da; color: #721c24; }
</style>