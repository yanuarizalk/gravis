-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2019 at 02:19 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gravise`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name_full` varchar(255) NOT NULL,
  `name_call` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `religion` set('Islam','Kristen','Katolik','Hindu','Buddha','Khonghucu') NOT NULL,
  `education` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `address_ktp` varchar(255) NOT NULL,
  `address_now` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `social_facebook` varchar(255) NOT NULL,
  `social_twitter` varchar(255) NOT NULL,
  `social_google` varchar(255) NOT NULL,
  `social_linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name_full`, `name_call`, `role`, `birth_place`, `birth_date`, `religion`, `education`, `start_date`, `address_ktp`, `address_now`, `no_hp`, `email`, `social_facebook`, `social_twitter`, `social_google`, `social_linkedin`) VALUES
(1, 'Yanuarizal Kurniamanda', 'Yanuarizal', 'Programmer', 'Jakarta', '2001-01-14', 'Islam', 'SMK N 2 Surakarta', '2019-05-20', 'Kampung Baru 1 RT 07 / RW 05, Halim, Makasar, Jakarta Timur', 'Karangasem RT 04 / RW 03, Laweyan, Surakarta', '081377232136', 'me@yanuarizal.tk', 'facebook.com/yanuarizal.kurnia', '-', '-', 'linkedin.com/in/yanuarizal-k-b8437b10b'),
(2, 'Dummy', 'Dummy', 'Slave', 'Jakarta', '2001-01-14', 'Islam', 'SMK N 2 Surakarta', '2019-05-20', 'Kampung Baru 1 RT 07 / RW 05, Halim, Makasar, Jakarta Timur', 'Karangasem RT 04 / RW 03, Laweyan, Surakarta', '081377232136', 'me@yanuarizal.tk', 'facebook.com/yanuarizal.kurnia', '-', '-', 'linkedin.com/in/yanuarizal-k-b8437b10b'),
(3, 'John Doe', 'Jon', 'Guest', 'Earth 404', '1925-02-21', 'Islam', 'SD', '1234-02-22', 'Indon', 'Micronesia', '01234', 'johndoe@gmail.com', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
