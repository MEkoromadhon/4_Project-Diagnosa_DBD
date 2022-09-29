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
 <?php 
    include 'config.php';
    // mengaktifkan session
    session_start();
 
    // cek apakah user telah login, jika belum login maka di alihkan ke halaman login
    if($_SESSION['status'] !="login"){
        header("location: Halaman Login.php");
    }
  ?>
<input readonly style="text-align: center; width: 300px; height: 20px;" type="hidden" name="cari" value="<?php echo $_SESSION['Nama']; ?>">
<hr color="DodgerBlue" size="5">  <!--Membuat garis berwarna biru -->
<br>
<h1 style = "text-align:center; color:DodgerBlue;"> DIAGNOSA </h1>
<h1 style = "text-align:center; color:DodgerBlue;"> --- PERTANYAAN --- </h1>
<br><hr color="DodgerBlue" size="4">  <!--Membuat garis berwarna biru -->

<br><br><br>
<b><font size="5"> Jawablah pertanyaan sesuai dengan gejala yang dialami saat ini. </b><br><br> <!--Untuk mengatur Size pada Kalimat-->
	<?php 
	//-- database configurations
		$dbhost='localhost';
		$dbuser='root';
		$dbpass='';
		$dbname='finalproject_s5';
		//-- database connections
		$db=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	//-- halt and show error message if connection fail
		if ($db->connect_error) {
			die('Connect Error ('.$db->connect_errno.')'.$db->connect_error);
		}
	?>
<form method="POST" action="Halaman Hasil Diagnosa.php">
<!-- menampilkan daftar gejala-->
<?php
$sqli="SELECT * FROM db_gejala_pertanyaan";
$result=$db->query($sqli);
while($row=$result->fetch_object()){
	echo "<hr> ";
	echo "<input style='cursor: pointer; width:20px;height:20px;' type='checkbox' name='evidence[]' value='{$row->id}'"
	     .(isset($_POST['evidence'])?(in_array($row->id,$_POST['evidence'])?" checked":""):"")
	    .">&ensp; {$row->id}. {$row->name}<br>";
	
}
?>
<hr>
<br>
   <button onclick="return confirm('Apakah jawaban sudah sesuai dengan gejala yang dialami saat ini ?');" style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);"><b> PROSES </b></button>

</form>
<?php
	//-- Mengambil Nilai Belief Gejala Yang dipilih
if(isset($_POST['evidence'])){
	if(count($_POST['evidence'])<2){
		echo "<script> alert ('Pilih minimal 2 gejala') </script>";
	}
}
?>
  <br>
  <hr width="1100px;" color="DodgerBlue" size="2">  <!--Membuat garis berwarna biru -->
  <hr color="DodgerBlue" size="4"> <!--Membuat garis berwarna biru -->
  <br>
  <form action="Halaman Dashboard.php" method="POST" name="input" style="text-align: center;">
      <button onclick="return confirm('Apakah anda ingin membatalkan proses diagnosa ?');" style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);"><b> BATAL </b></button>
  </form>
 <b><p style = "color:DodgerBlue; text-align:center;"> @Pemrograman Web 2020 - EASA </p></b>
</html>