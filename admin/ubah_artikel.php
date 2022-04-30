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
$page = 'Artikel';
include '../database.php';
date_default_timezone_set('Asia/Jakarta');
$id = $_GET['id'];
$hari_ini = date('d F Y');
$waktu_sekarang = date('H:i:s');

if (isset($_POST['update'])) {
  $isikonten = $_POST['keterangan'];
  $stat = $_POST['status'];
  $judul = $_POST['judul'];
  $sumber = $_FILES['gambar']['tmp_name'];
  $target = 'images/artikel/';
  $nama_gambar = $_FILES['gambar']['name'];
  if (move_uploaded_file($sumber, $target . $nama_gambar)) {
    $update = mysqli_query($conn, "UPDATE `artikel` SET `konten`='$isikonten',`status`='$stat',`judul`='$judul', `gambar`='$nama_gambar' WHERE id='$id'");
    header('location: artikel.php');
  } else {
    $update = mysqli_query($conn, "UPDATE `artikel` SET `konten`='$isikonten',`status`='$stat',`judul`='$judul' WHERE id='$id'");
    header('location: artikel.php');
  }
}
$artikel = mysqli_query($conn, "SELECT * FROM artikel where id='$id'");
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
            <div class="kotak">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col">
                    <label for="judul">Judul :</label>
                    <input type="text" name="judul" class="colom form-control mt-1" value="<?= $TA['judul']; ?>">
                  </div>
                  <div class="col">
                    <label for="foto">Gambar :</label>
                    <div class="padding-bottom:5px">
                      <img src="./images/artikel/<?= $TA['gambar']; ?>" width="120px">
                    </div>
                    <input type="file" name="gambar" class="colom form-control mt-2" value="<?= $TA['gambar']; ?>">
                  </div>
                  <div class="col">
                    <label for="status">Status :</label>
                    <select name="status" class="form-control colom bg-info text-light" value="<?= $TA['status']; ?>">
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                <br>
                <textarea class="ckeditor" name="keterangan" id="ckeditor"> <?= $TA['konten']; ?></textarea>
                <br />
                <button type="submit" name="update" class="btn btn-warning">Simpan Perubahan</button>
                <a href="artikel.php" type="text" name="update" class="btn btn-danger">Batalkan</a>
              </form>
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