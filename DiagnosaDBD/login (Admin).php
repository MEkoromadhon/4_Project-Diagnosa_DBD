<?php 
include 'config.php';
 
$username = $_POST['username'];
$password = $_POST['password']; //md5($_POST['password']); KHUSUS PASSWORD MD5

$login = mysqli_query($konek,"select * from login_admin where Email='$username' and Password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;  

    $row=mysqli_fetch_assoc($login);
    $nama = $row['Nama'];
	
	$_SESSION['Nama'] = $nama;
	
	$_SESSION['status'] = "login";
	header("location:Halaman Dashboard (Admin).php");
}else{
	header("location:Halaman Login (Admin).php");	
}
?>