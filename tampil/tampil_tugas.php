<?php 

	include "koneksi.php";

	// mengambil data tugas
	$id_semester = $_GET['id_semester'];
	$id_matkul = $_GET['id_matkul'];

	// tugas aktif
	$query = "SELECT * FROM tugas WHERE id_semester = $id_semester AND id_matkul = $id_matkul AND status = 'Belum Selesai' ORDER BY deadline";
	$tampil_tugas_aktif = mysqli_query($koneksi, $query);

	// tugas selesai
	$query = "SELECT * FROM tugas WHERE id_semester = $id_semester AND id_matkul = $id_matkul AND status = 'Selesai'";
	$tampil_riwayat_tugas = mysqli_query($koneksi, $query);

	// mengambil data semester & matkul (untuk ditampilkan di header)
	$query = "SELECT semester FROM semester WHERE id_semester = $id_semester";
	$query_semester = mysqli_query($koneksi, $query);
	$data_semester = mysqli_fetch_assoc($query_semester);

	$query = "SELECT nama_matkul FROM mata_kuliah WHERE id_matkul = $id_matkul";
	$query_matkul = mysqli_query($koneksi, $query);
	$data_matkul = mysqli_fetch_assoc($query_matkul);

 ?>