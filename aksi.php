<?php
session_start();
include 'database.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$query  	= "SELECT * FROM akun WHERE username='$username' AND password='$password'";
$result     = mysqli_query($conn, $query);
$num_row    = mysqli_num_rows($result);

if ($num_row > 0) {
	$row    = mysqli_fetch_array($result);
	if ($row['status'] == "Aktif") {

		echo "Admin";
		// Membuat Session
		$_SESSION['id_Admin'] = $row['id'];
		$_SESSION['role'] = "Admin";
	} else {
		echo "Tidak Aktif";
	}
} else {
	// Mengirim response ke ajax
	echo "error";
}
