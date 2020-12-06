<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='superadmin')){
    include '../koneksi.php';
    $user_id = $_SESSION['user_id'];
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
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM user INNER JOIN admin ON user.user_id = admin.user_id AND admin.admin_id='$id'");
        $data = mysqli_fetch_array($query);
        ?>

        <div class="main-content">
            <div class="row">
                <div class="column">
                    <h2>Edit Data Admin</h2>
                    <form action="data_admin_proses_update.php" method="post" >
                        <label><i class="fa fa-envelope"></i>Nama Lengkap</label>
                        <input type="hidden" name="admin_id" value="<?php echo $data['admin_id']; ?>" >
                        <input type="text" value="<?php echo $data["nama_lengkap"];?>" name="nama_lengkap">

                        <label for="username"><i class="fa fa-cogs"></i> Username</label>
                        <input type="text" value="<?php echo $data["username"];?>" id="myInput"   name="username">


                        <label for="username"><i class="fa fa-edit"></i>Email</label>
                        <input type="text"  value="<?php echo $data["email"];?>"  id="myInput1" name="email">

                        <button name="submit" type="submit" value="Save Password" class="btn"> <i class="fa fa-floppy-o" aria-hidden="true"> Simpan   </i>
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