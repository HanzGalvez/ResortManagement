-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 04:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resortmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_in` varchar(30) NOT NULL,
  `time_out` varchar(30) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `id`, `time_in`, `time_out`, `date`) VALUES
(16, 7, '21:33:20', '21:33:21', '2023-06-28 21:33:20'),
(17, 8, '02:27:10', '02:28:34', '2023-06-29 02:27:10'),
(18, 7, '09:41:03', '11:20:13', '2023-06-29 09:41:03'),
(19, 7, '21:36:41', '21:36:44', '2023-07-02 21:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `cottage`
--

CREATE TABLE `cottage` (
  `cottage_id` int(11) NOT NULL,
  `cottage_name` varchar(50) NOT NULL,
  `capacity` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cottage`
--

INSERT INTO `cottage` (`cottage_id`, `cottage_name`, `capacity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Cozy Haven Cottage', '15', 1200, 'Unavailable', '2023-06-25 02:23:24', '2023-06-25 02:23:24'),
(6, 'Moonlight Manor', '20', 1500, 'Unavailable', '2023-06-25 02:23:50', '2023-06-25 02:23:50'),
(7, 'Sunflower Cottage', '7', 800, 'Available', '2023-06-25 02:23:50', '2023-06-25 02:23:50'),
(8, 'Willow Cottage', '5', 500, 'Available', '2023-06-25 02:24:41', '2023-06-25 02:24:41'),
(9, 'Rustic Charm Retreat', '12', 1300, 'Available', '2023-06-25 02:24:41', '2023-06-25 02:24:41'),
(10, 'Tranquil Waters Cottage', '18', 2700, 'Available', '2023-06-25 02:24:57', '2023-06-25 02:24:57'),
(11, 'Meadow View Cottage', '20', 3000, 'Available', '2023-06-25 02:24:57', '2023-06-25 02:24:57'),
(12, 'Cozy Haven Cottage', '10', 1000, 'Unavailable', '2023-06-25 02:25:14', '2023-06-25 02:25:14'),
(13, 'Rustic Charm Retreat', '12', 2000, 'Unavailable', '2023-06-25 02:25:14', '2023-06-25 02:25:14'),
(14, 'Tranquil Waters Cottage', '10', 1450, 'Available', '2023-06-25 02:25:33', '2023-06-25 02:25:33'),
(15, 'Enchanted Cottage', '15', 2500, 'Available', '2023-06-25 02:25:33', '2023-06-25 02:25:33'),
(16, 'Cozy Haven Cottage', '15', 1200, 'Available', '2023-05-25 02:23:24', '2023-05-25 02:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `entrance_fee`
--

CREATE TABLE `entrance_fee` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL,
  `fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrance_fee`
--

INSERT INTO `entrance_fee` (`type_id`, `type_name`, `fee`) VALUES
(1, 'Adult', 100),
(2, 'Kids', 50);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `cottage_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `trans_id`, `cottage_id`) VALUES
(73, 580994, 5),
(74, 580994, 6);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 2),
(9, '2019_08_19_000000_create_failed_jobs_table', 2),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(11, '2023_06_24_162843_add_role_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hanzgalvez1@gmail.com', '$2y$10$qz0uAtHInC9ACqCyiboHbu90t1K5GfFA2Wi2rdqVzK2a/DOQ3ZveC', '2023-06-29 06:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `additional_fee` double NOT NULL,
  `total` double NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `day` varchar(30) NOT NULL,
  `month` varchar(30) NOT NULL,
  `year` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `adult`, `kids`, `id`, `additional_fee`, `total`, `date`, `day`, `month`, `year`) VALUES
(580994, 8, 5, 3, 0, 3750, '2023-07-02 21:52:09', '2', '7', ' 2023');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` char(255) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Hanz Edrian J. Galvez', 'hanzgalvez1@gmail.com', NULL, '$2y$10$2rPcdWBhoKb9vkgTL0HqHuqEs5jonYD2icXdGh/aXGWt1FZWiTfI2', NULL, '2023-06-24 07:01:46', '2023-06-24 07:01:46', 'staff'),
(4, 'admin account', 'admin@gmail.com', NULL, '$2y$10$KG4LbgUtUr2pgM.fauoKbe3SwG0alxk/vHTVqkEUVNt7mfXqv/Wpa', NULL, '2023-06-24 08:35:33', '2023-06-24 08:35:33', 'admin'),
(5, 'employee', 'emp@gmail.com', NULL, '$2y$10$45Zv0vWvQBfQlBHZAgzU0ejfIbXaYAjFwUxga4/ZDbsHaVnplPIpq', NULL, '2023-06-27 10:05:47', '2023-06-27 10:05:47', 'staff'),
(6, 'Dick Lomibao', 'sample@gmail.com', NULL, '$2y$10$o73HshXlPBUiTM1t6OP7E.K8J.yBTp93UOpYQIOZnwBgNLFlKrTr6', NULL, '2023-06-27 10:08:18', '2023-06-27 10:08:18', 'staff'),
(7, 'Jasmine Joy J. Galvez', 'jasmine@gmail.com', NULL, '$2y$10$s.dARA21M27PrwXb2zD7rOMjXjAvu.0kApixhcrHA8K.2JqF60jTi', NULL, '2023-06-27 21:23:17', '2023-06-27 21:23:17', 'employee'),
(8, 'Juan Dela Cruz', 'juan@gmail.com', NULL, '$2y$10$XRCbmPNSiVuDQ.Tdpiv5C.sKCtWMIqb2iUCaLxxaOXhi7gNoes//q', NULL, '2023-06-28 10:24:39', '2023-06-28 10:24:39', 'employee'),
(9, 'lindsay', 'lindsay@gmail.com', NULL, '$2y$10$PVQFI4aFyAXRwXXIZntgGOWHa2wskG64ZVY1iruF5yUsG1opRAMYK', NULL, '2023-06-28 19:32:40', '2023-06-28 19:32:40', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `cottage`
--
ALTER TABLE `cottage`
  ADD PRIMARY KEY (`cottage_id`);

--
-- Indexes for table `entrance_fee`
--
ALTER TABLE `entrance_fee`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `cottage_id` (`cottage_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cottage`
--
ALTER TABLE `cottage`
  MODIFY `cottage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `entrance_fee`
--
ALTER TABLE `entrance_fee`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=993802;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`cottage_id`) REFERENCES `cottage` (`cottage_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`trans_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
