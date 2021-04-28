-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2021 a las 07:28:57
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prensa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguajes`
--

CREATE TABLE `lenguajes` (
  `idLenguaje` int(11) NOT NULL,
  `tituloLenguaje` varchar(120) NOT NULL,
  `textoLenguaje` text NOT NULL,
  `imgLenguaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lenguajes`
--

INSERT INTO `lenguajes` (`idLenguaje`, `tituloLenguaje`, `textoLenguaje`, `imgLenguaje`) VALUES
(1, '¡La versión 7.1 de PHP ya no tiene soporte!', '<p>Desde el pasado 1 de diciembre de 2019 la versión 7.1 ya no tiene soporte y no se sacarán actualizaciones para esta versión. Como curiosidad puedes comprobar <a class="enlace" href=\"https://www.php.net/eol.php\">aquí el fin del soporte de las distintas versiones de PHP.</a></p><br>\r\n<h3>¿Puedo seguir usando esta versión de PHP?</h3><br>\r\n<p>La respuesta corta: ¡No!<br>\r\n\r\nRespuesta algo más larga… No deberías por las siguientes razones:<br>\r\n\r\n- Tus aplicaciones estarán muy expuestas porque es una versión para la que no se publicarán más correcciones para los posibles fallos de seguridad que se encuentren.<br>\r\nTe quedas sin acceso a nuevas mejoras de PHP tanto en rendimiento como en nuevas características.<br>\r\n- No cuesta mucho actualizar de versión de PHP.<br>\r\n- Mola decir que usas la última versión de PHP.</p>', 'img/php.webp'),
(2, 'Disponible Java 16 de Oracle', '<p>Diecisiete mejoras incluye Java 16 (Oracle JDK 16) para la productividad de los desarrolladores, informó Oracle al anunciar la disponibilidad de la herramienta.<br>\r\nAgregó que el lanzamiento de Java 16 es el resultado de un desarrollo en toda la industria que incluye revisión abierta, compilaciones semanales y una amplia colaboración entre ingenieros de Oracle y miembros de la comunidad mundial de desarrolladores de Java a través de la Comunidad OpenJDK y el Proceso de la Comunidad Java.</p>', 'img/java.jpg'),
(3, 'Novedades en C# 6', '<p>Desde hace ya algunos meses, el equipo de desarrollo de C# en Microsoft tiene perfiladas las principales novedades que se incorporarán al lenguaje C# en la próxima edición de Visual Studio. Aunque son muchos los que opinan que la versión 6 es una versión “maldita” para cualquier lenguaje de programación, personalmente nos parece que C# será capaz de superar esa maldición; aunque se nos antoja que tal vez los líderes del equipo de desarrollo del lenguaje habían oído hablar de ella, y por eso se han limitado aquí a añadir características sencillas, que intentan principalmente incorporar “azúcar sintáctico” o limar algunas asperezas menores del lenguaje, lo que permitirá simplificar escenarios de programación habituales sin añadir ningún nuevo bagaje conceptual complejo.</p>', 'img/csharp.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `idnoticia` int(11) NOT NULL,
  `titulonoticia` varchar(120) NOT NULL,
  `textonoticia` text NOT NULL,
  `imgnoticia` varchar(200) NOT NULL,
  `idnota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='El detalle de las noticias';

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `titulonoticia`, `textonoticia`, `imgnoticia`, `idnota`) VALUES
(1, 'Buseros proponen renunciar al subsidio al transporte a cambio de aumentar $0.13 centavos al pasaje', '<p>Las gremiales de buses y microbuses aglutinadas en AEAS y Rutas Unidas llegaron hasta Casa Presidencial para presentar la solicitud de que se les elimine el subsidio al transporte a cambio de aumentar el pasaje a $0.33 centavos, es decir, 13 centavos más.</p><p>Genaro Ramírez, de AEAS, manifesó que han realizado varias peticiones al Gobierno como el cambio de unidades, pero sus peticiones no han tenido eco.</p><p>Los buseros expresaron que con la compensión mensual que les entrega el Gobierno -que es de 200 para microbuses y 400 para los buses- \"no salen\" ni con los gastos de mantenimiento para las unidades.</p><p>\"Ya es hora que el Presidente reoriente un nuevo planteamiento económico diferente para el sector transporte\", expresó Juan Pablo Álvarez, de Rutas Unidas.</p><p>Ramírez recordó que desde el 2012 existe un estudio que establece que la tarifa del pasaje debe ser de $0.83 centavos.</p>', 'img/buseros-renunciarian-al-subsidio.jpg', 1),
(2, 'Obispos salvadoreños dicen que el Papa Francisco ora por canonización de Monseñor Romero', '<p>Los obispos salvadoreños se declararon regocijados por la visita Ad Limina Apostolorum (visita a las tumbas de los Apóstoles) en el Vaticano y su encuentro el papa Francisco, lo que muchos ven como una \"cosa providencial que estemos en Roma (Italia) en estos días\", refiriéndose a la víspera de los 37 años del asesinato del beato Óscar Romero.</p><p>\"Ha sido una emoción estar casi dos horas con el Papa Francisco comentando sobre El Salvador\", monseñor Fabio Colíndres, uno de los obispos que viajó a Roma.</p><p>Monseñor Gregorio Rosa Chávez, también mostró su emoción, por la coincidencia de la visita y aseguró \"que nunca en la vida había pasado algo parecido\", además que destacó que la reunión era sin agenda y parte de ello significaba la discusión del tema monseñor Romero.</p><p>Colíndres aseguró que también hablaron de la realidad que vive el país y que el pontífice los animó  en la fe, para orar por la violencia. Agregó que fue importante y \"feliz discutir el tema de monseñor  Romero\" y aseguró que su Santidad \"también esta orando, unido a nosotros, por una pronta canonización\".</p>', 'img/obispos-el-salvador-en-vaticano.jpg', 2),
(3, 'Un Brasil espectacular asegura su clasificación al Mundial, mientras Argentina cae a la zona de repechaje', '<p>Si las eliminatorias sudamericanas para el Mundial de Rusia terminaran hoy, Argentina tendría que jugar un repechaje contra una selección de Oceanía para lograr un cupo. Todo debido a la derrota de la celeste en Bolivia con marcador de 2 a 0, sin contar con la participación de Leonel Messi sancionado para un total de cuatro partidos.</p><p>La derrota de Argentina se da en medio de rumores reportados por medios de ese país que hablan de una posible salida del entrenador Edgardo Bauza.</p><h3>Brasil está imparable</h3><p>Por otra parte, Brasil mira de lejos a las selecciones que le siguen en la tabla de posiciones de estas eliminatorias, luego de derrotar a la selección de Paraguay en el estadio Arena Corinthians de Sao Paulo, encadenando 8 victorias consecutivas.</p><p>Neymar, que lleva seis goles en las eliminatorias suramericanas, ofreció otra exhibición y desatascó en la segunda mitad el juego de una selección brasileña, que entró al Itaquerao de Sao Paulo algo fría, pero que se fue con 33 puntos en las alforjas a falta de cuatro jornadas.</p>', 'img/eliminatoria-sudamericana-neymar.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idnota` int(11) NOT NULL,
  `tiponota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los tipos de nota que se pueden publicar';

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idnota`, `tiponota`) VALUES
(1, 'Noticias'),
(2, 'Sociales'),
(3, 'Deportes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idnota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
