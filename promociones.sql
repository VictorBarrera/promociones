-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 04-09-2013 a las 23:41:23
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `promociones`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `search_terms`
-- 

CREATE TABLE `search_terms` (
  `id` bigint(20) NOT NULL auto_increment,
  `term` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `search_terms`
-- 

INSERT INTO `search_terms` VALUES (1, 'amor');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `tweets`
-- 

CREATE TABLE `tweets` (
  `id` bigint(20) NOT NULL auto_increment,
  `tweet_id` text NOT NULL,
  `user_id` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `tweets`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuarios`
-- 

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `usuarios`
-- 

INSERT INTO `usuarios` VALUES (1, 'Rafael Parada', 'rafa', '12345', 'admin');
