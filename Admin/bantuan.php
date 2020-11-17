<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='admin')){
    include '../koneksi.php';
    $username = $_SESSION['username'];
    $level = $_SESSION['level'];
    $id_notifikasi_admin = $_SESSION['id_notifikasi_admin '];
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

            <tr>
                <th>No</th>
                <th>nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th width="100px">Action</th>
            </tr>
            <?php
            $queryKedua = mysqli_query($conn, "SELECT * FROM notifikasi_admin");
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

                            <a class="btn" href="bantuan_edit.php?id=<?php echo $dataDua['id_notifikasi_admin']; ?>" <i class="fa fa-edit">Balas </i></a>

                        </td>
                    </tr>
                    <?php $no++; } ?>
            <?php }else{?>
                <td colspan="4"><center>Tidak ada kendala costumer</center></td>
            <?php } ?>

        </table>
        </div>

    </div>

    </div>

    </div>


    </body>
    </html>
    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>