<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "finalproject_s5";
	//Membuat Koneksi
	$conn = new mysqli($servername, $username, $password, $dbname);
	//Cek Koneksi
	if ($conn->connect_error) {
		die ("Gagal terhubung dengan database : " . $conn->connect_error);
	}

	$id = $_GET['id'];
	$sql = "DELETE FROM hasildiagnosa WHERE id=$id";

	if($conn->query($sql) === TRUE){
		echo "<script> alert ('History Telah Berhasil di Hapus . .') </script>";
		header("refresh:1; url=Halaman Dashboard.php"); /*Me-refresh ke menu halaman tersebut (delay 1detik)*/
	} else {
		echo "Erorr: ". $sql . "<br>" . $conn->error;
	}
$conn->close();
?>
