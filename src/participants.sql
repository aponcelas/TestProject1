-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 19:35:33
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inscripcions`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `cognoms` varchar(255) NOT NULL,
  `data_naixement` date NOT NULL,
  `adreca_carrer` varchar(255) NOT NULL,
  `adreca_numero` varchar(10) NOT NULL,
  `adreca_ciutat` varchar(255) NOT NULL,
  `codi_postal` varchar(10) NOT NULL,
  `resguard_pagament_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participants`
--

INSERT INTO `participants` (`id`, `nom`, `cognoms`, `data_naixement`, `adreca_carrer`, `adreca_numero`, `adreca_ciutat`, `codi_postal`, `resguard_pagament_path`) VALUES
(1, 'Adrián', 'Poncelas Juncarol', '2023-11-10', 'Principal', '20', 'Figueres', '17600', 'resguard/DAW2.pdf'),
(2, 'Albert', 'Rocas Font', '2023-11-23', 'Principal', '20', 'Figueres', '17600', 'resguard/DAW2.pdf'),
(3, 'Joel', 'Jacas', '2023-11-11', 'Principal', '20', 'Figueres', '17600', 'resguard/DAW2.pdf'),
(4, 'Arnau', 'Rodriguez', '2023-11-09', 'Principal', '20', 'Figueres', '17600', 'resguard/DAW2.pdf'),
(5, 'Arnau', 'Rodriguez', '2023-11-09', 'Principal', '20', 'Figueres', '17600', 'resguard/DAW2.pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
