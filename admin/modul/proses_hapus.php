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
include '../../database.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($conn, "DELETE FROM `artikel` WHERE id='$id'");
  header('location: ../artikel.php');
} else if (isset($_GET['id_proyek'])) {
  $id_proyek = $_GET['id_proyek'];
  mysqli_query($conn, "DELETE FROM `aplikasi` WHERE id_aplikasi='$id_proyek'");
  header('location: ../proyek.php');
} elseif (isset($_GET['sertifikasi'])) {
  $id_sertifikasi = $_GET['sertifikasi'];
  mysqli_query($conn, "DELETE FROM `tb_sertifikasi` WHERE id='$id_sertifikasi'");
  header('location: ../sertifikasi.php');
}
