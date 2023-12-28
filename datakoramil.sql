-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `datas_id` bigint unsigned NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_agama_laki_laki` int NOT NULL,
  `jumlah_agama_perempuan` int NOT NULL,
  `jumlah_agama` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datas_id` (`datas_id`),
  CONSTRAINT `agama_ibfk_1` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `agama` (`id`, `datas_id`, `agama`, `jumlah_agama_laki_laki`, `jumlah_agama_perempuan`, `jumlah_agama`, `created_at`, `updated_at`) VALUES
(1,	1,	'Islam',	2,	342,	344,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(2,	1,	'Kristen',	12312,	234,	12546,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(3,	1,	'Katholik',	4,	23,	27,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(4,	1,	'Hindu',	234,	2,	236,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(5,	1,	'Budha',	234,	2,	236,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(6,	1,	'Konghuchu',	2342,	34,	2376,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(7,	1,	'Lainya',	6000,	4,	6004,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(15,	3,	'Islam',	21,	221,	242,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(16,	3,	'Kristen',	21,	221,	242,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(17,	3,	'Katholik',	12,	12,	24,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(18,	3,	'Hindu',	221,	21,	242,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(19,	3,	'Budha',	2,	221,	223,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(20,	3,	'Konghuchu',	21,	2,	23,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(21,	3,	'Lainya',	21,	21,	42,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(22,	4,	'Islam',	3312,	12,	3324,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(23,	4,	'Kristen',	213,	312,	525,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(24,	4,	'Katholik',	12,	1,	13,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(25,	4,	'Hindu',	544,	3241,	3785,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(26,	4,	'Budha',	132,	2,	134,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(27,	4,	'Konghuchu',	132,	12,	144,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(28,	4,	'Lainya',	1212,	112,	1324,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(38,	8,	'Islam',	12,	221,	233,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(39,	8,	'Kristen',	213,	21,	234,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(40,	8,	'Katholik',	221,	21,	242,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(41,	8,	'Hindu',	21,	21,	42,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(42,	8,	'Budha',	21,	132,	153,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(43,	8,	'Konghuchu',	21,	12,	33,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(44,	8,	'Lainya',	21,	21,	42,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49');

DROP TABLE IF EXISTS `datas`;
CREATE TABLE `datas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahaan_id` bigint unsigned NOT NULL,
  `keterangan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan_kepala_koramil` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kelurahaan_id` (`kelurahaan_id`),
  CONSTRAINT `datas_ibfk_1` FOREIGN KEY (`kelurahaan_id`) REFERENCES `kelurahaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `datas` (`id`, `month`, `year`, `kelurahaan_id`, `keterangan`, `status`, `keterangan_kepala_koramil`, `created_at`, `updated_at`) VALUES
(1,	'Juli-Desember',	'2020',	3,	'234',	'ACC',	NULL,	'2023-12-23 02:08:59',	'2023-12-24 04:58:34'),
(3,	'Janurari-Juni',	'2020',	1,	'21',	'Input',	NULL,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(4,	'Juli-Desember',	'2020',	1,	NULL,	'ACC',	NULL,	'2023-12-23 07:47:42',	'2023-12-24 04:58:34'),
(8,	'Janurari-Juni',	'2028',	1,	'2',	'Input',	NULL,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `kartu_keluarga`;
CREATE TABLE `kartu_keluarga` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `datas_id` bigint unsigned NOT NULL,
  `kk_laki_laki` int NOT NULL,
  `kk_perempuan` int NOT NULL,
  `jumlah_kartu_keluarga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datas_id` (`datas_id`),
  CONSTRAINT `kartu_keluarga_ibfk_1` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kartu_keluarga` (`id`, `datas_id`, `kk_laki_laki`, `kk_perempuan`, `jumlah_kartu_keluarga`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	11,	12,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(3,	3,	13,	1132,	1145,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(4,	4,	2,	221,	223,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(8,	8,	112,	22,	134,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49');

DROP TABLE IF EXISTS `kelurahaan`;
CREATE TABLE `kelurahaan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelurahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kelurahaan` (`id`, `nama_kelurahaan`, `created_at`, `updated_at`) VALUES
(1,	'PASAR KEMIS',	'2023-12-14 00:53:10',	'2023-12-14 01:02:07'),
(3,	'SIDANGSARI',	'2023-12-14 00:56:58',	'2023-12-14 00:56:58'),
(8,	'SUKAMANTRI',	'2023-12-22 03:40:41',	'2023-12-22 03:40:41');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2023_12_11_064935_create_sessions_table',	1),
(7,	'2023_12_11_065326_add_column_roles_on_users_table',	2),
(8,	'2023_12_14_061259_add_column_photo_profile_on_users_table',	3),
(9,	'2023_12_14_072343_create_datas_table',	4),
(10,	'2023_12_14_072947_create_kelurahan_table',	4),
(11,	'2023_12_14_081442_create_data_table',	5),
(12,	'2023_12_15_074415_add_and_edit_column_on_datas_table',	5),
(13,	'2023_12_15_074455_create_data_details_table',	5),
(14,	'2023_12_15_080813_create_datas_table',	6),
(15,	'2023_12_16_064509_edit_column_datas_table',	7),
(16,	'2023_12_16_145225_create_status_data_table',	8),
(17,	'2023_12_22_113853_add_table_wajib_ktp',	9),
(18,	'2023_12_22_113926_add_table_kartu_kelurga',	9),
(19,	'2023_12_22_114023_status_perkawinan',	9),
(20,	'2023_12_22_114052_add_table_agama',	9),
(21,	'2023_12_23_063825_add_table_jumlah_penduduk',	10);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE `penduduk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `datas_id` bigint unsigned NOT NULL,
  `jumlah_penduduk_laki_laki` int NOT NULL,
  `jumlah_penduduk_perempuan` int NOT NULL,
  `jumlah_penduduk` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datas_id` (`datas_id`),
  CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `penduduk` (`id`, `datas_id`, `jumlah_penduduk_laki_laki`, `jumlah_penduduk_perempuan`, `jumlah_penduduk`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	2,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(3,	3,	131131,	13,	131144,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(4,	4,	212,	21,	233,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(8,	8,	1221,	21,	1242,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('H1FnCT4iGRsW9IXTXvswY9bCtZlMn99YxuKOE4W2',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0M1YXdVZFlGT2FPR2VMNUx2OGk5OE9lN25xOHFPbEx5NzMydkplVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9kYXRhLWtvcmFtaWwudGVzdCI7fX0=',	1703733523),
('nzU0iHnbivcUiX3bUtj6oi8yYPh9kyYQult1EWkL',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOEJKWE1GZVdPTGphU2g2OUhMM2J5T1hZdW4yUWd1UVIxVWcyNWVCSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9kYXRhLWtvcmFtaWwudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1703766813),
('wnrvVMOMRgTz10htNfeIFyXIY2m6lGFnByfF0SDk',	NULL,	'127.0.0.1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVBWUlFlM1FCZDQzRjVEYmdnMFRDckZaRXFLUGY3a0RDVzJCWDRTOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9kYXRhLWtvcmFtaWwudGVzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',	1703753150);

DROP TABLE IF EXISTS `status_perkawinan`;
CREATE TABLE `status_perkawinan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `datas_id` bigint unsigned NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_status_laki_laki` int NOT NULL,
  `jumlah_status_perempuan` int NOT NULL,
  `jumlah_status_perkawinan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datas_id` (`datas_id`),
  CONSTRAINT `status_perkawinan_ibfk_1` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `status_perkawinan` (`id`, `datas_id`, `status_perkawinan`, `jumlah_status_laki_laki`, `jumlah_status_perempuan`, `jumlah_status_perkawinan`, `created_at`, `updated_at`) VALUES
(1,	1,	'Belum Kawin',	10000,	3,	10003,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(2,	1,	'Kawin',	4,	12312,	12316,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(3,	1,	'Cerai Hidup',	23,	123123,	123146,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(4,	1,	'Cerai Mati',	342,	34,	376,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(9,	3,	'Belum Kawin',	12,	22,	34,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(10,	3,	'Kawin',	12,	2,	14,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(11,	3,	'Cerai Hidup',	21,	21,	42,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(12,	3,	'Cerai Mati',	221,	21,	242,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(13,	4,	'Belum Kawin',	2000,	2,	2002,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(14,	4,	'Kawin',	221,	213,	434,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(15,	4,	'Cerai Hidup',	21,	221,	242,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(16,	4,	'Cerai Mati',	2132,	23,	2155,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(28,	8,	'Belum Kawin',	12,	1212,	24,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(29,	8,	'Kawin',	12,	212,	24,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(30,	8,	'Cerai Hidup',	331,	213,	343,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49'),
(31,	8,	'Cerai Mati',	13,	2213,	25,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `roles`) VALUES
(1,	'admin',	'admin@gmail.com',	NULL,	'admin123',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-12-10 23:52:30',	'2023-12-25 03:49:40',	'MASTER ADMIN'),
(20,	'Kepalanya Koramil',	'kepalakoramil@gmail.com',	NULL,	'koramil123',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-12-17 03:06:47',	'2023-12-25 03:49:21',	'KEPALA KORAMIL'),
(22,	'kodim nih',	'kodim@gmail.com',	NULL,	'kodim123',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-12-17 06:10:02',	'2023-12-25 03:49:10',	'KODIM'),
(23,	'admin koramil nih',	'adminkoramil@gmail.com',	NULL,	'adminkoramil123',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'2023-12-22 03:38:03',	'2023-12-25 03:48:50',	'ADMIN KORAMIL');

DROP TABLE IF EXISTS `wajib_ktp`;
CREATE TABLE `wajib_ktp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `datas_id` bigint unsigned NOT NULL,
  `wajib_ktp_laki_laki` int NOT NULL,
  `wajib_ktp_perempuan` int NOT NULL,
  `jumlah_wajib_ktp` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datas_id` (`datas_id`),
  CONSTRAINT `wajib_ktp_ibfk_1` FOREIGN KEY (`datas_id`) REFERENCES `datas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `wajib_ktp` (`id`, `datas_id`, `wajib_ktp_laki_laki`, `wajib_ktp_perempuan`, `jumlah_wajib_ktp`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	2,	'2023-12-23 02:08:59',	'2023-12-23 02:09:28'),
(3,	3,	32,	331,	363,	'2023-12-23 07:47:12',	'2023-12-23 07:47:12'),
(4,	4,	12,	12,	24,	'2023-12-23 07:47:42',	'2023-12-24 02:18:30'),
(8,	8,	1,	12,	13,	'2023-12-24 02:25:49',	'2023-12-24 02:25:49');

-- 2023-12-28 13:07:27
