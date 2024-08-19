-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2024 at 06:55 AM
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
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-07-28-030044', 'App\\Database\\Migrations\\Novel', 'default', 'App', 1722137876, 1),
(2, '2024-07-28-032844', 'App\\Database\\Migrations\\Users', 'default', 'App', 1722137876, 1);

-- --------------------------------------------------------

--
-- Table structure for table `novel`
--

CREATE TABLE `novel` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` double(11,0) NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `novel`
--

INSERT INTO `novel` (`id`, `judul`, `slug`, `penulis`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `stok`, `harga`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Koala Kumal', 'koala-kumal', 'Raditya Dika', 'Gagas Media', '2015', 260, 100, 65000, 'koala_kumal.jpeg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(2, 'Jomblo : Sebuah Komedi Cinta', 'jomblo-sebuah-komedi-cinta', 'Adhitya Mulya', 'Gagas Media', '2003', 175, 100, 25000, 'jomblo.jpg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(3, 'Marmut Merah Jambu', 'marmut-merah-jambu', 'Raditya Dika', 'Bukune', '2010', 228, 100, 25000, 'marmut.jpg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(4, 'Skripsick', 'skripsick', 'Chara Perdana', 'Penerbit Matahari', '2014', 143, 100, 30000, 'skripsick.jpg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(5, 'Bajak Laut & Purnama Terakhir', 'bajak-laut-dan-purnama_terakhir', 'Adhitya Mulya', 'Gagas Media', '2016', 30, 100, 35000, 'bajak_laut.jpg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(6, 'Manusia Setengah Salmon', 'manusia-setengah-salmon', 'Raditya Dika', 'Gagas Media', '2017', 272, 100, 55000, 'manusia_setengah_salmon.png', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(7, '(Ex)perience', 'experience', 'Reza Pahlevi', 'Gagas Media', '2016', 188, 100, 65000, 'experience.jpg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(8, 'Cinta Brontosaurus', 'cinta-brontosaurus', 'Raditya Dika', 'Gagas Media', '2017', 208, 100, 60000, 'cinta_brontosaurus.png', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(9, 'Ubur-ubur Lembur', 'ubur-ubur-lembur', 'Raditya Dika', 'Gagas Media', '2017', 232, 100, 60000, 'ubur_ubur_lembur.jpg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(10, 'Setengah Jalan', 'setengah-jalan', 'Ernest Prakasa', 'BFirst', '2017', 151, 100, 30000, 'setengah_jalan.jpg', '2024-07-28 04:48:12', '2024-07-28 04:48:12'),
(12, 'Kambing Jantan', 'kambing-jantan', 'Raditya Dika', 'Gagas Media', '2017', 248, 100, 60000, 'kambing-jantan.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Babi Ngesot', 'babi-ngesot', 'Raditya Dika', 'Bukune', '2017', 224, 100, 55000, 'babi-ngesot.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Cupiderman 4G', 'cupiderman-4g', 'S. Gegge Mappangewa', 'Indiva Media Kreasi ', '2020', 184, 100, 52000, 'cupiderman.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'customer', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `novel`
--
ALTER TABLE `novel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
