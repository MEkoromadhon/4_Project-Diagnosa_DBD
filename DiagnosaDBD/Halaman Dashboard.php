<!DOCTYPE html>
<html>
<head>
	<title> DASHBOARD </title>
		 <link rel="stylesheet" href="style_HalamanDashboard.css"> <!--Style sheet dalam atribut link rel bermakna untuk memberitahu browser bahwa file eksternal yang disisipkan berjenis style sheet dengan ekstensi .css.-->
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
<h1 style = "text-align:center; color:White;"> DASHBOARD </h1>

<!--Untuk Menampilkan Nama Lengkap diDashboard-->
  <?php 
    include 'config.php';
    // mengaktifkan session
    session_start();
 
    // cek apakah user telah login, jika belum login maka di alihkan ke halaman login
    if($_SESSION['status'] !="login"){
        header("location: Halaman Login.php");
    }
 
    // menampilkan pesan selamat datang
    echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Hai, Selamat Datang.";
  ?>
    <a href="logout.php"><button onclick="return confirm('Apakah anda yakin ingin Log out akun?');" style="margin-top: 18px; margin-left: 1300px; background-color:#FF6347; color: white; width: 100px; height: 35px; cursor: pointer; box-shadow: 0 0 10px rgb(250, 99, 71);"><b> LOG OUT </b></button></a> <!--onclick="return confirm() = Untuk menampilkan pesan konfirmasi Yes atau No-->
<div class="container"> <!--mengelompokkan atau menampung komponen tertentu ke dalam satu grup.-->
    <br>
        <form action="Halaman Dashboard - Informasi DBD.html" method="POST" name="input">
            <button class="btn"><b> INFORMASI PENYAKIT DBD </b></button> <!--Membuat class="btn" diambil dari css-->
        </form>
        <br>
       	<form action="Halaman Dashboard - History Diagnosa.php" method="POST" name="input">
            <button class="btn" type="submit" value="Cari" ><b> HISTORY DIAGNOSA </b></button> <!--Membuat class="btn" diambil dari css-->

          <?php 
             include 'config2.php';
          ?>

          <input readonly style="text-align: center; margin-left: 270px;" type="hidden" name="cari" value="<?php echo $_SESSION['Nama']; ?>">
          <!--Type = hidden : membuat input tidak terlihat-->
 
          <?php 
            if(isset($_POST['named1'])){ // named1 didapat dari input profil (menyamakan berdasarkan nama)
            $cari = $_POST['named1'];
            }
          ?>
        </form>
        <br><br>
          <img src="Diagnosa2.png" alt="LOGO DIAGNOSA" style="width:90px;height:90px; display: block; margin: auto;"> <!--display: block; margin: auto; adalah membuat gambar berada di posisi tengah-->
        <br><br>
        <hr>
        <br>
        <form action="Mulai Diagnosa - Pertanyaan (Dempster_Shafer).php" method="POST" name="input">
          <button class="btn"><b> --- MULAI DIAGNOSA --- </b></button> <!--Membuat class="btn" diambil dari css-->
        </form>
        <br>
        <hr>
</div>

 <form action="Halaman Profil.php" method="POST" style="text-align: left;">
    <input class="btn" style="background-color:#2979ff; margin-left: 40px; color: white; width: 250px; height: 50px; cursor: pointer; box-shadow: 0 0 10px #87CEFA" type="submit" name="input" value="PROFIL">
    <p>
 	  <input readonly style="width: 250px; height: 30px; margin-top: 0px; margin-left: 37px;" type="text" name="named1" value="<?php echo $_SESSION['Nama']; ?>"><br>
 </form>
</table>

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <p style = "text-align:center;"> @Pemrograman Web 2020 - EASA </p>  
</html>