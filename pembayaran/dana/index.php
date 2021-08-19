<?php

session_start();
$harga = $_SESSION["txtDisplay"];

?>

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
	padding: 7px;
	color: white;
	text-align: center;
}
table, th tr, td {
    border: 1px solid #999;
    padding: 10px 20px;
}
</style>
    <title>Pembayaran Dana</title>
  </head>
  <body style="background: aqua;">
  <div class="container justify-content-center">
    <div class="shadow p-4 m-3 rounded" style="background: white;border-radius: 10px;">
      <center><img src="https://1000logos.net/wp-content/uploads/2021/03/Dana-logo.png" height="100" width="140" class="mb-2"><br><h1 class="mb-3">DANA PAYMENT</h1></center>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
    	<div class="shadow p-4 m-3 rounded" style="background: white;border-radius: 10px;">
    		<div class="mb-3">
    			<div class="alert alert-success text-justify p-2" style="background: none; color: blue;border: 1px solid black;" role="alert">
           		 Silahkan untuk membayar produk ke rekening yang tertera dibawah, sesuai nominal harga yang sudah ditentukan.
       		 </div>
    		</div>
       	 <div class="input-group mb-2" align="center">
  	  		<span class="input-group-text" id="basic-addon1" style="background: blue;color:white;border:1px solid black;">DANA</span>
   		 	<input type="text" class="form-control p-1 text-center" style="border:1px solid black;" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="085723540943" disabled>
			</div>
			<div class="input-group" align="center">
  	  		<span class="input-group-text" id="basic-addon1" style="background: purple;color:white;border:1px solid black;">TOTAL HARGA</span>
   		 	<input type="text" class="form-control p-1 text-center" style="border:1px solid black;" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $harga;?>" disabled>
			</div>
		</div>
    	<div class="mb-3" align="center">
    		<div class="alert alert-success text-center" style="background: green; color: white;border: 1px solid white;" role="alert">
           	 Silahkan upload bukti pembayaran.
       	 </div>
        </div>
    	<div class="mb-3" align="center">
        	<input class="form-control" name="images" type="file"/>
		</div>
		<div class="mb-3" align="center">
			<button class="btn btn p-2" style="background: blue;color: white;" name="submit" type="submit">Upload Bukti</button>
		</div>
	</form>
      <?php
        error_reporting(0);
        if (!mkdir("uploads") === 1){
          return true;
        }
        if(isset($_POST["submit"])){
          $source = $_FILES["images"];
          $name = $source["name"];
          $type = $source["type"];
          $TmpName = $source["tmp_name"];
          $error = $source["error"];
          
          // Jika Error = int(4)
          function chek(){
            global $source, $name, $type, $TmpName, $error;
            if($error === 4){
              return '
              <script>
                alert("Pilih Gambar Yang Ingin Anda Upload");
              </script>
              ';
            }
			else {
              $extensi = ["jpg", "png", "jpeg"];
              $ex = explode(".", $name);
              $ex = strtolower(end($ex));
              if ( !in_array($ex, $extensi) ){
                return '
                  <script>
                    alert("Hanya format gambar yang bisa di upload");
                  </script>
                ';
              }
			  else {
                $namenew = uniqid();
                $namenew .= ".";
                $namenew .= $ex;
                
                // sesi
                session_start();
                $produk = $_SESSION["barang"];
                $pesanan = $_SESSION["jmlpsn"];
                $harga = $_SESSION["txtDisplay"];
                $metode = $_SESSION["pilih"];
                $email = $_SESSION["email"];

                // upload
                $ssl = "https://";
                $web = $_SERVER["HTTP_HOST"];
                $main = $ssl.$web."/pay/pembayaran/dana/uploads/".$namenew;
                move_uploaded_file($TmpName, "uploads/".$namenew);
                return '
                    <div class="mb-0 justify-content-center">
                      <form action="bukti.php" method="post">
                        <input type="hidden" value="'.$main.'" id="getText" name="bukti">
                        <input type="hidden" name="a" value="'.$produk.'">
                        <input type="hidden" name="b" value="'.$pesanan.'">
                        <input type="hidden" name="c" value="'.$harga.'">
                        <input type="hidden" name="d" value="'.$metode.'">
                        <input type="hidden" name="e" value="'.$email.'">
                        <div class="shadow p-4 mb-3 rounded" style="background: white;border-radius: 10px;">
                        <div class="mb-4" align="center">
                        <p align="center" class="mb-2">Preview Bukti Pembayaran</p>
                        <img src="uploads/'.$namenew.'" alt="result" width="230" height="400"/>
                        </div>
                        <div class="mb-3" align="center">
                        <button type="submit" class="btn btn-success">Kirim Bukti</button>
                        </div>
                        </div>
					  </form>
                    </div>
                ';
              }
            }
          }
          
          echo chek();
          // generate name files
        }
      ?>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
