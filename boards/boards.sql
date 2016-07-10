-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 7 月 10 日 15:03
-- サーバのバージョン： 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulletin_board_system`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `boards`
--

DROP TABLE IF EXISTS `boards`;
CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `comment` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `boards`
--

INSERT INTO `boards` (`id`, `name`, `comment`, `created_at`, `updated_at`) VALUES
(1, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:37:42'),
(2, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:37:50'),
(3, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:38:14'),
(4, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:38:24'),
(5, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:39:04'),
(6, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:52:25'),
(7, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:56:03'),
(8, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 02:56:16'),
(9, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 03:00:09'),
(10, '田中陽介', '', '0000-00-00 00:00:00', '2016-07-09 03:00:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
