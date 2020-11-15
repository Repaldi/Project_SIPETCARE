<?php
session_start();
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../koneksi.php';

	// membuat variabel untuk menampung data dari form
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
                  // jalankan query INSERT untuk menambah data ke database ini harus sesuai urutannya (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO toko (toko_id, admin_id,nama_toko,alamat_toko,deskripsi_toko,foto_toko) VALUES ('', '$admin_id', '$nama_toko', '$alamat_toko','$deskripsi_toko','$nama_gambar_baru')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman toko.php
                    echo "<script>alert('Data toko berhasil dibuat.');window.location='toko.php';</script>";
                  }

            } else {     
             //kalau file ekstensi tidak jpg dan png maka alert ini ditampilkan
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='toko.php';</script>";
            }
} else {
   $query = "INSERT INTO toko (toko_id,admin_id, nama_toko, alamat_toko,deskripsi_toko,foto_toko) VALUES ('', '$admin_id', '$nama_toko','$alamat_toko','$deskripsi_toko',null)";
  $result = mysqli_query($conn, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($conn).
            " - ".mysqli_error($conn));
  } else {
    //untuk nampilin alert dan  redirect ke halaman toko.php
    echo "<script>alert('Data toko berhasil dibuat.');window.location='toko.php';</script>";
  }
}

 
?>