-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 02:03:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `treezone`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aire`
--

CREATE TABLE `aire` (
  `aire_id` int(11) NOT NULL,
  `aire_nivel` int(10) NOT NULL,
  `aire_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aire`
--

INSERT INTO `aire` (`aire_id`, `aire_nivel`, `aire_fecha`) VALUES
(1, 250, '2023-09-21'),
(2, 250, '2023-09-20'),
(3, 100, '2023-09-13'),
(4, 50, '2023-09-13'),
(5, 100, '2023-09-13'),
(6, 50, '2023-09-13'),
(7, 50, '2023-09-03'),
(8, 10, '2023-09-22'),
(9, 89, '2023-09-24'),
(10, 150, '2023-07-13'),
(11, 200, '2023-01-13'),
(12, 300, '2023-05-03'),
(13, 140, '2023-08-22'),
(14, 100, '2023-02-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ciud_id` int(11) NOT NULL,
  `ciud_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciud_id`, `ciud_nombre`) VALUES
(1, 'Bogotá'),
(2, 'Timbío'),
(3, 'Medellín'),
(4, 'Cali'),
(5, 'Barranquilla'),
(6, 'Cartagena'),
(7, 'Bucaramanga'),
(8, 'Palermo'),
(9, 'Cúcuta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `sect_id` int(11) NOT NULL,
  `sect_nombre` varchar(250) NOT NULL,
  `sect_gp` varchar(250) NOT NULL,
  `sect_longitud` varchar(250) NOT NULL,
  `ciud_id` int(11) NOT NULL,
  `aire_id` int(11) NOT NULL,
  `sect_arboles` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`sect_id`, `sect_nombre`, `sect_gp`, `sect_longitud`, `ciud_id`, `aire_id`, `sect_arboles`) VALUES
(1, 'Kennedy', 'dfsggds', '1212', 1, 1, 250),
(2, 'Usaquén', 'fdsdfs', '12312', 1, 3, 213),
(3, 'Chapinero', '123', 'sadfdsf', 1, 2, 110),
(4, 'Santa Fe', 'dasfa', '211', 1, 4, 321),
(5, 'Usme', 'dfsdfs', '213312', 1, 5, 100),
(7, 'Tunjuelito', 'wqd', '3423', 1, 1, 150),
(8, 'Bosa', 'fsadfa', '21321', 1, 13, 90),
(10, 'Fontibón', 'sadsa', '231312', 1, 10, 280),
(11, 'Engativá', 'saffads', '21311', 1, 12, 400),
(12, 'Suba', 'dgfdgfdbvc', '45363', 1, 8, 450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `ubic_id` int(11) NOT NULL,
  `ubic_name` varchar(50) NOT NULL,
  `ubic_frecuente` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`ubic_id`, `ubic_name`, `ubic_frecuente`, `user_id`, `sect_id`) VALUES
(44, 'Casa', 'centro', 4, 1),
(62, 'Trabajo', 'sur', 4, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_residencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_name`, `user_email`, `user_password`, `user_residencia`) VALUES
(4, 'sant', 'sjoya@uniempresarial.edu.co', '523af537946b79c4f8369ed39ba78605', 'sadsadsaasf'),
(5, 'ad', 'admin@gmail.com', '523af537946b79c4f8369ed39ba78605', 'safdsfds');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aire`
--
ALTER TABLE `aire`
  ADD PRIMARY KEY (`aire_id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciud_id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sect_id`),
  ADD KEY `aire_id` (`aire_id`),
  ADD KEY `ciud_id` (`ciud_id`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`ubic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sect_id` (`sect_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aire`
--
ALTER TABLE `aire`
  MODIFY `aire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `ubic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sector`
--
ALTER TABLE `sector`
  ADD CONSTRAINT `sector_ibfk_1` FOREIGN KEY (`aire_id`) REFERENCES `aire` (`aire_id`),
  ADD CONSTRAINT `sector_ibfk_3` FOREIGN KEY (`ciud_id`) REFERENCES `ciudad` (`ciud_id`);

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`user_id`),
  ADD CONSTRAINT `ubicacion_ibfk_2` FOREIGN KEY (`sect_id`) REFERENCES `sector` (`sect_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
