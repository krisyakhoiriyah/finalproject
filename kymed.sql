-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 04:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kymed`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'yahya', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `nama`, `harga`, `gambar`, `status`) VALUES
(12, 1, 'eec', 12000, 'ee.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_session` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `sender` int(11) NOT NULL,
  `recipient` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `id_session`, `msg`, `sender`, `recipient`, `timestamp`) VALUES
(52, 5, 'asdasd', 5, 3, '2021-06-21 21:21:42'),
(53, 6, 'est', 5, 3, '2021-06-21 21:24:37'),
(54, 6, '', 5, 3, '2021-06-21 21:24:38'),
(55, 6, 'asdasd', 5, 3, '2021-06-21 21:24:39'),
(56, 6, 'asdasdas', 5, 3, '2021-06-21 21:24:42'),
(57, 9, 'Jancok!', 5, 3, '2021-06-22 00:05:37'),
(58, 9, 'cok juga', 3, 5, '2021-06-22 00:12:32'),
(59, 10, 'halo dok', 5, 3, '2021-06-22 00:21:58'),
(60, 10, 'yaa?', 3, 5, '2021-06-22 00:22:02'),
(61, 10, 'saya pilek', 5, 3, '2021-06-22 00:22:17'),
(62, 10, 'yaudah', 3, 5, '2021-06-22 00:22:25'),
(63, 10, 'asdasd', 3, 5, '2021-06-22 00:22:40'),
(64, 10, 'asdasd', 3, 5, '2021-06-22 00:22:42'),
(65, 10, 'asdasd', 3, 5, '2021-06-22 00:22:43'),
(66, 10, 'asdasd', 3, 5, '2021-06-22 00:24:32'),
(67, 10, 'assssssssss', 3, 5, '2021-06-22 00:24:35'),
(68, 10, 'acacaca', 3, 5, '2021-06-22 00:24:56'),
(69, 10, 'assssssssss', 3, 5, '2021-06-22 00:25:00'),
(70, 10, 'aac', 3, 5, '2021-06-22 00:26:15'),
(71, 10, 'asdas', 5, 3, '2021-06-22 00:28:37'),
(72, 10, 'dasdasd', 5, 3, '2021-06-22 00:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pengalaman` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_login` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `username`, `password`, `nama`, `pengalaman`, `harga`, `gambar`, `status_login`, `status`) VALUES
(3, 'yahya', 'dawad123321', 'Arief Yahya Prasetio', 3, 25000, 'yahya.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `status`) VALUES
(1, 'Kategori 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(11) NOT NULL,
  `pendapatan` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `pendapatan`, `date`) VALUES
(7, 12, '2021-06-22'),
(8, 12000, '2021-06-22'),
(9, 36000, '2021-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `dokter` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `started` datetime NOT NULL,
  `end` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `dokter`, `user`, `started`, `end`, `status`) VALUES
(1, 3, 5, '2021-06-22 03:34:47', '2021-06-22 04:19:43', 0),
(2, 3, 5, '2021-06-22 03:55:42', '2021-06-22 04:25:42', 0),
(3, 3, 5, '2021-06-22 03:59:14', '2021-06-22 04:29:14', 0),
(4, 3, 5, '2021-06-22 04:07:46', '2021-06-22 04:37:46', 0),
(5, 3, 5, '2021-06-22 04:11:55', '2021-06-22 04:12:55', 0),
(6, 3, 5, '2021-06-22 04:24:32', '2021-06-22 04:25:32', 0),
(7, 3, 5, '2021-06-22 04:26:08', '2021-06-22 04:26:18', 0),
(8, 3, 5, '2021-06-22 05:44:53', '2021-06-22 06:14:53', 0),
(9, 3, 5, '2021-06-22 06:38:20', '2021-06-22 07:08:20', 0),
(10, 3, 5, '2021-06-22 07:21:26', '2021-06-22 07:51:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `status_login` int(1) NOT NULL,
  `bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `status_login`, `bal`) VALUES
(3, 'user-baru', 'user', 1, 0, 0),
(4, 'user2', 'user2', 1, 0, 0),
(5, 'yahya', 'dawad123321', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
