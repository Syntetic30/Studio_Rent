	<?php
		if (ISSET($_POST['submit'])) {
			$nama = $_POST['nama'];
			$ketua = $_POST['ketua'];
			$id = $_POST['id'];

			include 'config.php';
			$result = mysqli_query($connect, "INSERT INTO user VALUES('','$nama','$ketua',0)");

			if (!$result){
			?>
			<script>
				alert("Gagal!");
			</script>
			<?php
			}
			
			if ($result){?>
				<script>
					alert("Berhasil!");
					window.location.href= 'peminjaman.php?id=<?php echo $id ?>';
				</script><?php
			}
		}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Tournament Game</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style="
	margin: 0px;
	padding: 0px;
	max-width: 100%;
	font-family: sans-serif;	
">
	<main>
		<section style="
			width: 100%;
			max-width: 100%;
			height: 100vh;
			display: flex;
			background-image: url(style/img/Section1.png);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			justify-content: center;
		">
			<!-- Section Form -->
			<div style="
				flex: 1;
			">
				<div style="
					width: 90%;
					height: 70vh;
					margin-left: 15%;
					margin-top: 20%;
					border-radius: 20px;
					color: white;
				">
				<h2 style="text-align: center;">Daftar User</h2>
					<form action="daftarUser.php" method="post" style="
						padding: 10px;
						list-style: none;
						color: white;
					">
						<li style="">
					<label for="fnama" style="margin-left: 200px;">Nama Band</label></br>
					<input type="text" name="nama" placeholder="Nama Band" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						margin-left: 200px;
						width: 50%;
					">
				</li>
				<li style="">
					<label for="fnama" style="margin-left: 200px;">Nama Ketua</label></br>
					<input type="text" name="ketua" placeholder="Nama Ketua" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 50%;
						margin-left: 200px;
					"> 
				</li>
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
						 <input type="submit" class="btn btn-primary" name="submit" value="Submit" style="
							width: 30%;
							margin-top: 15px;
							border-radius: 10px;
							margin-left: 35%;
						">
					</form>
				</div>
			</div>
			<!-- Section gambar -->
			<div style="
				flex: 1;
			">
				<div style="
					width: 90%;
					height: 80vh;
					margin-left: 5%;
					margin-top: 9%;
					
					background-position: center;
					background-size: cover;
					border-radius: 20px;
					border: 3px solid rgba(0,0,0,0.1);
				">
					<div class="container">
					  <div class="row" style="
						height: 80vh !important;
						background-color: rgba(255,255,255,0.4);
						padding: 10px;
						border-radius: 15px;
						border: 3px solid rgba(255,255,255,0.4);;
					">
					    <div class="col" style="
					    	background-image: url(style/img/sec1.jpg);
					    	background-position: center;
					    	background-repeat: no-repeat;
					    	background-size: cover;
					    	border-radius: 20px;
					    	margin-right: 5px;
					    ">col</div>
					    <div class="col" style="
					    	background-image: url(style/img/sec2.jpg);
					    	background-position: center;
					    	background-repeat: no-repeat;
					    	background-size: cover;
					    	border-radius: 20px;
					    ">col</div>
					    <div class="w-100" style="
					    	background-image: url(style/img/header.jpg);
					    	background-position: center;
					    	background-repeat: no-repeat;
					    	background-size: cover;
					    	border-radius: 20px;
					    	margin-top: 5px;
					    	margin-bottom: 5px;
					    "></div>
					    <div class="col" style="
					    	background-image: url(style/img/sec3.jpg);
					    	background-position: center;
					    	background-repeat: no-repeat;
					    	background-size: cover;
					    	border-radius: 20px;
					    	margin-right: 5px;
					    ">col</div>
					    <div class="col" style="
					    	background-image: url(style/img/sec4.jpg);
					    	background-position: center;
					    	background-repeat: no-repeat;
					    	background-size: cover;
					    	border-radius: 20px;
					    ">col</div>
					  </div>
					</div>
				</div>
			</div>
		</section>
	</main>
</body>
</html>