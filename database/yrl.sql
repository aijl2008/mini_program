-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: yrl
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `followed_user`
--

DROP TABLE IF EXISTS `followed_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followed_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(29) COLLATE utf8mb4_bin NOT NULL,
  `followed_id` char(29) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followed_user`
--

LOCK TABLES `followed_user` WRITE;
/*!40000 ALTER TABLE `followed_user` DISABLE KEYS */;
INSERT INTO `followed_user` VALUES (1,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa','ccccccccccccccccccccccccccccc','2018-11-23 14:11:59','2018-11-23 14:11:59'),(3,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa','bbbbbbbbbbbbbbbbbbbbbbbbbbbb','2018-11-23 14:33:18','2018-11-23 14:33:18');
/*!40000 ALTER TABLE `followed_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` int(11) NOT NULL,
  `from_user_id` char(29) COLLATE utf8mb4_bin NOT NULL,
  `to_user_id` char(29) COLLATE utf8mb4_bin DEFAULT NULL,
  `message` text COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2018_11_17_091844_create_wechats_table',1),(9,'2018_11_17_104717_create_failed_jobs_table',1),(10,'2018_11_17_114514_videos',1),(11,'2018_11_17_114556_create_videos_table',1),(12,'2018_11_17_114628_create_watching_table',1),(13,'2018_11_17_114642_create_watched_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `user_video`
--

DROP TABLE IF EXISTS `user_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` char(29) COLLATE utf8mb4_bin NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_video`
--

LOCK TABLES `user_video` WRITE;
/*!40000 ALTER TABLE `user_video` DISABLE KEYS */;
INSERT INTO `user_video` VALUES (1,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',2,'2018-11-23 12:40:36','2018-11-23 12:40:36'),(2,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',2,'2018-11-23 12:41:03','2018-11-23 12:41:03'),(3,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',21,'2018-11-23 12:41:08','2018-11-23 12:41:08'),(4,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',1,'2018-11-23 12:41:15','2018-11-23 12:41:15'),(5,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',7,'2018-11-23 13:55:49','2018-11-23 13:55:49'),(6,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',7,'2018-11-23 13:57:07','2018-11-23 13:57:07'),(8,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',5,'2018-11-23 14:36:59','2018-11-23 14:36:59');
/*!40000 ALTER TABLE `user_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` char(29) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` char(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `avatar` varchar(300) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('0','Jerry','10000000000','awz@awz.cn','\'\'\'\'\'\'','不支持密码登录',NULL,'2018-11-23 04:19:57','2018-11-23 04:19:57'),('3','Jerry','10000000000','awz@awz.cn','\'\'\'\'\'\'','不支持密码登录',NULL,'2018-11-23 06:59:53','2018-11-23 06:59:53'),('4','Jerry','10000000000','awz@awz.cn','\'\'\'\'\'\'','不支持密码登录',NULL,'2018-11-23 07:00:01','2018-11-23 07:00:01'),('aaaaaaaaaaaaaaaaaaaaaaaaaaaaa','Jerry','10000000000','awz@awz.cn','/upload/images/Nvazp75X3afXymmoGthO4eX5pF4kTIeyp94ahYBg.jpeg','不支持密码登录',NULL,'2018-11-23 04:20:30','2018-11-24 07:27:14'),('bbbbbbbbbbbbbbbbbbbbbbbbbbbb','Jerry','10000000000','awz@awz.cn','\'\'\'\'\'\'','不支持密码登录',NULL,'2018-11-23 05:20:29','2018-11-23 05:20:29'),('ccccccccccccccccccccccccccccc','Jerry','10000000000','awz@awz.cn','\'\'\'\'\'\'','不支持密码登录',NULL,'2018-11-23 05:20:40','2018-11-23 05:20:40'),('dddddddddddddddddddddddddddd','Jerry','10000000000','awz@awz.cn','\'\'\'\'\'\'','不支持密码登录',NULL,'2018-11-23 05:20:52','2018-11-23 05:20:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `url` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `cover_url` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `file_id` char(20) COLLATE utf8mb4_bin NOT NULL,
  `uploaded_at` datetime NOT NULL,
  `user_id` char(29) COLLATE utf8mb4_bin NOT NULL,
  `played_number` int(11) NOT NULL,
  `liked_number` int(11) NOT NULL,
  `shared_wechat_number` int(11) NOT NULL,
  `shared_moment_number` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096757','','','2018-11-22 12:11:58','1',0,0,0,0,1,1,'2018-11-22 12:11:58','2018-11-22 12:11:58'),(2,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096757','','','2018-11-22 12:12:11','1',0,0,0,0,1,1,'2018-11-22 12:12:11','2018-11-22 12:12:11'),(3,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096757','','','2018-11-22 12:12:13','1',0,0,0,0,1,1,'2018-11-22 12:12:13','2018-11-22 12:12:13'),(4,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096757','','','2018-11-22 12:12:15','1',0,0,0,0,1,1,'2018-11-22 12:12:15','2018-11-22 12:12:15'),(5,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096757','','','2018-11-22 12:12:17','1',0,0,0,0,1,1,'2018-11-22 12:12:17','2018-11-22 12:12:17'),(6,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096758','','','2018-11-23 11:51:42','1',0,0,0,0,1,1,'2018-11-23 11:51:42','2018-11-23 11:51:42'),(7,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096759','','','2018-11-23 11:51:49','1',0,0,0,0,1,1,'2018-11-23 11:51:49','2018-11-23 11:51:49'),(8,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096760','','','2018-11-23 11:51:56','1',0,0,0,0,1,1,'2018-11-23 11:51:56','2018-11-23 11:51:56'),(9,'The HongKong-Zhuhai-Macao Bridge is open!','5285890783150096760','','','2018-11-23 14:53:55','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-23 14:53:55','2018-11-23 14:53:55'),(10,'大轰炸.mp4','http://1258021496.vod2.myqcloud.com/1461fbc8vodcq1258021496/b96d18985285890783192961475/TK5eJ2aIcBQA.mp4','','','2018-11-24 07:07:36','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 07:07:36','2018-11-24 07:07:36'),(11,'浪漫的爱心美食.mp4','http://1258021496.vod2.myqcloud.com/1461fbc8vodcq1258021496/f3afbcca5285890783193158021/TkabkYs2LEcA.mp4','','','2018-11-24 07:34:07','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 07:34:07','2018-11-24 07:34:07'),(12,'The HongKong-Zhuhai-Macao Bridge is open!','52858907831500967601','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:37:44','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:37:44','2018-11-24 15:37:44'),(13,'The HongKong-Zhuhai-Macao Bridge is open!','1111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:37:57','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:37:57','2018-11-24 15:37:57'),(14,'The HongKong-Zhuhai-Macao Bridge is open!','11111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:01','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:01','2018-11-24 15:38:01'),(15,'The HongKong-Zhuhai-Macao Bridge is open!','111111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:03','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:03','2018-11-24 15:38:03'),(16,'The HongKong-Zhuhai-Macao Bridge is open!','11111111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:06','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:06','2018-11-24 15:38:06'),(17,'The HongKong-Zhuhai-Macao Bridge is open!','111111111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:08','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:08','2018-11-24 15:38:08'),(18,'The HongKong-Zhuhai-Macao Bridge is open!','1111111111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:11','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:11','2018-11-24 15:38:11'),(19,'The HongKong-Zhuhai-Macao Bridge is open!','11111111111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:13','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:13','2018-11-24 15:38:13'),(20,'The HongKong-Zhuhai-Macao Bridge is open!','111111111111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:16','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:16','2018-11-24 15:38:16'),(21,'The HongKong-Zhuhai-Macao Bridge is open!','1111111111111','https://www.jb51.net/images/logo.gif','11111','2018-11-24 15:38:18','aaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0,0,0,0,1,1,'2018-11-24 15:38:18','2018-11-24 15:38:18');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-25  0:43:48
