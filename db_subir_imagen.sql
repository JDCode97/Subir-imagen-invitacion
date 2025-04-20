-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 23:13:20
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_subir_imagen`
--
CREATE DATABASE IF NOT EXISTS `db_subir_imagen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_subir_imagen`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text,
  `carpeta` varchar(100) NOT NULL,
  `subcarpeta` varchar(100) NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `id_usuario`, `descripcion`, `carpeta`, `subcarpeta`, `imagen`) VALUES
(1, 1, 'Intensamente', 'imagenes', 'imagenes', '4d55cb6874bfe5d1d610cc0aa753d7dd_XL.jpg'),
(2, 1, 'Intensamente', 'imagenes', 'imagenes', '2901682.jpg'),
(3, 1, 'Arbol', 'imagenes', 'imagenes', 'canciones-en-ingles-para-ninos-800x400.jpg'),
(4, 1, 'Mickey Mouse', 'imagenes', 'imagenes', 'Cine_354475922_106546106_1706x960.jpg'),
(5, 1, 'Bob Esponja', 'imagenes', 'imagenes', 'descarga.jpg'),
(6, 1, 'Disney', 'imagenes', 'imagenes', 'Dibujos-animados-de-Disney-1.jpg'),
(7, 1, 'Vampirina', 'imagenes', 'imagenes', 'disney-estreno-vampirina-un-dibujo-animado-que-am-2-14032-1507846925-1_dblbig.jpg'),
(8, 1, 'Caricaturas', 'imagenes', 'imagenes', 'estos-son-los-mitos-mas-polemi-jpg_800x0-jpg_626x0.jpg'),
(9, 1, 'Rio', 'imagenes', 'imagenes', 'hqdefault (1).jpg'),
(10, 1, 'Disney', 'imagenes', 'imagenes', 'hqdefault.jpg'),
(11, 1, 'La dama y el vagabundo', 'imagenes', 'imagenes', 'la-dama-y-el-vagabundo-212131_w767h767c1cx556cy238.jpg'),
(12, 1, 'La casa de Mickey Mouse', 'imagenes', 'imagenes', 'Mickey-Mouse-actualmente_TINIMA20130515_0448_18.jpg'),
(13, 1, 'Mickey Mouse', 'imagenes', 'imagenes', 'Mickey-Mouse-mickey-mouse-34412097-1024-768.jpg'),
(14, 1, 'Olaf', 'imagenes', 'imagenes', 'olaf.jpg'),
(15, 1, 'Ralph', 'imagenes', 'imagenes', 'portada_disney_800x669.jpg'),
(16, 2, '1', '2', 'imagenes', '1.jpg'),
(17, 2, '2', '2', 'imagenes', '2.jpg'),
(18, 2, '3', '2', 'imagenes', '3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `salon` varchar(60) DEFAULT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `activo` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `salon`, `admin`, `activo`) VALUES
(1, 'admin', '$2a$12$szpSesp22BwdGGZ180YnpO4pf1.LD5vSFaMBbE25n7jpyykkueyOC', 'Salon de Admin', 1, 1),
(2, 'mundomagico', '$2a$12$szpSesp22BwdGGZ180YnpO4pf1.LD5vSFaMBbE25n7jpyykkueyOC', NULL, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
