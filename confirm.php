<?php

$produk = $_POST["barang"];
$pesanan = $_POST["jmlpsn"];
$harga = $_POST["txtDisplay"];
$metode = $_POST["pilih"];
$email = $_POST["email"];

session_start();

$_SESSION['pilih'] = $metode;
$_SESSION['txtDisplay'] = $harga;
$_SESSION['barang'] = $produk;
$_SESSION['jmlpsn'] = $pesanan;
$_SESSION['email'] = $email;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
    display:none;
}
table {
    font-family: sans-serif;
    color: black;
    border-collapse: collapse;
    background: white;
}
th{
	background: purple;
	padding: 5px;
	color: white;
	text-align: center;
}
table, th tr, td {
    border: 1px solid #999;
    padding: 2px;
    text-align: center;
}
</style>
    <title>Order Confirmation</title>
  </head>
  <body style="background: purple;">
  <div class="container justify-content-center">
    <div class="shadow p-4 m-3 rounded" style="background: cyan;border-radius: 10px;">
      <center><img src="https://uxwing.com/wp-content/themes/uxwing/download/34-crime-security-military-law/secure-payment.png" height="100" width="120" class="mb-2"><br><h1 class="mb-3">ORDER CONFIRMATION</h1></center>
		<div class="mb-3" align="center">
		  <p id="notif" style="color:red; margin-bottom: 5px;text-align:center;"></p>
          <table>
          	<th class="thead" colspan="2">Pesanan</th>
          	<tr><td>Produk</td><td><?php echo $produk;?></td></tr>
          	<tr><td>Jumlah Pesanan</td><td><?php echo $pesanan;?></td></tr>
          	<tr><td>Total Harga</td><td><?php echo $harga;?></td></tr>
          	<tr><td>Email</td><td><?php echo $email;?></td></tr>
          	<tr><td>Metode Pembayaran</td><td><?php echo $metode;?></td></tr>
		  </table>
        </div>
        <form action="auth.php" method="post"><button class="form-control p-2 mb-2" style="background: green;color: white" type="submit" name="lanjut">Lanjut</button></form>
      <form action="index.html" method="post"><button type="submit" class="form-control p-2" style="background: red;color: white">Kembali</button></form>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

