-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 05:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodsans`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `nip` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `mata_pelajaran` varchar(20) NOT NULL,
  `wali_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`nip`, `nama`, `password`, `email`, `no_telp`, `mata_pelajaran`, `wali_kelas`) VALUES
(12345, 'Alexander Graham', 'admin', 'alexander@gmail.com', '08123456789', 'IPA', 'VII B'),
(54321, 'Sari Sarimin', 'asdzxc', 'sarihayu@gmail.com', '085432169', 'Bahasa Indonesia', ''),
(456789, 'Magina', 'qweasd', 'antimage@gmail.com', '089876543', 'Matematika', 'VII A');

-- --------------------------------------------------------

--
-- Table structure for table `data_murid`
--

CREATE TABLE `data_murid` (
  `nis` int(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_murid`
--

INSERT INTO `data_murid` (`nis`, `password`, `nama`, `kelas`) VALUES
(10203, 'qweasd', 'Cipeng', 'VII E'),
(12345, 'admin', 'Wisnu Gendeng', 'VII A'),
(125123, 'huyue', 'Arip', 'VII B'),
(147289, 'adiskj', 'Reza', 'VII B'),
(263871, 'vwxyz', 'Pojo', 'VII A'),
(1289012, 'mnbvc', 'Dimiyati', 'VII A');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `nama_kelas` varchar(10) NOT NULL,
  `wali_kelas` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`nama_kelas`, `wali_kelas`, `tahun_ajaran`) VALUES
('VII A', 'Magina', '2019/2020'),
('VII B', 'Alexander Graham', '2019/2020'),
('VII C', 'Jojo Nurjoma', '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `bab` varchar(50) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `link_guru` text NOT NULL,
  `link_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `nama_matpel` varchar(20) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama_matpel`, `tahun_ajaran`, `nama_guru`, `kelas`, `warna`) VALUES
(1, 'IPA', '2019/2020', 'Alexander Graham', 'VII A', '#34eb40'),
(2, 'IPA', '2019/2020', 'Alexander Graham', 'VII B', '#eb34e8'),
(10, 'PJOK', '2019/2020', 'Alexander Graham', 'IX A', '#5894cf');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `bab` varchar(50) NOT NULL,
  `topik` varchar(255) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `mata_pelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `bab` varchar(20) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `mata_pelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `upload_tugas`
--

CREATE TABLE `upload_tugas` (
  `id` int(11) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `waktu_upload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_murid`
--
ALTER TABLE `data_murid`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`nama_kelas`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `upload_tugas`
--
ALTER TABLE `upload_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
