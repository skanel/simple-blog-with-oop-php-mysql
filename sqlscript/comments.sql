CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=15 ;


INSERT INTO `comments` (`id`, `id_post`, `owner`, `comment`) VALUES
(1, 1, 'user1', '2016-06-08'),
(2, 2, 'user1', '2016-06-08'),
(3, 1, 'user2', '2016-06-08'),
(4, 2, 'user3', '2016-06-08'),
(5, 3, 'user7', '2016-06-08'),
(6, 3, 'user8', '2016-06-08'),
(7, 4, 'user8', '2016-06-08'),
(8, 4, 'user9', '2016-06-08'),
(9, 5, 'user97', '2016-06-08'),
(10, 5, 'user92', '2016-06-08'),
(11, 6, 'user90', '2016-06-08'),
(12, 6, 'user94', '2016-06-08'),
(13, 7, 'user74', '2016-06-08'),
(14, 7, 'user24', '2016-06-08');