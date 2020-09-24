-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 15-05-2020 a las 11:45:09
-- Versión del servidor: 8.0.19
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `GameAdvisor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Comentarios`
--

CREATE TABLE `Comentarios` (
  `Id_Evento` int NOT NULL,
  `Id_Comentario` int NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Comentario` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Comentarios`
--

INSERT INTO `Comentarios` (`Id_Evento`, `Id_Comentario`, `Nombre`, `Mail`, `Fecha`, `Hora`, `Comentario`) VALUES
(1, 1, 'Miguemumo', 'miguemumo@twitch.tv', '2020-04-15', '22:39:24', 'Qué lástima que se haya retrasado :(, pero nos vemos en Septiembre :)*Mensaje editado por un Moderador*'),
(1, 2, 'xTemerz', 'xtemerz@twitch.tv', '2020-03-28', '20:03:41', 'Tengo ganas de ver qué se cuece por allí'),
(14, 1, 'IvanitiX', 'ivan@ivanitix.es', '2020-05-14', '05:04:00', 'Qué lástima no haber podido haber asistido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Etiquetas`
--

CREATE TABLE `Etiquetas` (
  `Id_Evento` int NOT NULL,
  `Etiqueta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Etiquetas`
--

INSERT INTO `Etiquetas` (`Id_Evento`, `Etiqueta`) VALUES
(1, 'geek'),
(14, 'etsiit'),
(14, 'ugr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Eventos`
--

CREATE TABLE `Eventos` (
  `Id` int NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `Informacion` varchar(5000) DEFAULT NULL,
  `Ruta_Img1` varchar(100) DEFAULT NULL,
  `Pie_Img1` varchar(100) DEFAULT NULL,
  `Ruta_Img2` varchar(100) DEFAULT NULL,
  `Pie_Img2` varchar(100) DEFAULT NULL,
  `Ruta_Logo` varchar(100) DEFAULT NULL,
  `Twitter` varchar(50) DEFAULT NULL,
  `Facebook` varchar(50) DEFAULT NULL,
  `Gestor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Eventos`
--

INSERT INTO `Eventos` (`Id`, `Nombre`, `Fecha`, `Lugar`, `Informacion`, `Ruta_Img1`, `Pie_Img1`, `Ruta_Img2`, `Pie_Img2`, `Ruta_Logo`, `Twitter`, `Facebook`, `Gestor`) VALUES
(1, 'FicZone Granada', '2020-09-11', 'Fermasa (Armilla)', 'La FicZone,​ anteriormente conocido como el Salón del Manga de Granada, es un evento sobre manga, cultura japonesa, cómics, animación y ciencia ficción que se celebra en la ciudad de Granada (España). Está organizado por la Asociación cultural Crossover, contando con la colaboración de otras entidades y asociaciones de distintos ámbitos. Desde su primera edición celebrada en 2009, éste se ha convertido en uno de los salones más destacados de España.\r\n\r\nSin embargo, aun previsto para Marzo\'20, por el Coronavirus se ha cambiado a Septiembre. Este es su comunicado:\r\n\r\nTras la rueda de prensa realizada ayer por el Gobierno, y a tenor de las medidas que se están tomando en toda España para la contención del virus COVID-19, desde la asociación CrossOver nos vemos obligados a aplazar el evento, que se realizará el 12 y 13 de Septiembre en el mismo lugar.\r\n\r\nEsta decisión es muy difícil para nosotros debido a la importante inversión económica que supondrá este cambio, ya que, como hemos mencionado en más de una ocasión, el apoyo institucional es mínimo en comparación con la aportación privada que realiza la propia asociación.\r\n\r\nPor otro lado, también conllevará un esfuerzo muy grande por todo nuestro equipo y colaboradores para encauzar el evento a esta nueva fecha, garantizando la calidad de todo el contenido que os tenemos preparado.\r\n\r\nPero lo que sí queremos transmitiros es nuestra absoluta voluntad de que, a pesar el esfuerzo extra que nos suponga, estos meses vamos a dedicarlos a seguir trabajando y hacer de esta edición una de las mejores que podáis recordar.\r\n\r\nEn principio, el evento sigue igual, aunque en una fecha diferente. Os iremos informando de todos los posibles cambios, para lo que os recomendamos seguirnos en nuestras redes sociales.\r\n\r\nTodas las entradas que se han comprado hasta ahora siguen siendo válidas para la nueva fecha.\r\n\r\nEvidentemente, entendemos que este cambio de fecha afecte a algunas personas que finalmente no puedan asistir, por ello, en los próximos días vamos a establecer mecanismos para devolver el importe de las entradas a aquellos que ya hayan comprado las entradas y lo soliciten. Además, queremos anunciaros que no habrá límite en cuanto a tiempo de devolución y que podréis cancelar las entradas adquiridas hasta la semana anterior a la celebración del evento, concretamente hasta el martes 1 de Septiembre.\r\n\r\nFinalmente, nos gustaría pedir a nuestro público, en nombre de todos los que formamos parte del evento, que confíen en nosotros, y queremos recalcar que, si tienen pensado venir, no hay necesidad de devolver la entrada para luego adquirir otra.\r\n\r\nHoy más que nunca, os pedimos a todos máxima difusión de este mensaje de aplazamiento del evento.\r\n\r\nSin más, nos despedimos hasta Septiembre, donde esperamos veros a todos.\r\n\r\nAsociación Cultural CrossOver', 'img/FicZone-1.jpg', 'El cosplay es bastante frecuente en esta convención.', 'img/FicZone-2.jpg', 'Junto con la FicZone (parte de manga y cómic), se une GranadaGaming (juegos) y MeepleFactory ', 'img/Logo_Ficzone.png', 'FicZone', 'FicZone', 'Arcadia'),
(2, 'Gamepolis Málaga', '2020-07-17', 'Feria de Muestras y Congresos de Málaga', 'El 12 de julio de 2013 nació Gamepolis, I Festival de Videojuegos de Málaga. Desde su primera edición, el objetivo principal del evento ha sido combinar formación, entretenimiento y negocios. Gamepolis reunió en su primera edición a 15.000 personas, destacando la presencia del youtuber El Rubius​ y la exposición original ‘Museo Dinamic’ de FX interactive, valorada en 120.000 euros.\r\nAsí, desde 2013, empresas especializadas, fabricantes, desarrolladores, profesionales, estudiantes, fanes y jugadores se reúnen cada julio para cerrar negocios, debatir sobre videojuegos o simplemente jugar. Intel HP, Microsoft, Nintendo, NVIDIA, PlayStation, MSI, Ozone, Versus y Ubisoft son sólo algunas de las numerosas empresas que han elegido Gamepolis para presentar sus últimas novedades.\r\n\r\nEn su cuarta edición, en 2016, se registraron más de 32.000 visitantes y 4,5 millones de euros de impacto económico5​ y la presencia de THQ Nordic, que anunció en exclusiva la remasterización de Darksiders. Su quinta edición se celebró del 21 al 23 de julio en el Palacio de Ferias y Congresos de Málaga, acogiendo a más de 40.000 visitantes. \r\n\r\nAdemás, este año se añade la Lan Party, viviendo así durante 3 días jugando y haciendo migas con otras personas mientras juegas non-stop', 'img/Gamepolis-1.jpg', 'Este evento está bastante concurrido, llegando a picos de 44000 personas', 'img/Gamepolis-2.jpg', NULL, 'img/Logo_Gamepolis.png', 'Gamepolis_org', 'Gamepolis', 'Arcadia'),
(3, 'Raid Operación \"Horas Oscuras\"', '2020-04-10', 'Online', 'Para los amantes de The Division 2, llega una gran raid dentro de los contenidos de año 1.\r\n\r\nLa compañía francesa asegura que este contenido para ocho jugadores \"será el más complicado de todos los desafíos\" del looter shooter, y que \"pondrá a prueba el trabajo en equipo de los agentes más experimentados\".\r\n\r\nPreviamente, desde Massive Entertainment, los desarrolladores del juego, habían asegurado que Operación Horas Oscuras introducirá en The Division mecánicas nunca vistas anteriormente, y obligará a los jugadores separarse en equipos y coordinarse para superar distintos retos.\r\n\r\nThe Division 2 está disponible en PS4, Xbox One y PC desde el pasado 15 de marzo de 2019. En un contexto en el que Destiny 2 está en mejor forma que nunca y en el que Anthem llegó a las tiendas a medio cocer (debido a un desarrollo convulso), el juego de Massive Entertainment se ha consolidado como un título sobresaliente dentro del género looter shooter y repleto de contenido endgame.\r\n\r\nAprovechando su reciente descuentazo a 3€ con motivo de la expansión \"Warlords of New York\", y la actual cuarentena, la comunidad de gamers de la UGR invita a reunir a los estudiantes para,a modo de Lan Party, tratar de pasarse esta raid. ¿Te apuntas?', 'img/DivisionDH-1.jpg', 'Esta raid está preparada para hasta 8 jugadores, si bien en el juego base son de hasta 4.', NULL, NULL, 'img/Logo_Division.jpg', NULL, NULL, 'Arcadia'),
(4, 'DreamHack Valencia', '2020-03-17', 'Valencia', 'DreamHack es otro de los eventos de esports & gaming en España en 2020 de referencia. De hecho, DreamHack Valencia fue reconocido en 2017 por la consultora Newzoo como el evento de esports más importante de España.\r\n\r\nEl evento forma parte de una red internacional que se celebró por primera vez en Suecia en 1994. Un dato de interés que muestra su potencial para las marcas es que ha sido premiado con el récord Guinness al festival digital más grande del mundo en cuanto a visitantes únicos.\r\n\r\nValencia es una de las 11 ciudades en las que se celebra: Malmö, Las Vegas, Jönköping, Leipzig, Austin, Tours, Atlanta, Denver o Montreal. En la edición de 2019 DreamHack Valencia recibió a más de 65.000 visitantes en total.\r\nHay 3 tipos diferentes de entradas para la novena edición de este evento:\r\n\r\n    De día: Permite disfrutar de todas las actividades que se encuentran en las zonas de las zonas Expo y Esports el día 5, 6 o 7 de julio. Así como disfrutar de todas las competiciones del evento en los escenarios internacionales y nacionales.\r\n    Lan: Da acceso a la zona LAN desde el día 2 hasta el 6 de julio. También permite participar en torneos oficiales de DreamHack.\r\n    Lan VIP: Además de lo que permite la anterior el pase VIP incluye un Welcome Pack valorado en 50€ incluido (Gymbag + Camiseta VIP + Merchandising Videojuegos + 1 Monster gratis por día + Productos de patrocinadores) + Selección de asiento prioritario + Check-in sin colas.\r\n\r\nExiste una Zona Dormitorio a la que podrán retirarse a descansar todos los asistentes al evento con pase LAN o de competidor.', 'img/Dreamhack-1.jpeg', NULL, 'img/Dreamhack-2.jpeg', NULL, 'img/Logo_Dreamhack.jpg', NULL, NULL, 'Arcadia'),
(5, 'Gamergy', '2020-05-01', 'IFEMA Madrid', 'Ifema volverá a ser la sede de uno de los principales eventos de esports & gaming en España en 2020. Un espacio obligatorio para cualquier marca que quiera ser algo en el mundo de los esports.\r\n\r\nNo en vano, durante la Gamergy se celebran las finales de la Superliga Orange. Pero también se puede disfrutar de las mejores competiciones en directo de los juegos más de moda: CS:GO, League of legends, Clash Royale, Battle Royale,…\r\n\r\nNo sólo eso. En la Fan Zone, los fans más entregados podrán conocer a sus ídolos. Ya sean influencers, jugadores profesionales, creadores de contenido o youtubers. \r\nY un año más, la Gamergy también permite a los asistentes no sólo disfrutar con los mejores. También podrán jugar y llevarse a casa un montón de premios. Y lo mejor es que será enfrentándose cara a cara con los embajadores de sus juegos favoritos.', 'img/Gamergy-1.jpeg', NULL, 'img/Gamergy-2.jpeg', NULL, 'img/Logo_Gamergy.jpg', 'Gamergy', NULL, 'Arcadia'),
(6, 'Metrópoli Gijón', '2020-03-12', 'Recinto Ferial de Gijón', 'Se trata del evento gamer de referencia en Asturias. Por eso, en una lista de los eventos de esports & gaming en España en 2020 no podía faltar este evento. Allí se celebran torneos de Overwatch, LoL o Magic The Gathering que reúnen a un gran número de amantes de estos títulos.\r\n\r\nAdemás, en Metrópoli suele programarse un set de arcade con juegos comerciales como SuperHotVR, BeatSaber y Gorn. Y los asistentes podrán disfrutar con partidas de juegos como Fortnite, Overwatch o League of Legends. Además, un año más, Pure Gaming pondrá a tu disposición los mejores equipos para que los juegos corran como se merecen.', 'img/Metropoli-1.jpeg', NULL, 'img/Metropoli-2.jpeg', NULL, 'img/Logo_Metropoli.jpg', 'Metropoligijon', NULL, 'Arcadia'),
(7, 'Euskal Encounter', '2020-05-01', 'Bilbao Exposition Center', 'Pero si hay un evento con solera en este sector en España es la Euskal Encounter. Su primera edición fue en 1994, hace ya 25 años. Y el pasado mes de julio, la EE27 agrupó a más de 15.000 personas en la Opengune, zona abierta al público y de acceso gratuito.\r\n\r\nPero la Euskal Encounter es mucho más. De hecho, este encuentro de profesionales y aficionados a la informática y las nuevas tecnologías contó con más de 7000 participantes en la Euskal Party, el espacio en el que pueden llevar sus equipos para navegar a velocidades de 60 gigabits por segundo. Lo que la sitúa como la party más rápida del Estado y una de las más veloces del mundo.\r\n\r\nActividades formativas relacionadas con la robótica, drones o la impresión 3D, más de 300 competiciones organizadas este año, un 50% más que las disputadas en 2018 o bien decenas de ofertas para los gamers son otras de las actividades de este encuentro.\r\nEn este evento suele haber Youtubers de la scene tecnológica, como Nate Gentile.', 'img/Euskal-1.png', NULL, 'img/Euskal-2.jpeg', NULL, 'img/Logo_Euskal.jpg', 'euskalencounter', NULL, 'Arcadia'),
(8, 'NiceOne Barcelona', '2020-03-18', 'Fira Barcelona', 'En este evento confluyen varias actividades. Por un lado, diversos torneos de esports, entre los que se encuentran:\r\n\r\n    Iberian Cup: Multitud de torneos y competiciones organizadas por NiceOne Barcelona junto con la LVP.\r\n    El Circuito Tormenta: Es la competición amateur oficial de Riot Games en España en la que luchan más de 1.500 equipos para llegar a la Gran Final.\r\n    Orange Cups: Tras cuatro meses de clasificatorios online a través de ArenaGG, se seleccionan a los cinco mejores jugadores de Clash Royale, League of Legends, CS:GO y Fortnite que jugarán los últimos tres clasificatorios presenciales de cada juego.\r\n    Barcelona Mobile Challenge: Donde se puede jugar a algunos de los juegos más importantes de la actualidad: Brawl Stars y Call of Duty Mobile.\r\nPero si por algo destaca NiceOne Barcelona entre los eventos de esports & gaming en España en 2020 es porque también acoge el congreso Brands&Gaming. En él se reúnen a los responsables de marketing que quieren conectar con su público a través del gaming&esports.\r\n\r\nEn esta conferencia se trata el gaming desde diferentes perspectivas: como hobby, una profesión o como el territorio de comunicación perfecto para hablar con el público joven cara a cara.', 'img/NiceOne-1.jpeg', NULL, 'img/NiceOne-2.jpeg', NULL, 'img/Logo_NiceOne.png', 'niceonebcn', NULL, 'Arcadia'),
(9, 'Fun&Serious', '2020-03-04', 'Bilbao Exposition Center, Bilbao', 'Se trata de uno de los eventos que ayudan a cerrar cada año. Y lo hace eligiendo a los mejores de categorías como el juego del año, el mejor diseño de narrativa, el mejor juego de esports o el premio al videojuego más innovador.\r\n\r\nPero el Fun and Serious Games Festival de Bilbao es mucho más que eso. No en vano, es de los pocos lugares donde el popular comentarista de la Liga de Videojuegos Profesional, Ibai Llanos tiene que raparse el pelo al lograr más de 100.000 euros para Save The Children. Lo más llamativo es que lo hizo con dos comentaristas de lujo: ElRubius y Willyrex, dos de los youtubers con más éxito a nivel mundial. Ambos suman más de sesenta millones de seguidores.\r\n', 'img/FunSerious-1.jpeg', NULL, 'img/FunSerious-2.jpg', NULL, 'img/Logo_FunSerious.jpg', 'funandserious', NULL, 'Arcadia'),
(10, 'Retrópolis Valencia', '2020-04-09', 'ETSinf - Universidad de Valencia', 'Retrópolis Valencia es un evento sin ánimo de lucro cuya finalidad es la divulgación, promoción y preservación de la cultura del videojuego y de la informática clásica, tanto de los equipos comercializados durante el desembarco de la informática en el ámbito doméstico y familiar como del software desarrollado, dentro y fuera de nuestro país, fruto de una industria de videojuegos que daba sus primeros pasos.\r\n\r\nAsimismo, se pretende ofrecer un espacio de reunión que resulte atractivo a grupos de desarrollo y aficionados al mundo de la retroinformática.\r\n\r\nY por último, para el visitante se proporciona un marco incomparable de intercambio cultural y lúdico con las nuevas generaciones, dando cita a diversas manifestaciones artísticas y tecnológicas en torno a las máquinas y videojuegos retro. ', 'img/Retropolis-1.jpeg', NULL, 'img/Retropolis-2.jpeg', NULL, 'img/Logo_Retropolis.jpg', 'retropolisvlc', NULL, 'Arcadia'),
(14, 'Fiesta de la ETSIIT', '2020-05-13', 'Internet', 'El próximo 13 de mayo de 2020 se celebrará la Fiesta de la Escuela, organizada desde la Delegación de Estudiantes de Ingenierías Informática y de Telecomunicación.<br /><br /><br /><br /><br /><br /><br />\r\nComo sabéis, la situación epidemiológica por la que estamos pasando nos impide que la Fiesta de la ETSIIT se celebre de forma presencial, por lo que este año hemos cambiado de formato y realizaremos las distintas actividades de forma online, utilizando la plataforma Discord puedes acceder al servidor donde se van a realizar las distintas actividades: Enlace al servidor de Discord<br /><br /><br /><br /><br /><br /><br /><br />\r\nA continuación, hemos intentado contestar a las dudas que surgen todos los años al respecto. Si tenéis alguna duda u os gustaría alguna aclaración no dudéis en escribirnos a actividadesdeiit@ugr.es.<br /><br /><br /><br /><br /><br /><br />\r\nSe celebra el aniversario de la inauguración de la Escuela Técnica Superior de Ingenierías Informática y de Telecomunicación.<br /><br /><br /><br /><br /><br /><br />\r\nLa fecha se decide anualmente en la Junta de Centro (el órgano de gobierno de la ETSIIT). Es un día pensado para que PDI, PAS y, en especial estudiantado, disfruten de las actividades organizadas y desconecten del día a día de la Escuela, para así descansar del frenético ritmo diario de esta nuestra Escuela, pudiendo gozar de un ambiente distendido y festivo.<br /><br /><br /><br /><br /><br /><br />\r\n¿Quién lo organiza?<br /><br /><br /><br /><br /><br /><br />\r\nLa Fiesta de la Escuela está organizada en su mayor parte por la DEIIT, contando con el apoyo de la dirección de la ETSIIT.<br /><br /><br /><br /><br /><br /><br />\r\n¿Me tengo que apuntar para participar?<br /><br /><br /><br /><br /><br /><br />\r\nSí, hay que apuntarse, ya que facilitan la organización de las distintas actividades y torneos. Los enlaces están disponibles más abajo.<br /><br /><br /><br /><br /><br /><br />\r\nEl horario del día de la Escuela está en el siguiente enlace: Horario. Es posible que éste sufra algún cambio debido a causas de fuerza mayor o a que se cancele alguna actividad.<br /><br /><br /><br /><br /><br /><br />\r\n¿Se puede apuntar alguien que no pertenezca a la ETSIIT?<br /><br /><br /><br /><br /><br /><br />\r\nSí, por supuesto. Las actividades están abiertas a toda la comunidad universitaria, incluso algunas están abiertas a cualquiera que desee participar.<br /><br /><br /><br /><br /><br /><br />\r\n', 'img/Fiesta.png', 'Cartel de este año. En este caso todo se hizo via Discord', '', '', 'img/LogoDEIIT.png', 'DEIITugr', 'DEIITugr', 'IvanitiX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Palabras_Baneadas`
--

CREATE TABLE `Palabras_Baneadas` (
  `Palabras` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Palabras_Baneadas`
--

INSERT INTO `Palabras_Baneadas` (`Palabras`) VALUES
('tonto'),
('imbécil'),
('estúpido'),
('fortnite'),
('inútil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `Nick` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contraseña` varchar(200) NOT NULL,
  `Rol` varchar(50) NOT NULL
) ;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Nick`, `Email`, `Contraseña`, `Rol`) VALUES
('Arcadia', 'callmearcadia@gmail.com', '$2y$10$xPLr3xtWhyyG0lK7TmYuPu3stJKmaW/bHUrHXHFRz7/s/jtECY2LG', 'Gestor'),
('IvanitiX', 'ivan@ivanitix.es', '$2y$10$MA1y07YUnpYmDtXykIgB3eUuXST0gunrz9w4HtwngUNMNQms8dBPK', 'SuperUsuario'),
('ManuJNR', 'manu@unemail.es', '$2y$10$7ZpThv2g7bWpJ9emkLtSTO2iiA9MFWmfORx5QlU/VnNXL330NXNde', 'Usuario'),
('Miguemumo', 'migue@mumo.es', '$2y$10$Eiyu5v/Ic.Vv/XQ98sz4ee.lUE33n3yLgU9aYNrkwfRjxZ4lLqHQK', 'Moderador'),
('xTemerz', 'javi@temeris.es', '$2y$10$k3CpyrTMgOdn7uijP2jiYe2WEv2Ldvj6GA5ggkFAr95RK1CvD50Cq', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`Id_Evento`,`Id_Comentario`);

--
-- Indices de la tabla `Etiquetas`
--
ALTER TABLE `Etiquetas`
  ADD KEY `Id_Evento` (`Id_Evento`);

--
-- Indices de la tabla `Eventos`
--
ALTER TABLE `Eventos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Gestor` (`Gestor`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Nick`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Eventos`
--
ALTER TABLE `Eventos`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD CONSTRAINT `Id_EventoFK` FOREIGN KEY (`Id_Evento`) REFERENCES `Eventos` (`Id`);

--
-- Filtros para la tabla `Etiquetas`
--
ALTER TABLE `Etiquetas`
  ADD CONSTRAINT `Etiquetas_ibfk_1` FOREIGN KEY (`Id_Evento`) REFERENCES `Eventos` (`Id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `Eventos`
--
ALTER TABLE `Eventos`
  ADD CONSTRAINT `Eventos_ibfk_1` FOREIGN KEY (`Gestor`) REFERENCES `Usuarios` (`Nick`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
