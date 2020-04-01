-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2020 a las 15:44:24
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `ID` int(11) NOT NULL,
  `Cedula` varchar(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Nacimiento` date NOT NULL,
  `Pais` varchar(255) NOT NULL,
  `Ciudad` varchar(255) NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `Contagio` date NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`ID`, `Cedula`, `Nombre`, `Apellido`, `Nacimiento`, `Pais`, `Ciudad`, `Latitud`, `Longitud`, `Contagio`, `Comentario`) VALUES
(1, '12345678910', 'Marcos', 'Placencio', '2001-08-30', 'Estados Unidos', 'doral', 18.56911, -71.09324, '2020-03-28', 'klk'),
(2, '12345678910', 'Marcos', 'Placencio', '2001-08-30', 'Estados Unidos', 'doral', 18.56911, -71.09324, '2020-03-28', 'klk'),
(3, '12345678910', 'Marcos', 'BM-296953', '2001-08-30', 'Estados Unidos', 'doral', 18.56911, -71.09324, '2020-03-22', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Correo`, `Clave`) VALUES
(1, 'eo', '12'),
(2, 'leo', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
