-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-16 14:16:58
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
(2, '義大利麵套餐');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_sid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_sid`, `email`, `account`, `password`) VALUES
(1, 'pp123@gmail.com', 'abc', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(2, 'ooo@gmail.com', 'ooo', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(3, 'tom60229@gmail.com', 'tom60229', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(4, 'eee@gmail.com', 'poe', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(5, 'haha@gmail.com', 'zxc', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(6, 'yaya@gmail.com', 'yaya', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(7, 'joker@gmail.com', 'joker', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(8, 'admin@gmail.com', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(9, 'yeh@gmail.com', 'yeh', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(10, 'Asahina@gmail.com', 'Asahina', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(11, 'Enoshima@gmail.com', 'Enoshima', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(12, 'Fujisaki@gmail.com', 'Fujisaki', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(13, 'Fukawa@gmail.com', 'Fukawa', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(14, 'Hagakure@gmail.com', 'Hagakure', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(15, 'Hinata@gmail.com', 'Hinata', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(16, 'Ikusaba@gmail.com', 'Ikusaba', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(17, 'Ishimaru@gmail.com', 'Ishimaru', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(18, 'Kirigiri@gmail.com', 'Kirigiri', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(19, 'Komaeda@gmail.com', 'Komaeda', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(20, 'Kuwata@gmail.com', 'Kuwata', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(21, 'Maizono@gmail.com', 'Maizono', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(22, 'Monokuma@gmail.com', 'Monokuma', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(23, 'Monomi@gmail.com', 'Monomi', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(24, 'Naegi@gmail.com', 'Naegi', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(25, 'Nanami@gmail.com', 'Nanami', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(26, 'Ogami@gmail.com', 'Ogami', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(27, 'Owada@gmail.com', 'Owada', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(28, 'Seresutia@gmail.com', 'Seresutia', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(29, 'Togami@gmail.com', 'Togami', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(30, 'Yamada@gmail.com', 'Yamada', '7c4a8d09ca3762af61e59520943dc26494f8941b');

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
  `price` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1,
  `check_state` tinyint(1) DEFAULT 0,
  `check_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `order_list`
--

INSERT INTO `order_list` (`order_sid`, `member_sid`, `product_sid`, `product_name`, `quantity`, `price`, `order_date`, `visible`, `check_state`, `check_date`) VALUES
(1, 1, 20, '', 1, 1, '2020-12-09 18:43:49', 1, 0, '0000-00-00 00:00:00'),
(2, 1, 20, '', 1, 1, '0000-00-00 00:00:00', 1, 0, '0000-00-00 00:00:00'),
(3, 1, 1, '5566', 1, 1, '2020-12-01 18:51:21', 1, 0, '0000-00-00 00:00:00'),
(4, 22, 3, '454545', 1, 123, '2020-12-01 19:38:33', 1, 0, '0000-00-00 00:00:00'),
(5, 22, 31, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(6, 22, 15, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(7, 22, 3, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(8, 22, 6, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(9, 22, 16, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(10, 22, 12, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(11, 22, 8, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(12, 22, 25, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL),
(13, 22, 19, '565656', 1, 120, '2020-12-01 19:40:02', 1, 0, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_sid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_sid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `on_sale` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_sid`, `product_name`, `description`, `category_sid`, `price`, `on_sale`, `created_at`) VALUES
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
(14, 'Plant-Based Beyond Baked Penne\r\n', 'Made for Meat-Lovers; Made from Plants\r\n', 1, 149, 1, '2020-12-01 11:07:17'),
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
(32, 'Chicken Sausage Cavatappi Bolognese\r\n', 'with Zucchini & Parmesan\r\n', 2, 129, 1, '2020-12-01 11:07:17');

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
  MODIFY `category_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `product_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
