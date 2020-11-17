<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
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
    <h3> Data  Hewan Saya
   <a href='hewan_tambah.php' style="float:right;"><i class="fa fa-plus"></i> Tambah Hewan</a>
   </h3>

    <div class="main-content">
                   
    <?php 
   
    $queryPertama=mysqli_query($conn, "SELECT * FROM costumer WHERE user_id=$user_id");
    $dataSatu = mysqli_fetch_array($queryPertama);
    $costumer_id=$dataSatu['costumer_id'];
    ?>
	<table cellpadding="0" cellspacing="0">
    
    <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Umur</th>
        <th>Action</th>
    </tr>
    <?php 
      $queryKedua = mysqli_query($conn, "SELECT * FROM hewan WHERE costumer_id='$costumer_id' AND isdelete='false'");
    if(mysqli_num_rows($queryKedua)>0){ ?>
    <?php
        $no = 1;
        while($dataDua = mysqli_fetch_array($queryKedua)){
    ?>
    <tr>
    
        <td><center><?php echo $no ?></center></td>
        <td><?php echo "<img src='../asset/admin/gambar/$dataDua[foto]' width='50px' alt='hewan saya'/>";?></td>
        <td><?php echo $dataDua['nama_hewan'];?></td>
        <td><?php echo $dataDua['umur'];?> Bulan</td>
        <td>
           
            <a href="hewan_hapus.php?id=<?php echo $dataDua['hewan_id']; ?>" onclick="return confirm('Yakin Hapus?')">Hapus</a>
            <a href="hewan_edit.php?id=<?php echo $dataDua['hewan_id']; ?>">Edit</a>

        </td>
    </tr>
    <?php $no++; } ?>
    <?php }else{?>
        <td colspan="4"><center>Tidak ada data hewan</center></td>
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