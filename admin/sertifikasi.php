<?php
session_start();
if (!isset($_SESSION['role'])) {
  echo "<script type='text/javascript'>
  alert('Anda harus login terlebih dahulu!');
  window.location = '../index.php'
</script>";
} else {
  $id =
    $_SESSION['role'] == "Admin";
}
$page = 'Sertifikasi';
include '../database.php';
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date('d F Y');
$waktu_sekarang = date('H:i:s');
if (isset($_POST['kirim'])) {
  $sumber = $_FILES['gambar']['tmp_name'];
  $target = '../image/sertifikasi/';
  $nama_gambar = $_FILES['gambar']['name'];
  $tanggal = $_POST['tanggal'];
  if (move_uploaded_file($sumber, $target . $nama_gambar)) {
    $datamasuk = mysqli_query($conn, "INSERT INTO `tb_sertifikasi`(`gambar`, `date`) VALUES ('$nama_gambar','$tanggal')");
  }
}
$tb_sertifikasi = mysqli_query($conn, "SELECT * FROM `tb_sertifikasi` ");
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>JR || Dev</title>
</head>

<body>

  <main>
    <div class="container py-4">
      <?php
      include 'header.php';
      ?>

      <div class="p-4 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <p class="col-md-8 fs-5">Daftar Sertifikasi </p>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col">
                <label for="gambar">Upload Gambar Sertifikasi :</label>
                <input type="file" name="gambar" class="form-control colom mt-1">
              </div>
              <div class="col">
                <label for="">Tanggal :</label>
                <input type="date" class="form-control colom" name="tanggal">
              </div>
            </div>
            <button type="submit" name="kirim" class="btn btn-success mt-2">Submit</button>
          </form>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama File</th>
                <th scope="col">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;   ?>
              <?php foreach ($tb_sertifikasi as $row) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $row['gambar']; ?></td>
                  <td><?= $row['date']; ?> &nbsp;<a href="modul/proses_hapus.php?sertifikasi=<?= $row['id']; ?>"><button class="btn btn-danger">Hapus File</button></a></td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>