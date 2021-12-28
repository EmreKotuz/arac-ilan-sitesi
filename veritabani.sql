-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 27 Ara 2021, 20:03:09
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `veritabani`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `alt_baslik` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `aciklama` text CHARACTER SET utf8mb4 NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `aktif` int(11) NOT NULL DEFAULT 0,
  `sehir` text CHARACTER SET utf8mb4 NOT NULL,
  `ilce` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `resim` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `anahtarKelime` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`id`, `baslik`, `alt_baslik`, `aciklama`, `tarih`, `aktif`, `sehir`, `ilce`, `resim`, `anahtarKelime`) VALUES
(165, 'iueauiealkiueauilmek lmiuk elmakiulemakulimeakulyimkealmiukelamuiae', 'K', 'bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.bu bir denemedir.', '2021-12-22 18:17:55', 1, 'Maraş', 'Merkez', 'denemeresim/lu6177.jpg', 'Ç'),
(166, 'Toyota', '545540', 'bua uilmekaluikealmikuhyleamkyluiealkilmeakilmeaklimueaklmuikelamkiulmeakilmeakymlikealymiukeylamkiuelmakilyeakuliekailmeak', '2021-12-22 19:53:47', 1, 'osmaniye ', 'düziçi', 'denemeresim/er4313jpeg', 'Kdldjs'),
(167, 'tktükmütkmüt', '99', 'uieauieauieaiemakilekahlumikelamkilemaklimea mlikelamki elamkei lalmikelamikulemakuilyme ilke liekelamui', '2021-12-22 19:59:59', 1, 'Adana', 'Aladağ', 'denemeresim/th870jpeg', 'Honda'),
(343, 'uieaui', 'iuea', 'ielmakuilmekaliuelamikleamiulemasil kealikeaiukela', '2021-12-27 09:18:42', 1, 'Adana', 'Ceyhan', 'uiea', 'uiea'),
(344, 'uieaui', 'iuea', 'uiea', '2021-12-27 09:18:58', 1, 'Adana', 'Ceyhan', 'uiea', 'uiea');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogyorum`
--

CREATE TABLE `blogyorum` (
  `blogyorum_id` int(11) NOT NULL,
  `isimSoyisim` varchar(255) CHARACTER SET utf8 NOT NULL,
  `yorum` text CHARACTER SET utf8 NOT NULL,
  `img` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `blogyorum`
--
ALTER TABLE `blogyorum`
  ADD PRIMARY KEY (`blogyorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- Tablo için AUTO_INCREMENT değeri `blogyorum`
--
ALTER TABLE `blogyorum`
  MODIFY `blogyorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
