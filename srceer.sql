-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2017 a las 17:07:42
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `documento` varchar(60) NOT NULL,
  `primer_nombre` varchar(60) NOT NULL,
  `segundo_nombre` varchar(60) NOT NULL,
  `primer_apellido` varchar(60) NOT NULL,
  `segundo_apellido` varchar(60) NOT NULL,
  `cel_contacto` varchar(45) NOT NULL,
  `tel_contacto` varchar(45) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `fecha_naci` date NOT NULL,
  `lugar_naci` varchar(80) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `estrato` varchar(10) NOT NULL,
  `desplazado` varchar(45) NOT NULL,
  `afrodescendiente` varchar(45) NOT NULL,
  `ojos` varchar(45) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `fecha_registro` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `documento`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cel_contacto`, `tel_contacto`, `email`, `fecha_naci`, `lugar_naci`, `direccion`, `municipio`, `estrato`, `desplazado`, `afrodescendiente`, `ojos`, `genero`, `fecha_registro`) VALUES
(1, '79878', 'ccccccccccc', 'ccccc', 'cccccccccccccccc', 'ccc', '78787', '46546', 'cris@hotmail.com', '2017-07-04', 'ccccc', 'cccccccc', 'pereira', '1', 'no', 'no', 'negros', 'masculino', 2017),
(2, '1088264375', 'Cristhian', 'Alexis', 'Galeano', 'Ruiz', '3117767484', '34062343', 'titiruizah@gmail.com', '2017-07-05', 'Cuba', 'Cra28b #74-111', 'santa rosa', '2', 'no', 'no', 'negros', 'masculino', 2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `fecha_registro`) VALUES
(1, 'Super usuario', '2017-06-20 00:00:00'),
(2, 'Usuario estandar', '2017-06-20 00:00:00'),
(3, 'Usuario externo', '2017-06-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planteles_educativos`
--

CREATE TABLE `planteles_educativos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planteles_educativos`
--

INSERT INTO `planteles_educativos` (`id`, `nombre`, `codigo`, `telefono`, `municipio`, `email`, `direccion`) VALUES
(1, 'Universidad Catolica de Pereira', '7879', '312400', 'pereira', 'ucp@ucp.edu.co', 'Av las americas'),
(2, 'Universidad Tecnologica de pereira', '123465', '465465', 'pereira', 'utp@utp.co', 'lkjjh');

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
  `nivel_academico` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `codigo_snies`, `num_semestres`, `num_creditos`, `nivel_academico`) VALUES
(1, 'jjj', 'jjj', 0, 0, 'jj'),
(3, 'trytr', 'ytrytr', 0, 0, 'yrtytr'),
(4, 'trhtr', 'hrt', 0, 0, 'hrth'),
(5, 'Tecnologia en Desarrollo de Software', '13121', 6, 48, 'Tecnologia'),
(6, 'fsdfsd', 'gfdsgdf', 0, 0, 'gds');

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
  `nombre_completo` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `username`, `password`, `email`, `fecha_registro`) VALUES
(21, 'Estefania morales', 'nia', '456', 'niafabio@hotmail.com', NULL),
(22, 'Luisa Fernanda', 'LuisaF', '456', 'luisagjack@gmail.com', NULL),
(23, 'admin', 'admin', '123', 'admin@servicio.com', '2017-06-28 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfiles`
--

CREATE TABLE `usuarios_perfiles` (
  `usuarios_id` int(11) NOT NULL,
  `perfiles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_perfiles`
--

INSERT INTO `usuarios_perfiles` (`usuarios_id`, `perfiles_id`) VALUES
(21, 2),
(22, 2),
(23, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planteles_educativos`
--
ALTER TABLE `planteles_educativos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `codigo_snies_UNIQUE` (`codigo_snies`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `planteles_educativos`
--
ALTER TABLE `planteles_educativos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
