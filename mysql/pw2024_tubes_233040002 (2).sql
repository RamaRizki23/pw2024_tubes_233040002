-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2024 at 04:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040002`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Obat'),
(2, 'Vitamin & Suplemen'),
(3, 'Ibu & anak'),
(4, 'Kecantikan &amp; Perawatan diri'),
(5, 'Buku');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `kategori_id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `detail` text,
  `ketersediaan_stok` enum('habis','tersedia') DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `foto`, `detail`, `ketersediaan_stok`) VALUES
(1, 5, 'The Fighting Anxiety.pdf', 7000, '8ELdYGEDqINFLPPwGVwD.jpg', 'This book is suitable for those of you who are or want to fight your anxiety', 'tersedia'),
(2, 5, 'Memilih Pulih', 64000, 'MHMGHdHjgMKCnK9EspFc.jpg', 'This book invites us to look clearly again: How did the problem arise in the first place and undermine our confidence in being able to rise? Because to recover, an extraordinarily long and simultaneous process is required.', 'tersedia'),
(3, 5, 'Me, Myself, and Mental Health', 58000, '47f5FILsOgTKjwZ1YBEb.jpg', 'In this book, you will understand more deeply:\r\n1. What is mental health and why is it important?\r\n2. Adolescent mental processes\r\n3. Problems often faced by teenagers\r\n4. Practical tips for mental health for teenagers\r\n5. Self-actualization for teenagers', 'tersedia'),
(4, 5, 'Filosofi Teras', 85000, 'ZOTgoq59UHzjWooUS6n0.jpg', 'This book reminds us that although there are many things in life we ​​cannot control, we always have control over how we respond to them.', 'tersedia'),
(5, 5, 'Kesehatan Mental Perspektif Psikologis dan Agama', 67000, '6Lt8YG1XFjgsrRRWmQcb.jpg', 'This book is able to present discussions related to human mentality from basic to complex things in a coherent and easy to understand manner.', 'tersedia'),
(6, 5, 'Kesehatan Mental Konsep dan Penerapan', 71000, 'UY4x2Z8TUeWpLDRviynz.jpg', '                        This book discusses the basic concepts of health and the scope of mental health, views on mental health and mental disorders and their classification, biological dimensions of mental health, psychological dimensions of mental health, socio-cultural dimensions of mental health, environmental dimensions of mental health, historical treatment of mental health, prevalence in mental health, mental health of children to the elderly, families, sex education for teenagers, women in society and families, mental health in schools, needs, mental programs and evaluations, mental health in developing countries, mental health programs and evaluations.                    ', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2a$05$GsW52ddgmostT921zub.GedXnWl7wMAhmVIxbhRY25GqKtymkFWyu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
