-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 11:05 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `value`) VALUES
(1, 'A', 1),
(2, 'B', 2),
(3, 'C', 3),
(4, 'D', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `value`) VALUES
(1, 'Student', 1),
(2, 'Admin', 2),
(3, 'Manager', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `value`) VALUES
(1, 'English', 1),
(2, 'Math', 2),
(3, 'Physics', 3),
(4, 'History', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(10) UNSIGNED DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `gender` enum('Male','Female','Others') NOT NULL,
  `address` text DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `suspended` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `photo`, `gender`, `address`, `class_id`, `subject_id`, `role_id`, `email`, `phone`, `password`, `suspended`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 25, 'https://via.placeholder.com/200x200.png/002200?text=quam', 'Male', '82148 Steuber Via\nGrahamchester, NV 23541-8304\n82148 Steuber Via\nGrahamchester, NV 23541-8304\n', NULL, NULL, 3, 'john@example.com', '1234567890', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:50:19', '2024-03-15 18:50:19'),
(2, 'Jane Smith', 30, 'https://via.placeholder.com/200x200.png/005599?text=non', 'Female', '7738 Rohan Flats Apt. 823\nLake Gust, SC 20534', NULL, NULL, 2, 'jane@example.com', '9876543210', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:50:19', '2024-03-16 13:22:34'),
(3, 'Alice Johnson', 22, NULL, 'Female', NULL, 1, 3, 1, 'alice@example.com', '5555555555', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-16 13:22:42'),
(4, 'Bob Brown', 28, NULL, 'Male', NULL, 3, 1, 1, 'bob@example.com', '9999999999', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-16 13:22:25'),
(5, 'Emma Davis', 35, NULL, 'Female', NULL, 2, 3, 1, 'emma@example.com', '7777777777', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(6, 'Michael Wilson', 40, NULL, 'Male', NULL, 1, 2, 1, 'michael@example.com', '8888888888', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(7, 'Sophia Martinez', 27, NULL, 'Female', NULL, 3, 3, 1, 'sophia@example.com', '1111111111', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(8, 'David Anderson', 32, NULL, 'Male', NULL, 2, 1, 1, 'david@example.com', '2222222222', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(9, 'Olivia Taylor', 29, NULL, 'Female', NULL, 1, 3, 1, 'olivia@example.com', '3333333333', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(10, 'William Thomas', 38, NULL, 'Male', NULL, 3, 2, 1, 'william@example.com', '4444444444', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(11, 'Amelia Garcia', 26, NULL, 'Female', NULL, 2, 1, 1, 'amelia@example.com', '6666666666', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(12, 'James Hernandez', 34, NULL, 'Male', NULL, 1, 2, 1, 'james@example.com', '1231231234', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 18:51:08', '2024-03-15 18:51:08'),
(13, 'Tristian West II', 26, 'https://via.placeholder.com/200x200.png/00ff00?text=voluptates', 'Others', '582 Kub Grove Apt. 986\nNew Aniyahview, WA 78138-3062', 1, 3, 2, 'lavern.kemmer@ferry.com', '+19303067697', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 14:53:06', '2024-03-16 13:22:30'),
(14, 'Edythe Homenick', 27, 'Screenshot (79).png', 'Male', '7738 Rohan Flats Apt. 823\nLake Gust, SC 20534', 4, 3, 1, 'ahansen@yahoo.com', '(515) 504-6569', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(15, 'Mrs. Bonnie Kerluke', 21, 'https://via.placeholder.com/200x200.png/002244?text=dolor', 'Female', '5180 Jules Shores Apt. 474\nKamillestad, IL 90811-4386', 2, 1, 1, 'effie32@rutherford.com', '1-941-930-4645', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(16, 'Jewel Shanahan', 18, 'https://via.placeholder.com/200x200.png/000055?text=ipsam', 'Male', '84505 Langworth Run\nLulaside, MT 40829', 4, 4, 1, 'tschowalter@padberg.info', '+1 (347) 780-6058', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(17, 'Jarrett Bechtelar I', 27, 'https://via.placeholder.com/200x200.png/005599?text=non', 'Others', '4761 Mina Inlet\nNew Shania, HI 89548-7424', 3, 3, 1, 'river.kirlin@feest.com', '516-922-2223', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(18, 'Neva Stoltenberg', 31, 'https://via.placeholder.com/200x200.png/00ff55?text=et', 'Female', '7813 Willms Locks\nNorth Elzamouth, RI 29185-5340', 4, 4, 1, 'allene.cole@kuhn.biz', '+1-754-576-0087', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(19, 'Eulah Collier', 59, 'https://via.placeholder.com/200x200.png/0000bb?text=dolores', 'Others', '23360 Lockman Shoals Apt. 468\nDanaside, WY 90006-0216', 3, 3, 1, 'cschumm@wolff.net', '(442) 948-8171', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(20, 'Mr. Coby Hegmann', 23, 'https://via.placeholder.com/200x200.png/005533?text=et', 'Female', '514 Mohr Canyon\nSouth Orion, AK 47094-7123', 2, 2, 1, 'lillie37@langworth.info', '+15635908239', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(21, 'Dr. Ottilie Stehr', 38, 'https://via.placeholder.com/200x200.png/002200?text=quam', 'Others', '5326 Graham Shores Apt. 605\nWest Sigmundside, UT 52821', 1, 3, 1, 'timmothy16@gmail.com', '1-434-420-7776', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-15 14:53:06', '2024-03-15 14:53:06'),
(23, 'Testing ', NULL, NULL, 'Male', 'Yangon', NULL, NULL, 2, 'test@gmail.com', '09999', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-16 02:35:10', '2024-03-16 13:22:37'),
(24, 'Test2', NULL, NULL, 'Female', 'Uruguay', 3, 3, 1, 'test2@gmail.com', '0999999', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-16 02:54:01', NULL),
(25, 'test3', 23, '2023-02-05.png', 'Others', 'Tiamut', 1, 1, 2, 'test3@gmail.com', '0988888', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '2024-03-16 02:56:02', '2024-03-16 13:22:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subject` (`subject_id`),
  ADD KEY `fk_class` (`class_id`),
  ADD KEY `fk_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
