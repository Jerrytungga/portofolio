<?php
$page = 'Proyek';
$id_proyek = $_GET['id_proyek'];
include '../database.php';
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date('d F Y');
$waktu_sekarang = date('H:i:s');
$edit_proyek  = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `aplikasi` WHERE   id_aplikasi='$id_proyek'"))
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

      <div class="p-4 mb-4 rounded-3" style="background-color:#F5F5F5;">
        <div class="container-fluid py-5">
          <div class="row g-5">
            <div class="col-md-6">
              <img src="images/proyek/<?= $edit_proyek['gambar']; ?>" width="450px">
            </div>
            <div class="col-md-6">
              <h2 class="card-title fw-bold"><?= $edit_proyek['Judul']; ?></h2> <br>
              <p class="card-text"><?= $edit_proyek['keterangan']; ?></p>
              <a class="font"><?= $edit_proyek['date']; ?></a><br>
              <a href="proyek.php" class="btn btn-dark mt-2">Kembali</a>
            </div>
          </div>
        </div>
      </div>


    </div>
  </main>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>