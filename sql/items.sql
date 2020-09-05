-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020 年 8 朁E28 日 04:39
-- サーバのバージョン： 10.4.11-MariaDB
-- PHP のバージョン: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `item_list`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start` datetime NOT NULL DEFAULT current_timestamp() COMMENT '開始日時',
  `end` datetime NOT NULL DEFAULT current_timestamp() COMMENT '終了日時',
  `tag` tinyint(4) DEFAULT 0,
  `memo` text DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`id`, `title`, `start`, `end`, `tag`, `memo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'aaa', '2020-08-27 13:31:19', '2020-08-27 13:31:19', 0, '', 0, NULL, '0000-00-00'),
(2, 'bbb', '2020-08-27 13:31:19', '2020-08-27 13:31:19', 0, '', 0, NULL, '0000-00-00'),
(3, 'ccc', '2020-08-27 18:30:54', '2020-08-27 18:30:54', 0, '', 0, NULL, '0000-00-00'),
(4, 'ddd', '2020-08-27 18:30:54', '2020-08-27 18:30:54', 0, '', 0, NULL, '0000-00-00'),
(5, 'eee', '2020-08-28 02:06:00', '2020-08-29 02:06:00', 0, 0, 0, NULL, '2020-08-28'),
(6, 'fff', '2020-08-28 02:06:00', '2020-08-29 02:06:00', 0, 0, 0, NULL, '2020-08-28'),
(7, 'ggg', '2020-01-01 00:00:00', '2020-01-02 00:00:00', 0, 0, 0, NULL, '2020-08-28'),
(8, 'hhh', '2020-01-01 00:00:00', '2020-01-02 00:00:00', 0, 0, 0, NULL, '2020-08-28');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
