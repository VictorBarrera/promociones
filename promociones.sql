-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2013 a las 22:01:06
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `promociones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL,
  `municipio` varchar(20) DEFAULT NULL,
  `feha_nacimiento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT '1',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `descripcion`, `precio`) VALUES
(1, 'televisor', 150),
(2, 'refrigeradora', 250),
(3, 'cocina', 260),
(4, 'celular', 540),
(5, 'lavadora', 369),
(6, 'plancha', 26),
(7, 'vestido', 78),
(8, 'zapatos', 150),
(9, 'play station 4', 684),
(10, 'nintendo wii', 541),
(11, 'camara digital', 210),
(12, 'cama', 126),
(13, 'secadora de pelo', 125),
(14, 'comedor', 561),
(15, 'bateria de cocina', 150),
(16, 'pantalla lcd', 698),
(17, 'laptop', 840),
(18, 'computadora destok', 459),
(19, 'mouse', 12),
(20, 'monitor lcd', 125),
(21, 'discoduro externo', 100),
(22, 'edredon', 156),
(23, 'juguetera', 258),
(24, 'licuadora', 98),
(25, 'chinero', 145),
(26, 'ventilador', 80),
(27, 'aire acondicionado', 269),
(28, 'mueble de pc', 35),
(29, 'dvd', 50),
(30, 'ropero', 400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE IF NOT EXISTS `promociones` (
  `idpromociones` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_promo` varchar(100) DEFAULT NULL,
  `fecha_desde` date DEFAULT NULL,
  `fecha_hasta` date DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1,
  PRIMARY KEY (`idpromociones`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`idpromociones`, `nombre_promo`, `fecha_desde`, `fecha_hasta`, `descripcion`) VALUES
(1, 'Cupones de descuento', '2012-01-12', '2012-02-12', 'Por cada compra mayor a $10 se le dar?í un cup??n al cliente para que lo canjee por la mierda que ?®l quiera.'),
(2, 'Comida gratis', '2013-05-12', '2013-05-12', 'Por cada compra mayor de $100 se les dar?í un vale de pollo campero para que se vayan hartar gratis.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `search_terms`
--

CREATE TABLE IF NOT EXISTS `search_terms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `term` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `search_terms`
--

INSERT INTO `search_terms` (`id`, `term`) VALUES
(1, 'amor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tweet_id` text NOT NULL,
  `user_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `passwd`, `tipo`) VALUES
(1, 'Rafael Parada', 'rafa', '12345', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `idventa` int(11) NOT NULL DEFAULT '0',
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `fechaventa` date DEFAULT NULL,
  PRIMARY KEY (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
