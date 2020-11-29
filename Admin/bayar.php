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
      <!-- Load file Jquery Secara offiline -->
    <script src="../asset/admin/jquery-3.4.1.min.js"></script>
</head>
<style>
    select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
  }
    </style>
<body>

<div class="fixed-navbar">
    <?php include 'navbar.php';?>
</div>

<div class="fixed-sidebar">
    <?php include 'menu.php';?>
</div>


<?php 
// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);
    $query = "SELECT * FROM transaksi WHERE transaksi_id='$id' ";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='hewan.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='hewan.php';</script>";
  } 
?>

<?php
if (isset($_POST['submit'])) :
    $bayar = $_POST['bayar'];  
    $kembalian = $_POST['kembalian'];  
    $status = $_POST['status'];    
 

    $queryUpdate  = "UPDATE transaksi SET bayar = '$bayar', kembalian = '$kembalian', status = '$status'";
    $queryUpdate .= "WHERE transaksi_id = '$id'";
    $simpan = mysqli_query($conn, $queryUpdate);
echo "<script>alert('Pembayaran Berhasil.');window.location='hewan.php';</script>";
endif; ?>
<div class="content">
<div class="main-content">
<div class="row">
        <div class="column">
        <h2>FORM PEMBAYARAN : </h2>
        <form method="post" action="" >
        <input type="hidden" name="status" value=1>
                <label for="sub_total"><i class="fa fa-paw"></i> Total Bayar </label>
                <input type="text" name="sub_total" id="sub_total"  value="<?php echo $data['sub_total'];?>" readOnly >

                <label for="bayar"><i class="fa fa-comment-o "></i> Uang Bayar </label>
                <input type="text" name="bayar" id="bayar" >
                
                <label for="kembalian"><i class="fa fa-comment-o "></i> Kembalian </label>
                <input type="text" name="kembalian" id="kembalian" >

                <input id="submit" type="submit" name="submit" value="Kirim"/> 
            
        </div>
           
<script type="text/javascript">
    $(document).ready(function() {
        $("#sub_total, #bayar").keyup(function() {
            var sub_total  = $("#sub_total").val();
            var bayar         = $("#bayar").val();

            var kembalian = parseInt(bayar) - parseInt(sub_total);
            $("#kembalian").val(kembalian);
        });
    });
</script> 
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

    
 