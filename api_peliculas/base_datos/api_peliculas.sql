-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2024 a las 17:05:58
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'suspenso'),
(2, 'guerra'),
(3, 'terror'),
(8, 'crimen'),
(9, 'drama'),
(10, 'adiccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `sinopsis` varchar(400) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `nombre`, `director`, `anio`, `sinopsis`, `id_categoria`) VALUES
(1, 'Bastardos sin gloria', 'Quentin Tarantino', 2009, 'Es el primer año de la ocupación alemana de Francia. El oficial aliado, teniente Aldo Raine, ensambla un equipo de soldados judíos para cometer actos violentos en contra de los nazis, incluyendo la toma de cabelleras. Él y sus hombres unen fuerzas con Bridget von Hammersmark, una actriz alemana y agente encubierto, para derrocar a los líderes del Tercer Reich. Sus destinos convergen con la dueña d', 3),
(2, 'Requiem for a dream', 'Darren Aronofsky', 2001, 'Una envejecida viuda se vuelve adicta a píldoras dietéticas mientras su hijo libra su propia batalla con estupefacientes.', 1),
(3, 'El descenso', ' Neil Marshall', 2005, 'Un año después de un severo trauma emocional, Sarah viaja a Carolina del Norte para pasar unos días explorando unas cuevas con sus amigas; después de descender bajo tierra, las amigas hallan unas pinturas extrañas y evidencias de una expedición anterior, luego descubren que no están solas. Depredadores subterráneos habitan el lugar y a ellos les gusta mucho la carne humana.', 3),
(21, 'Historia Americana X', 'Tony Kaye', 1998, 'Tras ser liberado de la c?rcel, un antiguo neonazi trata de evitar que su hermano menor siga sus pasos en la senda del odio.', 2),
(22, 'Trainspotting', ' Danny Boyle', 1996, 'Unos j?venes de Edimburgo mantienen una dependencia intermitente a la hero?na. Basado en la novela de Irvine Welsh.', 10),
(23, 'D?a de entrenamiento', 'Antoine Fuqua', 2001, 'Un corrupto oficial usa la fanfarroner?a, intimidaci?n y drogas para que un nuevo polic?a se vuelva uno de los suyos.', 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
