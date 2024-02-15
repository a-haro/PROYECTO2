-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 15-02-2024 a las 14:53:30
-- Versión del servidor: 10.8.8-MariaDB-1:10.8.8+maria~ubu2204
-- Versión de PHP: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Juegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DESARROLLADOR`
--

CREATE TABLE `DESARROLLADOR` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DESARROLLADOR_VIDEOJUEGO`
--

CREATE TABLE `DESARROLLADOR_VIDEOJUEGO` (
  `id_videojuego` varchar(25) NOT NULL,
  `id_desarrollador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GENERO`
--

CREATE TABLE `GENERO` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GENERO_VIDEOJUEGO`
--

CREATE TABLE `GENERO_VIDEOJUEGO` (
  `id_videojuego` varchar(25) NOT NULL,
  `id_genero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PLATAFORMA`
--

CREATE TABLE `PLATAFORMA` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PLATAFORMA_VIDEOJUEGO`
--

CREATE TABLE `PLATAFORMA_VIDEOJUEGO` (
  `id_videojuego` varchar(25) NOT NULL,
  `id_plataforma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VIDEOJUEGO`
--

CREATE TABLE `VIDEOJUEGO` (
  `id` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `pegi` enum('3','7','12','16','18') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `DESARROLLADOR`
--
ALTER TABLE `DESARROLLADOR`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `DESARROLLADOR_VIDEOJUEGO`
--
ALTER TABLE `DESARROLLADOR_VIDEOJUEGO`
  ADD PRIMARY KEY (`id_videojuego`,`id_desarrollador`),
  ADD KEY `id_desarrollador` (`id_desarrollador`);

--
-- Indices de la tabla `GENERO`
--
ALTER TABLE `GENERO`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `GENERO_VIDEOJUEGO`
--
ALTER TABLE `GENERO_VIDEOJUEGO`
  ADD PRIMARY KEY (`id_videojuego`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `PLATAFORMA`
--
ALTER TABLE `PLATAFORMA`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `PLATAFORMA_VIDEOJUEGO`
--
ALTER TABLE `PLATAFORMA_VIDEOJUEGO`
  ADD PRIMARY KEY (`id_videojuego`,`id_plataforma`),
  ADD KEY `id_plataforma` (`id_plataforma`);

--
-- Indices de la tabla `VIDEOJUEGO`
--
ALTER TABLE `VIDEOJUEGO`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `DESARROLLADOR`
--
ALTER TABLE `DESARROLLADOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `GENERO`
--
ALTER TABLE `GENERO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `PLATAFORMA`
--
ALTER TABLE `PLATAFORMA`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `DESARROLLADOR_VIDEOJUEGO`
--
ALTER TABLE `DESARROLLADOR_VIDEOJUEGO`
  ADD CONSTRAINT `DESARROLLADOR_VIDEOJUEGO_ibfk_1` FOREIGN KEY (`id_desarrollador`) REFERENCES `DESARROLLADOR` (`id`),
  ADD CONSTRAINT `DESARROLLADOR_VIDEOJUEGO_ibfk_2` FOREIGN KEY (`id_videojuego`) REFERENCES `VIDEOJUEGO` (`id`);

--
-- Filtros para la tabla `GENERO_VIDEOJUEGO`
--
ALTER TABLE `GENERO_VIDEOJUEGO`
  ADD CONSTRAINT `GENERO_VIDEOJUEGO_ibfk_1` FOREIGN KEY (`id_videojuego`) REFERENCES `VIDEOJUEGO` (`id`),
  ADD CONSTRAINT `GENERO_VIDEOJUEGO_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `GENERO` (`id`);

--
-- Filtros para la tabla `PLATAFORMA_VIDEOJUEGO`
--
ALTER TABLE `PLATAFORMA_VIDEOJUEGO`
  ADD CONSTRAINT `PLATAFORMA_VIDEOJUEGO_ibfk_1` FOREIGN KEY (`id_plataforma`) REFERENCES `PLATAFORMA` (`id`),
  ADD CONSTRAINT `PLATAFORMA_VIDEOJUEGO_ibfk_2` FOREIGN KEY (`id_videojuego`) REFERENCES `VIDEOJUEGO` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
