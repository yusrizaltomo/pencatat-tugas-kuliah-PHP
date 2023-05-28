<?php 

	include "../koneksi.php";

	if (isset($_POST['submit'])) {
		$id_semester = $_POST['id_semester'];
		$id_matkul = $_POST['id_matkul'];
		$nama_tugas = $_POST['nama_tugas'];
		$deskripsi_tugas = $_POST['deskripsi_tugas'];
		$deadline = $_POST['deadline'];

		// buat data baru
		$query = "INSERT INTO tugas VALUES ('', '$id_semester', '$id_matkul', '$nama_tugas', '$deskripsi_tugas', '$deadline', 'Belum Selesai')";
		mysqli_query($koneksi, $query);
		if (mysqli_affected_rows($koneksi) > 0) {
			echo "<script>
				alert('pembuatan berhasil');
				document.location.href = '../hlm_tugas.php?id_semester=$id_semester&id_matkul=$id_matkul';
			</script>";
		} else {
			echo "<script>
				alert('pembuatan gagal');
				document.location.href = '../hlm_tugas.php?id_semester=$id_semester&id_matkul=$id_matkul';
			</script>";
		}
	}

 ?>