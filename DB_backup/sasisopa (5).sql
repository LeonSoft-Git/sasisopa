-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2018 a las 00:40:24
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

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

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`idac`, `activity`) VALUES
(1, 'Deberá asegurar que el sistema de Administración tiene conformidad con los requisitos establecidos en los lineamientos emitidos por la agencia y con la normatividad aplicable a las estaciones de servicio.'),
(2, 'Establecer un programa de revisiones por parte de la dirección, para mantenerlo(s) informado(s) acerca del Desempeño del Sistema '),
(3, 'Proponer la adopción de las mejores prácticas nacionales e internacionales en la implementación del Sistema de Administración'),
(4, 'Deberá coordinar las acciones necesarias para subsanar los incumplimientos de la normatividad interna y externa aplicable e informar a la Agencia de cualquier situación crítica que vulnere la Seguridad Industrial, Seguridad Operativa y a la Protecció'),
(5, 'Implementar actividades del Sistema de Administración.'),
(6, 'Realizar las actividades que le sean designadas por el Jefe de Turno o quien corresponda'),
(7, 'Asegurar las buenas prácticas del Sistema de Administración'),
(8, 'Alinearse al sistema de Administración de la estación de servicio'),
(9, 'Reportar anomalías en funcionamiento e integridad física de las instalaciones y equipos'),
(10, 'Dar seguimiento a la implementación de las actividades del Sistema de Administración con personal operativo'),
(11, 'Realizar las actividades que le sean designadas por el Gerente de Operaciones'),
(12, 'Asegurar las buenas prácticas del personal en el Sistema de Administración'),
(13, 'Exigir la alineación del personal interno al sistema de Administración de la estación de servicio'),
(14, 'Reportar anomalías en funcionamiento e integridad física de las instalaciones y equipos.'),
(15, 'Instruir al personal de nuevo ingreso y a los contratistas nuevos'),
(16, 'Solicitar compra de materiales y refacciones de las diferentes áreas que comprenden la estación de servicio'),
(17, 'Supervisar y dar seguimiento a servicios realizados por proveedores y contratistas'),
(18, 'Dar cumplimiento a solicitudes de servicio'),
(19, 'Recorrido de instalaciones para evaluar funcionalidad de los equipos y maquinaria instalada'),
(20, 'Gestionar los servicios de proveedores especializados en los diferentes sistemas instalados'),
(21, 'Controlar y asegurar la disponibilidad de refacciones y materiales de consumo'),
(22, 'Dar seguimiento al programa de mantenimiento y que este se cumpla'),
(23, 'Dar seguimiento a la implementación de los recursos financieros para asegurar el Sistema de Administración.'),
(24, 'Gestionar los recursos financieros de las diferentes áreas dela Estación de Servicio.'),
(25, 'Realizar las actividades que le sean designadas por el representante Técnico'),
(26, 'Exigir la alineación del personal externo a las disposiciones descritas en el sistema de Administración de la estación de servicio que así lo requiera'),
(27, 'Facturación'),
(28, 'Reportar las actividades relevantes del sistema de Administración al Representante Técnico'),
(29, 'Asegurar los medios para capacitar al personal de nuevo ingreso y a los contratistas nuevos'),
(30, 'Realizar la gestión económica de pasos antes las dependencias gubernamentales o las que así lo requieran'),
(31, 'Realizar los reportes a la CRE');

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
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `idarchivos` int(11) NOT NULL,
  `carta_poder` varchar(75) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`idarchivos`, `carta_poder`, `nombre`, `created_at`) VALUES
(1, '29452cd567b87fffca334abd4c0c5c2a.pdf', 'aaa', NULL),
(2, '831d7f7d50597c287b0073eb50523ddd.pdf', 'aaa', NULL),
(3, '68689dc52d6aa02825a918c2057c52c7.pdf', 'aaa', NULL),
(4, 'e6d6e27fdc40c593d5963892c7cf2254.pdf', 'aaa', NULL);

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
-- Estructura de tabla para la tabla `deberes`
--

CREATE TABLE `deberes` (
  `idd` int(11) NOT NULL,
  `deber` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `deberes`
--

INSERT INTO `deberes` (`idd`, `deber`) VALUES
(1, 'Determinar los objetivos con las partes interesadas'),
(2, 'Establecer los programas para el cumplimiento de los objetivos.'),
(3, 'Asegurar las buenas prácticas en materia de Seguridad Industrial, Seguridad Operativa y la Protección del Medio Ambiente en cualquiera de las etapas de la Estaci?n de Servicio.'),
(4, 'Definir autoridad y responsabilidad; establecer interacciones y coordinaciones entra las diferentes ?reas y niveles.'),
(5, 'Actualizar el Sistema de Administración cuando sea requerido y de acuerdo a las disposiciones que establezca la agencia.'),
(6, 'Asegurar los diferentes recursos de la Estación de Servicio.'),
(7, 'Asegurar la retroalimentación del Sistema de Administración.\r\n'),
(8, 'Asegurar la mejora continua.'),
(9, 'Detectar áreas de oportunidad en el Sistema de Administración.\r\n'),
(10, 'Realizar o designar análisis de riesgo de las actividades.'),
(11, 'Comunicar información referente al Sistema de Administración con los involucrados en la Estación de Servicio, así como con los contratistas y subcontratistas. Con los responsables de las diferentes áreas de la Estación de Servicio.'),
(12, 'Cumplir con los objetivos del área operacional y participar en el sistema. '),
(13, 'Implementar las buenas prácticas en materia de Seguridad Industrial, Seguridad y Operativa y la Protección del Medio Ambiente con el personal interno.'),
(14, 'Administrar los diferentes recursos del área operativa que sean designados.'),
(15, 'Contribuir a la retroalimentación del Sistema de Administración.\r\n'),
(16, 'Contribuir al aseguramiento de la mejora continua del sistema de Administraci?n.\r'),
(17, 'Detectar áreas de oportunidad en las diferentes operaciones y áreas de la estación de servicio.'),
(18, 'Reportar de manera inmediata los incidentes y accidentes dentro de la estaci?n de servicio.'),
(19, 'Atención con respeto al cliente.'),
(20, 'Mantener en buenas condiciones el mobiliario y equipo de la estaci?n de servicio.'),
(21, 'Dar cumplimiento a los objetivos del área operacional y exigir la participación del personal. '),
(22, 'Asegurar las buenas prácticas en materia de Seguridad Industrial, Seguridad y Operativa y la Protección del Medio Ambiente con el personal interno.'),
(23, 'Establecer coordinación con personal interno para la realización de actividades.'),
(24, 'Transmitir cualquier Actualización en el Sistema de Administración cuando sea requerido.'),
(25, 'Solicitar y administrar los diferentes recursos del área operativa.'),
(26, 'Contribuir a la retroalimentaci?n del Sistema de Administraci?n.\r'),
(27, 'Contribuir al aseguramiento de la mejora continua del sistema de Administraci?n.\r'),
(28, 'Detectar ?reas de oportunidad en las diferentes operaciones y ?reas de la estaci?n de servicio.'),
(29, 'Reportar de manera inmediata los incidentes y accidentes dentro de la estaci?n de servicio.'),
(30, 'Control y calificaci?n de personal a su cargo.'),
(31, 'Asegurar el cumplimiento de los programas de mantenimiento predictivo y preventivo.'),
(32, 'Coordinar las actividades de su personal a cargo y de personal contratista.'),
(33, 'Evaluaci?n de contratistas y proveedores por carta de servicios.'),
(34, 'Dar cumplimiento a los objetivos del ?rea operacional. '),
(35, 'Asegurar las buenas pr?cticas en materia de Seguridad Industrial, Seguridad y Operativa y la Protecci?n del Medio Ambiente con el personal interno y contratistas.'),
(36, 'Establecer coordinaci?n con personal interno y contratistas, proveedores y subcontratistas para la realizaci?n de actividades.'),
(37, 'Solicitar y administrar los diferentes recursos del ?rea operativa.'),
(38, 'Reportar de manera inmediata los incidentes y accidentes dentro de la estaci?n de servicio.'),
(39, 'Control y calificaci?n de personal a su cargo y personal contratista y proveedores.'),
(40, 'Detectar y promover los recursos financieros, materiales y humanos para el cumplimiento los objetivos de sistema de administraci?n. '),
(41, 'Dar seguimiento a los recursos otorgados a las diferentes ?reas.'),
(42, 'Asegurar las buenas pr?cticas en la contrataci?n de contratistas, proveedores y subcontratistas en materia de Seguridad Industrial, Seguridad y Operativa y la Protecci?n del Medio Ambiente.'),
(43, 'Coordinaci?n de actividades de contratistas, proveedores y subcontratistas para la realizaci?n de actividades.'),
(44, 'Contribuir a la retroalimentaci?n del Sistema de Administraci?n.\r'),
(45, 'Contribuir al aseguramiento de la mejora continua del sistema de Administraci?n.\r'),
(46, 'Detectar ?reas de oportunidad en las diferentes operaciones y ?reas de la estaci?n de servicio.'),
(47, 'Control y calificaci?n de contratistas y proveedores.');

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
  `codificacion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ano_emision` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patron` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trabajadores` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `generales` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disposiciones_especificas` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `articulos_aplicables` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion_requisito` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `legal_requirements`
--

INSERT INTO `legal_requirements` (`idlr`, `dependencia`, `clasificacion`, `codificacion`, `titulo`, `ano_emision`, `patron`, `trabajadores`, `generales`, `disposiciones_especificas`, `articulos_aplicables`, `descripcion_requisito`, `link`) VALUES
(1, 'STPS', 'SEGURIDAD', 'NOM-001', 'Edificios, locales e instalaciones.', '2008', '5.1, 5.2, 5.3, 5.4, 5.5, 5.6', '6.1, 6.2, 6.3', '7.1, 7.1.1, 7.1.2, 7.1.3, 7.1.4, 7.1.5, 7.1.6, 7.2', '7.5, 7.5.1, 7.5.2, 7.6, 7.6.1, 8, 8.1, 8.2, 8.3, 9, 9.1, 9.2, 9.3, 9.4, 9.8, 9.9', '\r', NULL, NULL),
(2, 'STPS', 'SEGURIDAD', 'NOM-002', 'Prevención y protección contra incendios.', '2010', '5, 5.1, 5.2, 5.3, 5.4, 5.5, 5.7, 5.8, 5.9, 5.12', '6, 6.1, 6.2, 6.3, 6.4, 6.5, 6.6, 6.7, 6.8, 6.9', '7, 7.1, 7.2, 7.3, 7.4, 7.5, 7.5.1, 7.5.2, 7.5.3, 7', '5.6, 5.11, 8.2, 9.1, 9.2, 9.3, 10.3, 11.3, 11.4, 5.10.2, 8.1.2', '\r', NULL, NULL),
(3, 'STPS', 'SEGURIDAD', 'NOM-004', 'Sistemas y dispositivos de seguridad en maquinaria', '1999', '5.1, 5.2, 5.2.1, 5.2.2, 5.3, 5.4', '6.1, 6.2, 6.3, 6.4, 6.5, 6.6', '7, 7.1, 7.2, 7.2.1, 7.2.2, 7.2.3, 8, 8.1, 8.1.1, 8', '', '\r', NULL, NULL),
(4, 'STPS', 'SEGURIDAD', 'NOM-005', 'Manejo, transporte y almacenamiento de sustancias ', '1998', '5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.9, 5.10,', '6.1, 6.2, 6.3, 6.4, 6.5', '7, 7.1, 7.2, 8, 9.6, 9.9, 9.10, 9.11', '9.1, 9.2, 9.4, 9.5, 9.7, 9.8, 10, 10.1, 10.2, 10.2.1, 10.2.2, 10.3, 10.3.1, 10.3.2, 10.4, 10.4.1, 10', '\r', NULL, NULL),
(5, 'STPS', 'SEGURIDAD', 'NOM-006', 'Manejo y almacenamiento de materiales.', '2014', '9.1, 9.2, 9.4, 9.5, 9.7, 9.8, 10, 10.1, 10.2, 10.2', '', '10.1, 10.3, 10.4, 10.5, 10.6, 10.7, 11.1, 11.2, 11', '7.7, 8.1, 8.2, 8.3, 8.4, 8.5, 9.1, 9.2, 9.3, 9.4, 9.5, 9.6, 9.7, 10.2', '\r', NULL, NULL),
(6, 'STPS', 'SEGURIDAD', 'NOM-009', 'Trabajos en altura.', '2011', '5, 5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.10, 5', '6, 6.1, 6.2, 6.3, 6.4, 6.5', '7, 7.1, 7.2, 7.3, 7.6, 7.7, 7.8, 7.9, 7.10, 7.11, ', '5.9, 7.4, 7.5, 8.4.1, 8.4.2, 8.4.3, 8.4.4, 8.4.5, 8.4.6, 9.1, 12.1, 12.2, 12.3, 12.4, 16.3, 16.6', '\r', NULL, NULL),
(7, 'STPS', 'SEGURIDAD', 'NOM-020', 'Recipientes sujetos a presión y calderas.', '2011', '5, 5.1, 5.2, 5.3, 5.5, 5.6, 5.7, 5.8, 5.9, 5.11, 5', '6, 6.1, 6.2, 6.3, 6.4, 6.5', '7, 8, 8.1, 9, 11, 12, 12.1, 13, 13.7, 13.7.1, 14, ', '5.4, 5.10, 5.12, 5.15, 5.16, 5.17, 7.1.1, 9.2, 10.1, 11.1, 11.1.2, 11.2, 11.2.2, 11.3, 11.3.2, 12.1.', '\r', NULL, NULL),
(8, 'STPS', 'SEGURIDAD', 'NOM-027', 'Soldadura y corte.', '2008', '5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.9, 5.10,', '6.1, 6.2, 6.3, 6.4, 6.5,', '7, 8, 9, 9.1, 9.2, 10, 10.1, 10.2, 10.3, 10.4, 10.', '11', '\r', NULL, NULL),
(9, 'STPS', 'SEGURIDAD', 'NOM-029', 'Mantenimiento de instalaciones eléctricas. ', '2011', '5, 5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.9, 5.', '6, 6.1, 6.2, 6.3, 6.4, 6.5, 6.6, 6.7, 6.8, 6.9', '7, 7.1, 7.2, 7.3, 7.4, 8, 8.1, 8.2, 8.3, 8.4, 9, 9', '11, 11.1, 11.2, 11.3, 12, 12.1, 12.2', '\r', NULL, NULL),
(10, 'STPS', 'SALUD', 'NOM-025', 'Iluminación.', '2008', '5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.9, 5.10,', '6.1, 6.2, 6.3, 6.4', '7, 8, 8.1, 8.2, 9, 9.1, 9.1.1, 9.1.2, 10, 10.1, 10', '', '\r', NULL, NULL),
(11, 'STPS', 'ORGANIZACIÓN', 'NOM-017', 'Equipo de protección personal.', '2008', '5.1, 5.2, 5.3, 5.4, 5.5, 5.5.1, 5.5.2, 5.6, 5.7, 5', '6.1, 6.2, 6.3, 6.4', '7, 7.1', '', '\r', NULL, NULL),
(12, 'STPS', 'ORGANIZACIÓN', 'NOM-018', 'Identificación de peligros y riesgos por sustancia', '2015', '5.1, 5.2, 5.3, 5.4, 5.5', '6.1, 6.2', '7.1, 7.1.1, 7.1.2, 7.2, 8, 101, 102, 103, 104, 105', '', '\r', NULL, NULL),
(13, 'STPS', 'ORGANIZACIÓN', 'NOM-019', 'Comisiones de seguridad e higiene.', '2011', '5, 5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.9, 5.', '6, 6.1, 6.2, 6.3, 6.4, 6.5, 6.6, 6.7,', '', '', '\r', NULL, NULL),
(14, 'STPS', 'ORGANIZACIÓN', 'NOM-026', 'Colores y señales de seguridad.', '2008', '5.1, 5.2, 5.3, 5.4', '6.1, 6.2', '7.1, 7.2, 8, 8.1, 8.2, 8.2.1, 8.2.2, 8.2.3, 8.2.4,', '9, 9.1, 9.1.1, 9.1.2, 9.1.3, 9.1.4, 9.2, 9.2.1, 9.2.2, 9.2.3, 9.2.4, 9.2.5, 9.2.6, 9.2.7, 9.2.8, 9.3', '\r', NULL, NULL),
(15, 'STPS', 'ORGANIZACIÓN', 'NOM-030', 'Servicios preventivos de seguridad y salud.', '2009', '4, 4.1, 4.2, 4.3, 4.5, 4.6, 4.7, 4.8, 4.9', '', '5, 5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.7, 5.8, 5.9, 6,', '4.1.1, 4.4.1, 6.2, 7.2', '\r', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `level`
--

CREATE TABLE `level` (
  `idl` int(11) NOT NULL,
  `level` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `level`
--

INSERT INTO `level` (`idl`, `level`) VALUES
(1, 'Super'),
(2, 'representante_tecnico'),
(3, 'gerente_operacional'),
(4, 'gerente_administrativo'),
(5, 'jefe_de_mantenimiento'),
(6, 'jefe_de_turno'),
(7, 'auxiliar_administrativo'),
(8, 'despachador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_control`
--

CREATE TABLE `lista_control` (
  `idlc` int(11) NOT NULL,
  `clave` int(11) DEFAULT NULL,
  `no_revision` int(11) DEFAULT NULL,
  `fecha_ultima` date DEFAULT NULL,
  `nombre_registro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `responsable` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `archivo_tiempo` int(11) DEFAULT NULL,
  `destruccion` tinyint(1) DEFAULT NULL,
  `papel` tinyint(1) DEFAULT NULL,
  `electronico` tinyint(1) DEFAULT NULL,
  `observaciones` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lista_control`
--

INSERT INTO `lista_control` (`idlc`, `clave`, `no_revision`, `fecha_ultima`, `nombre_registro`, `responsable`, `ubicacion`, `tiempo`, `archivo_tiempo`, `destruccion`, `papel`, `electronico`, `observaciones`) VALUES
(1, 1, 11, '2018-05-08', 'dddd', 'ssss', 'sss', 11, 11, 0, 0, 1, 'aaaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_distribucion`
--

CREATE TABLE `lista_distribucion` (
  `idld` int(11) NOT NULL,
  `clave` int(11) DEFAULT NULL,
  `nombre_documento` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no_revision` int(11) DEFAULT NULL,
  `no_copia` int(11) DEFAULT NULL,
  `fecha_ultima` date DEFAULT NULL,
  `procesos_areas` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lista_distribucion`
--

INSERT INTO `lista_distribucion` (`idld`, `clave`, `nombre_documento`, `no_revision`, `no_copia`, `fecha_ultima`, `procesos_areas`) VALUES
(1, 11, 'hh', 11, 11, '2018-05-15', 'dddd'),
(2, 1, 'sss', 1, 1, '2018-05-07', 'ssss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organigrama`
--

CREATE TABLE `organigrama` (
  `idorganigrama` int(11) NOT NULL,
  `altadireccion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `representantetecnico` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jefemantenimiento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auxiliaradmin` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jefedeturno` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prestadores` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `despachadores` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `organigrama`
--

INSERT INTO `organigrama` (`idorganigrama`, `altadireccion`, `representantetecnico`, `jefemantenimiento`, `auxiliaradmin`, `jefedeturno`, `prestadores`, `despachadores`) VALUES
(1, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte1`
--

CREATE TABLE `reporte1` (
  `idreporte1` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lugar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_observacion` longtext COLLATE utf8_unicode_ci,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `turno` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `observacion` longtext COLLATE utf8_unicode_ci,
  `colaborador` tinyint(1) DEFAULT NULL,
  `contratista` tinyint(1) DEFAULT NULL,
  `visitante` tinyint(1) DEFAULT NULL,
  `planeada` tinyint(1) DEFAULT NULL,
  `espontanea` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsibilities`
--

CREATE TABLE `responsibilities` (
  `idr` int(11) NOT NULL,
  `responsability` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `responsibilities`
--

INSERT INTO `responsibilities` (`idr`, `responsability`) VALUES
(1, 'Establecer estándares de desempeño'),
(2, 'Medir el desempeño del Sistema de Administración y compararlo con las normas establecidas'),
(3, 'Procesos y resultados'),
(4, 'Seguimiento y control de los recursos designados'),
(5, 'Seguimiento e implementación de las medidas de control establecidas'),
(6, 'Dar cumplimiento operacionalmente a los estándares de desempeño'),
(7, 'Recibir capacitación y adiestramiento.'),
(8, 'Implementar medidas de control establecidas.'),
(9, 'Toma de lectura de dispensarios.'),
(10, 'Verificar el buen funcionamiento de equipos '),
(11, 'Atención a clientes.'),
(12, 'Orden y limpieza de equipo y área'),
(13, 'Orden y limpieza de equipo y área.\r\nRecepción de auto-tanque\r\n'),
(14, 'Medir el desempeño del personal a su cargo.'),
(15, 'Capacitar, alinear y adiestrar.'),
(16, 'Atención a clientes y resolución de problemas.'),
(17, 'Medir el desempeño del personal contratistas y proveedores.'),
(18, 'Designar recursos para la capacitación y entrenamiento del personal de la estación de servicio'),
(19, 'Seguimiento y control de los recursos designados a las diferentes áreas'),
(20, 'Reporte de volumétricos a la CRE'),
(21, 'Facturación'),
(22, 'Reportes de gastos'),
(23, 'Pagos designados  ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idu` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idl` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `salt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idu`, `user`, `password`, `mail`, `idl`, `code`, `active`, `created_at`, `salt`) VALUES
(1, 'adhir', 'admin', 'ingadhir@gmail.com', 1, 'adhir12345', 'si', '2018-03-16 16:54:24', NULL),
(2, 'aldo', 'adaldo', 'gti@kreatsolutions.com.mx', 1, 'aldo123456', 'si', '2018-04-11 16:57:21', NULL),
(3, 'karem', 'adkarem', NULL, 1, 'karem12345', 'si', '2018-04-24 17:32:18', NULL),
(4, 'Oscar', 'oscar', 'ggg@glglgl.com.mx', 7, '123456', 'si', '2018-05-02 00:00:00', NULL);

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
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idarchivos`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idb`),
  ADD KEY `fk_bitacora_evidencia_bitacora1_idx` (`ideb`);

--
-- Indices de la tabla `deberes`
--
ALTER TABLE `deberes`
  ADD PRIMARY KEY (`idd`);

--
-- Indices de la tabla `evidencia_bitacora`
--
ALTER TABLE `evidencia_bitacora`
  ADD PRIMARY KEY (`ideb`);

--
-- Indices de la tabla `ext_log_entries`
--
ALTER TABLE `ext_log_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_class_lookup_idx` (`object_class`),
  ADD KEY `log_date_lookup_idx` (`logged_at`),
  ADD KEY `log_user_lookup_idx` (`username`),
  ADD KEY `log_version_lookup_idx` (`object_id`,`object_class`,`username`);

--
-- Indices de la tabla `ext_translations`
--
ALTER TABLE `ext_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  ADD KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`);

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
-- Indices de la tabla `lista_control`
--
ALTER TABLE `lista_control`
  ADD PRIMARY KEY (`idlc`);

--
-- Indices de la tabla `lista_distribucion`
--
ALTER TABLE `lista_distribucion`
  ADD PRIMARY KEY (`idld`);

--
-- Indices de la tabla `organigrama`
--
ALTER TABLE `organigrama`
  ADD PRIMARY KEY (`idorganigrama`);

--
-- Indices de la tabla `reporte1`
--
ALTER TABLE `reporte1`
  ADD PRIMARY KEY (`idreporte1`);

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
  MODIFY `idac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `added_responsabilities`
--
ALTER TABLE `added_responsabilities`
  MODIFY `idar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `idarchivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `idlr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `level`
--
ALTER TABLE `level`
  MODIFY `idl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `lista_control`
--
ALTER TABLE `lista_control`
  MODIFY `idlc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lista_distribucion`
--
ALTER TABLE `lista_distribucion`
  MODIFY `idld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `organigrama`
--
ALTER TABLE `organigrama`
  MODIFY `idorganigrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reporte1`
--
ALTER TABLE `reporte1`
  MODIFY `idreporte1` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsibilities`
--
ALTER TABLE `responsibilities`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
