<?php
$db = new Database();
$form = new Form("", "Simpan Data");

if ($_POST) {
    // Proses array hobi agar menjadi string untuk disimpan di DB
    $hobi = isset($_POST['hobi']) ? implode(", ", $_POST['hobi']) : "";
    
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => $hobi,
        'alamat' => $_POST['alamat'],
    ];

    $simpan = $db->insert('users', $data);
    if ($simpan) {
        echo "<div style='color:green'>Data berhasil disimpan!</div>";
    } else {
        echo "<div style='color:red'>Gagal menyimpan data.</div>";
    }
}

echo "<h3>Tambah User</h3>";
$form->addField("nama", "Nama Lengkap");
$form->addField("email", "Email");
$form->addField("pass", "Password", "password");
$form->addField("jenis_kelamin", "Jenis Kelamin", "radio", ['L' => 'Laki-laki', 'P' => 'Perempuan']);
$form->addField("agama", "Agama", "select", ['Islam'=>'Islam', 'Kristen'=>'Kristen', 'Budha'=>'Budha']);
$form->addField("hobi", "Hobi", "checkbox", ['Membaca'=>'Membaca', 'Coding'=>'Coding', 'Traveling'=>'Traveling']);
$form->addField("alamat", "Alamat", "textarea");
$form->displayForm();
?>