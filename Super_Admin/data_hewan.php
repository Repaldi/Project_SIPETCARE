<?php
session_start();

include '../koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['username']))
{
    header("location:index.php?pesan=gagal");
}
?>
<!DOCTYPE Html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css">
</head>

<body>
<div class="fixed-navbar">
    <h5>Part &nbsp;<span style="color: #19B3D3"> Super Administrator
    <a style=" margin-right: 15px; border-radius :2px; color:  white;  font-size: 17px; text-decoration: none; float: right;" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
 
    </span> </h5>
</div>
<div class="fixed-navbar">
    <?php include "navbar.php";?>
</div>
<div class="fixed-sidebar">
    <?php include "menu.php";?>
</div>
<div class="content">
    <h2 style="margin-left: 20px">Data Hewan Costumer </h2>
    <div class="breadcrumb">

        <div class="main-content">

            <?php $query=mysqli_query($conn, "SELECT * FROM costumer INNER JOIN hewan ON hewan.costumer_id= costumer.costumer_id WHERE hewan.isdelete=false");?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Hewan</th>
                    <th>Nama Pemilik</th>
                    <th>Action</th>
                </tr>
                <?php if(mysqli_num_rows($query)>0){ ?>
                    <?php
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><img src="../asset/admin/gambar/<?php echo $data['foto']?>" width="50px" alt="Foto Hewan"></td>
                            <td><?php echo $data["nama_hewan"];?></td>
                            <td><?php echo $data["nama_lengkap"];?></td>
                            <td>
                                <a href="data_hewan_detail.php?id=<?=$data['hewan_id']?>">Lihat Detail</a> |  <a href="data_hewan_hapus.php?id=<?=$data  ['hewan_id']?>">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                <?php }else{ ?>
                    <td colspan="3"> Belum ada costumer </td>
                <?php } ?>
            </table>

        </div>
    </div>
</body>
</html>