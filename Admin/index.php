<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
    include '../koneksi.php';
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];
    ?>

    <html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
    </head>

    <body>


    <!-- Navbar -->
    <div class="fixed-navbar">
        <?php include 'navbar.php';?>
    </div>

    <!-- Menu -->
    <div class="fixed-sidebar">
        <?php include 'menu.php';?>
    </div>

    <!-- Konten -->
    <div class="content">
        <div class="main-content">
            <h2> <?php echo "Selamat Datang " .strtoupper($username); ?></h2><br/>  <?php echo "Anda login sebagai " .strtoupper($level); ?>
            <p>SIPETCARE adalah aplikasi yang siap membantu anda</p>



        </div>
        <div class="slideshow-container" style="width: 90%; box-sizing: border-box;">
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <div class="mySlides fade">
                <div class="numbertext">1 / 2</div>
                <img src="../asset/admin/gambar/admin%20(1).png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 2</div>
                <img src="../asset/admin/gambar/admin2.png" style="width:100%">


                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
            <div  style="background-color: #222831; height: 7%; color: white; border-radius: 5px; font-size: 15px;" class="footer"><p style="margin-left:300px; margin-bottom: -30px;">Copyright © 2020 Sipetcare. All Rights Reserved
                </p></div>
        </div>

    </body>


    </html>

    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>
