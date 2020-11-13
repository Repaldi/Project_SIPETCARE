<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
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

<?php 
$query= mysqli_query($conn, "SELECT * FROM costumer WHERE user_id = $user_id");
$data = mysqli_fetch_array($query);
if(empty($data['user_id'])) {
?>
    <div class="main-content">
    <div class="row">
        <div class="column">
        <h2>Profil Saya</h2>
        <form method="post" action="profil_proses_simpan.php" enctype="multipart/form-data">
                <input type="hidden"  name="user_id" value="<?php echo $user_id;?>" >

                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text"  name="username" value="<?php echo $username;?>" >
                
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" name="email" value="<?php echo $email;?>">
         
                <label for="nama_lengkap"><i class="fa fa-user"></i> Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" >

                <label for="jenis_kelamin"><i class="fa fa-venus-mars"></i> Jenis Kelamin</label>
                <input type="text"  name="jenis_kelamin" placeholder="Jenis Kelamin" >

                <label for="alamat"><i class="fa fa-address-card-o"></i> Alamat</label>
                <textarea name="alamat" place rows="4" cols="48"></textarea>
            
        </div>
           
          
        <div class="column">
        <h2><span style="color:white;">Manipulasi text</span></h2>

            <label for="password"><i class="fa fa-user"></i> Password</label>
            <input type="text" name="password" value="<?php echo $password;?>" >
            
            <label for="nomor_hp"><i class="fa fa-telegram"></i> Nomor HP</label>
            <input type="text"  name="nomor_hp"  placeholder="Nomor HP" >
            
            <div class="card">
                <img src="../asset/admin/gambar/maula.jpeg" alt="Foto Profil" width="100%" >
                <input type="file" name="foto" required="" />
            </div>
            <button type="submit" class="btn" value="Simpan">
        </div>
    </form>
    </div>
  <?php }else{ ?>

    <div class="main-content">
    <div class="row">
        <div class="column">
        <h2>Profil Saya</h2>

                <input type="hidden"  name="user_id" value="<?php ECHO $user_id;?>" >

                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text"  name="username" value="<?php echo $username;?>" ReadOnly>
                
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" name="email" value="<?php echo $email;?>" ReadOnly>
         
                <label for="nama_lengkap"><i class="fa fa-user"></i> Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']?>" ReadOnly>

                <label for="jenis_kelamin"><i class="fa fa-venus-mars"></i> Jenis Kelamin</label>
                <input type="text"  name="jenis_kelamin" value="<?php echo $data['jenis_kelamin']?>" ReadOnly>

                <label for="alamat"><i class="fa fa-address-card-o"></i> Alamat</label>
                <textarea name="alamat"  rows="4" cols="48" ReadOnly> <?php echo $data['alamat']?></textarea>
            
        </div>
           
          
        <div class="column">
        <h2><span style="color:white;">Manipulasi text</span></h2>

            <label for="password"><i class="fa fa-user"></i> Password</label>
            <input type="text" name="password" value="<?php echo $password;?>" ReadOnly>
            
            <label for="nomor_hp"><i class="fa fa-telegram"></i> Nomor HP</label>
            <input type="text"  name="nomor_hp"  value="<?php echo $data['nomor_hp']?>" ReadOnly>
            
            <div class="card">
                <img src="../asset/admin/gambar/<?php echo $data['foto']?>" alt="Foto Profil" width="100%" >
            </div>
            
                <a class="btn" href="profil_edit.php?id=<?php echo $data['costumer_id']; ?>">Edit Profil</a>
        
        </div>

    </div>

  <?php };?>
    
</div>
</div>

</body>
</html>

<?php
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>