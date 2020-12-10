<?php
		if (ISSET($_POST['submit'])) {
			$email = $_POST['email'];
			$pass = $_POST['password'];

			$password = md5($pass);

			echo $email;
			echo $pass;


			include 'config.php';
			$sql = mysqli_query($connect, "SELECT * FROM pegawai WHERE email='$email' and password='$password'");
			$datalogin = mysqli_fetch_array($sql);

			$id = $datalogin['id_pegawai'];

			if ($datalogin){
			header("Location: peminjaman.php?id=$id");
			};

			if(!$datalogin){
			?>
			<script type="text/javascript">
				alert("Username atau Password salah!");
			</script>
			<?php
			};
		}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman PowerBank</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body style="
	font-size: 15px;
	font-family: 'poppins';
	padding: 0px;
	margin: 0px;
	background-image: url(Style/img/header.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center;
	">
	<div class="container-umum" style="
	width: 100%;
	height: 90vh;
	">
		<div class="cont-login" style="
			width: 100%;
			height: 100%;
			margin-top: 20px;
			display: flex;
			align-items: center;
			justify-content: center;
		">
		
			<form action="loginPegawai.php" method="post" style="
				background-color: rgba(255,255,255,0.6);
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			">
			<h2 style="
				font-size: 20px;
				color: white;
				letter-spacing: 1px;
				font-weight: bold;
				text-align: center;
			">Login Pegawai</h2>
			<ul style="
				list-style: none;
				font-family: serif;
				font-weight: bold;
				color: white;
			">
				<li style="">
					<label for="fnama">Username</label></br>
					<input type="Email" name="email" placeholder="Email" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
				</li>
				<li style="">
					<label for="fnama">Password</label></br>
					<input type="password" name="password" placeholder="Password" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 80%;
					">
				</li>
			</ul>
			<button type="submit" name="submit" style="
				outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding:5px 10px 5px 10px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 30vh;
						margin-left: 15vh;
						margin-right: 15vh;
						cursor: pointer;

			">Login</button>
			</form>
			
		</div>
	</div>

</body>
</html>