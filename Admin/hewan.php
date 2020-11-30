<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
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
    <h3> Data  Hewan Titipan
   </h3>

    <div class="main-content">
                   
    <?php 
   
    $queryPertama=mysqli_query($conn, "SELECT * FROM admin WHERE user_id=$user_id");
    $dataSatu = mysqli_fetch_array($queryPertama);
    $admin_id=$dataSatu['admin_id'];
    ?>

<?php 
   
   $query=mysqli_query($conn, "SELECT * FROM toko WHERE admin_id=$admin_id");
   $datatoko= mysqli_fetch_array($query);
   $toko_id=$datatoko['toko_id'];

   ?>
	<table cellpadding="0" cellspacing="0">
    
    <tr>
        <th>Tanggal Penitipan</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Biaya</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php 
      $queryKedua = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN hewan ON transaksi.hewan_id=hewan.hewan_id  WHERE transaksi.toko_id='$toko_id' AND transaksi.isdelete='false' ");
    if(mysqli_num_rows($queryKedua)>0){ ?>
    <?php
  
        while($dataDua = mysqli_fetch_array($queryKedua)){
    ?>
    <tr>
    
        <td><?php echo $dataDua['tgl_transaksi'];?></td>
        <td><?php echo "<img src='../asset/admin/gambar/$dataDua[foto]' width='50px' alt='hewan titipan'/>";?></td>
        <td><?php echo $dataDua['nama_hewan'];?></td>
        <td>Rp. <?php echo $dataDua['sub_total'];?> </td>

        <td><?php if($dataDua['status'] == '0' AND $dataDua['metode_pembayaran']=='langsung'){?>
        <?php  echo 'Belum Bayar' ?> 
        <td>  <a href="bayar.php?id=<?php echo $dataDua['transaksi_id']; ?>">Bayar</a> </td>
        <?php } elseif($dataDua['status'] == '0' AND $dataDua['metode_pembayaran']=='Transfer') { ?>
        <?php echo 'Belum Bayar' ?>
        <td>  
           Menunggu Transfer
        </td>
        <?php } elseif($dataDua['status'] == '1') { ?>
        <?php echo 'Lunas' ?>
        <td>  
            -
        </td>
        <?php } else { ?>
        <?php echo 'Menunggu' ?> <button onClick="JavaScript:window.location.href='../asset/admin/bukti/<?php echo $dataDua['bukti_pembayaran'];?>';">Cek Bukti</a>
        <td>  
        <a href="konfirmasi_pembayaran.php?id=<?php echo $dataDua['transaksi_id']; ?>">Konfirmasi</a>
        </td>
        <?php }?>  </td>
    </tr>
    <?php  } ?>
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