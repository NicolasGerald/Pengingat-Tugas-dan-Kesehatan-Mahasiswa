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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

    <style>
.form-login-group{
    position: relative !important;
    margin-bottom: 22px !important;
}

.form-login-group i{
    position: absolute !important;
    left: 22px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    color: #6b7280 !important;
    font-size: 20px !important;
}

.form-login-group input{
    width: 100% !important;
    height: 64px !important;
    padding-left: 60px !important;
    border: 1px solid #d1d5db !important;
    border-radius: 12px !important;
    outline: none !important;
    font-size: 18px !important;
    background: white !important;
}
</style>
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

        <div class="form-login-group">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-login-group">
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