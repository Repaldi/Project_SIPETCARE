<?php
include '../koneksi.php';

$nama= $_POST['nama'];
$email = $_POST['email'];
$pesan = $_POST['pesan'];
$query = mysqli_query($conn, "INSERT INTO notifikasi_costumer VALUE ('','$nama','$email','$pesan')");
if ($query) {
    header("location: bantuan.php?berhasil");
} else {
    header("location: bantuan.php?gagal");
}

