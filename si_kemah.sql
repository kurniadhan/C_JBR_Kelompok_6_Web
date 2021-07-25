/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : si_kemah

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 26/07/2021 02:06:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for jurusan
-- ----------------------------
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jurusan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jurusan
-- ----------------------------
INSERT INTO `jurusan` VALUES (1, 'Teknologi Informasi');
INSERT INTO `jurusan` VALUES (2, 'Kesehatan');

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS `kegiatan`;
CREATE TABLE `kegiatan`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('Event','Lomba','Seminar') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Internal','Eksternal') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(1) NULL DEFAULT NULL,
  `id_jurusan` int(1) NULL DEFAULT NULL,
  `nama_pemateri` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_buka` date NULL DEFAULT NULL,
  `tgl_tutup` date NULL DEFAULT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `jam_mulai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_selesai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_meet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------
INSERT INTO `kegiatan` VALUES (1, 'Mengenal UI/UX', 'Seminar', 'Eksternal', 0, 1, 'Muhammad Nuzul Ridoi', '2021-07-08', '2021-07-12', '2021-07-13', '09:00', '10:30', '089697670964', '60f85c15679f7_pamflet_kegiatan.jpeg', 'https://s.id/SharingBiroMM', 'Sharing tentang UI/UX', 1, NULL, NULL);
INSERT INTO `kegiatan` VALUES (7, 'TIF Exibition', 'Event', 'Eksternal', 0, 2, 'Kuur', NULL, NULL, '2021-07-26', '08:00', '17:00', '085156186156', '60fd89f18b878_pamflet_kegiatan.jpeg', 'https://wsjti.id', 'asdas', 1, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (9, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (10, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (11, '2021_04_12_223540_create_kegiatan_table', 1);
INSERT INTO `migrations` VALUES (12, '2021_04_12_224150_create_prodi_table', 1);
INSERT INTO `migrations` VALUES (13, '2021_04_12_224456_create_jurusan_table', 1);
INSERT INTO `migrations` VALUES (14, '2021_06_29_021042_create_users_table', 1);
INSERT INTO `migrations` VALUES (15, '2021_07_03_180009_create_level_table', 1);
INSERT INTO `migrations` VALUES (16, '2021_07_03_180221_create_partisipan_table', 1);

-- ----------------------------
-- Table structure for partisipan
-- ----------------------------
DROP TABLE IF EXISTS `partisipan`;
CREATE TABLE `partisipan`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Internal','Eksternal') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `partisipan_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('satsaratri@gmail.com', '$2y$10$.5F0gu25SRLK35Q2iixbPeWQWl9E24kWEUCz1gjaQjhbf5K/DCtKG', '2021-07-25 16:44:18');

-- ----------------------------
-- Table structure for prodi
-- ----------------------------
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prodi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jurusan` int(1) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prodi
-- ----------------------------
INSERT INTO `prodi` VALUES (0, 'Umum', NULL);
INSERT INTO `prodi` VALUES (1, 'Teknik Informatika', 1);
INSERT INTO `prodi` VALUES (2, 'Teknik Komputer', 1);
INSERT INTO `prodi` VALUES (3, 'Manajemen Informatika', 1);
INSERT INTO `prodi` VALUES (4, 'Rekam Medik', 2);
INSERT INTO `prodi` VALUES (6, 'Gizi Klinik', 2);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_prodi` int(1) NULL DEFAULT NULL,
  `id_jurusan` int(1) NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (12, 'Admin', 'admin', '$2y$10$qNFdvJFr8ZHz82rnJhDDQeiD/X0QrL9MjJ9TCEc1IRWzodYIMmHni', 'L', '082311626296', 'admin', 1, 1, NULL, '2021-07-22 16:27:52', '2021-07-22 16:27:52');
INSERT INTO `users` VALUES (13, 'Root', 'root', '$2y$10$a3Kbailpw2yq.WTPHz1RleZUGQuQJX79wbiIpbtELcfKuqTaxXKYS', 'L', '085156186156', 'root', 1, 1, NULL, '2021-07-22 23:52:47', '2021-07-22 23:52:47');
INSERT INTO `users` VALUES (17, 'Satsa Ratri Hastutik', 'satsaratri@gmail.com', '$2y$10$A1t3svMDWtu3wB4BUpwROOUTbUOU3U17WDZKaj0xBBdhR6YsXwLPS', 'P', '08912375823', 'admin', 2, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 'Dana Satria Mukti', 'danasatria19@gmail.com', '$2y$10$U4UcTouYtwRuPzyVpGJg/uHeG1W3sd/ioQXjLhRfCjIHwOrdReyQe', 'L', '087818274752', 'admin', 3, 1, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 'Dika Samudera', 'dikasamudera@gmail.com', '$2y$10$2Y1VQ9vyDaVu8yfZpixYeegtzmL332ESdIB5WlBbBtDW5Z3woiZp2', 'L', '082382737123', 'admin', 6, 2, NULL, NULL, NULL);
INSERT INTO `users` VALUES (21, 'Dicky Kurnia Ramadhan', 'dickynakiri@gmail.com', '$2y$10$exO5RnH95izf7zSo7KjobeGyCyUTw2DmmtkycGyDXFBHI9Uo2aBeu', 'L', '085156186156', 'admin', 1, 1, NULL, '2021-07-25 18:31:31', '2021-07-25 18:31:31');

SET FOREIGN_KEY_CHECKS = 1;
