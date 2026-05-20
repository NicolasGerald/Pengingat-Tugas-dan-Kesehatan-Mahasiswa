<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM tugas WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['submit'])){

    $nama = $_POST['nama_tugas'];
    $mk = $_POST['mata_kuliah'];
    $deadline = $_POST['deadline'];
    $prioritas = $_POST['prioritas'];
    $catatan = $_POST['catatan'];

    mysqli_query($conn, "UPDATE tugas SET
        nama_tugas='$nama',
        mata_kuliah='$mk',
        deadline='$deadline',
        prioritas='$prioritas',
        catatan='$catatan'
        WHERE id='$id'
    ");

    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h1>Edit Tugas</h1>

<div class="card">

<form method="POST">

<p>Nama Tugas</p>
<input type="text" name="nama_tugas" value="<?php echo $d['nama_tugas']; ?>">

<p>Mata Kuliah</p>
<input type="text" name="mata_kuliah" value="<?php echo $d['mata_kuliah']; ?>">

<p>Deadline</p>
<input type="date" name="deadline" value="<?php echo $d['deadline']; ?>">

<p>Prioritas</p>
<select name="prioritas">
    <option><?php echo $d['prioritas']; ?></option>
    <option>Rendah</option>
    <option>Sedang</option>
    <option>Tinggi</option>
</select>

<p>Catatan</p>
<textarea name="catatan"><?php echo $d['catatan']; ?></textarea>

<br><br>

<button type="submit" name="submit">Update Tugas</button>

</form>

</div>

</div>

</body>
</html>