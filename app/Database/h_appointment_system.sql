-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2024 at 02:51 AM
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
  `id_jadwal` int(11) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`) VALUES
(1, 1, 1, 'Sakit kepala, pusing', 101),
(2, 2, 2, 'Nyeri perut, mual', 102),
(3, 3, 3, 'Batuk dan demam', 103);

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
(4, 4, 1),
(5, 5, 2),
(6, 6, 3);

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
(1, 'Dr. Andi Rahmat', 'Jl. Merdeka No. 10, Jakarta', '081234567890', 1, '2024-12-09 17:50:21', '2024-12-09 17:50:21'),
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
  `jam_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 1, 'Senin', '08:00:00', '10:00:00'),
(2, 2, 'Selasa', '10:00:00', '12:00:00'),
(3, 3, 'Rabu', '13:00:00', '15:00:00');

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
(1, 'Andi Prasetyo', 'Jl. Merdeka No. 10, Jakarta', '3512345678901234', '081234567890', '2024-01-001', '2024-12-09 17:50:01', '2024-12-09 17:50:01'),
(2, 'Budi Santoso', 'Jl. Raya No. 5, Surabaya', '3512345678901235', '081234567891', '2024-01-002', '2024-12-09 17:50:01', '2024-12-09 17:50:01'),
(3, 'Citra Dewi', 'Jl. Pahlawan No. 8, Bandung', '3512345678901236', '081234567892', '2024-01-003', '2024-12-09 17:50:01', '2024-12-09 17:50:01'),
(4, 'Dedi Setiawan', 'Jl. Sudirman No. 20, Yogyakarta', '3512345678901237', '081234567893', '2024-01-004', '2024-12-09 17:50:01', '2024-12-09 17:50:01'),
(5, 'Eka Putri', 'Jl. Kuningan No. 15, Medan', '3512345678901238', '081234567894', '2024-01-005', '2024-12-09 17:50:01', '2024-12-09 17:50:01'),
(6, 'Fajar Ardiansyah', 'Jl. Cempaka No. 12, Makassar', '3512345678901239', '081234567895', '2024-01-006', '2024-12-09 17:50:01', '2024-12-09 17:50:01'),
(7, 'Gina Pramesti', 'Jl. Raya Karya No. 9, Bali', '3512345678901240', '081234567896', '2024-01-007', '2024-12-09 17:50:01', '2024-12-09 17:50:01'),
(8, 'Hendra Wijaya', 'Jl. Sejahtera No. 4, Semarang', '3512345678901241', '081234567897', '2024-01-008', '2024-12-09 17:50:01', '2024-12-09 17:50:01');

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
(4, 1, '2024-12-01', 'Pasien mengeluh sakit kepala dan pusing. Diberikan resep obat penghilang rasa sakit.', 150000.00),
(5, 2, '2024-12-02', 'Pasien mengeluh nyeri perut dan mual. Disarankan diet khusus dan diberikan obat.', 200000.00),
(6, 3, '2024-12-03', 'Pasien mengalami batuk dan demam. Diberikan antibiotik dan vitamin C.', 180000.00);

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
  ADD KEY `fk_daftar_jadwal` (`id_jadwal`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_daftar_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `fk_daftar_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

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
