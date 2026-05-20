<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}

include 'koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM tugas");

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link rel="stylesheet"
href="css/style.css">

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
        <h2>Tugas & Kesehatan</h2>
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

<h1>Dashboard Mahasiswa</h1>
<div class="stats">

    <div class="stat-card">

        <div class="stat-icon blue">
            <i class="fa-solid fa-book"></i>
        </div>

        <h3>Total Tugas</h3>

        <p><?php echo mysqli_num_rows($data); ?></p>

    </div>

    <div class="stat-card">

        <div class="stat-icon green">
            <i class="fa-solid fa-heart-pulse"></i>
        </div>

        <h3>Kesehatan</h3>

        <p>Aktif</p>

    </div>

    <div class="stat-card">

        <div class="stat-icon orange">
            <i class="fa-solid fa-chart-line"></i>
        </div>

        <h3>Status</h3>

        <p>Produktif</p>

    </div>

</div>
<a href="tambah_tugas.php">
    <button>Tambah Tugas</button>
</a>

<div class="card">

<h3>Daftar Tugas</h3>

<table border="1"
cellpadding="10">

<tr>
    <th>Nama Tugas</th>
    <th>Mata Kuliah</th>
    <th>Deadline</th>
    <th>Prioritas</th>
    <th>Aksi</th>
</tr>

<?php while($d = mysqli_fetch_array($data)){ ?>

<tr>

<td>
<?php echo $d['nama_tugas']; ?>
</td>

<td>
<?php echo $d['mata_kuliah']; ?>
</td>

<td>
<?php echo $d['deadline']; ?>
</td>

<td>
<?php echo $d['prioritas']; ?>
</td>
<td>
    <a href="edit_tugas.php?id=<?php echo $d['id']; ?>">
        <button class="btn-edit">Edit</button>
    </a>

    <a href="hapus_tugas.php?id=<?php echo $d['id']; ?>"
       onclick="return confirm('Yakin ingin menghapus tugas ini?')">
        <button class="btn-hapus">Hapus</button>
    </a>
</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>