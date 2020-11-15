<?php
session_start();
// memanggil file koneksi.php untuk melakukan koneksi database
include '../koneksi.php';

	// membuat variabel untuk menampung data dari form
  $costumer_id      = $_POST['costumer_id'];
  $nama_hewan       = $_POST['nama_hewan'];
  $jenis_hewan      = $_POST['jenis_hewan'];
  $umur             = $_POST['umur'];
  $deskripsi        = $_POST['deskripsi'];
  $foto             = $_FILES['foto']['name'];


//cek dulu jika ada gambar hewan jalankan coding ini
if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, "../asset/admin/gambar/".$nama_gambar_baru); //memindah file gambar ke folder asset/admin/gambar
                  // jalankan query INSERT untuk menambah data ke database ini harus sesuai urutannya (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO hewan (hewan_id,costumer_id, nama_hewan,jenis_hewan,umur,deskripsi,foto) VALUES ('', '$costumer_id', '$nama_hewan', '$jenis_hewan','$umur','$deskripsi','$nama_gambar_baru')";
                  $result = mysqli_query($conn, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    //tampil alert dan akan redirect ke halaman hewan.php
                    echo "<script>alert('Data berhasil ditambahkan.');window.location='hewan.php';</script>";
                  }

            } else {     
             //kalau file ekstensi tidak jpg dan png maka alert ini ditampilkan
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='hewan_tambah.php';</script>";
            }
} else {
   $query = "INSERT INTO  hewan (hewan_id,costumer_id, nama_hewan,jenis_hewan,umur,deskripsi,foto) VALUES ('', '$costumer_id', '$nama_hewan', '$jenis_hewan','$umur','$deskripsi',null)";
  $result = mysqli_query($conn, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($conn).
            " - ".mysqli_error($conn));
  } else {
    //untuk nampilin alert dan  redirect ke halaman hewan.php
    echo "<script>alert('Data berhasil ditambah.');window.location='hewan.php';</script>";
  }
}

 
?>