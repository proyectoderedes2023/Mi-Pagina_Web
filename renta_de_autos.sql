-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2023 a las 02:45:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `renta de autos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `Id_ciudad` int(30) NOT NULL,
  `region` varchar(20) NOT NULL,
  `estado` text NOT NULL,
  `pais` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`Id_ciudad`, `region`, `estado`, `pais`) VALUES
(1, 'tepito', 'oaxaca', 'Mexico'),
(2, 'tepito', 'extra', 'Mexico'),
(3, 'app', 'extra', 'Mexico'),
(4, 'app', 'extra', 'Mexico'),
(5, 'app', 'extra', 'Mexico'),
(6, 'M?xico', 'M?xico', 'M?xico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(5) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `telefonos` int(11) NOT NULL,
  `direcciones` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `telefonos`, `direcciones`) VALUES
(1, 'Miguel', 2147483647, 'Av Jose Lopez Portillo 310'),
(2, '', 2147483647, 'Av Jose Lopez Portillo 310'),
(3, '', 0, 'Av Jose Lopez Portillo 310'),
(4, '', 0, 'Av Jose Lopez Portillo 310'),
(5, '', 0, 'Av Jose Lopez Portillo 310'),
(6, '', 0, 'Av Jose Lopez Portillo 310'),
(7, '', 0, 'Av Jose Lopez Portillo 310'),
(8, '', 0, 'Av Jose Lopez Portillo 310'),
(9, '', 0, 'Av Jose Lopez Portillo 310'),
(10, '', 0, 'Av Jose Lopez Portillo 310'),
(11, '', 0, 'Av Jose Lopez Portillo 310'),
(12, '', 0, 'Av Jose Lopez Portillo 310'),
(13, '', 0, 'Av Jose Lopez Portillo 310'),
(14, '', 0, 'Av Jose Lopez Portillo 310'),
(15, '', 0, 'Av Jose Lopez Portillo 310'),
(16, '', 2147483647, 'Avenida'),
(17, '', 2147483647, 'Avenida'),
(18, '', 2147483647, 'Avenida Jos? Lop?z Portillo 134'),
(19, '', 2147483647, 'Avenida Jos? Lop?z Portillo 134'),
(20, 'jesus', 2147483647, 'Avenida Jos? Lop?z Portillo 134'),
(21, 'jesus', 2147483647, 'Avenida Jos? Lop?z Portillo 134');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(5) NOT NULL,
  `fecha_consulta` date NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `hora_consulta` time(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `fecha_consulta`, `ubicacion`, `hora_consulta`) VALUES
(1, '0000-00-00', 'Toluca', '12:10:00.00000'),
(2, '0000-00-00', 'valor', '00:21:00.00000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contactos` int(5) NOT NULL,
  `nombre_contactos` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `dirección` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id_contactos`, `nombre_contactos`, `telefono`, `dirección`) VALUES
(1, 'Angel', 722805710, 'Av Jose Lopez Portillo 310'),
(2, 'gael', 2147483647, 'Avenida Jos? Lop?z Portillo 134');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(5) NOT NULL,
  `nombre_empleado` varchar(50) NOT NULL,
  `salario` int(4) NOT NULL,
  `dirección` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `salario`, `dirección`) VALUES
(1, 'Aldrich', 5000, 'Av Jose Lopez Portillo 310'),
(2, 'sa', 1234, 'Avenida Jos? Lop?z Portillo 134');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_producto` int(10) NOT NULL,
  `nombre_producto` int(50) NOT NULL,
  `precio` int(6) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `Existencia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_producto`, `nombre_producto`, `precio`, `modelo`, `Existencia`) VALUES
(1, 0, 5000, 'volksvagen', '2'),
(2, 0, 122, 'wa', 'dos'),
(3, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(5) NOT NULL,
  `Nombre_proveedor` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `dirección` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `Nombre_proveedor`, `telefono`, `dirección`) VALUES
(1, 'Gael', 2147483647, 'Av Jose Lopez Portillo 310');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicio` int(5) NOT NULL,
  `numero_servicio` int(4) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `costos` int(4) NOT NULL,
  `cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `numero_servicio`, `tipo`, `costos`, `cliente`) VALUES
(1, 19, 'mantenimiento', 210, 'miguel'),
(2, 12, 'dsa', 0, 'vip');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `ID_sucursal` int(5) NOT NULL,
  `Nombre_sucursal` varchar(30) NOT NULL,
  `dirección` varchar(80) NOT NULL,
  `horario` date NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID_sucursal`, `Nombre_sucursal`, `dirección`, `horario`, `telefono`) VALUES
(1, 'chevi', 'Av Jose Lopez Portillo 310', '0000-00-00', 2147483647),
(2, 'chevi', 'Av Jose Lopez Portillo 310', '0000-00-00', 2147483647),
(3, 'asddf', 'Avenida Jos? Lop?z Portillo 134', '0021-12-23', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `Id_Tarifa` int(5) NOT NULL,
  `id_auto` int(5) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `costos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`Id_Tarifa`, `id_auto`, `tipo`, `costos`) VALUES
(1, 0, 'grua', 310),
(2, 0, 'grua', 310),
(3, 12345, 'forza', 12),
(4, 12345, 'forza', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicación`
--

CREATE TABLE `ubicación` (
  `id_ubicacion` int(30) NOT NULL,
  `nombre_ubic` varchar(80) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `region` varchar(20) NOT NULL,
  `estado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicación`
--

INSERT INTO `ubicación` (`id_ubicacion`, `nombre_ubic`, `codigo_postal`, `region`, `estado`) VALUES
(1, '', 0, '20010', 'surmexico'),
(2, '', 0, '20010', 'surmexico'),
(3, '', 0, '20010', 'surmexico'),
(4, '', 0, '20010', 'surmexico'),
(5, '', 0, '20010', 'surmexico'),
(6, 'adsfdf', 50010, 'M?xico', 'M?xico'),
(7, 'adsfdf', 50010, 'M?xico', 'M?xico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id_usuario` int(5) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `dirección` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `nombre_usuario`, `telefono`, `dirección`) VALUES
(1, 'Miguel', 2147483647, 'Av Jose Lopez Portillo 310'),
(2, 'Miguel', 2147483647, 'Av Jose Lopez Portillo 310'),
(3, 'Miguel', 2147483647, 'Av Jose Lopez Portillo 310'),
(4, '', 2147483647, 'Avenida Jos? Lop?z Portillo 134, Conjunto Galaxias Lot i'),
(5, '', 2147483647, 'Avenida Jos? Lop?z Portillo 134, Conjunto Galaxias Lot i');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`Id_ciudad`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contactos`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID_sucursal`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`Id_Tarifa`);

--
-- Indices de la tabla `ubicación`
--
ALTER TABLE `ubicación`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `Id_ciudad` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contactos` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `ID_sucursal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `Id_Tarifa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ubicación`
--
ALTER TABLE `ubicación`
  MODIFY `id_ubicacion` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
