-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2021 pada 07.25
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anita_donor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `role`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 'super-administrator', '2021-08-20 00:04:39', '2021-08-20 00:04:39'),
(2, 'Administrator', 'administrator', '2021-08-20 00:04:53', '2021-08-20 00:04:53'),
(3, 'Blood Manager', 'blood-manager', '2021-08-20 00:06:27', '2021-08-20 00:06:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_users`
--

INSERT INTO `admin_users` (`id`, `id_role`, `username`, `password`, `nama`, `email`, `image`, `tempat_lahir`, `tanggal_lahir`, `bio`, `created_at`, `updated_at`) VALUES
(1, 1, 'mrivaldi', '$2y$10$BRphhxq7c6WfLDAzyxM71.ul.t9rh/hQ.J8IGl91m30pTgfrvpSJe', 'Muhammad Rivaldi', 'rivaldimuhammad4897@gmail.com', 'default.png', 'Sorong', '1997-08-04', NULL, '2021-08-20 22:09:04', '2021-08-22 21:20:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blood_donor`
--

CREATE TABLE `blood_donor` (
  `id` int(11) NOT NULL,
  `id_blood_group` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` longtext NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `id_blood_group`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nohp`, `image`, `password`, `status_aktif`, `created_at`, `updated_at`) VALUES
(1, 3, '1234567890123456', 'Muhammad Rivaldi', 'Sorong', '1997-08-04', 'Jl. Dorowati Km. 12 Masuk, Sorong Timur, Kota Sorong\r\nLorong Depan Averos, Rumah ke 3 warna biru', '082248636251', 'default.png', '$2y$10$dN7udpEKWrKQ9v8WgsTOoO8UOtaaBnD2MZ3NcaUxp7FmYmXu7ZkCC', 1, '2021-08-24 23:37:05', '2021-08-24 23:37:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blood_group`
--

INSERT INTO `blood_group` (`id`, `blood_group`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'A', 'a', '2021-08-23 23:09:50', '2021-08-24 19:53:33'),
(2, 'B', 'b', '2021-08-23 23:10:28', '2021-08-23 23:10:28'),
(3, 'AB', 'ab', '2021-08-23 23:10:34', '2021-08-23 23:10:34'),
(4, 'O', 'o', '2021-08-23 23:10:41', '2021-08-23 23:10:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blood_needer`
--

CREATE TABLE `blood_needer` (
  `id` int(11) NOT NULL,
  `id_blood_group` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` longtext NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `donored_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blood_needer`
--

INSERT INTO `blood_needer` (`id`, `id_blood_group`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kota`, `provinsi`, `kecamatan`, `negara`, `jenis_kelamin`, `agama`, `status`, `donored_by`, `created_at`, `updated_at`) VALUES
(1, 3, '1234567890123456', 'Muhammad Rivaldi', 'Sorong', '1997-08-04', 'Jl. Dorowati Km. 12 Masuk, Sorong Timur, Kota Sorong\r\nLorong Depan Averos, Rumah ke 3 warna biru', 'Sorong', 'Papua Barat', 'Sorong Timur', 'Indonesia', 'Laki-laki', 'Islam', 1, 1, '2021-08-30 21:46:08', '2021-08-31 22:18:10'),
(2, 1, '1234567891234567', 'Muhammad Nur Fajar', 'Sorong', '1997-03-05', 'Jl. Gagak Km. 7', 'Sorong', 'Papua Barat', 'Remu Utara', 'Indonesia', 'Laki-laki', 'Islam', 2, NULL, '2021-08-31 22:04:40', '2021-08-31 22:18:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blood_stock`
--

CREATE TABLE `blood_stock` (
  `id` int(11) NOT NULL,
  `id_blood_group` int(11) NOT NULL,
  `id_donor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `donored_to` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blood_stock`
--

INSERT INTO `blood_stock` (`id`, `id_blood_group`, `id_donor`, `status`, `donored_to`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 1, '2021-08-25 21:08:23', '2021-08-31 22:18:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `map` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hospital`
--

INSERT INTO `hospital` (`id`, `hospital`, `slug`, `address`, `map`, `created_at`, `updated_at`) VALUES
(1, 'RSUD Sele Be Solu', 'rsud-sele-be-solu', 'Jl. Selebesolu II No.1, Klawalu, Sorong Tim., Kota Sorong, Papua Bar. 98416', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.321847019496!2d131.32016701427307!3d-0.9038857355823392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d595582c0e96b59%3A0xf6dacf966ed46ae7!2sRSUD%20Sele%20Be%20Solu!5e0!3m2!1sid!2sid!4v1631074641827!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '2021-09-07 23:17:29', '2021-09-07 23:47:24'),
(3, 'Rumah Sakit Angkatan Laut', 'rumah-sakit-angkatan-laut', 'Malabutor, Sorong Manoi, Kota Sorong, Papua Bar. 98412', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.344600795198!2d131.27276411427295!3d-0.8829294855670293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5eaad6139c78b1%3A0x85433794accce3cf!2sRumah%20Sakit%20Angkatan%20Laut%2C%20Malabutor%2C%20Sorong%20Manoi%2C%20Kota%20Sorong%2C%20Papua%20Bar.%2098412!5e0!3m2!1sid!2sid!4v1631076345873!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '2021-09-07 23:45:54', '2021-09-07 23:45:54'),
(4, 'RUMAH SAKIT MUTIARA', 'rumah-sakit-mutiara', '47CJ+3GJ, Remu Utara, Kec. Sorong, Kota Sorong, Papua Bar. 98412', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.4033277469!2d131.2641964450062!3d-0.8771032763033896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5954d4ce222a6d%3A0x55c1c7a32dc4fad0!2sRUMAH%20SAKIT%20MUTIARA!5e0!3m2!1sid!2sid!4v1631076787489!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '2021-09-07 23:53:13', '2021-09-07 23:53:13'),
(5, 'Rumah Sakit Umum Herlina', 'rumah-sakit-umum-herlina', 'Jl. Selat Makassar No.7, Remu Sel., Sorong Manoi, Kota Sorong, Papua Bar. 95855', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.357328744281!2d131.2839884668408!3d-0.887825884976612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5eab08e8ce9415%3A0x18535b1775a7578e!2sRumah%20Sakit%20Umum%20Herlina!5e0!3m2!1sid!2sid!4v1631076865122!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '2021-09-07 23:54:30', '2021-09-07 23:54:30'),
(6, 'Rumah Sakit Pertamina Sorong', 'rumah-sakit-pertamina-sorong', 'jalan ahmad yani kelurahan klaligi distrik sorong manoi, Klaligi, Sorong Manoi, Kota Sorong, Papua Bar. 98412', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15957.405116980766!2d131.25693442921076!3d-0.8766835468792762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf57f0bfef3ddc68b!2sRS.%20Pertamina%20Sorong!5e0!3m2!1sid!2sid!4v1631076911928!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '2021-09-07 23:55:17', '2021-09-07 23:55:17'),
(7, 'Rumah Sakit Maleo', 'rumah-sakit-maleo', 'Jl. Kesehatan No. 37, Kampung Baru, Kp. Baru, Kec. Sorong, Kota Sorong, Papua Bar. 98411', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.3588112861407!2d131.24630613405944!3d-0.8695854736969009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x444a4cc9d4ffb628!2sRumah%20Sakit%20Maleo!5e0!3m2!1sid!2sid!4v1631077071064!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '2021-09-07 23:57:56', '2021-09-07 23:57:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_blood_group` (`id_blood_group`);

--
-- Indeks untuk tabel `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blood_needer`
--
ALTER TABLE `blood_needer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_blood_group` (`id_blood_group`),
  ADD KEY `blood_needer_ibfk_2` (`donored_by`);

--
-- Indeks untuk tabel `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_blood_group` (`id_blood_group`),
  ADD KEY `id_donor` (`id_donor`),
  ADD KEY `blood_stock_ibfk_3` (`donored_to`);

--
-- Indeks untuk tabel `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `blood_needer`
--
ALTER TABLE `blood_needer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `blood_stock`
--
ALTER TABLE `blood_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin_users`
--
ALTER TABLE `admin_users`
  ADD CONSTRAINT `admin_users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `admin_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD CONSTRAINT `blood_donor_ibfk_1` FOREIGN KEY (`id_blood_group`) REFERENCES `blood_group` (`id`);

--
-- Ketidakleluasaan untuk tabel `blood_needer`
--
ALTER TABLE `blood_needer`
  ADD CONSTRAINT `blood_needer_ibfk_1` FOREIGN KEY (`id_blood_group`) REFERENCES `blood_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blood_needer_ibfk_2` FOREIGN KEY (`donored_by`) REFERENCES `blood_donor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD CONSTRAINT `blood_stock_ibfk_1` FOREIGN KEY (`id_blood_group`) REFERENCES `blood_group` (`id`),
  ADD CONSTRAINT `blood_stock_ibfk_2` FOREIGN KEY (`id_donor`) REFERENCES `blood_donor` (`id`),
  ADD CONSTRAINT `blood_stock_ibfk_3` FOREIGN KEY (`donored_to`) REFERENCES `blood_needer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
