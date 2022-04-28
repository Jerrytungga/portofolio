<?php
session_start();
include 'database.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


// Mencari user berdasarkan username dan password yang di input
$query  	= "SELECT * FROM akun WHERE username='$username' AND password='$password'";
$result     = mysqli_query($conn, $query);
$num_row    = mysqli_num_rows($result);

// Mengecek data nya ada atau tidak
if ($num_row > 0) {
	$row    = mysqli_fetch_array($result);
	// Mengirim response ke ajax

	if ($row['status'] == "Aktif") {

		echo "Admin";
		// Membuat Session
		$_SESSION['id_Admin'] = $row['id'];
		$_SESSION['role'] = "Admin";
	} else {
		echo "Tidak Aktif";
	}

	// Jika Rolenya kasir maka fungsi ini yang akan berjalan

} else {
	// Mengirim response ke ajax
	echo "error";
}
