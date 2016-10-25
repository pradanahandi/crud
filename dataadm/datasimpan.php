<?php
	include "../conn/conn.php";
	$judul = $_POST['judul'];
	$keterangan = $_POST['keterangan'];
	$file_video = $_FILES['file_video']['name'];
	$file_doc = $_FILES['file_doc']['name'];
	$status = "1";

	$folder1 = "../assets/video/". basename($_FILES['file_video']['name']);
	if(move_uploaded_file($_FILES['file_video']['tmp_name'], $folder1)){
		echo "Sukses";
	}	
	$folder2 = "../assets/dok". basename($_FILES['file_doc']['name']);
	if(move_uploaded_file($_FILES['file_doc']['tmp_name'], $folder2)){
		echo "Berhasil";
	}
	$cekdata = "SELECT JUDUL FROM t_isi WHERE judul = '$judul'";
	$ada = $conn->query($cekdata);
	if(mysqli_num_rows($ada)>0) {
		echo '<script>
		alert("JUDUL TERDAFTAR !"); window.location="index.php"; </script>';
		exit();
	}else{
		$simpan=("INSERT INTO t_isi VALUES ('','$judul','$keterangan','$file_video', '$file_doc', '$status')");
		$conn->query($simpan);
	}
	echo  '<script>
		alert("DATA TERSIMPAN") ; window.location="index.php";</script>';	

?>