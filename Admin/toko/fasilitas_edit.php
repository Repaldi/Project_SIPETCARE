<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
    include '../../koneksi.php';
    ?>
    <html>
    <head>
        <title>.::SIPETCARE::.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../asset/admin/sidebar.css" type="text/css">
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
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE fasilitas_id='$id'");
        $data = mysqli_fetch_array($query);
        ?>

        <div class="main-content">
            <div class="row">
                <div class="column">
                    <h2>Edit Data User</h2>
                    <form action="fasilitas_edit_proses.php" method="post" >
                        <label><i class="fa fa-envelope"></i>Nama Fasilitas</label>
                        <input type="hidden" name="id" value="<?php echo $data["fasilitas_id"];?>" >
                        <input type="text" value=" <?php echo $data["nama_fasilitas"];?>" name="nama">

                        <label for="biaya perhari"><i class="fa fa-user"></i> Biaya (Per Hari)</label>
                        <input type="text" value=" <?php echo $data["biaya"];?>" id="myInput"   name="biaya">


                        <button name="submit" type="submit" value="Save Password" class="btn" <i class="fa fa-floppy-o" aria-hidden="true">Simpan   </i>
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