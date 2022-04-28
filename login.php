<?php
session_start();
// jika sudah login ke mentor maka akan di teruskan ke halaman mentor
if (!isset($_SESSION['role'])) {
} else if ($_SESSION['role'] == "Admin") {
	header("location:admin/index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="admin/css/iziToast.min.css">
	<link href="admin/css/sweetalert2.min.css" rel="stylesheet">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="admin/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="admin/css/main.css">
	<!--===============================================================================================-->
</head>

<body>


	<div class="container-login100">
		<div class="wrap-login100 p-t-85 p-b-20">

			<span class="login100-form-title p-b-70">
				Welcome
			</span>
			<span class="login100-form-avatar">
				<img src="image/1.jpeg" alt="AVATAR">
			</span>


			<div class="wrap-input100 m-t-85 m-b-35">
				<input class="input100" id="username" type="text" name="username">
				<span class="focus-input100" data-placeholder="Username"></span>
			</div>

			<div class="wrap-input100  m-b-50">
				<input class="input100" id="password" type="password" name="password">
				<span class="focus-input100" data-placeholder="Password"></span>
			</div>

			<div class="container-login100-form-btn">
				<button class="login100-form-btn btn-login">
					Login
				</button>
			</div>

		</div>
	</div>



	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="admin/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="admin/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="admin/vendor/bootstrap/js/popper.js"></script>
	<script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="admin/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="admin/vendor/daterangepicker/moment.min.js"></script>
	<script src="admin/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="admin/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="admin/js/main.js"></script>
	<script type="text/javascript" src="admin/js/alert/iziToast.min.js"></script>
	<script src="admin/js/sweetalert2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function() {

			// Membuat function login_proses
			function login_proses() {
				var username = $("#username").val();
				var password = $("#password").val();


				// Mengecek username di isi atau tidak
				if (username.length == "") {

					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Field Username wajib diisi!'
					});

					// Mengecek password di isi atau tidak
				} else if (password.length == "") {

					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Field Password wajib diisi!'
					});

				} else {
					// Jika semua form terisi maka ajax akan memulai memproses data
					$.ajax({
						url: "aksi.php", //Url untuk mengelolah data
						type: "POST", //Method untuk mengelolah data
						data: {
							// Mengirimkan data ke URL
							"username": username,
							"password": password
						},
						// Jika response nya sukses atau berhasil maka fungsi ini akan berjalan
						success: function(response) {
							// Jika ia sebagai admin
							if (response == "Admin") {

								iziToast.success({
									title: 'Selamat',
									message: 'Anda berhasil login sebagai mentor, sebentar ya...',
									position: 'topRight'
								});
								setTimeout(function() {
									window.location.href = "admin/index.php";
								}, 3000);

								// Jika ia sebagai siswa
							} else if (response == "Tidak Aktif") {
								// Jika response nya error maka fungsi ini yang akan berjalan

								Swal.fire({
									icon: 'error',
									title: 'Opps!',
									text: 'Maaf Akun Anda Tidak Aktif'
								});


							} else {
								// Jika response nya error maka fungsi ini yang akan berjalan
								Swal.fire({
									icon: 'error',
									title: 'Opps!',
									text: 'Username atau Password Anda Salah!'
								});

							}

							console.log(response);
						},
						// Jika ajax nya error/bermasalah maka fungsi ini yang akan berjalan
						error: function(response) {

							Swal.fire({
								icon: 'error',
								title: 'Opps!',
								text: 'Terjadi kesalahan pada server!'
							});

							console.log(response);
						}
					});
				}
			}

			// jika button yang class nya btn-login di click maka akan menjalan kan fungsi login_proses
			$(".btn-login").click(function() {
				login_proses();
			});

		});
	</script>
</body>

</html>