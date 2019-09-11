-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 21. Oktober 2018 jam 19:00
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gaji`
--

CREATE TABLE IF NOT EXISTS `t_gaji` (
  `nip` int(7) NOT NULL,
  `gol` varchar(5) NOT NULL,
  `gp` char(8) NOT NULL,
  `tunjangan` char(8) NOT NULL,
  `transport` char(8) NOT NULL,
  `nm_guru` varchar(40) NOT NULL,
  `bln` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `jm` char(8) NOT NULL,
  `total_gaji` char(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_gaji`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `t_guru`
--

CREATE TABLE IF NOT EXISTS `t_guru` (
  `nip` varchar(7) NOT NULL,
  `gol` varchar(5) NOT NULL,
  `password` text NOT NULL,
  `hak_akses` text NOT NULL,
  `nm_guru` varchar(40) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_guru`
--

INSERT INTO `t_guru` (`nip`, `gol`, `password`, `hak_akses`, `nm_guru`, `jekel`, `tmp_lahir`, `tgl_lahir`, `alamat`, `tlp`, `foto`) VALUES
('111', 'A-11', '698d51a19d8a121ce581499d7b701668', 'admin', 'Agung Dwicahyadi', 'L', 'Bogor', '2018-10-01', 'PUTUK, RT04/07, KARANGSARI, SEMIN, GUNUNGKIDUL, YOGYAKARTA', '085743040609', 'edit3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jabatan`
--

CREATE TABLE IF NOT EXISTS `t_jabatan` (
  `gol` varchar(5) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `gp` char(8) NOT NULL,
  `tunjangan` char(8) NOT NULL,
  `transport` char(8) NOT NULL,
  PRIMARY KEY (`gol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jabatan`
--

INSERT INTO `t_jabatan` (`gol`, `jabatan`, `gp`, `tunjangan`, `transport`) VALUES
('A-11', 'Admin', '10000', '10000', '1000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
