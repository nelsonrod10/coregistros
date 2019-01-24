-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2019 a las 03:16:44
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coregistros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leads`
--

CREATE TABLE `leads` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `storeID` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `leads`
--

INSERT INTO `leads` (`id`, `firstname`, `lastname`, `email`, `zipcode`, `phone`, `storeID`, `created_at`, `updated_at`) VALUES
(1, 'Nelson', 'Rodriguez', 'nelsonrod10@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 06:11:10', '2019-01-22 06:11:10'),
(3, 'Nelson', 'Rodriguez', 'nelsonrod11@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 06:53:40', '2019-01-22 06:53:40'),
(4, 'Nelson', 'Rodriguez', 'nelsonrod12@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 06:55:50', '2019-01-22 06:55:50'),
(5, 'Nelson', 'Rodriguez', 'nelsonrod13@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 06:57:03', '2019-01-22 06:57:03'),
(6, 'Nelson', 'Rodriguez', 'nelsonrod14@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 06:58:17', '2019-01-22 06:58:17'),
(7, 'Nelson', 'Rodriguez', 'nelsonrod15@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 07:00:00', '2019-01-22 07:00:00'),
(8, 'Nelson', 'Rodriguez', 'nelsonrod16@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 07:01:03', '2019-01-22 07:01:03'),
(9, 'Nelson', 'Rodriguez', 'nelsonrod18@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 07:06:25', '2019-01-22 07:06:25'),
(10, 'Nelson', 'Rodriguez', 'nelsonrod19@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 07:07:17', '2019-01-22 07:07:17'),
(11, 'Nelson', 'Rodriguez', 'nelsonrod20@gmail.com', '08456', '123123978978', 'CO1234', '2019-01-22 07:08:19', '2019-01-22 07:08:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
