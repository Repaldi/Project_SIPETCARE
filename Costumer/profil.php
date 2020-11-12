<?php 
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
?>

<html>
<head>
    <title>.::SIPETCARE::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
</head>
<body>

<div class="fixed-navbar">
    <?php include 'navbar.php';?>
</div>

<div class="fixed-sidebar">
    <?php include 'menu.php';?>
</div>

<div class="content">

    <div class="main-content">
        <?php
          
            $user_id = $_SESSION['id'];
            $query= mysqli_query($conn, "SELECT * FROM user WHERE id= $user_id ");
            $data = mysqli_fetch_array($query);
        ?>    
   
    <div class="row">
        <div class="column">
        <h2>Profil Saya</h2>

                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text"  name="username" placeholder="<?php echo $data['username'];?>" Readonly>
                
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" name="email" placeholder="<?php echo $data['email'];?>" Readonly>
         
                <label for="nama_lengkap"><i class="fa fa-user"></i> Nama Lengkap</label>
                <input type="text" name="nama_lengkap" Readonly>

                <label for="jenis_kelamin"><i class="fa fa-venus-mars"></i> Jenis Kelamin</label>
                <input type="text"  name="jenis_kelamin" Readonly>
            
        </div>
           
          
        <div class="column">
        <h2><span style="color:white;">Manipulasi text</span></h2>

            <label for="alamat"><i class="fa fa-address-card-o"></i> Alamat</label>
            <input type="text"  name="alamat"  Readonly>
            
            <label for="nomor_hp"><i class="fa fa-telegram"></i> Nomor HP</label>
            <input type="text"  name="nomor_hp" Readonly>
            
            <div class="card">
                <img src="../asset/admin/gambar/maula.jpeg" alt="Foto Profil" width="100%" >
            </div>
        </div>
        <input type="submit" value="Edit Profil" class="btn">
    </div>
  

    
</div>
</div>

</body>
</html>

<?php 
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>