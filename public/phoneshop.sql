-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: phoneshop
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banner` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `hinh_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dong1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dong2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dong3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vi_tri` int NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'banner1.png',NULL,NULL,NULL,1,'http://phoneshop.vn',1,'Vị trí đầu tiên trên Trang chủ',NULL,NULL),(2,'banner2.png',NULL,NULL,NULL,2,'http://phoneshop.vn',1,'Vị trí giữa Trang chủ, bên trái',NULL,NULL),(3,'banner3.jpeg',NULL,NULL,NULL,3,'http://phoneshop.vn',1,'Vị trí giữa Trang chủ, bên phải',NULL,NULL);
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `binh_luan`
--

DROP TABLE IF EXISTS `binh_luan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binh_luan` (
  `ma_san_pham` int unsigned NOT NULL,
  `ma_chi_tiet_binh_luan` int unsigned NOT NULL,
  `ma_khach_hang` int unsigned NOT NULL,
  KEY `binh_luan_ma_san_pham_foreign` (`ma_san_pham`),
  KEY `binh_luan_ma_chi_tiet_binh_luan_foreign` (`ma_chi_tiet_binh_luan`),
  KEY `binh_luan_ma_khach_hang_foreign` (`ma_khach_hang`),
  CONSTRAINT `binh_luan_ma_chi_tiet_binh_luan_foreign` FOREIGN KEY (`ma_chi_tiet_binh_luan`) REFERENCES `chi_tiet_binh_luan` (`ma_chi_tiet_binh_luan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `binh_luan_ma_khach_hang_foreign` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `binh_luan_ma_san_pham_foreign` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binh_luan`
--

LOCK TABLES `binh_luan` WRITE;
/*!40000 ALTER TABLE `binh_luan` DISABLE KEYS */;
INSERT INTO `binh_luan` VALUES (1,1,1),(10,2,2),(9,3,3),(15,4,4),(16,5,1),(13,6,2);
/*!40000 ALTER TABLE `binh_luan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chi_tiet_binh_luan`
--

DROP TABLE IF EXISTS `chi_tiet_binh_luan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_binh_luan` (
  `ma_chi_tiet_binh_luan` int unsigned NOT NULL AUTO_INCREMENT,
  `danh_gia_sao` tinyint unsigned NOT NULL,
  `tieu_de` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loi_binh_luan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_chi_tiet_binh_luan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chi_tiet_binh_luan`
--

LOCK TABLES `chi_tiet_binh_luan` WRITE;
/*!40000 ALTER TABLE `chi_tiet_binh_luan` DISABLE KEYS */;
INSERT INTO `chi_tiet_binh_luan` VALUES (1,4,'SP tốt','Good chi_tiet_binh_luan',NULL,'2021-06-26 01:00:00','2021-06-26 01:00:00'),(2,5,'SP tốt','Good chi_tiet_binh_luan',NULL,'2021-07-26 01:00:00','2021-07-26 01:00:00'),(3,4,'SP tốt','Good chi_tiet_binh_luan',NULL,'2021-08-26 01:00:00','2021-08-26 01:00:00'),(4,5,'SP tốt','Good chi_tiet_binh_luan',NULL,'2021-09-26 01:00:00','2021-09-26 01:00:00'),(5,4,'SP tốt','Good chi_tiet_binh_luan',NULL,'2021-10-26 01:00:00','2021-10-26 01:00:00'),(6,5,'SP tốt','Good chi_tiet_binh_luan',NULL,'2021-12-26 01:00:00','2021-12-26 01:00:00');
/*!40000 ALTER TABLE `chi_tiet_binh_luan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chi_tiet_hoa_don`
--

DROP TABLE IF EXISTS `chi_tiet_hoa_don`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chi_tiet_hoa_don` (
  `ma_hoa_don` int unsigned NOT NULL,
  `ma_san_pham` int unsigned NOT NULL,
  `so_luong` int unsigned NOT NULL,
  `don_gia` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `chi_tiet_hoa_don_ma_san_pham_foreign` (`ma_san_pham`),
  KEY `chi_tiet_hoa_don_ma_hoa_don_foreign` (`ma_hoa_don`),
  CONSTRAINT `chi_tiet_hoa_don_ma_hoa_don_foreign` FOREIGN KEY (`ma_hoa_don`) REFERENCES `hoa_don` (`ma_hoa_don`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chi_tiet_hoa_don_ma_san_pham_foreign` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chi_tiet_hoa_don`
--

LOCK TABLES `chi_tiet_hoa_don` WRITE;
/*!40000 ALTER TABLE `chi_tiet_hoa_don` DISABLE KEYS */;
INSERT INTO `chi_tiet_hoa_don` VALUES (1,1,1,5296900,'2021-06-25 00:00:30','2021-06-25 00:00:30'),(2,10,1,20490000,'2021-07-25 01:00:30','2021-07-25 01:00:30'),(3,9,1,2490000,'2021-08-25 02:00:30','2021-08-25 02:00:30'),(4,15,1,5790000,'2021-09-25 03:00:30','2021-09-25 03:00:30'),(5,16,1,8190000,'2021-10-25 04:00:30','2021-10-25 04:00:30'),(6,13,1,41990000,'2021-12-25 05:00:30','2021-12-25 05:00:30');
/*!40000 ALTER TABLE `chi_tiet_hoa_don` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cua_hang`
--

DROP TABLE IF EXISTS `cua_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cua_hang` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `ten_cua_hang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_thoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cua_hang`
--

LOCK TABLES `cua_hang` WRITE;
/*!40000 ALTER TABLE `cua_hang` DISABLE KEYS */;
INSERT INTO `cua_hang` VALUES (1,'phoneshop','Trảng Bom, Đồng Nai, Việt Nam','0392262790','josephlam1304@gmail.com','https://www.facebook.com/sergius.volam/','https://twitter.com/Minhyunhang','2021-12-19 17:00:00','2021-12-25 17:00:00');
/*!40000 ALTER TABLE `cua_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giam_gia`
--

DROP TABLE IF EXISTS `giam_gia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giam_gia` (
  `ma_giam_gia` int unsigned NOT NULL AUTO_INCREMENT,
  `code_giam_gia` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_tien_giam_gia` int unsigned NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `thoi_gian_bat_dau` datetime NOT NULL,
  `thoi_gian_ket_thuc` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_giam_gia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giam_gia`
--

LOCK TABLES `giam_gia` WRITE;
/*!40000 ALTER TABLE `giam_gia` DISABLE KEYS */;
INSERT INTO `giam_gia` VALUES (1,'christmas',1500000,0,'2021-12-20 00:00:00','2021-12-26 00:00:00',NULL,NULL),(2,'tetduonglich',600000,1,'2022-01-01 00:00:00','2022-01-14 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `giam_gia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoa_don`
--

DROP TABLE IF EXISTS `hoa_don`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoa_don` (
  `ma_hoa_don` int unsigned NOT NULL AUTO_INCREMENT,
  `ma_khach_hang` int unsigned NOT NULL,
  `tong_tien` bigint unsigned NOT NULL,
  `tien_tra_truoc` bigint unsigned NOT NULL,
  `con_lai` bigint unsigned NOT NULL,
  `ma_trang_thai_hoa_don` tinyint unsigned NOT NULL DEFAULT '2',
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_hoa_don`),
  KEY `hoa_don_ma_khach_hang_foreign` (`ma_khach_hang`),
  KEY `hoa_don_ma_trang_thai_hoa_don_foreign` (`ma_trang_thai_hoa_don`),
  CONSTRAINT `hoa_don_ma_khach_hang_foreign` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hoa_don_ma_trang_thai_hoa_don_foreign` FOREIGN KEY (`ma_trang_thai_hoa_don`) REFERENCES `trang_thai_hoa_don` (`ma_trang_thai_hoa_don`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoa_don`
--

LOCK TABLES `hoa_don` WRITE;
/*!40000 ALTER TABLE `hoa_don` DISABLE KEYS */;
INSERT INTO `hoa_don` VALUES (1,1,5296900,5296900,0,4,NULL,NULL,NULL),(2,2,20490000,20490000,0,2,NULL,NULL,NULL),(3,3,2490000,2490000,0,3,NULL,NULL,NULL),(4,4,5790000,5790000,0,1,NULL,NULL,NULL),(5,1,8190000,8190000,0,3,NULL,NULL,NULL),(6,2,41990000,41990000,0,4,NULL,NULL,NULL);
/*!40000 ALTER TABLE `hoa_don` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khach_hang`
--

DROP TABLE IF EXISTS `khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khach_hang` (
  `ma_khach_hang` int unsigned NOT NULL AUTO_INCREMENT,
  `ho_kh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_kh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinh_nhat` date NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_thoai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_trang_thai_khach_hang` tinyint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_khach_hang`),
  KEY `khach_hang_ma_trang_thai_khach_hang_foreign` (`ma_trang_thai_khach_hang`),
  CONSTRAINT `khach_hang_ma_trang_thai_khach_hang_foreign` FOREIGN KEY (`ma_trang_thai_khach_hang`) REFERENCES `trang_thai_khach_hang` (`ma_trang_thai_khach_hang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khach_hang`
--

LOCK TABLES `khach_hang` WRITE;
/*!40000 ALTER TABLE `khach_hang` DISABLE KEYS */;
INSERT INTO `khach_hang` VALUES (1,'Ngụy','Tấn','1980-01-01',1,'Tân Bình, Tp.HCM','nguytan@gmail.com','1234567',1,NULL,NULL,'$2y$10$K3hzqBpgojH3wuSxP1CXS.K9M4ouTi61IxaSpFIlSgoXvNXDGRdOO'),(2,'Lại','Thu Hà','1990-01-21',0,'Trảng Bom, Đồng Nai','vothuha@gmail.com','1234567',1,NULL,NULL,'$2y$10$Qs3USwuZq8EmGJ.d9E0zCOwD6BG8DP65qjbkKPzgjnEeCr6HYkIce'),(3,'Hứa','Khải Minh','1996-03-02',1,'Q.5, Tp.HCM','huakhaiminh@gmail.com','1234567',1,NULL,NULL,'$2y$10$bqthl5nP0sNOTm3dEAF/kuc5gF/afdsWnHU2TR5h0HJ.rsv5fZPPe'),(4,'Vũ','Hoàng Lâm','1996-04-13',1,'Trảng Bom, Đồng Nai','josephlam1304@gmail.com','1234567',1,NULL,NULL,'$2y$10$R0lCH.fj3yYOFlrexATizOPi8YsKhp.R2MYE759jL6CrSqJnscy/G');
/*!40000 ALTER TABLE `khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loai_san_pham`
--

DROP TABLE IF EXISTS `loai_san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loai_san_pham` (
  `ma_loai_san_pham` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `ten_loai_san_pham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_loai_san_pham`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loai_san_pham`
--

LOCK TABLES `loai_san_pham` WRITE;
/*!40000 ALTER TABLE `loai_san_pham` DISABLE KEYS */;
INSERT INTO `loai_san_pham` VALUES (1,'Điện thoại Android','','',NULL,NULL),(2,'iPhone','','',NULL,NULL),(3,'Tablet Android','','',NULL,NULL),(4,'iPad','','',NULL,NULL),(5,'Phụ kiện điện thoại','','',NULL,NULL);
/*!40000 ALTER TABLE `loai_san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (199,'2014_10_12_000000_create_users_table',1),(200,'2014_10_12_100000_create_password_resets_table',1),(201,'2019_08_19_000000_create_failed_jobs_table',1),(202,'2019_12_14_000001_create_personal_access_tokens_table',1),(203,'2021_12_15_000001_create_thuong_hieu_table',1),(204,'2021_12_16_000002_create_lsp_table',1),(205,'2021_12_18_000030_create_tin_tuc_table',1),(206,'2021_12_18_000035_create_banner_table',1),(207,'2021_12_19_000005_create_chi_tiet_binh_luan_table',1),(208,'2021_12_20_000006_giam_gia_table',1),(209,'2021_12_21_000007_create_sp_table',1),(210,'2021_12_22_000030_create_trang_thai_khach_hang_table',1),(211,'2021_12_23_000009_create_khach_hang_table',1),(212,'2021_12_23_000030_create_trang_thai_hoa_don_table',1),(213,'2021_12_23_000040_create_binh_luan_table',1),(214,'2021_12_24_000010_create_hoa_don_table',1),(215,'2021_12_25_000011_create_chi_tiet_hoa_don_table',1),(216,'2021_12_25_010230_create_cua_hang_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `san_pham` (
  `ma_san_pham` int unsigned NOT NULL AUTO_INCREMENT,
  `ten_san_pham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_url` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_thuong_hieu` tinyint unsigned NOT NULL,
  `hinh1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `he_dieu_hanh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` tinyint unsigned DEFAULT NULL,
  `bo_nho_trong` int unsigned DEFAULT NULL,
  `chip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera_truoc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera_sau` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `man_hinh` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ma_loai_san_pham` tinyint unsigned NOT NULL,
  `don_gia` int unsigned NOT NULL,
  `ma_giam_gia` int unsigned DEFAULT NULL,
  `so_luong_ton` int unsigned NOT NULL,
  `san_pham_kem_theo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `tom_tat_san_pham` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chi_tiet_san_pham` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_nguoi_dang_bai` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_san_pham`),
  KEY `san_pham_ma_thuong_hieu_foreign` (`ma_thuong_hieu`),
  KEY `san_pham_ma_loai_san_pham_foreign` (`ma_loai_san_pham`),
  KEY `san_pham_ma_nguoi_dang_bai_foreign` (`ma_nguoi_dang_bai`),
  KEY `san_pham_ma_giam_gia_foreign` (`ma_giam_gia`),
  CONSTRAINT `san_pham_ma_giam_gia_foreign` FOREIGN KEY (`ma_giam_gia`) REFERENCES `giam_gia` (`ma_giam_gia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `san_pham_ma_loai_san_pham_foreign` FOREIGN KEY (`ma_loai_san_pham`) REFERENCES `loai_san_pham` (`ma_loai_san_pham`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `san_pham_ma_nguoi_dang_bai_foreign` FOREIGN KEY (`ma_nguoi_dang_bai`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `san_pham_ma_thuong_hieu_foreign` FOREIGN KEY (`ma_thuong_hieu`) REFERENCES `thuong_hieu` (`ma_thuong_hieu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `san_pham`
--

LOCK TABLES `san_pham` WRITE;
/*!40000 ALTER TABLE `san_pham` DISABLE KEYS */;
INSERT INTO `san_pham` VALUES (1,'Sharp Aquos Sense 6','sharp-apuos-sense-6-1',1,'sharp-aquos-sense6-600x600.jpg','','','android','2 Nano SIM (SIM 2 chung khe thẻ nhớ)',4,64,'Snapdragon 690 8 nhân','8 MP','Chính 48 MP & Phụ 8 MP, 8 MP','AMOLED 6.1\" - Quad HD+ (2K+)',1,5296900,1,84,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2021-12-25 00:30:10','2021-12-25 00:30:10'),(2,'Motorola Moto G8 Power Lite','motorola-moto-g8-power-lite-2',2,'motorola-moto-g8-power-lite-600x600-600x600.jpg','','','android 9 (Pie)','2 Nano SIM (SIM 2 chung khe thẻ nhớ)',4,64,'MediaTek Helio P35 8 nhân','8 MP','Chính 16 MP & Phụ 2 MP, 2 MP','AMOLED 6.5\" Full HD+ ',1,6172040,2,6,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2021-12-26 00:30:10','2021-12-26 00:30:10'),(3,'Nokia 9 PureView','nokia-9-pureview-3',3,'nokia-9-pureview-1-600x600.jpg','','','Android 9 (Android One)','2 Nano SIM (SIM 2 chung khe thẻ nhớ)',6,128,'Snapdragon 845 8 nhân','20 MP','5 camera 12 MP, TOF 3D','AMOLED 5.99\" Full HD+ ',1,7099000,1,64,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2021-12-27 00:30:10','2021-12-27 00:30:10'),(4,'Xiaomi Mi 11 5G','xiaomi-mi-11-5g-4',4,'xiaomi-mi-11-xanhduong-1-org.jpg','xiaomi-mi-11-xanhduong-2-org.jpg','xiaomi-mi-11-xanhduong-3-org.jpg','Android 11','2 Nano SIM Hỗ trợ 5G',8,256,'Snapdragon 888','20 MP','Chính 108 MP & Phụ 13 MP, 5 MP','AMOLED 6.81\" Quad HD+ (2K+)',1,21990000,NULL,82,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2021-12-28 00:30:10','2021-12-28 00:30:10'),(5,'iPhone XR','iphone-xr-5',9,'iphone-xr-128gb-den-1-1-org.jpg','iphone-xr-128gb-den-6-org.jpg','iphone-xr-128gb-den-7-org.jpg','iOS 14','1 Nano SIM & 1 eSIM Hỗ trợ 4G',3,64,'Apple A12 Bionic','7 MP','12 MP','IPS LCD 6.1\" Liquid Retina',2,14490000,NULL,42,'Ốp lưng, headphone, sạc điện thoại ','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2021-12-29 00:30:10','2021-12-29 00:30:10'),(6,'Realme C11','realme-c11-6',5,'realme-c11-2021-xam-1-org.jpg','realme-c11-2021-xam-2-org.jpg','realme-c11-2021-xam-3-org.jpg','Android 11 (Go Edition)','2 Nano SIM Hỗ trợ 4G',2,64,'Spreadtrum SC9863A','5 MP','8 MP','IPS LCD 6.5\" HD+',1,2990000,NULL,48,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2021-12-30 00:30:10','2021-12-30 00:30:10'),(7,'Vivo V21 5G','vivo-v21-5g-7',6,'vivo-v21-5g-xanh-den-1-org.jpg','vivo-v21-5g-xanh-den-2-org.jpg','vivo-v21-5g-xanh-den-3-org.jpg','Android 11','2 Nano SIM Hỗ trợ 5G',8,128,'MediaTek Dimensity 800U 5G','44 MP','Chính 64 MP & Phụ 8 MP, 2 MP','AMOLED 6.44\" Full HD+',1,9690000,NULL,18,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2021-12-31 00:30:10','2021-12-31 00:30:10'),(8,'Sony Xperia XZ1 Ultra','sony-xperia-xz1-ultra-8',7,'sony-xperia-xz1-ultra-300x300.jpg','','','Android 8 (Oreo)','2 Nano SIM Hỗ trợ 4G',4,64,'Snapdragon 845','13 MP','2 camera 12 MP','5.5\" Full HD',1,3499000,NULL,71,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-01 00:30:10','2022-01-01 00:30:10'),(9,'Itel L6502 ','itel-l6502-9',8,'itel-l6502-xanh-1-1.jpg','itel-l6502-xanh-2.jpg','itel-l6502-xanh-8.jpg','Android 10 (Go Edition)','2 Nano SIM Hỗ trợ 4G',3,32,'Spreadtrum SC9832E','5 MP','Chính 8 MP & Phụ VGA, VGA','IPS LCD 6.5\" HD+',1,2490000,1,13,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-02 00:30:10','2022-01-02 00:30:10'),(10,'iPhone 13 mini','iphone-13-mini-10',9,'iphone-13-mini-black-2.jpg','iphone-13-mini-hong-10.jpg','iphone-13-mini-hong-11.jpg','iOS 15','1 Nano SIM & 1 eSIM Hỗ trợ 5G',4,128,'Apple A15 Bionic','12 MP','2 camera 12 MP','OLED 5.4\" Super Retina XDR',2,20490000,2,60,'Ốp lưng, headphone, sạc điện thoại ','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-03 00:30:10','2022-01-03 00:30:10'),(11,'Samsung Galaxy A52s','samsung-galaxy-a52s-11',10,'samsung-galaxy-a52s-5g-violet-gc-org.jpg','samsung-galaxy-a52s-5g-violet-4.jpg','samsung-galaxy-a52s-5g-violet-6.jpg','Android 11','2 Nano SIM Hỗ trợ 5G',8,128,'Snapdragon 778G 5G 8 nhân','32 MP','Chính 64 MP & Phụ 12 MP, 5 MP, 5 MP','Super AMOLED 6.5\" Full HD+',1,10990000,1,50,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-04 00:30:10','2022-01-04 00:30:10'),(12,'Xiaomi Redmi 9A','xiaomi-redmi-9a-12',4,'-xiaomi-redmi-9a-slider-1.jpg','vi-vn-xiaomi-redmi-9a-manhinh.jpg','vi-vn-xiaomi-redmi-9a-chip.jpg','Android 10','2 Nano SIM Hỗ trợ 4G',2,32,'MediaTek Helio G25','5 MP','13 MP','IPS LCD 6.53\" HD+',1,2490000,2,39,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-05 00:30:10','2022-01-05 00:30:10'),(13,'Samsung Galaxy Z Fold3','samsung-galaxy-z-fold3-13',10,'samsung-galaxy-z-fold-3-green-gc-org.jpg','samsung-galaxy-z-fold-3-green3-org.jpg','samsung-galaxy-z-fold-3-green2-org.jpg','Android 11','2 Nano SIM + 1 eSIM Hỗ trợ 5G',12,256,'Snapdragon 888','10 MP & 4 MP','3 camera 12 MP','Dynamic AMOLED 2X Chính 7.6\" & Phụ 6.2\" Full HD+',1,41990000,1,59,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-06 00:30:10','2022-01-06 00:30:10'),(14,'Vivo X70 Pro 5G','vivo-x70-pro-5g-14',6,'vi-vn-vivo-x70-pro-5g-slider-tong-quan.jpg','vi-vn-vivo-x70-pro-5g-slider-camera.jpg','vi-vn-vivo-x70-pro-5g-slider-chip.jpg','Android 11','2 Nano SIM Hỗ trợ 5G',12,256,'MediaTek Dimensity 1200','32 MP','Chính 50 MP & Phụ 12 MP, 12 MP, 8 MP','AMOLED 6.56\" Full HD+',1,18990000,1,86,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-07 00:30:10','2022-01-07 00:30:10'),(15,'Samsung Galaxy A31','samsung-galaxy-a31-15',10,'samsung-galaxy-a31-xanh-1-org.jpg','samsung-galaxy-a31-xanh-2-org.jpg','samsung-galaxy-a31-trang-3-org.jpg','Android 10','2 Nano SIM Hỗ trợ 4G',6,128,'MediaTek MT6768 (Helio P65)','20 MP','Chính 48 MP & Phụ 8 MP, 5 MP, 5 MP','Super AMOLED 6.4\" Full HD+',1,5790000,2,62,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-08 00:30:10','2022-01-08 00:30:10'),(16,'Lenovo Tab P11 Plus','lenovo-tab-p11-plus-16',11,'lenovo-tab-p11-plus-xanh-ngoc-1.jpg','lenovo-tab-p11-plus-grey-2.jpg','lenovo-tab-p11-plus-grey-1.jpg','Android 11','1 Nano SIM',4,64,'MediaTek Helio G90T','8 MP','13 MP','11\" IPS LCD',3,8190000,2,32,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-09 00:30:10','2022-01-09 00:30:10'),(17,'Huawei MatePad T10','huawei-matepad-t10-17',12,'huawei-matepad-t10-1-1.jpg','','','Android 10 (Không có Google)','1 Nano SIM',2,32,'Kirin 710A','2 MP','5 MP','9.7\" IPS LCD',3,4990000,NULL,22,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-10 00:30:10','2022-01-10 00:30:10'),(18,'Xiaomi 11T Pro 5G 12GB','xiaomi-11t-pro-5g-12gb-18',4,'xiaomi-11t-pro-slider-tong-quan-1020x570.jpg','vi-vn-xiaomi-11t-pro-slider-camera.jpg','vi-vn-xiaomi-11t-pro-slider-cau-hinh.jpg','Android 11','2 Nano SIM Hỗ trợ 5G',12,256,'Snapdragon 888','16 MP','Chính 108 MP & Phụ 8 MP, 5 MP','AMOLED 6.67\" Full HD+ ',1,14990000,NULL,64,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-11 00:30:10','2022-01-11 00:30:10'),(19,'Realme 6i','realme-6i-19',5,'-realme-6i-slider.jpg','vi-vn-realme-6i-manhinh.jpg','-realme-6i-camerasau.jpg','Android 10','2 Nano SIM Hỗ trợ 4G',4,128,'MediaTek Helio G90T','16 MP','Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP','IPS LCD 6.5\" Full HD+',1,5990000,NULL,5,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-12 00:30:10','2022-01-12 00:30:10'),(20,'iPhone 13 Pro Max','iphone-13-pro-max-20',9,'iphone-13-pro-max-silver-2.jpg','iphone-13-pro-max-silver-3.jpg','iphone-13-pro-max-silver-4.jpg','iOS 15','1 Nano SIM & 1 eSIM Hỗ trợ 5G',6,128,'Apple A15 Bionic','12 MP','3 camera 12 MP','OLED 6.7\" Super Retina XDR',2,32990000,NULL,90,'Ốp lưng, headphone, sạc điện thoại ','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-13 00:30:10','2022-01-13 00:30:10'),(21,'Samsung Galaxy A03s','samsung-galaxy-a03s-21',10,'samsung-galaxy-a03s-black-gc-org.jpg','samsung-galaxy-a03s-black-4.jpg','samsung-galaxy-a03s-black-7.jpg','Android 11','2 Nano SIM Hỗ trợ 4G',4,64,'MediaTek MT6765','5 MP','Chính 13 MP & Phụ 2 MP, 2 MP','PLS LCD 6.5\" HD+',1,3690000,NULL,32,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-14 00:30:10','2022-01-14 00:30:10'),(22,'Vivo Y21','vivo-y21-22',6,'vivo-y21-blue-gc-1-org.jpg','vivo-y21-6-1.jpg','vivo-y21-8-1.jpg','Android 11','2 Nano SIM Hỗ trợ 4G',4,64,'MediaTek Helio P35','8 MP','Chính 13 MP & Phụ 2 MP','IPS LCD 6.51\" HD+',1,4290000,1,15,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-15 00:30:10','2022-01-15 00:30:10'),(23,'iPhone SE','iphone-se-23',9,'iphone-se-64gb-2020-hop-moi-trang-1-1-org.jpg','iphone-se-64gb-2020-hop-moi-trang-2-org.jpg','iphone-se-64gb-2020-hop-moi-trang-12-org.jpg','iOS 14','1 Nano SIM & 1 eSIM Hỗ trợ 4G',3,64,'Apple A13 Bionic','7 MP','12 MP','IPS LCD 4.7\" Retina HD',2,13490000,NULL,52,'Ốp lưng, headphone, sạc điện thoại ','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',1,'2022-01-16 00:30:10','2022-01-16 00:30:10'),(24,'Vivo V23e','vivo-v23e-24',6,'vivo-v23e-n.jpg','vi-vn-vivo-v23e-manhinh-slider.jpg','vi-vn-vivo-v23e-camera-slider.jpg','Android 11',' 2 Nano SIM (SIM 2 chung khe thẻ nhớ) Hỗ trợ 4G ',8,128,'MediaTek Helio G96 8 nhân','50 MP','Chính 64 MP & Phụ 8 MP, 2 MP','AMOLED 6.44\" Full HD+',1,8490000,NULL,39,'Headphone 3.5, sạc điện thoại android','',1,'Donec eget quam nulla. Nunc egestas congue arcu, eu accumsan orci auctor sed. Fusce sollicitudin ultrices velit. Suspendisse lobortis nisi rutrum iaculis vehicula. Quisque consectetur eros ac risus viverra imperdiet. Integer mauris nulla sodales sed.','<p><b>Lorem Ipsum</b></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pellentesque ac diam vel dictum. In varius luctus nibh, mollis fermentum tellus ullamcorper quis. Vivamus in leo luctus justo condimentum sollicitudin sed sit amet eros.</p><p>Fusce varius viverra sapien. Aliquam vel dignissim turpis, eu cursus leo. Suspendisse dapibus lectus sed rhoncus dictum. Integer blandit lectus eu mi auctor, luctus porttitor nisl rutrum. Mauris posuere faucibus dui et blandit. Suspendisse quis sem ac massa tempor ornare non vel quam.</p><p>Maecenas dui augue, sagittis quis tortor non, tempor hendrerit purus. Fusce gravida ex purus, id porta turpis eleifend a. Nullam nisi dui, dapibus vel auctor vitae, aliquam vitae sem. Etiam consectetur, libero et aliquet imperdiet, ligula lorem hendrerit lacus, sed eleifend leo orci sed nibh. Donec porta, est eu imperdiet laoreet, dolor nisi vulputate dolor, consequat bibendum ligula turpis nec ex. Nunc vitae euismod tortor. Sed turpis est, pharetra quis rutrum ac, consequat sed erat. Maecenas sit amet mi eu nibh eleifend scelerisque. Proin scelerisque lectus nec ultricies vestibulum. Ut lorem lectus, dapibus ac ex vitae, mollis tincidunt augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam erat volutpat. Sed molestie ante dolor, ac convallis neque mollis a. Donec turpis nisl, consequat vehicula tempor nec, tempus vel purus. Sed ac tempus urna. Nulla eget hendrerit elit, a consectetur lectus.</p>',2,'2022-01-17 00:30:10','2022-01-17 00:30:10');
/*!40000 ALTER TABLE `san_pham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuong_hieu`
--

DROP TABLE IF EXISTS `thuong_hieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thuong_hieu` (
  `ma_thuong_hieu` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `ten_thuong_hieu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_thuong_hieu`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuong_hieu`
--

LOCK TABLES `thuong_hieu` WRITE;
/*!40000 ALTER TABLE `thuong_hieu` DISABLE KEYS */;
INSERT INTO `thuong_hieu` VALUES (1,'Sharp','logo_sharp.png','',1,NULL,NULL),(2,'Motorola','logo_motorola.png','',1,NULL,NULL),(3,'Nokia','nokia_white_logo.png','',1,NULL,NULL),(4,'Xiaomi','logo_xiaome.png','',1,NULL,NULL),(5,'Realme','realme-logo.png','',1,NULL,NULL),(6,'Vivo','logo_vivo.jpeg','',1,NULL,NULL),(7,'Sony','SONY-LOGO.jpg','',1,NULL,NULL),(8,'itel','logo_itel.jpg','',1,NULL,NULL),(9,'iPhone','logo_apple.png','',1,NULL,NULL),(10,'Samsung','Samsung-Logo.png','',1,NULL,NULL),(11,'Lenovo','logo-lenovo.png','',1,NULL,NULL),(12,'Huawei','logo-huawei.png','',1,NULL,NULL);
/*!40000 ALTER TABLE `thuong_hieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tin_tuc`
--

DROP TABLE IF EXISTS `tin_tuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tin_tuc` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tieu_de` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tom_tat` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chi_tiet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_nhan_vien_dang_bai` bigint unsigned NOT NULL,
  `hinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tin_tuc_ma_nhan_vien_dang_bai_foreign` (`ma_nhan_vien_dang_bai`),
  CONSTRAINT `tin_tuc_ma_nhan_vien_dang_bai_foreign` FOREIGN KEY (`ma_nhan_vien_dang_bai`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tin_tuc`
--

LOCK TABLES `tin_tuc` WRITE;
/*!40000 ALTER TABLE `tin_tuc` DISABLE KEYS */;
INSERT INTO `tin_tuc` VALUES (1,'Apple buộc người dùng chuyển sang iOS 15','Apple đã ngừng phát hành bản cập nhật bảo mật cho iOS 14 để thúc đẩy chủ sở hữu của các tiện ích tương thích chuyển sang iOS 15.','<p>Theo Aroged, điều này diễn ra bất chấp việc nhà sản xuất iPhone từng hứa sẽ thường xuyên tung ra các bản vá bảo mật cho những người không muốn chuyển sang hệ điều hành mới.</p><p>Sau khi phát hành iOS 15, Apple thậm chí còn nói rằng iOS hiện sẽ cung cấp sự lựa chọn giữa hai phiên bản cập nhật phần mềm, trong đó người dùng có thể chỉ cần cài đặt các bản cập nhật bảo mật cho iOS 14 hoặc nâng cấp lên iOS 15.</p>',1,'ios15.jpeg',1,'2022-01-01 01:00:00','2022-01-01 01:00:00'),(2,'Người dân có thể tự khai mũi tiêm trên ứng dụng PC-Covid','Theo Trung tâm Công nghệ phòng, chống Covid-19 Quốc gia, phiên bản 4.2.0 của ứng dụng phòng chống dịch PC-Covid vừa được phát hành trên kho ứng dụng CH Play của Google.','<p>Để cập nhật phiên bản mới, người dùng thiết bị chạy hệ điều hành iOS và Android hiện chỉ cần vào các kho ứng dụng App Store hoặc CH Play, gõ \"PC-Covid\" trong khung tìm kiếm, chọn \"PC-Covid Quốc gia\" và bấm cập nhật.</p><p>Phiên bản mới của PC-Covid đã được bổ sung 2 tính năng mới: Tự khai mũi tiêm và Ví giấy tờ. Trong đó, với tính năng tự khai mũi tiêm, trong trường hợp thông tin mũi tiêm hiển thị trên ứng dụng PC-Covid chưa chính xác, người dùng có thể tự khai thông tin tiêm và đính kèm ảnh chụp giấy chứng nhận để minh chứng. Sau đó thông tin tiêm sẽ được hiển thị lên với dấu \"Tự khai\".</p>',1,'pc15.jpeg',1,'2022-01-10 01:00:00','2022-01-10 01:00:00'),(3,'AMD tiếp tục góp mặt trong hệ thống Amazon EC2 mới','Vừa qua, AMD cho biết dịch vụ đám mây hàng đầu thế giới Amazon Web Service tiếp tục sử dụng các mẫu CPU dòng EPYC thế hệ mới cho các hệ thống máy tính Amazon EC2 Hpc6a thế hệ mới của mình.','<p>Hpc6a sẽ giúp cho người dùng doanh nghiệp tính toán các hoạt động cần đến năng lực xử lý khổng lồ như giải mã bộ gene, tính toán hoạt lực chất lỏng, dự báo thời tiết, hay dự đoán các rủi ro tài chính…Trong thế giới các siêu máy tính hàng đầu thế giới hiện nay, số lượng các máy sử dụng vi xử lý AMD EPYC đang ngày một gia tăng, có đến 73 máy trong danh sách Top 500 máy mạnh nhất thế giới sử dụng dòng vi xử lý này của AMD với 70 kỷ lực thế giới. Con số này sẽ còn tăng lên khi các hệ thống siêu máy tính sử dụng vi xử lý AMD EPYC sẽ tiếp tục ra mắt thị trường trong năm 2022 tới đây.</p><p>Các hệ thống Hpc6a mới sẽ sử dụng các vi xử lý AMD EPYC thế hệ thứ ba mới nhất cho dịch vụ Amazon EC2, đáp ứng được nhu cầu tính toán hiệu suất cao, bộ nhớ và dung lượng lưu trữ lớn nhưng với mức chi phí vô cùng phù hợp.</p>',1,'amd.jpg',1,'2022-01-11 01:00:00','2022-01-11 01:00:00'),(4,'Intel buộc tất cả hãng mainboard ngừng hỗ trợ AVX-512 trên chipset 600 series','Intel muốn các hãng bo mạch chủ tung BIOS ngừng hỗ trợ tập lệnh AVX-512 đối với chip thế hệ 12 “Alder Lake”.','<p>Theo thông tin chính thức thì CPU Intel thế hệ 12 “Alder Lake” không hỗ trợ tập lệnh AVX-512, nhưng người dùng có thể vô hiệu hóa các nhân tiết kiệm điện Gracemont (chỉ chạy nhân hiệu năng cao Golden Cove) để bật tính năng hỗ trợ tập lệnh này. Việc này cho phép tăng một chút hiệu năng (performance) và hiệu suất (efficiency) so với tập lệnh AVX2. Tuy nhiên, theo báo cáo của trang Igor’s Lab thì điều này có thể sẽ thay đổi các bạn ạ.</p><p>Theo đó, Intel hiện đang yêu cầu các hãng bo mạch chủ ngừng hỗ trợ AVX-512 đối với CPU Intel “Alder Lake” thông qua bản cập nhật BIOS. Chuyện này cũng không quá bất ngờ cho lắm, do sắp tới Intel sẽ ra mắt những con chip “Alder Lake” non-K mà phần lớn chỉ được trang bị nhân hiệu năng cao Golden Cove mà thôi.</p>',1,'intel.jpg',1,'2022-01-12 01:00:00','2022-01-12 01:00:00'),(5,'Điện thoại, MacBook giảm tiền triệu, phụ kiện giảm nửa giá dịp cận Tết','Càng gần Tết Nguyên Đán, nhu cầu mua sắm điện thoại, phụ kiện công nghệ,... càng tăng cao. Do đó, khi tích hợp thêm nhiều ưu đãi hấp dẫn kích cầu như điện thoại, MacBook giảm thêm đến 500 ngàn trên giá đã giảm sẵn, phụ kiện giảm đến 62% đã khiến cho thị trường cuối năm sôi động hơn.','<p>Ghi nhận thông tin từ hệ thống Di Động Việt - Đại lý ủy quyền chính thức của Apple tại Việt Nam (AAR), đối tác toàn diện của Samsung, OPPO, Xiaomi, JBL,... đây đang là “thời điểm vàng” được khách hàng lựa chọn để mua sắm các thiết bị công nghệ dịp Tết nguyên đán. Để đáp ứng nhu cầu lớn của thị trường, hệ thống đang có nhiều ưu đãi hấp dẫn, chẳng hạn điện thoại giảm thêm đến 500 ngàn đồng trên giá đã giảm, phụ kiện giảm đến 62%. Chương trình Tết siêu sale - Săn deal giờ vàng này báo hiệu một mùa mua sắm dịp sang xuân đầy nhộn nhịp.</p><p>Được biết, chương trình này chỉ diễn ra trong 3 ngày từ 12/01 - 14/01 và áp dụng theo khung từng giờ, càng đến sớm mức giảm càng cao nên khách hàng nên đến sớm để hưởng được mức ưu đãi cao nhất.</p>',1,'didongviet.jpeg',1,'2022-01-13 01:00:00','2022-01-13 01:00:00');
/*!40000 ALTER TABLE `tin_tuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trang_thai_hoa_don`
--

DROP TABLE IF EXISTS `trang_thai_hoa_don`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trang_thai_hoa_don` (
  `ma_trang_thai_hoa_don` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `ten_trang_thai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ma_trang_thai_hoa_don`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trang_thai_hoa_don`
--

LOCK TABLES `trang_thai_hoa_don` WRITE;
/*!40000 ALTER TABLE `trang_thai_hoa_don` DISABLE KEYS */;
INSERT INTO `trang_thai_hoa_don` VALUES (1,'Đơn hàng bị hủy',NULL,NULL),(2,'Đơn hàng chưa xử lý',NULL,NULL),(3,'Đơn hàng đang vận chuyển',NULL,NULL),(4,'Đơn hàng đã giao và thanh toán',NULL,NULL);
/*!40000 ALTER TABLE `trang_thai_hoa_don` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trang_thai_khach_hang`
--

DROP TABLE IF EXISTS `trang_thai_khach_hang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trang_thai_khach_hang` (
  `ma_trang_thai_khach_hang` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `ten_trang_thai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma_trang_thai_khach_hang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trang_thai_khach_hang`
--

LOCK TABLES `trang_thai_khach_hang` WRITE;
/*!40000 ALTER TABLE `trang_thai_khach_hang` DISABLE KEYS */;
INSERT INTO `trang_thai_khach_hang` VALUES (1,'Đình chỉ'),(2,'Hoạt động'),(3,'Hạn chế');
/*!40000 ALTER TABLE `trang_thai_khach_hang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lâm','josephlam1304@gmail.com',NULL,'$2y$10$xnX9eilEci19ly52bacD.OWf3GVjlTSiRoTSRXy5FeMn9XndVAL6u',NULL,NULL,NULL),(2,'Minh','abc@gmail.com',NULL,'$2y$10$HwnYB1PZymFyyDG4a1Imgu80kwUTwLE9CO34sggY4Cfm4r7iY2Hne',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-23  8:01:44
