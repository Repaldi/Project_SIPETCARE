<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
include '../../koneksi.php';
?>

<html>
<head>
    <title>.::SIPETCARE::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../asset/admin/sidebar.css" type="text/css">
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
    $id = ($_GET["id"]);
    $query = "SELECT * FROM toko WHERE toko_id='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='toko/toko.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='toko/toko.php';</script>";
  } 
?>

<?php 

$user_id = $_SESSION['user_id'];

$queryAwal=mysqli_query($conn, "SELECT * FROM admin WHERE user_id=$user_id");
$dataAwal = mysqli_fetch_array($queryAwal);
$admin_id = $dataAwal['admin_id'];


$queryPertama= mysqli_query($conn, "SELECT * FROM toko WHERE admin_id=$admin_id");
$data = mysqli_fetch_array($queryPertama);

?>
    
<div class="main-content">
    <div class="row">
        <div class="column">
        <h2>Toko Saya</h2>
        <form method="post" action="toko_proses_edit.php" enctype="multipart/form-data">
                <input type="hidden" name="toko_id" value="<?php echo $data['toko_id'];?>" >
                <input type="hidden" name="admin_id" value="<?php echo $data['admin_id']; ?>" >

                <label for="nama_lengkap"><i class="fa fa-user"></i> Pemilik</label>
                <input type="text"  name="nama_lengkap" value="<?php echo $dataAwal['nama_lengkap'];?>" ReadOnly>
         
                <label for="nama_toko"><i class="fa fa-user"></i> Nama Toko</label>
                <input type="text" name="nama_toko" value="<?php echo $data['nama_toko']; ?>">

                <label for="alamat_toko"><i class="fa fa-address-card-o"></i> Alamat Toko</label>
                <textarea name="alamat_toko" place rows="3" cols="48"><?php echo $data['alamat_toko']; ?></textarea>
              
                <label for="deskripsi_toko"><i class="fa fa-comment-o"></i> Deksripsi Toko</label>
                <textarea name="deskripsi_toko" place rows="3" cols="48"><?php echo $data['deskripsi_toko']; ?> </textarea>
                
                <button type="submit" style="float:right" class="btn" value="Simpan"><i class="fa fa-floppy-o" aria-hidden="true"> SIMPAN </i>
            
        </div>
           
          
        <div class="column">
        <h2><span style="color:white;">Manipulasi text</span></h2>
            <?php if(empty($data['foto_toko'])) {
            ?>
            <div class="card">
                <img src="../../asset/admin/gambar/toko.png" alt="Foto Toko" width="100%" >
                <input type="file" name="foto_toko" value="<?php echo $data['foto_toko'];?>">
            </div>
            <?php }else{?>
            <div class="card">
                <img src="../../asset/admin/gambar/<?php echo $data['foto_toko']?> " width="100%">
                <input type="file" name="foto_toko" value="<?php echo $data['foto_toko'];?>">
            </div>
            <?php }; ?>
           
            
        </div>
        </form>

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