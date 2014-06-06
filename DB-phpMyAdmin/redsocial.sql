-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2014 a las 18:43:27
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `mensajeId` int(4) NOT NULL AUTO_INCREMENT,
  `mensajePadreId` int(4) DEFAULT NULL,
  `contenido` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `remitenteUsuarioId` int(4) NOT NULL,
  `destinatarioUsuarioId` int(4) DEFAULT NULL,
  PRIMARY KEY (`mensajeId`),
  KEY `mensajePadreId` (`mensajePadreId`,`remitenteUsuarioId`,`destinatarioUsuarioId`),
  KEY `remitenteUsuarioId` (`remitenteUsuarioId`),
  KEY `destinatarioUsuarioId` (`destinatarioUsuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=178 ;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`mensajeId`, `mensajePadreId`, `contenido`, `fecha`, `remitenteUsuarioId`, `destinatarioUsuarioId`) VALUES
(174, NULL, ' hola como andas ema?', '2014-06-06 13:26:17', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuarioId` int(4) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `nombreUsuario`, `password`, `nombre`, `apellido`, `email`) VALUES
(1, 'emanuelgimenez10', 'emanuelgimenez10', 'emanuel', 'gimenez', 'emanuelgimenez10@gmail.com'),
(2, 'cnchocron', 'cnchocron', 'cristhian', 'chocron', 'cnchocron@gmail.com'),
(3, 'jorges.lossada', 'jorges.lossada', 'jorge', 'lossada', 'jorges.lossada@gmail.com'),
(4, 'fernandezja', 'fernandezja', 'jose', 'fernandez', 'fernandezja@gmail.com'),
(5, 'fernan2322', 'fernan2322', 'fernando', 'mansilla', 'fernan2322@gmail.com'),
(6, 'miguevillagran', 'miguevillagran', 'miguel', 'villagran', 'miguevillagran@gmail.com'),
(7, 'cesar91bo', 'cesar91bo', 'cesar', 'ramirez', 'cesar91bo@gmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`mensajePadreId`) REFERENCES `mensaje` (`mensajeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`remitenteUsuarioId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensaje_ibfk_3` FOREIGN KEY (`destinatarioUsuarioId`) REFERENCES `usuario` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
