-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2022 a las 22:23:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wewavdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE `accounts` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `AKA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `artist` tinyint(1) NOT NULL DEFAULT 0,
  `artist_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `genre_id` int(255) DEFAULT 0,
  `country_id` int(255) DEFAULT 0,
  `rol_id` int(33) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `AKA`, `password`, `artist`, `artist_type`, `genre_id`, `country_id`, `rol_id`) VALUES
(0, 'Grand Master Admin', 'ZERO', '$2y$10$Wy25k5GgbSipybccvxfsHuzsNMqSfvc98jk/oVgYEcUjxcXUUBqCC', 0, NULL, 0, 0, 0),
(1, 'admin-1', 'ONE', '$2y$10$7wOn1PlaWhSCZbBPHffZx.XP/HWSVMAKLdZa0PbzqPa24dSzBxm76', 0, NULL, 0, 11, 1),
(2, 'admin-2', 'TWO', '$2y$10$pLfNxENtXgyAo32JmUygFOYGCed7BRIzgr8Lzh.AjSJH/gXoevYjO', 0, NULL, 0, 11, 1),
(3, 'test', 'TEST01', '$2y$10$Lo3HUO3v2M5upB5ZZRale.5JZzfMC/CCkrp7LBRrQIeSks0rth8iO', 0, NULL, 33, 5, 2),
(4, 'Blas Insua', 'Lykans Beats', '$2y$10$Tv8KnOxW7nIWXgRxjOEc5OBxc7jjdWXN77e0slT9Cj1K4CO2reTwq', 1, NULL, 7, 11, 2),
(5, 'user-five', '05', '$2y$10$2nhBkr6leNbPec/HIsuj6unCwIzXx7UduArSC.hR9C.qSaMaT8JPG', 1, NULL, 35, 151, 2),
(6, 'user-six', '666', '$2y$10$nBNZGdTB.357Tl.C.HN2nODa7J8DyolE9hfIrheocxjXbQgUlwWNm', 0, NULL, 31, 233, 1),
(7, 'user-seven', '07', '$2y$10$FPgw1zh8vXX3OK5BaA2y9.4g.g/yDHkIQXs2agMGxmMbPblC9wCve', 0, NULL, 42, 71, 2),
(8, 'user-eight', '08', '$2y$10$A5hrdri2ed03DOqbKatKsu7AEwgF6kK44ZJTk5/EisnMC3Ali0yCu', 1, NULL, 33, 17, 2),
(9, 'user-nine', '09', '$2y$10$oOA8cWocT6Ti0.U2CYfn/uPeY2XRNJ9VOZuP7oBLl7eoo2TFST81W', 0, NULL, 16, 9, 2),
(19, 'user-eleven', '11', '$2y$10$QxTXc0vy34asdmmb6DLOK.JUYBHbV0XM3Rn0Cf16a78L0c2/gOfFq', 0, NULL, 1, 0, 2),
(20, 'user-twelve', '12', '$2y$10$mYzBrBWzeJ59K5s3eer1bumMlsK7h24cfMRxdUshun4sMSf4s0vmC', 0, NULL, 1, 0, 2),
(21, 'trecedoce', '1312', '$2y$10$Uqmo8lPysY6mYJT18D2//eVvDoe9y2XWfT0kVeOKiu88BAQhb9PrC', 0, NULL, 1, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(255) NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(0, 'None'),
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua And Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'The Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Democratic Republic of the Congo'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Cote D\'Ivoire (Ivory Coast)'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'East Timor'),
(64, 'Ecuador'),
(65, 'Egypt'),
(66, 'El Salvador'),
(67, 'Equatorial Guinea'),
(68, 'Eritrea'),
(69, 'Estonia'),
(70, 'Ethiopia'),
(71, 'Falkland Islands'),
(72, 'Faroe Islands'),
(73, 'Fiji Islands'),
(74, 'Finland'),
(75, 'France'),
(76, 'French Guiana'),
(77, 'French Polynesia'),
(78, 'French Southern Territories'),
(79, 'Gabon'),
(80, 'Gambia The'),
(81, 'Georgia'),
(82, 'Germany'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Greece'),
(86, 'Greenland'),
(87, 'Grenada'),
(88, 'Guadeloupe'),
(89, 'Guam'),
(90, 'Guatemala'),
(91, 'Guernsey and Alderney'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard Island and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong S.A.R.'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jersey'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'North Korea'),
(116, 'South Korea'),
(117, 'Kuwait'),
(118, 'Kyrgyzstan'),
(119, 'Laos'),
(120, 'Latvia'),
(121, 'Lebanon'),
(122, 'Lesotho'),
(123, 'Liberia'),
(124, 'Libya'),
(125, 'Liechtenstein'),
(126, 'Lithuania'),
(127, 'Luxembourg'),
(128, 'Macau S.A.R.'),
(129, 'Macedonia'),
(130, 'Madagascar'),
(131, 'Malawi'),
(132, 'Malaysia'),
(133, 'Maldives'),
(134, 'Mali'),
(135, 'Malta'),
(136, 'Man (Isle of)'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia'),
(144, 'Moldova'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Bonaire, Sint Eustatius and Saba'),
(156, 'Netherlands'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory Occupied'),
(170, 'Panama'),
(171, 'Papua new Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn Island'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russia'),
(183, 'Rwanda'),
(184, 'Saint Helena'),
(185, 'Saint Kitts And Nevis'),
(186, 'Saint Lucia'),
(187, 'Saint Pierre and Miquelon'),
(188, 'Saint Vincent And The Grenadines'),
(189, 'Saint-Barthelemy'),
(190, 'Saint-Martin (French part)'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome and Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia'),
(206, 'South Sudan'),
(207, 'Spain'),
(208, 'Sri Lanka'),
(209, 'Sudan'),
(210, 'Suriname'),
(211, 'Svalbard And Jan Mayen Islands'),
(212, 'Swaziland'),
(213, 'Sweden'),
(214, 'Switzerland'),
(215, 'Syria'),
(216, 'Taiwan'),
(217, 'Tajikistan'),
(218, 'Tanzania'),
(219, 'Thailand'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad And Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks And Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Minor Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Vatican City State (Holy See)'),
(239, 'Venezuela'),
(240, 'Vietnam'),
(241, 'Virgin Islands (British)'),
(242, 'Virgin Islands (US)'),
(243, 'Wallis And Futuna Islands'),
(244, 'Western Sahara'),
(245, 'Yemen'),
(246, 'Zambia'),
(247, 'Zimbabwe'),
(248, 'Kosovo'),
(249, 'Curaçao'),
(250, 'Sint Maarten (Dutch part)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` int(255) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(0, 'None'),
(1, 'Acoustic'),
(2, 'Afrobeat'),
(3, 'Alternative rock'),
(4, 'Ambient'),
(5, 'Bass house'),
(6, 'Blues'),
(7, 'Boom bap'),
(8, 'Country'),
(9, 'Deep House'),
(10, 'Dembow'),
(11, 'Disco'),
(12, 'Drum n Bass'),
(13, 'Drill'),
(14, 'Dubstep'),
(15, 'Electronica & Dance'),
(16, 'Fantasy & Dreamy'),
(17, 'Flamenco'),
(18, 'Folk'),
(19, 'Future Bass'),
(20, 'Hard Rock'),
(21, 'Hardstyle'),
(22, 'Hip Hop'),
(23, 'House'),
(24, 'Indie'),
(25, 'Jazz'),
(26, 'K-Pop'),
(27, 'Metal'),
(28, 'Other'),
(29, 'Pop'),
(30, 'Punk'),
(31, 'Psychedelic trance'),
(32, 'Reggae'),
(33, 'Riddim'),
(34, 'RnB'),
(35, 'Rock'),
(36, 'Salsa'),
(37, 'Ska'),
(38, 'Solo Instrument'),
(39, 'Soul'),
(40, 'Traditional'),
(41, 'Tango'),
(42, 'Techno'),
(43, 'Trance'),
(44, 'Trap');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(0, 'Grand Master'),
(1, 'Admin'),
(2, 'User'),
(3, 'Guest');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tracks`
--

CREATE TABLE `tracks` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `genre_id` int(255) DEFAULT NULL,
  `date` date NOT NULL,
  `folder_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `user_id`, `genre_id`, `date`, `folder_id`) VALUES
(1, 'test', 1, 0, '2022-10-01', 0),
(2, 'test2', 2, 0, '2022-09-10', 0),
(3, 'test3', 2, 0, '2022-09-10', 0),
(6, 'test12', 1, 7, '2022-10-01', 0),
(8, 'test02', 1, 7, '2022-10-01', 0),
(9, 'test', 1, 4, '2022-10-01', 0),
(10, 'test05', 1, 3, '2022-10-01', 0),
(11, 'test11', 1, 38, '2022-10-01', 0),
(12, 'testing2', 2, 7, '2022-10-01', 0),
(18, 'qweqweqw', 5, 15, '2022-10-03', 0),
(19, 'zxczxcxzc', 5, 10, '2022-10-05', 0),
(21, '123123', 6, 17, '2022-09-26', 0),
(22, 'zczxcvv', 6, 41, '2022-10-06', 0),
(23, 'qweqweqweq', 6, 43, '2022-10-06', 0),
(24, 'aasd', 7, 8, '2022-10-02', 0),
(25, 'qwertyuiop', 7, 28, '2022-10-06', 0),
(27, 'track17', 20, 25, '2022-10-06', 0),
(28, 'track18', 20, 44, '2022-10-06', 0),
(29, 'track19', 20, 18, '2022-10-06', 0),
(30, 'track20', 20, 30, '2022-10-06', 0),
(31, 'track21', 21, 21, '2022-01-31', 0),
(32, 'track22', 21, 7, '2022-10-06', 0),
(33, 'track23', 21, 5, '2022-10-06', 0),
(34, 'track24', 21, 1, '2022-10-06', 0),
(35, 'track25', 21, 2, '2022-10-05', 0),
(36, 'track26', 21, 6, '2022-10-06', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `genre_id` (`genre_id`) USING BTREE;

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accounts_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tracks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
