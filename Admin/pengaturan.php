<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
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
        <?php
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $passwordlama =$_POST['passwordlama'];
            $passwordbaru =$_POST['passwordbaru'];
            $konfirmasipassword =$_POST['konfirmasipassword'];

            $query = mysqli_query($conn,"SELECT email,password FROM user WHERE email ='$email' AND password ='$passwordlama'");
            $num = mysqli_fetch_array($query);

            if($num>0){
                $con = mysqli_query($conn,"UPDATE user set password ='$passwordbaru' where  email ='$email'");
                echo "<script>alert('password berhasil diubah.');window.location='pengaturan.php';</script>";
            }
            else{
                echo "<script>alert('password gagal diubah.');window.location='pengaturan.php';</script>";
            }


        }

        ?>
        <div class="main-content">
            <div class="row">
                <div class="column">
                    <h2>Edit Pasword</h2>
                    <form action="" method="post"  onsubmit="return valid();">
                        <label><i class="fa fa-envelope"></i> Email</label>
                        <input type="email"  name="email">

                        <label for="username"><i class="fa fa-cogs"></i> password lama</label>
                        <input type="password"  id="myInput"   name="passwordlama">


                        <label for="username"><i class="fa fa-edit"></i>pasword baru</label>
                        <input type="password"   id="myInput1" name="passwordbaru">

                        <label for="username"><i class="fa fa-edit"></i>Konfirmasi Password</label>
                        <input type="password"   id="myInput2" name="konfirmasipassword">

                        <input type="checkbox" onclick="myFunction()">Show Password
                        <button name="submit" type="submit" value="Save Password" class="btn" <i class="fa fa-floppy-o" aria-hidden="true"> Ubah Sandi  </i>
                        </button>
                    </form>

                </div>
            </div>
    </body>
    </html>

    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text1";
        } else {
            x.type = "password";
        }

        var x = document.getElementById("myInput1");
        if (x.type === "password") {
            x.type = "text1";
        } else {
            x.type = "password";
        }
        var x = document.getElementById("myInput2");
        if (x.type === "password") {
            x.type = "text1";
        } else {
            x.type = "password";
        }
    }
</script>
