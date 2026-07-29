-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         12.2.2-MariaDB - MariaDB Server
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.14.0.7165
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para grupo21
CREATE DATABASE IF NOT EXISTS `grupo21` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `grupo21`;

-- Volcando estructura para tabla grupo21.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.cache: ~0 rows (aproximadamente)

-- Volcando estructura para tabla grupo21.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla grupo21.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.categorias: ~10 rows (aproximadamente)
INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Velas', 'Velas Aromáticas', '2026-06-15 23:49:18', '2026-06-15 23:49:20'),
	(2, 'Sahumerios', 'Sahumerios Intencionados', '2026-06-15 23:50:19', '2026-06-15 23:50:21'),
	(3, 'Hornitos', 'Hornitos para Aceites', '2026-06-15 23:51:07', '2026-06-15 23:51:08'),
	(4, 'Tarot', 'Cartas Tarot', '2026-06-15 23:51:09', '2026-06-15 23:51:10'),
	(5, 'Oráculo', 'Oráculos', '2026-06-15 23:51:23', '2026-06-15 23:51:24'),
	(6, 'Cristales', 'Cristales', '2026-06-15 23:51:46', '2026-06-15 23:51:47'),
	(7, 'Aceites', 'Aceites Esenciales', '2026-06-15 23:52:21', '2026-06-15 23:52:24'),
	(8, 'Kits', 'Kits', '2026-06-15 23:53:38', '2026-06-15 23:53:39'),
	(9, 'Budas', 'Budas', '2026-06-15 23:55:47', '2026-06-15 23:55:48'),
	(10, 'Sahumadores', 'Sahumadores', '2026-06-15 23:56:59', '2026-06-15 23:57:00');

-- Volcando estructura para tabla grupo21.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla grupo21.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla grupo21.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla grupo21.mensajes
CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  `respuesta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.mensajes: ~3 rows (aproximadamente)
INSERT INTO `mensajes` (`id`, `nombre`, `email`, `asunto`, `mensaje`, `leido`, `respuesta`, `created_at`, `updated_at`) VALUES
	(1, 'Sirley Krynski', 'sirleykrynski1@gmail.com', 'Consulta desde la web', 'hola, me interesa ser revendedor, me darian más informacion?\n\n--- \nTeléfono de contacto: 3782501008', 1, NULL, '2026-06-18 02:18:22', '2026-06-25 22:47:20'),
	(2, 'Laureano Moncada', 'daniledesma542@gmail.com', 'Consulta desde la web', 'hola, estoy interesada en formar parte del grupo de whatsAap de su comunidad, podrias indicarme como ingresar?\n\n--- \nTeléfono de contacto: +543794687811', 0, NULL, '2026-06-25 22:28:40', '2026-06-25 22:28:40'),
	(3, 'Laureano Moncada', 'laureanomm2004@gmail.com', 'Consulta desde la web', 'hola, estoy interesada en formar parte del grupo de whatsAap de su comunidad, podrias indicarme como ingresar?\n\n---\nTeléfono de contacto: +543794687811', 1, 'Hola, nos estaremos comunicando por whatsAap', '2026-06-25 22:36:18', '2026-06-25 22:52:38');

-- Volcando estructura para tabla grupo21.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.migrations: ~13 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_05_15_195611_create_productos_table', 1),
	(5, '2026_05_27_190956_create_roles_table', 1),
	(6, '2026_06_03_182806_create_ventas_cabecera_table', 2),
	(7, '2026_06_03_182945_create_ventas_detalle_table', 2),
	(8, '2026_06_08_001054_add_rol_id_to_usuarios_table', 2),
	(9, '2026_06_13_231708_add_imagen_to_productos_table', 3),
	(10, '2026_06_15_232615_create_categorias_table', 4),
	(11, '2026_06_15_232656_add_categoria_id_to_productos_table', 4),
	(12, '2026_06_17_215858_create_mensajes_table', 5),
	(13, '2026_06_25_203355_add_deleted_at_to_usuarios_table', 6);

-- Volcando estructura para tabla grupo21.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla grupo21.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) unsigned DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(8,2) NOT NULL,
  `stock` int(10) unsigned NOT NULL DEFAULT 0,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.productos: ~20 rows (aproximadamente)
INSERT INTO `productos` (`id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 1, 'Vela de Eucalipto', 'Refugio natural. Notas botánicas de eucalipto y cedro en un diseño clásico ámbar.', 14900.00, 0, 'img/fotos-productos/1781395637_velaEucalipto.jpg', '2026-06-14 03:07:17', '2026-06-17 22:01:25', NULL),
	(3, 1, 'Vela de Canela', 'Calidez botánica. Vela especiada con notas de naranja, canela y anís estrellado. Hecha a mano.', 16700.00, 0, 'img/fotos-productos/1781475826_velaCanela.jpg', '2026-06-15 01:23:46', '2026-06-17 21:43:19', NULL),
	(4, 4, 'Tarot Rider', 'El clásico indiscutido. Tarot Rider-Waite. Simbología vintage y la mejor puerta de entrada al tarot.', 11200.00, 7, 'img/fotos-productos/1781475918_tarotRider.jpg', '2026-06-15 01:25:18', '2026-06-25 21:48:24', NULL),
	(5, 6, 'Serpentina', 'Energía y arraigo. Piedra Serpentina natural. Tu aliada para desbloquear, sanar y volver a tu centro.', 6000.00, 1, 'img/fotos-productos/1781475980_serpentina.jpg', '2026-06-15 01:26:20', '2026-06-15 01:26:20', NULL),
	(6, 2, 'Sahumerio Rosas y Olibano', 'Armonía y limpieza por Sagrada Madre. El equilibrio perfecto para purificar y endulzar la energía.', 4800.00, 7, 'img/fotos-productos/1781476081_sahumerioRosasYOlibano.jpg', '2026-06-15 01:28:01', '2026-06-18 03:56:27', NULL),
	(7, 2, 'Palo Santo y Rosas', 'Limpieza dulce. Sahumerio artesanal. Humo sagrado para purificar tu espacio y abrir el corazón.', 3700.00, 9, 'img/fotos-productos/1781476155_sahumerioPaloSantoRosas.jpg', '2026-06-15 01:29:15', '2026-06-17 21:57:57', NULL),
	(8, 2, 'Palo Santo y Fresias', 'Frescura y renovación. Humo sagrado por Sagrada Madre para limpiar tu espacio y levantar la energía.', 5400.00, 2, 'img/fotos-productos/1781476219_sahumerioPaloSantoFresias.jpg', '2026-06-15 01:30:19', '2026-06-18 04:22:18', NULL),
	(9, 8, 'Kit Aura Suave', 'Equilibra tu energía. Kit con productos para crear un ambiente armonioso y revitalizante.', 29000.00, 0, 'img/fotos-productos/1781476265_kitAuraSuave.png', '2026-06-15 01:31:05', '2026-06-17 21:47:05', NULL),
	(10, 8, 'Kit Arcilla', 'Pausa terrenal. Kit de limpieza energética con piezas de arcilla, salvia y palo santo.', 31000.00, 0, 'img/fotos-productos/1781476310_kitArcilla.jpg', '2026-06-15 01:31:50', '2026-06-18 03:56:27', NULL),
	(11, 6, 'Piedra Jaspe', 'Piedra de la tierra. Poderosa para la limpieza energética y el equilibrio. Ideal para rituales.', 2700.00, 6, 'img/fotos-productos/1781476384_jaspe.jpg', '2026-06-15 01:33:04', '2026-06-15 01:33:04', NULL),
	(12, 6, 'Cuarzo Aura Angel', 'Luz y suavidad lunar. Cristales opalescentes pulidos para conectar con tu intuición y calma.', 2400.00, 3, 'img/fotos-productos/1781476439_cuarzoAuraAngel.jpg', '2026-06-15 01:33:59', '2026-06-18 04:22:18', NULL),
	(13, 6, 'Amatista', 'Piedra transmutadora. Poderosa para la limpieza energética y el equilibrio. Ideal para meditar.', 3100.00, 0, 'img/fotos-productos/1781476478_amatista.jpg', '2026-06-15 01:34:38', '2026-06-17 22:05:58', NULL),
	(14, 7, 'Aceite de Rosas', 'Aceite esencial de rosas para hidratación y rejuvenecimiento. Ideal para rutinas de cuidado personal.', 2860.00, 7, 'img/fotos-productos/1781476565_aceiteRosas.jpg', '2026-06-15 01:36:05', '2026-06-25 22:27:06', NULL),
	(15, 7, 'Aceite de Naranja', 'Alegría cítrica. Aceite esencial puro de naranja dulce. Vitalidad, frescura y energía positiva en cada gota.', 3000.00, 10, 'img/fotos-productos/1781476601_aceiteNaranja.jpg', '2026-06-15 01:36:41', '2026-06-15 01:36:41', NULL),
	(16, 5, 'Oráculo de Intuición', 'Inspiración diaria. Oráculo de bolsillo con mensajes claros y arte vibrante para despertar tu intuición.', 12500.00, 3, 'img/fotos-productos/1781476691_oraculoDeLaIntuicion.jpg', '2026-06-15 01:38:11', '2026-06-15 01:38:11', NULL),
	(17, 5, 'Oraculo de las Diosas', 'Poder femenino. Oráculo de bolsillo con símbolos sagrados y mensajes inspiradores para guiar tu camino.', 15000.00, 3, 'img/fotos-productos/1781476738_oraculoDDiosas.jpg', '2026-06-15 01:38:58', '2026-06-15 01:38:58', NULL),
	(18, 7, 'Aceite de Manzanilla', 'Calma y confort. Aceite esencial puro de manzanilla para aliviar el estrés y promover el sueño profundo.', 2000.00, 2, 'img/fotos-productos/1781476787_aceiteManzanilla.jpg', '2026-06-15 01:39:47', '2026-06-25 22:27:06', NULL),
	(19, 10, 'Sahumador', 'Purificación y equilibrio. Sahumador de calidad para crear un ambiente espiritual armonioso.', 4300.00, 14, 'img/fotos-productos/1781476851_sahumador.jpg', '2026-06-15 01:40:51', '2026-06-18 03:56:27', NULL),
	(20, 9, 'Buda Estatua', 'Inspiración y paz. Budas de cerámica para cultivar la meditación y la serenidad.', 12400.00, 2, 'img/fotos-productos/1781476887_budasEstatuas.jpg', '2026-06-15 01:41:27', '2026-06-15 01:41:27', NULL),
	(21, 3, 'Hornito Nube', 'Calidad y estilo. Hornito de diseño moderno para disfrutar de tu aroma favorito.', 7800.00, 10, 'img/fotos-productos/1781476930_hornitoNube.jpg', '2026-06-15 01:42:10', '2026-06-15 01:42:10', NULL);

-- Volcando estructura para tabla grupo21.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.roles: ~2 rows (aproximadamente)
INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 'Administrador del sistema', '2026-06-05 22:14:47', '2026-06-05 22:14:47', NULL),
	(2, 'cliente', 'Cliente del ecommerce', '2026-06-05 22:14:47', '2026-06-05 22:14:47', NULL);

-- Volcando estructura para tabla grupo21.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.sessions: ~6 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('3hEAS35OYAyhSlBg0AUTt4fOe2w301DD1RFBMKI6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ1ZFpwUWFMWEJGNDZRcjZRQUJXTlBLQTFxaW5rb25tckxzVVdlUFdmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjEudGVzdFwvcHJvZHVjdG9zP2NhdGVnb3JpYT00Iiwicm91dGUiOiJwcm9kdWN0b3MuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1785323790),
	('bBZIr57UhaQm9O4536HzunQwP6eKpN4eCrLfajZT', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJyT2ZpeDdxbjFaM3R6Tk1IWXlRajdJaWY4WjZ3akVUWWExOFdDN2VvIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZ3J1cG8yMS50ZXN0XC9hZG1pblwvcGVkaWRvcz9jbGllbnRlPSZlc3RhZG89cGVuZGllbnRlX3BhZ28mZmVjaGE9Iiwicm91dGUiOiJhZG1pbi5wZWRpZG9zIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1782431202),
	('T3IUAyZkBGZRaDZjpjHQCBLijKMFGzQNHO4OrhTV', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ1bVl3RENpeTl0MjJnbWc3UlhkSTBOMzR6VlpWVHhKOHhJUGRFekNOIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjEudGVzdCIsInJvdXRlIjpudWxsfSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6Mn0=', 1782690588),
	('UKrlUUhx8ZInMo3Wo1JqJMgI4sPQciG7JwrjoLQ1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJkZGo4RWVubEVwNU9BaWVyTVNzNVBWZ2k5YVFRcDFTbkpnaklxbWZaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjEudGVzdCIsInJvdXRlIjpudWxsfSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1785321556),
	('WV560sS9yYta8vtsgFybf1iOrPF80uhowRA0yI9W', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJMQllNRFRpTWJQOXRXT1M0WVczQW5LTW9jbjZDQUx1Ykw3RE9NaHN4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjEudGVzdFwvYWRtaW5cL3BlZGlkb3MiLCJyb3V0ZSI6ImFkbWluLnBlZGlkb3MifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1782602355),
	('ZWYbImpCG0pSBuF9kPy7Ka9lQVvUJBUO2aH38ISD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJzN05DYjN3Z1pZcE9BdjZuS0xYRktPUDBlNDdYWTkwRnlIQmNObW1oIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMjEudGVzdCIsInJvdXRlIjpudWxsfSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1782787988);

-- Volcando estructura para tabla grupo21.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  KEY `usuarios_rol_id_foreign` (`rol_id`),
  CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nombre`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol_id`, `deleted_at`) VALUES
	(1, 'Daniela Ledesma', 'daniledesma542@gmail.com', NULL, '$2y$12$ntxokoa6l9o536TPsdVZP.a9aUcyo5i1W6vpqF9Xjtijc8iHcY7Oa', NULL, '2026-06-08 03:19:22', '2026-06-08 03:19:22', 1, NULL),
	(2, 'Lujan Acosta', 'velas@gmail.com', NULL, '$2y$12$kmUpgYukSFIbkP7Lc.kpoe8Qt6g1t0M24tjN8Qz6QqeOHk3Innyee', NULL, '2026-06-14 03:48:19', '2026-06-14 03:48:19', 2, NULL);

-- Volcando estructura para tabla grupo21.ventas_cabecera
CREATE TABLE IF NOT EXISTS `ventas_cabecera` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_venta` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'carrito',
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_cabecera_user_id_foreign` (`user_id`),
  CONSTRAINT `ventas_cabecera_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.ventas_cabecera: ~19 rows (aproximadamente)
INSERT INTO `ventas_cabecera` (`id`, `fecha_venta`, `user_id`, `estado`, `total`, `created_at`, `updated_at`) VALUES
	(1, '2026-06-17 21:24:45', 1, 'pendiente_pago', 26100.00, '2026-06-08 03:38:21', '2026-06-17 21:24:45'),
	(2, '2026-06-15 00:53:37', 2, 'pendiente_pago', 14900.00, '2026-06-14 03:48:25', '2026-06-15 23:40:13'),
	(3, '2026-06-15 23:35:13', 2, 'pendiente_pago', 14900.00, '2026-06-15 00:53:43', '2026-06-15 23:35:13'),
	(4, '2026-06-16 16:34:44', 2, 'pendiente_pago', 11200.00, '2026-06-16 03:56:39', '2026-06-16 16:34:44'),
	(5, '2026-06-16 16:52:08', 2, 'pendiente_pago', 43900.00, '2026-06-16 16:35:18', '2026-06-16 16:52:08'),
	(6, '2026-06-17 21:57:57', 2, 'pendiente_pago', 3700.00, '2026-06-16 16:52:18', '2026-06-17 21:57:57'),
	(7, '2026-06-17 21:31:51', 1, 'pendiente_pago', 16700.00, '2026-06-17 21:31:49', '2026-06-17 21:31:51'),
	(8, '2026-06-17 21:34:09', 1, 'pendiente_pago', 11200.00, '2026-06-17 21:34:07', '2026-06-17 21:34:09'),
	(9, '2026-06-17 21:43:19', 1, 'pendiente_pago', 16700.00, '2026-06-17 21:43:17', '2026-06-17 21:43:19'),
	(10, '2026-06-17 21:46:26', 1, 'pendiente_pago', 14900.00, '2026-06-17 21:46:15', '2026-06-17 21:46:26'),
	(11, '2026-06-17 21:47:05', 1, 'pendiente_pago', 29000.00, '2026-06-17 21:47:00', '2026-06-17 21:47:05'),
	(12, '2026-06-17 22:01:25', 2, 'pendiente_pago', 14900.00, '2026-06-17 22:01:18', '2026-06-17 22:01:25'),
	(13, '2026-06-17 22:05:58', 2, 'pendiente_pago', 3100.00, '2026-06-17 22:05:57', '2026-06-17 22:05:58'),
	(14, '2026-06-17 22:16:00', 2, 'pendiente_pago', 4300.00, '2026-06-17 22:15:59', '2026-06-17 22:16:00'),
	(15, '2026-06-17 23:39:12', 2, 'pendiente_pago', 2400.00, '2026-06-17 23:38:58', '2026-06-17 23:39:12'),
	(16, '2026-06-18 03:56:27', 2, 'pendiente_pago', 71100.00, '2026-06-18 00:49:58', '2026-06-18 03:56:27'),
	(17, '2026-06-18 04:22:18', 2, 'pendiente_pago', 7800.00, '2026-06-18 03:56:57', '2026-06-18 04:22:18'),
	(18, '2026-06-25 22:27:06', 2, 'enviado', 17440.00, '2026-06-25 21:49:32', '2026-06-25 22:59:48'),
	(19, NULL, 2, 'carrito', 0.00, '2026-06-25 22:27:42', '2026-06-29 02:49:46');

-- Volcando estructura para tabla grupo21.ventas_detalle
CREATE TABLE IF NOT EXISTS `ventas_detalle` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_detalle_venta_id_foreign` (`venta_id`),
  KEY `ventas_detalle_producto_id_foreign` (`producto_id`),
  CONSTRAINT `ventas_detalle_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `ventas_detalle_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla grupo21.ventas_detalle: ~24 rows (aproximadamente)
INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio_unitario`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 1, 14900.00, 14900.00, '2026-06-14 03:47:27', '2026-06-14 03:47:27'),
	(3, 2, 2, 1, 14900.00, 14900.00, '2026-06-15 00:53:34', '2026-06-15 00:53:34'),
	(4, 3, 2, 1, 14900.00, 14900.00, '2026-06-15 00:53:55', '2026-06-15 00:53:55'),
	(5, 4, 4, 1, 11200.00, 11200.00, '2026-06-16 16:34:39', '2026-06-16 16:34:39'),
	(7, 5, 2, 1, 14900.00, 14900.00, '2026-06-16 16:42:16', '2026-06-16 16:42:16'),
	(8, 5, 9, 1, 29000.00, 29000.00, '2026-06-16 16:42:27', '2026-06-16 16:42:27'),
	(9, 6, 7, 1, 3700.00, 3700.00, '2026-06-16 16:52:18', '2026-06-16 16:52:18'),
	(10, 1, 4, 1, 11200.00, 11200.00, '2026-06-17 21:24:27', '2026-06-17 21:24:27'),
	(11, 7, 3, 1, 16700.00, 16700.00, '2026-06-17 21:31:49', '2026-06-17 21:31:49'),
	(12, 8, 4, 1, 11200.00, 11200.00, '2026-06-17 21:34:07', '2026-06-17 21:34:07'),
	(13, 9, 3, 1, 16700.00, 16700.00, '2026-06-17 21:43:17', '2026-06-17 21:43:17'),
	(14, 10, 2, 1, 14900.00, 14900.00, '2026-06-17 21:46:22', '2026-06-17 21:46:22'),
	(15, 11, 9, 1, 29000.00, 29000.00, '2026-06-17 21:47:00', '2026-06-17 21:47:00'),
	(16, 12, 2, 1, 14900.00, 14900.00, '2026-06-17 22:01:23', '2026-06-17 22:01:23'),
	(17, 13, 13, 1, 3100.00, 3100.00, '2026-06-17 22:05:57', '2026-06-17 22:05:57'),
	(18, 14, 19, 1, 4300.00, 4300.00, '2026-06-17 22:15:59', '2026-06-17 22:15:59'),
	(19, 15, 12, 1, 2400.00, 2400.00, '2026-06-17 23:39:05', '2026-06-17 23:39:05'),
	(20, 16, 6, 1, 4800.00, 4800.00, '2026-06-18 00:49:58', '2026-06-18 00:49:58'),
	(21, 16, 10, 2, 31000.00, 62000.00, '2026-06-18 00:50:14', '2026-06-18 03:56:09'),
	(22, 16, 19, 1, 4300.00, 4300.00, '2026-06-18 03:56:19', '2026-06-18 03:56:19'),
	(23, 17, 12, 1, 2400.00, 2400.00, '2026-06-18 04:22:11', '2026-06-18 04:22:11'),
	(24, 17, 8, 1, 5400.00, 5400.00, '2026-06-18 04:22:16', '2026-06-18 04:22:16'),
	(27, 18, 18, 3, 2000.00, 6000.00, '2026-06-25 22:26:25', '2026-06-25 22:26:40'),
	(28, 18, 14, 4, 2860.00, 11440.00, '2026-06-25 22:26:52', '2026-06-25 22:27:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
