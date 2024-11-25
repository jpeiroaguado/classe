-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-11-2024 a las 02:31:52
-- Versión del servidor: 8.0.40-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mapes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mapes`
--

CREATE TABLE `mapes` (
  `id` int NOT NULL,
  `nomMapa` varchar(255) NOT NULL,
  `tamany` varchar(100) DEFAULT NULL,
  `propietari` varchar(255) DEFAULT NULL,
  `imatge` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `mapes`
--

INSERT INTO `mapes` (`id`, `nomMapa`, `tamany`, `propietari`, `imatge`, `timestamp`) VALUES
(7, 'Aqshy', '1080x1080px', 'e1@e1.com', 'Aqshy.png', '2024-11-23 19:56:13'),
(8, 'Ghyran', '2500x2500px', 'e1@e1.com', 'Ghyran.jpeg', '2024-11-23 21:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `territoris`
--

CREATE TABLE `territoris` (
  `id` int NOT NULL,
  `idMapa` int NOT NULL,
  `nomTerritori` varchar(100) NOT NULL,
  `coordenades` varchar(100) DEFAULT NULL,
  `gobernant` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `email`, `pass`, `timestamp`) VALUES
(1, 'e1@e1.com', '$2y$10$daO83DT7d2ly.9TWwizOEODVQTxLZonQVZ4W2g.58z3BrMa8eShHO', '2024-11-19 17:59:09'),
(2, 'e2@e2.com', '$2y$10$hnEVnExGRW0pyovG5BdFkerKTtmHvVtfCM3V77.tTJ5N6lDqWfVaS', '2024-11-24 01:21:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mapes`
--
ALTER TABLE `mapes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `territoris`
--
ALTER TABLE `territoris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clave_idMapa` (`idMapa`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mapes`
--
ALTER TABLE `mapes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `territoris`
--
ALTER TABLE `territoris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `territoris`
--
ALTER TABLE `territoris`
  ADD CONSTRAINT `clave_idMapa` FOREIGN KEY (`idMapa`) REFERENCES `mapes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
