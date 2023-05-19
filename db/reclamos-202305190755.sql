-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: reclamos
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `causas`
--

DROP TABLE IF EXISTS `causas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `causas` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `derecho_id` smallint unsigned DEFAULT NULL,
  `codigo` char(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `definicion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `defini` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `causas_nombre_unique` (`nombre`),
  KEY `derecho_id` (`derecho_id`),
  CONSTRAINT `causas_ibfk_1` FOREIGN KEY (`derecho_id`) REFERENCES `derechos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `causas`
--

LOCK TABLES `causas` WRITE;
/*!40000 ALTER TABLE `causas` DISABLE KEYS */;
INSERT INTO `causas` VALUES (1,1,'1101','Emitir recetas farmacologicas sin la denominación genérica internacional, datos erroneos, o incompleta.','Se considera aquellos reclamos relacionados a la entrega de recetas emitidas por el profesional de salud, sin consignar el nombre genérico del medicamento, con letra ilegible, incompleta, entre otras.','Receta con medicamentos de marca y/o incompleta y/o ilegible.'),(2,1,'1103','Direccionar  al usuario a comprar medicamentos o dispositivos médicos fuera del establecimiento de salud.','Inducir al usuario a comprar determinados medicamentos o dispositivos médicos fuera de la IPRESS a pesar de estar cubiertos a contar con stock en el establecimiento.','Me dicen que compre afuera.'),(3,1,'1104','Direccionar ai usuario a realizarse procedimientos médicos a quirurgicos fuera del establecimiento de salud.','Inducir al usuario a realizarse procedimientos médicos o quirúrgicos fuera del establecimiento, pese a estar cubiertos o disponibles en la IPRESS.','Me dijeron que me realice el procedimiento afuera.'),(7,1,'1102','Dispensar medicamentos y/o dispositivos médicos de manera insatisfactoria.','Se consideran aquellos reclamos relacionados a:\n•	Error en el tipo de productos entregados.\n•	Error en la cantidad de productos entregados.\n•	Entrega de productos vencidos, contaminados a deteriorados.\n•	Entrega de productos falsificados y/o sin registro sanitario, entre otros\n•	Negar o entregar en forma incompleta al usuario la provisión de medicamentos a dispositivos médicos','•	No estoy satisfecho con	los\nmedicamentos entregados.\n•	No me entregaron los medicamentos.\n•	Me entregaron de forma incompleta mis medicamentos'),(8,1,'1105','Negar o condicionar al usuario a realizarse procedimientos de apoyo al diagnóstico.','Negar al usuario a realizarse procedimientos de apoyo al diagnóstico.','No quieren realizarme el procedimiento médico.'),(9,1,'1106','Demorar en el otorgamiento de citas o en la atencion para consulta externa.','Se consideran las insatisfacciones generadas por:\n•	Falta de citas.\n•	Disponibilidad de citas para atencion en consulta externa en un plazo alejado.\n•	Tiempo de espera para la atencion que excede al tiempo establecido par la institución','•No hay citas para la especialidad\n•No puedo conseguir cita para Consulta Externa en fecha próxima.\n •Demoran en atenderme.'),(10,1,'1107','Demora para la Hospitalización.','No pase a Hospitalizacion o programacion Hospitalaria por falta de cupo, incluye UCI.','No hay cama disponible'),(11,1,'1108','Demorar en el otorgamiento de prestaciones de slaud durante la hospitalización.','Demora para el otorgamiento de prestaciones o realizacion de procedimientos en el area de hospitalizacion. Se considera cuando:\n•Demora en la visita médica.\n•Demora en la aplicación de medicación.\n•Demora en el cambio de ropa de cama.\n•Demora en el aseo del usuario.\n•Demora en la realización de procedimientos en hospitalización: Curación de heridas, retiro de puntos, cambio de apósitos, retiro o cambio de sondas, etc.','No estoy satisfecho con el servicio dado en Hospitalización.'),(12,1,'1109','Demorar en la atención de emergencia de acuerdo a la prioridad.','\"Demora en el otorgamiento de prestaciones o realización de procedimientos en el servicio de emergencia, de acuerdo a la prioridad del caso. Se considera:\n•Demora de atención en triaje.\n•Demora en la atención en tópico de emergencia.\n•Demora para el traslado del usuario a observación de emergencia.\n•Demora en la atención en el área de observación.\n•Entre otras atenciones.','Demora en la atención de emergencia.'),(13,6,'1110','Demorar en la atención de paciente obstétrica.','Demora en el otorgamiento de prestaciones a paciente obstétrica. Se considera:\n•Demora de atención en triaje.\n•Demora en la atención en tópico.\n•Demora en la atención en el área de observación, sala de dilatación o sala de parto.\n•Demora en la realización de cesárea indicada por el médico tratante.\n•Otros tipos de demora.','Demora en la atención de emergencia a paciente obstétrica.'),(14,1,'1111','Demorar en el otorgamiento o reprogramación de cupo para procedimiento quirúrgico.','Demora, en un plazo alejado, en el otorgamiento o reprogramación de un cupo para realización de procedimiento quirúrgico.','Demora en programarme cirugía.'),(15,1,'1112','Negar la atención en situaciones de emergencia.','Negar la atención en situaciones de emergencia y/o partos, (Incluye servicios que se prestan en emergencia según nivel de categorización, medicamentos y/o dispositivos médicos) o condicionar la atención a la presentación de documento de identidad, firma de pagarés, etc.','Negar la atención de Emergencia.'),(16,1,'1113','Encontrar IPRESS y/o unidades prestadoras de servicios de salud cerradas en horario de atención o no presencia del personal responsable de la atención.','Falta de disponibilidad de servicios o prestaciones, según disposiciones ofertadas (dias y horarios) por parte de la IPRESS. Se incluyen la falta o ausencia de personal de salud programado en todos los servicios que retrasa o impide la atención oportuna del usuario.','IPRESS cerrada o ausencia del personal de salud responsable de la atención.'),(17,1,'1114','No acceso a la historia clínica.','Se consideran aquellos reclamos relacionados a no brindar atención al usuario por no encontrarse disponible la historia clínica, sea por extravío o por omisión, por desconocimiento del código de la HC personal o familiar.','No acceso a la historia clínica.'),(18,1,'1115','Reclamos relacionados a la infraestructura de la institución.','Reclamos relacionados al estado y conservación de las instalaciones de la institución. Se incluyen:\n•Aseo del establecimiento.\n•Mantenimiento de puertas, ventanas, pisos, paredes o techos.\n•Mantenimiento de equipamiento no biomédico (sillas, mesas, o similares, de uso en la IPRESS).\n•Otras similares o definidas en norma expresa.','•Deficiente.\n•Infraestructura.\n•Falta de Aseo.\n•Falta de mantenimiento.'),(19,1,'1116','No cumplir o no acceder a hacer el procedimiento de referencia o contrareferencia del usuario.','Incumplimiento de la normativa vigente sobre referencia o contra referencia de los usuarios, a fin de dar continuidad de la atención de salud, lo que incluye negativa o demora en las gestiones.','•Referencia y contra referencia.\n•Demora.\n•Negativa.\n•Error.'),(20,1,'1117','Demorar en la toma o entrega de resultados de exámenes de apoyo al diagnóstico.','Retraso en la toma o entrega de resultados de exámenes de apoyo al diagnóstico, en cualquiera de los servicios (consulta externa, hospitalización, UCI, etc.), por cualquier causa. Incluye exámenes de laboratorio, anatomía patológica, rayos X, ecografía, tomografía, mamografía, densitometría ósea, resonancia magnética, entre otros.','Demora en la toma o entrega de resultado'),(21,1,'1118','Cobrar indebidamente.','Reclamos relacionados a cobros no acordados, adicionales o diferentes a los pactados inicialmente entre la IPRESS y el usuario.','Me cobraron o hicieron pagar dinero que no corresponde.'),(22,1,'1119','No cuentan con ventanilla preferencial.','No implementación de ventanilla para la atención preferencial del adulto mayor, gestantes y personas con discapacidad.','No cuentan con ventanilla preferencial.'),(23,1,'1120','Incumplimiento en la programación de citas.','•Acudir a una cita médica que ha sido reprogramada para otra fecha sin comunicación previa al paciente.\n•Acudir a una cita médica y el profesional de la salud no acudió a laborar.\n•Otros motivos ajenos al paciente, que impiden el otorgamiento de la cita en fecha programada.','Reprogramación de cita sin comunicación previa al paciente.'),(24,1,'1121','Incumplimiento en la programación de intervenciones quirúrgicas.','Reprogramación de la fecha de intervención quirúrgica por motivos ajenos al paciente.','Reprogramación de intervención quirúrgica.'),(25,3,'1201','No brindar información de los procesos administrativos de la IPRESS.','Falta o entrega insatisfactoria de información sobre:\n•Normas, reglamentos o condiciones administrativas vinculadas a la atención.\n•Gastos cubiertos en la prestación de salud así como las condiciones del Plan de Atención en Salud, cuando el usuario o personal administrativo lo solicite.\n•Entre otros.','No me dieron información clara sobre:\n•Asuntos administrativos.\n•Tratamiento.\n•Gastos no cubiertos.\n•El médico tratante.\n•Mis derechos.'),(26,3,'1203','No recibir de su médico y/o personal de salud tratante, información comprensible sobre su estado de salud o tratamiento.','Se considera aquellos reclamos en que el profesional de salud informa de manera insatisfactoria o se rehúsa a brindar información al usuario acerca del estado de salud y/o del tratamiento que viene recibiendo.','•Personal Médico\n•Información insatisfactoria.\n•Información no clara.\n•No brinda información.'),(27,4,'1302','No recibir de su médico y/o personal de salud trato amable y respetuoso.','Se considera a aquellos reclamos en que el profesional de salud brinda un trato contra la moral, buenas costumbres y/o dignidad de la persona.','No recibí un trato amable.'),(28,4,'1303','No recibir del personal administrativo trato amable y respetuoso.','Se considera a aquellos reclamos en que el personal administrativo brinda un trato contra la moral, buenas costumbres y/o dignidad de la persona','No recibí un trato amable.'),(29,4,'1304','No brindar el procedimiento médico o quirúrgico adecuado.','Realizar procedimientos médicos o quirúrgicos de manera errónea, no acorde a protocolos y guías.','Mala atención médica.'),(30,4,'1305','No brindar un trato acorde a la cultura, condición y género del usuario.','No ser atendido con respeto, no acorde a sus modos de vida, conocimientos y costumbres propios de su lugar de origen, o con la identidad de género, ni respetar condición de discapacidad o atención preferente durante la prestación de salud.','Trato discriminatorio.'),(31,4,'1306','Presunto error en los resultados de exámenes de apoyo al diagnóstico.','Presunción de error en los resultados de exámenes de apoyo al diagnóstico por cualquier causa. Se incluyen todos los exámenes auxiliares.','No estoy satisfecho con mis resultados.'),(32,4,'1307','No brindar atención con pleno respeto a su privacidad, con presencia de terceros no autorizados por el usuario.','Se consideran aquellos reclamos donde la IPRESS vulnera o expone al usuario, considerando la presencia de terceros durante su atención y sin su consentimiento.','Privacidad de la atención.'),(33,4,'1309','Retener al usuario de alta o al cadáver por motivo de deuda, previo acuerdo de pagos o trámites administrativos.','Se consideran aquellos reclamos relacionados a la demora en el proceso de alta o entrega de cadáver debido a trámites administrativos o económicos.','Demora en el alta del paciente y la retención del cadáver.'),(34,4,'1310','No brindar atención con respeto a la dignidad del usuario.','Se consideraran aquellos reclamos relacionados a actos impropios de naturaleza sexual.','Trato impropio.'),(35,2,'1401','No solicitar al usuario o su representante legal el consentimiento informado por escrito de acuerdo a los requerimientos de la normatividad vigente.','No cumplir con recabar del usuario el consentimiento informado de acuerdo a lo dispuesto por la norma vigente. Se considera obligatorio recabar el consentimiento informado en los siguientes casos:\n•Procedimientos riesgosos o procedimientos quirúrgicos que pongan en riesgo la salud del usuario.\n•Exploración, tratamiento o exhibición de imágenes con fines docentes.\n•Para la inclusión en ensayos de investigación clínica.\n•Para negarse a recibir o continuar tratamiento.\n•Para recibir cuidados paliativos.\n•Entre otros.','No me explicaron sobre el procedimiento que me iban a realizar ni pidieron mi autorización.'),(36,5,'1501','Negar o demorar en brindar al usuario el acceso a su historia clínica y a otros registros clínicos solicitados y no garantizar su carácter reservado.','Se consideran aquellos reclamos donde la IPRESS no permite o demora al usuario en acceder a su historia clínica u otros registros clínicos como la constancia de discapacidad y otros documentos relacionados a su atención, así como resguardar la privacidad de la información.','Acceso a la HC y los otros registros clínicos.'),(37,5,'1502','No realizar la gestión del reclamo de forma oportuna y adecuada.','Se consideran aquellos reclamos donde la IPRESS:\n•No brinda información al usuario sobre la gestión del reclamo en el plazo establecido según normativa.\n•No traslada oportunamente el reclamo a la instancia con competencia.\n•No tramita el reclamo dentro de los plazos establecidos.\n•Demora o negativa en brindar el libro de reclamaciones.\n•Entre otros.','Gestión del Reclamo:\n•No me dan información.\n•Obstaculizar.\n•Demora en el plazo establecido.'),(38,5,'1504','No contar con plataforma de atención al usuario en salud de acuerdo a la normatividad vigente.','No contar con una plataforma de atención al usuario en salud para la atención de consultas y reclamos de acuerdo a la normatividad vigente.','No tiene PAUS'),(39,6,'2001','Otros relativos a la atención de salud en las IPRESS.','Otro reclamos referido a la atención en la IPRESS o UGIPRESS.','Otros reclamo no identificado.');
/*!40000 ALTER TABLE `causas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conclusiones_anticipadas`
--

DROP TABLE IF EXISTS `conclusiones_anticipadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conclusiones_anticipadas` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conclusiones_anticipadas`
--

LOCK TABLES `conclusiones_anticipadas` WRITE;
/*!40000 ALTER TABLE `conclusiones_anticipadas` DISABLE KEYS */;
INSERT INTO `conclusiones_anticipadas` VALUES (3,'CONCILIACIÓN'),(1,'DESISTIMIENTO POR ESCRITO'),(5,'LAUDO ARBITRAL'),(4,'TRANSACCIÓN EXTRAJUDICIAL'),(2,'TRATO DIRECTO');
/*!40000 ALTER TABLE `conclusiones_anticipadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `derechos`
--

DROP TABLE IF EXISTS `derechos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `derechos` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `derechos_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `derechos`
--

LOCK TABLES `derechos` WRITE;
/*!40000 ALTER TABLE `derechos` DISABLE KEYS */;
INSERT INTO `derechos` VALUES (3,'Acceso a la Información'),(1,'Acceso a los Servicios de Salud'),(4,'Atención y Recuperación de la Salud'),(2,'Consentimiento Informado'),(6,'Otros'),(5,'Protección de Derechos');
/*!40000 ALTER TABLE `derechos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envios_resultados`
--

DROP TABLE IF EXISTS `envios_resultados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `envios_resultados` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envios_resultados`
--

LOCK TABLES `envios_resultados` WRITE;
/*!40000 ALTER TABLE `envios_resultados` DISABLE KEYS */;
INSERT INTO `envios_resultados` VALUES (2,'CORREO ELECTRÓNICO'),(1,'DOMICILIO CONSIGNADO EN EL LIBRO DE RECLAMACIONES EN SALUD'),(3,'OTRA DIRECCIÓN PROPORCIONADA POR EL USUARIO O TERCERO LEGITIMADO A EFECTOS DE SER NOTIFICADO');
/*!40000 ALTER TABLE `envios_resultados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (8,'ACUMULADO'),(4,'ARCHIVADO POR DUPLICIDAD'),(9,'CONCLUIDO'),(2,'EN TRAMITE'),(10,'REGISTRADO'),(1,'RESUELTO'),(3,'TRASLADADO');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etapas`
--

DROP TABLE IF EXISTS `etapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etapas` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etapas`
--

LOCK TABLES `etapas` WRITE;
/*!40000 ALTER TABLE `etapas` DISABLE KEYS */;
INSERT INTO `etapas` VALUES (1,'Admisión y Registro'),(4,'Archivo y Custodia del Expediente'),(2,'Evaluación e Investigación'),(3,'Resultado y Notificación');
/*!40000 ALTER TABLE `etapas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `iafas`
--

DROP TABLE IF EXISTS `iafas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `iafas` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `iafas`
--

LOCK TABLES `iafas` WRITE;
/*!40000 ALTER TABLE `iafas` DISABLE KEYS */;
INSERT INTO `iafas` VALUES (9,'Convenio IPAZA'),(8,'Convenio Universidad Agraria'),(10,'Convenio VEGAZA'),(6,'Mapfre EPS'),(7,'Mapfre Seguros y Reaseguros'),(1,'Pacifico EPS'),(2,'Pacifico Seguros'),(11,'Petróleos del Peru'),(12,'Protecta'),(3,'Rimac EPS'),(4,'Rimac Seguros y Reaseguros'),(5,'Sanitas del Peru');
/*!40000 ALTER TABLE `iafas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medios_recepcion`
--

DROP TABLE IF EXISTS `medios_recepcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medios_recepcion` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `medio` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medio` (`medio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medios_recepcion`
--

LOCK TABLES `medios_recepcion` WRITE;
/*!40000 ALTER TABLE `medios_recepcion` DISABLE KEYS */;
INSERT INTO `medios_recepcion` VALUES (5,'Documento escrito'),(2,'Libro de Reclamaciones Físico'),(1,'Libro de Reclamaciones Virtual'),(3,'Llamada telefónica'),(7,'Reclamo coparticipado con otra administrada'),(4,'Reclamo presencial'),(6,'Reclamo trasladado de otra administrada');
/*!40000 ALTER TABLE `medios_recepcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_06_17_231027_create_estados_table',1),(5,'2021_06_17_231716_create_tipos_table',1),(6,'2021_06_17_232201_create_causas_table',1),(7,'2021_06_18_003254_create_origenes_table',1),(8,'2021_06_18_003333_create_reclamos_table',1),(9,'2021_07_13_155110_create_table_derechos',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `origenes`
--

DROP TABLE IF EXISTS `origenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `origenes` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `padre_id` smallint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `origenes`
--

LOCK TABLES `origenes` WRITE;
/*!40000 ALTER TABLE `origenes` DISABLE KEYS */;
INSERT INTO `origenes` VALUES (1,'Administrativa',NULL),(2,'Asistencial',NULL),(3,'Atención al usuario',NULL),(4,'Contabilidad',1),(5,'RR.HH',1),(6,'Finanzas',1),(7,'Logística',1),(8,'Facturación',1),(9,'Calidad',1),(10,'Auditoría',1),(11,'Limpieza y Mantenimiento',1),(12,'Hospitalización',2),(13,'Emergencia',2),(14,'Farmacia',2),(15,'Rayos x',2),(16,'Ecografía',2),(17,'Densitometría',2),(18,'Consultorio Externo',2),(19,'Laboratorio',2),(20,'Nutrición',2),(21,'Centro Quirúgico',2),(22,'Sala Procedimientos',2),(23,'Sala de Recuperación',2),(24,'Unidad Cuidados Intensivos',2),(25,'Admisión Ambulatorio',3),(26,'Admisión Emergencia',3),(27,'Admisión Odontología',3),(28,'Central Telefónica',3),(29,'Sanidad',3),(30,'Plataforma de Atención al usuario',3),(31,'Óptica',3),(32,'Admisión Laboratorio',3),(33,'Admisión Resocentro',3),(34,'Presupuestos',3),(35,'Mesa de partes',3),(44,'demo-area2',NULL),(49,'origen2.2.',44);
/*!40000 ALTER TABLE `origenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclamo_docs`
--

DROP TABLE IF EXISTS `reclamo_docs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reclamo_docs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `reclamo_id` int unsigned NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `nombre_cliente` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuario` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='documentos de los reclamos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reclamo_docs`
--

LOCK TABLES `reclamo_docs` WRITE;
/*!40000 ALTER TABLE `reclamo_docs` DISABLE KEYS */;
INSERT INTO `reclamo_docs` VALUES (1,2,'634543c53de83.pdf','20210928 CLINICA ESPECIALIDADES MEDICAS.pdf','2022-10-11 10:21:57','2022-10-11 10:21:57','administrador');
/*!40000 ALTER TABLE `reclamo_docs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reclamos`
--

DROP TABLE IF EXISTS `reclamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reclamos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` smallint unsigned DEFAULT NULL,
  `causa_id` smallint unsigned DEFAULT NULL,
  `origen_id` smallint unsigned DEFAULT NULL,
  `estado_id` smallint unsigned DEFAULT '10',
  `traslado_id` tinyint unsigned DEFAULT NULL,
  `traslado_codigo` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `user_id` int unsigned NOT NULL,
  `user2_id` int unsigned DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `analisis` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `medidas_adoptadas` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `conclusion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `suceso_at` date DEFAULT NULL,
  `send_mail` tinyint(1) NOT NULL DEFAULT '1',
  `resuelto_at` date DEFAULT NULL,
  `dias_max_resp` tinyint unsigned NOT NULL DEFAULT '30',
  `medio_recepcion_id` tinyint unsigned DEFAULT NULL,
  `hoja_nro` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `administrado_tp` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT 'IPRESS',
  `codigo_renipress` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL DEFAULT '00012975',
  `recibido_at` date DEFAULT NULL,
  `paciente_tp` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `iafas_id` tinyint unsigned DEFAULT NULL,
  `etapa_id` tinyint unsigned DEFAULT NULL,
  `resultado_id` tinyint unsigned DEFAULT NULL,
  `notificacion_id` tinyint unsigned DEFAULT NULL,
  `notificacion_at` date DEFAULT NULL,
  `conclusiona_id` tinyint unsigned DEFAULT NULL COMMENT 'Conclusion anticipada',
  `delete_at` datetime DEFAULT NULL,
  `ma_estado` enum('ACTIVO','CULMINADO') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'ACTIVO',
  `ma_inicio` date DEFAULT NULL,
  `ma_fin` date DEFAULT NULL,
  `ma_tipo` smallint unsigned DEFAULT NULL,
  `ma_proceso` smallint unsigned DEFAULT NULL,
  `ma_proceso2` smallint unsigned DEFAULT NULL,
  `ma_procesoo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `observacionr` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `usrs_involucrados` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci,
  `codigo_primigenio` varchar(10) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `clinica_atiende` varchar(10) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `reporte_periodo` char(5) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `reporte_estado` tinyint DEFAULT '2',
  `reporte_observacion` text COLLATE utf8mb3_spanish_ci,
  PRIMARY KEY (`id`),
  KEY `tipo_id_foreign` (`tipo_id`),
  KEY `causa_id_foreign` (`causa_id`),
  KEY `origen_id_foreign` (`origen_id`),
  KEY `estado_id_foreign` (`estado_id`),
  KEY `user2_id_foreign` (`user2_id`),
  KEY `user_id_foreign` (`user_id`) USING BTREE,
  KEY `medio_recepcion_id_foreign` (`medio_recepcion_id`),
  KEY `iafas_id_foreign` (`iafas_id`),
  KEY `etapa_id_foreign` (`etapa_id`),
  KEY `resultado_id_foreign` (`resultado_id`),
  KEY `traslado_id_foreign` (`traslado_id`),
  KEY `notificacion_id_foreign` (`notificacion_id`),
  KEY `conclusiona_id_foreign` (`conclusiona_id`),
  CONSTRAINT `reclamos_causa_id_foreign` FOREIGN KEY (`causa_id`) REFERENCES `causas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_ibfk_1` FOREIGN KEY (`medio_recepcion_id`) REFERENCES `medios_recepcion` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_ibfk_2` FOREIGN KEY (`iafas_id`) REFERENCES `iafas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_ibfk_3` FOREIGN KEY (`etapa_id`) REFERENCES `etapas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_ibfk_4` FOREIGN KEY (`resultado_id`) REFERENCES `resultados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_ibfk_5` FOREIGN KEY (`traslado_id`) REFERENCES `traslados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_ibfk_6` FOREIGN KEY (`notificacion_id`) REFERENCES `envios_resultados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_ibfk_7` FOREIGN KEY (`conclusiona_id`) REFERENCES `conclusiones_anticipadas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_origen_id_foreign` FOREIGN KEY (`origen_id`) REFERENCES `origenes` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_user2_id_foreign` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `reclamos_users_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reclamos`
--

LOCK TABLES `reclamos` WRITE;
/*!40000 ALTER TABLE `reclamos` DISABLE KEYS */;
INSERT INTO `reclamos` VALUES (1,NULL,9,NULL,10,NULL,NULL,32,NULL,'subiendo reclamo 14/09/2022','huhuhuhu',NULL,'kokokok','2022-09-14 18:05:03','2022-09-14 23:05:03','2022-09-14',1,NULL,30,1,'0000000001','IPRESS','00012975','2022-11-14','ASEGURADO',8,NULL,6,NULL,NULL,3,NULL,'CULMINADO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL),(2,1,3,25,3,3,'20001',33,NULL,'ta  te ti to tu','se verifica emn e sistemas mndnnnnnn','se .......','dewddwed','2022-10-11 05:41:12','2022-10-11 10:41:12','2022-10-11',1,NULL,30,2,'987','IPRESS','00012975','2022-10-11','ASEGURADO',3,1,2,2,'2022-10-11',1,NULL,'ACTIVO','2022-12-23','2022-10-28',2,1,6,NULL,'sssssssss','CELIA\nMAGALY\nGILDA',NULL,NULL,NULL,2,NULL),(3,13,NULL,NULL,8,NULL,NULL,34,NULL,'demos#1',NULL,NULL,NULL,'2023-05-11 13:09:06','2023-05-11 13:09:06','2023-02-08',1,NULL,30,2,'00100','IPRESS','00012975','2023-03-08','PARTICULAR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ACTIVO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'PRIMIGENIO','SI',NULL,2,NULL),(4,NULL,NULL,NULL,10,NULL,NULL,31,35,'demostracion degregar nombres',NULL,NULL,NULL,'2023-05-15 21:32:28','2023-05-15 21:32:28','2023-06-11',1,NULL,30,5,'2023051101','IPRESS','00012975','2023-04-11','PARTICULAR',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ACTIVO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SI',NULL,3,'trama: observacion\ntrama: POR CULMINAR');
/*!40000 ALTER TABLE `reclamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultados`
--

DROP TABLE IF EXISTS `resultados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resultados` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultados`
--

LOCK TABLES `resultados` WRITE;
/*!40000 ALTER TABLE `resultados` DISABLE KEYS */;
INSERT INTO `resultados` VALUES (6,'CONCLUIDO ANTICIPADAMENTE'),(2,'FUNDADO'),(3,'FUNDADO PARCIAL'),(5,'IMPROCEDENTE'),(4,'INFUNDADO'),(1,'PENDIENTE');
/*!40000 ALTER TABLE `resultados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos`
--

DROP TABLE IF EXISTS `tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos` (
  `id` smallint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos`
--

LOCK TABLES `tipos` WRITE;
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` VALUES (9,'Atención a domicilio, consulta ambulatoria'),(10,'Atención a domicilio, urgencia o emergencia'),(5,'Centro Obstétrico'),(4,'Centro Quirúrgico'),(1,'Consulta Externa'),(3,'Emergencia'),(7,'Farmacia'),(2,'Hospitalización'),(12,'Infraestructura'),(11,'Oficinas o áreas administrativas de IAFAS o IPRESS o UGIPRESS'),(13,'Referencia y Contrareferencia'),(8,'Servicios Médicos de Apoyo'),(6,'UCI o UCIN');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traslados`
--

DROP TABLE IF EXISTS `traslados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traslados` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traslados`
--

LOCK TABLES `traslados` WRITE;
/*!40000 ALTER TABLE `traslados` DISABLE KEYS */;
INSERT INTO `traslados` VALUES (3,'IAFAS'),(1,'IPRESS'),(4,'RENIPRESS'),(5,'RIAFAS'),(2,'UGIPRESS');
/*!40000 ALTER TABLE `traslados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `rol` enum('Admin','Guest') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `dip_tp` enum('DNI','RUC','PASAPORTE','CDE','DIE','CUI','CNV','PTP','OTROS') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '00000000',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '999999999',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `codigo_historia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  `apellido_materno` varchar(50) COLLATE utf8mb3_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `codido_historia` (`codigo_historia`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','DNI','1','$2y$10$o9f8IqaUyujkpc0IomM.buw2d913aabwBDrwjN824Us8Ct3VLHto2','Admin','Peru','admin@admin.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'Guest','DNI','47690143','$2y$10$o9f8IqaUyujkpc0IomM.buw2d913aabwBDrwjN824Us8Ct3VLHto2','GONZALES GONZALES, JUNIOR CHRISTIAN','123456789','christiangonzalescio@gmail.com',NULL,'950165669','2022-08-05 17:58:10','2022-08-05 17:58:10',NULL,NULL,NULL),(31,'Admin','DNI','47690143','$2y$10$8ipMCfp8nKPbkiWXI74.FO3LyictNkzs1zQTLih6gnfdbOLxEJHyS','administrador','Clinica2022','christian.gonzales@especialidadesmedicas.org',NULL,NULL,'2022-08-16 19:30:39','2022-08-16 19:30:39',NULL,NULL,NULL),(32,'Guest','DNI','16567386','048068080db76a9b3ac0d94feb3eae05','SANTA CRUZ CORDOVA, MAGALY YSABEL','San borja','reclamos@especialidadesmedicas.org',NULL,'123456789','2022-09-14 22:51:21','2022-09-14 23:05:03','4478',NULL,NULL),(33,'Guest','DNI','29324910','c5cc7fd4f883a9a13aed1a4fe53ca84b','LAZARTE GAMERO, ROXANA MARGARITA EVITA','SAN BORJA','rox@gmail.com',NULL,'123456789','2022-10-11 10:21:56','2022-10-11 10:41:12','59595',NULL,NULL),(34,'Guest','OTROS','E-0912290087','5ceb001435ec64ebbc262d3a5d51a8b6','Lorem Ipsum','is simply dummy text of the printing and typesetting industry.','demo@gmail.com',NULL,'00000001','2023-05-08 21:58:54','2023-05-09 13:39:42','H-0001',NULL,NULL),(35,'Guest','RUC','20552103816','a5c204552ca41ab57d9221bbd86ec9cc','AGROLIGHT PERU S.A.C.','PJ. JORGE BASADRE NRO. 158 URB. POP LA UNIVERSAL 2DA ET., LIMA - LIMA - SANTA ANITA','christian.gonzales@especialidadesmedicas.com',NULL,'23','2023-05-11 17:20:17','2023-05-11 17:20:17',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_adoptadas_test`
--

DROP TABLE IF EXISTS `v_adoptadas_test`;
/*!50001 DROP VIEW IF EXISTS `v_adoptadas_test`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_adoptadas_test` AS SELECT 
 1 AS `id`,
 1 AS `col_g`,
 1 AS `col_h`,
 1 AS `col_mad`,
 1 AS `col_med`,
 1 AS `col_pro`,
 1 AS `col_main`,
 1 AS `col_mafi`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_count_causas`
--

DROP TABLE IF EXISTS `v_count_causas`;
/*!50001 DROP VIEW IF EXISTS `v_count_causas`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_count_causas` AS SELECT 
 1 AS `cantidad`,
 1 AS `codigo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_count_estados`
--

DROP TABLE IF EXISTS `v_count_estados`;
/*!50001 DROP VIEW IF EXISTS `v_count_estados`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_count_estados` AS SELECT 
 1 AS `cantidad`,
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_count_origenes`
--

DROP TABLE IF EXISTS `v_count_origenes`;
/*!50001 DROP VIEW IF EXISTS `v_count_origenes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_count_origenes` AS SELECT 
 1 AS `cantidad`,
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_count_tipos`
--

DROP TABLE IF EXISTS `v_count_tipos`;
/*!50001 DROP VIEW IF EXISTS `v_count_tipos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_count_tipos` AS SELECT 
 1 AS `cantidad`,
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_desistimiento`
--

DROP TABLE IF EXISTS `v_desistimiento`;
/*!50001 DROP VIEW IF EXISTS `v_desistimiento`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_desistimiento` AS SELECT 
 1 AS `id`,
 1 AS `tipo_id`,
 1 AS `causa_id`,
 1 AS `origen_id`,
 1 AS `estado_id`,
 1 AS `traslado_id`,
 1 AS `traslado_codigo`,
 1 AS `user_id`,
 1 AS `user2_id`,
 1 AS `descripcion`,
 1 AS `analisis`,
 1 AS `medidas_adoptadas`,
 1 AS `conclusion`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `suceso_at`,
 1 AS `send_mail`,
 1 AS `resuelto_at`,
 1 AS `dias_max_resp`,
 1 AS `medio_recepcion_id`,
 1 AS `hoja_nro`,
 1 AS `administrado_tp`,
 1 AS `codigo_renipress`,
 1 AS `recibido_at`,
 1 AS `paciente_tp`,
 1 AS `iafas_id`,
 1 AS `etapa_id`,
 1 AS `resultado_id`,
 1 AS `notificacion_id`,
 1 AS `notificacion_at`,
 1 AS `conclusiona_id`,
 1 AS `delete_at`,
 1 AS `ma_estado`,
 1 AS `ma_inicio`,
 1 AS `ma_fin`,
 1 AS `ma_tipo`,
 1 AS `ma_proceso`,
 1 AS `ma_proceso2`,
 1 AS `ma_procesoo`,
 1 AS `observacionr`,
 1 AS `usrs_involucrados`,
 1 AS `name`,
 1 AS `dip`,
 1 AS `domicilio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `v_tramas_test`
--

DROP TABLE IF EXISTS `v_tramas_test`;
/*!50001 DROP VIEW IF EXISTS `v_tramas_test`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_tramas_test` AS SELECT 
 1 AS `id`,
 1 AS `col_a`,
 1 AS `col_b`,
 1 AS `col_c`,
 1 AS `col_d`,
 1 AS `col_e`,
 1 AS `col_f`,
 1 AS `col_g`,
 1 AS `col_h`,
 1 AS `col_i`,
 1 AS `col_j`,
 1 AS `col_k`,
 1 AS `col_l`,
 1 AS `col_o`,
 1 AS `col_p`,
 1 AS `col_q`,
 1 AS `col_r`,
 1 AS `col_u`,
 1 AS `col_v`,
 1 AS `col_w`,
 1 AS `col_x`,
 1 AS `col_y`,
 1 AS `col_z`,
 1 AS `col_aa`,
 1 AS `col_ab`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'reclamos'
--
/*!50003 DROP PROCEDURE IF EXISTS `TramaDeMedidasAdoptadas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `TramaDeMedidasAdoptadas`(IN periodo CHAR(6), IN fechaDesde DATE, IN fechaHasta DATE)
BEGIN
	DECLARE RENINPRESS CHAR(8) default '00012975';

	SELECT
    	a.id AS id,
    	periodo AS col_a,
    	date_format(a.recibido_at, '%Y%m') AS col_b,
    	1 AS col_c,
    	RENINPRESS AS col_d,
    	RENINPRESS AS col_e,
	    (case
	        a.estado_id when 3 then 3
	        else 1
	    end) AS col_f,
	    (case
	        a.estado_id when 3 then a.traslado_codigo
	        else RENINPRESS
	    end) AS col_g,
	    (case
	        a.medio_recepcion_id when ((0 <> 1)
	        or (0 <> 3)) then a.medio_recepcion_id
	        else 2
	    end) AS col_h,
    	concat(RENINPRESS,'-', a.hoja_nro) AS col_i,
	    (case
	        when (b.dip_tp = 'DNI') then 1
	        when (b.dip_tp = 'CDE') then 2
	        when (b.dip_tp = 'PASAPORTE') then 3
	        when (b.dip_tp = 'DIE') then 4
	        when (b.dip_tp = 'CUI') then 5
	        when (b.dip_tp = 'CNV') then 6
	        when (b.dip_tp = 'PTP') then 10
	        when (b.dip_tp = 'RUC') then 11
	        else 12
	    end) AS col_j,
    	b.dip AS col_k,
	    (case
	        when (b.dip_tp = 'RUC') then b.name
	    end) AS col_l,
	    (case
	        when (b.dip_tp <> 'RUC') then b.name
	    end) AS col_m,
	    (case
	        when (c.dip_tp = 'DNI') then 1
	        when (c.dip_tp = 'CDE') then 2
	        when (c.dip_tp = 'PASAPORTE') then 3
	        when (c.dip_tp = 'DIE') then 4
	        when (c.dip_tp = 'CUI') then 5
	        when (c.dip_tp = 'CNV') then 6
	        when (c.dip_tp = 'PTP') then 10
	        when (c.dip_tp = 'RUC') then 11
	        when (c.dip_tp = 'OTROS') then 12
	        else NULL
	    end) AS col_n,
    	c.dip AS col_o,
	    (case
	        when (c.dip_tp = 'RUC') then c.name
	        else NULL
	    end) AS col_p,
	    (case
	        when (c.dip_tp <> 'RUC') then c.name
	        else NULL
	    end) AS col_q,
	    (case
	        when a.send_mail then 'Si'
	        else 'No'
	    end) AS col_r,
	    (case
	        when a.send_mail then b.email
	        else NULL
	    end) AS col_s,
    	b.domicilio AS col_t,
    	b.telefono AS col_u,
    	a.medio_recepcion_id AS col_v,
    	date_format(a.recibido_at, '%Y%m%d') AS col_w,
    	a.descripcion AS col_x,
	    (case
	        when (a.origen_id = 18) then 1
	        when (a.origen_id = 12) then 2
	        when (a.origen_id = 13) then 3
	        when (a.origen_id = 21) then 4
	        when (a.origen_id = 0) then 5
	        when (a.origen_id = 24) then 6
	        when (a.origen_id = 14) then 7
	        when (a.origen_id = 0) then 8
	        when (a.origen_id = 25) then 9
	        when (a.origen_id = 0) then 10
	        when (a.origen_id = 0) then 11
	        when (a.origen_id = 0) then 12
	        when (a.origen_id = 0) then 13
	        else NULL
	    end) AS col_y
	from
	    ((reclamos.reclamos a
	join reclamos.users b on
	    ((a.user_id = b.id)))
	left join reclamos.users c on
	    ((a.user2_id = c.id)))
	where
	    a.reporte_estado = 2
		AND a.delete_at is null 
		AND recibido_at BETWEEN fechaDesde AND fechaHasta 
		AND ((a.resultado_id = 2) OR (a.resultado_id = 3))
	order by
	    a.recibido_at;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TramaDeReclamos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `TramaDeReclamos`(IN periodo CHAR(6), IN fechaDesde DATE, IN fechaHasta DATE)
BEGIN
	DECLARE RENINPRESS CHAR(8) default '00012975';

	SELECT
    	a.id AS id,
    	periodo AS col_a,
    	date_format(a.recibido_at, '%Y%m') AS col_b,
    	1 AS col_c,
    	RENINPRESS AS col_d,
    	RENINPRESS AS col_e,
	    (case
	        a.estado_id when 3 then 3
	        else 1
	    end) AS col_f,
	    (case
	        a.estado_id when 3 then a.traslado_codigo
	        else RENINPRESS
	    end) AS col_g,
	    (case
	        a.medio_recepcion_id when ((0 <> 1)
	        or (0 <> 3)) then a.medio_recepcion_id
	        else 2
	    end) AS col_h,
    	concat(RENINPRESS,'-', a.hoja_nro) AS col_i,
	    (case
	        when (b.dip_tp = 'DNI') then 1
	        when (b.dip_tp = 'CDE') then 2
	        when (b.dip_tp = 'PASAPORTE') then 3
	        when (b.dip_tp = 'DIE') then 4
	        when (b.dip_tp = 'CUI') then 5
	        when (b.dip_tp = 'CNV') then 6
	        when (b.dip_tp = 'PTP') then 10
	        when (b.dip_tp = 'RUC') then 11
	        else 12
	    end) AS col_j,
    	b.dip AS col_k,
	    (case
	        when (b.dip_tp = 'RUC') then b.name
	    end) AS col_l,
	    (case
	        when (b.dip_tp <> 'RUC') then b.name
	    end) AS col_m,
	    (case
	        when (c.dip_tp = 'DNI') then 1
	        when (c.dip_tp = 'CDE') then 2
	        when (c.dip_tp = 'PASAPORTE') then 3
	        when (c.dip_tp = 'DIE') then 4
	        when (c.dip_tp = 'CUI') then 5
	        when (c.dip_tp = 'CNV') then 6
	        when (c.dip_tp = 'PTP') then 10
	        when (c.dip_tp = 'RUC') then 11
	        when (c.dip_tp = 'OTROS') then 12
	        else NULL
	    end) AS col_n,
    	c.dip AS col_o,
	    (case
	        when (c.dip_tp = 'RUC') then c.name
	        else NULL
	    end) AS col_p,
	    (case
	        when (c.dip_tp <> 'RUC') then c.name
	        else NULL
	    end) AS col_q,
	    (case
	        when a.send_mail then 'Si'
	        else 'No'
	    end) AS col_r,
	    (case
	        when a.send_mail then b.email
	        else NULL
	    end) AS col_s,
    	b.domicilio AS col_t,
    	b.telefono AS col_u,
    	a.medio_recepcion_id AS col_v,
    	date_format(a.recibido_at, '%Y%m%d') AS col_w,
    	a.descripcion AS col_x,
	    (case
	        when (a.origen_id = 18) then 1
	        when (a.origen_id = 12) then 2
	        when (a.origen_id = 13) then 3
	        when (a.origen_id = 21) then 4
	        when (a.origen_id = 0) then 5
	        when (a.origen_id = 24) then 6
	        when (a.origen_id = 14) then 7
	        when (a.origen_id = 0) then 8
	        when (a.origen_id = 25) then 9
	        when (a.origen_id = 0) then 10
	        when (a.origen_id = 0) then 11
	        when (a.origen_id = 0) then 12
	        when (a.origen_id = 0) then 13
	        else NULL
	    end) AS col_y
	from
	    ((reclamos.reclamos a
	join reclamos.users b on
	    ((a.user_id = b.id)))
	left join reclamos.users c on
	    ((a.user2_id = c.id)))
	where
		a.reporte_estado = 2
	    AND a.delete_at is null 
	    AND a.recibido_at BETWEEN fechaDesde AND fechaHasta
	    AND a.resultado_id <> 2
	    AND a.resultado_id <> 3
	order by
	    a.recibido_at;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `v_adoptadas_test`
--

/*!50001 DROP VIEW IF EXISTS `v_adoptadas_test`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_adoptadas_test` AS select `a`.`id` AS `id`,(case `a`.`medio_recepcion_id` when ((0 <> 1) or (0 <> 3)) then `a`.`medio_recepcion_id` else 2 end) AS `col_g`,concat('12975-',`a`.`hoja_nro`) AS `col_h`,`a`.`medidas_adoptadas` AS `col_mad`,`a`.`ma_tipo` AS `col_med`,`a`.`ma_proceso` AS `col_pro`,date_format(`a`.`ma_inicio`,'%Y%m%d') AS `col_main`,date_format(`a`.`ma_fin`,'%Y%m%d') AS `col_mafi` from ((`reclamos` `a` join `users` `b` on((`a`.`user_id` = `b`.`id`))) left join `users` `c` on((`a`.`user2_id` = `c`.`id`))) where (`a`.`delete_at` is null) order by `a`.`recibido_at` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_count_causas`
--

/*!50001 DROP VIEW IF EXISTS `v_count_causas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_count_causas` AS select count(0) AS `cantidad`,ifnull(`b`.`codigo`,'SIN CAUSA DEFINIDA') AS `codigo` from (`reclamos` `a` left join `causas` `b` on((`a`.`causa_id` = `b`.`id`))) group by `a`.`causa_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_count_estados`
--

/*!50001 DROP VIEW IF EXISTS `v_count_estados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_count_estados` AS select count(0) AS `cantidad`,ifnull(`b`.`nombre`,'SIN ESTADO DEFINIDO') AS `nombre` from (`reclamos` `a` left join `estados` `b` on((`a`.`estado_id` = `b`.`id`))) group by `a`.`estado_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_count_origenes`
--

/*!50001 DROP VIEW IF EXISTS `v_count_origenes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_count_origenes` AS select count(0) AS `cantidad`,ifnull(`b`.`nombre`,'RECLAMOS DE MEDICOS') AS `nombre` from (`reclamos` `a` left join `origenes` `b` on(((`a`.`origen_id` = `b`.`id`) and (`b`.`padre_id` is null)))) group by `a`.`origen_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_count_tipos`
--

/*!50001 DROP VIEW IF EXISTS `v_count_tipos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_count_tipos` AS select count(0) AS `cantidad`,ifnull(`b`.`nombre`,'RECLAMOS') AS `nombre` from (`reclamos` `a` left join `tipos` `b` on((`a`.`tipo_id` = `b`.`id`))) group by `a`.`tipo_id` order by `b`.`nombre` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_desistimiento`
--

/*!50001 DROP VIEW IF EXISTS `v_desistimiento`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_desistimiento` AS select `a`.`id` AS `id`,`a`.`tipo_id` AS `tipo_id`,`a`.`causa_id` AS `causa_id`,`a`.`origen_id` AS `origen_id`,`a`.`estado_id` AS `estado_id`,`a`.`traslado_id` AS `traslado_id`,`a`.`traslado_codigo` AS `traslado_codigo`,`a`.`user_id` AS `user_id`,`a`.`user2_id` AS `user2_id`,`a`.`descripcion` AS `descripcion`,`a`.`analisis` AS `analisis`,`a`.`medidas_adoptadas` AS `medidas_adoptadas`,`a`.`conclusion` AS `conclusion`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`a`.`suceso_at` AS `suceso_at`,`a`.`send_mail` AS `send_mail`,`a`.`resuelto_at` AS `resuelto_at`,`a`.`dias_max_resp` AS `dias_max_resp`,`a`.`medio_recepcion_id` AS `medio_recepcion_id`,`a`.`hoja_nro` AS `hoja_nro`,`a`.`administrado_tp` AS `administrado_tp`,`a`.`codigo_renipress` AS `codigo_renipress`,`a`.`recibido_at` AS `recibido_at`,`a`.`paciente_tp` AS `paciente_tp`,`a`.`iafas_id` AS `iafas_id`,`a`.`etapa_id` AS `etapa_id`,`a`.`resultado_id` AS `resultado_id`,`a`.`notificacion_id` AS `notificacion_id`,`a`.`notificacion_at` AS `notificacion_at`,`a`.`conclusiona_id` AS `conclusiona_id`,`a`.`delete_at` AS `delete_at`,`a`.`ma_estado` AS `ma_estado`,`a`.`ma_inicio` AS `ma_inicio`,`a`.`ma_fin` AS `ma_fin`,`a`.`ma_tipo` AS `ma_tipo`,`a`.`ma_proceso` AS `ma_proceso`,`a`.`ma_proceso2` AS `ma_proceso2`,`a`.`ma_procesoo` AS `ma_procesoo`,`a`.`observacionr` AS `observacionr`,`a`.`usrs_involucrados` AS `usrs_involucrados`,`b`.`name` AS `name`,`b`.`dip` AS `dip`,`b`.`domicilio` AS `domicilio` from (`reclamos` `a` join `users` `b` on((`a`.`user_id` = `b`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_tramas_test`
--

/*!50001 DROP VIEW IF EXISTS `v_tramas_test`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_tramas_test` AS select `a`.`id` AS `id`,date_format(`a`.`recibido_at`,'%Y%m') AS `col_a`,1 AS `col_b`,12975 AS `col_c`,12975 AS `col_d`,(case `a`.`estado_id` when 3 then 3 else 1 end) AS `col_e`,(case `a`.`estado_id` when 3 then `a`.`traslado_codigo` else '12975' end) AS `col_f`,(case `a`.`medio_recepcion_id` when ((0 <> 1) or (0 <> 3)) then `a`.`medio_recepcion_id` else 2 end) AS `col_g`,concat('12975-',`a`.`hoja_nro`) AS `col_h`,(case when (`b`.`dip_tp` = 'DNI') then 1 when (`b`.`dip_tp` = 'CDE') then 2 when (`b`.`dip_tp` = 'PASAPORTE') then 3 when (`b`.`dip_tp` = 'DIE') then 4 when (`b`.`dip_tp` = 'CUI') then 5 when (`b`.`dip_tp` = 'CNV') then 6 when (`b`.`dip_tp` = 'PTP') then 10 when (`b`.`dip_tp` = 'RUC') then 11 else 12 end) AS `col_i`,`b`.`dip` AS `col_j`,(case when (`b`.`dip_tp` = 'RUC') then `b`.`name` end) AS `col_k`,(case when (`b`.`dip_tp` <> 'RUC') then `b`.`name` end) AS `col_l`,(case when (`c`.`dip_tp` = 'DNI') then 1 when (`c`.`dip_tp` = 'CDE') then 2 when (`c`.`dip_tp` = 'PASAPORTE') then 3 when (`c`.`dip_tp` = 'DIE') then 4 when (`c`.`dip_tp` = 'CUI') then 5 when (`c`.`dip_tp` = 'CNV') then 6 when (`c`.`dip_tp` = 'PTP') then 10 when (`c`.`dip_tp` = 'RUC') then 11 when (`c`.`dip_tp` = 'OTROS') then 12 else NULL end) AS `col_o`,`c`.`dip` AS `col_p`,(case when (`c`.`dip_tp` = 'RUC') then `c`.`name` else NULL end) AS `col_q`,(case when (`c`.`dip_tp` <> 'RUC') then `c`.`name` else NULL end) AS `col_r`,(case when `a`.`send_mail` then 'Si' else 'No' end) AS `col_u`,(case when `a`.`send_mail` then `b`.`email` else NULL end) AS `col_v`,`b`.`domicilio` AS `col_w`,`b`.`telefono` AS `col_x`,`a`.`medio_recepcion_id` AS `col_y`,date_format(`a`.`recibido_at`,'%Y%m%d') AS `col_z`,`a`.`descripcion` AS `col_aa`,(case when (`a`.`origen_id` = 18) then 1 when (`a`.`origen_id` = 12) then 2 when (`a`.`origen_id` = 13) then 3 when (`a`.`origen_id` = 21) then 4 when (`a`.`origen_id` = 0) then 5 when (`a`.`origen_id` = 24) then 6 when (`a`.`origen_id` = 14) then 7 when (`a`.`origen_id` = 0) then 8 when (`a`.`origen_id` = 25) then 9 when (`a`.`origen_id` = 0) then 10 when (`a`.`origen_id` = 0) then 11 when (`a`.`origen_id` = 0) then 12 when (`a`.`origen_id` = 0) then 13 else NULL end) AS `col_ab` from ((`reclamos` `a` join `users` `b` on((`a`.`user_id` = `b`.`id`))) left join `users` `c` on((`a`.`user2_id` = `c`.`id`))) where (`a`.`delete_at` is null) order by `a`.`recibido_at` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-19 12:56:43
