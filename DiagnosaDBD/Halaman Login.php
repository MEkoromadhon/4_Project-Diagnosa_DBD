<?php
	session_start();
	include "koneksiDB.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title> LOGIN </title>
        <link rel="stylesheet" href="style_HalamanLogin.css"> <!--Style sheet dalam atribut link rel bermakna untuk memberitahu browser bahwa file eksternal yang disisipkan berjenis style sheet dengan ekstensi .css.-->
        <style> body {background-color: DodgerBlue;} </style> <!--Background Dasar (Css)-->
</head>
<body>
  <br>
  <h1 style = "text-align:center; color:White;"><b> DIAGNOSA PENYAKIT DBD </b></h1>
     <div class="container"> <!--mengelompokkan atau menampung komponen tertentu ke dalam satu grup.-->
        <h1 style="text-align: center;">Login</h1>
          
           <form action="login.php" method="post" >
			<div>
				<label><b> Email </b></label><br>
				<input type="text" name="username" id="username" autofocus="Email" required />
			</div>
			<div>
				<label><b> Password </b></label><br>
				<input type="password" name="password" id="password" required />
			</div>			
			<div>
				<button type="submit" value="Login" class="tombol"> Login </button>
			</div>
		</form>

        <br>
        <form action="Halaman Tampilan Awal.html" method="POST" name="input">
              <button> Batal </button>
        </form>
     </div> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <p style = "text-align:center;"> @Pemrograman Web 2020 - EASA </p>  
</body>

<script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Email dan Password harus di isi !');
			return false;
		}
	}
</script>
</html>
