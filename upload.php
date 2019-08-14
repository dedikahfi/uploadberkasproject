<?php
require_once 'config.php';

if(ISSET($_POST['submit'])){
	if($_FILES['upload']['name'] != "") {
		$file = $_FILES['upload'];
		$file_nosurat = $_POST['nosurat'];
		$file_tanggal = $_POST['tanggal'];
		$file_asaldepartemen = $_POST['asaldepartemen'];
		$file_departementujuan = $_POST['departementujuan'];
		$file_perihal = $_POST['perihal'];
		$file_jumlahlampiran = $_POST['jumlahlampiran'];
		$file_cuplikanredaksisurat = $_POST['cuplikanredaksisurat'];
		$file_jenissurat = $_POST['listsurat'];
		//$file_tglup = $_POST['tglupload'];

		$file_name = $file['name'];
		$file_temp = $file['tmp_name'];
		$name = explode('.', $file_name);
		$path = "files/".$file_name;
		
		$conn->query("INSERT INTO `file` (name, file, tanggal, nosurat, asaldepartemen, departementujuan, perihal, jumlahlampiran, cuplikanredaksisurat, jenissurat) VALUES('$name[0]', '$path', '$file_tanggal', '$file_nosurat', '$file_asaldepartemen', '$file_departementujuan', '$file_perihal', '$file_jumlahlampiran', '$file_cuplikanredaksisurat', '$file_jenissurat')") or die(mysqli_error($conn));
		
		move_uploaded_file($file_temp, $path);
		header("location:index.php");
		
	}else{
		echo "<script>alert('Required Field!')</script>";
		echo "<script>window.location='index.php'</script>";
	}
}
?>