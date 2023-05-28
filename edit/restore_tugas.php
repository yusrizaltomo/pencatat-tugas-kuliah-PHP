<?php 

include "../koneksi.php";

if (isset($_GET['id_tugas']) AND isset($_GET['id_semester']) AND isset($_GET['id_matkul'])) {
	$id_tugas = $_GET['id_tugas'];
	$id_matkul = $_GET['id_matkul'];
	$id_semester = $_GET['id_semester'];

	// mengubah status kembali menjadi belum selesai
	$query = "UPDATE tugas SET status = 'Belum Selesai' WHERE id_tugas = $id_tugas AND id_matkul = $id_matkul AND id_semester = $id_semester";
	mysqli_query($koneksi, $query);
	if (mysqli_affected_rows($koneksi) > 0) {
		echo "<script>
			alert('update data berhasil');
			document.location.href = '../hlm_tugas.php?id_semester=$id_semester&id_matkul=$id_matkul';
		</script>";
	} else {
		echo "<script>
			alert('update data gagal');
			document.location.href = '../hlm_tugas.php?id_semester=$id_semester&id_matkul=$id_matkul';
		</script>";
	}
}



 ?>