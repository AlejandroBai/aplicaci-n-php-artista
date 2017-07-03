

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";




CREATE TABLE `citas` (
  `fecha` date NOT NULL,
  `hora` varchar(10) NOT NULL,
  `lugar` varchar(150) NOT NULL,
  `motivo` varchar(500) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`fecha`, `hora`, `lugar`, `motivo`, `id_cliente`) VALUES
('2017-04-12', '21:00', 'Casa', 'Personal', 2),
('2017-04-17', '12:00', 'Oficina', 'Entrega de trabajo', 3),
('2017-04-25', '10:00', 'Plaza Mayor', 'Revisión de condiciones', 5),
('2017-04-28', '11:00', 'Oficina', 'Nuevo trabajo', 1),
('2017-05-08', '12:00', 'Parque García Lorca', 'Realización de fotos', 2),
('2017-05-10', '10:00', 'Oficina', 'Solicitud de nuevo trabajo', 4),
('2017-05-22', '11:00', 'Oficina', 'Entrega de trabajo finalizado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono1` varchar(20) NOT NULL,
  `telefono2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `direccion`, `telefono1`, `telefono2`) VALUES
(1, 'Laura', 'Garcia', 'Calle Darro', '111111111', '111111112'),
(2, 'Pablo', 'Robles', 'C/ Don Quijote', '222222222', '222222221'),
(3, 'Pedro', 'Martinez Almeida', 'C/ Alamos Verdes', '333333333', '333333332'),
(4, 'Pablo', 'Lopez', 'C/ Cervantes', '444444444', NULL),
(5, 'Pedro', 'Cortes', 'Calle Pedro de Mendoza', '555555555', NULL),
(6, 'Cristina', 'Robles', 'C/ Don Quijote', '666666666', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titular` varchar(300) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titular`, `imagen`, `contenido`, `fecha`) VALUES
(1, 'Nueva exposición de arte ', '1.jpg', 'El próximo día 10 de marzo se expondrán en la sala de exposiciones los últimos cuadros que he pintado. Estarán junto con los de otros compañeros de distintos estilos y con distintas herramientas. Os espero a todos allí!', '2017-03-05'),
(2, 'Famosos antes y ahora', '2.jpg', 'Ilustraciones de famosos antes y ahora.', '2017-03-11'),
(3, 'El Museo de Bellas Artes de Valencia presenta un óleo atribuido a Velázquez', '3.jpg', 'El Museo de Bellas Artes de Valencia ha presentado este miércoles una pintura desconocida atribuida al gran pintor español Diego Velázquez (1599-1660). La obra, titulada Dama de perfil, es un óleo pequeño de 24,5 x18,5 centímetros, que representa el boceto de una mujer, de perfil, y con un insinuante pecho al aire, que habría sido pintada entre 1629 y 1631 durante un viaje del artista a Italia.\r\nNo está firmado, como la mayoría de cuadros del artista, pero Carmen Garrido, doctora en Historia del Arte, conservadora de museos, anteriormente jefa del Gabinete de Documentación Técnica del Museo del Prado y especialista en Velázquez, le atribuye la obra después de casi un año de estudio. “Es una figura que debió impresionarle”, comentó en la presentación del lienzo, propiedad de un coleccionista que no ha revelado su identidad, pero que ha presentado la obra tras el nombre de Colección Delgado.', '2017-03-13'),
(4, 'Un artista consigue el éxito internacional al pintar sus cuadros sin gafas para mostrar qué sienten los miopes', '4.jpg', 'Un atardecer lluvioso en Ciudad del Cabo, con semáforos, farolas y paneles informativos. La riada de gente, sus sombras la luz, los destellos. Parecen fotografías, pero son pinturas al óleo.\r\n\r\nPhilip Barlow consigue con su pincel la difusión de las formas, que lo distante sea borroso, es decir lo que sufren a diario las personas con una miopía avanzada.\r\n\r\nA otro tipo de problemas se enfrentan las personas daltónicas. Una empresa californiana ha fabricado unas gafas que les permiten disfrutar de la vida a pleno color.\r\n\r\nOtro ejemplo, en este caso literal, de que la vida casi siempre depende del color del cristal con el que se mira.', '2017-03-28'),
(5, 'La Junta aporta el óleo restaurado de San Jerónimo Penitente a Las Edades de Cuéllar', '5.jpg', 'La Junta de Castilla y León ha recuperado la tabla de San Jerónimo Penitente, como parte de la colaboración entre la Consejería de Cultura y Turismo y la Catedral de Segovia. Esta obra se exhibe en el Museo Catedralicio y destaca por su valor histórico-artístico y su elección estuvo motivada por su atribución flamenca, una de las líneas de trabajo del Centro de Conservación y Restauración de Bienes Culturales de Castilla y León. Estos valores y la restauración acometida en el Centro de Simancas han llevado a su elección para participar en la XXII exposición de arte sacro Las Edades del Hombre ‘Reconciliare’, que se celebrará en la localidad segoviana de Cuéllar a partir del 24 de abril.', '2017-04-02'),
(6, 'Más de 80 pinturas en homenaje a Barroso', '6.jpg', 'Copiando a la maestra es el título de la exposición pictórica que se inauguró ayer por la tarde en el centro social La Morana, en la que se rinde un homenaje a la artista onubense Pilar Barroso. En la muestra, compuesta por más de ochenta obras, alumnos de los talleres de pintura del programa municipal Cultura en los Barrios ofrecen variadas interpretaciones de una de las composiciones florales de la pintora.\r\n\r\nEl pasado año, Pilar Barroso fue invitada por el monitor de pintura Juan Carlos Sáenz a dar una clase magistral a sus alumnos en La Morana. La artista mostró entonces su técnica a los asistentes pintando en directo un jarrón con flores, un cuadro, también expuesto, que sirvió de modelo al alumnado de Sáenz en los distintos centros y asociaciones en los que imparte los talleres de Cultura en los Barrios: Lazareto, Los Desniveles y Nueva Huelva, aparte de La Morana.', '2017-04-09'),
(7, 'El puente de Crimea, ahora al óleo', '7.jpg', 'Varios representantes de la Unión de Pintores de Rusia han realizado desde Kerch, Simferópol y Yalta una serie de bocetos que cristalizarán en futuras obras artísticas.\r\n\r\nLos pintores de Crimea llevaron a cabo el trabajo en la zona de construcción del puente, sobre el estrecho de Kerch.\r\n\r\nSe prevé que los artistas presenten sus obras, dedicadas al ambicioso proyecto de ingeniería, en una exposición móvil. El evento tendrá lugar en diferentes ciudades de Crimea y está programado para coincidir con la inauguración del puente.', '2017-04-10'),
(8, 'El óleo que inmortaliza al Real Madrid', '8.jpg', 'Jamie Cooper, un exjugador profesional de la AFL (Australian Football League), se gana la vida hoy como pintor y lo hace dentro del mundo del deporte. Jamie ha realizado obras de arte oficiales para los MLB Giants, los New York Yankees y los Philadelphia Phillies. En la Premier League también ha elaborado varios óleos para el Manchester City y Sheffield Wednesday. Y ahora ha puesto el foco en el Real Madrid\r\n\r\nEl pintor australiano trabaja en su obra «Escena del Campeón», un óleo en el que se recoge un momento único de la plantilla del Real Madrid tras conquistar la Undécima y su segundo Mundial de Clubes. Esta obra es una oda al madridismo y a los jugadores de la actual plantilla, que han conseguido no sólo conquistar dos de los títulos más importantes que puede lograr un club, sino establecer el récord de 40 encuentros invictos. Un año histórico que ha quedado marcado en la retina de cualquier aficionado del Real Madrid y que ahora Jamie Cooper va a inmortalizar con su pincel. ', '2017-04-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `imagen`, `titulo`, `descripcion`, `fecha`, `id_cliente`) VALUES
(1, '1.jpg', 'Pavo Real', 'Pavo real realizado con coleres de la gama de los rojos y violetas', '2016-08-06', 3),
(2, '2.jpg', 'Paisaje', 'Paisaje de río al atardecer', '2016-10-01', 4),
(3, '3.jpg', 'Composición a tres', 'Composición de cuaro en 3 bloques en el que cada uno está centrado en una gama diferente de colores', '2016-10-01', 1),
(4, '4.jpg', 'Paseo', 'Paseo de enamorados bajo la lluvia en una tarde otoñal', '2016-12-08', 4),
(5, '5.jpg', 'Cortijo', 'Representación de la primavera en el cortijo de mi gran amigo', '2017-04-19', 5),
(6, '6.jpg', 'Amapolas', 'Amapolas en primer plano', '2017-04-20', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`fecha`,`id_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
