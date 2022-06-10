-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 04:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'sadsad', 'wkwkwkwkj@gmail.com', '$2y$10$8RkM4ORmOq3MznB7QkyVkOgyty8Tqa/8tvjGXLrf6Dh7vSMkFGHKu', 'chrome-logo-200x200.png', '2022-06-07 00:34:55', '2022-06-07 20:16:14'),
(2, 'worldd', 'world@gmail.com', '$2y$10$MXzLEgdwm7EoHIiHWWAXNuIX.sf5FEesZzjm9pEZ5f3V5UHrupU8K', 'download.jpg', '2022-06-07 00:35:18', '2022-06-07 20:15:26'),
(3, 'haekal', 'haekalsahal2@gmail.com', '$2y$10$ZBLnAr9WfyLdM5QmLs6zEeAIxA48Nj7Q0MPDxWwztmfDVruc/R5UG', 'chrome-logo-200x200.png', '2022-06-07 00:54:04', '2022-06-07 18:20:17'),
(5, 'admin', 'admin@gmail.com', '$2y$10$wTTLkQClzgV2F4RVBqLOqe9A/8aazk7lls10JprnHIrZ1tbU5mCCG', 'chrome-logo-200x200.png', '2022-06-07 00:56:44', '2022-06-08 07:19:22'),
(7, 'hmmm', 'hai@gmail.com', '$2y$10$8xNR1WepGwwSUIwtW477UuXRedY5fjgU8f0tgZx0od0mZt6u4op9W', 'chrome-logo-200x200.png', '2022-06-07 01:09:51', '2022-06-07 20:15:49'),
(8, 'bando', 'brando@gmail.com', '$2y$10$QrgExCuzvEnwrW8fy.L.FOoHaaSrF8jZTMWcjcMYZ9GeVl4GiB7ES', 'download.jpg', '2022-06-07 09:40:16', '2022-06-07 20:11:55'),
(9, 'Super admin', 'hello@gmail.com', '$2y$10$o3NaQ8GHAHfWHnNfm6o4KOYwqkRHgjlEOhwlSY/0lzv7gOJDvzi2q', 'opera.jpg', '2022-06-07 20:10:16', '2022-06-07 20:10:16'),
(10, 'casas', 'check@gmail.com', '$2y$10$BhbWburU71b1PqPuRZDHMueUT57hMDb4SJ0YP2SXTDsyNtd1mxWVS', 'opera.jpg', '2022-06-07 20:10:50', '2022-06-07 20:10:50'),
(11, 'checkkk', 'checkkk@gmail.com', '$2y$10$k..SbcbghNn7Bsn6eZo1OulAADPKDVY508pY70ADjxwkPc5yAA29K', 'download.jpg', '2022-06-07 20:13:24', '2022-06-07 20:13:24'),
(12, 'testt', 'testt@gmail.com', '$2y$10$mD1Froi0RmnmXQvZXTa4auzbxd1/.11MVvJZ2aHnKXngeuRW5cROm', 'chrome-logo-200x200.png', '2022-06-07 20:13:50', '2022-06-07 20:13:50'),
(13, 'hello', 'hellos@gmail.com', '$2y$10$x5ZyRgpSVRkxxj3S.1lDHuYmI3FjytImRwnxzbawHMNtoy5z842F2', 'opera.jpg', '2022-06-07 20:14:43', '2022-06-07 20:14:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
