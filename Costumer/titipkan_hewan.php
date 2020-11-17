<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
?>

<html>
<head>
    <title>.::SIPETCARE::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
</head>
<style>
    select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
  }
    </style>
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
        <h2>Silahkan isi form berikut : </h2>
        <form method="post" action="hewan_tambah_simpan.php" enctype="multipart/form-data">
                <input type="hidden" name="costumer_id" value="<?php echo $costumer_id; ?>" >
                <input type="hidden" name="isdelete" value=0>

                <label for="nama_hewan"><i class="fa fa-bug"></i> Pilih Hewan Peliharaan</label>
                <select class="country" name="country">
                    <option value="au">Australia</option>
  
                </select>

                <label for="nama_hewan"><i class="fa fa-bug"></i> Pilih Toko</label>
                <select class="country" name="country">
                    <option value="au">Australia</option>
  
                </select>
                
                <label for="jenis_hewan"><i class="fa fa-paw"></i> Alamat </label>
                <input type="text" name="jenis_hewan" >

                <label for="deskripsi"><i class="fa fa-comment-o "></i> Catatan </label>
                <textarea name="deskripsi" place rows="4" cols="48"></textarea>
            
        </div>
           
      
        <div class="column">
        <h2><span style="color:white;">Manipulasi text</span></h2>
                <label for="umur"><i class="fa fa-cog"></i> Lama Penitipan</label>
                <input type="text" name="umur" >

                <label for="nama_hewan"><i class="fa fa-bug"></i> Biaya per hari</label>
                <input type="text"  name="nama_hewan">
                <label for="nama_hewan"><i class="fa fa-bug"></i> Sub total</label>
                <input type="text"  name="nama_hewan">

                <button type="submit" class="btn" value="Simpan" style="float:right;"><i class="fa fa-floppy-o" aria-hidden="true"> SIMPAN </i>
       
                <!-- <label for="nama_hewan"><b>Bank Account</b></label>
                <label for="nama_hewan"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Mandiri  </label>
                <label  for="nama_hewan"><i class="fa fa-caret-right" aria-hidden="true"></i> 0012-2913-131-31</label>
                <label for="nama_hewan"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> BRI  </label>
                <label  for="nama_hewan"><i class="fa fa-caret-right" aria-hidden="true"></i> 0012-2913-131-31</label>
                <label for="nama_hewan"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> BNI  </label>
                <label  for="nama_hewan"><i class="fa fa-caret-right" aria-hidden="true"></i> 0012-2913-131-31</label> -->
               
            
        </div>
    </form>
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

    
 