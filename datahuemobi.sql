-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 12:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datahuemobi`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `genders` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `avatar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`id`, `name`, `website`, `phone`, `email`, `avatar`) VALUES
(5, 'Samsung', 'http://www.samsung.com/vn/home/', '0838213213', 'nguyenhuuninh150593@gmail.com', '../upload/producer/Samsung.png'),
(6, 'LG', '', '', '', '../upload/producer/LG.png'),
(7, 'ACER', '', '', '', '../upload/producer/acer.png'),
(9, 'ASUS', '', '', '', '../upload/producer/asus_logo.png'),
(10, 'Dell', '', '', '', '../upload/producer/dell.png'),
(11, 'HP', '', '', '', '../upload/producer/hp.png'),
(12, 'Apple', '', '', '', '../upload/producer/apple.png'),
(13, 'HTC', '', '', '', '../upload/producer/htc.png'),
(14, 'Huawei', '', '', '', '../upload/producer/huawei.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `prices` int(11) NOT NULL,
  `idProducer` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `importDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `genders` tinyint(1) NOT NULL,
  `role` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `birthday` date NOT NULL,
  `atm` varchar(20) NOT NULL,
  `beginDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
