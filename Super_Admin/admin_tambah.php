<?php 
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='superadmin')){
include '../koneksi.php';
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
    <?php include "navbar.php";?>
</div>
<div class="fixed-sidebar">
    <?php include "menu.php";?>
</div>

<div class="content">
<div class="main-content">
    <div class="row">
        <div class="column">
        <h2>Tambah Admin Baru</h2>
        <?php
        $random_password=rand(1,99999999); 
        ?>
        <form method="post" action="admin_tambah_simpan.php" enctype="multipart/form-data">
                <input type="hidden" name="level" value="admin">

                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text"  name="email">
                
                <label for="username"><i class="fa fa-user-circle"></i> Username</label>
                <input type="text" name="username" >
         
                <input type="hidden" name="password" value=<?php echo $random_password?> >
            
                <button type="submit" class="btn" value="Simpan"><i class="fa fa-floppy-o" aria-hidden="true"> SIMPAN </i>

        </div>
           
    </form>
    </div>
</div>   
</body>
</html>
<?php 
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>