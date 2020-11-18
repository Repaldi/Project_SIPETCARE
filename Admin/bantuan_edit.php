<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM notifikasi_admin  WHERE id_notifikasi_admin = '$id'");
$ambil = mysqli_fetch_array($query);
?>
<head>
</head>
<body>
<div  style="margin-top: 60px; margin-left: 40px; width: 30%; height: 30%;"  class="container">
    <form action="bantuan_tambah.php" method="post">
        <div class="row">
            <input type="hidden" value="<?=$id?>" name="id_notifikasi_admin">
            <div class="col-25">
                <label for="fname">Nama</label>
            </div>
            <div class="col-75">
                <input type="text" name="nama"   value="<?=$ambil['nama']?>" placeholder="Your name..">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="lname">Email</label>
            </div>
            <div class="col-75">
                <input type="text" id="lname" name="email"  value="<?=$ambil['email']?>" placeholder="email..">
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
</body>
