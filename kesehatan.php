<?php
session_start();

if (!isset($_SESSION['air'])) {
    $_SESSION['air'] = 6;
}

if (isset($_POST['tambah_air'])) {
    if ($_SESSION['air'] < 8) {
        $_SESSION['air']++;
    }
}

if (isset($_POST['reset_air'])) {
    $_SESSION['air'] = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kesehatan Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="sidebar">

    <div class="logo">

        <div class="logo-icon-sidebar">
            <i class="fa-solid fa-heart-pulse"></i>
        </div>
        <div class="logo-text">
            <h2>Tugas &<br>kesehatan</h2>
            <p>Mahasiswa</p>
        </div>
    </div>
    <a href="dashboard.php">
        <i class="fa-solid fa-house"></i>
        Dashboard
    </a>
    <a href="tambah_tugas.php">
        <i class="fa-solid fa-plus"></i>
        Tambah Tugas
    </a>
    <a href="kesehatan.php">
        <i class="fa-solid fa-heart-pulse"></i>
        Kesehatan
    </a>
    <a href="kalender.php">
        <i class="fa-solid fa-calendar"></i>
        Kalender
    </a>
    <a href="logout.php" class="logout-btn">
        <i class="fa-solid fa-right-from-bracket"></i>
        Logout
    </a>

</div>
<div class="main-content">

    <h1>Kesehatan Mahasiswa</h1>

    <div class="stats">

        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fa-solid fa-glass-water"></i>
            </div>

            <h3>Minum Air</h3>
            <p><?php echo $_SESSION['air']; ?> / 8</p>

            <form method="POST">
                <button type="submit" name="tambah_air">
                    Tambah Air
                </button>

                <button type="submit" name="reset_air" class="btn-hapus">
                    Reset
                </button>
            </form>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fa-solid fa-bed"></i>
            </div>

            <h3>Jam Tidur</h3>
            <p>7 Jam</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <i class="fa-solid fa-person-walking"></i>
            </div>

            <h3>Status</h3>
            <p>Sehat</p>
        </div>

    </div>

    <div class="card">
        <h3>
            <i class="fa-solid fa-bell"></i>
            Reminder Kesehatan
        </h3>

        <ul class="health-list">
            <li><i class="fa-solid fa-check"></i> Jangan lupa istirahat</li>
            <li><i class="fa-solid fa-check"></i> Minum air setiap 2 jam</li>
            <li><i class="fa-solid fa-check"></i> Tidur cukup minimal 7 jam</li>
            <li><i class="fa-solid fa-check"></i> Kurangi begadang saat banyak tugas</li>
        </ul>
    </div>

</div>

</body>
</html>