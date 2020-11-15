<?php 
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$level = $_SESSION['level'];
?>

<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
</head>

<body>

<!-- Navbar -->
<div class="fixed-navbar">
    <?php include 'navbar.php';?>
</div>

<!-- Menu -->
<div class="fixed-sidebar">
    <?php include 'menu.php';?>
</div>

<!-- Konten -->
<div class="content">
    <div class="main-content">
        <h2> <?php echo "Selamat Datang " .strtoupper($username); ?></h2><br/>  <?php echo "Anda login sebagai " .strtoupper($level); ?> 
        <p>SIPETCARE adalah aplikasi yang siap membantu anda</p>
      

    </div>        
</div>
   
</body>
</html>

<?php 
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>