<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn,"DELETE FROM user WHERE user_id = '$id'");
if ($query)
{
    echo "<script>alert('Data berhasil dihapus.');window.location='data_user.php';</script>";
}
else
{

    echo "<script>alert('Data Gagal  dihapus.');window.location='data_user.php';</script>";
}
?>
