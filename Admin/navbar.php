<?php
$query = mysqli_query($conn,"select * from chat");
$num   = mysqli_num_rows($query);

?>

<h5>Part &nbsp;<span style="color: #19B3D3">Administrator
        <button href="bantuan.php" style=" margin-left: 100px;" class="badge-notif" data-badge=<?php echo $num ?>>Notifikasi</button>
     <a style=" margin-right: 15px; border-radius :2px; color:  white;  font-size: 17px; text-decoration: none; float: right;" href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a>
    
    </h5>