<?php
/**
 * Nama File: login.php
 * Deskripsi: Halaman login untuk masuk ke sistem.
 */
if (isset($_POST['submit'])) {
    $database = new Database();
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
    $result = $database->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            header("Location: /lab11_php_oop/artikel/index");
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<div class="login-box">
    <h3>Login Admin</h3>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form action="" method="post">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required placeholder="admin">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required placeholder="admin123">
        </div>
        <button type="submit" name="submit" class="btn-login">Masuk</button>
    </form>
</div>

<style>
    .login-box { width: 300px; margin: 100px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .input-group { margin-bottom: 15px; }
    .input-group label { display: block; margin-bottom: 5px; }
    .input-group input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
    .btn-login { width: 100%; padding: 10px; background: #2c3e50; color: white; border: none; border-radius: 4px; cursor: pointer; }
</style>