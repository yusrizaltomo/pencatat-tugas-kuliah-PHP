<?php 

	include "../koneksi.php";

	if (isset($_POST['submit'])) {
		$semester = $_POST['semester'];
		
		// cek apakah data sudah pernah dibuat
		$query = "SELECT * FROM semester WHERE semester = $semester";
		$cek_data = mysqli_query($koneksi, $query);
		if (mysqli_num_rows($cek_data) > 0) {
			echo "<script>
				alert('data ini sudah ada');
				document.location.href = '../index.php';
			</script>";
			exit;
		}

		// buat data baru
		$query = "INSERT INTO semester VALUES ('', '$semester')";
		mysqli_query($koneksi, $query);
		if (mysqli_affected_rows($koneksi) > 0) {
			echo "<script>
				alert('pembuatan berhasil');
				document.location.href = '../index.php';
			</script>";
		} else {
			echo "<script>
				alert('pembuatan gagal');
				document.location.href = '../index.php';
			</script>";
		}
	}

 ?>