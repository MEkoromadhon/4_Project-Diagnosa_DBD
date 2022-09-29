<?php
	/*Buat Koneksi 
		$servername = "localhost"; , $username = "root"; , $password = ""; , $dbname = "finalproject_s5";	
	$koneksi = mysqli_connect("localhost","root","123456","18416255201232");*/

	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="finalproject_s5";

	$konek=mysqli_connect($dbhost, $dbuser, $dbpass) or die("Server tidak terhubung");
	if ($konek){
   		 mysqli_select_db($konek,$dbname);
	} else {
    	echo "Server tidak terhubung. <br>";
	}
?>