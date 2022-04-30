<?php
session_start();
// jika sudah login ke mentor maka akan di teruskan ke halaman mentor
if (!isset($_SESSION['role'])) {
} else if ($_SESSION['role'] == "Admin") {
  header("location:admin/index.php");
}
$page = 'Proyek';
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date('d F Y');
$waktu_sekarang = date('H:i:s');
include '../database.php';
if (isset($_POST['Tambah_Proyek'])) {
  $sumber = $_FILES['gambar']['tmp_name'];
  $target = 'images/proyek/';
  $nama_gambar = $_FILES['gambar']['name'];
  $judul = $_POST['judul'];
  $ktg = $_POST['keterangan'];
  $date = $_POST['tanggal'];
  $status = $_POST['pilihan'];
  $singkat = $_POST['Singkat'];
  $hasil = $_POST['Hasil'];
  $situs = $_POST['situs'];
  if (move_uploaded_file($sumber, $target . $nama_gambar)) {
    $T_proyek = mysqli_query($conn, "INSERT INTO `aplikasi`(`gambar`, `Judul`, `keterangan`, `date`, `status`,`Keterangan_Singkat`,`keterangan_Hasil`,`link`) VALUES ('$nama_gambar','$judul','$ktg','$date','$status','$singkat','$hasil','$situs')");
  }
}
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


      <div class="p-4 mb-4  rounded-3">
        <div class="container-fluid py-5">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Proyek
          </button>
          <div class="row">
            <?php
            $ambil_data_proyek = mysqli_query($conn, "SELECT * FROM `aplikasi` limit 5");
            while ($data_proyek = mysqli_fetch_array($ambil_data_proyek)) { ?>

              <div class="col-lg-4 mt-4">
                <div class="card hv">
                  <div class="card-body">
                    <center>
                      <img src="images/proyek/<?= $data_proyek['gambar']; ?>" width="250px" height="250px">
                    </center><br>
                    <h5 class="card-title mt-1"><?= $data_proyek['Judul']; ?></h5>
                    <p class="card-text"><?= $data_proyek['keterangan']; ?></p>
                    <a class="font"><?= $data_proyek['date']; ?></a><br><br>
                    <a href="detail_proyek.php?id_proyek=<?= $data_proyek['id_aplikasi'];  ?>" class="btn btn-primary">Lihat</a>
                    <a href="modul/proses_hapus.php?id_proyek=<?= $data_proyek['id_aplikasi'];  ?>" class="btn btn-danger">Hapus</a>
                    <a href="detail_proyek_edit.php?id_proyek=<?= $data_proyek['id_aplikasi'];  ?>" class="btn btn-warning">Edit</a>
                  </div>
                </div>
              </div>
            <?php   }
            ?>



          </div>
        </div>
      </div>


    </div>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header modalcolor">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Proyek</h5>
          <button type="button" class="btn-close text-light " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" class="form-control mt-1">
              </div>
              <div class="col">
                <label for="judul">Judul :</label>
                <input type="text" name="judul" class="form-control mt-1">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="keterangan" class="mt-2">Keterangan :</label>
                <textarea name="keterangan" id="" cols="30" rows="4" class="form-control mt-1"></textarea>
              </div>
              <div class="col">
                <label for="keterangan" class="mt-2">Uraian Singkat:</label>
                <textarea name="Singkat" id="" cols="30" rows="4" class="form-control mt-1"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label for="keterangan" class="mt-2">Uraian Hasil :</label>
                <textarea name="Hasil" id="" cols="30" rows="4" class="form-control mt-1"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label for="Tanggal" class="mt-2">Tanggal :</label>
                <input type="date" name="tanggal" class="form-control" required>
              </div>
              <div class="col">
                <label for="status" class="mt-2">Status :</label>
                <select name="pilihan" class="form-control" required>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <label for="keterangan" class="mt-2">Alamat Website :</label>
                <input name="situs" class="form-control mt-1">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="Tambah_Proyek" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>