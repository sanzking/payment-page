<?php

session_start();
$produk = $_SESSION["barang"];
$pesanan = $_SESSION["jmlpsn"];
$harga = $_SESSION["txtDisplay"];
$metode = $_SESSION["pilih"];
$email = $_SESSION["email"];

if($metode=="DANA"){
	session_start();
	$produk = $_SESSION["barang"];
	$pesanan = $_SESSION["jmlpsn"];
	$harga = $_SESSION["txtDisplay"];
	$metode = $_SESSION["pilih"];
	$email = $_SESSION["email"];
	$_SESSION['pilih'] = $metode;
	$_SESSION['txtDisplay'] = $harga;
	$_SESSION['barang'] = $produk;
	$_SESSION['jmlpsn'] = $pesanan;
	$_SESSION['email'] = $email;
	header("location: pembayaran/dana/index.php");
}
elseif($metode=="OVO"){
	session_start();
	$$produk = $_SESSION["barang"];
	$pesanan = $_SESSION["jmlpsn"];
	$harga = $_SESSION["txtDisplay"];
	$metode = $_SESSION["pilih"];
	$email = $_SESSION["email"];
	$_SESSION['pilih'] = $metode;
	$_SESSION['txtDisplay'] = $harga;
	$_SESSION['barang'] = $produk;
	$_SESSION['jmlpsn'] = $pesanan;
	$_SESSION['email'] = $email;
	header("location: pembayaran/ovo/index.php");
}
elseif($metode=="GOPAY"){
	session_start();
	$produk = $_SESSION["barang"];
	$pesanan = $_SESSION["jmlpsn"];
	$harga = $_SESSION["txtDisplay"];
	$metode = $_SESSION["pilih"];
	$email = $_SESSION["email"];
	$_SESSION['pilih'] = $metode;
	$_SESSION['txtDisplay'] = $harga;
	$_SESSION['barang'] = $produk;
	$_SESSION['jmlpsn'] = $pesanan;
	$_SESSION['email'] = $email;
	header("location: pembayaran/gopay/index.php");
}
elseif($metode=="LINKAJA"){
	session_start();
	$produk = $_SESSION["barang"];
	$pesanan = $_SESSION["jmlpsn"];
	$harga = $_SESSION["txtDisplay"];
	$metode = $_SESSION["pilih"];
	$email = $_SESSION["email"];
	$_SESSION['pilih'] = $metode;
	$_SESSION['txtDisplay'] = $harga;
	$_SESSION['barang'] = $produk;
	$_SESSION['jmlpsn'] = $pesanan;
	$_SESSION['email'] = $email;
	header("location: pembayaran/linkaja/index.php");
}
else{
	echo "SOMETHING WRONG";
}