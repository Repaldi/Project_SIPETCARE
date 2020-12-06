



<?php
include '../koneksi.php';
// menangkap data id yang di kirim dari url
$id = $_POST['admin_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];


// menghapus data tidak permanen dari database
$query  = "UPDATE user, admin SET user.email='$email', user.username='$username', admin.nama_lengkap='$nama_lengkap'
WHERE user.user_id=admin.user_id AND admin.admin_id= $id";
$result = mysqli_query($conn, $query);
// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
} else {
    //untuk nampilin alert dan  redirect ke halaman hewan.php
    echo "<script>alert('Data berhasil diubah.');window.location='data_admin.php';</script>";
}

?>