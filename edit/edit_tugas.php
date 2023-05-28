<?php 

include "../koneksi.php";

if (isset($_POST['submit'])) {
	$id_semester = $_POST['id_semester'];
	$id_matkul = $_POST['id_matkul'];
	$id_tugas = $_POST['id_tugas'];
	$nama_tugas = $_POST['nama_tugas'];
	$deskripsi_tugas = $_POST['deskripsi_tugas'];
	$deadline = $_POST['deadline'];

	$query = "UPDATE tugas SET nama_tugas = '$nama_tugas', deskripsi_tugas = '$deskripsi_tugas', deadline = '$deadline' WHERE id_tugas = $id_tugas AND id_matkul = $id_matkul AND id_semester = $id_semester";
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