-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016 年 8 月 01 日 21:33
-- サーバのバージョン： 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bulletin_board_system`
--
CREATE DATABASE IF NOT EXISTS `bulletin_board_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bulletin_board_system`;

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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `boards`
--

INSERT INTO `boards` (`id`, `name`, `comment`, `created_at`, `updated_at`) VALUES
(56, '田中陽介', '石垣島の生活', '0000-00-00 00:00:00', '2016-07-23 10:06:07'),
(57, 'geek福岡', 'プログラミング同好会in 福岡', '0000-00-00 00:00:00', '2016-07-23 10:09:16'),
(58, 'geek天神', 'WordPress愛好者の会', '0000-00-00 00:00:00', '2016-07-18 17:13:45'),
(60, 'ベトナムのフリーランサー', 'ベトナムでの仕事探し', '0000-00-00 00:00:00', '2016-07-23 10:21:16'),
(61, '福岡のボクシング', '福岡のボクシングジム情報', '0000-00-00 00:00:00', '2016-07-23 14:06:47'),
(77, '唐津人', '呼子のイカを食べに行こう。', '0000-00-00 00:00:00', '2016-07-23 17:05:14'),
(82, 'カルビ人間', '唐津の焼肉屋にカルビを食べに行こう。', '0000-00-00 00:00:00', '2016-07-24 17:02:07'),
(83, '石垣島20代の会', 'ワインパーティ', '0000-00-00 00:00:00', '2016-07-26 08:39:16'),
(84, 'ワイン大好き人間', '2016年ワインの会を開催します。', '0000-00-00 00:00:00', '2016-07-28 07:59:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `post_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `post_comment` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `post_created_at` datetime NOT NULL,
  `post_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `posts`
--

INSERT INTO `posts` (`post_id`, `board_id`, `post_name`, `post_comment`, `post_created_at`, `post_updated_at`) VALUES
(1, 0, 'ワイン大臣', 'いつやるの?', '0000-00-00 00:00:00', '2016-07-30 16:49:17'),
(12, 0, '赤ワイン大臣', '赤ワインが飲みたい。', '0000-00-00 00:00:00', '2016-07-31 15:09:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `board_id` (`board_id`),
  ADD KEY `board_id_2` (`board_id`),
  ADD KEY `board_id_3` (`board_id`),
  ADD KEY `board_id_4` (`board_id`),
  ADD KEY `board_id_5` (`board_id`),
  ADD KEY `board_id_6` (`board_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;