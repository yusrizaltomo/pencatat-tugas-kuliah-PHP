<?php 

	$hostname = "localhost";
	$user = "root";
	$password = "";
	$nama_db = "projek_jadwal_tugas";

	$koneksi = mysqli_connect($hostname, $user, $password, $nama_db) or die (mysqli_error());

	// if ($koneksi) {
	// 	echo "koneksi berhasil";
	// } else echo "koneksi gagal";

?>