<?php
include "../koneksi.php";
if (isset($_POST['toko_id'])) {
    $toko_id = $_POST['toko_id'];

    $sqldata=mysqli_query($conn, "select * from fasilitas where toko_id=$toko_id");
    while ($data = mysqli_fetch_array($sqldata)) {
        ?>
        <option value="<?php echo  $data['fasilitas_id']; ?>"><?php echo $data['nama_fasilitas']; ?></option>
        <?php
    }
}
if (isset($_POST['fasilitas_id'])) {
    $fasilitas_id = $_POST['fasilitas_id'];

    $sqldata=mysqli_query($conn, "select biaya from fasilitas where fasilitas_id=$fasilitas_id");
    while ($data = mysqli_fetch_array($sqldata)) {
        ?>
        <option value="<?php echo  $data['biaya']; ?>"><?php echo $data['biaya']; ?></option>
        <?php
    }
}

?>