-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2019 a las 18:25:40
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inti_sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `id_capacitacion` int(11) NOT NULL,
  `titulo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `asistentes` int(10) NOT NULL,
  `empresas` int(10) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `observaciones` text COLLATE latin1_spanish_ci NOT NULL,
  `titulo_capacitacion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_registro` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_tipo_capacitacion` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `rubro` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `actividad_principal` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha _registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_registro` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dedicaciones`
--

CREATE TABLE `dedicaciones` (
  `id_dedicacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dedicacion` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_registro` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indes`
--

CREATE TABLE `indes` (
  `id_indes` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `tema` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `observaciones` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_registro` int(11) NOT NULL,
  `id_tipo_indes` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indes_usuarios`
--

CREATE TABLE `indes_usuarios` (
  `id_usuario_registro` int(11) NOT NULL,
  `id_indes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `id_localidad` int(11) NOT NULL,
  `localidad` varchar(45) NOT NULL,
  `provincia` varchar(25) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `tema` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `titulo_modulo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicial` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `hora_fin` varchar(5) COLLATE latin1_spanish_ci NOT NULL,
  `observaciones` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_registro` int(11) NOT NULL,
  `id_localidad` int(11) NOT NULL,
  `id_capacitacion` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_usuarios`
--

CREATE TABLE `modulos_usuarios` (
  `id_modulo_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `titulo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `observaciones` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_registro` int(11) NOT NULL,
  `id_tipo_proyecto` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_capacitaciones`
--

CREATE TABLE `tipo_capacitaciones` (
  `id_tipo_capacitacion` int(11) NOT NULL,
  `tipo_capacitacion` varchar(45) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_indes`
--

CREATE TABLE `tipo_indes` (
  `id_tipo_indes` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyectos`
--

CREATE TABLE `tipo_proyectos` (
  `id_tipo_proyecto` int(11) NOT NULL,
  `tipo_proyecto` varchar(45) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_visitas`
--

CREATE TABLE `tipo_visitas` (
  `id_tipo_visita` int(11) NOT NULL,
  `tipo_visita` varchar(45) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `nodo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_rol` int(11) NOT NULL,
  `visible` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `observaciones` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario_registro` int(11) NOT NULL,
  `id_tipo_visita` int(11) NOT NULL,
  `id_proyecto` int(50) NOT NULL,
  `id_cliente` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita_usuario`
--

CREATE TABLE `visita_usuario` (
  `id_visita_usuario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD PRIMARY KEY (`id_capacitacion`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario_registro`),
  ADD KEY `id_tipo_capacitacion` (`id_tipo_capacitacion`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario_registro`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `dedicaciones`
--
ALTER TABLE `dedicaciones`
  ADD PRIMARY KEY (`id_dedicacion`),
  ADD KEY `id_usuario` (`id_usuario_registro`);

--
-- Indices de la tabla `indes`
--
ALTER TABLE `indes`
  ADD PRIMARY KEY (`id_indes`),
  ADD KEY `id_tipo_indes` (`id_tipo_indes`),
  ADD KEY `id_usuario_registro` (`id_usuario_registro`);

--
-- Indices de la tabla `indes_usuarios`
--
ALTER TABLE `indes_usuarios`
  ADD KEY `id_indes` (`id_indes`),
  ADD KEY `id_usuario` (`id_usuario_registro`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD PRIMARY KEY (`id_localidad`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `id_usuario` (`id_usuario_registro`),
  ADD KEY `id_capacitacion` (`id_capacitacion`),
  ADD KEY `id_localidad` (`id_localidad`);

--
-- Indices de la tabla `modulos_usuarios`
--
ALTER TABLE `modulos_usuarios`
  ADD PRIMARY KEY (`id_modulo_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario_registro`),
  ADD KEY `id_tipo_proyecto` (`id_tipo_proyecto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_capacitaciones`
--
ALTER TABLE `tipo_capacitaciones`
  ADD PRIMARY KEY (`id_tipo_capacitacion`);

--
-- Indices de la tabla `tipo_indes`
--
ALTER TABLE `tipo_indes`
  ADD PRIMARY KEY (`id_tipo_indes`);

--
-- Indices de la tabla `tipo_proyectos`
--
ALTER TABLE `tipo_proyectos`
  ADD PRIMARY KEY (`id_tipo_proyecto`);

--
-- Indices de la tabla `tipo_visitas`
--
ALTER TABLE `tipo_visitas`
  ADD PRIMARY KEY (`id_tipo_visita`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_roles` (`id_rol`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visita`),
  ADD KEY `id_asistencia` (`id_tipo_visita`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario_registro`);

--
-- Indices de la tabla `visita_usuario`
--
ALTER TABLE `visita_usuario`
  ADD PRIMARY KEY (`id_visita_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  MODIFY `id_capacitacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dedicaciones`
--
ALTER TABLE `dedicaciones`
  MODIFY `id_dedicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `indes`
--
ALTER TABLE `indes`
  MODIFY `id_indes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos_usuarios`
--
ALTER TABLE `modulos_usuarios`
  MODIFY `id_modulo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_capacitaciones`
--
ALTER TABLE `tipo_capacitaciones`
  MODIFY `id_tipo_capacitacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_indes`
--
ALTER TABLE `tipo_indes`
  MODIFY `id_tipo_indes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_proyectos`
--
ALTER TABLE `tipo_proyectos`
  MODIFY `id_tipo_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_visitas`
--
ALTER TABLE `tipo_visitas`
  MODIFY `id_tipo_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visita_usuario`
--
ALTER TABLE `visita_usuario`
  MODIFY `id_visita_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD CONSTRAINT `capacitaciones_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`);

--
-- Filtros para la tabla `dedicaciones`
--
ALTER TABLE `dedicaciones`
  ADD CONSTRAINT `dedicaciones_ibfk_1` FOREIGN KEY (`id_usuario_registro`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `modulos_ibfk_1` FOREIGN KEY (`id_usuario_registro`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `modulos_ibfk_2` FOREIGN KEY (`id_capacitacion`) REFERENCES `capacitaciones` (`id_capacitacion`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`id_usuario_registro`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`id_usuario_registro`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
