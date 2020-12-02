<?php
include '../../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn,"DELETE FROM fasilitas WHERE fasilitas_id='$id'");
if ($query)
{
    echo "<script>alert('Data berhasil dihapus.');window.location='fasilitas.php';</script>";
}
else
{

    echo "<script>alert('Data Gagal  dihapus.');window.location='fasilitas.php';</script>";
}
?>
