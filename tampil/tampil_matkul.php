<?php 

	include "koneksi.php";

	// mengambil data matkul
	$id_semester = $_GET['id_semester'];
	$query = "SELECT * FROM mata_kuliah WHERE id_semester = $id_semester ORDER BY nama_matkul";
	$tampil_matkul = mysqli_query($koneksi, $query);
	$banyak_matkul = mysqli_num_rows($tampil_matkul);

	// mengambil data semester (untuk ditampilkan di header)
	$query = "SELECT semester FROM semester WHERE id_semester = $id_semester";
	$query_semester = mysqli_query($koneksi, $query);
	$data_semester = mysqli_fetch_assoc($query_semester);
 ?>