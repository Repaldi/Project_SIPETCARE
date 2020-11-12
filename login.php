
<?php

include 'koneksi.php';
?>
<html>
     <head>
         <link rel="stylesheet" href="asset/admin/sidebar.css">
     </head>

        <body style="font-family: sans-serif;background: #d5f0f3;">
        <div class="kotak_login">
            <p style="margin-left: 120px;"> Silahkan Login </p>
          <!-- Akan tampil saat loginnya gagal -->
           <p><center> <?php 
	            if(isset($_GET['pesan'])){
		            if($_GET['pesan']=="gagal"){
			            echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		            }
	            }
	        ?>
            </center>
            </p>

            <form action="validasi.php" method="post">
                <label>Username</label>
                <input type="text" name="username" class="form_login" placeholder="Username">

                <label>Password</label>
                <input  type="password" name="password" class="form_login" placeholder="Password">

                <input type="submit" name="login" class="tombol_login" value="LOGIN">

                <br/>
                <br/>
                <center>
                    <a  style="text-decoration: none;" href="register.php">Registrasi</a>
                </center>
            </form>

        </div>
        </body>
</html>