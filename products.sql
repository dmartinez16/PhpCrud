-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 20-04-2024 a las 04:59:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `products`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CrearProducto` (IN `p_code` VARCHAR(255), IN `p_name` VARCHAR(255), IN `p_price` DECIMAL(10,2), IN `p_createdAt` TIMESTAMP, IN `p_updatedAt` TIMESTAMP, IN `p_fk_category` INT)   BEGIN
    INSERT INTO products.product (code, name, price, createdAt, updatedAt, fk_category) 
    VALUES (p_code, p_name, p_price, p_createdAt, p_updatedAt, p_fk_category);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EditarProducto` (IN `p_IdProduct` INT, IN `p_code` VARCHAR(255), IN `p_name` VARCHAR(255), IN `p_price` DECIMAL(10,2), IN `p_updatedAt` TIMESTAMP, IN `p_fk_category` INT)   BEGIN
    UPDATE products.product 
    SET 
        code = p_code,
        name = p_name,
        price = p_price,
        updatedAt = p_updatedAt,
        fk_category = p_fk_category
    WHERE 
        IdProduct = p_IdProduct;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarProducto` (IN `p_IdProduct` INT)   BEGIN
    DELETE FROM products.product 
    WHERE 
        IdProduct = p_IdProduct;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListarProductos` ()   BEGIN
    SELECT 
        code,
        name,
        price,
        createdAt,
        updatedAt,
        fk_category
    FROM 
        products.product;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `IdProduct` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `fk_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD KEY `idx_idCategory` (`idCategory`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`IdProduct`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `idcategory_idx` (`fk_category`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FkCategory` FOREIGN KEY (`fk_category`) REFERENCES `category` (`idCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
