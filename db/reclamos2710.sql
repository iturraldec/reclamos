-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para reclamos
CREATE DATABASE IF NOT EXISTS `emusape_libro` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `emusape_libro`;

-- Volcando estructura para tabla reclamos.causas
CREATE TABLE IF NOT EXISTS `causas` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `derecho_id` smallint(5) unsigned DEFAULT NULL,
  `codigo` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `definicion` text COLLATE utf8_spanish_ci NOT NULL,
  `defini` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `causas_nombre_unique` (`nombre`),
  KEY `derecho_id` (`derecho_id`),
  CONSTRAINT `causas_ibfk_1` FOREIGN KEY (`derecho_id`) REFERENCES `derechos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.causas: ~34 rows (aproximadamente)
/*!40000 ALTER TABLE `causas` DISABLE KEYS */;
INSERT INTO `causas` (`id`, `derecho_id`, `codigo`, `nombre`, `definicion`, `defini`) VALUES
	(1, 1, '1101', 'Emitir recetas farmacologicas sin la denominación genérica internacional, datos erroneos, o incompleta.', 'Se considera aquellos reclamos relacionados a la entrega de recetas emitidas por el profesional de salud, sin consignar el nombre genérico del medicamento, con letra ilegible, incompleta, entre otras.', 'Receta con medicamentos de marca y/o incompleta y/o ilegible.'),
	(2, 1, '1103', 'Direccionar  al usuario a comprar medicamentos o dispositivos médicos fuera del establecimiento de salud.', 'Inducir al usuario a comprar determinados medicamentos o dispositivos médicos fuera de la IPRESS a pesar de estar cubiertos a contar con stock en el establecimiento.', 'Me dicen que compre afuera.'),
	(3, 1, '1104', 'Direccionar ai usuario a realizarse procedimientos médicos a quirurgicos fuera del establecimiento de salud.', 'Inducir al usuario a realizarse procedimientos médicos o quirúrgicos fuera del establecimiento, pese a estar cubiertos o disponibles en la IPRESS.', 'Me dijeron que me realice el procedimiento afuera.'),
	(7, 1, '1102', 'Dispensar medicamentos y/o dispositivos médicos de manera insatisfactoria.', 'Se consideran aquellos reclamos relacionados a:\n•	Error en el tipo de productos entregados.\n•	Error en la cantidad de productos entregados.\n•	Entrega de productos vencidos, contaminados a deteriorados.\n•	Entrega de productos falsificados y/o sin registro sanitario, entre otros\n•	Negar o entregar en forma incompleta al usuario la provisión de medicamentos a dispositivos médicos', '•	No estoy satisfecho con	los\nmedicamentos entregados.\n•	No me entregaron los medicamentos.\n•	Me entregaron de forma incompleta mis medicamentos'),
	(8, 1, '1105', 'Negar o condicionar al usuario a realizarse procedimientos de apoyo al diagnóstico.', 'Negar al usuario a realizarse procedimientos de apoyo al diagnóstico.', 'No quieren realizarme el procedimiento médico.'),
	(9, 1, '1106', 'Demorar en el otorgamiento de citas o en la atencion para consulta externa.', 'Se consideran las insatisfacciones generadas por:\n•	Falta de citas.\n•	Disponibilidad de citas para atencion en consulta externa en un plazo alejado.\n•	Tiempo de espera para la atencion que excede al tiempo establecido par la institución', '•No hay citas para la especialidad\n•No puedo conseguir cita para Consulta Externa en fecha próxima.\n •Demoran en atenderme.'),
	(10, 1, '1107', 'Demora para la Hospitalización.', 'No pase a Hospitalizacion o programacion Hospitalaria por falta de cupo, incluye UCI.', 'No hay cama disponible'),
	(11, 1, '1108', 'Demorar en el otorgamiento de prestaciones de slaud durante la hospitalización.', 'Demora para el otorgamiento de prestaciones o realizacion de procedimientos en el area de hospitalizacion. Se considera cuando:\n•Demora en la visita médica.\n•Demora en la aplicación de medicación.\n•Demora en el cambio de ropa de cama.\n•Demora en el aseo del usuario.\n•Demora en la realización de procedimientos en hospitalización: Curación de heridas, retiro de puntos, cambio de apósitos, retiro o cambio de sondas, etc.', 'No estoy satisfecho con el servicio dado en Hospitalización.'),
	(12, 1, '1109', 'Demorar en la atención de emergencia de acuerdo a la prioridad.', '"Demora en el otorgamiento de prestaciones o realización de procedimientos en el servicio de emergencia, de acuerdo a la prioridad del caso. Se considera:\n•Demora de atención en triaje.\n•Demora en la atención en tópico de emergencia.\n•Demora para el traslado del usuario a observación de emergencia.\n•Demora en la atención en el área de observación.\n•Entre otras atenciones.', 'Demora en la atención de emergencia.'),
	(13, 6, '1110', 'Demorar en la atención de paciente obstétrica.', 'Demora en el otorgamiento de prestaciones a paciente obstétrica. Se considera:\n•Demora de atención en triaje.\n•Demora en la atención en tópico.\n•Demora en la atención en el área de observación, sala de dilatación o sala de parto.\n•Demora en la realización de cesárea indicada por el médico tratante.\n•Otros tipos de demora.', 'Demora en la atención de emergencia a paciente obstétrica.'),
	(14, 1, '1111', 'Demorar en el otorgamiento o reprogramación de cupo para procedimiento quirúrgico.', 'Demora, en un plazo alejado, en el otorgamiento o reprogramación de un cupo para realización de procedimiento quirúrgico.', 'Demora en programarme cirugía.'),
	(15, 1, '1112', 'Negar la atención en situaciones de emergencia.', 'Negar la atención en situaciones de emergencia y/o partos, (Incluye servicios que se prestan en emergencia según nivel de categorización, medicamentos y/o dispositivos médicos) o condicionar la atención a la presentación de documento de identidad, firma de pagarés, etc.', 'Negar la atención de Emergencia.'),
	(16, 1, '1113', 'Encontrar IPRESS y/o unidades prestadoras de servicios de salud cerradas en horario de atención o no presencia del personal responsable de la atención.', 'Falta de disponibilidad de servicios o prestaciones, según disposiciones ofertadas (dias y horarios) por parte de la IPRESS. Se incluyen la falta o ausencia de personal de salud programado en todos los servicios que retrasa o impide la atención oportuna del usuario.', 'IPRESS cerrada o ausencia del personal de salud responsable de la atención.'),
	(17, 1, '1114', 'No acceso a la historia clínica.', 'Se consideran aquellos reclamos relacionados a no brindar atención al usuario por no encontrarse disponible la historia clínica, sea por extravío o por omisión, por desconocimiento del código de la HC personal o familiar.', 'No acceso a la historia clínica.'),
	(18, 1, '1115', 'Reclamos relacionados a la infraestructura de la institución.', 'Reclamos relacionados al estado y conservación de las instalaciones de la institución. Se incluyen:\n•Aseo del establecimiento.\n•Mantenimiento de puertas, ventanas, pisos, paredes o techos.\n•Mantenimiento de equipamiento no biomédico (sillas, mesas, o similares, de uso en la IPRESS).\n•Otras similares o definidas en norma expresa.', '•Deficiente.\n•Infraestructura.\n•Falta de Aseo.\n•Falta de mantenimiento.'),
	(19, 1, '1116', 'No cumplir o no acceder a hacer el procedimiento de referencia o contrareferencia del usuario.', 'Incumplimiento de la normativa vigente sobre referencia o contra referencia de los usuarios, a fin de dar continuidad de la atención de salud, lo que incluye negativa o demora en las gestiones.', '•Referencia y contra referencia.\n•Demora.\n•Negativa.\n•Error.'),
	(20, 1, '1117', 'Demorar en la toma o entrega de resultados de exámenes de apoyo al diagnóstico.', 'Retraso en la toma o entrega de resultados de exámenes de apoyo al diagnóstico, en cualquiera de los servicios (consulta externa, hospitalización, UCI, etc.), por cualquier causa. Incluye exámenes de laboratorio, anatomía patológica, rayos X, ecografía, tomografía, mamografía, densitometría ósea, resonancia magnética, entre otros.', 'Demora en la toma o entrega de resultado'),
	(21, 1, '1118', 'Cobrar indebidamente.', 'Reclamos relacionados a cobros no acordados, adicionales o diferentes a los pactados inicialmente entre la IPRESS y el usuario.', 'Me cobraron o hicieron pagar dinero que no corresponde.'),
	(22, 1, '1119', 'No cuentan con ventanilla preferencial.', 'No implementación de ventanilla para la atención preferencial del adulto mayor, gestantes y personas con discapacidad.', 'No cuentan con ventanilla preferencial.'),
	(23, 1, '1120', 'Incumplimiento en la programación de citas.', '•Acudir a una cita médica que ha sido reprogramada para otra fecha sin comunicación previa al paciente.\n•Acudir a una cita médica y el profesional de la salud no acudió a laborar.\n•Otros motivos ajenos al paciente, que impiden el otorgamiento de la cita en fecha programada.', 'Reprogramación de cita sin comunicación previa al paciente.'),
	(24, 1, '1121', 'Incumplimiento en la programación de intervenciones quirúrgicas.', 'Reprogramación de la fecha de intervención quirúrgica por motivos ajenos al paciente.', 'Reprogramación de intervención quirúrgica.'),
	(25, 3, '1201', 'No brindar información de los procesos administrativos de la IPRESS.', 'Falta o entrega insatisfactoria de información sobre:\n•Normas, reglamentos o condiciones administrativas vinculadas a la atención.\n•Gastos cubiertos en la prestación de salud así como las condiciones del Plan de Atención en Salud, cuando el usuario o personal administrativo lo solicite.\n•Entre otros.', 'No me dieron información clara sobre:\n•Asuntos administrativos.\n•Tratamiento.\n•Gastos no cubiertos.\n•El médico tratante.\n•Mis derechos.'),
	(26, 3, '1203', 'No recibir de su médico y/o personal de salud tratante, información comprensible sobre su estado de salud o tratamiento.', 'Se considera aquellos reclamos en que el profesional de salud informa de manera insatisfactoria o se rehúsa a brindar información al usuario acerca del estado de salud y/o del tratamiento que viene recibiendo.', '•Personal Médico\n•Información insatisfactoria.\n•Información no clara.\n•No brinda información.'),
	(27, 4, '1302', 'No recibir de su médico y/o personal de salud trato amable y respetuoso.', 'Se considera a aquellos reclamos en que el profesional de salud brinda un trato contra la moral, buenas costumbres y/o dignidad de la persona.', 'No recibí un trato amable.'),
	(28, 4, '1303', 'No recibir del personal administrativo trato amable y respetuoso.', 'Se considera a aquellos reclamos en que el personal administrativo brinda un trato contra la moral, buenas costumbres y/o dignidad de la persona', 'No recibí un trato amable.'),
	(29, 4, '1304', 'No brindar el procedimiento médico o quirúrgico adecuado.', 'Realizar procedimientos médicos o quirúrgicos de manera errónea, no acorde a protocolos y guías.', 'Mala atención médica.'),
	(30, 4, '1305', 'No brindar un trato acorde a la cultura, condición y género del usuario.', 'No ser atendido con respeto, no acorde a sus modos de vida, conocimientos y costumbres propios de su lugar de origen, o con la identidad de género, ni respetar condición de discapacidad o atención preferente durante la prestación de salud.', 'Trato discriminatorio.'),
	(31, 4, '1306', 'Presunto error en los resultados de exámenes de apoyo al diagnóstico.', 'Presunción de error en los resultados de exámenes de apoyo al diagnóstico por cualquier causa. Se incluyen todos los exámenes auxiliares.', 'No estoy satisfecho con mis resultados.'),
	(32, 4, '1307', 'No brindar atención con pleno respeto a su privacidad, con presencia de terceros no autorizados por el usuario.', 'Se consideran aquellos reclamos donde la IPRESS vulnera o expone al usuario, considerando la presencia de terceros durante su atención y sin su consentimiento.', 'Privacidad de la atención.'),
	(33, 4, '1309', 'Retener al usuario de alta o al cadáver por motivo de deuda, previo acuerdo de pagos o trámites administrativos.', 'Se consideran aquellos reclamos relacionados a la demora en el proceso de alta o entrega de cadáver debido a trámites administrativos o económicos.', 'Demora en el alta del paciente y la retención del cadáver.'),
	(34, 4, '1310', 'No brindar atención con respeto a la dignidad del usuario.', 'Se consideraran aquellos reclamos relacionados a actos impropios de naturaleza sexual.', 'Trato impropio.'),
	(35, 2, '1401', 'No solicitar al usuario o su representante legal el consentimiento informado por escrito de acuerdo a los requerimientos de la normatividad vigente.', 'No cumplir con recabar del usuario el consentimiento informado de acuerdo a lo dispuesto por la norma vigente. Se considera obligatorio recabar el consentimiento informado en los siguientes casos:\n•Procedimientos riesgosos o procedimientos quirúrgicos que pongan en riesgo la salud del usuario.\n•Exploración, tratamiento o exhibición de imágenes con fines docentes.\n•Para la inclusión en ensayos de investigación clínica.\n•Para negarse a recibir o continuar tratamiento.\n•Para recibir cuidados paliativos.\n•Entre otros.', 'No me explicaron sobre el procedimiento que me iban a realizar ni pidieron mi autorización.'),
	(36, 5, '1501', 'Negar o demorar en brindar al usuario el acceso a su historia clínica y a otros registros clínicos solicitados y no garantizar su carácter reservado.', 'Se consideran aquellos reclamos donde la IPRESS no permite o demora al usuario en acceder a su historia clínica u otros registros clínicos como la constancia de discapacidad y otros documentos relacionados a su atención, así como resguardar la privacidad de la información.', 'Acceso a la HC y los otros registros clínicos.'),
	(37, 5, '1502', 'No realizar la gestión del reclamo de forma oportuna y adecuada.', 'Se consideran aquellos reclamos donde la IPRESS:\n•No brinda información al usuario sobre la gestión del reclamo en el plazo establecido según normativa.\n•No traslada oportunamente el reclamo a la instancia con competencia.\n•No tramita el reclamo dentro de los plazos establecidos.\n•Demora o negativa en brindar el libro de reclamaciones.\n•Entre otros.', 'Gestión del Reclamo:\n•No me dan información.\n•Obstaculizar.\n•Demora en el plazo establecido.'),
	(38, 5, '1504', 'No contar con plataforma de atención al usuario en salud de acuerdo a la normatividad vigente.', 'No contar con una plataforma de atención al usuario en salud para la atención de consultas y reclamos de acuerdo a la normatividad vigente.', 'No tiene PAUS'),
	(39, 6, '2001', 'Otros relativos a la atención de salud en las IPRESS.', 'Otro reclamos referido a la atención en la IPRESS o UGIPRESS.', 'Otros reclamo no identificado.');
/*!40000 ALTER TABLE `causas` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.conclusiones_anticipadas
CREATE TABLE IF NOT EXISTS `conclusiones_anticipadas` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.conclusiones_anticipadas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `conclusiones_anticipadas` DISABLE KEYS */;
INSERT INTO `conclusiones_anticipadas` (`id`, `nombre`) VALUES
	(3, 'CONCILIACIÓN'),
	(1, 'DESISTIMIENTO POR ESCRITO'),
	(5, 'LAUDO ARBITRAL'),
	(4, 'TRANSACCIÓN EXTRAJUDICIAL'),
	(2, 'TRATO DIRECTO');
/*!40000 ALTER TABLE `conclusiones_anticipadas` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.derechos
CREATE TABLE IF NOT EXISTS `derechos` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `derechos_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.derechos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `derechos` DISABLE KEYS */;
INSERT INTO `derechos` (`id`, `nombre`) VALUES
	(3, 'Acceso a la Información'),
	(1, 'Acceso a los Servicios de Salud'),
	(4, 'Atención y Recuperación de la Salud'),
	(2, 'Consentimiento Informado'),
	(6, 'Otros'),
	(5, 'Protección de Derechos');
/*!40000 ALTER TABLE `derechos` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.envios_resultados
CREATE TABLE IF NOT EXISTS `envios_resultados` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.envios_resultados: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `envios_resultados` DISABLE KEYS */;
INSERT INTO `envios_resultados` (`id`, `nombre`) VALUES
	(2, 'CORREO ELECTRÓNICO'),
	(1, 'DOMICILIO CONSIGNADO EN EL LIBRO DE RECLAMACIONES EN SALUD'),
	(3, 'OTRA DIRECCIÓN PROPORCIONADA POR EL USUARIO O TERCERO LEGITIMADO A EFECTOS DE SER NOTIFICADO');
/*!40000 ALTER TABLE `envios_resultados` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.estados: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` (`id`, `nombre`) VALUES
	(8, 'ACUMULADO'),
	(4, 'ARCHIVADO POR DUPLICIDAD'),
	(9, 'CONCLUIDO'),
	(2, 'EN TRAMITE'),
	(10, 'REGISTRADO'),
	(1, 'RESUELTO'),
	(3, 'TRASLADADO');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.etapas
CREATE TABLE IF NOT EXISTS `etapas` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.etapas: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `etapas` DISABLE KEYS */;
INSERT INTO `etapas` (`id`, `nombre`) VALUES
	(1, 'Admisión y Registro'),
	(4, 'Archivo y Custodia del Expediente'),
	(2, 'Evaluación e Investigación'),
	(3, 'Resultado y Notificación');
/*!40000 ALTER TABLE `etapas` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `connection` text COLLATE utf8_spanish_ci NOT NULL,
  `queue` text COLLATE utf8_spanish_ci NOT NULL,
  `payload` longtext COLLATE utf8_spanish_ci NOT NULL,
  `exception` longtext COLLATE utf8_spanish_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.iafas
CREATE TABLE IF NOT EXISTS `iafas` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.iafas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `iafas` DISABLE KEYS */;
INSERT INTO `iafas` (`id`, `nombre`) VALUES
	(9, 'Convenio IPAZA'),
	(8, 'Convenio Universidad Agraria'),
	(10, 'Convenio VEGAZA'),
	(6, 'Mapfre EPS'),
	(7, 'Mapfre Seguros y Reaseguros'),
	(1, 'Pacifico EPS'),
	(2, 'Pacifico Seguros'),
	(11, 'Petróleos del Peru'),
	(12, 'Protecta'),
	(3, 'Rimac EPS'),
	(4, 'Rimac Seguros y Reaseguros'),
	(5, 'Sanitas del Peru');
/*!40000 ALTER TABLE `iafas` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.medios_recepcion
CREATE TABLE IF NOT EXISTS `medios_recepcion` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `medio` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `medio` (`medio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.medios_recepcion: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `medios_recepcion` DISABLE KEYS */;
INSERT INTO `medios_recepcion` (`id`, `medio`) VALUES
	(5, 'Documento escrito'),
	(2, 'Libro de Reclamaciones Físico'),
	(1, 'Libro de Reclamaciones Virtual'),
	(3, 'Llamada telefónica'),
	(7, 'Reclamo coparticipado con otra administrada'),
	(4, 'Reclamo presencial'),
	(6, 'Reclamo trasladado de otra administrada');
/*!40000 ALTER TABLE `medios_recepcion` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.migrations: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_06_17_231027_create_estados_table', 1),
	(5, '2021_06_17_231716_create_tipos_table', 1),
	(6, '2021_06_17_232201_create_causas_table', 1),
	(7, '2021_06_18_003254_create_origenes_table', 1),
	(8, '2021_06_18_003333_create_reclamos_table', 1),
	(9, '2021_07_13_155110_create_table_derechos', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.origenes
CREATE TABLE IF NOT EXISTS `origenes` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `padre_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.origenes: ~37 rows (aproximadamente)
/*!40000 ALTER TABLE `origenes` DISABLE KEYS */;
INSERT INTO `origenes` (`id`, `nombre`, `padre_id`) VALUES
	(1, 'Administrativa', NULL),
	(2, 'Asistencial', NULL),
	(3, 'Atención al usuario', NULL),
	(4, 'Contabilidad', 1),
	(5, 'RR.HH', 1),
	(6, 'Finanzas', 1),
	(7, 'Logística', 1),
	(8, 'Facturación', 1),
	(9, 'Calidad', 1),
	(10, 'Auditoría', 1),
	(11, 'Limpieza y Mantenimiento', 1),
	(12, 'Hospitalización', 2),
	(13, 'Emergencia', 2),
	(14, 'Farmacia', 2),
	(15, 'Rayos x', 2),
	(16, 'Ecografía', 2),
	(17, 'Densitometría', 2),
	(18, 'Consultorio Externo', 2),
	(19, 'Laboratorio', 2),
	(20, 'Nutrición', 2),
	(21, 'Centro Quirúgico', 2),
	(22, 'Sala Procedimientos', 2),
	(23, 'Sala de Recuperación', 2),
	(24, 'Unidad Cuidados Intensivos', 2),
	(25, 'Admisión Ambulatorio', 3),
	(26, 'Admisión Emergencia', 3),
	(27, 'Admisión Odontología', 3),
	(28, 'Central Telefónica', 3),
	(29, 'Sanidad', 3),
	(30, 'Plataforma de Atención al usuario', 3),
	(31, 'Óptica', 3),
	(32, 'Admisión Laboratorio', 3),
	(33, 'Admisión Resocentro', 3),
	(34, 'Presupuestos', 3),
	(35, 'Mesa de partes', 3),
	(44, 'demo-area2', NULL),
	(49, 'origen2.2.', 44);
/*!40000 ALTER TABLE `origenes` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.reclamos
CREATE TABLE IF NOT EXISTS `reclamos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` smallint(5) unsigned DEFAULT NULL,
  `causa_id` smallint(5) unsigned DEFAULT NULL,
  `origen_id` smallint(5) unsigned DEFAULT NULL,
  `estado_id` smallint(5) unsigned DEFAULT '10',
  `traslado_id` tinyint(3) unsigned DEFAULT NULL,
  `traslado_codigo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user2_id` int(10) unsigned DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `analisis` text COLLATE utf8_spanish_ci,
  `medidas_adoptadas` text COLLATE utf8_spanish_ci,
  `conclusion` text COLLATE utf8_spanish_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `suceso_at` date DEFAULT NULL,
  `send_mail` tinyint(1) NOT NULL DEFAULT '1',
  `resuelto_at` date DEFAULT NULL,
  `dias_max_resp` tinyint(3) unsigned NOT NULL DEFAULT '30',
  `medio_recepcion_id` tinyint(3) unsigned DEFAULT NULL,
  `hoja_nro` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `administrado_tp` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'IPRESS',
  `codigo_renipress` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT '00012975',
  `recibido_at` date DEFAULT NULL,
  `paciente_tp` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `iafas_id` tinyint(3) unsigned DEFAULT NULL,
  `etapa_id` tinyint(3) unsigned DEFAULT NULL,
  `resultado_id` tinyint(3) unsigned DEFAULT NULL,
  `notificacion_id` tinyint(3) unsigned DEFAULT NULL,
  `notificacion_at` date DEFAULT NULL,
  `conclusiona_id` tinyint(3) unsigned DEFAULT NULL COMMENT 'Conclusion anticipada',
  `delete_at` datetime DEFAULT NULL,
  `ma_estado` enum('ACTIVO','CULMINADO') COLLATE utf8_spanish_ci DEFAULT 'ACTIVO',
  `ma_inicio` date DEFAULT NULL,
  `ma_fin` date DEFAULT NULL,
  `ma_tipo` smallint(5) unsigned DEFAULT NULL,
  `ma_proceso` smallint(5) unsigned DEFAULT NULL,
  `ma_proceso2` smallint(5) unsigned DEFAULT NULL,
  `ma_procesoo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observacionr` text COLLATE utf8_spanish_ci,
  `usrs_involucrados` text COLLATE utf8_spanish_ci,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.reclamos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `reclamos` DISABLE KEYS */;
INSERT INTO `reclamos` (`id`, `tipo_id`, `causa_id`, `origen_id`, `estado_id`, `traslado_id`, `traslado_codigo`, `user_id`, `user2_id`, `descripcion`, `analisis`, `medidas_adoptadas`, `conclusion`, `created_at`, `updated_at`, `suceso_at`, `send_mail`, `resuelto_at`, `dias_max_resp`, `medio_recepcion_id`, `hoja_nro`, `administrado_tp`, `codigo_renipress`, `recibido_at`, `paciente_tp`, `iafas_id`, `etapa_id`, `resultado_id`, `notificacion_id`, `notificacion_at`, `conclusiona_id`, `delete_at`, `ma_estado`, `ma_inicio`, `ma_fin`, `ma_tipo`, `ma_proceso`, `ma_proceso2`, `ma_procesoo`, `observacionr`, `usrs_involucrados`) VALUES
	(1, NULL, 9, NULL, 10, NULL, NULL, 32, NULL, 'subiendo reclamo 14/09/2022', 'huhuhuhu', NULL, 'kokokok', '2022-09-14 18:05:03', '2022-09-14 23:05:03', '2022-09-14', 1, NULL, 30, 1, '0000000001', 'IPRESS', '00012975', '2022-11-14', 'ASEGURADO', 8, NULL, 6, NULL, NULL, 3, NULL, 'CULMINADO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 1, 3, 25, 3, 3, '20001', 33, NULL, 'ta  te ti to tu', 'se verifica emn e sistemas mndnnnnnn', 'se .......', 'dewddwed', '2022-10-11 05:41:12', '2022-10-11 10:41:12', '2022-10-11', 1, NULL, 30, 2, '987', 'IPRESS', '00012975', '2022-10-11', 'ASEGURADO', 3, 1, 2, 2, '2022-10-11', 1, NULL, 'ACTIVO', '2022-12-23', '2022-10-28', 2, 1, 6, NULL, 'sssssssss', 'CELIA\nMAGALY\nGILDA');
/*!40000 ALTER TABLE `reclamos` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.reclamo_docs
CREATE TABLE IF NOT EXISTS `reclamo_docs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reclamo_id` int(10) unsigned NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_cliente` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='documentos de los reclamos';

-- Volcando datos para la tabla reclamos.reclamo_docs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reclamo_docs` DISABLE KEYS */;
INSERT INTO `reclamo_docs` (`id`, `reclamo_id`, `nombre`, `nombre_cliente`, `created_at`, `updated_at`, `usuario`) VALUES
	(1, 2, '634543c53de83.pdf', '20210928 CLINICA ESPECIALIDADES MEDICAS.pdf', '2022-10-11 10:21:57', '2022-10-11 10:21:57', 'administrador');
/*!40000 ALTER TABLE `reclamo_docs` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.resultados
CREATE TABLE IF NOT EXISTS `resultados` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.resultados: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `resultados` DISABLE KEYS */;
INSERT INTO `resultados` (`id`, `nombre`) VALUES
	(6, 'CONCLUIDO ANTICIPADAMENTE'),
	(2, 'FUNDADO'),
	(3, 'FUNDADO PARCIAL'),
	(5, 'IMPROCEDENTE'),
	(4, 'INFUNDADO'),
	(1, 'PENDIENTE');
/*!40000 ALTER TABLE `resultados` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.tipos
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.tipos: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `tipos` DISABLE KEYS */;
INSERT INTO `tipos` (`id`, `nombre`) VALUES
	(9, 'Atención a domicilio, consulta ambulatoria'),
	(10, 'Atención a domicilio, urgencia o emergencia'),
	(5, 'Centro Obstétrico'),
	(4, 'Centro Quirúrgico'),
	(1, 'Consulta Externa'),
	(3, 'Emergencia'),
	(7, 'Farmacia'),
	(2, 'Hospitalización'),
	(12, 'Infraestructura'),
	(11, 'Oficinas o áreas administrativas de IAFAS o IPRESS o UGIPRESS'),
	(13, 'Referencia y Contrareferencia'),
	(8, 'Servicios Médicos de Apoyo'),
	(6, 'UCI o UCIN');
/*!40000 ALTER TABLE `tipos` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.traslados
CREATE TABLE IF NOT EXISTS `traslados` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.traslados: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `traslados` DISABLE KEYS */;
INSERT INTO `traslados` (`id`, `nombre`) VALUES
	(3, 'IAFAS'),
	(1, 'IPRESS'),
	(4, 'RENIPRESS'),
	(5, 'RIAFAS'),
	(2, 'UGIPRESS');
/*!40000 ALTER TABLE `traslados` ENABLE KEYS */;

-- Volcando estructura para tabla reclamos.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` enum('Admin','Guest') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `dip_tp` enum('DNI','RUC','PASAPORTE','CDE','DIE','CUI','CNV','PTP','OTROS') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `domicilio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `codigo_historia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `codido_historia` (`codigo_historia`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla reclamos.users: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `rol`, `dip_tp`, `dip`, `password`, `name`, `domicilio`, `email`, `email_verified_at`, `telefono`, `created_at`, `updated_at`, `codigo_historia`) VALUES
	(1, 'Admin', 'DNI', '1', '$2y$10$o9f8IqaUyujkpc0IomM.buw2d913aabwBDrwjN824Us8Ct3VLHto2', 'Admin', 'Peru', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL),
	(16, 'Guest', NULL, 'NULL', '$2y$10$o9f8IqaUyujkpc0IomM.buw2d913aabwBDrwjN824Us8Ct3VLHto2', 'carlos', '123456789', 'itu@gmail.com', NULL, NULL, '2021-10-29 14:45:08', '2021-10-29 14:45:08', NULL),
	(27, 'Guest', 'DNI', '47690143', '$2y$10$o9f8IqaUyujkpc0IomM.buw2d913aabwBDrwjN824Us8Ct3VLHto2', 'GONZALES GONZALES, JUNIOR CHRISTIAN', '123456789', 'christiangonzalescio@gmail.com', NULL, '950165669', '2022-08-05 17:58:10', '2022-08-05 17:58:10', NULL),
	(31, 'Admin', 'DNI', '47690143', '$2y$10$8ipMCfp8nKPbkiWXI74.FO3LyictNkzs1zQTLih6gnfdbOLxEJHyS', 'administrador', 'Clinica2022', 'christian.gonzales@especialidadesmedicas.org', NULL, NULL, '2022-08-16 19:30:39', '2022-08-16 19:30:39', NULL),
	(32, 'Guest', 'DNI', '16567386', '048068080db76a9b3ac0d94feb3eae05', 'SANTA CRUZ CORDOVA, MAGALY YSABEL', 'San borja', 'reclamos@especialidadesmedicas.org', NULL, '123456789', '2022-09-14 22:51:21', '2022-09-14 23:05:03', '4478'),
	(33, 'Guest', 'DNI', '29324910', 'c5cc7fd4f883a9a13aed1a4fe53ca84b', 'LAZARTE GAMERO, ROXANA MARGARITA EVITA', 'SAN BORJA', 'rox@gmail.com', NULL, '123456789', '2022-10-11 10:21:56', '2022-10-11 10:41:12', '59595');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para vista reclamos.v_adoptadas_test
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_adoptadas_test` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`col_g` DECIMAL(3,0) NULL,
	`col_h` VARCHAR(16) NULL COLLATE 'utf8_spanish_ci',
	`col_mad` TEXT NULL COLLATE 'utf8_spanish_ci',
	`col_med` SMALLINT(5) UNSIGNED NULL,
	`col_pro` SMALLINT(5) UNSIGNED NULL,
	`col_main` VARCHAR(8) NULL COLLATE 'utf8mb4_general_ci',
	`col_mafi` VARCHAR(8) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista reclamos.v_count_causas
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_count_causas` (
	`cantidad` BIGINT(21) NOT NULL,
	`codigo` VARCHAR(18) NOT NULL COLLATE 'utf8_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista reclamos.v_count_estados
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_count_estados` (
	`cantidad` BIGINT(21) NOT NULL,
	`nombre` VARCHAR(255) NOT NULL COLLATE 'utf8_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista reclamos.v_count_origenes
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_count_origenes` (
	`cantidad` BIGINT(21) NOT NULL,
	`nombre` VARCHAR(255) NOT NULL COLLATE 'utf8_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista reclamos.v_count_tipos
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_count_tipos` (
	`cantidad` BIGINT(21) NOT NULL,
	`nombre` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista reclamos.v_desistimiento
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_desistimiento` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`tipo_id` SMALLINT(5) UNSIGNED NULL,
	`causa_id` SMALLINT(5) UNSIGNED NULL,
	`origen_id` SMALLINT(5) UNSIGNED NULL,
	`estado_id` SMALLINT(5) UNSIGNED NULL,
	`traslado_id` TINYINT(3) UNSIGNED NULL,
	`traslado_codigo` VARCHAR(10) NULL COLLATE 'utf8_spanish_ci',
	`user_id` INT(10) UNSIGNED NOT NULL,
	`user2_id` INT(10) UNSIGNED NULL,
	`descripcion` TEXT NOT NULL COLLATE 'utf8_spanish_ci',
	`analisis` TEXT NULL COLLATE 'utf8_spanish_ci',
	`medidas_adoptadas` TEXT NULL COLLATE 'utf8_spanish_ci',
	`conclusion` TEXT NULL COLLATE 'utf8_spanish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL,
	`suceso_at` DATE NULL,
	`send_mail` TINYINT(1) NOT NULL,
	`resuelto_at` DATE NULL,
	`dias_max_resp` TINYINT(3) UNSIGNED NOT NULL,
	`medio_recepcion_id` TINYINT(3) UNSIGNED NULL,
	`hoja_nro` VARCHAR(10) NULL COLLATE 'utf8_spanish_ci',
	`administrado_tp` VARCHAR(20) NOT NULL COLLATE 'utf8_spanish_ci',
	`codigo_renipress` VARCHAR(10) NOT NULL COLLATE 'utf8_spanish_ci',
	`recibido_at` DATE NULL,
	`paciente_tp` VARCHAR(20) NULL COLLATE 'utf8_spanish_ci',
	`iafas_id` TINYINT(3) UNSIGNED NULL,
	`etapa_id` TINYINT(3) UNSIGNED NULL,
	`resultado_id` TINYINT(3) UNSIGNED NULL,
	`notificacion_id` TINYINT(3) UNSIGNED NULL,
	`notificacion_at` DATE NULL,
	`conclusiona_id` TINYINT(3) UNSIGNED NULL COMMENT 'Conclusion anticipada',
	`delete_at` DATETIME NULL,
	`ma_estado` ENUM('ACTIVO','CULMINADO') NULL COLLATE 'utf8_spanish_ci',
	`ma_inicio` DATE NULL,
	`ma_fin` DATE NULL,
	`ma_tipo` SMALLINT(5) UNSIGNED NULL,
	`ma_proceso` SMALLINT(5) UNSIGNED NULL,
	`ma_proceso2` SMALLINT(5) UNSIGNED NULL,
	`ma_procesoo` VARCHAR(100) NULL COLLATE 'utf8_spanish_ci',
	`observacionr` TEXT NULL COLLATE 'utf8_spanish_ci',
	`usrs_involucrados` TEXT NULL COLLATE 'utf8_spanish_ci',
	`name` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`dip` VARCHAR(20) NULL COLLATE 'utf8mb4_unicode_ci',
	`domicilio` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista reclamos.v_tramas_test
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `v_tramas_test` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`col_a` VARCHAR(6) NULL COLLATE 'utf8mb4_general_ci',
	`col_b` INT(1) NOT NULL,
	`col_c` INT(5) NOT NULL,
	`col_d` INT(5) NOT NULL,
	`col_e` INT(1) NOT NULL,
	`col_f` VARCHAR(10) NULL COLLATE 'utf8_spanish_ci',
	`col_g` DECIMAL(3,0) NULL,
	`col_h` VARCHAR(16) NULL COLLATE 'utf8_spanish_ci',
	`col_i` INT(2) NOT NULL,
	`col_j` VARCHAR(20) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_k` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_l` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_o` INT(2) NULL,
	`col_p` VARCHAR(20) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_q` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_r` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_u` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_general_ci',
	`col_v` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_w` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_x` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`col_y` TINYINT(3) UNSIGNED NULL,
	`col_z` VARCHAR(8) NULL COLLATE 'utf8mb4_general_ci',
	`col_aa` TEXT NOT NULL COLLATE 'utf8_spanish_ci',
	`col_ab` INT(2) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista reclamos.v_adoptadas_test
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_adoptadas_test`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_adoptadas_test` AS SELECT 
  a.id AS id,
  (
  case a.medio_recepcion_id when (1 or 3) then a.medio_recepcion_id else 2 end
  ) AS col_g,
  
  concat('12975-', a.hoja_nro) AS col_h, 
  
  a.medidas_adoptadas AS col_mad,
  a.ma_tipo AS col_med,
  a.ma_proceso AS col_pro,
 date_format(a.ma_inicio, '%Y%m%d') AS col_main, 
  date_format(a.ma_fin, '%Y%m%d') AS col_mafi
FROM 
  (
    (
      reclamos a 
      join users b on(
        (a.user_id = b.id)
      )
    ) 
    left join users c on(
      (a.user2_id = c.id)
    )
  )
WHERE
  a.delete_at IS NULL
ORDER BY 
  a.recibido_at ASC ;

-- Volcando estructura para vista reclamos.v_count_causas
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_count_causas`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_count_causas` AS SELECT count(0) AS `cantidad`, 
ifnull(`b`.`codigo`,'SIN CAUSA DEFINIDA') AS `codigo` 
FROM (`reclamos` `a` 
left join `causas` `b` on(`a`.`causa_id` = `b`.`id`)) GROUP BY `a`.`causa_id` ;

-- Volcando estructura para vista reclamos.v_count_estados
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_count_estados`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_count_estados` AS SELECT count(0) AS `cantidad`, ifnull(`b`.`nombre`,'SIN ESTADO DEFINIDO') AS `nombre` FROM (`reclamos` `a` left join `estados` `b` on(`a`.`estado_id` = `b`.`id`)) GROUP BY `a`.`estado_id` ;

-- Volcando estructura para vista reclamos.v_count_origenes
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_count_origenes`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_count_origenes` AS SELECT count(0) AS `cantidad`, 
ifnull(`b`.`nombre`,'RECLAMOS DE MEDICOS') AS `nombre` 
FROM (`reclamos` `a` left join `origenes` `b` on(`a`.`origen_id` = `b`.`id` and `b`.`padre_id` is null)) GROUP BY `a`.`origen_id` ;

-- Volcando estructura para vista reclamos.v_count_tipos
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_count_tipos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_count_tipos` AS SELECT count(0) AS `cantidad`, ifnull(`b`.`nombre`,
'RECLAMOS') AS `nombre` 
FROM (`reclamos` `a` 
left join `tipos` `b` on(`a`.`tipo_id` = `b`.`id`)) 
GROUP BY `a`.`tipo_id` ORDER BY `b`.`nombre` ASC ;

-- Volcando estructura para vista reclamos.v_desistimiento
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_desistimiento`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_desistimiento` AS SELECT `a`.`id` AS `id`, `a`.`tipo_id` AS `tipo_id`, `a`.`causa_id` AS `causa_id`, `a`.`origen_id` AS `origen_id`, `a`.`estado_id` AS `estado_id`, `a`.`traslado_id` AS `traslado_id`, `a`.`traslado_codigo` AS `traslado_codigo`, `a`.`user_id` AS `user_id`, `a`.`user2_id` AS `user2_id`, `a`.`descripcion` AS `descripcion`, `a`.`analisis` AS `analisis`, `a`.`medidas_adoptadas` AS `medidas_adoptadas`, `a`.`conclusion` AS `conclusion`, `a`.`created_at` AS `created_at`, `a`.`updated_at` AS `updated_at`, `a`.`suceso_at` AS `suceso_at`, `a`.`send_mail` AS `send_mail`, `a`.`resuelto_at` AS `resuelto_at`, `a`.`dias_max_resp` AS `dias_max_resp`, `a`.`medio_recepcion_id` AS `medio_recepcion_id`, `a`.`hoja_nro` AS `hoja_nro`, `a`.`administrado_tp` AS `administrado_tp`, `a`.`codigo_renipress` AS `codigo_renipress`, `a`.`recibido_at` AS `recibido_at`, `a`.`paciente_tp` AS `paciente_tp`, `a`.`iafas_id` AS `iafas_id`, `a`.`etapa_id` AS `etapa_id`, `a`.`resultado_id` AS `resultado_id`, `a`.`notificacion_id` AS `notificacion_id`, `a`.`notificacion_at` AS `notificacion_at`, `a`.`conclusiona_id` AS `conclusiona_id`, `a`.`delete_at` AS `delete_at`, `a`.`ma_estado` AS `ma_estado`, `a`.`ma_inicio` AS `ma_inicio`, `a`.`ma_fin` AS `ma_fin`, `a`.`ma_tipo` AS `ma_tipo`, `a`.`ma_proceso` AS `ma_proceso`, `a`.`ma_proceso2` AS `ma_proceso2`, `a`.`ma_procesoo` AS `ma_procesoo`, `a`.`observacionr` AS `observacionr`, `a`.`usrs_involucrados` AS `usrs_involucrados`, `b`.`name` AS `name`, `b`.`dip` AS `dip`, `b`.`domicilio` AS `domicilio` FROM (`reclamos` `a` join `users` `b` on(`a`.`user_id` = `b`.`id`)) ;

-- Volcando estructura para vista reclamos.v_tramas_test
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `v_tramas_test`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_tramas_test` AS SELECT 
  `a`.`id` AS `id`,
  date_format(`a`.`recibido_at`, '%Y%m') AS `col_a`, 
  1 AS `col_b`, 
  12975 AS `col_c`, 
  12975 AS `col_d`,
  (
    case `a`.`estado_id` when 3 then 3 else 1 end
  ) AS `col_e`, 
  (
    case `a`.`estado_id` when 3 then `a`.`traslado_codigo` else '12975' end
  ) AS `col_f`, 
  (
    case `a`.`medio_recepcion_id` when (
      1 
      or 3
    ) then `a`.`medio_recepcion_id` else 2 end
  ) AS `col_g`, 
  concat('12975-', `a`.`hoja_nro`) AS `col_h`, 
  (
    case when (`b`.`dip_tp` = 'DNI') then 1 when (`b`.`dip_tp` = 'CDE') then 2 when (`b`.`dip_tp` = 'PASAPORTE') then 3 when (`b`.`dip_tp` = 'DIE') then 4 when (`b`.`dip_tp` = 'CUI') then 5 when (`b`.`dip_tp` = 'CNV') then 6 when (`b`.`dip_tp` = 'PTP') then 10 when (`b`.`dip_tp` = 'RUC') then 11 else 12 end
  ) AS `col_i`, 
  `b`.`dip` AS `col_j`, 
  (
    case when (`b`.`dip_tp` = 'RUC') then `b`.`name` end
  ) AS `col_k`, 
  (
    case when (`b`.`dip_tp` <> 'RUC') then `b`.`name` end
  ) AS `col_l`, 
  (
    case when (`c`.`dip_tp` = 'DNI') then 1 when (`c`.`dip_tp` = 'CDE') then 2 when (`c`.`dip_tp` = 'PASAPORTE') then 3 when (`c`.`dip_tp` = 'DIE') then 4 when (`c`.`dip_tp` = 'CUI') then 5 when (`c`.`dip_tp` = 'CNV') then 6 when (`c`.`dip_tp` = 'PTP') then 10 when (`c`.`dip_tp` = 'RUC') then 11 when (`c`.`dip_tp` = 'OTROS') then 12 else NULL end
  ) AS `col_o`, 
  `c`.`dip` AS `col_p`, 
  (
    case when (`c`.`dip_tp` = 'RUC') then `c`.`name` else NULL end
  ) AS `col_q`, 
  (
    case when (`c`.`dip_tp` <> 'RUC') then `c`.`name` else NULL end
  ) AS `col_r`, 
  (
    case when `a`.`send_mail` then 'Si' else 'No' end
  ) AS `col_u`, 
  (
    case when `a`.`send_mail` then `b`.`email` else NULL end
  ) AS `col_v`, 
  `b`.`domicilio` AS `col_w`, 
  `b`.`telefono` AS `col_x`, 
  `a`.`medio_recepcion_id` AS `col_y`, 
  date_format(`a`.`recibido_at`, '%Y%m%d') AS `col_z`, 
  `a`.`descripcion` AS `col_aa`, 
  (
    case when (`a`.`origen_id` = 18) then 1 when (`a`.`origen_id` = 12) then 2 when (`a`.`origen_id` = 13) then 3 when (`a`.`origen_id` = 21) then 4 when (`a`.`origen_id` = 0) then 5 when (`a`.`origen_id` = 24) then 6 when (`a`.`origen_id` = 14) then 7 when (`a`.`origen_id` = 0) then 8 when (`a`.`origen_id` = 25) then 9 when (`a`.`origen_id` = 0) then 10 when (`a`.`origen_id` = 0) then 11 when (`a`.`origen_id` = 0) then 12 when (`a`.`origen_id` = 0) then 13 else NULL end
  ) AS `col_ab`
FROM 
  (
    (
      `reclamos` `a` 
      join `users` `b` on(
        (`a`.`user_id` = `b`.`id`)
      )
    ) 
    left join `users` `c` on(
      (`a`.`user2_id` = `c`.`id`)
    )
  )
WHERE
  `a`.`delete_at` IS NULL
ORDER BY 
  `a`.`recibido_at` ASC ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
