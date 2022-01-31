-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 31. Januari 2022 jam 10:07
-- Versi Server: 5.1.35
-- Versi PHP: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbc45dm_triza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`) VALUES
(11, 'admin', 'admin'),
(12, 'indah', '12345'),
(13, 'ADI', '12345'),
(15, 'aaa', '12345'),
(16, 'aaa', '345'),
(17, 'AS', '12345'),
(18, 'kaka', 'kaka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `nmproduk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `jumlah_terjual` varchar(15) NOT NULL,
  `keputusan` varchar(255) NOT NULL,
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `nmproduk`, `harga`, `ukuran`, `stok`, `jumlah_terjual`, `keputusan`) VALUES
(16, 'Chitato Sapi Panggang 15G', 'Murah', 'Kecil', 'Banyak', 'Banyak', 'Laris'),
(17, 'Chitato Sapi Panggang 40G', 'Murah', 'Sedang', 'Banyak', 'Banyak', 'Laris'),
(18, 'Chitato Sapi Panggang 75G', 'Murah', 'Besar', 'Banyak', 'Banyak', 'Laris'),
(19, 'Chitato Ayam BBQ 75G', 'Murah', 'Besar', 'Sedikit', 'Sedikit', 'Tidak Laris'),
(20, 'Chitato Ayam Bumbu 40G', 'Murah', 'Sedang', 'Sedikit', 'Sedikit', 'Laris'),
(21, 'Chitato Sapi Bumbu Bakar 40G', 'Murah', 'Sedang', 'Sedikit', 'Sedikit', 'Laris'),
(22, 'Qtela Singkong Original 185G', 'Murah', 'Besar', 'Sedikit', 'Sedikit', 'Tidak Laris'),
(23, 'Qtela Singkong 60G', 'Murah', 'Sedang', 'Banyak', 'Sedikit', 'Laris'),
(24, 'Qtela Singkong BBQ 185G', 'Murah', 'Besar', 'Sedikit', 'Sedikit', 'Tidak Laris'),
(25, 'Qtela Singkong Balado 60G', 'Murah', 'Sedang', 'Banyak', 'Banyak', 'Laris'),
(26, 'Qtela Tempe Cabe Rawit 60G', 'Murah', 'Sedang', 'Banyak', 'Banyak', 'Laris'),
(27, 'Maxicorn Roasted Corn 160G', 'Murah', 'Besar', 'Banyak', 'Banyak', 'Laris'),
(28, 'Maxicorn 150G', 'Murah', 'Besar', 'Sedikit', 'Sedikit', 'Tidak Laris'),
(29, 'Maxicorn Barbecue 55G', 'Murah', 'Sedang', 'Sedikit', 'Banyak', 'Laris'),
(30, 'Pillows Keju 150G', 'Murah', 'Besar', 'Banyak', 'Banyak', 'Laris'),
(31, 'Pillows Coklat 150G', 'Murah', 'Besar', 'Banyak', 'Banyak', 'Laris'),
(32, 'Dancow Coklat 200G', 'Mahal', 'Kecil', 'Sedikit', 'Banyak', 'Laris'),
(33, 'Dancow Coklat 400G', 'Mahal', 'Sedang', 'Sedikit', 'Sedikit', 'Tidak Laris'),
(34, 'Dancow Coklat 800G', 'Mahal', 'Besar', 'Sedikit', 'Sedikit', 'Tidak Laris'),
(35, 'Tango Chocolate 176G', 'Murah', 'Besar', 'Banyak', 'Banyak', 'Laris'),
(36, 'Tango Chocolate 145G', 'Murah', 'Besar', 'Banyak', 'Banyak', 'Laris'),
(37, 'Nabati Wafer Coklat 53G', 'Murah', 'Kecil', 'Banyak', 'Banyak', 'Laris'),
(38, 'Nabati Pinklava 130G', 'Murah', 'Besar', 'Banyak', 'Banyak', 'Laris'),
(39, 'Nabati Gatito Chocolate 32G', 'Murah', 'Kecil', 'Sedikit', 'Sedikit', 'Laris'),
(40, 'Oat Choco Coklat 400G', 'Mahal', 'Besar', 'Sedikit', 'Sedikit', 'Tidak Laris');
