<?php 
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data tidak permanen dari database
$query  = "UPDATE hewan SET isdelete=1 WHERE hewan_id = '$id'";
$result = mysqli_query($conn, $query);
// periska query apakah ada error
if(!$result){
die ("Query gagal dijalankan: ".mysqli_errno($conn).
" - ".mysqli_error($conn));
} else {
//untuk nampilin alert dan  redirect ke halaman hewan.php
echo "<script>alert('Data berhasil dihapus.');window.location='hewan.php';</script>";
}

?>