-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2024 pada 08.54
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `AlbumID` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `TanggalDiBuat` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`AlbumID`, `NamaAlbum`, `Deskripsi`, `TanggalDiBuat`, `UserID`) VALUES
(1, 'Mobil', 'Semua Mobil                                    ', '2024-02-19', 1),
(2, 'Motor', 'Semua Motor', '2024-02-19', 1),
(3, 'Kucing', 'Semua kucing', '2024-02-21', 2),
(4, 'Laptop', 'Semua Laptop', '2024-02-21', 2),
(5, 'Hanphone', 'Semua hanphone', '2024-02-21', 3),
(6, 'Kapal', 'Semua Kapal', '2024-02-21', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `FotoID` int(11) NOT NULL,
  `JudulFoto` varchar(255) NOT NULL,
  `DeskripsiFoto` text NOT NULL,
  `TanggalUnggah` date NOT NULL,
  `LokasiFile` varchar(255) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`FotoID`, `JudulFoto`, `DeskripsiFoto`, `TanggalUnggah`, `LokasiFile`, `AlbumID`, `UserID`) VALUES
(1, 'Mobil', 'Lamborgini', '2024-02-18', '1030269340-mobil1.jpg', 1, 1),
(2, 'Mobil', 'Roll Royce', '2024-02-18', '1346634465-mobil2.jpg', 1, 1),
(5, 'Motor', 'Fizr', '2024-02-20', '97450541-ð—™ðŸ­ð˜‡ð—¥.jpg', 2, 1),
(6, 'Motor', 'Aerox', '2024-02-20', '637649793-download (14).jpg', 2, 1),
(7, 'Kucing', 'Kucing anggora', '2024-02-21', '51831843-OIP.jpg', 3, 2),
(8, 'Kucing', 'Kucing oyen', '2024-02-21', '484955163-kucing2.jpg', 3, 2),
(9, 'Laptop', 'Macbook Pro 13', '2024-02-21', '578612534-pro2016_MAIN_115.png', 4, 2),
(10, 'Laptop', 'Asus ROG Flow X13', '2024-02-21', '1869729233-2021-03-18-product-7.webp', 4, 2),
(11, 'Hanphone', 'Iphone 15 pro max', '2024-02-21', '1331294228-OIP (1).jpg', 5, 3),
(12, 'Hanphone', 'Rog', '2024-02-21', '930058473-1671266-1000xauto-harga-hp-asus-rog-phone-generasi-pertama-hingga-terbaru-idaman-gamer.jpg', 5, 3),
(13, 'Kapal', 'Kapal Pesiar', '2024-02-21', '726536675-R.jpg', 6, 3),
(14, 'Kapal', 'Kapal selam', '2024-02-21', '1677239574-Kapal Selam.jpg', 6, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`KomentarID`, `FotoID`, `UserID`, `IsiKomentar`, `TanggalKomentar`) VALUES
(45, 1, 2, 'mobil yang mahal', '2024-02-21'),
(46, 2, 2, 'mobil mahal', '2024-02-21'),
(47, 5, 2, 'motor impian', '2024-02-21'),
(48, 6, 2, 'keren banget', '2024-02-21'),
(49, 7, 2, 'imut banget', '2024-02-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `LikeID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TanggalLike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`LikeID`, `FotoID`, `UserID`, `TanggalLike`) VALUES
(46, 6, 1, '2024-02-21'),
(54, 5, 1, '2024-02-21'),
(61, 1, 1, '2024-02-21'),
(63, 2, 1, '2024-02-21'),
(64, 1, 2, '2024-02-21'),
(65, 2, 2, '2024-02-21'),
(66, 5, 2, '2024-02-21'),
(67, 6, 2, '2024-02-21'),
(69, 7, 2, '2024-02-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 'malik', '827ccb0eea8a706c4c34a16891f84e7b', 'malikmustafa72735@gmail.com', 'malik ma', 'hagu selatan'),
(2, 'as', 'c20ad4d76fe97759aa27a0c99bff6710', 'fahrialgi275@gmail.com', 'azril ramadhan', 'hagu teungoh'),
(3, 'satria', 'c20ad4d76fe97759aa27a0c99bff6710', 'satriaramadhan@gmail.com', 'Satria Ramadhan', 'Kandang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `AlbumID` (`AlbumID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`),
  ADD KEY `FotoID` (`FotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `FotoID` (`FotoID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `AlbumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `FotoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`AlbumID`) REFERENCES `album` (`AlbumID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`FotoID`) REFERENCES `foto` (`FotoID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
