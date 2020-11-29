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
if (isset($_POST['submit'])) :
    $hewan_id = $_POST['hewan_id'];
    $costumer_id = $_POST['costumer_id'];
    $toko_id = $_POST['toko_id']; 
    $fasilitas_id = $_POST['fasilitas_id']; 
    $alamat = $_POST['alamat'];    
    $keterangan = $_POST['keterangan'];          
    $biaya_perhari = $_POST['biaya'];  
    $sub_total = $_POST['sub_total'];  
    $metode_pembayaran = $_POST['metode_pembayaran']; 
    $status = $_POST['status'];  
    $isdelete = $_POST['isdelete'];  
 

mysqli_query($conn, "insert into transaksi values ('','$hewan_id','$costumer_id','$toko_id','$fasilitas_id',NOW(),'$alamat','$keterangan','$biaya_perhari','$sub_total','$metode_pembayaran',NULL,NULL,NULL,'$status','$isdelete')"); 
echo "<script>alert('Data Penitipan Ditambahkan.');window.location='titipkan_hewan.php';</script>";
endif; ?>

<?php 
$query= mysqli_query($conn, "SELECT * FROM costumer WHERE user_id = $user_id");
$data = mysqli_fetch_array($query);
$costumer_id=$data['costumer_id'];
?>

<div class="content">
<div class="main-content">
<div class="row">
        <div class="column">
        <h2>Silahkan isi form berikut : </h2>
        <form method="post" action="" >
                <input type="hidden" name="costumer_id" value="<?php echo $costumer_id; ?>" >
                <input type="hidden" name="isdelete" value=0>
                <input type="hidden" name="status" value=0>

                <label for="nama_hewan"><i class="fa fa-bug"></i> Pilih Hewan Peliharaan</label>
                <select class="hewan" name="hewan_id">
                    <option disabled selected> Pilih Hewan</option>
                    <?php 
                        $sql=mysqli_query($conn, "SELECT * FROM hewan WHERE costumer_id='$costumer_id'");
                        while ($datahewan=mysqli_fetch_array($sql)) {
                    ?>
                        <option value="<?=$datahewan['hewan_id']?>"><?=$datahewan['nama_hewan']?></option> 
                    <?php
                         }
                    ?>
                </select>

                <label for="toko"><i class="fa fa-bug"></i> Pilih Toko</label>
                <select name="toko_id" id="toko_id">
                    <option disabled selected> Pilih Toko </option>
                    <?php 
                        $sqltoko=mysqli_query($conn, "SELECT * FROM toko");
                        while ($datatoko=mysqli_fetch_array($sqltoko)) {
                    ?>
                        <option value="<?=$datatoko['toko_id']?>"><?=$datatoko['nama_toko']?></option> 
                    <?php
                         }
                    ?>
  
                </select>
                
                <label for="alamat"><i class="fa fa-paw"></i> Alamat </label>
                <input type="text" name="alamat" >

                <label for="keterangan"><i class="fa fa-comment-o "></i> Catatan </label>
                <textarea name="keterangan" place rows="4" cols="48"></textarea>
            
        </div>
           
      
        <div class="column">
       
        <label for="fasilitas"><i class="fa fa-bug"></i> Pilih Fasilitas</label>
                <select name="fasilitas_id" id="fasilitas_id">           
                <option disabled selected> Pilih Fasilitas </option>         
                        <!-- ini pake ajax -->
                </select>

                <label for="biaya"><i class="fa fa-bug"></i> Biaya/hari </label>
                <select name="biaya" id="biaya">  
                <option disabled selected> Otomatis Terisi </option>                    
                        <!-- ini pake ajax -->
                </select>

                <!-- <label for="biaya"><i class="fa fa-bug"></i> Biaya per hari</label>
                <input type="text" name="biaya" id="biaya"> -->

                <label for="lama_penitipan"><i class="fa fa-cog"></i> Lama Penitipan </label>
                <input type="text" name="lama_penitipan" id="lama_penitipan" min="1" max="" placeholder="Masukkan angka saja. Mis. 2">

                <label for="sub_total"><i class="fa fa-bug"></i> Sub total</label>
                <input type="text" id="sub_total" name="sub_total" Placeholder="Otomatis Terisi" readOnly>

                <label for="metode"><i class="fa fa-bug"></i> Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran">
                    <option disabled selected> Pilih Metode Pembayaran</option>
                    <option value="langsung"> Langsung</option> 
                    <option value="Transfer"> Transfer</option> 
                  
                </select>
                <input id="submit" type="submit" name="submit" value="Kirim"/> 
                </div>
         </form>
    </div>

                <!-- <label for="nama_hewan"><b>Bank Account</b></label>
                <label for="nama_hewan"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Mandiri  </label>
                <label  for="nama_hewan"><i class="fa fa-caret-right" aria-hidden="true"></i> 0012-2913-131-31</label>
                <label for="nama_hewan"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> BRI  </label>
                <label  for="nama_hewan"><i class="fa fa-caret-right" aria-hidden="true"></i> 0012-2913-131-31</label>
                <label for="nama_hewan"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> BNI  </label>
                <label  for="nama_hewan"><i class="fa fa-caret-right" aria-hidden="true"></i> 0012-2913-131-31</label> -->
               
                <script>

$("#toko_id").change(function(){
            // variabel dari nilai combo box kendaraan
            var toko_id = $("#toko_id").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil-data.php",
                data: "toko_id="+toko_id,
                success: function(data){
                   $("#fasilitas_id").html(data);
                }
            });
        });

$("#fasilitas_id").change(function(){
            // variabel dari nilai combo box kendaraan
            var fasilitas_id = $("#fasilitas_id").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil-data.php",
                data: "fasilitas_id="+fasilitas_id,
                success: function(data){
                   $("#biaya").html(data);
                }
            });
        });

</script>

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#lama_penitipan, #biaya").keyup(function() {
            var lama_penitipan  = $("#lama_penitipan").val();
            var biaya          = $("#biaya").val();

            var sub_total = parseInt(lama_penitipan) * parseInt(biaya);
            $("#sub_total").val(sub_total);
        });
    });
</script>
        
</div>
</div>
</body>
</html>

<?php
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>

    
 