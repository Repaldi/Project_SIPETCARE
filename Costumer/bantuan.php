<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$level = $_SESSION['level'];
?>

<html>
<head>
    <title>.::SIPETCARE::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
</head>
<!-- <style>

body {
 margin: 0 auto;
 max-width: 800px;
 padding: 0 20px;
}
.containerchat {border: 2px solid #dedede; background-color: #f1f1f1; border-radius: 5px; padding: 0px; margin: 10px 0;}
.gelap {border-color: #ccc; background-color: #ddd;}
.containerchat::after {content: ""; clear: both; display: table;}
.containerchat img {float: left; max-width: 60px; width: 100%; margin-right: 20px; border-radius: 50%;}
.containerchat img.m_right {float: right; margin-left: 20px; margin-right:0;}
.right {float: right; color: #575252;}
.left {float: left; color: #3b3939;}

</style> -->
<body>

<div class="fixed-navbar">
    <?php include 'navbar.php';?>
</div>

<div class="fixed-sidebar">
    <?php include 'menu.php';?>
</div>

<div class="content">
<div class="main-content">

<h2>Butuh Bantuan?</h2>
<p>Yuk pilih toko dan chat adminnya sekarang juga!</p>

<?php 
 
 $query = mysqli_query($conn, "SELECT * FROM toko");
 if(mysqli_num_rows($query) > 0){ 
    while($data = mysqli_fetch_assoc($query)){
 ?>
<div class="gallery">
  
<div class="desc"> <a href="bantuan_detail.php?id=<?php echo $data['toko_id'];?>"> <?php echo $data['nama_toko']; ?>  </a></div>
</div>
<?php 

};

} else { 
    
?>
    <div class="row">
        <div class="column">Belum ada toko </div>
    </div>
<?php 
} 
?>

 
<!-- <h2>Pilih Toko untuk Memulai Percakapan</h2>

<div class="containerchat">
  <img src="1.png">
  <p>Hallo selamat datang di kursus webmaster Dumet School. Apa kamu ingin mengambil kursus webmaster..??</p>
  <span class="right">13:00</span>
</div>

<div class="containerchat gelap">
  <img src="2.png" class="m_right">
  <p>Saya sudah mendaftar kelas untuk webmaster Ultimate, mohon segera di proses agar saya langsung bisa masuk kelas.</p>
  <span class="left">1:01</span>
</div> -->


</div>
</div>



</body>
</html>
    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>

<!-- <div  style="margin-top: 60px; margin-left: 40px; width: 100%; "  class="container">
        <form action="bantuan_tambah.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Nama</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nama" placeholder="Your name..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="email" placeholder="email..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Kendala</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="pesan" placeholder="isi kendala anda.." style="height:200px"></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div> -->