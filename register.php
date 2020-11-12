<?php
require_once("koneksi.php");
$database = new database();
if(isset($_POST['register']))
{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    if($database->register($email,$username,$password,$level))
    {
      header('location:login.php');
    }
}
 
?>
<html>
<head>
    <link rel="stylesheet" href="asset/admin/sidebar.css">
</head>

<body style="font-family: sans-serif;background: #d5f0f3;">

<div class="kotak_login">
    <p style="margin-left: 80px;"> Silahkan Daftar Costumer</p>

    <form action=""  method="post">

        <label>Username</label>
        <input type="text" name="username" class="form_login" placeholder="username">

        <label>Email</label>
        <input type="email" name="email" class="form_login" placeholder="email">

        <label>password</label>
        <input type="password" name="password" class="form_login" placeholder="password ..">
        <input type="hidden" name="level" class="form_login" value="costumer">

        <input type="submit" name="register" class="tombol_login" value="DAFTAR">

    </form>

</div>
</body>
</html>