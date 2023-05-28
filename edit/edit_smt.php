<?php 

include "../koneksi.php";

if (isset($_POST['submit'])) {
	$id_semester = $_POST['id_semester'];
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

	// edit data
	$query = "UPDATE semester SET semester = $semester WHERE id_semester = $id_semester";
	mysqli_query($koneksi, $query);
	if (mysqli_affected_rows($koneksi) > 0) {
		echo "<script>
			alert('update data berhasil');
			document.location.href = '../index.php';
		</script>";
	} else {
		echo "<script>
			alert('update data gagal');
			document.location.href = '../index.php';
		</script>";
	}
}



 ?>