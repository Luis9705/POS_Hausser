-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2018 a las 18:33:09
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hausser`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `catID` char(2) NOT NULL,
  `catNombre` varchar(25) NOT NULL,
  `tiendaID` char(2) NOT NULL,
  `usoID` char(2) DEFAULT NULL,
  `catPadreID` char(2) DEFAULT NULL,
  `catDescripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`catID`, `catNombre`, `tiendaID`, `usoID`, `catPadreID`, `catDescripcion`) VALUES
('BE', 'Bebidas', 'H2', 'VE', NULL, 'Todas las bebidas en existencia  '),
('CA', 'Canapés', 'H1', 'VE', NULL, 'Todos los sabores de canapés en existencia'),
('CF', 'Cafés', 'H2', 'VE', 'BE', 'Todas los cafés en existencia'),
('CH', 'Chilaquiles', 'H2', 'VE', 'CO', 'Todas los chilaquiles en existencia'),
('CO', 'Comidas', 'H2', 'VE', NULL, 'Todas las comidas y desayunos en existencia'),
('GA', 'Galletas', 'H1', 'VE', NULL, 'Todos los sabores de galletas en existencia'),
('GE', 'Gelatinas', 'H1', 'VE', NULL, 'Todos los sabores de gelatinas en existencia'),
('GP', 'Galletas en paquete', 'H1', 'IN', NULL, 'Galletas maría, oreo, etc'),
('HV', 'Huevo y derivados', 'H1', 'IN', NULL, 'Categoría para huevos y derivados '),
('LC', 'Quesos y lácteos', 'H1', 'IN', NULL, 'Categoría para leches, quesos, etc'),
('LO', 'Lonches', 'H2', 'VE', 'CO', 'Todas los lonches en existencia'),
('MA', 'Mantequillas y aceites', 'H1', 'IN', NULL, 'Categoría para mantequillas y aceites'),
('PA', 'Pasteles', 'H1', 'VE', NULL, 'Todos los sabores de pasteles en existencia'),
('RE', 'Refrescos', 'H2', 'VE', 'BE', 'Todas los refrescos en existencia'),
('SE', 'Ingredientes Secos', 'H1', 'IN', NULL, 'Harina, azúcar, grenetina, etc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `ID` char(5) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `catID` char(2) NOT NULL,
  `cantidadLote` float(7,2) NOT NULL,
  `unidadID` varchar(5) NOT NULL,
  `precioLote` float(7,2) NOT NULL,
  `precioUnitario` float(7,2) NOT NULL,
  `cantidadMIN` int(11) DEFAULT NULL,
  `controlCalidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`ID`, `Nombre`, `Descripcion`, `catID`, `cantidadLote`, `unidadID`, `precioLote`, `precioUnitario`, `cantidadMIN`, `controlCalidad`) VALUES
('AZREF', 'Azúcar refinada', 'Azúcar refinada costal 50kg', 'SE', 50.00, 'kg', 780.00, 15.60, 20, 30),
('GAM', 'Galletas María', 'Galletas María paquete 150gr.', 'GP', 0.15, 'kg', 12.00, 80.00, 0, 60),
('HA', 'Harina', 'Harina espuma de chapala costal 44kg', 'SE', 44.00, 'kg', 415.00, 9.43, 1, 30),
('HUEV', 'Huevo', 'Caja de huevo 360 piezas', 'HV', 360.00, 'pz.', 550.00, 1.53, 50, 30),
('MANT', 'Mantequilla', 'Barra de mantequilla 1kg', 'MA', 1.00, 'kg', 100.00, 100.00, 1, 20),
('MCR', 'Media crema', 'Cuartito de media crema', 'LC', 0.25, 'lt', 10.00, 40.00, 1, 7),
('RQS', 'Requesón', 'Requesón por kilogramo', 'LC', 1.00, 'kg', 40.00, 40.00, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamanio`
--

CREATE TABLE `tamanio` (
  `ID` varchar(5) NOT NULL,
  `Nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tamanio`
--

INSERT INTO `tamanio` (`ID`, `Nombre`) VALUES
('10p', '10 personas '),
('15p', '15 personas'),
('F', 'Flor'),
('RM', 'Rosca Mediana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `tiendaID` char(2) NOT NULL,
  `tNombre` varchar(25) NOT NULL,
  `tDescripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`tiendaID`, `tNombre`, `tDescripcion`) VALUES
('H1', 'Pastelería', 'Productos relacionados con la pastelería'),
('H2', 'Fuente de Sodas', 'Productos relacionados con la fuente de sodas: desayunos, lonches, jugos, etc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `ID` varchar(5) NOT NULL,
  `Nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`ID`, `Nombre`) VALUES
('kg', 'kilogramo'),
('lt', 'litro'),
('pz.', 'Piezas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso`
--

CREATE TABLE `uso` (
  `usoID` char(2) NOT NULL,
  `uNombre` varchar(25) NOT NULL,
  `uDescripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `uso`
--

INSERT INTO `uso` (`usoID`, `uNombre`, `uDescripcion`) VALUES
('IN', 'Ingredientes', 'Ingredientes disponibles'),
('PR', 'Preparados', 'Productos para la preparación de los productos'),
('VE', 'Venta', 'Productos a la venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/191.jpg', 1, '2018-06-15 08:19:25', '2018-06-15 13:19:25'),
(57, 'Juan Fernando Urrego', 'juan', '$2a$07$asxx54ahjppf45sd87a5auwRi.z6UsW7kVIpm0CUEuCpmsvT2sG6O', 'Vendedor', 'vistas/img/usuarios/juan/461.jpg', 1, '2018-02-06 16:58:50', '2018-02-07 03:58:50'),
(58, 'Julio Gómez', 'julio', '$2a$07$asxx54ahjppf45sd87a5auQhldmFjGsrgUipGlmQgDAcqevQZSAAC', 'Especial', 'vistas/img/usuarios/julio/100.png', 1, '2018-02-06 17:09:22', '2018-02-07 04:09:22'),
(59, 'Ana Gonzalez', 'ana', '$2a$07$asxx54ahjppf45sd87a5auLd2AxYsA/2BbmGKNk2kMChC3oj7V0Ca', 'Vendedor', 'vistas/img/usuarios/ana/260.png', 1, '2017-12-26 19:21:40', '2017-12-27 06:21:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`catID`),
  ADD KEY `catPadreID` (`catPadreID`),
  ADD KEY `tiendaID` (`tiendaID`),
  ADD KEY `uso_FK` (`usoID`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `catID` (`catID`),
  ADD KEY `unidadID` (`unidadID`);

--
-- Indices de la tabla `tamanio`
--
ALTER TABLE `tamanio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`tiendaID`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `uso`
--
ALTER TABLE `uso`
  ADD PRIMARY KEY (`usoID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`catPadreID`) REFERENCES `categoria` (`catID`),
  ADD CONSTRAINT `categoria_ibfk_2` FOREIGN KEY (`tiendaID`) REFERENCES `tienda` (`tiendaID`),
  ADD CONSTRAINT `uso_FK` FOREIGN KEY (`usoID`) REFERENCES `uso` (`usoID`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD CONSTRAINT `materia_prima_ibfk_1` FOREIGN KEY (`catID`) REFERENCES `categoria` (`catID`),
  ADD CONSTRAINT `materia_prima_ibfk_2` FOREIGN KEY (`unidadID`) REFERENCES `unidad` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
