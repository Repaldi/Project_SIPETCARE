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

            $query = mysqli_query($conn,"SELECT user_id,email,password FROM user WHERE user_id='$user_id' AND  email ='$email' AND password ='$passwordlama'");
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
            <h2>Edit Password</h2>
            <form class="form-style-9" method="post"  onsubmit="return valid();">
                <ul>
                    <li>
                        <label for="username"><i class="fa fa-envelope"></i>Email</label>
                        <input type="text" name="email" class="field-style field-full align-none" placeholder="Email" />
                    </li>
                    <li>
                        <label for="username"><i class="fa fa-cogs"></i>pasword lama</label>
                        <input type="password" id="myInput" name="passwordlama" class="field-style field-full align-none" placeholder="password lama" />
                    </li>
                    <li>
                        <label for="username"><i class="fa fa-edit"></i>password baru</label>
                        <input type="password" id="myInput1" name="passwordbaru" class="field-style field-full align-none" placeholder="password baru" />
                    </li>
                    <li>
                        <label for="username"><i class="fa fa-edit"></i>Konfirmasi Password</label>
                        <input type="password" id="myInput2" name="konfirmasipassword" class="field-style field-full align-none" placeholder="konfirmasi pasword" />
                    </li>
                    <li>
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </li>
                    <li>
                        <input name="submit" type="submit" value="Ubah Sandi" />
                    </li>
                </ul>
            </form>
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
