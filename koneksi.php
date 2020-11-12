<?php 
//Khsusu untuk register
class database{
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "db_sipetcare";
	var $koneksi;
 
	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
	}
 

    function register($email,$username,$password,$level)
	{	
		$insert = mysqli_query($this->koneksi,"insert into user values ('','$email','$username','$password','$level')");
		return $insert;
	}
}

//Koneksi Public
$conn=new mysqli("localhost","root","","db_sipetcare");
if ($conn->connect_error){
die("connection failed : " .$conn->connect_error);
}

?>