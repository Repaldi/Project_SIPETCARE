<?php
session_start();

include '../koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['username']))
	{
    header("location:index.php?pesan=gagal");
}
?>
<!DOCTYPE Html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
</head>

<body>

<div class="fixed-navbar">
    <h5>Part &nbsp;<span style="color: #19B3D3">  Super Administrator
    <a style=" margin-right: 15px; border-radius :2px; color:  white;  font-size: 17px; text-decoration: none; float: right;" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
    </span> </h5>
</div>
<div class="fixed-sidebar">
    <div class="side-group">
        <img src="../asset/admin/gambar/maula.jpeg">
    </div>
    <div  class="titel-nama">
        <center>
            <h4 style="margin-top: -10px; color: white"> <?php echo strtoupper($_SESSION['username']) ?></h4>
        </center>
    </div>
    <div class="group-menu">
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="data_admin.php"><i class="fa fa-user"></i> Data Admin</a>
        <a href="data_costumer.php"><i class="fa fa-users" aria-hidden="true"></i>  Data Costumer </a>
        <a href="data_hewan.php"><i class="fa fa-bug"></i> Data Hewan</a>

    </div>
</div>
<div class="content">
<br/>
    <h5> <?php echo "Selamat Datang " .strtoupper($_SESSION['username']) ?></h5>
    <div class="breadcrumb">

        <div class="main-content">
            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet</p>
        </div>
    </div>
    
    <div class="status">
        <?php echo "Anda login sebagai " .strtoupper($_SESSION['level']) ?>
    </div>
   
  
</div>
   
</body>
</html>