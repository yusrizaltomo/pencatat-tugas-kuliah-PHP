<?php 
	include "../koneksi.php";

	if (isset($_GET['id_semester']) AND isset($_GET['id_matkul'])) {
		$id_matkul = $_GET['id_matkul'];
		$id_semester = $_GET['id_semester'];

		$query = "DELETE FROM mata_kuliah WHERE id_matkul = $id_matkul AND id_semester = $id_semester";
		mysqli_query($koneksi, $query);
		if (mysqli_affected_rows($koneksi) > 0) {
			echo "<script>
				alert('hapus data berhasil');
				document.location.href = '../hlm_matkul.php?id_semester=$id_semester';
			</script>";
		} else {
			echo "<script>
				alert('hapus data gagal');
				document.location.href = '../hlm_matkul.php?id_semester=$id_semester';
			</script>";
		}
	}


 ?>