<?php 
require 'functions_dok.php';

//ambil data di url
$id = $_GET["id"];

$dokumen = query("SELECT * FROM data WHERE id = $id")[0];

if(isset($_POST["submit"])) {

    //cek keberhasilan ubah
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'dokumen_edit.php';
            </script>
            ";
    } else {
        echo "
        <script>
                alert('data gagal diubah!');
                document.location.href = 'dokumen_edit.php';
            </script>
            ";
    }
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="webthemez">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ubah Data</title>
<link rel="icon" href="http://luk.staff.ugm.ac.id/logo/UGM/Resmi/Warna.gif" type="image/x-icon">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/edit.css">
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
       <li><a href="dokumen_edit.php">Dokumen Admin</a></li>
          </ul>
        </nav>
        <a href="#" class="nav-toggle">Menu<span></span></a> </div>
    </header>
    <!-- banner text --> 

<section id="detailsPage">
  <div class="container"> 
  
    <div class="row">  
	<div class="section-header">
                <h2 class="wow fadeInDown animated">Ubah Data</h2>
            </div>
              
</div> 
</div>
</section>
<div class="edit">      
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $dokumen["id"]; ?>">
    <input type="hidden" name="fileLama" value="<?= $dokumen["data"]; ?>">
    <ul>
        <li>
            <label for="urai">Uraian : </label>
            <input type="text" name="urai" id="urai" required
            value="<?= $dokumen["uraian"]; ?>">
        </li>
        <li>
            <label for="file">File : </label>
            <input value="<?= $dokumen["data"]; ?>">
            <input type="file" name="file" id="file">
        </li>
        <li>
            <input id="submit-btn" type="submit" name="submit" value="Ubah Data">
        </li>
    </ul>
</div>          

<!-- JS FILES --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flexslider-min.js"></script> 
<script src="js/jquery.fancybox.pack.js"></script> 
<script src="js/retina.min.js"></script> 
<script src="js/modernizr.js"></script> 
<script src="js/main.js"></script> 
<script type="text/javascript" src="js/jquery.contact.js"></script> 
</body>
</html>
