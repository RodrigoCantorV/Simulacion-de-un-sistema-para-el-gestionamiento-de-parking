-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2019 a las 12:49:41
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `software2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `doc` varchar(10) NOT NULL,
  `cod` varchar(10) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `nombre1` varchar(25) DEFAULT NULL,
  `nombre2` varchar(25) DEFAULT NULL,
  `apellido1` varchar(25) DEFAULT NULL,
  `apellido2` varchar(25) DEFAULT NULL,
  `nacimiento` varchar(14) DEFAULT NULL,
  `genero` varchar(2) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `telefono` varchar(7) DEFAULT NULL,
  `usser` varchar(15) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`doc`, `cod`, `rol`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `nacimiento`, `genero`, `correo`, `celular`, `telefono`, `usser`, `pass`) VALUES
('1073717664', '161216274', 'admin', 'Rodrigo', 'albaro', 'CANTOR', 'VASQUEZ', '1998', 'M', 'rcvunicun@gmail.com', '3125722328', '5779492', 'mirras', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamiento`
--

CREATE TABLE `estacionamiento` (
  `espacio` int(4) NOT NULL,
  `numero` int(3) NOT NULL,
  `zona` int(3) NOT NULL,
  `tipo` varchar(5) DEFAULT NULL,
  `discapacitado` varchar(5) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estacionamiento`
--

INSERT INTO `estacionamiento` (`espacio`, `numero`, `zona`, `tipo`, `discapacitado`, `estado`) VALUES
(15, 1, 1, 'CARRO', 'NO', 'INACTIVO'),
(16, 2, 1, 'CARRO', 'NO', 'INACTIVO'),
(17, 3, 1, 'CARRO', 'NO', 'INACTIVO'),
(18, 1, 2, 'CARRO', 'NO', 'INACTIVO'),
(19, 2, 2, 'CARRO', 'NO', 'INACTIVO'),
(20, 3, 2, 'CARRO', 'SI', 'INACTIVO'),
(21, 1, 3, 'CARRO', 'NO', 'INACTIVO'),
(22, 2, 3, 'MOTO', 'NO', 'INACTIVO'),
(23, 3, 3, 'MOTO', 'NO', 'INACTIVO'),
(24, 1, 4, 'CARRO', 'NO', 'INACTIVO'),
(25, 2, 4, 'CARRO', 'NO', 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guarda`
--

CREATE TABLE `guarda` (
  `docu` varchar(10) NOT NULL,
  `cod` varchar(10) DEFAULT NULL,
  `zona` varchar(15) DEFAULT NULL,
  `nombre1` varchar(25) DEFAULT NULL,
  `nombre2` varchar(25) DEFAULT NULL,
  `apellido1` varchar(25) DEFAULT NULL,
  `apellido2` varchar(25) DEFAULT NULL,
  `nacimiento` varchar(14) DEFAULT NULL,
  `genero` varchar(2) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `telefono` varchar(7) DEFAULT NULL,
  `usser` varchar(15) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `doc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `guarda`
--

INSERT INTO `guarda` (`docu`, `cod`, `zona`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `nacimiento`, `genero`, `correo`, `celular`, `telefono`, `usser`, `pass`, `doc`) VALUES
('1000048', '145478', 'ENTRADA', '', 'ANDRES', 'PULIDO', 'RODRIGEZ', '15/4/1991', 'M', 'JONATAN@GMAIL.COM', '1234', '5779495', 'JONATAN_P', 'GUARDA1', '1073717664'),
('107371445', '145479', 'SALIDA', 'MARIA', 'PAULA', 'RUIZ', 'OSORIO', '16/2/1992', 'F', '', '121615544', '5779444', 'MARIA_R', 'GUARDA2', '1073717664');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `num_ingreso` int(10) NOT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `hora_en` varchar(7) DEFAULT NULL,
  `hora_sa` varchar(7) DEFAULT NULL,
  `codigou` varchar(10) DEFAULT NULL,
  `solicitud` int(15) DEFAULT NULL,
  `espacio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`num_ingreso`, `fecha`, `hora_en`, `hora_sa`, `codigou`, `solicitud`, `espacio`) VALUES
(108, '26/11/19', '22:22', '22:33', NULL, 55, 15),
(109, '22/11/2019', '22:25', '22:35', '161216205', NULL, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `num_solicitud`
--

CREATE TABLE `num_solicitud` (
  `solicitud` int(15) NOT NULL,
  `fecha` varchar(11) DEFAULT NULL,
  `hora_ini` varchar(5) DEFAULT NULL,
  `hora_fin` varchar(5) DEFAULT NULL,
  `identificacion` varchar(12) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `num_solicitud`
--

INSERT INTO `num_solicitud` (`solicitud`, `fecha`, `hora_ini`, `hora_fin`, `identificacion`, `codigo`) VALUES
(55, '26/11/19', '22:16', '22:31', '1', '90001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perso_afue`
--

CREATE TABLE `perso_afue` (
  `identificacion` varchar(12) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perso_afue`
--

INSERT INTO `perso_afue` (`identificacion`, `nombre`, `apellido`) VALUES
('1', 'SERGIO', 'CANTOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `udec_cod`
--

CREATE TABLE `udec_cod` (
  `codigo` varchar(10) NOT NULL,
  `estado` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `udec_cod`
--

INSERT INTO `udec_cod` (`codigo`, `estado`) VALUES
('90001', 'INACTIVO'),
('90002', 'INACTIVO'),
('90003', 'INACTIVO'),
('90004', 'INACTIVO'),
('90005', 'INACTIVO'),
('90006', 'INACTIVO'),
('90007', 'INACTIVO'),
('90008', 'INACTIVO'),
('90009', 'INACTIVO'),
('90010', 'INACTIVO'),
('90011', 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigou` varchar(10) NOT NULL,
  `cedula` varchar(11) DEFAULT NULL,
  `nombre1` varchar(20) DEFAULT NULL,
  `nombre2` varchar(20) DEFAULT NULL,
  `apellido1` varchar(20) DEFAULT NULL,
  `apellido2` varchar(20) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `carrera` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigou`, `cedula`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `rol`, `carrera`) VALUES
('161216205', '1073717445', 'LAURA', 'VANESSA', 'ALBA', 'GONZALEZ', 'ESTUDIANTE', 'SISTEMAS'),
('161216212', '1073717664', 'Rodrigo', NULL, 'CANTOR', 'VASQUEZ', 'ESTUDAINTE', 'SISTEMAS'),
('161216245', '7894561', 'FRANCY', 'JULIETH', 'RAMIRES', 'RODRIGUEZ', 'ESTUDIANTES', 'SISTEMAS'),
('161216250', '1234567', 'YEFERSON', '', 'ORTIZ', 'BOLIVAR', 'ESTUDIANTE', 'SISTEMAS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`doc`);

--
-- Indices de la tabla `estacionamiento`
--
ALTER TABLE `estacionamiento`
  ADD PRIMARY KEY (`espacio`);

--
-- Indices de la tabla `guarda`
--
ALTER TABLE `guarda`
  ADD PRIMARY KEY (`docu`),
  ADD KEY `doc` (`doc`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`num_ingreso`),
  ADD KEY `codigou` (`codigou`),
  ADD KEY `solicitud` (`solicitud`),
  ADD KEY `espacio` (`espacio`);

--
-- Indices de la tabla `num_solicitud`
--
ALTER TABLE `num_solicitud`
  ADD PRIMARY KEY (`solicitud`),
  ADD KEY `identificacion` (`identificacion`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `perso_afue`
--
ALTER TABLE `perso_afue`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `udec_cod`
--
ALTER TABLE `udec_cod`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigou`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estacionamiento`
--
ALTER TABLE `estacionamiento`
  MODIFY `espacio` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `num_ingreso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `num_solicitud`
--
ALTER TABLE `num_solicitud`
  MODIFY `solicitud` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `guarda`
--
ALTER TABLE `guarda`
  ADD CONSTRAINT `guarda_ibfk_1` FOREIGN KEY (`doc`) REFERENCES `administrador` (`doc`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`codigou`) REFERENCES `usuarios` (`codigou`),
  ADD CONSTRAINT `ingreso_ibfk_2` FOREIGN KEY (`solicitud`) REFERENCES `num_solicitud` (`solicitud`),
  ADD CONSTRAINT `ingreso_ibfk_3` FOREIGN KEY (`espacio`) REFERENCES `estacionamiento` (`espacio`);

--
-- Filtros para la tabla `num_solicitud`
--
ALTER TABLE `num_solicitud`
  ADD CONSTRAINT `num_solicitud_ibfk_1` FOREIGN KEY (`identificacion`) REFERENCES `perso_afue` (`identificacion`),
  ADD CONSTRAINT `num_solicitud_ibfk_2` FOREIGN KEY (`codigo`) REFERENCES `udec_cod` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
