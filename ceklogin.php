<?php
include('koneksi.php');
$email=$_POST['email'];
$password=$_POST['pass'];
$query="select * from petugas where username='$email' AND password='$password'";
$data=mysqli_query($koneksi, $query);
$jumlah=mysqli_num_rows($data);
if($jumlah >=1){
	$row=mysqli_fetch_array($data);
	$level=$row['level'];
	if($level=='admin'){
		session_start();
		$_SESSION['level']=$level;
		header('Location:admin/');
	}else{
		session_start();
		$_SESSION['level']=$level;
	}
	$_SESSION['user']=$row['namapetugas'];
}
?>