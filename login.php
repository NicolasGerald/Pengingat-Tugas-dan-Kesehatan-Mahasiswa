<?php

session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn,
    "SELECT * FROM users
    WHERE email='$email'
    AND password='$password'");

    $cek = mysqli_num_rows($data);

    if($cek > 0){

    $d = mysqli_fetch_array($data);

    $_SESSION['username'] = $d['username'];

    header("location:dashboard.php");
}
    else{
        echo "<script>alert('Login gagal! Email atau password salah.');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="login-body">

<div class="login-card">

    <div class="login-icon">
        <i class="fa-solid fa-heart-pulse"></i>
    </div>

    <h1>Login</h1>

    <p class="login-subtitle">
        Website Pengingat Tugas dan Kesehatan Mahasiswa
    </p>

    <form method="POST">

        <div class="input-group">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <button class="login-btn" type="submit" name="login">
            Login
        </button>

    </form>

    <p class="register-link">
        Belum punya akun?
        <a href="register.php">Daftar di sini</a>
    </p>

</div>

</body>
</html>