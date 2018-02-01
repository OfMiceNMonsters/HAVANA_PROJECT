-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 08:25 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `havana`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart4`
--

CREATE TABLE `cart4` (
  `prod_id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `size` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart4`
--

INSERT INTO `cart4` (`prod_id`, `name`, `image`, `price`, `size`) VALUES
(1, 'Nike Windbreaker', 'https://i.pinimg.com/736x/0e/bd/ba/0ebdba406d4071dff993ae5b9ea48f72--black-nike-windbreaker-nike-vintage-windbreaker.jpg', 100.00, 'S'),
(2, 'Nike Windbreaker', 'https://cdn1.thehunt.com/app/public/system/zine_images/11086238/original/0b05ecc22e1141e7b16888c89ebdafac.jpeg', 299.00, 'XS'),
(3, 'Adidas Windbreaker', 'https://lakajadevintage.com/wp-content/uploads/2017/12/233a-sudadera-adidas-vintage-350x435.jpg', 125.00, 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart4`
--
ALTER TABLE `cart4`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart4`
--
ALTER TABLE `cart4`
  MODIFY `prod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
