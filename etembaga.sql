-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 08:32 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etembaga`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id_pesanan` varchar(30) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `total_harga` double NOT NULL DEFAULT '0',
  `penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(150) NOT NULL,
  `id_pengiriman` varchar(30) DEFAULT NULL,
  `id_ongkir` varchar(30) DEFAULT NULL,
  `id_pembayaran` varchar(30) DEFAULT NULL,
  `id_pelanggan` varchar(30) DEFAULT NULL,
  `id_kurir` varchar(30) DEFAULT NULL,
  `status` enum('draft','confirm','on_process','delivered') DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id_pesanan`, `tgl_pesanan`, `total_harga`, `penerima`, `alamat_penerima`, `id_pengiriman`, `id_ongkir`, `id_pembayaran`, `id_pelanggan`, `id_kurir`, `status`) VALUES
('INV-0001', '0000-00-00', 400000, 'jennie', 'djjdjdjdjjdjxjdjd373773', NULL, NULL, NULL, 'CUS-0005', NULL, 'draft'),
('INV-0002', '2019-09-13', 600000, 'rosa', 'Address city prov 123567', NULL, NULL, NULL, 'CUS-0004', NULL, 'draft'),
('INV-0003', '2019-09-15', 400000, 'rosa', 'adnf jxjx jdjdj 377474', NULL, NULL, NULL, 'CUS-0004', NULL, 'draft'),
('INV-0004', '2019-09-17', 600000, 'zakki123456', 'address city province 11460', NULL, NULL, NULL, 'CUS-0013', NULL, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `id_admin` varchar(30) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(30) NOT NULL,
  `pass_admin` varchar(30) NOT NULL,
  `notlp_admin` int(15) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL,
  `kodepos_admin` int(10) NOT NULL,
  `kota_admin` text NOT NULL,
  `prov_admin` text NOT NULL,
  `noktp_admin` int(30) NOT NULL,
  `role` enum('admin','pemilik') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_administrator`
--

INSERT INTO `tb_administrator` (`id_admin`, `nama_admin`, `username_admin`, `pass_admin`, `notlp_admin`, `email_admin`, `alamat_admin`, `kodepos_admin`, `kota_admin`, `prov_admin`, `noktp_admin`, `role`) VALUES
('1', 'Admin', 'admin', 'admin', 21, 'admin@gmail.com', '-', 910, '-', 'Jakarta', 91292002, 'admin'),
('2', 'Pemilik ', 'pemilik', 'pemilik', 21819189, 'pemilik@gmail.com', '-', 14350, '-', '-', 2333, 'pemilik'),
('4', 'helen', 'helen', 'helen', 12389, 'helen@gmail.com', 'BAKSARI', 1, 'boyolali', 'jawa tengah', 1234567, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id`, `id_produk`, `tgl_masuk`, `jumlah`) VALUES
(7, 'PRD-0002', '2019-09-01', 2),
(8, 'PRD-0001', '2019-09-03', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_biayakirim`
--

CREATE TABLE `tb_biayakirim` (
  `id_ongkir` varchar(30) NOT NULL,
  `kota_kirim` text NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biayakirim`
--

INSERT INTO `tb_biayakirim` (`id_ongkir`, `kota_kirim`, `biaya`) VALUES
('BYK-0001', 'Indrmayu', 1000),
('BYK-0002', 'Cirebon', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailproduk`
--

CREATE TABLE `tb_detailproduk` (
  `id_detailproduk` int(15) NOT NULL,
  `cart` bit(1) DEFAULT b'0',
  `favorite` bit(1) DEFAULT b'0',
  `id_pelanggan` varchar(30) DEFAULT NULL,
  `id_produk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(30) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `stok` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `stok`) VALUES
('KTG-0001', 'Pajangan rumah', NULL),
('KTG-0002', 'BC', NULL),
('KTG-0003', 'ghgg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurir`
--

CREATE TABLE `tb_kurir` (
  `id_kurir` varchar(30) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `notlp_kurir` int(15) NOT NULL,
  `username_kurir` varchar(30) DEFAULT NULL,
  `pass_kurir` varchar(30) DEFAULT NULL,
  `alamat_kurir` text,
  `jeniskel_kurir` char(15) NOT NULL,
  `noktp_kurir` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kurir`
--

INSERT INTO `tb_kurir` (`id_kurir`, `nama_kurir`, `notlp_kurir`, `username_kurir`, `pass_kurir`, `alamat_kurir`, `jeniskel_kurir`, `noktp_kurir`) VALUES
('1233', 'Bambang', 1221321, 'qq', 'qq', 'cfddf', 'Laki Laki', 121),
('KUR-1234', 'Agus', 22121, '123', '123', 'saas', '', 11212);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `username_pelanggan` varchar(50) NOT NULL,
  `pass_pelanggan` varchar(50) NOT NULL,
  `alamat_pelanggan` varchar(1000) NOT NULL,
  `kodepos_pel` int(10) NOT NULL,
  `kotapel` text NOT NULL,
  `provpel` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `notlp_pel` varchar(20) NOT NULL,
  `tgl_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `username_pelanggan`, `pass_pelanggan`, `alamat_pelanggan`, `kodepos_pel`, `kotapel`, `provpel`, `email`, `notlp_pel`, `tgl_daftar`) VALUES
('CUS-0001', 'zakki', 'm.muzakki', '123456', 'jln.sosial', 11460, 'Jakarta barat', 'DKI Jakarta', 'zakki@gmail.com', '2147483647', NULL),
('CUS-0002', 'zakki', 'usernamed', '123456', 'alamatku', 11460, 'Jakarta Barat', 'DKI Jakarta', 'email@email.com', '2147483647', NULL),
('CUS-0003', 'M.muzakki', 'username', '123456', 'Jalanan', 11460, 'Jakarta Barat', 'DKI Jakarta', 'zakkiaja@gmail.com', '123456', NULL),
('CUS-0004', 'nanda', 'rosa', '123456', 'Jl. Delima Barat Blok S No.3, RT.14/RW.3', 12440, 'Kota Jakarta Selatan', 'Daerah Khusus Ibukot', 'roudhatulnandilia2@gmail.com', '2147483647', NULL),
('CUS-0005', 'rosa', 'jennie', '123456', 'jln', 12345, 'city', 'province', 'zakkiaja@gmail.com', '38484889', NULL),
('CUS-0006', 'Zakia', 'zakia9', '12345', 'Jl. Darmawangsa VI No.5, RT.5/RW.1', 12160, 'Kota Jakarta Selatan', 'Daerah Khusus Ibukot', 'roudhatulnandilia2@gmail.com', '2147483647', NULL),
('CUS-0007', 'Lia hasan', 'Lia', '11111', 'Jl. Delima Barat Blok S No.3, RT.14/RW.3', 12440, 'Kota Jakarta Selatan', 'Daerah Khusus Ibukot', 'roudhatulnandilia2@gmail.com', '2147483647', NULL),
('CUS-0008', 'zakki123456', 'zakki', 'e10adc3949ba59abbe56e057f20f88', '11460', 0, 'DKI jakarta', 'DKI jakarta', 'bukanEmail@email.com', '2147483647', NULL),
('CUS-0009', 'zakki', 'zakki123', 'd41d8cd98f00b204e9800998ecf8427e', 'alamat', 11460, 'jakarta', 'DKI Jakarta', 'abcd@gmail.com', '2147483647', NULL),
('CUS-0010', 'zakki', 'zakki123', 'd41d8cd98f00b204e9800998ecf8427e', 'alamat', 11460, 'jakarta', 'DKI Jakarta', 'abcd@gmail.com', '2147483647', NULL),
('CUS-0011', 'zakki', 'zakki12345', 'e10adc3949ba59abbe56e057f20f883e', 'alamat', 11460, 'Jakarta', 'DKI jaakrta', 'email@email.com', '2147483647', NULL),
('CUS-0012', 'aaabcd', 'jek123', 'e10adc3949ba59abbe56e057f20f883e', 'address', 123456, 'city', 'provinci', 'email@email.com', '838457282', NULL),
('CUS-0013', 'zakki', 'zakki123456', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Jalan', 11460, 'Jakarta', 'DKI jakarta', 'emailaja@email.com', '2147483647', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` varchar(30) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jam_bayar` time NOT NULL,
  `jumlah_bayar` double DEFAULT '0',
  `id_pesanan` varchar(30) NOT NULL,
  `norek` varchar(10) NOT NULL,
  `status` enum('On_checking','Verification') DEFAULT 'On_checking'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `tgl_bayar`, `jam_bayar`, `jumlah_bayar`, `id_pesanan`, `norek`, `status`) VALUES
('BYR-0001', '2019-09-03', '12:00:00', 1400, '', '', 'On_checking'),
('BYR-0002', '0000-00-00', '11:11:00', 890000, 'INV-0010', '', 'On_checking'),
('BYR-0003', '2019-09-13', '07:07:56', 400000, 'INV-0001', '12345678', 'On_checking'),
('BYR-0004', '2019-09-13', '07:13:40', 600000, 'INV-0002', '1234567890', 'On_checking'),
('BYR-0005', '2019-09-15', '10:35:53', 400000, 'INV-0003', '173734779', 'On_checking'),
('BYR-0006', '2019-09-17', '12:20:04', 600000, 'INV-0004', '3747572728', 'On_checking');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanandetail`
--

CREATE TABLE `tb_pemesanandetail` (
  `id_detailpesanan` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `id_produk` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanandetail`
--

INSERT INTO `tb_pemesanandetail` (`id_detailpesanan`, `jumlah`, `id_pesanan`, `subtotal`, `id_produk`) VALUES
(19, 2, 'INV-0011', 200, 'PRD-0001'),
(20, 2, 'INV-0011', 200, 'PRD-0001'),
(21, 2, 'INV-0011', 200, 'PRD-0001'),
(23, 2, 'INV-0016', 400000, 'CUS-0003'),
(24, 3, 'INV-0016', 600000, 'keyIdProduk'),
(25, 3, 'INV-0016', 900000, 'PRD-0003'),
(26, 2, 'INV-0016', 1400000, 'PRD-0007'),
(27, 3, 'INV-0017', 600000, 'PRD-0002'),
(28, 3, 'INV-0018', 900000, 'PRD-0003'),
(29, 2, 'INV-0019', 1400000, 'PRD-0007'),
(30, 3, 'INV-0019', 600000, 'PRD-0002'),
(31, 5, 'INV-0020', 1500000, 'PRD-0003'),
(32, 5, 'INV-0021', 1000000, 'PRD-0002'),
(33, 5, 'INV-0018', 500000, 'PRD-0001'),
(34, 1, 'INV-0018', 100000, 'PRD-0001'),
(35, 5, 'INV-0018', 1000000, 'PRD-0002'),
(36, 5, 'INV-0019', 500000, 'PRD-0001'),
(37, 5, 'INV-0020', 500000, 'PRD-0001'),
(38, 7, 'INV-0021', 1400000, 'PRD-0002'),
(39, 6, 'INV-0022', 600000, 'PRD-0001'),
(40, 6, 'INV-0023', 600000, 'PRD-0001'),
(41, 3, 'INV-0024', 300000, 'PRD-0001'),
(42, 4, 'INV-0025', 800000, 'PRD-0002'),
(43, 6, 'INV-0026', 1200000, 'PRD-0002'),
(44, 1, 'INV-0027', 200000, 'PRD-0002'),
(45, 1, 'INV-0028', 200000, 'PRD-0002'),
(46, 2, 'INV-0029', 400000, 'PRD-0002'),
(47, 1, 'INV-0030', 200000, 'PRD-0002'),
(48, 1, 'INV-0031', 200000, 'PRD-0002'),
(49, 1, 'INV-0032', 200000, 'PRD-0002'),
(50, 2, 'INV-0001', 400000, 'PRD-0002'),
(51, 2, 'INV-0002', 600000, 'PRD-0003'),
(52, 2, 'INV-0003', 400000, 'PRD-0002'),
(53, 3, 'INV-0004', 600000, 'PRD-0002');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `id_pengiriman` varchar(30) NOT NULL,
  `id_kurir` varchar(30) NOT NULL,
  `status` enum('on_process','delivered') DEFAULT 'on_process',
  `id_pesanan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`id_pengiriman`, `id_kurir`, `status`, `id_pesanan`) VALUES
('KRM-0002', 'KUR-1234', 'on_process', 'INV-0020'),
('KRM-0003', '1233', 'on_process', 'INV-0018'),
('KRM-0004', '1233', 'on_process', 'INV-0019'),
('KRM-0005', '1233', 'on_process', 'INV-0020'),
('KRM-0006', '1233', 'on_process', 'INV-0021'),
('KRM-0007', '1233', 'on_process', 'INV-0024'),
('KRM-0008', '1233', 'on_process', 'INV-0025'),
('KRM-0009', '1233', 'on_process', 'INV-0026'),
('KRM-0010', '1233', 'on_process', 'INV-0027'),
('KRM-0011', '1233', 'on_process', 'INV-0028'),
('KRM-0012', '1233', 'on_process', 'INV-0029'),
('KRM-0013', '1233', 'on_process', 'INV-0030'),
('KRM-0014', '1233', 'on_process', 'INV-0031'),
('KRM-0015', '1233', 'on_process', 'INV-0032'),
('KRM-0016', '1233', 'on_process', 'INV-0001'),
('KRM-0017', '1233', 'on_process', 'INV-0002'),
('KRM-0018', '1233', 'on_process', 'INV-0003'),
('KRM-0019', '1233', 'on_process', 'INV-0004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` varchar(30) NOT NULL,
  `id_kategori` varchar(30) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok_produk` int(50) NOT NULL,
  `harga_produk` double NOT NULL,
  `des_produk` text NOT NULL,
  `terjual` int(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `stok_produk`, `harga_produk`, `des_produk`, `terjual`, `size`, `photo`) VALUES
('PRD-0001', 'KTG-0002', 'Tembaga New', 100, 100000, 'Tembaga murni buatan alam ', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/jennie.jpg'),
('PRD-0002', 'KTG-0002', 'Tembaga New', 100, 200000, 'Tembaga murni buatan alam ', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/lampugantungmodel1.jpg'),
('PRD-0003', 'KTG-0002', 'Karya dari tembaga', 100, 300000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/lampugantungmodel2.jpg'),
('PRD-0004', 'KTG-0002', 'Karya dari tembaga', 100, 400000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/lampugantungmodel3.jpg'),
('PRD-0005', 'KTG-0002', 'Karya dari tembaga', 100, 500000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/gelascantik.jpg'),
('PRD-0006', 'KTG-0002', 'Karya dari tembaga', 100, 600000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/gelascantik2.jpg'),
('PRD-0007', 'KTG-0002', 'Karya dari tembaga', 100, 700000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/miniaturbecak.jpg'),
('PRD-0008', 'KTG-0002', 'Karya dari tembaga', 100, 800000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/mugcantik.jpg'),
('PRD-0009', 'KTG-0002', 'Karya dari tembaga', 100, 900000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/cincintembaga.jpg'),
('PRD-0010', 'KTG-0002', 'Karya dari tembaga', 100, 110000, 'Lampu gantung', 10, 'Big', 'http://192.168.43.131/app_omma/assets/PhotoUpload/cincintembaga2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `telepon`
--

CREATE TABLE `telepon` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nomor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telepon`
--

INSERT INTO `telepon` (`id`, `nama`, `nomor`) VALUES
(1, 'Mas', '02198989'),
(2, 'Boy', '0127878');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_biayakirim`
--
ALTER TABLE `tb_biayakirim`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tb_detailproduk`
--
ALTER TABLE `tb_detailproduk`
  ADD PRIMARY KEY (`id_detailproduk`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kurir`
--
ALTER TABLE `tb_kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pemesanandetail`
--
ALTER TABLE `tb_pemesanandetail`
  ADD PRIMARY KEY (`id_detailpesanan`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `telepon`
--
ALTER TABLE `telepon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_detailproduk`
--
ALTER TABLE `tb_detailproduk`
  MODIFY `id_detailproduk` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pemesanandetail`
--
ALTER TABLE `tb_pemesanandetail`
  MODIFY `id_detailpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `telepon`
--
ALTER TABLE `telepon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
