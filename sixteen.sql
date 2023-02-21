-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 fév. 2023 à 12:50
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sixteen`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `country` varchar(255) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `valide` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `country`, `payment`, `product`, `type`, `price`, `date`, `valide`) VALUES
(15, 'khaled alaoui', 'khaled@gmail.com', '00987654321', 'China', 'Crypto', 'Microsoft Office', 'Office', 25, '2023-02-19', 1),
(18, 'hello', 'khaled@gmail.com', '07123478', 'Antigua and Barbuda', 'Card', 'McAfee Mobile', 'ANTIVIRUS', 35, '2023-02-19', 1),
(20, 'boutahar abdelali', 'ali99boutahar@gmail.com', '0638336365', 'Morocco', 'Crypto', 'Corel AfterShot', 'SOFTWARE', 25, '2023-02-19', 1),
(21, 'abdo', 'idrissi@said.com', '06123456', 'Albania', 'Card', 'AVG Internet Security', 'ANTIVIRUS', 15, '2023-02-19', 1),
(22, '', '', '', 'Country / Region *', 'Card', 'McAfee Mobile', 'ANTIVIRUS', 35, '2023-02-20', 1),
(23, '', '', '', '', 'Card', 'McAfee Mobile', 'ANTIVIRUS', 35, '2023-02-20', 1),
(24, '', '', '', '', 'Card', 'Norton 360 Deluxe', 'ANTIVIRUS', 25, '2023-02-20', 1),
(25, 'abdo', 'khaled@gmail.com', '00987654321', 'American Samoa', 'Crypto', 'McAfee Mobile', 'ANTIVIRUS', 35, '2023-02-20', 0),
(26, 'idrissi said', 'idrissi@said.com', '00987654321', 'Morocco', 'Crypto', 'Laplink PCmover', 'ANTIVIRUS', 45, '2023-02-20', 0),
(27, 'khaled alaoui', 'idrissi@said.com', '0633333333', 'Albania', 'Card', 'Laplink PCmover', 'ANTIVIRUS', 45, '2023-02-20', 0),
(28, 'simo amziane', 'simo@meziane', '', 'China', 'Crypto', 'Microsoft Office', 'Office', 25, '2023-02-20', 1),
(29, 'khaled alaoui', 'ali99boutahar@gmail.com', '0638336365', 'Albania', 'Crypto', 'Microsoft Office', 'Office', 25, '2023-02-21', 0);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `reviews` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `price`, `image`, `description`, `reviews`) VALUES
(1, 'Laplink PCmover', 'ANTIVIRUS', 45, 'https://www.buy-keys.com/wp-content/uploads/2022/09/PCmoverProfessional-300x400.jpg', 'AVG Ultimate 2022 AVG Ultimate 2022 AVG Ultimate 2022 with Secure VPN Key (1 Year / 10 Devices) AVG Ultimate 2022 with Secure VPN Key (1 Year / 10 Devices)  with Secure VPN Key (1 Year / 10 Devices) with Secure VPN Key (1 Year / 10 Devices)', '23'),
(2, 'McAfee Mobile', 'ANTIVIRUS', 35, 'https://www.buy-keys.com/wp-content/uploads/2021/01/mcafee-mobilesecurity-300x400.png', 'McAfee Mobile Security Premium for Android (1 Year / 1 Device) Latest Version + Free Updates', '16'),
(3, 'Microsoft Office', 'Office', 25, 'https://www.buy-keys.com/wp-content/uploads/2020/04/Office-Professional-Plus-201611111111tsvTnx4esSujf_600x600-e1594667848915-300x393.jpg', 'Microsoft Office 2016 Professional Plus (PC)\r\nSoftware, Computer software, Microsoft Office', '12'),
(4, 'Webroot Anywhere', 'ANTIVIRUS', 25, 'https://www.buy-keys.com/wp-content/uploads/2021/01/Webroot-SecureAnywhere-Internet-Security-Complete-600x800.png', 'Webroot SecureAnywhere Complete (1 Year / 1 Device) Latest Version + Free Updates\r\nWebroot SecureAnywhere Complete (1 Year / 1 Device) Latest Version + Free Updates Webroot SecureAnywhere Complete (1 Year / 1 Device) Latest Version + Free Updates', '12'),
(5, 'Norton 360 Deluxe', 'ANTIVIRUS', 25, 'https://www.buy-keys.com/wp-content/uploads/2021/01/norton-security-standard-600x800.jpg', 'Norton 360 Deluxe EU ONLY (1 Year / 3 Devices) + 25 GB Cloud Storage (Latest Version + Free Updates)', '25'),
(6, 'AVG Internet Security', 'ANTIVIRUS', 15, 'https://www.buy-keys.com/wp-content/uploads/2020/04/avg-e1611313663460-300x400.png', 'AVG Internet Security (1 Year / 1 PC) Latest Version + Free Updates\r\nSoftware, Antivirus and security', '18'),
(7, 'AVAST Premium ', 'ANTIVIRUS', 24, 'https://www.buy-keys.com/wp-content/uploads/2021/01/avast-premium-security-img-300x400.png', 'AVAST Premium Security (1 Year / 1 PC) Latest Version + Free Updates\r\nSoftware, Antivirus and security', '11'),
(8, 'Windows 10 Pro', 'SYSTEM', 25, 'https://www.buy-keys.com/wp-content/uploads/2020/01/Windows-10-Professional-Retail-e1594670242295-300x400.png', 'Windows 10 Professional N Retail (Read Description – Not Valid for Regular Pro)\r\nSoftware, Operating system', '21'),
(9, 'Windows 11 ', 'SYSTEM', 14, 'https://www.buy-keys.com/wp-content/uploads/2021/10/Windows_11_Enterprise-600x800.jpg', 'Windows 11 Enterprise\r\nSoftware, Operating system', '13'),
(10, 'Windows 10 Home ', 'SYSTEM', 11, 'https://www.buy-keys.com/wp-content/uploads/2019/07/Windows-10-Home-1-e1594672955905-300x375.png', 'Windows 10 Home OEM\r\nSoftware, Operating system Home OEM\r\nSoftware Operating system', '15'),
(11, 'Windows 7 Home', 'SYSTEM', 8.5, 'https://www.buy-keys.com/wp-content/uploads/2021/06/Windows7HomePremium-Cover-300x400.png', 'Windows 7 Home Premium OEM\r\nSoftware, Operating system', '10'),
(12, 'DisplayFusion Steam ', 'SOFTWARE', 15.5, 'https://www.buy-keys.com/wp-content/uploads/2021/01/Cover-DisplayFusion-300x400.png', 'DisplayFusion Steam (Digital Download)\r\nSoftware, Computer software', '13'),
(13, 'Photo Editor', 'SOFTWARE', 12.5, 'https://www.buy-keys.com/wp-content/uploads/2022/09/MOVAVI-PHOTO-EDITOR-MAC-600x800.jpg', 'Movavi Photo Editor for Mac 6 (Lifetime / 1 Mac)\r\nSoftware, Computer software', '15'),
(14, 'Corel AfterShot', 'SOFTWARE', 25, 'https://www.buy-keys.com/wp-content/uploads/2022/09/COREL-AFTERSHOT-PRO-3-COVER-600x800.jpg', 'Corel AfterShot Pro 3\r\nSoftware, Computer software Corel AfterShot Pro 3\r\nSoftware, Computer software', '12'),
(15, 'Video Editor ', 'SOFTWARE', 14.5, 'https://www.buy-keys.com/wp-content/uploads/2022/09/MOVAVI-VIDEO-EDITOR-PLUS-15-MAC-300x390.jpg', 'Movavi Video Editor Plus for Mac 15 (Lifetime / 1 Mac)\r\nSoftware, Computer software', '13');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'ali@boutahar', 'ali123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
