<?php
session_start();
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

// membuat variabel untuk menampung data dari form
  $user_id      = $_POST['user_id'];
  $admin_id      = $_POST['admin_id'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $jenis_kelamin= $_POST['jenis_kelamin'];
  $alamat       = $_POST['alamat'];
  $nomor_hp     = $_POST['nomor_hp'];
  $foto         = $_FILES['foto']['name'];


//cek dulu jika ada gambar admin jalankan coding ini
if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, "../asset/admin/gambar/".$nama_gambar_baru); //untuk masukin file gambar ke folder asset/admin/gambar
                   // jalankan query UPDATE berdasarkan ID yang admin yang mau diedit
                   $query  = "UPDATE admin SET nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', nomor_hp = '$nomor_hp', foto = '$nama_gambar_baru'";
                    $query .= "WHERE admin_id = '$admin_id'";
                    $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman profil.php
                    echo "<script>alert('Data berhasil diubah.');window.location='profil.php';</script>";
                  }

            } else {     
             //kalau file ekstensi tidak jpg dan png maka alert ini ditampilkan
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='profil_edit.php';</script>";
            }
} else {
  // jalankan query UPDATE berdasarkan id yang admin yang mau diedit
  $query  = "UPDATE admin SET nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', nomor_hp = '$nomor_hp'";
  $query .= "WHERE admin_id = '$admin_id'";  
  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //untuk nampilin alert dan  redirect ke halaman profil.php
                    echo "<script>alert('Data berhasil diubah.');window.location='profil.php';</script>";
                  }
}

 
?>