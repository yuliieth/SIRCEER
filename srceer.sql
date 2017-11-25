-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2017 a las 04:41:55
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
-- Estructura de tabla para la tabla `alianza`
--

CREATE TABLE `alianza` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` varchar(45) DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alianza`
--

INSERT INTO `alianza` (`id`, `nombre`, `fecha_inicio`, `fecha_final`, `cupos`) VALUES
(1, 'SENA-UCP', '2017-11-07', '2017-11-30', 252),
(3, 'CIAF-UCP', '2017-11-06', '2017-11-07', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alianzas_instituciones`
--

CREATE TABLE `alianzas_instituciones` (
  `id` int(11) NOT NULL,
  `alianza_id` int(11) NOT NULL,
  `institucion_id` int(11) NOT NULL,
  `fecha_vinculacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alianzas_instituciones`
--

INSERT INTO `alianzas_instituciones` (`id`, `alianza_id`, `institucion_id`, `fecha_vinculacion`) VALUES
(1, 1, 1, '2017-11-05'),
(2, 1, 2, '2017-11-05'),
(4, 3, 1, '2017-11-05'),
(5, 3, 2, '2017-11-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'Risaralda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `documento` varchar(60) NOT NULL,
  `tipo_documento_id` int(11) NOT NULL,
  `tipo_sangre_id` int(11) NOT NULL,
  `primer_nombre` varchar(60) NOT NULL,
  `segundo_nombre` varchar(45) NOT NULL,
  `primer_apellido` varchar(60) NOT NULL,
  `segundo_apellido` varchar(45) NOT NULL,
  `tel_contacto` varchar(45) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `fecha_naci` date NOT NULL,
  `edad` int(11) NOT NULL,
  `municipio_naci_id` int(11) NOT NULL,
  `direccion_residencia` varchar(45) DEFAULT NULL,
  `barrio_residencia` varchar(45) DEFAULT NULL,
  `municipio_resi_id` int(11) NOT NULL,
  `estrato` varchar(10) NOT NULL,
  `zona` varchar(12) DEFAULT NULL,
  `EPS` varchar(45) DEFAULT NULL,
  `desplazado` varchar(45) NOT NULL,
  `afrodescendiente` varchar(45) NOT NULL,
  `ojos` varchar(45) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `victima_conflicto` varchar(4) NOT NULL,
  `discapacidades` varchar(255) DEFAULT NULL,
  `situacion_periodo_anterior` varchar(45) DEFAULT NULL,
  `grado` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_registro` datetime(6) NOT NULL,
  `fecha_cambio_estado` date DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`documento`, `tipo_documento_id`, `tipo_sangre_id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tel_contacto`, `email`, `fecha_naci`, `edad`, `municipio_naci_id`, `direccion_residencia`, `barrio_residencia`, `municipio_resi_id`, `estrato`, `zona`, `EPS`, `desplazado`, `afrodescendiente`, `ojos`, `genero`, `victima_conflicto`, `discapacidades`, `situacion_periodo_anterior`, `grado`, `estado`, `fecha_registro`, `fecha_cambio_estado`, `observaciones`) VALUES
('1088264375', 1, 1, 'Cristhian', 'Alexis', 'Galeano', 'Ruiz', '3117767484', 'niafabio@hotmail.com', '2017-11-06', 28, 1, 'Cra 28 # 74 -111', 'Cuba', 1, '2', 'Rural', 'Sisben', 'Si', 'No', 'Negros', 'F', 'No', 'Ninguna', 'Matriculado', '12', 1, '2017-08-01 00:00:00.000000', '2017-08-01', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_semestral`
--

CREATE TABLE `evaluacion_semestral` (
  `id` int(11) NOT NULL,
  `nota` double NOT NULL,
  `estudiante_documento` varchar(60) NOT NULL,
  `semestre_id` int(11) NOT NULL,
  `programa_snies` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion_semestral`
--

INSERT INTO `evaluacion_semestral` (`id`, `nota`, `estudiante_documento`, `semestre_id`, `programa_snies`) VALUES
(1, 3.5, '1088264375', 1, '123');

--
-- Disparadores `evaluacion_semestral`
--
DELIMITER $$
CREATE TRIGGER `evaluacion_semestral_AFTER_DELETE` AFTER DELETE ON `evaluacion_semestral` FOR EACH ROW BEGIN 
DELETE FROM estudiante WHERE documento=OLD.estudiante_documento;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id`, `nombre`, `telefono`, `email`, `direccion`) VALUES
(1, 'UCP', '3406243', 'ucp@ucp.edu.co', 'Av La independencÃ­a'),
(2, 'SENA', '3265487', 'sena@sena.co', 'Cra 8 # 19-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_municipio`
--

CREATE TABLE `institucion_municipio` (
  `institucion_id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion_municipio`
--

INSERT INTO `institucion_municipio` (`institucion_id`, `municipio_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'Pereira', 1),
(2, 'Dosquebradas', 1),
(3, 'Belen', 1),
(4, 'Apia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_academico`
--

CREATE TABLE `nivel_academico` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_academico`
--

INSERT INTO `nivel_academico` (`id`, `tipo`) VALUES
(3, 'Ingenieria'),
(1, 'Tecnico'),
(2, 'Tecnologia');

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
(1, 'superusuario', '2017-11-24 00:00:00'),
(2, 'estandar', '2017-11-24 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `snies` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `num_semestres` int(11) NOT NULL,
  `num_creditos` int(11) NOT NULL,
  `nivel_academico_id` int(11) NOT NULL,
  `institucion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`snies`, `nombre`, `num_semestres`, `num_creditos`, `nivel_academico_id`, `institucion_id`) VALUES
('123', 'TecnologÃ­a en Desarrollo de Software', 7, 25, 1, 1),
('456', 'Tecnico Desarrollo Movil', 3, 12, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos_perfiles`
--

CREATE TABLE `recursos_perfiles` (
  `recursos_id` int(11) NOT NULL,
  `consultar` timestamp(2) NULL DEFAULT NULL,
  `agregar` timestamp(2) NULL DEFAULT NULL,
  `editar` timestamp(2) NULL DEFAULT NULL,
  `eliminar` timestamp(2) NULL DEFAULT NULL,
  `perfiles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `periodo` varchar(45) NOT NULL,
  `promedio_anterior` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id`, `periodo`, `promedio_anterior`) VALUES
(1, '2017-2', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `tipo`) VALUES
(1, 'Cedula'),
(2, 'Registro Civil'),
(3, 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sangre`
--

CREATE TABLE `tipo_sangre` (
  `id` int(11) NOT NULL,
  `tipo` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_sangre`
--

INSERT INTO `tipo_sangre` (`id`, `tipo`) VALUES
(1, 'A+'),
(2, 'A-');

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
  `fecha_registro` timestamp(2) NOT NULL DEFAULT CURRENT_TIMESTAMP(2) ON UPDATE CURRENT_TIMESTAMP(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `username`, `password`, `email`, `fecha_registro`) VALUES
(1, 'Cristhian Alexis Galeano Ruiz', 'cristhian', '123', 'titiruizah@gmail.com', '0000-00-00 00:00:00.00'),
(2, 'Yuliet Gomez', 'yuliet', '123', 'yuliet@ucp.edu.co', '0000-00-00 00:00:00.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfiles`
--

CREATE TABLE `usuarios_perfiles` (
  `id` int(11) NOT NULL,
  `perfiles_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_perfiles`
--

INSERT INTO `usuarios_perfiles` (`id`, `perfiles_id`, `usuarios_id`) VALUES
(1, 1, 1),
(2, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alianza`
--
ALTER TABLE `alianza`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `alianzas_instituciones`
--
ALTER TABLE `alianzas_instituciones`
  ADD PRIMARY KEY (`id`,`alianza_id`,`institucion_id`),
  ADD KEY `fk_alianza_has_institucion_institucion1_idx` (`institucion_id`),
  ADD KEY `fk_alianza_has_institucion_alianza1_idx` (`alianza_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD KEY `fk_estudiante_tipo_documento1_idx` (`tipo_documento_id`),
  ADD KEY `fk_estudiante_tipo_sangre1_idx` (`tipo_sangre_id`),
  ADD KEY `fk_estudiante_municipio1_idx` (`municipio_resi_id`),
  ADD KEY `fk_estudiante_municipio2_idx` (`municipio_naci_id`);

--
-- Indices de la tabla `evaluacion_semestral`
--
ALTER TABLE `evaluacion_semestral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evaluacion_semestral_estudiante1_idx` (`estudiante_documento`),
  ADD KEY `fk_evaluacion_semestral_semestre1_idx` (`semestre_id`),
  ADD KEY `fk_evaluacion_semestral_programa1_idx` (`programa_snies`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `institucion_municipio`
--
ALTER TABLE `institucion_municipio`
  ADD KEY `fk_institucion_municipio_institucion1_idx` (`institucion_id`),
  ADD KEY `fk_institucion_municipio_municipio1_idx` (`municipio_id`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_municipio_departamento1_idx` (`departamento_id`);

--
-- Indices de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_UNIQUE` (`tipo`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`snies`),
  ADD UNIQUE KEY `codigo_snies_UNIQUE` (`snies`),
  ADD KEY `fk_programa_nivel_academico2_idx` (`nivel_academico_id`),
  ADD KEY `fk_programa_institucion2_idx` (`institucion_id`);

--
-- Indices de la tabla `recursos_perfiles`
--
ALTER TABLE `recursos_perfiles`
  ADD PRIMARY KEY (`recursos_id`),
  ADD KEY `fk_recursos_perfiles_perfiles1_idx` (`perfiles_id`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_sangre`
--
ALTER TABLE `tipo_sangre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indices de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_usuarios_perfiles_perfiles1_idx` (`perfiles_id`),
  ADD KEY `fk_usuarios_perfiles_usuarios1_idx` (`usuarios_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alianza`
--
ALTER TABLE `alianza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `alianzas_instituciones`
--
ALTER TABLE `alianzas_instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evaluacion_semestral`
--
ALTER TABLE `evaluacion_semestral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_sangre`
--
ALTER TABLE `tipo_sangre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alianzas_instituciones`
--
ALTER TABLE `alianzas_instituciones`
  ADD CONSTRAINT `fk_alianza_has_institucion_alianza1` FOREIGN KEY (`alianza_id`) REFERENCES `alianza` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alianza_has_institucion_institucion1` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_estudiante_municipio1` FOREIGN KEY (`municipio_resi_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_municipio2` FOREIGN KEY (`municipio_naci_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_tipo_documento1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiante_tipo_sangre1` FOREIGN KEY (`tipo_sangre_id`) REFERENCES `tipo_sangre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacion_semestral`
--
ALTER TABLE `evaluacion_semestral`
  ADD CONSTRAINT `fk_evaluacion_semestral_estudiante1` FOREIGN KEY (`estudiante_documento`) REFERENCES `estudiante` (`documento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_semestral_programa1` FOREIGN KEY (`programa_snies`) REFERENCES `programa` (`snies`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_semestral_semestre1` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `institucion_municipio`
--
ALTER TABLE `institucion_municipio`
  ADD CONSTRAINT `fk_institucion_municipio_institucion1` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_institucion_municipio_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_departamento1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `fk_programa_institucion2` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_programa_nivel_academico2` FOREIGN KEY (`nivel_academico_id`) REFERENCES `nivel_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recursos_perfiles`
--
ALTER TABLE `recursos_perfiles`
  ADD CONSTRAINT `fk_recursos_perfiles_perfiles1` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD CONSTRAINT `fk_usuarios_perfiles_perfiles1` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_perfiles_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
