<?php
$id=$_GET['id'];
include 'config.php';
$urut = 0;

		if (ISSET($_POST['submit'])) {
			$nama = $_POST['nama'];
			$jenis = $_POST['jenis'];
			$jam = $_POST['jam'];
			$id = $_POST['id'];
			$query1 = "SELECT * FROM ruangan WHERE nama ='$jenis'";
			$sql1 = mysqli_query($connect, $query1);
			$dataruangan = mysqli_fetch_array($sql1);

			$idruangan = $dataruangan['id_ruangan'];
			$harga = $dataruangan['harga']*$jam;

			$query = "SELECT * FROM user WHERE nama_band ='$nama'";
			$sql = mysqli_query($connect, $query);
			$databand = mysqli_fetch_array($sql);

			if($databand) {
				$idband = $databand['id_user'];
				$point = $databand['point']+$jam;

				include 'config.php';
				$result = mysqli_query($connect, "INSERT INTO peminjaman VALUES('','$id','$idruangan','$idband','$jam', '$harga')");
				$result1 = mysqli_query($connect, "UPDATE user set point=$point WHERE id_user=$idband");

				if ($result){
				?>
				<script>
					alert("Berhasil!");
					window.location.href= 'peminjaman.php?id=<?php echo $id ?>';
				</script>
				<?php
				}
			}

			if (!$databand){
			?>
			<script>
					alert("Band tidak terdaftar!");
					window.location.href= 'peminjaman.php?id=<?php echo $id ?>';
				</script>
			<?php
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Detail Layanan</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/Bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="style/Bootstrap/js/bootstrap.bundle.min.js">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.9/fullpage.min.css"
		integrity="sha512-8M8By+q+SldLyFJbybaHoAPD6g07xyOcscIOQEypDzBS+sTde5d6mlK2ANIZPnSyxZUqJfCNuaIvjBUi8/RS0w=="
		crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
			background-image: url(style/img/backGame.jpeg);
			background-repeat: no-repeat;
			background-size: cover;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
			background-color: #bdc3c7;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
			margin-bottom: 15px;
			color: white;
		}

		table td {
			transition: all .5s;
		}
		a{
			text-decoration: none;
			font-weight: 800;
		}
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body style="background-color: #DFE2D2; color: rgb(85,85,85);">
	<main>
		<section style="
			width: 100%;
			max-width: 100%;
			height: 100vh;
			display: flex;
			background-image: url(style/img/Header.jpg);
			background-color: cyan;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			justify-content: center;

		">
			<!-- Section Form  -->
			<div style="
				flex: 1;
			">
				<div style="
					width: 60%;
					height: 90vh;
					margin-left: 20%;
					margin-top: 2%;
					background-color: rgba(255,255,255,0.4);
					border: 3px solid rgba(0,0,0,0.1);

					border-radius: 20px;

				">
					<form action="peminjaman.php" method="post" style="
						padding: 10px;
						list-style: none;
						color: white;
					">
						<h2 style="text-align: center;">Pencatatan Penyewa</h2>
						<li style="
							padding-left: 25%;
							padding-top: 2px;
						">
							<label>Nama Band</label><br>
							<input type="text" name="nama" placeholder="Nama Band" style="
								outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 3px 15px 3px 15px;
							width: 60%;
							color: black;
							">
						</li>
						<li style="
							padding-left: 25%;
							padding-top: 2px;
						">
							<label>Jenis Ruangan</label><br>
							<select name="jenis" style="
								outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 3px 15px 3px 15px;
							width: 60%;
							color: black;
							">
								<optgroup label="Jenis Ruangan">
									<option value="Deluxe">Deluxe Rp.50.000.-/Jam</option>
                                    <option value="Premium">Premium Rp.80.000.-/Jam</option>
                                    <option value="Luxury">Luxury Rp.100.000.-/Jam</option>
								</optgroup>
							</select>
						</li>
						<li style="
							padding-left: 25%;
							padding-top: 2px;
						">
							<label>Jam Sewa</label><br>
							<input type="number" name="jam" max="3" min="1" step="1" style="	outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 3px 15px 3px 15px;
							width: 60%;
							color: black;">
						</li>
						<li>
							<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
						</li>
					
						<!-- Button trigger modal -->
						<button type="submit" name="submit" style="margin-left: 25%; margin-top: 20px;" class="btn btn-primary">
						  Catat
						</button>

					</form>
					<h2 style="text-align: center; color: white;">Pengguna Baru</h2>
					<center><a href="daftarUser.php?id=<?php echo $id ?>"><button type="submit" class="btn btn-primary">Daftar Pengguna Baru</button></a></center>
					<table class="data-table">
			<!-- 		<caption class="title">Daftar Team Esport</caption> -->
					<thead>
						<tr>
							<th>NO</th>
							<th>Nama Band</th>
							<th>Ruangan</th>
							<th>Batal</th>	
						</tr>
					</thead>
					<tbody>
						<?php
							$queryPEMIN = "SELECT * FROM peminjaman";
							$sqlPEMIN = mysqli_query($connect, $queryPEMIN);

							while($datapeminjaman = mysqli_fetch_array($sqlPEMIN)) {
								$idruangan = $datapeminjaman['id_ruangan'];
								$iduser = $datapeminjaman['id_user'];

								$queryRUANG = "SELECT * FROM ruangan WHERE id_ruangan = '$idruangan'";
								$sqlRUANG = mysqli_query($connect, $queryRUANG);
								$dataruang = mysqli_fetch_array($sqlRUANG);

								$queryUSER = "SELECT * FROM user WHERE id_user = '$iduser'";
								$sqlUSER = mysqli_query($connect, $queryUSER);
								$datauser = mysqli_fetch_array($sqlUSER);

								$urut=$urut+1;

						    	echo "<tr>";
						    	echo "<td>".$urut."</td>";
						        echo "<td>".$datauser['nama_band']."</td>";
						        echo "<td>".$dataruang['nama']."</td>";
						        echo "<td><a href='delete.php?id=$id&idpesanan=$datapeminjaman[id_peminjaman]'>Hapus</a></td>"; 
						        echo "</tr>"; 
						    	}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th colspan="3">TOTAL PESANAN</th>
							<th><?php echo $urut ?> PESANAN</th>

						</tr>

					</tfoot>
				</table>
				</div>
			</div>
			
		</section>
	</main>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
   
</body>
</html>