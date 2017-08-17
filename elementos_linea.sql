-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2017 a las 16:50:06
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos_linea`
--

CREATE TABLE `elementos_linea` (
  `id_elemento_linea` int(255) NOT NULL,
  `IDLinea` int(255) DEFAULT NULL,
  `IDCatElem` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `elementos_linea`
--

INSERT INTO `elementos_linea` (`id_elemento_linea`, `IDLinea`, `IDCatElem`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `elementos_linea`
--
ALTER TABLE `elementos_linea`
  ADD PRIMARY KEY (`id_elemento_linea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `elementos_linea`
--
ALTER TABLE `elementos_linea`
  MODIFY `id_elemento_linea` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `procesoslinea` CHANGE `IDCatProd` `id_elemento_linea` INT(11) NULL;
INSERT INTO `procesoslinea` (`IDProcesosLinea`, `id_elemento_linea`, `Proceso`) VALUES
(1, 2, 'Serigrafia'),
(2, 2, 'Suaje'),
(3, 1, 'HotStamping'),
(4, 1, 'Suaje');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
