-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 07:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `imageSrc` longtext NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ownerId`, `product_name`, `quantity`, `imageSrc`, `description`) VALUES
(1, 0, 'New York Yankees New Era 1977 MLB All-St', 1, 'https://images.footballfanatics.com/new-york-yankees/mens-new-era-white/charcoal-new-york-yankees-1977-mlb-all-star-game-chrome-59fifty-fitted-hat_ss5_p-4640026+pv-1+u-nnregefyjsdf9zapelaj+v-zdhgn6fhumsczdof03po.jpg?_hv=2&w=900', 'Description is not set'),
(2, 0, 'Houston Astros New Era 2022 World Series', 1, 'https://images.footballfanatics.com/houston-astros/mens-new-era-gray-houston-astros-2022-world-series-champions-locker-room-9forty-adjustable-hat_ss5_p-200006711+pv-1+u-xq59yc429nxmbulqnqsr+v-8ilor6qzfaaqhi8d1i64.jpg?_hv=2&w=900', 'Description is not set'),
(3, 0, 'Houston Astros New Era 2022 World Series', 1, 'https://images.footballfanatics.com/houston-astros/mens-new-era-navy-houston-astros-2022-world-series-champions-home-side-patch-59fifty-fitted-hat_ss5_p-200006692+pv-1+u-iyh52yheugerxyiigjfv+v-uf8fvykpihgcxrmgwbny.jpg?_hv=2&w=900', 'Description is not set'),
(4, 0, 'Houston Astros New Era 2022 World Series', 1, 'https://images.footballfanatics.com/houston-astros/mens-new-era-graphite-houston-astros-2022-world-series-champions-parade-9fifty-snapback-hat_ss5_p-200006713+pv-1+u-vquaxqjhdhbuqlanzrts+v-uq4249v3ftbw2d7e6lks.jpg?_hv=2&w=900', 'Description is not set'),
(5, 0, 'New York Yankees New Era 1999 World Seri', 1, 'https://images.footballfanatics.com/new-york-yankees/mens-new-era-tan-new-york-yankees-1999-world-series-sky-blue-undervisor-59fifty-fitted-hat_ss5_p-4734529+pv-1+u-hfgmbsbvibpzk62stdbn+v-jexohrsnrnj0eezyirte.jpg?_hv=2&w=900', 'Description is not set'),
(6, 0, 'San Francisco 49ers New Era Script 9FIFT', 1, 'https://images.footballfanatics.com/san-francisco-49ers/mens-new-era-scarlet-san-francisco-49ers-script-9fifty-snapback-hat_ss5_p-4746249+pv-1+u-02rsbhc0xwn4bdciqvno+v-hi4xu04kbpovvi0ob8n9.jpg?_hv=2&w=900', 'Description is not set');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
