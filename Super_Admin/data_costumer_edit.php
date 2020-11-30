<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/admin/sidebar.css" type="text/css">
</head>
<style>
    .edit-content {
        margin-left: 0px;
        border-left: 0px solid gray;
        overflow: hidden;
    }
    .edit-content form {
        margin-left: 0px;
        padding: 20px;
    }.
     userform {
         position: fixed;
         display: none;
         z-index: 1;
         padding-top: 100px;
         width: 100%;
         height: 100%;
         left: 0;
         top: 0;
         overflow: auto;
         background-color: #000;
         background-color: rgba(0,0,0,0.4);
     }
    .user-content {
        background-color: #fefefe;
        margin: auto;
        padding: 0px;
        border: 1px solid #888;
        width: 50%;
    }
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    .user-header {
        padding: 5px;
        background-color: #cdccfe;
        color: white;
        text-align: center;
    }
    .user-header h2 {
        margin: 0px;
        padding: 10px;
    }

</style>
</head>
<body>
<div class="post-content">


                <button id="form-user">Edit</button>


                <button id="form-user">Edit</button>

</div>

<div id="edit-form-user" class="userForm1">
    <div class="user-content">
        <div class="edit-content">
            <div class="user-header">
                <span class="close">&times;</span>
                <h2>Form Input Data</h2>
            </div>

            <form action=" ">
                <label>Username :</label><br>
                <input type="text" name="username">
                <br><br>
                <label>Nama Lengkap:</label><br>
                <input type="text" name="namalengkap">
                <br><br>
                <label>Password:</label><br>
                <input type="text" name="password">
                <br><br>
                <label>Alamat:</label><br>
                <textarea type="text" name="alamat" rows="4" cols="50"></textarea>
                <br><br>
                <label>Agama:</label>
                <select name="agama">

                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="budha">Budha</option>
                    <option value="katholik">Katholik</option>
                </select>
                <br><br>
                <label>Jenis Kelamin:</label>
                <input type="checkbox" name="jk1" value="lakilaki"> Laki-Laki
                <input type="checkbox" name="jk2" value="perempuan"> Perempuan
                <br><br>
                <input type="submit" value="Kirim">
            </form>
        </div>
    </div>
</div>
<script>
    var userForm1 = document.getElementById('edit-form-user');

    var btn = document.getElementById("from-user");

    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        userform.style.display = "block";
    }

    span.onclick = function() {
        userform.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == user) {
            userform.style.display = "none";
        }
    }
</script>