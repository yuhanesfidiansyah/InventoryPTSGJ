-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2024 at 10:03 PM
-- Server version: 8.0.34
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailyre1_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `merk_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `barcode`, `merk_barang`, `nama_barang`, `nama_supplier`) VALUES
(1, 'SGJ-01', 'BRIDGESTONE', 'BAN LUAR', 'FDR'),
(2, 'SGJ-02', 'RYU', 'Mata Gerinda', 'RYU'),
(3, 'SGJ-03', 'NACHI STANDAR', 'MATA BOR ', 'TK.BAHAGIA'),
(4, 'SGJ-04', 'WD', 'GERINDA POTONG', 'CV BESI CRB'),
(5, 'SGJ-05', 'RESIBON', 'GERINDA POLES 100 X 6 X 16', 'CV BESI CRB'),
(6, 'SGJ-06', 'RESIBON', 'GERINDA POTONG BESAR 14\"', 'CV BESI CRB'),
(7, 'SGJ-07', 'HUATONG (HWT -50)', 'KAWAT LAS CO', 'YONTOMO SUKSES ABADI (YSA)'),
(8, 'SGJ-08', 'FOX', 'LEM ', 'MUARA AMAN'),
(9, 'SGJ-09', 'ROTARY', 'STEMPET', 'SUNDA MOTOR'),
(10, 'SGJ-10', 'NACHI TAPE', 'LAKBAN PLASTIK', 'MUARA AMAN'),
(11, 'SGJ-11', 'SIKA / SIKAFLEX', 'SEALANT / SILER', 'GRAGE JAYA CEMERLANG'),
(12, 'SGJ-12', 'SANDFLEX ', 'MATA GERGAJI BESI', 'TIMBUL JAYA'),
(13, 'SGJ-13', 'KITANI', 'KABEL TUNGGAL (NYAF)', 'CAHAYA MEGA'),
(14, 'SGJ-14', 'WD -40', 'WD SEMPROT', 'MUARA AMAN'),
(15, 'SGJ-15', 'HZ', 'KABEL TIS / TALI RIPET', 'TK RESTU'),
(16, 'SGJ-16', 'VNR', 'SAEL TAPE', 'TK BAHAGIA'),
(17, 'SGJ-17', 'BANSBACH', 'STABILUS / GASSPRING', 'FAJAR HARAPAN'),
(18, 'SGJ-18', 'OMEGA ', 'JAM DIGITAL', 'SEJATI MOTOR'),
(19, 'SGJ-19', 'FTALIT', 'CAT ', 'TK BAHAGIA'),
(20, 'SGJ-20', 'D N Y', 'LAMPU BATAS KETINGGIAN', 'SUNDA MOTOR'),
(21, 'SGJ-21', 'HONDA', 'GENSET EU-30IS', 'SUMBER TEKNIK'),
(22, 'SGJ-22', 'PANAPORTH', 'BAUD + MUR', 'TIMBUL JAYA'),
(23, 'SGJ-23', 'CHEEROKE', 'BAHAN KAIN PLAFON MOBIL', 'ARIANA'),
(24, 'SGJ-24', 'DAIKIN', 'AC INDOOR+OUTDOOR', 'GLOBAL MITRATAMA CEMERLANG '),
(25, 'SGJ-25', 'MAKITA', 'MESIN BOR', 'A J T (AGUNG JAYA TEKNIK)'),
(26, 'SGJ-26', 'A S B', 'LAHER BEARING', 'UD KENCANA'),
(27, 'SGJ-27', 'UTILUX', 'SKUN KABEL', 'SUNDA MOTOR'),
(28, 'SGJ-28', 'DEXTONE', 'LEM EPOXY', 'MUARA AMAN'),
(29, 'SGJ-29', 'SUPREME CABLE', 'KABEL SERABUT NYYHY ', 'CAHAYA MULIA'),
(30, 'SGJ-30', 'SUNON', 'EXHAUST FAN ', 'A J T (AGUNG JAYA TEKNIK)'),
(31, 'SGJ-31', 'BOSCH', 'RELAY KABEL', 'MITRA ANEKA'),
(32, 'SGJ-32', 'INDACHI', 'KURSI KERJA', 'PERDANA ABADI'),
(33, 'SGJ-33', 'G.S', 'ACCU / AKI', 'PD AKINDO'),
(34, 'SGJ-34', 'EVID', 'SPEAKER 4.2\"', 'KARISMA GRACEINDO '),
(35, 'SGJ-35', 'B M B', 'AMPLIFIER', 'KARISMA GRACEINDO '),
(36, 'SGJ-36', 'TAFFWARE ', 'BREKET TV', 'PD PADA SENANG'),
(37, 'SGJ-37', 'TITAN', 'CONTAK TIP ', 'TK.BAHAGIA'),
(38, 'SGJ-38', 'K I T ', 'KIT SEMPROT / SPRAY', 'SUNDA MOTOR'),
(39, 'SGJ-39', 'CARZOOM', 'KUNCI PINTU MOBIL', 'SLAMET MOTOR'),
(40, 'SGJ-40', 'CANGASS', 'JERIGEN 10LT', 'ACE HARDWARE'),
(41, 'SGJ-41', 'BOSCH', 'MESIN GERINDA TANGAN', 'A J T (AGUNG JAYA TEKNIK)'),
(42, 'SGJ-42', 'VYBA', 'STOP KONTAK+STEKER', 'CAHAYA MULIA'),
(43, 'SGJ-43', 'G N T', 'MATA OBENG ANGIN', 'A J T (AGUNG JAYA TEKNIK)'),
(44, 'SGJ-44', 'FAMILIARC RB-26', 'KAWAT LAS BITING', 'CV BESI CRB'),
(45, 'SGJ-45', 'ZUUR', 'AIR ACCU', 'PD AKINDO'),
(46, 'SGJ-46', 'FEDERAL KABEL', 'KABEL SPEAKER 2 X 50', 'CAHAYA MULIA'),
(47, 'SGJ-47', 'KENKO', 'ISI CUTTER', 'SURYA TOSERBA'),
(48, 'SGJ-48', 'EVERPOL', 'RESIN', 'PD INTI KIMIA'),
(49, 'SGJ-49', 'OSKA', 'LAMPU SLIDING', 'SINAR BINTANG'),
(50, 'SGJ-50', 'HIKVISION', 'DVR', 'KARISMA GRACEINDO ');

-- --------------------------------------------------------

--
-- Table structure for table `det_pemasukan`
--

CREATE TABLE `det_pemasukan` (
  `id_det_pemasukan` int NOT NULL,
  `id_pemasukan` int NOT NULL,
  `status` varchar(2) NOT NULL,
  `tanggal` datetime NOT NULL,
  `pemasukan` double NOT NULL,
  `tanggal_produksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pemasukan`
--

INSERT INTO `det_pemasukan` (`id_det_pemasukan`, `id_pemasukan`, `status`, `tanggal`, `pemasukan`, `tanggal_produksi`) VALUES
(1, 1, 'OK', '2024-08-12 01:24:15', 10, '2024-08-12'),
(2, 1, 'OK', '2024-08-12 01:33:45', 10, '2024-08-12'),
(3, 1, 'OK', '2024-08-12 01:34:42', 10, '2024-08-12'),
(4, 2, 'OK', '2024-08-12 01:35:45', 100, '2024-08-01'),
(5, 3, 'OK', '2024-08-12 06:24:19', 100, '2024-08-12'),
(6, 1, 'OK', '2024-08-13 03:43:04', 10, '2024-07-05'),
(7, 4, 'OK', '2024-08-20 08:38:33', 9, '2024-08-20'),
(8, 5, 'OK', '2024-08-20 08:41:30', 100, '2024-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `NIK` varchar(35) NOT NULL,
  `Tempat_lahir` varchar(30) NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `Alamat` text NOT NULL,
  `No_wa` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Jenis_kelamin` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int NOT NULL,
  `id_barang` int NOT NULL,
  `total_pemasukan` double NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_supplier` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `id_barang`, `total_pemasukan`, `tanggal`, `id_supplier`) VALUES
(1, 1, 5, '2024-08-12 01:24:15', NULL),
(2, 2, 5, '2024-08-12 01:35:45', NULL),
(3, 8, 9, '2024-08-12 06:24:19', NULL),
(4, 4, 9, '2024-08-20 08:38:33', NULL),
(5, 9, 9, '2024-08-20 08:41:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah` double NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `bukti_foto` varchar(255) DEFAULT NULL,
  `id_det_pemasukan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_user`, `tanggal`, `jumlah`, `penanggung_jawab`, `bukti_foto`, `id_det_pemasukan`) VALUES
(1, 1, '2024-08-12 00:00:00', 5, 'MILIK', 'gambar_page-0001.jpg', 1),
(2, 1, '2024-08-12 00:00:00', 10, 'MILIK', 'gambar_page-0001.jpg', 1),
(3, 1, '2024-08-12 00:00:00', 10, 'MILIK', 'gambar_page-0001.jpg', 1),
(4, 1, '2024-08-12 00:00:00', 50, 'MILIK', 'gambar_page-0001.jpg', 5),
(5, 1, '2024-08-13 00:00:00', 10, 'HAN', '1.jpg', 6),
(6, 1, '2024-08-13 00:00:00', 95, 'HAN', '1.jpg', 4),
(7, 1, '2024-08-20 00:00:00', 41, 'han', 'WhatsApp Image 2024-08-14 at 13.10.39_f923eeef.jpg', 5),
(8, 3, '2024-08-20 00:00:00', 91, 'HAN', 'WhatsApp Image 2024-08-14 at 13.10.39_f923eeef.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'han', 'han'),
(3, 'yuhann123', '123'),
(4, 'test', 'test'),
(6, 'han', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `det_pemasukan`
--
ALTER TABLE `det_pemasukan`
  ADD KEY `id_pengeluaran` (`id_det_pemasukan`),
  ADD KEY `id_pemasukan` (`id_pemasukan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_det_pemasukan` (`id_det_pemasukan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `det_pemasukan`
--
ALTER TABLE `det_pemasukan`
  MODIFY `id_det_pemasukan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `det_pemasukan`
--
ALTER TABLE `det_pemasukan`
  ADD CONSTRAINT `det_pemasukan_ibfk_1` FOREIGN KEY (`id_pemasukan`) REFERENCES `pemasukan` (`id_pemasukan`);

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `pemasukan_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pengeluaran_ibfk_3` FOREIGN KEY (`id_det_pemasukan`) REFERENCES `det_pemasukan` (`id_det_pemasukan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
