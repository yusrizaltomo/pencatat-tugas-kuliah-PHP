<?php 

include "koneksi.php";

// mengambil sisa deadline, ditampilkan di halaman tugas
function sisa_deadline($deadline){
	$hari_ini = date('Y-m-d');

	$selisih = strtotime($deadline) - strtotime($hari_ini);
	$selisih = $selisih / 86400;
	$selisih = floor($selisih);

	return $selisih;
}

// untuk menghitung jumlah tugas, ditampilkan di halaman matkul
function hitung_jumlah_tugas($id_matkul, $id_semester){
	global $koneksi;
	$query = mysqli_query($koneksi, "SELECT * FROM tugas WHERE id_matkul = $id_matkul AND id_semester = $id_semester AND status = 'Belum Selesai'");
	$jumlah_tugas = mysqli_num_rows($query);

	return $jumlah_tugas;
}

// untuk menghitung jumlah matkul, ditampilkan di halaman index
function hitung_jumlah_matkul($id_semester){
	global $koneksi;
	$query = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE id_semester = $id_semester");
	$jumlah_matkul = mysqli_num_rows($query);

	return $jumlah_matkul;
}


 ?>