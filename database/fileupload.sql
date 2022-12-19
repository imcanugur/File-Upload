-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 18 Ara 2022, 20:44:47
-- Sunucu sürümü: 8.0.27
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `fileupload`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `file_path` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '0->Silinmiş, 1->Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `files`
--

INSERT INTO `files` (`id`, `username`, `file_path`, `status`, `created_at`) VALUES
(1, 'admin2', 'dosya.pdf', 1, '2022-12-18 18:52:01'),
(2, 'user1', 'dosya2.pdf', 0, '2022-12-18 18:54:18'),
(3, 'admin', '377_Yeni Metin Belgesi.txt', 0, '2022-12-18 19:25:17'),
(4, 'admin', '919_rat e-post.php', 1, '2022-12-18 19:26:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` int NOT NULL COMMENT '0->Admin, 1->User',
  `upload_status` int NOT NULL COMMENT '0->No, 1->Yes',
  `status` int NOT NULL DEFAULT '1' COMMENT '0->Silinmiş, 1->Aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `upload_status`, `status`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 1, 1, '2022-12-17 20:29:43'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 1, 1, 1, '2022-12-17 20:30:08'),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 1, 0, 1, '2022-12-18 09:13:12'),
(4, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 0, 1, 1, '2022-12-18 20:03:34'),
(5, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 0, 1, 1, '2022-12-18 20:07:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
