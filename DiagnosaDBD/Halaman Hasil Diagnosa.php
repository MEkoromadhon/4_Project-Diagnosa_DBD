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
<input readonly style="text-align: center; width: 300px; height: 20px;" type="hidden" name="nama" value="<?php echo $_SESSION['Nama']; ?>">
<hr color="DodgerBlue" size="5">  <!--Membuat garis berwarna biru -->
<br>
<h1 style = "text-align:center; color:DodgerBlue;"> DIAGNOSA </h1>
<h1 style = "text-align:center; color:DodgerBlue;"> --- HASIL DIAGNOSA --- </h1>
<br><hr color="DodgerBlue" size="4">  <!--Membuat garis berwarna biru -->
<b><font size="5"> <!--Untuk mengatur Size pada Kalimat-->
<div class="container"> <!--mengelompokkan atau menampung komponen tertentu ke dalam satu grup.-->
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

<pre> <!--Agar tersusun rapih-->
<?php
	//------------------------------------------------- Mengambil Nilai Belief Gejala Yang dipilih
	if(isset($_POST['evidence'])){
		if(count($_POST['evidence'])<2){
		echo "<script> alert ('Pilih minimal 2 gejala') </script>";
		}else{
			$sql = "SELECT GROUP_CONCAT(b.code), a.bobot
			FROM db_perhitungan a
			JOIN db_jenis_penyakit b ON a.id_jenis_penyakit=b.id
			WHERE a.id_gejala_pertanyaan IN(".implode(',',$_POST['evidence']).") 
			GROUP BY a.id_gejala_pertanyaan";
			$result=$db->query($sql);
			$evidence=array();
			while($row=$result->fetch_row()){
				$evidence[]=$row;
			}
		//--------------------------------------------- menentukan environement
		$sql="SELECT GROUP_CONCAT(code) FROM db_jenis_penyakit";
		$result=$db->query($sql);
		$row=$result->fetch_row();
		$fod=$row[0];

		//---------------------------------------------- menentukan nilai densitas
		echo "<hr color='Black' size='2'>  <!--Membuat garis berwarna biru -->";
		echo "<br>";
		echo "<b> ===== MENENTUKAN NILAI DENSITAS ===== </b>\n";
		$densitas_baru=array();
		while(!empty($evidence)){
			$densitas1[0]=array_shift($evidence);
			$densitas1[1]=array($fod,1-$densitas1[0][1]);
			$densitas2=array();
			if(empty($densitas_baru)){
				$densitas2[0]=array_shift($evidence);
			}else{
				foreach($densitas_baru as $k=>$r){
					if($k!="&theta;"){
						$densitas2[]=array($k,$r);
					}
				}
			}
			$theta=1;
			foreach($densitas2 as $d) $theta-=$d[1];
			$densitas2[]=array($fod,$theta);
			$m=count($densitas2);
			$densitas_baru=array();
			for($y=0;$y<$m;$y++){
				for($x=0;$x<2;$x++){
					if(!($y==$m-1 && $x==1)){
						$v=explode(',',$densitas1[$x][0]);
						$w=explode(',',$densitas2[$y][0]);
						sort($v);
						sort($w);
						$vw=array_intersect($v,$w);
						if(empty($vw)){
							$k="&theta;";
						}else{
							$k=implode(',',$vw);
						}
						if(!isset($densitas_baru[$k])){
							$densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
						}else{
							$densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
						}
					}
				}
			}
			foreach($densitas_baru as $k=>$d){
				if($k!="&theta;"){
					$densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
				}
			}
			print_r($densitas_baru); // Tidak ditampilkan 
		}
		
		//------------------------------------- perangkingan
		echo "<br>";
		echo "<b> ===== PERANGKINGAN (JUMLAH TOTAL) ===== </b>\n";
		unset($densitas_baru["&theta;"]);
		arsort($densitas_baru);
		print_r($densitas_baru); // Tidak di tampilkan
		
		//------------------------------------- menampilkan hasil akhir
		echo "<br>";
		echo "<hr color='Black' size='2'>  <!--Membuat garis berwarna Hitam -->";
		echo "<p style = 'text-align:center;'>";
		echo "<b> ===== HASIL AKHIR ===== </b>\n";
		$codes=array_keys($densitas_baru); 
		$final_codes=explode(',',$codes[0]);
        $sql="SELECT GROUP_CONCAT(name)  
        FROM db_jenis_penyakit  
        WHERE code IN('".implode("','",$final_codes)."')"; 
        $result=$db->query($sql); 
        $row=$result->fetch_row();
        echo "<br>"; 
        echo "Terdeteksi penyakit <b>{$row[0]}</b> dengan derajat kepercayaan ".round($densitas_baru[$codes[0]]*100,2)."%";
        echo "<br><br><br>";
        echo "<hr color='Black' size='2'>  <!--Membuat garis berwarna Hitam -->";
	}
}
?>
</div>
<hr color="DodgerBlue" size="4">  <!--Membuat garis berwarna biru -->
<br>
<form method="POST" action="Insert Hasil Diagnosa.php" name="inputhasil">
<!--Proses dalam bentuk textbox dengan Hidden-->
<input readonly style="text-align: center; width: 300px; height: 20px;" type="hidden" name="nama1" value="<?php echo $_SESSION['Nama']; ?>">
<input readonly style="text-align: center; width: 300px; height: 20px;" type="hidden" name="penyakit1" value="<?php echo $row[0]; ?>">
<input readonly style="text-align: center; width: 300px; height: 20px;" type="hidden" name="hasildiagnosis1" value="<?php echo round($densitas_baru[$codes[0]]*100,2)."%" ?>">
	
	<button style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);" type="Submit" name="inputhasil" value="Submit"><b> SIMPAN </b></button>
</form>
<br><br>
<form action="Mulai Diagnosa - Pertanyaan (Dempster_Shafer).php" method="POST" name="input" style="text-align: right;">
      <button style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);"><b> KEMBALI </b></button>
</form>
 <p style = "text-align:center;"> @Pemrograman Web 2020 - EASA </p>  
</html>