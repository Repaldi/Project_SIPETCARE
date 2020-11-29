<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='superadmin')){
include '../koneksi.php';
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
    <?php include "navbar.php";?>
</div>
<div class="fixed-sidebar">
    <?php include "menu.php";?>
</div>
<div class="content">
    <h3> Data Costumer </h3>
    <div class="breadcrumb">

    <div class="main-content">
	<table cellpadding="0" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
             
    <?php
    $query = mysqli_query($conn, "SELECT * FROM user INNER JOIN costumer ON user.user_id = costumer.user_id ");
     if(mysqli_num_rows($query)>0){ ?>
    <?php
        $no = 1;
        while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><center><?php echo $no ?></center></td>
        <td><?php echo $data["nama_lengkap"];?></td>
        <td><?php echo $data["username"];?></td>
        <td><?php echo $data["email"];?></td>
        <td>
         <!DOCTYPE html>
<head>
    <title>Modal box dengan CSS3</title>
    <style>
        .modalDialog {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0,0,0,0.8);
            z-index: 99999;
            opacity:0;
            transition: opacity 200ms ease-in;
            pointer-events: none;
        }
        .modalDialog:target {opacity:1; pointer-events: auto;}
        .modalDialog > div {
            width: 400px;
            position: relative;
            margin: 10% auto;
            padding: 5px 20px 13px 20px;
            border-radius: 10px;
            background: #fff;
            background: linear-gradient(#fff, #aaa);
        }
        .close:hover { background:#00d9ff; }
        .close {
            background: #606061;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            text-align: center;
            top: -10px;
            right: -12px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 12px;
            box-shadow: 1px 1px 3px #000;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        span.psw {
            float: right;
        }

    </style>
</head>
<body>
<p><a href="#login?=id<?=$data['costumer_id']?>">Edit</a></p>

<div id="login" class="modalDialog">
    <div>
        <a href="#" title="Close" class="close">X</a>
        <h3>Data Costumer</h3>
        <form  action="action_page.php">
            <label><b>Nama Lengkap</b></label>
            <input type="text" name="id"value=" <?php echo $data["costumer_id"];?>">
            <input type="text" name="uname"  value=" <?php echo $data["nama_lengkap"];?>" required>
            <label><b>Username</b></label>
            <input type="text" placeholder="username" name="psw"  value=" <?php echo $data["username"];?>" required>
             <label><b>Email</b></label>
            <input type="text" placeholder="email" name="psw"value=" <?php echo $data["email"];?>" required>
            <button type="submit">Edit Data Costumer</button>

        </form>
    </div>
</div>
 |  <a href="data_costumer_hapus.php?id=<?=$data['costumer_id']?>">Hapus</a>
        </td>
    </tr>
    <?php $no++; } ?>
    <?php }else{?>
    <td colspan="4"> Belum ada costumer </td>
    <?php } ?>
    </table>
         
        </div>
    </div>
</body>
</html>
<?php
}else{
echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>