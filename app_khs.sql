-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 12:43 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_khs`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `takademik` year(4) NOT NULL,
  `sakit` int(10) NOT NULL,
  `ijin` int(10) NOT NULL,
  `alpa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `nim`, `semester`, `takademik`, `sakit`, `ijin`, `alpa`) VALUES
(3, '1623734335', 'I', 2016, 6, 0, 25),
(4, '1623734335', 'II', 2016, 9, 9, 10),
(5, '1623734335', 'III', 2017, 23, 12, 43),
(6, '1623734335', 'IV', 2017, 0, 5, 12),
(7, '1623734335', 'V', 2018, 5, 12, 23),
(8, '1623734335', 'VI', 2018, 34, 2, 12),
(10, '1727366339', 'VI', 2019, 2, 3, 2),
(11, '1727366339', 'III', 2018, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `nim` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`nim`, `tahun`) VALUES
('1623734335', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(21) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `no_hp`, `password`, `foto`) VALUES
('19770519 200212 1 002', 'Jemsrado Sine, ST.,M.Eng', '081234567890', '202cb962ac59075b964b07152d234b70', '19770519_200212_1_002.jpg'),
('19770519 200712 1 001', 'Robinson Wadu, ST.,MT', '094763620909', '202cb962ac59075b964b07152d234b70', 'user.jpg'),
('19780313 200604 2 002', 'Christa Bire, ST., MT', '08123456789', '', 'user.jpg'),
('19780323 200604 2 002', 'Sumartini Dana, ST.,MT', '081234567890', '202cb962ac59075b964b07152d234b70', '19780323_200604_2_002.jpg'),
('19780326 200604 2 002', 'Nikson Fallo, ST., M.Eng', '08123456789', '', 'user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `elemenmk`
--

CREATE TABLE `elemenmk` (
  `nama` varchar(100) NOT NULL,
  `elemenmk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elemenmk`
--

INSERT INTO `elemenmk` (`nama`, `elemenmk`) VALUES
('Mata kuliah Berkehidupan Bermasyarakat', 'MBB'),
('Matakuliah Keahlian Berkarya', 'MKB'),
('Matakuliah Keilmuan dan Keterampilan', 'MKK'),
('Mata kuliah Perilaku Berkarya', 'MPB'),
('Mata kuliah Pengembangan Kepribadian', 'MPK');

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kodemk` varchar(20) NOT NULL,
  `am` decimal(6,2) NOT NULL,
  `semester` varchar(3) NOT NULL,
  `status` varchar(20) NOT NULL,
  `takademik` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='{\r\n  "validation": {\r\n    "nim": "Phone",\r\n    "kodemk": "NotEmpty",\r\n    "am": "NotEmpty",\r\n    "n": "NotEmpty",\r\n    "nk": "NotEmpty"\r\n  },\r\n  "required": []\r\n}';

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`id`, `nim`, `kodemk`, `am`, `semester`, `status`, `takademik`) VALUES
(72, '1623734335', 'MPK83993', '86.00', 'I', '1', 2016),
(74, '1623734335', 'MPK73637', '90.00', 'I', '1', 2016),
(75, '1623734335', 'MPB63738', '76.00', 'II', '1', 2016),
(76, '1623734335', 'MPB63726', '75.00', 'V', '1', 2018),
(77, '1623734335', 'MKK83983', '80.00', 'I', '1', 2016),
(78, '1623734335', 'MKK83891', '89.00', 'I', '1', 2016),
(80, '1623734335', 'MKK83834', '78.00', 'I', '1', 2016),
(81, '1623734335', 'MKK83738', '87.00', 'II', '1', 2016),
(82, '1623734335', 'MKK83673', '90.00', 'II', '1', 2016),
(83, '1623734335', 'MKK83083', '80.00', 'II', '1', 2016),
(84, '1623734335', 'MKB08983', '80.00', 'III', '1', 2017),
(85, '1623734335', 'MKB08963', '80.00', 'IV', '1', 2017),
(86, '1623734335', 'MKB08961', '76.00', 'V', '1', 2018),
(87, '1623734335', 'MKB08945', '78.00', 'IV', '1', 2017),
(88, '1623734335', 'MKB08932', '77.00', 'V', '1', 2018),
(89, '1623734335', 'MKB08921', '78.00', 'IV', '1', 2017),
(90, '1623734335', 'MKB08909', '75.00', 'IV', '1', 2017),
(91, '1623734335', 'MKB08906', '78.00', 'V', '1', 2018),
(92, '1623734335', 'MKB08757', '80.00', 'IV', '1', 2017),
(93, '1623734335', 'MKB08754', '81.00', 'II', '1', 2016),
(94, '1623734335', 'MKB08737', '81.00', 'III', '1', 2017),
(95, '1623734335', 'MKB08681', '75.00', 'III', '1', 2017),
(96, '1623734335', 'MKB08643', '76.00', 'III', '1', 2017),
(97, '1623734335', 'MKB08632', '80.00', 'V', '1', 2018),
(100, '1623734335', 'MPK83763', '100.00', 'V', '1', 2018),
(138, '1623734335', 'MBB32644', '80.00', 'VI', '', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `nip` varchar(21) DEFAULT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'user.jpg',
  `password` varchar(50) NOT NULL DEFAULT 'd41d8cd98f00b204e9800998ecf8427e'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='{\r\n  "validation": {\r\n    "nim": "Phone",\r\n    "nama": "Name",\r\n    "prodi": "NotEmpty",\r\n    "kelas": "NotEmpty",\r\n    "angkatan": "NotEmpty"\r\n  },\r\n  "required": []\r\n}';

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `prodi`, `kelas`, `angkatan`, `status`, `nip`, `foto`, `password`) VALUES
('1623324553', 'Agustinus Belu', '', '', '0000-00-00', '4', 'A', 2016, 'Aktif', '19770519 200712 1 001', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623324554', 'Benadus K M dede', '', '', '0000-00-00', '4', 'A', 2016, 'Aktif', '19770519 200712 1 001', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623732012', 'Angelina A do', '', '', '0000-00-00', '3', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623732013', 'Apolonia M A gua', '', '', '0000-00-00', '3', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623732014', 'Bernadus G mau', '', '', '0000-00-00', '3', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734334', 'Antonius A. Laure', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734335', 'Bonaventura P Jemi', 'Pria', 'Ende', '1998-10-26', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', '1623734335.png', '202cb962ac59075b964b07152d234b70'),
('1623734336', 'Edalya H. Dos Reis', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200712 1 001', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734337', 'Eleonora Gowa Do', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734338', 'Fandio K. Lado', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734339', 'Gracelia N Falo', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734340', 'Marianto Manu Djo', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734341', 'Mario S R Wage', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734342', 'Novita Sari Ratu', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734343', 'Noni Tapatab', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734344', 'Oriyanti Leo Koy', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734345', 'Ongki Radja', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734346', 'Priangga S Manoeroe', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734347', 'Stef F K Tenis', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734348', 'Yandri Wurarah', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734349', 'Yohanes Jefridus Amon', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734350', 'Yosua Ndolu', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734351', 'Yunet Neno Banu', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623734352', 'Yuniati Neno', '', '', '0000-00-00', '1', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623735614', 'Albertus Agung', '', '', '0000-00-00', '5', 'A', 2016, 'Aktif', '19780323 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623735615', 'Budi Setiawan', '', '', '0000-00-00', '5', 'A', 2016, 'Aktif', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623735616', 'Cecep Arifin', '', '', '0000-00-00', '5', 'A', 2016, 'Aktif', '19780313 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623744331', 'Nobertus Eo', '', '', '0000-00-00', '2', 'A', 2016, 'Aktif', '19780326 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623744332', 'Omega Manu', '', '', '0000-00-00', '2', 'A', 2016, 'Aktif', '19780313 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1623744333', 'Petrus A M deu', '', '', '0000-00-00', '2', 'A', 2016, 'Aktif', '19780326 200604 2 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e'),
('1727366339', 'Antonius B. Sam', 'Pria', 'Ende', '1998-10-11', '1', 'A', 2017, 'DO', '19770519 200212 1 002', 'user.jpg', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Table structure for table `matakulah`
--

CREATE TABLE `matakulah` (
  `elemenmk` varchar(50) DEFAULT NULL,
  `kodemk` varchar(20) NOT NULL,
  `namamk` varchar(50) NOT NULL,
  `sks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='{\r\n  "validation": {\r\n    "kodemk": "NotEmpty",\r\n    "namamk": "NotEmpty",\r\n    "sks": "NotEmpty"\r\n  },\r\n  "required": []\r\n}';

--
-- Dumping data for table `matakulah`
--

INSERT INTO `matakulah` (`elemenmk`, `kodemk`, `namamk`, `sks`) VALUES
('MBB', 'MBB31645', 'TA', 6),
('MBB', 'MBB32644', 'PKL', 4),
('MKB', 'MKB08632', 'Keamanan Jaringan', 3),
('MKB', 'MKB08643', 'Sistem Digital', 2),
('MKB', 'MKB08681', 'Sistem Operasi', 3),
('MKB', 'MKB08737', 'Troubleshooting', 3),
('MKB', 'MKB08754', 'Algoritma Pemrograman', 3),
('MKB', 'MKB08757', 'Embedded', 3),
('MKB', 'MKB08906', 'Jarkom 3', 3),
('MKB', 'MKB08909', 'Pemrograman Web', 3),
('MKB', 'MKB08921', 'Pemrograman klien server', 3),
('MKB', 'MKB08932', 'Project 2', 3),
('MKB', 'MKB08945', 'Jarkom 2', 3),
('MKB', 'MKB08961', 'Perawatan dan perbaikan jaringan', 3),
('MKB', 'MKB08963', 'Projek 1', 3),
('MKB', 'MKB08983', 'Jarkom 1', 3),
('MKK', 'MKK53221', 'Bahasa Inggris', 2),
('MKK', 'MKK83083', 'Basis Data', 2),
('MKK', 'MKK83673', 'Dasar Elektronika', 3),
('MKK', 'MKK83738', 'Bahasa Inggris Teknik', 3),
('MKK', 'MKK83834', 'Matematika 1', 3),
('MKK', 'MKK83838', 'Komunikasi Data', 2),
('MKK', 'MKK83891', 'Arsitektur Komputer', 2),
('MKK', 'MKK83983', 'Dasar Komputer', 2),
('MPB', 'MPB63726', 'Sistem Manejemen Mutu', 2),
('MPB', 'MPB63738', 'Kesehatan dan keselamatan kerja', 3),
('MPK', 'MPK73637', 'Pendidikan Agama', 2),
('MPK', 'MPK83763', 'Bahasa Indonesia', 2),
('MPK', 'MPK83993', 'Pendidikan Pancasila', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mkprodi`
--

CREATE TABLE `mkprodi` (
  `id` int(100) NOT NULL,
  `kodemk` varchar(50) NOT NULL,
  `kodeprodi` varchar(50) NOT NULL,
  `nip` varchar(21) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `takademik` varchar(100) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `id_hari` varchar(1) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mkprodi`
--

INSERT INTO `mkprodi` (`id`, `kodemk`, `kodeprodi`, `nip`, `kelas`, `semester`, `id_ruangan`, `takademik`, `hari`, `id_hari`, `jam_mulai`, `jam_selesai`) VALUES
(26, 'MPK83993', '1', '19780323 200604 2 002', 'A', 'I', 1, '2018', 'Senin', '1', '09:00:00', '10:00:00'),
(27, 'MKK83838', '1', '19780323 200604 2 002', 'A', 'III', 2, '2017', 'Senin', '1', '02:01:00', '03:03:00'),
(28, 'MPK83993', '1', '19780313 200604 2 002', 'A', 'I', 1, '2016', 'Senin', '1', '07:30:00', '08:30:00'),
(29, 'MKK83983', '1', '19780323 200604 2 002', 'A', 'I', 2, '2016', 'Senin', '1', '09:00:00', '11:00:00'),
(30, 'MPK73637', '1', '19770519 200212 1 002', 'A', 'I', 7, '2016', 'Senin', '1', '12:00:00', '13:30:00'),
(31, 'MKK83834', '1', '19770519 200212 1 002', 'A', 'I', 3, '2016', 'Selasa', '2', '08:00:00', '09:30:00'),
(32, 'MKK83891', '1', '19770519 200712 1 001', 'A', 'I', 4, '2016', 'Selasa', '2', '10:00:00', '11:30:00'),
(33, 'MPB63738', '1', '19770519 200212 1 002', 'A', 'I', 7, '2016', 'Selasa', '2', '12:00:00', '13:30:00'),
(34, 'MKK83673', '1', '19770519 200712 1 001', 'A', 'I', 9, '2016', 'Rabu', '3', '08:00:00', '09:30:00'),
(35, 'MKK83738', '1', '19780313 200604 2 002', 'A', 'I', 7, '2016', 'Rabu', '3', '10:08:00', '11:08:00'),
(36, 'MPK83763', '1', '19780323 200604 2 002', 'A', 'I', 7, '2016', 'Rabu', '3', '12:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`kode`, `nama`, `nip`, `jabatan`, `foto`) VALUES
(1, 'Jemsrado Sine,ST.,M.Eng', '19770519 200212 1 002', 'Ketua Jurusan', '1.jpg'),
(2, 'Ir. Aloysius Leki.,M.Si', '35246748958', 'Pudir Bid. Akademik', '2.jpg'),
(3, 'Sumartini Dana', '53678475647389', 'Sekertaris Jurusan', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kodeprodi` int(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jenjang` varchar(4) NOT NULL,
  `kepro` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kodeprodi`, `prodi`, `jenjang`, `kepro`) VALUES
(1, 'TKJ', 'D3', '19780323 200604 2 002'),
(2, 'Elektronika', 'D3', '19770519 200212 1 002'),
(3, 'Listrik', 'D3', '19780326 200604 2 002'),
(4, 'Listrik Kerjasama', 'D3', '19780313 200604 2 002'),
(5, 'Teknik Instalasi Listrik', 'D4', '19770519 200712 1 001');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(10) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'TEB-01'),
(2, 'TEB-02'),
(3, 'TEB-03'),
(4, 'TEL-01'),
(5, 'TEL-02'),
(6, 'TEL-03'),
(7, 'TEB-04'),
(8, 'TEB-05'),
(9, 'TEB-06'),
(10, 'LAB-JARINGAN 1'),
(11, 'LAB-JARINGAN 2'),
(12, 'LAB-MULTIMEDIA 1'),
(13, 'LAB-MULTIMEDIA 2');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama`, `value`) VALUES
(1, 'Batas Penginputan Nilai', '17/06/2020');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhir`
--

CREATE TABLE `tugas_akhir` (
  `id` int(100) NOT NULL,
  `nim` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal_lulus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_akhir`
--

INSERT INTO `tugas_akhir` (`id`, `nim`, `judul`, `tanggal_lulus`) VALUES
(126, 1623734331, 'Membuat Aplikasi KHS Elektro', '2020-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `level` varchar(50) NOT NULL,
  `prodi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `no_hp`, `foto`, `level`, `prodi`) VALUES
(4, 'Ketua Jurusan', 'Kajur', 'e07ab09a2821b19439a81904a6afd32e', '93900404', '4.png', 'Kajur/Sekjur', '1'),
(7, 'admin tkj', 'admin Tkj', '202cb962ac59075b964b07152d234b70', '46738920394', '7.png', 'Operator', '1'),
(8, 'Admin Elektronika', 'Admin Elk', '202cb962ac59075b964b07152d234b70', '123456789', '8.png', 'Operator', '2'),
(12, 'Admin Listrik', 'Admin Listrik', '202cb962ac59075b964b07152d234b70', '46738920394', 'user.jpg', 'Operator', '3'),
(13, 'Sek Jurusan', 'Sekjur', 'f7ceca87add0dba02468f06e05548724', '46738920394', '13.jpg', 'Kajur/Sekjur', '1'),
(14, 'Admin T I Listrik', 'listik d4', '202cb962ac59075b964b07152d234b70', '46738920394', 'user.jpg', 'Operator', '5'),
(15, 'admin PLN', 'admin pln', '202cb962ac59075b964b07152d234b70', '46738920394', 'user.jpg', 'Operator', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`nim`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `elemenmk`
--
ALTER TABLE `elemenmk`
  ADD PRIMARY KEY (`elemenmk`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`nim`,`kodemk`),
  ADD KEY `kodemk` (`kodemk`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `matakulah`
--
ALTER TABLE `matakulah`
  ADD PRIMARY KEY (`kodemk`),
  ADD KEY `elemenmk` (`elemenmk`);

--
-- Indexes for table `mkprodi`
--
ALTER TABLE `mkprodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`kodemk`,`nip`),
  ADD KEY `ddd` (`id_ruangan`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kodeprodi`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unik` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `khs`
--
ALTER TABLE `khs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `mkprodi`
--
ALTER TABLE `mkprodi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `kodeprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`kodemk`) REFERENCES `matakulah` (`kodemk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `khs_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `matakulah`
--
ALTER TABLE `matakulah`
  ADD CONSTRAINT `matakulah_ibfk_1` FOREIGN KEY (`elemenmk`) REFERENCES `elemenmk` (`elemenmk`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mkprodi`
--
ALTER TABLE `mkprodi`
  ADD CONSTRAINT `mkprodi_ibfk_1` FOREIGN KEY (`kodemk`) REFERENCES `matakulah` (`kodemk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mkprodi_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
