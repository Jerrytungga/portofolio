<?php
include '../../database.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  mysqli_query($conn, "DELETE FROM `artikel` WHERE id='$id'");
  header('location: ../artikel.php');
} else if (isset($_GET['id_proyek'])) {
  $id_proyek = $_GET['id_proyek'];
  mysqli_query($conn, "DELETE FROM `aplikasi` WHERE id_aplikasi='$id_proyek'");
  header('location: ../proyek.php');
}
