-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2024 pada 04.31
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
-- Database: `grapara_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `no_antrian` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`no_antrian`, `id_customer`, `id_cs`, `status`) VALUES
(1, 61, 0, 0),
(2, 62, 0, 0),
(3, 63, 0, 0),
(4, 64, 0, 0),
(5, 70, 0, 0),
(6, 71, 0, 0),
(7, 72, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `no_telepon` bigint(255) DEFAULT NULL,
  `no_antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `no_telepon`, `no_antrian`) VALUES
(40, 2147483647, 0),
(41, 123, 0),
(42, 2147483647, 0),
(43, 83157142294, 0),
(44, 83157142294, 0),
(45, 83157142294, 0),
(46, 83157142294, 0),
(47, 456, 0),
(48, 6969, 0),
(49, 83157142294, 0),
(50, 83157142294, 0),
(51, 234, 0),
(52, 234, 0),
(53, 234, 0),
(54, 234, 0),
(55, 234, 0),
(56, 234, 0),
(57, 234, 0),
(58, 87986756756, 0),
(59, 0, 0),
(60, 83157142294, 0),
(61, 83157142294, 0),
(62, 83157142294, 0),
(63, 89999769, 0),
(64, 99999999111, 0),
(65, 83157142294, 0),
(66, 83157142294, 0),
(67, 1234567890, 0),
(68, 1234567890, 0),
(69, 8314768, 0),
(70, 8314768, 5),
(71, 87863535711, 6),
(72, 87863535711, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_service`
--

CREATE TABLE `customer_service` (
  `nama` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer_service`
--

INSERT INTO `customer_service` (`nama`, `password`, `no_meja`, `id_cs`) VALUES
('RITA', '5521', 0, 21),
('ICA', '4321', 0, 22),
('ARMAN HIDAYAT', 'hdyt56', 0, 24),
('hrdita', '45678', 0, 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_meja_layanan`
--

CREATE TABLE `data_meja_layanan` (
  `id_layanan` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` char(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `role` enum('manajer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `password`, `role`) VALUES
('ac202b4b-20', 'ADM12345', 'admin'),
('d14e9406-20', 'MNJ12345', 'manajer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `waktu_awal` timestamp NOT NULL DEFAULT current_timestamp(),
  `masalah` varchar(6500) NOT NULL,
  `solusi` varchar(6500) NOT NULL,
  `waktu_akhir` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_antrian` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`no_antrian`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `customer_service`
--
ALTER TABLE `customer_service`
  ADD PRIMARY KEY (`id_cs`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `data_meja_layanan`
--
ALTER TABLE `data_meja_layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_customer` (`no_antrian`),
  ADD KEY `id_cs` (`id_cs`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `no_antrian` (`no_antrian`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_cs` (`id_cs`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `no_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `customer_service`
--
ALTER TABLE `customer_service`
  MODIFY `id_cs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `data_meja_layanan`
--
ALTER TABLE `data_meja_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_meja_layanan`
--
ALTER TABLE `data_meja_layanan`
  ADD CONSTRAINT `data_meja_layanan_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_meja_layanan_ibfk_2` FOREIGN KEY (`id_cs`) REFERENCES `customer_service` (`id_cs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_meja_layanan_ibfk_3` FOREIGN KEY (`no_antrian`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`no_antrian`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
