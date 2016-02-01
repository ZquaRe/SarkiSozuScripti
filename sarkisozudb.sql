-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Şub 2016, 16:50:42
-- Sunucu sürümü: 5.6.20
-- PHP Sürümü: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sarkisozudb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `db_ip`
--

CREATE TABLE IF NOT EXISTS `db_ip` (
`id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `konum` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `db_karaliste`
--

CREATE TABLE IF NOT EXISTS `db_karaliste` (
`id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `konum` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `db_sarki`
--

CREATE TABLE IF NOT EXISTS `db_sarki` (
`sarki_id` int(11) NOT NULL,
  `sarki_sarkici` varchar(255) NOT NULL,
  `sarki_adi` varchar(255) NOT NULL,
  `sarki_seo` varchar(255) NOT NULL COMMENT 'ileride kullanılır',
  `sarki_icerik` text NOT NULL,
  `sarki_ekleyen` varchar(255) NOT NULL,
  `sarki_anahtar` varchar(255) NOT NULL,
  `sarki_aciklama` varchar(255) NOT NULL,
  `sarki_link` varchar(255) DEFAULT NULL,
  `sarki_goruntulenme` int(11) NOT NULL DEFAULT '0',
  `sarki_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `db_sarki`
--

INSERT INTO `db_sarki` (`sarki_id`, `sarki_sarkici`, `sarki_adi`, `sarki_seo`, `sarki_icerik`, `sarki_ekleyen`, `sarki_anahtar`, `sarki_aciklama`, `sarki_link`, `sarki_goruntulenme`, `sarki_tarih`) VALUES
(13, 'Ece Seçkin', 'Follow Me', 'Follow Me - Ece Seçkin\r\n', 'Follow Me - Ece Seçkin\r\n', 'Follow Me - Ece Seçkin\r\n', 'Follow Me - Ece Seçkin\r\n', 'Follow Me - Ece Seçkin\r\n', '', 2, '2016-01-28 16:41:08'),
(14, 'İrem Derici', 'Aşk Eşittir Biz', 'İrem Derici - Aşk Eşittir Biz', 'İrem Derici - Aşk Eşittir Biz', 'İrem Derici - Aşk Eşittir Biz', 'İrem Derici - Aşk Eşittir Biz', 'İrem Derici - Aşk Eşittir Biz', 'https://www.youtube.com/watch?v=rzegUBbEyIM', 1, '2016-01-28 16:44:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `db_site`
--

CREATE TABLE IF NOT EXISTS `db_site` (
`db_site_id` int(11) NOT NULL,
  `db_site_durum` int(11) NOT NULL,
  `db_site_online` int(11) NOT NULL,
  `db_site_toplam_goruntulenme` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `db_site`
--

INSERT INTO `db_site` (`db_site_id`, `db_site_durum`, `db_site_online`, `db_site_toplam_goruntulenme`) VALUES
(5, 1, 1, 13);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `db_ip`
--
ALTER TABLE `db_ip`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `db_karaliste`
--
ALTER TABLE `db_karaliste`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `db_sarki`
--
ALTER TABLE `db_sarki`
 ADD PRIMARY KEY (`sarki_id`);

--
-- Tablo için indeksler `db_site`
--
ALTER TABLE `db_site`
 ADD PRIMARY KEY (`db_site_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `db_ip`
--
ALTER TABLE `db_ip`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `db_karaliste`
--
ALTER TABLE `db_karaliste`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `db_sarki`
--
ALTER TABLE `db_sarki`
MODIFY `sarki_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Tablo için AUTO_INCREMENT değeri `db_site`
--
ALTER TABLE `db_site`
MODIFY `db_site_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
