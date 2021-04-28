-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-10-2015 a las 20:08:05
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `empleadosajax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `correo`) VALUES
(1, 'Victor', 'García', 'vikfra@yahoo.com'),
(2, 'Gricelda', 'Mejía', 'gricel@gmail.com'),
(3, 'María', 'Gutiérrez', 'margutierrez@hotmail.com'),
(4, 'Daniel', 'Ochoa', 'dani.ochoa@yahoo.es'),
(5, 'Miguel Alejandro', 'Murcia Bolaños', 'migmurcia@yahoo.es'),
(6, 'Yesenia', 'Olivares Cañas', 'yolivares@gmail.com'),
(7, 'Julio César', 'Rodríguez', 'julio_rodrig@hotmail.com'),
(8, 'María Eugenia', 'Calderón Flores', 'mar_calderon@yahoo.com'),
(9, 'Yolanda Aida', 'Díaz Ordoñez', 'yolandiazord@gmail.com'),
(10, 'Fausto Emilio', 'Guzmán Valladares', 'fausto_guz@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
