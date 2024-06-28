-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Haz 2024, 14:15:46
-- Sunucu sürümü: 8.3.0
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `menuler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `id` int UNSIGNED NOT NULL,
  `ustid` int NOT NULL,
  `menuadi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`id`, `ustid`, `menuadi`) VALUES
(1, 0, 'Giyim'),
(2, 0, 'Elektronik'),
(3, 0, 'Kitap'),
(4, 0, 'Bilgisayar'),
(5, 1, 'Kadın'),
(6, 1, 'Erkek'),
(7, 5, 'Elbise'),
(8, 5, 'Ayakkabı'),
(9, 5, 'Etek'),
(10, 5, 'Pantolon'),
(11, 3, 'Roman'),
(12, 3, 'Karikatür'),
(13, 3, 'Çocuk Kitapları'),
(14, 4, 'Masaüstü PC'),
(15, 4, 'Çevre Birimleri'),
(16, 4, 'Bileşenler'),
(17, 4, 'Aksesuar'),
(18, 16, 'Ram'),
(19, 16, 'Ekran Kartı'),
(20, 16, 'Anakart'),
(21, 16, 'Hard Disk'),
(22, 16, 'DDR3'),
(23, 16, 'DDR4'),
(24, 21, 'SSD'),
(25, 21, 'Katı Disk');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
