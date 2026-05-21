<?php
include 'koneksi.php';
$pesan = "";
$tipe = "";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($cek) > 0){
        $pesan = "Email sudah terdaftar!";
        $tipe = "error";
    }else{
        mysqli_query($conn, "INSERT INTO users (username, email, password)
        VALUES ('$username', '$email', '$password')");

        $pesan = "Akun berhasil dibuat! Silakan login.";
        $tipe = "success";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    box-sizing: border-box;
}

body.register-body{
    margin: 0;
    padding: 0;
    background: #f3f6fb;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Arial, sans-serif;
}

.register-card{
    width: 430px;
    background: white;
    padding: 45px;
    border-radius: 24px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.12);
    text-align: center;
}

.register-icon{
    width: 90px;
    height: 90px;
    background: #e8f1ff;
    border-radius: 50%;
    margin: 0 auto 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.register-icon i{
    font-size: 42px;
    color: #1f2937;
}

.register-card h1{
    font-size: 42px;
    margin: 10px 0;
}

.register-subtitle{
    color: #6b7280;
    font-size: 18px;
    margin-bottom: 35px;
}

.register-card .input-group{
    display: flex;
    align-items: center;
    border: 1px solid #d1d5db;
    border-radius: 12px;
    margin-bottom: 22px;
    padding: 0 15px;
}

.register-card .input-group input{
    border: none;
    outline: none;
    width: 100%;
    padding: 16px 10px;
    margin: 0;
    font-size: 16px;
    background: transparent;
}

.register-card .input-group i{
    color: #6b7280;
    font-size: 20px;
    margin-right: 12px;
}

.register-btn{
    width: 100%;
    background: #1f2937;
    color: white;
    padding: 16px;
    border: none;
    border-radius: 12px;
    font-size: 18px;
}

.login-link{
    margin-top: 25px;
    color: #6b7280;
}

</style>

</head>

<body class="register-body">

<div class="register-card">

    <div class="register-icon">
        <i class="fa-solid fa-user-plus"></i>
    </div>

    <h1>Register</h1>

    <p class="register-subtitle">
        Buat akun baru untuk mulai menggunakan website
    </p>

<?php if($pesan != ""){ ?>
    <div class="alert <?php echo $tipe; ?>">
        <?php echo $pesan; ?>
    </div>
<?php } ?>

    <form method="POST">

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input type="text"
            name="username"
            placeholder="Username"
            required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-envelope"></i>
            <input type="email"
            name="email"
            placeholder="Email"
            required>
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input type="password"
            name="password"
            placeholder="Password"
            required>
        </div>

        <button class="register-btn"
        type="submit"
        name="register">

        Daftar

        </button>

    </form>

    <p class="login-link">
        Sudah punya akun?
        <a href="login.php">Login di sini</a>
    </p>

</div>

</body>
</html>