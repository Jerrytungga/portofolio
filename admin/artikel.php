<?php
session_start();
if (!isset($_SESSION['role'])) {
  echo "<script type='text/javascript'>
  alert('Anda harus login terlebih dahulu!');
  window.location = '../index.php'
</script>";
} else {
  $id = $_SESSION['role'] == "Admin";
}
$page = 'Artikel';
include '../database.php';
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date('d F Y');
$waktu_sekarang = date('H:i:s');
if (isset($_POST['simpan'])) {
  $isikonten = $_POST['keterangan'];
  $stat = $_POST['status'];
  $judul = $_POST['judul'];
  $sumber = $_FILES['gambar']['tmp_name'];
  $target = 'images/artikel/';
  $nama_gambar = $_FILES['gambar']['name'];
  if (move_uploaded_file($sumber, $target . $nama_gambar)) {
    $datamasuk = mysqli_query($conn, "INSERT INTO `artikel`(`konten`, `status`,`judul`,`gambar`) VALUES ('$isikonten','$stat','$judul','$nama_gambar')");
  } else {
    $datamasuk = mysqli_query($conn, "INSERT INTO `artikel`(`konten`, `status`,`judul`) VALUES ('$isikonten','$stat','$judul')");
  }
}

$artikel = mysqli_query($conn, "SELECT * FROM artikel order by id DESC ");
$TA = mysqli_fetch_array($artikel);
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


      <div class="container mt-3">
        <div class="card shadow">
          <div class="card-header text-black">
            Tabel Artikel
          </div>
          <div class="card-body">
            <div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                <thead>
                  <tr>
                    <th witdh scope="col">no</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Konten</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="card-body ">
              <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">

                  <tbody>
                    <?php $i = 1;   ?>
                    <?php foreach ($artikel as $row) : ?>
                      <tr>
                        <th><?= $i; ?></th>
                        <td><?= $row['judul']; ?></td>
                        <td>
                          <span class="d-inline-block text-truncate text-justify" style="max-width: 200px;">

                            <?= $row['konten']; ?>
                          </span>
                        </td>
                        <td>
                          <?php
                          $GMB = $row["gambar"];
                          if ($GMB > 0) { ?>
                            <img src="images/artikel/<?= $row["gambar"]; ?>" width="90">
                          <?php } ?>
                        </td>
                        <td><?= $row['status']; ?></td>
                        <td><?= $row['date']; ?></td>
                        <td>
                          <a href="modul/proses_hapus.php?id=<?= $row['id']; ?>" type="button" class="btn btn-danger">Hapus</a>
                          <a href="ubah_artikel.php?id=<?= $row['id']; ?>" type="button" class="btn btn-warning">Edit</a>
                        </td>

                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div><br>
              <div class="kotak">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col">
                      <label for="judul">Judul :</label>
                      <input type="text" name="judul" class="colom form-control mt-1">
                    </div>
                    <div class="col">
                      <label for="foto">Gambar :</label>
                      <input type="file" name="gambar" class="colom form-control mt-1">
                    </div>
                    <div class="col">
                      <label for="status">Status :</label>
                      <select name="status" class="form-control colom bg-info text-light">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <textarea class="ckeditor" name="keterangan" id="ckedtor"></textarea>
                  <br />
                  <input type="submit" name="simpan" class="btn btn-success">
                </form>
              </div>

            </div>
          </div>
        </div>
      </div> <!-- /container -->
    </div>
  </main>


  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>
</body>

</html>