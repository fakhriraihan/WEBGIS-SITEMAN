<?php
require 'functions_dok.php';
$data = query("SELECT * FROM data");

//tombol cari ditekan
if(isset($_POST["cari"])){
  $data = cari($_POST["keyword"]);
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="webthemez">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dokumen Admin</title>
<link rel="icon" href="http://luk.staff.ugm.ac.id/logo/UGM/Resmi/Warna.gif" type="image/x-icon">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/dokumen.css">
<link rel="stylesheet" type="text/css" href="css/style4.css" />
<link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css">
</head>

<body>
  <section class="banner" role="banner" id="home">
    <header id="header" class="fix-hed"> 
    <div class="header-content clearfix"> <a href="#contact"><img src="Database/Nonspatial/Icon/logo.png" width="100px" height="30px" alt="Logo"></a>
        <nav class="navigation" role="navigation">
          <ul class="primary-nav">
       <li><a href="index2.php">Beranda</a></li>
          </ul>
        </nav>
        <a href="#" class="nav-toggle">Menu<span></span></a> </div>
    </header>
    <!-- banner text --> 

<section id="detailsPage">
  <div class="container"> 
  
    <div class="row">  
	<div class="section-header">
                <h2 class="wow fadeInDown animated">Informasi Faskes Edit</h2>

            </div>
              
</div> 
</div>
</section>

<div class="container">
<div class="section-header">
<div class="row">
<a href="tambah_dok.php" class="morebtn">Tambah data dokumen</a>
<br><br>

<form action="" method="post">
  <input type="text" name="keyword" size="50" autofocus 
  placeholder="Cari..." autocomplete="off">
  <button type="submit" name="cari">Cari</button>
</form>
<br>


<table border="1" width="85%" cellpadding="12" cellspacing="0" style="margin-left:auto;margin-right:auto">
  <thead>
      <tr>
          <th>No.</th>
          <th>Uraian</th>
          <th>Aksi</th>
      </tr>
  </thead>

  <tbody>
  <?php $i = 1; ?>
  <?php foreach ($data as $row) : ?>
      <tr>
        <td align="center"><?= $i ?></td>
        <td><?= $row["uraian"]; ?></td>
        <td align="center">
          <a href="database-dok/<?= $row["data"]; ?>"><button>Lihat</button></a> 
          <a href="ubah_dok.php?id=<?= $row["id"]; ?>"><button>Ubah</button></a> 
          <a href="hapus_dok.php?id=<?= $row["id"]; ?>" onclick="
          return confirm('yakin hapus?');"><button>Hapus</button></a> 
        </td>
      </tr>
  <?php $i++ ?>
  <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
</div>

<!-- footer --> 
<footer id="contact">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="widget">
					<h5 class="widgetheading"><a href="index.html"><img src="Database/Nonspatial/Icon/logo.png" width="100px" height="30px" alt="logo"></a></h5>
					<address><br>
					<strong>Portal Informasi Fasilitas Kesehatan Kabupaten Sleman Berbasis WebGIS</strong><br>
				</address>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="widget">
				</div>
			</div>
      <div class="col-sm-3">
				<div class="widget">
					<h5 class="widgetheading">Tentang Kami</h5>
          <ul class="link-list"><br>
          <li><p>  <strong>D4 Sistem Informasi Geografis UGM</strong></p></li>
          <li><p> Alamat: Gedung SV UGM, Sekip Unit 1, Jl. Persatuan, Blimbing Sari, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p></li>
          <li><p> Telp: (027)4541020</p></li>
        </ul>
				</div>
			</div>
	</div>
  <div class="footer_bottom"><span>make with love by Fakhri Raihan </span> 
  </div>
	</footer>

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
</body>
</html>
