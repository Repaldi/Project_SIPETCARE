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
<style>
 #submit {
                padding: 5px 15px 5px 15px;
                margin : 1px 5px 1px 5px;
                border: 1px solid #665544;
                font-size: 20px;
                font-family: maiandra gd;
                width: 150px;
                border-radius:5px;
                background-color: #000000;
                color:white;
                float:right;}
            #submit:hover{
                background-color:#ff4731;}
</style>
<body>

<div class="fixed-navbar">
    <?php include 'navbar.php';?>
</div>

<div class="fixed-sidebar">
    <?php include 'menu.php';?>
</div>
<?php
if (isset($_POST['submit'])) :
    $toko_id = $_POST['toko_id'];
    $nama_fasilitas = $_POST['nama_fasilitas']; 
    $keterangan = $_POST['keterangan'];          
    $biaya = $_POST['biaya'];  
mysqli_query($conn, "insert into fasilitas values ('','$toko_id','$nama_fasilitas','$keterangan','$biaya')"); 
echo "<script>alert('Data Fasilitas Ditambahkan.');window.location='fasilitas.php';</script>";
endif; ?>
<div class="content">

<?php 

$user_id = $_SESSION['user_id'];

$queryAwal=mysqli_query($conn, "SELECT * FROM admin WHERE user_id=$user_id");
$dataAwal = mysqli_fetch_array($queryAwal);
$admin_id = $dataAwal['admin_id'];


$queryPertama= mysqli_query($conn, "SELECT * FROM toko WHERE admin_id=$admin_id");
$data = mysqli_fetch_array($queryPertama);
$toko_id = $data['toko_id'];
?>
    <div class="main-content">
    <div class="row">
        <div class="column">
        <h2>Tambahkan Fasilitas</h2>
        <form method="post" action="">
                <input type="hidden"  name="toko_id" value="<?php echo $toko_id;?>" >

                <label for="nama_fasilitas"><i class="fa fa-user"></i> Nama Fasilitas</label>
                <input type="text"  name="nama_fasilitas" placeholder="Nama Fasilitas" required >

                <label for="biaya"><i class="fa fa-user"></i> Biaya (Per Hari)</label>
                <input type="text"  name="biaya" placeholder="Rp. 20000" required>
              
                <label for="keterangan"><i class="fa fa-comment-o"></i> Keterangan</label>
                <textarea name="keterangan" place rows="5" cols="48" required></textarea>

                <input id="submit" type="submit" name="submit" value="Kirim"/> 
            
        </div>
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