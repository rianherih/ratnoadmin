-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2015 at 11:13 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smpbbm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bbm`
--

CREATE TABLE IF NOT EXISTS `tb_bbm` (
  `id_bbm` int(1) NOT NULL AUTO_INCREMENT,
  `nama_bbm` varchar(25) NOT NULL,
  `harga` float NOT NULL,
  PRIMARY KEY (`id_bbm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_bbm`
--

INSERT INTO `tb_bbm` (`id_bbm`, `nama_bbm`, `harga`) VALUES
(3, 'pertamax', 10000),
(4, 'Premium', 6500),
(5, 'Solar', 6500),
(6, 'pertamax plus', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE IF NOT EXISTS `tb_kendaraan` (
  `no_kendaraan` varchar(10) NOT NULL,
  `nama_pemilik` varchar(25) NOT NULL,
  `alamat_pemilik` varchar(50) NOT NULL,
  `merk` varchar(25) NOT NULL,
  `tahun` int(4) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `jumlahroda` int(11) NOT NULL,
  `id_limit` int(3) NOT NULL,
  KEY `limit_ref` (`id_limit`),
  KEY `no_kendaraan` (`no_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`no_kendaraan`, `nama_pemilik`, `alamat_pemilik`, `merk`, `tahun`, `kapasitas`, `jumlahroda`, `id_limit`) VALUES
('D5677DG', 'asep', 'Cidahu', 'Yaamha', 2001, 150, 2, 2),
('D4356DV', 'udin', 'Cipageran', 'huhu', 2005, 135, 5, 5),
('D3575JQ', 'Mamat', 'Pakusarakan', 'sdsd', 2007, 100, 2, 2),
('D1425KS', 'Rian', 'Cipta Mas B2 No 3', 'Honda Cello', 1994, 2200, 4, 5),
('D1111A', 'Dia', 'Parompong', 'Honda Jazz', 2011, 1500, 4, 4),
('D444MN', 'Dadang', 'Cikutra', 'Pajero Sport', 2013, 2500, 4, 5),
('D5474TQ', 'hermawan', 'pondok cipta mas', 'yamaha', 2010, 135, 2, 4),
('D4000S', 'daos', 'cibuntu', 'honda vario', 2014, 135, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_limit`
--

CREATE TABLE IF NOT EXISTS `tb_limit` (
  `id_limit` int(3) NOT NULL AUTO_INCREMENT,
  `nama_limit` varchar(25) NOT NULL,
  `id_bbm` int(1) NOT NULL,
  `jumlah_limit` int(3) NOT NULL,
  PRIMARY KEY (`id_limit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_limit`
--

INSERT INTO `tb_limit` (`id_limit`, `nama_limit`, `id_bbm`, `jumlah_limit`) VALUES
(2, 'Solar Truck', 5, 120),
(4, '1500cc', 4, 200),
(5, '2000cc', 4, 100),
(6, 'Solar Pabrik', 5, 150);

-- --------------------------------------------------------

--
-- Table structure for table `tb_spbu`
--

CREATE TABLE IF NOT EXISTS `tb_spbu` (
  `kode_spbu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_spbu` varchar(50) NOT NULL,
  `alamat_spbu` varchar(50) NOT NULL,
  `pemilik_spbu` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('manajemen','admin') NOT NULL,
  PRIMARY KEY (`kode_spbu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_spbu`
--

INSERT INTO `tb_spbu` (`kode_spbu`, `nama_spbu`, `alamat_spbu`, `pemilik_spbu`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'spbu', 'spbu', 'spbu', 'spbu@spbu.spbu', '8823f883941b8e5beb8b35f29c186110', 'manajemen'),
(3, 'Andir', 'ciroyom', 'mang oleh', 'oleh@yahoo.com', '0067f1d5babe19a78737ae94936191e9', 'manajemen'),
(5, 'asasas', 'asasas', 'asasa', 'asa@asas.asas', 'eda61977f522abe9fbd9da3126b86575', 'manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_kendaraan` varchar(10) NOT NULL,
  `kode_spbu` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_bbm` int(1) NOT NULL,
  `volume_bbm` int(3) NOT NULL,
  `perliter` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `nopol_ref` (`no_kendaraan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `no_kendaraan`, `kode_spbu`, `waktu`, `id_bbm`, `volume_bbm`, `perliter`, `total_harga`) VALUES
(1, 'D4356DV', 2, '2014-07-01 22:23:36', 4, 10, 4500, 45000),
(11, 'D3575JQ', 0, '2014-07-01 22:23:31', 3, 5, 10500, 52500),
(12, 'D3575JQ', 0, '2014-07-01 22:23:05', 4, 5, 6500, 32500),
(13, 'D3575JQ', 0, '2014-07-01 22:22:57', 4, 1, 6500, 6500),
(14, 'D3575JQ', 2, '2014-07-01 22:22:35', 5, 2, 4500, 9000),
(15, 'D3575JQ', 2, '2014-07-01 22:22:28', 6, 3, 12000, 36000),
(16, 'D4356DV', 2, '2014-07-01 22:22:21', 5, 2, 4500, 9000),
(17, 'D4356DV', 2, '2014-07-01 22:22:02', 3, 4, 10500, 42000),
(18, 'D3575JQ', 2, '2014-07-02 00:52:13', 5, 5, 4500, 22500),
(19, 'D3575JQ', 2, '2014-07-02 00:54:25', 5, 1, 4500, 4500),
(20, 'D3575JQ', 2, '2014-07-02 00:56:22', 3, 3, 10500, 31500),
(21, 'D3575JQ', 2, '2014-07-02 00:56:55', 6, 3, 12000, 36000),
(22, 'D3575JQ', 2, '2014-07-02 00:58:22', 3, 1, 10500, 10500),
(23, 'D3575JQ', 2, '2014-07-02 00:59:18', 3, 2, 10500, 21000),
(24, 'D3575JQ', 2, '2014-07-02 01:02:43', 3, 3, 10500, 31500),
(25, 'D3575JQ', 2, '2014-07-02 01:03:37', 3, 4, 10500, 42000),
(26, 'D3575JQ', 2, '2014-07-02 01:05:07', 3, 3, 10500, 31500),
(27, 'D3575JQ', 2, '2014-07-02 01:05:39', 6, 5, 12000, 60000),
(28, 'D3575JQ', 2, '2014-07-02 01:05:58', 3, 8, 10500, 84000),
(29, 'D3575JQ', 2, '2014-07-02 01:06:26', 6, 4, 12000, 48000),
(30, 'D5677DG', 2, '2015-01-05 08:26:30', 4, 10, 6500, 65000),
(31, 'D5677DG', 2, '2015-01-05 08:26:53', 3, 2, 10500, 21000),
(32, 'D4356DV', 1, '2015-01-06 07:06:27', 4, 2, 6500, 13000),
(33, 'D5474TQ', 1, '2015-01-06 14:51:25', 4, 3, 6500, 19500),
(34, 'D1425KS', 1, '2015-01-06 14:52:45', 4, 100, 6500, 650000),
(35, 'D5677DG', 1, '2015-01-06 15:54:29', 5, 10, 6500, 65000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD CONSTRAINT `limit_ref` FOREIGN KEY (`id_limit`) REFERENCES `tb_limit` (`id_limit`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `nopol_ref` FOREIGN KEY (`no_kendaraan`) REFERENCES `tb_kendaraan` (`no_kendaraan`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
