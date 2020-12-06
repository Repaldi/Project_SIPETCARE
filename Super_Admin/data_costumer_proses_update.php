



<?php
include '../koneksi.php';
// menangkap data id yang di kirim dari url
$id = $_POST['costumer_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];


// menghapus data tidak permanen dari database
$query  = "UPDATE user, costumer SET user.email='$email', user.username='$username', costumer.nama_lengkap='$nama_lengkap'
WHERE user.user_id=costumer.user_id AND costumer.costumer_id= $id";
$result = mysqli_query($conn, $query);
// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
} else {
    //untuk nampilin alert dan  redirect ke halaman hewan.php
    echo "<script>alert('Data berhasil diubah.');window.location='data_costumer.php';</script>";
}

?>