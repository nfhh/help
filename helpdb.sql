/*
 Navicat Premium Data Transfer

 Source Server         : WSL
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : 127.0.0.1:3306
 Source Schema         : helpdb

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 27/05/2020 18:25:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admins_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'admin', '$2y$10$tx8fxVsVtTx.Ys/xJzpxVus6.P4alwODyXa/9Gn7S/mbK15PpMYxq', NULL, '$2y$10$HTOq/4njpJgcB2FH6rBnseVow71goWkbYOp4aKuDFNUQBcs6onZEi', NULL, '2020-05-27 10:48:27', '2020-05-27 10:48:27');

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` json NOT NULL,
  `excel` json NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for assets
-- ----------------------------
DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `suffix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `shard_index` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `shard_size` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `shard_total` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assets
-- ----------------------------
INSERT INTO `assets` VALUES (23, 'package/25lo073446.zicp.vip.zip/E6m8wOtDr7GWwYbwgM7F63ePsw2yUSwCT9sAFqpN.zip', '25lo073446.zicp.vip.zip', 'zip', 6577679, 1, 2097152, 4, '28aaa85cf9c6f39d848c18d7746f4a13', '2020-05-27 17:53:45', '2020-05-27 17:53:45');
INSERT INTO `assets` VALUES (24, 'package/25lo073446.zicp.vip.zip/UqHu3chZ9Bx97HTGrelpQGsCkEE2gme2lQZfxeCP.bin', '25lo073446.zicp.vip.zip', 'zip', 6577679, 2, 2097152, 4, '28aaa85cf9c6f39d848c18d7746f4a13', '2020-05-27 17:53:46', '2020-05-27 17:53:46');
INSERT INTO `assets` VALUES (25, 'package/25lo073446.zicp.vip.zip/RMZFUvz6kCAeuRzfP91Pb0Ln58dQKXq4o0xRJBJm.bin', '25lo073446.zicp.vip.zip', 'zip', 6577679, 3, 2097152, 4, '28aaa85cf9c6f39d848c18d7746f4a13', '2020-05-27 17:53:47', '2020-05-27 17:53:47');
INSERT INTO `assets` VALUES (26, 'package/25lo073446.zicp.vip.zip/UvP9F0vkqpO3GSOAQasjQ9ZA9sQJwlA4SLNBxzaw.bin', '25lo073446.zicp.vip.zip', 'zip', 6577679, 4, 2097152, 4, '28aaa85cf9c6f39d848c18d7746f4a13', '2020-05-27 17:53:48', '2020-05-27 17:53:48');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `en-us` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `de-de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fr-fr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `it-it` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `es-es` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hu-hu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ru-ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ko-kr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ja-jp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zh-cn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zh-hk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pl-pl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tr-tr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dirs
-- ----------------------------
DROP TABLE IF EXISTS `dirs`;
CREATE TABLE `dirs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dirs
-- ----------------------------
INSERT INTO `dirs` VALUES (1, 'help', 0, NULL, NULL);
INSERT INTO `dirs` VALUES (2, 'install', 0, NULL, NULL);
INSERT INTO `dirs` VALUES (3, 'faq', 0, NULL, NULL);

-- ----------------------------
-- Table structure for downloads
-- ----------------------------
DROP TABLE IF EXISTS `downloads`;
CREATE TABLE `downloads`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for faqs
-- ----------------------------
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` json NOT NULL,
  `excel` json NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `dir_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `en-us` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `de-de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fr-fr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `it-it` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `es-es` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hu-hu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ru-ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ko-kr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ja-jp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zh-cn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zh-hk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pl-pl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tr-tr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES (1, 'Documents', 'Unterlagen', 'Les documents', 'Documenti', 'Documentos', 'doc', 'доктор', '서류', '書類', '文档', '文檔', 'Dok', 'Belgeler', NULL, NULL);
INSERT INTO `menus` VALUES (2, 'Desktop and system', 'Desktop und System', 'Bureau et système', 'Desktop e sistema', 'Escritorio y sistema', 'Asztali és rendszer', 'Рабочий стол и система', '데스크톱 및 시스템', 'デスクトップおよびシステム', '桌面及系统', '桌面及系統', 'Komputer stacjonarny i system', 'Masaüstü ve Sistem', NULL, NULL);
INSERT INTO `menus` VALUES (3, 'Mobile applications', 'Mobile Anwendungen', 'Applications mobiles', 'Applicazioni mobili', 'Aplicaciones móviles', 'Mobil alkalmazások', 'Мобильное приложение', '모바일 애플리케이션', 'モバイルアプリケーション', '移动应用程序', '移動應用程序', 'Mobilna aplikacja', 'Mobil Uygulamalar', NULL, NULL);
INSERT INTO `menus` VALUES (4, 'TOS applications', 'TOS-Anwendungen', 'Applications TOS', 'Applicazioni TOS', 'Aplicaciones TOS', 'TOS alkalmazások', 'Приложение TOS', 'TOS 애플리케이션', 'TOSアプリケーション', 'TOS应用程序', 'TOS應用程序', 'Aplikacja TOS', 'TOS Uygulamaları', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_05_14_103659_create_admins_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_05_15_113158_create_categories_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_05_15_155826_create_articles_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_05_15_162549_create_templates_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_05_18_094100_create_files_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_05_18_102520_create_products_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_05_18_104233_create_steps_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_05_18_184527_create_dirs_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_05_20_113416_create_subjects_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_05_20_120157_create_faqs_table', 1);
INSERT INTO `migrations` VALUES (14, '2020_05_27_102755_create_menus_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_05_27_111735_create_downloads_table', 2);
INSERT INTO `migrations` VALUES (16, '2020_05_27_162917_create_assets_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `type` enum('TNAS','TDAS') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TNAS',
  `size` enum('2','4','5','8','12','16','24') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'D2-310', 'TDAS', '2', 2, NULL, NULL);
INSERT INTO `products` VALUES (2, 'D2 Thunderbolt 3', 'TDAS', '2', 4, NULL, NULL);
INSERT INTO `products` VALUES (3, 'D4-310', 'TDAS', '4', 6, NULL, NULL);
INSERT INTO `products` VALUES (4, 'D5-300', 'TDAS', '5', 8, NULL, NULL);
INSERT INTO `products` VALUES (5, 'D5-300C', 'TDAS', '5', 10, NULL, NULL);
INSERT INTO `products` VALUES (6, 'D4 Thunderbolt 3', 'TDAS', '4', 12, NULL, NULL);
INSERT INTO `products` VALUES (7, 'D5 Thunderbolt 3', 'TDAS', '5', 14, NULL, NULL);
INSERT INTO `products` VALUES (8, 'D8 Thunderbolt 3', 'TDAS', '8', 16, NULL, NULL);
INSERT INTO `products` VALUES (9, 'D16 Thunderbolt3', 'TDAS', '16', 18, NULL, NULL);
INSERT INTO `products` VALUES (10, 'F2-210', 'TNAS', '2', 20, NULL, NULL);
INSERT INTO `products` VALUES (11, 'F2-220', 'TNAS', '2', 22, NULL, NULL);
INSERT INTO `products` VALUES (12, 'F2-221', 'TNAS', '2', 24, NULL, NULL);
INSERT INTO `products` VALUES (13, 'F2-420', 'TNAS', '2', 26, NULL, NULL);
INSERT INTO `products` VALUES (14, 'F2-421', 'TNAS', '2', 28, NULL, NULL);
INSERT INTO `products` VALUES (15, 'F2-422', 'TNAS', '2', 30, NULL, NULL);
INSERT INTO `products` VALUES (16, 'F4-210', 'TNAS', '4', 32, NULL, NULL);
INSERT INTO `products` VALUES (17, 'F4-220', 'TNAS', '4', 34, NULL, NULL);
INSERT INTO `products` VALUES (18, 'F4-221', 'TNAS', '4', 36, NULL, NULL);
INSERT INTO `products` VALUES (19, 'F4-420', 'TNAS', '4', 38, NULL, NULL);
INSERT INTO `products` VALUES (20, 'F4-421', 'TNAS', '4', 40, NULL, NULL);
INSERT INTO `products` VALUES (21, 'F4-422', 'TNAS', '4', 42, NULL, NULL);
INSERT INTO `products` VALUES (22, 'F5-220', 'TNAS', '5', 44, NULL, NULL);
INSERT INTO `products` VALUES (23, 'F5-221', 'TNAS', '5', 46, NULL, NULL);
INSERT INTO `products` VALUES (24, 'F5-225', 'TNAS', '5', 48, NULL, NULL);
INSERT INTO `products` VALUES (25, 'F5-420', 'TNAS', '5', 50, NULL, NULL);
INSERT INTO `products` VALUES (26, 'F5-421', 'TNAS', '5', 52, NULL, NULL);
INSERT INTO `products` VALUES (27, 'F5-422', 'TNAS', '5', 54, NULL, NULL);
INSERT INTO `products` VALUES (28, 'F8-421', 'TNAS', '8', 56, NULL, NULL);
INSERT INTO `products` VALUES (29, 'F8-422', 'TNAS', '8', 58, NULL, NULL);
INSERT INTO `products` VALUES (30, 'U8-412', 'TNAS', '8', 60, NULL, NULL);
INSERT INTO `products` VALUES (31, 'U8-420', 'TNAS', '8', 62, NULL, NULL);
INSERT INTO `products` VALUES (32, 'U8-612', 'TNAS', '8', 64, NULL, NULL);
INSERT INTO `products` VALUES (33, 'U12-412', 'TNAS', '12', 66, NULL, NULL);
INSERT INTO `products` VALUES (34, 'U12-420', 'TNAS', '12', 68, NULL, NULL);
INSERT INTO `products` VALUES (35, 'U12-820', 'TNAS', '12', 70, NULL, NULL);
INSERT INTO `products` VALUES (36, 'U16-412', 'TNAS', '16', 72, NULL, NULL);
INSERT INTO `products` VALUES (37, 'U16-420', 'TNAS', '16', 74, NULL, NULL);
INSERT INTO `products` VALUES (38, 'F4-300', 'TDAS', '4', 76, NULL, NULL);

-- ----------------------------
-- Table structure for steps
-- ----------------------------
DROP TABLE IF EXISTS `steps`;
CREATE TABLE `steps`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` json NOT NULL,
  `excel` json NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for subjects
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `en-us` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `de-de` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `fr-fr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `it-it` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `es-es` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hu-hu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ru-ru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ko-kr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ja-jp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zh-cn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `zh-hk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `pl-pl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `tr-tr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for templates
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of templates
-- ----------------------------
INSERT INTO `templates` VALUES (1, '普通段落', NULL, NULL);
INSERT INTO `templates` VALUES (2, '说明灰块', NULL, NULL);
INSERT INTO `templates` VALUES (3, '表格', NULL, NULL);
INSERT INTO `templates` VALUES (4, '数字列表', NULL, NULL);
INSERT INTO `templates` VALUES (5, '方块列表', NULL, NULL);
INSERT INTO `templates` VALUES (6, '图片', NULL, NULL);
INSERT INTO `templates` VALUES (7, '标题加粗', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
