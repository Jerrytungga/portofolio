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
$page = 'Proyek';
$id_proyek = $_GET['id_proyek'];
include '../database.php';
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date('d F Y');
$waktu_sekarang = date('H:i:s');
if (isset($_POST['update'])) {
  $sumber = $_FILES['gambar']['tmp_name'];
  $target = 'images/proyek/';
  $nama_gambar = $_FILES['gambar']['name'];
  $judul = $_POST['judul'];
  $ktg = $_POST['keterangan'];
  $date = $_POST['tanggal'];
  $status = $_POST['pilihan'];
  $singkat = $_POST['singkat'];
  $hasil = $_POST['hasil'];
  $situs = $_POST['situs'];
  if (move_uploaded_file($sumber, $target . $nama_gambar)) {
    $T_proyek = mysqli_query($conn, "UPDATE `aplikasi` SET `gambar`='$nama_gambar',`Judul`='$judul',`keterangan`='$ktg',`date`='$date',`status`='$status', `Keterangan_Singkat`='$singkat', `keterangan_Hasil`='$hasil',`link`='$situs' WHERE id_aplikasi='$id_proyek'");
    header('location: proyek.php');
  } else {
    $T_proyek = mysqli_query($conn, "UPDATE `aplikasi` SET `Judul`='$judul',`keterangan`='$ktg',`date`='$date',`status`='$status', `Keterangan_Singkat`='$singkat', `keterangan_Hasil`='$hasil',`link`='$situs' WHERE id_aplikasi='$id_proyek'");
    header('location: proyek.php');
  }
}
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
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row g-5">
              <div class="col-md-6">
                <label for="Image">Gambar :</label><br>
                <img src="images/proyek/<?= $edit_proyek['gambar']; ?>" width="300px" height="315px"><br><br>
                <input type="file" class="form-control mt-5" name="gambar"><br>
                <label for="">Situs Website :</label>
                <input type="text" name="situs" class="form-control mt-1" value="<?= $edit_proyek['link']; ?>"><br>
              </div>
              <div class="col-md-6">
                <label for="judul">Judul :</label>
                <input type="text" name="judul" value="<?= $edit_proyek['Judul']; ?>" class="form-control"> <br>
                <label for="Keterangan">Keterangan :</label>
                <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"><?= $edit_proyek['keterangan']; ?></textarea><br>
                <label for="singkat">Uraian Singkat :</label>
                <textarea name="singkat" id="" cols="30" rows="5" class="form-control"><?= $edit_proyek['Keterangan_Singkat']; ?></textarea><br>
                <label for="hasil">Uraian Hasil :</label>
                <textarea name="hasil" id="" cols="30" rows="5" class="form-control"><?= $edit_proyek['keterangan_Hasil']; ?></textarea><br>
                <label for="tanggal">Tanggal :</label>
                <input type="date" name="tanggal" class="form-control mt-1" value="<?= $edit_proyek['date']; ?>"><br>
                <label for="status">Status :</label>
                <select name="pilihan" class="form-control colom ">
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
                <button type="submit" name="update" class="btn btn-warning mt-2">Simpan Perubahan</button>
                <a href="proyek.php" class="btn btn-danger mt-2">Batalkan</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>



  </main>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>