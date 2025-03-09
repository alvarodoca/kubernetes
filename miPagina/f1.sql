-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3333
-- Tiempo de generación: 10-12-2024 a las 10:15:29
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `f1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `equipo` varchar(45) NOT NULL,
  `puntos` int(15) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`equipo`, `puntos`) VALUES
('Aston Martin Aramco F1 Team', 94),
('BWT Alpine F1 Team', 65),
('McLaren Formula 1 Team', 666),
('Mercedes-AMG PETRONAS F1 Team', 468),
('MoneyGram Haas F1 Team', 58),
('Oracle Red Bull Racing', 589),
('Scuderia Ferrari HP', 652),
('Stake F1 Team Kick Sauber', 4),
('Visa Cash App RB Formula One Team', 46),
('Williams Racing', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuderias`
--

CREATE TABLE `escuderias` (
  `escuderia` varchar(45) NOT NULL,
  `coche` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `piloto1` varchar(50) NOT NULL,
  `piloto2` varchar(50) NOT NULL,
  `director` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escuderias`
--

INSERT INTO `escuderias` (`escuderia`, `coche`, `color`, `piloto1`, `piloto2`, `director`) VALUES
('Aston Martin Aramco F1 Team', 'AMR24', 'Verde', '14, Fernando Alonso', '18, Lance Stroll', 'Mike Krack'),
('BWT Alpine F1 Team', 'A524', 'Azul', '10, Pierre Gasly', '31, Esteban Ocon', 'Oliver Oakes'),
('McLaren Formula 1 Team', 'MCL38', 'Naranja', '4, Lando Norris', '81, Oscar Piastri', 'Andrea Stella'),
('Mercedes-AMG PETRONAS F1 Team', ' W15', 'Plateado', '44, Lewis Hamilton', '63, George Russell', 'Toto Wolff'),
('MoneyGram Haas F1 Team', 'VF-24', 'Blanco', '27, Nico Hulkenberg', '20, Kevin Magnussen', 'Ayao Komatsu'),
('Oracle Red Bull Racing', 'RB20', 'Azul oscuro', '1, Max Verstappen', '11, Sergio Perez', 'Christian Horner'),
('Scuderia Ferrari HP', 'SF-24', 'Rojo', '16, Charles Leclerc', '55, Carlos Sainz', 'Frédéric Vasseur'),
('Stake F1 Team Kick Sauber', 'C44', 'Verde claro', '77, Valtteri Bottas', '24, Guanyu Zhou', 'Alessandro Alunni Bravi'),
('Visa Cash App RB Formula One Team', 'VCARB 01', 'Azul cerúleo', '22, Yuki Tsunoda', '30, Liam Lawson', ' Laurent Mekies'),
('Williams Racing', ' FW46', 'Azul cielo', '23, Alexander Albon', '43, Franco Colapinto', ' James Vowles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `dni` varchar(15) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nac` varchar(15) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `clase` enum('vip','premiun','deluxe','gold','general','libre') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`dni`, `nombre`, `apellidos`, `telefono`, `fecha_nac`, `contraseña`, `clase`) VALUES
('77449764K', 'Álvaro', 'Domingo Castillo', '66644879', '2004-12-23', '1234', 'vip'),
('77749724M', 'neus', 'breau ruiz', '666666666', '2006-04-05', 'a1234', 'vip'),
('89456321A', 'Pedro', 'López Sánchez', '696453216', '2000-01-5', '1111', 'deluxe'),
('admin', 'admin', 'admin', '678945213', '0-0-0', 'admin', 'vip');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`equipo`);

--
-- Indices de la tabla `escuderias`
--
ALTER TABLE `escuderias`
  ADD PRIMARY KEY (`escuderia`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`dni`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD CONSTRAINT `clasificacion_ibfk_1` FOREIGN KEY (`equipo`) REFERENCES `escuderias` (`escuderia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
