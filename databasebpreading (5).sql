-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2017 at 07:28 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databasebpreading`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(55) NOT NULL,
  `komponen_deskripsi` varchar(50) NOT NULL,
  `Quantity` varchar(20) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `komponen_deskripsi`, `Quantity`) VALUES
('D57443513200', 'Stringer', '2 port A-320', '1'),
('D57443513202', 'Stringer', '2 port A-320', '1'),
('D57443513206', 'Stringer', '2 port A-320', '1'),
('D57443513220', 'Stringer', '2 port A-320', '1'),
('D57443568206B', 'Skin Assy', '2 port A-320', '1'),
('D57950281002', 'Strap', '2 port A-320', '8'),
('MC238A-2', 'Sealant', '2 port A-320', 'AR/KG'),
('MS20426AD5-00', 'Rivet Solid Countershunk 100 DEG', 'Rivet Solid', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barcode`
--

CREATE TABLE IF NOT EXISTS `tb_barcode` (
  `id_barcode` int(1) NOT NULL AUTO_INCREMENT,
  `nomor_barcode` varchar(25) NOT NULL,
  PRIMARY KEY (`id_barcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_barcode`
--

INSERT INTO `tb_barcode` (`id_barcode`, `nomor_barcode`) VALUES
(1, '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE IF NOT EXISTS `tb_detail` (
  `id_barang` varchar(50) NOT NULL,
  `id_listkerjaan` int(10) NOT NULL,
  `detail_list` varchar(500) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`id_barang`, `id_listkerjaan`, `detail_list`) VALUES
('2', 3, 'las'),
('D57443513200', 1, 'Drill for rivet holes to diameter 4.16 / 4/06 mm (13 EA)'),
('D57443513202', 1, 'Drill for rivet holes to diameter 4.16 / 4/06 mm (12EA)'),
('D57443513206', 1, 'Drill for rivet holes to diameter 4.16 / 4/06 mm (19 EA)'),
('D57443513220', 1, 'Drill for rivet holes to diameter 4.16 / 4/06 mm (19 EA)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE IF NOT EXISTS `tb_history` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `no_kerjaan` varchar(50) NOT NULL,
  `kode_users` int(11) NOT NULL,
  `waktu_mulai` varchar(100) NOT NULL,
  `waktu_selesai` varchar(100) NOT NULL,
  PRIMARY KEY (`id_history`),
  KEY `nopol_ref` (`no_kerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `no_kerjaan`, `kode_users`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 'D5744356800802', 1, '2017-05-24 00:17:18', '2017-05-24 00:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerjaan`
--

CREATE TABLE IF NOT EXISTS `tb_kerjaan` (
  `no_kerjaan` varchar(50) NOT NULL,
  `id_barcode` int(1) NOT NULL,
  `nama_kerjaan` varchar(50) NOT NULL,
  `status_kerjaan` enum('OK','Pending') NOT NULL,
  `waktu_sisa` varchar(100) NOT NULL,
  PRIMARY KEY (`no_kerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerjaan`
--

INSERT INTO `tb_kerjaan` (`no_kerjaan`, `id_barcode`, `nama_kerjaan`, `status_kerjaan`, `waktu_sisa`) VALUES
('D5744356800802', 1, 'Skin 2 assy port', 'Pending', '+10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_listkerjaan`
--

CREATE TABLE IF NOT EXISTS `tb_listkerjaan` (
  `id_listkerjaan` int(10) NOT NULL,
  `no_kerjaan` varchar(50) NOT NULL,
  `nama_listkerjaan` varchar(25) NOT NULL,
  `waktu_estimasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_listkerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_listkerjaan`
--

INSERT INTO `tb_listkerjaan` (`id_listkerjaan`, `no_kerjaan`, `nama_listkerjaan`, `waktu_estimasi`) VALUES
(1, 'D5744356800802', 'Driling The rivet Holes', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE IF NOT EXISTS `tb_log` (
  `no_log` int(3) NOT NULL AUTO_INCREMENT,
  `kode_users` int(11) NOT NULL,
  `nama_users` varchar(50) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jam_in` varchar(100) NOT NULL,
  `jam_out` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`no_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`no_log`, `kode_users`, `nama_users`, `tanggal`, `jam_in`, `jam_out`, `status`) VALUES
(1, 1, 'admin', '2017-05-23', '03:46:25', '08:51:23', 'offline'),
(3, 3, 'spv', '2017-05-23', '03:46:25', '03:46:25', 'offline'),
(4, 4, 'rian', '2017-05-23', '03:46:25', '03:46:25', 'offline'),
(6, 6, 'admin', '2017-05-25', '18:09:50', '19:33:47', 'offline'),
(34, 1, 'admin', '2017-05-25', '19:34:34', '19:35:40', 'offline'),
(36, 1, 'admin', '2017-05-25', '20:02:00', '20:02:41', 'offline'),
(37, 2, 'ratno', '2017-05-25', '20:02:53', '20:50:15', 'offline'),
(39, 2, 'ratno', '2017-06-02', '03:24:29', '03:25:22', 'offline'),
(42, 1, 'admin', '2017-06-10', '03:31:48', '03:47:22', 'offline'),
(43, 2, 'ratno', '2017-06-10', '03:47:27', '03:48:43', 'offline'),
(44, 2, 'ratno', '2017-06-13', '17:18:35', 'logged', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `kode_users` int(11) NOT NULL AUTO_INCREMENT,
  `nama_users` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('manajemen','admin') NOT NULL,
  PRIMARY KEY (`kode_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`kode_users`, `nama_users`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@admin.admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'ratno', 'ratno@ratno.ratno', '8823f883941b8e5beb8b35f29c186110', 'manajemen'),
(3, 'spv', 'spv@spv.spv1', 'f4984324c6673ce07aafac15600af26e', 'manajemen'),
(4, 'rian', 'rian@rian.rian', '00a1f187721c63501356bf791e69382c', 'manajemen');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
