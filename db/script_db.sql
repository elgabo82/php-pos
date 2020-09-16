CREATE DATABASE `pos` IF NOT EXISTS `pos`;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL UNIQUE,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `ultimo_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Equipos Electromecánicos', '2017-12-21 18:29:27'),
(2, 'Taladros', '2017-12-21 17:56:23'),
(3, 'Andamios', '2017-12-21 17:56:46'),
(4, 'Generadores de energía', '2017-12-21 17:56:58'),
(7, 'Equipos para construcción', '2017-12-21 18:40:47');
