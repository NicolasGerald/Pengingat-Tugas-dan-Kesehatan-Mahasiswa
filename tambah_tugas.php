<?php

include 'koneksi.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama_tugas'];
    $mk = $_POST['mata_kuliah'];
    $deadline = $_POST['deadline'];
    $prioritas = $_POST['prioritas'];
    $catatan = $_POST['catatan'];

    $query = "INSERT INTO tugas
    (nama_tugas, mata_kuliah, deadline, prioritas, catatan)

    VALUES

    ('$nama', '$mk', '$deadline',
    '$prioritas', '$catatan')";

    mysqli_query($conn, $query);

    echo "Tugas berhasil ditambahkan!";

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Tugas</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<div class="container">

<h1>Tambah Tugas</h1>

<p class="subtitle">
Kelola tugas kuliahmu dengan lebih rapi dan produktif
</p>

<div class="card form-card">

<form method="POST">

<p>Nama Tugas</p>
<input type="text"
name="nama_tugas">

<p>Mata Kuliah</p>
<input type="text"
name="mata_kuliah">

<p>Deadline</p>
<input type="date"
name="deadline">

<p>Prioritas</p>

<select name="prioritas">
    <option>Rendah</option>
    <option>Sedang</option>
    <option>Tinggi</option>
</select>

<p>Catatan</p>

<textarea name="catatan"></textarea>

<br><br>

<button type="submit"
name="submit">

Simpan Tugas

</button>

<div class="form-button">

<a href="dashboard.php" class="btn-dashboard">
    Dashboard
</a>

</div>

</form>

</div>

</div>

</body>
</html>