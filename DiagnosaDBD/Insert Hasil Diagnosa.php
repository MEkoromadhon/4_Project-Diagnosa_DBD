<!DOCTYPE html>
<html>
<head>
	<title> DIAGNOSA </title>
<style>
/* ---------------------- Program Bagian CSS ----------------------- */
body {background-color: #FFFAF0;}

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
<body>
	
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
		if(isset($_POST['inputhasil'])){
		    $Nama = $_POST['nama1'];
	    	$DP = $_POST['penyakit1'];
	    	$Hsl = $_POST['hasildiagnosis1'];
    	}
    	/*<!--Proses Insert (Memasukkan data ke dalam database di tabel daftarakun)-->*/
		$sql = "INSERT INTO hasildiagnosa (Nama, Diagnosa_Penyakit, Hasil) VALUES ('$Nama','$DP','$Hsl')";

		if(!mysqli_query($conn, $sql)){
			echo "Insert Failed";
		} else {
			echo "<br>";
			echo "<b><h3> Nama Lengkap : </b> $Nama </h3>";
			echo "<b><h3> Ter-Diagnosa Penyakit : </b> $DP </h3>";
			echo "<b><h3> Hasil Diagnosa : </b> $Hsl </h3>";
			echo "<br>";
		}
		mysqli_close($conn);
		header("refresh:5; url=Halaman Dashboard.php"); /*Me-refresh ke menu halaman tersebut (delay 5detik)*/
	?>
	<hr>
	<br><br>
<h1 style = "text-align:center; color:Blue;"> BERHASIL DI SIMPAN ! </h1>
<h2 style = "text-align:center; color:Blue;"> DI HISTORY DIAGNOSA </h2>
<br><br>
<hr>
<br><br><br>
<p style = "text-align:center;"> @Pemrograman Web 2020 - Muhammad Eko </p>
</body>
</html>