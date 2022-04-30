<?php
session_start();
// jika sudah login ke mentor maka akan di teruskan ke halaman mentor
if (!isset($_SESSION['role'])) {
} else if ($_SESSION['role'] == "Admin") {
  header("location:admin/index.php");
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
