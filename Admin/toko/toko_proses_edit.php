<?php
session_start();
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $toko_id            = $_POST['toko_id'];
  $admin_id            = $_POST['admin_id'];
  $nama_toko           = $_POST['nama_toko'];
  $alamat_toko         = $_POST['alamat_toko'];
  $deskripsi_toko      = $_POST['deskripsi_toko'];
  $foto_toko           = $_FILES['foto_toko']['name'];


//cek dulu jika ada gambar toko jalankan coding ini
if($foto_toko != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto_toko); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto_toko']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto_toko; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, "../../asset/admin/gambar/".$nama_gambar_baru); //memindah file gambar ke folder asset/admin/gambar
                  $query  = "UPDATE toko SET nama_toko = '$nama_toko', alamat_toko = '$alamat_toko', deskripsi_toko = '$deskripsi_toko', foto_toko = '$nama_gambar_baru'";
                  $query .= "WHERE toko_id = '$toko_id'";
                  $result = mysqli_query($conn, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Data toko berhasil dibuat.');window.location='toko.php';</script>";
                  }

            } else {     
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='toko.php';</script>";
            }
} else {
   $query  = "UPDATE toko SET nama_toko = '$nama_toko', alamat_toko = '$alamat_toko', deskripsi_toko = '$deskripsi_toko'";
                  $query .= "WHERE toko_id = '$toko_id'";
                  $result = mysqli_query($conn, $query);
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($conn).
            " - ".mysqli_error($conn));
  } else {
    echo "<script>alert('Data toko berhasil diubah.');window.location='toko.php';</script>";
  }
}

 
?>