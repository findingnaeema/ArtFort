-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307:3307
-- Generation Time: Jul 10, 2020 at 12:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Table structure for table `artsupplies`
--

CREATE TABLE `artsupplies` (
  `id` int(5) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artsupplies`
--

INSERT INTO `artsupplies` (`id`, `img`, `name`, `price`) VALUES
(100, 'assets\\img\\12 Bonding Activities To Do With Your New College Roommate - Society19.jpg', 'img1', 678),
(101, 'assets\\img\\The Art of Making Watercolour Paints _ Collective Gen.jpg', 'img2', 0),
(102, 'assets\\img\\iii.jpg', 'img3', 0),
(103, 'assets\\img\\Sorbet Color Palette For Paint _ domino.jpg', 'img4', 90),
(104, 'assets\\img\\Details Photos.jpg', 'img5', 0),
(105, 'assets\\img\\Entertaining.jpg', 'img6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stuff1`
--

CREATE TABLE `stuff1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stuff1`
--

INSERT INTO `stuff1` (`id`, `name`, `img`, `price`) VALUES
(500, 'pic1', 'assets/img/pic1.jpg', 20),
(501, 'pic2', 'assets/img/pic2.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `access_token`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artsupplies`
--
ALTER TABLE `artsupplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuff1`
--
ALTER TABLE `stuff1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
