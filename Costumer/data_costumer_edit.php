<?php
session_start();

include '../koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['username']))
	{
    header("location:index.php?pesan=gagal");
}

// Memanggil tabel user lalu di join ke dengan tabe costumer
$user_id = $_SESSION['id'];
$query=mysqli_query($conn, "SELECT * FROM user INNER JOIN costumer ON  user.id= costumer.user_id ");
$data = mysqli_fetch_assoc($query);

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
<br/>
    <div class="row">
        <div class="column">
        <h2>Profil Saya</h2>

                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" id="username" name="username" placeholder="<?php echo $data['username'];?>" Readonly>
                
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="<?php echo $data['email'];?>" Readonly>
         
                <label for="nama_lengkap"><i class="fa fa-user"></i> Nama Lengkap</label>
                <input type="text" id="nama_lengkap" placeholder="<?php echo $data['nama_lengkap'];?>" Readonly>

                <label for="jenis_kelamin"><i class="fa fa-venus-mars"></i> Jenis Kelamin</label>
                <input type="text" id="jenis_kelamin" name="jenis_kelamin" placeholder="<?php echo $data['jenis_kelamin'];?>" Readonly>
            
        </div>
           
          
        <div class="column">
        <h2><span style="color:white;">Manipulasi text</span></h2>

            <label for="alamat"><i class="fa fa-address-card-o"></i> Alamat</label>
            <input type="text" id="alamat" name="alamat" placeholder="<?php echo $data['alamat'];?>" Readonly>
            
            <label for="nomor_hp"><i class="fa fa-telegram"></i> Nomor HP</label>
            <input type="text" id="nomor_hp" name="nomor_hp" placeholder="<?php echo $data['nomor_hp'];?>" Readonly>
            
            <div class="card">
                <img src="../asset/admin/gambar/maula.jpeg" alt="Foto Profil" width="100%" >
            </div>
        </div>
        <input type="submit" value="Edit Profil" class="btn">
    </div>

</div>   
</body>
</html>