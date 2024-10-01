-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1:3307
-- Χρόνος δημιουργίας: 12 Σεπ 2024 στις 17:18:38
-- Έκδοση διακομιστή: 10.4.27-MariaDB
-- Έκδοση PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `dbweb2324`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lon` float(20,10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `lat`, `lon`) VALUES
(1, 'admin', 'admin', 38.0680961609, 23.7603378296);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `aitimata`
--

CREATE TABLE `aitimata` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `arithmos_atomwn` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `date` date NOT NULL,
  `user` int(11) NOT NULL,
  `diasostis` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `aitimata`
--

INSERT INTO `aitimata` (`id`, `title`, `arithmos_atomwn`, `item`, `date`, `user`, `diasostis`, `status`) VALUES
(1, 'sos', 45, 186, '2024-08-10', 6, 0, 'Αναμονή'),
(2, 'epigon', 52, 171, '2024-08-10', 9, 16, 'Ολοκλήρωση'),
(3, 'SOS SOS', 24, 16, '2024-08-21', 6, 0, 'Αναμονή'),
(4, 'help', 50, 67, '2024-08-21', 12, 15, 'Ολοκλήρωση'),
(5, 'sos2', 45, 170, '2024-08-22', 12, 13, 'Ολοκλήρωση'),
(6, '!!!!!', 10, 69, '2024-08-23', 6, 16, 'Ανάθεση'),
(7, 'SOS', 50, 186, '2024-08-23', 13, 15, 'Ολοκλήρωση'),
(8, 'model', 12, 71, '2024-08-24', 12, 13, 'Ολοκλήρωση');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `anakoinosi`
--

CREATE TABLE `anakoinosi` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `anakoinosi`
--

INSERT INTO `anakoinosi` (`id`, `title`, `description`, `date`) VALUES
(1, 'nea anakoinosi', 'werwetrew', '2024-01-31'),
(2, 'nea', 'test2', '2024-01-31'),
(5, 'Πυρκαγιά στην Εύβοια', 'ΑΝΑΓΚΗ ΓΙΑ ΤΡΟΦΙΜΑ', '2024-08-10'),
(6, 'Πυρκαγιά Αθήνα', 'Ρούχα', '2024-08-12');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(5, 'Food'),
(6, 'Beverages'),
(7, 'Clothing'),
(8, 'Hacker of class'),
(9, '2d hacker'),
(11, 'Test'),
(14, 'Flood'),
(15, 'new cat'),
(19, 'Shoes'),
(21, 'Personal Hygiene '),
(22, 'Cleaning Supplies'),
(23, 'Tools'),
(24, 'Kitchen Supplies'),
(25, 'Baby Essentials'),
(26, 'Insect Repellents'),
(27, 'Electronic Devices'),
(28, 'Cold weather'),
(29, 'Animal Food'),
(30, 'Financial support'),
(33, 'Cleaning Supplies.'),
(34, 'Hot Weather'),
(35, 'First Aid '),
(39, 'Test_0'),
(40, 'test1'),
(41, 'pet supplies'),
(42, 'Μedicines'),
(43, 'Energy Drinks');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `detail_name` varchar(200) NOT NULL,
  `detail_value` varchar(200) NOT NULL,
  `item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `details`
--

INSERT INTO `details` (`id`, `detail_name`, `detail_value`, `item`) VALUES
(1168, 'volume', '1.5l', 16),
(1169, 'pack size', '6', 16),
(1170, 'volume', '250ml', 17),
(1171, 'pack size', '12', 17),
(1172, 'brand', 'Trata', 18),
(1173, 'weight', '200g', 18),
(1174, 'weight', '500g', 19),
(1175, 'weight', '1kg', 20),
(1176, 'type', 'white', 20),
(1177, 'weight', '100g', 21),
(1178, 'type', 'milk chocolate', 21),
(1179, 'brand', 'ION', 21),
(1180, 'size', '44', 22),
(1181, 'weight', '500g', 23),
(1182, 'pack size', '12', 23),
(1183, 'expiry date', '13/12/1978', 23),
(1184, 'Details', '600ml', 24),
(1185, 'grams', '500', 25),
(1186, 'calories', '200', 26),
(1188, '', '', 29),
(1195, 'size', '50\" x 60\"', 36),
(1196, '', '', 37),
(1197, 'stock', '500', 38),
(1198, 'size', '3', 38),
(1199, '', '', 38),
(1200, 'stock', '500', 39),
(1201, 'size', 'regular', 39),
(1202, 'stock', '300', 40),
(1203, 'ply', '3', 40),
(1204, 'volume', '500gr', 41),
(1205, 'stock ', '500', 41),
(1206, 'scent', 'aloe', 41),
(1207, 'stock', '500', 42),
(1208, 'stock', '250', 43),
(1220, '', '', 51),
(1221, '', '', 52),
(1222, '', '', 53),
(1223, '', '', 54),
(1224, '', '', 55),
(1225, '', '', 56),
(1226, '', '', 57),
(1227, '', '', 58),
(1228, '', '', 59),
(1229, '', '', 60),
(1230, '', '', 61),
(1231, '', '', 62),
(1232, '', '', 63),
(1233, '', '', 64),
(1234, '', '', 65),
(1235, '', '', 66),
(1236, '', '', 67),
(1237, '', '', 68),
(1238, '', '', 69),
(1239, '', '', 70),
(1240, '', '', 71),
(1241, '', '', 72),
(1242, '', '', 73),
(1243, '', '', 74),
(1244, '', '', 75),
(1245, '', '', 76),
(1258, 'wtwty', 'wytwty', 83),
(1259, '', '', 84),
(1260, 'Volume', '500ml', 85),
(1261, 'volume', '75ml', 86),
(1262, 'duration', '7 hours', 87),
(1263, 'volume', '250ml', 88),
(1264, 'material', 'silicone', 89),
(1265, 'weight', '400gr', 90),
(1266, 'weight', '23,5gr', 91),
(1267, 'Number of different tools', '3', 92),
(1268, 'Tool', 'Knife', 92),
(1269, 'Tool', 'Screwdriver', 92),
(1270, 'Tool', 'Spoon', 92),
(1273, 'Power', 'Batteries', 94),
(1274, 'Frequencies Range', '3 kHz - 3000 GHz', 94),
(1275, '', '(scrubbers, rubber gloves, kitchen detergent, laundry soap)', 95),
(1276, '', '', 96),
(1277, '', '', 97),
(1278, '', '', 98),
(1279, '', '', 99),
(1280, 'volume', '500ml', 100),
(1281, 'volume', '500g', 101),
(1282, 'volume', '500g', 102),
(1283, '', '', 103),
(1284, 'volume', '500ml', 104),
(1285, 'volume', '20pieces', 105),
(1286, 'size', 'XL', 106),
(1287, '', '', 107),
(1288, '', '', 108),
(1289, '', '', 109),
(1290, '', '', 110),
(1291, '', '', 111),
(1292, '', '', 112),
(1293, '', '', 113),
(1295, '', '', 115),
(1296, '', '', 116),
(1297, '', '', 117),
(1298, '', '', 118),
(1299, '', '', 119),
(1300, '', '', 120),
(1301, '', '', 120),
(1302, '', '', 121),
(1304, 'Νο 46', '', 123),
(1305, '', '', 124),
(1306, 'Adhesive', '2 meters', 125),
(1307, 'Povidone iodine 10%', '240 ml', 126),
(1308, '100% Hydrofile', '70gr', 127),
(1309, 'Quantity per package', '10', 128),
(1310, 'Packages', '2', 128),
(1311, 'piece', '10 pieces', 129),
(1312, '', '', 129),
(1313, '', '', 129),
(1314, 'pank', '10 packs', 130),
(1317, 'pieces', '1', 133),
(1318, '', '', 133),
(1319, 'volume', '500ml', 134),
(1320, 'rolls', '1 roll', 135),
(1321, '', '', 135),
(1323, 'packet', '1 packet', 137),
(1325, '', '', 139),
(1326, 'weight', '105g', 140),
(1327, '', '', 141),
(1328, '6 pack', '', 142),
(1329, '1', '', 143),
(1330, '1', '', 144),
(1332, 'weight', '45g', 146),
(1333, 'pcs', '18', 147),
(1334, 'weight', '100', 148),
(1335, 'weight', '100', 149),
(1336, 'weight', '100', 150),
(1337, 'weight', '200g', 151),
(1339, 'volume', '200g', 153),
(1340, '', '', 153),
(1341, 'Potency', 'High', 154),
(1343, '1', '', 156),
(1344, '', '', 156),
(1345, '', '12', 157),
(1346, '', '20', 158),
(1347, '', '', 158),
(1348, '', '2', 159),
(1349, 'ml', '500', 160),
(1350, '', '2', 161),
(1351, '', '10', 162),
(1352, '', '20', 163),
(1353, '', '5', 164),
(1354, '', '5', 165),
(1355, 'grams', '1000', 166),
(1356, 'grams', '500', 167),
(1357, 'pair', '10', 168),
(1358, 'grams', '1000', 169),
(1359, 'grams', '500', 170),
(1360, 'grams', '1000', 171),
(1361, 'grams', '500', 172),
(1362, 'grams', '1000', 173),
(1363, '', '7', 174),
(1364, 'grams', '500', 175),
(1365, '', '5', 176),
(1366, '', '10', 177),
(1367, '', '5', 178),
(1368, '', '5', 179),
(1369, '', '5', 180),
(1370, '', '2', 181),
(1371, '', '3', 182),
(1372, '', '20', 183),
(1373, '', '6', 184),
(1374, '', '10', 185),
(1375, '10', '600ml', 186),
(1376, '', '', 186),
(1377, '67', '1000mg', 187),
(1378, '10', '330ml', 188),
(1379, '22', '330', 189),
(1380, '31', '500ml', 190),
(1381, '40', '330ml', 191),
(1382, '23', '500ml', 192),
(1383, '15', '500ml', 193),
(1384, '16', 'Mini', 194),
(1385, '5', 'Medium', 195),
(1386, '6', 'Large', 195),
(1387, '10', 'Small', 195),
(1388, '2', 'XL', 195),
(1390, '10', '500mg', 197),
(1391, '', '', 197),
(1392, '20', '', 198),
(1393, '', '', 198),
(1394, '5', '1.5kg', 199),
(1395, '20', '200g', 200),
(1396, '', '', 200),
(1397, '30', '', 201),
(1398, '30', '500g', 202),
(1400, 'volume', '500ml', 204);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `diasostes`
--

CREATE TABLE `diasostes` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lon` float(20,10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `diasostes`
--

INSERT INTO `diasostes` (`id`, `username`, `password`, `lat`, `lon`) VALUES
(1, 'dias1', '12345', 38.4793930054, 22.5329589844),
(2, 'dias2', '12345', 38.0555000305, 23.2111148834),
(3, 'dias3', '1234', 32.3057060242, 32.6953125000),
(10, 'dias4', '1234', 37.9819297791, 23.0552196503),
(13, 'dias5', 'dias5', 40.7668914795, 23.1481075287),
(14, 'dias6', 'dias6', 40.9360275269, 24.3995361328),
(15, 'dias7', 'dias7', 38.4158706665, 22.8178749084),
(16, 'dias8', 'dias8', 38.0612030029, 23.7172508240);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `posotita` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `item`
--

INSERT INTO `item` (`id`, `name`, `posotita`, `category`) VALUES
(16, 'Water', 0, 6),
(17, 'Orange juice', 0, 6),
(18, 'Sardines', 0, 5),
(19, 'Canned corn', 0, 5),
(20, 'Bread', 0, 5),
(21, 'Chocolate', 80, 5),
(22, 'Men Sneakers', 0, 7),
(23, 'Test Product', 0, 9),
(24, 'Test Val', 0, 14),
(25, 'Spaghetti', 0, 5),
(26, 'Croissant', 0, 5),
(29, 'Biscuits', 0, 5),
(36, 'Blanket', 0, 7),
(37, 'Fakes', 0, 5),
(38, 'Menstrual Pads', 0, 21),
(39, 'Tampon', 0, 21),
(40, 'Toilet Paper', 0, 21),
(41, 'Baby wipes', 0, 21),
(42, 'Toothbrush', 0, 21),
(43, 'Toothpaste', 0, 21),
(51, 'Cleaning rag', 0, 22),
(52, 'Detergent', 0, 22),
(53, 'Disinfectant', 0, 22),
(54, 'Mop', 0, 22),
(55, 'Plastic bucket', 0, 22),
(56, 'Scrub brush', 0, 22),
(57, 'Dust mask', 0, 22),
(58, 'Broom', 0, 22),
(59, 'Hammer', 0, 23),
(60, 'Skillsaw', 0, 23),
(61, 'Prybar', 0, 23),
(62, 'Shovel', 0, 23),
(63, 'Flashlight', 0, 23),
(64, 'Duct tape', 0, 23),
(65, 'Underwear', 0, 7),
(66, 'Socks', 0, 7),
(67, 'Warm Jacket', 0, 7),
(68, 'Raincoat', 0, 7),
(69, 'Gloves', 11, 7),
(70, 'Pants', 0, 7),
(71, 'Boots', 0, 7),
(72, 'Dishes', 0, 24),
(73, 'Pots', 0, 24),
(74, 'Paring knives', 0, 24),
(75, 'Pan', 0, 24),
(76, 'Glass', 0, 24),
(83, 't22', 0, 9),
(84, 'water ', 0, 6),
(85, 'Coca Cola', 0, 6),
(86, 'spray', 0, 26),
(87, 'Outdoor spiral', 0, 26),
(88, 'Baby bottle', 52, 25),
(89, 'Pacifier', 0, 25),
(90, 'Condensed milk', 0, 5),
(91, 'Cereal bar', 0, 5),
(92, 'Pocket Knife', 0, 23),
(94, 'Radio', 0, 27),
(95, 'Kitchen appliances', 0, 14),
(96, 'Winter hat', 0, 28),
(97, 'Winter gloves', 0, 28),
(98, 'Scarf', 0, 28),
(99, 'Thermos', 0, 28),
(100, 'Tea', 0, 6),
(101, 'Dog Food ', 0, 29),
(102, 'Cat Food', 0, 29),
(103, 'Canned', 0, 5),
(104, 'Chlorine', 0, 22),
(105, 'Medical gloves', 0, 22),
(106, 'T-Shirt', 0, 7),
(107, 'Cooling Fan', 0, 34),
(108, 'Cool Scarf', 0, 34),
(109, 'Whistle', 0, 23),
(110, 'Blankets', 0, 28),
(111, 'Sleeping Bag', 0, 28),
(112, 'Toothbrush', 0, 21),
(113, 'Toothpaste', 0, 21),
(115, 'Rice', 0, 5),
(116, 'Bread', 0, 5),
(117, 'Towels', 0, 22),
(118, 'Wet Wipes', 0, 22),
(119, 'Fire Extinguisher', 0, 23),
(120, 'Fruits', 0, 5),
(121, 'Duct Tape', 0, 23),
(123, 'Αθλητικά', 0, 19),
(124, 'Πασατέμπος', 0, 5),
(125, 'Bandages', 0, 35),
(126, 'Betadine', 0, 35),
(127, 'cotton wool', 0, 35),
(128, 'Crackers', 0, 5),
(129, 'Sanitary Pads', 0, 21),
(130, 'Sanitary wipes', 0, 21),
(133, 'Flashlight', 0, 23),
(134, 'Juice', 0, 6),
(135, 'Toilet Paper', 0, 21),
(137, 'Biscuits', 0, 5),
(139, 'Instant Pancake Mix', 0, 5),
(140, 'Lacta', 0, 5),
(141, 'Canned Tuna', 0, 5),
(142, 'Batteries', 0, 23),
(143, 'Dust Mask', 0, 35),
(144, 'Can Opener', 0, 23),
(146, 'Πατατάκια', 0, 5),
(147, 'Σερβιέτες', 0, 21),
(148, 'Dry Cranberries', 0, 5),
(149, 'Dry Apricots', 0, 5),
(150, 'Dry Figs', 0, 5),
(151, 'Παξιμάδια', 0, 5),
(153, 'Test Item', 0, 11),
(154, 'Painkillers', 0, 35),
(156, 'plaster set', 0, 41),
(157, 'elastic bandages', 0, 41),
(158, 'traumaplast', 0, 41),
(159, 'thermal blanket', 0, 41),
(160, 'burn gel', 0, 41),
(161, 'pet carrier', 0, 41),
(162, 'pet dishes', 0, 41),
(163, 'plastic bags', 0, 41),
(164, 'toys', 0, 41),
(165, 'burn pads', 0, 41),
(166, 'cheese', 0, 5),
(167, 'lettuce', 0, 5),
(168, 'eggs', 0, 5),
(169, 'steaks', 0, 5),
(170, 'beef burgers', 0, 5),
(171, 'tomatoes', 0, 5),
(172, 'onions', 0, 5),
(173, 'flour', 0, 5),
(174, 'pastel', 0, 5),
(175, 'nuts', 0, 5),
(176, 'dramamines', 0, 42),
(177, 'nurofen', 0, 42),
(178, 'imodium', 0, 42),
(179, 'emetostop', 0, 42),
(180, 'xanax', 0, 42),
(181, 'saflutan', 0, 42),
(182, 'sadolin', 0, 42),
(183, 'depon', 0, 42),
(184, 'panadol', 0, 42),
(185, 'ponstan ', 0, 42),
(186, 'algofren', 56, 42),
(187, 'effervescent depon', 0, 42),
(188, 'cold coffee', 0, 6),
(189, 'Hell', 0, 43),
(190, 'Monster', 0, 43),
(191, 'Redbull', 0, 43),
(192, 'Powerade', 0, 43),
(193, 'PRIME', 0, 43),
(194, 'Lighter', 0, 23),
(195, 'isothermally shirts', 0, 28),
(197, 'Depon', 0, 42),
(198, 'Shorts', 0, 34),
(199, 'Chicken', 0, 5),
(200, 'Toilet Paper', 0, 21),
(201, 'toys', 0, 41),
(202, 'sanitary napkins', 0, 21),
(204, 'Club Soda', 0, 6);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `item_anakoinosi`
--

CREATE TABLE `item_anakoinosi` (
  `item` int(11) NOT NULL,
  `anakoinosi` int(11) NOT NULL,
  `posotita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `item_anakoinosi`
--

INSERT INTO `item_anakoinosi` (`item`, `anakoinosi`, `posotita`) VALUES
(186, 1, 1),
(33, 1, 2),
(88, 2, 3),
(41, 2, 4),
(186, 2, 4),
(142, 3, 1),
(116, 3, 7),
(144, 3, 7),
(175, 3, 8),
(186, 5, 80),
(20, 5, 80),
(29, 5, 80),
(21, 5, 80),
(26, 5, 80),
(199, 5, 87),
(186, 6, 11),
(36, 6, 11),
(108, 6, 11),
(69, 6, 11);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `prosfora`
--

CREATE TABLE `prosfora` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `anakoinosi` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `posotita` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `diasostis` int(11) NOT NULL,
  `title` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `prosfora`
--

INSERT INTO `prosfora` (`id`, `user`, `anakoinosi`, `item`, `posotita`, `date`, `status`, `diasostis`, `title`) VALUES
(5, 6, 0, 186, 2, '2024-07-16', 'Ολοκλήρωση', 3, 'Προσφέρω Algofren'),
(7, 1, 0, 29, 80, '2024-08-10', 'Ανάθεση', 1, 'προσφέρω μπισκότα'),
(8, 9, 0, 186, 1, '2024-08-10', 'Ανάθεση', 10, 'rt'),
(9, 10, 0, 186, 1, '2024-08-10', 'Ολοκλήρωση', 16, 'lo'),
(10, 6, 0, 69, 11, '2024-08-12', 'Ολοκλήρωση', 15, 'προσφέρω γάντια'),
(11, 12, 0, 108, 11, '2024-08-12', 'Ανάθεση', 14, 'PROSFERO'),
(12, 6, 0, 21, 80, '2024-08-24', 'Ολοκλήρωση', 13, 'sos!!!!'),
(13, 1, 0, 26, 80, '2024-08-24', 'Ολοκλήρωση', 13, 'sos!!!!!!'),
(14, 6, 0, 186, 1, '2024-09-12', 'Αναμονή', 0, 'qwr');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `lat` float(20,10) NOT NULL,
  `lon` float(20,10) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `lat`, `lon`, `fullname`, `phone`) VALUES
(1, 'nikos', '1234', 38.0857696533, 23.4004955292, 'nikos pap', '777888999'),
(6, 'p1', 'p1', 32.3400001526, 34.3400001526, 'ppppp', '1235'),
(9, 'user11', '1234', 37.9160881042, 22.5573406219, 'user11 user11', '3333333'),
(10, 'politis1', '1234', 37.9949188232, 23.2852210999, 'politis 1', '4444'),
(12, 'vicky kagia', '1234', 40.7668647766, 23.1479892731, 'vicky kagia', '25645616'),
(13, 'danai_ch', '1234', 38.4166908264, 22.8177223206, 'Δανάη Χαλούλου', '12464');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `aitimata`
--
ALTER TABLE `aitimata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`),
  ADD KEY `user` (`user`);

--
-- Ευρετήρια για πίνακα `anakoinosi`
--
ALTER TABLE `anakoinosi`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`);

--
-- Ευρετήρια για πίνακα `diasostes`
--
ALTER TABLE `diasostes`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Ευρετήρια για πίνακα `item_anakoinosi`
--
ALTER TABLE `item_anakoinosi`
  ADD KEY `item` (`item`),
  ADD KEY `anakoinosi` (`anakoinosi`);

--
-- Ευρετήρια για πίνακα `prosfora`
--
ALTER TABLE `prosfora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `item` (`item`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `aitimata`
--
ALTER TABLE `aitimata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `anakoinosi`
--
ALTER TABLE `anakoinosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1401;

--
-- AUTO_INCREMENT για πίνακα `diasostes`
--
ALTER TABLE `diasostes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT για πίνακα `prosfora`
--
ALTER TABLE `prosfora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `aitimata`
--
ALTER TABLE `aitimata`
  ADD CONSTRAINT `aitimata_ibfk_1` FOREIGN KEY (`item`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aitimata_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`item`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
