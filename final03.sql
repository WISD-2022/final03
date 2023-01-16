-- Adminer 4.8.1 MySQL 5.7.11 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `admin_orders`;
CREATE TABLE `admin_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  `products_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `carts_users_id_foreign` (`users_id`),
  KEY `carts_products_id_foreign` (`products_id`),
  CONSTRAINT `carts_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  CONSTRAINT `carts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`id`, `created_at`, `updated_at`, `users_id`, `products_id`, `quantity`) VALUES
(6,	'2023-01-08 05:26:51',	'2023-01-08 05:26:51',	1,	4,	1);

DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  `orders_id` bigint(20) unsigned NOT NULL,
  `products_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `details_users_id_foreign` (`users_id`),
  KEY `details_orders_id_foreign` (`orders_id`),
  KEY `details_products_id_foreign` (`products_id`),
  CONSTRAINT `details_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `details_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  CONSTRAINT `details_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orders_id` bigint(20) unsigned NOT NULL,
  `products_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  KEY `items_orders_id_foreign` (`orders_id`),
  KEY `products_id` (`products_id`),
  CONSTRAINT `items_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  CONSTRAINT `items_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `items` (`created_at`, `updated_at`, `orders_id`, `products_id`, `quantity`, `sum`) VALUES
('2023-01-08 05:25:29',	'2023-01-08 05:25:29',	1,	2,	2,	155),
('2023-01-08 05:25:29',	'2023-01-08 05:25:29',	1,	4,	1,	200),
('2023-01-08 05:25:47',	'2023-01-08 05:25:47',	2,	4,	1,	200),
('2023-01-08 05:25:47',	'2023-01-08 05:25:47',	2,	1,	1,	195),
('2023-01-08 05:46:55',	'2023-01-08 05:46:55',	3,	4,	1,	200),
('2023-01-08 05:46:55',	'2023-01-08 05:46:55',	3,	7,	6,	150),
('2023-01-08 06:53:15',	'2023-01-08 06:53:15',	4,	2,	1,	155),
('2023-01-08 06:53:15',	'2023-01-08 06:53:15',	4,	7,	5,	150),
('2023-01-09 21:32:39',	'2023-01-09 21:32:39',	5,	4,	3,	200),
('2023-01-09 21:32:39',	'2023-01-09 21:32:39',	5,	10,	2,	150),
('2023-01-09 22:40:10',	'2023-01-09 22:40:10',	6,	5,	3,	160),
('2023-01-10 17:40:10',	'2023-01-10 17:40:10',	7,	3,	1,	155),
('2023-01-10 17:40:10',	'2023-01-10 17:40:10',	7,	10,	2,	150),
('2023-01-15 22:12:22',	'2023-01-15 22:12:22',	8,	3,	2,	155);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2022_12_11_120147_create_sessions_table',	1),
(7,	'2022_12_11_144232_create_admins_table',	1),
(8,	'2022_12_11_144553_create_orders_table',	1),
(9,	'2022_12_11_152024_create_products_table',	1),
(10,	'2022_12_11_153236_create_details_table',	1),
(11,	'2022_12_11_155357_create_carts_table',	1),
(12,	'2022_12_11_155600_create_items_table',	1),
(13,	'2022_12_11_160141_create_admin_orders_table',	1),
(14,	'2023_01_06_122424_change_products_model_field_name',	1),
(15,	'2023_01_08_141912_add_new_column_users',	2);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_users_id_foreign` (`users_id`),
  CONSTRAINT `orders_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `users_id`, `quantity`, `sum`, `status`, `date`) VALUES
(1,	'2023-01-08 05:25:29',	'2023-01-10 18:19:25',	1,	1,	510,	'已完成',	'2023-01-08'),
(2,	'2023-01-08 05:25:47',	'2023-01-08 05:25:47',	1,	1,	395,	'未完成',	'2023-01-08'),
(3,	'2023-01-08 05:46:55',	'2023-01-08 05:47:25',	2,	6,	1100,	'已完成',	'2023-01-08'),
(4,	'2023-01-08 06:53:15',	'2023-01-08 06:53:16',	7,	5,	905,	'未完成',	'2023-01-08'),
(5,	'2023-01-09 21:32:39',	'2023-01-09 21:32:39',	8,	2,	900,	'未完成',	'2023-01-10'),
(6,	'2023-01-09 22:40:10',	'2023-01-15 22:11:25',	8,	3,	480,	'已完成',	'2023-01-10'),
(7,	'2023-01-10 17:40:10',	'2023-01-10 17:47:10',	8,	2,	455,	'已完成',	'2023-01-11'),
(8,	'2023-01-15 22:12:22',	'2023-01-15 22:13:13',	8,	2,	310,	'已完成',	'2023-01-16');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `scent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `name`, `description`, `picture`, `scent`, `price`, `inventory`, `status`) VALUES
(1,	NULL,	'2023-01-15 22:13:13',	'純橄欖精油皂',	'100純橄欖精油皂是非常溫和的手工皂，適合換季肌膚容易敏感、幼兒、脆弱型、中偏乾性膚質、手部清潔。無論男性、女性，各個年齡使用都適合。',	'picture/純橄欖精油皂.jpg',	'植物精油皂',	195,	197,	'已上架'),
(2,	NULL,	'2023-01-15 22:13:13',	'四季平衡精油皂',	'「四季平衡」專為混合性肌膚設計，調理肌膚油脂分泌，使觸感柔嫩，飽滿水潤，從沐浴開始天天調理，讓肌膚油水分泌重新找回最佳的平衡性。',	'picture/四季平衡精油皂.jpg',	'植物精油皂',	155,	194,	'已上架'),
(3,	NULL,	'2023-01-15 22:13:13',	'荒漠甘泉精油皂',	'如果，您已經厭倦乳液帶來的黏膩，且肌膚又乾澀無光，現在起，從沐浴開始同步滋養，讓\"會反光的小腿骨\"再度登場！',	'picture/荒漠甘泉精油皂.jpg',	'植物精油皂',	155,	195,	'已上架'),
(4,	NULL,	'2023-01-15 22:13:13',	'清新淨油精油皂',	'薄荷香氣清涼暢快，這是天生油膩肌膚的剋星，消除油光，胸前、背部乾爽舒適，洗後全身清爽，感受最純淨的清潔程度。',	'picture/清新淨油精油皂.jpg',	'植物精油皂',	200,	197,	'已上架'),
(5,	NULL,	'2023-01-15 22:13:13',	'金銀花王青春草本皂',	'全新-金銀花(忍冬)精油草本配方，專為追求膚色淨白、柔嫩設計，頻繁進出冷氣房，肌膚容易油水不均，缺乏彈性，最適合使用金銀花皂調理肌膚。',	'picture/金銀花王青春草本皂.jpg',	'草本皂',	160,	100,	'已上架'),
(6,	NULL,	'2023-01-08 05:24:09',	'艾草安神活力草本皂',	'全家洗澡都適合，家庭常備，以艾草精油、抹草、茶樹入皂，深層清潔肌膚，調理油脂分泌，洗感清爽不油膩，濃郁艾草香氣如影隨形，清香一洗難忘。',	'picture/艾草安神活力草本皂.jpg',	'草本皂',	150,	200,	'已上架'),
(7,	NULL,	'2023-01-15 22:13:13',	'桂花沉香亮澤草本皂',	'沉香為四大奇香之一，眾木香之首，香氣濃郁、厚實，自古多用於清淨氣場，安定人心，洗後全身清爽，感受最純淨的清潔程度。',	'picture/桂花沉香亮澤草本皂.jpg',	'草本皂',	150,	182,	'已上架'),
(8,	NULL,	'2023-01-08 05:24:18',	'左手香王順膚草本皂',	'全新沒藥配方，專為長期飽受問題困擾的膚況設計，當肌膚表層薄弱，容易敏感、搔癢，最適合使用溫和舒緩的左手香皂清潔調理肌膚。',	'picture/左手香王順膚草本皂.jpg',	'草本皂',	150,	150,	'已上架'),
(9,	NULL,	'2023-01-08 05:24:23',	'金縷山楂緊膚草本皂',	'專為肌膚鬆垮、毛孔粗大所設計的緊膚配方，當彈性隨著時間流逝，該如何抵抗強大的地心引力，讓金縷山楂幫助你鬆垮的肌膚乖乖歸隊！',	'picture/金縷山楂緊膚草本皂.jpg',	'草本皂',	150,	200,	'已上架'),
(10,	NULL,	'2023-01-15 22:13:13',	'菩提乳香保濕草本皂',	'專為表層乾燥設計的保溼配方手工皂，當辦公室的空調讓肌膚乾澀，長期的乾燥讓表層開始產生小紋路，試試「菩提乳香」解肌膚的渴吧！',	'picture/菩提乳香保濕草本皂.jpg',	'草本皂',	150,	194,	'已上架'),
(11,	NULL,	'2023-01-08 05:24:37',	'高山金縷梅無香純露皂',	'以25%乳木果油、油質輕盈的葡萄籽油、與金縷梅純露調配專屬嬰兒、易敏型膚況的『輕度控油』調理皂，保濕中帶有輕度控油力，洗感獨特。',	'picture/高山金縷梅無香純露皂.jpg',	'無香純露皂',	200,	150,	'已上架'),
(12,	NULL,	'2023-01-08 05:24:42',	'檸檬香桃木無香純露皂',	'高溫下，細嫩型膚質需避免長時間汗水浸潤，本品專為敏弱肌『淨汗淨味』設計的檸檬香桃木純露手工皂，能溫和洗清全身油垢、汗水、汗味。',	'picture/檸檬香桃木無香純露皂.jpg',	'無香純露皂',	200,	150,	'已上架'),
(13,	NULL,	NULL,	'快樂鼠尾草無香純露皂',	'秋季溫差大，細嫩肌膚需加強保濕，以乳木果油、橄欖油、快樂鼠尾草純露調配經典配方，清潔同時『強化保濕鎖水』適合超敏肌膚秋季使用。',	'picture/快樂鼠尾草無香純露皂.jpg',	'無香純露皂',	200,	150,	'未上架'),
(14,	NULL,	NULL,	'德國洋甘菊無香純露皂',	'以35%乳木果油、榛果油、德國洋甘菊純露製作的『舒敏滋潤配方』成分單純，皂體純白潔淨，極致溫和，是冬季中令敏弱肌膚最安心的清潔品。',	'picture/德國洋甘菊無香純露皂.jpg',	'無香純露皂',	200,	150,	'未上架'),
(15,	NULL,	NULL,	'蜂蜜蛋黃皂',	'每塊蛋皂含一顆土雞蛋與5%以上精油，又香又甜的香氣特別濃郁，超高度鎖水力配方，想追求五星級保濕力的一定會愛不釋手。',	'picture/蜂蜜蛋黃皂.jpg',	'私房皂',	320,	50,	'未上架'),
(16,	NULL,	NULL,	'酪梨牛奶皂',	'50%酪梨油搭配酪梨果實，飽滿的果肉脂肪提供極潤感，凝膠型泡沫，溫和程度連BABY都可使用，最適合超脆弱型肌膚與想嘗試酪梨油獨特的行家。',	'picture/酪梨牛奶皂.jpg',	'私房皂',	320,	50,	'未上架'),
(17,	'2023-01-06 04:51:50',	'2023-01-06 04:59:42',	'暖薑精油皂',	'以暖薑、黑胡椒、丁香花苞、與溫暖的沸石製作，滿滿的生薑香氣，最適合給沐浴後喜歡全身暖暖滋味的人，配方含乳木果油提升滋潤度，非常推薦在寒冷的冬季時使用，舒緩乾澀，使手腳肌膚柔嫩，沐浴後身心溫暖洋溢。',	'picture/暖薑精油皂.jpg',	'植物精油皂',	150,	200,	'未上架'),
(18,	'2023-01-06 05:06:43',	'2023-01-08 05:25:02',	'123',	'以可可油、榛果油、岩蘭草、高山薰衣草調配的冬季保濕配方，最適合肌膚乾裂，或是冬季容易乾癢的類型，高度的滋養性能深度修護肌膚乾澀，配方中蜂蜜與海藻，提高保濕鎖水能力，為肌膚形成一道保濕屏障。',	'picture/岩蘭草保濕精油皂.jpg',	'植物精油皂',	200,	100,	'未上架');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0TPa4TK87laSLpOO5kh1kFHfds5vJyiZt5ap4HxP',	10,	'::1',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidXlnbW96aGdVYnQxNUVGZ01JS2hVQWV2cEh0a0F2Y3E5R3hKSDhYdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9vcmRlcnMvOC9lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7fQ==',	1673849604);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `phone`, `birthday`, `address`, `created_at`, `updated_at`, `status`) VALUES
(1,	'3a832005',	'3a832005@gm.student.ncut.edu.tw',	'$2y$10$yRHvLdxElr1cknEr6o.fJuEvY.r4no3BmCZIt2SvOycVfqsh1cxx2',	NULL,	NULL,	NULL,	'0912345678',	'2023-01-03',	'123456',	'2023-01-08 05:04:27',	'2023-01-08 05:04:27',	'1'),
(2,	'yanci',	'yanci@gmail.com',	'$2y$10$ZuDgX8ajWadhVB9jlMMX6ukaGc.UJrbPdLbcsDd1EbMca8nYhTyJu',	NULL,	NULL,	NULL,	'0927384635',	'2023-01-04',	'123456',	'2023-01-08 05:46:13',	'2023-01-08 05:46:13',	'1'),
(3,	'精靈',	'bbb@gmail.com',	'$2y$10$KwmNu38C296SHVGd2nTXcuxN8aS92u/rzBXIjcQO/DaC0RunkXCZu',	NULL,	NULL,	NULL,	'0912345678',	'2023-01-03',	'123456',	'2023-01-08 06:29:40',	'2023-01-08 06:29:40',	'1'),
(6,	'eee',	'abc@gmail',	'$2y$10$7ErWT4kMDfF4craUyrNqGOSXcg31nevI8Hzoypc8yHXTXdKORibbO',	NULL,	NULL,	NULL,	'0912345678',	'2023-01-04',	'123456',	'2023-01-08 06:50:43',	'2023-01-08 06:50:43',	'1'),
(7,	'zxxc',	'sab48372957@gmail.com',	'$2y$10$4HI3SHNuGrRSzdYr9vvquu6blztseFNaV63HE8I2vC6QHudOatqoW',	NULL,	NULL,	NULL,	'0987654321',	'2023-01-20',	'dfghjf',	'2023-01-08 06:52:03',	'2023-01-08 06:53:00',	'1'),
(8,	'測試a',	'aaa@gmail.com',	'$2y$10$cDNxhLPeJ2Gu/PqbvVbKfed1TLbti8rKv1AV8RiPfTbdIkUYXwzT6',	NULL,	NULL,	NULL,	'0987654321',	'2023-01-01',	'新北市',	'2023-01-09 05:32:05',	'2023-01-09 05:32:05',	'1'),
(10,	'admin',	'admin@gmail.com',	'$2y$10$gIpz/02avO5wUlnm4UmUsONzLx8FzWHfW96bGehS9jKqTslTuBeu6',	NULL,	NULL,	NULL,	'0987654312',	'2000-01-01',	'臺中市',	'2023-01-09 23:02:37',	'2023-01-09 23:02:37',	'0');

-- 2023-01-16 06:16:52
