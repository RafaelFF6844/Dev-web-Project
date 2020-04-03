-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2020 a las 18:19:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `incidentes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id` int(20) NOT NULL,
  `Cedula` varchar(100) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Nacimiento` date DEFAULT NULL,
  `Pais` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(255) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `logitud` double DEFAULT NULL,
  `Contagio` date DEFAULT NULL,
  `Comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `Cedula`, `Nombre`, `Apellido`, `Nacimiento`, `Pais`, `Ciudad`, `latitud`, `logitud`, `Contagio`, `Comentario`) VALUES
(1, '40213071323', 'jhonni', 'pauta', '3223-02-02', 'd', 'yt', 18.48883470628226, -69.95012283325197, '0343-03-04', '343'),
(2, '4343', 'marco', 'perdomo', '0000-00-00', 'oio', 'kljl', 18.474616147274048, -69.96952056884767, '2333-03-12', 'ewe'),
(3, '40213071323', 'jhonni', 'pauta', '0000-00-00', 'RD', 'SANTO DOMINGO', 18.47548449158489, -69.94411468505861, '9890-09-08', 'HOLA'),
(4, '434325', 'paula', 'martinz', '3433-04-03', 'RD', 'SANTO DOMINGO', 18.50310634973257, -69.99595642089845, '3432-04-03', 'bueni'),
(5, '656454', 'juan', 'santo', '2322-03-31', 'RD', 'SANTO DOMINGO', 18.49871102339042, -69.93930816650392, '5432-04-06', 'say'),
(6, '434343329', 'claudia', 'perdomo', '0000-00-00', 'RD', 'SANTO DOMINGO', 18.464955537078268, -69.99097824096681, '2222-07-09', 'feoo'),
(7, '293829', 'edisson', 'perdomo', '4342-03-04', 'RD', 'SANTO DOMINGO', 18.464141415999666, -69.9654006958008, '3222-02-12', 'klk'),
(8, '2323', 'santo', 'coplin', '0000-00-00', 'RD', 'SANTO DOMINGO', 18.46408714195192, -69.96437072753908, '4323-03-02', 'byeee'),
(9, '9898', 'pau', 'ds', '4232-03-02', 'RD', 'SANTO DOMINGO', 18.48150849767731, -70.00728607177736, '4332-05-07', 'seguimos'),
(10, '3434', 'hoy', 'mañana', '2323-03-24', 'RD', 'SANTO DOMINGO', 18.459039505946546, -69.99114990234376, '0000-00-00', 'kol'),
(11, '543', 'aaa', 'gdf', '5336-05-04', 'RD', 'SANTO DOMINGO', 18.490299910419715, -70.01432418823244, '8889-01-09', 'gr'),
(12, '989855', 'marcos', 'loo', '2322-03-01', 'RD', 'SANTO DOMINGO', 18.491656566433207, -69.9159622192383, '5434-04-08', 'lol'),
(13, '989384', 'luisa', 'london', '3432-04-03', 'RD', 'SANTO DOMINGO', 18.462133237470933, -70.01077652152162, '3232-02-09', 'nova');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
