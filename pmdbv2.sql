DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(32) NOT NULL,
  `Description` varchar(256) NOT NULL,
  `Keywords` varchar(128) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `UserId` int NOT NULL,
  `Shared` tinyint(1) NOT NULL,
  `GUID` varchar(256) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`Id`, `Title`, `Description`, `Keywords`, `CreationDate`, `UserId`, `Shared`, `GUID`) VALUES
(33, 'Soleil', 'Coucher de soleil d\'été', '', '2020-11-17 15:36:38', 1, 1, '{08C8220F-EEA0-4458-9E0E-619F5AF3E412}'),
(26, 'Guitare', 'Guitare dans le chalet des Laurentides.', '', '2020-11-17 15:01:52', 1, 1, '{F01DFBEB-E2EF-4AC9-9A45-58684B4446FA}'),
(32, 'Mont-Royal', 'Site incontournable de la ville de Montréal surtout avec les couleurs d\'automne.\r\n            ', 'mont royal montréal nuage automne', '2020-11-17 15:26:47', 2, 1, '{0C840721-B954-4AD9-824D-D80E28BB264E}'),
(10, 'Paysage', 'qweqwe', '', '2020-11-13 13:19:40', 1, 1, '{65719130-9EDD-4961-BF11-E12D64D2E5E4}'),
(12, 'On the road again', 'Photoshoped Nevada enigmatic road', '', '2020-11-13 13:27:16', 1, 0, '{A72F3F8E-D382-4870-A28B-772D11BC1613}'),
(27, 'Another Brick in the wall.', 'I think of Pink Flyod when I see this wall.', '', '2020-11-17 15:05:46', 2, 1, '{A6F5C93E-3E78-4382-A3A8-1E02F22F4F81}'),
(28, 'Salon', 'Conception moderne des années 90.', '', '2020-11-17 15:18:43', 2, 1, '{416DA852-A1B0-45D9-B649-548E598F3C04}'),
(29, 'Coucher de soleil', 'Coucher de soleil de métropole.', '', '2020-11-17 15:19:59', 2, 1, '{872BA6D8-6AA5-422C-8FD3-651CC8C97F1E}'),
(30, 'Le Louvre', 'Le fameux musée de Paris', '', '2020-11-17 15:21:27', 2, 1, '{B53ADB40-B629-41FB-B003-D397765D2332}'),
(31, 'Pont de Londres', 'Monument incontournable de la ville de Londres.', '', '2020-11-17 15:25:24', 2, 1, '{ADC8E800-9765-4E60-812F-7C7F498F35F1}'),
(35, 'Petit chat', 'Yé don ben cute!', '', '2020-11-17 15:38:54', 1, 0, '{1B46F930-7E94-4389-8410-0D4050E6169A}'),
(36, 'Keegan Messing', 'Olympiques de PyeongChang 2018', 'patinage artistique', '2020-11-17 15:40:28', 1, 1, '{5D016C8B-A2F1-483C-9C51-0E820B01EE14}'),
(37, 'Evgenia Medvedeva', 'PyeongChang', '', '2020-11-17 15:41:16', 1, 0, '{392F1802-05E2-427B-89B9-9B31B11DB20E}'),
(38, 'LGXT-SA', 'Godin LGX-SA Synth Access Guitar', '', '2020-11-17 15:43:00', 1, 1, '{7C7504CD-BB8F-4AD2-B8A6-761121518D75}'),
(39, 'Ibanez S5470', 'Ibanez S5470 TKS Prestige 2009 Transparent Black Sunburst', '', '2020-11-17 15:45:41', 1, 1, '{E728044F-9FFE-4FCE-B10A-FC9CE5046D01}'),
(40, 'Specialized', 'Vélo de route avec amortisseur au guidon.', '', '2020-11-17 15:47:37', 1, 1, '{6F562A96-8D5B-4252-80CC-76AC1FA4CE2B}'),
(41, 'Chasse orignal (booooo!!!)', 'Réservée à la chasse à l’orignal, cette pourvoirie se trouve sur un territoire privé de 4 400 hectares, dans un habitat prisé par ce grand cervidé. On y offre également différents forfaits et services.', '', '2020-11-17 15:50:06', 1, 0, '{9542B3C1-928C-4DBB-A9E9-0F17100E150C}'),
(42, 'Yellow Stone', 'World-famous Yellowstone, established in 1872, is the oldest national park in the United States and one of the most popular parks in the country. Sprawling across a basalt plateau in the north-west corner of Wyoming, this magnificent wilderness area spills', '', '2020-11-17 15:51:25', 1, 0, '{E6DBBD01-8430-4FCC-AA96-866B1B6FB454}'),
(43, 'The Grand Canyon', 'It may be one of the world\'s most impressive and perfect examples of erosion, but what leaves visitors breathless at its edge is not always the science lesson implicit in the wonder we call the Grand Canyon. Standing alongside the rim, soaking in ...', '', '2020-11-17 15:53:13', 1, 0, '{81D73C82-2FE3-4B10-920A-53CF724FE50D}'),
(44, 'Pont Samuel de Champlain', 'La présidente du conseil d’agglomération, Sylvie Parent, affirme qu’il lui semble tout à fait cohérent de nommer le nouveau pont «Samuel-de-Champlain», puisque les autres ponts reliant la Rive-Sud à l’Île de Montréal portent les noms complets des personnag', '', '2020-11-17 15:56:44', 1, 0, '{08615B30-1560-4507-9CE0-2AF7049EF10B}'),
(45, 'The Golden Gate Bridge', 'On Friday, the Golden Gate Bridge doubled as a musical instrument as wind passed through its hallowed arches, resulting in a creepy and ghostly tune heard for miles.', 'pont', '2020-11-17 15:58:38', 1, 1, '{8AA27B1C-7245-4D3A-B18D-0DDCCBAE061F}'),
(46, 'Feuilles d\'automnes', 'Photo prise lors de l\'été des indiens 2020.', '', '2020-11-17 17:26:17', 1, 0, '{D8CF0FA5-0793-41C9-BF51-6D491C6A4DC7}');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(64) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Password` varchar(61) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `AvatarGUID` varchar(39) NOT NULL,
  `CreationDate` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `Password`, `Admin`, `AvatarGUID`, `CreationDate`) VALUES
(1, 'admin', 'admin@clg.qc.ca', '$2y$10$kIGLpL37eViCrkmxXoexQuDAsjW9MPiJldms50VLJc9INqvJwMgvG', 1, '{1BBE0560-7A1C-4540-AA2B-54C85D577F15}', '2020-11-13 08:46:16'),
(2, 'Nicolas Chourot', 'Nicolas.Chourot@clg.qc.ca', '$2y$10$p.54rOcpV65i.icDtiwW/O3m3xpDhz2NlKpYRHSpQpdsfm9mmF3AG', 0, '{086630F0-1264-4B93-A477-E9F9DDE3C7BF}', '2020-11-13 09:39:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
