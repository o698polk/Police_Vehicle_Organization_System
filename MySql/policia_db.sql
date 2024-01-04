-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2023 a las 03:33:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `policia_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circuitos`
--

CREATE TABLE `circuitos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_circuito` varchar(255) NOT NULL,
  `codigo_circuito` varchar(255) NOT NULL,
  `numero_circuito` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_contrato` varchar(255) NOT NULL,
  `detalle_contrato` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependecias`
--

CREATE TABLE `dependecias` (
  `id` int(10) UNSIGNED NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `parroquia` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_distrito` int(10) UNSIGNED NOT NULL,
  `id_circuito` int(10) UNSIGNED NOT NULL,
  `id_subcircuito` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_distrito` varchar(255) NOT NULL,
  `codigo_distrito` varchar(255) NOT NULL,
  `numero_distrito` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimientos_preventivos`
--

CREATE TABLE `mantenimientos_preventivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `detalles_mantenimiento` varchar(255) NOT NULL,
  `id_solicitud_mantenimientos` int(10) UNSIGNED NOT NULL,
  `id_vehiculos` int(10) UNSIGNED NOT NULL,
  `id_repuestos` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2023_06_10_224805_create_usuarios_table', 1),
(22, '2023_06_10_225701_create_distritos_table', 1),
(23, '2023_06_10_231447_create_circuitos_table', 1),
(24, '2023_06_10_232613_create_subcircuitos_table', 1),
(25, '2023_06_10_233532_create_repuestos_table', 1),
(26, '2023_06_10_235044_create_contratos_table', 1),
(27, '2023_06_10_235605_create_dependecias_table', 1),
(28, '2023_06_11_000653_create_personals_table', 1),
(29, '2023_06_11_002759_create_vehiculos_table', 2),
(30, '2023_06_11_004326_create_vehiculos_subcircuitos_table', 3),
(31, '2023_06_11_010210_create_personal_subcircuitos_table', 3),
(32, '2023_06_11_011451_create_salicitud_mantenimiento_table', 4),
(33, '2023_06_11_012204_create_solicitud_mantenimientos_table', 5),
(34, '2023_06_11_012355_create_mantenimientos_preventivos_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personals`
--

CREATE TABLE `personals` (
  `id` int(10) UNSIGNED NOT NULL,
  `identificacion` varchar(255) NOT NULL,
  `nombre_apellido` varchar(255) NOT NULL,
  `fecha_nacimiento` varchar(255) NOT NULL,
  `ciudad_nacimiento` varchar(255) NOT NULL,
  `numero_telefono` varchar(255) NOT NULL,
  `rango_policial` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_dependecia` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_subcircuitos`
--

CREATE TABLE `personal_subcircuitos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_personals` int(10) UNSIGNED NOT NULL,
  `id_subcircuito` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id` int(10) UNSIGNED NOT NULL,
  `detalles` varchar(255) NOT NULL,
  `unidad` int(11) NOT NULL,
  `precio` double(8,2) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_mantenimientos`
--

CREATE TABLE `solicitud_mantenimientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `persona_solicitante` varchar(255) NOT NULL,
  `detalle_solicitud` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcircuitos`
--

CREATE TABLE `subcircuitos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_subcircuito` varchar(255) NOT NULL,
  `codigo_subcircuito` varchar(255) NOT NULL,
  `numero_subcircuito` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_vehiculo` varchar(255) NOT NULL,
  `placa` varchar(255) NOT NULL,
  `chasis` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `motor` varchar(255) NOT NULL,
  `kilometraje` varchar(255) NOT NULL,
  `cilindraje` varchar(255) NOT NULL,
  `capacidad_carga` varchar(255) NOT NULL,
  `capacidad_pasajeros` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos_subcircuitos`
--

CREATE TABLE `vehiculos_subcircuitos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_vehiculo` int(10) UNSIGNED NOT NULL,
  `id_subcircuito` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `circuitos`
--
ALTER TABLE `circuitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `circuitos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `dependecias`
--
ALTER TABLE `dependecias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependecias_id_usuario_foreign` (`id_usuario`),
  ADD KEY `dependecias_id_distrito_foreign` (`id_distrito`),
  ADD KEY `dependecias_id_circuito_foreign` (`id_circuito`),
  ADD KEY `dependecias_id_subcircuito_foreign` (`id_subcircuito`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distritos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mantenimientos_preventivos_id_solicitud_mantenimientos_foreign` (`id_solicitud_mantenimientos`),
  ADD KEY `mantenimientos_preventivos_id_vehiculos_foreign` (`id_vehiculos`),
  ADD KEY `mantenimientos_preventivos_id_repuestos_foreign` (`id_repuestos`),
  ADD KEY `mantenimientos_preventivos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personals_id_usuario_foreign` (`id_usuario`),
  ADD KEY `personals_id_dependecia_foreign` (`id_dependecia`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `personal_subcircuitos`
--
ALTER TABLE `personal_subcircuitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_subcircuitos_id_personals_foreign` (`id_personals`),
  ADD KEY `personal_subcircuitos_id_subcircuito_foreign` (`id_subcircuito`),
  ADD KEY `personal_subcircuitos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repuestos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `solicitud_mantenimientos`
--
ALTER TABLE `solicitud_mantenimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud_mantenimientos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `subcircuitos`
--
ALTER TABLE `subcircuitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcircuitos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `vehiculos_subcircuitos`
--
ALTER TABLE `vehiculos_subcircuitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculos_subcircuitos_id_vehiculo_foreign` (`id_vehiculo`),
  ADD KEY `vehiculos_subcircuitos_id_subcircuito_foreign` (`id_subcircuito`),
  ADD KEY `vehiculos_subcircuitos_id_usuario_foreign` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `circuitos`
--
ALTER TABLE `circuitos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dependecias`
--
ALTER TABLE `dependecias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `personals`
--
ALTER TABLE `personals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_subcircuitos`
--
ALTER TABLE `personal_subcircuitos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_mantenimientos`
--
ALTER TABLE `solicitud_mantenimientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcircuitos`
--
ALTER TABLE `subcircuitos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos_subcircuitos`
--
ALTER TABLE `vehiculos_subcircuitos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `circuitos`
--
ALTER TABLE `circuitos`
  ADD CONSTRAINT `circuitos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `dependecias`
--
ALTER TABLE `dependecias`
  ADD CONSTRAINT `dependecias_id_circuito_foreign` FOREIGN KEY (`id_circuito`) REFERENCES `circuitos` (`id`),
  ADD CONSTRAINT `dependecias_id_distrito_foreign` FOREIGN KEY (`id_distrito`) REFERENCES `distritos` (`id`),
  ADD CONSTRAINT `dependecias_id_subcircuito_foreign` FOREIGN KEY (`id_subcircuito`) REFERENCES `subcircuitos` (`id`),
  ADD CONSTRAINT `dependecias_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `distritos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `mantenimientos_preventivos`
--
ALTER TABLE `mantenimientos_preventivos`
  ADD CONSTRAINT `mantenimientos_preventivos_id_repuestos_foreign` FOREIGN KEY (`id_repuestos`) REFERENCES `repuestos` (`id`),
  ADD CONSTRAINT `mantenimientos_preventivos_id_solicitud_mantenimientos_foreign` FOREIGN KEY (`id_solicitud_mantenimientos`) REFERENCES `solicitud_mantenimientos` (`id`),
  ADD CONSTRAINT `mantenimientos_preventivos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `mantenimientos_preventivos_id_vehiculos_foreign` FOREIGN KEY (`id_vehiculos`) REFERENCES `vehiculos` (`id`);

--
-- Filtros para la tabla `personals`
--
ALTER TABLE `personals`
  ADD CONSTRAINT `personals_id_dependecia_foreign` FOREIGN KEY (`id_dependecia`) REFERENCES `dependecias` (`id`),
  ADD CONSTRAINT `personals_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `personal_subcircuitos`
--
ALTER TABLE `personal_subcircuitos`
  ADD CONSTRAINT `personal_subcircuitos_id_personals_foreign` FOREIGN KEY (`id_personals`) REFERENCES `personals` (`id`),
  ADD CONSTRAINT `personal_subcircuitos_id_subcircuito_foreign` FOREIGN KEY (`id_subcircuito`) REFERENCES `subcircuitos` (`id`),
  ADD CONSTRAINT `personal_subcircuitos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `solicitud_mantenimientos`
--
ALTER TABLE `solicitud_mantenimientos`
  ADD CONSTRAINT `solicitud_mantenimientos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `subcircuitos`
--
ALTER TABLE `subcircuitos`
  ADD CONSTRAINT `subcircuitos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `vehiculos_subcircuitos`
--
ALTER TABLE `vehiculos_subcircuitos`
  ADD CONSTRAINT `vehiculos_subcircuitos_id_subcircuito_foreign` FOREIGN KEY (`id_subcircuito`) REFERENCES `subcircuitos` (`id`),
  ADD CONSTRAINT `vehiculos_subcircuitos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `vehiculos_subcircuitos_id_vehiculo_foreign` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
