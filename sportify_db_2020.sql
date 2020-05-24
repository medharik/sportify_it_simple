-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 02:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportify_db_2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnes`
--

CREATE TABLE `abonnes` (
  `id` int(11) NOT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `date_naissance` varchar(255) DEFAULT NULL,
  `profession` varchar(254) DEFAULT NULL,
  `sexe` varchar(254) DEFAULT NULL,
  `inscrit_le` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(255) DEFAULT NULL,
  `cin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `abonnes`
--

INSERT INTO `abonnes` (`id`, `nom`, `prenom`, `date_naissance`, `profession`, `sexe`, `inscrit_le`, `created_at`, `updated_at`, `photo`, `cin`) VALUES
(15, 'john', 'doe', '1988-12-31', 'etudiant', 'homme', NULL, '2020-05-23 23:02:36', '2020-05-23 23:02:36', 'images/c3b0fc15e118d7b2466ecd52eec82f86.jpg', 'b123456'),
(16, 'hasnaoui', 'khalid', '1991-05-23', 'informticien', 'homme', NULL, '2020-05-23 23:54:52', '2020-05-23 23:54:52', 'images/81f48dadedddb3d8bf1233fb92750acd.jpg', 'bj123457');

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `abonne_id` int(11) NOT NULL,
  `date_de` date DEFAULT NULL,
  `date_a` datetime DEFAULT NULL,
  `tarif_mois` decimal(8,0) DEFAULT NULL,
  `remise` decimal(8,0) DEFAULT NULL,
  `montant` decimal(8,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type_paiement` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paiements`
--

INSERT INTO `paiements` (`id`, `user_id`, `abonne_id`, `date_de`, `date_a`, `tarif_mois`, `remise`, `montant`, `created_at`, `updated_at`, `type_paiement`) VALUES
(4, 4, 16, '2020-05-15', '2020-07-15 00:00:00', '200', NULL, NULL, '2020-05-23 23:55:47', '2020-05-23 23:55:47', 'cash'),
(5, 3, 16, '2020-05-24', '2020-06-30 00:00:00', '200', NULL, NULL, '2020-05-24 00:10:17', '2020-05-24 00:10:17', 'cb'),
(6, 7, 15, '2020-02-01', '2020-05-24 00:00:00', '200', NULL, NULL, '2020-05-24 00:13:49', '2020-05-24 00:13:49', 'cb'),
(7, 4, 15, '2020-01-01', '2020-02-01 00:00:00', '200', NULL, NULL, '2020-05-24 00:17:04', '2020-05-24 00:17:04', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(254) DEFAULT NULL,
  `passe` varchar(254) DEFAULT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `role` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `passe`, `nom`, `email`, `role`) VALUES
(3, 'ahmad', '1234', NULL, 'test@gmail.com', NULL),
(4, 'test', '1235', NULL, 'test@gmail.com', 'admin'),
(6, 'testtest2', '1234', NULL, 'test@gmail.com', 'admin'),
(7, 'ali', '12345', 'alami', 'ali@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnes`
--
ALTER TABLE `abonnes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AK_idAbonnes` (`id`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `AK_Identifier_1` (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `paiements_ibfk_2` (`abonne_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `AK_Identifier_1` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnes`
--
ALTER TABLE `abonnes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `paiements_ibfk_2` FOREIGN KEY (`abonne_id`) REFERENCES `abonnes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
