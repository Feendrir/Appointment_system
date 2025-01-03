-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 05:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h_appointment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `id_poli` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_poli`, `id_jadwal`, `keluhan`, `no_antrian`) VALUES
(11, 1, 4, 1, 'Sakit nyeri', 1),
(12, 1, 4, 1, 'Rasa sakit yang akut', 2),
(13, 1, 4, 3, 'Nyeri Banget', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(11) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(1, 2, 7),
(2, 2, 9),
(3, 3, 1),
(4, 3, 2),
(5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `id_poli` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`, `id_poli`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Andi Rahmat', 'Jl. Merdeka No. 10', '081234567890', 4, '2024-12-09 17:50:21', '2024-12-27 16:09:17'),
(2, 'Dr. Budi Santoso', 'Jl. Raya No. 5, Surabaya', '081234567891', 2, '2024-12-09 17:50:21', '2024-12-09 17:50:21'),
(3, 'Dr. Citra Dewi', 'Jl. Pahlawan No. 8, Bandung', '081234567892', 3, '2024-12-09 17:50:21', '2024-12-09 17:50:21'),
(4, 'Dr. Dedi Setiawan', 'Jl. Sudirman No. 20, Yogyakarta', '081234567893', 4, '2024-12-09 17:50:21', '2024-12-09 17:50:21'),
(5, 'Dr. Eka Putri', 'Jl. Kuningan No. 15, Medan', '081234567894', 5, '2024-12-09 17:50:21', '2024-12-09 17:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'nonaktif',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kamis', '20:00:00', '21:00:00', 'nonaktif', '2024-12-25 13:34:14', '2024-12-27 23:06:40'),
(2, 1, 'Jumat', '08:00:00', '20:00:00', 'nonaktif', '2024-12-25 13:38:25', '2024-12-27 23:06:40'),
(3, 1, 'Rabu', '10:00:00', '16:00:00', 'nonaktif', '2024-12-25 13:39:53', '2024-12-27 23:06:40'),
(4, 1, 'Senin', '07:00:00', '12:00:00', 'nonaktif', '2024-12-25 13:51:44', '2024-12-27 23:06:40'),
(5, 1, 'Selasa', '10:00:00', '16:00:00', 'nonaktif', '2024-12-25 15:01:36', '2024-12-27 23:06:40'),
(6, 3, 'Senin', '07:00:00', '10:00:00', 'aktif', '2024-12-27 22:48:40', '2024-12-27 22:48:40'),
(7, 1, 'Sabtu', '08:00:00', '16:00:00', 'aktif', '2024-12-27 23:06:17', '2024-12-27 23:06:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-12-23-161626', 'App\\Database\\Migrations\\AddStatusToJadwalPeriksa', 'default', 'App', 1734970703, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `kemasan` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol Dexa Medica 500 mg', 'Strip isi 10 tablet', 5000.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(2, 'Amoxicillin Trihydrate 500 mg', 'Botol isi 100 kapsul', 45000.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(3, 'Metformin Hydrochloride 850 mg', 'Strip isi 10 tablet', 7500.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(4, 'Cefadroxil Monohydrate 500 mg', 'Botol isi 100 kapsul', 50000.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(5, 'Omeprazole 20 mg', 'Strip isi 10 kapsul', 15000.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(6, 'Diclofenac Sodium 50 mg', 'Strip isi 10 tablet', 8000.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(7, 'Amlodipine Besilate 5 mg', 'Strip isi 10 tablet', 6500.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(8, 'Ibuprofen 400 mg', 'Strip isi 10 tablet', 9000.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(9, 'Cetirizine Hydrochloride 10 mg', 'Strip isi 10 tablet', 10000.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(10, 'Furosemide 40 mg', 'Strip isi 10 tablet', 4500.00, '2024-12-09 17:52:35', '2024-12-09 17:52:35'),
(11, 'Omeprazole 20mg', '10 Strip x 10 Tablet', 30000.00, '2024-12-09 18:36:27', '2024-12-09 18:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_rm` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`, `created_at`, `updated_at`) VALUES
(1, 'Fendya Gusti Pramudya', 'Semarang', '331504010101003', '085615415178', '202412-001', '2024-12-10 16:55:37', '2024-12-10 16:55:37'),
(3, 'Dedi Mulyono', 'Pekan Baru ', '3318012918219101', '08272172192810', '202412-002', '2024-12-10 17:15:23', '2024-12-10 17:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_daftar_poli` int(11) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `biaya_periksa` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tanggal_periksa`, `catatan`, `biaya_periksa`) VALUES
(1, 11, '2024-12-27', 'uwuw', 160000.00),
(2, 12, '2024-12-27', 'test', 166500.00),
(3, 13, '2024-12-27', 'Rajin Minum Obat yaa', 250000.00);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Poli Umum', 'Layanan pemeriksaan umum untuk semua jenis keluhan', '2024-12-09 17:49:42', '2024-12-09 17:49:42'),
(2, 'Poli Gigi', 'Layanan pemeriksaan dan perawatan gigi', '2024-12-09 17:49:42', '2024-12-09 17:49:42'),
(3, 'Poli Anak', 'Layanan kesehatan untuk anak-anak', '2024-12-09 17:49:42', '2024-12-09 17:49:42'),
(4, 'Poli Kandungan', 'Layanan untuk ibu hamil dan pemeriksaan kandungan', '2024-12-09 17:49:42', '2024-12-09 17:49:42'),
(5, 'Poli Jantung', 'Layanan pemeriksaan dan pengobatan penyakit jantung', '2024-12-09 17:49:42', '2024-12-09 17:49:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftar_pasien` (`id_pasien`),
  ADD KEY `fk_daftar_jadwal` (`id_jadwal`),
  ADD KEY `fk_id_poli` (`id_poli`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_periksa` (`id_periksa`),
  ADD KEY `fk_detail_obat` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_dokter` (`id_dokter`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`),
  ADD UNIQUE KEY `no_rm` (`no_rm`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periksa_daftar` (`id_daftar_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_daftar_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `fk_daftar_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `fk_id_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `fk_detail_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_periksa` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `fk_jadwal_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_periksa_daftar` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
