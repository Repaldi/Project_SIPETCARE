<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
    include '../koneksi.php';
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

            <h2>Jasa Penitipan Hewan <a href='titipkan_hewan.php' style="float:right;"><i class="fa fa-plus"></i> Titipkan Hewan</a> </h2>
            <p>yuk titipkan hewan peliharaan sekarang juga!</p>

            <?php

            $query = mysqli_query($conn, "SELECT * FROM toko");
            if(mysqli_num_rows($query) > 0){
                while($data = mysqli_fetch_assoc($query)){
                    ?>
                    <div class="gallery">
                        <?php if(empty($data['foto_toko'])){
                            ?>
                            <img src="../asset/admin/gambar/toko.png" width="100%">
                        <?php }else {?>
                            <a target="_blank" href="../asset/admin/gambar/<?php echo $data['foto_toko'];?>">
                                <img src="../asset/admin/gambar/<?php echo $data['foto_toko'];?>" width="100%">
                            </a>
                        <?php }?>

                        <div class="desc"> <a href="detail_toko.php?id=<?php echo $data['toko_id'];?>"> <?php echo $data['nama_toko']; ?>  </a></div>

                    </div>





                    <?php

                };

            } else {

                ?>
                <div class="row">
                    <div class="column">Belum ada toko </div>
                </div>
                <?php
            }
            ?>



        </div>

    </div>


    </body>
    </html>

    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>

    
