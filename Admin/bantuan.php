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
    <?php $user_id = $_SESSION['user_id'];

    $queryAdmin=mysqli_query($conn, "SELECT * FROM admin WHERE user_id=$user_id");
    $dataAdmin = mysqli_fetch_array($queryAdmin);
    $admin_id = $dataAdmin['admin_id'];   

    $queryAwal=mysqli_query($conn, "SELECT * FROM toko WHERE admin_id=$admin_id");
    $dataAwal = mysqli_fetch_array($queryAwal);
    $toko_id = $dataAwal['toko_id'];  

    ?>

        <table style="" cellpadding="0" cellspacing="0">

            <tr>
                <th>No</th>
                <th>nama</th>
                <th>Pesan</th>
                <th>Action</th>
            </tr>
            <?php
        

            $query =mysqli_query($conn, "SELECT * FROM chat WHERE toko_id=$toko_id");

            if(mysqli_num_rows($query)>0){ ?>
                <?php
                $no = 1;
                while($data= mysqli_fetch_array($query)){
                    ?>
                    <tr>

                        <td><center><?php echo $no ?></center></td>
                        <td><?php echo $data['costumer_id'];?></td>
                        <td><?php echo $data['isi_pesan'];?> </td>
                        <td>

                            <a class="btn" href="bantuan_detail.php?id=<?php echo $data['costumer_id']; ?>"> <i class="fa fa-edit"> Balas </i></a>

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