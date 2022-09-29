<!--Proses Update (Menampilkan database kedalam web berbentuk Tabel)-->
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
	
		$idx = $_POST['idx'];
    	$name = $_POST['Nama_Lengkap'];
   		$ttl = $_POST['Tempat/Tanggal_Lahir'];
    	$jk = $_POST['Jenis_Kelamin'];
    	$alamat = $_POST['Alamat'];
    	$nohp = $_POST['No_Handphone'];
    
		$sql = "UPDATE daftarakun SET Nama ='$name', TTL ='$ttl', JenisKelamin ='$jk', Alamat ='$alamat', No_HP ='$nohp' WHERE id=$idx";
		if($conn->query($sql) === TRUE){			
       		header("refresh:1; url=Halaman Dashboard.php"); /*Me-refresh ke menu halaman tersebut (delay 1 detik)*/
    	} else {
      		echo "Error " . $sql . "<br>" . $conn->error;
    	}
    $conn->close();
?>



