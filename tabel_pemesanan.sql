-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2024 pada 17.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemesanan_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pemesanan`
--

CREATE TABLE `tabel_pemesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `akomodasi` tinyint(1) NOT NULL DEFAULT 0,
  `transportasi` tinyint(1) NOT NULL DEFAULT 0,
  `service_makanan` tinyint(1) NOT NULL DEFAULT 0,
  `harga_paket` decimal(15,2) NOT NULL,
  `total_tagihan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pemesanan`
--

INSERT INTO `tabel_pemesanan` (`id`, `nama_pemesan`, `no_hp`, `jumlah_peserta`, `jumlah_hari`, `akomodasi`, `transportasi`, `service_makanan`, `harga_paket`, `total_tagihan`) VALUES
(14, 'pipippp', '213213', 2, 7, 1, 0, 1, '1500000.00', '21000000.00'),
(16, 'iky gt', '213213', 2, 2, 1, 1, 0, '2200000.00', '8800000.00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_pemesanan`
--
ALTER TABLE `tabel_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_pemesanan`
--
ALTER TABLE `tabel_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
