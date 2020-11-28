<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
    include '../koneksi.php';
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    ?>

    <html>
    <head>
        <title>.::SIPETCARE::.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
    </head>
    <body>

    <div class="fixed-navbar">
        <?php include 'navbar.php';?>
    </div>

    <div class="fixed-sidebar">
        <?php include 'menu.php';?>
    </div>

    <div class="content">
        <div class="main-content">
            

    </body>
    </html>

    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>
