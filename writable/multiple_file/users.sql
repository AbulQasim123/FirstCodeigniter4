-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221207.ce5ce76a8d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 06:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `services`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refferal_code` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referrer_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) 



INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `image`, `password`, `refferal_code`, `referrer_amount`, `created_at`, `updated_at`) VALUES
(1, 'Qasim', 'qasim.cloudzurf@gmail.com', '9794634790', '1684244315.jfif', '$2y$10$R67J3hi.PWrPzkm1sCEecu3tZaWzFIbXH7AFwmquJ6WdG7GCl6jhK', 'RMIqTIFSvu', '100', '2023-05-16 13:38:35', '2023-05-16 08:08:35'),
(2, 'Ram', 'ram@gmail.com', '7946496499', '1684244393.jfif', '$2y$10$4dNJ0fNYDHRjDgVw3KiR0utX1w0vCvnulyAcGo76oFCx57QjyISzK', 'yhXfPgv3HV', '100', '2023-05-16 08:09:53', '2023-05-16 08:09:53'),
(3, 'Raj', 'raj@gmail.com', '9794646474', '1684244619.PNG', '$2y$10$t19fqWqw5bdw0KXP4h7WGu6ET8MWVIuF/EiODcVqIK4.y/ef/dEyK', '6m6zbeUO9j', '100', '2023-05-16 08:13:39', '2023-05-16 08:13:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
