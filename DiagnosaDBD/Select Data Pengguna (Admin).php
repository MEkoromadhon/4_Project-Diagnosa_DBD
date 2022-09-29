<!DOCTYPE html>
<html>
<head>
	<title> DATA PENGGUNA </title>
		 <link href="style_TabelZebra.css" rel='stylesheet' type='text/css' /> <!--Style sheet dalam atribut link rel bermakna untuk memberitahu browser bahwa file eksternal yang disisipkan berjenis style sheet dengan ekstensi .css.-->
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
<body>
<br>
<h1 style = "text-align:center; color:White;"> DATA PENGGUNA </h1>

<!------------------------- Program Bagian Link ------------------------> 
<br><br>
<hr>
<br>
    <form action="Halaman Dashboard (Admin).php" method="POST" name="input">
        <button style="width: 70px; height: 25px; margin-left: 1310px; cursor: pointer;"><b> Kembali </b></button>
    </form>
<br>
<table style="width:100%; background: white;" border = "3" class="zebra">
 
  <tr>
     <th> id </th>
     <th> Nama </th>
     <th> Tempat/Tanggal Lahir </th>
     <th> Jenis Kelamin </th>
     <th> Alamat </th>
     <th> No. Handphone </th>
     <th> Email </th>
     <th> Hapus Data </th>
  </tr>
</thead>
	<!--Proses Select (Menampilkan database kedalam web berbentuk Tabel)-->
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "finalproject_s5";
		//Membuat Koneksi
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		//Cek Koneksi
		if (!$conn) {
			die ("Gagal terhubung dengan database : " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM daftarakun";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){
		// Output data pada setiap baris
			while ($row = mysqli_fetch_assoc($result)) {
				echo"<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['Nama']."</td>";
					echo "<td>".$row['TTL']."</td>";
					echo "<td>".$row['JenisKelamin']."</td>";
					echo "<td>".$row['Alamat']."</td>";
					echo "<td>".$row['No_HP']."</td>";
					echo "<td>".$row['Email']."</td>";
					echo "<td><button style='width:70px; height:28px;'><b><a href='javascript:hapusData(".$row['id'].")' style='text-decoration:none'> Hapus </a></b></button>";
				echo "</tr>";
			}
		} else {
			echo "0 results";
		}
		mysqli_close($conn);
	?>
<script language="javascript" type="text/javascript">
	function hapusData(id){
		if(confirm("Apakah anda yakin akan menghapus data pengguna ini ?")){
			window.location.href = 'Delete Data Pengguna (Admin).php?id=' + id;
		}
	}
</script>

</table>
<br>
<br>
<hr>
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <p style = "text-align:center;"> @Pemrograman Web 2020 - EASA </p>  
</html>