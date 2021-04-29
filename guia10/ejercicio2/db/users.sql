-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2021 a las 07:00:40
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `users`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contraseña` varchar(120) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `contraseña`, `nombre`, `apellido`) VALUES
('Alex', '81dc9bdb52d04dc20036dbd8313ed055', 'Alex', 'Cruz'),
('alumnofet', '0a9eacb3186a1fd98432f6874d33ed6c', 'Alumnos de la Facultad', 'Estudios Tecnológicos'),
('alumnopiletcdb', '6233086b7788fe0d0f11048f2f27f599', 'Alumnos PILET', 'Colegio Don Bosco'),
('alumnopiletitr', '9d0648d8fc9c8f7883b36eafa873a3cd', 'Alumnos PILET', 'Instituto Técnico Ricaldone'),
('ander01', '4979847f34ef940c152d29e5b584084a', 'Anderson', 'Nacayo'),
('cris01', '81dc9bdb52d04dc20036dbd8313ed055', 'Cristian', 'Cruz'),
('lis', 'e87be27ebdafac988cf4b0b04837211b', 'Lenguajes Interpretados en el Servidor', 'Facultad de Estudios Tecnológicos'),
('Rene', '81dc9bdb52d04dc20036dbd8313ed055', 'Rene', 'Guevara');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
