-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 11:18 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_barang` double NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama_barang`, `harga_barang`, `stok_barang`, `deskripsi_barang`, `gambar`) VALUES
(18, 'Tenda camping', 400000, 100, 'Lorem ipsum dolor sit amet', 'tenda.JPG'),
(19, 'Sleeping bag', 150000, 100, 'Lorem ipsum dolor sit amet', 'slepingbag.JPG'),
(20, 'Sepatu gunung', 500000, 100, 'Lorem ipsum dolor sit amet', 'sepatu.JPG'),
(21, 'Matras gunung', 150000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'matras.JPG'),
(22, 'Jaket gunung', 475000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'jaket.JPG'),
(23, 'Hammock', 200000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'hammock.JPG'),
(24, 'Cariel', 500000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'cariel.JPG'),
(25, 'Botol', 120000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'botol.JPG'),
(26, 'Laptop legion', 10000000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'Laptop Legion.webp'),
(27, 'Laptop HP', 4000000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'Laptop HP.webp'),
(28, 'Laptop HP Ryzen', 6000000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'Laptop HP Ryzen.jpg'),
(29, 'Kulkas', 2000000, 95, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ratione maiores dolor nihil, qui repellat sit voluptate distinctio minima, quam totam eaque architecto consequuntur recusandae tenetur atque porro. Distinctio, doloribus!', 'kulkas.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `email`, `description`) VALUES
(2, 'rian.cahyadi@wgs.co.id', 'Hallo hallo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `grand_total` double NOT NULL,
  `metode_pembayaran` enum('Transfer','Cash') NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_handphone` varchar(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `qty`, `grand_total`, `metode_pembayaran`, `alamat`, `email`, `no_handphone`, `nama`, `nama_barang`) VALUES
(11, 5, 10000000, 'Cash', 'Jl. Babakan sari', 'rian.cahyadi@wgs.co.id', '081779525818', 'Rian Cahyadi', 'Kulkas');

--
-- Triggers `tbl_pesanan`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `tbl_pesanan` FOR EACH ROW BEGIN
	UPDATE tbl_barang SET stok_barang = stok_barang - NEW.qty
    WHERE nama_barang = NEW.nama_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrasi`
--

CREATE TABLE `tbl_registrasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_handphone` varchar(13) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registrasi`
--

INSERT INTO `tbl_registrasi` (`id`, `nama`, `email`, `password`, `no_handphone`, `tgl_lahir`, `jenis_kelamin`) VALUES
(2, 'Rian Cahyadi', 'rian.cahyadi@wgs.co.id', 'd033e22ae348aeb5660fc2140aec35850c4da997', '081779525818', '2020-01-01', 'Pria');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `tbl_registrasi` (`nama`),
  ADD CONSTRAINT `tbl_pesanan_ibfk_2` FOREIGN KEY (`nama_barang`) REFERENCES `tbl_barang` (`nama_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
