-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Nis 2018, 23:01:48
-- Sunucu sürümü: 10.1.28-MariaDB
-- PHP Sürümü: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `uzaytasarim_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `ayar_id` int(6) NOT NULL,
  `depo_limiti` int(10) NOT NULL,
  `eleman_kayit_kodu` varchar(8) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL,
  `yonetici_kayit_kodu` varchar(6) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`ayar_id`, `depo_limiti`, `eleman_kayit_kodu`, `yonetici_kayit_kodu`) VALUES
(2, 212, 'EL1234', 'YN1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eleman_mesajlari`
--

CREATE TABLE `eleman_mesajlari` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_gonderen` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_icerik` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `eleman_mesajlari`
--

INSERT INTO `eleman_mesajlari` (`mesaj_id`, `mesaj_gonderen`, `mesaj_icerik`, `zaman`) VALUES
(1, 'STOKY ADMİN', 'Depoya Mallar Öğleden Sonra Saat 5\'te Gelecek !', '2018-04-25 22:43:53'),
(2, 'SEZAI UFUK  ', 'Elemanlar İçin Mesaj', '2018-04-25 22:48:12'),
(3, 'SEZAI UFUK  ', 'Herkes İçin Mesaj', '2018-04-25 22:48:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_adi` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_sifre` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ismi` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_soyadi` varchar(32) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adresi` varchar(62) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_yetkisi` varchar(12) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_adi`, `kullanici_sifre`, `kullanici_ismi`, `kullanici_soyadi`, `kullanici_adresi`, `kullanici_yetkisi`) VALUES
(21, 'stokyadmin', '123', 'STOKY', 'ADMİN', 'Acıbadem Mah.', 'Yönetici'),
(22, 'stokyeleman', '123', 'STOKY ', 'ELEMAN', 'Acıbadem Mah.', 'Eleman'),
(23, 'ufukoral', '123', 'SEZAİ UFUK ', 'ORAL', 'Acıbadem Mah.', 'Yönetici');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_mesajlari`
--

CREATE TABLE `kullanici_mesajlari` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_gonderen` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_kime` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_icerik` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici_mesajlari`
--

INSERT INTO `kullanici_mesajlari` (`mesaj_id`, `mesaj_gonderen`, `mesaj_kime`, `mesaj_icerik`, `zaman`) VALUES
(1, 'STOKY ADMİN', 'stokyeleman', 'Raporları odama getirir misiniz?', '2018-04-25 22:44:42'),
(2, 'SEZAI UFUK  ', 'stokyadmin', 'Stoky Özel Mesaj', '2018-04-25 22:48:37');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_kodu` text COLLATE utf8_turkish_ci,
  `urun_adi` varchar(68) COLLATE utf8_turkish_ci NOT NULL,
  `urun_adet` int(8) NOT NULL,
  `urun_fiyat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_kodu`, `urun_adi`, `urun_adet`, `urun_fiyat`) VALUES
(6, 'E954D4', 'RESİM DEFTERİ', 4, 22),
(7, '220F47', 'KALEM KUTUSU', 2, 16),
(8, 'F5223F', 'PASTEL BOYA SETİ', 6, 32),
(9, '802941', 'PİLOT KALEM', 8, 9),
(10, 'AAB8F2', 'KURŞUN KALEM', 68, 4),
(11, '34A035', 'RENKLİ KARTON', 82, 2),
(12, 'B997CC', 'YAZICI KARTUŞU', 4, 67.5),
(13, '70B668', 'KIRMIZI KALEM', 18, 3),
(14, '8A1646', 'SİLGİ', 4, 2.5),
(15, 'D7780F', 'DEFTER', 6, 4.5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici_mesajlari`
--

CREATE TABLE `yonetici_mesajlari` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_gonderen` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_icerik` varchar(128) COLLATE utf8_turkish_ci NOT NULL,
  `zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici_mesajlari`
--

INSERT INTO `yonetici_mesajlari` (`mesaj_id`, `mesaj_gonderen`, `mesaj_icerik`, `zaman`) VALUES
(2, 'STOKY ADMİN', 'Bugün saat 1\'de kargo gelecek.', '2018-04-25 22:43:27'),
(3, 'SEZAI UFUK  ', 'Yöneticiler İçin Mesaj', '2018-04-25 22:48:00'),
(4, 'SEZAI UFUK  ', 'Herkes İçin Mesaj', '2018-04-25 22:48:23');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `eleman_mesajlari`
--
ALTER TABLE `eleman_mesajlari`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `kullanici_mesajlari`
--
ALTER TABLE `kullanici_mesajlari`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `yonetici_mesajlari`
--
ALTER TABLE `yonetici_mesajlari`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `ayar_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `eleman_mesajlari`
--
ALTER TABLE `eleman_mesajlari`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_mesajlari`
--
ALTER TABLE `kullanici_mesajlari`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici_mesajlari`
--
ALTER TABLE `yonetici_mesajlari`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
