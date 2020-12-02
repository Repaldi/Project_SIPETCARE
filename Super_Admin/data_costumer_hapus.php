<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn,"DELETE FROM costumer WHERE costumer_id='$id'");
if ($query)
{
    echo "<script>alert('Data berhasil dihapus.');window.location='data_costumer.php';</script>";
}
else
{

    echo "<script>alert('Data Gagal  dihapus.');window.location='data_costumer.php';</script>";
}
?>
