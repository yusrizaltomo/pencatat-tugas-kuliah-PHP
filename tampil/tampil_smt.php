<?php 

	include "koneksi.php";

	// ambil data semester lalu urutkan berdasarkan semesternya
	$tampil_smt = mysqli_query($koneksi, "SELECT * FROM semester ORDER BY semester");
	$banyak_smt = mysqli_num_rows($tampil_smt);

 ?>