-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2019 pada 05.13
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
-- Database: `eborang2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namafile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publikasi` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `uuid`, `nama`, `namafile`, `tahun`, `publikasi`, `created_at`, `updated_at`) VALUES
(15, '3439d1b0-b225-11e9-aeba-690349f7f28e', 'akreditasi', '1564420786doc.pdf', '2019', 'ya', '2019-07-29 09:19:46', '2019-07-29 09:20:47'),
(16, 'b8ad7ec0-b26a-11e9-87fb-8f4729efebc2', 'prestasi', '1564450704doc_2.pdf', '2019', 'tidak', '2019-07-29 17:38:24', '2019-07-29 17:38:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guest`
--

CREATE TABLE `guest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_28_155313_create_roles_table', 1),
(4, '2019_07_28_155418_create_role_user_table', 1),
(5, '2019_07_29_112635_guest', 2),
(6, '2019_07_29_113152_operator', 2),
(7, '2019_07_29_123041_create_files_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_identitas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'dosen', 'ini user dosen', '2019-07-28 08:22:23', '2019-07-28 08:22:23'),
(2, 'operator', 'ini user operator', '2019-07-28 08:22:23', '2019-07-28 08:22:23'),
(3, 'admin', 'ini user admin', '2019-07-28 08:22:23', '2019-07-28 08:22:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 1, 19),
(20, 1, 20),
(21, 1, 21),
(22, 1, 22),
(23, 1, 23),
(24, 1, 24),
(25, 1, 25),
(26, 1, 26),
(27, 1, 27),
(28, 1, 28),
(29, 1, 29),
(30, 1, 30),
(31, 1, 31),
(32, 1, 32),
(33, 1, 33),
(34, 1, 34),
(35, 1, 35),
(36, 1, 36),
(37, 1, 37),
(38, 1, 38),
(39, 1, 39),
(40, 1, 40),
(41, 1, 41),
(42, 1, 42),
(43, 1, 43),
(44, 1, 44),
(45, 1, 45),
(46, 1, 46),
(47, 1, 47),
(48, 1, 48),
(49, 1, 49),
(50, 1, 50),
(51, 2, 51),
(52, 2, 52),
(53, 2, 53),
(54, 2, 54),
(55, 2, 55),
(56, 2, 56),
(57, 2, 57),
(58, 2, 58),
(59, 2, 59),
(60, 2, 60),
(61, 2, 61),
(62, 2, 62),
(63, 2, 63),
(64, 2, 64),
(65, 2, 65),
(66, 2, 66),
(67, 2, 67),
(68, 2, 68),
(69, 2, 69),
(70, 2, 70),
(71, 2, 71),
(72, 2, 72),
(73, 2, 73),
(74, 2, 74),
(75, 2, 75),
(76, 2, 76),
(77, 2, 77),
(78, 2, 78),
(79, 2, 79),
(80, 2, 80),
(81, 2, 81),
(82, 2, 82),
(83, 2, 83),
(84, 2, 84),
(85, 2, 85),
(86, 2, 86),
(87, 2, 87),
(88, 2, 88),
(89, 2, 89),
(90, 2, 90),
(91, 2, 91),
(92, 2, 92),
(93, 2, 93),
(94, 2, 94),
(95, 2, 95),
(96, 2, 96),
(97, 2, 97),
(98, 2, 98),
(99, 2, 99),
(100, 2, 100),
(101, 3, 101);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cager Tampubolon', 'banawa.utama@domain.com', NULL, '$2y$10$YJLDiHAglrbgvOvZ2l/koOOrnDokD3ItYC1s87Rbg9IJB7fMfTNo.', NULL, '2019-07-28 08:22:23', '2019-07-28 08:22:23'),
(2, 'Oskar Halim', 'hardi88@domain.com', NULL, '$2y$10$SpZnFBStqRNFuPbx1eMTruliNCaru8QHYfvCRfG3PDW6RkjeAmW/C', NULL, '2019-07-28 08:22:24', '2019-07-28 08:22:24'),
(3, 'Alika Rahmawati', 'wahyudin.budi@domain.com', NULL, '$2y$10$mds0rWtL.DAG8w2vS7MqROBQGMWdyO.FI.5BvfscPC9g0WrxTJoI6', NULL, '2019-07-28 08:22:24', '2019-07-28 08:22:24'),
(4, 'Yunita Yulianti S.Psi', 'bala96@domain.com', NULL, '$2y$10$N5MbcJBR/AC757I5.9MR0ujxkwhn.CsZHnAzLraRyAo/PIGmGuLjW', NULL, '2019-07-28 08:22:24', '2019-07-28 08:22:24'),
(5, 'Hartana Wira Waskita M.Kom.', 'septi81@domain.com', NULL, '$2y$10$Yq0hCc9T7EZ.VILX7yFTWu4FDB.Z6U643cnQ/10kyZ91zfB2pqXTm', NULL, '2019-07-28 08:22:24', '2019-07-28 08:22:24'),
(6, 'Sari Yolanda', 'mandasari.warsa@domain.com', NULL, '$2y$10$lQ4Qdm8aHIAeaKE6v0vuWuGQzcB6qf6uMx/UwMlPE0Mk.ncj7fGx.', NULL, '2019-07-28 08:22:24', '2019-07-28 08:22:24'),
(7, 'Wadi Galur Pradana S.Psi', 'julia.safitri@domain.com', NULL, '$2y$10$yRCqP/lhaFsYniIGDfvqsu9.tC9ClbDxdUdb94yhY11sKXLREAdSe', NULL, '2019-07-28 08:22:25', '2019-07-28 08:22:25'),
(8, 'Luwes Waskita', 'jasmin.haryanto@domain.com', NULL, '$2y$10$LabcMvBDez1GWDnR1pUjs.o19LZp0bGGmkZSEtIb.i71ia0SxBq6K', NULL, '2019-07-28 08:22:25', '2019-07-28 08:22:25'),
(9, 'Eka Ina Usada', 'dewi33@domain.com', NULL, '$2y$10$P0UXsGSRRROkJaDR8UrNN.Aq5c75i1FVWQCZce1ajdWJgSN6oJRQC', NULL, '2019-07-28 08:22:25', '2019-07-28 08:22:25'),
(10, 'Nasab Saragih', 'jsitompul@domain.com', NULL, '$2y$10$RcbqeHqYmhY5lTQozTLAdulZiKXBioSehMzMcArqVrx88IAtFqXEu', NULL, '2019-07-28 08:22:25', '2019-07-28 08:22:25'),
(11, 'Ami Cici Anggraini S.IP', 'tira.hakim@domain.com', NULL, '$2y$10$L63iFxMgh/JL3CL68cy2L.4DqutXcpCHD9Hc0LXUHtGZKCusaiG7.', NULL, '2019-07-28 08:22:25', '2019-07-28 08:22:25'),
(12, 'Cahyadi Kusumo S.E.I', 'glailasari@domain.com', NULL, '$2y$10$dc7mdd/6VMTVE4fV.5Ppi.LTxdUHyhI17zjJb/oLwrje59fNCtQNK', NULL, '2019-07-28 08:22:26', '2019-07-28 08:22:26'),
(13, 'Argono Saptono S.IP', 'zalindra01@domain.com', NULL, '$2y$10$CNMrUoSoiogKnw4JEgM2deuMDhgGoJrpimv/8B78IsSw.1oGuRvH6', NULL, '2019-07-28 08:22:26', '2019-07-28 08:22:26'),
(14, 'Harimurti Raditya Ardianto', 'hutagalung.fathonah@domain.com', NULL, '$2y$10$u7ydmtS8rSYGdCEKOn2AZOgPFb1oBnNXenv/jrduHOIc3C6NjHrIm', NULL, '2019-07-28 08:22:26', '2019-07-28 08:22:26'),
(15, 'Maimunah Kusmawati', 'tirtayasa04@domain.com', NULL, '$2y$10$ktWugdxf6OWXFmC27HkbKeoWUbVorDwI3xcW5oc74YcXU62Q2907O', NULL, '2019-07-28 08:22:26', '2019-07-28 08:22:26'),
(16, 'Samiah Zaenab Pertiwi S.Ked', 'uli68@domain.com', NULL, '$2y$10$IqBVKKZ8NPFk5v.R79Gf8.WOvGeIlaIjd/1EShQuOa2q9rkrPCsAq', NULL, '2019-07-28 08:22:26', '2019-07-28 08:22:26'),
(17, 'Padma Suryatmi S.H.', 'jinawi.wijayanti@domain.com', NULL, '$2y$10$I882V9WD3sEZKsp./vJJcuqz.Ez.M.WLAuP3BZk0zEkWiirvxCkjq', NULL, '2019-07-28 08:22:27', '2019-07-28 08:22:27'),
(18, 'Rafi Sitompul', 'msaptono@domain.com', NULL, '$2y$10$W5ABB3OVyLxOHcjxqsrKC.Z6B0EJH8RRai2c/NIwSNH57StiHdI7i', NULL, '2019-07-28 08:22:27', '2019-07-28 08:22:27'),
(19, 'Shakila Usamah', 'nuraini.prabawa@domain.com', NULL, '$2y$10$vf5TEaso9YYp3gzAmo16c.c7BTmslangojutKyf.05afy/ZlzfIo6', NULL, '2019-07-28 08:22:27', '2019-07-28 08:22:27'),
(20, 'Sari Agnes Fujiati', 'betania50@domain.com', NULL, '$2y$10$XRxtRyIfXHhuAIcFx3qZcODJh0FHbj4DAmi.ydR3igyEAH2J3MWmu', NULL, '2019-07-28 08:22:27', '2019-07-28 08:22:27'),
(21, 'Marwata Uwais', 'elvina.riyanti@domain.com', NULL, '$2y$10$q8eLfm.96Vr7Ie3o1eoMHOhGBvYiye2yD8ipKV4GeMSQGxnJCbu62', NULL, '2019-07-28 08:22:27', '2019-07-28 08:22:27'),
(22, 'Chandra Pranowo S.T.', 'farhunnisa11@domain.com', NULL, '$2y$10$jq4rP9W8jeVfLVF9132qOuJ3V0/YRqwkHCXTtHOogeM75pBitQyfK', NULL, '2019-07-28 08:22:28', '2019-07-28 08:22:28'),
(23, 'Malika Namaga S.Sos', 'hartati.ratih@domain.com', NULL, '$2y$10$7khvnWkH0sLtIPIP3nH5tuVkaS1H9jJ.hhRBK6jnwDJy9ZuPXddKG', NULL, '2019-07-28 08:22:28', '2019-07-28 08:22:28'),
(24, 'Pia Prastuti', 'wirda.gunarto@domain.com', NULL, '$2y$10$HeF0nhW6PwXxXOobyFlRnuqUvh.6Kj5hd0WJYMoT1wllr8UaFenwq', NULL, '2019-07-28 08:22:28', '2019-07-28 08:22:28'),
(25, 'Dewi Hastuti M.Farm', 'mahendra.jaka@domain.com', NULL, '$2y$10$PtV.50ZpvhcWegk./X5SA.yJc44ZW7dRFLsVM38XRWHkIjjBJ1DPS', NULL, '2019-07-28 08:22:28', '2019-07-28 08:22:28'),
(26, 'Galuh Simbolon S.Gz', 'siregar.dian@domain.com', NULL, '$2y$10$HyGJ7GgILko2U4GAJC0AYOh09wzb24cJcyov7vpOc6WKu9/iwTnQy', NULL, '2019-07-28 08:22:28', '2019-07-28 08:22:28'),
(27, 'Karna Pradipta', 'uwais.sabrina@domain.com', NULL, '$2y$10$9EGBBIsZxAmvZ9Xxg8FLFO/lr9s9PwbkaT7KyKUhsXjDIF2e0sQwC', NULL, '2019-07-28 08:22:29', '2019-07-28 08:22:29'),
(28, 'Catur Januar', 'prayogo09@domain.com', NULL, '$2y$10$JiSXpaNTH9NsjiYU8.rTX.onMBXKBAnmBOFb/gUJadiFI8fgE4e1K', NULL, '2019-07-28 08:22:29', '2019-07-28 08:22:29'),
(29, 'Ismail Manullang', 'dlaksmiwati@domain.com', NULL, '$2y$10$gNKxBMd1qKkMnQ9d9prbHuGNiE3uh3PrL79k3FzksLEUBTcSf6Vf6', NULL, '2019-07-28 08:22:29', '2019-07-28 08:22:29'),
(30, 'Lutfan Suryono', 'najmudin.siti@domain.com', NULL, '$2y$10$u7AW.jkFG8XlkVA4Q7jOHuoDUMHwOfdGzzIQh.zbf9s/A5ImZ9Y.K', NULL, '2019-07-28 08:22:29', '2019-07-28 08:22:29'),
(31, 'Raisa Ana Agustina', 'elvina.yulianti@domain.com', NULL, '$2y$10$lQbOeNGsyVvw79bQMrycderOKHls1rtlkPJbTpZtqvZZfGrmMsv6W', NULL, '2019-07-28 08:22:29', '2019-07-28 08:22:29'),
(32, 'Aditya Mahendra', 'zwijayanti@domain.com', NULL, '$2y$10$zS6ADi4f9TlWmARg.ZzYQel./9ZPvIGaF81nnUobvvJ9UGvF64XFS', NULL, '2019-07-28 08:22:30', '2019-07-28 08:22:30'),
(33, 'Martani Wasita', 'yulianti.nasim@domain.com', NULL, '$2y$10$cZY0FqYvvyxS86bWWPUTQOP28eBmwgK/uVB3Dc0AZLv1SMyH1c3Ai', NULL, '2019-07-28 08:22:30', '2019-07-28 08:22:30'),
(34, 'Nasrullah Dongoran', 'qmaryati@domain.com', NULL, '$2y$10$DikIT9yqLt.u.wLsEdqlTuXvb7cvHoQRSoDYYQ29fX8Zv0LTA4HMK', NULL, '2019-07-28 08:22:30', '2019-07-28 08:22:30'),
(35, 'Puspa Lidya Usada', 'upuspita@domain.com', NULL, '$2y$10$g0HZI1ujSnHO0xIyZtZ4XulmDj/kjJDOk2fThHNHRDwkbRy9qQVeS', NULL, '2019-07-28 08:22:30', '2019-07-28 08:22:30'),
(36, 'Siti Laksita', 'jdongoran@domain.com', NULL, '$2y$10$O75VVZl5CgUiJufGZNW6WOwJ2XDCoVJbdDD1fqYeUfQI.OLXrE8km', NULL, '2019-07-28 08:22:30', '2019-07-28 08:22:30'),
(37, 'Mutia Lailasari', 'gamblang.hakim@domain.com', NULL, '$2y$10$p7s.oVegs/L1lZbvjVSJoecq9Pkz.SzeVNWks.onabXE2.c.N.y7e', NULL, '2019-07-28 08:22:30', '2019-07-28 08:22:30'),
(38, 'Vivi Purwanti', 'suci.narpati@domain.com', NULL, '$2y$10$dA94t7CDQlxH2UPO5hqMlONI7ZGQFSzoyakUKU0geDy0ul6WDzXIi', NULL, '2019-07-28 08:22:31', '2019-07-28 08:22:31'),
(39, 'Agnes Uchita Prastuti M.Kom.', 'lpratiwi@domain.com', NULL, '$2y$10$OQ3QVJenSTG/Ol5F4tXkL.2P1ruRXXBbk1wkrXM5dqDbsgQXfsTIa', NULL, '2019-07-28 08:22:31', '2019-07-28 08:22:31'),
(40, 'Jasmin Nurdiyanti', 'paramita.sitorus@domain.com', NULL, '$2y$10$W1gQuN6ST8G1m05t4nXOJu35OEqyKsStvtoYmj1R5uQWyi1/P6GEu', NULL, '2019-07-28 08:22:31', '2019-07-28 08:22:31'),
(41, 'Jaeman Cahya Prayoga M.Ak', 'devi98@domain.com', NULL, '$2y$10$ea3IEXg/4yQg8zjBbGZs7OybiANdVAYnIPZNnTUYAGCAAtq1WB2wm', NULL, '2019-07-28 08:22:31', '2019-07-28 08:22:31'),
(42, 'Silvia Rahayu', 'banara.prastuti@domain.com', NULL, '$2y$10$CUbmSLMpvH.kulJGTorSKuNdgbFOPHI4wpVgjjJjfB8jmlPjyEcD6', NULL, '2019-07-28 08:22:31', '2019-07-28 08:22:31'),
(43, 'Widya Prastuti', 'aurora40@domain.com', NULL, '$2y$10$Ci3vAdU/dHnXXLITOOnST.5BmViJdSpkYP1vvPuxmHzsqJ96ROUMq', NULL, '2019-07-28 08:22:32', '2019-07-28 08:22:32'),
(44, 'Iriana Permata', 'napitupulu.gaduh@domain.com', NULL, '$2y$10$GKxV0exUzKVK2J1NAN9nPO0zHADVDKUcJsAYujZlAWuLJ7qI3HMTe', NULL, '2019-07-28 08:22:32', '2019-07-28 08:22:32'),
(45, 'Gilda Mayasari S.I.Kom', 'ikuswandari@domain.com', NULL, '$2y$10$91kqvTbLQdf2/u5OkHfYfuV2Z1zqvDvOnACSP8wDhwRp9RwU47YKm', NULL, '2019-07-28 08:22:32', '2019-07-28 08:22:32'),
(46, 'Nurul Padmasari', 'ulya99@domain.com', NULL, '$2y$10$vZBv6K/Q3TElHYWLjEiazuSARQsHeVohaRxYCKsjMXH34plCk2kSC', NULL, '2019-07-28 08:22:32', '2019-07-28 08:22:32'),
(47, 'Maryanto Utama M.Pd', 'pranawa53@domain.com', NULL, '$2y$10$w3PaS8qHMCun51OfXFrJ0.WsLPZzFOC25SzNSAJCtvnIh8WlYVYJm', NULL, '2019-07-28 08:22:32', '2019-07-28 08:22:32'),
(48, 'Liman Narpati', 'cnapitupulu@domain.com', NULL, '$2y$10$Yw3.XgIiO/9kqsmPXVMPj.6oEK0dbxWswR.p1K4ztBuRPoZs4a9Qa', NULL, '2019-07-28 08:22:33', '2019-07-28 08:22:33'),
(49, 'Tina Anggraini S.Pd', 'tthamrin@domain.com', NULL, '$2y$10$fap5qgDixNIdEZJKxG8rq.VPsNgc3ZYQBCCC3XqPtZQkWbhgEDEVq', NULL, '2019-07-28 08:22:33', '2019-07-28 08:22:33'),
(50, 'Kezia Purnawati', 'lembah.ardianto@domain.com', NULL, '$2y$10$vcTP.3rdjEgLx6Dy.qbkR.lbEP.58RXNhxVISfcywgZy3EZLMl9Uq', NULL, '2019-07-28 08:22:33', '2019-07-28 08:22:33'),
(51, 'Jasmani Wahyudin', 'eyolanda@domain.com', NULL, '$2y$10$SSywJ70hj86C7y2jWOYUhuGohzbEV3E9aRVGQtJ7HUvSnTbE93L4m', NULL, '2019-07-28 08:22:33', '2019-07-28 08:22:33'),
(52, 'Wisnu Galuh Natsir', 'puji28@domain.com', NULL, '$2y$10$ASXsiYNXEqnSQN3XUNf.W.BYenKdNV3sPV5Eb/yGryHl5TJiSQyEe', NULL, '2019-07-28 08:22:33', '2019-07-28 08:22:33'),
(53, 'Raden Sihombing', 'qyolanda@domain.com', NULL, '$2y$10$KAgR.lQLIsDBOhxphy7.OeRaTNVC3zB6w5NL1Oh.ffHPu.c9mE17C', NULL, '2019-07-28 08:22:34', '2019-07-28 08:22:34'),
(54, 'Padma Haryanti', 'melani.nurul@domain.com', NULL, '$2y$10$yk919gVWCnlAdpYvohCMDeHS2TyCuHhTGBltIWbC9KOiwEXgg9UTK', NULL, '2019-07-28 08:22:34', '2019-07-28 08:22:34'),
(55, 'Sabrina Riyanti', 'sari52@domain.com', NULL, '$2y$10$G64bXjGyqI9HbpToOUBuK.ogbH33tNAhj7hOJNZeFfAljrD177Twi', NULL, '2019-07-28 08:22:34', '2019-07-28 08:22:34'),
(56, 'Iriana Astuti', 'ciaobella.rahayu@domain.com', NULL, '$2y$10$Om8Z4TJ2aS/cY1Uk9VYnq.jPI0DBW43P7WIm0ZDNH/y7SlkbZq7h.', NULL, '2019-07-28 08:22:34', '2019-07-28 08:22:34'),
(57, 'Chelsea Yuniar', 'darmanto.iswahyudi@domain.com', NULL, '$2y$10$IRkjIPznpnBv.DTfLyVc9Ob6iLAuGAubyExpemD9vSXEMr.HfsH.G', NULL, '2019-07-28 08:22:34', '2019-07-28 08:22:34'),
(58, 'Reza Raden Narpati', 'zelda86@domain.com', NULL, '$2y$10$zJW9cUkyVq14YdHNXZ7WrOI9Wp4aS/.LL6ntRbTOvv3BZK4bz91GO', NULL, '2019-07-28 08:22:35', '2019-07-28 08:22:35'),
(59, 'Prima Niyaga Mansur M.TI.', 'jfirgantoro@domain.com', NULL, '$2y$10$ovKm1L5lJs0CdlCxp.zPyeWM7YPd3dNmpMFuM920AgwWsPsZfwXC2', NULL, '2019-07-28 08:22:35', '2019-07-28 08:22:35'),
(60, 'Mulya Setiawan', 'yuniar.puspa@domain.com', NULL, '$2y$10$xoYlKYiQ47jjKNe8NUyI0.xjdgTpl3eTGXTM54UMgJ4cjhSH2Y4N.', NULL, '2019-07-28 08:22:35', '2019-07-28 08:22:35'),
(61, 'Julia Salwa Nurdiyanti', 'suwarno.asmianto@domain.com', NULL, '$2y$10$Tc0O81diWyyGAIFvXp9aau.k8aSXvqDRIUvOjXZ3ccjnxpcFqPsuq', NULL, '2019-07-28 08:22:35', '2019-07-28 08:22:35'),
(62, 'Dalima Namaga', 'vpradana@domain.com', NULL, '$2y$10$XASRTrVfFfxS4N7fhj0x.eLRq9ge/sUBbhvaTO40hJuDP9G.NxzRu', NULL, '2019-07-28 08:22:35', '2019-07-28 08:22:35'),
(63, 'Zelda Kusmawati', 'kamidin25@domain.com', NULL, '$2y$10$dok3RaX5moGZ8d3GdeifHO/d4wNkzPjQZjFjZbnFlY3nY0.cJDB.C', NULL, '2019-07-28 08:22:36', '2019-07-28 08:22:36'),
(64, 'Rina Maida Andriani S.Farm', 'rajasa.eva@domain.com', NULL, '$2y$10$9E0wjRouOX723exiELLYSeG3oqR1j0trHCeQCZypHZeEa.S6kmCti', NULL, '2019-07-28 08:22:36', '2019-07-28 08:22:36'),
(65, 'Sabar Rajata', 'laksmiwati.puji@domain.com', NULL, '$2y$10$BtUvRMI0yKwLIbRTHdpPG.hGyJGMjiU3SYyTb1.0HjuB.0M18cdAK', NULL, '2019-07-28 08:22:36', '2019-07-28 08:22:36'),
(66, 'Banawi Irawan', 'hakim.harsaya@domain.com', NULL, '$2y$10$x5D5NUVTVLujV6ye8M6rD.g0nYGUu5ars7Ha.YrHaLb0Z4SroMpfy', NULL, '2019-07-28 08:22:36', '2019-07-28 08:22:36'),
(67, 'Ellis Nasyiah', 'sidiq.nashiruddin@domain.com', NULL, '$2y$10$yn6bbwQwJqwuHrql5AGZP.9hzzrnI9rGOTVMPlyzmVQMi/5qJXTkm', NULL, '2019-07-28 08:22:36', '2019-07-28 08:22:36'),
(68, 'Paulin Novitasari', 'genta.yuliarti@domain.com', NULL, '$2y$10$Rcl/sKNOQcv7zeE5pOnxqeRhvrBtzpvO./F3RX.ZPeNAKPC8J.wkK', NULL, '2019-07-28 08:22:37', '2019-07-28 08:22:37'),
(69, 'Ira Yance Nuraini', 'nrahayu@domain.com', NULL, '$2y$10$j1Q.a.3dnCosT8QQ5xnj0O4dcywjuGdfN9vKjXCYXMdYAvDGRKDcS', NULL, '2019-07-28 08:22:37', '2019-07-28 08:22:37'),
(70, 'Dian Riyanti', 'uwijayanti@domain.com', NULL, '$2y$10$C9CIoXHG0LiYt0GW4EC5EeYV7FpIBEn8I.xUc9VQJK.UHPGMimj1S', NULL, '2019-07-28 08:22:37', '2019-07-28 08:22:37'),
(71, 'Carla Astuti S.Sos', 'edi.puspasari@domain.com', NULL, '$2y$10$yQhgg7DCjnUZwqYYYMcuS.6enSsBKQ7K8nHjU.GG4j3T3MN9g8E6q', NULL, '2019-07-28 08:22:37', '2019-07-28 08:22:37'),
(72, 'Eja Nugroho S.Ked', 'xmansur@domain.com', NULL, '$2y$10$FDdMIq.98yh1d4oI0vAbiurkNu8IHCPRosKQY16AYbZsgPNK4j/O2', NULL, '2019-07-28 08:22:37', '2019-07-28 08:22:37'),
(73, 'Zahra Suryatmi M.Kom.', 'wibisono.diana@domain.com', NULL, '$2y$10$3iT/lUROJ445Yu7iiyv61.XK6NukyOOeM996MhVQcQsTaH68hdmSq', NULL, '2019-07-28 08:22:38', '2019-07-28 08:22:38'),
(74, 'Anggabaya Wibowo', 'nnasyidah@domain.com', NULL, '$2y$10$08XHIjhPfvYtpYiK25giHOyGDeipyiXrqfGfz3o6/WdOFkr5ihNjW', NULL, '2019-07-28 08:22:38', '2019-07-28 08:22:38'),
(75, 'Zizi Mulyani', 'kusada@domain.com', NULL, '$2y$10$Qag.rNAtIWJ.spjlqC.SYeJ6JN4bIPaA1KJGEvYPu8Np2KIlQ.ftu', NULL, '2019-07-28 08:22:38', '2019-07-28 08:22:38'),
(76, 'Mulya Karman Tamba S.I.Kom', 'rachel.laksita@domain.com', NULL, '$2y$10$TNujbZN4aURGeYd7U1YxMuCXf3gIYFBR3vvwrtb35iBlWR3p3RYQu', NULL, '2019-07-28 08:22:38', '2019-07-28 08:22:38'),
(77, 'Fitriani Lailasari', 'unjani.sihotang@domain.com', NULL, '$2y$10$Jyeo4KfxCQiGsZ/FkXB9Ten793U7W0j0/jCSyEk1A3a7FBPtPpDlu', NULL, '2019-07-28 08:22:38', '2019-07-28 08:22:38'),
(78, 'Kania Palastri', 'rahmawati.surya@domain.com', NULL, '$2y$10$bH5FyrGRkdcOUqhLk8x.Te4FgUi.CkCpygAAE6DPp1kBmgGVoRCT6', NULL, '2019-07-28 08:22:39', '2019-07-28 08:22:39'),
(79, 'Darsirah Dongoran M.Pd', 'luhung02@domain.com', NULL, '$2y$10$9jI1SONd1bnas/uwyE7k7OO0vmmrnaL.aMGsgPtlrVuD0UcSlLYW2', NULL, '2019-07-28 08:22:39', '2019-07-28 08:22:39'),
(80, 'Dinda Lala Agustina', 'wardi.salahudin@domain.com', NULL, '$2y$10$Bn6R5hWDqW03sb6yIa5ufeSiiCvagX19qp4jZCZTJDZN7R88SkoYK', NULL, '2019-07-28 08:22:39', '2019-07-28 08:22:39'),
(81, 'Ghaliyati Sabrina Farida S.Farm', 'dasa08@domain.com', NULL, '$2y$10$xpQdc8KU5skFq4PjifXSJ.PfNoZerOiqJ6tbOXNRWCBstM1dUqtJy', NULL, '2019-07-28 08:22:39', '2019-07-28 08:22:39'),
(82, 'Irma Jelita Agustina M.TI.', 'pangeran69@domain.com', NULL, '$2y$10$qwAwm13SFMtqq2/XgIPQguQcm07NStVk/2AroNW7hLwIrMi55kQtu', NULL, '2019-07-28 08:22:39', '2019-07-28 08:22:39'),
(83, 'Cindy Mutia Utami S.T.', 'aoktaviani@domain.com', NULL, '$2y$10$9SCaTW2byNt8bQHxvbVr9OWi1V7DAdG2rSumjt1D5TWh1kohyysc.', NULL, '2019-07-28 08:22:40', '2019-07-28 08:22:40'),
(84, 'Ade Mandasari S.Pt', 'fitriani56@domain.com', NULL, '$2y$10$ENOyOIMrvUg.fnsq/L5r/OqgmtBGjKNnpt96lfOhosQo/mXgoIfFW', NULL, '2019-07-28 08:22:40', '2019-07-28 08:22:40'),
(85, 'Yusuf Prakasa', 'iputra@domain.com', NULL, '$2y$10$Ld8fwcgM2KCYT2S6z16YUeBmtZcWL5qFt69GIeYsdXuF1nTk.Yroq', NULL, '2019-07-28 08:22:40', '2019-07-28 08:22:40'),
(86, 'Gamblang Embuh Sinaga', 'jrajata@domain.com', NULL, '$2y$10$5NlGEIyqSiTqXBsfhi5Yo.C4aDOl.jPeyFcBHYzoIbhJhWA2tk40u', NULL, '2019-07-28 08:22:40', '2019-07-28 08:22:40'),
(87, 'Fitriani Purwanti M.TI.', 'farida.paulin@domain.com', NULL, '$2y$10$JpEj61JxKAEN9tsM4O0dx.WolQwOr.xchRtpyi.cVdZ9.GnlqUhP.', NULL, '2019-07-28 08:22:40', '2019-07-28 08:22:40'),
(88, 'Vicky Restu Nurdiyanti S.T.', 'sudiati.gara@domain.com', NULL, '$2y$10$VZg4XQhloRqMj9JLCDBK0.KMJpCL1Iho7Nw95eyLSirrx/elpCNhy', NULL, '2019-07-28 08:22:41', '2019-07-28 08:22:41'),
(89, 'Janet Handayani', 'darimin62@domain.com', NULL, '$2y$10$aLO3mcigLSyyeE1s4kPqv.Ny5To4VwQYG.oYDCCvN47MYXLw.58Bm', NULL, '2019-07-28 08:22:41', '2019-07-28 08:22:41'),
(90, 'Daniswara Budiyanto S.E.I', 'dnurdiyanti@domain.com', NULL, '$2y$10$pXfDmGb07UMTy.OlLb/Da.nGwwh8Gc5R./mQ.KSBMBU3n6DTgIlpS', NULL, '2019-07-28 08:22:41', '2019-07-28 08:22:41'),
(91, 'Warsita Wijaya', 'kuswandari.nugraha@domain.com', NULL, '$2y$10$kM/hWQ7MIdbEnTYx/7Ks5O140ULdXS7m/RLUjC8mFCfIdpnTk6zlq', NULL, '2019-07-28 08:22:41', '2019-07-28 08:22:41'),
(92, 'Ophelia Novitasari', 'diana.yolanda@domain.com', NULL, '$2y$10$xK0qOggGEkWD9sbCejGK6OABYbmmZY/jQrZnW6pzooIjV2ecau83m', NULL, '2019-07-28 08:22:41', '2019-07-28 08:22:41'),
(93, 'Fitria Mardhiyah S.E.I', 'diana.purwanti@domain.com', NULL, '$2y$10$N9reAGxlcnuwjowJHQ6OyO35deG6C94nadoZsaHzmobSmi3eTusl.', NULL, '2019-07-28 08:22:42', '2019-07-28 08:22:42'),
(94, 'Restu Mandasari', 'mila21@domain.com', NULL, '$2y$10$4LdPCgBJAFK0Z57ickMxAumxXyl40bPR2oBR6FxH56L1CJEr2BGxq', NULL, '2019-07-28 08:22:42', '2019-07-28 08:22:42'),
(95, 'Joko Uwais M.TI.', 'dodo06@domain.com', NULL, '$2y$10$0Yks0WbFvocvm42.DQk7BumCNDw3DA5aDbf0OgWcdZHquhSNwhMea', NULL, '2019-07-28 08:22:42', '2019-07-28 08:22:42'),
(96, 'Marsito Marpaung', 'lwahyudin@domain.com', NULL, '$2y$10$SANKs8YWIo/.zrmvr1Sg9.c4S.ott.cGQOc2eFZbcWmqPCTISCyz.', NULL, '2019-07-28 08:22:42', '2019-07-28 08:22:42'),
(97, 'Queen Wijayanti', 'putri20@domain.com', NULL, '$2y$10$BlRZyd/LdcewbgfTYZPBHud4I/5g.TFDX0SXE07U12xzYSAbNaVi.', NULL, '2019-07-28 08:22:42', '2019-07-28 08:22:42'),
(98, 'Carla Zulfa Andriani', 'pradipta.keisha@domain.com', NULL, '$2y$10$poSlF.67HC.0JoJQjA7MqOXHntPO3rqbiypyP58ZmWbq6VHi8bEse', NULL, '2019-07-28 08:22:43', '2019-07-28 08:22:43'),
(99, 'Lantar Firgantoro', 'hasna.firgantoro@domain.com', NULL, '$2y$10$GVUpVjCpGLfKbhQe2ABXFOOfUxMJVCEYi68mY00MjmLMZXZmSflHu', NULL, '2019-07-28 08:22:43', '2019-07-28 08:22:43'),
(100, 'Umar Pradana', 'gunawan.karman@domain.com', NULL, '$2y$10$zEL2/My2WkoOirS3MGywsuf3fPTOdXjAWE1YaJ0ozbApDbAXmFeaG', NULL, '2019-07-28 08:22:43', '2019-07-28 08:22:43'),
(101, 'admin', 'admin@admin.com', NULL, '$2y$10$tFES6L1MWsM5j706c1KXMeaQLIDa0D1QjIA901f4o5lb9u7m5T8Um', NULL, '2019-07-28 08:22:43', '2019-07-28 08:22:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `guest`
--
ALTER TABLE `guest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
