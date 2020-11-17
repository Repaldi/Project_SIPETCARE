
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

        
<?php 
// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);
    // menampilkan data dari database yang mempunyai id=$user_id
    $query = "SELECT * FROM toko WHERE toko_id='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='jasa_penitipan.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke hewan.php
    echo "<script>alert('Masukkan data id.');window.location='jasa_penitipan.php';</script>";
  } 
?>

<div class="main-content">

<h2><?php echo $data['nama_toko'];?> <a href='titipkan_hewan.php' style="float:right;"><i class="fa fa-plus"></i> Titipkan Hewan</a> </h2>
<p>yuk titipkan hewan peliharaan sekarang juga!</p>

<?php if(empty($data['foto_toko'])){ ?>

    <img src="../asset/admin/gambar/toko.png" width="100%">

<?php }else{ ?>

<?php echo "<img src='../asset/admin/gambar/$data[foto_toko]' width='200px alt='Avatar'/>";?>


<?php }?>

<p><b>Deskripsi Toko :</b></p>
<p><?php echo $data['deskripsi_toko'];?> </p>
<p><b>Alamat Toko :</b></p>
<p><?php echo $data['alamat_toko'];?> </p>
<p><b>Kontak :</b></p>
<p>- </p>

</div>
</div>

</body>
</html>

<?php
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>