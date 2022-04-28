<?php
if (isset($_POST['sent'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $pesan = $_POST['message'];

  $mailto = "jerrychristiangedeontungga41@gmail.com";
  $headers = "From: " . $email;
  $text = " Hai Jerry Christian, Anda mendapatkan pesan email dari " . $name . ".\n\n" . $pesan;
  mail($mailto, $subject, $text, $headers);
  header('location: kontak.php');
}
