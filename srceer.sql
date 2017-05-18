-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2017 a las 04:20:37
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `srceer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_estudiante`
--

CREATE TABLE `contacto_estudiante` (
  `contacto_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `documento` varchar(60) NOT NULL,
  `primer_nombre` varchar(60) NOT NULL,
  `primer_apellido` varchar(60) NOT NULL,
  `segundo_apellido` varchar(60) NOT NULL,
  `segundo_nombre` varchar(60) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tel_contacto` varchar(45) DEFAULT NULL,
  `cel_contacto` varchar(45) NOT NULL,
  `email` varchar(70) DEFAULT NULL,
  `descendencia` varchar(45) DEFAULT NULL,
  `estrato` varchar(10) NOT NULL,
  `ojos` varchar(45) DEFAULT NULL,
  `condicion` varchar(45) DEFAULT NULL,
  `descedencia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantel_educativo`
--

CREATE TABLE `plantel_educativo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `codigo_snies` varchar(45) NOT NULL,
  `num_semestres` int(11) NOT NULL,
  `num_creditos` int(11) NOT NULL,
  `nivel_academico` varchar(45) DEFAULT NULL,
  `plantel_educativo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_registro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos_perfiles`
--

CREATE TABLE `recursos_perfiles` (
  `recursos_id` int(11) NOT NULL,
  `perfiles_id` int(11) NOT NULL,
  `consultar` timestamp(2) NULL DEFAULT NULL,
  `agregar` timestamp(2) NULL DEFAULT NULL,
  `editar` timestamp(2) NULL DEFAULT NULL,
  `eliminar` timestamp(2) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfiles`
--

CREATE TABLE `usuarios_perfiles` (
  `usuarios_id` int(11) NOT NULL,
  `perfiles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto_estudiante`
--
ALTER TABLE `contacto_estudiante`
  ADD PRIMARY KEY (`contacto_id`,`estudiante_id`),
  ADD KEY `fk_contacto_has_estudiante_estudiante1_idx` (`estudiante_id`),
  ADD KEY `fk_contacto_has_estudiante_contacto_idx` (`contacto_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD KEY `fk_estudiante_programa1_idx` (`programa_id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantel_educativo`
--
ALTER TABLE `plantel_educativo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `codigo_snies_UNIQUE` (`codigo_snies`),
  ADD KEY `fk_programa_plantel_educativo1_idx` (`plantel_educativo_id`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recursos_perfiles`
--
ALTER TABLE `recursos_perfiles`
  ADD PRIMARY KEY (`recursos_id`,`perfiles_id`),
  ADD KEY `fk_recursos_has_perfiles_perfiles1_idx` (`perfiles_id`),
  ADD KEY `fk_recursos_has_perfiles_recursos1_idx` (`recursos_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD PRIMARY KEY (`usuarios_id`,`perfiles_id`),
  ADD KEY `fk_usuarios_has_perfiles_perfiles1_idx` (`perfiles_id`),
  ADD KEY `fk_usuarios_has_perfiles_usuarios1_idx` (`usuarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `plantel_educativo`
--
ALTER TABLE `plantel_educativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto_estudiante`
--
ALTER TABLE `contacto_estudiante`
  ADD CONSTRAINT `fk_contacto_has_estudiante_contacto` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contacto_has_estudiante_estudiante1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_estudiante_programa1` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `fk_programa_plantel_educativo1` FOREIGN KEY (`plantel_educativo_id`) REFERENCES `plantel_educativo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recursos_perfiles`
--
ALTER TABLE `recursos_perfiles`
  ADD CONSTRAINT `fk_recursos_has_perfiles_perfiles1` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recursos_has_perfiles_recursos1` FOREIGN KEY (`recursos_id`) REFERENCES `recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD CONSTRAINT `fk_usuarios_has_perfiles_perfiles1` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_perfiles_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
