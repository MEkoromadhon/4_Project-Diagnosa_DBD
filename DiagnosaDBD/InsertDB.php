<!DOCTYPE html>
<html>
<head>
  <title> DAFTAR AKUN </title>
<style>
/* ---------------------- Program Bagian CSS ----------------------- */
body {background-color: DodgerBlue;}

/*----------------- Program Bagian Untuk mengatur Table Rowspan -------------------*/ 
 table, th, td { 
border: 1px solid none;
border-collapse: collapse;
}
   th, td { 
 padding: 5px;
 text-align:left; 
}
</style>

</head>
<body> <br>
	<h1 style = "text-align:center; color:White;"> DAFTAR AKUN </h1>
	<br><br><hr>
<!------------------------- Program Bagian Link ------------------------> 
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "finalproject_s5";
		//Membuat Koneksi
		$conn = mysqli_connect($servername, $username, $password, $database);
		//Cek Koneksi
		if(!$conn){
			echo "Not Connection to server";
		}
		if(isset($_POST['input'])){
		    $Nama = $_POST['Nama_Lengkap'];
	    	$TTL = $_POST['Tempat/Tanggal_Lahir'];
	    	$JK = $_POST['Jenis_Kelamin'];
	    	$Alamat = $_POST['Alamat'];
	    	$No_HP = $_POST['No_Handphone']; /*Jangan pakai (.) error*/
	    	$Email = $_POST['Email'];
	    	$Password = $_POST['Password'];
    	}
    	/*<!--Proses Insert (Memasukkan data ke dalam database di tabel daftarakun)-->*/
		$sql = "INSERT INTO daftarakun (Nama, TTL, JenisKelamin, Alamat, No_HP, Email, Password) VALUES ('$Nama','$TTL','$JK','$Alamat','$No_HP','$Email','$Password')";
    	/*<!--Proses Insert (Memasukkan data ke dalam database di tabel login)-->*/
		$sql1 = "INSERT INTO login (email, password, nama) VALUES ('$Email','$Password','$Nama')";

		if(!mysqli_query($conn, $sql)){
			echo "Insert Failed";
		} elseif (!mysqli_query($conn, $sql1)) {
			echo "Insert Failed";
		}
		 else {
			echo "<b><h3> Nama Lengkap : </b> $Nama </h3>";
			echo "<b><h3> Tempat/Tanggal Lahir : </b> $TTL </h3>";
			echo "<b><h3> Jenis Kelamin : </b> $JK </h3>";
			echo "<b><h3> Alamat : </b> $Alamat </h3>";
			echo "<b><h3> No. Handphone : </b> $No_HP </h3>";
			echo "<b><h3> Email : </b> $Email </h3>";
		}
		mysqli_close($conn);
		header("refresh:7; url=Halaman Tampilan Awal.html"); /*Me-refresh ke menu halaman tersebut (delay 7detik)*/
	?>
	<hr>
<h1 style = "text-align:center; color:White;"> BERHASIL ! </h1>
<hr>
<h2 style = "text-align:center; color:White;"> SILAHKAN LOGIN . . . </h2>
<br>
<p style = "text-align:center;"> @Pemrograman Web 2020 - Muhammad Eko </p>
</body>
</html>