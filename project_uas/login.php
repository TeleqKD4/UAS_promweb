<?php
session_start();
require_once __DIR__ . '/koneksi.php';

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($conn,
        "SELECT * FROM users 
         WHERE username='$username' 
         AND password='$password'"
    );

    if (mysqli_num_rows($sql) == 1) {
        $data = mysqli_fetch_assoc($sql);
        $_SESSION['username'] = $data['username'];
        $_SESSION['role']     = $data['role'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login</title>
<style>
*{
  box-sizing:border-box;
  font-family: 'Segoe UI', Arial, sans-serif;
}
body{
  margin:0;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  background:linear-gradient(135deg,#2563eb,#1e40af);
}
.login-card{
  width:360px;
  background:#fff;
  padding:30px;
  border-radius:14px;
  box-shadow:0 15px 35px rgba(0,0,0,.25);
}
.login-card h2{
  text-align:center;
  margin-bottom:10px;
}
.login-card p{
  text-align:center;
  color:#555;
  margin-bottom:25px;
  font-size:14px;
}
label{
  font-weight:600;
  font-size:14px;
}
input{
  width:100%;
  padding:12px;
  margin-top:6px;
  margin-bottom:18px;
  border-radius:8px;
  border:1px solid #ccc;
  font-size:14px;
}
input:focus{
  outline:none;
  border-color:#2563eb;
}
button{
  width:100%;
  padding:12px;
  background:#2563eb;
  border:none;
  color:#fff;
  font-size:16px;
  border-radius:8px;
  cursor:pointer;
  font-weight:bold;
}
button:hover{
  background:#1d4ed8;
}
.error{
  background:#fee2e2;
  color:#991b1b;
  padding:10px;
  margin-bottom:15px;
  border-radius:8px;
  text-align:center;
  font-size:14px;
}
.role-info{
  margin-top:20px;
  font-size:12px;
  color:#555;
  background:#f3f4f6;
  padding:10px;
  border-radius:8px;
}
.role-info b{
  color:#111;
}
</style>
</head>

<body>

<div class="login-card">
  <h2>Login Sistem</h2>
  <p>Silakan masuk untuk melanjutkan</p>

  <?php if($error!=""){ ?>
    <div class="error"><?= $error ?></div>
  <?php } ?>

  <form method="POST">
    <label>Username</label>
    <input type="text" name="username" placeholder="Masukkan username" required>

    <label>Password</label>
    <input type="password" name="password" placeholder="Masukkan password" required>

    <button type="submit" name="login">Login</button>
  </form>

  <div class="role-info">
    <b>Akun Demo:</b><br>
    Admin → <b>admin / admin123</b><br>
    User → <b>user / user123</b>
  </div>
</div>

</body>
</html>
