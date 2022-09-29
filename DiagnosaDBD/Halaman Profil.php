<!DOCTYPE html>
<html>
<head>
  <title> PROFIL </title>
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
<body> <br>
<h1 style = "text-align:center; color:White;"> PROFIL </h1>

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
    
    $profilupdate = $_POST['named1']; // named1 diambil dari input Text diHalaman Dashboard.php
    $sql = "SELECT * FROM daftarakun WHERE Nama='$profilupdate'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  ?>

<!---------------------------- Program Bagian Input ------------------------> 
<form action="Update Sukses.php" method="POST" name="input"> <br>
  <fieldset style="border-color: white;">
    <table style="width:30%; margin-left:auto;margin-left:220px;"> <br>
      <tr>
        <th style="color: White"> ID Pendaftar </th>
        <th style="color: White"> : </th> <!--required = validasi input tidak boleh kosong-->
        <th><input name="idx" type="text" value="<?php echo $row['id']; ?>" style="width: 50%" disabled></th>
        <input type="hidden" name="idx" value="<?php echo $row['id']; ?>">
      </tr>
      <tr>
        <th style="color: White"> Nama Lengkap </th>
        <th style="color: White"> : </th> <!--required = validasi input tidak boleh kosong-->
        <th><input name="Nama Lengkap" type="text" style="width: 300%; height: 19px;" value="<?php echo $row['Nama']; ?>"></th>
      </tr>
      <tr>
        <th style="color: White"> Tempat/Tanggal Lahir </th>
        <th style="color: White"> : </th>
        <th><input name="Tempat/Tanggal Lahir" type="text" style="width: 300%; height: 19px;" value="<?php echo $row['TTL']; ?>"></th>
      </tr>
      <tr>
        <th style="color: White"> Jenis Kelamin </th>
        <th style="color: White"> : </th>
      <th>
        <select name="Jenis_Kelamin" style="width: 120px; height: 27px;">
          <?php
            if($row['JenisKelamin'] == "Laki - Laki"){ 
                echo "<option value='Laki - Laki' selected> Laki - Laki </option>";
            } else { 
                echo "<option value='Laki - Laki'> Laki - Laki </option>";
            }
            if($row['JenisKelamin'] == "Perempuan"){ 
              echo "<option value='Perempuan' selected> Perempuan </option>";
            } else { 
              echo "<option value='Perempuan'> Perempuan </option>";
            }
          ?>
        </select>
      </tr>
      <tr>
        <th style="color: White"> Alamat </th>
        <th style="color: White"> : </th>
        <th><input name="Alamat" type="text" style="width: 300%; height: 19px;" value="<?php echo $row['Alamat']; ?>"></th>
      </tr>
      <tr>
        <th style="color: White"> No. Handphone </th>
        <th style="color: White"> : </th>
        <th><input name="No_Handphone" type="text" style="width: 80%; height: 19px;" onkeypress="return event.charCode >= 48 && event.charCode <=57 " value="<?php echo $row['No_HP']; ?>"></th> <!--onkeypress = membuat input hanya boleh diisi angka dan kode char didalam pemograman web, untuk angka adalah 48 – 57, jika kita hitung 48, 49, 50, 51, 52, 53, 54, 55, 56, 57. Itu berjumalah 10. Yaitu 0-9. -->
      </tr>
      <tr>
        <th style="color: White"> Email </th>
        <th style="color: White"> : </th>
        <th><input name="Emailku" type="text" disabled style="width: 300%; height: 19px;" value="<?php echo $row['Email']; ?>"></th>
        <input type="hidden" name="Emailku" value="<?php echo $row['Email']; ?>">
      </tr>
    </table>
  <br>
  <th><th><th><input class="btn2" style="width: 130px; height: 40px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240); margin-left: 430px;"  type="submit" name="input" value="Update" onclick="alert('Update Data telah berhasil . . .');">
  <form action="Halaman Dashboard - Informasi DBD.html" method="POST" name="input">
     <button class="btn2" style="width: 130px; height: 40px; margin-left: 1200px; cursor: pointer; box-shadow: 0 0 10px rgb(255, 250, 240);"><b> BATAL </b></button>
  </form>
  <p>
<hr>
</fieldset>
  <br><br><br><br><br>
    <p style = "text-align:center;"> @Pemrograman Web 2020 - EASA </p>
</body>
</html>
