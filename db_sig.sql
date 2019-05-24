-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2019 at 04:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sig`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `judul`, `isi_fasilitas`) VALUES
(1, 'Profile Kami', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `ikon` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`, `ikon`) VALUES
(25, 'Kantor', 'Kantor Dishub', 'government.png'),
(24, 'Halte', 'Halte', 'halte.png'),
(26, 'Terminal', 'Terminal', 'transport.png'),
(29, 'Jembatan Penyebrangan', 'Jembatan Penyebrangan', 'jembatan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text,
  `telp` varchar(20) NOT NULL,
  `latittude` text NOT NULL,
  `longitude` text NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `kategori`, `nama`, `alamat`, `telp`, `latittude`, `longitude`, `gambar`) VALUES
(24, 26, 'Terminal Kepandean', 'Jalan Letnan Jidun, Kelurahan Lontar, Kecamatan Serang, Lontarbaru, Kec. Serang, Kota Serang, Banten 42115', '-', '-6.111255', '106.142509', ''),
(23, 26, 'Terminal Cipocok', 'Jl. Ki Ajurum , Cipocok Jaya, Kota Serang, Banten 42117', '-', '-6.133366', '106.167543', ''),
(20, 26, 'Terminal Pakupatan', 'Jl. Akses Terminal Pakupatan S, Banjaragung, Cipocok Jaya, Kota Serang, Banten 42121', '', '-6.121615', '106.196407', ''),
(21, 25, 'Dishub Kota Serang', 'Jl. Raya Jak No.4, Panancangan, Cipocok Jaya, Kota Serang, Banten 42124', '(0254) 9148819', '-6.118579', '106.198613', ''),
(22, 25, 'Dishub Kabupaten Serang', 'Jl. Raya Jak No.4, Panancangan, Cipocok Jaya, Kota Serang, Banten 42124', '', '-6.116621', '106.199386', '');

-- --------------------------------------------------------

--
-- Table structure for table `trayekangkot`
--

CREATE TABLE `trayekangkot` (
  `id_trayek` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi_trayek` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(45) NOT NULL,
  `dibaca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `trayekangkot`
--

INSERT INTO `trayekangkot` (`id_trayek`, `judul`, `isi_trayek`, `gambar`, `tanggal`, `penulis`, `dibaca`) VALUES
(12, 'Trayek  Pakupatan - Ciceri - Kepandean PP', '<p><strong>Trayek &nbsp;Pakupatan - Ciceri - Kepandean PP</strong></p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"2\" cellspacing=\"1\" style=\"width:1000px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Kode Trayek</td>\r\n			<td>Trayek</td>\r\n			<td>Lintasan Trayek</td>\r\n			<td>Warna Bawah Kendaraan</td>\r\n			<td>Warna atas Kendaraan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>01</td>\r\n			<td>Pakupatan - Ciceri - Kepandean PP</td>\r\n			<td>TERMINAL PAKUPATAN&nbsp;<strong>&raquo;</strong>&nbsp;JL.RAYA JAKARTA&nbsp;<strong>&raquo;</strong>&nbsp;JL.JEND. SUDIRMAN&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 CICERI&nbsp;<strong>&raquo;</strong>&nbsp;JL.FATAH HASAN&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 WARUNG POJOK&nbsp;<strong>&raquo;</strong>&nbsp;JL.ABDUL HADI&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 KEBON JAHE&nbsp;<strong>&raquo;</strong>&nbsp;JL.TB.SUWANDI (LINGKAR SELATAN)&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 BRIMOB&nbsp;<strong>&raquo;</strong>&nbsp;LETNAN JIDUN&nbsp;<strong>&raquo;</strong>&nbsp;TERMINAL KEPANDEAN&nbsp;<strong>&raquo;</strong>&nbsp;LETNAN JIDUN&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 BRIMOB&nbsp;<strong>&raquo;</strong>&nbsp;JL.TB.SUWANDI (LINGKAR SELATAN)&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 KEBON JAHE&nbsp;<strong>&raquo;</strong>&nbsp;JL.ABDUL HADI&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 WARUNG POJOK&nbsp;<strong>&raquo;</strong>&nbsp;JL.FATAH HASAN&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 CICERI&nbsp;<strong>&raquo;</strong>&nbsp;JL.JEND. SUDIRMAN&nbsp;<strong>&raquo;</strong>&nbsp;JL.RAYA JAKARTA&nbsp;<strong>&raquo;</strong>&nbsp;TERMINAL PAKUPATAN</td>\r\n			<td>Kuning</td>\r\n			<td>\r\n			<p>Biru Metalik</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '', '2017-08-17', 'Admin', '16'),
(13, 'Trayek  Pakupatan - Ahmad Yani - Kepandean PP', '<p><strong>Trayek &nbsp;Pakupatan - Ahmad Yani - Kepandean PP</strong></p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:1000px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Kode Trayek</td>\r\n			<td>Trayek</td>\r\n			<td>Lintasan Trayek</td>\r\n			<td>Warna Bawah Kendaraan&nbsp;</td>\r\n			<td>Warna Atas Kendaraan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>02</td>\r\n			<td>Pakupatan - Ahmad Yani - Kepandean PP</td>\r\n			<td>TERMINAL PAKUPATAN&nbsp;<strong>&raquo;</strong>&nbsp;JL.RAYA JAKARTA&nbsp;<strong>&raquo;</strong>&nbsp;JL.JEND. SUDIRMAN&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 CICERI&nbsp;<strong>&raquo;</strong>&nbsp;JL.AHMAD YANI&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 SUMUR PECUNG&nbsp;<strong>&raquo;</strong>&nbsp;JL.AHMAD YANI&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 BNI / PISANG MAS&nbsp;<strong>&raquo;</strong>&nbsp;JLVETERAN&nbsp;<strong>&raquo;</strong>&nbsp;JL.YUMAGA&nbsp;<strong>&raquo;</strong>&nbsp;JL.KI MAS JONG&nbsp;<strong>&raquo;</strong>&nbsp;JL.KH.SYAM&rsquo;UN&nbsp;<strong>&raquo;</strong>&nbsp;JL.MAYOR SYAFEI&nbsp;<strong>&raquo;</strong>&nbsp;TERMINAL KEPANDEAN&nbsp;<strong>&raquo;</strong>&nbsp;MAYOR SYAFEI&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 POCIS / ROYAL&nbsp;<strong>&raquo;</strong>&nbsp;JL.DIPONEGORO&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 ALUN&nbsp;<strong>&raquo;</strong>&nbsp;LAUN&nbsp;<strong>&raquo;</strong>&nbsp;JL.VETERAN&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 BNI / PISANG MAS&nbsp;<strong>&raquo;</strong>&nbsp;JL.AHMAD YANI&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 SUMUR PECUNG&nbsp;<strong>&raquo;</strong>&nbsp;JL.AHMAD YANI&nbsp;<strong>&raquo;</strong>&nbsp;SIMPANG 4 CICERI&nbsp;<strong>&raquo;</strong>&nbsp;JL.JEND. I SUDIRMAN&nbsp;<strong>&raquo;</strong>&nbsp;JL.RAYA JAKARTA&nbsp;<strong>&raquo;</strong>&nbsp;TERMINAL PAKUPATAN</td>\r\n			<td>Putih</td>\r\n			<td>Biru Metalik</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '', '2017-08-17', 'Admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `trayekbus`
--

CREATE TABLE `trayekbus` (
  `id_trayek` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `isi_trayek` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(45) NOT NULL,
  `dibaca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `trayekbus`
--

INSERT INTO `trayekbus` (`id_trayek`, `judul`, `isi_trayek`, `gambar`, `tanggal`, `penulis`, `dibaca`) VALUES
(11, 'Trayek Bus Primajasa', '<p><strong>Trayek Bus Primajasa</strong></p>\r\n\r\n<p>Dibawah ini adalah trayek yang tersedia untuk PO Primajasa</p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>NO</td>\r\n			<td>Nama PO</td>\r\n			<td>Jurusan</td>\r\n			<td>Jam</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>Primajasa</td>\r\n			<td>Serang- KP. Rambutan</td>\r\n			<td>09.45-17.00</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>Primajasa</td>\r\n			<td>Serang-Tj.Priuk</td>\r\n			<td>09.33-14.32</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>Primajasa</td>\r\n			<td>Serang-Merak-KP.Rambutan</td>\r\n			<td>10.42-10.44</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4</td>\r\n			<td>Primajasa</td>\r\n			<td>Serang-Merak-Bekasi</td>\r\n			<td>10.45-16.52</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '', '2017-07-27', 'Admin', '15'),
(12, 'Trayek Bus Murni', '<p><strong>Trayek Bus Murni</strong></p>\r\n\r\n<p>Dibawah ini adalah trayek yang tersedia untuk PO Murni</p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>No</td>\r\n			<td>NamaPO</td>\r\n			<td>Jurusan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>Murni</td>\r\n			<td>Labuan-Kalideres</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', '', '2017-07-27', 'Admin', '17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trayekangkot`
--
ALTER TABLE `trayekangkot`
  ADD PRIMARY KEY (`id_trayek`);

--
-- Indexes for table `trayekbus`
--
ALTER TABLE `trayekbus`
  ADD PRIMARY KEY (`id_trayek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `trayekangkot`
--
ALTER TABLE `trayekangkot`
  MODIFY `id_trayek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trayekbus`
--
ALTER TABLE `trayekbus`
  MODIFY `id_trayek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
