-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 06:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_table`
--

CREATE TABLE `task_table` (
  `id` int(11) NOT NULL,
  `County` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Town` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Displayable_address` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `No_bed` int(10) NOT NULL,
  `No_bath` int(10) NOT NULL,
  `Price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_table`
--

INSERT INTO `task_table` (`id`, `County`, `Country`, `Town`, `Description`, `Displayable_address`, `Image`, `No_bed`, `No_bath`, `Price`) VALUES
(1, 'Pennsylvania', 'Cocos (Keeling) Islands', 'Johnsonbury', 'Debitis doloribus eos optio debitis. Et accusamus exercitationem blanditiis enim fuga optio vitae. E', '6446 Smitham Ferry Apt. 571', 'https://p-hold.com/1000/400?57108', 1, 12, 85352),
(2, 'Delaware', 'Guernsey', 'South Katelyn', 'In cupiditate fuga et in totam. Enim aut vel atque consequatur et et. Et aperiam eum aliquid rerum f', '23663 Oberbrunner Bridge Suite 239', 'https://p-hold.com/1000/400?49440', 6, 1, 1565191),
(3, 'Oregon', 'Russian Federation', 'Lake Athenaville', 'Quod ipsam doloribus repellat omnis similique dolore esse enim. In ut et dolorem mollitia est repreh', '920 Nellie Ranch', 'https://p-hold.com/1000/400?82763', 8, 1, 129598);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_table`
--
ALTER TABLE `task_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task_table`
--
ALTER TABLE `task_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
