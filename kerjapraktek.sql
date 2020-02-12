-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2020 at 05:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerjapraktek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbkaryawan`
--

CREATE TABLE `tbkaryawan` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbkaryawan`
--

INSERT INTO `tbkaryawan` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`) VALUES
('123098872323', 'Neneng Jubaedah', 'Perempuan', 'Jakarta', '1992-09-26', 'Kp. Perkampungan RT01/15 Desa Pedasaan Kec.Cimenyan Kab.Bandung 234234', '0831888823459'),
('32040408930004', 'Jajang Gunawan', 'Laki-Laki', 'Bandug', '1993-09-04', 'Kp.Cibiru RT 02/07 Desa Cimuncang Kec.Cijengkol Kab.Bandung 407314', '082178343443'),
('3204171811960001', 'Andri Sofiana', 'Laki-Laki', 'Bandung', '1996-11-18', 'Kp. Lintung RT 01/06 Desa Cikalong Kec.Cimaung Kab.Bandung 40374', '082127272002');

-- --------------------------------------------------------

--
-- Table structure for table `tbpelatihan`
--

CREATE TABLE `tbpelatihan` (
  `nik` varchar(20) NOT NULL,
  `idpelatihan` int(20) NOT NULL,
  `nmpelatihan` varchar(225) NOT NULL,
  `jnspelatihan` varchar(225) NOT NULL,
  `penyelenggara` varchar(225) NOT NULL,
  `thn` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpelatihan`
--

INSERT INTO `tbpelatihan` (`nik`, `idpelatihan`, `nmpelatihan`, `jnspelatihan`, `penyelenggara`, `thn`) VALUES
('3204171811960001', 4, 'Pelatihan Maju Mundur', 'Pendidikan Dasar', 'Swasta', '2018'),
('32040408930004', 5, 'Pelatihan Baris-berbaris', 'Swasta', 'Pemerintah Setempat', '2003'),
('123098872323', 6, 'Pelatihan Jahit Menjahit', 'Barisan Mantan', 'Kepala Desa', '2009');

-- --------------------------------------------------------

--
-- Table structure for table `tbpendidikan`
--

CREATE TABLE `tbpendidikan` (
  `nik` varchar(20) NOT NULL,
  `jenjang` varchar(20) NOT NULL,
  `sekolah` varchar(225) NOT NULL,
  `masuk` int(4) NOT NULL,
  `keluar` int(4) NOT NULL,
  `ijazah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpendidikan`
--

INSERT INTO `tbpendidikan` (`nik`, `jenjang`, `sekolah`, `masuk`, `keluar`, `ijazah`) VALUES
('32040408930004', 'SD', 'SMK Pemuda Pemudi', 2000, 2005, '23423434'),
('3204171811960001', 'SD', 'Universitas Langlangbuana Bandung', 2016, 2020, '23492348234'),
('123098872323', 'SMA/SMK', 'SMK Pertiwi', 2005, 2010, '312321');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenempatan`
--

CREATE TABLE `tbpenempatan` (
  `nik` varchar(20) NOT NULL,
  `idperusahaan` varchar(20) NOT NULL,
  `tempat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpenempatan`
--

INSERT INTO `tbpenempatan` (`nik`, `idperusahaan`, `tempat`) VALUES
('3204171811960001', '0001', 'Front Office'),
('32040408930004', '0001', 'Pos Pengamanan'),
('123098872323', '0004', 'Penanganan Mantan');

-- --------------------------------------------------------

--
-- Table structure for table `tbperusahaan`
--

CREATE TABLE `tbperusahaan` (
  `idperusahaan` varchar(20) NOT NULL,
  `nmperusahaan` varchar(225) NOT NULL,
  `alamatperusahaan` varchar(225) NOT NULL,
  `kodetlp` varchar(20) NOT NULL,
  `tlpperusahaan` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbperusahaan`
--

INSERT INTO `tbperusahaan` (`idperusahaan`, `nmperusahaan`, `alamatperusahaan`, `kodetlp`, `tlpperusahaan`, `fax`) VALUES
('0001', 'PT. Cahaya Pelita Andika', 'Kompleks SINAR Plaza, Blok G, No.13- 14,Jl Guru Patimpus,Medan 20111,North Sumatra', '061', '322849', '3218200'),
('0002', 'PT. Cakradenta Agung Pertiwi', 'Jl. S. Parman Kav. 107, Jakarta', '022', '5664687', '5664687'),
('0003', 'PT. Cisadane Sawit Raya', 'Jl.Kali Besar No.50.Jakarta Barat', '021', '6266358', '6912569'),
('0004', 'PT. Feng Tay Indonesia Enterprise', 'Jln. Raya Banjaran, KM. 14,6, Banjaran, Jawa Barat.', '022', '5940688', '5940255'),
('0005', 'PT. Daya Pratama Lestari (DPL)', 'Jl. Industri Batujajar Permai II/29 Padalarang, Bandung 40553 West Java, Indonesia', '022', '6868181', '6868282');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `id` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbpelatihan`
--
ALTER TABLE `tbpelatihan`
  ADD PRIMARY KEY (`idpelatihan`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbpendidikan`
--
ALTER TABLE `tbpendidikan`
  ADD PRIMARY KEY (`ijazah`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `tbpenempatan`
--
ALTER TABLE `tbpenempatan`
  ADD KEY `nik` (`nik`),
  ADD KEY `idperusahaan` (`idperusahaan`);

--
-- Indexes for table `tbperusahaan`
--
ALTER TABLE `tbperusahaan`
  ADD PRIMARY KEY (`idperusahaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbpelatihan`
--
ALTER TABLE `tbpelatihan`
  MODIFY `idpelatihan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbpelatihan`
--
ALTER TABLE `tbpelatihan`
  ADD CONSTRAINT `tbpelatihan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbkaryawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpendidikan`
--
ALTER TABLE `tbpendidikan`
  ADD CONSTRAINT `tbpendidikan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbkaryawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbpenempatan`
--
ALTER TABLE `tbpenempatan`
  ADD CONSTRAINT `tbpenempatan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbkaryawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpenempatan_ibfk_2` FOREIGN KEY (`idperusahaan`) REFERENCES `tbperusahaan` (`idperusahaan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
