<?php 
	include "tampil/tampil_matkul.php";
	include "functions.php";

	// untuk menampilkan data pada input form edit
	if (isset($_GET['id_matkul']) AND isset($_GET['id_semester'])) {

		// menangkap data dari url yang dikirim oleh tombol edit matkul
		$id_semester = $_GET['id_semester'];
		$id_matkul = $_GET['id_matkul'];

		$query = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE id_semester = $id_semester AND id_matkul = $id_matkul");
		$data_edit_matkul = mysqli_fetch_assoc($query);
		
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mata Kuliah</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- tombol kembali -->
	<a href="index.php" class="kembali"><<</a>
	
	<!-- header -->
	<h1>Mata Kuliah Semester <?php echo $data_semester['semester'] ?></h1>

	<!-- tombol buat baru -->
	<a href="hlm_matkul.php?id_semester=<?php echo $_GET['id_semester'] ?>&buat_baru" class="tombol">BUAT BARU (+)</a>

	<!-- tampilkan form pembuatan -->
	<?php if (isset($_GET['buat_baru'])): ?>
		<div class="form">
		<!-- menentukan tujuan form -->
		<?php if (isset($data_edit_matkul)): ?>
			<p class="judul-form">Form Edit Mata Kuliah</p>
			<form method="post" action="edit/edit_matkul.php">
		<?php else: ?>
			<p class="judul-form">Form Pembuatan Mata Kuliah Baru</p>
			<form method="post" action="proses/proses_matkul.php">
		<?php endif ?>
			
				<!-- input hidden -->
				<input type="hidden" name="id_semester" value="<?php echo $_GET['id_semester'] ?>">
				<input type="hidden" name="id_matkul" value="<?php if(isset($data_edit_matkul)) echo $data_edit_matkul['id_matkul'] ?>">

				<!-- input -->
				<label>Masukkan nama mata kuliah: </label>
				<input type="text" name="nama_matkul" value="<?php if(isset($data_edit_matkul)) echo $data_edit_matkul['nama_matkul'] ?>" required autofocus><br><br>

				<!-- tombol submit & cancel -->
				<button type="submit" name="submit" class="tombol">Submit</button>
				<a href="hlm_matkul.php?id_semester=<?php echo $_GET['id_semester'] ?>" class="tombol">Cancel</a>

			</form>
		</div>
	<?php endif ?>

	<br><br>

	<!-- cetak kotak -->
	<div class="bungkus_kotak">
	<?php if ($banyak_matkul > 0): ?>
		<?php while($data = mysqli_fetch_assoc($tampil_matkul)) { ?>
			
				<?php $jumlah_tugas = hitung_jumlah_tugas($data['id_matkul'], $_GET['id_semester']) ?>

				<!-- menentukan warna kotak -->
				<?php if ($jumlah_tugas > 0): ?>
					<div class="kotak-kuning">
				<?php else: ?>
					<div class="kotak">
				<?php endif ?>

						<!-- tombol-tombol -->
						<a href="hlm_matkul.php?id_semester=<?php echo $_GET['id_semester'] ?>&id_matkul=<?php echo $data['id_matkul'] ?>&buat_baru">Edit</a>
						<a href="hapus/hapus_matkul.php?id_semester=<?php echo $_GET['id_semester'] ?>&id_matkul=<?php echo $data['id_matkul'] ?> " onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
						<hr>

						<a href="hlm_tugas.php?id_semester=<?php echo $data['id_semester'] ?>&id_matkul=<?php echo $data['id_matkul'] ?>">
							<!-- data -->
							<p class="judul_kotak"><?php echo $data['nama_matkul'] ?></p>
							<p>Jumlah tugas aktif: <?php echo $jumlah_tugas ?></p>
						</a>
						
					</div>
		<?php } ?>
	<?php else: ?>
		<h3>Belum Ada Mata Kuliah</h3>
	<?php endif ?>
	</div>
</body>
</html>