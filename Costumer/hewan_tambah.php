<?php 
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
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
        
<?php 
    $query =mysqli_query($conn, "SELECT * FROM costumer WHERE user_id=$user_id");
    $data = mysqli_fetch_array($query);
    $costumer_id=$data['costumer_id'];
    ?>

<div class="main-content">
    <div class="row">
        <div class="column">
        <h2>Tambah Data Hewan</h2>
        <form method="post" action="hewan_tambah_simpan.php" enctype="multipart/form-data">
                <input type="hidden" name="costumer_id" value="<?php echo $costumer_id; ?>" >
                <input type="hidden" name="isdelete" value=0>

                <label for="nama_hewan"><i class="fa fa-bug"></i> Nama Hewan</label>
                <input type="text"  name="nama_hewan">
                
                <label for="jenis_hewan"><i class="fa fa-paw"></i> Jenis Hewan</label>
                <input type="text" name="jenis_hewan" >
         
                <label for="umur"><i class="fa fa-cog"></i> Umur (dalam bulan)</label>
               
                <input type="text" name="umur" >

                <label for="deskripsi"><i class="fa fa-comment-o "></i> Deskripsi</label>
                <textarea name="deskripsi" place rows="4" cols="48"></textarea>
            
                <button type="submit" class="btn" value="Simpan"><i class="fa fa-floppy-o" aria-hidden="true"> SIMPAN </i>
        </div>
           
      
        <div class="column">
        <h2><span style="color:white;">Manipulasi text</span></h2>
            
            <div class="card">
                <img src="../asset/admin/gambar/gambar.jpg" alt="Foto Hewan" width="100%" >
                <input type="file" name="foto">
            </div>
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