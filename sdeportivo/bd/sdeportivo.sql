-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-02-2018 a las 01:24:33
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sdeportivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_torneo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nom_torneo`, `fecha`) VALUES
(1, 'Copa SONNY', '2018-03-01'),
(2, 'Copa Luchadores', '2018-02-12'),
(3, 'Lapa C.A.', '2018-03-28'),
(4, 'Agua 2', '2018-04-14'),
(5, 'Carrera', '2018-03-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_equi` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nom_corto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nom_equi`, `nom_corto`, `fecha`, `direccion`, `correo`, `web`, `usuario`, `clave`, `admin`) VALUES
(1, 'equipo linces', 'equi', '2018-02-01', 'palo gordo', 'mariaisabel@gmail.com', 'isabel.com', 'isabel', '1234', 1),
(2, 'equipo linces', 'equi', '2018-02-12', 'la concordia', 'dayona@hotmail.com', 'dayona.com', 'dayo', '1234', 1),
(7, 'Deportivo Tachira', '', '2018-02-03', '', 'dvt@hotmail.com', '', 'dvi', '123', 0),
(11, 'otro', 'el', '2018-02-01', 'alla', 'elotro@gmail.com', 'github.elotro.io', 'el', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_torneo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `participantes` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`id`, `nom_torneo`, `participantes`, `categoria`, `usuario`) VALUES
(22, 'Agua 2', 5, 'Principiantes', 'dvi'),
(21, 'Lapa C.A.', 4, 'Profesionales', 'el'),
(19, 'Lapa C.A.', 3, 'Aficionados', 'dvi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
