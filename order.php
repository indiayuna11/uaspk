<?php
error_reporting(0);
session_start();
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "insert into barangku set  
nama_pelanggan = '$_POST[nama_pelanggan]',
nama_barang = '$_POST[nama_barang]',
jumlah_barang = '$_POST[jumlah_barang]'");

$berhasil="<p style='color:red;'>Pemesanan Diproses</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sindi Ayuna Hustani</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

	<!-- header -->
	<header>
		<div class="navbar"></div>
		<div class="container">
		<h1><a href="index.php"></a>SUNNYCRAFTIE</h1>
		<ul>
			<li><a href="index.php">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
			<li><a href="product.html">PRODUCT</a></li>
			<li class="active"><a href="order.html">ORDER</a></li>
			<li><a href="contact.html">CONTACT</a></li>
		</ul>
		</div>
	</header>
    
	<section class="order">
		<div class="container">
            <br><br><br><br>
			<h3>ORDER</h3>
			<h3>Lihat Harga Barang & Hitung Belanja</h3>
			<form>
				<div class="flexList">
					<label><b> Items </b></label>
					<select onchange="calculateAmount(this.value);" required>
						<option value="25000">Strapmask Butterfly</option>
						<option value="10000">Strapmask Mutiara</option>
						<option value="10000">Konektor Infinite</option>
						<option value="10000">Strapmask Soft Colour</option>
						<option value="10000">Strapmask Batu Hitam</option>
						<option value="80000">Konektor Mutiara</option> 
					</select>
				</div>
				<br>
				<label><b> Price </b></label>
				<input id="tot_amount" type="number" readonly>
				<br><br>
				<label><b> Total : </b></label>
				<span id="total"></span>
			</form>
			<br>
			<h3>Lakukan Pemesanan</h3>
	<form action="" method="post">
		<table>
			<tr>
				<td width="150"> Nama Pelanggan </td>
				<td> <input type="text" name="kode_barang"> </td>
			</tr>
			<tr>
				<td width="150"> Nama Barang </td>
				<td> <input type="text" name="nama_barang"> </td>
			</tr>
			<tr>
				<td width="150"> Jumlah Barang </td>
				<td> <input type="text" name="harga_barang"> </td>
			</tr>
			<tr>
				<td></td>
				<td width="150"><input type="submit" name="proses" value="Simpan"> </td>
			</tr>
			<tr>
				<td><?php echo $berhasil; ?></td>
			</tr>
		</table>
		</form>
		</div>
		</section>
	<!-- footer -->
	<footer>
		<div class="container">
			<small> Copyright &copy; 2021 - Sindi Ayuna Hustani, All Rights Reserved.</small>
		</div>
	</footer>

	<!--Javascript-->
	<script>
		let arr = [];
		let total = document.querySelector("#total");

		function calculateAmount(val){
			let divObj = document.querySelector("#tot_amount");
			
			divObj.value = val;
			
			arr.push(parseInt(divObj.value));
			
			console.log(arr);

			let sums = arr.reduce((a, b) => a + b);
			
			total.innerHTML = sums;
		}
	</script>
</body>
</html>
