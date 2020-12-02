<?php
include '../../koneksi.php';
$id = $_POST['id'];
$fasilitas=$_POST['nama'];
$biaya=$_POST['biaya'];
$update = mysqli_query($conn,"UPDATE fasilitas SET nama_fasilitas= '$fasilitas', biaya= '$biaya' WHERE fasilitas_id='$id'");
if ($update)
{
    echo "<script>alert('Data berhasil di update.');window.location='fasilitas.php';</script>";
}
else
{

    echo "<script>alert('Data Gagal  di update.');window.location='fasilitas.php';</script>";
}

?>


