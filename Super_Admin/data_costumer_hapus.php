
<?php
/*// menghapus data tidak permanen dari database
include  '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

$query = mysqli_query($conn,"DELETE FROM costumer WHERE costumer_id = '$id'");
if ($query)
{
    header("location:data_costumer.php?hapus_berhasil");
}
else
{

    header("location:data_costumer.php?hapus_gagal");
}
*/?>

<?php
// koneksi database
include '../koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data tidak permanen dari database
$query  = "UPDATE costumer SET isdelete=1 WHERE  costumer_id ='$id'";
$result = mysqli_query($conn, $query);
// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
} else {
//untuk nampilin alert dan  redirect ke halaman hewan.php
    echo "<script>alert('Data berhasil dihapus.');window.location='data_costumer.php';</script>";
}

?>