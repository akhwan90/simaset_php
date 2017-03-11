-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 12, 2012 at 08:20 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `simaset`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `admin`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `r_kodebrg1`
-- 

CREATE TABLE `r_kodebrg1` (
  `kode1` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `r_kodebrg1`
-- 

INSERT INTO `r_kodebrg1` (`kode1`, `nama`) VALUES 
('PLN', 'Peralatan Laboratorium Nautika Kapal Niaga'),
('PLT', 'Peralatan Laboratorium Teknika Kapal Niaga'),
('APP', 'Alat Pendukung Pembelajaran'),
('APE', 'Alat Penunjang Pendidikan'),
('APR', 'Alat Praktek');

-- --------------------------------------------------------

-- 
-- Table structure for table `r_kodebrg2`
-- 

CREATE TABLE `r_kodebrg2` (
  `kode1` varchar(10) NOT NULL,
  `kode2` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `r_kodebrg2`
-- 

INSERT INTO `r_kodebrg2` (`kode1`, `kode2`, `nama`) VALUES 
('APE', 'NAU', 'Jurusan Nautika'),
('APE', 'TEK', 'Jurusan Teknika'),
('APP', 'NAU', 'Jurusan Nautika'),
('APP', 'TEK', 'Jurusan Teknika'),
('APR', 'IPA', 'Alat Praktek IPA'),
('APR', 'IPS', 'Alat Praktek IPS'),
('APR', 'AGM', 'Alat Praktek Agama'),
('APR', 'NAV', 'Alat Praktek Navigasi');

-- --------------------------------------------------------

-- 
-- Table structure for table `r_ruang`
-- 

CREATE TABLE `r_ruang` (
  `id_ruang` int(3) NOT NULL auto_increment,
  `nama_ruang` varchar(150) NOT NULL,
  `kondisi` int(3) NOT NULL,
  `luas` float NOT NULL,
  `tgg_jwb` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `r_ruang`
-- 

INSERT INTO `r_ruang` (`id_ruang`, `nama_ruang`, `kondisi`, `luas`, `tgg_jwb`) VALUES 
(1, 'Ruang Kepala Sekolah', 1, 16, 'Drs. Sugiatno'),
(2, 'Ruang Kantin', 1, 16, 'Drs. Sugiatno'),
(3, 'Ruang Laboratorium', 1, 56, 'Drs. Sugiatno'),
(4, 'Ruang Perpustakaan', 1, 30, 'Drs. Kuswadi');

-- --------------------------------------------------------

-- 
-- Table structure for table `t_barang`
-- 

CREATE TABLE `t_barang` (
  `id_barang` int(5) NOT NULL auto_increment,
  `kode_brg1` varchar(10) NOT NULL,
  `kode_brg2` varchar(10) NOT NULL,
  `kode_brg3` varchar(10) NOT NULL,
  `kode_brg4` varchar(4) NOT NULL,
  `kode_gbg` varchar(20) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `nilai_aset` float NOT NULL,
  `letak` int(2) NOT NULL,
  `kondisi` int(1) NOT NULL,
  `asal_perolehan` varchar(100) NOT NULL,
  `thn_dapat` varchar(4) NOT NULL,
  `tgl_buku` datetime NOT NULL,
  PRIMARY KEY  (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `t_barang`
-- 

INSERT INTO `t_barang` (`id_barang`, `kode_brg1`, `kode_brg2`, `kode_brg3`, `kode_brg4`, `kode_gbg`, `nama_barang`, `merk`, `nilai_aset`, `letak`, `kondisi`, `asal_perolehan`, `thn_dapat`, `tgl_buku`) VALUES 
(1, 'APR', 'IPA', '1', '1', 'APRIPA11', 'Gelas Ukur', 'Hitachi', 10000, 1, 1, 'P', '2012', '2012-06-11 19:55:28'),
(2, 'APR', 'IPA', '2', '1', 'APRIPA21', 'Bejana Ukur', 'Glass', 20000, 1, 2, 'Pembelian', '2012', '2012-06-11 19:56:07'),
(3, 'APR', 'IPA', '2', '2', 'APRIPA22', 'Bejana Ukur', 'Glass', 20000, 1, 2, 'Pembelian', '2012', '2012-06-11 19:56:07'),
(4, 'APR', 'IPS', '1', '1', 'APRIPS11', 'Globe', 'SInar Dunia', 30000, 1, 1, 'Pembelian', '2012', '2012-06-11 19:58:58'),
(5, 'APR', 'IPS', '1', '2', 'APRIPS12', 'Globe', 'SInar Dunia', 30000, 1, 1, 'Pembelian', '2012', '2012-06-11 19:58:58'),
(6, 'APR', 'IPA', '3', '1', 'APRIPA31', 'Termometer Celcius', 'Fahrenheit', 90000, 1, 1, 'Pembelian', '2012', '2012-06-11 20:01:25'),
(7, 'APR', 'IPA', '3', '2', 'APRIPA32', 'Termometer Celcius', 'Fahrenheit', 90000, 1, 1, 'Pembelian', '2012', '2012-06-11 20:01:26'),
(8, 'APR', 'IPA', '3', '3', 'APRIPA33', 'Termometer Celcius', 'Fahrenheit', 90000, 1, 1, 'Pembelian', '2012', '2012-06-11 20:01:26'),
(9, 'APR', 'IPA', '3', '4', 'APRIPA34', 'Termometer Celcius', 'Fahrenheit', 90000, 1, 1, 'Pembelian', '2012', '2012-06-11 20:01:26'),
(10, 'APR', 'IPA', '3', '5', 'APRIPA35', 'Termometer Celcius', 'Fahrenheit', 90000, 1, 1, 'Pembelian', '2012', '2012-06-11 20:01:26'),
(11, 'APP', 'NAU', '1', '1', 'APPNAU11', 'Kapal Tankers', 'Germany', 100000, 1, 1, 'Pembelian', '2012', '2012-06-11 20:05:10'),
(12, 'APR', 'IPA', '4', '1', 'APRIPA41', 'Solder Listrik', 'Sakura', 10000, 3, 1, 'Pembelian', '2012', '2012-06-12 18:29:48'),
(13, 'APR', 'IPA', '4', '2', 'APRIPA42', 'Solder Listrik', 'Sakura', 10000, 3, 1, 'Pembelian', '2012', '2012-06-12 18:29:48'),
(14, 'APR', 'IPA', '4', '3', 'APRIPA43', 'Solder Listrik', 'Sakura', 10000, 3, 1, 'Pembelian', '2012', '2012-06-12 18:29:48');
