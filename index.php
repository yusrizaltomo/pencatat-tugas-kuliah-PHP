<?php 
	include "tampil/tampil_smt.php";
	include "functions.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Semester</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<!-- header -->
	<h1>Pilih Semester</h1>

	<!-- tombol buat baru -->
	<a href="index.php?buat_baru" class="tombol">BUAT BARU (+)</a>

	<!-- tampilkan form pembuatan -->
	<?php if (isset($_GET['buat_baru'])): ?>
		<div class="form">
		<!-- menentukan tujuan form -->
		<?php if (isset($_GET['id_semester'])): ?>
			<p class="judul-form">Form Edit Semester</p>
			<form method="post" action="edit/edit_smt.php">
		<?php else: ?>
			<p class="judul-form">Form Pembuatan Semester Baru</p>
			<form method="post" action="proses/proses_smt.php">
		<?php endif ?>

				<!-- input hidden -->
				<input type="hidden" name="id_semester" value="<?php if(isset($_GET['id_semester'])) echo $_GET['id_semester'] ?>">

				<!-- input -->
				<label>Pilih Semester: </label>
				<select name="semester" required autofocus>
					<?php for ($i=1; $i <= 8; $i++) : ?>
					<option><?php echo $i; ?></option>
					<?php endfor ?>
				</select><br><br>

				<!-- tombol submit & cancel -->
				<button type="submit" name="submit" class="tombol">Submit</button>
				<a href="index.php" class="tombol">Cancel</a>
				
			</form>
		</div>
	<?php endif ?>

	<br><br>

	<!-- cetak kotak -->
	<div class="bungkus_kotak">
	<?php if ($banyak_smt > 0): ?>
		<?php while($data = mysqli_fetch_assoc($tampil_smt)) { ?>
			
				<div class="kotak">

					<!-- tombol-tombol -->
					<a href="index.php?id_semester=<?php echo $data['id_semester'] ?>&buat_baru">Edit</a>
					<a href="hapus/hapus_smt.php?id_semester=<?php echo $data['id_semester'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
					<hr>

					<!-- data -->
					<a href="hlm_matkul.php?id_semester=<?php echo $data['id_semester'] ?>">
						<p class="judul_kotak">Semester <?php echo $data['semester'] ?></p>
						<p>Jumlah mata kuliah: <?php echo hitung_jumlah_matkul($data['id_semester']) ?></p>
					</a>

					
				</div>
			
		<?php } ?>
	<?php else: ?>
		<h3>Belum Ada Semester</h3>
	<?php endif ?>
	</div>
</body>
</html>