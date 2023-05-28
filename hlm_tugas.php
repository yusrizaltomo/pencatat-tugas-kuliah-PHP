<?php 
	include "tampil/tampil_tugas.php";
	include "functions.php";

	// untuk menampilkan data pada input form edit
	if (isset($_GET['id_matkul']) AND isset($_GET['id_semester']) AND isset($_GET['id_tugas'])) {

		// mengambil data dari url yang dikirim oleh tombol edit tugas
		$id_semester = $_GET['id_semester'];
		$id_matkul = $_GET['id_matkul'];
		$id_tugas = $_GET['id_tugas'];

		$query = mysqli_query($koneksi, "SELECT * FROM tugas WHERE id_tugas = $id_tugas AND id_semester = $id_semester AND id_matkul = $id_matkul");
		$data_edit_tugas = mysqli_fetch_assoc($query);
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pengusik Pikiran</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- tombol kembali -->
	<a href="hlm_matkul.php?id_semester=<?php echo $_GET['id_semester'] ?>" class="kembali"><<</a>

	<!-- header -->
	<h1>Tugas <?php echo $data_matkul['nama_matkul'] ?></h1>
	<h1>Semester <?php echo $data_semester['semester'] ?></h1>

	<!-- 'tombol' buat baru -->
	<a href="hlm_tugas.php?id_semester=<?php echo $_GET['id_semester'] ?>&id_matkul=<?php echo $_GET['id_matkul'] ?>&buat_baru" class="tombol">BUAT BARU (+)</a>

	<!-- tampilkan form pembuatan -->
	<?php if (isset($_GET['buat_baru'])): ?>
		<div class="form">
		<!-- menentukan tujuan form -->
		<?php if (isset($data_edit_tugas)): ?>
			<p class="judul-form">Form Edit Tugas</p>
			<form method="post" action="edit/edit_tugas.php">
		<?php else: ?>
			<p class="judul-form">Form Pembuatan Tugas Baru</p>
			<form method="post" action="proses/proses_tugas.php">
		<?php endif ?>
			
				<!-- input hidden -->
				<input type="hidden" name="id_semester" value="<?php echo $_GET['id_semester'] ?>">
				<input type="hidden" name="id_matkul" value="<?php echo $_GET['id_matkul'] ?>">
				<input type="hidden" name="id_tugas" value="<?php if(isset($data_edit_tugas)) echo $data_edit_tugas['id_tugas'] ?>">

				<!-- input -->
				<label>Masukkan nama tugas baru</label><br>
				<input type="text" name="nama_tugas" value="<?php if(isset($data_edit_tugas)) echo $data_edit_tugas['nama_tugas'] ?>" required autofocus><br><br>

				<label>Masukkan deskripsi tugas</label><br>
				<textarea name="deskripsi_tugas" rows="15" cols="40" required><?php if(isset($data_edit_tugas)) echo $data_edit_tugas['deskripsi_tugas'] ?></textarea><br><br>

				<label>Deadline</label><br>
				<input type="date" name="deadline" value="<?php if(isset($data_edit_tugas)) echo $data_edit_tugas['deadline'] ?>" required><br><br>

				<!-- tombol submit & cancel -->
				<button type="submit" name="submit" class="tombol">Submit</button>
				<a href="hlm_tugas.php?id_semester=<?php echo $_GET['id_semester'] ?>&id_matkul=<?php echo $_GET['id_matkul'] ?>" class="tombol">Cancel</a>
			</form>
		</div>
	<?php endif ?>

	<!-- cetak kotak -->
	<h2>Tugas Aktif:</h2>
	<div class="bungkus_kotak">
	<?php if (mysqli_num_rows($tampil_tugas_aktif) > 0): ?>
		<?php while($data = mysqli_fetch_assoc($tampil_tugas_aktif)) { ?>
			
			<!-- memanggil fungsi sisa_deadline -->
			<?php $sisa_deadline = sisa_deadline($data['deadline']) ?>

			<!-- menentukan warna kotak -->
			<?php if ($sisa_deadline <= 2): ?>
				<div class="kotak-merah">
			<?php elseif ($sisa_deadline <= 7): ?>
				<div class="kotak-kuning">
			<?php else: ?>
				<div class="kotak">
			<?php endif ?>

					<!-- tombol-tombol -->
					<a href="hlm_tugas.php?id_semester=<?php echo $_GET['id_semester'] ?>&id_matkul=<?php echo $_GET['id_matkul'] ?>&id_tugas=<?php echo $data['id_tugas'] ?>&buat_baru">Edit</a>
					<a href="hapus/hapus_tugas.php?id_tugas=<?php echo $data['id_tugas'] ?>&id_matkul=<?php echo $_GET['id_matkul'] ?>&id_semester=<?php echo $_GET['id_semester'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
					<a href="edit/selesai_tugas.php?id_tugas=<?php echo $data['id_tugas'] ?>&id_matkul=<?php echo $_GET['id_matkul'] ?>&id_semester=<?php echo $_GET['id_semester'] ?>">Selesai</a>
					<hr><br>

					<!-- menampilkan data -->
					<p class="judul_kotak"><?php echo $data['nama_tugas'] ?></p>
					<p>Deadline: <?php echo date("d-m-Y", strtotime($data['deadline'])) ?></p>
					<p>Sisa deadline : <?php echo $sisa_deadline ?> hari</p>
					<hr>
					<p class="deskripsi_tugas"><?php echo $data['deskripsi_tugas'] ?></p>

				</div>
		<?php } ?>
	<?php else: ?>
		<h3>Tidak Ada Tugas Aktif</h3>
	<?php endif ?>
	</div>

	<!-- bagian riwayat tugas -->
	<h2>Riwayat Tugas:</h2>
	<div class="bungkus_kotak">
	<?php if (mysqli_num_rows($tampil_riwayat_tugas) > 0): ?>
		<?php while($data = mysqli_fetch_assoc($tampil_riwayat_tugas)) { ?>
			<div class="kotak">

				<!-- tombol-tombol -->
				<a href="edit/restore_tugas.php?id_tugas=<?php echo $data['id_tugas'] ?>&id_matkul=<?php echo $_GET['id_matkul'] ?>&id_semester=<?php echo $_GET['id_semester'] ?>">Restore</a>
				<a href="hapus/hapus_tugas.php?id_tugas=<?php echo $data['id_tugas'] ?>&id_matkul=<?php echo $_GET['id_matkul'] ?>&id_semester=<?php echo $_GET['id_semester'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
				<hr><br>

				<!-- data -->
				<p class="judul_kotak" style="word-wrap: break-word;"><?php echo $data['nama_tugas'] ?></p>
				<p>Deadline: <?php echo date("d-m-Y", strtotime($data['deadline'])) ?></p>
				<hr>
				<p class="deskripsi_tugas"><?php echo $data['deskripsi_tugas'] ?></p>
				
			</div>
		<?php } ?>
	<?php else: ?>
		<h3>Riwayat Tugas Masih Kosong</h3>
	<?php endif ?>
	</div>
</body>
</html>