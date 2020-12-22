-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-22 14:03:51
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
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `category_sid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`category_sid`, `category_name`) VALUES
(1, '漢堡套餐'),
(2, '義大利麵套餐'),
(3, '墨西哥夾餅');

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
  `avatar` varchar(255) DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_sid`, `email`, `account`, `password`, `nickname`, `avatar`, `mobile`, `address`) VALUES
(10, 'Asahina@gmail.com', 'Asahina', '7c4a8d09ca3762af61e59520943dc26494f8941b', '朝日奈 葵', 'Asahina.png', '0912345678', '台北市大安區復興南路一段390號2樓'),
(11, 'Enoshima@gmail.com', 'Enoshima', '7c4a8d09ca3762af61e59520943dc26494f8941b', '江ノ島 盾子', 'Enoshima.png', '0912740363', '台北市大安區復興南路一段390號2樓'),
(12, 'Fujisaki@gmail.com', 'Fujisaki', '7c4a8d09ca3762af61e59520943dc26494f8941b', '不二咲 千尋', 'Fujisaki.png', '0939601914', '台北市大安區復興南路一段390號2樓'),
(13, 'Fukawa@gmail.com', 'Fukawa', '7c4a8d09ca3762af61e59520943dc26494f8941b', '腐川 冬子', 'Fukawa.png', '0931749931', '台北市大安區復興南路一段390號2樓'),
(14, 'Hagakure@gmail.com', 'Hagakure', '7c4a8d09ca3762af61e59520943dc26494f8941b', '葉隠 康比呂', 'Hagakure.png', '0924901775', '台北市大安區復興南路一段390號2樓'),
(15, 'Hinata@gmail.com', 'Hinata', '7c4a8d09ca3762af61e59520943dc26494f8941b', '日向 創', 'Hinata.png', '0986751439', '台北市大安區復興南路一段390號2樓'),
(16, 'Ikusaba@gmail.com', 'Ikusaba', '7c4a8d09ca3762af61e59520943dc26494f8941b', '戦刃 むくろ', 'Ikusaba.png', '0961605180', '台北市大安區復興南路一段390號2樓'),
(17, 'Ishimaru@gmail.com', 'Ishimaru', '7c4a8d09ca3762af61e59520943dc26494f8941b', '石丸 清多夏', 'Ishimaru.png', '0968460567', '台北市大安區復興南路一段390號2樓'),
(18, 'Kirigiri@gmail.com', 'Kirigiri', '7c4a8d09ca3762af61e59520943dc26494f8941b', '霧切 響子', 'Kirigiri.png', '0987151118', '台北市大安區復興南路一段390號2樓'),
(19, 'Komaeda@gmail.com', 'Komaeda', '7c4a8d09ca3762af61e59520943dc26494f8941b', '狛枝 凪斗', 'Komaeda.png', '0958624932', '台北市大安區復興南路一段390號2樓'),
(20, 'Kuwata@gmail.com', 'Kuwata', '7c4a8d09ca3762af61e59520943dc26494f8941b', '桑田 怜恩', 'Kuwata.png', '0921448173', '台北市大安區復興南路一段390號2樓'),
(21, 'Maizono@gmail.com', 'Maizono', '7c4a8d09ca3762af61e59520943dc26494f8941b', '舞園 さやか', 'Maizono.png', '0912017827', '台北市大安區復興南路一段390號2樓'),
(22, 'Monokuma@gmail.com', 'Monokuma', '7c4a8d09ca3762af61e59520943dc26494f8941b', '黑白熊', 'Monokuma.png', '0930091478', '台北市大安區復興南路一段390號2樓'),
(23, 'Monomi@gmail.com', 'Monomi', '7c4a8d09ca3762af61e59520943dc26494f8941b', '黑白美', 'Monomi.png', '0922988592', '台北市大安區復興南路一段390號2樓'),
(24, 'Naegi@gmail.com', 'Naegi', '7c4a8d09ca3762af61e59520943dc26494f8941b', '苗木 誠', 'Naegi.png', '0934176083', '台北市大安區復興南路一段390號2樓'),
(25, 'Nanami@gmail.com', 'Nanami', '7c4a8d09ca3762af61e59520943dc26494f8941b', '七海 千秋', 'Nanami.png', '0956018299', '台北市大安區復興南路一段390號2樓'),
(26, 'Ogami@gmail.com', 'Ogami', '7c4a8d09ca3762af61e59520943dc26494f8941b', '大神 さくら', 'Ogami.png', '0955946541', '台北市大安區復興南路一段390號2樓'),
(27, 'Owada@gmail.com', 'Owada', '7c4a8d09ca3762af61e59520943dc26494f8941b', '大和田 紋土', 'Owada.png', '0920597387', '台北市大安區復興南路一段390號2樓'),
(28, 'Seresutia@gmail.com', 'Seresutia', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'セレスティア ルーデンベルク', 'Seresutia.png', '0972968171', '台北市大安區復興南路一段390號2樓'),
(29, 'Togami@gmail.com', 'Togami', '7c4a8d09ca3762af61e59520943dc26494f8941b', '十神 白夜', 'Togami.png', '0988703264', '台北市大安區復興南路一段390號2樓'),
(30, 'Yamada@gmail.com', 'Yamada', '7c4a8d09ca3762af61e59520943dc26494f8941b', '山田 一二三', 'Yamada.png', '0932085565', '台北市大安區復興南路一段390號2樓'),
(35, 'PPOO@h.com', 'AAKK', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'LKK', NULL, '0912345676', '海邊');

-- --------------------------------------------------------

--
-- 資料表結構 `order_list`
--

CREATE TABLE `order_list` (
  `order_sid` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `product_sid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `next_time` tinyint(1) NOT NULL DEFAULT 0,
  `check_state` tinyint(1) NOT NULL DEFAULT 0,
  `check_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `order_list`
--

INSERT INTO `order_list` (`order_sid`, `member_sid`, `product_sid`, `product_name`, `quantity`, `unit_price`, `price`, `order_date`, `visible`, `next_time`, `check_state`, `check_date`) VALUES
(160, 26, 17, 'Creamy Dreamy Mushroom Cavatappi\r\n', 1, 129, 129, '2020-12-22 11:00:23', 0, 0, 1, '2020-12-22 11:01:30'),
(161, 26, 21, 'Tomato Tortelloni Bake\r\n', 1, 129, 129, '2020-12-22 11:00:26', 0, 0, 1, '2020-12-22 11:01:42'),
(162, 26, 24, 'Lemon Tortelloni Palermo\r\n', 3, 129, 387, '2020-12-22 11:00:29', 1, 1, 0, NULL),
(163, 26, 22, 'Silky Sicilian Penne\r\n', 2, 129, 258, '2020-12-22 11:00:32', 0, 0, 1, '2020-12-22 11:01:30'),
(164, 25, 2, 'Bellissimo Bruschetta Burgers\r\n', 1, 149, 149, '2020-12-22 11:04:31', 1, 0, 0, NULL),
(165, 25, 42, 'Santa Fe Pork Tacos\r\n', 4, 99, 396, '2020-12-22 11:04:35', 1, 0, 0, NULL),
(166, 22, 4, 'Mozzarella-Stuffed Little Italy Burgers\r\n', 2, 149, 298, '2020-12-22 14:09:19', 0, 0, 1, '2020-12-22 14:09:30'),
(167, 22, 9, 'Juicy Lucy Burgers\r\n', 1, 149, 149, '2020-12-22 14:09:20', 1, 1, 0, NULL),
(168, 22, 6, 'BBQ Cheddar Pork Burgers\r\n', 4, 149, 596, '2020-12-22 14:09:23', 0, 0, 1, '2020-12-22 14:09:30'),
(169, 22, 33, 'Cheesy Black Bean Tacos\r\n', 1, 99, 99, '2020-12-22 14:09:25', 0, 0, 1, '2020-12-22 14:09:30'),
(170, 22, 19, 'Sun-Dried Tomato Spaghetti\r\n', 1, 129, 129, '2020-12-22 14:09:36', 0, 0, 1, '2020-12-22 14:09:44'),
(171, 22, 21, 'Tomato Tortelloni Bake\r\n', 1, 129, 129, '2020-12-22 14:09:37', 1, 1, 0, NULL),
(172, 22, 20, 'Chicken Sausage Rigatoni\r\n', 2, 129, 258, '2020-12-22 14:09:39', 0, 0, 1, '2020-12-22 14:09:44'),
(173, 22, 2, 'Bellissimo Bruschetta Burgers\r\n', 1, 149, 149, '2020-12-22 14:09:48', 0, 0, 1, '2020-12-22 14:09:51'),
(174, 22, 6, 'BBQ Cheddar Pork Burgers\r\n', 6, 149, 894, '2020-12-22 14:09:56', 1, 0, 0, NULL),
(175, 22, 1, 'Alpine Turkey Burgers', 1, 149, 149, '2020-12-22 14:10:12', 1, 0, 0, NULL),
(176, 22, 35, 'Pork Carnitas Tacos\r\n', 1, 99, 99, '2020-12-22 14:10:15', 1, 0, 0, NULL),
(177, 22, 45, 'Cheesy Breakfast Tacos\r\n', 2, 99, 198, '2020-12-22 14:10:21', 1, 0, 0, NULL),
(178, 32, 1, 'Alpine Turkey Burgers', 1, 149, 149, '2020-12-22 14:26:36', 1, 0, 0, NULL),
(179, 32, 2, 'Bellissimo Bruschetta Burgers\r\n', 1, 149, 149, '2020-12-22 14:26:38', 0, 0, 1, '2020-12-22 14:27:10'),
(180, 32, 5, 'Bacon Buckaroo Burgers\r\n', 1, 149, 149, '2020-12-22 14:26:40', 0, 0, 1, '2020-12-22 14:27:10'),
(181, 32, 6, 'BBQ Cheddar Pork Burgers\r\n', 1, 149, 149, '2020-12-22 14:26:41', 1, 1, 0, NULL),
(182, 32, 3, 'Smothered Pepper Jack Burgers\r\n', 1, 149, 149, '2020-12-22 14:26:42', 1, 1, 0, NULL),
(183, 32, 7, 'Sunny-Side-Up Burgers\r\n', 1, 149, 149, '2020-12-22 14:26:53', 1, 0, 0, NULL),
(184, 32, 1, 'Alpine Turkey Burgers', 1, 149, 149, '2020-12-22 14:27:02', 1, 0, 0, NULL),
(185, 33, 1, 'Alpine Turkey Burgers', 1, 149, 149, '2020-12-22 15:10:00', 1, 0, 0, NULL),
(186, 34, 36, 'Pork & Poblano Tacos\r\n', 4, 99, 396, '2020-12-22 15:12:35', 0, 0, 0, NULL),
(187, 34, 48, 'Mexican Pork & Street Corn Tacos\r\n', 1, 99, 99, '2020-12-22 15:12:40', 0, 0, 0, NULL),
(188, 34, 13, 'Melty Monterey Jack Burgers\r\n', 1, 149, 149, '2020-12-22 15:12:41', 0, 0, 0, NULL),
(189, 34, 43, 'Speedy Start Chicken Tacos\r\n', 1, 99, 99, '2020-12-22 15:12:53', 0, 0, 0, NULL),
(190, 34, 17, 'Creamy Dreamy Mushroom Cavatappi\r\n', 2, 129, 258, '2020-12-22 15:13:13', 0, 0, 1, '2020-12-22 15:13:26'),
(191, 34, 18, 'Shrimp Spaghetti with a Kick\r\n', 1, 129, 129, '2020-12-22 15:13:14', 0, 0, 1, '2020-12-22 15:13:26'),
(192, 34, 19, 'Sun-Dried Tomato Spaghetti\r\n', 1, 129, 129, '2020-12-22 15:13:15', 0, 0, 1, '2020-12-22 15:13:26'),
(193, 34, 1, 'Alpine Turkey Burgers', 1, 149, 149, '2020-12-22 15:13:41', 0, 0, 1, '2020-12-22 15:13:52'),
(194, 34, 5, 'Bacon Buckaroo Burgers\r\n', 1, 149, 149, '2020-12-22 15:13:42', 1, 1, 0, NULL),
(195, 34, 6, 'BBQ Cheddar Pork Burgers\r\n', 1, 149, 149, '2020-12-22 15:13:43', 1, 1, 0, NULL),
(196, 34, 8, '’Shroom & Gouda Pork Burgers\r\n', 6, 149, 894, '2020-12-22 15:13:45', 0, 0, 1, '2020-12-22 15:13:52'),
(197, 34, 17, 'Creamy Dreamy Mushroom Cavatappi\r\n', 3, 129, 387, '2020-12-22 15:18:00', 1, 0, 0, NULL),
(198, 34, 21, 'Tomato Tortelloni Bake\r\n', 1, 129, 129, '2020-12-22 15:15:42', 1, 0, 0, NULL),
(199, 34, 11, 'Gouda Pork Burgers\r\n', 3, 149, 447, '2020-12-22 18:08:07', 1, 0, 0, NULL),
(200, 34, 14, 'Chorizo Burgers\r\n', 1, 149, 149, '2020-12-22 18:08:10', 1, 0, 0, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_sid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_sid` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `on_sale` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_sid`, `product_name`, `description`, `category_sid`, `unit_price`, `on_sale`, `created_at`) VALUES
(1, 'Alpine Turkey Burgers', 'with Mushrooms, Swiss Cheese, Dijonnaise & Potato Wedges', 1, 149, 1, '2020-12-01 11:05:29'),
(2, 'Bellissimo Bruschetta Burgers\r\n', 'with Herby Potato Wedges & Parmesan-Roasted Asparagus\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(3, 'Smothered Pepper Jack Burgers\r\n', 'with Spicy Ketchup & BBQ Potato Wedges\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(4, 'Mozzarella-Stuffed Little Italy Burgers\r\n', 'Bacon Buckaroo Burgers\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(5, 'Bacon Buckaroo Burgers\r\n', 'with BBQ Caramelized Onion & Cheesy Loaded Potato Rounds\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(6, 'BBQ Cheddar Pork Burgers\r\n', 'with Chipotle Aioli & Potato Wedges\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(7, 'Sunny-Side-Up Burgers\r\n', 'with Bacon, Gouda & Smoky Potato Hash\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(8, '’Shroom & Gouda Pork Burgers\r\n', 'with Potato Wedges & Garlic Aioli\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(9, 'Juicy Lucy Burgers\r\n', 'with Tomato Onion Jam & Potato Wedges\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(10, 'Shroom ’n’ Swiss Pork Burgers\r\n', 'with Potato Wedges & a Creamy Honey-Dijon Dipper\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(11, 'Gouda Pork Burgers\r\n', 'with Caramelized Sriracha Onion & Smoky Roasted Broccoli\r\n\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(12, 'Gouda Vibes Burgers\r\n', 'with Tomato Onion Jam & Potato Wedges\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(13, 'Melty Monterey Jack Burgers\r\n', 'with Onion Jam, Garlic Mayo & Crispy Breaded Zucchini\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(14, 'Chorizo Burgers\r\n', 'with Aioli and a Green Salad', 1, 149, 1, '2020-12-01 11:07:17'),
(15, 'Gouda Pork Burgers\r\n', 'with Caramelized Sriracha Onion & Potato Wedges\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(16, 'Ultimate BLT Burgers with Herby Aioli\r\n', 'plus Potato Wedges & Caesar-Dressed Greens with Toasty Almonds\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
(17, 'Creamy Dreamy Mushroom Cavatappi\r\n', 'with Scallions & Parmesan\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(18, 'Shrimp Spaghetti with a Kick\r\n', 'with Garlic Herb Butter & Zucchini\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(19, 'Sun-Dried Tomato Spaghetti\r\n', 'with Fresh Herbs, Almonds & Parmesan\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(20, 'Chicken Sausage Rigatoni\r\n', 'in a Creamy Pink Sauce with Bell Pepper & Parmesan\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(21, 'Tomato Tortelloni Bake\r\n', 'with Crispy Parmesan Breadcrumbs\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(22, 'Silky Sicilian Penne\r\n', 'tossed with Zucchini, Mushrooms & Tomatoes\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(23, 'Penne Pepperonata\r\n', 'Fully cooked. Heats in 3 mins! | 1 Serving\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(24, 'Lemon Tortelloni Palermo\r\n', 'with Roasted Bell Pepper & Parmesan\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(25, 'Blush Bay Scallop Penne\r\n', 'with Parmesan & Lemon\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(26, 'Creamy Lemon Spinach Ricotta Ravioli\r\n', 'with Roasted Bell Pepper & Parmesan\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(27, 'Buon Appetito Bacon Chicken\r\n', 'over Creamy Sun-Dried Tomato Spaghetti\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(28, 'Jalapeño Business Bacon Mac & Cheese\r\n', 'topped with Crispy Spiced Panko\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(29, 'Plant-Based Protein Rigatoni Alla Rossa\r\n', 'Protein that tastes like meat (without the meat)\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(30, 'Pork Sausage Rigatoni in a Creamy Sauce\r\n', 'with Bell Pepper & Lemon\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(31, 'BBQ Baby Back Ribs & Cheesy Buffalo Mac\r\n', 'with Buttermilk Ranch Slaw\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(32, 'Chicken Sausage Cavatappi Bolognese\r\n', 'with Zucchini & Parmesan\r\n', 2, 129, 1, '2020-12-01 11:07:17'),
(33, 'Cheesy Black Bean Tacos\r\n', 'with Poblano & Smoky Red Pepper Crema\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(34, 'BBQ Pulled Chicken Tacos\r\n', 'with Creamy Slaw & Red Onion\r\n', 3, 109, 1, '2020-12-21 10:01:12'),
(35, 'Pork Carnitas Tacos\r\n', 'with Pickled Onion & Monterey Jack Cheese\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(36, 'Pork & Poblano Tacos\r\n', 'with Kiwi Salsa & Lime Crema\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(37, 'Banh-Mi-Style Chicken Tacos\r\n', 'with Pickled Cucumber & Sriracha Mayo\r\n', 3, 89, 1, '2020-12-21 10:01:12'),
(38, 'Smashed Black Bean Tacos\r\n', 'with Creamy Slaw, Pickled Onion & Red Pepper Crema\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(39, 'Pork & Caramelized Pineapple Tacos\r\n', 'with Pickled Veggies & Lime Crema\r\n', 3, 109, 1, '2020-12-21 10:01:12'),
(40, 'Southwestern Shrimp Tacos\r\n', 'with Pico de Gallo & Lime Crema\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(41, 'Cheesy Buffalo Chicken Tacos\r\n', 'with Creamy Ranch Slaw\r\n', 3, 119, 1, '2020-12-21 10:01:12'),
(42, 'Santa Fe Pork Tacos\r\n', 'with Monterey Jack & Cilantro Lime Slaw\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(43, 'Speedy Start Chicken Tacos\r\n', 'sprinkled with Mexican Cheese\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(44, 'Buffalo Chicken Tacos\r\n', 'with Melty Cheddar & a Creamy Ranch Celery Slaw\r\n', 3, 109, 1, '2020-12-21 10:01:12'),
(45, 'Cheesy Breakfast Tacos\r\n', 'with Charred Veggies, Pico de Gallo & Smoky Crema (2 servings)\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(46, 'Chicken Stir-Fry Tacos\r\n', 'with Tangy Cabbage Slaw & Sriracha Mayo\r\n', 3, 89, 1, '2020-12-21 10:01:12'),
(47, 'Mojo Pork Tacos\r\n', 'with Creamy Cilantro Slaw\r\n', 3, 99, 1, '2020-12-21 10:01:12'),
(48, 'Mexican Pork & Street Corn Tacos\r\n', 'with Chili Lime Crema\r\n', 3, 99, 1, '2020-12-21 10:01:12');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_sid`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_sid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `account` (`account`);

--
-- 資料表索引 `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_sid`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `category_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
