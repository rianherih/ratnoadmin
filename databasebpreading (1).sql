-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 03:15 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_barcode`
--

CREATE TABLE IF NOT EXISTS `tb_barcode` (
  `id_barcode` int(1) NOT NULL AUTO_INCREMENT,
  `nomor_barcode` varchar(25) NOT NULL,
  PRIMARY KEY (`id_barcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_barcode`
--

INSERT INTO `tb_barcode` (`id_barcode`, `nomor_barcode`) VALUES
(3, 'pertamax'),
(4, 'Premium'),
(5, 'Solar'),
(6, 'pertamax plus');

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
  PRIMARY KEY (`id_history`),
  KEY `nopol_ref` (`no_kerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id_history`, `no_kerjaan`, `kode_users`, `waktu_mulai`, `id_barcode`, `waktu_selesai`) VALUES
(1, 'D4356DV', 2, '2014-07-01 22:23:36', 4, '2017-05-16 05:02:05'),
(11, 'D3575JQ', 0, '2014-07-01 22:23:31', 3, '2017-05-16 05:02:05'),
(12, 'D3575JQ', 0, '2014-07-01 22:23:05', 4, '2017-05-16 05:02:05'),
(13, 'D3575JQ', 0, '2014-07-01 22:22:57', 4, '2017-05-16 05:02:05'),
(14, 'D3575JQ', 2, '2014-07-01 22:22:35', 5, '2017-05-16 05:02:05'),
(15, 'D3575JQ', 2, '2014-07-01 22:22:28', 6, '2017-05-16 05:02:05'),
(16, 'D4356DV', 2, '2014-07-01 22:22:21', 5, '2017-05-16 05:02:05'),
(17, 'D4356DV', 2, '2014-07-01 22:22:02', 3, '2017-05-16 05:02:05'),
(18, 'D3575JQ', 2, '2014-07-02 00:52:13', 5, '2017-05-16 05:02:05'),
(19, 'D3575JQ', 2, '2014-07-02 00:54:25', 5, '2017-05-16 05:02:05'),
(20, 'D3575JQ', 2, '2014-07-02 00:56:22', 3, '2017-05-16 05:02:05'),
(21, 'D3575JQ', 2, '2014-07-02 00:56:55', 6, '2017-05-16 05:02:05'),
(22, 'D3575JQ', 2, '2014-07-02 00:58:22', 3, '2017-05-16 05:02:05'),
(23, 'D3575JQ', 2, '2014-07-02 00:59:18', 3, '2017-05-16 05:02:05'),
(24, 'D3575JQ', 2, '2014-07-02 01:02:43', 3, '2017-05-16 05:02:05'),
(25, 'D3575JQ', 2, '2014-07-02 01:03:37', 3, '2017-05-16 05:02:05'),
(26, 'D3575JQ', 2, '2014-07-02 01:05:07', 3, '2017-05-16 05:02:05'),
(27, 'D3575JQ', 2, '2014-07-02 01:05:39', 6, '2017-05-16 05:02:05'),
(28, 'D3575JQ', 2, '2014-07-02 01:05:58', 3, '2017-05-16 05:02:05'),
(29, 'D3575JQ', 2, '2014-07-02 01:06:26', 6, '2017-05-16 05:02:05'),
(30, 'D5677DG', 2, '2015-01-05 08:26:30', 4, '2017-05-16 05:02:05'),
(31, 'D5677DG', 2, '2015-01-05 08:26:53', 3, '2017-05-16 05:02:05'),
(32, 'D4356DV', 1, '2015-01-06 07:06:27', 4, '2017-05-16 05:02:05'),
(33, 'D5474TQ', 1, '2015-01-06 14:51:25', 4, '2017-05-16 05:02:05'),
(34, 'D1425KS', 1, '2015-01-06 14:52:45', 4, '2017-05-16 05:02:05'),
(35, 'D5677DG', 1, '2015-01-06 15:54:29', 5, '2017-05-16 05:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerjaan`
--

CREATE TABLE IF NOT EXISTS `tb_kerjaan` (
  `no_kerjaan` varchar(10) NOT NULL,
  `nama_kerjaan` varchar(50) NOT NULL,
  `status` enum('OK','Pending') NOT NULL,
  `id_listbarang` int(3) NOT NULL,
  PRIMARY KEY (`no_kerjaan`),
  KEY `limit_ref` (`id_listbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kerjaan`
--

INSERT INTO `tb_kerjaan` (`no_kerjaan`, `nama_kerjaan`, `status`, `id_listbarang`) VALUES
('D1111A', 'Dia', '', 4),
('D1425KS', 'Rian', '', 5),
('D3575JQ', 'Mamat', '', 2),
('D4000S', 'daos', '', 4),
('D4356DV', 'udin', '', 5),
('D444MN', 'Dadang', '', 5),
('D5474TQ', 'hermawan', '', 4),
('D5677DG', 'asep', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_list`
--

CREATE TABLE IF NOT EXISTS `tb_list` (
  `id_list` int(1) NOT NULL AUTO_INCREMENT,
  `id_listkerjaan` int(3) NOT NULL,
  `detail_list` varchar(100) NOT NULL,
  PRIMARY KEY (`id_list`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_listbarang`
--

CREATE TABLE IF NOT EXISTS `tb_listbarang` (
  `id_listbarang` int(3) NOT NULL,
  `id_barang` int(1) NOT NULL,
  `nama_listbarang` varchar(55) NOT NULL,
  PRIMARY KEY (`id_listbarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_listkerjaan`
--

CREATE TABLE IF NOT EXISTS `tb_listkerjaan` (
  `id_listkerjaan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_listkerjaan` varchar(25) NOT NULL,
  `id_barcode` int(1) NOT NULL,
  PRIMARY KEY (`id_listkerjaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_listkerjaan`
--

INSERT INTO `tb_listkerjaan` (`id_listkerjaan`, `nama_listkerjaan`, `id_barcode`) VALUES
(2, 'Solar Truck', 5),
(4, '1500cc', 4),
(5, '2000cc', 4),
(6, 'Solar Pabrik', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `kode_users` int(11) NOT NULL AUTO_INCREMENT,
  `nama_users` varchar(50) NOT NULL,
  `id_users` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('manajemen','admin') NOT NULL,
  PRIMARY KEY (`kode_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`kode_users`, `nama_users`, `id_users`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin@admin.admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'spbu', 'spbu', 'spbu@spbu.spbu', '8823f883941b8e5beb8b35f29c186110', 'manajemen'),
(3, 'Andir', 'ciroyom', 'oleh@yahoo.com', '0067f1d5babe19a78737ae94936191e9', 'manajemen'),
(5, 'asasas', 'asasas', 'asa@asas.asas', 'eda61977f522abe9fbd9da3126b86575', 'manajemen');

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
