-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-10-2022 a las 17:20:44
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_escolarizado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

DROP TABLE IF EXISTS `cobranza`;
CREATE TABLE IF NOT EXISTS `cobranza` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `grado` varchar(50) NOT NULL,
  `grupo` varchar(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `mes` varchar(25) NOT NULL,
  `fechal` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cobranza`
--

INSERT INTO `cobranza` (`id`, `grado`, `grupo`, `cantidad`, `mes`, `fechal`, `nivel`) VALUES
(1, '1', 'A', 1000, 'diciembre', '2021-12-31', 'kinder'),
(2, '2', 'Q', 1500, 'diciembre', '2021-12-30', 'preparatoria'),
(3, '3', 'A', 1500, 'enero', '2022-01-31', 'primaria'),
(4, '3', 'T', 1500, 'enero', '2022-01-31', 'preparatoria'),
(5, '2', 'Q', 1500, 'enero', '2022-01-30', 'kinder'),
(6, '2', 'Q', 1300, 'febrero', '2022-02-28', 'kinder'),
(7, '6', 'J', 300, 'enero', '2022-01-31', 'preparatoria'),
(8, '7', 'J', 3000, 'enero', '2021-12-30', 'preparatoria'),
(9, '3', 'T', 100, 'julio', '2022-07-31', 'kinder'),
(10, '3', 'T', 100, 'mayo', '2022-05-31', 'primaria'),
(13, '2', 'A', 300, 'febrero', '2022-01-31', 'kinder'),
(14, '1', 'A', 100, 'enero', '2022-01-31', 'primaria'),
(15, '2', 'A', 100, 'enero', '2022-01-31', 'primaria'),
(16, '2', 'A', 800, 'marzo', '2022-03-31', 'primaria'),
(17, '1', 'A', 1000, 'enero', '2022-01-31', 'secundaria'),
(18, '1', 'A', 1000, 'enero', '2022-01-31', 'preparatoria'),
(19, '2', 'A', 200, 'enero', '2022-01-31', 'preparatoria'),
(20, '2', 'A', 100, 'febrero', '2022-02-28', 'preparatoria'),
(21, '6', 'J', 1000, 'octubre', '2022-10-31', 'preparatoria'),
(22, '6', 'J', 2000, 'diciembre', '2022-12-31', 'preparatoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobros`
--

DROP TABLE IF EXISTS `cobros`;
CREATE TABLE IF NOT EXISTS `cobros` (
  `folio` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_alumno` int(10) NOT NULL,
  `dia_pago` varchar(100) NOT NULL,
  `mes_cobro` varchar(100) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `grado` int(50) NOT NULL,
  `grupo` varchar(100) NOT NULL,
  `estatus` varchar(100) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  PRIMARY KEY (`folio`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cobros`
--

INSERT INTO `cobros` (`folio`, `nombre`, `id_alumno`, `dia_pago`, `mes_cobro`, `cantidad`, `grado`, `grupo`, `estatus`, `nivel`) VALUES
(33, 'pruebaa', 41, '05/01/22', 'febrero', 1300, 2, 'Q', 'activo', 'kinder'),
(2, 'ejemplo_bd', 1, '17-12-2021', 'febrero', 1300, 2, 'Q', 'activo', 'kinder'),
(3, 'pruebae', 40, '20-12-2021', 'enero', 1500, 3, 'T', 'activo', 'kinder'),
(6, 'pruebap', 39, '23/12/21', 'diciembre', 1000, 1, 'A', 'activo', 'kinder'),
(34, 'pruebaa', 41, '05/01/22', 'enero', 1500, 2, 'Q', 'activo', 'kinder'),
(24, 'xd', 44, '04/01/22', 'enero', 100, 2, 'A', 'activo', 'primaria'),
(11, 'lalo', 45, '02/01/22', 'enero', 100, 2, 'A', 'activo', 'primaria'),
(12, 'lalo', 45, '02/01/22', 'marzo', 800, 2, 'A', 'activo', 'primaria'),
(13, 'flor', 47, '02/01/22', 'enero', 1000, 1, 'A', 'activo', 'preparatoria'),
(14, 'pablo', 46, '02/01/22', 'enero', 1000, 1, 'A', 'activo', 'secundaria'),
(15, 'pruebae', 40, '02/01/22', 'julio', 100, 3, 'T', 'activo', 'kinder'),
(16, 'muestra', 48, '03/01/22', 'enero', 200, 2, 'A', 'activo', 'preparatoria'),
(37, 'muestra', 48, '07/01/22', 'febrero', 100, 2, 'A', 'activo', 'preparatoria'),
(18, 'mario', 490, '03/01/22', 'enero', 300, 6, 'J', 'activo', 'preparatoria'),
(27, 'mario', 49, '04/01/22', 'octubre', 1000, 6, 'J', 'activo', 'preparatoria'),
(25, 'xd', 44, '04/01/22', 'marzo', 800, 2, 'A', 'activo', 'primaria'),
(22, 'mario', 49, '04/01/22', 'enero', 300, 6, 'J', 'activo', 'preparatoria'),
(26, 'mario', 49, '04/01/22', 'diciembre', 2000, 6, 'J', 'activo', 'preparatoria'),
(35, 'xd2', 50, '05/01/22', 'diciembre', 2000, 6, 'J', 'activo', 'preparatoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(15) NOT NULL,
  `rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Servicios escolares'),
(3, 'alumnos'),
(4, 'financiero'),
(5, 'vigilante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `tel` text,
  `edad` int(25) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `grado` int(10) DEFAULT NULL,
  `estatus` varchar(25) DEFAULT NULL,
  `nivel` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `id_rol`, `tel`, `edad`, `sexo`, `grupo`, `grado`, `estatus`, `nivel`) VALUES
(1, 'admin', '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'escolares', '123', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'financiero', '123', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'prueba', 'prueba', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'holo', 'holo', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'probando', 'probando', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'alumno', 'alumno', 3, '7444', 18, 'M', 'A', 3, 'NO', 'preparatoria'),
(29, 'probando', 'probando', 1, '', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'inserciona', 'insercion', 3, '7444330244', 12, 'H', 'A', 1, 'SI', 'primaria'),
(33, 'prueba2', 'prueba2', 3, '74444', 17, 'M', 'A', 1, 'SI', 'preparatoria'),
(34, 'prueba3', 'prueba3', 3, '11111', 5, 'H', 'B', 2, 'SI', 'kinder'),
(35, 'prueba4', 'prueba4', 3, '333', 6, 'M', 'S', 3, 'SI', 'primaria'),
(36, 'nuevo', 'nuevo', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'majo', 'majo', 3, '74444', 19, 'M', 'H', 2, 'SI', 'preparatoria'),
(39, 'pruebap', 'pruebap', 3, '111', 11, 'H', 'A', 1, 'activo', 'kinder'),
(40, 'pruebae', 'contra', 3, '111', 13, 'H', 'T', 3, 'activo', 'kinder'),
(41, 'pruebaa', 'pruebaa', 3, '7444330256', 11, 'H', 'Q', 2, 'activo', 'kinder'),
(42, 'insercion', 'insercion', 3, '7444330256', 19, 'H', 'H', 4, 'activo', 'secundaria'),
(43, 'admin2', 'admin2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'xd', 'xd', 3, '7444330256', 7, 'H', 'A', 2, 'activo', 'primaria'),
(45, 'lalo', 'lalo', 3, '7444330256', 7, 'H', 'A', 2, 'activo', 'primaria'),
(46, 'pablo', 'pablo', 3, '7444330256', 14, 'H', 'A', 1, 'activo', 'secundaria'),
(47, 'flor', 'flor', 3, '7444330256', 17, 'M', 'A', 1, 'activo', 'preparatoria'),
(48, 'muestra', 'muestra', 3, '7444330256', 17, 'H', 'A', 2, 'activo', 'preparatoria'),
(49, 'mario', 'mario', 3, '7444', 17, 'H', 'J', 6, 'activo', 'preparatoria'),
(50, 'xd2', 'xd2', 3, '74444', 17, 'H', 'J', 6, 'activo', 'preparatoria'),
(51, 'vigilante', '123', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'vigilante2', 'vigilante2', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'vig', 'vig', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
