<?php 

include "../koneksi.php";

if (isset($_POST['submit'])) {
	$id_semester = $_POST['id_semester'];
	$id_matkul = $_POST['id_matkul'];
	$nama_matkul = $_POST['nama_matkul'];

	// cek apakah data sudah pernah dibuat
	$query = "SELECT * FROM mata_kuliah WHERE nama_matkul = '$nama_matkul' AND id_semester = $id_semester";
	$cek_data = mysqli_query($koneksi, $query);
	if (mysqli_num_rows($cek_data) > 0) {
		echo "<script>
			alert('data ini sudah ada');
			document.location.href = '../hlm_matkul.php?id_semester=$id_semester';
		</script>";
		exit;
	}

	$query = "UPDATE mata_kuliah SET nama_matkul = '$nama_matkul' WHERE id_matkul = $id_matkul AND id_semester = $id_semester";
	mysqli_query($koneksi, $query);
	if (mysqli_affected_rows($koneksi) > 0) {
		echo "<script>
			alert('update data berhasil');
			document.location.href = '../hlm_matkul.php?id_semester=$id_semester';
		</script>";
	} else {
		echo "<script>
			alert('update data gagal');
			document.location.href = '../hlm_matkul.php?id_semester=$id_semester';
		</script>";
	}
}



 ?>