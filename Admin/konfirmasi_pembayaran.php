<?php 
include '../koneksi.php';
// mengecek apakah di url ada nilai GET id
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);
    // menampilkan data dari database yang mempunyai id=$user_id
    $query = "SELECT * FROM transaksi WHERE transaksi_id='$id'";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    $bayar = $data['sub_total'];
    $kembalian = 0;
    $status =1;

      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='profil.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke profil.php
    echo "<script>alert('Masukkan data id.');window.location='profil.php';</script>";
  } 
?>

<?php 
   $queryUpdate  = "UPDATE transaksi SET bayar = '$bayar', kembalian = '$kembalian', status = '$status'";
   $queryUpdate .= "WHERE transaksi_id = '$id'";
   $simpan = mysqli_query($conn, $queryUpdate);
                 // periska query apakah ada error
                 if(!$result){
                     die ("Query gagal dijalankan: ".mysqli_errno($conn).
                          " - ".mysqli_error($conn));
                 } else {
                   //untuk nampilin alert dan  redirect ke halaman profil.php
                   echo "<script>alert('Berhasil Dikonfirmasi.');window.location='hewan.php';</script>";
                 }
?>