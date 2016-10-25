<?php  session_start();
if(isset($_SESSION['level']))
{
	session_destroy();
	header('Location:../index.php?status=Terimakasih, Anda sudah Keluar');
}else{
	session_destroy();
	header('Location:../index.php?status=Silahkan Login!');
}
?>