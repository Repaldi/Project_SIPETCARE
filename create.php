<?php
include 'koneksi.php';

$nama_lengkap=$_POST['nama_lengkap'];
$jenis=$_POST['jenis_kelamin'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$query= mysqli_query($conn,"INSERT INTO costumer VALUE ('','','$nama_lengkap','$jenis','$alamat','$no_hp','$no_hp')");
if($query)
{
    header("location: profil.php?berhasil");
}
else
{
    header("location: profil.php?gagal");
}
?>
