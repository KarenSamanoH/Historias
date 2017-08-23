-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-08-2017 a las 13:16:07
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `historias`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddAgente` (IN `IDCuenta` INT(11), IN `Nombre` VARCHAR(50), IN `Apellidos` VARCHAR(50), IN `Telefono` INT(11), IN `Email` VARCHAR(50), IN `IDTienda` INT(11))  SQL SECURITY INVOKER
BEGIN
INSERT INTO agente (IDCuenta, Nombre, Apellidos, Telefono, Email, IDTienda)  VALUES (IDCuenta, Nombre, Apellidos, Telefono, Email, IDTienda);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddCatalogoElemento` (IN `Nombre` VARCHAR(50), IN `Categoria` VARCHAR(50))  SQL SECURITY INVOKER
BEGIN
INSERT INTO catalogoelemento (Nombre, Categoria) VALUES (Nombre, Categoria);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddCatalogoMaterial` (IN `Nombre` VARCHAR(50), IN `NombreProv` VARCHAR(50), IN `Gramaje` DECIMAL(11,2), IN `Color` VARCHAR(50), IN `Ancho` DECIMAL(11,2), IN `Largo` DECIMAL(11,2), IN `Proveedor` VARCHAR(50), IN `PrecioCompra` DECIMAL(11,2))  SQL SECURITY INVOKER
BEGIN 
INSERT INTO catalogomaterial (Nombre, NombreProveedor, Gramaje, Color, Ancho, Largo, Proveedor, PrecioCompra) VALUES (Nombre, NombreProveedor, Gramaje, Color, Ancho, Largo, Proveedor, PrecioCompra);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddCatalogoProceso` (IN `IDMaquina` INT(11), IN `Nombre` VARCHAR(50), IN `CostoUnico` DECIMAL(11,2), IN `CostoUnitario` DECIMAL(11,2), IN `CostoCiento` DECIMAL(11,2), IN `CostoMillar` DECIMAL(11,2))  SQL SECURITY INVOKER
BEGIN 
INSERT INTO catalogoproceso (IDMaquina, Nombre, CostoUnico, CostoUnitario, CostoCiento, CostoMillar) VALUES (IDMaquina, Nombre, CostoUnico, CostoUnitario, CostoCiento, CostoMillar);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddCliente` (IN `Nombre1` VARCHAR(50), IN `Apellido1` VARCHAR(50), IN `Nombre2` VARCHAR(50), IN `Apellido2` VARCHAR(50), IN `Calle` VARCHAR(50), IN `Ciudad` VARCHAR(50), IN `Estado` VARCHAR(50), IN `CP` INT(11), IN `Colonia` VARCHAR(50), IN `Telefono` INT(11), IN `Fax` INT(11), IN `Celular1` INT(11), IN `Celular2` INT(11), IN `Email1` VARCHAR(50), IN `Email2` VARCHAR(50), IN `FechaAlta` DATE, IN `IDAgente` INT(11), IN `IDEmpresa` INT(11), IN `EstatusCompra` VARCHAR(50), IN `Comentarios` VARCHAR(50), IN `TipoEvento` VARCHAR(50), IN `TipoCliente` VARCHAR(50), IN `Expo` VARCHAR(50), IN `FechaExpo` DATE, IN `IDCuenta` INT(11), IN `IDTienda` INT(11))  SQL SECURITY INVOKER
BEGIN
INSERT INTO cliente (Nombre1, Apellidos1, Nombre2, Apellidos2, Calle, Ciudad, Estado, CP, Colonia, Telefono, Fax, Celular1, Celular2, Email1, Email2, FechaAlta, IDAgente, IDEmpresa, EstatusCompra, Comentarios, TipoEvento, TipoCliente, Expo, FechaExpo, IDCuenta, IDTienda) VALUES (Nombre1, Apellidos1, Nombre2, Apellidos2, Calle, Ciudad, Estado, CP, Colonia, Telefono, Fax, Celular1, Celular2, Email1, Email2, FechaAlta, IDAgente, IDEmpresa, EstatusCompra, Comentarios, TipoEvento, TipoCliente, Expo, FechaExpo, IDCuenta, IDTienda);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddCotizacion` (IN `FechaEvento` DATE, IN `Nombre` VARCHAR(50), IN `Descripcion` VARCHAR(50), IN `IDCliente` INT(11), IN `IDAgente` INT(11), IN `CostoMod` DECIMAL(11,2), IN `CostoFinal` DECIMAL(11,2))  SQL SECURITY INVOKER
BEGIN
INSERT INTO cotizacion (FechaEvento, Nombre, Descripcion, IDCliente, IDAgente, CostoMod, CostoFinal) VALUES (FechaEvento, Nombre, Descripcion, IDCliente, IDAgente, CostoMod,	CostoFinal);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddCuenta` (IN `NombreCuenta` VARCHAR(50), IN `Contrasena` VARCHAR(50), IN `IDPerfiles` INT(11))  SQL SECURITY INVOKER
BEGIN
INSERT INTO cuenta (NombreCuenta, Contrasena, IDPerfiles) VALUES (NombreCuenta, Contrasena, IDPerfiles);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddDescuentos` (IN `Nombre` VARCHAR(50), IN `Tipo` VARCHAR(50), IN `Descuento` INT(11), IN `Dias` INT(11), IN `FormaPago` VARCHAR(50), IN `Vigencia` INT(11), IN `Unico` TINYINT(1), IN `Activo` TINYINT(1), IN `AccesoriosGratis` TINYINT(1), IN `Inicio` DATE, IN `Final` DATE)  SQL SECURITY INVOKER
BEGIN
INSERT INTO descuentos (Nombre, Tipo, Descuento, Dias, FormaPago, Vigencia, Unico, Activo, AccesoriosGratis, Inicio, Final) VALUES (Nombre, Tipo, Descuento, Dias, FormaPago, Vigencia, Unico, Activo, AccesoriosGratis, Inicio, Final);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddElemento` (IN `IDProducto` INT(11), IN `IDCatElem` INT(11), IN `Cantidad` INT(11), IN `Ancho` INT(11), IN `Alto` INT(11), IN `Profundidad` INT(11), IN `CostoMat` INT(11), IN `CostoFinal` INT(11), IN `Regalo` VARCHAR(50))  SQL SECURITY INVOKER
BEGIN
INSERT INTO elemento (IDElemento,IDCatElem, Cantidad, Ancho, Alto, Profundidad, CostoMat, CostoFinal, Regalo) VALUES (IDElemento,IDCatElem, Cantidad, Ancho, Alto, Profundidad, CostoMat, CostoFinal, Regalo);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddEmpresa` (IN `Empresa` VARCHAR(50), IN `Contacto` VARCHAR(50), IN `Cargo` VARCHAR(50), IN `RFC` VARCHAR(50), IN `CURP` VARCHAR(50), IN `Calle` VARCHAR(50), IN `Ciudad` VARCHAR(50), IN `Estado` VARCHAR(50), IN `CP` INT, IN `Colonia` VARCHAR(50))  SQL SECURITY INVOKER
BEGIN
INSERT INTO empresa (Empresa, Contacto, Cargo, RFC, CURP, Calle, Ciudad, Estado, CodigoPostal, Colonia) VALUES (Empresa, Contacto, Cargo, RFC, CURP, Calle, Ciudad, Estado, CP, Colonia);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddMaquina` (IN `Nombre` VARCHAR(50), IN `Proceso` VARCHAR(50))  SQL SECURITY INVOKER
BEGIN
INSERT INTO maquina (Nombre, Proceso) VALUES (Nombre, Proceso);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddMaterial` (IN `IDElemento` INT(11), IN `IDCatMat` INT, IN `Alto` INT(11), IN `Base` INT(11), IN `Cantidad` INT(11), IN `CostoS` INT(11), IN `PrecioCompra` INT, IN `CostoFinal` INT)  SQL SECURITY INVOKER
BEGIN
INSERT INTO material (IDElemento, IDCatMat, Alto, Base, Cantidad, CostoS,  PrecioCompra, CostoFinal) VALUES (IDElemento, IDCatMat, Alto, Base, Cantidad, CostoS,  PrecioCompra, CostoFinal);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddPedido` (IN `Nombre` VARCHAR(50), IN `Descripcion` VARCHAR(50), IN `Revisiones` VARCHAR(50), IN `Estatus` VARCHAR(50), IN `SeguimientoPap` VARCHAR(50), IN `FechaPapeleo` DATE, IN `Dias Credito` INT(11), IN `FechaEntrada` DATE, IN `FechaAutorizacion` DATE, IN `FechaProduccion` DATE, IN `FechaDiseño` DATE, IN `FechaRotulacion` DATE, IN `FechaSalida` DATE, IN `IDCotizacion` INT(11))  SQL SECURITY INVOKER
BEGIN
INSERT INTO pedido (Nombre, Descripcion, Revisiones, Estatus, SeguimientoPap, FechaPapeleo, DiasCredito, FechaEntrada, FechaAutorizacion, FechaProduccion, FechaDiseño, FechaRotulacion, FechaSalida, IDCotizacion) VALUES (Nombre, Descripcion, Revisiones, Estatus, SeguimientoPap, FechaPapeleo, DiasCredito, FechaEntrada, FechaAutorizacion, FechaProduccion, FechaDiseño, FechaRotulacion, FechaSalida, IDCotizacion);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddPerfiles` (IN `Perfil` VARCHAR(50))  SQL SECURITY INVOKER
BEGIN
INSERT INTO perfil (Perfil) VALUES (Perfil);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddProceso` (IN `IDMaterial` INT(11), IN `IDCatPro` INT(11), IN `Descripcion` VARCHAR(50), IN `CostoUnico` DECIMAL(11,2), IN `CostoUnitario` DECIMAL(11,2), IN `CostoCiento` DECIMAL(11,2), IN `CostoMillar` DECIMAL(11,2), IN `CostoFinal` DECIMAL(11,2), IN `Cantidad` INT)  SQL SECURITY INVOKER
BEGIN
INSERT INTO proceso (IDMaterial, IDCatPro, Descripcion, Cantidad, CostoUnico, CostoUnitario, CostoCiento, CostoMillar, CostoFinal) VALUES (IDMaterial, IDCatPro, Descripcion, Cantidad, CostoUnico, CostoUnitario, CostoCiento, CostoMillar, CostoFinal);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddProducto` (IN `IDCotizacion` INT(11), IN `Modelo` VARCHAR(50), IN `Categoria` VARCHAR(50), IN `Cantidad` INT, IN `CostoEl` DECIMAL(11,2), IN `Descuento` INT, IN `IDDescuento` INT, IN `CostoFinal` DECIMAL(11,2))  SQL SECURITY INVOKER
BEGIN
INSERT INTO producto (IDCotizacion, IDDescuento, Modelo, Categoria, Cantidad, CostoEl, Descuento, CostoFinal)  VALUES (IDCotizacion, IDDescuento, Modelo, Categoria, Cantidad, CostoEl, Descuento, CostoFinal);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `AddTienda` (IN `Nombre` VARCHAR(50), IN `Direccion` VARCHAR(50))  SQL SECURITY INVOKER
BEGIN
INSERT INTO tienda (Nombre, Direccion) VALUES (Nombre, Direccion);
END$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `ConsultaEncuad` (IN `ID` VARCHAR(50))  READS SQL DATA
select producto.Modelo, producto.Cantidad from producto
where producto.IDProducto = ID$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `CostoCientoSub` (IN `IDSub` INT(11))  SQL SECURITY INVOKER
UPDATE proceso SET CostoFinal = (CostoUnico + CostoCiento + CostoMillar + ((Cantidad-100) * (CostoCiento/100)) + (Cantidad * CostoUnitario))
WHERE IDProceso = IDSub$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `CostoMillarSub` (IN `IDSub` INT(11))  SQL SECURITY INVOKER
UPDATE proceso SET CostoFinal = (CostoUnico + CostoCiento + CostoMillar + ((Cantidad-1000) * (CostoMillar/1000)) + ((Cantidad-100) * (CostoCiento/100)) + (Cantidad * CostoUnitario))
WHERE IDProceso = IDSub$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `CostosProcesos` (IN `IDOrigen` INT(11), IN `IDDestino` INT(11))  SQL SECURITY INVOKER
UPDATE proceso SET 
	proceso.CostoUnico = (SELECT catalogoproceso.CostoUnico FROM catalogoproceso 
WHERE catalogoproceso.IDCatPro = IDOrigen),

	proceso.CostoUnitario = (SELECT catalogoproceso.CostoUnitario FROM catalogoproceso WHERE catalogoproceso.IDCatPro = IDOrigen),

	proceso.CostoCiento = (SELECT catalogoproceso.CostoCiento FROM catalogoproceso WHERE catalogoproceso.IDCatPro = IDOrigen),

	proceso.CostoMillar = (SELECT catalogoproceso.CostoMillar FROM catalogoproceso WHERE catalogoproceso.IDCatPro = IDOrigen)
WHERE proceso.IDProceso = IDDestino$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `CostoUnidadSub` (IN `IDSub` INT(11))  SQL SECURITY INVOKER
UPDATE proceso SET CostoFinal = (CostoUnico + CostoCiento + CostoMillar + (Cantidad * CostoUnitario))
WHERE IDProceso = IDSub$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `CotizacionFinal` (IN `IDC` INT)  SQL SECURITY INVOKER
UPDATE cotizacion SET cotizacion.CostoFinal = cotizacion.CostoMod WHERE cotizacion.IDCotizacion = IDC$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `Elemento-Producto` (IN `IDOrigen` INT(11))  SQL SECURITY INVOKER
UPDATE producto SET producto.CostoEl = (SELECT SUM(elemento.CostoFinal) FROM elemento WHERE elemento.IDProducto = IDOrigen)
WHERE producto.IDProducto = IDOrigen$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `ElementoFinal` (IN `IDE` INT)  SQL SECURITY INVOKER
UPDATE elemento SET elemento.CostoFinal = (elemento.PrecioCompra * Cantidad )+ elemento.CostoS
WHERE elemento.IDElemento = IDE$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `LoginAdmin` (IN `NombreUsuario` VARCHAR(50), IN `Clave` VARCHAR(50), IN `IDPerfil` INT(11))  READS SQL DATA
SELECT COUNT(*) FROM cuenta
WHERE cuenta.NombreCuenta = NombreUsuario and cuenta.Contrasena = Clave and cuenta.IDPerfiles = IDPerfil$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `LoginAgente` (IN `NomUsu` VARCHAR(50), IN `Cla` VARCHAR(50), IN `IDPer` INT(11))  READS SQL DATA
select count(*) from agente
inner join usuario
ON usuario.IDUsuario = agente.IDUsuario
where usuario.NombreUsuario = NomUsu AND usuario.Clave= Cla AND usuario.IDPerfiles = IDPer$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `LoginCliente` (IN `NombreUsuario` VARCHAR(50), IN `Clave` VARCHAR(50), IN `IDPerfil` INT(11))  READS SQL DATA
select count(*) from cliente
inner join usuario
ON usuario.IDUsuario = cliente.IDUsuario
where usuario.NombreUsuario = NombreUsuario AND usuario.Clave= Clave AND usuario.IDPerfiles = IDPerfil$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `PrecioCompra` (IN `IDOrigen` INT(11), IN `IDDestino` INT(11))  SQL SECURITY INVOKER
UPDATE elemento SET elemento.PrecioCompra = (SELECT catalogomaterial.PrecioCompra FROM catalogomaterial WHERE catalogomaterial.IDCatMat = IDOrigen)

WHERE elemento.IDElemento = IDDestino$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `Proceso-Elemento` (IN `IDOrigen` INT(11))  SQL SECURITY INVOKER
UPDATE elemento SET elemento.CostoS = (SELECT SUM(proceso.CostoFinal) FROM  proceso WHERE proceso.IDElemento = IDOrigen)
WHERE elemento.IDElemento = IDOrigen$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `Producto-Cotizacion` (IN `IDOrigen` INT)  SQL SECURITY INVOKER
UPDATE cotizacion SET cotizacion.CostoMod = (SELECT SUM(producto.CostoFinal) FROM producto WHERE producto.IDCotizacion = IDOrigen)WHERE cotizacion.IDCotizacion = IDOrigen$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `ProductoFinal` (IN `IDP` INT)  SQL SECURITY INVOKER
UPDATE producto SET producto.CostoFinal = producto.CostoEl - ((producto.Descuento  * producto.CostoEl)/ 100)  WHERE producto.IDProducto = IDP$$

CREATE DEFINER=`Developer`@`localhost` PROCEDURE `TiendaCliente` (IN `IDOrigen` INT(11), IN `IDDestino` INT(11))  SQL SECURITY INVOKER
UPDATE cliente SET 
	cliente.IDTienda = (SELECT agente.IDTienda FROM agente
					WHERE agente.IDAgente = IDOrigen)	
WHERE cliente.IDCliente = IDDestino$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agente`
--

CREATE TABLE `agente` (
  `IDAgente` int(11) NOT NULL,
  `IDCuenta` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Telefono` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `IDTienda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agente`
--

INSERT INTO `agente` (`IDAgente`, `IDCuenta`, `Nombre`, `Apellidos`, `Telefono`, `Email`, `IDTienda`) VALUES
(2, 3, 'Elias', 'Martinez Juarez', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoelemento`
--

CREATE TABLE `catalogoelemento` (
  `IDCatElem` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogomaterial`
--

CREATE TABLE `catalogomaterial` (
  `IDCatMat` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `NombreProveedor` varchar(50) NOT NULL,
  `Gramaje` decimal(11,2) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `Ancho` decimal(11,2) NOT NULL,
  `Largo` decimal(11,2) NOT NULL,
  `Proveedor` varchar(50) NOT NULL,
  `PrecioCompra` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproceso`
--

CREATE TABLE `catalogoproceso` (
  `IDCatPro` int(11) NOT NULL,
  `IDMaquina` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `CostoUnico` decimal(11,2) DEFAULT NULL,
  `CostoUnitario` decimal(11,2) DEFAULT NULL,
  `CostoCiento` decimal(11,2) DEFAULT NULL,
  `CostoMillar` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproducto`
--

CREATE TABLE `catalogoproducto` (
  `IDCatProd` int(11) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Familia` varchar(50) NOT NULL,
  `CostoUnico` decimal(11,2) NOT NULL,
  `CostoUnitario` decimal(11,2) NOT NULL,
  `CostoCiento` decimal(11,2) NOT NULL,
  `CostoMillar` decimal(11,2) NOT NULL,
  `TiempoLead` int(11) NOT NULL,
  `IVA` decimal(11,2) NOT NULL,
  `CostoPapel` decimal(11,2) NOT NULL,
  `CAjuste` decimal(11,2) NOT NULL,
  `Disponible` enum('Disponible','No Disponible') NOT NULL,
  `CostoFinal` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogoproducto`
--

INSERT INTO `catalogoproducto` (`IDCatProd`, `Modelo`, `Descripcion`, `Familia`, `CostoUnico`, `CostoUnitario`, `CostoCiento`, `CostoMillar`, `TiempoLead`, `IVA`, `CostoPapel`, `CAjuste`, `Disponible`, `CostoFinal`) VALUES
(1, '1', 'Modernas', 'Invitacion', '1648.27', '22.82', '1690.64', '0.00', 10, '0.16', '7.42', '10.14', 'Disponible', '0.00'),
(2, '10', 'Modernas', 'Invitacion', '3097.39', '28.90', '1690.64', '0.00', 12, '0.16', '18.94', '0.00', 'Disponible', '0.00'),
(3, '100', '', 'Invitacion', '199.14', '0.13', '0.00', '0.00', 10, '0.16', '6.35', '0.00', 'Disponible', '0.00'),
(8, '12', '', 'Invitacion', '1378.92', '5.44', '1932.17', '0.00', 10, '0.16', '12.60', '5.00', 'Disponible', '0.00'),
(14, '129', 'Modernas', 'Invitacion', '2252.07', '4.16', '2294.45', '0.00', 10, '0.16', '8.99', '0.00', 'Disponible', '0.00'),
(15, '13', 'Modernas', 'Invitacion', '1968.17', '9.23', '1690.64', '0.00', 12, '0.16', '7.03', '0.00', 'Disponible', '0.00'),
(16, '130', 'VINTAGE', 'Invitacion', '1769.03', '4.16', '1569.88', '0.00', 11, '0.16', '21.18', '0.00', 'Disponible', '0.00'),
(17, '133', '', 'Invitacion', '1122.85', '29.26', '1126.27', '0.00', 11, '0.16', '8.12', '0.00', 'Disponible', '0.00'),
(18, '136', 'INVITACIONES', 'Invitacion', '2707.28', '4.16', '2898.25', '0.00', 11, '0.16', '2.39', '0.00', 'Disponible', '0.00'),
(19, '138', 'XV', 'Invitacion', '1769.03', '17.23', '1449.12', '0.00', 11, '0.16', '10.44', '9.75', 'Disponible', '0.00'),
(20, '139', 'Modernas', 'Invitacion', '2103.48', '6.80', '2415.21', '0.00', 11, '0.16', '16.75', '0.00', 'Disponible', '0.00'),
(21, '14', 'Modernas', 'Invitacion', '2252.07', '4.16', '2294.45', '0.00', 10, '0.16', '14.29', '0.00', 'Disponible', '0.00'),
(25, '149', 'Modernas', 'Invitacion', '1982.72', '4.16', '1811.40', '0.00', 10, '0.16', '26.62', '0.00', 'Disponible', '0.00'),
(26, '150', 'INVITACIONES', 'Invitacion', '2010.55', '4.16', '1932.17', '0.00', 12, '0.16', '2.39', '19.58', 'Disponible', '0.00'),
(34, '18', 'Modernas', 'Invitacion', '1633.72', '9.23', '1328.36', '0.00', 11, '0.16', '7.41', '8.99', 'Disponible', '0.00'),
(35, '18E', 'Modernas', 'Invitacion', '2209.69', '9.23', '1932.17', '0.00', 11, '0.16', '7.08', '0.33', 'Disponible', '0.00'),
(36, '2', 'Modernas', 'Invitacion', '3097.39', '9.51', '3079.87', '0.00', 11, '0.16', '21.98', '0.00', 'Disponible', '0.00'),
(37, '22', 'Modernas', 'Invitacion', '1406.75', '3.88', '1086.84', '0.00', 10, '0.16', '5.27', '15.52', 'Disponible', '0.00'),
(38, '23', 'Modernas', 'Invitacion', '1648.27', '2.55', '1449.12', '0.00', 9, '0.16', '6.47', '4.20', 'Disponible', '0.00'),
(39, '24', 'Modernas', 'Invitacion', '2252.07', '9.23', '2415.21', '0.00', 13, '0.16', '11.85', '0.00', 'Disponible', '0.00'),
(42, '28', 'Modernas', 'Invitacion', '1861.96', '19.89', '1690.64', '0.00', 11, '0.16', '7.58', '0.00', 'Disponible', '0.00'),
(43, '29', '', 'Invitacion', '1285.99', '2.55', '1086.84', '0.00', 10, '0.16', '5.97', '0.00', 'Disponible', '0.00'),
(44, '3', 'Modernas', 'Invitacion', '2252.07', '4.16', '2294.45', '0.00', 10, '0.16', '15.72', '0.00', 'Disponible', '0.00'),
(46, '34', 'Modernas', 'Invitacion', '2372.83', '2.55', '2535.97', '0.00', 12, '0.16', '12.30', '0.00', 'Disponible', '0.00'),
(48, '4', 'Modernas', 'Invitacion', '1406.75', '2.55', '1086.84', '0.00', 9, '0.16', '11.12', '9.00', 'Disponible', '0.00'),
(59, '5', 'Modernas', 'Invitacion', '1834.13', '9.23', '1569.88', '0.00', 11, '0.16', '4.89', '0.00', 'Disponible', '0.00'),
(62, '55', 'Modernas', 'Invitacion', '1633.72', '9.23', '1328.36', '0.00', 11, '0.16', '8.89', '0.94', 'Disponible', '0.00'),
(63, '59', 'Modernas', 'Invitacion', '2010.55', '13.25', '1811.40', '0.00', 11, '0.16', '12.37', '0.71', 'Disponible', '0.00'),
(64, '6', 'Modernas', 'Invitacion', '2224.24', '2.55', '2173.69', '0.00', 13, '0.16', '9.65', '10.54', 'Disponible', '0.00'),
(65, '60', 'Modernas', 'Invitacion', '2451.21', '10.69', '5675.73', '0.00', 11, '0.16', '18.70', '0.00', 'Disponible', '0.00'),
(67, '7', '', 'Invitacion', '1620.44', '10.82', '1811.40', '0.00', 12, '0.16', '17.40', '0.00', 'Disponible', '0.00'),
(75, '83', '', 'Invitacion', '2372.83', '22.50', '2294.45', '0.00', 14, '0.16', '0.92', '0.00', 'Disponible', '0.00'),
(77, '85', '', 'Invitacion', '3211.78', '2.55', '2535.97', '0.00', 12, '0.16', '6.33', '0.00', 'Disponible', '0.00'),
(91, 'K', '', 'Invitacion', '2252.07', '9.51', '2294.45', '0.00', 11, '0.16', '21.46', '10.00', 'Disponible', '0.00'),
(95, 'Q', '', 'Invitacion', '2597.25', '2.55', '2173.69', '0.00', 10, '0.16', '22.02', '0.00', 'Disponible', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IDCliente` int(11) NOT NULL,
  `Nombre1` varchar(50) NOT NULL,
  `Nombre2` varchar(50) DEFAULT NULL,
  `Telefono` int(11) NOT NULL,
  `Celular1` int(11) DEFAULT NULL,
  `Celular2` int(11) DEFAULT NULL,
  `Email1` varchar(50) DEFAULT NULL,
  `FechaAlta` date DEFAULT NULL,
  `IDAgente` int(11) NOT NULL,
  `IDEmpresa` int(11) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `TipoEvento` varchar(50) DEFAULT NULL,
  `IDCuenta` int(11) DEFAULT NULL,
  `IDTienda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IDCliente`, `Nombre1`, `Nombre2`, `Telefono`, `Celular1`, `Celular2`, `Email1`, `FechaAlta`, `IDAgente`, `IDEmpresa`, `Direccion`, `TipoEvento`, `IDCuenta`, `IDTienda`) VALUES
(2, 'Pablo', NULL, 0, 35611265, NULL, 'pablo@hotmail.com', '2017-06-20', 2, 1, NULL, 'Personal', 4, 1),
(3, 'Gabriela', 'Servando', 0, 36154856, 78459516, 'gabriela@hotmail.com', '2017-06-20', 2, 1, NULL, 'Pareja', 5, NULL),
(4, 'Yahel', 'Guillermo', 0, 35611265, 78459516, 'yahel@hotmail.com', '2017-06-20', 2, 1, NULL, 'Pareja', 6, NULL),
(5, 'Ximena', NULL, 0, 268292629, NULL, 'ximena@hotmail.com', '2017-06-20', 2, 1, NULL, 'Personal', 7, NULL),
(6, 'Elizabeth', 'Fernando', 0, 36154856, NULL, 'elizabeth@hotmail.com', '2017-06-20', 2, 1, NULL, 'Pareja', 8, NULL),
(7, 'Ana', NULL, 0, 36154856, NULL, 'ana@hotmail.com', '2017-06-20', 2, 1, NULL, 'Personal', 9, NULL),
(8, 'Pepe', NULL, 0, 36154856, NULL, 'pepe@hotmail.com', '2017-06-20', 2, 2, NULL, 'Empresa', 10, NULL),
(9, 'Maria Ines', 'Gustavo', 0, 268292629, 78459516, 'ines@hotmail.com', '2017-06-20', 2, 1, NULL, 'Pareja', 11, NULL),
(10, 'Bulmaro', NULL, 0, 36154856, NULL, 'bulmaro@hotmail.com', '2017-06-20', 2, 3, NULL, 'Empresa', 12, NULL),
(11, 'Carlos', NULL, 0, 36154856, NULL, 'carlos@hotmail.com', '2017-06-20', 2, 1, NULL, 'Personal', 13, NULL),
(12, 'Francisca', 'Roberto', 0, 35611265, 78459516, 'francisca@hotmail.com', '2017-06-20', 2, 1, NULL, 'Pareja', 14, NULL),
(13, 'Luz', NULL, 0, 268292629, NULL, 'luz@hotmail.com', '2017-06-20', 2, 4, NULL, 'Empresa', 15, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `IDCotizacion` int(11) NOT NULL,
  `FechaCotizacion` date NOT NULL,
  `FechaEvento` date NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDAgente` int(11) NOT NULL,
  `CostoMod` decimal(11,2) DEFAULT '0.00',
  `CostoFinal` decimal(11,2) NOT NULL,
  `Detalles` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `IDCuenta` int(11) NOT NULL,
  `NombreCuenta` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `IDPerfiles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`IDCuenta`, `NombreCuenta`, `Contrasena`, `IDPerfiles`) VALUES
(3, 'EliasMart', '159487', 2),
(4, 'PabloPer', '15948', 3),
(5, 'GabServ', '123', 3),
(6, 'YahGui', '123', 3),
(7, 'Xime', '123', 3),
(8, 'EliFer', '123', 3),
(9, 'Annita', '123', 3),
(10, 'CrisPintor', '123', 3),
(11, 'MarGus', '123', 3),
(12, 'LuisaXerox', '123', 3),
(13, 'CarCaja', '123', 3),
(14, 'FranRob', '123', 3),
(15, 'LuLumen', '123', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `IDDescuento` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `Descuento` decimal(11,2) DEFAULT NULL,
  `Dias` int(11) DEFAULT NULL,
  `FormaPago` varchar(50) DEFAULT NULL,
  `Vigencia` int(11) DEFAULT NULL,
  `Unico` tinyint(1) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `AccesoriosGratis` tinyint(1) DEFAULT NULL,
  `Inicio` date DEFAULT NULL,
  `Final` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`IDDescuento`, `Nombre`, `Tipo`, `Descuento`, `Dias`, `FormaPago`, `Vigencia`, `Unico`, `Activo`, `AccesoriosGratis`, `Inicio`, `Final`) VALUES
(1, 'Precio de lista', 'Invitacion', '0.00', 10, 'Indistinta', 30, 1, 1, 0, NULL, NULL),
(2, 'Adelantate a la Expo', 'Invitacion', '0.40', 30, 'Indistinta', 30, 1, 1, 1, '2017-05-11', '2017-06-11'),
(3, 'Urgencia', 'Invitaciones', '0.00', 10, 'Indistinta', 30, 1, 1, 0, NULL, NULL),
(4, 'Promocion', 'Invitaciones', '0.20', 30, 'Indistinta', 30, 0, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE `elemento` (
  `IDElemento` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `IDCatElem` int(11) NOT NULL,
  `IDCatMat` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Ancho` decimal(11,2) NOT NULL,
  `Alto` decimal(11,2) NOT NULL,
  `Profundidad` decimal(11,2) DEFAULT '0.00',
  `CostoUnico` decimal(11,2) DEFAULT NULL,
  `CostoUnitario` decimal(11,2) DEFAULT NULL,
  `CostoCiento` decimal(11,2) DEFAULT NULL,
  `CostoMillar` decimal(11,2) DEFAULT NULL,
  `PrecioCompra` decimal(11,2) DEFAULT '0.00',
  `Regalo` enum('NO','SI') DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ElementosLinea`
--

CREATE TABLE `ElementosLinea` (
  `IDElementoLinea` int(11) NOT NULL,
  `IDCatProd` int(11) NOT NULL,
  `IDCatElem` int(11) NOT NULL,
  `IDCatMat` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Ancho` decimal(11,2) NOT NULL,
  `Alto` decimal(11,2) NOT NULL,
  `Profundidad` decimal(11,2) NOT NULL,
  `CostoFinal` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IDEmpresa` int(11) NOT NULL,
  `Empresa` varchar(50) NOT NULL,
  `Contacto` varchar(50) DEFAULT NULL,
  `Cargo` varchar(50) DEFAULT NULL,
  `RFC` varchar(50) DEFAULT NULL,
  `CURP` varchar(50) DEFAULT NULL,
  `Calle` varchar(50) DEFAULT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `CodigoPostal` varchar(50) DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IDEmpresa`, `Empresa`, `Contacto`, `Cargo`, `RFC`, `CURP`, `Calle`, `Ciudad`, `Estado`, `CodigoPostal`, `Colonia`) VALUES
(1, 'Vacio', 'Vacio', NULL, NULL, 'Vacio', 'Vacio', 'Vacio', 'Vacio', 'Vacio', 'Vacio'),
(2, 'Asociación Coyoacán de pintores en porcelana A.C.', 'Cristian Hernandez Cruz', 'Difusion', 'sadfsd1561', 'HECC975421', 'Hidalgo 45', 'Coyoacan', 'CDMX', '154895', 'Centro historico'),
(3, 'Xerox', 'Alma Lopez de Sanchez', NULL, NULL, 'LOSA651487', 'Colorado', 'Chalco', 'Hidalgo', '45849', 'Gaston'),
(4, 'Papeleria Lumen', 'Celia Orendain Galeazzi', NULL, NULL, 'ORGC124578', 'Torres', 'Conde', 'Veracruz', '48567', 'Zondra'),
(5, 'GENERAL MOTORS DE MÉXICO, S. DE R.L. DE C.V.', NULL, NULL, NULL, NULL, 'Av. Ejército Nacional No.843', 'Polanco', 'México D.F.', '11520', 'Granada'),
(6, 'COLOüRS México', NULL, NULL, NULL, NULL, 'Amsterdam #35', 'Condesa', 'México D.F.', '06100', 'Hipódromo'),
(7, 'Pernod Ricard México', NULL, NULL, NULL, NULL, 'Paseo de Los Tamarindos 100', 'Cuajimalpa de Morelos', 'CDMX', '05120', 'Bosques de las Lomas'),
(8, 'Fundacion Televisa A.C.', NULL, NULL, NULL, NULL, 'Avenida Vasco de Quiroga 2000', 'Álvaro Obregón', 'CDMX', '01210', 'Santa Fé'),
(9, 'Swatch Group', NULL, NULL, NULL, NULL, 'Av. Parque de Chapultepec 56', 'Naucalpan de Juárez', 'Méx.', '53398', 'El Parque'),
(10, 'Monex Grupo Financiero', NULL, NULL, NULL, NULL, 'Paseo de la Reforma 284', 'Ciudad de México', 'CDMX', '06600', 'Juárez'),
(11, 'Arterisco', '', '', '', '', 'Presa Falcon 128', 'Ciudad de México', 'CDMX', '11500', 'Irrigación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `IDMaquina` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Proceso` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`IDMaquina`, `Nombre`, `Proceso`) VALUES
(1, 'Encuadernado', 'Calandra'),
(2, 'Encuadernado', 'Cartera'),
(3, 'Encuadernado', 'Prensa'),
(4, 'Encuadernado', 'Pegado'),
(5, 'Encuadernado', 'Engumadura'),
(6, 'Grabado', 'HotStamping'),
(7, 'Grabado', 'Grabado'),
(8, 'Grabado', 'Timbradora'),
(9, 'Impresion', 'Digital'),
(10, 'Impresion', 'OffSet'),
(11, 'Impresion', 'Serigrafia'),
(12, 'Impresion', 'Laminado'),
(13, 'Individuales', 'Retractilado'),
(14, 'Individuales', 'Costura'),
(15, 'Individuales', 'Corte'),
(16, 'Individuales', 'Acabado'),
(17, 'Individuales', 'Lacre'),
(18, 'Suaje', 'Despuntadora'),
(19, 'Suaje', 'Ranuradora'),
(20, 'Suaje', 'Sacabocado'),
(21, 'Suaje', 'Medio Suaje'),
(22, 'Suaje', 'Suaje');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `IDPedido` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Revisiones` varchar(50) NOT NULL,
  `Estatus` varchar(50) NOT NULL,
  `SeguimientoPap` varchar(50) NOT NULL,
  `FechaPapeleo` date NOT NULL,
  `DiasCredito` int(11) NOT NULL,
  `FechaEntrada` date NOT NULL,
  `FechaAutorizacion` date DEFAULT NULL,
  `FechaProduccion` date DEFAULT NULL,
  `FechaDiseño` date DEFAULT NULL,
  `FechaRotulacion` date DEFAULT NULL,
  `FechaSalida` date DEFAULT NULL,
  `IDCotizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `IDPerfiles` int(11) NOT NULL,
  `Perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`IDPerfiles`, `Perfil`) VALUES
(1, 'Administrador'),
(2, 'Agente'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `IDProceso` int(11) NOT NULL,
  `IDElemento` int(11) NOT NULL,
  `IDCatPro` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT 'Ninguna',
  `CostoUnico` decimal(11,2) DEFAULT '0.00',
  `CostoUnitario` decimal(11,2) DEFAULT '0.00',
  `CostoCiento` decimal(11,2) DEFAULT '0.00',
  `CostoMillar` decimal(11,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProcesosLinea`
--

CREATE TABLE `ProcesosLinea` (
  `IDProcesosLinea` int(11) NOT NULL,
  `IDElementoLinea` int(11) NOT NULL,
  `IDCatPro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IDProducto` int(11) NOT NULL,
  `IDCotizacion` int(11) NOT NULL,
  `IDCatProd` int(11) NOT NULL,
  `IDDescuento` int(11) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `CostoUnico` decimal(11,2) DEFAULT NULL,
  `CostoUnitario` decimal(11,2) DEFAULT NULL,
  `CostoCiento` decimal(11,2) DEFAULT NULL,
  `CostoMillar` decimal(11,2) DEFAULT NULL,
  `PrecioCompra` decimal(11,2) DEFAULT NULL,
  `IVA` decimal(11,2) NOT NULL DEFAULT '0.16',
  `Descuento` int(11) NOT NULL DEFAULT '1',
  `CAjuste` decimal(11,2) DEFAULT NULL,
  `TiempoLead` int(11) DEFAULT NULL,
  `CostoFinal` decimal(11,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `IDTienda` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`IDTienda`, `Nombre`, `Direccion`) VALUES
(1, 'Altavista', 'Altavista 74, Lomas de San Ángel Inn, México, D.F.'),
(2, 'Bosques', 'Prolongación Bosques de Reforma 1321, Local A Loma'),
(3, 'Polanco', 'Presidente Masaryk 83, Polanco, México, D.F.'),
(4, 'Satélite', 'Circuito Cirujanos 9, Ciudad Satélite, Naucalpan'),
(5, 'Veracruz', 'Paseo de las Américas 400, Local 26 Plaza Santa An'),
(6, 'Liverpool Perisur', 'Periférico Sur No. 4690 Coyoacán'),
(7, 'Liverpool Puebla', 'Blvd. del Niño Poblano 2510 Concepción La Cruz 724'),
(8, 'Liverpool Satélite', 'Ciudad Satélite 53100 Naucalpan de Juárez, MEX'),
(9, 'Liverpool Santa Fe', 'Mario Pani 200 Cuajimalpa de Morelos Santa Fe, 051');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agente`
--
ALTER TABLE `agente`
  ADD PRIMARY KEY (`IDAgente`,`IDTienda`),
  ADD KEY `IDUsuario` (`IDCuenta`),
  ADD KEY `IDTienda` (`IDTienda`);

--
-- Indices de la tabla `catalogoelemento`
--
ALTER TABLE `catalogoelemento`
  ADD PRIMARY KEY (`IDCatElem`);

--
-- Indices de la tabla `catalogomaterial`
--
ALTER TABLE `catalogomaterial`
  ADD PRIMARY KEY (`IDCatMat`);

--
-- Indices de la tabla `catalogoproceso`
--
ALTER TABLE `catalogoproceso`
  ADD PRIMARY KEY (`IDCatPro`),
  ADD KEY `IDMaquina` (`IDMaquina`);

--
-- Indices de la tabla `catalogoproducto`
--
ALTER TABLE `catalogoproducto`
  ADD PRIMARY KEY (`IDCatProd`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCliente`,`IDAgente`,`IDEmpresa`),
  ADD KEY `IDAgente` (`IDAgente`),
  ADD KEY `IDEmpresa` (`IDEmpresa`),
  ADD KEY `IDUsuario` (`IDCuenta`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`IDCotizacion`),
  ADD KEY `IDAgente` (`IDAgente`),
  ADD KEY `IDCliente` (`IDCliente`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`IDCuenta`),
  ADD KEY `IDPerfiles` (`IDPerfiles`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`IDDescuento`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`IDElemento`),
  ADD KEY `IDModelo` (`IDProducto`),
  ADD KEY `ITipoElem` (`IDCatElem`),
  ADD KEY `elemento_ibfk_4` (`IDCatMat`);

--
-- Indices de la tabla `ElementosLinea`
--
ALTER TABLE `ElementosLinea`
  ADD PRIMARY KEY (`IDElementoLinea`),
  ADD KEY `IDCatProd` (`IDCatProd`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IDEmpresa`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`IDMaquina`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`IDPedido`),
  ADD KEY `IDCotizacion` (`IDCotizacion`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`IDPerfiles`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`IDProceso`),
  ADD KEY `IDMaterial` (`IDElemento`),
  ADD KEY `IDTipoSub` (`IDCatPro`);

--
-- Indices de la tabla `ProcesosLinea`
--
ALTER TABLE `ProcesosLinea`
  ADD PRIMARY KEY (`IDProcesosLinea`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `IDCotizacion` (`IDCotizacion`),
  ADD KEY `IDDescuento` (`IDDescuento`),
  ADD KEY `IDCatProd` (`IDCatProd`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`IDTienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agente`
--
ALTER TABLE `agente`
  MODIFY `IDAgente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `catalogoelemento`
--
ALTER TABLE `catalogoelemento`
  MODIFY `IDCatElem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `catalogomaterial`
--
ALTER TABLE `catalogomaterial`
  MODIFY `IDCatMat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `catalogoproceso`
--
ALTER TABLE `catalogoproceso`
  MODIFY `IDCatPro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `catalogoproducto`
--
ALTER TABLE `catalogoproducto`
  MODIFY `IDCatProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `IDCotizacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `IDCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `IDDescuento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `elemento`
--
ALTER TABLE `elemento`
  MODIFY `IDElemento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ElementosLinea`
--
ALTER TABLE `ElementosLinea`
  MODIFY `IDElementoLinea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IDEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `maquina`
--
ALTER TABLE `maquina`
  MODIFY `IDMaquina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `IDPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `IDPerfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `IDProceso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ProcesosLinea`
--
ALTER TABLE `ProcesosLinea`
  MODIFY `IDProcesosLinea` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IDProducto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `IDTienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agente`
--
ALTER TABLE `agente`
  ADD CONSTRAINT `agente_ibfk_2` FOREIGN KEY (`IDCuenta`) REFERENCES `cuenta` (`IDCuenta`),
  ADD CONSTRAINT `agente_ibfk_3` FOREIGN KEY (`IDTienda`) REFERENCES `tienda` (`IDTienda`);

--
-- Filtros para la tabla `catalogoproceso`
--
ALTER TABLE `catalogoproceso`
  ADD CONSTRAINT `catalogoproceso_ibfk_1` FOREIGN KEY (`IDMaquina`) REFERENCES `maquina` (`IDMaquina`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`IDAgente`) REFERENCES `agente` (`IDAgente`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`IDEmpresa`) REFERENCES `empresa` (`IDEmpresa`),
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`IDCuenta`) REFERENCES `cuenta` (`IDCuenta`);

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
  ADD CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`IDAgente`) REFERENCES `agente` (`IDAgente`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`IDPerfiles`) REFERENCES `perfil` (`IDPerfiles`);

--
-- Filtros para la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD CONSTRAINT `elemento_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `producto` (`IDProducto`),
  ADD CONSTRAINT `elemento_ibfk_3` FOREIGN KEY (`IDCatElem`) REFERENCES `catalogoelemento` (`IDCatElem`),
  ADD CONSTRAINT `elemento_ibfk_4` FOREIGN KEY (`IDCatMat`) REFERENCES `catalogomaterial` (`IDCatMat`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`IDCotizacion`) REFERENCES `cotizacion` (`IDCotizacion`);

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`IDElemento`) REFERENCES `elemento` (`IDElemento`),
  ADD CONSTRAINT `proceso_ibfk_2` FOREIGN KEY (`IDCatPro`) REFERENCES `catalogoproceso` (`IDCatPro`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IDCotizacion`) REFERENCES `cotizacion` (`IDCotizacion`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`IDDescuento`) REFERENCES `descuentos` (`IDDescuento`),
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`IDCatProd`) REFERENCES `catalogoproducto` (`IDCatProd`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
