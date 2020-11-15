<?php
session_start();
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $email      = $_POST['email'];
  $username   = $_POST['username'];
  $password   = $_POST['password'];
  $level      = $_POST['level'];

  $query = "INSERT INTO  user (user_id, email, username, password, level) VALUES ('','$email', '$username', '$password', '$level')";
  $result = mysqli_query($conn, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($conn).
            " - ".mysqli_error($conn));
  } else {
    //untuk nampilin alert dan  redirect ke halaman hewan.php
    echo "<script>alert('Data admin akan tampil jika admin telah melengkapi datanya.');window.location='data_admin.php';</script>";
  }

 
?>