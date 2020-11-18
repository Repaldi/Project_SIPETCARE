<?php
session_start();
error_reporting(0);
if(!empty($_SESSION['username']) AND !empty ($_SESSION['password'])AND ($_SESSION['level']=='costumer')){
include '../koneksi.php';
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$level = $_SESSION['level'];
?>

<html>
<head>
    <title>.::SIPETCARE::.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
</head>
<style>
            .dasar{
                margin: auto;
                width: 600px;
                padding: 1px 25px 1px 25px;
                text-align:center;}
            #judul{
                background-color: #b30d4c;   
                font-size:20px;
                color: #d2ffa8;}
            .chathistory {
                background-color: #b9f7e1;
                height:300px;
                width:600px;
                margin :auto;
                overflow-y:scroll;
                display:flex;
                flex-direction:column;
                padding:15px 25px 15px 25px;}
                ::-webkit-scrollbar{
                    width: 13px;}
                ::-webkit-scrollbar-thumb{
                    background: #b30d4c; border-radius:2px;}
            #inputchatbox {
                background-color: #c9f271;
                width:600px;
                margin : auto;
                padding : 25px;}
            #pesan {
                width : 420px;
                height : 60px;
                padding: 5px 15px 5px 15px;
                margin : 1px 5px 1px 5px;
                border: 1px solid #665544;
                color: black;
                font-size: 15px;
                font-family: maiandra gd;
                border-radius:10px;}
            #submit {
                padding: 5px 15px 5px 15px;
                margin : 1px 5px 1px 5px;
                border: 1px solid #665544;
                color: black;
                font-size: 20px;
                font-family: maiandra gd;
                width: 150px;
                border-radius:5px;
                background-color: #b30d4c;
                color:white;
                color: #d2ffa8;
                float:right;}
            #submit:hover{
                background-color:#ff4731;}
            .kotak {
                background-color : #ffa8cc;
                border-radius: 10px;
                padding : 10px 15px 10px 15px;
                display: inline-block;
                font-family: maiandra gd;
                border-top-style: ridge;
                border-top-width: 6px;
                align-self:flex-start;}
            .kotak_send {
                background-color : #fbd571;
                border-radius: 10px;
                padding : 10px 15px 10px 15px;
                display: inline-block;
 
                font-family: maiandra gd;
                border-top-style: ridge;
                border-top-width: 6px;
                align-self:flex-end;}
            #pengirim{
                font-weight:bold;
                font-size:14px;}
            #isipesan{
                font-size:16px;}
            #waktu{
                font-size:10px;
                text-align:right;
                margin-top:3px;}
            
        </style>
<body>

<div class="fixed-navbar">
    <?php include 'navbar.php';?>
</div>

<div class="fixed-sidebar">
    <?php include 'menu.php';?>
</div>

<div class="content">

<?php 

    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    $user_id = $_SESSION['user_id'];

    $queryAwal=mysqli_query($conn, "SELECT * FROM costumer WHERE user_id=$user_id");
    $dataAwal = mysqli_fetch_array($queryAwal);
    $costumer_id = $dataAwal['costumer_id'];   

    if (isset($_POST['submit'])) :
        $toko_id = $id;
        $isi_pesan = $_POST['isi_pesan']; 
        $costumer_id = $costumer_id;      
        $status_pesan = $_POST['status_pesan'];      
    mysqli_query($conn, "insert into chat values ('','$toko_id','$costumer_id','$isi_pesan',NOW(),'status_pesan')"); 
    endif; ?>



<div class="main-content">
    <div class="dasar" id="judul">
            <h4> * Chat Room * </h4> </div>

        <div class="chathistory">    
            <?php  
                // menampilkan data dari database yang mempunyai id=$user_id
                $query =mysqli_query($conn, "SELECT * FROM chat WHERE toko_id=$id AND costumer_id=$costumer_id");

                while ($baris_data = mysqli_fetch_assoc($query)) {?>
                
                <div <?php if ($baris_data["costumer_id"] == $costumer_id) { ?> class="kotak_send" <?php 
                        } else {?> class="kotak" <?php } ?> >

                    <div id="pengirim"> 
                        
                     </div>

                    <div id="isipesan">
                    <?php echo $baris_data["isi_pesan"]; ?> </div>
                    
                    <div id="waktu">
                    <?php echo $baris_data["tanggal_pesan"]; ?> </div>

                </div>
            <?php echo "<br />";} ?>
        </div>     

        <form id="inputchatbox" action="" method="POST">
            <textarea name="isi_pesan" id="pesan" placeholder="Tulis Pesan ..." required></textarea> 
            <input type="hidden" name="status_pesan" value="0"/>

            <input id="submit" type="submit" name="submit" value="Kirim"/> 
        </form>



</div>
</div>



</body>
</html>

    <?php
}else{
    echo "<center>Anda Telah Berhasil Keluar Silahkan Klik </br><a href='../login.php'>Kembali</a> Untuk Login</center>";
}
?>