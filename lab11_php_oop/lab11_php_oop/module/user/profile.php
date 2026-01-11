<?php
// Pastikan user sudah login
if (!isset($_SESSION['is_login'])) {
    header("Location: /lab11_php_oop/user/login");
    exit();
}
?>
<div class="content-box">
    <h2>Profil Pengguna</h2>
    <hr>
    <table class="table-mewah">
        <tr>
            <td width="200"><strong>Nama Lengkap</strong></td>
            <td>: <?= $_SESSION['nama']; ?></td>
        </tr>
        <tr>
            <td><strong>Username</strong></td>
            <td>: <?= $_SESSION['username']; ?></td>
        </tr>
        <tr>
            <td><strong>Status Login</strong></td>
            <td>: <span style="color: green; font-weight: bold;">Aktif (Administrator)</span></td>
        </tr>
    </table>
</div>