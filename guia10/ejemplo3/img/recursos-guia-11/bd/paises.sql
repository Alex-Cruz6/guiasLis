-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-04-2012 a las 00:23:48
-- Versión del servidor: 5.1.36
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: 'paises'
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'pais'
--

DROP TABLE IF EXISTS pais;
CREATE TABLE IF NOT EXISTS pais (
  idpais char(2) NOT NULL,
  pais varchar(50) NOT NULL,
  capital varchar(50) NOT NULL,
  idioma varchar(30) NOT NULL,
  moneda varchar(20) NOT NULL,
  bandera varchar(200) NOT NULL,
  escudo varchar(200) NOT NULL,
  PRIMARY KEY (idpais)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Información de los países de centroamérica';

--
-- Volcar la base de datos para la tabla 'pais'
--

INSERT INTO pais (idpais, pais, capital, idioma, moneda, bandera, escudo) VALUES
('be', 'Belice', 'Belmopán', 'Inglés', 'Dólar', 'img/banderaBE.png', 'img/escudoBE.png'),
('cr', 'Costa Rica', 'San José', 'Español', 'Colón', 'img/banderaCR.png', 'img/escudoCR.png'),
('es', 'El Salvador', 'San Salvador', 'Español', 'Dólar', 'img/banderaES.png', 'img/escudoHO.png'),
('gu', 'Guatemala', 'Guatemala', 'Español', 'Quetzal', 'img/banderaGU.png', 'img/escudoGU.png'),
('ho', 'Honduras', 'Tegucigalpa', 'Español', 'Lempira', 'img/banderaHO.png', 'img/escudoHO.png'),
('ni', 'Nicaragua', 'Managua', 'Español', 'Córdova', 'img/banderaNI.png', 'img/escudoNI.png');
