<?php
include 'conn/conn.php';

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = md5(mysqli_real_escape_string($conn,$_POST['password']).'H4ND1P12');


$query    = "SELECT * FROM t_user WHERE username = '$username' AND password = '$password'";
$runquery = $connect->query($query);

if($runquery->num_rows > 0){
	session_start();
	$_SESSION['username'] = $username;
	header("Location: home.php");
} else {
	echo '<h1>
	Username atau Kata Sandi Salah!</h1>
	';
}

?>