<?php
include '../koneksi.php';
$id = $_POST['id'];
$email=$_POST['email'];
$username=$_POST['username'];
$password =$_POST['password'];
$level=$_POST['level'];
$update = mysqli_query($conn,"UPDATE user SET email= '$email', username= '$username',password='$password', level='$level' WHERE user_id ='$id'");
if ($update)
{
    echo "<script>alert('Data berhasil di update.');window.location='data_user.php';</script>";
}
else
{

    echo "<script>alert('Data Gagal  di update.');window.location='data_user.php';</script>";
}

?>


