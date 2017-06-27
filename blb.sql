-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2017 a las 23:50:53
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `colonia_id` int(10) UNSIGNED NOT NULL,
  `colonia_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`colonia_id`, `colonia_name`) VALUES
(1, 'Juárez'),
(2, 'Doctores'),
(3, 'Escandón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img`
--

CREATE TABLE images (
	img_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	proyecto CHAR(9) NOT NULL,
	imgUrl VARCHAR(150),
	FOREIGN KEY(proyecto)
		REFERENCES proyecto(proyecto_id)
		ON DELETE RESTRICT
		ON UPDATE CASCADE
);

FOREIGN KEY(img)
		REFERENCES image(img_id)
		ON DELETE RESTRICT
		ON UPDATE CASCADE
       ;
--
-- Volcado de datos para la tabla `img`
--

INSERT INTO `images` (`idImagen`, `fileName`, `extension`, `binario`, `id_proyecto`) VALUES
(

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `proyecto_id` char(9) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descripcion` text NOT NULL,
  `year` year(4) NOT NULL,
  `ubicacion` varchar(250) NOT NULL,
  `colonia` int(10) UNSIGNED NOT NULL,
  `state` int(10) UNSIGNED NOT NULL,
  'img'
);

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`proyecto_id`, `titulo`, `descripcion`, `year`, `ubicacion`, `colonia`, `state`) VALUES
('1061', 'Nombre de la Obra', '&quot;Grupo BLB, es un Grupo formado por gente altamente preparada, que por sus conocimientos y experiencia, logra realizar desarrollos &iacute;ntegros.Los desarrollos, son realizados de principio a fin, por Arquitectos e Ingenieros del Grupo, logrando de esta forma hacer altamente eficaces todos los proyectos.&quot;', 2008, 'Palmas 12', 2, 1),
('3176365', 'Nombre de la Obra', '&quot;Grupo BLB, es un Grupo formado por gente altamente preparada, que por sus conocimientos y experiencia, logra realizar desarrollos &iacute;ntegros.Los desarrollos, son realizados de principio a fin, por Arquitectos e Ingenieros del Grupo, logrando de esta forma hacer altamente eficaces todos los proyectos.&quot;', 2001, 'Doctore 135', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `state_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`state_id`, `state_name`) VALUES
(1, 'En Construción'),
(2, 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto`
--

CREATE TABLE `tipo_proyecto` (
  `tipo_proyecto_id` int(10) UNSIGNED NOT NULL,
  `tipo_proyecto_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_proyecto`
--

INSERT INTO `tipo_proyecto` (`tipo_proyecto_id`, `tipo_proyecto_name`) VALUES
(1, 'Comerciales'),
(2, 'Residenciales'),
(3, 'Corporativos'),
(4, 'Vialidad'),
(5, 'Comunitarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto_x_proyecto`
--

CREATE TABLE `tipo_proyecto_x_proyecto` (
  `txp_id` int(10) UNSIGNED NOT NULL,
  `proyecto` char(9) NOT NULL,
  `tipo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_proyecto_x_proyecto`
--

INSERT INTO `tipo_proyecto_x_proyecto` (`txp_id`, `proyecto`, `tipo`) VALUES
(8, '3176365', 1),
(9, '3176365', 3),
(10, '1061', 1),
(11, '1061', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `pass` char(32) NOT NULL,
  `role` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `email`, `name`, `birthday`, `pass`, `role`) VALUES
('@admin', 'pochas.ca@gmail.com', 'Marielisa Villanueva', '1983-05-05', '8f4249596ad7b9906aa1806eb042353e', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`colonia_id`);

--
-- Indices de la tabla `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`proyecto_id`),
  ADD KEY `state` (`state`),
  ADD KEY `colonia` (`colonia`);
ALTER TABLE `proyecto` ADD FULLTEXT KEY `search` (`titulo`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`state_id`);

--
-- Indices de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  ADD PRIMARY KEY (`tipo_proyecto_id`);

--
-- Indices de la tabla `tipo_proyecto_x_proyecto`
--
ALTER TABLE `tipo_proyecto_x_proyecto`
  ADD PRIMARY KEY (`txp_id`),
  ADD KEY `proyecto` (`proyecto`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colonias`
--
ALTER TABLE `colonias`
  MODIFY `colonia_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `img`
--
ALTER TABLE `img`
  MODIFY `idImagen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `state_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  MODIFY `tipo_proyecto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipo_proyecto_x_proyecto`
--
ALTER TABLE `tipo_proyecto_x_proyecto`
  MODIFY `txp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`proyecto_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`state`) REFERENCES `status` (`state_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`colonia`) REFERENCES `colonias` (`colonia_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_proyecto_x_proyecto`
--
ALTER TABLE `tipo_proyecto_x_proyecto`
  ADD CONSTRAINT `tipo_proyecto_x_proyecto_ibfk_1` FOREIGN KEY (`proyecto`) REFERENCES `proyecto` (`proyecto_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_proyecto_x_proyecto_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tipo_proyecto` (`tipo_proyecto_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
