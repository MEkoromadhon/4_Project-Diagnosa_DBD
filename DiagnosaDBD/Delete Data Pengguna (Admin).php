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
	$sql = "DELETE FROM daftarakun WHERE id=$id";
	$sql1 = "DELETE FROM login WHERE id=$id";

	if($conn->query($sql) === TRUE){
		if($conn->query($sql1) === TRUE){
		echo "<script> alert ('Data Pengguna Telah Berhasil di Hapus . .') </script>";
		header("refresh:1; url=Select Data Pengguna (Admin).php"); /*Me-refresh ke menu halaman tersebut (delay 1 detik)*/
	} else {
		echo "Erorr: ". $sql . "<br>" . $conn->error;
	}}
$conn->close();
?>
