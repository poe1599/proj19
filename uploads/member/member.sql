-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-17 12:58:30
-- 伺服器版本： 10.4.16-MariaDB
-- PHP 版本： 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `proj19`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_sid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_sid`, `email`, `account`, `password`, `nickname`, `avatar`) VALUES
(1, 'pp123@gmail.com', 'abc', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(2, 'ooo@gmail.com', 'ooo', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(3, 'tom60229@gmail.com', 'tom60229', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(4, 'eee@gmail.com', 'poe', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(5, 'haha@gmail.com', 'zxc', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(6, 'yaya@gmail.com', 'yaya', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(7, 'joker@gmail.com', 'joker', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(8, 'admin@gmail.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(9, 'yeh@gmail.com', 'yeh', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL),
(10, 'Asahina@gmail.com', 'Asahina', '7c4a8d09ca3762af61e59520943dc26494f8941b', '朝日奈 葵', 'Asahina.png'),
(11, 'Enoshima@gmail.com', 'Enoshima', '7c4a8d09ca3762af61e59520943dc26494f8941b', '江ノ島 盾子', 'Enoshima.png'),
(12, 'Fujisaki@gmail.com', 'Fujisaki', '7c4a8d09ca3762af61e59520943dc26494f8941b', '不二咲 千尋', 'Fujisaki.png'),
(13, 'Fukawa@gmail.com', 'Fukawa', '7c4a8d09ca3762af61e59520943dc26494f8941b', '腐川 冬子', 'Fukawa.png'),
(14, 'Hagakure@gmail.com', 'Hagakure', '7c4a8d09ca3762af61e59520943dc26494f8941b', '葉隠 康比呂', 'Hagakure.png'),
(15, 'Hinata@gmail.com', 'Hinata', '7c4a8d09ca3762af61e59520943dc26494f8941b', '日向 創', 'Hinata.png'),
(16, 'Ikusaba@gmail.com', 'Ikusaba', '7c4a8d09ca3762af61e59520943dc26494f8941b', '戦刃 むくろ', 'Ikusaba.png'),
(17, 'Ishimaru@gmail.com', 'Ishimaru', '7c4a8d09ca3762af61e59520943dc26494f8941b', '石丸 清多夏', 'Ishimaru.png'),
(18, 'Kirigiri@gmail.com', 'Kirigiri', '7c4a8d09ca3762af61e59520943dc26494f8941b', '霧切 響子', 'Kirigiri.png'),
(19, 'Komaeda@gmail.com', 'Komaeda', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狛枝 凪斗', 'Komaeda.png'),
(20, 'Kuwata@gmail.com', 'Kuwata', '7c4a8d09ca3762af61e59520943dc26494f8941b', '桑田 怜恩', 'Kuwata.png'),
(21, 'Maizono@gmail.com', 'Maizono', '7c4a8d09ca3762af61e59520943dc26494f8941b', '舞園 さやか', 'Maizono.png'),
(22, 'Monokuma@gmail.com', 'Monokuma', '7c4a8d09ca3762af61e59520943dc26494f8941b', '黑白熊', 'Monokuma.png'),
(23, 'Monomi@gmail.com', 'Monomi', '7c4a8d09ca3762af61e59520943dc26494f8941b', '黑白美', 'Monomi.png'),
(24, 'Naegi@gmail.com', 'Naegi', '7c4a8d09ca3762af61e59520943dc26494f8941b', '苗木 誠', 'Naegi.png'),
(25, 'Nanami@gmail.com', 'Nanami', '7c4a8d09ca3762af61e59520943dc26494f8941b', '七海 千秋', 'Nanami.png'),
(26, 'Ogami@gmail.com', 'Ogami', '7c4a8d09ca3762af61e59520943dc26494f8941b', '大神 さくら', 'Ogami.png'),
(27, 'Owada@gmail.com', 'Owada', '7c4a8d09ca3762af61e59520943dc26494f8941b', '大和田 紋土', 'Owada.png'),
(28, 'Seresutia@gmail.com', 'Seresutia', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'セレスティア ルーデンベルク', 'Seresutia.png'),
(29, 'Togami@gmail.com', 'Togami', '7c4a8d09ca3762af61e59520943dc26494f8941b', '十神 白夜', 'Togami.png'),
(30, 'Yamada@gmail.com', 'Yamada', '7c4a8d09ca3762af61e59520943dc26494f8941b', '山田 一二三', 'Yamada.png');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_sid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `account` (`account`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
