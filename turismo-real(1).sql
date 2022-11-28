-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-11-2022 a las 23:08:45
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turismo-real`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargas`
--

CREATE TABLE `cargas` (
  `id` int(11) NOT NULL,
  `rut_cliente` varchar(15) NOT NULL,
  `cod_servicio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `codigo_departamento` varchar(15) NOT NULL,
  `nombre_departamento` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `comuna` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `cantidad_habitaciones` int(11) NOT NULL,
  `cantidad_banos` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `costo_base` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`codigo_departamento`, `nombre_departamento`, `direccion`, `comuna`, `region`, `numero`, `cantidad_habitaciones`, `cantidad_banos`, `estado`, `usuario`, `costo_base`) VALUES
('10', 'GIRASOL', 'ALTO HOSPICIO', 'Alto Hospicio', 'Tarapacá', 7666, 1, 1, 'DISPONIBLE', 'alvaroxdzy3@gmail.com', 37000),
('11', NULL, 'DSADA', 'Illapel', 'Coquimbo', 999, 1, 1, 'NO DISPONIBLE', 'alvaroxdzy3@gmail.com', 85000),
('12', 'VALEICONOS', 'AGUSTIN ABARCA #3526', 'LO ESPEJO', 'REGIÓN METROPOLITANA DE SANTIAGO', 331, 1, 1, 'DISPONIBLE', 'alvaroxdzy3@gmail.com', 30000),
('13', 'VALEICONOS', 'AV.COSTANERA 373', 'Doñihue', 'Región del Libertador Gral. Bernardo O’Higgins', 112, 1, 1, 'DISPONIBLE', 'alvaroxdzy3@gmail.com', 12500),
('7', NULL, 'A', 'María Elena', 'Antofagasta', 1, 1, 1, 'NO DISPONIBLE', 'alvaroxdzy3@gmail.com', 25000),
('8', 'ALVAROIDES', 'aaa', 'Valparaíso', 'Valparaíso', 333, 1, 1, 'DISPONIBLE', 'alvaroxdzy3@gmail.com', 35000),
('9', NULL, 'F', 'Cartagena', 'Valparaíso', 334, 1, 1, 'DISPONIBLE', 'alvaroxdzy3@gmail.com', 45000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios`
--

CREATE TABLE `folios` (
  `tipo` varchar(2) NOT NULL,
  `folio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `folios`
--

INSERT INTO `folios` (`tipo`, `folio`) VALUES
('D', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `cod_inventario_producto` int(11) NOT NULL,
  `imagen` int(11) NOT NULL,
  `cod_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_departamento`
--

CREATE TABLE `inventario_departamento` (
  `id` int(11) NOT NULL,
  `cod_departamento` varchar(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `detalles` varchar(40) DEFAULT ' ',
  `cantidad` int(11) NOT NULL,
  `valoracion` varchar(30) DEFAULT '0',
  `total` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_departamento`
--

INSERT INTO `inventario_departamento` (`id`, `cod_departamento`, `nombre`, `detalles`, `cantidad`, `valoracion`, `total`) VALUES
(19, '7', 'a', 'a', 1, '1', 1),
(22, '8', 'a', 'a', 1, '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenciones`
--

CREATE TABLE `mantenciones` (
  `id` int(11) NOT NULL,
  `cod_departamento` varchar(25) NOT NULL,
  `fecha` date NOT NULL,
  `encargado` varchar(50) NOT NULL,
  `observaciones` varchar(1000) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mantenciones`
--

INSERT INTO `mantenciones` (`id`, `cod_departamento`, `fecha`, `encargado`, `observaciones`, `usuario`) VALUES
(1, '7', '2022-11-21', 'A', 'A', 'alvaroxdzy3@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 10, 'API TOKEN', 'f42c8c16e6709e562cb689f7bf2292924bbaf6ddef6baa7360d253a0b562cf5c', '[\"*\"]', NULL, '2022-10-20 21:21:30', '2022-10-20 21:21:30'),
(2, 'App\\Models\\User', 13, 'API TOKEN', '26f33d6b0dd2f9aedd2b93f4770183c82bc9276dbcc4b1cea4e36fd55540938c', '[\"*\"]', NULL, '2022-10-20 22:44:10', '2022-10-20 22:44:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `rut` varchar(15) NOT NULL,
  `cod_departamento` varchar(25) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `costo_base` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fecha_creacion`, `rut`, `cod_departamento`, `fecha_desde`, `fecha_hasta`, `costo_base`, `estado`) VALUES
(23, '2022-11-26', '19670727-1', '10', '2023-02-01', '2023-02-04', 111000, NULL),
(24, '2022-11-26', '19670727-1', '8', '2023-01-01', '2023-01-31', 1050000, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `disponibilidad` varchar(50) NOT NULL,
  `detalles` varchar(50) NOT NULL,
  `precio` int(20) DEFAULT NULL,
  `function` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre_servicio`, `disponibilidad`, `detalles`, `precio`, `function`) VALUES
(1, 'MASAJES', 'DISPONIBLE', 'MASAJE ESPALDA', 25000, 'MASAJES'),
(2, 'DESAYUNO', 'DISPONIBLE', 'TRADICIONAL', 15000, 'DESAYUNO'),
(3, 'LIMPIEZA HABITACION', 'DISPONIBLE', 'LIMPIEZA COMPLETA', 35000, 'LIMPIEZA_HABITACION'),
(4, 'CAMBIO DE MUEBLES', 'DISPONIBLE', 'MUEBLE EN MAL ESTADO DEBE SER RETIRADO', 0, 'CAMBIO_DE_MUEBLES'),
(5, 'REVISION DE BAÑO', 'DISPONIBLE', 'PROBLEMAS CON CALEFONT', 0, 'REVISION_DE_BAÑO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios-solicitados`
--

CREATE TABLE `servicios-solicitados` (
  `id` int(11) NOT NULL,
  `cod_servicio` int(11) NOT NULL,
  `cod_reserva` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios-solicitados`
--

INSERT INTO `servicios-solicitados` (`id`, `cod_servicio`, `cod_reserva`, `fecha`, `costo`) VALUES
(1, 1, 23, '2022-11-26', 25000),
(2, 4, 24, '2022-11-26', 0),
(3, 2, 24, '2022-11-26', 15000),
(4, 3, 24, '2022-11-26', 35000),
(5, 1, 24, '2022-11-26', 25000),
(6, 5, 24, '2022-11-26', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `comuna` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rut`, `nombres`, `apellidos`, `fecha_nacimiento`, `comuna`, `region`, `direccion`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '19670727-1', 'alvaro antonio', 'rojas osorio', '1997-06-17', 'pedro aguirre cerda', 'región metropolitana', 'agustin abarca #3526', 935071701, 'alvaroxdzy3@gmail.com', NULL, '$2y$10$T9iu1GjMLG7oWo1.gTcWQefxA3IiK6G8Rr8Zv1PvakdfzQ/r1LjHW', 'RUPcOloH2zrVMt413U4AQwDzNkKAxdERPFh7EUORNZ7MzL4ZXEs1iG5vYXVa', '2022-09-20 19:26:01', '2022-09-20 19:26:01'),
(15, '184064480-0', 'agustin emanuel', 'guerra llanos', '1992-11-03', 'San Joaquín', 'Región Metropolitana de Santiago', 'francisca de rimini', 990558253, 'aguerrallanos@gmail.com', NULL, '$2y$10$kbd3TwqYww6Rm93ZR6Q56u78FzCQdHnoUabkLbsErMIhd43YzZM2G', NULL, '2022-10-22 17:29:23', '2022-10-22 17:29:23'),
(16, '19775887-2', 'Guillermo Andres', 'Ceron Quijada', '1998-10-01', 'Recoleta', 'Región Metropolitana de Santiago', 'Almirante Gomez Carreño 4109', 931149233, 'guilleceron@outlook.es', NULL, '$2y$10$j0LODsRvvkrfRLgFNLWIXu0hWlKt8TFfywSJgpE7KH1XtE4w1u9XG', NULL, '2022-10-22 17:33:04', '2022-10-22 17:33:04'),
(17, '12235032-0', 'antonio alvaro', 'rojas guerra', '1998-06-12', 'Peñaflor', 'Región Metropolitana de Santiago', 'santiago', 99166062, 'alv.rojaso@duocuc.cl', NULL, '$2y$10$dlS2sv3b3ed5/Gle8TaErugMonxgH7rK.wgurKBjMbr2qIVXapNT.', NULL, '2022-10-22 17:48:23', '2022-10-22 17:48:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`codigo_departamento`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `folios`
--
ALTER TABLE `folios`
  ADD PRIMARY KEY (`folio`,`tipo`);

--
-- Indices de la tabla `inventario_departamento`
--
ALTER TABLE `inventario_departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios-solicitados`
--
ALTER TABLE `servicios-solicitados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_rut_unique` (`rut`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_departamento`
--
ALTER TABLE `inventario_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios-solicitados`
--
ALTER TABLE `servicios-solicitados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
