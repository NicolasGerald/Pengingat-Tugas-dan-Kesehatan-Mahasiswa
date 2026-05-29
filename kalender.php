<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM tugas ORDER BY deadline ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalender Tugas</title>
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

    <h1>Kalender Deadline</h1>

    <div class="card">
        <h3><i class="fa-solid fa-calendar-days"></i> Jadwal Deadline Tugas</h3>

        <table>
            <tr>
                <th>Tanggal</th>
                <th>Nama Tugas</th>
                <th>Mata Kuliah</th>
                <th>Prioritas</th>
            </tr>

            <?php while($d = mysqli_fetch_array($data)){ ?>
            <tr>
                <td><?php echo $d['deadline']; ?></td>
                <td><?php echo $d['nama_tugas']; ?></td>
                <td><?php echo $d['mata_kuliah']; ?></td>
                <td><?php echo $d['prioritas']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>

</body>
</html>