-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 06:06 PM
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
(6, 0, 'San Francisco 49ers New Era Script 9FIFT', 1, 'https://images.footballfanatics.com/san-francisco-49ers/mens-new-era-scarlet-san-francisco-49ers-script-9fifty-snapback-hat_ss5_p-4746249+pv-1+u-02rsbhc0xwn4bdciqvno+v-hi4xu04kbpovvi0ob8n9.jpg?_hv=2&w=900', 'Description is not set'),
(7, 0, 'New York Yankees New Era Primary Logo 9F', 1, 'https://images.footballfanatics.com/new-york-yankees/mens-new-era-navy-new-york-yankees-primary-logo-9fifty-snapback-hat_pi4730000_altimages_ff_4730045-4326bded1a22e151f3b9alt1_full.jpg?_hv=2&w=900', 'Description is not set'),
(8, 0, 'Los Angeles Dodgers New Era 2022 City Co', 1, 'https://images.footballfanatics.com/los-angeles-dodgers/mens-new-era-royal-los-angeles-dodgers-2022-city-connect-59fifty-team-fitted-hat_pi4624000_altimages_ff_4624983-f14af5c4939f36f2ff35alt1_full.jpg?_hv=2&w=900', 'Description is not set'),
(9, 0, 'Houston Astros \'47 2021 City Connect Cap', 1, 'https://images.footballfanatics.com/houston-astros/mens-47-navy-houston-astros-2021-city-connect-captain-snapback-hat_pi4695000_altimages_ff_4695556-c13cea570112cf05cb52alt1_full.jpg?_hv=2&w=900', 'Description is not set'),
(10, 0, 'Atlanta Braves New Era Team Logo 59FIFTY', 1, 'https://images.footballfanatics.com/atlanta-braves/mens-new-era-black-atlanta-braves-team-logo-59fifty-fitted-hat_pi4733000_altimages_ff_4733485-390ff21fa0df4636d29calt1_full.jpg?_hv=2&w=900', 'Description is not set'),
(11, 0, 'Los Angeles Angels New Era 2022 City Con', 1, 'https://images.footballfanatics.com/los-angeles-angels/mens-new-era-red-los-angeles-angels-2022-city-connect-59fifty-fitted-hat_pi4464000_altimages_ff_4464362-9a334c6c540ed4dacce7alt1_full.jpg?_hv=2&w=900', 'Description is not set');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
