-- MySQL dump 10.15  Distrib 10.0.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: vmesteprohe
-- ------------------------------------------------------
-- Server version	10.0.38-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answer_post_help`
--

DROP TABLE IF EXISTS `answer_post_help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer_post_help` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) NOT NULL,
  `text_answer` text NOT NULL,
  `data_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_status_answer_post_help` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `helping` int(11) NOT NULL DEFAULT '0',
  `finish` int(11) NOT NULL DEFAULT '0',
  `id_post_help` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer_post_help`
--

LOCK TABLES `answer_post_help` WRITE;
/*!40000 ALTER TABLE `answer_post_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `answer_post_help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_disability`
--

DROP TABLE IF EXISTS `category_disability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_disability` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_disability_group` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_disability`
--

LOCK TABLES `category_disability` WRITE;
/*!40000 ALTER TABLE `category_disability` DISABLE KEYS */;
INSERT INTO `category_disability` VALUES (1,1,'Ампутация обеих конечностей'),(2,1,'Диабет'),(3,1,'Осложнения после инсульта'),(4,1,'Неврологические растройства, препятствующие передвижению'),(5,1,'Тяжелые хронические заболевания дыхательной системы'),(6,1,'Злокачественные опухоли, осложненные метастазами'),(7,1,'Отсутствие возможности видеть'),(8,1,'Отсутствие возможности слышать'),(9,1,'Психические расстройства, влекущие за собой умственную отсталость'),(10,1,'Паралич всего тела'),(11,2,'Болезни, связанные с опорно-двигательным аппаратом, не позволяющие полноценно передвигаться'),(12,2,'Сердечная и почечная недостаточность'),(13,2,'Частичная утрата зрения'),(14,2,'Частичная утрата слуха'),(15,2,'Нарушения работы пищеварительной системы'),(16,2,'Нарастающая парализация'),(17,2,'Деформация верхних и/или нижних конечностей'),(18,3,'Незрячий один глаз'),(19,3,'Отсутствие слуха на одно ухо'),(20,3,'Онкологическое заболевание на нулевой или первой ступени'),(21,3,'Диабет'),(22,3,'Паралич одной из конечностей'),(23,3,'Заболевания сердечно-сосудистой системы и центральной нервной системы, ограничивающие физические нагрузки'),(24,3,'Туберкулез'),(25,3,'Язва желудка'),(26,3,'Дефекты челюсти, мешающие свободно говорить и пережевывать пищу');
/*!40000 ALTER TABLE `category_disability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disability`
--

DROP TABLE IF EXISTS `disability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disability` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_category_disability` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disability`
--

LOCK TABLES `disability` WRITE;
/*!40000 ALTER TABLE `disability` DISABLE KEYS */;
/*!40000 ALTER TABLE `disability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disability_group`
--

DROP TABLE IF EXISTS `disability_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disability_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disability_group`
--

LOCK TABLES `disability_group` WRITE;
/*!40000 ALTER TABLE `disability_group` DISABLE KEYS */;
INSERT INTO `disability_group` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `disability_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_help`
--

DROP TABLE IF EXISTS `post_help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_help` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) NOT NULL,
  `name_post` varchar(255) NOT NULL,
  `short_text` text NOT NULL,
  `long_text` text NOT NULL,
  `data_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_help`
--

LOCK TABLES `post_help` WRITE;
/*!40000 ALTER TABLE `post_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_user`
--

DROP TABLE IF EXISTS `status_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_user`
--

LOCK TABLES `status_user` WRITE;
/*!40000 ALTER TABLE `status_user` DISABLE KEYS */;
INSERT INTO `status_user` VALUES (1,'Инвалид 1 группы'),(2,'Инвалид 2 группы'),(3,'Инвалид 3 группы'),(4,'Волонтёр'),(5,'Гос. организация'),(6,'Частная оргранизация');
/*!40000 ALTER TABLE `status_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Жилищные проблемы'),(2,'Проблема передвижения'),(3,'Здоровье'),(4,'Финансы'),(5,'Коммуникация'),(6,'Психология'),(7,'Юридические проблемы'),(8,'IT - Технологии'),(9,'Технические проблемы'),(10,'Продукты питания'),(11,'Советы'),(12,'Комунальные услуги'),(13,'Медицина'),(14,'Лекарства'),(15,'Транспорт');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags_for_post_help`
--

DROP TABLE IF EXISTS `tags_for_post_help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags_for_post_help` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_tag` bigint(20) NOT NULL,
  `id_post_help` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags_for_post_help`
--

LOCK TABLES `tags_for_post_help` WRITE;
/*!40000 ALTER TABLE `tags_for_post_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags_for_post_help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `img_user` longtext,
  `data` date NOT NULL,
  `id_status_user` varchar(255) NOT NULL,
  `number` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `user_number_uindex` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_disability`
--

DROP TABLE IF EXISTS `users_disability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_disability` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) NOT NULL,
  `id_disability_group` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_disability`
--

LOCK TABLES `users_disability` WRITE;
/*!40000 ALTER TABLE `users_disability` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_disability` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-01  0:54:48
