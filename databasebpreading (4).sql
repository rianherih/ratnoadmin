-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 08:57 AM
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
  `id_barang` int(1) NOT NULL,
  `nama_barang` varchar(55) NOT NULL,
  `id_listkerjaan` int(3) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_listkerjaan`) VALUES
(1, 'kayu2', 4),
(2, 'besi', 4),
(3, 'semen', 5),
(4, 'air', 6),
(5, 'lem', 6),
(6, 'str', 4),
(7, 'kayu1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barcode`
--

CREATE TABLE IF NOT EXISTS `tb_barcode` (
  `id_barcode` int(1) NOT NULL AUTO_INCREMENT,
  `nomor_barcode` varchar(25) NOT NULL,
  PRIMARY KEY (`id_barcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_barcode`
--

INSERT INTO `tb_barcode` (`id_barcode`, `nomor_barcode`) VALUES
(3, '901929'),
(4, '88891'),
(5, '8989898'),
(6, '1234561'),
(7, '12121212'),
(8, '1111112');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE IF NOT EXISTS `tb_detail` (
  `id_detail` int(1) NOT NULL AUTO_INCREMENT,
  `id_listkerjaan` int(3) NOT NULL,
  `detail_list` varchar(100) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1235 ;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `id_listkerjaan`, `detail_list`) VALUES
(1, 4, 'merapihkan kayu1'),
(2, 3, 'las'),
(4, 4, '123'),
(5, 0, 'merapihkan kayu1'),
(1234, 0, '5555');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE IF NOT EXISTS `tb_history` (
  `id_history` int(11) NOT NULL AUTO_INCREMENT,
  `no_kerjaan` varchar(10) NOT NULL,
  `kode_users` int(11) NOT NULL,
  `waktu_mulai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_barcode` int(1) NOT NULL,
  `waktu_selesai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_log` int(11) NOT NULL,
  PRIMARY KEY (`id_history`),
  KEY `nopol_ref` (`no_kerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `no_kerjaan`, `kode_users`, `waktu_mulai`, `id_barcode`, `waktu_selesai`, `no_log`) VALUES
(1, 'D4356DV', 1, '2017-05-23 06:24:57', 4, '2017-05-23 06:24:57', 1),
(2, '213123', 2, '2017-05-23 06:26:05', 8, '2017-05-23 06:26:05', 2),
(3, 'D4000S', 3, '2017-05-23 06:26:16', 7, '2017-05-23 06:26:16', 4),
(4, 'D12345', 1, '2017-05-23 06:31:32', 5, '2017-05-23 06:31:32', 22),
(5, 'D3575JQ', 2, '2017-05-23 06:26:11', 5, '2017-05-23 06:26:11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerjaan`
--

CREATE TABLE IF NOT EXISTS `tb_kerjaan` (
  `no_kerjaan` varchar(10) NOT NULL,
  `nama_kerjaan` varchar(50) NOT NULL,
  `status_kerjaan` enum('OK','Pending') NOT NULL,
  `id_listkerjaan` int(3) NOT NULL,
  `id_barcode` int(1) NOT NULL,
  PRIMARY KEY (`no_kerjaan`),
  KEY `limit_ref` (`id_listkerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerjaan`
--

INSERT INTO `tb_kerjaan` (`no_kerjaan`, `nama_kerjaan`, `status_kerjaan`, `id_listkerjaan`, `id_barcode`) VALUES
('213123', '123123', 'Pending', 4, 4),
('D12345', 'boor', 'Pending', 4, 4),
('D1425KS', 'Rian', 'OK', 2, 3),
('D3575JQ', 'Mamat', 'OK', 4, 5),
('D4000S', 'daos', 'Pending', 3, 4),
('D4356DV', 'udin', 'OK', 6, 6),
('D444MN', 'Dadang', 'Pending', 5, 8),
('D5474TQ', 'hermawan', 'Pending', 6, 6),
('D5677DG', 'LAS11', 'Pending', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_listkerjaan`
--

CREATE TABLE IF NOT EXISTS `tb_listkerjaan` (
  `id_listkerjaan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_listkerjaan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_listkerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_listkerjaan`
--

INSERT INTO `tb_listkerjaan` (`id_listkerjaan`, `nama_listkerjaan`) VALUES
(2, 'kerjaansayap'),
(3, 'asdasdsads'),
(4, 'lassayap'),
(5, 'hamplassayap'),
(6, 'cat');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`no_log`, `kode_users`, `nama_users`, `tanggal`, `jam_in`, `jam_out`, `status`) VALUES
(1, 1, 'admin', '2017-05-23', '03:46:25', '08:51:23', 'offline'),
(2, 2, 'ratno', '2017-05-23', '03:46:25', '03:46:25', 'offline'),
(3, 3, 'spv', '2017-05-23', '03:46:25', '03:46:25', 'offline'),
(4, 4, 'rian', '2017-05-23', '03:46:25', '03:46:25', 'offline'),
(22, 2, 'ratno', '2017-05-23', '08:15:42', '08:15:49', 'offline'),
(23, 1, 'admin', '2017-05-23', '08:16:15', '08:51:23', 'offline'),
(24, 1, 'admin', '2017-05-23', '08:51:33', 'logged', 'online');

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD CONSTRAINT `nopol_ref` FOREIGN KEY (`no_kerjaan`) REFERENCES `tb_kerjaan` (`no_kerjaan`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
