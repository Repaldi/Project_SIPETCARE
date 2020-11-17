<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$level = $_SESSION['level'];
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
            <div class="row">
                <div class="column">

        <table style="" cellpadding="0" cellspacing="0">
            <input type="hidden" value="<?=$id?>" name="id_notifikasi_costumer>

            <tr>
                <th>No</th>
                <th>nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th width="100px">Action</th>
            </tr>
            <?php
            $id = $_GET['id'];
            $queryKedua = mysqli_query($conn, "SELECT * FROM notifikasi_costumer WHERE id_notifikasi_costumer = '$id'");
            if(mysqli_num_rows($queryKedua)>0){ ?>
                <?php
                $no = 1; 
                while($dataDua = mysqli_fetch_array($queryKedua)){
                    ?>
                    <tr>

                        <td><center><?php echo $no ?></center></td>
                        <td><?php echo $dataDua['nama'];?></td>
                        <td><?php echo $dataDua['email'];?> </td>
                        <td><?php echo $dataDua['pesan'];?> </td>
                        <td>

                            <a class="btn" href="bantuan_edit.php?id=<?php echo $dataDua['id_notifikasi_costumer']; ?>" <i class="fa fa-edit">lihat </i></a>

                        </td>
                    </tr>
                    <?php $no++; } ?>
   <!-- <div  style="margin-top: 60px; margin-left: 40px; width: 30%; height: 30%;"  class="container">
        <form action="bantuan_tambah.php" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Nama</label>
                </div>
                <div class="col-75">
                    <input type="text" name="nama" placeholder="Your name..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Email</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="email" placeholder="email..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Kendala</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="pesan" placeholder="isi kendala anda.." style="height:200px"></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>-->
                <?php }else{?>
                    <td colspan="4"><center>Tidak ada kendala costumer</center></td>
                <?php } ?>


</body>
</html>
    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>