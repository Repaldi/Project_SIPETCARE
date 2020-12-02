<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='superadmin')){
    include '../koneksi.php';
    $user_id = $_SESSION['user_id'];
    ?>
    <!DOCTYPE Html>
    <html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
    </head>

    <body>

    <div class="fixed-navbar">
        <?php include "navbar.php";?>
    </div>
    <div class="fixed-sidebar">
        <?php include "menu.php";?>
    </div>

    <div class="content">

        <?php
        // mengecek apakah di url ada nilai GET id
        if (isset($_GET['id'])) {
            // ambil nilai id dari url dan disimpan dalam variabel $id
            $id = ($_GET["id"]);
            // menampilkan data dari database yang mempunyai id=$user_id
            $query = "SELECT * FROM hewan WHERE hewan_id='$id'";
            $result = mysqli_query($conn, $query);
            // jika data gagal diambil maka akan tampil error berikut
            if(!$result){
                die ("Query Error: ".mysqli_errno($conn).
                    " - ".mysqli_error($conn));
            }
            // mengambil data dari database
            $data = mysqli_fetch_assoc($result);
            // apabila data tidak ada pada database maka akan dijalankan perintah ini
            if (!count($data)) {
                echo "<script>alert('Data tidak ditemukan pada database');window.location='hewan.php';</script>";
            }
        } else {
            // apabila tidak ada data GET id pada akan di redirect ke hewan.php
            echo "<script>alert('Masukkan data id.');window.location='hewan.php';</script>";
        }
        ?>
        <div class="main-content">
            <div class="row">
                <div class="column">
                    <h2>Edit Data Hewan</h2>
                    <form method="post" action="data_hewan_proses_update.php" enctype="multipart/form-data">
                        <input type="hidden" name="costumer_id" value="<?php echo $data['costumer_id']; ?>" >
                        <input type="hidden" name="isdelete" value=<?php echo $data['isdelete']; ?>>
                        <input type="hidden" name="hewan_id" value=<?php echo $data['hewan_id']; ?>>


                        <label for="nama_hewan"><i class="fa fa-bug"></i> Nama Hewan</label>
                        <input type="text"  name="nama_hewan" value="<?php echo $data['nama_hewan']; ?>">

                        <label for="jenis_hewan"><i class="fa fa-paw"></i> Jenis Hewan</label>
                        <input type="text" name="jenis_hewan" value="<?php echo $data['jenis_hewan']; ?>" >

                        <label for="umur"><i class="fa fa-cog"></i> Umur (dalam bulan)</label>

                        <input type="text" name="umur" value="<?php echo $data['umur']; ?>">

                        <label for="deskripsi"><i class="fa fa-comment-o "></i> Deskripsi</label>
                        <textarea name="deskripsi" place rows="4" cols="48"><?php echo $data['deskripsi']; ?></textarea>

                        <button type="submit" class="btn" value="Simpan"><i class="fa fa-floppy-o" aria-hidden="true"> SIMPAN </i>
                </div>


                <div class="column">
                    <h2><span style="color:white;">Manipulasi text</span></h2>

                    <div class="card">
                        <img src="../asset/admin/gambar/<?php echo $data['foto']; ?>" alt="Foto Hewan" width="100%" >
                        <input type="file" name="foto" value="<?php echo $$data['foto']; ?>">
                    </div>
                </div>
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