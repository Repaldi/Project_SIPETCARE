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
    <link rel="stylesheet" href="../asset/admin/sidebar.css">
</head>

<body>
<div class="fixed-navbar">
    <?php include "navbar.php";?>
</div>
<div class="fixed-sidebar">
    <?php include "menu.php";?>
</div>
<div class="content">
    <h3> Data Costumer </h3>
    <div class="breadcrumb">

    <div class="main-content">
	<table cellpadding="0" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
             
    <?php 
    $query = mysqli_query($conn, "SELECT * FROM user INNER JOIN costumer ON user.user_id = costumer.user_id ");
     if(mysqli_num_rows($query)>0){ ?>
    <?php
        $no = 1;
        while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><center><?php echo $no ?></center></td>
        <td><?php echo $data["nama_lengkap"];?></td>
        <td><?php echo $data["username"];?></td>
        <td><?php echo $data["email"];?></td>
        <td>
        <a href="#">Lihat Detail</a> |  <a href="#">Hapus</a>
        </td>
    </tr>
    <?php $no++; } ?>
    <?php }else{?>
    <td colspan="4"> Belum ada costumer </td>
    <?php } ?>
    </table>
         
        </div>
    </div>
</body>
</html>
<?php
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>