<?php

session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($conn,
    "SELECT * FROM users
    WHERE username='$username'
    AND password='$password'");

    $cek = mysqli_num_rows($data);

    if($cek > 0){

        $_SESSION['username'] = $username;

        header("location:dashboard.php");

    }else{

        echo "Login gagal!";

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

<body class="login-page">

<div class="login-box">

    <div class="login-icon">
        <i class="fa-solid fa-heart-pulse"></i>
    </div>

    <h1>Login</h1>

    <p>Website Pengingat Tugas dan Kesehatan Mahasiswa</p>

    <form method="POST">

        <div class="input-group">
            <i class="fa-solid fa-user"></i>

            <input type="text"
            name="username"
            placeholder="Username"
            required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>

            <input type="password"
            name="password"
            placeholder="Password"
            required>
        </div>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>
</html>