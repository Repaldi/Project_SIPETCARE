<body>
    <div class="side-group">
        <img src="../asset/admin/gambar/maula.jpeg">
    </div>

    <div  class="titel-nama">
        <center>
            <h4 style="margin-top: -10px; color: white"> <?php echo strtoupper($_SESSION['username']) ?></h4>
        </center>
    </div>
    
    <div class="group-menu">
        <a href='index.php'><i class="fa fa-home"></i> Home</a>
        <a href='profil.php'><i class="fa fa-user"></i> Profil</a>
        <a href='data_costumer_edit.php'><i class="fa fa-users" aria-hidden="true"></i> Transaksi </a>
        <a href='data_hewan.php'><i class="fa fa-bug"></i> Data Hewan</a>
    </div>
</body>