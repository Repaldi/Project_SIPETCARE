
<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en" >
 
<head>
 
  <meta charset="UTF-8">
  <title>Cetak Struk</title>
 
<style>
@media print {
    .page-break { display: block; page-break-before: always; }
}
      #invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 200mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: 1.5em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: 1em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 10px;
}
#invoice-POS #mid {
  min-height: 80px;
  display:flex;
}
#invoice-POS #bot {
  min-height: 50px;
}

#invoice-POS .info {
  display: block;
  margin-left: 2px;
  margin-bottom : 10px;
}

#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .6em;
  background: #EEE;
}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 100mm;
}
#invoice-POS .itemtext {
  font-size: 1em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
}
 
    </style>
 
  <script>
  window.console = window.console || function(t) {};
</script>
 
 
 
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
 
 
</head>
 
<body translate="no" >

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
//    Query Admin
   $queryPertama=mysqli_query($conn, "SELECT * FROM admin WHERE user_id=$user_id");
   $dataSatu = mysqli_fetch_array($queryPertama);
   $admin_id=$dataSatu['admin_id'];

//    Query Toko
   $query=mysqli_query($conn, "SELECT * FROM toko WHERE admin_id=$admin_id");
   $datatoko= mysqli_fetch_array($query);
   $toko_id=$datatoko['toko_id'];

   ?>
 
  <div id="invoice-POS">
 
    <center id="top">
      <div class="info"> 
        <h2><?php echo $datatoko['nama_toko']?></h2>
        Alamat : <?php echo $datatoko['alamat_toko'];?> <br/> Email : <?php echo $email ?> | tlp : <?php echo $dataSatu['nomor_hp']; ?>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    <?php 

//    Query Transaksi
   $query=mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN hewan ON transaksi.hewan_id=hewan.hewan_id INNER JOIN costumer ON hewan.costumer_id = costumer.costumer_id INNER JOIN user ON costumer.user_id= user.user_id WHERE  transaksi.transaksi_id=$id AND transaksi.isdelete='false' ");
   $row= mysqli_fetch_array($query);
  
   ?>
    <div id="mid">
      <div class="info">
        <h3><?php echo $row['nama_lengkap'];?> (<?php echo $row['nomor_hp'];?>)</h3>
            Email  &nbsp; &nbsp; &nbsp; &nbsp; : <?php echo $row['email'];?>  </br>
            Alamat &nbsp; &nbsp;&nbsp; &nbsp;: <?php echo $row['alamat'];?>
    </div>
    </div><!--End Invoice Mid-->
 
    <div id="bot">
    
 
                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <td class="item"><h2>Nama Hewan</h2></td>
                                <td class="Hours"><h2>Durasi ( x Biaya)</h2></td>
                                <td class="Rate"><h2>Sub Total</h2></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext"><?php echo  $row['nama_hewan'];?></p></td>
                                <td class="tableitem"><p class="itemtext"><?php echo  $row['lama_penitipan'];?> ( x <?php echo  $row['biaya_perhari'];?>)</p></td>
                                <td class="tableitem"><p class="itemtext"><?php echo  $row['sub_total'];?></p></td>
                            </tr>
 
                       
                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Total</h2></td>
                                <td class="payment"><h2>Rp. <?php echo  $row['sub_total'];?></h2></td>
                            </tr>
                            <tr class="service">
                                <td></td>
                                <td class="Rate"><h5>Bayar</h5></td>
                                <td class="payment"><h5>Rp. <?php echo  $row['bayar'];?></h5></td>
                            </tr>
                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Kambali</h2></td>
                                <td class="payment"><h2>Rp. <?php echo  $row['kembalian'];?></h2></td>
                            </tr>
                            
 
                        </table>
                    </div><!--End Table-->
 
                    <div id="legalcopy">
                        <p class="legal" ><center><strong>Terimakasih Telah Mempercayai Kami!</strong> </center>
                        </p>
                    </div>
 
                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
  <script>
window.print();
</script>
</body>
 
</html>

<?php
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>