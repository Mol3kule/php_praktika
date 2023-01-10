-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 09:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_job`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'sportas'),
(2, 'laisvalaikis'),
(3, 'ekstremalūs pojūčiai');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `imageSrc` longtext NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ownerId`, `product_name`, `quantity`, `imageSrc`, `description`, `category`) VALUES
(1, 0, 'Sport Gates', 1, 'https://sportgates.lt/wp-content/uploads/2020/08/green_banner.png', 'Sportuok dabar!', 'sportas'),
(2, 3, 'GymPlius', 1, 'https://gymplius.lt/images/Logo.png', 'Sportuokkkk', 'sportas'),
(3, 3, 'Impuls', 1, 'https://www.impuls.lt/images/logo_white.png', 'Sportuok dabar!', 'sportas'),
(4, 0, 'Pabegimo Kambarys', 1, 'https://www.issikrauk.lt/wp-content/uploads/2021/12/kuponas-PKID-60EUR-min.png', 'Išsikrauk!', 'laisvalaikis'),
(5, 0, 'ZOOPARK.LT', 1, 'https://media.istockphoto.com/photos/funny-raccoon-in-green-sunglasses-showing-a-rock-gesture-isolated-on-picture-id1154370446?b=1&k=20&m=1154370446&s=612x612&w=0&h=AmSEh5UvyJjcbtCZg3eZbpxAl-c26J61KG9TYh9JzE4=', 'Mėgaukis!', 'laisvalaikis'),
(6, 0, 'Vichy Vandens Parkas', 1, 'https://www.vandensparkas.lt/wp-content/uploads/2016/04/vichy-logo.svg', 'Pramogauk!', 'laisvalaikis'),
(7, 0, 'Šaudykla', 1, 'https://www.dovanusala.lt/96065-thickbox_default/saudymas-is-6-skirtingu-ginklu-vilniuje.jpg', 'Pajausk adrenaliną!', 'ekstremalūs pojūčiai'),
(8, 0, 'Šuolis su virve', 1, 'https://d2j6dbq0eux0bg.cloudfront.net/images/36588179/2907430341.jpg', 'Pajausk adrenaliną!', 'ekstremalūs pojūčiai'),
(9, 0, 'Šuolis su parašiutu', 1, 'https://www.dovanusala.lt/16401-thickbox_default/tandem-suolis-parasiutu-su-instruktoriumi-vilniuje.jpg', 'Pajausk adrenaliną!', 'ekstremalūs pojūčiai'),
(20, 3, 'test', 0, 'https://acniowa.com/wp-content/uploads/2016/03/test-image.png', 'test', 'laisvalaikis');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(3, 'Test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'testt', 'testt@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
