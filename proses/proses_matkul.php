<?php 

	include "../koneksi.php";

	if (isset($_POST['submit'])) {
		$nama_matkul = $_POST['nama_matkul'];
		$id_semester = $_POST['id_semester'];
		
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

		// buat data baru
		$query = "INSERT INTO mata_kuliah VALUES ('', '$id_semester', '$nama_matkul')";
		mysqli_query($koneksi, $query);
		if (mysqli_affected_rows($koneksi) > 0) {
			echo "<script>
				alert('pembuatan berhasil');
				document.location.href = '../hlm_matkul.php?id_semester=$id_semester';
			</script>";
		} else {
			echo "<script>
				alert('pembuatan gagal');
				document.location.href = '../hlm_matkul.php?id_semester=$id_semester';
			</script>";
		}
	}

 ?>