-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2018 a las 23:14:42
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sasisopa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `idac` int(11) NOT NULL,
  `activity` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `added_responsabilities`
--

CREATE TABLE `added_responsabilities` (
  `idar` int(11) NOT NULL,
  `idac` int(11) NOT NULL,
  `idr` int(11) NOT NULL,
  `idu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idb` int(11) NOT NULL,
  `ideb` int(11) NOT NULL,
  `idu` int(11) DEFAULT NULL,
  `hora_inicio` date DEFAULT NULL,
  `hora_termino` date DEFAULT NULL,
  `firma` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencia_bitacora`
--

CREATE TABLE `evidencia_bitacora` (
  `ideb` int(11) NOT NULL,
  `evidencia` longblob,
  `observaciones` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_log_entries`
--

CREATE TABLE `ext_log_entries` (
  `id` int(11) NOT NULL,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_translations`
--

CREATE TABLE `ext_translations` (
  `id` int(11) NOT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legal_requirements`
--

CREATE TABLE `legal_requirements` (
  `idlr` int(11) NOT NULL,
  `dependencia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clasificacion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ano_emision` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patron` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trabajadores` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generales` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disposiciones_especificas` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `articulos_aplicables` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_requisitos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `level`
--

CREATE TABLE `level` (
  `idl` int(11) NOT NULL,
  `level` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsibilities`
--

CREATE TABLE `responsibilities` (
  `idr` int(11) NOT NULL,
  `responsability` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idu` int(11) NOT NULL,
  `idl` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`idac`);

--
-- Indices de la tabla `added_responsabilities`
--
ALTER TABLE `added_responsabilities`
  ADD PRIMARY KEY (`idar`),
  ADD KEY `fk_added_responsabilities_activities_idx` (`idac`),
  ADD KEY `fk_added_responsabilities_responsibilities1_idx` (`idr`),
  ADD KEY `fk_added_responsabilities_usuarios1_idx` (`idu`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idb`),
  ADD KEY `fk_bitacora_evidencia_bitacora1_idx` (`ideb`);

--
-- Indices de la tabla `evidencia_bitacora`
--
ALTER TABLE `evidencia_bitacora`
  ADD PRIMARY KEY (`ideb`);

--
-- Indices de la tabla `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ext_translations`
--
ALTER TABLE `ext_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `legal_requirements`
--
ALTER TABLE `legal_requirements`
  ADD PRIMARY KEY (`idlr`);

--
-- Indices de la tabla `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`idl`);

--
-- Indices de la tabla `responsibilities`
--
ALTER TABLE `responsibilities`
  ADD PRIMARY KEY (`idr`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idu`),
  ADD KEY `fk_usuarios_level1_idx` (`idl`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `idac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `added_responsabilities`
--
ALTER TABLE `added_responsabilities`
  MODIFY `idar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evidencia_bitacora`
--
ALTER TABLE `evidencia_bitacora`
  MODIFY `ideb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ext_translations`
--
ALTER TABLE `ext_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `legal_requirements`
--
ALTER TABLE `legal_requirements`
  MODIFY `idlr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `level`
--
ALTER TABLE `level`
  MODIFY `idl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `responsibilities`
--
ALTER TABLE `responsibilities`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `added_responsabilities`
--
ALTER TABLE `added_responsabilities`
  ADD CONSTRAINT `FK_C6B7BAA07DD970E` FOREIGN KEY (`idr`) REFERENCES `responsibilities` (`idr`),
  ADD CONSTRAINT `FK_C6B7BAA080E96E6D` FOREIGN KEY (`idac`) REFERENCES `activities` (`idac`),
  ADD CONSTRAINT `FK_C6B7BAA099B902AD` FOREIGN KEY (`idu`) REFERENCES `usuarios` (`idu`);

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `FK_9087FEF993829BFF` FOREIGN KEY (`ideb`) REFERENCES `evidencia_bitacora` (`ideb`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_EF687F2FDD2AA6D` FOREIGN KEY (`idl`) REFERENCES `level` (`idl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
