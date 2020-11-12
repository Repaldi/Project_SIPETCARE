<?php
session_start();

include '../koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['username']))
	{
    header("location:data_costumer.php?pesan=gagal");
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
    <h5>Part &nbsp;<span style="color: #19B3D3">  Super Administrator
    <a style=" margin-right: 15px; border-radius :2px; color:  white;  font-size: 17px; text-decoration: none; float: right;" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
    </span> </h5>
</div>
<div class="fixed-sidebar">
    <div class="side-group">
        <img src="../asset/admin/gambar/maula.jpeg">
    </div>
    <div  class="titel-nama">
        <center>
            <h4 style="margin-top: -10px; color: white"> <?php echo "" .strtoupper($_SESSION['username']) ?></h4>
        </center>
    </div>
    <div class="group-menu">
        <a href="index.php"><i class="fa fa-home"></i> Home</a>
        <a href="data_admin.php"><i class="fa fa-user"></i> Data Admin</a>
        <a href="data_costumer.php"><i class="fa fa-users" aria-hidden="true"></i>  Data Costumer </a>
        <a href="data_hewan.php"><i class="fa fa-bug"></i> Data Hewan</a>

    </div>
</div>
<div class="content">
    <h3> Data Costumer </h3>
    <div class="breadcrumb">

    <div class="main-content">
            
    <?php $query=mysqli_query($conn, "SELECT * FROM user WHERE level='costumer' GROUP BY Nama ASC");?>
	<table cellpadding="0" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
    <?php if(mysqli_num_rows($query)>0){ ?>
    <?php
        $no = 1;
        while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><center><?php echo $no ?></center></td>
        <td><?php echo $data["username"];?></td>
        <td><?php echo $data["password"];?></td>
        <td>
            <a href="#">Hapus</a> |
            <a href="#">Ubah</a>
        </td>
    </tr>
    <?php $no++; } ?>
    <?php } ?>
    </table>
         
        </div>
    </div>
</body>
</html>