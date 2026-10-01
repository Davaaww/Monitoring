-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: localhost    Database: db_monitoring
-- ------------------------------------------------------
-- Server version	8.0.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fgd_matriks`
--

DROP TABLE IF EXISTS `fgd_matriks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fgd_matriks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_fgd` int DEFAULT NULL,
  `masalah` text,
  `penyebab` text,
  `dampak` text,
  `praktik` text,
  `usulan` text,
  `pj` text,
  `prioritas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fgd_matriks`
--

LOCK TABLES `fgd_matriks` WRITE;
/*!40000 ALTER TABLE `fgd_matriks` DISABLE KEYS */;
/*!40000 ALTER TABLE `fgd_matriks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_fgd`
--

DROP TABLE IF EXISTS `form_fgd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_fgd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(50) DEFAULT NULL,
  `fasilitator` varchar(100) DEFAULT NULL,
  `notulis` varchar(100) DEFAULT NULL,
  `jumlah_peserta` varchar(50) DEFAULT NULL,
  `t1` text,
  `t2` text,
  `t3` text,
  `t4` text,
  `t5` text,
  `t6` text,
  `t7` text,
  `t8` text,
  `t9` text,
  `t10` text,
  `t11` text,
  `tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_fgd`
--

LOCK TABLES `form_fgd` WRITE;
/*!40000 ALTER TABLE `form_fgd` DISABLE KEYS */;
INSERT INTO `form_fgd` VALUES (1,'1','1','1','1','','','','','','','','','','','','2026-09-29 16:18:12');
/*!40000 ALTER TABLE `form_fgd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_integrasi`
--

DROP TABLE IF EXISTS `form_integrasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_integrasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_integrasi`
--

LOCK TABLES `form_integrasi` WRITE;
/*!40000 ALTER TABLE `form_integrasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_integrasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_observasi`
--

DROP TABLE IF EXISTS `form_observasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_observasi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_lokasi` varchar(50) DEFAULT NULL,
  `nama_lembaga` varchar(100) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `observer` varchar(100) DEFAULT NULL,
  `kegiatan` varchar(50) DEFAULT NULL,
  `tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `obs1_pilihan` varchar(10) DEFAULT NULL,
  `obs1_catatan` text,
  `obs1_foto` varchar(255) DEFAULT NULL,
  `obs2_pilihan` varchar(10) DEFAULT NULL,
  `obs2_catatan` text,
  `obs2_foto` varchar(255) DEFAULT NULL,
  `obs3_pilihan` varchar(10) DEFAULT NULL,
  `obs3_catatan` text,
  `obs3_foto` varchar(255) DEFAULT NULL,
  `obs4_pilihan` varchar(10) DEFAULT NULL,
  `obs4_catatan` text,
  `obs4_foto` varchar(255) DEFAULT NULL,
  `obs5_pilihan` varchar(10) DEFAULT NULL,
  `obs5_catatan` text,
  `obs5_foto` varchar(255) DEFAULT NULL,
  `obs6_pilihan` varchar(10) DEFAULT NULL,
  `obs6_catatan` text,
  `obs6_foto` varchar(255) DEFAULT NULL,
  `obs7_pilihan` varchar(10) DEFAULT NULL,
  `obs7_catatan` text,
  `obs7_foto` varchar(255) DEFAULT NULL,
  `obs8_pilihan` varchar(10) DEFAULT NULL,
  `obs8_catatan` text,
  `obs8_foto` varchar(255) DEFAULT NULL,
  `obs9_pilihan` varchar(10) DEFAULT NULL,
  `obs9_catatan` text,
  `obs9_foto` varchar(255) DEFAULT NULL,
  `obs10_pilihan` varchar(10) DEFAULT NULL,
  `obs10_catatan` text,
  `obs10_foto` varchar(255) DEFAULT NULL,
  `obs11_pilihan` varchar(10) DEFAULT NULL,
  `obs11_catatan` text,
  `obs11_foto` varchar(255) DEFAULT NULL,
  `obs12_pilihan` varchar(10) DEFAULT NULL,
  `obs12_catatan` text,
  `obs12_foto` varchar(255) DEFAULT NULL,
  `obs13_pilihan` varchar(10) DEFAULT NULL,
  `obs13_catatan` text,
  `obs13_foto` varchar(255) DEFAULT NULL,
  `obs14_pilihan` varchar(10) DEFAULT NULL,
  `obs14_catatan` text,
  `obs14_foto` varchar(255) DEFAULT NULL,
  `obs15_pilihan` varchar(10) DEFAULT NULL,
  `obs15_catatan` text,
  `obs15_foto` varchar(255) DEFAULT NULL,
  `obs16_pilihan` varchar(10) DEFAULT NULL,
  `obs16_catatan` text,
  `obs16_foto` varchar(255) DEFAULT NULL,
  `obs17_pilihan` varchar(10) DEFAULT NULL,
  `obs17_catatan` text,
  `obs17_foto` varchar(255) DEFAULT NULL,
  `obs18_pilihan` varchar(10) DEFAULT NULL,
  `obs18_catatan` text,
  `obs18_foto` varchar(255) DEFAULT NULL,
  `obs19_pilihan` varchar(10) DEFAULT NULL,
  `obs19_catatan` text,
  `obs19_foto` varchar(255) DEFAULT NULL,
  `obs20_pilihan` varchar(10) DEFAULT NULL,
  `obs20_catatan` text,
  `obs20_foto` varchar(255) DEFAULT NULL,
  `obs21_pilihan` varchar(10) DEFAULT NULL,
  `obs21_catatan` text,
  `obs21_foto` varchar(255) DEFAULT NULL,
  `obs22_pilihan` varchar(10) DEFAULT NULL,
  `obs22_catatan` text,
  `obs22_foto` varchar(255) DEFAULT NULL,
  `obs23_pilihan` varchar(10) DEFAULT NULL,
  `obs23_catatan` text,
  `obs23_foto` varchar(255) DEFAULT NULL,
  `obs24_pilihan` varchar(10) DEFAULT NULL,
  `obs24_catatan` text,
  `obs24_foto` varchar(255) DEFAULT NULL,
  `obs25_pilihan` varchar(10) DEFAULT NULL,
  `obs25_catatan` text,
  `obs25_foto` varchar(255) DEFAULT NULL,
  `obs26_pilihan` varchar(10) DEFAULT NULL,
  `obs26_catatan` text,
  `obs26_foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_observasi`
--

LOCK TABLES `form_observasi` WRITE;
/*!40000 ALTER TABLE `form_observasi` DISABLE KEYS */;
INSERT INTO `form_observasi` VALUES (1,'123','126','121','1212','','2026-09-29 14:51:10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'wqwq','q','w','q','Lingkungan','2026-09-29 14:52:51',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'s','s','s','s','','2026-09-29 15:04:08','Blm','s','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'m','m','m','m','Lainnya','2026-09-29 15:05:57','Tdk','w','1790694357_sasando.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `form_observasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_wawancara_pm`
--

DROP TABLE IF EXISTS `form_wawancara_pm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_wawancara_pm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_informan` varchar(50) DEFAULT NULL,
  `lembaga` varchar(100) DEFAULT NULL,
  `layanan` varchar(100) DEFAULT NULL,
  `lama` varchar(50) DEFAULT NULL,
  `status_pm` varchar(50) DEFAULT NULL,
  `dukungan_komunikasi` varchar(100) DEFAULT NULL,
  `p1` text,
  `p2` text,
  `p3` text,
  `p4` text,
  `p5` text,
  `p6` text,
  `p7` text,
  `p8` text,
  `p9` text,
  `p10` text,
  `p11` text,
  `p12` text,
  `p13` text,
  `p14` text,
  `p15` text,
  `p16` text,
  `p17` text,
  `tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_wawancara_pm`
--

LOCK TABLES `form_wawancara_pm` WRITE;
/*!40000 ALTER TABLE `form_wawancara_pm` DISABLE KEYS */;
INSERT INTO `form_wawancara_pm` VALUES (1,'1','1','1','1','Sudah selesai layanan','1','1','1','1','1','1','1','1','1','1','1','1','1','1','','1','1','1','2026-09-29 16:13:02');
/*!40000 ALTER TABLE `form_wawancara_pm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_wawancara_staf`
--

DROP TABLE IF EXISTS `form_wawancara_staf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `form_wawancara_staf` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_informan` varchar(50) DEFAULT NULL,
  `lembaga` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `lama_bekerja` varchar(50) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `pewawancara` varchar(100) DEFAULT NULL,
  `s1` text,
  `s2` text,
  `s3` text,
  `s4` text,
  `s5` text,
  `s6` text,
  `s7` text,
  `s8` text,
  `s9` text,
  `s10` text,
  `s11` text,
  `s12` text,
  `s13` text,
  `s14` text,
  `s15` text,
  `s16` text,
  `s17` text,
  `s18` text,
  `tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_wawancara_staf`
--

LOCK TABLES `form_wawancara_staf` WRITE;
/*!40000 ALTER TABLE `form_wawancara_staf` DISABLE KEYS */;
INSERT INTO `form_wawancara_staf` VALUES (1,'1','12','1','12','12','12','','','','','','wq','','','','wq','','','','','','','','','2026-09-29 15:57:23');
/*!40000 ALTER TABLE `form_wawancara_staf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrasi_detail`
--

DROP TABLE IF EXISTS `integrasi_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `integrasi_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_integrasi` int DEFAULT NULL,
  `indikator` varchar(100) DEFAULT NULL,
  `quan` text,
  `sumber_qual` text,
  `temuan_qual` text,
  `hubungan` varchar(50) DEFAULT NULL,
  `interpretasi` text,
  `implikasi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrasi_detail`
--

LOCK TABLES `integrasi_detail` WRITE;
/*!40000 ALTER TABLE `integrasi_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrasi_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `observasi_naratif`
--

DROP TABLE IF EXISTS `observasi_naratif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `observasi_naratif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_observasi` int DEFAULT NULL,
  `waktu_kegiatan` text,
  `deskripsi` text,
  `makna` text,
  `sumber` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `observasi_naratif`
--

LOCK TABLES `observasi_naratif` WRITE;
/*!40000 ALTER TABLE `observasi_naratif` DISABLE KEYS */;
/*!40000 ALTER TABLE `observasi_naratif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pm_ringkasan`
--

DROP TABLE IF EXISTS `pm_ringkasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pm_ringkasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_wawancara` int DEFAULT NULL,
  `perubahan` text,
  `hambatan` text,
  `pengalaman` text,
  `kesiapan` text,
  `perbaikan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pm_ringkasan`
--

LOCK TABLES `pm_ringkasan` WRITE;
/*!40000 ALTER TABLE `pm_ringkasan` DISABLE KEYS */;
INSERT INTO `pm_ringkasan` VALUES (1,1,'1','111','1','1','1'),(2,1,'1','1','1','11','1');
/*!40000 ALTER TABLE `pm_ringkasan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staf_ringkasan`
--

DROP TABLE IF EXISTS `staf_ringkasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staf_ringkasan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_wawancara` int DEFAULT NULL,
  `temuan` text,
  `bukti` text,
  `faktor` text,
  `kaitan` text,
  `implikasi` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staf_ringkasan`
--

LOCK TABLES `staf_ringkasan` WRITE;
/*!40000 ALTER TABLE `staf_ringkasan` DISABLE KEYS */;
INSERT INTO `staf_ringkasan` VALUES (1,1,'wq','','','',''),(2,1,'wq','','','',''),(3,1,'qw','','wq','qw',''),(4,1,'qw','qw','qwq','qw','qwq');
/*!40000 ALTER TABLE `staf_ringkasan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-10-01 21:23:44
