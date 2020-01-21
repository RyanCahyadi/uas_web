<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=DataPesanan.xls");
	?>
 
	<center>
		<!-- <h1>Export Data Ke Excel Dengan PHP <br/> www.malasngoding.com</h1> -->
	</center>
 
	<table border="1">
		<tr>
            <th>No</th>
			<th>Nama customer</th>
            <th>Nama barang</th>
            <th>Qty barang</th>
            <th>Grand total</th>
            <th>Metode pembayaran</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No handphone</th>
		</tr>
		<?php 
		// koneksi database
		$conn = mysqli_connect("localhost", "root", "", "db_ecommerce");
 
		// menampilkan data pegawai
		$data = mysqli_query($conn, "SELECT * FROM tbl_pesanan");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $d['nama']; ?></td>
			<td><?= $d['nama_barang']; ?></td>
			<td><?= $d['qty']; ?></td>
			<td><?= "Rp. ". number_format($d['grand_total'], 2, ',', '.'); ?></td>
			<td><?= $d['metode_pembayaran']; ?></td>
			<td><?= $d['alamat']; ?></td>
			<td><?= $d['email']; ?></td>
			<td><?= $d['no_handphone']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>