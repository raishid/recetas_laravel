-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2021 a las 05:40:46
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recetas_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_recetas`
--

CREATE TABLE `categoria_recetas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_recetas`
--

INSERT INTO `categoria_recetas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Comida Mexicana', '2021-02-12 05:40:23', '2021-02-12 05:40:23'),
(2, 'Comida Italiana', '2021-02-12 05:40:23', '2021-02-12 05:40:23'),
(3, 'Postres', '2021-02-12 05:40:23', '2021-02-12 05:40:23'),
(4, 'Comida Argentina', '2021-02-12 05:40:23', '2021-02-12 05:40:23'),
(5, 'Cortes', '2021-02-12 05:40:23', '2021-02-12 05:40:23'),
(6, 'Comida Venezolana', '2021-02-12 05:40:23', '2021-02-12 05:40:23'),
(7, 'Ensaladas', '2021-02-12 05:40:24', '2021-02-12 05:40:24'),
(8, 'Desayunos', '2021-02-12 05:40:24', '2021-02-12 05:40:24');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2021_02_08_192558_create_recetas_table', 1),
(13, '2021_02_11_165436_create_perfils_table', 1);

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
-- Estructura de tabla para la tabla `perfils`
--

CREATE TABLE `perfils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `biografia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfils`
--

INSERT INTO `perfils` (`id`, `user_id`, `biografia`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 1, '<div>mi bio</div>', 'upload-perfiles/EqVzOxQe49vaHvqrtnyDnxCWYYw5bzEedfTNIpdk.jpg', '2021-02-12 05:40:24', '2021-02-12 07:53:20'),
(2, 2, NULL, NULL, '2021-02-12 05:40:24', '2021-02-12 05:40:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredientes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preparacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `titulo`, `ingredientes`, `preparacion`, `imagen`, `user_id`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, 'Perros calientes', '<div>afasfas</div>', '<div>afafas</div>', 'upload-recetas/mFBeWZzzewC8XWZmqZwMIdhVR8ClBZhMlNRLqqbT.jpg', 1, 6, '2021-02-12 07:52:33', '2021-02-12 07:52:33'),
(2, 'Ensalada cesar', '<div>asfasfafafafafafafafafa</div>', '<div>afaffsfafasfasfsafafafafasa</div>', 'upload-recetas/iFuLLcw4lp97eAHFdx0ePV7uf68jfjjF9VCVjQgK.jpg', 1, 7, '2021-02-12 08:36:49', '2021-02-12 08:36:49'),
(3, 'Torta tres leches', '<div>gqgsgagasfagsaasfasfasfafafasfasf</div>', '<div>afsafsafsafasfaasfasfasfasfa</div>', 'upload-recetas/iVWZ5TEA8zY4x0XZpK1xyASE4Y9kgwV99NTbPqfL.jpg', 1, 3, '2021-02-12 08:37:24', '2021-02-12 08:37:24'),
(4, 'Pizza italiana', '<div>safasfafasfafafasfafafafafas</div>', '<div>asfasfasfaasfasafsafasffas</div>', 'upload-recetas/hpiIotW3Sluwg5dcaJvKN2dZjhzUmZkCNUfyZPT5.jpg', 2, 2, '2021-02-12 08:39:06', '2021-02-12 08:39:06'),
(5, 'pasa a la bolognesa', '<div><strong>asfafasfaasfsafafasffas</strong></div>', '<div>safasfasfafafasfsafafasfafaa</div>', 'upload-recetas/2rDMp8zijz7tqQY5qddpnJwNcE6gX4pLKJd4w6IE.jpg', 2, 2, '2021-02-12 08:39:51', '2021-02-12 08:39:51'),
(6, 'brownie', '<div>afasfasfafsafafasfafasfafsa</div>', '<div>afasfasfsafafafafafa</div>', 'upload-recetas/csoTJ9YMBsiDt3ge5eKCPTIIJMfKKQC6ejSM1Ko5.jpg', 2, 3, '2021-02-12 08:40:32', '2021-02-12 08:40:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `url`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'federico', 'federicoelbroder@gmail.com', NULL, '$2y$10$HuZrVOUqF/UrSCrHGO.1uep3Elx1x/rOyKqyqvyvRCRuS2IBnbTfS', 'http://federico.com', NULL, '2021-02-12 05:40:24', '2021-02-12 05:40:24'),
(2, 'federico2', 'federico2@gmail.com', NULL, '$2y$10$rXYdWcE5mL/hBqX5Iz7OzOvPEZyZl3iNBZCgD.3IlVGj4riDWemCu', 'http://federico2.com', NULL, '2021-02-12 05:40:24', '2021-02-12 05:40:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_recetas`
--
ALTER TABLE `categoria_recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `perfils`
--
ALTER TABLE `perfils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfils_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recetas_user_id_foreign` (`user_id`),
  ADD KEY `recetas_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_recetas`
--
ALTER TABLE `categoria_recetas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perfils`
--
ALTER TABLE `perfils`
  ADD CONSTRAINT `perfils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_recetas` (`id`),
  ADD CONSTRAINT `recetas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
