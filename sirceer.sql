-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2018 a las 18:28:23
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sirceer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alianzas`
--

CREATE TABLE `alianzas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL COMMENT 'Nombre distintico de la alianza',
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `cupos` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alianzas`
--

INSERT INTO `alianzas` (`id`, `nombre`, `fecha_inicio`, `fecha_final`, `cupos`) VALUES
(1, 'NO APLICA', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_ojos`
--

CREATE TABLE `color_ojos` (
  `id` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `color_ojos`
--

INSERT INTO `color_ojos` (`id`, `color`) VALUES
(4, 'CAFES'),
(2, 'NEGROS'),
(1, 'NO APLICA'),
(3, 'VERDES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL COMMENT 'Nombre deldepartamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'RISARALDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidades`
--

CREATE TABLE `discapacidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL COMMENT 'Sordo\r\nSordo-mudo\r\nCiego\r\n',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `discapacidades`
--

INSERT INTO `discapacidades` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', 'SIN RELACION'),
(2, 'SORDERA', 'PERSONA CON DIFICULTADES AUDITIVAS'),
(3, 'CEGUERA', 'PERSONA CON DIFICULTADES VISUALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL COMMENT 'Clave primaria , auto-incrementable od Estados',
  `nombre` varchar(50) NOT NULL COMMENT 'Estado de la entidad:\r\nActivo\r\nInactivo',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descricion del estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `nombre`, `descripcion`) VALUES
(1, 'ACTIVO', 'CON PERMISO'),
(2, 'INACTIVO', 'SIN PERMISO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estrato`
--

CREATE TABLE `estrato` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL COMMENT 'Estrato socio economico del estudiante',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descripcion del estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estrato`
--

INSERT INTO `estrato` (`id`, `nombre`, `descripcion`) VALUES
(1, 'ESTRATO 1', NULL),
(2, 'ESTRATO 2', NULL),
(3, 'ESTRATO 3', NULL),
(4, 'ESTRATO 4', NULL),
(5, 'ESTRATO 5', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL COMMENT 'Incrementable, no key',
  `documento` varchar(12) NOT NULL COMMENT 'Numero de documento del estudiante e identificacion',
  `primer_nombre` varchar(15) NOT NULL COMMENT 'Primer nombre del estudiante',
  `segundo_nombre` varchar(15) DEFAULT NULL COMMENT 'Segundo nombre',
  `primer_apellido` varchar(15) NOT NULL COMMENT 'Apellido paterno',
  `segundo_apellido` varchar(20) DEFAULT NULL COMMENT 'Apelllido materno',
  `telefono_contacto` varchar(14) DEFAULT NULL COMMENT 'Telefono de contacto',
  `email` varchar(100) DEFAULT NULL COMMENT 'Correo electronico del estudainte',
  `fecha_nacimiento` datetime DEFAULT NULL COMMENT 'Fecha de nacimiento',
  `edad` varchar(3) DEFAULT NULL,
  `direccion_residencia` varchar(50) DEFAULT NULL,
  `EPS` varchar(100) DEFAULT NULL COMMENT 'Entidad de salud del estudiante',
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `observacion` text COMMENT 'OPcional',
  `tipo_documento_id` int(11) NOT NULL COMMENT 'Relacoin tipo_documento->estudiantes',
  `tipo_sangre_id` int(11) NOT NULL,
  `zona_id` int(11) NOT NULL,
  `tipo_poblaion_id` int(11) NOT NULL,
  `estrato_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL COMMENT 'Relacion genero->estudiante',
  `ojos_id` int(11) NOT NULL,
  `situacion_academica_id` int(11) NOT NULL,
  `situacion_social_id` int(11) NOT NULL COMMENT 'Rlacion SituacionSocial->estudiante',
  `grado_id` int(11) NOT NULL,
  `fuenterecurso_id` int(11) NOT NULL,
  `internado_id` int(11) NOT NULL,
  `discapacidad_id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL COMMENT 'Municipio',
  `sede_id` int(11) NOT NULL COMMENT 'Sede a la que pertenece el estudiante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_serviciosocial`
--

CREATE TABLE `estudiante_serviciosocial` (
  `id` int(11) NOT NULL,
  `estudiante_serviciosocial_id` int(11) NOT NULL COMMENT 'Incrementable, no key',
  `servicio_social_id` int(11) NOT NULL COMMENT 'Relacion: Servicio_social->estudiante_sercviciosocial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente_recursos`
--

CREATE TABLE `fuente_recursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL COMMENT 'SGP\r\nNO APLICA\r\n',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fuente_recursos`
--

INSERT INTO `fuente_recursos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', 'SIN RELACION'),
(2, 'SGP', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL COMMENT 'Sexo del estudiante',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descrpcion del genero'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'MASCULINO', NULL),
(2, 'FEMENINO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descripcion del grado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`, `descripcion`) VALUES
(1, '8', NULL),
(2, '9', NULL),
(3, '10', NULL),
(4, '11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_academico_semestre`
--

CREATE TABLE `historial_academico_semestre` (
  `id` int(11) NOT NULL,
  `promedio` double(3,2) DEFAULT NULL,
  `anio` varchar(4) NOT NULL,
  `fecha_modificaion` datetime NOT NULL,
  `estado` varchar(50) NOT NULL COMMENT 'El estado del semestre si al final el estudiante aprueba o no:\r\nAprobado\r\nReprobado',
  `matricula_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL COMMENT 'Id colegio',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del colegio',
  `telefono` varchar(12) DEFAULT NULL,
  `siglas` varchar(50) DEFAULT NULL COMMENT 'Siglas del nombre del colegio',
  `calendario` varchar(2) NOT NULL COMMENT 'Calendario al que pertence la institucion\r\n',
  `DANE` varchar(50) NOT NULL COMMENT 'Codigo dane',
  `sector_id` int(11) NOT NULL COMMENT 'Id de sectores',
  `municipio_id` int(11) NOT NULL COMMENT 'El colegio pertenece a  un municipio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id`, `nombre`, `telefono`, `siglas`, `calendario`, `DANE`, `sector_id`, `municipio_id`) VALUES
(1, 'NO APLICA', NULL, NULL, ' ', ' ', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `internado`
--

CREATE TABLE `internado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL COMMENT 'Ninguno',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `internado`
--

INSERT INTO `internado` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', ''),
(2, 'NINGUNO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'Jornada: Mañana, tarde y noche',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', 'SIN RELACIÓN'),
(2, 'MAÑANA', ''),
(3, 'TARDE', ''),
(4, 'NOCHE', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL COMMENT 'Fecha en la que se matricula en el programa',
  `estudiante_id` int(11) NOT NULL COMMENT 'Incrementable, no key',
  `programa_id` int(11) NOT NULL COMMENT 'Relacion programa->matricula'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'EDUCACIÓN TRADICIONAL\r\nSAT PRESENCIAL\r\nPOST PRIMARIA\r\n',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA\r\n', ''),
(2, 'EDUCACIÓN TRADICIONAL\r\n', ''),
(3, 'SAT PRESENCIAL\r\n', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de la ciudad',
  `departamentos_id` int(11) NOT NULL COMMENT 'Relacion departamentos->ciudades'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`, `departamentos_id`) VALUES
(1, 'NO APLICA', 1),
(2, 'APÍA', 1),
(3, 'BALBOA', 1),
(4, 'BELÉN DE UMBRÍA', 1),
(5, 'DOSQUEBRADAS', 1),
(6, 'GUÁTICA', 1),
(7, 'LA CELIA', 1),
(8, 'LA VIRGINIA', 1),
(9, 'MARSELLA', 1),
(10, 'MISTRATÓ', 1),
(11, 'PEREIRA', 1),
(12, 'PUEBLO RICO', 1),
(13, 'QUINCHIA', 1),
(14, 'SANTA ROSA DE CABAL', 1),
(15, 'SANTUARIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_academico`
--

CREATE TABLE `nivel_academico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripcion del nivel academico del programa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_academico`
--

INSERT INTO `nivel_academico` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', 'SIN REGISTRO'),
(2, 'TÉCNICO', ''),
(3, 'TECNOLOGÍA', ''),
(4, 'INGENIERÍA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `snies` varchar(30) NOT NULL COMMENT 'Codigo representativo de la institucion superior',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre del programa',
  `cantidad_semestre` varchar(10) DEFAULT NULL COMMENT 'Numero de semestre que contiene el programa',
  `costo_semestre` double(10,6) DEFAULT NULL COMMENT 'Valor por semestre',
  `nivel_academico_id` int(11) NOT NULL,
  `universidad_id` int(11) NOT NULL,
  `jornada_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'ADMINISTRADOR', 'Administrador del programa', 1),
(2, 'REGULAR', 'Usuario del programa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_opciones`
--

CREATE TABLE `roles_opciones` (
  `id` int(11) NOT NULL,
  `opcion` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles_opciones`
--

INSERT INTO `roles_opciones` (`id`, `opcion`, `estado`, `rol_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 1, 1, 2),
(4, 2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id` int(11) NOT NULL COMMENT 'Id de sectores',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del sector:\r\nOficial, No oficial',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descripcion del sector'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id`, `nombre`, `descripcion`) VALUES
(1, 'OFICIAL', ''),
(2, 'NO OFICIAL', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre de la sede ',
  `codigo_dane_sede` varchar(50) NOT NULL COMMENT 'Codifo de la sede sera igual al de la institucion',
  `consecutivo` varchar(100) NOT NULL,
  `zona_id` int(11) NOT NULL COMMENT 'Zona rural o urbana de la sede',
  `modelo_id` int(11) NOT NULL COMMENT 'Modelo de la sede',
  `institucion_id` int(11) NOT NULL COMMENT 'Institucion a la que pertenece la sede',
  `municipio_id` int(11) NOT NULL COMMENT 'Municipio de la sede',
  `alianza_id` int(11) NOT NULL COMMENT 'Peretenece a una alianza'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `codigo_dane_sede`, `consecutivo`, `zona_id`, `modelo_id`, `institucion_id`, `municipio_id`, `alianza_id`) VALUES
(1, 'NO APLICA', ' ', ' ', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `semestre` int(5) NOT NULL COMMENT 'Semestre actual',
  `periodo` varchar(2) NOT NULL COMMENT 'Bisemestre del año'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_sociales`
--

CREATE TABLE `servicios_sociales` (
  `id` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL COMMENT 'Estado del servicio social: Aprobado- no aprovado',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios_sociales`
--

INSERT INTO `servicios_sociales` (`id`, `estado`, `descripcion`) VALUES
(1, 'NO APLICA', ''),
(2, 'APROBADO', ''),
(3, 'EN CURSO', ''),
(4, 'NO APROBADO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones_academicas`
--

CREATE TABLE `situaciones_academicas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `situaciones_academicas`
--

INSERT INTO `situaciones_academicas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'MATRICULADO', ''),
(2, 'SUSPENDIDO', ''),
(3, 'CANCELADO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciones_sociales`
--

CREATE TABLE `situaciones_sociales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre descriptivo de la situacion social: Desplazado, extrema pobresa, victima del conflicto etc',
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `situaciones_sociales`
--

INSERT INTO `situaciones_sociales` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', 'SIN RELACION'),
(2, 'DESPLAZADO', 'PERSONAS QUE DEJARON SUS LUGARES DE ORIGEN POR ALGUNO RAZON'),
(3, 'EXTREMA POBREZA', 'PERSONAS DE BAJOS RECURSOS'),
(4, 'VICTIMAS DEL CONFLICTO', 'PERSONA AFRECTAS POR LA VIOLENCIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documento`
--

CREATE TABLE `tipos_documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'Tipo de documento',
  `descripcion` varchar(255) NOT NULL COMMENT 'Descripcion del tipo de documento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_documento`
--

INSERT INTO `tipos_documento` (`id`, `nombre`, `descripcion`) VALUES
(1, 'TI:TARJETA DE IDENTIDAD', 'MENOR DE EDAD'),
(2, 'CC:CEDULA DE CIUDADANIA', 'MAYOR DE EDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_poblacion`
--

CREATE TABLE `tipos_poblacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_poblacion`
--

INSERT INTO `tipos_poblacion` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', 'SIN RELACION'),
(2, 'INDIGENA', 'PERTENECIENTES A ETNIAS'),
(3, 'AFRODESCENDIENTES', 'PERSONAS MULATAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_sangre`
--

CREATE TABLE `tipos_sangre` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL COMMENT 'El tipo de sangre',
  `descripcion` varchar(255) DEFAULT NULL COMMENT 'Descipcion del tipo de sangre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_sangre`
--

INSERT INTO `tipos_sangre` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', NULL),
(2, 'A+', NULL),
(3, 'A-', NULL),
(4, 'O+', NULL),
(5, 'O-', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

CREATE TABLE `universidades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL COMMENT 'Direccion de la institucion',
  `ciudad_id` int(11) NOT NULL COMMENT 'Ciudad de la institucion',
  `alianza_id` int(11) NOT NULL COMMENT 'Alianza'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `universidades`
--

INSERT INTO `universidades` (`id`, `nombre`, `telefono`, `email`, `direccion`, `ciudad_id`, `alianza_id`) VALUES
(1, 'NO APLICA', 'NO APLICA', 'NO APLICA', 'NO APLICA', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(100) NOT NULL COMMENT 'Contraseña asignada al usuario',
  `fecha_ingreso` date NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL COMMENT 'Clave primaria , auto-incrementable of Estados'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `clave`, `fecha_ingreso`, `rol_id`, `estado_id`) VALUES
(1, 'admin', '123', '2018-04-21', 1, 1),
(2, 'invitado', '123', '2018-04-21', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'NO APLICA', 'SIN RELACION'),
(2, 'URBANA', 'METROPOLI'),
(3, 'RURAL', 'GRANJAS Y EXTENSIONES DE TIERRA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alianzas`
--
ALTER TABLE `alianzas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `un_alianza_nombre` (`nombre`);

--
-- Indices de la tabla `color_ojos`
--
ALTER TABLE `color_ojos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ojos_color_` (`color`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_departamento` (`nombre`);

--
-- Indices de la tabla `discapacidades`
--
ALTER TABLE `discapacidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_discapacidades_nombre` (`nombre`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_estados_nombre` (`nombre`);

--
-- Indices de la tabla `estrato`
--
ALTER TABLE `estrato`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_estratos_nombre` (`nombre`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ojos_id` (`ojos_id`),
  ADD KEY `discapacidad_id` (`discapacidad_id`),
  ADD KEY `estrato_id` (`estrato_id`),
  ADD KEY `fuenterecurso_id` (`fuenterecurso_id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `grado_id` (`grado_id`),
  ADD KEY `internado_id` (`internado_id`),
  ADD KEY `municipio_id` (`municipio_id`),
  ADD KEY `sede_id` (`sede_id`),
  ADD KEY `situacion_academica_id` (`situacion_academica_id`),
  ADD KEY `situacion_social_id` (`situacion_social_id`),
  ADD KEY `tipo_documento_id` (`tipo_documento_id`),
  ADD KEY `tipo_poblaion_id` (`tipo_poblaion_id`),
  ADD KEY `tipo_sangre_id` (`tipo_sangre_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indices de la tabla `estudiante_serviciosocial`
--
ALTER TABLE `estudiante_serviciosocial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_serviciosocial_id` (`estudiante_serviciosocial_id`),
  ADD KEY `servicio_social_id` (`servicio_social_id`);

--
-- Indices de la tabla `fuente_recursos`
--
ALTER TABLE `fuente_recursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_generos_nombre` (`nombre`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_grados_nombre` (`nombre`);

--
-- Indices de la tabla `historial_academico_semestre`
--
ALTER TABLE `historial_academico_semestre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula_id` (`matricula_id`),
  ADD KEY `semestre_id` (`semestre_id`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_colegio_nombre` (`nombre`),
  ADD UNIQUE KEY `unq_dane_colegios` (`DANE`),
  ADD UNIQUE KEY `unq_colegio_telefono` (`telefono`),
  ADD KEY `municipio_id` (`municipio_id`),
  ADD KEY `sector_id` (`sector_id`);

--
-- Indices de la tabla `internado`
--
ALTER TABLE `internado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_jornadas_nombre` (`nombre`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `programa_id` (`programa_id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_modelos_nombre` (`nombre`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_ciudades_nombre` (`nombre`),
  ADD KEY `departamentos_id` (`departamentos_id`);

--
-- Indices de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_nivel_academico_nombre` (`nombre`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_programa_snies` (`snies`),
  ADD KEY `jornada_id` (`jornada_id`),
  ADD KEY `nivel_academico_id` (`nivel_academico_id`),
  ADD KEY `universidad_id` (`universidad_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_roles_codigo` (`nombre`);

--
-- Indices de la tabla `roles_opciones`
--
ALTER TABLE `roles_opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_nombre_sectores` (`nombre`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_sedes_nombre` (`nombre`),
  ADD KEY `alianza_id` (`alianza_id`),
  ADD KEY `institucion_id` (`institucion_id`),
  ADD KEY `modelo_id` (`modelo_id`),
  ADD KEY `municipio_id` (`municipio_id`),
  ADD KEY `zona_id` (`zona_id`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_sociales`
--
ALTER TABLE `servicios_sociales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_servicios_sociales_estado` (`estado`);

--
-- Indices de la tabla `situaciones_academicas`
--
ALTER TABLE `situaciones_academicas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_situaciones_academicas_nombre` (`nombre`);

--
-- Indices de la tabla `situaciones_sociales`
--
ALTER TABLE `situaciones_sociales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_tipo_doc_nombre` (`nombre`);

--
-- Indices de la tabla `tipos_poblacion`
--
ALTER TABLE `tipos_poblacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_tipos_poblacion_nombre` (`nombre`);

--
-- Indices de la tabla `tipos_sangre`
--
ALTER TABLE `tipos_sangre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_tipo_sangre_nombre` (`nombre`);

--
-- Indices de la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_institucion_nombre` (`nombre`),
  ADD UNIQUE KEY `unq_institucion_email` (`email`),
  ADD UNIQUE KEY `unq_institucion_direccion` (`direccion`),
  ADD KEY `alianza_id` (`alianza_id`),
  ADD KEY `ciudad_id` (`ciudad_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_usuarios_codigo` (`nombre`),
  ADD KEY `estado_id` (`estado_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_zonas_nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alianzas`
--
ALTER TABLE `alianzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `color_ojos`
--
ALTER TABLE `color_ojos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `discapacidades`
--
ALTER TABLE `discapacidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria , auto-incrementable od Estados', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estrato`
--
ALTER TABLE `estrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Incrementable, no key';
--
-- AUTO_INCREMENT de la tabla `estudiante_serviciosocial`
--
ALTER TABLE `estudiante_serviciosocial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `fuente_recursos`
--
ALTER TABLE `fuente_recursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `historial_academico_semestre`
--
ALTER TABLE `historial_academico_semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id colegio', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `internado`
--
ALTER TABLE `internado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `nivel_academico`
--
ALTER TABLE `nivel_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `roles_opciones`
--
ALTER TABLE `roles_opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de sectores', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicios_sociales`
--
ALTER TABLE `servicios_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `situaciones_academicas`
--
ALTER TABLE `situaciones_academicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `situaciones_sociales`
--
ALTER TABLE `situaciones_sociales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos_poblacion`
--
ALTER TABLE `tipos_poblacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipos_sangre`
--
ALTER TABLE `tipos_sangre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `universidades`
--
ALTER TABLE `universidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`ojos_id`) REFERENCES `color_ojos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_10` FOREIGN KEY (`situacion_academica_id`) REFERENCES `situaciones_academicas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_11` FOREIGN KEY (`situacion_social_id`) REFERENCES `situaciones_sociales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_12` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipos_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_13` FOREIGN KEY (`tipo_poblaion_id`) REFERENCES `tipos_poblacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_14` FOREIGN KEY (`tipo_sangre_id`) REFERENCES `tipos_sangre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_15` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`discapacidad_id`) REFERENCES `discapacidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`estrato_id`) REFERENCES `estrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_4` FOREIGN KEY (`fuenterecurso_id`) REFERENCES `fuente_recursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_5` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_6` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_7` FOREIGN KEY (`internado_id`) REFERENCES `internado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_8` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiantes_ibfk_9` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante_serviciosocial`
--
ALTER TABLE `estudiante_serviciosocial`
  ADD CONSTRAINT `estudiante_serviciosocial_ibfk_1` FOREIGN KEY (`estudiante_serviciosocial_id`) REFERENCES `estudiantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiante_serviciosocial_ibfk_2` FOREIGN KEY (`servicio_social_id`) REFERENCES `servicios_sociales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial_academico_semestre`
--
ALTER TABLE `historial_academico_semestre`
  ADD CONSTRAINT `historial_academico_semestre_ibfk_1` FOREIGN KEY (`matricula_id`) REFERENCES `matricula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `historial_academico_semestre_ibfk_2` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD CONSTRAINT `instituciones_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `instituciones_ibfk_2` FOREIGN KEY (`sector_id`) REFERENCES `sectores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`programa_id`) REFERENCES `programas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`departamentos_id`) REFERENCES `departamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`jornada_id`) REFERENCES `jornadas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `programas_ibfk_2` FOREIGN KEY (`nivel_academico_id`) REFERENCES `nivel_academico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `programas_ibfk_3` FOREIGN KEY (`universidad_id`) REFERENCES `universidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roles_opciones`
--
ALTER TABLE `roles_opciones`
  ADD CONSTRAINT `roles_opciones_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD CONSTRAINT `sedes_ibfk_1` FOREIGN KEY (`alianza_id`) REFERENCES `alianzas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sedes_ibfk_2` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sedes_ibfk_3` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sedes_ibfk_4` FOREIGN KEY (`municipio_id`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sedes_ibfk_5` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `universidades`
--
ALTER TABLE `universidades`
  ADD CONSTRAINT `universidades_ibfk_1` FOREIGN KEY (`alianza_id`) REFERENCES `alianzas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `universidades_ibfk_2` FOREIGN KEY (`ciudad_id`) REFERENCES `municipios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
