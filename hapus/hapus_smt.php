<?php 
	include "../koneksi.php";

	if (isset($_GET['id_semester'])) {
		$id_semester = $_GET['id_semester'];

		$query = "DELETE FROM semester WHERE id_semester = $id_semester";
		mysqli_query($koneksi, $query);
		if (mysqli_affected_rows($koneksi) > 0) {
			echo "<script>
				alert('hapus data berhasil');
				document.location.href = '../index.php';
			</script>";
		} else {
			echo "<script>
				alert('hapus data gagal');
				document.location.href = '../index.php';
			</script>";
		}
	}


 ?>