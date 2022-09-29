<!DOCTYPE html>
<html>
<head>
	<title> HISTORY DIAGNOSA </title>
	<link href="style_TabelZebra.css" rel='stylesheet' type='text/css' />
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
<h1 style = "text-align:center; color:White;"> HISTORY DIAGNOSA </h1>

<!------------------------- Program Bagian Link ------------------------> 
<br>
<hr>
<br>
<form action="Halaman Dashboard.php" method="POST" name="input" style="text-align: center;">
    <button class="btn2" style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);"><b> KEMBALI </b></button>
</form>
<br>

<?php 
include 'config2.php';
?>

<table style="width:100%; background: white;" border = "3" class="zebra"> 
  <tr>
  	 <th style="text-align: center;"> No. </th>
     <th> id </th>
     <th> Nama </th>
     <th> Diagnosa Penyakit </th>
     <th> Hasil Diagnosa </th>
     <th> Waktu </th>
     <th> Hapus History </th>
  </tr>
  </thead>

	<?php 
	if(isset($_POST['cari'])){
		$cari = $_POST['cari'];
		$row = mysql_query("select * from hasildiagnosa where Nama like '%".$cari."%'");				
	}else{
		$row = mysql_query("select * from hasildiagnosa");		
	}
	$no = 1;
	if($row===FALSE){
		die(mysql_error());
	}
	while($d = mysql_fetch_array($row)){
	?>
	<tr>
		<td style="text-align: center;"><b><?php echo $no++; ?></b></td>
		<td><?php echo $d['id']; ?></td>
		<td><?php echo $d['Nama']; ?></td>
		<td><?php echo $d['Diagnosa_Penyakit']; ?></td>
		<td><?php echo $d['Hasil']; ?></td>
		<td><?php echo $d['Waktu']; ?></td>
		<td><?php echo "<button style='width:100px; height:28px;'><b><a href='javascript:hapusData(".$d['id'].")' style='text-decoration:none'> Hapus </a></b></button>";
				echo "</tr>";?></td>
	</tr>
	<?php } ?>

<script language="javascript" type="text/javascript">
	function hapusData(id){
		if(confirm("Apakah anda yakin ingin menghapus History ini ?")){
			window.location.href = 'Delete History Diagnosa.php?id=' + id;
		}
	}
</script>
</table>
<br><br><hr>
</body>
</html>