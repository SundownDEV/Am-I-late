-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: amilate
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20180507081943'),('20180507084936');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `sticker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (36,'Vous arrivez devant l\'entrée d\'HETIC, qui est fermée. Que faites-vous ?','2018-06-06 10:12:28','https://risibank.fr/cache/stickers/d325/32563-static.png'),(37,'Un passant vous vois essayer d\'escalader le mur et appelle la police','2018-06-06 10:12:28','https://risibank.fr/cache/stickers/d52/5245-thumb.jpg'),(38,'A peine entré, un H2 vous demande si vous ne vous êtes pas perdu, que faites-vous ?','2018-06-06 11:39:34','https://risibank.fr/cache/stickers/d760/76074-thumb.png'),(39,'Il vous croit, mais les gilberts sont déjà sur les lieux. Ils vous interrogent.','2018-06-06 11:51:14','https://risibank.fr/cache/stickers/d35/3522-thumb.png'),(40,'Il s\'execute puis part. Vous continuez votre chemin et soudain, vous vous retrouvez bloqué par un défilé de l\'empire romain des H1','2018-06-07 15:20:40','https://image.noelshack.com/fichiers/2018/15/5/1523652484-risitas-marche-militaire-groupe-v2.gif'),(41,'Il vous croit et vous demande le numéro atomique de l\'atome du Technétium','2018-06-07 15:23:13','https://image.noelshack.com/fichiers/2016/41/1476642572-picsart-10-16-08-25-48.png'),(42,'Il vous répond au téléphone. Que dites-vous ?','2018-06-07 15:24:30','https://image.noelshack.com/fichiers/2017/03/1484778801-vald2.png'),(43,'Il vous dit qu\'il n\'ouvrira pas la porte à un soldat inconnu non identifié.','2018-06-07 15:29:42','https://image.noelshack.com/fichiers/2016/51/1482239130-generaljesusstickertransparent.png'),(44,'Il vous ouvre la porte. En comprenant que vous avez menti, il vous trempe la tête dans l\'eau du Gange en vous demandant pour qui vous travaillez.','2018-06-07 15:33:31','https://image.noelshack.com/fichiers/2017/08/1487779321-img-7787.jpg'),(45,'Je suis en H3, major de promo depuis 2015','2018-06-07 15:38:44','https://image.noelshack.com/fichiers/2016/48/1480464151-1474490330-risitas568.png'),(46,'Il raccroche, croyant à une communication enregistrée par l’ennemi.','2018-06-07 15:40:25','https://image.noelshack.com/fichiers/2016/44/1478142645-risitas-telephone3.png'),(47,'Vous lui cassez le cou mais la police est déjà sur les lieu. Les deux gilberts vous poursuivent.','2018-06-07 15:43:42','https://image.noelshack.com/fichiers/2018/11/5/1521220670-lafuitegreg.png'),(48,'Au Birdies vous retrouvez Yann, bourré, qui vous propose un cigare.','2018-06-07 15:45:51','https://avatars1.githubusercontent.com/u/4213013');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `child_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3E7B0BFB1E27F6BF` (`question_id`),
  KEY `IDX_3E7B0BFBDD62C21B` (`child_id`),
  CONSTRAINT `FK_3E7B0BFB1E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  CONSTRAINT `FK_3E7B0BFBDD62C21B` FOREIGN KEY (`child_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `response`
--

LOCK TABLES `response` WRITE;
/*!40000 ALTER TABLE `response` DISABLE KEYS */;
INSERT INTO `response` VALUES (164,'J\'abandonne, tempis pour le cours.',36,NULL),(165,'J\'escalade le mur à mains nues',36,37),(166,'Vous lui expliquez qu\'il s\'agit d\'un malentendu, vous testez la sécurité du batiment',37,39),(167,'Vous lui faites une prise de MMA into salto arrière',37,47),(168,'Vous le rassurez en disans que vous êtes prof et que vous avez cours.',37,41),(169,'J\'appelle le directeur Mr. Beaux',36,42),(170,'Je passe par le bâtiment des H',36,38),(171,'J\'ai glissé chef',39,NULL),(172,'ptdr t\'es qui ?',38,45),(173,'Déjà baisses les yeux. Ensuite tu retournes jouer avec tes cartons dans le Gange',38,40),(174,'Hop hop hop le H, on circule!',38,NULL),(175,'Euh.. je ne suis pas ce genre de prof.',41,NULL),(176,'Le même que celui du disque de pisse',41,NULL),(177,'Bonjour sergent-chef. La porte est fermée et je dois entrer très rapidement.',42,43),(178,'J\'ai ramené un rougail saucisse chef.',43,44),(179,'Vous lui dites que vous êtes Ariel Dorol, un prof à HETIC.',43,46),(180,'Bah pour vouglllgbllblllbglllgglgllggl',44,NULL),(181,'Vous attendez que les animaux cèdent le passage.',40,NULL),(182,'Vous passez par l\'autre côté du bâtiment pour rejoindre la salle 5 (à côté du bureau de Brontis).',40,NULL),(183,'C\'est quoi ton avis sur la politique israélienne ?',45,NULL),(184,'ALLO??',46,NULL),(185,'Vous vous rendez.',47,NULL),(186,'Vous courez vous réfugier au Birdies.',47,48),(187,'Vous refusez, vous ne fumez pas.',48,NULL),(188,'J\'ai une préférence pour les gros pilons, désolé.',48,NULL),(189,'Vous acceptez, et l\'utilisez comme couverture',48,NULL),(190,'Je testais juste la sécurité du bâtiment. RAS chef.',39,NULL);
/*!40000 ALTER TABLE `response` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-07 15:53:33
