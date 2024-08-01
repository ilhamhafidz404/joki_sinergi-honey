-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 05:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinergi-honey`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `bukti_bayar` varchar(255) NOT NULL,
  `uang_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `total_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_produk`, `total_jual`) VALUES
(1, 1, 0),
(2, 2, 10),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `name_account` varchar(50) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `price_product` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `village` varchar(25) DEFAULT NULL,
  `subdistrict` varchar(25) DEFAULT NULL,
  `district` varchar(25) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `expedition` enum('JNE','JNT') DEFAULT NULL,
  `payment_method` enum('BRI','DANA','Cash','') DEFAULT NULL,
  `payment_proof` text DEFAULT NULL,
  `status` enum('approve','pending','reject') DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_account` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(13) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_account`, `nama`, `username`, `email`, `password`, `user_type`, `hp`, `lahir`) VALUES
(1, 'pelanggan', 'pelanggan', 'pelanggan@gmail.com', 'password', 'pelanggan', '083871352030', '1980-03-20'),
(2, 'admin', 'admin', 'admin@gmail.com', 'password', 'admin', '083871352031', '2024-03-20'),
(3, 'pemilik', 'pemilik', 'pemilik@gmail.com', 'password', 'pemilik', '083871352033', '2024-03-20'),
(4, 'coba', 'test', 'coba@gmail.com', 'password', 'pelanggan', 'coba', '2024-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_product` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `khasiat` text NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_product`, `nama_produk`, `deskripsi`, `khasiat`, `ukuran`, `harga_produk`, `stok`, `foto_produk`) VALUES
(1, 'Madu 1', 'Madu Hutan Asli adalah madu murni yang diambil langsung dari sarang lebah liar yang hidup di hutan tropis. Diproses secara alami tanpa tambahan bahan kimia, madu ini mempertahankan semua nutrisi dan enzim yang bermanfaat bagi kesehatan. Madu Hutan Asli memiliki rasa yang kaya dan aroma yang khas, menjadikannya pilihan sempurna untuk dikonsumsi sehari-hari.', '- Meningkatkan Imunitas: Kandungan antioksidan yang tinggi dalam madu membantu meningkatkan sistem kekebalan tubuh.<br>- Menyembuhkan Luka: Sifat antibakteri dan antiinflamasi madu efektif untuk penyembuhan luka dan luka bakar.<br>- Meningkatkan Energi: Madu menyediakan sumber energi alami yang cepat diserap oleh tubuh, cocok untuk meningkatkan stamina.<br>- Meredakan Batuk dan Radang Tenggorokan: Madu telah lama digunakan sebagai obat alami untuk meredakan batuk dan sakit tenggorokan.<br>- Mendukung Pencernaan: Enzim yang terdapat dalam madu membantu pencernaan dan menjaga kesehatan saluran cerna.', '250 ml, 500 ml, 900 ml', 10000, 53, '2.webp'),
(2, 'Madu 2', 'Madu Hutan Asli adalah madu murni yang diambil langsung dari sarang lebah liar yang hidup di hutan tropis. Diproses secara alami tanpa tambahan bahan kimia, madu ini mempertahankan semua nutrisi dan enzim yang bermanfaat bagi kesehatan. Madu Hutan Asli memiliki rasa yang kaya dan aroma yang khas, menjadikannya pilihan sempurna untuk dikonsumsi sehari-hari.', '- Meningkatkan Imunitas: Kandungan antioksidan yang tinggi dalam madu membantu meningkatkan sistem kekebalan tubuh.<br>- Menyembuhkan Luka: Sifat antibakteri dan antiinflamasi madu efektif untuk penyembuhan luka dan luka bakar.<br>- Meningkatkan Energi: Madu menyediakan sumber energi alami yang cepat diserap oleh tubuh, cocok untuk meningkatkan stamina.<br>- Meredakan Batuk dan Radang Tenggorokan: Madu telah lama digunakan sebagai obat alami untuk meredakan batuk dan sakit tenggorokan.<br>- Mendukung Pencernaan: Enzim yang terdapat dalam madu membantu pencernaan dan menjaga kesehatan saluran cerna.', '250 ml, 500 ml, 1000 ml', 20000, 88, '5.jpg'),
(3, 'Madu 3', 'Madu Hutan Asli adalah madu murni yang diambil langsung dari sarang lebah liar yang hidup di hutan tropis. Diproses secara alami tanpa tambahan bahan kimia, madu ini mempertahankan semua nutrisi dan enzim yang bermanfaat bagi kesehatan. Madu Hutan Asli memiliki rasa yang kaya dan aroma yang khas, menjadikannya pilihan sempurna untuk dikonsumsi sehari-hari.', '- Meningkatkan Imunitas: Kandungan antioksidan yang tinggi dalam madu membantu meningkatkan sistem kekebalan tubuh.<br>- Menyembuhkan Luka: Sifat antibakteri dan antiinflamasi madu efektif untuk penyembuhan luka dan luka bakar.<br>- Meningkatkan Energi: Madu menyediakan sumber energi alami yang cepat diserap oleh tubuh, cocok untuk meningkatkan stamina.<br>- Meredakan Batuk dan Radang Tenggorokan: Madu telah lama digunakan sebagai obat alami untuk meredakan batuk dan sakit tenggorokan.<br>- Mendukung Pencernaan: Enzim yang terdapat dalam madu membantu pencernaan dan menjaga kesehatan saluran cerna.', '250 ml, 500 ml, 1000 ml', 25000, 50, '2ef15921ee05a4aaef5e26e25a209e06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `id_validasi` int(11) NOT NULL,
  `id_bayar` int(11) NOT NULL,
  `status` enum('approve','reject','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_keranjang` (`id_keranjang`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`id_validasi`),
  ADD KEY `id_bayar` (`id_bayar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `validasi`
--
ALTER TABLE `validasi`
  MODIFY `id_validasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `produk` (`id_product`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `pelanggan` (`id_account`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_product`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id_keranjang`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `pelanggan` (`id_account`);

--
-- Constraints for table `validasi`
--
ALTER TABLE `validasi`
  ADD CONSTRAINT `validasi_ibfk_1` FOREIGN KEY (`id_bayar`) REFERENCES `bayar` (`id_bayar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
