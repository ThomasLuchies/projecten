-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 12:12 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `discountcodes`
--

CREATE TABLE `discountcodes` (
  `discountId` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `timesUsed` int(11) DEFAULT NULL,
  `discount` smallint(6) DEFAULT NULL,
  `minAmount` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favoriteId` int(100) NOT NULL,
  `userId` int(100) DEFAULT NULL,
  `productId` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`favoriteId`, `userId`, `productId`) VALUES
(34, NULL, 3),
(35, NULL, 3),
(36, NULL, 3),
(37, NULL, 3),
(38, NULL, 3),
(39, NULL, 3),
(40, NULL, 3),
(45, 4, 3),
(46, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `streetName` varchar(100) DEFAULT NULL,
  `houseNumber` int(10) DEFAULT NULL,
  `zipCode` varchar(50) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneNumber` int(20) DEFAULT NULL,
  `Products` varchar(1000) NOT NULL,
  `paid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `UserId`, `firstName`, `lastName`, `streetName`, `houseNumber`, `zipCode`, `city`, `email`, `phoneNumber`, `Products`, `paid`) VALUES
(1, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ml', 'Klazienaveen', 'Thomasluchies22@gmail.com', 620237056, '', 0),
(2, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 620237056, '', 0),
(3, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(4, 0, 'Thomas', 'Luchies', 'Gaffel ', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(5, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(6, 0, 'JKFD', 'FLJK', 'SKDLJF', 9, '7891ml', 'fkjlsd', 'Thomasluchies22@gmail.com', 0, '', 0),
(7, 0, 'Thomas', 'Luchies', 'Gaffel ', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(8, 0, 'Thomas', 'Luchies', 'Gaffel ', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(9, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891Ml', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(10, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(11, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(12, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(13, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(14, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(15, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(16, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(17, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(18, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(19, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(20, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(21, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '', 0),
(22, 0, 'thomas', 'Luchies', 'gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"s\",1],[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"l\",1]]', 1),
(23, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"s\",1],[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"l\",1]]', 1),
(24, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"s\",1],[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"l\",1]]', 1),
(25, 0, 'Thomas', 'Luchies', 'Gaffel', 8, '7891LM', 'fsda', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"s\",1]]', 1),
(26, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(27, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(28, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(29, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(30, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(31, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(32, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(33, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(34, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(35, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(36, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(37, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(38, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(39, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(40, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(41, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(42, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(43, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(44, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(45, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(46, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(47, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(48, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(49, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(50, 4, 'Thomas', 'Luchies', 'Gaffel', 8, '7891ML', 'Klazienaveen', 'Thomasluchies22@gmail.com', 0, '[[\"Estado black T-shirt\",75,\"blackTshirt.png\",\"m\",1]]', 0),
(51, 4, 'thomas ', 'luchies', 'Gaffel ', 8, '7891ml', 'Klazienaveen ', 'Thomasluchies22@gmail.com', 0, '[[\"Dark blue Estado Polo\",75,\"Polo.png\",\"m\",1],[\"Dark blue Estado Polo\",75,\"Polo.png\",\"xl\",2]]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(10) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `price`, `picture`) VALUES
(1, 'Estado black T-shirt', 75, 'blackTshirt.png'),
(2, 'Dark blue Estado Polo', 75, 'Polo.png'),
(3, 'Orange Estado T-shirt', 75, 'orangeTshirt.png');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockId` int(10) NOT NULL,
  `productId` int(10) DEFAULT NULL,
  `size` varchar(5) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `firstName`, `lastName`, `email`, `question`, `description`) VALUES
(1, 'fdsa', 'fdsa', 'Thomasluchies22@gmail.com', 'question1', 'gfdsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` smallint(6) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `passWord` varchar(1000) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `passWord`, `email`) VALUES
(1, 'KJFSDL', '$2y$10$bnx7axi9LYWeK8zeegfg.OUoYHtsWUac.UAR.ljv5jMDy5DfaIWxS', 'Thomasluchies22@gmail.com'),
(2, 'KJFSDL', '$2y$10$Z1UlYVGKPFbjBCOS/DJGB.gDqTUZo7E8XTPPjVBSmhwFbQ7Bf5Sum', 'Thomasluchies22@gmail.com'),
(3, 'KJFSDL', '$2y$10$GXgYpRzEArw.is37yL.Np.ixXBGZOxlDrJxMH7wLJ/.FMddBh71Vm', 'Thomasluchies22@gmail.com'),
(4, 'test', '$2y$10$MEZ.SlwBu/aVbkN9p529XePmknnai.SBHJ2049ISOqyM9zII8UEwy', 'Thomasluchies22@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discountcodes`
--
ALTER TABLE `discountcodes`
  ADD PRIMARY KEY (`discountId`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favoriteId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockId`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discountcodes`
--
ALTER TABLE `discountcodes`
  MODIFY `discountId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favoriteId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
