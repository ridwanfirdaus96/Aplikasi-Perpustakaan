-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2018 at 09:18 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `query_peminjaman`
-- (See below for the actual view)
--
CREATE TABLE `query_peminjaman` (
`nama_buku` varchar(100)
,`nama` varchar(100)
,`id` int(10)
,`id_anggota` varchar(10)
,`id_buku` varchar(10)
,`tanggal_pinjam` date
,`tangal_pulang` date
,`denda` int(11)
,`status` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id`, `nama`, `jk`, `alamat`, `no_hp`) VALUES
('KA0001', 'Firman Prayoga', 'l', 'alamatnya', '085693019317');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` varchar(10) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `nama_buku`, `kategori`, `pengarang`, `jumlah`, `tahun_terbit`, `foto`) VALUES
('KB0001', 'Dasar dasar PHP', 'Reality', 'Firman Prayoga', 0, 2007, 'ff620765c1245310886c843b9941aa60.png'),
('KB0002', 'Dasar dasar PHP part 2', 'Fantasy', 'Firman Prayoga', 0, 2005, '78f98830b5cde5d7190f5e40a67c2b52.png'),
('KB0004', 'Dasar dasar Bootstrap', 'Reality', 'Firman Prayoga tampan', 10010, 2010, 'fa9efdb8a4b798d46c59a45a43a706b7.jpg'),
('KB0005', 'Dasar dasar JavaScript', 'Reality', 'Firman Prayoga', 1, 2014, '4362266266932df8e3de91887bffe9cd.png'),
('KB0006', 'Dasar dasar Codeigniter', 'Reality', 'Firman Prayoga', 70, 2013, 'a3ab7f6157273c9ac3307e5cd10b44a7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `kategori`) VALUES
(4, 'Reality'),
(5, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id` int(10) NOT NULL,
  `id_anggota` varchar(10) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tangal_pulang` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id`, `id_anggota`, `id_buku`, `tanggal_pinjam`, `tangal_pulang`, `denda`, `status`) VALUES
(1, 'KA0001', 'KB0001', '2018-07-25', '2018-08-04', 500, 'kembali'),
(2, 'KA0001', 'KB0002', '2018-04-01', '2018-08-06', 60000, 'kembali'),
(3, 'KA0001', 'KB0002', '2018-02-05', '2018-08-06', 87500, 'kembali'),
(4, 'KA0001', 'KB0002', '2018-08-07', '2018-08-07', 0, 'kembali'),
(6, 'KA0001', 'KB0005', '2018-08-07', '2018-08-07', 0, 'kembali'),
(7, 'KA0001', 'KB0004', '2018-08-07', '2018-08-07', 0, 'kembali'),
(8, 'KA0001', 'kb0002', '2018-08-07', '0000-00-00', 0, 'belum');

--
-- Triggers `tbl_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `tbl_peminjaman` FOR EACH ROW BEGIN 
UPDATE tbl_buku SET jumlah = jumlah - 1
WHERE tbl_buku.id = new.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('s','a') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'Firman', 'Prayoga', 's'),
(18, 'username', 'password', 'a'),
(19, 'admin', 'admin123', 'a'),
(20, 'new', 'password', 'a'),
(21, 'karyawan', 'baru', 'a'),
(22, 'firmanpraygoaya', 'firman', 'a'),
(23, 'jiji', 'jiji', 'a'),
(24, 'jaja', 'jaja', 'a'),
(25, 'juju', 'jajaj', 'a'),
(26, 'jk', 'jk', 'a'),
(27, 'jkj', 'jk', 'a');

-- --------------------------------------------------------

--
-- Structure for view `query_peminjaman`
--
DROP TABLE IF EXISTS `query_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `query_peminjaman`  AS  select `tbl_buku`.`nama_buku` AS `nama_buku`,`tbl_anggota`.`nama` AS `nama`,`tbl_peminjaman`.`id` AS `id`,`tbl_peminjaman`.`id_anggota` AS `id_anggota`,`tbl_peminjaman`.`id_buku` AS `id_buku`,`tbl_peminjaman`.`tanggal_pinjam` AS `tanggal_pinjam`,`tbl_peminjaman`.`tangal_pulang` AS `tangal_pulang`,`tbl_peminjaman`.`denda` AS `denda`,`tbl_peminjaman`.`status` AS `status` from ((`tbl_peminjaman` join `tbl_buku` on((`tbl_peminjaman`.`id_buku` = `tbl_buku`.`id`))) join `tbl_anggota` on((`tbl_peminjaman`.`id_anggota` = `tbl_anggota`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
