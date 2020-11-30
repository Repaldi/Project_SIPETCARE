<?php 

$query= mysqli_query($conn, "SELECT * FROM admin WHERE user_id =".$_SESSION['user_id']);
$data = mysqli_fetch_array($query);
if(empty($data['user_id'])) {
?>
    <div class="side-group">
        <img src="../../asset/admin/gambar/user.png">
    </div>
<?php }else{?>
    <div class="side-group">
        <img src="../../asset/admin/gambar/<?php echo $data['foto']?>">
    </div>
<?php }; ?>
    <div  class="titel-nama">
        <center>
            <h4 style="margin-top: -10px; color: white"> <?php echo strtoupper($_SESSION['username']) ?></h4>
        </center>
    </div>
    
    <div class="group-menu">
        <a href='../index.php'><i class="fa fa-home"></i> Home</a>     
        <a href='../profil.php'><i class="fa fa-user"></i> Profil Saya</a>
        <a href='toko.php'><i class="fa fa-users" aria-hidden="true"></i> Profil Toko </a>
        <a href='fasilitas.php'><i class="fa fa-users" aria-hidden="true"></i> Fasilitas Toko </a>
        <a href='../hewan.php'><i class="fa fa-bug"></i> Hewan Titipan</a>
        <a href='../bantuan.php'><i class="fa fa-fax" aria-hidden="true"></i> Bantuan Costumer </a>
        <a href='../pengaturan.php'><i class="fa fa-cog" aria-hidden="true"></i> Pengaturan </a>
    </div>
</body>