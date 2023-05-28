-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mei 2022 pada 12.09
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_jadwal_tugas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `id_semester`, `nama_matkul`) VALUES
(10, 17, 'Pemrograman Web'),
(11, 17, 'Analisis & Desain Algoritma'),
(12, 17, 'Kecerdasan Buatan'),
(13, 17, 'Embedded Intelligence System'),
(14, 17, 'Statistika & Probabilitas'),
(15, 17, 'Rekayasa Perangkat Lunak'),
(21, 17, 'Sistem Operasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`) VALUES
(17, 4),
(21, 7),
(25, 5),
(26, 6),
(27, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `deskripsi_tugas` varchar(3000) NOT NULL,
  `deadline` date NOT NULL,
  `status` enum('Belum Selesai','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `id_semester`, `id_matkul`, `nama_tugas`, `deskripsi_tugas`, `deadline`, `status`) VALUES
(39, 17, 11, 'UAS', 'Buat laporan yang membahas tentang sebuah algoritma\r\n\r\nboleh melanjutkan tema laporan UTS', '2022-05-28', 'Belum Selesai'),
(42, 17, 13, 'Projek UAS', 'presentasi hari jumat, jam 10:30', '2022-05-20', 'Selesai'),
(43, 17, 12, 'UAS ', 'studi kasus tanpa esai\r\nmulai pukul 13.30\r\n\r\n\r\nsTuDi KAsuS tAnPA EsaI', '2022-05-20', 'Selesai'),
(49, 17, 10, 'UAS', 'buat aplikasi web dengan minimal 4 buah fitur\r\n\r\nvideokan lalu upload ke youtube', '2022-05-26', 'Belum Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
