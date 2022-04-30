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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


	<style>
		html,
		body {
			height: 100%;
		}

		body {
			display: flex;
			align-items: center;
			padding-top: 40px;
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

		.form-signin {
			width: 100%;
			max-width: 330px;
			padding: 15px;
			margin: auto;
		}

		.form-signin .checkbox {
			font-weight: 400;
		}

		.form-signin .form-floating:focus-within {
			z-index: 2;
		}

		.form-signin input[type="email"] {
			margin-bottom: -1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}

		.form-signin input[type="password"] {
			margin-bottom: 10px;
			border-top-left-radius: 0;
			border-top-right-radius: 0;
		}

		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
</head>

<body class="text-center">

	<main class="form-signin">
		<form action="" method="POST">
			<h1 class="h3 mb-3 fw-normal mb-5">Welcome</h1>
			<img src="image/p4.png" class="mb-3" width="200" height="200">

			<label for="username" class="visually-hidden">Username</label>
			<input type="text" id="username" class="form-control my-2" placeholder="Username" autocomplete="off">
			<label for="password" class="visually-hidden ">Password</label>
			<input type="password" id="password" class="form-control mt-md-2" placeholder="Password">

			<button class="w-100 btn btn-lg btn-primary btn-login" type="submit">Login</button>
			<p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
		</form>
	</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function() {

			// Membuat function login_proses
			function login_proses() {
				var username = $("#username").val();
				var password = $("#password").val();

				// Mengecek username di isi atau tidak
				if (username.length == "") {


					alert('Username Kosong')
				}

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

							Swal.fire(
								'Good job!',
								'You clicked the button!',
								'success'
							)

							setTimeout(function() {
								window.location.href = "admin/index.php";
							}, 3000);


						}
					}
				});
			}
			// jika button yang class nya btn-login di click maka akan menjalan kan fungsi login_proses
			$(".btn-login").click(function() {
				login_proses();
			});

		});
	</script>
</body>

</html>