-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Bulan Mei 2026 pada 10.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `storis`
--

CREATE TABLE `storis` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `story_detail` longtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `storis`
--

INSERT INTO `storis` (`id`, `title`, `author`, `image`, `background_image`, `description`, `story_detail`, `created_at`, `updated_at`) VALUES
(2, 'Hamil duluan', 'grandius', '1778051416_eb2518f34282a7246d28.jpg', '1778051416_2605b426cda3e7aaed9b.jpg', 'sedapp', 'ahhdahdhiwdhiw', '2026-05-06 07:10:16', '2026-05-06 07:21:45'),
(3, 'abang puas adek lemas', 'jk samsul', '1778053910_012f979d0f7555a7fe34.jpg', '1778053910_6a32a214ff172dc2c7ba.jpg', 'dgwydhwjgdfhwf', 'fwfgegergsrs', '2026-05-06 07:51:50', '2026-05-06 07:51:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `storis`
--
ALTER TABLE `storis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `storis`
--
ALTER TABLE `storis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
