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
if(isset($_POST['submit'])) :
    $status = $_POST['status'];  
    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

    if($bukti_pembayaran != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $bukti_pembayaran); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$bukti_pembayaran; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, "../asset/admin/bukti/".$nama_gambar_baru); //memindah file gambar ke folder asset/admin/gambar   
                // jalankan query UPDATE berdasarkan ID yang admin yang mau diedit
                         $queryUpload  = "UPDATE transaksi SET bukti_pembayaran = '$nama_gambar_baru', status = '$status'";
                          $queryUpload .= "WHERE transaksi_id = '$id'";
                          $Upload = mysqli_query($conn, $queryUpload);
                        // periska query apakah ada error
                        if(!$Upload){
                            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                                 " - ".mysqli_error($conn));
                        } else {
                          echo "<script>alert('Pembayaran akan diproses oleh admin.');window.location='data_transaksi.php';</script>";
                        }
      
                } else {     
                   //kalau file ekstensi tidak jpg dan png maka alert ini ditampilkan
                      echo "<script>alert('Ekstensi gambar yang boleh hanya jpg, jpeg atau png .');window.location='data_transaksi.php';</script>";
                }
    } else {
        echo "<script>alert('Data tidak boleh kosong.');window.location='data_transaksi.php';</script>";
    }   
endif
?>


<div class="content">
<div class="main-content">
<div class="row">
        <div class="column">
        <h2>FORM PEMBAYARAN : </h2>
        <form method="post" action="" enctype="multipart/form-data" >
        <input type="hidden" name="status" value="3">
        
                <label for="sub_total"><i class="fa fa-paw"></i> Total Bayar </label>
                <input type="text" name="sub_total" id="sub_total"  value="<?php echo $data['sub_total'];?>" readOnly >

                
                <label for="bukti_pembayaran"><i class="fa fa-comment-o "></i> Upload Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" >
              

                <input id="submit" type="submit" name="submit" value="Kirim"/> 
            
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

    
 