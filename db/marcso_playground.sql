-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2025 a las 15:17:45
-- Versión del servidor: 5.7.44
-- Versión de PHP: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marcso_playground`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calc-calo_nivel_actividad`
--

CREATE TABLE `calc-calo_nivel_actividad` (
  `ccniac_codigo` int(11) NOT NULL,
  `ccniac_nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ccniac_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ccniac_factor` float NOT NULL,
  `ccniac_urlimg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calc-calo_nivel_actividad`
--

INSERT INTO `calc-calo_nivel_actividad` (`ccniac_codigo`, `ccniac_nombre`, `ccniac_descripcion`, `ccniac_factor`, `ccniac_urlimg`) VALUES
(1, 'Sedentario', 'Corresponde a personas con muy poca o ninguna actividad física diaria. Generalmente incluye trabajos de oficina o rutinas diarias sin esfuerzo físico significativo, con hábitos predominantemente sentados o inactivos.', 1.2, 'sedentario.png'),
(2, 'Ligero', 'Se refiere a quienes realizan actividad física ligera entre 1 y 3 veces por semana. Esto puede incluir caminatas, ejercicios suaves o entrenamientos breves que no elevan significativamente la frecuencia cardíaca de forma sostenida.', 1.375, 'ligero.png'),
(3, 'Moderado', 'Aplicable a personas que hacen ejercicio moderado de 3 a 5 veces por semana. Incluye rutinas de entrenamiento con una duración e intensidad considerables o trabajos que implican movimiento constante durante el día.', 1.55, 'moderado.png'),
(4, 'Activo', 'Indica un nivel alto de actividad física, ya sea por entrenar casi todos los días (6 a 7 veces por semana) o por tener un empleo físicamente exigente. El cuerpo está en movimiento constante y se somete a esfuerzo físico regular.', 1.725, 'activo.png'),
(5, 'Muy activo', 'Representa a individuos con entrenamientos intensos diarios, como atletas, personas que realizan trabajo físico muy pesado (como construcción o carga frecuente) o que combinan ejercicio con actividad laboral demandante.', 1.9, 'muy_activo.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calc-calo_nivel_actividad`
--
ALTER TABLE `calc-calo_nivel_actividad`
  ADD PRIMARY KEY (`ccniac_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calc-calo_nivel_actividad`
--
ALTER TABLE `calc-calo_nivel_actividad`
  MODIFY `ccniac_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
