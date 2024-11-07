<?php 
   session_start(); 
// menghubungkan dengan koneksi ke db langsung
$query=new mysqli('localhost', 'root', '', 'praktikum');
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$data = mysqli_query($query,"select * from user where username='$username' and password='$password'")or die (mysqli_error($query));
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status']   = "login";
	header("location:Home.php");
	//bbuat tugas CRUD header dimasukin ke home aja, kayaknya nanti bisa untuk semua
}else{
	header("location:index.php?pesan=gagal");
} ?>
