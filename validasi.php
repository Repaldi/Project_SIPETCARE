<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
    
    $data = mysqli_fetch_assoc($login);

    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['password']=$data['password'];
    $_SESSION['level'] = $data['level'];
    $username =$_SESSION['username'] ;

    // cek jika user login sebagai admin
    if($data['level']=="superadmin"){
        
        // alihkan ke halaman dashboard admin
        header("location:Super_admin/index.php?id=$username");

        // cek jika user login sebagai pegawai
    }elseif($data['level']=="admin"){
       
        // alihkan ke halaman dashboard pegawai
        header("location:Admin/index.php?id=$username");

        // cek jika user login sebagai costumer
    }elseif($data['level']=="costumer"){

        // alihkan ke halaman dashboard costumer
        header("location:Costumer/index.php?id=$username");

    }else{
        // alihkan ke halaman login kembali
        header("location:login.php?pesan=gagal");
    }
}else{
    header("location:login.php?pesan=gagal");
}

?>