-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: dbsistema
-- ------------------------------------------------------
-- Server version	8.0.32

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `idcategoria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (17,'JUGUETES','JUGUETES DE TODO TIPO'),(18,'PELUCHES','JUGUETES DE TELA TIPO PELUCHE');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `idcliente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `documento` int NOT NULL,
  `telefono` int DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `documento_UNIQUE` (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprobante`
--

DROP TABLE IF EXISTS `comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comprobante` (
  `idcomprobante` int NOT NULL AUTO_INCREMENT,
  `idtipo_comprobante` int NOT NULL,
  `idcliente` int NOT NULL,
  `idusuario` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`idcomprobante`),
  KEY `fk_tipocomprobante_idx` (`idtipo_comprobante`),
  KEY `fk_usuariocomprobante_idx` (`idusuario`),
  KEY `fk_clientecomprobante_idx` (`idcliente`),
  CONSTRAINT `fk_clientecomprobante` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `fk_tipocomprobante` FOREIGN KEY (`idtipo_comprobante`) REFERENCES `tipo_comprobante` (`idtipo_comprobante`),
  CONSTRAINT `fk_usuariocomprobante` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprobante`
--

LOCK TABLES `comprobante` WRITE;
/*!40000 ALTER TABLE `comprobante` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenedor`
--

DROP TABLE IF EXISTS `contenedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenedor` (
  `idcontenedor` int NOT NULL AUTO_INCREMENT,
  `nombre_contenedor` varchar(45) NOT NULL,
  `idproveedor` int NOT NULL,
  `fecha` date NOT NULL,
  `yuan` decimal(8,2) DEFAULT NULL,
  `dolar` decimal(8,2) NOT NULL,
  `gastos_importacion1` decimal(8,2) NOT NULL DEFAULT '0.00',
  `gastos_importacion2` decimal(8,2) DEFAULT '0.00',
  `gastos_importacion3` decimal(8,2) DEFAULT '0.00',
  `gastos_importacion4` decimal(8,2) DEFAULT '0.00',
  PRIMARY KEY (`idcontenedor`),
  KEY `fk_proveedor_idx` (`idproveedor`),
  CONSTRAINT `fk_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenedor`
--

LOCK TABLES `contenedor` WRITE;
/*!40000 ALTER TABLE `contenedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_comprobante`
--

DROP TABLE IF EXISTS `detalle_comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_comprobante` (
  `iddetalle_comprobante` int NOT NULL AUTO_INCREMENT,
  `idcomprobante` int NOT NULL,
  `idproducto` int NOT NULL,
  `cantidad` int NOT NULL,
  `preciounitario` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`iddetalle_comprobante`),
  KEY `fk_comprobantedetalle_idx` (`idcomprobante`),
  KEY `fk_producto_idx` (`idproducto`),
  CONSTRAINT `fk_comprobantedetalle` FOREIGN KEY (`idcomprobante`) REFERENCES `comprobante` (`idcomprobante`),
  CONSTRAINT `fk_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_comprobante`
--

LOCK TABLES `detalle_comprobante` WRITE;
/*!40000 ALTER TABLE `detalle_comprobante` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_contenedor`
--

DROP TABLE IF EXISTS `detalle_contenedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_contenedor` (
  `iddetalle_contenedor` int NOT NULL AUTO_INCREMENT,
  `idcontenedor` int NOT NULL,
  `idproducto` int NOT NULL,
  PRIMARY KEY (`iddetalle_contenedor`),
  KEY `fk_contenedordetalle_idx` (`idcontenedor`),
  KEY `fk_proddetalle_idx` (`idproducto`),
  CONSTRAINT `fk_contenedordetalle` FOREIGN KEY (`idcontenedor`) REFERENCES `contenedor` (`idcontenedor`),
  CONSTRAINT `fk_proddetalle` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_contenedor`
--

LOCK TABLES `detalle_contenedor` WRITE;
/*!40000 ALTER TABLE `detalle_contenedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_contenedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingreso`
--

DROP TABLE IF EXISTS `ingreso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingreso` (
  `idingreso` int NOT NULL AUTO_INCREMENT,
  `idproducto` int NOT NULL,
  `cantidad` int NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idingreso`),
  KEY `fk_productoingreso_idx` (`idproducto`),
  CONSTRAINT `fk_productoingreso` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingreso`
--

LOCK TABLES `ingreso` WRITE;
/*!40000 ALTER TABLE `ingreso` DISABLE KEYS */;
INSERT INTO `ingreso` VALUES (13,192,100,'2023-04-15');
/*!40000 ALTER TABLE `ingreso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `idproducto` int NOT NULL AUTO_INCREMENT,
  `idcategoria` int DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `caja` int DEFAULT NULL,
  `costo` decimal(8,2) NOT NULL,
  `origen` enum('importado','nacional') NOT NULL,
  `imagen` longblob,
  `costomenor` decimal(8,2) DEFAULT NULL,
  `costomayor` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  UNIQUE KEY `codigo_UNIQUE` (`codigo`),
  KEY `fk_categoria_idx` (`idcategoria`),
  CONSTRAINT `fk_categoriaproducto` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (2,17,'AVENGER X 4 EN CAJA ( MDLS)','AV-17',96,2.74,'importado',_binary '../../imagenes_productos/AV-17_1681603851.jpg',15.00,12.00),(3,17,'INSTRUMENTO BATERIA DE JUGUETE','661-885',6,9.48,'importado',_binary '../../imagenes_productos/661-885_1680633818.jpg',10.00,10.00),(4,17,'PISTOLA BIOGEMA HOMBRE ARAÑA CON MASCARA Y MUÑECO 2 EN 1','588E-1',60,3.94,'importado',_binary '../../imagenes_productos/588E-1_1680636750.jpg',15.00,20.00),(5,NULL,'TORRE PATRULLA CANINA CON 6 PERRITOS','H3304',24,3.50,'importado',_binary '../../imagenes_productos/H3304_1680636943.jpg',NULL,NULL),(6,NULL,'TRAILER CARS ROJO CON 6 CARRITOS EN BLISTER ','919-87',36,2.03,'importado',_binary '../../imagenes_productos/919-87_1680638538.jpg',NULL,NULL),(7,NULL,'AVENGER X 2 EN CAJA NEGRA','XZ-9962',36,2.00,'importado',_binary '../../imagenes_productos/XZ-9962_1680632554.jpg',NULL,NULL),(8,NULL,'MICROFONO ENCANTO EN CAJA','5366A',72,2.59,'importado',_binary '../../imagenes_productos/5366A_1680634140.jpg',NULL,NULL),(9,NULL,'PATRULLA CANINA EN CAJA GRANDE X 6 PERRITOS Y 6 MOTOS','PH738',24,11.66,'importado',_binary '../../imagenes_productos/PH738_1680636527.jpg',NULL,NULL),(10,NULL,'BINGO JUEGO DE MESA CAJA BLANCA CON NEGRO','GBA-B',12,3.94,'importado',_binary '../../imagenes_productos/GBA-B_1680632732.jpg',NULL,NULL),(11,NULL,'PATRULLA CANINA CAJA X 6 CARRITOS ','18668-25',96,3.13,'importado',_binary '../../imagenes_productos/18668-25_1680636460.jpg',NULL,NULL),(12,NULL,'PATRULLA CANINA X6 PERRITOS CHILLONES CON ESCUDITOS','18668-23',96,4.49,'importado',_binary '../../imagenes_productos/18668-23_1680636619.jpg',NULL,NULL),(13,NULL,'PATRULLA CANINA X 8 PERROS CHILLONES CON MOTO Y MUÑECO','18668-37',96,6.63,'importado',_binary '../../imagenes_productos/18668-37_1680636884.jpg',NULL,NULL),(14,NULL,'CARRO LOCO SONIC EN CAJA ','1853-4',48,4.66,'importado',_binary '../../imagenes_productos/1853-4_1680633610.jpg',NULL,NULL),(15,NULL,'CASA LOL 183 PIEZAS','BB013',12,13.85,'importado',_binary '../../imagenes_productos/BB013_1680633098.jpg',NULL,NULL),(16,NULL,'CARRO BOMBERO EN MICA ','SH-9058',48,2.00,'importado',_binary '../../imagenes_productos/SH-9058_1680632865.jpg',NULL,NULL),(17,NULL,'SET DE TE EN BLISTER Y CARTON TEA PARTY','7663-4',48,1.43,'importado',_binary '../../imagenes_productos/7663-4_1680641852.jpg',NULL,NULL),(18,NULL,'SET DE BELLEZA FROZEN EN BLISTER','727-20',72,2.16,'importado',_binary '../../imagenes_productos/727-20_1680641764.jpg',NULL,NULL),(19,NULL,'MUÑECA BEBE REAL CON COLCHON EN CAJA','1901-1',160,20.00,'importado',_binary '../../imagenes_productos/1901-1_1680640667.jpg',NULL,NULL),(20,17,'PEPA PING X 25 PCS X2','YM66A8',40,50.00,'importado',_binary '../../imagenes_productos/YM66A8_1680640337.jpg',NULL,NULL),(21,NULL,'BELLEZA SIRENITA EN BLISTER','727-21',96,1.81,'importado',_binary '../../imagenes_productos/727-21_1680632700.jpg',NULL,NULL),(22,NULL,'BELLEZA  LOL EN BLISTER CHICO','727-27',96,1.82,'importado',_binary '../../imagenes_productos/727-27_1680640010.jpg',NULL,NULL),(23,NULL,'PISTOLA LANZA TAPS HOMBRE ARAÑA','564-987',96,2.16,'importado',_binary '../../imagenes_productos/564-987_1680637454.jpg',NULL,NULL),(24,NULL,'LANZA TAPS HOMBRE ARAÑA CON GUANTES MASCARA','564-979',96,1.95,'importado',_binary '../../imagenes_productos/564-979_1680634040.jpg',NULL,NULL),(25,NULL,'POPPY PLAYTIME EN BLISTER DE 2 MODELOS','PT6123',180,4.04,'importado',_binary '../../imagenes_productos/PT6123_1680637829.jpg',NULL,NULL),(26,NULL,'PEPA TRICICLO EN CAJA','692A',48,2.81,'importado',_binary '../../imagenes_productos/692A_1680638435.jpg',NULL,NULL),(27,NULL,'TRENCITO DE HUMO A PILAS ','ZR121-1',72,2.70,'importado',_binary '../../imagenes_productos/ZR121-1_1680641967.jpg',NULL,NULL),(28,NULL,'CARRO EN BLISTER X 2 UNIDADES','JM-0515D',96,1.09,'importado',_binary '../../imagenes_productos/JM-0515D_1680632942.jpg',NULL,NULL),(29,NULL,'BURBUJA DINOSAURIO CAJA X 24','S901',192,0.47,'importado',_binary '../../imagenes_productos/S901_1680632827.jpg',NULL,NULL),(30,NULL,'BURBUJA COHETE CAJA X12','S906',72,0.55,'importado',_binary '../../imagenes_productos/S906_1680632747.jpg',NULL,NULL),(31,NULL,'MUÑECA CON COCHE CUTE BABY','164',60,2.06,'importado',_binary '../../imagenes_productos/164_1680634667.jpg',NULL,NULL),(32,NULL,'MASHA Y EL OSO CON ANDADOR EN CAJA','3017',144,1.66,'importado',_binary '../../imagenes_productos/3017_1680634063.jpg',NULL,NULL),(33,NULL,'SONIC EN CAJA X4 MUÑECOS 3 MODELOS','3879H',96,2.84,'importado',_binary '../../imagenes_productos/3879H_1680639296.jpg',NULL,NULL),(34,NULL,'PELOTAS LOL CAJA X12','1911A',360,0.57,'importado',_binary '../../imagenes_productos/1911A_1680637528.jpg',NULL,NULL),(35,NULL,'MUÑECA BEBE CON COCHE EN BOLSA LOVELY BABY','6611-32',36,4.27,'importado',_binary '../../imagenes_productos/6611-32_1680634542.jpg',NULL,NULL),(36,NULL,'POPPY PLAY TIME CAJA ROJA BLISTER','19301',240,1.73,'importado',_binary '../../imagenes_productos/19301_1680637756.jpg',NULL,NULL),(37,NULL,'MUÑECA BABY CRY CON COCHE EN CAJA','KQ910',48,3.43,'importado',_binary '../../imagenes_productos/KQ910_1680634393.jpg',NULL,NULL),(38,NULL,'SIRENA EN CAJA 5 MODELOS ','822',144,1.53,'importado',_binary '../../imagenes_productos/822_1680638370.jpg',NULL,NULL),(39,NULL,'GRANJA ZENON EN BLISTER','2021-001-10',96,3.64,'importado',_binary '../../imagenes_productos/2021-001-10_1680633074.jpg',NULL,NULL),(40,NULL,'POKEMON EN BLISTER CUADRADO 2 POKEBOLAS 5 MUÑECOS','CW3A',96,3.47,'importado',_binary '../../imagenes_productos/CW3A_1680638121.jpg',NULL,NULL),(41,NULL,'POKEMON EN BLISTER 2 POKEBOLAS CARTON AMARILLO','2856-6',144,3.10,'importado',_binary '../../imagenes_productos/2856-6_1680638037.jpg',NULL,NULL),(42,NULL,'MINECRAFT C/  ESPADA Y PICO EN BLISTER','J59',108,3.18,'importado',_binary '../../imagenes_productos/J59_1680634335.jpg',NULL,NULL),(43,NULL,'MINECRAF C/ESPADA Y PICO EN CAJA','J76',60,4.77,'importado',_binary '../../imagenes_productos/J76_1680634315.jpg',NULL,NULL),(44,NULL,'POKEMON EN BLISTER X 6 BOLAS','GX6149',96,3.86,'importado',_binary '../../imagenes_productos/GX6149_1680638194.jpg',NULL,NULL),(45,NULL,'POKEMON EN BLISTER X 12 MUÑECOS Y 2 BOLAS CAJA AMARILLA','GX3134',144,2.97,'importado',_binary '../../imagenes_productos/GX3134_1680638067.jpg',NULL,NULL),(46,17,'SET CARTING X12 MARIO BROS','2046-12',36,19.39,'importado',_binary '../../imagenes_productos/2046-12_1681366645.jpg',NULL,NULL),(47,NULL,'SONIC CARTING X 12 ','2046-13',36,19.39,'importado',_binary '../../imagenes_productos/2046-13_1680641698.jpg',NULL,NULL),(48,NULL,'SET CARTING X 12 PURO MARIO BROS','2046-14',36,19.39,'importado',_binary '../../imagenes_productos/2046-14_1680641626.jpg',NULL,NULL),(49,NULL,'PEPA PING X 4 C/CARROSA Y PEGASO','2018-7',120,1.40,'importado',_binary '../../imagenes_productos/2018-7_1680641136.jpg',NULL,NULL),(50,NULL,'PEPA PING X 10 EN CAJA','PP605-10',240,1.86,'importado',_binary '../../imagenes_productos/PP605-10_1680640987.jpg',NULL,NULL),(51,NULL,'CARRO CARS X 2 EN CAJA CHICA','826-113',96,1.03,'importado',_binary '../../imagenes_productos/826-113_1680640191.jpg',NULL,NULL),(52,NULL,'PATRULLA X 6 C/CARRO EN CAJA MEDIANA','S650',48,4.69,'importado',_binary '../../imagenes_productos/S650_1680637083.jpg',NULL,NULL),(53,NULL,'PIJAMASKS X 6 EN CAJA CHICA','1166',144,1.48,'importado',_binary '../../imagenes_productos/1166_1680628629.jpg',NULL,NULL),(54,NULL,'TRENCITO THOMAS A PILA','866B-4',120,2.87,'importado',_binary '../../imagenes_productos/866B-4_1680628765.jpg',NULL,NULL),(55,NULL,'PISTOLA DE AGUA COLOR PASTEL','5281-11',120,1.00,'importado',_binary '../../imagenes_productos/5281-11_1680629153.jpg',NULL,NULL),(56,NULL,'LEGO DIDACTICO MINECRAFT EN CAJA 8 MODELOS','12001A | 12002A',192,2.03,'importado',_binary '../../imagenes_productos/12001A_1680640583.jpg',NULL,NULL),(57,NULL,'CARRITO DINOSAURIO CON JAULA CHICO','LL-A05',144,0.97,'importado',_binary '../../imagenes_productos/LL-A05_1680639771.jpg',NULL,NULL),(58,NULL,'CARRITO METALICO X 10 TIPO HOTWILL','5999-10',72,4.06,'importado',_binary '../../imagenes_productos/5999-10_1680640127.jpg',NULL,NULL),(59,NULL,'MUÑECA BARBI C/CABALLO','689-4',48,3.18,'importado',_binary '../../imagenes_productos/689-4_1680629839.jpg',NULL,NULL),(60,NULL,'MUÑECA BARBI C/MOTO ','234-11',32,2.75,'importado',_binary '../../imagenes_productos/234-11_1680629927.jpg',NULL,NULL),(61,NULL,'COMPUTADOR TIPO LAPTOP','HD1005D',60,4.62,'importado',_binary '../../imagenes_productos/HD1005D_1680640236.jpg',NULL,NULL),(62,NULL,'CAMION VOLQUETE  GRANDE ','699-1',18,3.78,'importado',_binary '../../imagenes_productos/699-1_1680639651.jpg',NULL,NULL),(63,NULL,'CAMINADOR O CARRITO DE EMPUJE','HE0801',12,7.06,'importado',_binary '../../imagenes_productos/HE0801_1680639458.jpg',NULL,NULL),(64,NULL,'PISTOLA BIOGEMA CON MASCARA HOMBRE ARAÑA','237A-1',72,2.38,'importado',_binary '../../imagenes_productos/237a-1_1680642363.jpg',NULL,NULL),(65,NULL,'BOLSA DE DINOSAURIO X 3','S1-17',128,1.15,'importado',_binary '../../imagenes_productos/S1-17_1680645412.jpg',NULL,NULL),(66,NULL,'BOLSA DE DINOSAURIO X4 CHICO','CN21-24',144,1.35,'importado',_binary '../../imagenes_productos/CN21-24_1680645688.jpg',NULL,NULL),(67,NULL,'BOLSA DE DINOSAURIO X4 GRANDE','1199-D11',72,2.25,'importado',_binary '../../imagenes_productos/1199-d11_1680645776.jpg',NULL,NULL),(68,17,'CAMION DINO TRUCK','3686-7 ',24,3.62,'importado',_binary '../../imagenes_productos/3686-7 _1681366435.jpg',NULL,NULL),(69,NULL,'PISTOLA BIOGEMA ','527',72,2.39,'importado',_binary '../../imagenes_productos/527_1680654147.jpg',NULL,NULL),(70,NULL,'PISTOLA BIOGEMA CON LATITAS','527B',48,3.34,'importado',_binary '../../imagenes_productos/527b_1680654328.jpg',NULL,NULL),(71,NULL,'PISTOLA BIOGEMA CON BOTELLAS','918A',36,4.90,'importado',_binary '../../imagenes_productos/918a_1680654543.jpg',NULL,NULL),(72,NULL,'PISTOLA BIOGEMA AIRBLASTER','538D',72,2.35,'importado',_binary '../../imagenes_productos/538D_1680654746.jpg',NULL,NULL),(73,NULL,'PISTOLA BIOGEMA LAZER PEQUEÑA','716-3',120,1.57,'importado',_binary '../../imagenes_productos/716-3_1680655143.png',NULL,NULL),(74,NULL,'CARRO EN MICA HOMBRE ARAÑA','189-36',72,0.87,'importado',_binary '../../imagenes_productos/189-36_1680657098.jpg',NULL,NULL),(75,NULL,'CARTING SONIC X 12 CARRITOS','20436-12',36,18.37,'importado',_binary '../../imagenes_productos/20436-12_1680657293.jpg',NULL,NULL),(76,NULL,'RADIO ENCANTO CON MICRO ROSADO EN CAJA','5805A',48,2.65,'importado',_binary '../../imagenes_productos/5805A_1680657383.jpg',NULL,NULL),(77,NULL,'DIDACTICO ENGRANAJE EN BOLSA','HL6012',60,1.09,'importado',_binary '../../imagenes_productos/HL6012_1680658031.jpg',NULL,NULL),(78,NULL,'DIDACTICO POLICUBO EN BOLSA ','HL6101',60,1.46,'importado',_binary '../../imagenes_productos/HL6101_1680658234.jpg',NULL,NULL),(79,NULL,'DIDACTICO LETRAS EN BOLSA','HL6087',60,1.09,'importado',_binary '../../imagenes_productos/hl6087_1680657285.jpg',NULL,NULL),(80,NULL,'DIDACTICO PRISMAS PASADOR EN BOLSA','HL6053',60,1.75,'importado',_binary '../../imagenes_productos/hl6053_1680657342.jpg',NULL,NULL),(81,NULL,'DIDACTICO NUMEROS EN BOLSA','HL6083',60,1.09,'importado',_binary '../../imagenes_productos/hl6083_1680657369.jpg',NULL,NULL),(82,NULL,'DIDACTICO TORNILLOS EN BOLSA','HL6034',60,1.09,'importado',_binary '../../imagenes_productos/HL6034_1680658412.jpg',NULL,NULL),(83,NULL,'DIDACTICO TUBOS EN BOLSA','HL6042A',60,1.09,'importado',_binary '../../imagenes_productos/hl6042a_1680657428.jpg',NULL,NULL),(84,NULL,'HUEVOS MY LITTLE PONY CAJA X12','125A',60,4.96,'importado',_binary '../../imagenes_productos/125a_1680657467.jpg',NULL,NULL),(85,NULL,'BEBE MUÑECA CON COCHE EN BOLSA 6 MODELOS','821',60,1.97,'importado',_binary '../../imagenes_productos/821_1680657530.jpg',NULL,NULL),(86,NULL,'MUÑECA BARBIE CON BICICLETA','HB017',96,1.97,'importado',_binary '../../imagenes_productos/hb017_1680657560.jpg',NULL,NULL),(87,NULL,'MUÑECA BARBIE CON PERRO','HB029',96,1.97,'importado',_binary '../../imagenes_productos/hb029_1680657582.jpg',NULL,NULL),(88,NULL,'HUEVO DINOSAURIO EN CAJA VERDE','B665-H1',36,2.73,'importado',_binary '../../imagenes_productos/b665-h1_1680657618.jpg',NULL,NULL),(89,NULL,'HUEVO DINOSAURIO EN CAJA AZUL','B665-A3',36,2.43,'importado',_binary '../../imagenes_productos/b665-a3_1680657653.jpg',NULL,NULL),(90,NULL,'CARRO POLICIA EN MICA','1516',96,0.56,'importado',_binary '../../imagenes_productos/1516_1680657684.jpg',NULL,NULL),(91,NULL,'BIBERON BABY CRY CAJA X 12','699-1003',144,1.31,'importado',_binary '../../imagenes_productos/699-1003_1680657724.jpg',NULL,NULL),(92,NULL,'BIBERON BABY CRY CAJA X 6','866-002',216,1.31,'importado',_binary '../../imagenes_productos/866-002_1680657760.jpg',NULL,NULL),(93,NULL,'MERLINA 19 CM','P0001',0,2.59,'importado',_binary '../../imagenes_productos/P0001_1680822611.jpg',NULL,NULL),(94,NULL,'BUGS BUNNY CONEJO 26 CM','P0002',0,3.25,'importado',_binary '../../imagenes_productos/P0002_1680823243.jpg',NULL,NULL),(95,NULL,'ROJO VERDE MORADO PELUCHES CHICOS BAN BAN  JUMBO JOSH CAPTAIN FIDDLES','P0003',0,1.82,'importado',_binary '../../imagenes_productos/P0003_1680825237.jpg',NULL,NULL),(96,NULL,'SONAJAS PARA BEBE CAJA X 3','2305',48,1.97,'importado',_binary '../../imagenes_productos/2305_1680826469.jpg',NULL,NULL),(97,NULL,'SET DOCTOR EN MALETA ROSADA','SD169-215',36,2.68,'importado',_binary '../../imagenes_productos/Sd169-215_1680826739.png',NULL,NULL),(98,NULL,'SET DOCTOR EN MALETA AZUL','SD169-266',36,2.68,'importado',_binary '../../imagenes_productos/Sd169-266_1680826781.png',NULL,NULL),(99,NULL,'PEPA X 14 MUÑECOS','PP605-14',96,3.17,'importado',_binary '../../imagenes_productos/Pp605-14_1680826854.png',NULL,NULL),(100,NULL,'CARROS X 6 EN CAJA','757-2',168,0.98,'importado',_binary '../../imagenes_productos/757-2_1680826895.png',NULL,NULL),(101,NULL,'CARS X 3','826-114',48,1.52,'importado',_binary '../../imagenes_productos/826-114_1680826957.png',NULL,NULL),(102,17,'LEGO MARIO BROS 420 PCS','86010',40,4.70,'importado',_binary '../../imagenes_productos/86010_1681366619.jpg',NULL,NULL),(103,NULL,'SONIC X 4 EN BLISTER 2 MDLS.','18724-2',192,1.63,'importado',_binary '../../imagenes_productos/18724-2_1680973976.jpg',NULL,NULL),(104,NULL,'MUÑECA BEBE DE SILICONA EN CAJA','2312-1',36,12.38,'importado',_binary '../../imagenes_productos/2312-1_1680974299.jpg',NULL,NULL),(105,NULL,'MUÑEQUITAS  PRINCESITAS X 4 EN CAJA 2 MDLS','J2284',60,4.39,'importado',_binary '../../imagenes_productos/J2284_1680974590.jpg',NULL,NULL),(106,NULL,'SONIC X 4 EN CAJA 3 MDLS','XSN38794H',96,2.95,'importado',_binary '../../imagenes_productos/XSN38794H_1680975551.png',NULL,NULL),(107,NULL,'CAMION ZOMBIE EN BOLSA 2 MDLS.','3686-6',24,2.95,'importado',_binary '../../imagenes_productos/3686-6_1680976269.jpg',NULL,NULL),(108,NULL,'ROBOT BOZ LAYER EN CAJA(TOYS ISTORY 5)','8899-18',48,3.26,'importado',_binary '../../imagenes_productos/8899-18_1680976374.jpg',NULL,NULL),(109,NULL,'SONIC X 5 EN CAJA 2 MDLS','B9286-5',60,6.44,'importado',_binary '../../imagenes_productos/B9286-5_1680976723.jpg',NULL,NULL),(110,NULL,'SONIC X 12 EN CAJA ','20408',24,19.09,'importado',_binary '../../imagenes_productos/20408_1680976790.jpg',NULL,NULL),(111,NULL,'PEPA PING CARTING X 12','10320',36,19.09,'importado',_binary '../../imagenes_productos/10320_1680977426.jpg',NULL,NULL),(112,NULL,'SONIC X 3 CON CARRO EN BLISTER 2 MDLS','22774',168,3.41,'importado',_binary '../../imagenes_productos/22774_1680977499.jpg',NULL,NULL),(113,NULL,'MUÑECO PIJAMA DE UNO EN CAJA 3 MDLS.','2016-86B',180,2.15,'importado',_binary '../../imagenes_productos/2016-86B_1680977675.jpg',NULL,NULL),(114,NULL,'MUÑECOS ENCANTO X 6 EN BLISTER','R3283',72,7.12,'importado',_binary '../../imagenes_productos/R3283_1680978049.jpg',NULL,NULL),(115,NULL,'MUÑECO FREDY X 1 EN CAJA','48410',60,5.76,'importado',_binary '../../imagenes_productos/48410_1681141899.jpg',NULL,NULL),(116,NULL,'PEPA PIG X 3 C/CARRO EN CAJA','Y992',18,6.62,'importado',_binary '../../imagenes_productos/Y992_1681141981.jpg',NULL,NULL),(117,NULL,'FREDY X 8 EN BLISTER','31858',0,6.17,'importado',_binary '../../imagenes_productos/31858_1681142117.jpg',NULL,NULL),(118,NULL,'CAMION PLAYERO OPTIMUS','1016',30,2.23,'importado',_binary '../../imagenes_productos/1016_1681142405.jpg',NULL,NULL),(119,NULL,'CAMION PLAYERO BOMBOLI ','1017',30,1017.00,'importado',_binary '../../imagenes_productos/1017_1681142460.jpg',NULL,NULL),(120,NULL,'CAMION PLAYERO C/ACCESORIOS','3021',16,3.20,'importado',_binary '../../imagenes_productos/3021_1681142579.jpg',NULL,NULL),(121,NULL,'FREDY X 3 EN BLISTER 2 MDLS','8005-1',96,3.81,'importado',_binary '../../imagenes_productos/8005-1_1681142748.jpg',NULL,NULL),(122,NULL,'DINOSAURIO EN HUEVO EN CAJA X 12','848-242',216,0.60,'importado',_binary '../../imagenes_productos/848-242_1681142851.jpg',NULL,NULL),(123,NULL,'ROBLOX X 9 ','221110',96,4.73,'importado',_binary '../../imagenes_productos/221110_1681143098.jpg',NULL,NULL),(124,NULL,'CARRO LOCO PATRULLA A C/R','YT364',24,3.81,'importado',_binary '../../imagenes_productos/YT364_1681145448.jpg',NULL,NULL),(125,NULL,'CARRO LOCO TUWISTER A C/R','8029E',24,3.94,'importado',_binary '../../imagenes_productos/8029E_1681145519.jpg',NULL,NULL),(126,NULL,'CARRO LOCO H.ARAÑA A C/R','9802M-S',36,3.41,'importado',_binary '../../imagenes_productos/9802M-S_1681145563.jpg',NULL,NULL),(127,NULL,'CARRITOS CARTING MARIO BROZ X 12 ','2152-4',36,20.00,'importado',_binary '../../imagenes_productos/2152-4_1681145655.jpg',NULL,NULL),(128,NULL,'FREDY X 8 EN BLISTER','31705',72,4.21,'importado',_binary '../../imagenes_productos/31705_1681145817.jpg',NULL,NULL),(129,NULL,'MUÑECA ENCANTO GORDITA EN CAJA','2045',72,3.25,'importado',_binary '../../imagenes_productos/2045_1681145870.jpg',NULL,NULL),(130,NULL,'BATMAN X 3 C/MASCARA EN BLISTER','63795',96,3.62,'importado',_binary '../../imagenes_productos/63795_1681145929.jpg',NULL,NULL),(131,NULL,'TAZAS X EL DIA DEL PADRE','XM-006|001|005|004|007',48,0.63,'importado',_binary '../../imagenes_productos/XM-006|001|005|004|007_1681146419.jpg',NULL,NULL),(132,NULL,'BALDE PLAYERO C/ACC ROSADO ','968-10',60,1.42,'importado',_binary '../../imagenes_productos/968-10_1681146666.jpg',NULL,NULL),(133,NULL,'BALDE PLAYERO C/ACC','9703',36,1.86,'importado',_binary '../../imagenes_productos/9703_1681146724.jpg',NULL,NULL),(134,NULL,'BALDE PLAYERO C/ACC','8295-16A',120,0.55,'importado',_binary '../../imagenes_productos/8295-16a_1681146760.jpg',NULL,NULL),(135,NULL,'BALDE PLAYERO C/ACC','2093',160,0.59,'importado',_binary '../../imagenes_productos/2093_1681146791.jpg',NULL,NULL),(136,NULL,'BALDE PLAYERO C/ACC','2001A',120,0.77,'importado',_binary '../../imagenes_productos/2001A_1681146826.jpg',NULL,NULL),(137,NULL,'BALDE PLAYERO C/ACC C/CARRITO','805-25A',48,1.06,'importado',_binary '../../imagenes_productos/805-25a_1681146862.jpg',NULL,NULL),(138,NULL,'BALDE PLAYERO C/ACC.C/CAMIONCITO','805-31A',60,0.83,'importado',_binary '../../imagenes_productos/805-31A_1681146901.jpg',NULL,NULL),(139,NULL,'BALDE PLAYERO C/ ACC.CARRITO','805-36A',60,0.89,'importado',_binary '../../imagenes_productos/805-36A_1681147023.jpg',NULL,NULL),(140,NULL,'CARRETILLA PLAYERA','799C',18,3.23,'importado',_binary '../../imagenes_productos/799c_1681147059.jpg',NULL,NULL),(141,NULL,'CARRO PLAYERO PEPA ','983-15',36,1.91,'importado',_binary '../../imagenes_productos/983-15_1681147114.jpg',NULL,NULL),(142,NULL,'BALDE PLAYERO C/ACC PALA LARGA','839A-1',36,3.03,'importado',_binary '../../imagenes_productos/839a-1_1681147157.jpg',NULL,NULL),(143,NULL,'BALDE PLAYERO C/ACC ROSADO','934-15',144,1.90,'importado',_binary '../../imagenes_productos/934-15_1681147274.jpg',NULL,NULL),(144,NULL,'CARRETILLA PLAYERA ROSADA','799',24,1.59,'importado',_binary '../../imagenes_productos/799_1681147312.jpg',NULL,NULL),(145,NULL,'CARRETILLA PLAYERA GRANDE ROSADA','953-15',18,5.21,'importado',_binary '../../imagenes_productos/953-15_1681147559.jpg',NULL,NULL),(146,NULL,'CARRETILLA PLAYERA GRANDE ROSADA SIN ACCESORIOS','953-15-1',12,3.33,'importado',_binary '../../imagenes_productos/953-15-1_1681147625.jpg',NULL,NULL),(147,NULL,'CARRETILLA PLAYERA ROSADA  C/ACCESORIOS TIPO OVALADA','878-15',18,4.33,'importado',_binary '../../imagenes_productos/878-15_1681147715.jpg',NULL,NULL),(148,NULL,'CARRETILA PLAYERA GRANDE C/ACC. AMARILLO','953',18,5.45,'importado',_binary '../../imagenes_productos/953_1681147787.jpg',NULL,NULL),(149,NULL,'BALDE PLAYERO C/ACC.','7738',36,1.59,'importado',_binary '../../imagenes_productos/7738_1681147835.jpg',NULL,NULL),(150,NULL,'CARRETILLA PLAYERA C/ACCESORIOS GRANDE','16813',18,2.84,'importado',_binary '../../imagenes_productos/16813_1681147900.jpg',NULL,NULL),(151,NULL,'BALDE PLAYERO C/ACC. Y CARRETILLA','868-100',60,0.86,'importado',_binary '../../imagenes_productos/868-100_1681147954.jpg',NULL,NULL),(152,17,'BALDE PLAYERO C/ACC. TIPO CASTILLO','882',60,1.48,'importado',_binary '../../imagenes_productos/882_1681148003.jpg',10.00,10.00),(153,NULL,'AVENGER X 8 EN CAJA  2 MDLS','AV-16',60,5.35,'importado',_binary '../../imagenes_productos/AV-16_1681148147.jpg',NULL,NULL),(154,NULL,'MUÑECA FROZEN C/COCHE','F263',48,3.94,'importado',_binary '../../imagenes_productos/F263_1681148647.jpg',NULL,NULL),(155,NULL,'MUÑECA FROZEN X 2 C/MICRO','F265',36,5.39,'importado',_binary '../../imagenes_productos/F265_1681148701.jpg',NULL,NULL),(156,NULL,'MUÑECA C/ COCHE ENCANTO 2 MDLS','MG2022',48,3.79,'importado',_binary '../../imagenes_productos/MG2022_1681149098.jpg',NULL,NULL),(157,NULL,'MUÑECO KENT ','SR538K',192,1.14,'importado',_binary '../../imagenes_productos/SR538K_1681149156.jpg',NULL,NULL),(158,17,'SONIC X 4 EN CAJA 3 MDLS.','B27914',96,3.07,'importado',_binary '../../imagenes_productos/B27914_1681149249.jpg',NULL,NULL),(159,NULL,'SONIC X 6 EN BLISTER','S02590',84,4.34,'importado',_binary '../../imagenes_productos/S02590_1681149327.jpg',NULL,NULL),(160,NULL,'GRANJA DE ZENON PELUCHE A PILA ','1039A',40,5.39,'importado',_binary '../../imagenes_productos/1039A_1681149401.jpg',NULL,NULL),(161,NULL,'MUÑECA ENCANTO X 2 CAJA CHICA','2049A',240,0.97,'importado',_binary '../../imagenes_productos/2049A_1681149639.jpg',NULL,NULL),(162,NULL,'MUÑECA ENCANTO X 3 C/CASTILLO','E2054A',120,1.87,'importado',_binary '../../imagenes_productos/E2054A_1681149692.jpg',NULL,NULL),(163,NULL,'MUÑECA ENCANTO X 3 C/TIGRE','E2054B',120,1.89,'importado',_binary '../../imagenes_productos/E2054B_1681149788.jpg',NULL,NULL),(164,NULL,'MUÑECA ENCANTO BARBI C/ NIÑO Y TIGRE','2048C',144,1.42,'importado',_binary '../../imagenes_productos/2048C_1681149859.jpg',NULL,NULL),(165,NULL,'CARRO LOCO ZOMBI A C/R ','YY-888',36,5.24,'importado',_binary '../../imagenes_productos/YY-888_1681149911.jpg',NULL,NULL),(166,NULL,'MUÑECA BARBI ENFERMERA 4 MDLS','YJ6610-5',288,0.90,'importado',_binary '../../imagenes_productos/YJ6610-5_1681150319.jpg',NULL,NULL),(167,NULL,'MUÑECA BARBI C/VESTIDO DE NOCHE','YJ6610-7',288,0.90,'importado',_binary '../../imagenes_productos/YJ6610-7_1681150426.jpg',NULL,NULL),(168,NULL,'MUÑECA BARBI AZAFATA 4 MDLS','YJ6610-8',288,0.97,'importado',_binary '../../imagenes_productos/YJ6610-8_1681150478.jpg',NULL,NULL),(169,NULL,'MUÑECA BARBI C/ABRIGO','ZR-703ZA1',240,1.35,'importado',_binary '../../imagenes_productos/ZR-703ZA1_1681150540.jpg',NULL,NULL),(170,NULL,'MUÑECA BARBI CON VESTIDO X 12','HD017',480,0.55,'importado',_binary '../../imagenes_productos/HD017_1681150622.jpg',NULL,NULL),(171,NULL,'MUÑECA BARBI X 8 TIPO MODELO','JY6610-1',288,0.73,'importado',_binary '../../imagenes_productos/JY6610-1_1681150748.jpg',NULL,NULL),(172,NULL,'MUÑECA BARBI X12 ','YJ6610-6',288,0.90,'importado',_binary '../../imagenes_productos/YJ6610-6_1681150956.jpg',NULL,NULL),(173,NULL,'MUÑECA BARBI ENCANTO C/ACCESORIO','2048',120,1.95,'importado',_binary '../../imagenes_productos/2048_1681151066.jpg',NULL,NULL),(174,NULL,'MUÑECA RED 3 MDLS','R34B',120,1.47,'importado',_binary '../../imagenes_productos/R34B_1681151119.jpg',NULL,NULL),(175,NULL,'MUÑECA ENCANTO GORDITA X 2','2058',72,2.96,'importado',_binary '../../imagenes_productos/2058_1681151181.jpg',NULL,NULL),(176,NULL,'MUÑECA BARBI ENCANTO','2055',480,0.42,'importado',_binary '../../imagenes_productos/2055_1681151240.jpg',NULL,NULL),(177,NULL,'MUÑECA ENCANTO X 1 GORDITA PLASTICO ','YB049A5',72,2.13,'importado',_binary '../../imagenes_productos/YB049A5_1681151314.jpg',NULL,NULL),(178,NULL,'MUÑECA ENCANTO X 1 GORDITA ARTICULADO','YB049A6',72,2.62,'importado',_binary '../../imagenes_productos/YB049A6_1681151381.jpg',NULL,NULL),(179,NULL,'ALFOMBRA 2 X 1.80','35811-1',15,6.03,'importado',_binary '../../imagenes_productos/35811-1_1681152139.jpg',NULL,NULL),(180,NULL,'PISO GOMA EVA DE 1 CM X 60x2e2e2f2e2e2f60 X 4 UNIDADES','3581102',10,2.94,'importado',_binary '../../imagenes_productos/3581102_1681152316.jpg',NULL,NULL),(181,NULL,'MUÑECA REAL PARADA CHICA EN CAJA PLOMA ','210-4',64,6.35,'importado',_binary '../../imagenes_productos/210-4_1681152747.jpg',NULL,NULL),(182,NULL,'MUÑECA REAL EN CAJA PLOMA GRANDE PARADA','209-4',36,8.44,'importado',_binary '../../imagenes_productos/209-4_1681152794.jpg',NULL,NULL),(183,NULL,'PATRULLA X 6 / C  CARRO Y PERRITOS ','546-112K6',48,2.90,'importado',_binary '../../imagenes_productos/546-112K6_1681153315.jpg',NULL,NULL),(184,NULL,'CARS EN MICA CHICO ','320-01A',96,0.63,'importado',_binary '../../imagenes_productos/320-01A_1681153408.jpg',NULL,NULL),(185,NULL,'CARS EN MICA GRANDE','320-03A',36,1.18,'importado',_binary '../../imagenes_productos/320-03A_1681153447.jpg',NULL,NULL),(187,NULL,'PLANTA ZOMBI EN BLISTER X 2 TAPA VERDE','815591',192,1.56,'importado',_binary '../../imagenes_productos/815591_1681153582.jpg',NULL,NULL),(188,NULL,'PLANTA ZOMBI X 1 EN BLISTER TAPA VERDE','815590',360,0.79,'importado',_binary '../../imagenes_productos/815590_1681153667.jpg',NULL,NULL),(189,17,'BABYCRY BIBERON CHICO EN CAJITA','XY82601',576,0.56,'importado',_binary '../../imagenes_productos/XY82601_1681153733.jpg',NULL,NULL),(190,17,'ASD','ASD',123,12.00,'nacional',_binary '../../imagenes_productos/sinimagen.jpg',0.00,0.00),(192,17,'ASD','ASDFFF',12,12.00,'importado',_binary '../../imagenes_productos/sinimagen.jpg',12.00,12.00);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `idproveedor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `telefono` int DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (25,'ALVARO',0,'','','77093709','',''),(26,'BEATRIZ',0,'','','770937033','','');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'administrador','control total'),(2,'usuario','solo vista stock y precios');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salida` (
  `idsalida` int NOT NULL AUTO_INCREMENT,
  `idproducto` int NOT NULL,
  `cantidad` int NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idsalida`),
  KEY `fk_prodsalida_idx` (`idproducto`),
  CONSTRAINT `fk_prodsalida` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
INSERT INTO `salida` VALUES (5,36,2,'2023-04-14');
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_comprobante`
--

DROP TABLE IF EXISTS `tipo_comprobante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_comprobante` (
  `idtipo_comprobante` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idtipo_comprobante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_comprobante`
--

LOCK TABLES `tipo_comprobante` WRITE;
/*!40000 ALTER TABLE `tipo_comprobante` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_comprobante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `idrol` int NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `documento` int DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  `foto` longblob,
  `usuario` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `documento_UNIQUE` (`documento`),
  KEY `fk_rolusuario_idx` (`idrol`),
  CONSTRAINT `fk_rolusuario` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'alvaro',77093703,'1995-02-16','m',996772309,NULL,'alvaro','1234'),(2,2,'Usuario',0,'2010-10-10','m',0,NULL,'usuario','usuario15');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-16  9:48:52
